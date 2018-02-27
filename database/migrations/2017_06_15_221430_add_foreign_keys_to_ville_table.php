<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToVilleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('ville', function(Blueprint $table)
		{
			$table->foreign('departement_id', 'ville_ibfk_1')->references('id')->on('departement')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('ville', function(Blueprint $table)
		{
			$table->dropForeign('ville_ibfk_1');
		});
	}

}
