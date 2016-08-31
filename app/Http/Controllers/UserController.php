<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Http\Requests;
use App\Http\Requests\UserRequest;
use App\Http\Requests\ProfileRequest;

class UserController extends Controller
{
	/**
	 * Show create user form with available roles.
	 * 
	 * @return view
	 */
	public function create()
	{
		$this->authorize('create_user', \App\User::class);
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
		
		$this->authorize('delete_user', $user);

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

		$this->authorize('edit_user', $user);

		$roles = \App\Role::all();

		return View('user.edit')->with('user', $user)->with('roles', $roles)->with('checkedRoles', $user->roles);
	}

	/**
	 * Show edit profile form.
	 * 
	 * @param  int  $id
	 * @param  Request $request 
	 * @return view
	 */
	public function editprofile(ProfileRequest $request) 
	{
		$user = \App\User::findOrFail(Auth::user()->id);

		$this->authorize('edit_profile', \App\User::class);

		return View('user.editprofile')->with('user', $user);
	}

	/**
	 * Show list of users.
	 * 
	 * @return view
	 */
	public function index() 
	{
		$this->authorize('list_users', \App\User::class);
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
		$this->authorize('show_user', $user);

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
		$this->authorize('create_user', \App\User::class);

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
		$this->authorize('edit_user', $user);

		$data = [
			'name'	=> 	$request->input('name'),
			'email'	=>	$request->input('email'),
			'state'	=>	$request->input('state')
		];

		// Only include password if we changed it,
		// otherwise it will be set blank!
		if (!empty($request->input('password'))) {
			$data['password'] = bcrypt($request->input('password'));
		}

		$user->update($data);
		
		
		if ($request->input('roles') == NULL) {
			// If no roles are checked then we detach all
			$user->roles()->detach();
		} else {
			// If there are roles left then sync
			$user->roles()->sync($request->input('roles'));
		}

		Session()->flash('flash_message', 'User successfully updated!');

		return redirect()->route('user.index');
	}

	/**
	 * Save user profile info after update.
	 * 
	 * @param  Request 	$request
	 * @return redirect
	 */
	public function updateprofile(ProfileRequest $request) 
	{
		$user = \App\User::findOrFail(Auth::user()->id);
		$this->authorize('edit_profile', $user);

		$data = [
			'email'	=>	$request->input('email'),
		];

		// Only include password if we changed it,
		// otherwise it will be set blank!
		if (!empty($request->input('password'))) {
			$data['password'] = bcrypt($request->input('password'));
		}

		$user->update($data);

		Session()->flash('flash_message', 'Profile successfully updated!');

		return redirect()->route('user.index');
	}	
}
