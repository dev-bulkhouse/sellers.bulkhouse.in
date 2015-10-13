<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- META SECTION -->
        <title>BulkHouse | Export Admin</title>
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
        <script src="http://sellers.ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.css"/>
        <script>
            ;
            (function ($) {
                $.fn.fixMe = function () {
                    return this.each(function () {
                        var $this = $(this),
                                $t_fixed;
                        function init() {
                            $this.wrap('<div class="container" />');
                            $t_fixed = $this.clone();
                            $t_fixed.find("tbody").remove().end().addClass("fixed").insertBefore($this);
                            resizeFixed();
                        }
                        function resizeFixed() {
                            $t_fixed.find("th").each(function (index) {
                                $(this).css("width", $this.find("th").eq(index).outerWidth() + "px");
                            });
                        }
                        function scrollFixed() {
                            var offset = $(this).scrollTop(),
                                    tableOffsetTop = $this.offset().top,
                                    tableOffsetBottom = tableOffsetTop + $this.height() - $this.find("thead").height();
                            if (offset < tableOffsetTop || offset > tableOffsetBottom)
                                $t_fixed.hide();
                            else if (offset >= tableOffsetTop && offset <= tableOffsetBottom && $t_fixed.is(":hidden"))
                                $t_fixed.show();
                        }
                        $(window).resize(resizeFixed);
                        $(window).scroll(scrollFixed);
                        init();
                    });
                };
            })(jQuery);

        </script>
    </head>

    <body class="page-container-boxed">
        <!-- START PAGE CONTAINER -->


        <div class="page-content">
            <div class="col-lg-12">

                <div class="mb-container">

                    <img src="/img/bulkhouse_logo_white-01.png" alt="" width="230"/>

                    <div class="btn-group pull-right">
                        <a href="#" data-toggle="dropdown" class="btn btn-primary dropdown-toggle">Dashboard <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li role="presentation" class="dropdown-header">Dashboard</li>
                            <li><a href="/admin/employees">Modify and Add Agents</a></li>
                        </ul>
                    </div>
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
                                    <li>
                                        <?php if ($this->load->view('alert/success-message')) { ?>
                                            <div class="alert alert-danger" role="alert">
                                                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                <strong>Oh snap!</strong><?php $this->load->view('alert/success-message'); ?>.
                                            </div>
                                        <?php } ?>
                                    </li>
                                    <li>
                                        <button onclick="location.href = '<?php echo site_url(); ?>test/export_agent/'" class="btn btn-danger"><i class="fa fa-download"></i>Export Data</button>
                                    </li>
                                    <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                                    <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>


                                </ul>

                            </div>
                            <div class="panel-body">
                                <table class="table datatable table-hover">
                                    <thead>
                                        <tr>
                                            <th style="width:200px">Company Details </th>
                                            <!--<th>TO <i data-toggle="tooltip" data-placement="top" title="Turn Over" class="fa fa-question-circle"></i></th>-->
                                            <th>Register Time</th>
                                            <th>Type</th>
                                            <th>Pan Card</th>
                                            <th>Photo id</th>
                                            <th>Address</th>
                                            <th>Buisness Adr </th>
                                            <th>VAT-CST</th>
                                            <th>Company Pan</th>


                                            <th>Shop Establish/<br/>Trade</th>

                                            <th>COI</th>
                                            <th>MOA</th>
                                            <th>AOA</th>
                                            <th>Prt Deed</th>
                                            <th>Comp Prof</th>
                                            <th>Cheque</th>
                                            <th>Agent</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $this->db->select('*');
                                        $this->db->from('vendor_details');
                                        $this->db->where(array('vendor_details.activation' => 1));
                                        $this->db->join('document_details', 'document_details.compid = vendor_details.id');
                                        $this->db->join('leads', 'leads.vendor_email = vendor_details.email', 'left');
                                        $this->db->join('employee', 'employee.agent_id = leads.agent_id', 'left');



                                        $query = $this->db->get();
                                        $vendors = $query->result();
                                        ?>

                                        <?php foreach ($vendors as $vendor) { ?>


                                            <tr>
                                                <td style="background-color: #A43F3E; color: white">
                                                    <span class="fa fa-user"> <b><?php echo $vendor->vendor_name; ?> <?php echo $vendor->last_name; ?></b></span><br/>
                                                    <span class="fa fa-building-o"> <b><?php echo $vendor->firm_name; ?></b></span><br/>
                                                    <span class="fa fa-envelope"> <?php echo $vendor->email; ?></span><br/>
                                                    <span class="fa fa-phone"> <?php echo $vendor->mobile; ?></span><br/>
                                                    <span class="fa fa-registered"><b> <?php echo $vendor->reg_as; ?></b></span><br/>

                                                </td>
                                                <!--<td><?php // echo $vendor->comp_turnover; ?></td>-->
                                                <td><?php echo $vendor->registered_on; ?></td>
                                                <td><?php echo $vendor->firm_type; ?></td>


                                                <?php if ($vendor->pan_prop_status == 0) { ?>
                                                    <td class="info">WFA</td>
                                                <?php } elseif ($vendor->pan_prop_status == 2) { ?>
                                                    <td class="success">Approve</td>
                                                <?php } elseif ($vendor->pan_prop_status == 1) { ?>
                                                    <td class="danger">Reject</td>
                                                <?php } elseif ($vendor->pan_prop_status == 5) { ?>
                                                    <td class="warning">Due</td>
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


                                                <?php if ($vendor->addressid_status == 0) { ?>
                                                    <td class="info">WFA</td>
                                                <?php } elseif ($vendor->addressid_status == 2) { ?>
                                                    <td class="success">Approve</td>
                                                <?php } elseif ($vendor->addressid_status == 1) { ?>
                                                    <td class="danger">Reject</td>
                                                <?php } elseif ($vendor->addressid_status == 5) { ?>
                                                    <td class="warning">Due</td>
                                                <?php } ?>


                                                <?php if ($vendor->businessid_status == 0) { ?>
                                                    <td class="info">WFA</td>
                                                <?php } elseif ($vendor->businessid_status == 2) { ?>
                                                    <td class="success">Approve</td>
                                                <?php } elseif ($vendor->businessid_status == 1) { ?>
                                                    <td class="danger">Reject</td>
                                                <?php } elseif ($vendor->businessid_status == 5) { ?>
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
                                                    <td>NA</td>
                                                <?php } else { ?>
                                                    <?php if ($vendor->shop_establish_trade_status == 0) { ?>
                                                        <td class="info">WFA</td>
                                                    <?php } elseif ($vendor->shop_establish_trade_status == 2) { ?>
                                                        <td class="success">Approve</td>
                                                    <?php } elseif ($vendor->shop_establish_trade_status == 1) { ?>
                                                        <td class="danger">Reject</td>
                                                    <?php } elseif ($vendor->shop_establish_trade_status == 5) { ?>
                                                        <td class="warning">Due</td>
                                                        <?php
                                                    }
                                                }
                                                ?>




                                                <?php if ($vendor->firm_type == 'pvt_or_ltd') { ?>
                                                    <?php if ($vendor->cert_of_incorp_status == 0) { ?>
                                                        <td class="info">WFA</td>
                                                    <?php } elseif ($vendor->cert_of_incorp_status == 2) { ?>
                                                        <td class="success">Approve</td>
                                                    <?php } elseif ($vendor->cert_of_incorp_status == 1) { ?>
                                                        <td class="danger">Reject</td>
                                                    <?php } elseif ($vendor->cert_of_incorp_status == 5) { ?>
                                                        <td class="warning">Due</td>
                                                        <?php
                                                    }
                                                } else {
                                                    ?>
                                                    <td>NA</td>
                                                <?php } ?>

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

                                                <?php if ($vendor->firm_type == 'pvt_or_ltd') { ?>
                                                    <?php if ($vendor->aoa_status == 0) { ?>
                                                        <td class="info">WFA</td>
                                                    <?php } elseif ($vendor->aoa_status == 2) { ?>
                                                        <td class="success">Approve</td>
                                                    <?php } elseif ($vendor->aoa_status == 1) { ?>
                                                        <td class="danger">Reject</td>
                                                    <?php } elseif ($vendor->aoa_status == 5) { ?>
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

                                                <?php if ($vendor->comp_file_status == 0) { ?>
                                                    <td class="info">WFA</td>
                                                <?php } elseif ($vendor->comp_file_status == 2) { ?>
                                                    <td class="success">Approve</td>
                                                <?php } elseif ($vendor->comp_file_status == 1) { ?>
                                                    <td class="danger">Reject</td>
                                                <?php } elseif ($vendor->comp_file_status == 5) { ?>
                                                    <td class="warning">Due</td>
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

    <?php if (isset($vendor->agent_name)) { ?>

                                                    <td class="active"><?php echo $vendor->agent_name; ?><br/>(<?php echo $vendor->agent_id; ?>)</td>

    <?php } else { ?>

                                                    <td class="active">
                                                        No Agent

                                                        <div class="form-group">

                                                            <button type="button" class="btn btn-info mb-control" data-box="#message-box-sound-<?php echo $vendor->id; ?>">Add</button>

                                                        </div>
                                                    </td>
                                                    <div class="message-box animated fadeIn" data-sound="alert" id="message-box-sound-<?php echo $vendor->id; ?>">
                                    <div class="mb-container">
                                        <div class="mb-middle">
                                            <div class="mb-title"><span class="fa fa-users"></span> Add <strong>Agents</strong></div>
                                            <a class="pull-right mb-control-close"><i class="fa fa-times"></i></a>


                                            <form action="/admin/add_leads" method="POST" class="panel-body">
                                                <div class="form-group">
                                                    <label class="control-label">Vendor Email</label>
                                                    <input type="text" name="email" placeholder="Vendor Email" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="sel1">Select Agent:</label>
                                                    <select name="agent" class="form-control" id="sel1">
                                                        <option>Select Agent</option>
                                                        <?php
                                                        $this->db->select('*');
                                                        $this->db->from('employee');
                                                        $query = $this->db->get();

                                                        foreach ($query->result() as $row) {
                                                            ?>

                                                            <option value="<?php echo $row->agent_id ?>"><?php echo $row->agent_name . ' - (' . $row->agent_id . ')'; ?></option>
<?php } ?>

                                                    </select>
                                                </div>

                                                <div class="mb-footer">
                                                    <button class="btn btn-info btn-lg pull-right" type="submit">Add</button>
                                                </div>

                                            </form>


                                        </div>
                                    </div>
                                </div>
    <?php } ?>


                                            </tr>




                                    </tbody>
                                </table>


                            </div>
                            <?php } ?>
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






