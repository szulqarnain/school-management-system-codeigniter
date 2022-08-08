            <!-- main-content -->
			<div class="main">


                <!-- container -->
				<div class="container">

                    	
					<!-- breadcrumb -->
					<div class="breadcrumb-header justify-content-between">
						<div class="my-auto">
							<div class="d-flex">
								<h4 class="content-title mb-0 my-auto">Teachers</h4><span class="text-muted mt-1 tx-13 ml-2 mb-0"></span>
							</div>
						</div>
						<div class="d-flex my-xl-auto right-content">
                            
                             <a class="btn ripple btn-primary" href="<?= base_url('teachers/add'); ?>"><i class="typcn typcn-plus"></i>  Add New  </a>

						</div>
					</div>
					<!-- breadcrumb -->

					<!-- row opened -->
					<div class="row row-sm">

						<!--div-->
						<div class="col-xl-12">
							<div class="card mg-b-20">
								<div class="card-header pb-0">
									<div class="d-flex justify-content-between">
										<h4 class="card-title mg-b-0">Teachers List</h4>
										<i class="mdi mdi-dots-horizontal text-gray"></i>
									</div>
									<p class="tx-12 tx-gray-500 mb-2">Example Example Example Example Example </p>
								</div>
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
                                                $rec = $this->db->get_where('bz_teachers', array('sch_id' => $this->session->userdata['sch_id']))->result_array();
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
                                                                <a class="dropdown-item" href="<?php echo base_url('teachers/detail/' . $row['use_id']);?>">View Detail</a>
                                                                <!-- <a class="dropdown-item" href="#">Edit Detail</a> -->
                                                                <a class="dropdown-item" href="#">Delete Records</a>
                                                            </div>
                                                        </div>
                                                    </td>
												</tr>


												<?php $j++; endforeach;?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
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


