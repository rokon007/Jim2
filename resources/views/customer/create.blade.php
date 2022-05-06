@extends('layouts.master')
@section('title','Jim Customer Create')
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
  <li><a href="{{ url('admin/view_product') }}">View Customer</a></li>
</ul>

	
 
<div class="row-fluid sortable">
  <div class="box span12">
   <div class="box-header" data-original-title>
  <h2><i class="halflings-icon user"></i><span class="break"></span>Add Customer</h2>
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
   
  @if($errors->any())
  <div class="alert alert-danger" > 
    @foreach ($errors->all() as $error)
    <div>{{ $error }}</div>
@endforeach
</div>
  @endif
            <form class="form-horizontal" action="{{ url('admin/add_customer') }}" method="POST" enctype="multipart/form-data">
                @csrf
              <fieldset>
                <div class="control-group">
                    <label class="control-label">Shop Name </label>
                    <div class="controls">
                      <input type="text" class="span6 typeahead" name="shop_name" required  >
                    
                    </div>
                  </div>

                <div class="control-group">
                  <label class="control-label" for="typeahead">Customer Name </label>
                  <div class="controls">
                    <input type="text" class="span6 typeahead" name="customer_name" required   >
                   
                  </div>
                </div>

                <div class="control-group">
                  <label class="control-label" for="typeahead">Customer address </label>
                  <div class="controls">
                    <input type="text" class="span6 typeahead" name="customer_adderss" required >
                   
                  </div>
                </div>
              
              <div class="control-group">
                <label class="control-label" for="typeahead">Customer Phone </label>
                <div class="controls">
                  <input type="text" class="span6 typeahead" name="customer_phone" required >
                 
                </div>
              </div>
                

               <div class="control-group">
                <label class="control-label" for="typeahead">Total Amount </label>
                <div class="controls">
                  <input type="text" class="span6 typeahead" name="total_amount" required  >
                 
                </div>
              </div>

              <div class="control-group">
                <label class="control-label" for="typeahead">Total Paid </label>
                <div class="controls">
                  <input type="text" class="span6 typeahead" name="total_paid" required  >
                 
                </div>
              </div>

              <div class="control-group">
                <label class="control-label" for="typeahead">Total Due </label>
                <div class="controls">
                  <input type="text" class="span6 typeahead" name="total_deu" required  >
                 
                </div>
              </div>

                <div class="control-group">
                    <label class="control-label" for="fileInput">Customer Image</label>
                    <div class="controls">
                      <input class="input-file uniform_on" name="image"  type="file" required>
                    </div>
                  </div>   

                <div class="form-actions">
                  <button type="submit" class="btn btn-primary">Save</button>
                  <button type="reset" class="btn btn-danger">Cancel</button>
                </div>
              </fieldset>
            </form>   

        </div>
    </div><!--/span-->

</div><!--/row-->


    
@endsection