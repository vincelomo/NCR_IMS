<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Device;

class DeviceTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('devices')->delete();

		Device::create([
			'owner_id' 		=> 1,
			'borrower_id' 	=> NULL,
			'is_borrowed' 	=> false,
			'code' 			=> 'ncr-xxxx-0001',
			'type' 			=> 1,
			'description' 	=> 'Device 1'
		]);

		Device::create([
			'owner_id' 		=> 1,
			'borrower_id' 	=> NULL,
			'is_borrowed' 	=> false,
			'code' 			=> 'ncr-xxxx-0002',
			'type' 			=> 2,
			'description' 	=> 'Device 2'
		]);

		Device::create([
			'owner_id' 		=> 1,
			'borrower_id' 	=> NULL,
			'is_borrowed' 	=> false,
			'code' 			=> 'ncr-xxxx-0003',
			'type' 			=> 3,
			'description' 	=> 'Device 3'
		]);

		Device::create([
			'owner_id' 		=> 2,
			'borrower_id' 	=> NULL,
			'is_borrowed' 	=> false,
			'code' 			=> 'ncr-xxxx-0004',
			'type' 			=> 1,
			'description' 	=> 'Device 4'
		]);

		Device::create([
			'owner_id' 		=> 2,
			'borrower_id' 	=> NULL,
			'is_borrowed' 	=> false,
			'code' 			=> 'ncr-xxxx-0005',
			'type' 			=> 2,
			'description' 	=> 'Device 5'
		]);

		Device::create([
			'owner_id' 		=> 2,
			'borrower_id' 	=> NULL,
			'is_borrowed' 	=> false,
			'code' 			=> 'ncr-xxxx-0006',
			'type' 			=> 3,
			'description' 	=> 'Device 6'
		]);
	}

}