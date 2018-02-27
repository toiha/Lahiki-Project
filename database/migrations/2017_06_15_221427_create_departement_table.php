<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDepartementTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('departement', function(Blueprint $table)
		{
			$table->bigInteger('id', true);
			$table->bigInteger('pays_id')->nullable()->index('pays_id');
			$table->string('nom', 100)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('departement');
	}

}
