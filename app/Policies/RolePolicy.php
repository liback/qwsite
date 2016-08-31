<?php

namespace App\Policies;

use App\Role;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
{
    use HandlesAuthorization;

    public function create_role(User $user) 
    {
        return $user->hasPermission(__FUNCTION__);
    }

    public function delete_role(User $user, Role $role) 
    {
        return $user->hasPermission(__FUNCTION__);
    }

    public function edit_role(User $user, Role $role) 
    {
        return $user->hasPermission(__FUNCTION__);
    }

    public function list_roles(User $user) 
    {
        return $user->hasPermission(__FUNCTION__);
    }

    public function show_role(User $user, Role $role) 
    {
        return $user->hasPermission(__FUNCTION__);
    }    
}
