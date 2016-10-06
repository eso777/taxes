<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Ads extends Model {

     protected $table = 'ads';
     protected $fillable = ['image', 'link','code_ads'];

}
