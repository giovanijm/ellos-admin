<?php

namespace App\Http\Controllers\Admin\ManagerUser;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Http\Requests\Admin\ManagerUser\PermissionRequest;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PermissionController extends Controller
{
    private $permission;
    private $permissionName = 'CadPermissoes';

    public function __construct(Permission $permission)
    {
        $this->permission = $permission;
    }

    /**
     * Método responsável por listar todos os registros de permissão do banco de dados.
     */
    public function index(Request $request)
    {
        $this->negarAcesso();
        //$data = $request->all();

        /* if($data && isset($data['search-dropdown']) && isset($data['campo-radio'])){
            if(empty($data["sort"])){
                $data["sort"] = $data['campo-radio'];
            }
            if(empty($data["direction"])){
                $data["direction"] = 'asc';
            }
            $permissions = Permission::sortable($data['campo-radio'], 'LIKE', $data['search-dropdown']."%")->orderBy($data['sort'], $data["direction"])->with(['roles'])->paginate(env('NUMBER_LINE_PER_PAGE', 20));
        }else{ */
            $permissions = Permission::sortable(['roles'])->paginate(env('NUMBER_LINE_PER_PAGE', 20));
        //}
        return view('admin.manager-user.permissions.index', compact('permissions'));
    }

    /**
     * Método responsável por carregar o form criar uma nova permissão.
     */
    public function create()
    {
        if ($this->negarAcesso('new', true)) {
            return to_route('admin.permissions.index')->with('messageDanger', 'Usuário sem permissão de criação.');
        }
        return view('admin.manager-user.permissions.create');
    }

    /**
     * Método responsável por salvar os dados de um novo registro de permissão do banco de dados.
     */
    public function store(PermissionRequest $request)
    {
        if ($this->negarAcesso('new', true)) {
            return to_route('admin.permissions.index')->with('messageDanger', 'Usuário sem permissão de criação.');
        }
        $data = $request->all();
        $permission = $this->permission->create($data);
        $returMsg = "[".$permission->id."]".$permission->name;
        return to_route('admin.permissions.create')->with('messageSuccess', 'O registro '.$returMsg.', foi criado com sucesso.');
    }

    /**
     * Método responsável buscar os dados de uma permissão e retornar para a view.
     */
    public function edit(Permission $permission)
    {
        if ($this->negarAcesso('edit', true)) {
            return to_route('admin.permissions.index')->with('messageDanger', 'Usuário sem permissão de edição.');
        }
        return view('admin.manager-user.permissions.edit', compact('permission'));
    }

    /**
     * Método responsável por atualizar um registro de permissão do banco de dados.
     */
    public function update(PermissionRequest $request, Permission $permission)
    {
        if ($this->negarAcesso('edit', true)) {
            return to_route('admin.permissions.index')->with('messageDanger', 'Usuário sem permissão de edição.');
        }

        $data = $request->all();
        $data['updated_at'] = Carbon::now('America/Sao_Paulo');

        $returMsg = "[".$permission->id."]".$permission->name;

        if($permission->update($data)){
            $returMsg = "[".$permission->id."]".$permission->name;
            return to_route('admin.permissions.edit', ['permission' => $permission])->with('messageSuccess', 'O registro '.$returMsg.', foi atualizada com sucesso.');
        }else{
            return to_route('admin.permissions.edit', ['permission' => $permission])->with('messageDanger', 'Erro ao atualizar o registro '.$returMsg.". Se o problema persistir entre em contato com o suporte.");
        }
    }

    /**
     * Método responsável por excluir um registro de permissão do banco de dados.
     */
    public function destroy(Permission $permission)
    {
        if ($this->negarAcesso('delete', true)) {
            return to_route('admin.permissions.index')->with('messageDanger', 'Usuário sem permissão de remover o registros.');
        }

        $returMsg = "(".$permission->id.")".$permission->name;

        if(count($permission->roles) > 0){
            return to_route('admin.permissions.index')->with('messageDanger', 'Erro ao remover o registro '.$returMsg.". Existem vínculos de outros dados com este registro.");
        }

        if($permission->delete()){
            return to_route('admin.permissions.index')->with('messageSuccess', 'O registro '.$returMsg.', foi removido com sucesso.');
        }else{
            return to_route('admin.permissions.index')->with('messageDanger', 'Erro ao remover o registro '.$returMsg.". Se o problema persistir entre em contato com o suporte.");
        }
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
