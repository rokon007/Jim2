<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\CustomerInfo;
use App\Models\sales_order;
use App\Models\Payment;
use App\Models\User;
use App\Models\InvoiceNumber;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;
use DB;
use Session;
use Illuminate\Support\Facades\Hash;
use Auth;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
   
	// --------------------- add product ------------------ 
    public function addProduct(){
        //$categories = Category::latest()->get();
       // $brands = Brand::latest()->get();
        //return view('admin.product.add',compact('categories','brands'));
		return view('admin.product.add');
    }


    // ===================== store products ================== 
    public function storeProduct(Request $request){

        $request->validate([
            'product_name' => 'required|max:255',
            'product_code' => 'required|max:255',
            'price' => 'required|max:255',
            'product_quantity' => 'required|max:255',
            //'category_id' => 'required|max:255',
            //'brand_id' => 'required|max:255',
           // 'short_description' => 'required',
           // 'long_description' => 'required',
           // 'image_one' => 'required|mimes:jpg,jpeg,png,gif',
            //'image_two' => 'required|mimes:jpg,jpeg,png,gif',
            //'image_three' => 'required|mimes:jpg,jpeg,png,gif',
        ],[
           // 'category_id.required' => 'select category name',
            //'brand_id.required' => 'select brand name',
        ]);
        
		

       // $imag_one = $request->file('image_one');                
      //  $name_gen = hexdec(uniqid()).'.'.$imag_one->getClientOriginalExtension();
       // Image::make($imag_one)->resize(270,270)->save('fontend/img/product/upload/'.$name_gen);   
       
      //  $img_url1 = 'fontend/img/product/upload/'.$name_gen;

     //   $imag_two = $request->file('image_two');                
      //  $name_gen = hexdec(uniqid()).'.'.$imag_two->getClientOriginalExtension();
      //  Image::make($imag_two)->resize(270,270)->save('fontend/img/product/upload/'.$name_gen); 
        	
      //  $img_url2 = 'fontend/img/product/upload/'.$name_gen;

      //  $imag_three = $request->file('image_three');                
      //  $name_gen = hexdec(uniqid()).'.'.$imag_three->getClientOriginalExtension();
       // Image::make($imag_three)->resize(270,270)->save('fontend/img/product/upload/'.$name_gen);  
        	   
       // $img_url3 = 'fontend/img/product/upload/'.$name_gen;

        Product::insert([
           // 'category_id' => $request->category_id,
          //  'brand_id' => $request->brand_id,
            'product_name' => $request->product_name,
          //  'product_slug' => strtolower(str_replace(' ','-',$request->product_name)),
            'product_code' => $request->product_code,
            'price' => $request->price,
            'product_quantity' => $request->product_quantity,
           // 'short_description' => $request->short_description,
           // 'long_description' => $request->long_description,
           // 'image_one' => $img_url1,
           // 'image_two' => $img_url2,
           // 'image_three' => $img_url3,
            'created_at' => Carbon::now(),
        ]);

        return Redirect()->back()->with('success','Product Added');

    }

    // ======================== manage products ======================== 
    public function manageProduct(){
        $products = Product::orderBy('id','DESC')->get();
        return view('admin.product.manage',compact('products'));
    }

    // ======================== edit product =========== 
    public function editProduct($product_id){
        $product = Product::findOrFail($product_id);
       // $categories = Category::latest()->get();
      //  $brands = Brand::latest()->get();
        return view('admin.product.edit',compact('product'));
    }


    // ======================== update data =========================== 
    public function updateProduct(Request $request){
        $product_id = $request->id;
        Product::findOrFail($product_id)->Update([
          //  'category_id' => $request->category_id,
          //  'brand_id' => $request->brand_id,
            'product_name' => $request->product_name,
           // 'product_slug' => strtolower(str_replace(' ','-',$request->product_name)),
            'product_code' => $request->product_code,
            'price' => $request->price,
            'product_quantity' => $request->product_quantity,
           // 'short_description' => $request->short_description,
            //'long_description' => $request->long_description,
            'update_at' => Carbon::now(),
        ]);

        return Redirect()->route('manage-products')->with('success','Product successfully Updated');
    }

    // ----------- update image =-------------- 
    public function updateImage(Request $request){
        $product_id = $request->id;
        $old_one = $request->img_one;
        $old_two = $request->img_two;
        $old_three = $request->img_three;


        if ($request->has('image_one') && $request->has('image_two')) {
            unlink($old_one);
            unlink($old_two);
            $imag_one = $request->file('image_one');                
             $name_gen = hexdec(uniqid()).'.'.$imag_one->getClientOriginalExtension();
            Image::make($imag_one)->resize(270,270)->save('fontend/img/product/upload/'.$name_gen); 
             //$imag_one->move('fontend/img/product/upload/'.$name_gen); 				
             $img_url1 = 'fontend/img/product/upload/'.$name_gen;
 
             Product::findOrFail($product_id)->update([
                 'image_one' => $img_url1,
                 'updated_at' => Carbon::now(),
             ]);

             $imag_one = $request->file('image_two');                
             $name_gen = hexdec(uniqid()).'.'.$imag_one->getClientOriginalExtension();
             Image::make($imag_one)->resize(270,270)->save('fontend/img/product/upload/'.$name_gen);  
              //$image_two->move('fontend/img/product/upload/'.$name_gen); 				 
             $img_url1 = 'fontend/img/product/upload/'.$name_gen;
 
             Product::findOrFail($product_id)->update([
                 'image_two' => $img_url1,
                 'updated_at' => Carbon::now(),
             ]);
 
 
             return Redirect()->route('manage-products')->with('success','image successfully Updated');
         }
         
        if ($request->has('image_one')) {
           unlink($old_one);
           $imag_one = $request->file('image_one');                
            $name_gen = hexdec(uniqid()).'.'.$imag_one->getClientOriginalExtension();
            Image::make($imag_one)->resize(270,270)->save('fontend/img/product/upload/'.$name_gen); 
			 //$imag_one->move('fontend/img/product/upload/'.$name_gen); 
            $img_url1 = 'fontend/img/product/upload/'.$name_gen;

            Product::findOrFail($product_id)->update([
                'image_one' => $img_url1,
                'updated_at' => Carbon::now(),
            ]);

            return Redirect()->route('manage-products')->with('success','image successfully Updated');
        }

        if ($request->has('image_two')) {
            unlink($old_two);
            $imag_one = $request->file('image_two');                
             $name_gen = hexdec(uniqid()).'.'.$imag_one->getClientOriginalExtension();
             Image::make($imag_one)->resize(270,270)->save('fontend/img/product/upload/'.$name_gen); 
			  //$image_two->move('fontend/img/product/upload/'.$name_gen);
             $img_url1 = 'fontend/img/product/upload/'.$name_gen;
 
             Product::findOrFail($product_id)->update([
                 'image_two' => $img_url1,
                 'updated_at' => Carbon::now(),
             ]);
 
             return Redirect()->route('manage-products')->with('success','image successfully Updated');
         }

         if ($request->has('image_three')) {
            unlink($old_three);
            $imag_one = $request->file('image_three');                
             $name_gen = hexdec(uniqid()).'.'.$imag_one->getClientOriginalExtension();
             Image::make($imag_one)->resize(270,270)->save('fontend/img/product/upload/'.$name_gen); 
			  //$image_three->move('fontend/img/product/upload/'.$name_gen);
             $img_url1 = 'fontend/img/product/upload/'.$name_gen;
 
             Product::findOrFail($product_id)->update([
                 'image_three' => $img_url1,
                 'updated_at' => Carbon::now(),
             ]);
 
             return Redirect()->route('manage-products')->with('success','image successfully Updated');
         }
    }

    // ============= delete product ============= 
    public function destroy($product_id){
       
        Product::findOrFail($product_id)->delete();
        return Redirect()->back()->with('delete','successfully Deleted');
    }

     // status inactive 
     public function Inactive($product_id){
        Product::findOrFail($product_id)->update(['status' => 0]);
        return Redirect()->back()->with('status','Product inactive');
    }

    
    // status active 
    public function Active($product_id){
        Product::findOrFail($product_id)->update(['status' => 1]);
        return Redirect()->back()->with('status','Product Activated');
    }
	
	
	//========================================================CustomerController==============
	 public function create()
    {
        return view('admin.customer.create');
    }


    public function store(Request $request)
    {
        
        //$data = $request->validated();
        $customer = new CustomerInfo();
        $customer->shop_name = $request->shop_name;
        $customer->customer_name =$request->customer_name;
        
        $customer->customer_adderss = $request->customer_adderss;
        $customer->customer_phone = $request->customer_phone;
       
        if($request->hasfile('image')){
            $file = $request->file('image');
           // $filename = time().'.'. $file->getClientOriginalExtension();
            $filename = $request->customer_phone.'.'. $file->getClientOriginalExtension();
            $file->move('upload/customer/', $filename);
            $customer->image = $filename;
        }
        $customer->total_amount =$request->total_amount;
        
        $customer->total_paid =$request->total_paid;
        $customer->total_deu =$request->total_deu;
        $customer->created_by ='Admin';
        $customer->save();
		
    
            return redirect()->back()->with('message','গ্রাহকের নামটি সংরক্ষীত হল।');

    }

    public function index()
    {
       
        $customers= CustomerInfo::all();
        return view('admin.customer.index',compact('customers'));
    }



    public function edit($customer)
    {
         $customer = CustomerInfo::find($customer);
       
        return view('admin.customer.edit',compact('customer'));
    }


    public function update(Request $request,$customer)
    {
       
        //$data = $request->validated();  
        $customer = CustomerInfo::find($customer);
        $customer->shop_name = $request->shop_name;
        $customer->customer_name =$request->customer_name;
        
        $customer->customer_adderss = $request->customer_adderss;
        $customer->customer_phone = $request->customer_phone;
        
        if($request->hasfile('image')){

            $destinstion = 'upload/customer/'.$customer->image;
            if(File::exists($destinstion))
            {
                File::delete($destinstion);
            }

            $file = $request->file('image');
           // $filename = time().'.'. $file->getClientOriginalExtension();
             $filename = $request->customer_phone.'.'. $file->getClientOriginalExtension();
            $file->move('upload/customer/', $filename);
            $customer->image = $filename;
        }
        $customer->total_amount =$request->total_amount;
        
        $customer->total_paid =$request->total_paid;
        $customer->total_deu =$request->total_deu;
        $customer->created_by =Auth::user()->name;
        $customer->update();

        return redirect('admin/all_customer')->with('message','গ্রাহকের নামটি পুর্নরায় সংরক্ষীত হল।');
    }
	
	 //===================================================
	 public function cart_create($user_id,$cid)
    {
		 $pass= '';
        
        
		
		
		if (InvoiceNumber::where('user', '=', $user_id)->exists()) {
			$invoice_number=InvoiceNumber::where('user',$user_id)->first();
            $customer = CustomerInfo::where('id',$invoice_number->cid)->first();
			$invoice=$invoice_number->invoice_number;
			$products = Product::where('status',1)->get();
			 
		 $cart_order= sales_order::where('invoice',$invoice)->get(); 		
		 $Total = DB::table('sales_orders')->where('invoice' , $invoice)->sum('amount');
			 //return view('admin.sales_product.product_sales',compact('invoice','customer','products'))->with(['Total' => $Total,'cart_order' => $cart_order]);	
			 return view('admin.sales_product.product_sales',compact('invoice','customer','products'));				
          }
		
		else{
			$invoice = new InvoiceNumber();
            $invoice->invoice_number = mt_rand(10000000,99999999);
            $invoice->user =$user_id;       
            $invoice->cid = $cid;
			$invoice->save();
			
			$invoice_num=InvoiceNumber::where('user',$user_id)->first();
			$invoice=$invoice_num->invoice_number;
			$customer = CustomerInfo::find($invoice_num->cid);
			$products = Product::where('status',1)->get();
		    $cart_order= sales_order::where('invoice',$invoice)->get(); 		
		    $Total = DB::table('sales_orders')->where('invoice' , $invoice)->sum('amount');
			//return view('admin.sales_product.product_sales',compact('invoice','customer','products'))->with(['Total' => $Total,'cart_order' => $cart_order]);
            return view('admin.sales_product.product_sales',compact('invoice','customer','products'));				
		}
       
    }

    public function cart_store()
    {
       return view('admin.customer.cart');
    }
	//=========================================
	//=========================================
	 //view_cart12
      public function view_cart12($invoice)
	  {
		 $cart_order= sales_order::where('invoice',$invoice)->get();
         $Total = DB::table('sales_orders')->where('invoice' , $invoice)->sum('amount');
          return redirect()->back()->with(['pass' => $invoice,'Total' => $Total,'cart_order' => $cart_order, 'view_cart' => 'view_cart']);		 
	  }

	    public function view_cart(Request $request)
    {
		
	    
        
			//Session::forget('invoice_key');
		$pass=$request->invoice;	
		
        $order = new sales_order();
        $order->invoice = $request->invoice;
        $order->cid =$request->cid;
		$order->shop_name =$request->shop_name;
		$order->customer_name =$request->customer_name;
		$order->customer_phone =$request->customer_phone;
		$order->created_by =$request->created_by;
        $order->product_code = $request->product_code;
        $order->product = $request->name;             
        $order->price =$request->price;       
        $order->qty  =$request->qty;
        $order->discount =$request->qty;
		$order->amount =$request->price * $request->qty;
        $order->profit =0;
		$order->save();
         
		$new_quantity=$request->old_quantity-$request->qty;
		 $product = Product::find($request->id);
		 $product->product_quantity =$new_quantity;
         $product->update();
		 
		 $cart_order= sales_order::where('invoice',$pass)->get(); 
		
		// $Total = DB::table('sales_orders')
          //      ->select(DB::raw('SUM(amount) as total'))
			//	->where('invoice', $pass)
           //     -> get();
		 $Total = DB::table('sales_orders')->where('invoice' , $pass)->sum('amount');
		// -> get();
		//$Total =sales_order::where('invoice',$pass)->sum('(cast(amount as double precision))');
		//$Total =sales_order::select(DB::raw('sum(cast(amount as double precision))'))->where('invoice', $pass)->get();
		//$Total =sales_order::where('invoice', $pass)->select(DB::raw('sum(cast(amount as double precision))'))->get();
    
	 return redirect()->back()->with(['pass' => $pass,'Total' => $Total,'cart_order' => $cart_order, 'view_cart' => 'view_cart']);	
    }
	
	
	
	
	//cart_save1
	public function cart_save1($invoice)
	{
		//Session::forget('invoice_key');
		$invoice_key = InvoiceNumber::where('invoice_number',$invoice); 
		 $invoice_key->delete();
		return redirect()->route('index-customers')->with('message','Cart seved successfully');
	}
	
	
	public function cart_cansel($id,$code, $qty,$invoice)
    {
        $product = Product::where('product_code',$code)->first();
		$cqty=$product->product_quantity;
		$product1=$product->product;
		$new_quantity=$cqty+$qty;

		 
		Product::where('product_code',$code)->update((['product_quantity'=>$new_quantity]));
		 
		 
		 $sales_order = sales_order::find($id); 
		 $sales_order->delete();
		 
		  $cart_order= sales_order::where('invoice',$invoice)->get(); 
		
		 $Total = DB::table('sales_orders')->where('invoice' , $invoice)->sum('amount');
		 return redirect()->back()->with(['Total' => $Total,'cart_order' => $cart_order, 'view_cart' => 'view_cart']);		
    }
	
	//view_orders
	public function view_orders()
	{
		 /*
		 $sales_order = DB::table('sales_orders')
		        ->join('customer_infos', 'customer_infos.id', '=','sales_orders.cid' )
				->groupBy('sales_orders.invoice','customer_infos.shop_name','customer_infos.customer_phone')
                ->select('sales_orders.invoice as get_invoice',DB::raw('SUM(sales_orders.amount) as total_amount'),'customer_infos.shop_name as get_shop','customer_infos.customer_phone as get_mobile')
                 
				 ->orderBy('sales_orders.invoice')
                ->get(); 	
				*/
		  $sales_order = DB::table('sales_orders')
		    ->select('invoice',DB::raw('SUM(sales_orders.amount) as total_amount'),'shop_name','customer_phone','created_by')
			->groupBy('invoice','shop_name','customer_phone','created_by')
			->where('status',NULL)
			->orderBy('invoice')
			 ->get();
		  return view('admin.customer.orders',compact('sales_order'));
	}
	//SRview_orders
	public function SRview_orders($sr)
	{		
		  $sales_order = DB::table('sales_orders')
		    ->select('invoice',DB::raw('SUM(sales_orders.amount) as total_amount'),'shop_name','customer_phone','created_by')
			->groupBy('invoice','shop_name','customer_phone','created_by')
			->where('status',NULL)
			->where('created_by',$sr)
			->orderBy('invoice')
			 ->get();
		  return view('admin.customer.orders',compact('sales_order'));
	}
	//conferm_cart
	public function conferm_cart($invoice)
	{
		 $sales_order =sales_order::where('invoice',$invoice)->first(); 
		$cart_order= sales_order::where('invoice',$invoice)->get(); 
		
		 $Total = DB::table('sales_orders')->where('invoice' , $invoice)->sum('amount');
		 return redirect()->back()->with(['Total' => $Total,'cart_order' => $cart_order, 'invoice' => $invoice,'sales_order' => $sales_order,'view_cart' => 'view_cart']);		
	}
	//conferm_cart-view
	public function conferm_cart_view($invoice,$cid)
	{
		 $customer = CustomerInfo::where('customer_phone',$cid)->first();
		 $sales_order =sales_order::where('invoice',$invoice)->first(); 
		 $payment=Payment::where('invoice',$invoice)->first(); 
		 $cart_order= sales_order::where('invoice',$invoice)->get(); 
		
		 $Total = DB::table('sales_orders')->where('invoice' , $invoice)->sum('amount');
		 return redirect()->back()->with(['customer' => $customer,'payment' => $payment,'Total' => $Total,'cart_order' => $cart_order, 'invoice' => $invoice,'sales_order' => $sales_order,'view_cart' => 'view_cart']);		
	}
	//comfermsave1
	public function comfermsave1(Request $request)
	{
		//insert in to payments table
		$payment = new Payment();
		$payment->invoice =$request->invoice;
        $payment->shop_name = $request->shop_name;                
        $payment->cid = $request->cid;
        $payment->customer_phone = $request->customer_phone;              
        $payment->Total =$request->Total;       
        $payment->payment =$request->payment;
        $payment->due =$request->due;
        //$payment->created_by ='Admin';
        $payment->save();
		
		//update cudtomerinfos table
		 $CustomerInfo = CustomerInfo::where('id',$request->cid)->first();
		 $total_amount=$CustomerInfo->total_amount;
		 $total_paid=$CustomerInfo->total_paid;
		 $total_deu=$CustomerInfo->total_deu;
		 
		 $new_total_amount= $total_amount+$request->Total;
		 $new_total_paid= $total_paid+$request->payment;
		 $new_total_deu= $total_deu+$request->due;
		 
		 $Update_CustomerInfo = CustomerInfo::find($request->cid);
		 $Update_CustomerInfo->total_amount =$new_total_amount;
		 $Update_CustomerInfo->total_paid =$new_total_paid;
		 $Update_CustomerInfo->total_deu =$new_total_deu;
         $Update_CustomerInfo->update();
		 
		 //update sales_orders  table
		// $sales_orders = sales_orders::where('invoice',$request->invoice)->get();
		 sales_order::where('invoice',$request->invoice)->update((['status'=>1]));
		 
		 return redirect()->back()->with('message','Order seved successfully');
		
		
	}
	 public function order_qty_update(Request $request,$id,$invoice,$code)
    {
		$new_quantity=$request->qty12;
		
		//Update Product qty
		$order=sales_order::where('id',$id)->first();
		$old_quantity=$order->qty;
		$price=$order->price; 
		$product = Product::where('product_code',$code)->first();
		$cqty=$product->product_quantity;	
		if($old_quantity>=$new_quantity)
		{						
			$new1_quantity=$cqty+($old_quantity-$new_quantity);			
			Product::where('product_code',$code)->update((['product_quantity'=>$new1_quantity]));
		}
		elseif($old_quantity<=$new_quantity)
		{
		$new1_quantity=$cqty-($new_quantity-$old_quantity);		
		Product::where('product_code',$code)->update((['product_quantity'=>$new1_quantity]));	
			
		}
		if($new_quantity==0)
		{
			$new1_quantity=$cqty+$old_quantity+$new_quantity;			
			Product::where('product_code',$code)->update((['product_quantity'=>$new1_quantity]));
		}
			
				 
		//Update sales_order qty
		$new_amount=$price * $new_quantity;
		sales_order::where('id',$id)->update((['qty'=>$new_quantity,'amount'=>$new_amount]));
		//geting data
		 $sales_order =sales_order::where('invoice',$invoice)->first(); 
		$cart_order= sales_order::where('invoice',$invoice)->get(); 
		
		 $Total = DB::table('sales_orders')->where('invoice' , $invoice)->sum('amount');
		 return redirect()->back()->with(['Total' => $Total,'cart_order' => $cart_order, 'invoice' => $invoice,'sales_order' => $sales_order,'view_cart' => 'view_cart']);		
	}
	
	//view_confirmorder
	public function view_confirmorder()
	{
		    $sales_order = DB::table('sales_orders')			
			->join('payments', 'sales_orders.invoice', '=', 'payments.invoice')
		    ->select('sales_orders.invoice',DB::raw('SUM(sales_orders.amount) as total_amount'),'sales_orders.shop_name','sales_orders.customer_phone','payments.payment','payments.due','payments.created_at')
			->groupBy('sales_orders.invoice','sales_orders.shop_name','sales_orders.customer_phone','payments.payment','payments.due','payments.created_at')
			->where('status',1)
			->orderBy('invoice')
			 ->get();
		  return view('admin.customer.confirm_order',compact('sales_order'));
	}
	//ordered_products
	public function ordered_products()
	{
		    $sales_order = DB::table('sales_orders')			
			
		    ->select('product_code',DB::raw('SUM(qty) as total_qty'),'product')
			->groupBy('product_code','product')
			->where('status',NULL)
			->orderBy('product_code')
			 ->get();
		  return view('admin.customer.ordered_products',compact('sales_order'));
	}
	
	//add_user
	public function add_user()
	{
		$user=User::All();
		 return view('admin.user.add_user',compact('user'));
	}
	//register_user
	 public function register_user(Request $request)
    {       
        $user = new User();
        $user->name = $request->name;
        $user->email =$request->email;        
        $user->password = Hash::make($request->password);
        $user->roll = $request->roll;
		$user->mobile = $request->mobile;
       
        if($request->hasfile('image')){
            $file = $request->file('image');
           // $filename = time().'.'. $file->getClientOriginalExtension();
             $filename = $request->email.'.'. $file->getClientOriginalExtension();
            $file->move('upload/admin/', $filename);
            $user->image = $filename;
        }       
        $user->save();
		
    
            return redirect()->back()->with('message','New user added');

    }
	//sr_home
	public function sr_home()
	{
		
		$sales_order = DB::table('sales_orders')
		     ->where('created_by',Auth::user()->name)
			->whereDate('created_at', '=', date('Y-m-d'))
            
             ->count('invoice');	
		
		$Totalamount = DB::table('sales_orders')->where('created_by',Auth::user()->name)
		->whereDate('created_at', '=', date('Y-m-d'))
		->sum('amount');	 
		return view('admin.sr.sr_home',compact('sales_order','Totalamount'));
		//return view('admin.sr.sr_home');
	}
	//dm_home
	public function dm_home()
	{
		//$user=User::All();
		// return view('admin.user.add_user',compact('user'));
		return view('admin.dm.dm_home');
	}
	
}
