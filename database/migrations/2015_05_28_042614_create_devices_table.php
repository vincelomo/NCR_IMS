<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDevicesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('devices', function(Blueprint $table)
		{
			$table->increments('id');

			$table->integer('owner_id')->unsigned();
			$table->foreign('owner_id')->references('id')->on('users');

			$table->integer('borrower_id')->unsigned()->nullable()->default(NULL);
			$table->foreign('borrower_id')->references('id')->on('users');

			$table->boolean('is_borrowed');
			$table->string('code')->unique();
			$table->string('type');
			$table->string('description');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('devices');
	}

}
