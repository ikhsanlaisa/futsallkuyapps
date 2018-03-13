<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    protected $table = 'transaksis';
    protected $fillable = array('booking_id', 'bukti_tf', 'status_tf');

    public function booking(){
        return $this->belongsTo('App\tb_booking', 'booking_id');
    }

}
