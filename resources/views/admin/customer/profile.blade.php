@extends('admin.admin-master')

@section('customer_profile') active @endsection
@section('admin_content')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="index.html">Admin</a>
      <span class="breadcrumb-item active">Customer Profile</span>
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
			  
			Customer list
			  
			 
               
                <div class="table-wrapper">
                  <table id="datatable1" class="table display responsive nowrap">
                    <thead>
                      <tr>
                        <th class="wd-15p">Id</th>
						<th class="wd-15p">Name</th>
                        <th class="wd-15p">Shope Name</th>
                        <th class="wd-15p">Mobile</th>
                        <th class="wd-15p">Address</th>
						<th class="wd-15p">Image</th>
						<th class="wd-15p">Action</th>
						
                        
                      </tr>
                    </thead>
                    <tbody>

                   @foreach ($customer as $newcustomer)
                      <tr>
					  <td>{{ $newcustomer->id}}</td>
					   <td>{{ $newcustomer->customer_name}}</td>
					    <td>
						{{ $newcustomer->shop_name}}
						</td>
					   <td>{{ $newcustomer->customer_phone}}</td> 
					    <td>{{ $newcustomer->customer_adderss}}</td> 
					  <td>
					<img src="{{ asset('upload/customer/'.$newcustomer->image) }}" class="wd-36 rounded-circle" alt="Image">
                    </td>
					<td>
					<a href="{{ url('customer/view_profile/'.$newcustomer->id) }}" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>

                    <a href="{{ url('customer-delete/'.$newcustomer->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Are You Shure To Delete')"><i class="fa fa-trash"></i></a>
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