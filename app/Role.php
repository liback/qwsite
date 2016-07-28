<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
    	'name',
    ];

    /**
     *
     * Get the ermissions associated to the role.
     *
     * @return \Illluminate\Database\Eloquent\Relations\HasMany
     */
    public function permissions()
    {
    	return $this->belongsToMany('App\Permission');
    }

    /**
     *
     * Get the Users that have been assigned to the role.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
    	return $this->belongsToMany('App\User');
    }

    /**
     *
     * Checks if a role has a certain permission.
     *
     * @param String $permName
     * @return boolean	
     */
    public function hasPermission($permName)
    {
    	if (count($this->permissions) > 0) {
    		foreach($this->permissions as $perm) {
    			if  ($perm->name == $permName)
    				return true;
    		}
    	}

    	return false;
    }
}
