<?php

use Illuminate\Database\Seeder;

class ScreenshotsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$filename = public_path() .'/map_screenshots.csv';
    	$delimiter = '|';
        $row = 0;
    	if (($handle = fopen($filename, 'r')) !== FALSE) {
    		while (($data = fgetcsv($handle, 1000, '|')) !== FALSE) {
                if ($row++ == 0)
                    continue;

    			App\Screenshot::create([
    				'path'  => $data[0],
    				'map'   => $data[1],
                    'type'  => $data[2]
    				]);
    		}
    		fclose($handle);
    	}
    }
}
