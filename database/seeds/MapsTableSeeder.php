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
        $row = 0;
    	if (($handle = fopen($filename, 'r')) !== FALSE) {
    		while (($data = fgetcsv($handle, 1000, '|')) !== FALSE) {
                if ($row++ == 0)
                    continue;

    			App\Map::create([
    				'name' 			=> $data[0],
    				'description' 	=> $data[1],
                    'mod'           => $data[2],
    				'num_ssg'		=> $data[3],
    				'num_ng'		=> $data[4],
    				'num_sng'		=> $data[5],
    				'num_gl'		=> $data[6],
    				'num_rl'		=> $data[7],
    				'num_lg'		=> $data[8],
    				'num_shells_small'	=> $data[9],
    				'num_shells_big'	=> $data[10],
    				'num_nails_small'	=> $data[11],
    				'num_nails_big'		=> $data[12],
    				'num_cells_small'	=> $data[13],
    				'num_cells_big'		=> $data[14],
    				'num_rockets_small'	=> $data[15],
    				'num_rockets_big'	=> $data[16],
    				'num_health_small'	=> $data[17],
    				'num_health_big'	=> $data[18],
    				'num_mega_health'	=> $data[19],
    				'num_ga'			=> $data[20],
    				'num_ya'			=> $data[21],
    				'num_ra'			=> $data[22],
    				'num_quad'			=> $data[23],
    				'num_ring'			=> $data[24],
    				'num_pent'			=> $data[25],
    				'num_env_suit'		=> $data[26],
    				'num_spawns'		=> $data[27],
    				'num_teleports'		=> $data[28],
    				'num_secrets'		=> $data[29],
                    'num_secret_doors'  => $data[30]
    				]);
    		}
    		fclose($handle);
    	}
    }
}
