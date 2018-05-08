<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'dokupayments';
    protected $fillable = [
        'id', 
        'invoice_number',
        'amount',
        'lap_id',
        'customer_id',
        'customer_name',
        'customer_email',
        'customer_phone',
        'customer_address',
        'payment_date',
        'payment_desc',
        'payment_status',
        'payment_channel',
        'payment_approval_code',
        'payment_session_id'
    ];

}
