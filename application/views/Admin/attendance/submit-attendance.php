            <!-- main-content -->
            <div class="main">


                <!-- container -->
                <div class="container">

                    <?php echo form_open_multipart('attendance/mark/2');?>

                    <input type="hidden" name="att_date" value="<?= date('Y-m-d'); ?>">
                    <input type="hidden" name="att_type" value="<?= $att_type?>">


                    <!-- breadcrumb -->
                    <div class="breadcrumb-header justify-content-between">
                        <div class="my-auto">
                            <div class="d-flex">
                                <h4 class="content-title mb-0 my-auto">Attendance</h4>
                                <span class="text-muted mt-1 tx-13 ml-2 mb-0">/ Mark
                                </span>
                            </div>
                        </div>
                        <div class="d-flex my-xl-auto right-content">


                        </div>
                    </div>
                    <!-- breadcrumb -->

                    <!-- row -->
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div>

                                    </div>
                                    <div class="row mb-12">

                                        <div class="col-sm-12 col-md-12 mg-t-12 mg-sm-t-0">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <h6 class="card-title mb-1">Mark <?= $att_type ?> Attendance</h6>
                                                    <p class="text-muted card-sub-title">
                                                        <?= $this->db->get_where('bz_classes', array('cla_id' => $cla_id))->row()->cla_name ?>,
                                                        <?= $this->db->get_where('bz_sections', array('sec_id' => $sec_id))->row()->sec_name ?>
                                                    </p>
                                                </div>
                                                <div class="col-sm-6" style="text-align:right;">
                                                    <h6 class="card-title mb-1">Today, <?= date('d M Y');?></h6>
                                                </div>
                                            </div>
                                            <hr>

                                            <?php 
                                                $j = 1; 
                                                if($att_type == "teachers"){  
                                                    $rec = $this->db->get_where('bz_teachers', array('sch_id' => $this->session->userdata['sch_id']))->result_array();
                                                }else{ 
                                                    $rec = $this->db->get_where('bz_students', array('sch_id' => $this->session->userdata['sch_id'], 'cla_id' => $cla_id, 'sec_id' => $sec_id ))->result_array();
                                                }
                                               
                                                foreach ($rec as $row): 

                                                ?>
                                            <input type="hidden" name="use_id_<?= $j ?>" value="<?= $row['use_id'] ?>">
                                            <div class="row"
                                                style="border-bottom:1px solid lightgray;padding:10px;padding-bottom:0px;">

                                                <div class="col-sm-1">
                                                    <label for=""><?= $j ?></label>
                                                </div>
                                                <div class="col-sm-5">
                                                    <label for="">
                                                        <?= 
														$this->db->get_where('bz_users', array('use_id' => $row['use_id']))->row()->use_fname . " " . 
														$this->db->get_where('bz_users', array('use_id' => $row['use_id']))->row()->use_mname . " " . 
														$this->db->get_where('bz_users', array('use_id' => $row['use_id']))->row()->use_lname  
														?>
                                                    </label>
                                                </div>

                                                <div class="col-sm-2">
                                                    <input name="att_status<?= $j ?>" id="present_<?= $j ?>"
                                                        type="radio" checked value="present">
                                                    <label for="present_<?= $j ?>">Present</label>
                                                </div>
                                                <div class="col-sm-2">
                                                    <input name="att_status<?= $j ?>" id="absent_<?= $j ?>" type="radio"
                                                        value="absent">
                                                    <label for="absent_<?= $j ?>">Absent</label>
                                                </div>
                                                <div class="col-sm-2">
                                                    <input name="att_status<?= $j ?>" type="radio" id="leave_<?= $j ?>"
                                                        value="leave">
                                                    <label for="leave_<?= $j ?>">Leave</label>
                                                </div>
                                                <div class="col-sm-2">
                                                    <input name="att_status<?= $j ?>" type="radio"
                                                        id="half_leave_<?= $j ?>" value="half_leave">
                                                    <label for="half_leave_<?= $j ?>"> Half Leave</label>
                                                </div>

                                            </div>

                                            <?php $j++; endforeach;?>


                                            <input type="hidden" name="att_total" value="<?= $j-1; ?>">


                                            <div class="col-sm-12 form-group" style="padding-top:20px;">
                                                <button style="float:right;" name="submit" type="submit"
                                                    class="btn ripple btn-primary"> <i class="fas fa-save"></i> Submit
                                                </button>
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


            <input class="base_url" type="hidden" name="base_url" value="<?php echo base_url();?>">

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
            <script>
const cla_list = document.querySelector(".cla_list");
const sec_list = document.querySelector(".sec_list");

const att_type = document.querySelector(".att_type");

const for_student = document.querySelector(".for-student");


att_type.addEventListener("change", () => {
    if (att_type.value == "teachers") {
        for_student.style.display = "none";
    } else {
        for_student.style.display = "block";
    }
});


cla_list.addEventListener("change", () => {


    const base = document.querySelector(".base_url").value;

    const cla_id = cla_list.value;

    $.ajax({
        url: base + "classes/section-list/" + cla_id,
        dataType: "text",
        async: true,
        cache: false,
        data: {},
        success: function(data, status) {
            sec_list.innerHTML = data;
        }
    });

});
            </script>