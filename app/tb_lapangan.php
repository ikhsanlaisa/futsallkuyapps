<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tb_lapangan extends Model
{
    protected $table = 'tb_lapangans';
    protected $fillable = array('name', 'price', 'foto',  'store_id');

    public function jadwal(){
        return $this->hasMany('App\tb_jadwal', 'lapangan_id');
    }

    public function user(){
        return $this->belongsTo('App\User', 'store_id');
    }
}
