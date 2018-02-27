<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToRencontreTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('rencontre', function(Blueprint $table)
		{
			$table->foreign('ville_id', 'rencontre_ibfk_1')->references('id')->on('ville')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('accueilli_id', 'rencontre_ibfk_2')->references('id')->on('utilisateur')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('acceuillant_id', 'rencontre_ibfk_3')->references('id')->on('utilisateur')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('rencontre', function(Blueprint $table)
		{
			$table->dropForeign('rencontre_ibfk_1');
			$table->dropForeign('rencontre_ibfk_2');
			$table->dropForeign('rencontre_ibfk_3');
		});
	}

}
