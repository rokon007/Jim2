@extends('admin.admin-master')
@section('Wholesale') active show-sub @endsection
@section('add_customer') active @endsection
@section('admin_content')







<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="index.html">Admin</a>
      <span class="breadcrumb-item active">Add New Customer</span>
    </nav>

    <div class="sl-pagebody">
      <div class="row row-sm">
      
        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Add New Customer</h6>
       <form class="form-horizontal" action="{{ url('admin/add_customer') }}" method="POST" enctype="multipart/form-data">
            @csrf
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
                    <input class="form-control" type="text" name="shop_name"  placeholder="Shop Name" required>
                    @error('shop_name')
                       <strong class="text-danger">{{ $message }}</strong> 
                    @enderror
                  </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">Customer Name: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="customer_name" required placeholder="Customer Name">
                    @error('customer_name')
                    <strong class="text-danger">{{ $message }}</strong> 
                    @enderror
                  </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">Customer address: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="customer_adderss" required placeholder="Customer address">
                    @error('customer_adderss')
                    <strong class="text-danger">{{ $message }}</strong> 
                    @enderror
                  </div>
                </div><!-- col-4 -->

                <div class="col-lg-4">
                    <div class="form-group">
                      <label class="form-control-label">Customer Phone: <span class="tx-danger">*</span></label>
                      <input class="form-control" type="number" name="customer_phone" required placeholder="Customer Phone">
                      @error('customer_phone')
                      <strong class="text-danger">{{ $message }}</strong> 
                      @enderror
                    </div>
                  </div><!-- col-4 -->
               
                <div class="col-lg-4">
                    <div class="form-group">
                      <label class="form-control-label">Total Amount: <span class="tx-danger">*</span></label>
                      <input class="form-control" type="number" name="total_amount" required placeholder="Total Amount">
                      @error('total_amount')
                      <strong class="text-danger">{{ $message }}</strong> 
                      @enderror
                    </div>
                  </div><!-- col-4 -->
              
               <!-- col-4 -->
                 <div class="col-lg-4">
                    <div class="form-group">
                      <label class="form-control-label">Total Paid: <span class="tx-danger">*</span></label>
                      <input class="form-control" type="number" name="total_paid" required placeholder="Total Paid">
                      @error('total_paid')
                      <strong class="text-danger">{{ $message }}</strong> 
                      @enderror
                    </div>
                  </div><!-- col-4 -->
				  <div class="col-lg-4">
                    <div class="form-group">
                      <label class="form-control-label">Total Due: <span class="tx-danger">*</span></label>
                      <input class="form-control" type="number" name="total_deu" required placeholder="Total Due">
                      @error('total_deu')
                      <strong class="text-danger">{{ $message }}</strong> 
                      @enderror
                    </div>
                  </div>
				   <div class="col-lg-4">
                    <div class="form-group">
                      <label class="form-control-label">SR: <span class="tx-danger">*</span></label>
                     <select class="form-control" name="sr" required>
					 <option value="">Select SR name</option>
					@foreach ($sr as $newsr)
					 <option value="{{$newsr->name}}">{{$newsr->name}}<option>
					@endforeach 
					 </select>
                      @error('sr')
                      <strong class="text-danger">{{ $message }}</strong> 
                      @enderror
                    </div>
                  </div>


                 
                  
                <div class="col-lg-4">
                    <div class="form-group">
                      <label class="form-control-label">Customer Image: <span class="tx-danger">*</span></label>
                      <input class="form-control" type="file" name="image" >
                      @error('image_one')
                      <strong class="text-danger">{{ $message }}</strong> 
                      @enderror
                    </div>
                  </div><!-- col-4 -->

                 

                            
                  
              </div><!-- row -->
  
              <div class="form-layout-footer">
                <button type="submit" class="btn btn-info mg-r-5">Add Customer</button>
              </div><!-- form-layout-footer -->
            </form>
            </div><!-- form-layout -->
          </div><!-- card -->
    </div>

</div>

<!--================================-->



    
@endsection