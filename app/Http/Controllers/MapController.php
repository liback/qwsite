<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\MapRequest;

class MapController extends Controller
{

    /**
     * Shows edit map view including.
     * 
     * @param  int  $id
     * @param  Request $request
     * @return view
     */
    public function edit($id, Request $request) 
    {
    	$map = \App\Map::findOrFail($id);

    	return view('map.edit')->with('map', $map);
    }

	/**
	 * Shows a list of all maps.
	 * 
	 * @return view
	 */
    public function index() {
    	$maps = \App\Map::Latest()->paginate();
    	return view('map.index')->with('maps', $maps);
    }

    /**
     * Deletes map specified in DELETE request.
     * 
     * @param  int  $id
     * @param  Request $request
     * @return redirect
     */
    public function destroy($id, Request $request) 
    {
    	$map = \App\Map::findOrFail($id);
    	$map->delete();

    	Session()->flash('flash_message', 'Map successfully deleted!');

    	return redirect()->route('map.index');
    }

	/**
	 * Shows a map with specified ID.
	 * 
	 * @param  int $id
	 * @return view
	 */
	public function show($id)
	{
		$map = \App\Map::findOrFail($id);

		return View('map.show')->with('map', $map);
	}

    /**
     * Save the updated info for the map.
     * 
     * @param  int      	$id
     * @param  MapRequest 	$request
     * @return redirect
     */
    public function update($id, MapRequest $request) 
    {
    	$map = \App\Map::findOrFail($id);
    	$map->update($request->all());

    	Session()->flash('flash_message', 'Map successfully updated!');

    	return redirect()->route('map.index');
    }	
}
