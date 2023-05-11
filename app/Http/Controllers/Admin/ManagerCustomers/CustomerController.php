<?php

namespace App\Http\Controllers\Admin\ManagerCustomers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ManagerCustomers\CustomerRequest;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Admin\ManagerUser\{
    Permission,
};
use App\Models\Admin\{
    Customer,
};

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
            case 'birthDate':
                $sort_type = '=';
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
                ->with(['tbstatus'])
                ->paginate(env('NUMBER_LINE_PER_PAGE', 20));
        }else{
            $customers = $this->model::sortable()
                ->with(['tbstatus'])
                ->paginate(env('NUMBER_LINE_PER_PAGE', 20));
        }

        $objPermissions = $this->objPermissions;
        return view('admin.manager-customers.customers.index', compact('customers', 'filter', 'filter_row', 'objPermissions'));

    }

    public function create()
    {
    }

    public function store(CustomerRequest $request)
    {
    }

    public function update(CustomerRequest $request)
    {
    }

    public function destroy(CustomerRequest $role)
    {
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