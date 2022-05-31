@extends('admin.admin-master')
@section('products') active show-sub @endsection
@section('manage-products') active @endsection
@section('admin_content')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="index.html">Admin</a>
      <span class="breadcrumb-item active">whole sale</span>
    </nav>
 
      <div class="row row-sm">
        <div class="col-md-12">  
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
				 <script>
		Push.create("Jim Eladtric", {
    body: "<?php  echo $message; ?>",
    icon: '/backend/img/jim_logo.png',
    timeout: 11000,
    onClick: function () {
        window.focus();
        this.close();
    }
});
		</script>        
         
		  <?php
          Session::put('message',null);

        }
        ?>
		
		 <?php
        $view_cart = Session::get('view_cart');
        if($view_cart)
        {
			?>
			<script type="text/javascript" src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
			 <script>
$(function() {
    $('#myModal').modal('show');
});
</script>

		  <?php
          Session::put('message',null);

        }
        ?>
		
		  <div class="sl-pagebody">
              <div class="card pd-20 pd-sm-40">
			  
			  <div class="row">
			 
			  <div class="col-sm-6 col-xl-7 mg-t-20 mg-sm-t-0">
            <div class="card pd-20 pd-sm-25 bg-info">
              <div class="d-flex justify-content-between align-items-center mg-b-10">
                <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Customer details</h6>
                <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
              </div><!-- card-header -->
              <div class="d-flex align-items-center justify-content-between">
                <div class="form-layout">
						   <div class="row mg-b-25">
						   
				<div class="col-lg-6">
                  <div class="form-group">
                <h6 class="tx-14 tx-white"  >দোকানের নামঃ  {{ $customer->shop_name }} </h6>    
                  </div>
                </div>
				
				<div class="col-lg-6">
                  <div class="form-group">
                 <h6 class="tx-14 tx-white" >প্রোপাইটার নামঃ   {{ $customer->customer_name }} </h6>    
                  </div>
                </div>
				
				<div class="col-lg-6">
                  <div class="form-group">
                 <h6 class="tx-14 tx-white" >ঠিকানাঃ   {{ $customer->customer_adderss }}</h6>    
                  </div>
                </div>
				
				<div class="col-lg-6">
                  <div class="form-group">
                 <h6 class="tx-14 tx-white" >মোবাইল নং  {{ $customer->customer_phone }}</h6>    
                  </div>
                </div>
				
				<div class="col-lg-6">
                  <div class="form-group">
                 <h6 class="tx-14 tx-white" >মোট টাকাঃ  {{ $customer->total_amount }} </h6>    
                  </div>
                </div>
				
				<div class="col-lg-6">
                  <div class="form-group">
                  <h6 class="tx-14 tx-white" >মোট বাকিঃ  {{ $customer->total_deu }} </h6>   
                  </div>
                </div>
						
			   </div>
			    </div>
              </div><!-- card-body -->
              <div class="d-flex align-items-center justify-content-between mg-t-20 bd-t bd-white-2 pd-t-15">
                <div>
                  <span class="tx-14 tx-white-6">মোট টাকাঃ  </span>
                  <h6 class="tx-white mg-b-0">Tk{{ $customer->total_amount }} </h6>
                </div>
                <div>
                  <span class="tx-14 tx-white-6">মোট বাকিঃ</span>
                  <h6 class="tx-white mg-b-0">Tk{{ $customer->total_deu }}</h6>
                </div>
              </div><!-- -->
            </div><!-- card -->
          </div>
			    
			<div class="col-sm-6 col-xl-5 mg-t-20 mg-xl-t-0">
            <div class="card pd-20 pd-sm-25 bg-primary">
              <div class="d-flex justify-content-between align-items-center mg-b-10">
                <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Image</h6>
                <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
              </div><!-- card-header -->
              
               
			   <center>
			   <div class="" >
                            <img  src="{{ asset('upload/customer/'.$customer->image) }}" width="156px" height="156px" alt="img">
                          </div>
				 </center>
			   
              <!-- card-body -->
              <div class="d-flex align-items-center justify-content-between mg-t-20 bd-t bd-white-2 pd-t-15">
               
               
              </div><!-- -->
            </div><!-- card -->
          </div>  
			  
			  
			</div>  
		 </div>	  
			</div>  
			 
			 
				 
						
				
            <div class="sl-pagebody">
              <div class="card pd-20 pd-sm-40">
			  <?php $cart_order = Session::get('cart_order');
        if($cart_order)
        {
			?>
			 <a href="" class="btn btn-info pd-x-20" data-toggle="modal" data-target="#myModal" style="width:20%;"><i class="fa fa-shopping-cart"></i>
			Invoice # {{$invoice}}
			  
			  </a>
            <?php
		}else{		
			?> 
			<a href="{{url('getcart/wholeseal/'.$invoice) }}"class="btn btn-info pd-x-20" style="width:20%;"><i class="fa fa-shopping-cart"></i>
			Invoice # {{$invoice}}
			  
			  </a>
             
			<?php
		}
            ?>
           
                <div class="table-wrapper">
                  <table id="datatable1" class="table display responsive nowrap">
                     <thead>
                                <tr>
                                  <tr >
                                    <th style="text-align: center; width: 1%;">কোড নং</th>
                                    <th style="text-align: center; width: 3%;">সামগ্রীর নাম</th>
                                    <th style="text-align: center; width: 3%;"> মূল্য</th>
                                    <th style="text-align: center; width: 3%;"> স্টক</th>
                                    <th style="text-align: center; width: 3%;"> পরিমান</th>
                                   
                                    <th style="width: 5%;" > বিক্রয়</th>
                                   
                                  </tr>
                                </tr>
                              </thead>  
                     <tbody>
                              @foreach ($products as $item)  
                                <tr>
								 <form action="{{url('cart/wholeseal')}}" method="POST" enctype="multipart/form-data">
                        @csrf
						           <input type="hidden" value="{{$customer->shop_name}}" name="shop_name">
								   <input type="hidden" value="{{$customer->customer_name}}" name="customer_name">
								   <input type="hidden" value="{{$customer->customer_phone}}" name="customer_phone">
								   <input type="hidden" value="{{ Auth::user()->name }}" name="created_by">
								   <input type="hidden" value="{{$customer->id}}" name="cid">
								   <br>
						          
						
                                  <td class="center" style="text-align: center" >{{ $item->product_code }}</td>
                                  <td class="center" style="text-align: center" > {{ $item->product_name }} </td>
                                  <td class="center" style="text-align: center" > {{ $item->price }} </td>
                                  <td class="center" style="text-align: center" > {{ $item->product_quantity }} </td>
                                  <td class="center" style="text-align: center" > <input style="text-align: center;width:50px;"  type="number" name="qty" id="qty1" value="1"></td>
                                
                                  <td >
                                 
                                      
										
										
                        <input type="hidden" value="{{ $item->id }}" name="id">
						 <input type="hidden" value="{{$item->product_quantity }}" name="old_quantity">
                        <input type="hidden" value="{{ $item->product_name }}" name="name">
                        <input type="hidden" value="{{ $item->price }}" name="price">
                        <input type="hidden" value="{{ $item->product_code }}"  name="product_code">
                        <input type="hidden" value="1" name="quantity">
						<input type="hidden" value="admin/selas_pro/{{ $customer->id }}" name="ad">
                        <input type="hidden" value="{{$invoice}}" name="invoice">
						  <button type="submit" class="btn btn-warning "><i class="fa fa-shopping-cart"></i></button>
						    
						   
                    </form> 
                                       
                                      
                                  </td>           
                               
                              </tr>
                             @endforeach
                            
                              </tbody>
                  </table>
                </div><!-- table-wrapper -->
              </div><!-- card -->
        </div>

    </div>

</div>


<!--===============================modal========================-->
 <div id="myModal" class="modal fade">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content tx-size-sm">
              <div class="modal-header pd-x-20">
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Invoice #{{$invoice}}</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body pd-20">
               <!-- <h4 class=" lh-3 mg-b-20"><a href="" class="tx-inverse hover-primary">Why We Use Electoral College, Not Popular Vote</a></h4>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>AAAA</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div> -->
                      
              <div class="table-responsive mg-t-25">     
            <table class="table table-hover table-bordered mg-b-0">
              <thead class="bg-danger">
                <tr>
                 
                 <th>ID</th>
                 <th>Products</th>
                 <th>Price</th>                   
                 <th>Quantity</th>
                 <th>Total</th>                  
                 <th>Cancel</th>                                                         
                </tr>
              </thead>
              <tbody>
               
				<?php $cart_order = Session::get('cart_order');
        if($cart_order)
        {
			?>
			 
			    @foreach ($cart_order as $item)  
                  <tr>  
                  <td>{{ $item->product_code }}</td>
                  <td>{{ $item->product }}</td>
                  <td>{{ $item->price }}</td>
                  <td>{{ $item->qty  }}</td>
				  <td>{{ $item->amount }}</td>
				  <td>				  				 
				<a class="btn btn-info" href="{{ url('cart/cansel/'.$item->id.'/'.$item->product_code.'/'.$item->qty.'/'.Session::get('invoice_key')) }}">
                  <i class="fa fa-close"></i>Cancel  
                </a>
				  </td>
				   </tr>
			 @endforeach
			<?php
			 
		}?>
                  
               
               
               
				<tr>
			<th> </th>
			<th>  </th>
			<th>  </th>
			<th>  </th>
			
			<td> Total Amount: </td>
			<td> Sub total: </td>
			
		</tr>
		<tr>
		<?php $Total = Session::get('Total');
        if($Total)
        {
			?>
				<th colspan="4"><strong style="font-size: 12px; ">Total:</strong></th>
				<td colspan="1"><strong style="font-size: 12px; ">
				{{$Total}}
				</strong></td>
				<td colspan="1"><strong style="font-size: 12px;">
			
		{{$Total}}
				</td>
			<?php
			 
		}?>	
			</tr>
              </tbody>
            </table>
          </div>
              </div><!-- modal-body -->
              <div class="modal-footer">
                <a class="btn btn-info pd-x-20" href="{{ url('cart/save1/'.$invoice) }}">Save changes</a>
                <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div><!-- modal-dialog -->
        </div><!-- modal -->
<!--===============================end modal========================-->		
@endsection