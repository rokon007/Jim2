@extends('admin.admin-master')
@section('Wholesale') active show-sub @endsection
@section('View_Orders') active @endsection
@section('admin_content')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="index.html">Admin</a>
      <span class="breadcrumb-item active">Ordered Products</span>
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
                <h6 class="card-body-title">Ordered Products</h6>    
                <div class="table-wrapper">
                  <table id="datatable1" class="table display responsive nowrap">
                    <thead>
                      <tr>
                        <th class="wd-15p">Product Code</th>
						<th class="wd-15p">Product</th>
                        <th class="wd-15p">Quantity</th>                                               
                      </tr>
                    </thead>
                    <tbody>

                   @foreach ($sales_order as $order)
                      <tr>
					  <td>
					   {{ $order->product_code}}
					  </td>
					 <td>					  
					 {{ $order->product}}
					  </td>
					  <td>
					 {{ $order->total_qty}}
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

	
@endsection