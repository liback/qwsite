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
        App\Permission::create(['name' => 'edit_role']);
        App\Permission::create(['name' => 'create_role']);
        App\Permission::create(['name' => 'delete_role']);
        App\Permission::create(['name' => 'edit_user']);
     	App\Permission::create(['name' => 'create_user']);
        App\Permission::create(['name' => 'delete_user']);
        
        $adminRole	= App\Role::create(['name' => 'administrator']);
        $memberRole	= App\Role::create(['name' => 'guest']);

        // The admin can do it all
        $permissions = App\Permission::all();
        $adminRole->permissions()->attach($permissions);

        // Root user
        $adminUser = App\User::create([
        		'name'		=> Config('app.admin_name'),
        		'email'		=> Config('app.admin_email'),
        		'password'	=> bcrypt(Config('app.admin_password')),
        	]);

        // Root user gets first role, i.e. administrator
       	$adminUser->roles()->attach([1]);
    }
}
