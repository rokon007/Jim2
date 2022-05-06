<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
	protected $fillable=[
        'id',
        'product_code',
        'product_name',
        'product_price',
        'product_quantity',
        'status',
        'created_by'
    ];
}
