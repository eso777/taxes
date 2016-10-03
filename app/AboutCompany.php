<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class AboutCompany extends Model {

     protected $table = 'about_company';
     protected $fillable = ['Content_ar', 'Content_en', 'imgs'] ;

}
