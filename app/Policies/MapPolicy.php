<?php

namespace App\Policies;

use App\User;
use App\Map;
use Illuminate\Auth\Access\HandlesAuthorization;

class MapPolicy
{
    use HandlesAuthorization;

    public function delete_map(User $user, Map $map) 
    {
        return $user->hasPermission(__FUNCTION__);
    }

    public function edit_map(User $user, Map $map) 
    {
        return $user->hasPermission(__FUNCTION__);
    }

    public function list_maps(User $user) 
    {
        return $user->hasPermission(__FUNCTION__);
    }

    public function show_map(User $user, Map $map) 
    {
        return $user->hasPermission(__FUNCTION__);
    }  
}
