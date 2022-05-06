@extends('layouts.master')
@section('title','Jim Product Edit')
@section('content')

    @if($errors->any())
        <div class="alert alert-danger"> 
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        </div>
    @endif

<!-- start: Mobile Specific -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- end: Mobile Specific -->

<noscript>
  <div class="alert alert-block span10">
    <h4 class="alert-heading">Warning!</h4>
    <p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
  </div>
</noscript>

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
        <h2><i class="halflings-icon user"></i><span class="break"></span>Edit Product</h2>
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

            <form class="form-horizontal" action="{{ url('admin/update_products/'.$products->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
              <fieldset>
                <div class="control-group">
                    <label class="control-label">কোড নংঃ </label>
                    <div class="controls">
                      <input type="text" class="span6 typeahead" name="product_code" id="product_code" value="{{ $products->product_code }}" >
                    
                    </div>
                  </div>

                <div class="control-group">
                  <label class="control-label" for="typeahead">পন্যের নামঃ </label>
                  <div class="controls">
                    <input type="text" class="span6 typeahead" name="product_name" id="product_name"  value="{{ $products->product_name }}"  >
                   
                  </div>
                </div>
                
                <div class="control-group">
                  <label class="control-label" for="typeahead">মূল্যঃ  </label>
                  <div class="controls">
                    <input type="text" class="span6 typeahead" name="product_price" id="product_price"  value="{{ $products->product_price }}"  >
                   
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label" for="typeahead">পরিমানঃ </label>
                  <div class="controls">
                    <input type="text" class="span6 typeahead" name="product_quantity" id="product_quantity"  value="{{ $products->product_quantity }}"  >
                   
                  </div>
                </div>
                <div class="form-actions">
                  <button type="submit" class="btn btn-primary">Update Product</button>
                  <button type="reset" class="btn btn-danger">Cancel</button>
                </div>
              </fieldset>
            </form>   
        
        
          </div>
    </div><!--/span-->
 
</div><!--/row-->

    
@endsection