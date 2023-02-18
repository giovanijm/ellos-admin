<?php

namespace App\Http\Controllers\Admin\ManagerUser;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ManagerUser\RoleRequest;
use App\Models\Admin\ManagerUser\{
        Permission,
        Role
};
use Illuminate\Http\Request;
use Carbon\Carbon;

class RoleController extends Controller
{
    private $model;
    private $permissionName = 'CadGrupos';
    private $objPermissions;

    public function __construct(Role $model, Permission $permission)
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
            $roles = $this->model::sortable()
                ->where($filter_row, $sort_type, $filter_search)
                ->with(['users'])
                ->paginate(env('NUMBER_LINE_PER_PAGE', 20));
        }else{
            $roles = $this->model::sortable()
                ->with(['users'])
                ->paginate(env('NUMBER_LINE_PER_PAGE', 20));
        }

        $objPermissions = $this->objPermissions;
        $objPermissions2 = clone $this->objPermissions;
        $objPermissions2->name = "CadGruposPermissao";
        return view('admin.manager-user.roles.index', compact('roles', 'filter', 'filter_row', 'objPermissions', 'objPermissions2'));
    }

    public function create()
    {
        if ($this->negarAcesso('new', true)) {
            return to_route('admin.roles.index')->with('messageDanger', 'Usuário sem permissão de criação.');
        }
        return view('admin.manager-user.roles.create');
    }

    public function store(RoleRequest $request)
    {
        if ($this->negarAcesso('new', true)) {
            return to_route('admin.roles.index')->with('messageDanger', 'Usuário sem permissão de criação.');
        }
        $data = $request->all();
        $role = $this->model->create($data);
        $returMsg = "[".$role->id."]".$role->name;
        return to_route('admin.roles.create')->with('messageSuccess', 'O registro '.$returMsg.', foi criado com sucesso.');
    }

    public function edit(Role $role, Request $request)
    {
        if ($this->negarAcesso('edit', true)) {
            return to_route('admin.roles.index')->with('messageDanger', 'Usuário sem permissão de edição.');
        }
        $objPermissions = clone $this->objPermissions;
        $objPermissions->name = "CadGruposPermissao";
        $permissions = Permission::sortable(['name'])->get();
        return view('admin.manager-user.roles.edit', compact('role', 'permissions', 'objPermissions'));
    }

    public function update(RoleRequest $request, Role $role)
    {
        if ($this->negarAcesso('edit', true)) {
            return back()->with('messageDanger', 'Usuário sem permissão de edição.');
        }

        if($role->id == env('ROLE_ID_ADMIN', 2)) {
            return back()->with('messageDanger', 'Este registro não pode ser alterado devido as regras do sistema.');
        }

        $data = $request->all();

        $data['active'] = empty($data['active']) ? 0 : 1;
        $data['updated_at'] = Carbon::now('America/Sao_Paulo');

        $returMsg = "[".$role->id."]".$role->name;

        if($role->update($data)){
            $returMsg = "[".$role->id."]".$role->name;
            return to_route('admin.roles.edit', ['role' => $role])->with('messageSuccess', 'O registro '.$returMsg.', foi atualizada com sucesso.');
        }else{
            return to_route('admin.roles.edit', ['role' => $role])->with('messageDanger', 'Erro ao atualizar o registro '.$returMsg.". Se o problema persistir entre em contato com o suporte.");
        }
    }

    public function destroy(Role $role)
    {
        if ($this->negarAcesso('delete', true)) {
            back()->with('messageDanger', 'Usuário sem permissão de remover o registros.');
        }

        if($role->id == env('ROLE_ID_ADMIN', 2)) {
            return back()->with('messageDanger', 'Este registro não pode ser excluído devido as regras do sistema.');
        }

        $returMsg = "[".$role->id."]".$role->name;

        if(count($role->users) > 0){
            return back()->with('messageDanger', 'Erro ao remover o registro '.$returMsg.". Existem vínculos entre este registro e outros dados.");
        }

        if($role->delete()){
            return back()->with('messageSuccess', 'O registro '.$returMsg.', foi removido com sucesso.');
        }else{
            return back()->with('messageDanger', 'Erro ao remover o registro '.$returMsg.". Se o problema persistir entre em contato com o suporte.");
        }
    }

    public function assignPermissions(Request $request, Role $role)
    {
        if ($this->negarAcesso('edit', true)) {
            return back()->with('messageDanger', 'Usuário sem permissão de edição.');
        }

        if($role->id == env('ROLE_ID_ADMIN', 2)) {
            return back()->with('messageDanger', 'AS permissões deste grupo não pode ser alterada devido as regras do sistema.');
        }

        $returMsg = "[".$role->id."]".$role->name;

        $role->permissions()->sync($request->permissions);
        $role['updated_at'] = Carbon::now('America/Sao_Paulo');
        $role->update();
        return back()->with('messageSuccess', 'As permissões do grupo '.$returMsg.', foram atualizadas com sucesso.');;
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
