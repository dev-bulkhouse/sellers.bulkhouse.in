<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- META SECTION -->
        <title>BulkHouse | Removed Table</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <!-- END META SECTION -->

        <!-- CSS INCLUDE -->
        <link rel="stylesheet" type="text/css" id="theme" href="/css/theme-default.css"/>
        <!-- EOF CSS INCLUDE -->
        <style>
            .due{background-color: yellow}
            .rjt{background-color: darkred; color: white}
            td{border: #000 solid}
             </style>
    </head>
    <body class="page-container-boxed">
        <!-- START PAGE CONTAINER -->


        <div class="page-content">
             <div class="col-lg-12">

                        <div class="mb-container">

                                <img src="/img/bulkhouse_logo_white-01.png" alt="" width="230"/>
                                </div>
                         </div>

            <div class="page-content-wrap">

                <div class="row">
                    <div class="col-md-12">

                        <!-- START DEFAULT DATATABLE -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Removed Vendors</h3>

                            </div>
                            <div class="panel-body">
                                  <table class="table datatable">
        		<thead>
                                        <tr>
                                            <th>Email</th>
                                            <th>Removed Time</th>
                                            <th>Reason</th>
                                            <th>Agent</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $this->db->select('*');
                                        $this->db->from('removed_vendors');
                                       $this->db->join('leads', 'leads.vendor_email = removed_vendors.email','left');
                                       $this->db->join('employee', 'employee.agent_id = leads.agent_id','left');
                                        $query = $this->db->get();
                                        $removed = $query->result();
                                        ?>

<?php foreach ($removed as $rem) { ?>


                                            <tr>
                                                <td>
                                                    <span class="fa fa-envelope"> <?php echo $rem->email; ?></span>
                                                </td>
                                                <td><?php echo $rem->date; ?></td>
                                                <td><?php echo $rem->reason; ?></td>

                                                    <?php if($rem->agent_id  != NULL) { ?>

                                                    <td class="active"><?php echo $rem->agent_name; ?><br/>(<?php echo $rem->agent_id; ?>)</td>
                                                    <?php }else {?>
                                                   <td class="active">No Agent</td>
                                                     <?php }  ?>





                                            </tr>


<?php } ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <!-- PAGE CONTENT WRAPPER -->
        </div>
        <!-- END PAGE CONTENT -->

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
                            <a href="pages-login.html" class="btn btn-success btn-lg">Yes</a>
                            <button class="btn btn-default btn-lg mb-control-close">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MESSAGE BOX-->

        <!-- START PRELOADS -->
        <audio id="audio-alert" src="/audio/alert.mp3" preload="auto"></audio>
        <audio id="audio-fail" src="/audio/fail.mp3" preload="auto"></audio>
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






