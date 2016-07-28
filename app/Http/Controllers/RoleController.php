<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\RoleRequest;

class RoleController extends Controller
{
	/**
	 * Create role consisting of permissions.
	 * 
	 * @return view
	 */
    public function create() 
    {
    	$permissions = \App\Permission::all();

    	return View('role.create')->with('permissions', $permissions);
    }

    /**
     * Deletes role specified in DELETE request.
     * 
     * @param  int  $id
     * @param  Request $request
     * @return redirect
     */
    public function destroy($id, Request $request) 
    {
    	$role = \App\Role::findOrFail($id);
    	$role->delete();

    	Session()->flash('flash_message', 'Role successfully deleted!');

    	return redirect()->route('role.index');
    }

    /**
     * Shows edit role view including associated roles.
     * 
     * @param  int  $id
     * @param  Request $request
     * @return view
     */
    public function edit($id, Request $request) 
    {
    	$role = \App\Role::findOrFail($id);
    	$permissions = \App\Permission::all();

    	return view('role.edit')->with('role', $role)->with('permissions', $permissions)->with('checkedPermissions', $role->permissions);
    }

    /**
     * Lists roles.
     * 
     * @return view
     */
    public function index()
    {
    	$roles = \App\Role::Latest()->paginate();
    	return view('role.index')->with('roles', $roles);
    }

    /**
     * Save the role and permissions.
     * 
     * @param  RoleRequest $request
     * @return redirect
     */
    public function store(RoleRequest $request) 
    {
    	$role = \App\Role::create($request->all());

    	// Add checked permissions
    	$role->permissions()->attach($request->input('permissions'));
    	
    	Session()->flash('flash_message', 'Role successfully created!');

    	return redirect()->route('role.index');
    }

    /**
     * Save the updated info for the role.
     * 
     * @param  int      	$id
     * @param  RoleRequest 	$request
     * @return redirect
     */
    public function update($id, RoleRequest $request) 
    {
    	$role = \App\Role::findOrFail($id);
    	$role->update($request->all());

    	// Only checked permissions are left for the role
    	$role->permissions()->sync($request->input('permissions'));

    	Session()->flash('flash_message', 'Role successfully updated!');

    	return redirect()->route('role.index');
    }
}
