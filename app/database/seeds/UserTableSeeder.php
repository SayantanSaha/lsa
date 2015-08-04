<?php

class UserTableSeeder extends Seeder
{

	public function run()
	{
		//DB::table('users')->delete();
		User::create(array(
			'name'     => 'DC',
			
			'email'    => 'dc-ngn@nic.in',
			'password' => Hash::make('password'),
			'role' => '2',
			'dist_id'=>1,
			'circle_id'=>1,
			'designation' =>'DC',
			'office' =>'Office of DC'
		));
	}

}
