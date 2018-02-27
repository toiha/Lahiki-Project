<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCommentaireTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('commentaire', function(Blueprint $table)
		{
			$table->bigInteger('id', true);
			$table->text('contenu')->nullable();
			$table->dateTime('date_creation')->nullable();
			$table->bigInteger('utilisateur_id')->nullable()->index('utilisateur_id');
			$table->bigInteger('actualite_id')->nullable()->index('actualite_id');
			$table->boolean('jaime')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('commentaire');
	}

}
