<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTemplateTable extends Migration{
	
	/**
	 * Run the migrations.
	 *
	 * @return void
	 *
	 */
	public function up(){
		
		Schema::create('Template', function (Blueprint $table) {
			$table->increments ('TemplateId');
			
			$table->integer('CategoryId')->unsigned();
			$table->foreign ('CategoryId')->references('CategoryId')->on('EmailCategory');
			
			$table->string('TemplateName');
			$table->boolean('IsFavorite');
			$table->boolean('IsPredefined');
			$table->longtext('Html');
			$table->timestamps();
		} );
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 *
	 */
	public function down() {
		Schema::drop('Template');
	}
}
