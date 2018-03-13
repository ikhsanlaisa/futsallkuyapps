<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tb_booking extends Model
{
    protected $table = 'tb_bookings';
    protected $fillable = array('id', 'lap_id', 'customer_id', 'hari', 'jadwal_id', 'total_cost', 'due_date');

    public function lapangan(){
        return $this->belongsTo('App\tb_lapangan', 'lap_id');
    }

    public function customer(){
        return $this->belongsTo('App\User', 'justomer_id');
    }

    public function jadwal(){
        return $this->belongsTo('App\tb_jadwal', 'jadwal_id');
    }

    public function transaksi(){
        return$this->hasMany('App\transaksi', 'booking_id');
    }
}
