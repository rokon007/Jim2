<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Brand;
use App\CustomerInfo;
use App\sales_order;
use App\Payment;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;
use DB;
use Session;



class ProductController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    

// --------------------- add product ------------------ 
    public function addProduct(){
        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        return view('admin.product.add',compact('categories','brands'));
    }


    // ===================== store products ================== 
    public function storeProduct(Request $request){

        $request->validate([
            'product_name' => 'required|max:255',
            'product_code' => 'required|max:255',
            'price' => 'required|max:255',
            'product_quantity' => 'required|max:255',
            'category_id' => 'required|max:255',
            'brand_id' => 'required|max:255',
            'short_description' => 'required',
            'long_description' => 'required',
            'image_one' => 'required|mimes:jpg,jpeg,png,gif',
            'image_two' => 'required|mimes:jpg,jpeg,png,gif',
            'image_three' => 'required|mimes:jpg,jpeg,png,gif',
        ],[
            'category_id.required' => 'select category name',
            'brand_id.required' => 'select brand name',
        ]);
        
		

        $imag_one = $request->file('image_one');                
        $name_gen = hexdec(uniqid()).'.'.$imag_one->getClientOriginalExtension();
        Image::make($imag_one)->resize(270,270)->save('fontend/img/product/upload/'.$name_gen);   
        //$imag_one->move('fontend/img/product/upload/'.$name_gen); 		
        $img_url1 = 'fontend/img/product/upload/'.$name_gen;

        $imag_two = $request->file('image_two');                
        $name_gen = hexdec(uniqid()).'.'.$imag_two->getClientOriginalExtension();
        Image::make($imag_two)->resize(270,270)->save('fontend/img/product/upload/'.$name_gen); 
         //$imag_two->move('fontend/img/product/upload/'.$name_gen); 		
        $img_url2 = 'fontend/img/product/upload/'.$name_gen;

        $imag_three = $request->file('image_three');                
        $name_gen = hexdec(uniqid()).'.'.$imag_three->getClientOriginalExtension();
        Image::make($imag_three)->resize(270,270)->save('fontend/img/product/upload/'.$name_gen);  
         // $imag_three->move('fontend/img/product/upload/'.$name_gen); 		   
        $img_url3 = 'fontend/img/product/upload/'.$name_gen;

        Product::insert([
            'category_id' => $request->category_id,
            'brand_id' => $request->brand_id,
            'product_name' => $request->product_name,
            'product_slug' => strtolower(str_replace(' ','-',$request->product_name)),
            'product_code' => $request->product_code,
            'price' => $request->price,
            'product_quantity' => $request->product_quantity,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'image_one' => $img_url1,
            'image_two' => $img_url2,
            'image_three' => $img_url3,
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
        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        return view('admin.product.edit',compact('product','categories','brands'));
    }


    // ======================== update data =========================== 
    public function updateProduct(Request $request){
        $product_id = $request->id;
        Product::findOrFail($product_id)->Update([
            'category_id' => $request->category_id,
            'brand_id' => $request->brand_id,
            'product_name' => $request->product_name,
            'product_slug' => strtolower(str_replace(' ','-',$request->product_name)),
            'product_code' => $request->product_code,
            'price' => $request->price,
            'product_quantity' => $request->product_quantity,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
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
        $image = Product::findOrFail($product_id);
        $img_one = $image->image_one;
        $img_two = $image->image_two;
        $img_three = $image->image_three;
        unlink($img_one);
        unlink($img_two);
        unlink($img_three);

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
            $filename = time().'.'. $file->getClientOriginalExtension();
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
            $filename = time().'.'. $file->getClientOriginalExtension();
            $file->move('upload/customer/', $filename);
            $customer->image = $filename;
        }
        $customer->total_amount =$request->total_amount;
        
        $customer->total_paid =$request->total_paid;
        $customer->total_deu =$request->total_deu;
        $customer->created_by = Admin;
        $customer->update();

        return redirect('admin/all_customer')->with('message','গ্রাহকের নামটি পুর্নরায় সংরক্ষীত হল।');
    }
	
	
	//=========================================
	 


	    public function view_cart(Request $request)
    {
		if(Session::get('invoice_key')==null)
		{
			 $abc= mt_rand(10000000,99999999);
	         Session::put('invoice_key',  mt_rand(10000000,99999999));
		}
       If($request->invoice==null)
	   {
	   
		   return redirect()->back();
	   }
	    
        else{
			//Session::forget('invoice_key');
		$pass=$request->invoice;	
		
        $order = new sales_order();
        $order->invoice = $request->invoice;
        $order->cid =$request->id;
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
	 
		
		
    }
	//cart_save1
	public function cart_save1()
	{
		Session::forget('invoice_key');
		return redirect()->back()->with('message','Cart seved successfully');
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
		    ->select('invoice',DB::raw('SUM(sales_orders.amount) as total_amount'),'shop_name','customer_phone')
			->groupBy('invoice','shop_name','customer_phone')
			->where('status',NULL)
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
}
