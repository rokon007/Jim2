@extends('admin.admin-master')
@section('Wholesale') active show-sub @endsection
@section('View_Orders') active @endsection
@section('admin_content')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="index.html">Admin</a>
      <span class="breadcrumb-item active">View Product</span>
    </nav>
        <script>
function myFunction() {
            var Total = document.getElementById('total').value;
            var Payment = document.getElementById('payment').value;
            var Due = parseFloat(Total) - parseFloat(Payment);
            if (!isNaN(Due)) {
                document.getElementById('due').value = Due;
				
            }
            if(due<0){
                jQuery(function validation(){
              swal("বিক্রয় মূল্য ক্রয় মূল্যের চেয়ে কম হচ্ছে", "এতো  বেশি ডিসকাউন্ট দেওয়া উচিত নয়", "warning", {
              button: "Continue",
                  });
              });
            }
           
}
</script>
    <div class="sl-pagebody">
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

           
              <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Order pending</h6>    
                <div class="table-wrapper">
                  <table id="datatable1" class="table display responsive nowrap">
                    <thead>
                      <tr>
                        <th class="wd-15p">Invoice</th>
                        <th class="wd-15p">Shope name</th>
                        <th class="wd-15p">Mobile</th>
                        <th class="wd-15p">Amount</th>
						<th class="wd-15p">Created by</th>
                        
                      </tr>
                    </thead>
                    <tbody>

                   @foreach ($sales_order as $order)
                      <tr>
					  <td>
					   <a class="submenu" href="{{url('conferm/cart/'.$order->invoice) }}">
                 
                  <span class="hidden-tablet" style="color: blue">  {{ $order->invoice}}</span></a>
					  </td>
					 
					  <td>
					  {{ $order->shop_name}} 
					  </td>
					   <td>
					  {{ $order->customer_phone}} 
					  </td>
					  <td> {{ $order->total_amount }} </td>
					   <td> {{ $order->created_by }} </td>
             
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
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Invoice #<?php $pass = Session::get('invoice');
        if($pass)
        {
			
			  echo $pass; 
		}?></h6>
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
                 <th>Update</th>                                                         
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
				  <form action="{{url('cart/qty_update/'.$item->id.'/'.Session::get('invoice').'/'.$item->product_code)}}" method="POST">
		        @csrf               
                @method('PUT')
                  <td><input style="text-align: center;width:50px;"  type="number" name="qty12" id="qty12" value="{{ $item->qty  }}"></td>
				  <td>{{ $item->amount }}</td>
				  <td>				  				 
				<button type="submit" class="btn btn-sm btn-success">
                  <i class="fa fa-pencil"></i>
				  
                </button>
				</form>
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
				<input style="text-align: center;width:100px;"  type="text" name="total" id="total" value="{{$Total}}" readonly>
				
				</strong></td>
				<td colspan="1"><strong style="font-size: 12px;">
			
		{{$Total}}
				</td>
			<?php
			 
		}?>	
		</tr>
		<tr>
		<form action="{{ url('cart/comfermsave1/') }}" method="POST">
		@csrf
		<th colspan="4"><strong style="font-size: 12px; ">Payment:</strong></th>
				<td colspan="1"><strong style="font-size: 12px; ">
				<input style="text-align: center;width:100px;" onkeyup="myFunction();" type="number" name="payment" id="payment" value="0" >
				
				</strong></td>
				<td colspan="1"><strong style="font-size: 12px;">
			
		<input style="text-align: center;width:100px;"  type="text" name="due" id="due" value="0" readonly>
				</td>
			</tr>
              </tbody>
            </table>
          </div>
              </div><!-- modal-body -->
              <div class="modal-footer">
			  
			  <input type="hidden" value="{{Session::get('invoice')}}" name="invoice">
			  <input type="hidden" value="{{Session::get('Total')}}" name="Total">
			  <input type="hidden" value="<?php $sales_order = Session::get('sales_order');if($sales_order){echo $sales_order->shop_name;}?>" name="shop_name">
			  <input type="hidden" value="<?php $sales_order = Session::get('sales_order');if($sales_order){echo $sales_order->cid;}?>" name="cid">
			   <input type="hidden" value="<?php $sales_order = Session::get('sales_order');if($sales_order){echo $sales_order->customer_phone;}?>" name="customer_phone">
			   <?php
			   if(Auth::user()->roll==2){
			   ?>			  
               
				<?php
			   }elseif(Auth::user()->roll==1){
				?>			   
               <button type="submit" class="btn btn-info pd-x-20" href="{{ url('cart/comfermsave1/') }}">Conferm</button>
			   <?php
			   }elseif(Auth::user()->roll==3){
				?>
               <button type="submit" class="btn btn-info pd-x-20" href="{{ url('cart/comfermsave1/') }}">Conferm</button>
		       <?php
			   }
			   ?>
				</form>
				<?php  if(Auth::user()->roll==2){ ?>
				 <button  class="btn btn-info pd-x-20 " data-toggle="modal" data-target="#modaldemo2" href="#">Conferm</button>
				<?php } ?>
                <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div><!-- modal-dialog -->
        </div><!-- modal -->
<!--===============================end modal========================-->	


<!-- SMALL MODAL -->
    <div id="modaldemo2" class="modal fade">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content bd-0 tx-14">
          <div class="modal-header pd-x-20">
            <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Notice</h6>
            
          </div>
          <div class="modal-body pd-20">
            <h5>আপনি এই কাজের জন্য যোগ্য নন !! </h5>
          </div>
          <div class="modal-footer justify-content-center">
            
            <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Ok</button>
          </div>
        </div>
      </div><!-- modal-dialog -->
    </div><!-- modal -->	
@endsection