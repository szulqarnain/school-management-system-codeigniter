            <!-- main-content -->
            <div class="main">


                <!-- container -->
                <div class="container">

                    <?php echo form_open_multipart('attendance/attendance_data');?>

                    <!-- breadcrumb -->
                    <div class="breadcrumb-header justify-content-between">
                        <div class="my-auto">
                            <div class="d-flex">
                                <h4 class="content-title mb-0 my-auto">Attendance</h4>
                                <span class="text-muted mt-1 tx-13 ml-2 mb-0">/ Detail
                                </span>
                            </div>
                        </div>
                        <div class="d-flex my-xl-auto right-content">


                        </div>
                    </div>
                    <!-- breadcrumb -->

                    <!-- row -->
                    <div class="row">
                        <div class="col-lg-4 col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <div>

                                    </div>
                                    <div class="row mb-12">

                                        <div class="col-sm-12 col-md-12 mg-t-12 mg-sm-t-0">

                                            <h6 class="card-title mb-1">Attendance Detail</h6>
                                            <p class="text-muted card-sub-title"></p>
                                            <hr>
                                            <div class="row">

                                                <div class="col-sm-12 form-group">
                                                    <label for="">Attendance Detail For</label>
                                                    <select required class="form-control att_type" name="att_type">
                                                        <option value="students">Students</option>
                                                        <option value="teachers">Teachers</option>
                                                    </select>
                                                </div>


                                                <div class="col-sm-12  for-student" style="padding:0px;">

                                                    <div class="col-sm-12 form-group">
                                                        <label for="">Class</label>
                                                        <select name="cla_id" class="form-control cla_list">
                                                            <option value="">-- Select --</option>
                                                            <?php $rec = $this->db->get_where('bz_classes', array('sch_id' => $this->session->userdata['sch_id']))->result_array(); foreach ($rec as $row){ ?>
                                                            <option value="<?= $row['cla_id']; ?>">
                                                                <?= $row['cla_name']; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>


                                                    <div class="col-sm-12 form-group">
                                                        <label for="">Section</label>
                                                        <select name="sec_id" class="form-control sec_list">
                                                        </select>
                                                    </div>


                                                </div>

                                                <div class="col-sm-12 form-group">
                                                    <label for="">Date</label>
                                                    <input type="date" value="<?= date('Y-m-d'); ?>" id="date"
                                                        name="att_date" />
                                                </div>
                                                <div class="col-sm-12 form-group">
                                                    <button style="width:100%;" name="continue" type="submit"
                                                        class="btn ripple btn-primary"> Continue <i
                                                            class="fas fa-arrow-right"></i> </button>
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

            <!-- End Modal effects-->

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