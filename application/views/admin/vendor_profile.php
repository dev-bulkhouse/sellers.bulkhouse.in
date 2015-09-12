<?php

if ($logged_in) {
    $email = $this->session->userdata('email');
    $admin_type = $this->session->userdata('admin_type');
    $name = $this->session->userdata('name');

} else {

}
?>

                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>
                      <li><a href="\verification">Dashboard</a></li>


                </ul>
                <!-- END BREADCRUMB -->

                <!-- PAGE TITLE -->

                <!-- END PAGE TITLE -->

                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">


                    <div class="row">
                        <div class="col-md-12">


                            <!-- START DEFAULT DATATABLE -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Vendors Verified Profile</h3>
                                    <ul class="panel-controls">

                                        <li><a href="/admin/vendor_profile" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>

                                    </ul>
                                </div>

                                <div class="panel-body">



                                    <table class="table datatable">
                                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Company Name</th>
                            <th>Email</th>
                            <th>Contact Number</th>
                            <th>Type</th>
                            <th>Action</th>

                       </tr>
                    </thead>
                    <tbody>
                        <?php $this->db->select('*');
                            $this->db->from('vendor_details');
                            $this->db->where(array('vendor_details.activation' => 1));
                            $query = $this->db->get();
                            $vendors = $query->result(); ?>
                        <?php foreach ($vendors as $vendor) { ?>

                        <tr>
                            <td><?php echo $vendor->vendor_name; ?></td>
                            <td><?php echo $vendor->firm_name; ?></td>
                            <td><?php echo $vendor->email; ?></td>
                            <td><?php echo $vendor->mobile; ?></td>
                            <td><?php echo $vendor->firm_type; ?></td>
                            <td><a class="btn btn-info active" href="<?php echo site_url()?>admin/profile/<?php echo $vendor->id; ?>">view</a> <a class="btn btn-danger active" href= "<?php echo site_url()?>register/delete/<?php echo $vendor->id ?>">Delete</a></td>

                        </tr>


                    <?php } ?>
                </tbody>
            </table>

</div>

</div><!--/container-->


                                </div>
                            </div>



                        </div>
                    </div>

                </div>
                <!-- PAGE CONTENT WRAPPER -->
            </div>
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->

        <!-- MESSAGE BOX-->
        <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
                    <div class="mb-content">
                        <p>Are you sure you want to log out?</p>
                        <p>Press No if youwant to continue work. Press Yes to logout current user.</p>
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                            <a href="http://sellers.bulkhouse.in/admin/logout" class="btn btn-success btn-lg">Yes</a>
                            <button class="btn btn-default btn-lg mb-control-close">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MESSAGE BOX-->

        <!-- START PRELOADS -->
        <audio id="audio-alert" src="audio/alert.mp3" preload="auto"></audio>
        <audio id="audio-fail" src="audio/fail.mp3" preload="auto"></audio>
        <!-- END PRELOADS -->

    <!-- START SCRIPTS -->
        <!-- START PLUGINS -->
        <script type="text/javascript" src="/js/plugins/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="/js/plugins/jquery/jquery-ui.min.js"></script>
        <script type="text/javascript" src="/js/plugins/bootstrap/bootstrap.min.js"></script>
        <!-- END PLUGINS -->

        <!-- THIS PAGE PLUGINS -->
        <script type='text/javascript' src='/js/plugins/icheck/icheck.min.js'></script>
        <script type="text/javascript" src="/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>

        <script type="text/javascript" src="/js/plugins/datatables/jquery.dataTables.min.js"></script>
        <!-- END PAGE PLUGINS -->

        <!-- START TEMPLATE -->
        <script type="text/javascript" src="js/settings.js"></script>

        <script type="text/javascript" src="/js/plugins.js"></script>
        <script type="text/javascript" src="/js/actions.js"></script>
        <!-- END TEMPLATE -->
    <!-- END SCRIPTS -->

    </body>
</html>






