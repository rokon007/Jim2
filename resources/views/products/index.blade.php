@extends('layouts.master')
@section('title','Jim Product Index')
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
              <tr>
                <th style="width: 10%">কোড নং</th>
                <th style="width: 30%">সামগ্রীর নাম</th>
                <th style="width: 15%"> মূল্য</th>
                <th style="width: 15%"> পরিমান</th>
                <th style="width: 15%">Status</th>
                <th style="width: 15%">Actions</th>
              </tr>
            </tr>
          </thead>   
          <tbody>
            @foreach ($products as $item)
            <tr>
              <td class="center">{{ $item->product_code }}</td>
              <td class="center"> {{ $item->product_name }} </td>
              <td class="center"> {{ $item->product_price }} </td>
              <td class="center"> {{ $item->product_quantity }} </td>
              <td class="center">
                 @if ($item->status==1)
                    <span class="label label-success">আছে</span>
                  @else()
                       <span class="label label-danger">নাই</span>
                  @endif
              </td>
            <td class="center">
             
                @if ($item->status==1)
              <a href="{{ url('admin/product_status/'.$item->id) }}" class="btn btn-success">
                <i class="halflings-icon white thumbs-up"></i>  
              </a>
              @else()
              <a href="{{ url('admin/product_status/'.$item->id) }}" class="btn btn-danger">
                <i class="halflings-icon white thumbs-down"></i>  
              </a>
              @endif
            
                <a class="btn btn-info" href="{{ url('admin/edit_products/'.$item->id) }}">
                  <i class="halflings-icon white edit"></i>  
                </a>
             
                <a class="btn btn-danger" href="{{ url('admin/delete_products/'.$item->id) }}">
                  <i class="halflings-icon white trash"></i> 
                </a>
				 <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{ $item->id }}" name="id">
                        <input type="hidden" value="{{ $item->product_name }}" name="name">
                        <input type="hidden" value="{{ $item->product_price }}" name="price">
                        <input type="hidden" value="{{ $item->product_code }}"  name="image">
                        <input type="hidden" value="1" name="quantity">
                        <button class="btn btn-warning"><i class="icon-shopping-cart"></i></button>
                    </form>
            
             
            </td>
			
          </tr>
          @endforeach
        
          </tbody>
        </table>            
      </div>
    
    </div>
  </div><!--/row-->
@endsection