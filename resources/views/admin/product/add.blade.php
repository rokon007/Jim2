@extends('admin.admin-master')
@section('products') active show-sub @endsection
@section('add-products') active @endsection
@section('admin_content')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="index.html">Admin</a>
      <span class="breadcrumb-item active">Add Products</span>
    </nav>

    <div class="sl-pagebody">
      <div class="row row-sm">
      
        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Add New Products</h6>
        <form action="{{ route('store-products') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-layout">
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
                    <label class="form-control-label">Product Name: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="product_name" value="{{ old('product_name') }}" placeholder="product name">
                    @error('product_name')
                       <strong class="text-danger">{{ $message }}</strong> 
                    @enderror
                  </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">product_code: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="product_code" value="{{ old('product_code') }}" placeholder="product code">
                    @error('product_code')
                    <strong class="text-danger">{{ $message }}</strong> 
                    @enderror
                  </div>
                </div><!-- col-4 -->


                 <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">Is Cable: <span class="tx-danger">*</span></label>
                   <label class="ckbox">
                <input type="checkbox" name="is_cable"><span>If it's cable pls checked</span>
              </label>
                  </div>
                </div>


                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">Price: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="price" value="{{ old('price') }}" placeholder="product price">
                    @error('price')
                    <strong class="text-danger">{{ $message }}</strong> 
                    @enderror
                  </div>
                </div><!-- col-4 -->

                <div class="col-lg-4">
                    <div class="form-group">
                      <label class="form-control-label">Quantity: <span class="tx-danger">*</span></label>
                      <input class="form-control" type="number" name="product_quantity" value="{{ old('product_quantity') }}" placeholder="product quantity">
                      @error('product_quantity')
                      <strong class="text-danger">{{ $message }}</strong> 
                      @enderror
                    </div>
                  </div><!-- col-4 -->

                  <div class="col-lg-4">
                    <div class="form-group">
                      <label class="form-control-label">Low Quantity: <span class="tx-danger">*</span></label>
                      <input class="form-control" type="number" name="lowquantity_alart" value="{{ old('lowquantity_alart') }}" placeholder="low Quantity">
                      @error('lowquantity_alart')
                      <strong class="text-danger">{{ $message }}</strong> 
                      @enderror
                    </div>
                  </div><!-- col-4 -->
               
                
              
               
                 


                  

                  
               

                 

                               
                  
              </div><!-- row -->
  
              <div class="form-layout-footer">
                <button class="btn btn-info mg-r-5">Add Products</button>
              </div><!-- form-layout-footer -->
            </form>
            </div><!-- form-layout -->
          </div><!-- card -->
    </div>

</div>
@endsection