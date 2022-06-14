<?php $dontshow=1; ?>
@extends('admin.admin-master')

@section('customer_profile') active @endsection
@section('admin_content')
 <script>
                // Add active class to the current button (highlight it)
                var header = document.getElementById("navDIV");
                var btns = header.getElementsByClassName("sl-menu-link");
                for (var i = 0; i < btns.length; i++) {
                btns[i].addEventListener("click", function() {
                var current = document.getElementsByClassName("active");
               current[0].className = current[0].className.replace("active", "");
                 this.className += " active";
                  });
                    }
            </script>
<!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
    <!--  <div class="mailbox-sideleft">
       <center>
			   <div class="" >
                            <img  src="{{ asset('upload/customer/'.$customer->image) }}" width="156px" height="156px" alt="img">
                          </div>
				 </center>
           
		<div id="myDIV">	
        <nav class="nav nav-mailbox flex-column mg-y-20">
		   <a href="javascript:void(0)" id="" class="nav-link active"  onclick="Profile()">
            <i class="icon ion-ios-filing-outline tx-24"></i>
            <span>Profile</span>
            <span class="mg-l-auto tx-12"></span>
          </a>
		  
          <a href="javascript:void(0)" id="Transactions" class="nav-link "  onclick="AllcustomarFunction()">
            <i class="icon ion-ios-filing-outline tx-24"></i>
            <span>Transactions</span>
            <label class="mg-l-auto tx-12" id="lbldiactiv"> </label>
          </a>
          <a href="javascript:void(0)" id="Purchased" class="nav-link"   onclick="ActivcustomarFunction()">
            <i class="icon ion-ios-folder-outline tx-20"></i>
            <span>Purchased List</span>
            <label id="lblactiv" class="mg-l-auto tx-12"> </label>
          </a>
          <a href="javascript:void(0)" id="Returned" class="nav-link" onclick="DiactivcustomarFunction()"><i class="icon ion-ios-paperplane-outline tx-24"></i> Returned product</a>
          <a href="javascript:void(0)" class="nav-link"><i class="icon ion-ios-trash-outline tx-24"></i> Trash</a>
          <a href="javascript:void(0)" class="nav-link">
            <i class="icon ion-ios-folder-outline tx-20"></i>
            <span>Spam</span>
            <span class="mg-l-auto tx-12">228</span>
          </a>
        </nav>
		</div>

        <label class="pd-l-10 tx-11 tx-uppercase">My Folder</label>
        <nav class="nav nav-mailbox flex-column">
          <a href="" class="nav-link"><i class="icon ion-ios-folder-outline tx-20"></i> Updates</a>
          <a href="" class="nav-link"><i class="icon ion-ios-folder-outline tx-20"></i> Promotions</a>
          <a href="" class="nav-link"><i class="icon ion-ios-folder-outline tx-20"></i> Social</a>
          <a href="" class="nav-link"><i class="icon ion-ios-folder-outline tx-20"></i> Technology</a>
          <a href="" class="nav-link"><i class="icon ion-ios-folder-outline tx-20"></i> Advertising</a>
        </nav>
      </div><!-- mailbox-sideleft -->


 
      <div class="mailbox-content">
	  
        

        <div class="pd-t-25 pd-x-25">
          <div class="mailbox-content-header">
		  
		  
            <div class="row row-sm">
          <div class="col-sm-6 col-xl-3">
            <div class="card pd-20 pd-sm-25">
              <div class="d-flex align-items-center">
               
                <div class="mg-l-15">
                  <p class="tx-uppercase tx-11 tx-spacing-1 tx-medium tx-gray-600 mg-b-8">Payment of {{$monthName}}</p>
                  <h6 class="tx-bold tx-lato tx-inverse mg-b-0">&#2547; {{$Total_payment_m}}</h6>
                </div>
              </div>
            </div><!-- card -->
          </div><!-- col-3 -->
          <div class="col-sm-6 col-xl-3 mg-t-20 mg-sm-t-0">
            <div class="card pd-20 pd-sm-25 bg-primary">
              <div class="d-flex align-items-center">
                
                <div class="mg-l-15">
                  <p class="tx-uppercase tx-11 tx-spacing-1 tx-medium tx-white-5 mg-b-8">Total </p>
                  <h6 class="tx-bold tx-lato tx-white mg-b-0">&#2547; {{$customer->total_amount}} </h6>
                </div>
              </div>
            </div><!-- card -->
          </div><!-- col-3 -->
          <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
            <div class="card pd-20 pd-sm-25 bg-info">
              <div class="d-flex align-items-center">
                
                <div class="mg-l-15">
                  <p class="tx-uppercase tx-11 tx-spacing-1 tx-medium tx-white-5 mg-b-8">Total paid </p>
                  <h6 class="tx-bold tx-lato tx-white mg-b-0">&#2547; {{$customer->total_paid}}</h6>
                </div>
              </div>
            </div><!-- card -->
          </div><!-- col-3 -->
          <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
            <div class="card pd-20 pd-sm-25 bg-sl-primary">
              <div class="d-flex align-items-center">
                
                <div class="mg-l-15">
                  <p class="tx-uppercase tx-11 tx-spacing-1 tx-medium tx-white-5 mg-b-8">Total deu</p>
                  <h6 class="tx-bold tx-lato tx-white mg-b-0">&#2547; {{$customer->total_deu}}</h6>
                </div>
              </div>
            </div><!-- card -->
          </div><!-- col-3 -->
		  
		  
		   <div class="col-sm-6 col-xl-3">
            <div class="card pd-20 pd-sm-25">
              <div class="d-flex align-items-center">
               
                <div class="" >
                            <img  src="{{ asset('upload/customer/'.$customer->image) }}" width="156px" height="156px" alt="img">
                          </div>
              </div>
            </div><!-- card -->
          </div><!-- col-3 -->
		  
		  
		  
        </div>
		
		
          </div><!-- d-flex -->
        </div>
		
		<body onload="myFunction()">
		
        <div id="divAllcustomar" style="display: none;">
		<div class="sl-pagebody">
        <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Transactions</h6>    
                <div class="table-wrapper">
                  <table id="datatable1" class="table display responsive nowrap">
                    <thead>
                      <tr>
                        <th class="wd-15p">Invoice</th>
                        <th class="wd-15p">Total</th>
                        <th class="wd-15p">Payment</th>
                        <th class="wd-15p">Due</th>
						<th class="wd-15p">Date</th>
                        
                      </tr>
                    </thead>
                    <tbody>

                   @foreach ($payment as $pay)
                      <tr>
					  <td>
					   <a class="submenu" href="#">
                 
                  <span class="hidden-tablet" style="color: blue">{{$pay->invoice}}</span></a>
					  </td>
					 
					  <td>
					  {{$pay->Total}} 
					  </td>
					   <td>
					  {{$pay->payment}} 
					  </td>
					  <td> {{$pay->due }} </td>
					   <td>{!! date('D, d, M, Y', strtotime($pay->created_at)) !!}</td>
             
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div><!-- table-wrapper -->
              </div><!-- card -->
		</div>
		</div>
		
		
		
		
		
		<script>
		   $('#datatable11').DataTable({
responsive: true,
language: {
  searchPlaceholder: 'Search...',
  sSearch: '',
  lengthMenu: '_MENU_ items/page',
}
});
		</script>
		
		
		
		  <div  id="divActivcustomar" style="display: none;" >
		  <div class="sl-pagebody">
         <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Order pending</h6>    
                <div class="table-wrapper">
                  <table id="datatable2" class="table display responsive nowrap">
                    <thead>
                      <tr>
                        <th class="wd-15p">Invoice</th>
                        <th class="wd-15p">product_code</th>
                        <th class="wd-15p">product</th>
                        <th class="wd-15p">price</th>
						<th class="wd-15p">qty</th>
						<th class="wd-15p">amount</th>
						<th class="wd-15p">Date</th>
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
					  {{$order->product_code}} 
					  </td>
					   <td>
					  {{$order->product}} 
					  </td>
					  <td> {{$order->price}} </td>
					   <td> {{$order->qty}} </td>
					   
					   <td>
					  {{$order->amount}} 
					  </td>
					  <td>{!! date('D, d, M, Y', strtotime( $order->created_at)) !!}</td>
					   <td> {{$order->created_by}} </td>
             
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div><!-- table-wrapper -->
              </div><!-- card -->
		</div>
		</div>
		
		
		<div  id="divDiactivcustomar" style="display: none;">
		<div class="sl-pagebody">
		<div class="card pd-20 pd-sm-40 mg-t-25">
		
		 <h6 class="card-body-title"> Returned product</h6>
		 <p class="mg-b-20 mg-sm-b-30">Under constraction.</p>
		</div>
		</div>
		</div>
		
	</body>	
		<div class="sl-pagebody">
		<div id="divIncome" class="card pd-20 pd-sm-40 mg-t-25">
		
          <h6 class="card-body-title">Profile of {{$customer->customer_name}}</h6>
          <p class="mg-b-20 mg-sm-b-30">Align terms and descriptions horizontally by using our grid system’s predefined classes.</p>

          <dl class="row">
            <dt class="col-sm-3 tx-inverse">Customer name</dt>
            <dd class="col-sm-9">{{$customer->customer_name}}.</dd>

            <dt class="col-sm-3 tx-inverse">Adress</dt>
            <dd class="col-sm-9">
              <p class="mg-b-10">{{$customer->customer_adderss}}.</p>
              <p>{{$customer->customer_adderss}}.</p>
            </dd>

            <dt class="col-sm-3 tx-inverse">Shop name</dt>
            <dd class="col-sm-9">{{$customer->shop_name}}.</dd>

            <dt class="col-sm-3 text-truncate tx-inverse">Customer phone</dt>
            <dd class="col-sm-9">{{$customer->customer_phone}}.</dd>

            <dt class="col-sm-3 tx-inverse">He has been with us since</dt>
            <dd class="col-sm-9">
              <dl class="row">
                <dt class="col-sm-4 tx-inverse">{!! date('D, d, M, Y', strtotime( $customer->created_at)) !!}</dt>
                <dd class="col-sm-8">{!! date('D, d, M, Y', strtotime( $customer->created_at)) !!}.</dd>
              </dl>
            </dd>
          </dl>
        </div>
		</div>
		
		
		
		
      </div><!-- mailbox-content -->
	   
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

   
    

    
    <script>
      $(function() {
        'use strict';
        // show only the icons and hide left menu label by default
        $('.menu-item-label,.menu-item-arrow').addClass('op-lg-0-force d-lg-none');

        // scrollbar
        $('.mailbox-sideleft').perfectScrollbar();

        // showing mailbox left menu
        $('#showMailboxLeft').on('click', function(){
          $('body').toggleClass('show-mailbox-left');
        });
      });
    </script>
	
	 <script type="text/javascript">
	  function AllcustomarFunction() {
  var x = document.getElementById("divAllcustomar");
  if (x.style.display === "none") {
    x.style.display = "block";
    divActivcustomar.style.display="none";
    divDiactivcustomar.style.display="none";
    divIncome.style.display="none";
  } else {
    x.style.display = "none";
    divIncome.style.display="block";
  }
} 


 function ActivcustomarFunction() {
  var x = document.getElementById("divActivcustomar");
  if (x.style.display === "none") {
    x.style.display = "block";
    divAllcustomar.style.display="none";
     divDiactivcustomar.style.display="none";
     divIncome.style.display="none";
  } else {
    x.style.display = "none";
     divIncome.style.display="block";
  }
} 
function DiactivcustomarFunction() {
  var x = document.getElementById("divDiactivcustomar");
  if (x.style.display === "none") {
    x.style.display = "block";
    divAllcustomar.style.display="none";
     divActivcustomar.style.display="none";
     divIncome.style.display="none";
  } else {
    x.style.display = "none";
     divIncome.style.display="block";
  }
} 
function Profile() {
  var x = document.getElementById("divIncome");
  if (x.style.display === "none") {
    x.style.display = "block";
    divAllcustomar.style.display="none";
     divActivcustomar.style.display="none";
	 divDiactivcustomar.style.display="none";
    
	
  } else {
    x.style.display = "none";
     divIncome.style.display="block";
  }
} 
	 </script>
	 
	 <script>
function myFunction() {
  //Activtable count    
var x = document.getElementById("datatable2").rows.length;
document.getElementById("lblactiv").innerHTML = x-1 ;

//Diactivtable count    
var y = document.getElementById("datatable1").rows.length;
document.getElementById("lbldiactiv").innerHTML = y-1 ;
 
 //Total count
 var z = document.getElementById("mytable").rows.length;
document.getElementById("lbltotal").innerHTML = z-1 ;


}
</script>
@endsection

