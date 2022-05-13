<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sales_order extends Model
{
   protected $fillable = [
    'invoice',
	'cid',
	'product_code',
	'product',
	'price',
	'qty',
	'discount',
	'amount',
	'profit',
    ];
}



 



