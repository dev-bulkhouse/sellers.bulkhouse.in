<?php
if ($logged_in) {
    $compid = $this->session->userdata('id');
    $email = $this->session->userdata('email');
    $vendor_name = $this->session->userdata('vendor_name');
    $firm_name = $this->session->userdata('firm_name');
    $firm_type = $this->session->userdata('firm_type');
    $city = $this->session->userdata('city');
    $credit_limit = $this->vendor_model->credit_limit($compid);
    $show['compid'] = $compid;
    $show['email'] = $email;
    $show['vendor_name'] = $vendor_name;
    $show['firm_name'] = $firm_name;
    $show['firm_type'] = $firm_type;
    $show['city'] = $city;
} else {

}
?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Seller | Bulkhouse</title>
        <meta name="description" content="app,modal, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav">
       	<meta name="keywords" content="modal, window, overlay, modern, box, css transition, css animation, effect, 3d, perspective" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link rel="stylesheet" href="/css/app.v1.css">
        <link rel="stylesheet" href="/css/font.css" cache="false">
        <link rel="stylesheet" type="text/css" href="/css/component.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css"/>
        <script src="/js/modernizr.custom.js"></script>



    <!--    <script src="http://sellers.bulkhouse.in/js/vendor.js" type="text/javascript"></script>-->
        <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.4.3/angular.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.4.3/angular-animate.js"></script>
        <!--[if lt IE 9]>
        <script src="js/ie/respond.min.js" cache="false"></script>
        <script src="js/ie/html5.js" cache="false"></script>
        <script src="js/ie/fix.js" cache="false"></script>
        <![endif]-->
        <style>.m-b-sm {
                margin-bottom: 0px;
            }
            .bg-primary {
    background-color: #18659B;
    color: #fff;
}
.bg-primary .nav li a {
    color: #fff;
}</style>
    </head>
    <body>
        <section class="container-fluid">
            <div class="col-lg-12" style="height: 60px; background-color: #01283A">
                <div class="col-lg-4"><img width="200px" src="http://bulk.house/skin/frontend/apptha/superstore/images/logo.gif" alt="Bulkhouse"></div>
                <div class="col-lg-8"><h4 style="text-align: right; color: white">Seller Portal</h4><p style="text-align: right; color: white">Support : <?php echo $this->config->item('bulk-support-number'); ?></p></div>
            </div>
        </section>
        <section class="hbox stretch">
            <!-- .aside -->
            <aside class="bg-primary aside-sm" id="nav">
                <section class="vbox">
                    <header class="dker nav-bar">
                        <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen" data-target="body">
                            <i class="icon-reorder"></i>
                        </a>
                        <a href="#" class="nav-brand" data-toggle="fullscreen">Bulkhouse</a>
                        <a class="btn btn-link visible-xs" data-toggle="class:show" data-target=".nav-user">
                            <i class="icon-comment-alt"></i>
                        </a>
                    </header>
                    <footer class="footer bg-gradient hidden-xs">
                        <a href="modal.lockme.html" data-toggle="ajaxModal" class="btn btn-sm btn-link m-r-n-xs pull-right">
                            <i class="icon-off"></i>
                        </a>
                        <a href="#nav" data-toggle="class:nav-vertical" class="btn btn-sm btn-link m-l-n-sm">
                            <i class="icon-reorder"></i>
                        </a>
                    </footer>
                    <section>
                        <!-- user -->
                        <!--                        <div class="bg-info nav-user hidden-xs pos-rlt">
                                                    <div class="nav-avatar pos-rlt">
                                                        <a href="#" data-toggle="dropdown">
                                                            <i class="fa fa-user"> My Account</i>
                                                            <span class="caret caret-white"></span>
                                                        </a>
                                                        <ul class="dropdown-menu m-t-sm animated fadeInLeft">
                                                            <span class="arrow top"></span>
                                                            <li>
                                                               <a href="/main/settings"> Change Password</a>
                                                            </li>
                                                             <li class="divider"></li>
                                                            <li>
                                                                <a href="/main/view_data">Profile</a>
                                                            </li>

                                                            <li>
                                                                <a href="#">
                                                                    <span class="badge bg-danger pull-right">3</span> Notifications
                                                                </a>
                                                            </li>
                                                            <li class="divider"></li>
                                                            <li>
                                                                <a href="docs.html">Documentation</a>
                                                            </li>
                                                             <li class="divider"></li>
                                                            <li>
                                                                <a href="http://sellers.bulkhouse.in/user/logout">Logout</a>
                                                            </li>
                                                        </ul>

                                                    </div>-->
                        <div class="nav-msg">

                            <section class="dropdown-menu m-l-sm pull-left animated fadeInRight">
                                <div class="arrow left"></div>
                                <section class="panel bg-white">
                                    <header class="panel-heading">
                                        <strong>You have
                                            <span class="count-n">2</span> notifications
                                        </strong>
                                    </header>
                                    <div class="list-group">
                                        <a href="#" class="media list-group-item">
                                            <span class="pull-left thumb-sm">
                                                <img src="/images/avatar.jpg" alt="John said" class="img-circle">
                                            </span>
                                            <span class="media-body block m-b-none"> Use awesome animate.css
                                                <br>
                                                <small class="text-muted">28 Aug 13</small>
                                            </span>
                                        </a>
                                        <a href="#" class="media list-group-item">
                                            <span class="media-body block m-b-none"> 1.0 initial released
                                                <br>
                                                <small class="text-muted">27 Aug 13</small>
                                            </span>
                                        </a>
                                    </div>
                                    <footer class="panel-footer text-sm">
                                        <a href="#" class="pull-right">
                                            <i class="icon-cog"></i>
                                        </a>
                                        <a href="#">See all the notifications</a>
                                    </footer>
                                </section>
                            </section>
                        </div>
                        </div>
                        <!-- / user -->
                        <!-- nav -->
                        <nav class="nav-primary hidden-xs">
                            <ul class="nav">
                                <li>
                                    <a href="/main">
                                        <i class="icon-dashboard"></i>
                                        <span>Dashboard</span>
                                    </a>
                                </li>
                                <li  >
                                    <a href="/main/bank">
                                        <i class="icon-money"></i>
                                        <span>Bank Details</span>
                                    </a>
                                </li>
                                <li class="active">
                                    <a href="/main/view_data">
                                        <i class="icon-user"></i>
                                        <span>Profile</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="/main/settings">
                                        <i class="icon-gears"></i>
                                        <span>Settings</span>
                                    </a>
                                </li>
                                  <li class="dropdown-submenu active">
                                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                                             <i class="icon-book"></i>
                                                                            <span>FAQ'S</span>
                                                                            <span class="label label-primary pull-right">2</span>
                                                                        </a>
                                                                        <ul class="dropdown-menu">
                                                                            <li>
                                                                              
                                                                                <a href="/main/faqs"><i class="icon-question-sign"></i>Vendor on Boarding</a>
                                                                            </li>
                                                                            <li>
                                                                                  
                                                                                 <a href="/main/faqs2"><i class="icon-question-sign"></i>Selling Process</a>
                                                                          
                                                                                  </li>
                                                                           
                                                                        </ul>
                                                                    </li>
                                <!--


                            </ul>
                        </nav>
                                <!-- / nav -->
                                <!-- note -->

                                <!-- / note -->
                                </section>
                                </section>
                                </aside>
                                <section id="content">
                                    <section class="vbox">



                                        <section class="scrollable">
                                            <header class="header bg-white b-b">
                                                <div class="col-lg-6 col-md-8  col-sm-8" style="padding: 15px 0px 0px 0px">
                                                    <p <h5>Welcome to <b style="padding-right: 5px; border-bottom: 1px solid"><?php
                                                            if (isset($firm_name)) {
                                                                echo $firm_name;
                                                            }
                                                            ?></b><span> You have Registered as - <?php echo ucfirst($firm_type); ?></span></h5></p>
                                                </div>
                                                <div class="col-lg-6 col-md-4  col-sm-4 visible-lg visible-md visible-sm" style="padding: 15px 0px 0px 0px; text-align: right"><a href="http://sellers.bulkhouse.in/user/logout"><i class="fa fa-sign-out"></i> logout</a></div>
                                            </header>
                                            <section class="hbox stretch">

                                                <aside class="aside-lg bg-light lter b-r">
                                                    <section class="vbox">
                                                        <section class="scrollable">
                                                            <div class="wrapper">
                                                                <div class="clearfix m-b">

                                                                    <div class="clear">
                                                                        <div class="h3 m-t-xs m-b-xs"><?php
                                                                            if (isset($firm_name)) {
                                                                                echo $firm_name;
                                                                            }
                                                                            ?></div>
                                                                        <small class="text-muted">
                                                                            <i class="icon-map-marker"></i> <?php
                                                                            $details = $this->register_model->viewdata($compid);
                                                                            foreach ($details as $row) {
                                                                                echo $row->city;
                                                                            }
                                                                            ?>
                                                                        </small>
                                                                    </div>
                                                                </div>
                                                                <div class="md-modal md-effect-10" id="credit">
                                                                    <div class="md-content">


                                                                        <h3 style="font-size: 2em">Edit Credit Limit  <a class="md-close" aria-label="Close">&#215;</a></h3>
                                                                        <div>
                                                                            <form id="max_credit_limit" method="post" action="/upload_new/max_credit_limit">
                                                                                <input type="hidden" name="email" id="email" value="<?php echo $email; ?>">

                                                                                <div class="form-group required">
                                                                                    <label for="credit">Credit Limit:</label>
                                                                                    <input type="text" class="form-control" name="max_credit_limit" id="max_credit_limit" id="credit" placeholder="Credit Limit" required="required">
                                                                                </div>

                                                                                <div class="form-group m-t-lg">
                                                                                    <hr>
                                                                                    <div class="col-lg-2">
                                                                                        <button class="btn btn-sm btn-default" type="submit">Submit</button>

                                                                                    </div>

                                                                                </div>

                                                                            </form>

                                                                            <a class="md-close" aria-label="Close">.</a>
                                                                        </div>

                                                                    </div>
                                                                </div>


                                                                <?php if (isset($credit_limit)) { ?>
                                                                    <div class="panel wrapper">
                                                                        <div class="row">
                                                                            <div class="col-xs-8">
                                                                                <a href="#" class="md-trigger" data-modal="credit">
                                                                                    <span class="text-muted">Credit Limit  </span> <i class="icon-edit"></i>
                                                                                    <span class="m-b-xs h4 block" data-toggle="tooltip" data-placement="bottom" title="<?php
                                                                                    echo $this->vendor_model->convert_number($credit_limit);
                                                                                    if ($credit_limit == 0) {
                                                                                        $credit_limit = 0.00;
                                                                                    }
                                                                                    ?>"> <i class="fa fa-rupee"><?php setlocale(LC_MONETARY, 'en_IN');
                                                                                echo money_format('%!i', $credit_limit)
                                                                                        ?></i></span>


                                                                                </a>

                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                <?php } ?>





                                                                <?php
                                                                $details = $this->register_model->viewdata($compid);
                                                                foreach ($details as $row) {
                                                                    ?>

                                                                </div>
                                                            </section>
                                                        </section>
                                                    </aside>


                                                    <aside class="bg-white">
                                                        <section class="vbox">
                                                            <!--                                    <header class="header bg-light bg-gradient">-->


                                                            <section class="scrollable" >
                                                                <div class="tab-content">
                                                                    <div class="tab-pane active" id="activity">
                                                                        <header class="panel-heading bg bg-primary text-center"> Company Profile </header>
                                                                        <form class="form-horizontal" method="get" data-validate="parsley" style="margin:40px; padding:10px; background-color: #F9FAFC;border-radius: 10px ">
                                                                            <button onclick="location.href = '/main/company';" type="button" href="/main/company" class="btn btn-primary" >  <i class="icon-edit"></i> <span>Edit</span></button>
                                                                            <div class="form-group">
                                                                                <label class="col-sm-3 control-label">Vendor Name:</label>
                                                                                <div class="col-sm-4 control-label" style="text-align: left">
                                                                                    <?php
                                                                                    echo $row->vendor_name." ".$row->last_name;
                                                                                    ?>

                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="col-sm-3 control-label">Email</label>
                                                                                <div class="col-sm-4 control-label" style="text-align: left">

                                                                                    <?php
                                                                                    echo $row->email;
                                                                                    ?>


                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="col-sm-3 control-label">Mobile</label>
                                                                                <div class="col-sm-4 control-label" style="text-align: left">
                                                                                    <?php
                                                                                    echo $row->mobile;
                                                                                    ?>

                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="col-sm-3 control-label">Contact Name:</label>
                                                                                <div class="col-sm-4 control-label" style="text-align: left">
                                                                                    <?php
                                                                                    echo $row->contact_name;
                                                                                    ?>

                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="col-sm-3 control-label">Contact Email</label>
                                                                                <div class="col-sm-4 control-label" style="text-align: left">

                                                                                    <?php
                                                                                    echo $row->email_contact;
                                                                                    ?>


                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="col-sm-3 control-label">Contact Mobile</label>
                                                                                <div class="col-sm-4 control-label" style="text-align: left">
                                                                                    <?php
                                                                                    echo $row->mobile_contact;
                                                                                    ?>

                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="col-sm-3 control-label">Land line</label>
                                                                                <div class="col-sm-4 control-label" style="text-align: left">
                                                                                    <?php
                                                                                    echo $row->land_line;
                                                                                    ?>

                                                                                </div>

                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="col-sm-3 control-label">Address 1</label>
                                                                                <div class="col-sm-4 control-label" style="text-align: left">
                                                                                    <?php
                                                                                    echo $row->address1;
                                                                                    ?>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="col-sm-3 control-label">Address 2</label>
                                                                                <div class="col-sm-4 control-label" style="text-align: left">
                                                                                    <?php
                                                                                    echo $row->address2;
                                                                                    ?>

                                                                                </div>

                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label class="col-sm-3 control-label">City</label>
                                                                                <div class="col-sm-4 control-label" style="text-align: left">
                                                                                    <?php
                                                                                    echo $row->city;
                                                                                    ?>
                                                                                </div>

                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="col-sm-3 control-label">State</label>
                                                                                <div class="col-sm-4 control-label" style="text-align: left">
                                                                                    <?php
                                                                                    echo $row->state;
                                                                                    ?>
                                                                                </div>

                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="col-sm-3 control-label">Country</label>
                                                                                <div class="col-sm-4 control-label" style="text-align: left">
                                                                                    <?php
                                                                                    echo $row->country;
                                                                                    ?>

                                                                                </div>

                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="col-sm-3 control-label">Website</label>
                                                                                <div class="col-sm-4 control-label" style="text-align: left">
                                                                                    <?php
                                                                                    echo $row->website;
                                                                                    ?>

                                                                                </div>

                                                                            </div>


                                                                            <div class="form-group">
                                                                                <label class="col-sm-3 control-label">Year of Establishment</label>
                                                                                <div class="col-sm-4 control-label" style="text-align: left">
                                                                                    <?php
                                                                                    echo $row->year_establishment;
                                                                                    ?>
                                                                                </div>

                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="col-sm-3 control-label">No. Employees</label>
                                                                                <div class="col-sm-4 control-label" style="text-align: left">
                                                                                    <?php
                                                                                    echo $row->no_employees;
                                                                                    ?>
                                                                                </div>

                                                                            </div>
<!--                                                                            <div class="form-group">
                                                                                <label class="col-sm-3 control-label">Product Categories</label>
                                                                                <div class="col-sm-4 control-label" style="text-align: left">-->
                                                                                    <?php
//                                                                                    echo $row->pro_category;
                                                                                    ?>
<!--                                                                                </div>

                                                                            </div>-->
                                                                            <div class="form-group">
                                                                                <label class="col-sm-3 control-label">Company Turnover</label>
                                                                                <div class="col-sm-4 control-label" style="text-align: left">
                                                                                    <?php $turnover =  $row->comp_turnover; ?>
                                                                                    <i class="fa fa-rupee"><span  data-toggle="tooltip" data-placement="right" title="<?php echo $this->vendor_model->convert_number($turnover); ?>"> <?php

//                                                                                    echo $this->vendor_model->convert_number($credit_limit);
                                                                                    if ($turnover == 0) {
                                                                                        $turnover = 0.00;
                                                                                    }
                                                                                    setlocale(LC_MONETARY, 'en_IN');
                                                                                echo money_format('%!i', $turnover)
                                                                                    ?>
                                                                                        </span></i>
                                                                                </div>

                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="col-sm-3 control-label">Registration Category</label>
                                                                                <div class="col-sm-4 control-label" style="text-align: left">
                                                                                    <?php
                                                                                    echo $row->reg_category;
                                                                                    ?>
                                                                                </div>

                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label class="col-sm-3 control-label">Certification of Products</label>
                                                                                <div class="col-sm-4 control-label" style="text-align: left">
                                                                                    <?php
                                                                                    echo $row->cert_products;
                                                                                }
                                                                                ?>
                                                                            </div>

                                                                        </div>

                                                                    </form>

                                                                </div>
                                                        </section>

                                                    </section>



                                            </section>
                                            </aside>
                                        </section>



                                    </section>
                                    <footer class="footer bg-light dker bg-gradient">
                                        <p>Bulkhouse Vendor verification Panel</p>
                                    </footer>
                                </section>

                                </section>

                                <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="body"></a>
                                <script src="/js/classie.js"></script>
                                <script src="/js/modalEffects.js"></script>
                                <script>
                                                                                      // this is important for IEs
                                                                                      var polyfilter_scriptpath = '/js/';
                                </script>
                                <script src="/js/cssParser.js"></script>
                                <script src="/js/css-filters-polyfill.js"></script>
                                <script src="/css/app.v1.js"></script>
                                <!-- Bootstrap -->
                                <!-- App -->
                                <!-- fuelux -->
                                <!-- datatables -->
                                <!-- Sparkline Chart -->
                                <!-- Easy Pie Chart -->
                                </body>
                                </html>
