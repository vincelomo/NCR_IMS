<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\User;

class UserTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('users')->delete();

		User::create([
			'name' 		=> 'IMS Administrator',
			'email' 	=> 'vl185028@ncr.com',
			'password' 	=> Hash::make('password123'),
			'isadmin'	=> true
		]);

		User::create([
			'name' 		=> 'Vincent Mark Lomocso',
			'email' 	=> 'vm.lomocso@gmail.com',
			'password' 	=> Hash::make('password123'),
			'isadmin'	=> true
		]);
	}

}