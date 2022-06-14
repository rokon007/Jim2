@extends('admin.admin-master')

@section('user') active @endsection
@section('admin_content')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="index.html">Admin</a>
      <span class="breadcrumb-item active">Add user</span>
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
			   <a href="" class="btn btn-info pd-x-20" data-toggle="modal" data-target="#myModal" style="width:20%;"><i class="fa fa-user"></i>
			Add user
			  
			  </a>
               
                <div class="table-wrapper">
                  <table id="datatable1" class="table display responsive nowrap">
                    <thead>
                      <tr>
                        <th class="wd-15p">Id</th>
						<th class="wd-15p">Name</th>
                        <th class="wd-15p">Roll</th>
                        <th class="wd-15p">Mobile</th>
                        <th class="wd-15p">Email</th>
						<th class="wd-15p">Image</th>
						<th class="wd-15p">Action</th>
						
                        
                      </tr>
                    </thead>
                    <tbody>

                   @foreach ($user as $newuser)
                      <tr>
					  <td>{{ $newuser->id}}</td>
					   <td>{{ $newuser->name}}</td>
					    <td>
						@if($newuser->roll==1)
							<span class="tx-danger"><i class="fa fa-user mg-r-5"></i>Admin</span>
						
						@elseif($newuser->roll==2)
						<span class="tx-success"><i class="fa fa-user mg-r-5"></i>SR</span>
						
						@elseif($newuser->roll==3)
						<span class="tx-warning"><i class="fa fa-user mg-r-5"></i>Delevery Man</span>
						@elseif($newuser->roll==4)
						<span class="tx-info"><i class="fa fa-user mg-r-5"></i>Customer</span>
						
						@endif
						</td>
					   <td>{{ $newuser->mobile}}</td> 
					    <td>{{ $newuser->email}}</td> 
					  <td>
					<img src="{{ asset('upload/admin/'.$newuser->image) }}" onerror="this.onerror=null;this.src='{{ asset('rokon') }}/images/user.jpg';" class="wd-36 rounded-circle" alt="Image">
                    </td>
					<td>
					@if($newuser->roll==2)
					<a href="{{ url('sr-set/'.$newuser->id) }}"  title="Replace" class="btn btn-outline-warning btn-icon rounded-circle mg-r-5"><div><i class="fa fa-stack-overflow"></i></div></a>
				    @endif
					<a href=""  title="Edit" class="btn btn-sm btn-success"><i class="fa fa-pencil"></i></a>
                    <a title="Delete"  href="{{ url('user-delete/'.$newuser->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Are You Shure To Delete')"><i class="fa fa-trash"></i></a>
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

<!--===============================modal========================-->
 <div id="myModal" class="modal fade">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content tx-size-sm">
              <div class="modal-header pd-x-20">
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Add user</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
			  <form method="POST" action="{{ route('register_user') }}" enctype="multipart/form-data">
                        @csrf
         <div class="modal-body pd-20">              
            <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
              
              <div class="row">
                <label class="col-sm-4 form-control-label">Name: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Enter name" value="{{ old('name') }}" required autocomplete="name" autofocus>
				               @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>
              </div><!-- row -->
			                     
              <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">Email: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Enter email" value="{{ old('email') }}" required autocomplete="email">
				                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>
              </div>
              <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">Mobaile: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <input type="number" class="form-control" name="mobile" placeholder="Enter mobile number">
                </div>
              </div>
			  
			  <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">Roll: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
				<select class="form-control select2" name="roll" data-placeholder="Choose Roll">
                    <option value="">Choose Roll</option> 
					<option value="1">Admin</option> 
                    <option value="2">SR</option>
                    <option value="3">Delevery Man</option>
                </select>                
                </div>
              </div>
			  
			  <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">Password: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                   <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
				                 @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>
              </div>
			  
			  <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">Confirm Password: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>
              </div>
			  
			   
			   <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">Image: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                    <input class="form-control" type="file" name="image" >
                </div>
              </div>
			  
			  
              
             
            </div><!-- card -->
         
                      
              
              </div><!-- modal-body -->
              <div class="modal-footer">
			  <button type="submit" class="btn btn-info pd-x-20">
                                    {{ __('Register') }}
                                </button>
                
                <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
              </div>
			  </form>
            </div>
          </div><!-- modal-dialog -->
        </div><!-- modal -->
<!--===============================end modal========================-->		
@endsection