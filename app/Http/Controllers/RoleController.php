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
        $this->authorize('create_role', \App\Role::class);
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
        
        $this->authorize('delete_role', $role);

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

        $this->authorize('edit_role', $role);

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
        $this->authorize('list_roles', \App\Role::class);
    	$roles = \App\Role::Latest()->paginate();
    	return view('role.index')->with('roles', $roles);
    }

    /**
     * Show role with specified ID.
     * 
     * @param  int $id
     * @return view
     */
    public function show($id)
    {
        $role = \App\Role::findOrFail($id);

        $this->authorize('show_role', $role);

        return View('role.show')->with('role', $role);
    }

    /**
     * Save the role and permissions.
     * 
     * @param  RoleRequest $request
     * @return redirect
     */
    public function store(RoleRequest $request) 
    {
        $this->authorize('create_role', \App\Role::class);
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
        
        $this->authorize('edit_role', $role);

    	$role->update($request->all());

    	// Only checked permissions are left for the role
    	$role->permissions()->sync($request->input('permissions'));

    	Session()->flash('flash_message', 'Role successfully updated!');

    	return redirect()->route('role.index');
    }
}
