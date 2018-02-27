<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVilleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ville', function(Blueprint $table)
		{
			$table->bigInteger('id', true);
			$table->bigInteger('departement_id')->nullable()->index('departement_id');
			$table->string('nom', 100)->nullable();
			$table->string('code_postal', 10)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ville');
	}

}
