<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Comment;
use Auth;
use DB;
use Carbon\Carbon;
use App\Models\Product;

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
	 public function admin_index()
    {
        $order_today = DB::table('sales_orders')             
            ->whereDate('created_at', '=', date('Y-m-d'))            
             ->count('invoice');  
             
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
		
        $products = Product::orderBy('id','DESC')->get();

		return view('admin.home',compact('order_today','order_currentMonth','order_currentYear','order_Total','Totalamount_today','Totalamount_currentMonth','Totalamount_currentYear','Totalamount','collection_today','due_today','collection_currentMonth','due_currentMonth','collection_currentYear','due_currentYear','collection_Total','due_Total','monthName','year','products'));
    }
}
