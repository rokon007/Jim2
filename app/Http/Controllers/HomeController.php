<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Comment;
use Auth;
use DB;
use Carbon\Carbon;
use App\Models\Product;
use App\Models\Payment;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    //sr_detels
    public function sr_detels($sr,$image)
    {
        //Sr Order
		 $sr_order = DB::table('sales_orders')
            ->select('invoice',DB::raw('SUM(sales_orders.amount) as total_amount'),DB::raw("(DATE_TRUNC('day',created_at)) as my_date"),'shop_name','customer_phone','created_by')
            ->groupBy('invoice','shop_name',DB::raw("(DATE_TRUNC('day',created_at)) as my_date"),'customer_phone','created_by')
            ->where('created_by',$sr)           
             ->whereDate(DB::raw("(DATE_TRUNC('day',created_at))"), '=', date('Y-m-d'))
             ->orderBy(DB::raw("(DATE_TRUNC('day',created_at))"),'DESC')
             ->get(); 	 
        //Sr details
        $sr_quary=DB::table('users')->where('name',$sr)->first();
        $usersr=$sr;
        $img=$image;
        $todays_srcullection_count=DB::table('payments')
         // ->orderBy('id','DESC')
         ->whereDate('created_at', '=', date('Y-m-d'))
         ->where('sr','=',$sr)
         ->sum('payment'); 
         //todays cullection
          // $monthly_sr_cullection = DB::table('payments')
          // ->select( DB::raw("(sum(payment)) as total_payment"), DB::raw("(DATE_FORMAT(created_at, '%d-%m-%Y')) as my_date"))
                
          //       ->groupBy(DB::raw("DATE_FORMAT(created_at, '%d-%m-%Y')"))
          //    ->whereMonth('created_at', date('m')) 
          //    ->where('sr',$sr)   
          //    ->get();
		   $monthly_sr_cullection = DB::table('payments')

          ->select( DB::raw("(sum(payment)) as total_payment"), DB::raw("(DATE_TRUNC('day',created_at)) as my_date"))
                
                ->groupBy(DB::raw("DATE_TRUNC('day',created_at)"))
				->whereMonth('created_at', date('m')) 
              ->where('sr',$sr)
             ->get();
          return redirect()->back()          
          ->with(['view_div' => 'view_div','todays_srcullection_count' => $todays_srcullection_count,'usersr'=>$usersr,'img'=>$img,'monthly_sr_cullection'=>$monthly_sr_cullection,'sr_quary'=>$sr_quary,'sr_order'=>$sr_order]);
    }
	 public function admin_index()
    {
         $all_order = DB::table('sales_orders')           
            
            ->select('product_code',DB::raw('SUM(qty) as total_qty'),'product')
            ->groupBy('product_code','product')
            ->where('status',NULL)
           // ->orderBy('id','DESC')
             ->get();

        $order_today = DB::table('sales_orders')             
            ->whereDate('created_at', '=', date('Y-m-d'))            
             ->count('invoice');  
        $sales_order_today_count=DB::table('sales_orders')
            ->select('invoice',DB::raw('SUM(sales_orders.amount) as total_amount'),'shop_name','customer_phone','created_by')
            ->groupBy('invoice','shop_name','customer_phone','created_by')
            ->where('status',NULL)
             ->whereDate('created_at', '=', date('Y-m-d'))
            ->count('shop_name');   
        $sales_order_today = DB::table('sales_orders')
            ->select('invoice',DB::raw('SUM(sales_orders.amount) as total_amount'),'shop_name','customer_phone','created_by')
            ->groupBy('invoice','shop_name','customer_phone','created_by')
            ->where('status',NULL)
             ->whereDate('created_at', '=', date('Y-m-d'))
           // ->orderBy('id','DESC')
             ->get(); 
        $confermorder_today_count=DB::table('sales_orders')
            ->select('invoice',DB::raw('SUM(sales_orders.amount) as total_amount'),'shop_name','customer_phone','created_by')
            ->groupBy('invoice','shop_name','customer_phone','created_by')
            ->where('status',1)
             ->whereDate('created_at', '=', date('Y-m-d'))
            ->count('invoice');
        $confermorder_today = DB::table('sales_orders')
            ->select('invoice',DB::raw('SUM(sales_orders.amount) as total_amount'),'shop_name','customer_phone','created_by')
            ->groupBy('invoice','shop_name','customer_phone','created_by')
            ->where('status',1)
             ->whereDate('created_at', '=', date('Y-m-d'))
            //->orderBy('id','DESC')
             ->get();              
             
        $order_currentMonth=DB::table('sales_orders')             
            ->whereMonth('created_at', date('m'))            
             ->count('invoice');

        $order_currentYear=DB::table('sales_orders')             
            ->whereYear('created_at', date('Y'))            
             ->count('invoice');

         $order_Total=DB::table('sales_orders')                    
             ->count('invoice');     

        $Totalamount_today = DB::table('sales_orders')
             ->whereDate('created_at', '=', date('Y-m-d'))
             ->sum('amount');  

        $Totalamount_currentMonth = DB::table('sales_orders')
             ->whereMonth('created_at', date('m')) 
             ->sum('amount');
             
        $Totalamount_currentYear = DB::table('sales_orders')
             ->whereYear('created_at', date('Y'))
             ->sum('amount');
             
        $Totalamount = DB::table('sales_orders')             
             ->sum('amount');  


        $collection_today=DB::table('payments')
              ->whereDate('created_at', '=', date('Y-m-d'))             
             ->sum('payment'); 
        $due_today=DB::table('payments')
              ->whereDate('created_at', '=', date('Y-m-d'))             
             ->sum('due');

        $collection_currentMonth=DB::table('payments')
              ->whereMonth('created_at', date('m'))             
             ->sum('payment'); 
        $due_currentMonth=DB::table('payments')
              ->whereMonth('created_at', date('m'))             
             ->sum('due');
             
        $collection_currentYear=DB::table('payments')
              ->whereYear('created_at', date('Y'))             
             ->sum('payment'); 
        $due_currentYear=DB::table('payments')
              ->whereYear('created_at', date('Y'))             
             ->sum('due');
             
        $collection_Total=DB::table('payments')                         
             ->sum('payment'); 
        $due_Total=DB::table('payments')                        
             ->sum('due');  

        $date = Carbon::now();
        $monthName = $date->format('F');
        $year = $date->format('Y');  
        
        $low_products = Product::whereColumn('product_quantity','<','lowquantity_alart')->get();
        $low_qty_count= Product::whereColumn('product_quantity','<','lowquantity_alart')->count();		
		
         //$low_products = Product::where('product_quantity','<','lowquantity_alart')->get();        
         //$low_qty_count= Product::where('product_quantity','<','lowquantity_alart')->count();
        
         
        //$low_qty_count=0;
         $todays_cullection = DB::table('payments')
          ->orderBy('id','DESC')
         ->whereDate('created_at','=', date('Y-m-d'))
         ->get();
         $todays_cullection_count=DB::table('payments')
          ->orderBy('id','DESC')
         ->whereDate('created_at','=', date('Y-m-d'))
         ->sum('payment'); 
  //        $cullection_Bydate=DB::table('payments')

  // ->select('*',DB::raw('DATE(created_at) as date'),DB::raw('SUM(payment) as total_payment'))
  // ->get()->groupBy('date');


         // ->select('created_at',DB::raw('SUM(payment) as total_payment'))
         //    ->groupBy('created_at')
         //    ->orderBy('id','DESC')
         //    ->get();
          $cullection_Bydate = DB::table('payments')

          ->select( DB::raw("(sum(payment)) as total_payment"), DB::raw("(DATE_TRUNC('day',created_at)) as my_date"))
                
                ->groupBy(DB::raw("DATE_TRUNC('day',created_at)"))
             ->get();
            //SR button
            $srbutton=DB::table('users')->where('roll',2)->get();
		return view('admin.home',compact('order_today','order_currentMonth','order_currentYear','order_Total','Totalamount_today','Totalamount_currentMonth','Totalamount_currentYear','Totalamount','collection_today','due_today','collection_currentMonth','due_currentMonth','collection_currentYear','due_currentYear','collection_Total','due_Total','monthName','year','low_products','sales_order_today_count','sales_order_today','low_qty_count','confermorder_today_count','confermorder_today','todays_cullection','todays_cullection_count','cullection_Bydate','srbutton','all_order'));
    }
}
