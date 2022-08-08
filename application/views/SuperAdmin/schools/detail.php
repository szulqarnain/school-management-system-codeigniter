<?php 

$use_id = $this->db->get_where('bz_admins', array('sch_id' => $sch_id))->row()->use_id;
?>

             <!-- main-content -->
			<div class="main">


                <!-- container -->
				<div class="container">

                    	
					<!-- breadcrumb -->
					<div class="breadcrumb-header justify-content-between">
						<div class="my-auto">
							<div class="d-flex" style="text-transform:capitalize;">
								<h4 class="content-title mb-0 my-auto">School </h4><span class="text-muted mt-1 tx-13 ml-2 mb-0">/
                                    
                                    <?= 

                                        $this->db->get_where('bz_schools', array('sch_id' => $sch_id))->row()->sch_name;

                                    ?>
                                </span>
							</div>
						</div>
						<div class="d-flex my-xl-auto right-content"></div>
					</div>
					<!-- breadcrumb -->

					<!-- row opened -->
					<div class="row row-sm">

						<!--div-->
						<div class="col-xl-12">
							<div class="card">
								<div class="card-header pb-0">
									<div class="d-flex justify-content-between">
										<h4 class="card-title mg-b-0">School Detail</h4>
									</div>
                                    <hr>
								</div>
								<div class="card-body" style="padding-top: 0px;">
									<div class="row">
                                        <div class="col-sm-4">
                                            <table class="table">
                                                <tr>
                                                    <td style="text-transform:capitalize;border:none;">
                                                      <b>Name:</b>  <?= 

                                                            $this->db->get_where('bz_schools', array('sch_id' => $sch_id))->row()->sch_name;

                                                        ?>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>

                                        <div class="col-sm-4">
                                            <table class="table">
                                                <tr>
                                                    <td style="text-transform:capitalize;border:none;">
                                                      <b>City:</b>  <?= 

                                                            $this->db->get_where('bz_schools', array('sch_id' => $sch_id))->row()->sch_city;

                                                            ?>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-sm-4">
                                            <table class="table">
                                                <tr>
                                                <td style="text-transform:capitalize;border:none;">
                                                      <b>Address:</b>  <?= 

                                                            $this->db->get_where('bz_schools', array('sch_id' => $sch_id))->row()->sch_address;

                                                            ?>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
									</div><!-- bd -->
								</div><!-- bd -->
							</div><!-- bd -->
						</div>
						<!--/div-->
						<!--div-->
						<div class="col-xl-12">
							<div class="card">
								<div class="card-header pb-0">
									<div class="d-flex justify-content-between">
										<h4 class="card-title mg-b-0">Admin Detail</h4>
									</div>
                                    <hr>
								</div>
								<div class="card-body">
									<div class="row">
                                        <div class="col-sm-3">
                                            <img src="<?= asset_url() ?>user_img/<?php if(!$this->db->get_where('bz_users', array('use_id' => $use_id))->row()->use_image){ echo "blank.png";}else{ echo $this->db->get_where('bz_users', array('use_id' => $use_id))->row()->use_image; }?>" alt="">
                                        </div>
                                        <div class="col-sm-3">
                                            <table class="table">
                                                <tr>
                                                    <td style="text-transform:capitalize;">
                                                      <b>Name:</b>  <?= 

                                                            $this->db->get_where('bz_users', array('use_id' => $use_id))->row()->use_fname . " ";
                                                            $this->db->get_where('bz_users', array('use_id' => $use_id))->row()->use_mname . " ";
                                                            $this->db->get_where('bz_users', array('use_id' => $use_id))->row()->use_lname;

                                                        ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="text-transform:capitalize;">
                                                       <b>F:</b> <?php

                                                           echo  $this->db->get_where('bz_users', array('use_id' => $use_id))->row()->use_mother_name;

                                                        ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="text-transform:capitalize;">
                                                       <b>M:</b> <?php

                                                           echo  $this->db->get_where('bz_users', array('use_id' => $use_id))->row()->use_mother_name;

                                                        ?>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td style="text-transform:capitalize;">
                                                        <b>DOB:</b> <?= 

                                                            $this->db->get_where('bz_users', array('use_id' => $use_id))->row()->use_birthday;

                                                        ?>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-sm-3">
                                            <table class="table">
                                                <tr>
                                                <td style="text-transform:capitalize;">
                                                        <b>Email:</b> <?= 

                                                            $this->db->get_where('bz_users', array('use_id' => $use_id))->row()->use_email;

                                                        ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="text-transform:capitalize;">
                                                       <b>Gender:</b> <?php

                                                           echo  $this->db->get_where('bz_users', array('use_id' => $use_id))->row()->use_gender;

                                                        ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="text-transform:capitalize;">
                                                       <b>Address:</b> <?php

                                                           echo  $this->db->get_where('bz_users', array('use_id' => $use_id))->row()->use_address;

                                                        ?>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>

                                        <div class="col-sm-3">
                                            <table class="table">
                                                <tr><center><b>Credential Details</b></center></tr>
                                                <tr>
                                                    <td style="text-transform:capitalize;">
                                                        <b>Admin ID:</b> <?= 

                                                            $this->db->get_where('bz_users', array('use_id' => $use_id))->row()->use_username;

                                                        ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                <td style="text-transform:capitalize;">
                                                        <b>Password:</b> <?= 

                                                            $this->db->get_where('bz_users', array('use_id' => $use_id))->row()->use_password;

                                                        ?>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
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