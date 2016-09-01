<?php

namespace App\Http\Controllers;

use Input;
use File;
use App\MapFilters;
use App\Http\Requests;
use Illuminate\Http\Request;
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

        $this->authorize('edit_map', $map);

    	return view('map.edit')->with('map', $map);
    }

	/**
	 * Shows a list of all maps.
	 * 
	 * @return view
	 */
    public function index(MapFilters $filters) {
        //$this->authorize('list_maps', \App\Map::class);
    	$maps = \App\Map::filter($filters)->paginate();
        $mods = \App\Map::select('mod')->distinct()->lists('mod', 'mod');
        $mods["all"] = '-- All --';

    	return view('map.index')->with('maps', $maps)->with('mods', $mods->sort());
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
        
        $this->authorize('delete_map', $map);

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

        //$this->authorize('show_map', $map);

        $path = config('app.screenshot_dir') . $map->name;
        $screenshots = array(); 

        if (File_Exists($path))
            $screenshots = File::allFiles($path);

        //Previous map ID
        $prevMap = \App\Map::where('id', '<', $map->id)->max('id');

        //Next map ID
        $nextMap = \App\Map::where('id', '>', $map->id)->min('id');

		return View('map.show')->with('map', $map)->with('screenshots', $screenshots)->with('prevMap', $prevMap)->with('nextMap', $nextMap);
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
        
        $this->authorize('edit_map', $map);

    	$map->update($request->all());

    	Session()->flash('flash_message', 'Map successfully updated!');

    	return redirect()->route('map.index');
    }	
}
