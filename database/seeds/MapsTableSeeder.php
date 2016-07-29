<?php

use Illuminate\Database\Seeder;

class MapsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$filename = public_path() .'/map_entities.csv';
    	$delimiter = '|';

    	if (($handle = fopen($filename, 'r')) !== FALSE) {
    		while (($data = fgetcsv($handle, 1000, '|')) !== FALSE) {

    			App\Map::create([
    				'name' 			=> $data[0],
    				'description' 	=> $data[1],
    				'num_ssg'		=> $data[2],
    				'num_ng'		=> $data[3],
    				'num_sng'		=> $data[4],
    				'num_gl'		=> $data[5],
    				'num_rl'		=> $data[6],
    				'num_lg'		=> $data[7],
    				'num_shells_small'	=> $data[8],
    				'num_shells_big'	=> $data[9],
    				'num_nails_small'	=> $data[10],
    				'num_nails_big'		=> $data[11],
    				'num_cells_small'	=> $data[12],
    				'num_cells_big'		=> $data[13],
    				'num_rockets_small'	=> $data[14],
    				'num_rockets_big'	=> $data[15],
    				'num_health_small'	=> $data[16],
    				'num_health_big'	=> $data[17],
    				'num_mega_health'	=> $data[18],
    				'num_ga'			=> $data[19],
    				'num_ya'			=> $data[20],
    				'num_ra'			=> $data[21],
    				'num_quad'			=> $data[22],
    				'num_ring'			=> $data[23],
    				'num_pent'			=> $data[24],
    				'num_env_suit'		=> $data[25],
    				'num_spawns'		=> $data[26],
    				'num_teleports'		=> $data[27],
    				'num_secrets'		=> $data[28]
    				]);
    		}
    		fclose($handle);
    	}
    }
}
