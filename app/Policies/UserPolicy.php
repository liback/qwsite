<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function create_user(User $user) 
    {
        return $user->hasPermission(__FUNCTION__);
    }

    public function delete_user(User $user, User $userToEdit) 
    {
        return $user->hasPermission(__FUNCTION__);
    }

    public function edit_profile(User $user) 
    {
        return $user->hasPermission(__FUNCTION__);
    }

    public function edit_user(User $user, User $userToEdit) 
    {
        return $user->hasPermission(__FUNCTION__);
    }

    public function list_users(User $user) 
    {
        return $user->hasPermission(__FUNCTION__);
    }

    public function show_user(User $user, User $userToShow) 
    {
        // We always let the user view his own profile even if he 
        // for some reason has not been granted the show user privilige...
        return ($user->hasPermission(__FUNCTION__) || ($user->id == $userToShow->id));
    }   
}
