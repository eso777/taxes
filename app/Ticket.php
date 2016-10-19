<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model {

	protected $table = 'tickets';
	protected $fillable = ['name', 'user_id', 'status', 'ip_user'] ; // Status 1 => open | 0 => close

    public function getUsers()
    {
        return $this->belongsTo('App\User');
    }

}
