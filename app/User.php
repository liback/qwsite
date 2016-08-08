<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'state'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get the roles that the user has been assigned.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles() 
    {
        return $this->belongsToMany('App\Role')->withTimestamps();
    }

    /**
     * Check if a user has been assigned a specific role.
     * 
     * @param  String  $roleName
     * @return boolean
     */
    public function hasRole($roleName)
    {
        if (count($this->roles) > 0) {
            foreach ($this->roles()->get() as $role) {
                if ($role->name == $roleName) {
                    return true;
                    exit();
                }
            }
        }
    }

    /**
     * Get a comma separated list of roles the user has been assigned.
     * 
     * @return string
     */
    public function printRoles() 
    {
        $rolesArr = $this->roles->toArray();
        $rolesString = "";

        if (count($rolesArr) > 0) {
            foreach($rolesArr as $role) {
                $rolesString .= UCFirst($role['name'] .', ');
            }

            // Remove trailing comma
            $rolesString = rtrim($rolesString, ', ');
        } else {
            $rolesString = '<no role set>';
        }

        return $rolesString;
    }

    /**
     * Check if user has a certain permission through any
     * of the roles he has been assigned.
     * 
     * @param  string  $permName 
     * @return boolean
     */
    public function hasPermission($permName)
    {
        if (count($this->roles()) > 0) {
            foreach($this->roles()->get() as $role) {
                foreach($role->permissions()->get() as $perm) {
                    if ($perm->name == $permName)
                        return true;
                }
            }
        }

        return false;
    }
}
