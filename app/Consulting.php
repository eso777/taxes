<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Consulting extends Model {

     protected $table    = 'consultings' ;
     protected $fillable = ['title_ar', 'title_en', 'content_ar', 
	'content_en','slug_ar', 'slug_en', 'meta_desc_ar', 
						'meta_desc_en', 'tags_ar', 'tags_en'] ;
     
}
