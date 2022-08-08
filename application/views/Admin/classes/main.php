            <!-- main-content -->
			<div class="main">


                <!-- container -->
				<div class="container">

                    	
					<!-- breadcrumb -->
					<div class="breadcrumb-header justify-content-between">
						<div class="my-auto">
							<div class="d-flex">
								<h4 class="content-title mb-0 my-auto">Classes</h4><span class="text-muted mt-1 tx-13 ml-2 mb-0"></span>
							</div>
						</div>
						<div class="d-flex my-xl-auto right-content">
                            <div class="pr-1 mb-xl-0">
                                <div class="dropdown">
                                    <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-primary"
                                    data-toggle="dropdown" id="dropdownMenuButton" type="button"><i class="typcn typcn-plus"></i>  Add New </button>
                                    <div  class="dropdown-menu tx-13">
                                        <a  class="dropdown-item" data-effect="effect-scale" data-toggle="modal" href="#modaldemo8"> Add Class</a>
                                        <a  class="dropdown-item" data-effect="effect-scale" data-toggle="modal" href="#modaldemo9"> Add Section</a>
                                    </div>
                                </div>
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
										<h4 class="card-title mg-b-0">Classes List</h4>
										<i class="mdi mdi-dots-horizontal text-gray"></i>
									</div>
									<p class="tx-12 tx-gray-500 mb-2">Example example example example  .. </p>
								</div>
								<div class="card-body">
									<div class="">
										<table class="table table-bordered mg-b-0 text-md-nowrap">
											<thead>
												<tr>
													<th>SR.</th>
													<th>Name</th>
													<th>No of Sections</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>

                                            <?php 
                                                $j = 1; 
                                                $rec = $this->db->get_where('bz_classes', array('sch_id' => $this->session->userdata['sch_id']))->result_array();
                                                foreach ($rec as $row): 

                                                ?>
												<tr>
													<th scope="row"><?= $j ?></th>
													<td><?= $row['cla_name'] ?></td>
													<td>
                                                        <?php 
                                                         $colors = ['primary','secondary','success','danger','warning','info'];
                                                         $i = 0;
                                                         $sec = $this->db->get_where('bz_sections', array('cla_id' => $row['cla_id']))->result_array(); 
                                                         foreach ($sec as $row2){ ?>
                                                            <a href="<?php echo base_url("classes/section/" . $row2['sec_id']);?>"><span class="badge badge-<?= $colors[$i] ?>"><?= $row2['sec_name']; ?></span></a>
                                                        <?php $i++; if($i==6){$i=0;} } ?>

                                                    </td>
													<td>
                                                        <div class="dropdown">
                                                            <button style="padding: 2px 10px;" aria-expanded="false" aria-haspopup="true" class="btn ripple btn-primary"
                                                            data-toggle="dropdown" id="dropdownMenuButton" type="button">Action <i class="fas fa-caret-down ml-1"></i></button>
                                                            <div  class="dropdown-menu tx-13">
                                                                <a class="dropdown-item" href="#">Edit Detail</a>
                                                                <a class="dropdown-item" href="#">Delete Records</a>
                                                            </div>
                                                        </div>
                                                    </td>
												</tr>
											<?php $j++; endforeach;?>
											</tbody>
										</table>
									</div><!-- bd -->
								</div><!-- bd -->
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