<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    //
    protected $table = 'Bookings';
    protected $fillable = array('id', 'lap_id', 'customer_id', 'jadwal', 'playermodel', 'tarif', 'tariftype', 'tariftotal','status');

    public function lapangan(){
        return $this->belongsTo('App\tb_lapangan', 'lap_id');
    }

    public function customer(){
        return $this->belongsTo('App\User', 'customer_id');
    }
}
