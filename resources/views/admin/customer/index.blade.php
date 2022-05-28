@extends('admin.admin-master')
@section('Wholesale') active show-sub @endsection
@section('Manage_customer') active @endsection
@section('admin_content')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="index.html">Admin</a>
      <span class="breadcrumb-item active">Manage customer</span>
    </nav>

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
                <h6 class="card-body-title">Manage customer</h6>    
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
					   <a class="submenu" href="{{url('admin/selas_pro/'.Auth::user()->id.'/'.$customer->id) }}">
                 
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
@endsection