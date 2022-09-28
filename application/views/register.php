<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Ascra Technologies</title>
	<!-- plugins:css -->
	<link rel="stylesheet" href="<?php echo base_url('assets/vendors/feather/feather.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('/assets/vendors/mdi/css/materialdesignicons.min.css');?>">
	<link rel="stylesheet" href="<?php echo base_url('/assets/vendors/ti-icons/css/themify-icons.css');?>">
	<link rel="stylesheet" href="<?php echo base_url('/assets/vendors/typicons/typicons.css');?>">
	<link rel="stylesheet" href="<?php echo base_url('/assets/vendors/simple-line-icons/css/simple-line-icons.css');?>">
	<link rel="stylesheet" href="<?php echo base_url('/assets/vendors/css/vendor.bundle.base.css');?>">
	<link rel="stylesheet" href="<?php echo base_url('/assets/css/vertical-layout-light/style.css');?>">


  	<style>
		.errorMsg {

			display : none;
		}
	</style>
</head>

<?php

	$notMsg = isset($notMsg) ? $notMsg : "";
	$notMsgType = isset($notMsgType) ? $notMsgType : "primary";
?>

<body>
	<div class="container-scroller">
		<div class="container-fluid page-body-wrapper full-page-wrapper">
			<div class="content-wrapper d-flex align-items-center auth px-0">
				<div class="row w-100 mx-0">
					<div class="col-lg-4 mx-auto">
						<div class="alert <?php echo "alert-".$notMsgType;?> errorMsg" id="notMsg" role="alert">
							<?php echo $notMsg; ?>
						</div>
						<div class="auth-form-light text-left py-5 px-4 px-sm-5">
							<div class="brand-logo h3 text-primary">
								Datagrid Solutions
							</div>
							<h4>User Registration Form</h4>
							<h6 class="fw-light">Register to continue.</h6>
							<form class="pt-3" method="post" id="registrationForm" action="<?php echo site_url('Login/registerSumbit') ;?>">
								<div class="form-group">
									<label for="username">Username</label>
									<input type="text" class="form-control" id="username" placeholder="Username" name="username">
									<p class="errorMsg text-danger" id="errorUsername"></p>
								</div>
								<div class="form-group">
									<label for="email">Email address</label>
									<input type="email" class="form-control" id="email" placeholder="Email" name="email">
									<p class="errorMsg text-danger" id="errorEmail"></p>
								</div>
								<div class="form-group">
									<label for="password">Password</label>
									<input type="password" class="form-control" id="password" placeholder="Password" name="password">
									<p class="errorMsg text-danger" id="errorPassword"></p>
								</div>
								<div class="form-group">
									<label for="cpassword">Confirm Password</label>
									<input type="password" class="form-control" id="cpassword" placeholder="Password" name="cpassword">
								</div>
								<button type="submit" class="btn btn-primary me-2">Submit</button>
								<button type="button" class="btn btn-light">
									<a href="<?php echo site_url();?>">Cancel</a>
								</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		<!-- content-wrapper ends -->
		</div>
		<!-- page-body-wrapper ends -->
	</div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="<?php echo base_url('/assets/vendors/js/vendor.bundle.base.js');?>"></script>

  <script>
    $( document ).ready(function() {

		//show notification msg
			var notMsg = "<?php echo $notMsg;?>";
			if(notMsg != ""){
				$("#notMsg").show();

				setTimeout(function() {
					$("#notMsg").alert('close');
				}, 3000);
			}

		//validation before form submit
			$( "#registrationForm" ).submit(function( event ) {

				var errorMsg 	= "",
					username 	= $("#username").val(),
					email 		= $("#email").val(),
					password 	= $("#password").val(),
					cpassword 	= $("#cpassword").val();

				var usernameRegex 	= /^[a-zA-Z\-]+$/;
				var emailRegex 		= /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

				$("input").removeClass("is-invalid");
				$(".errorMsg").hide();

				if(username == "" || username == null){

					errorMsg = "TRUE";
					$("#username").addClass("is-invalid");
					$("#errorUsername").text("Username should not be blank").show();
				}
				else if(!usernameRegex.test(username)){

					errorMsg = "TRUE";
					$("#username").addClass("is-invalid");
					$("#errorUsername").text("Username does not contain any special characters or numbers").show();
				}
				else if(username.length >= 30){

					errorMsg = "TRUE";
					$("#username").addClass("is-invalid");
					$("#errorUsername").text("Username must contain max 30 characters").show();
				}

				if(!emailRegex.test(email)){

					errorMsg = "TRUE";
					$("#email").addClass("is-invalid");
					$("#errorEmail").text("Enter valid email id").show();
				}

				if(password.length < 6 || password.length > 32){

					errorMsg = "TRUE";
					$("#password").addClass("is-invalid");
					$("#cpassword").addClass("is-invalid");
					$("#errorPassword").text("Passwords must contain 6 to 32 characters.").show();
				}
				else if(password !== cpassword){

					errorMsg = "TRUE";
					$("#password").addClass("is-invalid");
					$("#cpassword").addClass("is-invalid");
					$("#errorPassword").text("Passwords does not match.").show();
				}

				if(errorMsg != ""){

					event.preventDefault();
				}
			});
    });
  </script>
</body>

</html>