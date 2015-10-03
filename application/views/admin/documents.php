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
    <li class="active"><a href="">Dashboard</a></li>
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
                        <div class="widget-title">Total Document Approved Proprietorship Firms</div>
                        <div class="widget-int">
                            <?php
                            echo $this->vendor_model->countapproved('proprietorship');
                            ?>
                        </div>
                    </div>
                    <div>
                        <div class="widget-title">Total Document Approved PartnerShip Firms</div>
                        <div class="widget-int">
                            <?php
                            echo $this->vendor_model->countapproved('partnership');
                            ?>
                        </div>
                    </div>
                    <div>
                        <div class="widget-title">Total Document Approved Pvt.Ltd & Ltd Firms</div>
                        <div class="widget-int">
                            <?php
                            echo $this->vendor_model->countapproved('pvt_or_ltd');
                            ?>
                        </div>
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


        <?php

        $data['doc_show_title'] = 'New Personal Pan-Cards';
        $data['doc_name'] = 'pan_prop';
        $this->load->view('admin/widget_document', $data);

        $data['doc_show_title'] = 'New Firm Pan-Cards';
        $data['doc_name'] = 'pan_comp';
        $this->load->view('admin/widget_document', $data);

        $data['doc_show_title'] = 'New VAT - CST';
        $data['doc_name'] = 'vat_cst';
        $this->load->view('admin/widget_document', $data);

        $data['doc_show_title'] = 'New CST';
        $data['doc_name'] = 'cst';
        $this->load->view('admin/widget_document', $data);

        $data['doc_show_title'] = 'New AOA';
        $data['doc_name'] = 'aoa';
        $this->load->view('admin/widget_document', $data);

        $data['doc_show_title'] = 'New Company Profile';
        $data['doc_name'] = 'comp_file';
        $this->load->view('admin/widget_document', $data);

        $data['doc_show_title'] = 'New Shop and Establishment or Trade License';
        $data['doc_name'] = 'shop_establish_trade';
        $this->load->view('admin/widget_document', $data);

        $data['doc_show_title'] = 'Photo Identity';
        $data['doc_name'] = 'photoid';
        $this->load->view('admin/widget_document', $data);

        $data['doc_show_title'] = 'Vendor Address Proof';
        $data['doc_name'] = 'addressid';
        $this->load->view('admin/widget_document', $data);

        $data['doc_show_title'] = 'Business Address Proof';
        $data['doc_name'] = 'businessid';
        $this->load->view('admin/widget_document', $data);

        $data['doc_show_title'] = 'CENVAT Proof';
        $data['doc_name'] = 'cenvat';
        $this->load->view('admin/widget_document', $data);

        $data['doc_show_title'] = 'Service Tax Proof';
        $data['doc_name'] = 'servicetax';
        $this->load->view('admin/widget_document', $data);

        $data['doc_show_title'] = 'New Certificates of Incorporation';
        $data['doc_name'] = 'cert_of_incorp';
        $this->load->view('admin/widget_document', $data);

        $data['doc_show_title'] = 'New MOA';
        $data['doc_name'] = 'moa_aoa';
        $this->load->view('admin/widget_document', $data);

        $data['doc_show_title'] = 'New Partnership Deed';
        $data['doc_name'] = 'part_deed';
        $this->load->view('admin/widget_document', $data);

        $data['doc_show_title'] = 'New Signatures Proof';
        $data['doc_name'] = 'sign';
        $this->load->view('admin/widget_document', $data);

        $data['doc_show_title'] = 'Canceled Cheque';
        $data['doc_name'] = 'canceled_check';
        $this->load->view('admin/widget_document', $data);

        ?>




    </div>
    <!-- END WIDGETS -->

    <!--                    <div class="row">

                            <div class="col-md-8">

                                 START SALES BLOCK
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <div class="panel-title-box">
                                            <h3>Documents</h3>
                                            <span>Pending Document Approvals</span>
                                        </div>
                                        <ul class="panel-controls panel-controls-title">
                                            <li>
                                                <div id="reportrange" class="dtrange">
                                                    <span></span><b class="caret"></b>
                                                </div>
                                            </li>
                                            <li><a href="#" class="panel-fullscreen rounded"><span class="fa fa-expand"></span></a></li>
                                        </ul>

                                    </div>
                                    <div class="panel-body">
                                        <div class="row stacked">
                                            <div class="col-md-12">
                                                <div class="progress-list">
                                                    <div class="pull-left"><strong>Personal Pan-Cards</strong></div>
                                                    <div class="pull-right">450/500</div>
                                                    <div class="progress progress-small progress-striped active">
                                                        <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 90%;">90%</div>
                                                    </div>
                                                </div>
                                                <div class="progress-list">
                                                    <div class="pull-left"><strong>Firm Pan-Cards</strong></div>
                                                    <div class="pull-right">450/500</div>
                                                    <div class="progress progress-small progress-striped active">
                                                        <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 90%;">90%</div>
                                                    </div>
                                                </div>
                                                <div class="progress-list">
                                                    <div class="pull-left"><strong>Partnership Deeds</strong></div>
                                                    <div class="pull-right">450/500</div>
                                                    <div class="progress progress-small progress-striped active">
                                                        <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 90%;">90%</div>
                                                    </div>
                                                </div><div class="progress-list">
                                                    <div class="pull-left"><strong>VAT - CST Certificates</strong></div>
                                                    <div class="pull-right">450/500</div>
                                                    <div class="progress progress-small progress-striped active">
                                                        <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 90%;">90%</div>
                                                    </div>
                                                </div><div class="progress-list">
                                                    <div class="pull-left"><strong>MOA - AOA</strong></div>
                                                    <div class="pull-right">450/500</div>
                                                    <div class="progress progress-small progress-striped active">
                                                        <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 90%;">90%</div>
                                                    </div>
                                                </div><div class="progress-list">
                                                    <div class="pull-left"><strong>Authorised Signatures</strong></div>
                                                    <div class="pull-right">20/500</div>
                                                    <div class="progress progress-small progress-striped active">
                                                        <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 3%;">90%</div>
                                                    </div>
                                                </div><div class="progress-list">
                                                    <div class="pull-left"><strong>Certificate Of Incorporation</strong></div>
                                                    <div class="pull-right">450/500</div>
                                                    <div class="progress progress-small progress-striped active">
                                                        <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 90%;">90%</div>
                                                    </div>
                                                </div>
                                                <p><span class="fa fa-warning"></span> Data update in end of each hour. You can update it manual by pressign update button</p>
                                            </div>
                                            <div class="col-md-8">
                                                <div id="dashboard-map-seles" style="width: 100%; height: 200px"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                 END SALES BLOCK

                            </div>
                            <div class="col-md-4">

                                 START PROJECTS BLOCK
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <div class="panel-title-box">
                                            <h3>Projects</h3>
                                            <span>Projects activity</span>
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
                                    <div class="panel-body panel-body-table">

                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th width="50%">Project</th>
                                                        <th width="20%">Status</th>
                                                        <th width="30%">Activity</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><strong>Atlant</strong></td>
                                                        <td><span class="label label-danger">Developing</span></td>
                                                        <td>
                                                            <div class="progress progress-small progress-striped active">
                                                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 85%;">85%</div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Gemini</strong></td>
                                                        <td><span class="label label-warning">Updating</span></td>
                                                        <td>
                                                            <div class="progress progress-small progress-striped active">
                                                                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 40%;">40%</div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Taurus</strong></td>
                                                        <td><span class="label label-warning">Updating</span></td>
                                                        <td>
                                                            <div class="progress progress-small progress-striped active">
                                                                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 72%;">72%</div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Leo</strong></td>
                                                        <td><span class="label label-success">Support</span></td>
                                                        <td>
                                                            <div class="progress progress-small progress-striped active">
                                                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">100%</div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Virgo</strong></td>
                                                        <td><span class="label label-success">Support</span></td>
                                                        <td>
                                                            <div class="progress progress-small progress-striped active">
                                                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">100%</div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Aquarius</strong></td>
                                                        <td><span class="label label-success">Support</span></td>
                                                        <td>
                                                            <div class="progress progress-small progress-striped active">
                                                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">100%</div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>
                                 END PROJECTS BLOCK

                            </div>
                        </div>-->

    <!--                    <div class="row">
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
                        </div>-->

    <!-- START DASHBOARD CHART -->
    <!--                    <div class="block-full-width">
                            <div id="dashboard-chart" style="height: 250px; width: 100%; float: left;"></div>
                            <div class="chart-legend">
                                <div id="dashboard-legend"></div>
                            </div>
                        </div>-->
    <!-- END DASHBOARD CHART -->

</div>
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
                <p>Are you sure you want to log out?</p>
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






