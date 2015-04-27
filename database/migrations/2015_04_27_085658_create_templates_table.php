<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTemplatesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('templates', function(Blueprint $table)
		{
			$table->increments ('templateId');
			
			$table->integer('category')->unsigned();
			$table->foreign ('category')->references('categoryId')->on('email_categories');
			
			$table->string('templateName');
			$table->boolean('isFavorite');
			$table->boolean('isPredefined');
			$table->longtext('html');
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
		Schema::drop('templates');
	}

}
