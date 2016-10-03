<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Msg extends Model {

	protected $table    = 'msgs' ;
	protected $fillable = ['admin_id', 'user_id', 'msg', 'sender','status'] ;

}
