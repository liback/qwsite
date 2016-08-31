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
Route::get('role',									['as' => 'role.index', 	'uses' => 'RoleController@index']);
Route::get('role/create',							['as' => 'role.create', 'uses' => 'RoleController@create']);
Route::get('role/{id}',								['as' => 'role.show', 	'uses' => 'RoleController@show']);
Route::get('role/{id}/edit',						['as' => 'role.edit', 	'uses' => 'RoleController@edit']);
Route::post('role',									['as' => 'role.store', 	'uses' => 'RoleController@store']);
Route::match(array('PUT','PATCH'), 'role/{id}',		['as' => 'role.update', 'uses' => 'RoleController@update']);
Route::delete('role/{id}',							['as' => 'role.destroy','uses' => 'RoleController@destroy']);

// User routes
Route::get('user',											['as' => 'user.index', 	'uses' => 'UserController@index']);
Route::get('user/editprofile',								['as' => 'user.editprofile', 	'uses' => 'UserController@editprofile']);
Route::get('user/create',									['as' => 'user.create', 'uses' => 'UserController@create']);
Route::get('user/{id}',										['as' => 'user.show', 	'uses' => 'UserController@show']);	
Route::post('user',											['as' => 'user.store', 	'uses' => 'UserController@store']);
Route::get('user/{id}/edit',								['as' => 'user.edit', 	'uses' => 'UserController@edit']);
Route::match(array('PUT','PATCH'), 'user/updateprofile',	['as' => 'role.updateprofile', 'uses' => 'UserController@updateprofile']);
Route::match(array('PUT','PATCH'), 'user/{id}',				['as' => 'role.update', 'uses' => 'UserController@update']);
Route::delete('user/{id}',									['as' => 'user.destroy','uses' => 'UserController@destroy']);

// Map routes
Route::get('map',									['as' => 'map.index', 	'uses' => 'MapController@index']);
Route::get('map/{id}',								['as' => 'map.show', 	'uses' => 'MapController@show']);
Route::get('map/{id}/edit',							['as' => 'map.edit', 	'uses' => 'MapController@edit']);
Route::match(array('PUT','PATCH'), 'map/{id}',		['as' => 'map.update', 	'uses' => 'MapController@update']);
Route::delete('map/{id}',							['as' => 'map.destroy',	'uses' => 'MapController@destroy']);

// Image resize
Route::get('/assets/{img}/{h?}/{w?}', function($img, $h=200, $w=200) {
	return \Image::make(asset($img))->resize($h, $w)->response('jpg');
})->where('img','(.*(?:%2F:)?.*.jpg)');