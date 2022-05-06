<?php

namespace App\Http\Controllers\admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ProductsController extends Controller
{
    public function create()
    {
        //$groups = Group::all();
        return view('products.create');

    }

    public function store(Request $request)
    {
        
        //$data = $request->validated();
        $product = new Product();
       
        $product->product_code =$request->product_code;
        
        $product->product_name = $request->product_name;
        
        $product->product_price =$request->product_price;
        
        $product->product_quantity = $request->product_quantity;

        //if($request->hasfile('image')){
            //$file = $request->file('image');
            //$filename = time().'.'. $file->getClientOriginalExtension();
            //$file->move('upload/product/', $filename);
            //$product->image = $filename;
        //}
            
            $product->status = $request->status == true ? '0':'1';
            $product->created_by = Auth::user()->name;
            $product->save();
    
            return redirect()->back()->with('message','Product Added Successfully');

    }


    public function index()
    {
        //$groups = Group::all();
        $products = Product::all();
        return view('products.index',compact('products'));
    }

    public function change_status($product)
    {
        $products = Product::find($product);
        if( $products->status==1)
        {
            $products->update(['status'=>0]);
        }
        else
        {
            $products->update(['status'=>1]);
        }
        return redirect()->back()->with('message','Status Change Successfully');
    }

    public function edit($product)
    {
         $products = Product::find($product);
        //$groups = Group::all();
        return view('products.edit',compact('products'));
    }

    public function update(Request $request,$product)
    {
       
        //$data = $request->validated();
        $products = Product::find($product);
       
        $products->product_code =$request->product_code;
        
        $products->product_name = $request->product_name;
        
        $products->product_price =$request->product_price;
        
        $products->product_quantity = $request->product_quantity;

        //if($request->hasfile('image')){

            //$destinstion = 'upload/product/'.$products->image;
           // if(File::exists($destinstion))
            //{
            //    File::delete($destinstion);
           // }

            //$file = $request->file('image');
            //$filename = time().'.'. $file->getClientOriginalExtension();
            //$file->move('upload/product/', $filename);
            //$products->image = $filename;
       // }
        $products->status = $request->status == true ? '0':'1';
        $products->created_by = Auth::user()->name;
        $products->update();

        return redirect('admin/all_products')->with('message','Product Update Successfully');
    }


    public function delete($product)
    {
        $products = Product::find($product);

       // $destinstion = 'upload/product/'.$products->image;
        //if(File::exists($destinstion))
       // {
          //  File::delete($destinstion);
        //}

        if($products)
        {
            $products->delete();
            return redirect()->back()->with('message','Product Delete Successfully');
        }
        
       
    }
	public function productList()
    {
        $products = Product::all();

        return view('sales_product.new', compact('products'));
    }

}
