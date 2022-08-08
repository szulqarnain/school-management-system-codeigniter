            <!-- main-content -->
			<div class="main">


                <!-- container -->
				<div class="container">

                <?php echo form_open_multipart('profile/update');?>

                    <input type="hidden" name="use_id" value="<?= $this->session->userdata['use_id'] ?>">
                    <input type="hidden" name="ProfileUpdate" value="ok">
                    
                    <input type="hidden" name="use_old_image" value="<?=  $this->db->get_where('bz_users', array('use_id' => $this->session->userdata['use_id']))->row()->use_image;  ?>">
					<!-- breadcrumb -->
					<div class="breadcrumb-header justify-content-between">
						<div class="my-auto">
							<div class="d-flex">
								<h4 class="content-title mb-0 my-auto">Profile</h4>
                                    <span class="text-muted mt-1 tx-13 ml-2 mb-0">/ View & Edit
                                </span> 
							</div>
						</div>
						<div class="d-flex my-xl-auto right-content">
                            
                             <button  type="submit" class="btn ripple btn-primary"><i class="fas fa-download"></i> &nbsp;  Update Detail  </button>

						</div>
					</div>
					<!-- breadcrumb -->

					<!-- row -->
					<div class="row">
						<div class="col-lg-9 col-md-9">
							<div class="card">
								<div class="card-body">
                                        <div>
                                            <h6 class="card-title mb-1">User Detail</h6>
                                            <p class="text-muted card-sub-title"></p>
                                        </div>
                                        <div class="row mb-4">
                                            <div class="col-sm-12 col-md-3">
                                                <label for="">User Image</label>
                                                <input type="file" name="image" class="dropify" data-height="180" />
                                            </div>
                                            <div class="col-sm-12 col-md-9 mg-t-9 mg-sm-t-0">
                                                <div class="row">

                                                    <div class="col-sm-4 form-group">
                                                        <label for="">First Name</label>
                                                        <input value="<?= $this->db->get_where('bz_users', array('use_id' => $this->session->userdata['use_id']))->row()->use_fname; ?>" required name="use_fname" type="text" class="form-control">
                                                    </div>
                                                    

                                                    <div class="col-sm-4 form-group">
                                                        <label for="">Middle Name</label>
                                                        <input value="<?= $this->db->get_where('bz_users', array('use_id' => $this->session->userdata['use_id']))->row()->use_mname; ?>" required name="use_mname" type="text" class="form-control">
                                                    </div>
                                                    
                                                    <div class="col-sm-4 form-group">
                                                        <label for="">Last Name</label>
                                                        <input value="<?= $this->db->get_where('bz_users', array('use_id' => $this->session->userdata['use_id']))->row()->use_lname; ?>" required name="use_lname" type="text" class="form-control">
                                                    </div>
                                                    
                                                </div>
                                                <div class="row">

                                                    <div class="col-sm-4 form-group">
                                                        <label for="">Date of Birthday</label>
                                                        <input value="<?= $this->db->get_where('bz_users', array('use_id' => $this->session->userdata['use_id']))->row()->use_birthday; ?>" required name="use_birthday" type="date" class="form-control">
                                                    </div>
                                                    

                                                    <div class="col-sm-4 form-group">
                                                        <label for="">Gender</label>
                                                        <select required name="use_gender" class="form-control">
                                                            <option value="male" <?php if($this->db->get_where('bz_users', array('use_id' => $this->session->userdata['use_id']))->row()->use_gender == "male"){echo "Selected style='background:green;color:white;'";}?>>Male</option>
                                                            <option value="female" <?php if($this->db->get_where('bz_users', array('use_id' => $this->session->userdata['use_id']))->row()->use_gender == "female"){echo "Selected style='background:green;color:white;'";}?>>Female</option>
                                                        </select>
                                                    </div>
                                                    
                                                    <div class="col-sm-4 form-group">
                                                        <label for="">Address</label>
                                                        <input value="<?= $this->db->get_where('bz_users', array('use_id' => $this->session->userdata['use_id']))->row()->use_address; ?>" required name="use_address" type="text" class="form-control">
                                                    </div>
                                                    
                                                </div>

                                                <div class="row">

                                                    <div class="col-sm-4 form-group">
                                                        <label for="">Mother Name</label>
                                                        <input value="<?= $this->db->get_where('bz_users', array('use_id' => $this->session->userdata['use_id']))->row()->use_mother_name; ?>" required name="use_mother_name" type="text" class="form-control">
                                                    </div>
                                                    

                                                    <div class="col-sm-4 form-group">
                                                        <label for="">Father Name</label>
                                                        <input value="<?= $this->db->get_where('bz_users', array('use_id' => $this->session->userdata['use_id']))->row()->use_father_name; ?>"required name="use_father_name" type="text" class="form-control">
                                                    </div>
                                                    
                                                    <div class="col-sm-4 form-group">
                                                        <label for="">Email</label>
                                                        <input required value="<?= $this->db->get_where('bz_users', array('use_id' => $this->session->userdata['use_id']))->row()->use_email; ?>" name="use_email" type="email" class="form-control">
                                                    </div>
                                                    
                                                </div>

                                            </div>
                                        </div>
                                  
								</div>
							</div>
						</div>
                        <div class="col-lg-3 col-md-3">
                        <div class="card">
								<div class="card-body">
                                        <div>
                                            <h6 class="card-title mb-1">School Detail</h6>
                                            <p class="text-muted card-sub-title"></p>
                                        </div>
                                        <div class="row mb-4">
                                            <div class="col-sm-12 col-md-12 mg-t-9 mg-sm-t-0">
                                                <div class="row">

                                                    <div class="col-sm-12 form-group">
                                                        <label for="">School Name</label>
                                                        <input value="<?php $sch_id = $this->db->get_where('bz_admins', array('use_id' => $this->session->userdata['use_id']))->row()->sch_id; echo $this->db->get_where('bz_schools', array('sch_id' => $sch_id))->row()->sch_name; ?>" readonly type="text" class="form-control">
                                                    </div>
                                                    
                                                    <div class="col-sm-12 form-group">
                                                        <label for="">City</label>
                                                        <input readonly value="<?php $sch_id = $this->db->get_where('bz_admins', array('use_id' => $this->session->userdata['use_id']))->row()->sch_id; echo $this->db->get_where('bz_schools', array('sch_id' => $sch_id))->row()->sch_city; ?>" type="text" class="form-control">
                                                    </div>

                                                    
                                                    <div class="col-sm-12 form-group">
                                                        <label for="">Address</label>
                                                        <input readonly value="<?php $sch_id = $this->db->get_where('bz_admins', array('use_id' => $this->session->userdata['use_id']))->row()->sch_id; echo $this->db->get_where('bz_schools', array('sch_id' => $sch_id))->row()->sch_address; ?>" type="text" class="form-control">
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