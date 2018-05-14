<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $table = 'booking_players';
    protected $fillable = ['user_id','booking_id'];

    public function user(){
    	return $this->belongsTo('App\User', 'user_id');
    }
    public function booking(){
    	return $this->belongsTo('App\Booking', 'booking_id');
    }
}
