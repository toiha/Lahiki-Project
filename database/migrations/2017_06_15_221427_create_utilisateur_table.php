<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUtilisateurTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('utilisateur', function(Blueprint $table)
		{
			$table->bigInteger('id', true);
			$table->bigInteger('ville_id')->nullable()->index('ville_id');
			$table->bigInteger('universite_id')->nullable()->index('universite_id');
			$table->bigInteger('lycee_id')->nullable()->index('lycee_id');
			$table->string('nom')->nullable();
			$table->string('prenom')->nullable();
			$table->string('email')->nullable();
			$table->string('login')->nullable();
			$table->string('password')->nullable();
			$table->string('name')->nullable();
			$table->string('remember_token')->nullable();
			$table->string('avatar')->nullable();
			$table->string('adresse')->nullable();
			$table->string('tel_fixe', 15)->nullable();
			$table->string('tel_portable', 15)->nullable();
			$table->boolean('is_administrateur')->nullable();
			$table->boolean('is_accueilleur')->nullable();
			$table->string('apropos')->nullable();
			$table->bigInteger('nb_vues')->nullable();
			$table->string('etat')->nullable();

		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('utilisateur');
	}

}
