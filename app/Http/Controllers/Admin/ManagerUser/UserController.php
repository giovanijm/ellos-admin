<?php

namespace App\Http\Controllers\Admin\ManagerUser;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserUpdateRequest;
use App\Models\Admin\ManagerUser\{ Role, Permission };
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use App\Notifications\notificationUser;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    private $model;
    private $permissionName = 'CadUsuarios';
    private $objPermissions;

    public function __construct(User $model, Permission $permission)
    {
        $this->model = $model;
        $this->objPermissions = $permission;
        $this->objPermissions->name = $this->permissionName;
    }

    public function index(Request $request)
    {
        $this->negarAcesso();

        $sort = empty($request->query('sort')) ?? false
                ? 'name'
                : $request->query('sort');

        $filter_search = $filter = empty($request->query('filter')) ?? false
                ? ''
                : $request->query('filter');

        $filter_row = empty($request->query('filter_row')) ?? false
                ? 'name'
                : $request->query('filter_row');

        switch ($filter_row)
        {
        case 'id':
            $sort_type = '=';
            break;
        case 'active':
            $sort_type = '=';
            $filter_search = empty($request->query('filter')) || mb_strtoupper($request->query('filter')) == 'FALSE' || mb_strtoupper($request->query('filter')) == 'FALSO' || mb_strtoupper($request->query('filter')) == 'NÃO' || mb_strtoupper($request->query('filter')) == 'NAO'
                ? "0"
                : "1";
            break;
        default:
            $filter_search = empty($filter) ?? false
                        ? ''
                        : '%'.$filter.'%';
            $sort_type = 'LIKE';
        }

        if(!empty($filter_search) || $filter_row == 'active'){
            $users = $this->model::sortable()
                ->where($filter_row, $sort_type, $filter_search)
                ->with(['role'])
                ->paginate(env('NUMBER_LINE_PER_PAGE', 20));
        }else{
            $users = $this->model::sortable()
                ->with(['role'])
                ->paginate(env('NUMBER_LINE_PER_PAGE', 20));
        }

        $objPermissions = $this->objPermissions;
        return view('admin.manager-user.users.index', compact('users', 'filter', 'filter_row', 'objPermissions'));


        //$users = User::whereNotIn('id', [Auth::id()])->orderBy('name')->paginate(env('NUMBER_LINE_PER_PAGE', 20));
    }

    public function create()
    {
        if ($this->negarAcesso('new', true)) {
            return to_route('admin.users.index')->with('messageDanger', 'Usuário sem permissão de criação.');
        }
        $roles = Role::sortable(['name'])->get();
        return view('admin.manager-user.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        if ($this->negarAcesso('new', true)) {
            return to_route('admin.users.index')->with('messageDanger', 'Usuário sem permissão de criação.');
        }
        $data = $request->all();
        $data['active'] = empty($data['active']) ? 0 : 1;

        $user = $this->model->create([
            'role_id'   => $data['role_id'],
            'name'      => $data['name'],
            'email'     => $data['email'],
            'password'  => Hash::make($data['password']),
            'active'    => $data['active'],
        ]);
        $returMsg = "[".$user->id."]".$user->name;
        return to_route('admin.users.create')->with('messageSuccess', 'O registro '.$returMsg.', foi criado com sucesso.');
    }

    public function edit(User $user)
    {
        if ($this->negarAcesso('edit', true)) {
            return to_route('admin.users.index')->with('messageDanger', 'Usuário sem permissão de edição.');
        }
        $roles = Role::sortable(['name'])->get();
        return view('admin.manager-user.users.edit', compact('user', 'roles'));
    }

    public function update(UserUpdateRequest $request, User $user)
    {
        if ($this->negarAcesso('edit', true)) {
            return back()->with('messageDanger', 'Usuário sem permissão de edição.');
        }

        $data = $request->all();
        $data['active'] = empty($data['active']) ? 0 : 1;
        $data['updated_at'] = Carbon::now('America/Sao_Paulo');

        if($request->hasFile('photo-file'))
        {
            $returnUpload = $this->imageUpload($request);
            if(!$returnUpload['success'])
                return redirect()->Back()->withInput()->withErrors($returnUpload['msgError']);

            $data['photo'] = $returnUpload['urlImage'];
        }

        $returMsg = "[".$user->id."]".$user->name;

        $roles = Role::sortable(['name'])->get();

        if($user->update($data)){
            $returMsg = "[".$user->id."]".$user->name;
            return to_route('admin.users.edit', ['user' => $user])->with('messageSuccess', 'O registro '.$returMsg.', foi atualizada com sucesso.')->with('roles', $roles);
        }else{
            return to_route('admin.users.edit', ['user' => $user])->with('messageDanger', 'Erro ao atualizar o registro '.$returMsg.". Se o problema persistir entre em contato com o suporte.")->with('roles', $roles);
        }
    }

    public function destroy(User $user)
    {
        if ($this->negarAcesso('delete', true)) {
            return to_route('admin.users.index')->with('messageDanger', 'Usuário sem permissão de remover o registros.');
        }

        $returMsg = "[".$user->id."]".$user->name;

        if($user->delete()){
            return back()->with('messageSuccess', 'O registro '.$returMsg.', foi removido com sucesso.');
        }else{
            return back()->with('messageDanger', 'Erro ao remover o registro '.$returMsg.". Se o problema persistir entre em contato com o suporte.");
        }
    }

    public function sendToMail(User $user)
    {
        $this->negarAcesso('sendnotification', false);

        $user->notify(new notificationUser($user));
        return back()->with('messageSuccess', 'E-mail foi enviado com sucesso.');
    }

    public function destroyPhoto(User $user)
    {
        if ($this->negarAcesso('delete', true)) {
            return to_route('admin.users.index')->with('messageDanger', 'Usuário sem permissão de remover o registros.');
        }

        if(Storage::disk('public')->exists($user->photo))
        {
            Storage::disk('public')->delete($user->photo);
        }

        $user->photo = null;
        $user->update();
        return back()->with('messageSuccess', 'Imagem do usuário foi excluída com sucesso.');
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

    private function imageUpload(UserUpdateRequest $request)
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

            $urlImage = $image->store('images/users', 'public');
            $uploadedImage = [
                'success' => true,
                'urlImage' => $urlImage,
                'msgError' => null
            ];
        }

        return $uploadedImage;
    }
}
