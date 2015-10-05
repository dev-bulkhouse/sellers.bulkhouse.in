<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- META SECTION -->
        <title>BulkHouse | Export Table</title>
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
                                <h3 class="panel-title">Vendor Document Details</h3>

                            </div>
                            <div class="panel-body">
                                  <table class="table datatable">
        		<thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Agent ID</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $result = $this->register_model->view_agents();
            foreach ($result as $row) { ?>




                                            <tr>
                                                <td><?php echo $row->agent_name; ?></td>
                                                <td><?php echo $row->agent_id; ?></td>
                                                <td><a href="<?php site_url(); ?>admin/edit_agent/ echo $row->id; ?>">Edit</a></td>
                                                <td><a href="<?php site_url(); ?>admin/delete_agent/<?php echo $row->id; ?>">Delete</a></td>
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






