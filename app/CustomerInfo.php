<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class CustomerInfo extends Model
{
   
    protected $fillable=[
        'id',
        'shop_name',
        'customer_name',
        'customer_adderss',
        'customer_phone',
        'image',
        'total_amount',
        'total_paid',
        'total_deu',
        'created_by',
    ];
}
