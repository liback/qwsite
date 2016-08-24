<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

// Role routes
Route::get('role',									['as' => 'role.index', 	'uses' => 'RoleController@index',	'middleware' => 'permission:list_roles']);
Route::get('role/create',							['as' => 'role.create', 'uses' => 'RoleController@create', 	'middleware' => 'permission:create_role']);
Route::get('role/{id}',								['as' => 'role.show', 	'uses' => 'RoleController@show',	'middleware' => 'permission:show_role']);
Route::get('role/{id}/edit',						['as' => 'role.edit', 	'uses' => 'RoleController@edit', 	'middleware' => 'permission:edit_role']);
Route::post('role',									['as' => 'role.store', 	'uses' => 'RoleController@store',   'middleware' => 'permission:create_role']);
Route::match(array('PUT','PATCH'), 'role/{id}',		['as' => 'role.update', 'uses' => 'RoleController@update',  'middleware' => 'permission:edit_role']);
Route::delete('role/{id}',							['as' => 'role.destroy','uses' => 'RoleController@destroy', 'middleware' => 'permission:delete_role']);

// User routes
Route::get('user',									['as' => 'user.index', 	'uses' => 'UserController@index', 	'middleware' => 'permission:list_users']);
Route::get('user/create',							['as' => 'user.create', 'uses' => 'UserController@create', 	'middleware' => 'permission:create_user']);
Route::get('user/{id}',								['as' => 'user.show', 	'uses' => 'UserController@show', 	'middleware' => 'permission:show_user']);	
Route::post('user',									['as' => 'user.store', 	'uses' => 'UserController@store', 	'middleware' => 'permission:create_user']);
Route::get('user/{id}/edit',						['as' => 'user.edit', 	'uses' => 'UserController@edit', 	'middleware' => 'permission:edit_user']);
Route::match(array('PUT','PATCH'), 'user/{id}',		['as' => 'role.update', 'uses' => 'UserController@update',  'middleware' => 'permission:edit_user']);
Route::delete('user/{id}',							['as' => 'user.destroy','uses' => 'UserController@destroy', 'middleware' => 'permission:delete_user']);

// Map routes
Route::get('map',									['as' => 'map.index', 	'uses' => 'MapController@index']);
Route::get('map/{id}',								['as' => 'map.show', 	'uses' => 'MapController@show']);
Route::get('map/{id}/edit',							['as' => 'map.edit', 	'uses' => 'MapController@edit',   	'middleware' => 'permission:edit_map']);
Route::match(array('PUT','PATCH'), 'map/{id}',		['as' => 'map.update', 	'uses' => 'MapController@update',  	'middleware' => 'permission:edit_map']);
Route::delete('map/{id}',							['as' => 'map.destroy',	'uses' => 'MapController@destroy', 	'middleware' => 'permission:delete_map']);
