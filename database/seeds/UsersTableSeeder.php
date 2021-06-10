<?php

use Illuminate\Database\Seeder;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = \App\User::create([
            'first_name'     => 'EvalFlow',
	    'last_name'     => 'EvalFlow',
            'email'    => 'EvalFlow@admin.com',
            'active'    => 1,  		
            'password' => bcrypt('admin'),
        ]);
	
	$admin->roles()->attach(Role::where('name', 'ROLE_ADMIN')->first());
    }
}
