<?php

namespace App\Http\Controllers\Admin\ManagerUser;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserUpdateRequest;
use App\Models\Admin\Menu;
use App\Models\Admin\ManagerUser\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    private $permissionName = 'CadPermissoes';

    public function index(Request $request)
    {
        $this->negarAcesso();
        $users = User::whereNotIn('id', [Auth::id()])->orderBy('name')->paginate(env('NUMBER_LINE_PER_PAGE', 20));
        return view('admin.manager-user.users.index', compact('users'));
    }

    public function edit(User $user)
    {
        if ($this->negarAcesso('edit', true)) {
            return to_route('admin.users.index')->with('messageDanger', 'Usuário sem permissão de edição.');
        }
        $roles = Role::all();
        return view('admin.manager-user.users.edit', compact('user', 'roles'));
    }

    public function update(UserUpdateRequest $request, User $user)
    {
        if ($this->negarAcesso('edit', true)) {
            return to_route('admin.users.index')->with('messageDanger', 'Usuário sem permissão de edição.');
        }
        $user->update($request->validated());
        return to_route('admin.users.index')->with('message', 'User updated.');
    }

    public function destroy(User $user)
    {
        if ($this->negarAcesso('delete', true)) {
            return to_route('admin.users.index')->with('messageDanger', 'Usuário sem permissão de remover o registros.');
        }
        $user->delete();
        return to_route('admin.users.index')->with('message', 'User deleted.');
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
