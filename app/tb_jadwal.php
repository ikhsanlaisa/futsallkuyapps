<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tb_jadwal extends Model
{
    protected $table = 'tb_jadwals';
    protected $fillable = array('lapangan_id', 'jadwal_lapangan', 'status');

    public function lapangan(){
        return $this->belongsTo('App\tb_lapangan', 'lapangan_id');
    }

    public function booking(){
        return $this->hasMany('App\tb_booking', 'jadwal_id');
    }
}
