<?php

namespace App\Http\Controllers\Admin\ManagerUser;

use App\Http\Controllers\Controller;
use App\Models\Admin\ManagerUser\Permission;
use App\Http\Requests\Admin\ManagerUser\PermissionRequest;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PermissionController extends Controller
{
    private $model;
    private $permissionName = 'CadPermissoes';
    private $objPermissions;

    public function __construct(Permission $model)
    {
        $this->model = $model;
        $this->objPermissions = clone $this->model;
        $this->objPermissions->name = $this->permissionName;
    }

    /**
     * Método responsável por listar todos os registros de permissão do banco de dados.
     */
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
            default:
                $filter_search = empty($filter) ?? false
                            ? ''
                            : '%'.$filter.'%';
                $sort_type = 'LIKE';
        }

        if(!empty($filter)){
            $permissions = $this->model::sortable()
                ->where($filter_row, $sort_type, $filter_search)
                ->with(['roles'])
                ->paginate(env('NUMBER_LINE_PER_PAGE', 20));
        }else{
            $permissions = $this->model::sortable()
                ->with(['roles'])
                ->paginate(env('NUMBER_LINE_PER_PAGE', 20));
        }

        $objPermissions = $this->objPermissions;

        return view('admin.manager-user.permissions.index', compact('permissions', 'filter', 'filter_row', 'objPermissions'));
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
        $permission = $this->model->create($data);
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
            return to_route('admin.permissions.edit', ['permission' => $permission])->with('messageSuccess', 'O registro '.$returMsg.', foi atualizada com sucesso.')->with('messageInfo', 'Não se esqueça de atualizar também os nomes das permissões no local onde ela é utilizado.');
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
            return to_route('admin.permissions.index')->with('messageDanger', 'Erro ao remover o registro '.$returMsg.". Existem vínculos entre este registro e outros dados.");
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
