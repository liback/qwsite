<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Screenshot extends Model
{
	use Filterable;
    protected $fillable = [
    	'id',
    	'path',
    	'mapname',
    	'type'
    ];
}
