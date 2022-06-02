<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Models\Comment;

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

Route::get('/counter', function () {
    return view('counter');
  
});

Auth::routes();

/*View composer*/
// View::composer(['*'], function($view){

// $notifications = DB::table('comments')
//           ->join('users', 'comments.user_id', '=', 'users.id')
//           ->select('users.name as name','users.image as image','comments.id as id','comments.comment_subject as subject1','comments.comment_text as text','comments.link as golink','comments.created_at as dt')
//           ->where('comments.comment_status',1)
//           ->orderBy('comments.id', 'DESC')->get();
//         $unread = Comment::where('comment_status','=','1')->count(); 

//         $view->with('notifications',$notifications,'unread',$unread);

// });
/*View composer*/

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'admin_index'])->name('admin.home');

//Route::get('admin/products/add', [App\Http\Controllers\ProductController::class, 'addProduct'])->name('add-products');
// ============================= Products ============================
Route::get('admin/products/add', [App\Http\Controllers\ProductController::class, 'addProduct'])->name('add-products');
Route::post('admin/products/store', [App\Http\Controllers\ProductController::class, 'storeProduct'])->name('store-products');
//Route::post('admin/products/store','ProductController@storeProduct')->name('store-products');
Route::get('admin/products/manage',[App\Http\Controllers\ProductController::class, 'manageProduct'])->name('manage-products');
Route::get('admin/products/edit/{proudct_id}',[App\Http\Controllers\ProductController::class, 'editProduct']);
Route::post('admin/products/update',[App\Http\Controllers\ProductController::class, 'updateProduct'])->name('update-products');
Route::post('admin/products/image-update',[App\Http\Controllers\ProductController::class, 'updateImage'])->name('update-image');
Route::get('admin/products/delete/{product_id}',[App\Http\Controllers\ProductController::class, 'destroy']);
Route::get('admin/products/inactive/{product_id}',[App\Http\Controllers\ProductController::class, 'Inactive']);
Route::get('admin/products/active/{product_id}',[App\Http\Controllers\ProductController::class, 'Active']);
// ============================= Wholesale ============================
//All Customer Start
     Route::get('admin/customers',[App\Http\Controllers\ProductController::class, 'create'])->name('create-customers');
	 Route::post('admin/add_customer',[App\Http\Controllers\ProductController::class, 'store'])->name('store-customers');
	 Route::get('admin/all_customer',[App\Http\Controllers\ProductController::class, 'index'])->name('index-customers');
	 Route::get('admin/edit_customer/{customer}',[App\Http\Controllers\ProductController::class, 'edit'])->name('edit-customers');
	 Route::put('admin/update_customer/{customer}',[App\Http\Controllers\ProductController::class, 'update'])->name('update-customers');
    //All Sele
   Route::get('admin/product_sale/{id}',[App\Http\Controllers\ProductController::class, 'cart_view'])->name('cart_view-customers');
   Route::get('admin/selas_pro/{user_id}/{cid}',[App\Http\Controllers\ProductController::class, 'cart_create'])->name('cart_create-customers');
    Route::get('admin/add_sale',[App\Http\Controllers\ProductController::class, 'cart_store'])->name('cart_store-customers');
   
  
   Route::get('cart/cansel/{id}/{code}/{qty}/{invoice}',[App\Http\Controllers\ProductController::class, 'cart_cansel'])->name('cart_cansel');
   //cart/save1
   Route::get('cart/save1/{invoice}',[App\Http\Controllers\ProductController::class, 'cart_save1'])->name('cart_save1');
   //
    Route::put('cart/qty_update/{id}/{invoice}/{code}',[App\Http\Controllers\ProductController::class, 'order_qty_update'])->name('order-qtyupdate');
      //All Customer End
	  Route::get('/jim','CartController@view_login')->name('view_login');
// ======================= cart =============================	
Route::post('cart/wholeseal',[App\Http\Controllers\ProductController::class, 'view_cart'])->name('view-cart');
Route::get('getcart/wholeseal/{invoice}',[App\Http\Controllers\ProductController::class, 'view_cart12'])->name('view-cart12');
//view-orders
 Route::get('admin/view-orders',[App\Http\Controllers\ProductController::class, 'view_orders'])->name('view-orders');
 //SRview-orders
 Route::get('admin/sr-orders/{sr}',[App\Http\Controllers\ProductController::class, 'SRview_orders'])->name('SRview-orders');
 //view-confirm order
 Route::get('admin/confirm-order',[App\Http\Controllers\ProductController::class, 'view_confirmorder'])->name('confirm-order');
 //confirm-order_cable
 Route::get('admin/confirm-order-cable',[App\Http\Controllers\ProductController::class, 'view_confirmordercable'])->name('confirm-order_cable');
 //payment_1
 Route::get('admin/customer/pay',[App\Http\Controllers\ProductController::class, 'payment_1'])->name('payment_1');
 
 //admin/customer_payment/'.$customer->id
 Route::get('admin/customer_payment/{id}',[App\Http\Controllers\ProductController::class, 'payment_modelview'])->name('payment_modelview');
 
 //payment/save/
 Route::post('payment/save',[App\Http\Controllers\ProductController::class, 'payment_save'])->name('payment_save');
 
 //conferm/cart/
 Route::get('conferm/cart/{invoice}',[App\Http\Controllers\ProductController::class, 'conferm_cart'])->name('conferm-cart');
 //conferm/cart-view
  Route::get('conferm/cart-view/{invoice}/{cid}',[App\Http\Controllers\ProductController::class, 'conferm_cart_view'])->name('conferm-cart-view');
 //cart/comfermsave1/
  Route::post('cart/comfermsave1',[App\Http\Controllers\ProductController::class, 'comfermsave1'])->name('order-comfermsave1');
//All cart End  
//ordered-products
Route::get('ordered/products',[App\Http\Controllers\ProductController::class, 'ordered_products'])->name('ordered-products');
//==================================================================
//add-user
Route::get('add/user',[App\Http\Controllers\ProductController::class, 'add_user'])->name('add-user');
//register_user
Route::post('register/user',[App\Http\Controllers\ProductController::class, 'register_user'])->name('register_user');
//SR.home
Route::get('sr/home',[App\Http\Controllers\ProductController::class, 'sr_home'])->name('SR.home');
//DM.home
Route::get('dm/home',[App\Http\Controllers\ProductController::class, 'dm_home'])->name('DM.home');
//time timeshow
Route::get('/time',[App\Http\Controllers\ProductController::class, 'timeshow'])->name('timeshow');
//delete_comment   update-coment
Route::get('update-coment/{id}',[App\Http\Controllers\ProductController::class, 'delete_comment'])->name('delete_comment');
//delete_User
Route::get('user-delete/{id}',[App\Http\Controllers\ProductController::class, 'delete_User'])->name('delete_User');



//view-customer
Route::get('admin/customer-list',[App\Http\Controllers\ProductController::class, 'viewcustomer'])->name('viewcustomer');
//'customer-delete/'.$newcustomer->id
Route::get('customer-delete/{id}',[App\Http\Controllers\ProductController::class, 'delete_customer'])->name('delete_customer');
//customer/view_profile/'.$newcustomer->id
Route::get('customer/view_profile/{id}',[App\Http\Controllers\ProductController::class, 'view_profile_customer'])->name('view_profile_customer');