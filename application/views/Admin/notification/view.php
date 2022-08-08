            <!-- main-content -->
            <div class="main">


                <!-- container -->
                <div class="container">


                    <!-- breadcrumb -->
                    <div class="breadcrumb-header justify-content-between">
                        <div class="my-auto">
                            <div class="d-flex">
                                <h4 class="content-title mb-0 my-auto">Notification</h4><span
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
                                        <div>
                                            <h4 class="card-title mg-b-0">Notificatino List</h4>
                                            <i class="mdi mdi-dots-horizontal text-gray"></i>
                                        </div>
                                        <div> <a href="<?= base_url('notifications/add'); ?>"
                                                class="btn btn-primary buttons-excel buttons-html5">Add New</a>
                                        </div>
                                    </div>


                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="example" class="table key-buttons text-md-nowrap">
                                            <thead>
                                                <tr>
                                                    <th class="border-bottom-0">ID</th>
                                                    <th class="border-bottom-0">Title</th>
                                                    <th class="border-bottom-0">Description</th>
                                                    <th class="border-bottom-0">Action</th>


                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php 
                                               
                                               
                                                    $rec = $this->db->get('bz_notifications')->result_array();
                                                
                                               
                                                foreach ($rec as $row): 

                                                ?>


                                                <tr>
                                                    <td>
                                                        <?php echo $row['not_id']?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['not_title']?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['not_description']?>
                                                    </td>

                                                    <td>
                                                        <div class="dropdown">
                                                            <button style="padding: 2px 10px;" aria-expanded="false"
                                                                aria-haspopup="true" class="btn ripple btn-primary"
                                                                data-toggle="dropdown" id="dropdownMenuButton"
                                                                type="button">Action <i
                                                                    class="fas fa-caret-down ml-1"></i></button>
                                                            <div class="dropdown-menu tx-13">
                                                                <!-- <a class="dropdown-item" href="#">Edit Detail</a> -->
                                                                <a class="dropdown-item" href="#">Delete Records</a>
                                                            </div>
                                                        </div>
                                                    </td>



                                                </tr>



                                                <?php  endforeach;?>
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