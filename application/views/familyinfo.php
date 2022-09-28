	<!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-sm-12">
              <div class="home-tab">
                <div class="tab-content tab-content-basic">
                  <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
				  	<div class="col-12 grid-margin">
						<div class="card">
							<div class="card-body">
								<h4 class="card-title">Search</h4>
								<form class="form-sample" method="post" action="<?php echo site_url('Family/familyinfo');?>">
									<div class="row">
										<div class="col-md-6">
											<div class="form-group row">
												<label class="col-sm-3 col-form-label">Name</label>
												<div class="col-sm-9">
													<input type="text" class="form-control" id="familyname" name="familyname" placeholder="Family Name" value="<?php echo $fname;?>">
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group row">
												<div class="col-sm-12">
													<button type="submit" class="btn btn-success me-2">Submit</button>
												</div>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
                    <div class="row">
                      <div class="col-lg-12 d-flex flex-column">
                        <div class="row flex-grow">
                          <div class="col-12 grid-margin stretch-card">
                            <div class="card card-rounded">
                              <div class="card-body">
                                <div class="d-sm-flex justify-content-between align-items-start">
                                  <div>
                                    <h4 class="card-title card-title-dash">Family Information</h4>
                                   <!-- <p class="card-subtitle card-subtitle-dash">You have 50+ new requests</p> -->
                                  </div>
                                  <div>
                                    <a href="<?php echo site_url('Family/createfamily');?>" class="btn btn-primary btn-lg text-white mb-0 me-0">
                                        <i class="mdi mdi-plus-box"></i>Add Member
                                    </a>
                                  </div>
                                </div>
                                <div class="table-responsive  mt-1">
                                  <table class="table select-table" id="tblFamilyInfo">
                                    <thead>
                                      <tr>
										<th>Sr No.</th>
										<th>Photo</th>
                                        <th>Name</th>
                                        <th>Surname</th>
                                        <th>Phone No.</th>
										<th>Address</th>
										<th>City</th>
										<th>State</th>
										<th>Pincode</th>
										<th>Hobbies</th>
                                        <th>Family Members</th>
                                        <th>Add Members</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            foreach($familyInfo as $key => $value){

												$familyMembers	= $value->familyMembers != 0 ? 
																	'<a href="'.site_url("Family/viewMembers?familyId=$value->id").'"  class="btn btn-outline-link btn-info btn-icon-text">
																		'.$value->familyMembers.'
																	</a>' : "";
                                                echo    '<tr>
                                                            <td>'.++$key.'</td>
                                                            <td><img src="'.base_url('uploads/'.$value->photo).'"/></td>
                                                            <td>'.$value->name.'</td>
                                                            <td>'.$value->surname.'</td>
                                                            <td>'.$value->mobno.'</td>
                                                            <td>'.$value->address.'</td>
                                                            <td>'.$value->city.'</td>
                                                            <td>'.$value->state.'</td>
                                                            <td>'.$value->pincode.'</td>
                                                            <td>'.$value->hobbies.'</td>
                                                            <td>
																'.$familyMembers.'	
															</td>
                                                            <td>
																<a href="'.site_url('Family/addMembers?for='.$value->id).'">
																	<button class="btn btn-outline-link btn-icon-text">
																		<i class="mdi mdi-account-plus"></i>
																	</button>
																</a>
                                                            </td>
                                                        </tr>';
                                            }
                                        ?>
                                    </tbody>
                                  </table>
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

<script>
    $(document).ready(function(){

		$('#tblFamilyInfo').DataTable( {
			"pageLength": 20
		});
    });
</script>