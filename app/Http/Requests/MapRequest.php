<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class MapRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
    	switch ($this->method())
    	{
    	    case 'GET':
    	    case 'DELETE':
    	        {
    	    		return [];
    	        }
    	    case 'POST':
    	        {	
                    return [
                        'name' => 'required|unique:maps|min:1',
                        'description' => ''
                    ];
    	        }
    	    case 'PUT':
    	    case 'PATCH':
    	        {
    	            return [
    	               // Check name for uniqueness in the maps table with 
    	               // the exception of map name with ID = $this->id 
    	               // which is the role being currently edited.
    	               'name' => 'required|min:2|unique:roles,name,'. $this->id,
                       'description' => '',
    	            ];    	        	
    	        }
    	    default: break;
    	}
    }
}
