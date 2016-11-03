<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = \App\Models\User::find(1);
    	$roleAdmin = new \App\Models\Role;
		$roleAdmin->name = 'Admin';
		$roleAdmin->description = 'Full feature administrator and full permission.';
		$roleAdmin->save();
		$admin->roles()->attach($roleAdmin);

		$User = \App\Models\User::find(2);
		$roleUser = new \App\Models\Role;
		$roleUser->name = 'User';
		$roleUser->description = 'User just few feature avaiable.';
		$roleUser->save();
		$User->roles()->attach($roleUser);
    }
}
