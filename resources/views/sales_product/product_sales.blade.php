@extends('layouts.master')

@section('title','Jim Product Create')
@section('content')

<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="index.html">Home</a> 
        <i class="icon-angle-right"></i>
    </li>
    <li><a href="{{ url('admin/view_product') }}">View Product</a></li>
</ul>
  

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon user"></i><span class="break"></span>Add Product</h2>
                <div class="box-icon">
                    <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                    <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                    <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                </div>
               @include('layouts.inc.message')
        </div>


        <div class="box-content">
            <div class="">
                <div class="c"></div>
            </div>
   
            @if($errors->any())
              <div class="alert alert-danger" > 
                @foreach ($errors->all() as $error)
                  <div>{{ $error }}</div>
                 @endforeach
              </div>
            @endif
           
                    
                        
                       
                      
                      <fieldset>
                        <div class="" style="margin-left: 50% ">
                            <img style="margin-left: 5%" src="{{ asset('upload/customer/'.$customer->image) }}" width="120px" height="120px" alt="img">
                          </div>
                          <div class="" style="margin-left: 50% ">
                            <label  >দোকানের নামঃ  {{ $customer->shop_name }} </label>
                          </div>
                          <div class="" style="margin-left: 50% ">
                            <label  >প্রোপাইটার নামঃ   {{ $customer->customer_name }} </label>
                          </div>
                          <div class="" style="margin-left: 50% ">
                            <label  >ঠিকানাঃ   {{ $customer->customer_adderss }}</label>
                          </div>
                    
                            
                          <div class="" style="margin-left: 50% ">
                            <label  >মোবাইল নং  {{ $customer->customer_phone }}</label>
                          </div>
                         
                          <div class="" style="margin-left: 50% ">
                            <label  >মোট টাকাঃ  {{ $customer->total_amount }} </label>
                          </div>
                          
                          <div class="" style="margin-left: 50% ">
                            <label  >মোট বাকিঃ  {{ $customer->total_deu }} </label>
                          </div>
                          
                          <div class="box-content">
       
                            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                              <thead>
                                <tr>
                                  <tr >
                                    <th style="width: 10%">কোড নং</th>
                                    <th style="width: 30%">সামগ্রীর নাম</th>
                                    <th style="width: 15%"> মূল্য</th>
                                    <th style="width: 15%"> স্টক</th>
                                    <th style="width: 5%"> পরিমান</th>
                                    <th style="width: 15%"> মোট</th>
                                    <th style="width: 15%" > বিক্রয়</th>
                                   
                                  </tr>
                                </tr>
                              </thead>   
                              <tbody>
                                @foreach ($products as $item)
                                <tr>
                                  <td class="center" style="text-align: center" >{{ $item->product_code }}</td>
                                  <td class="center" style="text-align: center" > {{ $item->product_name }} </td>
                                  <td class="center" style="text-align: center" > {{ $item->product_price }} </td>
                                  <td class="center" style="text-align: center" > {{ $item->product_quantity }} </td>
                                  <td class="center" style="text-align: center" > <input style="text-align: center" width="5%" type="text" name="qty" id="qty1" value="1"></td>
                                  <td class="center" style="text-align: center" > {{ $item->product_quantity }} </td>
                                  <td style="text-align: center" >
                                 
                                      
										
										 <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{ $item->id }}" name="id">
                        <input type="hidden" value="{{ $item->product_name }}" name="name">
                        <input type="hidden" value="{{ $item->product_price }}" name="price">
                        <input type="hidden" value="{{ $item->product_code }}"  name="product_code">
                        <input type="hidden" value="1" name="quantity">
						 <input type="hidden" value="admin/selas_pro/{{ $item->id }}" name="ad">
                          <button type="submit" class="btn btn-warning"><i class="icon-shopping-cart">Add to Cart</i></button>
                    </form>
                                       
                                      
                                  </td>           
                               
                              </tr>
                              @endforeach
                            
                              </tbody>
                            </table>            
                          </div>
                        
                       
                      </fieldset>
        
                    
        
                </div>

    </div>
</div>

@endsection