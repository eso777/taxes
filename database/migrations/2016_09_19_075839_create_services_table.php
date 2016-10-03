<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('services', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title_ar') ;
			$table->string('title_en') ;
			$table->text('content_ar') ;
			$table->text('content_en') ;
			$table->string('img') ;
			/* SEO Fields */
			$table->string('slug_ar');
			$table->string('slug_en');
			$table->text('meta_desc_ar');
			$table->text('meta_desc_en');
			$table->text('tags_ar');
			$table->text('tags_en');

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
		Schema::drop('services');
	}

}
