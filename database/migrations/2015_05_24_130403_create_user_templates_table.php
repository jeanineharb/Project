<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTemplatesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_templates', function(Blueprint $table)
		{
		// $table->increments('id');
		$table->integer('user')->unsigned();
		$table->foreign('user')->references('id')->on('users');

		$table->integer('template')->unsigned();
		$table->foreign('template')->references('templateId')->on('templates')->onDelete('cascade');

		$table->timestamps();
		});

		Schema::table('user_templates', function($table)
		{
		   $table->primary(array('user', 'template'));
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user_templates');
	}

}
