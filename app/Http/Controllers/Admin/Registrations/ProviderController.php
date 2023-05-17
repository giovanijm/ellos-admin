<?php

namespace App\Http\Controllers\Admin\Registrations;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ManagerCustomers\ProviderRequest;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;
use App\Models\Admin\ManagerUser\{
    Permission,
};
use App\Models\Admin\{
    Provider,
    TbStatus,
    TypeContact
};
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProviderController extends Controller
{
    private $model;
    private $permissionName = 'CadProviders';
    private $objPermissions;

    public function __construct(Provider $model, Permission $permission)
    {
        $this->model = $model;
        $this->objPermissions = $permission;
        $this->objPermissions->name = $this->permissionName;
    }

    public function index(ProviderRequest $request)
    {

        $this->negarAcesso();

        $sort = empty($request->query('sort')) ?? false
                ? 'fullName'
                : $request->query('sort');

        $filter_search = $filter = empty($request->query('filter')) ?? false
                ? ''
                : $request->query('filter');

        $filter_row = empty($request->query('filter_row')) ?? false
                ? 'fullName'
                : $request->query('filter_row');

        switch ($filter_row)
        {
            case 'id':
            case 'birthDate':
                $sort_type = '=';
                break;
            case 'statusId':
                $sort_type = '=';
                $status = TbStatus::where('name', 'LIKE', $request->query('filter') . "%")
                    ->first();
                $filter_search = $status == null
                    ? -1
                    : $status->id;
                break;
            default:
                $filter_search = empty($filter) ?? false
                            ? ''
                            : '%'.$filter.'%';
                $sort_type = 'LIKE';
        }

        if(!empty($filter_search) || $filter_row == 'active'){
            $providers = $this->model::sortable()
                ->where($filter_row, $sort_type, $filter_search)
                ->with(['status'])
                ->paginate(env('NUMBER_LINE_PER_PAGE', 20));
        }else{
            $providers = $this->model::sortable()
                ->with(['status'])
                ->paginate(env('NUMBER_LINE_PER_PAGE', 20));
        }

        $objPermissions = $this->objPermissions;
        return view('admin.registrations.providers.index', compact('providers', 'filter', 'filter_row', 'objPermissions'));

    }

    public function create()
    {
        if ($this->negarAcesso('new', true)) {
            return to_route('admin.providers.index')->with('messageDanger', 'Usuário sem permissão de criação.');
        }
        $tbstatus = TbStatus::all();
        return view('admin.registrations.providers.create', compact('tbstatus'));
    }

    public function store(ProviderRequest $request)
    {
        if ($this->negarAcesso('new', true)) {
            return to_route('admin.providers.index')->with('messageDanger', 'Usuário sem permissão de criação.');
        }
        $data = $request->all();

        $data["externalId"] = (string) Uuid::uuid4();
        $data["origin"] = env('PROVIDER_ORIGIN_DEFAULT');

        $provider = $this->model->create($data);
        $returMsg = "[".$provider->id."]".$provider->fullName;
        return to_route('admin.providers.edit', $provider->id)->with('messageSuccess', 'O registro '.$returMsg.', foi criado com sucesso.');
    }

    public function edit(Provider $provider)
    {
        if ($this->negarAcesso('edit', true)) {
            return to_route('admin.customers.index')->with('messageDanger', 'Usuário sem permissão de edição.');
        }
        $tbstatus = TbStatus::all();
        $typeContact = TypeContact::all();
        return view('admin.registrations.providers.edit', compact('provider', 'tbstatus', 'typeContact'));
    }

    public function update(ProviderRequest $request, Provider $provider)
    {
        if ($this->negarAcesso('edit', true)) {
            return back()->with('messageDanger', 'Usuário sem permissão de edição.');
        }

        $data = $request->all();

        if($request->hasFile('photo-file'))
        {
            $returnUpload = $this->imageUpload($request);
            if(!$returnUpload['success'])
                return redirect()->Back()->withInput()->withErrors($returnUpload['msgError']);

            $data['photo'] = $returnUpload['urlImage'];
        }

        $returMsg = "[".$provider->id."]".$provider->fullName;


        if($provider->update($data)){
            $returMsg = "[".$provider->id."]".$provider->fullName;
            return to_route('admin.providers.edit', ['provider' => $provider])->with('messageSuccess', 'O registro '.$returMsg.', foi atualizada com sucesso.')->with('status');
        }else{
            return to_route('admin.providers.edit', ['provider' => $provider])->with('messageDanger', 'Erro ao atualizar o registro '.$returMsg.". Se o problema persistir entre em contato com o suporte.")->with('status');
        }
    }

    public function destroy(ProviderRequest $role)
    {
    }

    public function destroyPhoto(Provider $provider)
    {
        if ($this->negarAcesso('delete', true)) {
            return to_route('admin.users.index')->with('messageDanger', 'Usuário sem permissão de remover o registros.');
        }

        if(Storage::disk('public')->exists($provider->photo))
        {
            Storage::disk('public')->delete($provider->photo);
        }

        $provider->photo = null;
        $provider->update();
        return back()->with('messageSuccess', 'Imagem excluída com sucesso.');
    }

    private function imageUpload(ProviderRequest $request)
    {
        $uploadedImage = [
            'success' => false,
            'urlImage' => null,
            'msgError' => null
        ];

        if($request->hasFile('photo-file'))
        {
            $image = $request->file('photo-file');

            $input = [
                'photo-file' => $image
              ];

            /*
            * Regras da validação, como mimetype e tamanho máximo
            * 2048 é igual a 2mb, altere conforme a necessidade
            */
            $rules = [
                'photo-file' => 'image|mimes:jpeg,png,svg|max:2048'
            ];

            $messages = [
                'mimes' => 'Formato da imagem inválido'
            ];

            $validator = Validator::make($input, $rules, $messages);

            if ($validator->fails()) {
                $uploadedImage = [
                    'success' => false,
                    'urlImage' => null,
                    'msgError' => $validator
                ];
                return $uploadedImage;
            }

            $urlImage = $image->store('images/providers', 'public');
            $uploadedImage = [
                'success' => true,
                'urlImage' => $urlImage,
                'msgError' => null
            ];
        }

        return $uploadedImage;
    }

    /**
     * Método responsável por validar o acesso do usuário logado as actions da controller.
     */
    private function negarAcesso($tipo = 'view', $isRedirect = false)
    {
        //Verifica se o grupo é Admin já da permissão diretamente
        if(auth()->user()->hasRole(env('ROLE_NAME_ADMIN', 'admin'))){ return false; }

        $nome = $this->permissionName."-".ucfirst($tipo);
        if (!auth()->user()->role->hasPermission($nome)) {
            if($isRedirect){
                return true;
            }else{
                abort(403, 'Acesso negado');
            }
        }else{
            if($isRedirect){
                return false;
            }
        }
    }
}
