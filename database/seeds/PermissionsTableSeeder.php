<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Permission::create(['name' => 'edit_map']);
        App\Permission::create(['name' => 'delete_map']);
        App\Permission::create(['name' => 'list_maps']);
        App\Permission::create(['name' => 'show_map']);
        App\Permission::create(['name' => 'edit_role']);
        App\Permission::create(['name' => 'create_role']);
        App\Permission::create(['name' => 'delete_role']);
        App\Permission::create(['name' => 'list_roles']);
        App\Permission::create(['name' => 'show_role']);
        App\Permission::create(['name' => 'edit_user']);
     	App\Permission::create(['name' => 'create_user']);
        App\Permission::create(['name' => 'delete_user']);
        App\Permission::create(['name' => 'list_users']);
        App\Permission::create(['name' => 'show_user']);
        App\Permission::create(['name' => 'edit_profile']);
        
        $adminRole	= App\Role::create(['name' => 'administrator']);
        $memberRole	= App\Role::create(['name' => 'guest']);

        // The admin can do it all
        $permissions = App\Permission::all();
        $adminRole->permissions()->attach($permissions);

        // Root user
        $adminUser = App\User::create([
        		'name'		=> getenv('ADMIN_USER'),
        		'email'		=> getenv('ADMIN_EMAIL'),
        		'password'	=> bcrypt(getenv('ADMIN_PASSWORD')),
        	]);

        // Root user gets first role, i.e. administrator
       	$adminUser->roles()->attach([1]);
    }
}
