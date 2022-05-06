@extends('layouts.master')
@section('title','Jim Product Create')
@section('content')

<!-- start: Mobile Specific -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- end: Mobile Specific -->

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
   
  @if($errors->any())
  <div class="alert alert-danger" > 
    @foreach ($errors->all() as $error)
    <div>{{ $error }}</div>
@endforeach
</div>
  @endif
            <form class="form-horizontal" action="{{ url('admin/products') }}" method="POST" enctype="multipart/form-data">
                @csrf
              <fieldset>

                <div class="control-group">
                    <label class="control-label">কোড নংঃ </label>
                    <div class="controls">
                      <input type="text" class="span6 typeahead" name="product_code" id="product_code"  >
                    
                    </div>
                  </div>

                <div class="control-group">
                  <label class="control-label" for="typeahead">পন্যের নামঃ </label>
                  <div class="controls">
                    <input type="text" class="span6 typeahead" name="product_name" id="product_name"   >
                   
                  </div>
                </div>

              
              <div class="control-group">
                <label class="control-label" for="typeahead">মূল্যঃ </label>
                <div class="controls">
                  <input type="text" class="span6 typeahead" name="product_price" id="product_price"   >
                 
                </div>
              </div>
                
              <div class="control-group">
                <label class="control-label" for="typeahead">পরিমানঃ </label>
                <div class="controls">
                  <input type="text" class="span6 typeahead" name="product_quantity" id="product_quntity"   >
                 
                </div>
              </div>

                <div class="form-actions">
                  <button type="submit" class="btn btn-primary">Save Product</button>
                  <button type="reset" class="btn btn-danger">Cancel</button>
                </div>
              </fieldset>
            </form>   

        </div>
    </div><!--/span-->

</div><!--/row-->


    
@endsection