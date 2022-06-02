@extends('admin.admin-master')
@section('products') active show-sub @endsection
@section('manage-products') active @endsection
@section('admin_content')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="index.html">Admin</a>
      <span class="breadcrumb-item active">Uupdate Products</span>
    </nav>

    <div class="sl-pagebody">
      <div class="row row-sm">
      
        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Update Products</h6>
        <form action="{{ route('update-products') }}" method="POST" >
            @csrf
            <input type="hidden" name="id" value="{{ $product->id }}">
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
                    <input class="form-control" type="text" name="product_name" value="{{ $product->product_name }}" placeholder="product name">
                    @error('product_name')
                       <strong class="text-danger">{{ $message }}</strong> 
                    @enderror
                  </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">product_code: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="product_code" value="{{ $product->product_code }}" placeholder="product code">
                    @error('product_code')
                    <strong class="text-danger">{{ $message }}</strong> 
                    @enderror
                  </div>
                </div><!-- col-4 -->

                 @if($product->is_cable==1)
                 <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">Is Cable: <span class="tx-danger">*</span></label>
                   <label class="ckbox">
                <input type="checkbox" name="is_cable" checked=""><span>If it's cable pls checked</span>
              </label>
                  </div>
                </div>
                @else
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">Is Cable: <span class="tx-danger">*</span></label>
                   <label class="ckbox">
                <input type="checkbox" name="is_cable"><span>If it's cable pls checked</span>
              </label>
                  </div>
                </div>
                @endif
                 

                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">Price: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="price" value="{{ $product->price }}" placeholder="product price">
                    @error('price')
                    <strong class="text-danger">{{ $message }}</strong> 
                    @enderror
                  </div>
                </div><!-- col-4 -->

                <div class="col-lg-4">
                    <div class="form-group">
                      <label class="form-control-label">Quantity: <span class="tx-danger">*</span></label>
                      <input class="form-control" type="number" name="product_quantity" value="{{ $product->product_quantity }}" placeholder="product quantity">
                      @error('product_quantity')
                      <strong class="text-danger">{{ $message }}</strong> 
                      @enderror
                    </div>
                  </div><!-- col-4 -->

                  <div class="col-lg-4">
                    <div class="form-group">
                      <label class="form-control-label">Low Quantity: <span class="tx-danger">*</span></label>
                      <input class="form-control" type="number" name="lowquantity_alart" value="{{ $product->lowquantity_alart }}">
                      @error('lowquantity_alart')
                      <strong class="text-danger">{{ $message }}</strong> 
                      @enderror
                    </div>
                  </div><!-- col-4 -->
               
                
              
               
                  

                  
               
                  
              </div><!-- row -->
             
              <button class="btn btn-info mg-r-5" type="submit">Udpate Data</button>

          </form>

         
            </div><!-- form-layout -->
          </div><!-- card -->
    </div>

</div>
@endsection