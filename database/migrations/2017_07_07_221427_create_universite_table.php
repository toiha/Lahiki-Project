<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUniversiteTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('universite', function(Blueprint $table)
		{
			$table->bigInteger('id', true);
			$table->string('nom', 100)->nullable();
			$table->string('gps_x', 100)->nullable();
			$table->string('gps_y', 100)->nullable();
			$table->string('cp', 100)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('universite');
	}

}



