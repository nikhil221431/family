<!-- partial -->
<div class="main-panel">
        <div class="content-wrapper">
          	<div class="row">
            	<div class="col-sm-12">
            		<div class="home-tab">
						<?php if(validation_errors()){ ?>
							<div class="alert alert-danger" id="notMsg" role="alert">
								<?php echo validation_errors(); ?>
							</div>
						<?php }?>
                		<div class="tab-content tab-content-basic">
                  			<div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
                    			<div class="row">
                      				<div class="col-lg-12 d-flex flex-column">
                        				<div class="row flex-grow">
                          					<div class="col-12 grid-margin stretch-card">
                            					<div class="card card-rounded">
													<div class="card-body">
														<h4 class="card-title">Family Members Form</h4>
														<p class="card-description">
															Family Members
														</p>
														<form class="forms-sample" method="post" id="familyForm" enctype="multipart/form-data" action="<?php echo site_url('Family/addMembers?for='.$familyId);?>">
															<div class="form-group">
																<label for="fname">Name</label>
																<input type="text" class="form-control" id="fname" name="name" placeholder="Name" value="">
																<p class="errorMsg text-danger" id="fnameError"></p>
															</div>
															<div class="form-group">
																<label for="fdob">Date Of Birth</label>
																<input type="date" class="form-control" id="fdob" name="dob" placeholder="Date Of Birth" value="">
															</div>
															<div class="form-group">
																<label>Marital Status</label>
																<select class="form-control" name="mStatus" id="fmstatus">
																	<option value="s">Single</option>
																	<option value="m" selected>Married</option>
																</select>
															</div>
															<div class="form-group">
																<label for="fwdob">Wedding Date</label>
																<input type="date" class="form-control" id="fwdob" name="wdob" placeholder="Wedding Date" value="">
																<p class="errorMsg text-danger" id="fwdobError"></p>
															</div>
															<div class="form-group">
																<label>Education</label>
																<input type="text" class="form-control" id="fedu" name="education" placeholder="Education" value="">
																<p class="errorMsg text-danger" id="feducationError"></p>
															</div>
															<div class="form-group">
																<label>Image</label>
																<input type="file" name="familyphoto" class="file-upload-default">
																<div class="input-group col-xs-12">
																	<input type="text" class="form-control file-upload-info" placeholder="Upload Image">
																	<span class="input-group-append">
																	<button class="file-upload-browse btn btn-primary" type="button">Upload</button>
																	</span>
																</div>
															</div>
															<button type="submit" class="btn btn-primary me-2">Submit</button>
															<a href="<?php echo site_url('Family/familyinfo');?>" class="btn btn-light">Cancel</a>
														</form>
													</div>
                            					</div>
                          					</div>
                        				</div>
                      				</div>
                    			</div>
                  			</div>
                		</div>
              		</div>
            	</div>
          	</div>
        </div>
 <!-- content-wrapper ends -->

<script src="<?php echo base_url('assets/js/file-upload.js');?>"></script>
<script>
	$(document).ready(function(){

		//marital status change event
			$("#fmstatus").on("change", function(){

				var mstatus  = $(this).val();
				if(mstatus == "m"){

					$("#fwdob").removeAttr("readonly");
				}
				else {

					$("#fwdob").attr("readonly", "readonly").val("").change();
				}
			});

		//form validation before submit the form
			$( "#familyForm" ).submit(function( event ) {
				
				$("input").removeClass("is-invalid");
				$(".errorMsg").hide();

				var errorMsg = false;
				var alphabetsRegex 	= /^[a-zA-Z\-]+$/;

				var name = $("#fname").val();
				var mstatus = $("#fmstatus option:selected").val();
				var wdob = $("#fwdob").val();

				if(name == "" || name == null){

					errorMsg = true;
					$("#fname").addClass("is-invalid");
					$("#fnameError").text("Please enter the name.").show();
				}
				else if(!alphabetsRegex.test(name)){

					errorMsg = true;
					$("#fname").addClass("is-invalid");
					$("#fnameError").text("Please enter only alphabets.").show();
				}
				else if(name.length < 2){

					errorMsg = true;
					$("#fname").addClass("is-invalid");
					$("#fnameError").text("Name must be grater than single characters.").show();
				}
				else if(name.length > 30){

					errorMsg = true;
					$("#fname").addClass("is-invalid");
					$("#fnameError").text("Name must be less than 30 characters.").show();
				}

				if(mstatus == "m" && wdob == ""){

					errorMsg = true;
					$("#fwdob").addClass("is-invalid");
					$("#fwdobError").text("Select Wedding date.").show();
				}

				if(errorMsg == true){

					event.preventDefault();
				}
			});
	});
</script>