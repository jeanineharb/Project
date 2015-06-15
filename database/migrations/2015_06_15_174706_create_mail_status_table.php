<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMailStatusTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mail_status', function(Blueprint $table)
		{
			$table->increments('mailId');

			$table->integer('batch')->unsigned();
			$table->foreign('batch')->references('batchId')->on('batches')->onDelete('cascade');

			$table->string('recipientEmail');
			$table->boolean('isSent');
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
		Schema::drop('mail_status');
	}

}
