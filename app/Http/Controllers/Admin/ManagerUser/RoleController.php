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
    private $role;
    private $permissionName = 'CadGrupos';

    public function __construct(Role $role)
    {
        $this->role = $role;
    }

    public function index()
    {
        $this->negarAcesso();
        $roles = Role::whereNotIn('name', ['admin'])->orderBy('name')->paginate(env('NUMBER_LINE_PER_PAGE', 20));
        return view('admin.manager-user.roles.index', compact('roles'));
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
        $role = $this->role->create($data);
        $returMsg = "[".$role->id."]".$role->name;
        return to_route('admin.roles.create')->with('messageSuccess', 'O registro '.$returMsg.', foi criado com sucesso.');
    }

    public function edit(Role $role)
    {
        if ($this->negarAcesso('edit', true)) {
            return to_route('admin.roles.index')->with('messageDanger', 'Usuário sem permissão de edição.');
        }
        $permissions = Permission::all();
        return view('admin.manager-user.roles.edit', compact('role', 'permissions'));
    }

    public function update(RoleRequest $request, Role $role)
    {
        if ($this->negarAcesso('edit', true)) {
            return to_route('admin.roles.index')->with('messageDanger', 'Usuário sem permissão de edição.');
        }
        $data = $request->all();
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
            return to_route('admin.roles.index')->with('messageDanger', 'Usuário sem permissão de remover o registros.');
        }
        $returMsg = "[".$role->id."]".$role->name;
        if($role->delete()){
            return to_route('admin.permissions.index')->with('messageSuccess', 'O registro '.$returMsg.', foi removido com sucesso.');
        }else{
            return to_route('admin.permissions.index')->with('messageDanger', 'Erro ao remover o registro '.$returMsg.". Se o problema persistir entre em contato com o suporte.");
        }
    }

    public function assignPermissions(Request $request, Role $role)
    {
        $role->permissions()->sync($request->permissions);
        return back()->with('message', 'Permissions added.');
    }

    /**
     * Método responsável por validar o acesso do usuário logado as actions da controller.
     */
    private function negarAcesso($tipo = 'view', $isRedirect = false)
    {
        //Verifica se o grupo é Admin já da permissão diretamente
        if(auth()->user()->hasRole('admin')){ return false; }

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
