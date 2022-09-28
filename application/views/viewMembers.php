<!-- partial -->
<div class="main-panel">
        <div class="content-wrapper">
          	<div class="row">
            	<div class="col-sm-12">
            		<div class="home-tab">
                		<div class="tab-content tab-content-basic">
                  			<div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
                    			<div class="row">
                      				<div class="col-lg-12 d-flex flex-column">
									  	<div class="row flex-grow">
											<div class="col-12 grid-margin stretch-card">
												<div class="card card-rounded table-darkBGImg">
													<div class="card-body">
														<div class="col-sm-12">
															<img width="100" height="100" style="float: left;margin-right: 20px;" class="float-right" src="<?php echo base_url("/uploads/".$familyHead->photo);?>">
															<h3 class="text-white upgrade-info mb-0">
																<?php 
																	echo $familyHead->name." ".$familyHead->surname;
																?>
															</h3>
															<h5 class="text-info">
																<?php 
																	if($familyHead->mobno != ""){

																		echo "Contact No. ".$familyHead->mobno;
																	}
																?>
															</h5>
															<h6 class="text-info"><?php echo "Address : ".$familyHead->address.", ".$familyHead->city.", ".$familyHead->state.", ".$familyHead->pincode;?></h6>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="row flex-grow">
											<div class="col-12 grid-margin stretch-card">
												<div class="card card-rounded">
													<div class="card-body">
														<div class="row">
															<div class="col-lg-12">
																<div class="d-flex justify-content-between align-items-center mb-3">
																<div>
																	<h4 class="card-title card-title-dash">Family Members</h4>
																</div>
																</div>
																<?php
																
																	foreach($familyList as $key => $value){

																		echo '<div class="mt-3">
																					<div class="wrapper d-flex align-items-center justify-content-between py-2 border-bottom">
																						<div class="d-flex">
																						<img class="img-sm rounded-10" src="'.base_url("uploads/".$value->photo).'" alt="profile">
																							<div class="wrapper ms-3">
																								<p class="ms-1 mb-1 fw-bold">'.$value->name.'</p>
																								<small class="text-mute"><i class="mb-0 mdi mdi-school"></i> Education : '.$value->education.'</small>
																							</div>
																						</div>
																						<div class="text-muted text-small">
																							<p><i class="mdi mdi-cake-variant"></i> Birthday : '.$value->dob.'</p>
																							<p><i class="mdi mdi-cake-layered"></i> Wedding Date :'.($value->mStatus == "m" ? $value->wdob : "-").'</p>
																						</div>
																					</div>
																				</div>';
																	}
																?>
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
          	</div>
        </div>
 <!-- content-wrapper ends -->

<script src="<?php echo base_url('assets/js/file-upload.js');?>"></script>