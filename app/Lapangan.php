<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lapangan extends Model
{
    protected $table = 'Lapangans';
    protected $fillable = array(
    	'id',
    	'store_id',
    	'name', 
    	'description', 
    	'address', 
    	'latlon', 
    	'price',  
        'pricetype',  
        'houropen',  
    	'hourclose',  
    	'displayphoto'
    );

    public function user(){
        return $this->belongsTo('App\User', 'store_id');
    }

    public function booking(){
        return $this->hasMany('App\Booking', 'lap_id');
    }
}
