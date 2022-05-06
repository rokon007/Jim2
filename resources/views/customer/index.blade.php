@extends('layouts.master')
@section('title','Jim Customer Index')
@section('content')

<ul class="breadcrumb">
    <li>
      <i class="icon-home"></i>
      <a href="index.html">Home</a> 
      <i class="icon-angle-right"></i>
    </li>
    <li><a href="{{ url('admin/add_product') }}">Add Product</a></li>
  </ul>


  

  <div class="row-fluid sortable">
    <div class="box span12">		
      <div class="box-header" data-original-title>


        

    <h2><i class="halflings-icon user"></i><span class="break"></span>View Product</h2>
        <div class="box-icon">
          <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
          <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
          <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
        </div>
        <p class="alert-success" style="margin-left: 35% ">
          <?php
          $message = Session::get('message');
          if($message)
          {
            echo $message;
            Session::put('message',null);

          }
          ?>
        </p>
      </div>
     
      <div class="box-content">
       
        <table class="table table-striped table-bordered bootstrap-datatable datatable">
          <thead>
            <tr>
            
              <th style="width: 15%">দোকানের নাম</th>
              <th style="width: 15%">প্রোঃ নাম</th>
              <th style="width: 15%"> ঠিকানা</th>
              <th style="width: 10%"> মোবাইল নং</th>
              <th style="width: 10%">মোট টাকা </th>
              <th style="width: 10%">মোট জমা</th>
              <th style="width: 10%">মোট বাকি</th>
              <th style="width: 10%">ছবি</th>
              <th style="width: 10%">প্রফাইল</th>
            </tr>
          </thead>   
          <tbody>
            @foreach ($customers as $customer)
            <tr>
              <td class="center">

                <a class="submenu" href="{{url('admin/selas_pro/'.$customer->id) }}">
                 
                  <span class="hidden-tablet" style="color: blue"> {{ $customer->shop_name }}</span></a>
                
               </td>
              <td class="center"> {{ $customer->customer_name}} </td>
              <td class="center"> {{ $customer->customer_adderss }} </td>
              <td class="center"> {{ $customer->customer_phone }} </td>
              <td class="center"> {{ $customer->total_amount }}.00 </td>
              <td class="center"> {{ $customer->total_paid }}.00 </td>
              <td class="center"> {{ $customer->total_deu }}.00 </td>
            <td class="center">
            <img src="{{ asset('upload/customer/'.$customer->image) }}" width="35px" height="35px" alt="img">
            </td>
            <td class="center">
                <a class="btn btn-info" href="{{ url('admin/edit_customer/'.$customer->id) }}">
                  <i class="halflings-icon white edit"></i>  
                </a>
              @csrf
            </td>
          </tr>
          @endforeach
        
          </tbody>
        </table>            
      </div>
    
    </div>
  </div><!--/row-->
@endsection