@extends('admin.admin-master')
@section('Jim Customer Create') active @endsection
@section('admin_content')







<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="index.html">Admin</a>
      <span class="breadcrumb-item active">Update Customer</span>
    </nav>

    <div class="sl-pagebody">
      <div class="row row-sm">
      
        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Update Customer</h6>
       <form class="form-horizontal" action="{{ url('admin/update_customer/'.$customer->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
               
                @method('PUT')
            <div class="form-layout">
			<?php
        $message = Session::get('message');
        if($message)
        {
			?>
			 <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong><?php  echo $message; ?></strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
         
		  <?php
          Session::put('message',null);

        }
        ?>
                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{session('success')}}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  @endif
              <div class="row mg-b-25">
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">Shop Name: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="shop_name"   value="{{ $customer->shop_name }}" required>
                    @error('shop_name')
                       <strong class="text-danger">{{ $message }}</strong> 
                    @enderror
                  </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">Customer Name: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="customer_name" value="{{ $customer->customer_name }}">
                    @error('product_code')
                    <strong class="text-danger">{{ $message }}</strong> 
                    @enderror
                  </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">Customer address: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="customer_adderss" value="{{ $customer->customer_adderss }}" required >
                    @error('price')
                    <strong class="text-danger">{{ $message }}</strong> 
                    @enderror
                  </div>
                </div><!-- col-4 -->

                <div class="col-lg-4">
                    <div class="form-group">
                      <label class="form-control-label">Customer Phone: <span class="tx-danger">*</span></label>
                      <input class="form-control" type="number" name="customer_phone" value="{{ $customer->customer_phone }}" required>
                      @error('product_quantity')
                      <strong class="text-danger">{{ $message }}</strong> 
                      @enderror
                    </div>
                  </div><!-- col-4 -->
               
                <div class="col-lg-4">
                    <div class="form-group">
                      <label class="form-control-label">Total Amount: <span class="tx-danger">*</span></label>
                      <input class="form-control" type="number" name="total_amount" value="{{ $customer->total_amount }}" required>
                      @error('product_quantity')
                      <strong class="text-danger">{{ $message }}</strong> 
                      @enderror
                    </div>
                  </div><!-- col-4 -->
              
               <!-- col-4 -->
                 <div class="col-lg-4">
                    <div class="form-group">
                      <label class="form-control-label">Total Paid: <span class="tx-danger">*</span></label>
                      <input class="form-control" type="number" name="total_paid" value="{{ $customer->total_paid }}" required>
                      @error('product_quantity')
                      <strong class="text-danger">{{ $message }}</strong> 
                      @enderror
                    </div>
                  </div><!-- col-4 -->
				  <div class="col-lg-4">
                    <div class="form-group">
                      <label class="form-control-label">Total Due: <span class="tx-danger">*</span></label>
                      <input class="form-control" type="number" name="total_deu" value="{{ $customer->total_deu }}" required>
                      @error('product_quantity')
                      <strong class="text-danger">{{ $message }}</strong> 
                      @enderror
                    </div>
                  </div>


                 
                  
                <div class="col-lg-4">
                    <div class="form-group">
                      <label class="form-control-label">Customer Image: <span class="tx-danger">*</span></label>
                      <input class="form-control"  name="image"  type="file" required >
                      @error('image_one')
                      <strong class="text-danger">{{ $message }}</strong> 
                      @enderror
                    </div>
                  </div><!-- col-4 -->

                 

                            
                  
              </div><!-- row -->
  
              <div class="form-layout-footer">
                <button type="submit" class="btn btn-info mg-r-5">Update Customer</button>
              </div><!-- form-layout-footer -->
            </form>
            </div><!-- form-layout -->
          </div><!-- card -->
    </div>

</div>

<!--================================-->



    
@endsection