<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToActualiteTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('actualite', function(Blueprint $table)
		{
			$table->foreign('media_id', 'actualite_ibfk_1')->references('id')->on('media')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('utilisateur_id', 'actualite_ibfk_2')->references('id')->on('utilisateur')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('actualite', function(Blueprint $table)
		{
			$table->dropForeign('actualite_ibfk_1');
			$table->dropForeign('actualite_ibfk_2');
		});
	}

}
