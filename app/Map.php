<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Map extends Model
{
	use Filterable;
    protected $fillable = [
    	'name',
    	'description'
    ];
}
