<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
	/**
	 * Show create user form with available roles.
	 * 
	 * @return view
	 */
	public function create()
	{
		$roles = \App\Role::all();

		return View('user.create')->with('roles', $roles);
	}

	/**
	 * Delete specified user from a DELETE request.
	 * 
	 * @param  int  $id
	 * @param  Request $request
	 * @return redirect
	 */
	public function destroy($id, Request $request) 
	{
		$user = \App\User::findOrFail($id);
		$user->delete();

		Session()->flash('flash_message', 'User successfully deleted!');

		return redirect()->route('user.index');
	}

	/**
	 * Show edit form with associated roles.
	 * 
	 * @param  int  $id
	 * @param  Request $request 
	 * @return view
	 */
	public function edit($id, Request $request) 
	{
		$user = \App\User::findOrFail($id);
		$roles = \App\Role::all();

		return View('user.edit')->with('user', $user)->with('roles', $roles)->with('checkedRoles', $user->roles);
	}

	/**
	 * Show list of users.
	 * 
	 * @return view
	 */
	public function index() 
	{
		$users = \App\User::latest()->paginate();

		return View('user.index')->with('users', $users);
	}

	/**
	 * Show user with specified ID.
	 * 
	 * @param  int $id
	 * @return view
	 */
	public function show($id)
	{
		$user = \App\User::findOrFail($id);

		return View('user.show')->with('user', $user);
	}

	/**
	 * Save a user after a STORE request.
	 * 
	 * @param  UserRequest $request
	 * @return redirect
	 */
	public function store(UserRequest $request) 
	{
		$user = \App\User::create([
								'name'		=> 	$request->input('name'),
								'email'		=>	$request->input('email'),
								'password'	=>	bcrypt($request->input('password'))
								]);

		// Add checked permissions
		$user->roles()->attach($request->input('roles'));

		Session()->flash('flash_message', 'User successfully created!');

		return redirect()->route('user.index');
	}

	/**
	 * Save user info after update.
	 * 
	 * @param  int      	$id
	 * @param  UserRequest 	$request
	 * @return redirect
	 */
	public function update($id, UserRequest $request) 
	{
		$user = \App\User::findOrFail($id);

		$data = [
			'name'	=> 	$request->input('name'),
			'email'	=>	$request->input('email')
		];

		// Only include password if we changed it,
		// otherwise it will be set blank!
		if (!empty($request->input('password'))) {
			$data['password'] = bcrypt($request->input('password'));
		}

		$user->update($data);

		// Only checked roles are left for the user
		$user->roles()->sync($request->input('roles'));
		 
		Session()->flash('flash_message', 'User successfully updated!');

		return redirect()->route('user.index');
	}
}
