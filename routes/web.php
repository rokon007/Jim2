<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\CustomerController;
//use App\Http\Controllers\admin\CartController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\ProductsSalesController;
use App\Http\Controllers\CartController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
Route::get('/dashboard',[DashboardController::class,'index']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
 //All Customer Start
     Route::get('admin/customers',[CustomerController::class, 'create']);
     Route::post('admin/add_customer',[CustomerController::class, 'store']);
     Route::get('admin/all_customer',[CustomerController::class, 'index']);
     Route::get('admin/edit_customer/{customer}',[CustomerController::class, 'edit']);
     Route::put('admin/update_customer/{customer}',[CustomerController::class, 'update']);
 
      //All Customer End

       //All products Start
    Route::get('admin/products',[ProductsController::class, 'create']);
    Route::post('admin/products',[ProductsController::class, 'store']);
    Route::get('admin/all_products',[ProductsController::class, 'index']);
    Route::get('admin/product_status/{product}',[ProductsController::class, 'change_status']);
    Route::get('admin/edit_products/{product}',[ProductsController::class, 'edit']);
    Route::put('admin/update_products/{product}',[ProductsController::class, 'update']);
    Route::get('admin/delete_products/{product}',[ProductsController::class, 'delete']);
     //All products End

     //All Sele
    // Route::get('/sales/{sals}',[CartController::class, 'index']);
    
    
    Route::get('admin/product_sale/{id}',[ProductsSalesController::class,'cart_view']);

    Route::get('admin/selas_pro/{id}',[ProductsSalesController::class,'create']);
    Route::post('admin/add_sale',[ProductsSalesController::class, 'store']);
	
	Route::get('cart', [CartController::class, 'cartList'])->name('cart.list');
Route::post('cart', [CartController::class, 'addToCart'])->name('cart.store');
Route::post('update-cart', [CartController::class, 'updateCart'])->name('cart.update');
Route::post('remove', [CartController::class, 'removeCart'])->name('cart.remove');
Route::post('clear', [CartController::class, 'clearAllCart'])->name('cart.clear');
Route::get('/sales', [ProductsController::class, 'productList'])->name('products.list');
