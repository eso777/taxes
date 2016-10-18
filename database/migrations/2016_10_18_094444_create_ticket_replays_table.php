<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketReplaysTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ticket_replays', function(Blueprint $table)
		{
			$table->increments('id');
			$table->text('content');
			$table->text('attach');
			$table->integer('sender'); // 0 => admin | 1 => user
			$table->integer('ticket_id')->unsigned();
			$table->integer('status');
			$table->timestamps();

            $table->foreign('ticket_id')
                ->references('id')->on('tickets')->onDelete('cascade');


		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ticket_replays');
	}

}
