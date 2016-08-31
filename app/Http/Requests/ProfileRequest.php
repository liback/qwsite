<?php

namespace App\Http\Requests;

use Auth;
use App\Http\Requests\Request;

class ProfileRequest extends Request
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
    	    case 'PUT':
    	    case 'PATCH':
    	        {
    	            return [
    	                'email' => 'required|email|max:255|unique:users,email,'. Auth::user()->id,
                        'password' => 'required|min:6|confirmed',
    	            ];    	        	
    	        }
    	    default: break;
    	}
    }
}
