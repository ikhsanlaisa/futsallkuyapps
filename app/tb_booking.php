<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tb_booking extends Model
{
    protected $table = 'tb_bookings';
    protected $fillable = array('id', 'lap_id', 'customer_id', 'jadwal_book', 'cost_perhour', 'total_cost', 'player_model', 'status');

    public function lapangan(){
        return $this->belongsTo('App\tb_lapangan', 'lap_id');
    }

    public function customer(){
        return $this->belongsTo('App\User', 'justomer_id');
    }
}
