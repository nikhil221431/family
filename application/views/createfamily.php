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
														<h4 class="card-title">Family Information Form</h4>
														<p class="card-description">
															Add Family
														</p>
														<form class="forms-sample" method="post" id="familyForm" enctype="multipart/form-data" action="<?php echo site_url('Family/createfamily');?>">
															<div class="form-group">
																<label for="fname">Name</label>
																<input type="text" class="form-control" id="fname" name="name" placeholder="Name" value="">
																<p class="errorMsg text-danger" id="fnameError"></p>
															</div>
															<div class="form-group">
																<label for="fsurname">Surname</label>
																<input type="text" class="form-control" id="fsurname" name="surname" placeholder="Surname" value="">
																<p class="errorMsg text-danger" id="fsurnameError"></p>
															</div>
															<div class="form-group">
																<label for="fdob">Date Of Birth</label>
																<input type="date" class="form-control" id="fdob" name="dob" placeholder="Date Of Birth" value="">
																<p class="errorMsg text-danger" id="fdobError"></p>
															</div>
															<div class="form-group">
																<label for="fmobno">Mobile Number</label>
																<input type="number" class="form-control" id="fmobno" name="mobno" placeholder="Mobile Number" value="">
																<p class="errorMsg text-danger" id="fmobnoError"></p>
															</div>
															<div class="form-group">
																<label for="faddress">Address</label>
																<textarea class="form-control" id="faddress" name="address" placeholder="Address" rows="4" value=""></textarea>
															</div>
															<div class="form-group">
																<label for="fstate">State</label>
																<select class="js-example-basic-single w-100" name="state" id="stateList">
																	<option value="">Select State</option>
																	
																	<?php 
																		foreach($stateList->result as $key => $value){
																			
																			echo '<option value="'.$value->id.'">'.$value->state.'</option>';
																		}
																		?>
																</select>
																<p class="errorMsg text-danger" id="stateError"></p>
															</div>
															<div class="form-group">
																<label for="fcity">City</label>
																<select class="js-example-basic-single w-100" name="city" id="cityList">
																	<option value="">Select State</option>
																</select>
																<p class="errorMsg text-danger" id="cityError"></p>
															</div>
															<div class="form-group">
																<label for="fpincode">Pincode</label>
																<input type="number" class="form-control" id="fpincode" name="pincode" placeholder="Pincode" value="">
																<p class="errorMsg text-danger" id="fpincodeError"></p>
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
																<label>Hobbies</label>
																<div class="row" id="hobbiesList">
																	<div class="row">
																		<div class="col-sm-10">
																			<input type="text" class="form-control" class="fhobbies" name="hobbies[]" placeholder="Hobbies" value="">
																		</div>
																		<div class="col-sm-2">
																			<button type="button" class="btn btn-sm btn-primary btn-rounded btn-icon addHobbies">
																				<i class="mdi mdi-plus-box"></i>
																			</button>
																			<button type="button" class="btn btn-sm btn-danger btn-rounded btn-icon deleteHobbies">
																				<i class="mdi mdi-delete"></i>
																			</button>
																		</div>
																	</div>
																</div>
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

		//get city list as per selected state
			$("#stateList").on("change", function(){

				var stateId = $(this).val();

				if(stateId == ""){

					$("#cityList").html("<option value=''>Select City</option>");
				}
				else {

					var form_data = {
										stateId : stateId
									};
		
					$.post( "<?php echo site_url('Family/cityList');?>" ,form_data,function(message) {
		
					var htmlData = "<option value=''>Select City</option>";
		
					if(message.output == "TRUE"){
		
						$.each(message.result, function(index, value){

							htmlData += "<option value='"+value.id+"'>"+value.city+"</option>"
						});
					}
					else {

						console.log("error in get city list");
					}
		
					$("#cityList").html(htmlData);

					}, 'json');
				}

			});

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

		//click event of add hobbies
			$(document).on("click", ".addHobbies", function () {

				console.log("add button click");
				
				var htmlData = '<div class="row">\
									<div class="col-sm-10">\
										<input type="text" class="form-control" class="fhobbies" name="hobbies[]" placeholder="Hobbies" value="">\
									</div>\
									<div class="col-sm-2">\
										<button type="button" class="btn btn-sm btn-primary btn-rounded btn-icon addHobbies">\
											<i class="mdi mdi-plus-box"></i>\
										</button>\
										<button type="button" class="btn btn-sm btn-danger btn-rounded btn-icon deleteHobbies">\
											<i class="mdi mdi-delete"></i>\
										</button>\
									</div>\
								</div>';

				$("#hobbiesList").append(htmlData);
			});

		//click event of remove hobbies
			$(document).on("click", ".deleteHobbies", function(){

				if($(".deleteHobbies").length == 1){

					alert("You are unable to delete last node.");
				}
				else {

					$(this).parent().parent().remove();
				}
			});

		//form validation before submit the form
			$( "#familyForm" ).submit(function( event ) {
				
				$("input").removeClass("is-invalid");
				$(".errorMsg").hide();

				var errorMsg = false;
				var alphabetsRegex 	= /^[a-zA-Z\-]+$/;

				var name = $("#fname").val();
				var surname = $("#fsurname").val();
				var mobNo = $("#fmobno").val();
				var state = $("#stateList option:selected").val();
				var city = $("#cityList option:selected").val();
				var pincode = $("#fpincode").val();
				var mstatus = $("#fmstatus option:selected").val();
				var wdob = $("#fwdob").val();
				var dob = $("#fdob").val();

				if(dob == ""){

					errorMsg = true;
					$("#fdob").addClass("is-invalid");
					$("#fdobError").text("Please Enter birthdate").show();
				}
				else {

					dob = new Date(dob);
					let today = new Date();
					let age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));

					if(age <= 21 ){

						errorMsg = true;
						$("#fdob").addClass("is-invalid");
						$("#fdobError").text("Only accept if age is above 21 years").show();
					}
				}

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

				if(surname == "" || surname == null){

					errorMsg = true;
					$("#fsurname").addClass("is-invalid");
					$("#fsurnameError").text("Please enter the surname.").show();
				}
				else if(!alphabetsRegex.test(name)){

					errorMsg = true;
					$("#fsurname").addClass("is-invalid");
					$("#fsurnameError").text("Please enter only alphabets.").show();
				}
				else if(surname.length < 2){

					errorMsg = true;
					$("#fsurname").addClass("is-invalid");
					$("#fsurnameError").text("Surname must be grater than single characters.").show();
				}
				else if(surname.length > 30){

					errorMsg = true;
					$("#fsurname").addClass("is-invalid");
					$("#fsurnameError").text("Surname must be less than 30 characters.").show();
				}

				if(mobNo.length != 10){

					errorMsg = true;
					$("#fmobno").addClass("is-invalid");
					$("#fmobnoError").text("Please enter 10 digit number.").show();
				}

				if(state == "" || state == null){

					errorMsg = true;
					$("#stateError").text("Please select state.").show();
				}

				if(city == "" || city == null){

					errorMsg = true;
					$("#cityError").text("Please select city.").show();
				}

				if(pincode.length != 6){

					errorMsg = true;
					$("#fpincode").addClass("is-invalid");
					$("#fpincodeError").text("Please enter 6 digit number.").show();
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