<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model 
{
    protected $fillable = [
        'name'
    ];
    
    /**
     *
     * The roles that contains the permissions.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles() 
    {
    	return $this->belongsToMany('App\Role');
    }
}
