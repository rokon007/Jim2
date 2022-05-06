<?php

namespace App\Http\Controllers;

use App\Models\CustomerInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class CustomerController extends Controller
{
    public function create()
    {
        return view('customer.create');
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
        $customer->created_by = Auth::user()->name;
        $customer->save();
    
            return redirect()->back()->with('message','গ্রাহকের নামটি সংরক্ষীত হল।');

    }

    public function index()
    {
       
        $customers= CustomerInfo::all();
        return view('customer.index',compact('customers'));
    }



    public function edit($customer)
    {
         $customer = CustomerInfo::find($customer);
       
        return view('customer.edit',compact('customer'));
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
        $customer->created_by = Auth::user()->name;
        $customer->update();

        return redirect('admin/all_customer')->with('message','গ্রাহকের নামটি পুর্নরায় সংরক্ষীত হল।');
    }
}
