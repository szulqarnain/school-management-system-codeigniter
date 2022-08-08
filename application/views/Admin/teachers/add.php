            <!-- main-content -->
			<div class="main">


                <!-- container -->
				<div class="container">

                <?php echo form_open_multipart('teachers/add');?>

					<!-- breadcrumb -->
					<div class="breadcrumb-header justify-content-between">
						<div class="my-auto">
							<div class="d-flex">
								<h4 class="content-title mb-0 my-auto">Teachers</h4>
                                    <span class="text-muted mt-1 tx-13 ml-2 mb-0">/ Add
                                </span> 
							</div>
						</div>
						<div class="d-flex my-xl-auto right-content">
                            
                             <button name="addTeacher" type="submit" class="btn ripple btn-primary"><i class="fas fa-download"></i> &nbsp;  Save  </button>

						</div>
					</div>
					<!-- breadcrumb -->

					<!-- row -->
					<div class="row">
						<div class="col-lg-12 col-md-12">
							<div class="card">
								<div class="card-body">
                                        <div>
                                            <h6 class="card-title mb-1">Teacher Add</h6>
                                            <p class="text-muted card-sub-title"></p>
                                        </div>
                                        <div class="row mb-4">
                                            <div class="col-sm-12 col-md-3">
                                                <input required type="file" name="image" class="dropify" data-height="240" />
                                            </div>
                                            <div class="col-sm-12 col-md-7 mg-t-9 mg-sm-t-0">
                                                <div class="row">

                                                    <div class="col-sm-4 form-group">
                                                        <label for="">First Name</label>
                                                        <input required name="use_fname" type="text" class="form-control">
                                                    </div>
                                                    

                                                    <div class="col-sm-4 form-group">
                                                        <label for="">Middle Name</label>
                                                        <input required name="use_mname" type="text" class="form-control">
                                                    </div>
                                                    
                                                    <div class="col-sm-4 form-group">
                                                        <label for="">Last Name</label>
                                                        <input required name="use_lname" type="text" class="form-control">
                                                    </div>
                                                    
                                                </div>
                                                <div class="row">

                                                    <div class="col-sm-4 form-group">
                                                        <label for="">Date of Birthday</label>
                                                        <input required name="use_birthday" type="date" class="form-control">
                                                    </div>
                                                    

                                                    <div class="col-sm-4 form-group">
                                                        <label for="">Gender</label>
                                                        <select required name="use_gender" class="form-control">
                                                            <option value="male">Male</option>
                                                            <option value="female">Female</option>
                                                        </select>
                                                    </div>
                                                    
                                                    <div class="col-sm-4 form-group">
                                                        <label for="">Address</label>
                                                        <input required name="use_address" type="text" class="form-control">
                                                    </div>
                                                    
                                                </div>

                                                <div class="row">

                                                    <div class="col-sm-4 form-group">
                                                        <label for="">Mother Name</label>
                                                        <input required name="use_mother_name" type="text" class="form-control">
                                                    </div>
                                                    

                                                    <div class="col-sm-4 form-group">
                                                        <label for="">Father Name</label>
                                                        <input required name="use_father_name" type="text" class="form-control">
                                                    </div>
                                                    
                                                    <div class="col-sm-4 form-group">
                                                        <label for="">Email</label>
                                                        <input required name="use_email" type="email" class="form-control">
                                                    </div>
                                                    
                                                </div>

                                            </div>
                                            <div class="col-sm-12 col-md-2 mg-t-2 mg-sm-t-0" style="border-left:1px solid lightgray;">
                                            
                                                <div class="row">

                                                    <div class="col-sm-12 form-group">
                                                        <label for="">Class</label>
                                                        <select required name="cla_id" class="form-control cla_list">
                                                            <option value="">-- Select --</option>
                                                            <?php $rec = $this->db->get_where('bz_classes', array('sch_id' => $this->session->userdata['sch_id']))->result_array(); foreach ($rec as $row){ ?>
                                                                <option value="<?= $row['cla_id']; ?>"><?= $row['cla_name']; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    

                                                    <div class="col-sm-12 form-group">
                                                        <label for="">Section</label>
                                                        <select required name="sec_id" class="form-control sec_list">
                                                        </select>
                                                    </div>
                                                    
                                                </div>

                                            </div>
                                            
                                        </div>
                                  
								</div>
							</div>
						</div>
					</div>
					<!-- row closed -->

                     </form>
				
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

            <input class="base_url" type="hidden" name="base_url" value="<?php echo base_url();?>">

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>


        const cla_list = document.querySelector(".cla_list");
        const sec_list = document.querySelector(".sec_list");


        cla_list.addEventListener("change",()=>{


        const base = document.querySelector(".base_url").value;

        const cla_id = cla_list.value;

        $.ajax({
            url: base + "classes/section-list/" + cla_id,
            dataType: "text",
            async: true,
            cache: false,
            data: {},
            success: function(data, status)
            {
                sec_list.innerHTML = data;
            }
        });

    });

</script>