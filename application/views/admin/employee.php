<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Add Employee | Sellers.Bulkhouse</title>
        <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link rel="stylesheet" href="/css/app.v1.css">
         <link rel="stylesheet" type="text/css" id="theme" href="/css/theme-default.css"/>
        <link rel="stylesheet" href="/css/font.css" cache="false">
        <!--[if lt IE 9]>
        <script src="js/ie/respond.min.js" cache="false"></script>
        <script src="js/ie/html5.js" cache="false"></script>
        <script src="js/ie/fix.js" cache="false"></script>
        <![endif]-->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

        <style>
            .bg-primary {
                background-color: #F1F1F1;
                color: black;
            }
            .bg-primary .nav li a {
                color: black;
            }
        </style>
    </head>

    <body  class="page-container-boxed">
        <div class="page-content-wrap">
             <div class="col-lg-8 centered col-lg-offset-2">

                        <div class="mb-container">

                                <img src="/img/bulkhouse_logo_white-01.png" alt="" width="230"/>
                                </div>

                      </div>
        <section>
            <div class="row m-n animated fadeInDown">
                <div class="col-md-12 col-lg-4 col-md-offset-4  m-t-lg">
                    <section class="panel">
                        <header class="panel-heading bg bg-primary text-center"> Add Employee</header>
                        <form action="/admin/add_agent" method="POST" class="panel-body">
                            <div class="form-group">
                                <label class="control-label">Agent ID</label>
                                <input type="number" name="agent_id" placeholder="Enter Agent ID" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Agent Name</label>
                                <input type="text" name="agent_name" placeholder="Enter Agent Name" class="form-control">
                            </div>

                            <button type="submit" class="btn btn-info">Submit</button>
                            <div class="line line-dashed"></div>

                        </form>
                    </section>

                </div>
            </div>
        </section>

        <section>

            <div class="row m-n animated fadeInDown">
                <div class="col-lg-6 centered col-lg-offset-3">
                    <section class="panel">
                        <header class="panel-heading bg bg-primary text-center"> Edit Lead</header>
                        <div class="panel-body">
                            <table class="table datatable">
                                <thead>

                                <th>Vendor e-mail</th>
                                  <th>Agent ID</th>

                                <th>ACTION</th>

                                </thead>
                                <tbody>
                                    <?php
                                    $result = $this->register_model->viewleads();
                                    foreach ($result as $row) {
                                        ?>

                                        <tr>

                                            <td> <?php echo $row->vendor_email ?> </td>
                                            <td><?php echo $row->agent_id ?> </td>

                                            <td><a class="btn btn-info active" href="<?php echo site_url() ?>admin/edit_lead/<?php echo $row->id; ?>">Edit</a> | <a class="btn btn-danger active" href=<?php echo site_url() ?>admin/delete_lead/<?php echo $row->id; ?>">Delete</a></td>
                                        </tr>
<?php } ?>

                                </tbody>
                            </table>
                        </div>
                    </section>


                </div>
            </div>
        </section>
            </div>
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









