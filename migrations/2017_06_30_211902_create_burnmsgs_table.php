<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBurnmsgsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('burnmsgs', function(Blueprint $table) {
			$table->increments('id');
			$table->binary('body')->nullable();
			$table->string('url');
			$table->boolean('destroyed')->default(false);
			$table->binary('iv');
			$table->text('key');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('burnmsgs');
	}

}
