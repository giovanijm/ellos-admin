<?php

namespace App\Http\Controllers\Admin\ManagerUser;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserUpdateRequest;
use App\Models\Menu;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $this->validarAcesso();
        $users = User::whereNotIn('id', [Auth::id()])->orderBy('name')->paginate(env('NUMBER_LINE_PER_PAGE', 20));
        return view('admin.manager-user.users.index', compact('users'));
    }

    public function edit(User $user)
    {
        $this->validarAcesso();
        $roles = Role::all();
        return view('admin.manager-user.users.edit', compact('user', 'roles'));
    }

    public function update(UserUpdateRequest $request, User $user)
    {
        $this->validarAcesso();
        $user->update($request->validated());
        return to_route('admin.manager-user.users.index')->with('message', 'User updated.');
    }

    public function destroy(User $user)
    {
        $this->validarAcesso();
        $user->delete();
        return to_route('admin.manager-user.users.index')->with('message', 'User deleted.');
    }

    private function validarAcesso()
    {
        $this->authorize('sectionManagerUsers', Menu::class);
    }
}
