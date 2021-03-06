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
	public function season_over()
	{
		 return view('over');
	}
	public function cablemonth_search($amount,$month)
	{
		$camount=$amount;
		$cmonth=$month;
          return redirect()->back()          
          ->with(['view_cablemonth' => 'view_cablemonth','camount'=>$camount,'cmonth'=>$cmonth]);			
	}
	public function othermonth_search($amount,$month)
	{
		$oamount=$amount;
		$omonth=$month;	 
	return redirect()->back()          
          ->with(['view_othermonth' => 'view_othermonth','oamount'=>$oamount,'omonth'=>$omonth]);		
	}
    //sr_detels
    public function sr_detels($sr,$image)
    {
        //Sr Order
		 $sr_order = DB::table('sales_orders')
            ->select('invoice',DB::raw('SUM(sales_orders.amount) as total_amount'),DB::raw("(DATE_TRUNC('day',created_at)) as my_date"),'shop_name','customer_phone','created_by')
            ->groupBy('invoice','shop_name',DB::raw("(DATE_TRUNC('day',created_at))"),'customer_phone','created_by')
            ->where('created_by',$sr) 
			 ->whereMonth(DB::raw("(DATE_TRUNC('day',created_at))"), '=', date('m'))
            // ->whereDate(DB::raw("(DATE_TRUNC('day',created_at))"), '=', date('Y-m-d'))
             ->orderBy(DB::raw("(DATE_TRUNC('day',created_at))"),'DESC')
             ->get(); 	 
			  //Sr Order
		 $sr_monthlyamount_sum = DB::table('sales_orders')      
            ->where('created_by',$sr)
            //->whereMonth('created_at', date('m')) 			
             ->whereMonth(DB::raw("(DATE_TRUNC('day',created_at))"), '=', date('m'))    
              ->sum('amount'); 
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
          ->with(['view_div' => 'view_div','todays_srcullection_count' => $todays_srcullection_count,'usersr'=>$usersr,'img'=>$img,'monthly_sr_cullection'=>$monthly_sr_cullection,'sr_quary'=>$sr_quary,'sr_order'=>$sr_order,'sr_monthlyamount_sum'=>$sr_monthlyamount_sum]);
    }
	
	 public function admin_index()
    {
		
        $psv = Product::sum(\DB::raw('product_quantity * price'));			 
		 $cabmemonth_order = DB::table('sales_orders')
		      ->select(DB::raw('SUM(sales_orders.amount) as total_amount'),
			  DB::raw("(DATE_TRUNC('year',created_at)) as year"),DB::raw("(DATE_TRUNC('month',created_at)) as month"))
           ->groupby('year','month')
		   
		     
           // ->select(DB::raw('SUM(sales_orders.amount) as total_amount'),DB::raw("(DATE_TRUNC('month',created_at)) as my_month"))
           // ->groupBy(DB::raw("(DATE_TRUNC('month',created_at))"))
            ->where('status',1)
            ->where('is_cable',1)
			// ->whereMonth(DB::raw("(DATE_TRUNC('day',created_at))"), '=',$month)
            // ->whereDate(DB::raw("(DATE_TRUNC('day',created_at))"), '=', date('Y-m-d'))
            // ->orderBy(DB::raw("(DATE_TRUNC('day',created_at))"),'DESC')
            ->orderBy('year', 'desc')
           ->get(); 
         $cabmemonth_amount = DB::table('sales_orders')
            ->where('status',1)
            ->where('is_cable',1)
			//->whereMonth(DB::raw("(DATE_TRUNC('day',created_at))"), '=',$month)
            ->sum('amount'); 
			
		$othermonth_order = DB::table('sales_orders')
		       ->select(DB::raw('SUM(sales_orders.amount) as total_amount'),
			  DB::raw("(DATE_TRUNC('year',created_at)) as year"),DB::raw("(DATE_TRUNC('month',created_at)) as month"))
           ->groupby('year','month')
           // ->select(DB::raw('SUM(sales_orders.amount) as total_amount'),DB::raw("(DATE_TRUNC('month',created_at)) as my_month1"))
            //->groupBy(DB::raw("(DATE_TRUNC('month',created_at))"))
            ->where('status',1)
            ->where('is_cable',0)
			 //->whereMonth(DB::raw("(DATE_TRUNC('day',created_at))"), '=',$month)
            // ->whereDate(DB::raw("(DATE_TRUNC('day',created_at))"), '=', date('Y-m-d'))
            // ->orderBy(DB::raw("(DATE_TRUNC('day',created_at))"),'DESC')
              ->orderBy('year', 'desc')
           ->get(); 
         $othermonth_amount = DB::table('sales_orders')
            ->where('status',1)
            ->where('is_cable',0)
			//->whereMonth(DB::raw("(DATE_TRUNC('day',created_at))"), '=',$month)
            ->sum('amount'); 
         $confermorder_Total=DB::table('sales_orders')
               ->groupBy('invoice')
              ->where('status',1)			   
             ->count('invoice');
			
         $all_confermorder = DB::table('sales_orders')           
            
            ->select('product_code',DB::raw('SUM(qty) as total_qty'),'product')
            ->groupBy('product_code','product')
            ->where('status',1)
           // ->orderBy('id','DESC')
             ->get();			
			
		 $order_Total=DB::table('sales_orders')
               ->groupBy('invoice')
              ->where('status',NULL)			   
             ->count('invoice');
         $all_order = DB::table('sales_orders')           
            
            ->select('product_code',DB::raw('SUM(qty) as total_qty'),'product')
            ->groupBy('product_code','product')
            ->where('status',NULL)
           // ->orderBy('id','DESC')
             ->get();
			 //cable
			  $cable_order_month = DB::table('sales_orders')
             ->where('status',1)
             ->where('is_cable',1)
			 ->whereMonth('created_at', '=', date('m'))          
             ->orderBy('id','DESC')
             ->get(); 
			 
			  $cable_totalamount_month = DB::table('sales_orders')
             ->where('status',1)
             ->where('is_cable',1)
			 ->whereMonth('created_at', '=', date('m'))          
             ->orderBy('id','DESC')
             ->sum('amount'); 
		//Other
			  $other_order_month = DB::table('sales_orders')
             ->where('status',1)
             ->where('is_cable',0)
			 ->whereMonth('created_at', '=', date('m'))          
             ->orderBy('id','DESC')
             ->get();
			 
             $other_totalamount_month = DB::table('sales_orders')
             ->where('status',1)
             ->where('is_cable',0)
			 ->whereMonth('created_at', '=', date('m'))          
             ->orderBy('id','DESC')
             ->sum('amount');			 

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
		return view('admin.home',compact('order_today','order_currentMonth','order_currentYear','order_Total','Totalamount_today','Totalamount_currentMonth','Totalamount_currentYear','Totalamount','collection_today','due_today','collection_currentMonth','due_currentMonth','collection_currentYear','due_currentYear','collection_Total','due_Total','monthName','year','low_products','sales_order_today_count','sales_order_today','low_qty_count','confermorder_today_count','confermorder_today','todays_cullection','todays_cullection_count','cullection_Bydate','srbutton','all_order','cable_order_month','cable_totalamount_month','other_order_month','other_totalamount_month','cabmemonth_order','cabmemonth_amount','othermonth_order','othermonth_amount','psv' ,'confermorder_Total','all_confermorder'));
    }
}
