<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCommentaireTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('commentaire', function(Blueprint $table)
		{
			$table->foreign('utilisateur_id', 'commentaire_ibfk_1')->references('id')->on('utilisateur')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('actualite_id', 'commentaire_ibfk_2')->references('id')->on('actualite')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('commentaire', function(Blueprint $table)
		{
			$table->dropForeign('commentaire_ibfk_1');
			$table->dropForeign('commentaire_ibfk_2');
		});
	}

}
