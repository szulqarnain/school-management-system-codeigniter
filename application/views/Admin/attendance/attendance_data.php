            <!-- main-content -->
            <div class="main">


                <!-- container -->
                <div class="container">


                    <!-- breadcrumb -->
                    <div class="breadcrumb-header justify-content-between">
                        <div class="my-auto">
                            <div class="d-flex">
                                <h4 class="content-title mb-0 my-auto">Attendance</h4><span
                                    class="text-muted mt-1 tx-13 ml-2 mb-0"></span>
                            </div>
                        </div>
                        <!-- <div class="d-flex my-xl-auto right-content">

                            <a class="btn ripple btn-primary" href="<?= base_url('students/add'); ?>"><i
                                    class="typcn typcn-plus"></i> Enrollment </a>

                        </div> -->
                    </div>
                    <!-- breadcrumb -->

                    <!-- row opened -->
                    <div class="row row-sm">

                        <!--div-->
                        <div class="col-xl-12">
                            <div class="card mg-b-20">
                                <div class="card-header pb-0">
                                    <div class="d-flex justify-content-between">
                                        <h4 class="card-title mg-b-0">Attendance List</h4>
                                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                                    </div>
                                    <p class="tx-12 tx-gray-500 mb-2">
                                        Date: <?= $att_date ?>

                                    </p>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="example" class="table key-buttons text-md-nowrap">
                                            <thead>
                                                <tr>
                                                    <th class="border-bottom-0">ID</th>
                                                    <th class="border-bottom-0">Name</th>
                                                    <th class="border-bottom-0">Class / Section</th>
                                                    <th class="border-bottom-0">Status</th>


                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php 
                                                $j = 1; 
                                                if($att_type == "teachers"){  
                                                    $rec = $this->db->get_where('bz_teachers', array('sch_id' => $this->session->userdata['sch_id']))->result_array();
                                                }else{ 
                                                    $rec = $this->db->get_where('bz_students', array('sch_id' => $this->session->userdata['sch_id'], 'cla_id' => $cla_id, 'sec_id' => $sec_id ))->result_array();
                                                }
                                               
                                                foreach ($rec as $row): 

                                                ?>


                                                <tr>
                                                    <td><?= $this->db->get_where('bz_users', array('use_id' => $row['use_id']))->row()->use_username ?>
                                                    </td>
                                                    <td><?= 
														$this->db->get_where('bz_users', array('use_id' => $row['use_id']))->row()->use_fname . " " . 
														$this->db->get_where('bz_users', array('use_id' => $row['use_id']))->row()->use_mname . " " . 
														$this->db->get_where('bz_users', array('use_id' => $row['use_id']))->row()->use_lname  
														?> </td>
                                                    <td><?= 
														$this->db->get_where('bz_classes', array('cla_id' => $row['cla_id']))->row()->cla_name . " - " . 
														$this->db->get_where('bz_sections', array('sec_id' => $row['sec_id']))->row()->sec_name
														?></td>

                                                    <td>
                                                        <?php
														    if($this->db->get_where('bz_attendance', array('use_id' => $row['use_id'], 'att_date' => $att_date))->row()->att_status){
                                                              echo  $this->db->get_where('bz_attendance', array('use_id' => $row['use_id'], 'att_date' => $att_date))->row()->att_status;
                                                            }else{
                                                                echo "Not Submit";
                                                            }
														?>
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

            <!-- End Modal effects-->