<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToUtilisateurTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('utilisateur', function(Blueprint $table)
		{
			$table->foreign('ville_id', 'utilisateur_ibfk_1')->references('id')->on('ville')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('universite_id', 'utilisateur_ibfk_2')->references('id')->on('universite')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('lycee_id', 'utilisateur_ibfk_3')->references('id')->on('lycee')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('utilisateur', function(Blueprint $table)
		{
			$table->dropForeign('utilisateur_ibfk_1');
			$table->dropForeign('utilisateur_ibfk_2');
		});
	}

}
