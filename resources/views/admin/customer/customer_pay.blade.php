@extends('admin.admin-master')
@section('customer_pay') active @endsection
@section('admin_content')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="index.html">Admin</a>
      <span class="breadcrumb-item active">Customer Payment</span>
    </nav>
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
                  
		<script type="text/javascript">
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

           
              <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Customer Payment</h6>    
                <div class="table-wrapper">
                  <table id="datatable1" class="table display responsive nowrap">
                    <thead>
                      <tr>
                        <th class="wd-15p">দোকানের নাম</th>
                        <th class="wd-15p">প্রোঃ নাম</th>
                        <th class="wd-15p">ঠিকানা</th>
                        <th class="wd-15p">মোবাইল নং</th>
                        <th class="wd-20p">মোট টাকা</th>
                         <th class="wd-20p">মোট জমা</th>  
                         <th class="wd-20p">মোট বাকি</th>  
                         <th class="wd-20p">ছবি</th>  						
                        <th class="wd-25p">প্রফাইল</th>
                      </tr>
                    </thead>
                    <tbody>

                   @foreach ($customers as $customer)
                      <tr>
					  <td>
					   <a class="submenu" href="{{url('admin/customer_payment/'.$customer->id) }}">
                 
                  <span class="hidden-tablet" style="color: blue"> {{ $customer->shop_name }}</span></a>
					  </td>
					  <td>
					  {{ $customer->customer_name}} 
					  </td>
					   <td>
					  {{ $customer->customer_adderss}} 
					  </td>
					  <td> {{ $customer->customer_phone }} </td>
              <td> {{ $customer->total_amount }} </td>
              <td> {{ $customer->total_paid }}</td>
              <td> {{ $customer->total_deu }} </td>
                        <td>
                            <img src="{{ asset('upload/customer/'.$customer->image) }}" width="50px;" height="50px;" alt="">
                        </td>
                          <td>
                <a class="btn btn-sm btn-success" href="{{ url('admin/edit_customer/'.$customer->id) }}">
                  <i class="fa fa-pencil"></i> 
                </a>
              @csrf
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
 <script>
function myFunction() {
            var Old_due = document.getElementById('old_due').value;
            var Payment = document.getElementById('payment').value;
            var Total_pay=document.getElementById('total_pay').value;
            var New_due = parseFloat(Old_due) - parseFloat(Payment);
            var New_TotalPay = parseFloat(Total_pay) + parseFloat(Payment);
            if (!isNaN(New_due)) {
                document.getElementById('new_due').value = New_due;
			}
			if (!isNaN(New_TotalPay)) {
                document.getElementById('total_payment').value = New_TotalPay;
			}	
                                   
}
</script>

<?php $customers = Session::get('customers');
        if($customers)
        {
			?>

<div id="myModal" class="modal fade">
     <div class="modal-dialog modal-dialog-vertical-center" role="document">
        <div class="modal-content bd-0 tx-14">
          <div class="modal-header pd-x-20">
            <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Payment
            
             <br>Customer Name:{{$customers->customer_name}}.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Shope Name: {{$customers->shop_name}}
             <br>Total Due: {{$customers->total_deu}}.
            </h6>
          </div>
          <div class="modal-body pd-20">
          	<form action="{{ url('payment/save/') }}" method="POST">
		@csrf
          	<input type="hidden" name="total_pay" id="total_pay" value="{{$customers->total_paid}}">
          	<input type="hidden" name="shop_name" id="shop_name" value="{{$customers->shop_name}}">
          	<input type="hidden" name="cid" id="cid" value="{{$customers->id}}">
          	<input type="hidden" name="customer_phone" id="customer_phone" value="{{$customers->customer_phone}}">
            <div class="row">
            	<div class="col-lg-4">
                 <div class="form-group">
                      <label class="form-control-label">Total Due: <span class="tx-danger">*</span></label>
                      <input class="form-control" type="number" id="old_due" name="old_due" value="{{$customers->total_deu}}" readonly>
                 </div>
                </div> 

                <div class="col-lg-4">
                 <div class="form-group">
                      <label class="form-control-label">Total Payment: <span class="tx-danger">*</span></label>
                      <input class="form-control" type="number" id="total_payment" name="total_payment" value="{{$customers->total_paid}}" readonly >
                 </div>
                </div> 

                

                <div class="col-lg-4">
                 <div class="form-group">
                      <label class="form-control-label">New Due: <span class="tx-danger">*</span></label>
                      <input class="form-control" type="number" id="new_due" name="new_due" value="0" readonly>
                 </div>
                </div> 

                <div class="col-lg-4">
                 <div class="form-group">
                      <label class="form-control-label">Payment: <span class="tx-danger">*</span></label>
                      <input class="form-control" type="number" id="payment" name="payment" value="0" onkeyup="myFunction();" >
                 </div>
                </div> 

            	
            </div>
          </div>
          <div class="modal-footer">
                    <button type="submit" class="btn btn-info pd-x-20">Save Payment</button>
          </form>          
                    <button type="button" class="btn btn-secondary pd-x-20">Close</button>
        </div>
      </div><!-- modal-dialog -->
    </div>
    <?php
			 
		}?>
@endsection