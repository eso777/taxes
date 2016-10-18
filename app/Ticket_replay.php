<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket_replay extends Model {

    protected $table    = 'ticket_replays';
    protected $fillable = ["content", "attach", "sender", "ticket_id", "status"] ;

    function tickets()
    {
        return $this->hasMany('App\Ticket');
    }

}
