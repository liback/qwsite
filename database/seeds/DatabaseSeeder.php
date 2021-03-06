<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$this->call(PermissionsTableSeeder::class);
    	$this->call(MapsTableSeeder::class);
        $this->call(ScreenshotsTableSeeder::class);
    }
}
