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
                    <li class="active">Dashboard</li>
                </ul>
                <!-- END BREADCRUMB -->

                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">

                    <!-- START WIDGETS -->
                    <div class="row">
                        <div class="col-md-9">

                            <!-- START WIDGET SLIDER -->
                            <div class="widget widget-default widget-carousel">
                                <div class="owl-carousel" id="owl-example">
                                    <div>
                                        <div class="widget-title">Total Bank Approved Proprietorship Firms</div>
                                        <div class="widget-int"><?php
                                        $this->db->select('*');
                                        $this->db->from('bank_details');
                                        $this->db->join('vendor_details', 'vendor_details.id = compid');
                                        $this->db->where('vendor_details.firm_type', 'proprietorship');
                                        $this->db->where('bank_details.status', '4');
                                        $query = $this->db->count_all_results();
                                        echo $query;
                                        ?></div>
                                    </div>
                                    <div>
                                        <div class="widget-title">Total Bank Approved PartnerShip Firms</div>
                                        <div class="widget-int"><?php
                                        $this->db->select('*');
                                        $this->db->from('bank_details');
                                        $this->db->join('vendor_details', 'vendor_details.id = compid');
                                        $this->db->where('vendor_details.firm_type', 'partnership');
                                        $this->db->where('bank_details.status', '4');
                                        $query = $this->db->count_all_results();
                                        echo $query;
                                        ?></div>
                                    </div>
                                    <div>
                                        <div class="widget-title">Total Bank Approved Pvt.Ltd & Ltd Firms</div>
                                        <div class="widget-int"><?php
                                        $this->db->select('*');
                                        $this->db->from('bank_details');
                                        $this->db->join('vendor_details', 'vendor_details.id = compid');
                                        $this->db->where('vendor_details.firm_type', 'pvt_or_ltd');
                                        $this->db->where('bank_details.status', '4');
                                        $query = $this->db->count_all_results();
                                        echo $query;
                                        ?></div>
                                    </div>
                                </div>
                                <div class="widget-controls">
                                    <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
                                </div>
                            </div>
                            <!-- END WIDGET SLIDER -->

                        </div>
                        <div class="col-md-3">

                            <!-- START WIDGET CLOCK -->
                            <div class="widget widget-danger widget-padding-sm">
                                <div class="widget-big-int plugin-clock">00:00</div>
                                <div class="widget-subtitle plugin-date">Loading...</div>
                                <div class="widget-controls">
                                    <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="left" title="Remove Widget"><span class="fa fa-times"></span></a>
                                </div>

                            </div>
                            <!-- END WIDGET CLOCK -->

                        </div>
                        <?php $this->db->select('*');
        $this->db->from('bank_details');
        $this->db->join('vendor_details','vendor_details.id = bank_details.compid');
        $this->db->join('document_details','document_details.compid = bank_details.compid');
        $this->db->where('vendor_details.firm_type', "proprietorship");
        $this->db->where('document_details.pan_prop_status', '2');
$this->db->where('document_details.vat_cst_status', '2');

$this->db->where('document_details.photoid_status', '2');

        $this->db->where('bank_details.status', 0);
        $banks_prop_count =  $this->db->count_all_results(); ?>
                        <?php $this->db->select('*');
        $this->db->from('bank_details');
        $this->db->join('vendor_details','vendor_details.id = bank_details.compid');
        $this->db->join('document_details','document_details.compid = bank_details.compid');
        $this->db->where('vendor_details.firm_type', "partnership");
       
$this->db->where('document_details.pan_comp_status', '2');
$this->db->where('document_details.vat_cst_status', '2');
$this->db->where('document_details.part_deed_status', '2');

$this->db->where('document_details.photoid_status', '2');

        $this->db->where('bank_details.status', 0);
        $banks_part_count =  $this->db->count_all_results(); ?>
                        <?php $this->db->select('*');
        $this->db->from('bank_details');
        $this->db->join('vendor_details','vendor_details.id = bank_details.compid');
        $this->db->join('document_details','document_details.compid = bank_details.compid');
        $this->db->where('vendor_details.firm_type', "pvt_or_ltd");
        $this->db->where('document_details.pan_comp_status', '2');
                                $this->db->where('document_details.vat_cst_status', '2');
                                $this->db->where('document_details.moa_aoa_status', '2');
                            
                                $this->db->where('document_details.photoid_status', '2');
                            
        $this->db->where('bank_details.status', 0);
        $banks_pvt_count =  $this->db->count_all_results();

        $banks_count = $banks_prop_count + $banks_part_count + $banks_pvt_count;
//        echo $banks_count;
        ?>
                        <div class="col-md-4">

                            <!-- START WIDGET MESSAGES -->
                            <div class="widget <?php if ($banks_count == 0) {
                                    echo "widget-default";
                                }  else {
                                    echo "widget-success";
                                }?> widget-item-icon" onclick="location.href='/admin/bankaccounts';">
                                <div class="widget-item-left">
                                    <span class="fa fa-list-alt"></span>
                                </div>
                                <div class="widget-data">
                                    <div class="widget-int num-count"><?php echo $banks_count; ?></div>
                                    <div class="widget-title">New Bank Accounts</div>
                                    <div class="widget-subtitle">waiting for approval</div>
                                </div>
                                <div class="widget-controls">
                                    <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
                                </div>
                            </div>
                            <!-- END WIDGET MESSAGES -->

                        </div>
                       


                    </div>
                    <!-- END WIDGETS -->

<!--                    <div class="row">
                        <div class="row">
                        <div class="col-md-4">

                             START SALES & EVENTS BLOCK
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="panel-title-box">
                                        <h3>Sales & Event</h3>
                                        <span>Event "Purchase Button"</span>
                                    </div>
                                    <ul class="panel-controls" style="margin-top: 2px;">
                                        <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                                        <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-cog"></span></a>
                                            <ul class="dropdown-menu">
                                                <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span> Collapse</a></li>
                                                <li><a href="#" class="panel-remove"><span class="fa fa-times"></span> Remove</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                <div class="panel-body padding-0">
                                    <div class="chart-holder" id="dashboard-line-1" style="height: 200px;"></div>
                                </div>
                            </div>
                             END SALES & EVENTS BLOCK

                        </div>
                        <div class="col-md-4">

                             START USERS ACTIVITY BLOCK
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="panel-title-box">
                                        <h3>Users Activity</h3>
                                        <span>Users vs returning</span>
                                    </div>
                                    <ul class="panel-controls" style="margin-top: 2px;">
                                        <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                                        <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-cog"></span></a>
                                            <ul class="dropdown-menu">
                                                <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span> Collapse</a></li>
                                                <li><a href="#" class="panel-remove"><span class="fa fa-times"></span> Remove</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                <div class="panel-body padding-0">
                                    <div class="chart-holder" id="dashboard-bar-1" style="height: 200px;"></div>
                                </div>
                            </div>
                             END USERS ACTIVITY BLOCK

                        </div>
                        <div class="col-md-4">

                             START VISITORS BLOCK
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="panel-title-box">
                                        <h3>Visitors</h3>
                                        <span>Visitors (last month)</span>
                                    </div>
                                    <ul class="panel-controls" style="margin-top: 2px;">
                                        <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                                        <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-cog"></span></a>
                                            <ul class="dropdown-menu">
                                                <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span> Collapse</a></li>
                                                <li><a href="#" class="panel-remove"><span class="fa fa-times"></span> Remove</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                <div class="panel-body padding-0">
                                    <div class="chart-holder" id="dashboard-donut-1" style="height: 200px;"></div>
                                </div>
                            </div>
                             END VISITORS BLOCK

                        </div>
                    </div>

                     START DASHBOARD CHART
                    <div class="block-full-width">
                        <div id="dashboard-chart" style="height: 250px; width: 100%; float: left;"></div>
                        <div class="chart-legend">
                            <div id="dashboard-legend"></div>
                        </div>
                    </div>
                     END DASHBOARD CHART

                </div>-->
                <!-- END PAGE CONTENT WRAPPER -->
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
                        <p>Are you sure you want to log out? <?php echo $name; ?></p>
                        <p>Press No if you want to continue work. Press Yes to logout current user.</p>
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                            <a href="<?php echo site_url(); ?>admin/logout" class="btn btn-success btn-lg">Yes</a>
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

        <!-- START THIS PAGE PLUGINS-->
        <script type='text/javascript' src='/js/plugins/icheck/icheck.min.js'></script>
        <script type="text/javascript" src="/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
        <script type="text/javascript" src="/js/plugins/scrolltotop/scrolltopcontrol.js"></script>

        <script type="text/javascript" src="/js/plugins/morris/raphael-min.js"></script>
        <script type="text/javascript" src="/js/plugins/morris/morris.min.js"></script>
        <script type="text/javascript" src="/js/plugins/rickshaw/d3.v3.js"></script>
        <script type="text/javascript" src="/js/plugins/rickshaw/rickshaw.min.js"></script>
        <script type='text/javascript' src='/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'></script>
        <script type='text/javascript' src='/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js'></script>
        <script type='text/javascript' src='/js/plugins/bootstrap/bootstrap-datepicker.js'></script>
        <script type="text/javascript" src="/js/plugins/owl/owl.carousel.min.js"></script>

        <script type="text/javascript" src="/js/plugins/moment.min.js"></script>
        <script type="text/javascript" src="/js/plugins/daterangepicker/daterangepicker.js"></script>
        <!-- END THIS PAGE PLUGINS-->

        <!-- START TEMPLATE -->
        <!--<script type="text/javascript" src="/js/settings.js"></script>-->

        <script type="text/javascript" src="/js/plugins.js"></script>
        <script type="text/javascript" src="/js/actions.js"></script>

        <script type="text/javascript" src="/js/demo_dashboard.js"></script>
        <!-- END TEMPLATE -->
    <!-- END SCRIPTS -->
    </body>
</html>






