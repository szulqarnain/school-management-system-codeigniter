            <!-- main-content -->
			<div class="main">


                <!-- container -->
				<div class="container">

                    	
					<!-- breadcrumb -->
					<div class="breadcrumb-header justify-content-between">
						<div class="my-auto">
							<div class="d-flex">
								<h4 class="content-title mb-0 my-auto">Classes</h4><span class="text-muted mt-1 tx-13 ml-2 mb-0">/ 
                                    <?php 
                                        
                                        $cla_id = $this->db->get_where('bz_sections', array('sec_id' => $sec_id))->row()->cla_id;

                                        echo $this->db->get_where('bz_classes', array('cla_id' => $cla_id))->row()->cla_name;

                                    ?> /
                                    <?= $this->db->get_where('bz_sections', array('sec_id' => $sec_id))->row()->sec_name; ?>
                                </span> 
							</div>
						</div>
						<div class="d-flex my-xl-auto right-content">
                            <div class="pr-1 mb-xl-0">
                                <!-- <div class="dropdown">
                                    <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-primary"
                                    data-toggle="dropdown" id="dropdownMenuButton" type="button"><i class="typcn typcn-plus"></i>  Add New </button>
                                    <div  class="dropdown-menu tx-13">
                                        <a  class="dropdown-item" data-effect="effect-scale" data-toggle="modal" href="#modaldemo8"> Add Class</a>
                                        <a  class="dropdown-item" data-effect="effect-scale" data-toggle="modal" href="#modaldemo9"> Add Section</a>
                                    </div>
                                </div> -->
                            </div>
						</div>
					</div>
					<!-- breadcrumb -->

					<!-- row opened -->
					<div class="row row-sm">

						<!--div-->
						<div class="col-xl-12">
							<div class="card">
								<div class="card-header pb-0">
									<div class="d-flex justify-content-between">
										<h4 class="card-title mg-b-0">
                                        <?php 
                                        
                                        $cla_id = $this->db->get_where('bz_sections', array('sec_id' => $sec_id))->row()->cla_id;

                                        echo $this->db->get_where('bz_classes', array('cla_id' => $cla_id))->row()->cla_name;

                                         ?>
                                         <span class="badge badge-primary"><?= $this->db->get_where('bz_sections', array('sec_id' => $sec_id))->row()->sec_name; ?></span>
                                        </h4>
                                        
									</div>
									<p class="tx-12 tx-gray-500 mb-2">Example example example example  .. </p>
								</div>
								<div class="card-body">

									<div class="row">
                                        <div class="col-sm-4">
                                            <table class="table">
                                                <tr>
                                                    <td style="text-transform:capitalize;border:none;">
                                                      <b>Teachers:</b> 
													  <?php 
													  		$tea_id = $this->db->get_where('bz_teachers', array('cla_id' => $cla_id, 'sec_id' => $sec_id))->row()->use_id; 
															if($tea_id){  
															echo  $this->db->get_where('bz_users', array('use_id' => $tea_id))->row()->use_fname . " " ;
															echo  $this->db->get_where('bz_users', array('use_id' => $tea_id))->row()->use_mname . " " ; 
															echo  $this->db->get_where('bz_users', array('use_id' => $tea_id))->row()->use_lname  ;
														}else{
															echo "<i style='font-size:11px;'><u>Not Assign</u></i>";
														}
															   
													  ?>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>

                                        <div class="col-sm-4">
                                            <table class="table">
                                                <tr>
                                                    <td style="text-transform:capitalize;border:none;">
                                                      <b>Performance:</b>
													   - -
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-sm-4">
                                            <table class="table">
                                                <tr>
                                                <td style="text-transform:capitalize;border:none;">
                                                      <b>Today Status:</b>
													  <i style='font-size:11px;'><u>Attendance Not Submited</u></i>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
									</div><!-- bd -->

								
								<div class="card-body">
									<div class="table-responsive">
										<table id="example" class="table key-buttons text-md-nowrap">
											<thead>
												<tr>
													<th class="border-bottom-0">ID</th>
													<th class="border-bottom-0">Name</th>
													<th class="border-bottom-0">Class & Section</th>
													<th class="border-bottom-0">Father Name</th>
													<th class="border-bottom-0">Mother Name</th>
													<th class="border-bottom-0">Action</th>
												</tr>
											</thead>
											<tbody>

                                            <?php 
                                                $j = 1; 
                                                $rec = $this->db->get_where('bz_students', array('sch_id' => $this->session->userdata['sch_id'], 'cla_id'=> $cla_id, 'sec_id' => $sec_id))->result_array();
                                                foreach ($rec as $row): 

                                                ?>

												<tr>
													<td><?= $this->db->get_where('bz_users', array('use_id' => $row['use_id']))->row()->use_username ?></td>
													<td><?= 
														$this->db->get_where('bz_users', array('use_id' => $row['use_id']))->row()->use_fname . " " . 
														$this->db->get_where('bz_users', array('use_id' => $row['use_id']))->row()->use_mname . " " . 
														$this->db->get_where('bz_users', array('use_id' => $row['use_id']))->row()->use_lname  
														?> </td>
													<td><?= 
														$this->db->get_where('bz_classes', array('cla_id' => $row['cla_id']))->row()->cla_name . " - " . 
														$this->db->get_where('bz_sections', array('sec_id' => $row['sec_id']))->row()->sec_name
														?></td>
													<td><?= 
														$this->db->get_where('bz_users', array('use_id' => $row['use_id']))->row()->use_father_name
														?></td>
													<td><?= 
														$this->db->get_where('bz_users', array('use_id' => $row['use_id']))->row()->use_mother_name
														?></td>

													<td>
                                                        <div class="dropdown">
                                                            <button style="padding: 2px 10px;" aria-expanded="false" aria-haspopup="true" class="btn ripple btn-primary"
                                                            data-toggle="dropdown" id="dropdownMenuButton" type="button">Action <i class="fas fa-caret-down ml-1"></i></button>
                                                            <div  class="dropdown-menu tx-13">
                                                                <a class="dropdown-item" href="<?php echo base_url('students/detail/' . $row['use_id']);?>">View Detail</a>
                                                                <!-- <a class="dropdown-item" href="#">Edit Detail</a> -->
                                                                <!-- <a class="dropdown-item" href="#">Delete Records</a> -->
                                                            </div>
                                                        </div>
                                                    </td>
												</tr>


												<?php $j++; endforeach;?>
											</tbody>
										</table>
									</div>
								</div>


							</div><!-- bd -->
						</div>
						<!--/div-->

					</div>
					<!-- /row -->

				
                </div>
				<!-- Container closed -->

			</div>
			<!-- main-content closed -->

            			<!-- Modal effects -->
			<div class="modal" id="modaldemo8">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content modal-content-demo">
                    <form method="post" action="<?php base_url('classes'); ?>">
						<div class="modal-header">
							<h6 class="modal-title">Add Class</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
						</div>
						<div class="modal-body">
                            <div class="form-group">
								<label for="class">Class Name</label>
								<input name="cla_name" type="text" class="form-control" id="class" required placeholder="Enter class name here">
							</div>
									
                        </div>
						<div class="modal-footer">
							<button  name="addClass" type="submit"  class="btn ripple btn-primary" type="button">Save</button>
						</div>
                        </form>
					</div>
				</div>
			</div>
			<!-- End Modal effects-->


            			<!-- Modal effects -->
                        <div class="modal" id="modaldemo9">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content modal-content-demo">
                    <form method="post" action="<?php base_url('classes'); ?>">
						<div class="modal-header">
							<h6 class="modal-title">Add Section</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
						</div>
						<div class="modal-body">
                            <div class="form-group">
								<label for="class">Class Name</label>
                                <select class="form-control" name="cla_id" required>
                                    <option value="">-- Select --</option>
                                    <?php $rec = $this->db->get_where('bz_classes', array('sch_id' => $this->session->userdata['sch_id']))->result_array(); foreach ($rec as $row){ ?>
                                        <option value="<?= $row['cla_id']; ?>"><?= $row['cla_name']; ?></option>
                                    <?php } ?>
                                </select>
							</div>
                            <div class="form-group">
								<label for="class">Section Name</label>
								<input type="text" name="sec_name" class="form-control" id="class" placeholder="Enter class name here" required>
							</div>
									
                        </div>
						<div class="modal-footer">
							<button  type="submit" name="AddSec" class="btn ripple btn-primary" type="button">Save</button>
						</div>
                        </form>
					</div>
				</div>
			</div>
			<!-- End Modal effects-->