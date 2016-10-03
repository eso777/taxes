<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model {

	protected $table    = 'news';
	protected $fillable = ['news_title_ar', 
	'news_title_en', 
	'news_content_ar','news_content_en','img','slug_ar','slug_en','meta_desc_ar','meta_desc_en','tags_ar','tags_en'];

}
