<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Starlight">
    <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="twitter:image" content="http://themepixels.me/starlight/img/starlight-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/starlight">
    <meta property="og:title" content="Starlight">
    <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

    <meta property="og:image" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">

    <title>Admin | Jimelectric</title>

    <!-- vendor css -->
    <link href="/backend/lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="/backend/lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="/backend/lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
    <link href="/backend/lib/highlightjs/github.css" rel="stylesheet">
    <link href="/backend/lib/datatables/jquery.dataTables.css" rel="stylesheet">
    <link href="/backend/lib/select2/css/select2.min.css" rel="stylesheet">
    <link href="/backend/lib/highlightjs/github.css" rel="stylesheet">
    <link href="/backend/lib/medium-editor/medium-editor.css" rel="stylesheet">
    <link href="/backend/lib/medium-editor/default.css" rel="stylesheet">
    <link href="/backend/lib/summernote/summernote-bs4.css" rel="stylesheet">
    <!-- Starlight CSS -->
    <link rel="stylesheet" href="{{ asset('backend') }}/css/starlight.css">

   <script src="{{ asset('backend') }}/push/push.min.js"></script> 
 <script src="{{ asset('push.js') }}"></script> 
	  <!-- <script src="push.js"></script> -->
 
<!--============ Pusher ===========-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
  @stack('javascript')
  <script>

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('0e0182ecfb00e2311b64', {
      cluster: 'ap2'
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {
      alert(JSON.stringify(data));
    });
  </script>


 <!--  <script>

    $(document).ready(function() {


       var pusher = new Pusher('0e0182ecfb00e2311b64', {
      cluster: 'ap2'
    });

        var channel = pusher.subscribe('my-channel');
        channel.bind('my-event', function(data) {
            if(data.from) {
                let pending = parseInt($('#' + data.from).find('.pending').html());
                if(pending) {
                    $('#' + data.from).find('.pending').html(pending + 1);
                } else {
                    $('#' + data.from).html('<a href="#" class="nav-link" data-toggle="dropdown"><i  class="fa fa-bell text-white"><span class="badge badge-danger pending">1</span></i></a>');
                }
            }
        });

        
    });
</script> -->
  <!--============ End Pusher ===========-->
  </head>
        @isset($unread)
		  ({{$unread}})
		  @endisset
		  
		  @if(isset($rokon))
             <body class="collapsed-menu">
		 @else
		 <body>
         @endif
  
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

    @guest
    @else
    <!-- ########## START: LEFT PANEL ########## -->
    <div class="sl-logo"><a href=""><i class="icon ion-android-star-outline"></i> Jim Electric</a></div>
    <div class="sl-sideleft">
      <div class="input-group input-group-search">
        <input type="search" name="search" class="form-control" placeholder="Search">
        <span class="input-group-btn">
          <button class="btn"><i class="fa fa-search"></i></button>
        </span><!-- input-group-btn -->
      </div><!-- input-group -->

      <div class="sl-sideleft-menu">
	  @if(Auth::user()->roll==1)
        <a href="{{route('admin.home')}}" class="sl-menu-link @yield('dashboard')">
	  @elseif(Auth::user()->roll==2)
	   <a href="{{route('SR.home')}}" class="sl-menu-link @yield('dashboard')">
	    @elseif(Auth::user()->roll==3)
	   <a href="{{route('DM.home')}}" class="sl-menu-link @yield('dashboard')">
	   @endif
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
            <span class="menu-item-label">Dashboard</span>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
		 <a href="#" class="sl-menu-link @yield('Wholesale')">
          <div class="sl-menu-item">
            <i class="menu-item-icon ion-ios-pie-outline tx-20"></i>
            <span class="menu-item-label">Wholesale</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item1"><a href="{{ route('create-customers') }}" class="nav-link @yield('add_customer') ">Add customer</a></li>
          <li class="nav-item1"><a href="{{ route('index-customers') }}" class="nav-link @yield('Manage_customer')">Manage customer</a></li>
		   
		   @if(Auth::user()->roll==2)
			 <li class="nav-item1"><a href="{{ url('admin/sr-orders/'.Auth::user()->name) }}" class="nav-link @yield('View_Orders')">View Orders </a></li>
		   @else
		   <li class="nav-item1"><a href="{{ route('view-orders') }}" class="nav-link @yield('View_Orders')">View Orders </a></li>
		@endif
		   @if(Auth::user()->roll==2)
			  <li class="nav-item1"><a href="#" data-toggle="modal" data-target="#modaldemo2" class="nav-link @yield('Confirmed_order')">Confirmed order </a></li> 
		   @else
		    <li class="nav-item1"><a href="{{ route('confirm-order') }}" class="nav-link @yield('Confirmed_order')">Confirmed order </a></li>
		@endif
        </ul>

       <!-- <a href="{{ url('/') }}" target="_blank" class="sl-menu-link ">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
            <span class="menu-item-label">Visit Site</span>
          </div>
        </a>--> <!-- sl-menu-link -->

       

       

       @if(Auth::user()->roll==1)
        <a href="#" class="sl-menu-link @yield('products')">
          <div class="sl-menu-item">
            <i class="menu-item-icon ion-ios-pie-outline tx-20"></i>
            <span class="menu-item-label">Products</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item"><a href="{{ route('add-products') }}" class="nav-link @yield('add-products')">Add Products</a></li>
          <li class="nav-item"><a href="{{ route('manage-products') }}" class="nav-link @yield('manage-products')">Manage Product</a></li>
        </ul>
		 @endif
         @if(Auth::user()->roll==1)
        <a href="{{ route('ordered-products') }}"  class="sl-menu-link @yield('ordered_products')">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
            <span class="menu-item-label">Ordered products</span>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
		  @endif
           @if(Auth::user()->roll==1)
        <a href="#"  class="sl-menu-link @yield('orders')">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
            <span class="menu-item-label">Product return</span>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
		 @endif
          @if(Auth::user()->roll==1)
		   <a href="{{ route('add-user') }}"  class="sl-menu-link @yield('user')">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
            <span class="menu-item-label">Add User</span>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
         @endif
         <a href="{{ route('viewcustomer') }}"  class="sl-menu-link @yield('customer_profile')">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
            <span class="menu-item-label">Customer Profile</span>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
      
        </ul>
      </div><!-- sl-sideleft-menu -->

      <br>
    </div><!-- sl-sideleft -->
    <!-- ########## END: LEFT PANEL ########## -->

    <!-- ########## START: HEAD PANEL ##########    -->
    <div class="sl-header">
      <div class="sl-header-left">
        <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href=""><i class="icon ion-navicon-round"></i></a></div>
        <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href=""><i class="icon ion-navicon-round"></i></a></div>
      </div><!-- sl-header-left -->
      <div class="sl-header-right">
        <nav class="nav">
          <div class="dropdown">
            <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
              <span class="logged-name">{{ Auth::user()->name }}<span class="hidden-md-down"></span></span>
			   <img src="{{ asset('upload') }}/admin/{{ Auth::user()->image }}" class="wd-32 rounded-circle" alt="">
             
            </a>
            <div class="dropdown-menu dropdown-menu-header wd-200">
              <ul class="list-unstyled user-profile-nav">
                <li><a href=""><i class="icon ion-ios-person-outline"></i> Edit Profile</a></li>
                <li><a href=""><i class="icon ion-ios-gear-outline"></i> Settings</a></li>
                <li><a href=""><i class="icon ion-ios-download-outline"></i> Downloads</a></li>
                <li><a href=""><i class="icon ion-ios-star-outline"></i> Favorites</a></li>
                <li><a href=""><i class="icon ion-ios-folder-outline"></i> Collections</a></li>
                <li>
				  <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                       <i class="icon ion-power"></i> Sign Out</a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
				</li>
              </ul>
            </div><!-- dropdown-menu -->
          </div><!-- dropdown -->
        </nav>
		
		<div class="navicon-right">
          <a id="btnRightMenu" href="" class="pos-relative">
		  @isset($unread)
            <i class="icon ion-ios-bell-outline"></i>
            <!-- start: if statement 
			(<span class="notif-count">{{$unread}}</span>)-->
            <span class="tx-12">({{$unread}})</span>
            <!-- end: if statement -->
			 @endisset
          </a>
        </div><!-- navicon-right -->
		
	
		
		
		
		
		
		
		
		
		
		<!--
        <div class="navicon-right">
		
		  <ul class="navbar-nav mr-auto">
		     
               
				
            </ul>
		-->
		<!--
          <a id="btnRightMenu" href="" class="pos-relative">
            <i class="icon ion-ios-bell-outline"></i>
            <!-- start: if statement -->
        <!--    <span class="square-8 bg-danger"></span>
            <!-- end: if statement -->
      <!--    </a>
		  -->
		  
		  
      <!--    </div><!-- navicon-right -->
      </div><!-- sl-header-right -->
    </div><!-- sl-header -->
    <!-- ########## END: HEAD PANEL ########## -->

    <!-- ########## START: RIGHT PANEL ########## -->
    <div class="sl-sideright">
      <ul class="nav nav-tabs nav-fill sidebar-tabs" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" data-toggle="tab" role="tab" href="#messages">Notifications
		  @isset($unread)
		  ({{$unread}})
		  @endisset
		  </a>
        </li>
        <li class="nav-item">
         <!-- <a class="nav-link" data-toggle="tab" role="tab" href="#">Notifications (8)</a> -->
        </li>
      </ul><!-- sidebar-tabs -->

      <!-- Tab panes -->
      <div class="tab-content">
        <div class="tab-pane pos-absolute a-0 mg-t-60 active" id="messages" role="tabpanel">
          <div class="media-list">
		  
		  @isset($notifications)
                   @foreach($notifications as $key)
				   <?php
				      date_default_timezone_set('Asia/Dhaka');
                      $currenttime=date('Y-m-d H:i:s');                          
                      $now = new DateTime("$key->dt");
                      $ref = new DateTime("$currenttime");
                      $diff = $now->diff($ref);                                                                      
				   ?>
		  
            <!-- loop starts here -->
            <a href="#" class="media-list-link">
              <div class="media">
                <img src="{{asset('upload')}}/admin/{{ $key->image }}" class="wd-40 rounded-circle" alt="">
                <div class="media-body">
                  <p class="mg-b-0 tx-medium tx-gray-800 tx-13">{{$key->subject1}}</p>
                  <span class="d-block tx-11 tx-gray-500"><?php  printf('%d days, %d hours, %d minutes', $diff->d, $diff->h, $diff->i);?> ago</span>
                  <p class="tx-13 mg-t-10 mg-b-0">{{$key->text}}.</p>
				   <p class="tx-13 mg-t-10 mg-b-0"> <a href="{{ url('update-coment/'.$key->id) }}">Delete</a></p>
                </div>
              </div><!-- media -->
            </a>
            <!-- loop ends here -->
          
			@endforeach 
             @endisset
           
            
            
          </div><!-- media-list -->
          <div class="pd-15">
            <a href="" class="btn btn-secondary btn-block bd-0 rounded-0 tx-10 tx-uppercase tx-mont tx-medium tx-spacing-2">View More Messages</a>
          </div>
        </div><!-- #messages -->

        <div class="tab-pane pos-absolute a-0 mg-t-60 overflow-y-auto" id="notifications" role="tabpanel">
          <div class="media-list">
		  
		  
		  
		  
            <!-- loop starts here -->
            <a href="" class="media-list-link read">
              <div class="media pd-x-20 pd-y-15">
                <img src="../img/img8.jpg" class="wd-40 rounded-circle" alt="">
                <div class="media-body">
                  <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Suzzeth Bungaos</strong> tagged you and 18 others in a post.</p>
                  <span class="tx-12">October 03, 2017 8:45am</span>
                </div>
              </div><!-- media -->
            </a>
            <!-- loop ends here -->
            
          
           
           
           
           
          </div><!-- media-list -->
        </div><!-- #notifications -->

      </div><!-- tab-content -->
	  
    </div><!-- sl-sideright -->
    <!-- ########## END: RIGHT PANEL ########## --->
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
    @endguest
    @yield('admin_content')

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
			   @if(isset($rokon))
                  <button  class="btn btn-info pd-x-20 " data-toggle="modal" data-target="#modaldemo2" href="#">Conferm</button>
		       @else
		 
         
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
				@endif
                <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div><!-- modal-dialog -->
        </div><!-- modal -->
<!--===============================end modal========================-->
    
    <script src="/backend/lib/jquery/jquery.js"></script>
    <script src="/backend/lib/popper.js/popper.js"></script>
    <script src="/backend/lib/bootstrap/bootstrap.js"></script>
    <script src="/backend/lib/jquery-ui/jquery-ui.js"></script>
    <script src="/backend/lib/datatables/jquery.dataTables.js"></script>
    <script src="/backend/lib/datatables-responsive/dataTables.responsive.js"></script>
    <script>
      $(function(){
        'use strict';

        $('#datatable1').DataTable({
          responsive: true,
          language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: '_MENU_ items/page',
          }
        });

        $('#datatable2').DataTable({
          bLengthChange: false,
          searching: false,
          responsive: true
        });

        // Select2
        $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

      });
    </script>
     <script src="/backend/lib/medium-editor/medium-editor.js"></script>
     <script src="/backend/lib/summernote/summernote-bs4.min.js"></script>
     <script>
       $(function(){
         'use strict';
 
         // Inline editor
         var editor = new MediumEditor('.editable');
 
         // Summernote editor
         $('#summernote').summernote({
           height: 150,
           tooltip: false
         })

         $('#summernote2').summernote({
           height: 150,
           tooltip: false
         })
       });
     </script>
    <script src="/backend/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
    <script src="/backend/lib/jquery.sparkline.bower/jquery.sparkline.min.js"></script>
    <script src="/backend/lib/d3/d3.js"></script>
    <script src="/backend/lib/rickshaw/rickshaw.min.js"></script>
    <script src="/backend/lib/chart.js/Chart.js"></script>
    <script src="/backend/lib/Flot/jquery.flot.js"></script>
    <script src="/backend/lib/Flot/jquery.flot.pie.js"></script>
    <script src="/backend/lib/Flot/jquery.flot.resize.js"></script>
    <script src="/backend/lib/flot-spline/jquery.flot.spline.js"></script>

    <script src="/backend/js/starlight.js"></script>
    <script src="/backend/js/ResizeSensor.js"></script>
    <script src="/backend/js/dashboard.js"></script>
    <script src="/backend/lib/highlightjs/highlight.pack.js"></script>

    <script src="/backend/lib/select2/js/select2.min.js"></script>

    <script src="/backend/js/starlight.js"></script>
   
  </body>
</html>
