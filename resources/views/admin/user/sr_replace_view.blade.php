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
         <?php $message = Session::get('message');if($message){?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong><?php  echo $message; ?></strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
         <?php Session::put('message',null); } ?> 
         <div class="card pd-20 pd-sm-40">
         	<div class="col-lg-12">
         	<div class="row">
         	 <div class="col-lg-6">
         	<div class="form-group has-success mg-b-0">
         		<img src="{{ asset('upload/admin/'.$sr->image) }}" class="wd-20 rounded-circle" alt="Image">
         		{{$sr->name}}&nbsp;&nbsp;  Replace with
         	</div>
         </div>
          <div class="col-lg-4">
         	<div class="form-group has-success">
                  <select class="form-control select2">
                    <option value="">Replace with<option>
                    @foreach ($all_sr as $newsr)
					 <option value="{{$newsr->name}}">
					 	<img src="{{ asset('upload/admin/'.$newsr->image) }}" class="wd-10 rounded-circle" alt="Image">
					 	{{$newsr->name}}
					 	<option>
					@endforeach 
                    
                  </select>
                </div>
            </div>
            <div class="col-lg-2">
         	<div class="form-group has-success">
         		<button class="btn btn-danger form-control"><i class="fa fa-stack-overflow"></i>&nbsp;&nbsp;&nbsp;Replace</button>
         	</div>
         </div>
            </div>
            </div>
         </div>
     </div>
 </div>
</div>
</div>
@endsection        
			
			 
         
		  
          

        
        