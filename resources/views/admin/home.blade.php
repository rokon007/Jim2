@extends('admin.admin-master')
@section('rokonlink')
<script src="{{ asset('rokon/admin_dassbord.js') }}"></script> 
<script src="{{ asset('rokon/jquery.printPage.js') }}"></script> 
<script src="https://code.jquery.com/jquery-3.5.1.js"></script> 
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script> 
<script src="https://cdn.datatables.net/keytable/2.7.0/js/dataTables.keyTable.min.js"></script> 
@endsection
@section('dashboard') active @endsection
@section('admin_content')
 <!-- ########## START: MAIN PANEL ########## -->

 <div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="index.html">Starlight</a>
      <span class="breadcrumb-item active">Dashboard</span>
    </nav>


    <div class="sl-pagebody">

      <div class="row row-sm">
        <div class="col-sm-6 col-xl-3">
          <a  onclick="div_todayFunction()" >
          <div class="card pd-20 bg-primary">
            <div class="d-flex justify-content-between align-items-center mg-b-10">
              <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Today's Sales amount</h6>
              
            </div><!-- card-header -->
            <div class="d-flex align-items-center justify-content-between">
             <!-- <span><h3 class="mg-b-0 tx-white tx-lato tx-bold">Today</h3></span> -->
              <h4 class="mg-b-0 tx-white tx-lato tx-bold">&#2547; {{$Totalamount_today}}</h4>
            </div><!-- card-body -->
            <div class="d-flex align-items-center justify-content-between mg-t-15 bd-t bd-white-2 pd-t-10">
              <div>
                <span class="tx-11 tx-white-6">Order</span>
                <h class="tx-11 tx-white mg-b-0">{{$sales_order_today_count}}</h>
              </div>
              <div>
                <span class="tx-11 tx-white-6">Collection</span>
                <h class="tx-11 tx-white mg-b-0">&#2547; {{$collection_today}}</h>
              </div>
              <div>
                <span class="tx-11 tx-white-6">Due</span>
                <h class="tx-11 tx-white mg-b-0">&#2547; {{$due_today}}</h>
              </div>
            </div><!-- -->

          </div><!-- card --><br>
          </a>
                <button  onclick="div_lowqtyFunction()" class="btn btn-danger btn-block mg-b-10"><i class="fa fa-arrow-down"></i> Low Qty = {{$low_qty_count}}</button> 
                <button onclick="div_todayConfermorderFunction()" class="btn btn-dark btn-block mg-b-10">Confer Ord={{$confermorder_today_count}}</button>
                <button onclick="todaysCullectionFunction()" class="btn btn-purple btn-block mg-b-10">Cullection=&#2547;  {{$todays_cullection_count}}</button>
             
        </div><!-- col-3 -->
        <div class="col-sm-6 col-xl-3 mg-t-20 mg-sm-t-0">
          <div class="card pd-20 bg-info">

            <div class="d-flex justify-content-between align-items-center mg-b-10">
              <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Order</h6>
              <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
            </div><!-- card-header -->
            <div class="d-flex align-items-center justify-content-between">
             <span><h3 class="mg-b-0 tx-white tx-lato tx-bold">{{$monthName}}</h3></span>
              <h3 class="mg-b-0 tx-white tx-lato tx-bold">{{$order_currentMonth}}</h3>
            </div><!-- card-body -->
            <div class="d-flex align-items-center justify-content-between mg-t-15 bd-t bd-white-2 pd-t-10">
              <div>
                <span class="tx-11 tx-white-6">Sales amount</span>
                <h class="tx-11 tx-white mg-b-0">&#2547;{{$Totalamount_currentMonth}}</h>
              </div>
              <div>
                <span class="tx-11 tx-white-6">Collection</span>
                <h class="tx-11 tx-white mg-b-0">&#2547; {{$collection_currentMonth}}</h>
              </div>
              <div>
                <span class="tx-11 tx-white-6">Due</span>
                <h class="tx-11 tx-white mg-b-0">&#2547; {{$due_currentMonth}}</h>
              </div>
            </div><!-- -->

          </div><!-- card -->

               <br><button onclick="div_orderFunction()" class="btn btn-info btn-block mg-b-10">All Order</button>
                <button onclick="div_cableFunction()" class="btn btn-info btn-block mg-b-10">Cable</button>
                 <button onclick="div_otherFunction()" class="btn btn-info btn-block mg-b-10">Other Priducts</button>

        </div><!-- col-3 -->

        <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
          <div class="card pd-20 bg-purple">

            <div class="d-flex justify-content-between align-items-center mg-b-10">
              <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Order</h6>
              <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
            </div><!-- card-header -->
            <div class="d-flex align-items-center justify-content-between">
             <span><h3 class="mg-b-0 tx-white tx-lato tx-bold">{{$year}}</h3></span>
              <h3 class="mg-b-0 tx-white tx-lato tx-bold">{{$order_currentYear}}</h3>
            </div><!-- card-body -->
            <div class="d-flex align-items-center justify-content-between mg-t-15 bd-t bd-white-2 pd-t-10">
              <div>
                <span class="tx-11 tx-white-6">Sales amount</span>
                <h class="tx-11 tx-white mg-b-0">&#2547; {{$Totalamount_currentYear}}</h>
              </div>
              <div>
                <span class="tx-11 tx-white-6">Collection</span>
                <h class="tx-11 tx-white mg-b-0">&#2547; {{$collection_currentYear}}</h>
              </div>
              <div>
                <span class="tx-11 tx-white-6">Due</span>
                <h class="tx-11 tx-white mg-b-0">&#2547; {{$due_currentYear}}</h>
              </div>
            </div><!-- -->
          </div>

             <br><button onclick="div_todayFunction()" class="btn btn-indigo btn-block mg-b-10">Todays Order</button>

        </div><!-- col-3 -->

        <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
          <div class="card pd-20 bg-sl-primary">

             <div class="d-flex justify-content-between align-items-center mg-b-10">
              <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Order</h6>
              <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
            </div><!-- card-header -->
            <div class="d-flex align-items-center justify-content-between">
             <span><h3 class="mg-b-0 tx-white tx-lato tx-bold">All</h3></span>
              <h3 class="mg-b-0 tx-white tx-lato tx-bold">{{$order_Total}}</h3>
            </div><!-- card-body -->
            <div class="d-flex align-items-center justify-content-between mg-t-15 bd-t bd-white-2 pd-t-10">
              <div>
                <span class="tx-11 tx-white-6">Sales amount</span>
                <h class="tx-11 tx-white mg-b-0">&#2547; {{$Totalamount}}</h>
              </div>
              <div>
                <span class="tx-11 tx-white-6">Collection</span>
                <h class="tx-11 tx-white mg-b-0">&#2547; {{$collection_Total}}</h>
              </div>
              <div>
                <span class="tx-11 tx-white-6">Due</span>
                <h class="tx-11 tx-white mg-b-0">&#2547; {{$due_Total}}</h>
              </div>
            </div><!-- -->

        </div><!-- col-3 -->

        <br>
      @foreach ($srbutton as $button)
        <a href="{{ url('sr-detels/'.$button->name.'/'.$button->image) }}" class="btn btn-dark btn-block mg-b-10">
          <img src="{{ asset('upload/admin/'.$button->image) }}" class="wd-20 rounded-circle" alt="Image">
          {{$button->name}}
        </a>
      @endforeach 
      </div>
    </div><!-- row -->
  </div><!-- sl-pagebody -->
  
<style type="text/css">
  #events {
        margin-bottom: 1em;
        padding: 1em;
        background-color: #f6f6f6;
        border: 1px solid #999;
        border-radius: 3px;
        height: 100px;
        overflow: auto;
    }
      #events1 {
        margin-bottom: 1em;
        padding: 1em;
        background-color: #f6f6f6;
        border: 1px solid #999;
        border-radius: 3px;
        height: 100px;
        overflow: auto;
    }
</style>
<script type="text/javascript">
  
  $(document).ready(function() {
    var events = $('#events');
    var table = $('#example').DataTable( {
        keys: true
    } );
 
    table
        .on( 'key', function ( e, datatable, key, cell, originalEvent ) {
            events.prepend( '<div>Key press: '+key+' for cell <i>'+cell.data()+'</i></div>' );
        } )
        .on( 'key-focus', function ( e, datatable, cell ) {
            events.prepend( '<div>Cell focus: <i>'+cell.data()+'</i></div>' );
        } )
        .on( 'key-blur', function ( e, datatable, cell ) {
            events.prepend( '<div>Cell blur: <i>'+cell.data()+'</i></div>' );
        } )
} );



  $(document).ready(function() {
    var events = $('#events1');
    var table = $('#example1').DataTable( {
        keys: true
    } );
 
    table
        .on( 'key', function ( e, datatable, key, cell, originalEvent ) {
            events.prepend( '<div>Key press: '+key+' for cell <i>'+cell.data()+'</i></div>' );
        } )
        .on( 'key-focus', function ( e, datatable, cell ) {
            events.prepend( '<div>Cell focus: <i>'+cell.data()+'</i></div>' );
        } )
        .on( 'key-blur', function ( e, datatable, cell ) {
            events.prepend( '<div>Cell blur: <i>'+cell.data()+'</i></div>' );
        } )
} );

</script>

            

           
              

            
  
            
            
            

                     
             


     
     


 
  
            

            

   <?php
       $view_div = Session::get('view_div');
       if($view_div){
   ?>         
    <body onload="div_srFunction();">
    <?php 
     }else{
    ?>  
     <body>
     <?php 
     }
     ?>        
        
            

           

            
                  
     
   
    <div class="sl-pagebody">
     <div class="row row-sm">
     <div class="col-md-12"> 

         <!-------------->
     <div id="div_dassboard" >
         <script type="text/javascript">
           $(document).ready(function() {
    $('#collection_bydate').DataTable( {
        keys: true
    } );
} );
         </script>
              <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">collection By date</h6>    
                <div class="table-wrapper">
                 
                  <table id="collection_bydate" class="table table-bordered display" style="width:100%">
                     <thead class="bg-danger">
                       <tr>                       
                        <th class="wd-15p">Date</th>
                        <th class="wd-15p">Payment</th>                       
                      </tr>
                     </thead>
                     <tbody>
            @foreach ($cullection_Bydate as $cullection)
                       <tr>            
                      
                      <td>{{date('d-M-y',strtotime($cullection->my_date))}}</td>
                      <td>{{ $cullection->total_payment}}</td>            
                    </tr>
            @endforeach           
                     </tbody>
                  </table>   
                </div><!--table-wrapper--> 
              </div>
         
      </div><!--div_total-->           
    <!-------------->

        <div id="div_lowqty" style="display: none;">
              <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Low Quantity Products</h6>    
                <div class="table-wrapper">
                   <table id="datatable1" class="display" style="width:100%"> 
                    <thead>
                      <tr>
                       <th class="wd-15p">Product Code</th>
                        <th class="wd-15p">Product Name</th>
						
                        <th class="wd-15p">Product Quantity</th>
                        
                        <th class="wd-20p">Status</th>  
                        <th class="wd-25p">Action</th>
                      </tr>
                    </thead>
                    <tbody>

                    @foreach ($low_products as $row)
					<?php if($row->product_quantity <= 1){?>
                      <tr class="bg-danger" >
					<?php }else{ ?>
					 <tr>
					<?php } ?>
					   <td>{{ $row->product_code }}</td>
                        <td>{{ $row->product_name }}</td>										
                        <td>{{ $row->product_quantity }}</td>
                       
                        <td>
                            @if($row->product_quantity == 1)
                            <span class="badge badge-success">Active</span>
                            @else 
                            <span class="badge badge-danger">Iactive</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ url('admin/products/edit/'.$row->id) }}" class="btn btn-sm btn-success"><i class="fa fa-pencil"></i></a>
                            <a href="{{ url('admin/products/delete/'.$row->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Are You Shure To Delete')"><i class="fa fa-trash"></i></a>
                            @if($row->status == 1)
                            <a href="{{ url('admin/products/inactive/'.$row->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-arrow-down"></i></a>
                            @else
                            <a href="{{ url('admin/products/active/'.$row->id) }}" class="btn btn-sm btn-success"><i class="fa fa-arrow-up"></i></a>
                            @endif
                        </td>
                      </tr>
					   
                      @endforeach
					 
                    </tbody>
                  </table>
                </div><!-- table-wrapper -->
              </div><!-- card -->
        </div><!--div_lowqty-->
		
		<!-------------->
     <div id="div_other" style="display: none;">
        <script type="text/javascript">
           $(document).ready(function() {
    $('#other_tb').DataTable( {
        keys: true
    } );
} );
       </script>

              <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">{{$monthName}}'s Other Order<br>Total Amount = {{$other_totalamount_month}}</h6>    
                <div class="table-wrapper">
                 <table id="other_tb" class="table table-bordered display" style="width:100%">
                    <thead>
                      <tr>
					    <th class="wd-15p">Date</th>
                        <th class="wd-15p">Invoice</th>
                        <th class="wd-15p">Shope name</th>
                        <th class="wd-15p">Mobile</th>
                        <th class="wd-15p">Amount</th>
                       <th class="wd-15p">Created by</th>
                        
                      </tr>
                    </thead>
                    <tbody>

                   @foreach ($other_order_month as $order)
                      <tr>
					  <td>{{date('d-M-y',strtotime($cullection->my_date))}}</td>
            <td>
             <a class="submenu" href="#">                 
                  <span class="hidden-tablet" style="color: blue">{{ $order->invoice}}</span></a>
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
          
      </div><!--div_other-->           
    <!--------------> 
		
		 <!-------------->
     <div id="div_cable" style="display: none;">
        <script type="text/javascript">
           $(document).ready(function() {
    $('#cable_tb').DataTable( {
        keys: true
    } );
} );
</script>

              <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">{{$monthName}}'s Cable Order<br>Total Amount = {{$cable_totalamount_month}}</h6>    
                <div class="table-wrapper">
                 <table id="cable_tb" class="table table-bordered display" style="width:100%">
                    <thead>
                      <tr>
					    <th class="wd-15p">Date</th>
                        <th class="wd-15p">Invoice</th>
                        <th class="wd-15p">Shope name</th>
                        <th class="wd-15p">Mobile</th>
                        <th class="wd-15p">Amount</th>
                       <th class="wd-15p">Created by</th>
                        
                      </tr>
                    </thead>
                    <tbody>

                   @foreach ($cable_order_month as $order)
                      <tr>
					  <td>{{date('d-M-y',strtotime($cullection->my_date))}}</td>
            <td>
             <a class="submenu" href="#">
                 
                  <span class="hidden-tablet" style="color: blue">{{ $order->invoice}}</span></a>
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
          
      </div><!--div_cable-->           
    <!--------------> 
     
    <!-------------->
     <div id="div_today" style="display: none;">
        <script type="text/javascript">
           $(document).ready(function() {
    $('#todaysorrder_tb').DataTable( {
        keys: true
    } );
} );
</script>

              <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Todays Order</h6>    
                <div class="table-wrapper">
                 <table id="todaysorrder_tb" class="table table-bordered display" style="width:100%">
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

                   @foreach ($sales_order_today as $order)
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
          
      </div><!--div_today-->           
    <!-------------->  
    <!-------------->
     <div id="div_todayConfermorder" style="display: none;">
         <script type="text/javascript">
           $(document).ready(function() {
    $('#todaycullection_tb').DataTable( {
        keys: true
    } );
} );
</script>

              <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Todays Conferm order</h6>    
                <div class="table-wrapper">
                 <table id="todaycullection_tb" class="table table-bordered display table-primary" style="width:100%">
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

                   @foreach ($confermorder_today as $order)
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
          
      </div><!--div_todayConfermorder-->           
    <!--------------> 
    
   <!-------------->
     <div id="div_todaysCullection" style="display: none;">
        
               <script type="text/javascript">
           $(document).ready(function() {
    $('#todaycullection_tb1').DataTable( {
        keys: true
    } );
} );
</script>

              <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Todays Cullection</h6>    
                <div class="table-wrapper">
                 <table id="todaycullection_tb1" class="table table-bordered display" style="width:100%">
                    
                     <thead class="bg-info">
                       <tr>                       
                        <th class="wd-15p">Invoice</th>
                        <th class="wd-15p">Shope name</th>
                        <th class="wd-15p">Mobile</th>
                        <th class="wd-15p">Payment</th>
                        <th class="wd-15p">Due</th>
                        <th class="wd-15p">SR</th>
                        <th class="wd-15p">Created by</th>            </tr>
                     </thead>
                     <tbody>
            @foreach ($todays_cullection as $cullection)
                       <tr>            
                      <td>{{$cullection->invoice}}</td>
                      <td>{{$cullection->shop_name}}</td>
                      <td>{{$cullection->customer_phone}}</td>
                      <td>{{$cullection->payment}}</td>
                      <td>{{$cullection->due}}</td>
                      <td>{{$cullection->sr}}</td>
                      <td>{{$cullection->created_by}}</td>
                    </tr>
            @endforeach           
                     </tbody>
                  </table>   
                </div><!--table-wrapper--> 
              </div>
         
      </div><!--div_todaysCullection-->           
   <!-------------->
     <div id="div_order" style="display: none;">
      
       <script type="text/javascript">
           $(document).ready(function() {
    $('#todaycullection_tb11').DataTable( {
        keys: true
    } );
} );
</script>

              <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">All order</h6>    
                <div class="table-wrapper">
                 <table id="todaycullection_tb11" class="table table-bordered display" style="width:100%">
                    
                     <thead class="bg-info">
                      <tr>
                        <th class="wd-15p">Product code</th>
                        <th class="wd-15p">Product</th>
                        <th class="wd-15p">Quantity</th>
                        
                        
                      </tr>
                    </thead>
                    <tbody>

                   @foreach ($all_order as $order)
                      <tr>
            
           
            <td>
            {{ $order->product_code}} 
            </td>
             <td>
            {{ $order->product}} 
            </td>
            <td> {{ $order->total_qty }} </td>
            
             
                      </tr>
                      @endforeach
                    </tbody>
                    
                  </table>
                </div><!-- table-wrapper --> 
              </div>
         
      </div><!--div_order-->           
    <!-------------->  
   
   <!-------------->
     <div id="div_currentmonth" style="display: none;">
      
              <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">{{$monthName}}</h6>    
                <div class="table-wrapper">

                </div><!--table-wrapper--> 
              </div>
         
      </div><!--div_currentmonth-->           
    <!--------------> 
    <!-------------->
     <div id="div_year" style="display: none;">
      
              <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">{{$year}}</h6>    
                <div class="table-wrapper">

                </div><!--table-wrapper--> 
              </div>
         
      </div><!--div_year-->           
    <!--------------> 
    <!-------------->
     <div id="div_total" style="display: none;">
       
              <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">total</h6>    
                <div class="table-wrapper">

                </div><!--table-wrapper--> 
              </div>
         
      </div><!--div_total-->           
    <!--------------> 
       <!-------------->
     <div id="div_sr" style="display: none;">
        @if(Session::get('view_div'))
        <?php $sr=Session::get('$usersr')?>
              <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title"><img src="{{ asset('upload/admin/'.Session::get('img')) }}" class="wd-40 rounded-circle" alt="Image"> {{Session::get('usersr')}} <br>To days total cullection: {{Session::get('todays_srcullection_count')}}</h6>    
                <div id="div_sr_btngroup" class="btn-group" role="group" aria-label="Basic example">
  <button onclick="sr_todayFunction()" type="button" class="btn btn-secondary pd-x-25 active">Order</button>
  <button onclick="sr_monthFunction()"  type="button" class="btn btn-secondary pd-x-25">Month View</button>
  <button type="button" class="btn btn-secondary pd-x-25">Account Settings</button>
  <button onclick="div_srFunction()" type="button" class="btn btn-secondary pd-x-25">Back</button>
</div><!--div_sr_btngroup-->
<br>

<div id="sr_today">
<div class="card bg-dark tx-white bd-0">
                <div class="card-body">
                  <h5 class="card-body-title tx-white">{{Session::get('usersr')}}'s todays activity</h5>
                  <p class="card-subtitle tx-normal tx-white-8 mg-b-15">All Todats Cullection = {{Session::get('sr_quary')->  total_paid}}</p>
                  <p class="card-subtitle tx-normal tx-white-8 mg-b-15">Todats Orders = 00</p>


                    <script type="text/javascript">
                    $(document).ready(function() {
                    $('#srtoday_tb').DataTable( {
                             keys: true
                          } );
                        } );
                  </script>

          <div class="table-wrapper">
                  <table id="srtoday_tb" class="display" style="width:100%">
                     <thead class="bg-danger">
                       <tr>                       
                        <th class="wd-15p">Date</th>
                        <th class="wd-15p">Invoice</th>
                        <th class="wd-15p">Shop</th>
                        <th class="wd-15p">Phone</th>
                        <th class="wd-15p">Amount</th>              </tr>
                     </thead>
                     <tbody>
   <?php $order = Session::get('sr_order'); if($order){?> 
            @foreach ($order as $neworder)
                       <tr>            
                      
                <td class="tx-danger">{{date('d-M-y',strtotime($neworder->my_date))}}</td>
                <td class="tx-danger">{{ $neworder->invoice}}</td>
                <td class="tx-danger">{{$neworder->shop_name}}</td>
                <td class="tx-danger">{{ $neworder->customer_phone}}</td>   
                <td class="tx-danger">{{ $neworder->total_amount}}</td>           
                    </tr>
            @endforeach 
            <?php } ?> 
                     </tbody>
                  </table>   
                </div><!--table-wrapper--> 
                  




                </div>
              </div>
</div><!--sr_today-->

<div id="sr_month" style="display: none;">
<div class="card bg-dark tx-white bd-0">
                <div class="card-body">
                  <h5 class="card-body-title tx-white">{{$monthName}} cullection</h5>
                  <p class="card-subtitle tx-normal tx-white-8 mg-b-15">{{$monthName}}'s Total Cullection = {{Session::get('sr_monthlyamount_sum')}}</p>
                  <script type="text/javascript">
                    $(document).ready(function() {
                    $('#srmonth_tb').DataTable( {
                             keys: true
                          } );
                        } );
						
						$('#srmonth_tb').DataTable( {
    drawCallback: function () {
      var api = this.api();
      $( api.table().footer() ).html(
        api.column( 1, {page:'current'} ).data().sum()
      );
    }
  } );
                  </script>

          <div class="table-wrapper">
                  <table id="srmonth_tb" class="display" style="width:100%">
                     <thead class="bg-danger">
                       <tr>                       
                        <th class="wd-15p">Date</th>
                        <th class="wd-15p">Cullection</th>                       
                      </tr>
                     </thead>
                     <tbody>
   <?php $cullection_month = Session::get('monthly_sr_cullection'); if($cullection_month){?> 
            @foreach ($cullection_month as $cullection)
                       <tr>            
                      
                      <td class="tx-danger">{{date('d-M-y',strtotime($cullection->my_date))}}</td>
                      <td class="tx-danger">{{ $cullection->total_payment}}</td>            
                    </tr>
            @endforeach 
            <?php } ?> 
                     </tbody>
					  <tfoot>
                             <tr class="card-link tx-white-7 hover-white">
            
                             </tr>
                        </tfoot>

                  </table>   
                </div><!--table-wrapper--> 


                  <a href="#" class="card-link tx-white-7 hover-white">Card link</a>
                  <a href="#" class="card-link tx-white-7 hover-white">Another link</a>
                </div>
              </div>
</div><!--sr_month-->

              </div><!-- card -->
        @endif  
      </div><!--div_sr-->           
    <!--------------> 
    
   <!-------------->
    


         </div><!-- col-md-12 -->
      </div><!-- row row-sm -->
    </div><!-- sl-pagebody -->
</body>
  
  <!-- ########## END: MAIN PANEL ########## -->
    
@endsection
@push('javascript')
<!-- <script>

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
@endpush
