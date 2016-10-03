<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('news', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('news_title_ar') ;
			$table->string('news_title_en') ;
			$table->text('news_content_ar') ;
			$table->text('news_content_en') ;
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
		Schema::drop('news');
	}

}
