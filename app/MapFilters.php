<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;

class MapFilters extends QueryFilters 
{
	public function description($description = "") {
		return $this->builder->where('description', 'like', '%'. $description .'%');
	}

	public function name($name = "") {
		return $this->builder->where('name', 'like', '%'. $name .'%');
	}	
}