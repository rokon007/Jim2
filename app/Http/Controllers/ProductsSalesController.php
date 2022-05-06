<?php

namespace App\Http\Controllers;

use App\Models\CustomerInfo;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsSalesController extends Controller
{
    public function create($id)
    {
        $customer = CustomerInfo::find($id);
        $products = Product::all();
        return view('sales_product.product_sales',compact('customer','products'));
    }

    public function store()
    {
       
    }
}
