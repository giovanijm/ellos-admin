<?php

namespace App\Http\Controllers\Admin\ManagerCustomers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ManagerCustomers\CustomerRequest;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;
use App\Models\Admin\ManagerUser\{
    Permission,
};
use App\Models\Admin\{
    Customer,
    TbStatus,
    TypeContact
};
use Illuminate\Support\Facades\Http;

class CustomerController extends Controller
{
    private $model;
    private $permissionName = 'CadCustomers';
    private $objPermissions;

    public function __construct(Customer $model, Permission $permission)
    {
        $this->model = $model;
        $this->objPermissions = $permission;
        $this->objPermissions->name = $this->permissionName;
    }

    public function index(CustomerRequest $request)
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
            $customers = $this->model::sortable()
                ->where($filter_row, $sort_type, $filter_search)
                ->with(['status'])
                ->paginate(env('NUMBER_LINE_PER_PAGE', 20));
        }else{
            $customers = $this->model::sortable()
                ->with(['status'])
                ->paginate(env('NUMBER_LINE_PER_PAGE', 20));
        }

        $objPermissions = $this->objPermissions;
        return view('admin.manager-customers.customers.index', compact('customers', 'filter', 'filter_row', 'objPermissions'));

    }

    public function create()
    {
        if ($this->negarAcesso('new', true)) {
            return to_route('admin.customers.index')->with('messageDanger', 'Usuário sem permissão de criação.');
        }
        $tbstatus = TbStatus::all();
        return view('admin.manager-customers.customers.create', compact('tbstatus'));
    }

    public function store(CustomerRequest $request)
    {
        if ($this->negarAcesso('new', true)) {
            return to_route('admin.customers.index')->with('messageDanger', 'Usuário sem permissão de criação.');
        }
        $data = $request->all();

        $data["externalId"] = (string) Uuid::uuid4();
        $data["origin"] = env('CUSTOMER_ORIGIN_DEFAULT');

        $customer = $this->model->create($data);
        $returMsg = "[".$customer->id."]".$customer->fullName;
        return to_route('admin.customers.edit', $customer->id)->with('messageSuccess', 'O registro '.$returMsg.', foi criado com sucesso.');
    }

    public function edit(Customer $customer)
    {
        if ($this->negarAcesso('edit', true)) {
            return to_route('admin.customers.index')->with('messageDanger', 'Usuário sem permissão de edição.');
        }
        $tbstatus = TbStatus::all();
        $typeContact = TypeContact::all();
        return view('admin.manager-customers.customers.edit', compact('customer', 'tbstatus', 'typeContact'));
    }

    public function update(CustomerRequest $request)
    {
    }

    public function destroy(CustomerRequest $role)
    {
    }

    public function searchPostalCode (string $cep)
    {
        $cep =  preg_replace("/[^0-9]/", "", $cep);
        if(strlen($cep) == 8){
            $result = Http::get("https://brasilapi.com.br/api/cep/v2/" . $cep);//->json();
            if($result->ok())
                return response()->json(["success" => false, "data" => $result->json()],200);
            else
                return response()->json(["success" => false],200);
        }else{
            return response()->json(["success" => false],200);
        }
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
