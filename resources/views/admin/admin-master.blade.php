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

   <script src="/backend/push/push.min.js"></script> 
<!--	 <script src="push.js"></script> -->

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

  <body>

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
		
		
		
	<!--=================================================================-->

       <nav class="nav">
          <div class="dropdown">
            <a href="" onclick="rokon()" class="nav-link nav-link-profile" data-toggle="dropdown">
			 @isset($unread)
                  
              <span class="logged-name">Notifications<span class="hidden-md-down"></span></span>
			   <i class="icon ion-ios-bell-outline"></i>
			    (<span class="notif-count">{{$unread}}</span>)
             @endisset
             
            </a>
            <div class="dropdown-menu dropdown-menu-header wd-200">
              <ul class="nav navbar-nav">
            <li class="dropdown dropdown-notifications">
              <a href="#notifications-panel" class="dropdown-toggle" data-toggle="dropdown">
                <i data-count="0" class="glyphicon glyphicon-bell notification-icon"></i>
              </a>

              <div class="dropdown-container">
                <div class="dropdown-toolbar">
                  <div class="dropdown-toolbar-actions">
                    <a href="#">Mark all as read</a>
                  </div>
				   @isset($unread)
                  <h3 class="dropdown-toolbar-title">Notifications (<span class="notif-count">{{$unread}}</span>)</h3>
				    @endisset
                </div>
                <ul class="dropdown-menu">
                </ul>
                <div class="dropdown-footer text-center">
                  <a href="#">View All</a>
                </div>
              </div>
            </li>
			 @isset($notifications)
                   @foreach($notifications as $key)
				   <?php
				      date_default_timezone_set('Asia/Dhaka');
                      $currenttime=date('Y-m-d H:i:s');                          
                      $now = new DateTime("$key->dt");
                      $ref = new DateTime("$currenttime");
                      $diff = $now->diff($ref);                                                                      
				   ?>
            <li>
			<a href="" onclick="rokon()" class="media-list-link">
              <div class="media">
                <img src="{{asset('upload')}}/admin/{{ $key->image }}" class="wd-30 rounded-circle" alt="">
                <div class="media-body">
                  <p class="mg-b-0 tx-medium tx-gray-800 tx-13">Rokon{{$key->subject1}}</p>
                  <span class="d-block tx-11 tx-gray-500"><?php  printf('%d days, %d hours, %d minutes', $diff->d, $diff->h, $diff->i);?> ago</span>
                  <p class="tx-13 mg-t-10 mg-b-0">{{$key->text}}.</p>
                </div>
              </div><!-- media -->
            </a>
			</li>
			
			<li><a href="{{ url('update-coment/'.$key->id) }}">Delete</a></li>
			@endforeach 
             @endisset
            
          </ul>
            </div><!-- dropdown-menu -->
          </div><!-- dropdown -->
        </nav>
		
		
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  
		
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="//js.pusher.com/3.1/pusher.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <script type="text/javascript">
      var notificationsWrapper   = $('.dropdown-notifications');
      var notificationsToggle    = notificationsWrapper.find('a[data-toggle]');
      var notificationsCountElem = notificationsToggle.find('i[data-count]');
      var notificationsCount     = parseInt(notificationsCountElem.data('count'));
      var notifications          = notificationsWrapper.find('ul.dropdown-menu');

      if (notificationsCount <= 0) {
        notificationsWrapper.hide();
      }

      // Enable pusher logging - don't include this in production
      // Pusher.logToConsole = true;

     // var pusher = new Pusher('API_KEY_HERE', {
     //   encrypted: true
     // });
       var pusher = new Pusher('0e0182ecfb00e2311b64', {
      cluster: 'ap2'
    });
      // Subscribe to the channel we specified in our Laravel Event
     // var channel = pusher.subscribe('status-liked');
	 
	 var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {
      alert(JSON.stringify(data));
    });

      // Bind a function to a Event (the full Laravel class)
      channel.bind('App\\Events\\Formsubmited', function(data) {
        var existingNotifications = notifications.html();
        var avatar = Math.floor(Math.random() * (71 - 20 + 1)) + 20;
        var newNotificationHtml = `
          <li class="notification active">
              <div class="media">
                <div class="media-left">
                  <div class="media-object">
                    <img src="https://api.adorable.io/avatars/71/`+avatar+`.png" class="img-circle" alt="50x50" style="width: 50px; height: 50px;">
                  </div>
                </div>
                <div class="media-body">
                  <strong class="notification-title">`+data.message+`</strong>
                  <!--p class="notification-desc">Extra description can go here</p-->
                  <div class="notification-meta">
                    <small class="timestamp">about a minute ago</small>
                  </div>
                </div>
              </div>
          </li>
        `;
        notifications.html(newNotificationHtml + existingNotifications);

        notificationsCount += 1;
        notificationsCountElem.attr('data-count', notificationsCount);
        notificationsWrapper.find('.notif-count').text(notificationsCount);
        notificationsWrapper.show();
      });
    </script>


    <!--================================================================-->	
		
		
		
		
		
		
		
		
		
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
          <a class="nav-link active" data-toggle="tab" role="tab" href="#messages">Messages (2)</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" role="tab" href="#notifications">Notifications (8)</a>
        </li>
      </ul><!-- sidebar-tabs -->

      <!-- Tab panes -->
      <div class="tab-content">
        <div class="tab-pane pos-absolute a-0 mg-t-60 active" id="messages" role="tabpanel">
          <div class="media-list">
		  
		  
		  
            <!-- loop starts here -->
            <a href="" class="media-list-link">
              <div class="media">
                <img src="../img/img3.jpg" class="wd-40 rounded-circle" alt="">
                <div class="media-body">
                  <p class="mg-b-0 tx-medium tx-gray-800 tx-13">Donna Seay</p>
                  <span class="d-block tx-11 tx-gray-500">2 minutes ago</span>
                  <p class="tx-13 mg-t-10 mg-b-0">A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring.</p>
                </div>
              </div><!-- media -->
            </a>
            <!-- loop ends here -->
           
           
            
            
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
