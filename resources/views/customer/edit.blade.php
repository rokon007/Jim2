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
  <li><a href="{{ url('admin/all_customer') }}">View Customer</a></li>
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
            <form class="form-horizontal" action="{{ url('admin/update_customer/'.$customer->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
               
                @method('PUT')
              <fieldset>
                <div class="control-group">
                    <label class="control-label">দোকানের নামঃ  </label>
                    <div class="controls">
                      <input type="text" class="span6 typeahead" name="shop_name" value="{{ $customer->shop_name }}" required  >
                    
                    </div>
                  </div>
                <div class="control-group">
                  <label class="control-label" for="typeahead">প্রোপাইটার নামঃ</label>
                  <div class="controls">
                    <input type="text" class="span6 typeahead" name="customer_name" value="{{ $customer->customer_name }}" required   >
                   
                  </div>
                </div>

                <div class="control-group">
                  <label class="control-label" for="typeahead">ঠিকানাঃ </label>
                  <div class="controls">
                    <input type="text" class="span6 typeahead" name="customer_adderss" value="{{ $customer->customer_adderss }}" required >
                   
                  </div>
                </div>
              
              <div class="control-group">
                <label class="control-label" for="typeahead"> মোবাইল নং</label>
                <div class="controls">
                  <input type="text" class="span6 typeahead" name="customer_phone" value="{{ $customer->customer_phone }}" required >
                 
                </div>
              </div>
                

               <div class="control-group">
                <label class="control-label" for="typeahead">মোট টাকাঃ </label>
                <div class="controls">
                  <input type="text" class="span6 typeahead" name="total_amount" value="{{ $customer->total_amount }}" required  >
                 
                </div>
              </div>

              <div class="control-group">
                <label class="control-label" for="typeahead">মোট জমাঃ</label>
                <div class="controls">
                  <input type="text" class="span6 typeahead" name="total_paid" value="{{ $customer->total_paid }}" required  >
                 
                </div>
              </div>

              <div class="control-group">
                <label class="control-label" for="typeahead">মোট বাকিঃ </label>
                <div class="controls">
                  <input type="text" class="span6 typeahead" name="total_deu" value="{{ $customer->total_deu }}" required  >
                 
                </div>
              </div>

                <div class="control-group">
                    <label class="control-label" for="fileInput">ছবিঃ</label>
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