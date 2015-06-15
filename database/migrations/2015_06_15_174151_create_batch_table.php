<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBatchTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('batches', function(Blueprint $table)
		{
			$table->increments('batchId');

			$table->integer('user')->unsigned();
			$table->foreign('user')->references('id')->on('users');

			$table->integer('template')->unsigned();
			$table->foreign('template')->references('templateId')->on('templates')->onDelete('cascade');

			$table->string('subject');
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
		Schema::drop('batches');
	}

}
