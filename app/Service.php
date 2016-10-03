<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model {

	protected $table    = 'services' ;
	protected $fillable = ['title_ar', 'title_en', 'content_ar', 
	'content_en', 'img','slug_ar', 'slug_en', 'meta_desc_ar', 
						'meta_desc_en', 'tags_ar', 'tags_en'] ;

}
