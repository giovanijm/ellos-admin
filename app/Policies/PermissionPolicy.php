<?php

namespace App\Policies;

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Models\User;
use App\Models\Admin\ManagerUser\Permission;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class PermissionPolicy
{
    use HandlesAuthorization;

    public function before(User $user, $ability)
    {
        if ($user->hasRole(env('ROLE_NAME_ADMIN', 'admin'))) {
            return true;
        }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Permission $permission)
    {
        $permissionName = $permission->name . "-View";
        return $user->role->hasPermission($permissionName);
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function new(User $user, Permission $permission)
    {
        $permissionName = $permission->name . "-New";
        return $user->role->hasPermission($permissionName);
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function edit(User $user, Permission $permission)
    {
        $permissionName = $permission->name . "-Edit";
        return $user->role->hasPermission($permissionName);
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Permission $permission)
    {
        $permissionName = $permission->name . "-Delete";
        return $user->role->hasPermission($permissionName);
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function sendnotification(User $user, Permission $permission)
    {
        $permissionName = $permission->name . "-SendNotification";
        return $user->role->hasPermission($permissionName);
    }

}
