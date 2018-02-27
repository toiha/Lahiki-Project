<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRencontreTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('rencontre', function(Blueprint $table)
		{
			$table->bigInteger('id', true);
			$table->dateTime('date_creation')->nullable();
			$table->dateTime('date_rencontre')->nullable();
			$table->string('lieu_rencontre')->nullable();
			$table->bigInteger('ville_id')->nullable()->index('ville_id');
			$table->bigInteger('accueilli_id')->nullable()->index('accueilli_id');
			$table->bigInteger('acceuillant_id')->nullable()->index('acceuillant_id');
			$table->string('gps_x', 100)->nullable();
			$table->string('gps_y', 100)->nullable();
			$table->text('commentaire')->nullable();
			$table->boolean('is_accueilli')->nullable();
			$table->integer('note')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('rencontre');
	}

}
