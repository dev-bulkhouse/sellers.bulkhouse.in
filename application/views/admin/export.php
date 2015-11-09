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
                                <ul class="panel-controls">

                                    <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                                    <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>


                                </ul>             

                            </div>
                            <div class="panel-body">
                                <table class="table datatable table-hover">
                                    <thead>
                                        <tr>
                                            <th style="width:200px">COMPANY DETAILS </th>
                                            <th>REGISTER TIME</th>
                                            <th>TYPE</th>
                                            <th>PAN CARD</th>
                                            <th>PHOTO ID</th>
                                            <th>VAT-CST</th>
                                            <th>COMPANY <BR/> PAN</th>
                                            <th>MOA</th>
                                            <th>PART DEED</th>
                                            <th>CHEQUE</th>
                                            <th>BANK DETAILS</th>
                                            <th>AGENT</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $this->db->select('*');
                                        $this->db->from('vendor_details');
                                        $this->db->where(array('vendor_details.activation' => 1));
                                        $this->db->join('document_details', 'document_details.compid = vendor_details.id');
                                        $this->db->join('bank_details', 'bank_details.compid = vendor_details.id', 'left');
                                        $this->db->join('leads', 'leads.vendor_email = vendor_details.email', 'left');
                                        $this->db->join('employee', 'employee.agent_id = leads.agent_id', 'left');



                                        $query = $this->db->get();
                                        $vendors = $query->result();
                                        ?>

                                        <?php foreach ($vendors as $vendor) { ?>


                                            <tr>
                                                <td>
                                                    <span class="fa fa-user"> <b><?php echo $vendor->vendor_name; ?> <?php echo $vendor->last_name; ?></b></span><br/>
                                                    <span class="fa fa-building-o"> <b><?php echo $vendor->firm_name; ?></b></span><br/>
                                                    <span class="fa fa-envelope"> <?php echo $vendor->email; ?></span><br/>
                                                    <span class="fa fa-phone"> <?php echo $vendor->mobile; ?></span><br/>
                                                    <span class="fa fa-registered"><b> <?php echo $vendor->reg_as; ?></b></span><br/>

                                                </td>

                                                <td><?php echo $vendor->registered_on; ?></td>
                                                <td><?php echo $vendor->firm_type; ?></td>

 <?php if ($vendor->firm_type == 'proprietorship') { ?>
                                                    <?php if ($vendor->pan_prop_status == 0) { ?>
                                                    <td class="info">WFA</td>
                                                <?php } elseif ($vendor->pan_prop_status == 2) { ?>
                                                    <td class="success">Approve</td>
                                                <?php } elseif ($vendor->pan_prop_status == 1) { ?>
                                                    <td class="danger">Reject</td>
                                                <?php } elseif ($vendor->pan_prop_status == 5) { ?>
                                                    <td class="warning">Due</td>
                                                
                                                        <?php
                                                    }
                                                } else {
                                                    ?>
                                                    <td>NA</td>
                                                <?php } ?>
                                                    
                                                    
                                              
                                                <?php if ($vendor->photoid_status == 0) { ?>
                                                    <td class="info">WFA</td>
                                                <?php } elseif ($vendor->photoid_status == 2) { ?>
                                                    <td class="success">Approve</td>
                                                <?php } elseif ($vendor->photoid_status == 1) { ?>
                                                    <td class="danger">Reject</td>
                                                <?php } elseif ($vendor->photoid_status == 5) { ?>
                                                    <td class="warning">Due</td>
                                                <?php } ?>



                                                <?php if ($vendor->vat_cst_status == 0) { ?>
                                                    <td class="info">WFA</td>
                                                <?php } elseif ($vendor->vat_cst_status == 2) { ?>
                                                    <td class="success">Approve</td>
                                                <?php } elseif ($vendor->vat_cst_status == 1) { ?>
                                                    <td class="danger">Reject</td>
                                                <?php } elseif ($vendor->vat_cst_status == 5) { ?>
                                                    <td class="warning">Due</td>
                                                <?php } ?>

                                                <?php if ($vendor->firm_type == 'proprietorship') { ?>
                                                    <td>NA</td>
                                                <?php } else { ?>
                                                    <?php if ($vendor->pan_comp_status == 0) { ?>
                                                        <td class="info">WFA</td>
                                                    <?php } elseif ($vendor->pan_comp_status == 2) { ?>
                                                        <td class="success">Approve</td>
                                                    <?php } elseif ($vendor->pan_comp_status == 1) { ?>
                                                        <td class="danger">Reject</td>
                                                    <?php } elseif ($vendor->pan_comp_status == 5) { ?>
                                                        <td class="warning">Due</td>
                                                        <?php
                                                    }
                                                }
                                                ?>






                                              




                                             

                                                <?php if ($vendor->firm_type == 'pvt_or_ltd') { ?>
                                                    <?php if ($vendor->moa_aoa_status == 0) { ?>
                                                        <td class="info">WFA</td>
                                                    <?php } elseif ($vendor->moa_aoa_status == 2) { ?>
                                                        <td class="success">Approve</td>
                                                    <?php } elseif ($vendor->moa_aoa_status == 1) { ?>
                                                        <td class="danger">Reject</td>
                                                    <?php } elseif ($vendor->moa_aoa_status == 5) { ?>
                                                        <td class="warning">Due</td>
                                                        <?php
                                                    }
                                                } else {
                                                    ?>
                                                    <td>NA</td>
                                                <?php } ?>

                                                

                                                <?php if ($vendor->firm_type == 'partnership') { ?>
                                                    <?php if ($vendor->part_deed_status == 0) { ?>
                                                        <td class="info">WFA</td>
                                                    <?php } elseif ($vendor->part_deed_status == 2) { ?>
                                                        <td class="success">Approve</td>
                                                    <?php } elseif ($vendor->part_deed_status == 1) { ?>
                                                        <td class="danger">Reject</td>
                                                    <?php } elseif ($vendor->part_deed_status == 5) { ?>
                                                        <td class="warning">Due</td>
                                                        <?php
                                                    }
                                                } else {
                                                    ?>
                                                    <td>NA</td>
                                                <?php } ?>

                                               

                                                <?php if ($vendor->canceled_check_status == 0) { ?>
                                                    <td class="info">WFA</td>
                                                <?php } elseif ($vendor->canceled_check_status == 2) { ?>
                                                    <td class="success">Approve</td>
                                                <?php } elseif ($vendor->canceled_check_status == 1) { ?>
                                                    <td class="danger">Reject</td>
                                                <?php } elseif ($vendor->canceled_check_status == 5) { ?>
                                                    <td class="warning">Due</td>
                                                <?php } ?>

                                                <?php if ($vendor->status == 4) { ?>
                                                    <td class="success">Approved</td>
                                                <?php } elseif ($vendor->status == 2) { ?>
                                                    <td class="info">Amount Credited</td>
                                                <?php } elseif ($vendor->status == 1){ ?>
                                                    <td class="success">On Process</td>
                                              <?php } elseif ($vendor->status == 0) { ?>
                                                    <td class="info">WFA</td>
                                              <?php } elseif ($vendor->status == 10) { ?>
                                                    <td class="warning">Due</td>
                                              <?php } elseif ($vendor->status == 3) { ?>
                                                    <td class="danger">Rejected</td>
                                              <?php } elseif ($vendor->status == 5) { ?>
                                                    <td class="danger">Wrong</td>
                                              <?php } ?>
                                                    
                                                <?php if ($vendor->agent_id == NULL) { ?>


                                                    <td class="active">
                                                        No Agent

                                                    </td>
                                                <?php } else { ?>
                                                    <td class="active"><?php echo $vendor->agent_name; ?><br/>(<?php echo $vendor->agent_id; ?>)</td>


                                                <?php } ?>


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






