@extends('admin.admin-master')
@section('Wholesale') active show-sub @endsection
@section('Confirmed_order') active @endsection
@section('admin_content')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="index.html">Admin</a>
      <span class="breadcrumb-item active">Confirmed order</span>
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
                <h6 class="card-body-title">Confirmed order</h6>    
                <div class="table-wrapper">
                  <table id="datatable1" class="table display responsive nowrap">
                    <thead>
                      <tr>
                        <th class="wd-15p">Invoice</th>
						<th class="wd-15p">Date</th>
                        <th class="wd-15p">Shope name</th>
                        <th class="wd-15p">Mobile</th>
                        <th class="wd-15p">Amount</th>
						<th class="wd-15p">Payment</th>
						<th class="wd-15p">Due</th>
                        
                      </tr>
                    </thead>
                    <tbody>

                   @foreach ($sales_order as $order)
                      <tr>
					  <td>
					   <a class="submenu" href="{{url('conferm/cart-view/'.$order->invoice.'/'.$order->customer_phone) }}">
                 
                  <span class="hidden-tablet" style="color: blue">  {{ $order->invoice}}</span></a>
					  </td>
					 <td>					  
					  {!! date('D, d, M, Y', strtotime( $order->created_at)) !!}
					  </td>
					  <td>
					  {{ $order->shop_name}} 
					  </td>
					   <td>
					  {{ $order->customer_phone}} 
					  </td>
					  <td> {{ $order->total_amount}} </td>
					  <td> {{ $order->payment}} </td>
					  <td> {{ $order->due}} </td>
             
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
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">
				
        Confirmed order
        
			
			 
		</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body pd-20">
			  
			  
               <h6 class=" lh-3 mg-b-20"><a href="" class="tx-inverse hover-primary"></a></h6>
			    <div class="col-md-12 ">
			   <div class="row">			  
			   <div class="col-md-5 tx-14 mg-b-0 tx-inverse tx-bold">
			    <ul class="flex-column">
				<?php $customer = Session::get('customer');if($customer){
					?>
			   <li>Store:<?php echo $customer->shop_name;?></li>
			    <li>Name:<?php echo $customer->customer_name;?></li>
			    <li>Adress:<?php echo $customer->customer_adderss;?></li>
				<?php
				}?>
				 </ul>
			   </div>
			    <div class="col-md-2 tx-14 mg-b-0 tx-inverse tx-bold">
			   <br>		  
			   </div>
			   <div class="col-md-5 tx-14 mg-b-0 tx-inverse tx-bold">
			    <ul class="flex-column">
				 <li>Invoice #<?php $pass = Session::get('invoice');if($pass){ echo $pass; }?></li>
				
			     <li>Date:<?php $payment = Session::get('payment');if($payment){ echo date('D, d, M, y', strtotime( $payment->created_at)); }?></li>
			     <li>Mobile:<?php $customer = Session::get('customer');if($customer){ echo $customer->customer_phone; }?></li>         			 
				 </ul>			  
			   </div>
			    </div>
			   </div>
               
                      
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
                  <td>{{ $item->qty  }}</td>
				  <td>{{ $item->amount }}</td>
				  <td>				  				 				
                  <i class="fa fa-pencil btn btn-sm btn-success"></i>				                
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
			<td> Due: </td>
			
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
			
		
				</td>
			<?php
			 
		}?>	
		</tr>
		<tr>		
		<th colspan="4"><strong style="font-size: 12px; ">Payment:</strong></th>
				<td colspan="1"><strong style="font-size: 12px; ">
				
				<?php $payment = Session::get('payment');if($payment){ echo  $payment->payment; }?>
				</strong></td>
				<td colspan="1"><strong style="font-size: 12px;">
			<?php $payment = Session::get('payment');if($payment){ echo  $payment->due; }?>
		
				</td>
			</tr>
              </tbody>
            </table>
          </div>
              </div><!-- modal-body -->
              <div class="modal-footer">               
                <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div><!-- modal-dialog -->
        </div><!-- modal -->
<!--===============================end modal========================-->		
@endsection