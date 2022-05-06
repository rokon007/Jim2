<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <!--<link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet">-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>


    <!-- start: CSS -->
	<link id="bootstrap-style" href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('admin/css/bootstrap-responsive.min.css') }}" rel="stylesheet">
	<link id="base-style" href="{{ asset('admin/css/style.css') }}" rel="stylesheet">
	<link id="base-style-responsive" href="{{ asset('admin/css/style-responsive.css') }}" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
	<!-- end: CSS -->
	<!-- <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet"> -->
</head>
<body>

    @include('layouts.inc.admin_navbar')

    <div class="container-fluid-full">
		<div class="row-fluid">
           
        @include('layouts.inc.admin_sidebar')
   
           
        <div id="content" class="span10">
       

            @yield('content')
            
        </div>
      
       
       
    
        </div>
        @include('layouts.inc.admin_footer')
    </div>

    <!--<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}" ></script>
    <script src="{{ asset('assets/js/scripts.js') }}"></script>-->
    

    <!-- start: JavaScript-->

		<script src="{{ asset('admin/js/jquery-1.9.1.min.js') }}"></script>
        <script src="{{ asset('admin/js/jquery-migrate-1.0.0.min.js') }}"></script>
        
            <script src="{{ asset('admin/js/jquery-ui-1.10.0.custom.min.js') }}"></script>
        
            <script src="{{ asset('admin/js/jquery.ui.touch-punch.js') }}"></script>
        
            <script src="{{ asset('admin/js/modernizr.js') }}"></script>
        
            <script src="{{ asset('admin/js/bootstrap.min.js') }}"></script>
        
            <script src="{{ asset('admin/js/jquery.cookie.js') }}"></script>
        
            <script src='{{ asset('admin/js/fullcalendar.min.js') }}'></script>
        
            <script src='{{ asset('admin/js/jquery.dataTables.min.js') }}'></script>
    
            <script src="{{ asset('admin/js/excanvas.js') }}"></script>
        <script src="{{ asset('admin/js/jquery.flot.js') }}"></script>
        <script src="{{ asset('admin/js/jquery.flot.pie.js') }}"></script>
        <script src="{{ asset('admin/js/jquery.flot.stack.js') }}"></script>
        <script src="{{ asset('admin/js/jquery.flot.resize.min.js') }}"></script>
        
            <script src="{{ asset('admin/js/jquery.chosen.min.js') }}"></script>
        
            <script src="{{ asset('admin/js/jquery.uniform.min.js') }}"></script>
            
            <script src="{{ asset('admin/js/jquery.cleditor.min.js') }}"></script>
        
            <script src="{{ asset('admin/js/jquery.noty.js') }}"></script>
        
            <script src="{{ asset('admin/js/jquery.elfinder.min.js') }}"></script>
        
            <script src="{{ asset('admin/js/jquery.raty.min.js') }}"></script>
        
            <script src="{{ asset('admin/js/jquery.iphone.toggle.js') }}"></script>
        
            <script src="{{ asset('admin/js/jquery.uploadify-3.1.min.js') }}"></script>
        
            <script src="{{ asset('admin/js/jquery.gritter.min.js') }}"></script>
        
            <script src="{{ asset('admin/js/jquery.imagesloaded.js') }}"></script>
        
            <script src="{{ asset('admin/js/jquery.masonry.min.js') }}"></script>
        
            <script src="{{ asset('admin/js/jquery.knob.modified.js') }}"></script>
        
            <script src="{{ asset('admin/js/jquery.sparkline.min.js') }}"></script>
        
            <script src="{{ asset('admin/js/counter.js') }}"></script>
        
            <script src="{{ asset('admin/js/retina.js') }}"></script>
    
            <script src="{{ asset('admin/js/custom.js') }}"></script>
        <!-- end: JavaScript-->
        
    
</body>
</html>