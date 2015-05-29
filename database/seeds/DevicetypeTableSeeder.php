<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\DeviceType;

class DevicetypeTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('device_types')->delete();

		DeviceType::create([
			'name' 		=> 'Device type 1',
		]);

		DeviceType::create([
			'name' 		=> 'Device type 2',
		]);

		DeviceType::create([
			'name' 		=> 'Device type 3',
		]);
	}

}