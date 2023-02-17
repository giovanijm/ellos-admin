<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MenuPolicy
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
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function sectionManagerUsers(User $user)
    {
        return $user->role->hasPermission("SectionManagerUsers");
    }

    public function sectionHome(User $user)
    {
        return $user->role->hasPermission("SectionHome");
    }

    public function sectionRegistration(User $user)
    {
        return $user->role->hasPermission("SectionRegistration");
    }

    public function modifyProfile(User $user)
    {
        return $user->role->hasPermission("ModifyProfile");
    }
}
