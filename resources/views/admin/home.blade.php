@extends('admin.admin-master')
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
          <div class="card pd-20 bg-primary">

            <div class="d-flex justify-content-between align-items-center mg-b-10">
              <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Today's order</h6>
              <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
            </div><!-- card-header -->
            <div class="d-flex align-items-center justify-content-between">
             <span><h3 class="mg-b-0 tx-white tx-lato tx-bold">Today</h3></span>
              <h3 class="mg-b-0 tx-white tx-lato tx-bold">{{$order_today}}</h3>
            </div><!-- card-body -->
            <div class="d-flex align-items-center justify-content-between mg-t-15 bd-t bd-white-2 pd-t-10">
              <div>
                <span class="tx-11 tx-white-6">Sales amount</span>
                <h class="tx-11 tx-white mg-b-0">${{$Totalamount_today}}</h>
              </div>
              <div>
                <span class="tx-11 tx-white-6">Collection</span>
                <h class="tx-11 tx-white mg-b-0">${{$collection_today}}</h>
              </div>
              <div>
                <span class="tx-11 tx-white-6">Due</span>
                <h class="tx-11 tx-white mg-b-0">${{$due_today}}</h>
              </div>
            </div><!-- -->

          </div><!-- card -->
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
                <h class="tx-11 tx-white mg-b-0">${{$Totalamount_currentMonth}}</h>
              </div>
              <div>
                <span class="tx-11 tx-white-6">Collection</span>
                <h class="tx-11 tx-white mg-b-0">${{$collection_currentMonth}}</h>
              </div>
              <div>
                <span class="tx-11 tx-white-6">Due</span>
                <h class="tx-11 tx-white mg-b-0">${{$due_currentMonth}}</h>
              </div>
            </div><!-- -->

          </div><!-- card -->
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
                <h class="tx-11 tx-white mg-b-0">${{$Totalamount_currentYear}}</h>
              </div>
              <div>
                <span class="tx-11 tx-white-6">Collection</span>
                <h class="tx-11 tx-white mg-b-0">${{$collection_currentYear}}</h>
              </div>
              <div>
                <span class="tx-11 tx-white-6">Due</span>
                <h class="tx-11 tx-white mg-b-0">${{$due_currentYear}}</h>
              </div>
            </div><!-- -->
          </div>
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
                <h class="tx-11 tx-white mg-b-0">${{$Totalamount}}</h>
              </div>
              <div>
                <span class="tx-11 tx-white-6">Collection</span>
                <h class="tx-11 tx-white mg-b-0">${{$collection_Total}}</h>
              </div>
              <div>
                <span class="tx-11 tx-white-6">Due</span>
                <h class="tx-11 tx-white mg-b-0">${{$due_Total}}</h>
              </div>
            </div><!-- -->

        </div><!-- col-3 -->
      </div><!-- row -->

      </div><!-- sl-pagebody -->

  </div><!-- sl-mainpanel -->


 
            
    
     
    
    <div class="sl-pagebody">
     <div class="row row-sm">
        <div class="col-md-12"> 
              <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Low Quantity Products</h6>    
                <div class="table-wrapper">
                   <table id="datatable1" class="table display responsive nowrap">
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

                    @foreach ($products as $row)
					@if($row->product_quantity <= $row->lowquantity_alart)
                      <tr>
					   <td>{{ $row->product_code }}</td>
                        <td>{{ $row->product_name }}</td>
                        <td>{{ $row->product_quantity }}</td>
                       
                        <td>
                            @if($row->status == 1)
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
					   @endif
                      @endforeach
					 
                    </tbody>
                  </table>
                </div><!-- table-wrapper -->
              </div><!-- card -->
        </div>

    </div>



      
    </div><!-- sl-pagebody -->

  
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
