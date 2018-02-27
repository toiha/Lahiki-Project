<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateConnexionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('connexion', function(Blueprint $table)
		{
			$table->bigInteger('id', true);
			$table->timestamp('date_connexion')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->string('ip_connexion', 100);
			$table->bigInteger('utilisateur_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('connexion');
	}

}
