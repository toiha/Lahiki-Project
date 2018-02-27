<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateActualiteTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('actualite', function(Blueprint $table)
		{
			$table->bigInteger('id', true);
			$table->string('titre')->nullable();
			$table->text('resume')->nullable();
			$table->text('contenu')->nullable();
			$table->dateTime('date_creation')->nullable();
			$table->integer('date_publication')->nullable();
			$table->dateTime('date_expiration')->nullable();
			$table->boolean('is_accueil')->nullable();
			$table->bigInteger('media_id')->nullable()->index('media_id');
			$table->bigInteger('utilisateur_id')->nullable()->index('utilisateur_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('actualite');
	}

}
