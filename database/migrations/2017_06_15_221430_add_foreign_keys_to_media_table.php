<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToMediaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('media', function(Blueprint $table)
		{
			$table->foreign('utilisateur_id', 'media_ibfk_1')->references('id')->on('utilisateur')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('media', function(Blueprint $table)
		{
			$table->dropForeign('media_ibfk_1');
		});
	}

}
