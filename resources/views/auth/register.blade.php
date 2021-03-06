<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Registration |Jim Electric</title>
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Font-->
	<link rel="stylesheet" type="text/css" href="rokon/css/roboto-font.css" >
	<link rel="stylesheet" type="text/css" href="rokon/fonts/line-awesome/css/line-awesome.min.css" >
	<!-- Jquery -->
	<link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">
	<!-- Main Style Css -->
   <link rel="stylesheet" href="rokon/css/style.css"/ >
	
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	
       
    
</head>    
        
   
           
<body class="form-v2">
	<div class="page-content">
        <?php $message = Session::get('message');if($message){ ?>
		 
    <script type="text/javascript">
     Swal.fire({
  icon: 'error',
  title: '<?php  echo $message; ?>',
  text: 'Please contact with Admin',
  footer: '<a href="">Why do I have this issue?</a>'
})   
    </script>
<?php  Session::put('message',null); } ?>  
		<div class="form-v2-content">
			<div class="form-left">
				<img src="rokon/images/form-v3.jpg" alt="form">
				<div class="text-1">
					<p style="background:#FF7A59;opacity: .5;">Registration <br>For Shop Owner <span>Jim Electric & Hardware</span></p>
				</div>
				<div class="text-2">
					<p style="background:#FF7A59;opacity: .5;"><span></span>Developed By ROKON</p>
				</div>
			</div>
			<form class="form-detail" method="POST" action="{{ route('register_userc') }}" enctype="multipart/form-data" >
			@csrf
			<div id="myform"> 
				<h2>Registration Form</h2>
				<div class="form-row">
					<label for="full-name">Name:</label>					
					<input type="text" name="name" id="full_name" class="input-text" placeholder="Name">
				</div>
				<div class="form-row">
					<label for="your_email">Your Email:</label>
					<input type="text" name="email" id="your_email" class="input-text" required pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}">
				</div>
				<div class="form-row">
					<label for="your_email">Your Mobaile:</label>
					 <input type="number" class="input-text" id="mobile" name="mobile" required placeholder="Enter mobile number">
				</div>
                <input type="hidden" name="roll" value="4">
				<div class="form-row">
					<label for="password">Password:</label>
					<input type="password" name="password" id="password" class="input-text" required>
				</div>
				<div class="form-row">
					<label for="comfirm-password">Confirm Password:</label>
					<input type="password" name="password_confirmation" id="confirm_password" class="input-text" required>
				</div>
				<div class="form-row">
					<label for="comfirm-password">Image:</label>
					 <input class="input-text" type="file" name="image" >
				</div>
				<div class="form-checkbox">
					<label class="container"><p>By signing up, you agree to the <a href="#" class="text">Play Term of Service</a></p>
					  	<input type="checkbox" name="agree" id="agree">
					  	<span class="checkmark"></span>
					</label>
				</div>
				<div class="form-row-last">
					<input type="submit" name="register" class="register" value="Register">
				</div>
				</div>
			</form>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
	<script>
		// just for the demos, avoids form submit
		jQuery.validator.setDefaults({
		  	debug: true,
		  	success:  function(label){
        		label.attr('id', 'valid');
   		 	},
		});
		$( "#myform" ).validate({
		  	rules: {
		    	password: "required",
		    	confirm_password: {
		      		equalTo: "#password"
		    	}
		  	},
		  	messages: {
		  		full_name: {
		  			required: "Please provide an username"
		  		},
		  		your_email: {
		  			required: "Please provide an email"
		  		},
		  		password: {
	  				required: "Please provide a password"
		  		},
		  		confirm_password: {
		  			required: "Please provide a password",
		      		equalTo: "Wrong Password"
		    	}
		  	}
		});
	</script>
</body>
</html>