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
        <!-- END STYLESHEETS -->

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script type="text/javascript" src="/css/materiastic/js/libs/utils/html5shiv.js?1403934957"></script>
        <script type="text/javascript" src="/css/materiastic/js/libs/utils/respond.min.js?1403934956"></script>
        <![endif]-->
    </head>

    <body class="page-container-boxed">
        <!-- START PAGE CONTAINER -->


        <div class="page-content">
             <div class="col-lg-12">

                        <div class="mb-container">

                                <img src="/img/logo_small.png" alt="" width="100"/>
                                </div>
                         </div>

            <div class="page-content-wrap">
                  <div class="page-content-wrap">

                <div class="row">
                   <div class="col-lg-6 col-lg-offset-3">

                        <!-- START DEFAULT DATATABLE -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Vendor Document Details</h3>
                                   <ul class="panel-controls">

                                        <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                                        <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>


                                    </ul>

                            </div>
                            <div class="panel-body">

            <section>

                <div class="section-body contain-lg">

                    <!-- END INTRO -->


                    <!-- BEGIN BANDED TABLE -->

                                      <table class="table datatable table-hover">
                                        <thead>
                                            <tr>

                                                <th>Email ID</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>


                                            <?php foreach ($sellers as $seller) { ?>
                                                <tr>

                                                    <td><?php echo $seller['email'];?></td>



                                                    <td>   <a target="_blank" href="/admin/seller_type_update/<?php echo $seller['email'];?>">Update</a></td>



                                            <?php } ?>

                                            </tr>

                                        </tbody>
                                    </table>

                </div><!--end .section-body -->
            </section>

          </div>
                        </div>

                    </div>
                </div>

            </div>
            <!-- PAGE CONTENT WRAPPER -->
        </div>
        <!-- END CONTENT -->

        <!-- END BASE -->
        <!-- BEGIN JAVASCRIPT -->
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
        <!-- END JAVASCRIPT -->

    </body>
</html>
