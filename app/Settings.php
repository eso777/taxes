<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model {

	protected $table = 'settings';
	protected $fillable = ['site_name_ar', 'site_name_en','site_desc_ar','site_desc_en',
	'site_tags_ar','site_tags_en',
	'facebook','twitter',
	'google_Plus','youtube', 'linkedIn','address','site_status','email','email_2','phone','phone_2'];
}
