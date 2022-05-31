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
              <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Today's Sales</h6>
              <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
            </div><!-- card-header -->
            <div class="d-flex align-items-center justify-content-between">
              <span class="sparkline2">5,3,9,6,5,9,7,3,5,2</span>
              <h3 class="mg-b-0 tx-white tx-lato tx-bold">$850</h3>
            </div><!-- card-body -->
            <div class="d-flex align-items-center justify-content-between mg-t-15 bd-t bd-white-2 pd-t-10">
              <div>
                <span class="tx-11 tx-white-6">Gross Sales</span>
                <h6 class="tx-white mg-b-0">$2,210</h6>
              </div>
              <div>
                <span class="tx-11 tx-white-6">Tax Return</span>
                <h6 class="tx-white mg-b-0">$320</h6>
              </div>
            </div><!-- -->
          </div><!-- card -->
        </div><!-- col-3 -->
        <div class="col-sm-6 col-xl-3 mg-t-20 mg-sm-t-0">
          <div class="card pd-20 bg-info">
            <div class="d-flex justify-content-between align-items-center mg-b-10">
              <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">This Week's Sales</h6>
              <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
            </div><!-- card-header -->
            <div class="d-flex align-items-center justify-content-between">
              <span class="sparkline2">5,3,9,6,5,9,7,3,5,2</span>
              <h3 class="mg-b-0 tx-white tx-lato tx-bold">$4,625</h3>
            </div><!-- card-body -->
            <div class="d-flex align-items-center justify-content-between mg-t-15 bd-t bd-white-2 pd-t-10">
              <div>
                <span class="tx-11 tx-white-6">Gross Sales</span>
                <h6 class="tx-white mg-b-0">$2,210</h6>
              </div>
              <div>
                <span class="tx-11 tx-white-6">Tax Return</span>
                <h6 class="tx-white mg-b-0">$320</h6>
              </div>
            </div><!-- -->
          </div><!-- card -->
        </div><!-- col-3 -->
        <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
          <div class="card pd-20 bg-purple">
            <div class="d-flex justify-content-between align-items-center mg-b-10">
              <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">This Month's Sales</h6>
              <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
            </div><!-- card-header -->
            <div class="d-flex align-items-center justify-content-between">
              <span class="sparkline2">5,3,9,6,5,9,7,3,5,2</span>
              <h3 class="mg-b-0 tx-white tx-lato tx-bold">$11,908</h3>
            </div><!-- card-body -->
            <div class="d-flex align-items-center justify-content-between mg-t-15 bd-t bd-white-2 pd-t-10">
              <div>
                <span class="tx-11 tx-white-6">Gross Sales</span>
                <h6 class="tx-white mg-b-0">$2,210</h6>
              </div>
              <div>
                <span class="tx-11 tx-white-6">Tax Return</span>
                <h6 class="tx-white mg-b-0">$320</h6>
              </div>
            </div><!-- -->
          </div><!-- card -->
        </div><!-- col-3 -->
        <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
          <div class="card pd-20 bg-sl-primary">
            <div class="d-flex justify-content-between align-items-center mg-b-10">
              <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">This Year's Sales</h6>
              <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
            </div><!-- card-header -->
            <div class="d-flex align-items-center justify-content-between">
              <span class="sparkline2">5,3,9,6,5,9,7,3,5,2</span>
              <h3 class="mg-b-0 tx-white tx-lato tx-bold">$91,239</h3>
            </div><!-- card-body -->
            <div class="d-flex align-items-center justify-content-between mg-t-15 bd-t bd-white-2 pd-t-10">
              <div>
                <span class="tx-11 tx-white-6">Gross Sales</span>
                <h6 class="tx-white mg-b-0">$2,210</h6>
              </div>
              <div>
                <span class="tx-11 tx-white-6">Tax Return</span>
                <h6 class="tx-white mg-b-0">$320</h6>
              </div>
            </div><!-- -->
          </div><!-- card -->
        </div><!-- col-3 -->
      </div><!-- row -->

    </div><!-- sl-pagebody -->
	
	
	

  </div><!-- sl-mainpanel -->
  <!-- ########## END: MAIN PANEL ########## -->
   
@endsection
@push('javascript')
<script>

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

        // $('.save_btn').on('click', function(e) {

        //     $.ajaxSetup({
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         }
        //     });
            
        //     let title = $('#title').val();
        //     let description = $('#description').val();

        //     const form = $(this).parents('form');

        //     $(form).validate({
        //         rules: {
        //             title: {
        //                 required: true
        //             }
        //         },
        //         message: {
        //             title: "Title is required"
        //         },
        //         submitHandler: function() {
        //             var formData = new FormData(form[0]);

        //             $.ajax({
        //                 type: 'POST',
        //                 url: 'save_task',
        //                 data: formData,
        //                 processData: false,
        //                 contentType: false,
        //                 success:function(data) {
        //                     console.log(data);
        //                     if(data.status) {
        //                         $('#notifDiv').fadeIn();
        //                         $('#notifDiv').css('background', 'green');
        //                         $('#notifDiv').text(data.message);
        //                         setTimeout(() => {
        //                             $('#notifDiv').fadeOut();
        //                         }, 3000);
        //                         $('[name="title"]').val('');
        //                         $('textarea[name="description"]').val('');
        //                     } else {
        //                         $('#notifDiv').fadeIn();
        //                         $('#notifDiv').css('background', 'red');
        //                         $('#notifDiv').text('Something went wrong');
        //                         setTimeout(() => {
        //                             $('#notifDiv').fadeOut();
        //                         }, 3000);
        //                     }
        //                 },
        //                 error:function(err) {
        //                     console.log(err);
        //                 }
        //             });
        //         }
        //     });
            
        // });
    });
</script>
@endpush
