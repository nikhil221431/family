<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Datagrid Solutions</title>
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
						<h4>Hello! let's get started</h4>
						<h6 class="fw-light">Sign in to continue.</h6>
						<form class="pt-3" method="post" action="<?php echo site_url('login/validate') ;?>">
							<div class="form-group">
							<label for="email">Email Address</label>
							<input type="email" name="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email Id">
							</div>
							<div class="form-group">
							<label for="password">Password</label>
							<input type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
							</div>
							<div class="mt-3">
							<button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit">Sign in</button>
							</div>
							<div class="text-center mt-4 fw-light">
							Don't have an account? <a href="<?php echo site_url('login/register') ;?>" class="text-primary">Register</a>
							</div>
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
		$(document).ready(function(){

			//show notification msg
				var notMsg = "<?php echo $notMsg;?>";
				if(notMsg != ""){

					$("#notMsg").show();

					setTimeout(function() {
						$("#notMsg").alert('close');
					}, 3000);
				}
		});
	</script>
</body>

</html>
