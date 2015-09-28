
<html lang="en" ng-app>
    <head>
        <!-- META SECTION -->
        <title>Bulkhouse | Sellers | Approvals</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <!-- END META SECTION -->

        <!-- CSS INCLUDE -->
        <link rel="stylesheet" type="text/css" id="theme" href="/css/theme-default.css"/>
        <!-- EOF CSS INCLUDE -->
        <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <style>
            .btn-circle {



                text-align: center;
                padding: 15px 15px 15px ;
                font-size: 10px;
                line-height: 2.00;
                border-radius: 26px;
            }


        </style>
        <style>

        </style>
        <script>
            $(function () {

                $('.toggle').click(function (event) {
                    event.preventDefault();
                    var target = $(this).attr('href');
                    $(target).toggleClass('hidden show');
                });

            });

        </script>
    </head>
    <body>
        <div id="pan_prop" class="modal fade" role="dialog" tabindex="-1" aria-hidden="true" aria-labelledby="memberModalLabel">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">

                    <div class="ct"></div>
                </div>

            </div>
        </div>
        <div id="vat" class="modal fade" role="dialog" tabindex="-1" aria-hidden="true" aria-labelledby="memberModalLabel">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">

                    <div class="ct"></div>
                </div>

            </div>
        </div>
        <div id="cst" class="modal fade" role="dialog" tabindex="-1" aria-hidden="true" aria-labelledby="memberModalLabel">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">

                    <div class="ct"></div>
                </div>

            </div>
        </div>
        <div id="aoa" class="modal fade" role="dialog" tabindex="-1" aria-hidden="true" aria-labelledby="memberModalLabel">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">

                    <div class="ct"></div>
                </div>

            </div>
        </div>
        <div id="shop_establish_trade" class="modal fade" role="dialog" tabindex="-1" aria-hidden="true" aria-labelledby="memberModalLabel">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">

                    <div class="ct"></div>
                </div>

            </div>
        </div>
        <div id="addressid" class="modal fade" role="dialog" tabindex="-1" aria-hidden="true" aria-labelledby="memberModalLabel">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">

                    <div class="ct"></div>
                </div>

            </div>
        </div>
        <div id="businessid" class="modal fade" role="dialog" tabindex="-1" aria-hidden="true" aria-labelledby="memberModalLabel">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">

                    <div class="ct"></div>
                </div>

            </div>
        </div>
        <div id="cenvat" class="modal fade" role="dialog" tabindex="-1" aria-hidden="true" aria-labelledby="memberModalLabel">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">

                    <div class="ct"></div>
                </div>

            </div>
        </div>
        <div id="servicetax" class="modal fade" role="dialog" tabindex="-1" aria-hidden="true" aria-labelledby="memberModalLabel">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">

                    <div class="ct"></div>
                </div>

            </div>
        </div>
        <div id="comp" class="modal fade" role="dialog" tabindex="-1" aria-hidden="true" aria-labelledby="memberModalLabel">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">

                    <div class="ct"></div>
                </div>

            </div>
        </div>
        <div id="photoid" class="modal fade" role="dialog" tabindex="-1" aria-hidden="true" aria-labelledby="memberModalLabel">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">

                    <div class="ct"></div>
                </div>

            </div>
        </div>
        <div id="deep" class="modal fade" role="dialog" tabindex="-1" aria-hidden="true" aria-labelledby="memberModalLabel">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">

                    <div class="ct"></div>
                </div>

            </div>
        </div>
        <div id="sign" class="modal fade" role="dialog" tabindex="-1" aria-hidden="true" aria-labelledby="memberModalLabel">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">

                    <div class="ct"></div>
                </div>

            </div>
        </div>
        <div id="moa" class="modal fade" role="dialog" tabindex="-1" aria-hidden="true" aria-labelledby="memberModalLabel">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">

                    <div class="ct"></div>
                </div>

            </div>
        </div>
        <div id="cert" class="modal fade" role="dialog" tabindex="-1" aria-hidden="true" aria-labelledby="memberModalLabel">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">

                    <div class="ct"></div>
                </div>

            </div>
        </div>
        <div id="comp_file" class="modal fade" role="dialog" tabindex="-1" aria-hidden="true" aria-labelledby="memberModalLabel">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">

                    <div class="ct"></div>
                </div>

            </div>
        </div>
        <div id="canceled_check" class="modal fade" role="dialog" tabindex="-1" aria-hidden="true" aria-labelledby="memberModalLabel">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">

                    <div class="ct"></div>
                </div>

            </div>
        </div>

        <!-- START PAGE CONTAINER -->
        <div class="page-container">

            <!-- START PAGE SIDEBAR -->
            <div class="page-sidebar" >
                <!-- START X-NAVIGATION -->
                <ul class="x-navigation">
                    <img style="padding-left: 10px" height="50px" src="/img/bulkhouse_logo_white-01.png" alt=""/>

                    <li class="xn-profile">

                        <div class="profile">

                            <div class="profile-data">
                                <div class="profile-data-name">Profile</div>
                                <div class="profile-data-title">Vendor</div>
                            </div>

                        </div>
                    </li>

                    <li class="active">
                        <a href="/verification"><span class="fa fa-desktop"></span> <span class="xn-text">Dashboard</span></a>
                    </li>

                    <li class="active">
                        <a href="/admin/vendor_details"><span class="fa fa-desktop"></span> <span class="xn-text">Pending Vendors</span></a>
                    </li>
                    <li class="active">
                        <a href="/admin/vendor_profile"><span class="fa fa-desktop"></span> <span class="xn-text">Vendors Profiles</span></a>





                </ul>
                <!-- END X-NAVIGATION -->
            </div>
            <!-- END PAGE SIDEBAR -->

            <!-- PAGE CONTENT -->
            <div class="page-content">

                <!-- START X-NAVIGATION VERTICAL -->
                <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
                    <!-- TOGGLE NAVIGATION -->
                    <li class="xn-icon-button">
                        <a href="#" class="x-navigation-minimize"><span class="fa fa-dedent"></span></a>
                    </li>
                    <!-- END TOGGLE NAVIGATION -->

                    <!-- SIGN OUT -->
                    <li class="xn-icon-button pull-right">
                        <a href="<?php site_url() ?>admin/logout" class="mb-control" data-sound="alert" data-box="#mb-signout"><span class="fa fa-sign-out"></span></a>
                    </li>
                    <!-- END SIGN OUT -->

                </ul>

                <!-- END X-NAVIGATION VERTICAL -->
                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li><a href="\verification">Dashboard</a></li>


                </ul>
                <header class="header bg-white b-b">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-success push-up-20">
                                <div class="panel-body panel-body-pricing">
                                    <div class="col-md-6">



                                        <h3><i class="fa fa-building-o"></i>&nbsp; Company Name </h3><br/><h2><small><b><?php echo $firm_name ?></b></small></a></h2>
                                        <hr>
                                        <p><span class="fa fa-clock-o">&nbsp;  </span>Date of Registration: &nbsp;<b><?php echo $registered_on ?></b></p>
                                        <a href="#company" class="toggle"><p><span class="fa fa-briefcase" >&nbsp; </span>Company Details<i class="fa fa-chevron-down"></i></p></a>

                                        <div id="company" class="hidden">
                                            <p><span class="fa fa-clock-o">&nbsp;  </span>Year of Establishment &nbsp;<b><?php echo $year_establishment ?></b></p>
                                            <p><span class="fa fa-users">&nbsp;  </span>NO.Employees: &nbsp;<b><?php echo $no_employees ?></b></p>
                                            <p><span class="fa fa-user">&nbsp;  </span>Register as: &nbsp;<b><?php echo $reg_category ?></b></p>
                                            <p><span class="fa fa-sitemap">&nbsp;  </span>Web Site: &nbsp;<b><?php echo $website ?></b></p>
                                            <p><span class="fa fa-certificate">&nbsp;  </span>Quality Certification: &nbsp;<b><?php echo $cert_products ?></b></p>
                                            <p><span class="fa fa-rupee">&nbsp;  </span>Turnover: &nbsp;<b><?php echo $comp_turnover ?></b></p>


                                        </div>

                                    </div>

                                    <div class="col-md-6" style="border-left:2px #989d98 solid">



                                        <p><span class="fa fa-caret-right">&nbsp;  </span>Firm Type: &nbsp;<b><?php echo $firm_type ?></b></p>
                                        <p><span class="fa fa-phone">&nbsp;  </span>Mobile: &nbsp;  <b><?php echo $mobile ?></b>&nbsp;
                                            <?php
                                            $verified_mobile = $this->vendor_update->latest_number($compid);
                                            if ($verified_mobile == $mobile) {
                                                ?>
                                                <i class="fa fa-check" data-toggle="tooltip" title="Verified"></i>
                                        <?php } else { ?>
                                                <i class="fa fa-times" data-toggle="tooltip" title="Not Verified"></i></p>
<?php } ?>
                                        <p><span class="fa fa-envelope">&nbsp; </span>Email: &nbsp;<b><?php echo $email ?></b></p>
                                        <a href="#address" class="toggle"><p><span class="fa fa-truck" >&nbsp; </span>Address<i class="fa fa-chevron-down"></i></p></a>

                                        <div id="address" class="hidden">
                                            <p><span class="fa fa-caret-right">&nbsp; </span><b><?php echo $address1 ?>,<?php echo $address2 ?></b></p>
                                            <p><span class="fa fa-caret-right">&nbsp; </span>City:<b><?php echo $city ?></b></p>
                                            <p><span class="fa fa-caret-right">&nbsp; </span>Pin Code:<b><?php echo $pin_code ?></b></p>
                                            <p><span class="fa fa-caret-right">&nbsp; </span>State:<b><?php echo $state ?></b></p>

                                            <p><span class="fa fa-caret-right">&nbsp; </span>Country:<b><?php echo $country ?></b></p>

                                        </div>

                                        <p><span class="fa fa-phone">&nbsp; </span>Land Line: &nbsp;<b><?php echo $land_line ?></b></p>
                                        <!--
                           <p class="text-muted">For individuals</p>-->
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                </header>
                <div class="container">
                    <div class="row">
                        <div class="col-md-10">


                            <header class="panel-heading">
                                <h3 class="font-thin padder"><span class="fa fa-file-text-o">&nbsp;<b>Documents Status</b></span></h3>
                            </header>


                            <?php
                            if ($firm_type == 'partnership') {

                                if ($pan_prop_status == 5) {
                                    ?>

                                    <a   data-toggle="tooltip"  title="Need to Upload!!" class="btn btn-circle btn-info"><i class="fa fa-thumbs-down"></i>
                                        <small><b>Pan Card</b></small></a>
    <?php } elseif ($pan_prop_status == 0) { ?>
                                    <span data-toggle="tooltip" title="waiting for approve!">
                                        <a   data-toggle="modal" data-target="#pan_prop" data-whatever="<?php echo $compid; ?>"  class="btn btn-circle btn-warning"><i class="fa fa-exclamation"></i><small><b>Pan Card</b></small></a>
                                    </span>

    <?php } elseif ($pan_prop_status == 2) { ?>
                                    <span data-toggle="tooltip" title="Approved!">
                                        <a  data-toggle="modal" data-target="#pan_prop" data-whatever="<?php echo $compid; ?>" class="btn btn-circle btn-success"><i class="glyphicon glyphicon-thumbs-up"></i><small><b>Pan Card</b></small></a>
                                    </span>
    <?php } elseif ($pan_prop_status == 1) { ?>
                                    <span data-toggle="tooltip" title="Submited!">
                                        <a  data-toggle="modal" data-target="#pan_prop" data-whatever="<?php echo $compid; ?>" class="btn btn-circle btn-danger"><i class="fa fa-check"></i><small><b>Pan Card</b></small></a>
                                    </span>
                                <?php } ?>

    <?php if ($pan_comp_status == 5) { ?>

                                    <a   data-toggle="tooltip" title="Need to Upload!!" class="btn btn-circle btn-info"><i class="fa fa-thumbs-down"></i><small><b>Company Pan</b></small></a>

    <?php } elseif ($pan_comp_status == 0) { ?>
                                    <span data-toggle="tooltip" title="Waiting for approve!!">
                                        <a   data-toggle="modal" data-target="#comp" data-whatever="<?php echo $compid; ?>" class="btn btn-circle btn-warning"><i class="fa fa-exclamation"></i><small><b>Company Pan</b></small></a>
                                    </span>
    <?php } elseif ($pan_comp_status == 2) { ?>
                                    <span data-toggle="tooltip" title="Approved!">
                                        <a   data-toggle="modal" data-target="#comp" data-whatever="<?php echo $compid; ?>" class="btn btn-circle btn-success"><i class="glyphicon glyphicon-thumbs-up"></i><small><b>Company Pan</b></small></a>
                                    </span>
    <?php } elseif ($pan_comp_status == 1) { ?>
                                    <span data-toggle="tooltip" title="Disapproved!">
                                        <a   data-toggle="modal" data-target="#comp" data-whatever="<?php echo $compid; ?>" class="btn btn-circle btn-danger"><i class="fa fa-times"></i><small><b>Company Pan</b></small></a>
                                    </span>
                                <?php } ?>

                                <?php if ($businessid_status == 5) { ?>
                                    <a   data-toggle="tooltip" title="Need to Upload!!" class="btn btn-circle btn-info"><i class="fa fa-thumbs-down"></i><small><b>Business ID</b></small></a>
    <?php } elseif ($businessid_status == 0) { ?>
                                    <span data-toggle="tooltip" title="waiting for approve!">
                                        <a   data-toggle="modal" data-target="#businessid" data-whatever="<?php echo $compid; ?>" class="btn btn-circle btn-warning"><i class="fa fa-exclamation"></i><small><b>Business ID</b></small></a>
                                    </span>
    <?php } elseif ($businessid_status == 2) { ?>
                                    <span data-toggle="tooltip" title="Approved!">
                                        <a   data-toggle="modal" data-target="#businessid" data-whatever="<?php echo $compid; ?>" class="btn btn-circle btn-success"><i class="glyphicon glyphicon-thumbs-up"></i><small><b>Business ID</b></small></a>
                                    </span>
    <?php } elseif ($businessid_status == 1) { ?>
                                    <span data-toggle="tooltip" title="Disapproved!">
                                        <a   data-toggle="modal" data-target="#businessid" data-whatever="<?php echo $compid; ?>" class="btn btn-circle btn-danger"><i class="fa fa-times"></i><small><b>Business ID</b></small></a>
                                    </span>
                                <?php } ?>

                                <?php if ($addressid_status == 5) { ?>
                                    <a   data-toggle="tooltip" title="Need to Upload!!" class="btn btn-circle btn-info"><i class="fa fa-thumbs-down"></i><small><b>Address ID</b></small></a>
    <?php } elseif ($addressid_status == 0) { ?>
                                    <span data-toggle="tooltip" title="waiting for approve!">
                                        <a   data-toggle="modal" data-target="#addressid" data-whatever="<?php echo $compid; ?>" class="btn btn-circle btn-warning"><i class="fa fa-exclamation"></i><small><b>Address ID</b></small></a>
                                    </span>
    <?php } elseif ($addressid_status == 2) { ?>
                                    <span data-toggle="tooltip" title="Approved!">
                                        <a   data-toggle="modal" data-target="#addressid" data-whatever="<?php echo $compid; ?>" class="btn btn-circle btn-success"><i class="glyphicon glyphicon-thumbs-up"></i><small><b>Address ID</b></small></a>
                                    </span>
    <?php } elseif ($addressid_status == 1) { ?>
                                    <span data-toggle="tooltip" title="Disapproved!">
                                        <a   data-toggle="modal" data-target="#addressid" data-whatever="<?php echo $compid; ?>" class="btn btn-circle btn-danger"><i class="fa fa-times"></i><small><b>Address ID</b></small></a>
                                    </span>
                                <?php } ?>

    <?php if ($vat_cst_status == 5) { ?>

                                    <a   data-toggle="tooltip" title="Need to Upload!!" class="btn btn-circle btn-info"><i class="fa fa-thumbs-down"></i><small><b>VAT - CST</b></small></a>
    <?php } elseif ($vat_cst_status == 0) { ?>
                                    <span data-toggle="tooltip" title="waiting for approve!">
                                        <a  data-toggle="modal" data-target="#vat" data-whatever="<?php echo $compid; ?>"  class="btn btn-circle btn-warning"><i class="fa fa-exclamation"></i><small><b>VAT - CST</b></small></a>
                                    </span>
    <?php } elseif ($vat_cst_status == 2) { ?>
                                    <span data-toggle="tooltip" title="Approved!">
                                        <a   data-toggle="modal" data-target="#vat" data-whatever="<?php echo $compid; ?>"  class="btn btn-circle btn-success"><i class="glyphicon glyphicon-thumbs-up"></i><small><b>VAT - CST</b></small></a>
                                    </span>
    <?php } elseif ($vat_cst_status == 1) { ?>
                                    <span data-toggle="tooltip" title="Disapproved!">
                                        <a   data-toggle="modal" data-target="#vat" data-whatever="<?php echo $compid; ?>"  class="btn btn-circle btn-danger"><i class="fa fa-times"></i><small><b>VAT - CST</b></small></a>
                                    </span>
                                <?php } ?>

    <?php if ($part_deed_status == 5) { ?>

                                    <a   data-toggle="tooltip" title="Need to Upload!!" class="btn btn-circle btn-info"><i class="fa fa-thumbs-down"></i><small><b>Partnership Deed</b></small></a>
    <?php } elseif ($part_deed_status == 0) { ?>
                                    <span data-toggle="tooltip" title="waiting for approve!">
                                        <a   data-toggle="modal" data-target="#deep" data-whatever="<?php echo $compid; ?>" class="btn btn-circle btn-warning"><i class="fa fa-exclamation"></i><small><b>Partnership Deed</b></small></a>
                                    </span>
    <?php } elseif ($part_deed_status == 2) { ?>
                                    <span data-toggle="tooltip" title="Approved!">
                                        <a   data-toggle="modal" data-target="#deep" data-whatever="<?php echo $compid; ?>" class="btn btn-circle btn-success"><i class="glyphicon glyphicon-thumbs-up"></i><small><b>Partnership Deed</b></small></a>
                                    </span>
    <?php } elseif ($part_deed_status == 1) { ?>
                                    <span data-toggle="tooltip" title="Disapproved!">
                                        <a   data-toggle="modal" data-target="#deep" data-whatever="<?php echo $compid; ?>" class="btn btn-circle btn-danger"><i class="fa fa-times"></i><small><b>Partnership Deed</b></small></a>
                                    </span>
                                <?php } ?>

    <?php if ($photoid_status == 5) { ?>

                                    <a   data-toggle="tooltip" title="Need to Upload!!" class="btn btn-circle btn-info"><i class="fa fa-thumbs-down"></i><small><b>Photo ID</b></small></a>
    <?php } elseif ($photoid_status == 0) { ?>
                                    <span data-toggle="tooltip" title="waiting for approve!">
                                        <a   data-toggle="modal" data-target="#photoid" data-whatever="<?php echo $compid; ?>" class="btn btn-circle btn-warning"><i class="fa fa-exclamation"></i><small><b>Photo ID</b></small></a>
                                    </span>
    <?php } elseif ($photoid_status == 2) { ?>
                                    <span data-toggle="tooltip" title="Approved!">
                                        <a   data-toggle="modal" data-target="#photoid" data-whatever="<?php echo $compid; ?>" class="btn btn-circle btn-success"><i class="glyphicon glyphicon-thumbs-up"></i><small><b>Photo ID</b></small></a>
                                    </span>
    <?php } elseif ($photoid_status == 1) { ?>
                                    <span data-toggle="tooltip" title="Disapproved!">
                                        <a   data-toggle="modal" data-target="#photoid" data-whatever="<?php echo $compid; ?>" class="btn btn-circle btn-danger"><i class="fa fa-times"></i><small><b>Photo ID</b></small></a>
                                    </span>
                                <?php } ?>

    <?php if ($cenvat_status == 5) { ?>

                                    <a   data-toggle="tooltip" title="Need to Upload!!" class="btn btn-circle btn-info"><i class="fa fa-thumbs-down"></i><small><b>CENVAT</b></small></a>
    <?php } elseif ($cenvat_status == 0) { ?>
                                    <span data-toggle="tooltip" title="waiting for approve!">
                                        <a   data-toggle="modal" data-target="#cenvat" data-whatever="<?php echo $compid; ?>" class="btn btn-circle btn-warning"><i class="fa fa-exclamation"></i><small><b>CENVAT</b></small></a>
                                    </span>
    <?php } elseif ($cenvat_status == 2) { ?>
                                    <span data-toggle="tooltip" title="Approved!">
                                        <a   data-toggle="modal" data-target="#cenvat" data-whatever="<?php echo $compid; ?>" class="btn btn-circle btn-success"><i class="glyphicon glyphicon-thumbs-up"></i><small><b>CENVAT</b></small></a>
                                    </span>
    <?php } elseif ($cenvat_status == 1) { ?>
                                    <span data-toggle="tooltip" title="Disapproved!">
                                        <a   data-toggle="modal" data-target="#cenvat" data-whatever="<?php echo $compid; ?>" class="btn btn-circle btn-danger"><i class="fa fa-times"></i><small><b>CENVAT</b></small></a>
                                    </span>
                                <?php } ?>

    <?php if ($servicetax_status == 5) { ?>

                                    <a   data-toggle="tooltip" title="Need to Upload!!" class="btn btn-circle btn-info"><i class="fa fa-thumbs-down"></i><small><b>Service Tax</b></small></a>
    <?php } elseif ($servicetax_status == 0) { ?>
                                    <span data-toggle="tooltip" title="waiting for approve!">
                                        <a   data-toggle="modal" data-target="#servicetax" data-whatever="<?php echo $compid; ?>" class="btn btn-circle btn-warning"><i class="fa fa-exclamation"></i><small><b>Service Tax</b></small></a>
                                    </span>
    <?php } elseif ($servicetax_status == 2) { ?>
                                    <span data-toggle="tooltip" title="Approved!">
                                        <a   data-toggle="modal" data-target="#servicetax" data-whatever="<?php echo $compid; ?>" class="btn btn-circle btn-success"><i class="glyphicon glyphicon-thumbs-up"></i><small><b>Service Tax</b></small></a>
                                    </span>
    <?php } elseif ($servicetax_status == 1) { ?>
                                    <span data-toggle="tooltip" title="Disapproved!">
                                        <a   data-toggle="modal" data-target="#servicetax" data-whatever="<?php echo $compid; ?>" class="btn btn-circle btn-danger"><i class="fa fa-times"></i><small><b>Service Tax</b></small></a>

                                    </span>

                                <?php } ?>

    <?php if ($comp_file_status == 5) { ?>
                                    </br>
                                    </br>
                                    <a   data-toggle="tooltip" title="Need to Upload!!" class="btn btn-circle btn-info"><i class="fa fa-thumbs-down"></i><small><b>Company profile</b></small></a>
    <?php } elseif ($comp_file_status == 0) { ?>
                                    </br>
                                    </br>
                                    <span data-toggle="tooltip" title="waiting for approve!">
                                        <a   data-toggle="modal" data-target="#comp_file" data-whatever="<?php echo $compid; ?>" class="btn btn-circle btn-warning"><i class="fa fa-exclamation"></i><small><b>Company profile</b></small></a>
                                    </span>
    <?php } elseif ($comp_file_status == 2) { ?>
                                    </br>
                                    </br>
                                    <span data-toggle="tooltip" title="Approved!">
                                        <a   data-toggle="modal" data-target="#comp_file" data-whatever="<?php echo $compid; ?>" class="btn btn-circle btn-success"><i class="glyphicon glyphicon-thumbs-up"></i><small><b>Company profile</b></small></a>
                                    </span>
    <?php } elseif ($comp_file_status == 1) { ?>
                                    </br>
                                    </br>
                                    <span data-toggle="tooltip" title="Disapproved!">
                                        <a   data-toggle="modal" data-target="#comp_file" data-whatever="<?php echo $compid; ?>" class="btn btn-circle btn-danger"><i class="fa fa-times"></i><small><b>Company profile</b></small></a>

                                    </span>

                                    <?php
                                }
                            } elseif ($firm_type == 'proprietorship') {

                                if ($pan_prop_status == 5) {
                                    ?>

                                    <a   data-toggle="tooltip"  title="Need to Upload!!" class="btn btn-circle btn-info"><i class="fa fa-thumbs-down"></i>
                                        <small><b>Pan Card</b></small></a>
    <?php } elseif ($pan_prop_status == 0) { ?>
                                    <span data-toggle="tooltip" title="waiting for approve!">
                                        <a   data-toggle="modal" data-target="#pan_prop" data-whatever="<?php echo $compid; ?>"  class="btn btn-circle btn-warning"><i class="fa fa-exclamation"></i><small><b>Pan Card</b></small></a>
                                    </span>

    <?php } elseif ($pan_prop_status == 2) { ?>
                                    <span data-toggle="tooltip" title="Approved!">
                                        <a  data-toggle="modal" data-target="#pan_prop" data-whatever="<?php echo $compid; ?>" class="btn btn-circle btn-success"><i class="glyphicon glyphicon-thumbs-up"></i><small><b>Pan Card</b></small></a>
                                    </span>
    <?php } elseif ($pan_prop_status == 1) { ?>
                                    <span data-toggle="tooltip" title="Submited!">
                                        <a  data-toggle="modal" data-target="#pan_prop" data-whatever="<?php echo $compid; ?>" class="btn btn-circle btn-danger"><i class="fa fa-check"></i><small><b>Pan Card</b></small></a>
                                    </span>

                                <?php } ?>

    <?php if ($shop_establish_trade_status == 5) { ?>

                                    <a   data-toggle="tooltip" title="Need to Upload!!" class="btn btn-circle btn-info"><i class="fa fa-thumbs-down"></i><small><b>Shop establishment</b></small></a>
    <?php } elseif ($shop_establish_trade_status == 0) { ?>
                                    <span data-toggle="tooltip" title="waiting for approve!">
                                        <a   data-toggle="modal" data-target="#shop_establish_trade" data-whatever="<?php echo $compid; ?>" class="btn btn-circle btn-warning"><i class="fa fa-exclamation"></i><small><b>Shop establishment</b></small></a>
                                    </span>
    <?php } elseif ($shop_establish_trade_status == 2) { ?>
                                    <span data-toggle="tooltip" title="Approved!">
                                        <a   data-toggle="modal" data-target="#shop_establish_trade" data-whatever="<?php echo $compid; ?>" class="btn btn-circle btn-success"><i class="glyphicon glyphicon-thumbs-up"></i><small><b>Shop establishment</b></small></a>
                                    </span>
    <?php } elseif ($shop_establish_trade_status == 1) { ?>
                                    <span data-toggle="tooltip" title="Disapproved!">
                                        <a   data-toggle="modal" data-target="#shop_establish_trade" data-whatever="<?php echo $compid; ?>" class="btn btn-circle btn-danger"><i class="fa fa-times"></i><small><b>Shop establishment</b></small></a>
                                    </span>
                                <?php } ?>

    <?php if ($photoid_status == 5) { ?>

                                    <a   data-toggle="tooltip" title="Need to Upload!!" class="btn btn-circle btn-info"><i class="fa fa-thumbs-down"></i><small><b>Photo ID</b></small></a>
    <?php } elseif ($photoid_status == 0) { ?>
                                    <span data-toggle="tooltip" title="waiting for approve!">
                                        <a   data-toggle="modal" data-target="#photoid" data-whatever="<?php echo $compid; ?>" class="btn btn-circle btn-warning"><i class="fa fa-exclamation"></i><small><b>Photo ID</b></small></a>
                                    </span>
    <?php } elseif ($photoid_status == 2) { ?>
                                    <span data-toggle="tooltip" title="Approved!">
                                        <a   data-toggle="modal" data-target="#photoid" data-whatever="<?php echo $compid; ?>" class="btn btn-circle btn-success"><i class="glyphicon glyphicon-thumbs-up"></i><small><b>Photo ID</b></small></a>
                                    </span>
    <?php } elseif ($photoid_status == 1) { ?>
                                    <span data-toggle="tooltip" title="Disapproved!">
                                        <a   data-toggle="modal" data-target="#photoid" data-whatever="<?php echo $compid; ?>" class="btn btn-circle btn-danger"><i class="fa fa-times"></i><small><b>Photo ID</b></small></a>
                                    </span>
                                <?php } ?>

    <?php if ($vat_cst_status == 5) { ?>

                                    <a   data-toggle="tooltip" title="Need to Upload!!" class="btn btn-circle btn-info"><i class="fa fa-thumbs-down"></i><small><b>VAT - CST</b></small></a>
    <?php } elseif ($vat_cst_status == 0) { ?>
                                    <span data-toggle="tooltip" title="waiting for approve!">
                                        <a  data-toggle="modal" data-target="#vat" data-whatever="<?php echo $compid; ?>"  class="btn btn-circle btn-warning"><i class="fa fa-exclamation"></i><small><b>VAT - CST</b></small></a>
                                    </span>
    <?php } elseif ($vat_cst_status == 2) { ?>
                                    <span data-toggle="tooltip" title="Approved!">
                                        <a   data-toggle="modal" data-target="#vat" data-whatever="<?php echo $compid; ?>"  class="btn btn-circle btn-success"><i class="glyphicon glyphicon-thumbs-up"></i><small><b>VAT - CST</b></small></a>
                                    </span>
    <?php } elseif ($vat_cst_status == 1) { ?>
                                    <span data-toggle="tooltip" title="Disapproved!">
                                        <a   data-toggle="modal" data-target="#vat" data-whatever="<?php echo $compid; ?>"  class="btn btn-circle btn-danger"><i class="fa fa-times"></i><small><b>VAT - CST</b></small></a>
                                    </span>
                                <?php } ?>

                                <?php if ($businessid_status == 5) { ?>
                                    <a   data-toggle="tooltip" title="Need to Upload!!" class="btn btn-circle btn-info"><i class="fa fa-thumbs-down"></i><small><b>Business ID</b></small></a>
    <?php } elseif ($businessid_status == 0) { ?>
                                    <span data-toggle="tooltip" title="waiting for approve!">
                                        <a   data-toggle="modal" data-target="#businessid" data-whatever="<?php echo $compid; ?>" class="btn btn-circle btn-warning"><i class="fa fa-exclamation"></i><small><b>Business ID</b></small></a>
                                    </span>
    <?php } elseif ($businessid_status == 2) { ?>
                                    <span data-toggle="tooltip" title="Approved!">
                                        <a   data-toggle="modal" data-target="#businessid" data-whatever="<?php echo $compid; ?>" class="btn btn-circle btn-success"><i class="glyphicon glyphicon-thumbs-up"></i><small><b>Business ID</b></small></a>
                                    </span>
    <?php } elseif ($businessid_status == 1) { ?>
                                    <span data-toggle="tooltip" title="Disapproved!">
                                        <a   data-toggle="modal" data-target="#businessid" data-whatever="<?php echo $compid; ?>" class="btn btn-circle btn-danger"><i class="fa fa-times"></i><small><b>Business ID</b></small></a>
                                    </span>
                                <?php } ?>

                                <?php if ($addressid_status == 5) { ?>
                                    <a   data-toggle="tooltip" title="Need to Upload!!" class="btn btn-circle btn-info"><i class="fa fa-thumbs-down"></i><small><b>Address ID</b></small></a>
    <?php } elseif ($addressid_status == 0) { ?>
                                    <span data-toggle="tooltip" title="waiting for approve!">
                                        <a   data-toggle="modal" data-target="#addressid" data-whatever="<?php echo $compid; ?>" class="btn btn-circle btn-warning"><i class="fa fa-exclamation"></i><small><b>Address ID</b></small></a>
                                    </span>
    <?php } elseif ($addressid_status == 2) { ?>
                                    <span data-toggle="tooltip" title="Approved!">
                                        <a   data-toggle="modal" data-target="#addressid" data-whatever="<?php echo $compid; ?>" class="btn btn-circle btn-success"><i class="glyphicon glyphicon-thumbs-up"></i><small><b>Address ID</b></small></a>
                                    </span>
    <?php } elseif ($addressid_status == 1) { ?>
                                    <span data-toggle="tooltip" title="Disapproved!">
                                        <a   data-toggle="modal" data-target="#addressid" data-whatever="<?php echo $compid; ?>" class="btn btn-circle btn-danger"><i class="fa fa-times"></i><small><b>Address ID</b></small></a>
                                    </span>
                                <?php } ?>

    <?php if ($cenvat_status == 5) { ?>

                                    <a   data-toggle="tooltip" title="Need to Upload!!" class="btn btn-circle btn-info"><i class="fa fa-thumbs-down"></i><small><b>CENVAT</b></small></a>
    <?php } elseif ($cenvat_status == 0) { ?>
                                    <span data-toggle="tooltip" title="waiting for approve!">
                                        <a   data-toggle="modal" data-target="#cenvat" data-whatever="<?php echo $compid; ?>" class="btn btn-circle btn-warning"><i class="fa fa-exclamation"></i><small><b>CENVAT</b></small></a>
                                    </span>
    <?php } elseif ($cenvat_status == 2) { ?>
                                    <span data-toggle="tooltip" title="Approved!">
                                        <a   data-toggle="modal" data-target="#cenvat" data-whatever="<?php echo $compid; ?>" class="btn btn-circle btn-success"><i class="glyphicon glyphicon-thumbs-up"></i><small><b>CENVAT</b></small></a>
                                    </span>
    <?php } elseif ($cenvat_status == 1) { ?>
                                    <span data-toggle="tooltip" title="Disapproved!">
                                        <a   data-toggle="modal" data-target="#cenvat" data-whatever="<?php echo $compid; ?>" class="btn btn-circle btn-danger"><i class="fa fa-times"></i><small><b>CENVAT</b></small></a>
                                    </span>
                                <?php } ?>

    <?php if ($servicetax_status == 5) { ?>

                                    <a   data-toggle="tooltip" title="Need to Upload!!" class="btn btn-circle btn-info"><i class="fa fa-thumbs-down"></i><small><b>Service Tax</b></small></a>
    <?php } elseif ($servicetax_status == 0) { ?>
                                    <span data-toggle="tooltip" title="waiting for approve!">
                                        <a   data-toggle="modal" data-target="#servicetax" data-whatever="<?php echo $compid; ?>" class="btn btn-circle btn-warning"><i class="fa fa-exclamation"></i><small><b>Service Tax</b></small></a>
                                    </span>
    <?php } elseif ($servicetax_status == 2) { ?>
                                    <span data-toggle="tooltip" title="Approved!">
                                        <a   data-toggle="modal" data-target="#servicetax" data-whatever="<?php echo $compid; ?>" class="btn btn-circle btn-success"><i class="glyphicon glyphicon-thumbs-up"></i><small><b>Service Tax</b></small></a>
                                    </span>
    <?php } elseif ($servicetax_status == 1) { ?>
                                    <span data-toggle="tooltip" title="Disapproved!">
                                        <a   data-toggle="modal" data-target="#servicetax" data-whatever="<?php echo $compid; ?>" class="btn btn-circle btn-danger"><i class="fa fa-times"></i><small><b>Service Tax</b></small></a>

                                    </span>
                                <?php } ?>

    <?php if ($comp_file_status == 5) { ?>
                                    </br>
                                    </br>

                                    <a   data-toggle="tooltip" title="Need to Upload!!" class="btn btn-circle btn-info"><i class="fa fa-thumbs-down"></i><small><b>Company profile</b></small></a>
    <?php } elseif ($comp_file_status == 0) { ?>
                                    </br>
                                    </br>
                                    <span data-toggle="tooltip" title="waiting for approve!">
                                        <a   data-toggle="modal" data-target="#comp_file" data-whatever="<?php echo $compid; ?>" class="btn btn-circle btn-warning"><i class="fa fa-exclamation"></i><small><b>Company profile</b></small></a>
                                    </span>
    <?php } elseif ($comp_file_status == 2) { ?>
                                    </br>
                                    </br>
                                    <span data-toggle="tooltip" title="Approved!">
                                        <a   data-toggle="modal" data-target="#comp_file" data-whatever="<?php echo $compid; ?>" class="btn btn-circle btn-success"><i class="glyphicon glyphicon-thumbs-up"></i><small><b>Company profile</b></small></a>
                                    </span>
    <?php } elseif ($comp_file_status == 1) { ?>
                                    </br>
                                    </br>
                                    <span data-toggle="tooltip" title="Disapproved!">
                                        <a   data-toggle="modal" data-target="#comp_file" data-whatever="<?php echo $compid; ?>" class="btn btn-circle btn-danger"><i class="fa fa-times"></i><small><b>Company profile</b></small></a>

                                    </span>

                                    <?php
                                }
                            } elseif ($firm_type == 'pvt_or_ltd') {

                                if ($pan_prop_status == 5) {
                                    ?>

                                    <a   data-toggle="tooltip"  title="Need to Upload!!" class="btn btn-circle btn-info"><i class="fa fa-thumbs-down"></i>
                                        <small><b>Pan Card</b></small></a>
    <?php } elseif ($pan_prop_status == 0) { ?>
                                    <span data-toggle="tooltip" title="waiting for approve!">
                                        <a   data-toggle="modal" data-target="#pan_prop" data-whatever="<?php echo $compid; ?>"  class="btn btn-circle btn-warning"><i class="fa fa-exclamation"></i><small><b>Pan Card</b></small></a>
                                    </span>

    <?php } elseif ($pan_prop_status == 2) { ?>
                                    <span data-toggle="tooltip" title="Approved!">
                                        <a  data-toggle="modal" data-target="#pan_prop" data-whatever="<?php echo $compid; ?>" class="btn btn-circle btn-success"><i class="glyphicon glyphicon-thumbs-up"></i><small><b>Pan Card</b></small></a>
                                    </span>
    <?php } elseif ($pan_prop_status == 1) { ?>
                                    <span data-toggle="tooltip" title="Submited!">
                                        <a  data-toggle="modal" data-target="#pan_prop" data-whatever="<?php echo $compid; ?>" class="btn btn-circle btn-danger"><i class="fa fa-check"></i><small><b>Pan Card</b></small></a>
                                    </span>

                                <?php } ?>

                                <?php if ($pan_comp_status == 5) {
                                    ?>

                                    <a   data-toggle="tooltip" title="Need to Upload!!" class="btn btn-circle btn-info"><i class="fa fa-thumbs-down"></i><small><b>Company Pan</b></small></a>

    <?php } elseif ($pan_comp_status == 0) { ?>
                                    <span data-toggle="tooltip" title="Waiting for approve!!">
                                        <a   data-toggle="modal" data-target="#comp" data-whatever="<?php echo $compid; ?>" class="btn btn-circle btn-warning"><i class="fa fa-exclamation"></i><small><b>Company Pan</b></small></a>
                                    </span>
    <?php } elseif ($pan_comp_status == 2) { ?>
                                    <span data-toggle="tooltip" title="Approved!">
                                        <a   data-toggle="modal" data-target="#comp" data-whatever="<?php echo $compid; ?>" class="btn btn-circle btn-success"><i class="glyphicon glyphicon-thumbs-up"></i><small><b>Company Pan</b></small></a>
                                    </span>
    <?php } elseif ($pan_comp_status == 1) { ?>
                                    <span data-toggle="tooltip" title="Disapproved!">
                                        <a   data-toggle="modal" data-target="#comp" data-whatever="<?php echo $compid; ?>" class="btn btn-circle btn-danger"><i class="fa fa-times"></i><small><b>Company Pan</b></small></a>
                                    </span>
                                <?php } ?>

                                <?php if ($businessid_status == 5) { ?>
                                    <a   data-toggle="tooltip" title="Need to Upload!!" class="btn btn-circle btn-info"><i class="fa fa-thumbs-down"></i><small><b>Business ID</b></small></a>
    <?php } elseif ($businessid_status == 0) { ?>
                                    <span data-toggle="tooltip" title="waiting for approve!">
                                        <a   data-toggle="modal" data-target="#businessid" data-whatever="<?php echo $compid; ?>" class="btn btn-circle btn-warning"><i class="fa fa-exclamation"></i><small><b>Business ID</b></small></a>
                                    </span>
    <?php } elseif ($businessid_status == 2) { ?>
                                    <span data-toggle="tooltip" title="Approved!">
                                        <a   data-toggle="modal" data-target="#businessid" data-whatever="<?php echo $compid; ?>" class="btn btn-circle btn-success"><i class="glyphicon glyphicon-thumbs-up"></i><small><b>Business ID</b></small></a>
                                    </span>
    <?php } elseif ($businessid_status == 1) { ?>
                                    <span data-toggle="tooltip" title="Disapproved!">
                                        <a   data-toggle="modal" data-target="#businessid" data-whatever="<?php echo $compid; ?>" class="btn btn-circle btn-danger"><i class="fa fa-times"></i><small><b>Business ID</b></small></a>
                                    </span>
                                <?php } ?>

                                <?php if ($addressid_status == 5) { ?>
                                    <a   data-toggle="tooltip" title="Need to Upload!!" class="btn btn-circle btn-info"><i class="fa fa-thumbs-down"></i><small><b>Address ID</b></small></a>
    <?php } elseif ($addressid_status == 0) { ?>
                                    <span data-toggle="tooltip" title="waiting for approve!">
                                        <a   data-toggle="modal" data-target="#addressid" data-whatever="<?php echo $compid; ?>" class="btn btn-circle btn-warning"><i class="fa fa-exclamation"></i><small><b>Address ID</b></small></a>
                                    </span>
    <?php } elseif ($addressid_status == 2) { ?>
                                    <span data-toggle="tooltip" title="Approved!">
                                        <a   data-toggle="modal" data-target="#addressid" data-whatever="<?php echo $compid; ?>" class="btn btn-circle btn-success"><i class="glyphicon glyphicon-thumbs-up"></i><small><b>Address ID</b></small></a>
                                    </span>
    <?php } elseif ($addressid_status == 1) { ?>
                                    <span data-toggle="tooltip" title="Disapproved!">
                                        <a   data-toggle="modal" data-target="#addressid" data-whatever="<?php echo $compid; ?>" class="btn btn-circle btn-danger"><i class="fa fa-times"></i><small><b>Address ID</b></small></a>
                                    </span>
                                <?php } ?>

    <?php if ($photoid_status == 5) { ?>

                                    <a   data-toggle="tooltip" title="Need to Upload!!" class="btn btn-circle btn-info"><i class="fa fa-thumbs-down"></i><small><b>Photo ID</b></small></a>
    <?php } elseif ($photoid_status == 0) { ?>
                                    <span data-toggle="tooltip" title="waiting for approve!">
                                        <a   data-toggle="modal" data-target="#photoid" data-whatever="<?php echo $compid; ?>" class="btn btn-circle btn-warning"><i class="fa fa-exclamation"></i><small><b>Photo ID</b></small></a>
                                    </span>
    <?php } elseif ($photoid_status == 2) { ?>
                                    <span data-toggle="tooltip" title="Approved!">
                                        <a   data-toggle="modal" data-target="#photoid" data-whatever="<?php echo $compid; ?>" class="btn btn-circle btn-success"><i class="glyphicon glyphicon-thumbs-up"></i><small><b>Photo ID</b></small></a>
                                    </span>
    <?php } elseif ($photoid_status == 1) { ?>
                                    <span data-toggle="tooltip" title="Disapproved!">
                                        <a   data-toggle="modal" data-target="#photoid" data-whatever="<?php echo $compid; ?>" class="btn btn-circle btn-danger"><i class="fa fa-times"></i><small><b>Photo ID</b></small></a>
                                    </span>
                                <?php } ?>

    <?php if ($vat_cst_status == 5) { ?>

                                    <a   data-toggle="tooltip" title="Need to Upload!!" class="btn btn-circle btn-info"><i class="fa fa-thumbs-down"></i><small><b>VAT - CST</b></small></a>
    <?php } elseif ($vat_cst_status == 0) { ?>
                                    <span data-toggle="tooltip" title="waiting for approve!">
                                        <a  data-toggle="modal" data-target="#vat" data-whatever="<?php echo $compid; ?>"  class="btn btn-circle btn-warning"><i class="fa fa-exclamation"></i><small><b>VAT - CST</b></small></a>
                                    </span>
    <?php } elseif ($vat_cst_status == 2) { ?>
                                    <span data-toggle="tooltip" title="Approved!">
                                        <a   data-toggle="modal" data-target="#vat" data-whatever="<?php echo $compid; ?>"  class="btn btn-circle btn-success"><i class="glyphicon glyphicon-thumbs-up"></i><small><b>VAT - CST</b></small></a>
                                    </span>
    <?php } elseif ($vat_cst_status == 1) { ?>
                                    <span data-toggle="tooltip" title="Disapproved!">
                                        <a   data-toggle="modal" data-target="#vat" data-whatever="<?php echo $compid; ?>"  class="btn btn-circle btn-danger"><i class="fa fa-times"></i><small><b>VAT - CST</b></small></a>
                                    </span>
                                <?php } ?>

    <?php if ($cert_of_incorp_status == 5) { ?>
                                    <span data-toggle="tooltip" title="waiting for approve!">
                                        <a   data-toggle="tooltip" title="Need to Upload!!" class="btn btn-circle btn-info"><i class="fa fa-thumbs-down"></i><small><b>COI</b></small></a>
    <?php } elseif ($cert_of_incorp_status == 0) { ?>
                                        <span data-toggle="tooltip" title="waiting for approve!">
                                            <a   data-toggle="modal" data-target="#cert" data-whatever="<?php echo $compid; ?>" class="btn btn-circle btn-warning"><i class="fa fa-exclamation"></i><small><b>COI</b></small></a>
                                        </span>
    <?php } elseif ($cert_of_incorp_status == 2) { ?>
                                        <span data-toggle="tooltip" title="Approved!">
                                            <a   data-toggle="modal" data-target="#cert" data-whatever="<?php echo $compid; ?>" class="btn btn-circle btn-success"><i class="glyphicon glyphicon-thumbs-up"></i><small><b>COI</b></small></a>
                                        </span>
    <?php } elseif ($cert_of_incorp_status == 1) { ?>
                                        <span data-toggle="tooltip" title="Disapproved!">
                                            <a   data-toggle="modal" data-target="#cert" data-whatever="<?php echo $compid; ?>" class="btn btn-circle btn-danger"><i class="fa fa-times"></i><small><b>COI</b></small></a>
                                        </span>
                                    <?php } ?>
                                    <?php if ($moa_aoa_status == 5) { ?>
                                        <a   data-toggle="tooltip" title="Need to Upload!!" class="btn btn-circle btn-info"><i class="fa fa-thumbs-down"></i><small><b>MOA</b></small></a>
    <?php } elseif ($moa_aoa_status == 0) { ?>
                                        <span data-toggle="tooltip" title="waiting for approve!">
                                            <a   data-toggle="modal" data-target="#moa" data-whatever="<?php echo $compid; ?>" class="btn btn-circle btn-warning"><i class="fa fa-exclamation"></i><small><b>MOA</b></small></a>
                                        </span>
    <?php } elseif ($moa_aoa_status == 2) { ?>
                                        <span data-toggle="tooltip" title="Approved!">
                                            <a   data-toggle="modal" data-target="#moa" data-whatever="<?php echo $compid; ?>" class="btn btn-circle btn-success"><i class="glyphicon glyphicon-thumbs-up"></i><small><b>MOA</b></small></a>
                                        </span>
    <?php } elseif ($moa_aoa_status == 1) { ?>
                                        <span data-toggle="tooltip" title="Disapproved!">
                                            <a   data-toggle="modal" data-target="#moa" data-whatever="<?php echo $compid; ?>" class="btn btn-circle btn-danger"><i class="fa fa-times"></i><small><b>MOA</b></small></a>
                                        </span>
                                    <?php } ?>
                                    <?php if ($aoa_status == 5) { ?>
                                        <a   data-toggle="tooltip" title="Need to Upload!!" class="btn btn-circle btn-info"><i class="fa fa-thumbs-down"></i><small><b>AOA</b></small></a>
    <?php } elseif ($aoa_status == 0) { ?>
                                        <span data-toggle="tooltip" title="waiting for approve!">
                                            <a   data-toggle="modal" data-target="#aoa" data-whatever="<?php echo $compid; ?>" class="btn btn-circle btn-warning"><i class="fa fa-exclamation"></i><small><b>AOA</b></small></a>
                                        </span>
    <?php } elseif ($aoa_status == 2) { ?>
                                        <span data-toggle="tooltip" title="Approved!">
                                            <a  data-toggle="modal" data-target="#aoa" data-whatever="<?php echo $compid; ?>" class="btn btn-circle btn-success"><i class="glyphicon glyphicon-thumbs-up"></i><small><b>AOA</b></small></a>
                                        </span>
    <?php } elseif ($aoa_status == 1) { ?>
                                        <span data-toggle="tooltip" title="Disapproved!">
                                            <a   data-toggle="modal" data-target="#aoa" data-whatever="<?php echo $compid; ?>" class="btn btn-circle btn-danger"><i class="fa fa-times"></i><small><b>AOA</b></small></a>
                                        </span>

                                    <?php } ?>

    <?php if ($cenvat_status == 5) { ?>

                                        <a   data-toggle="tooltip" title="Need to Upload!!" class="btn btn-circle btn-info"><i class="fa fa-thumbs-down"></i><small><b>CENVAT</b></small></a>
    <?php } elseif ($cenvat_status == 0) { ?>
                                        <span data-toggle="tooltip" title="waiting for approve!">
                                            <a   data-toggle="modal" data-target="#cenvat" data-whatever="<?php echo $compid; ?>" class="btn btn-circle btn-warning"><i class="fa fa-exclamation"></i><small><b>CENVAT</b></small></a>
                                        </span>
    <?php } elseif ($cenvat_status == 2) { ?>
                                        <span data-toggle="tooltip" title="Approved!">
                                            <a   data-toggle="modal" data-target="#cenvat" data-whatever="<?php echo $compid; ?>" class="btn btn-circle btn-success"><i class="glyphicon glyphicon-thumbs-up"></i><small><b>CENVAT</b></small></a>
                                        </span>
    <?php } elseif ($cenvat_status == 1) { ?>
                                        <span data-toggle="tooltip" title="Disapproved!">
                                            <a   data-toggle="modal" data-target="#cenvat" data-whatever="<?php echo $compid; ?>" class="btn btn-circle btn-danger"><i class="fa fa-times"></i><small><b>CENVAT</b></small></a>
                                        </span>
                                    <?php } ?>

    <?php if ($servicetax_status == 5) { ?>

                                        <a   data-toggle="tooltip" title="Need to Upload!!" class="btn btn-circle btn-info"><i class="fa fa-thumbs-down"></i><small><b>Service Tax</b></small></a>
    <?php } elseif ($servicetax_status == 0) { ?>
                                        <span data-toggle="tooltip" title="waiting for approve!">
                                            <a   data-toggle="modal" data-target="#servicetax" data-whatever="<?php echo $compid; ?>" class="btn btn-circle btn-warning"><i class="fa fa-exclamation"></i><small><b>Service Tax</b></small></a>
                                        </span>
    <?php } elseif ($servicetax_status == 2) { ?>
                                        <span data-toggle="tooltip" title="Approved!">
                                            <a   data-toggle="modal" data-target="#servicetax" data-whatever="<?php echo $compid; ?>" class="btn btn-circle btn-success"><i class="glyphicon glyphicon-thumbs-up"></i><small><b>Service Tax</b></small></a>
                                        </span>
    <?php } elseif ($servicetax_status == 1) { ?>
                                        <span data-toggle="tooltip" title="Disapproved!">
                                            <a   data-toggle="modal" data-target="#servicetax" data-whatever="<?php echo $compid; ?>" class="btn btn-circle btn-danger"><i class="fa fa-times"></i><small><b>Service Tax</b></small></a>

                                        </span>
                                    <?php } ?>

    <?php if ($comp_file_status == 5) { ?>


                                        <a   data-toggle="tooltip" title="Need to Upload!!" class="btn btn-circle btn-info"><i class="fa fa-thumbs-down"></i><small><b>Company profile</b></small></a>
    <?php } elseif ($comp_file_status == 0) { ?>
                                        </br>

                                        <span data-toggle="tooltip" title="waiting for approve!">
                                            <a   data-toggle="modal" data-target="#comp_file" data-whatever="<?php echo $compid; ?>" class="btn btn-circle btn-warning"><i class="fa fa-exclamation"></i><small><b>Company profile</b></small></a>
                                        </span>
    <?php } elseif ($comp_file_status == 2) { ?>

                                        <span data-toggle="tooltip" title="Approved!">
                                            <a   data-toggle="modal" data-target="#comp_file" data-whatever="<?php echo $compid; ?>" class="btn btn-circle btn-success"><i class="glyphicon glyphicon-thumbs-up"></i><small><b>Company profile</b></small></a>
                                        </span>
    <?php } elseif ($comp_file_status == 1) { ?>

                                        <span data-toggle="tooltip" title="Disapproved!">
                                            <a   data-toggle="modal" data-target="#comp_file" data-whatever="<?php echo $compid; ?>" class="btn btn-circle btn-danger"><i class="fa fa-times"></i><small><b>Company profile</b></small></a>

                                        </span>

                                        <?php
                                    }
                                }
                                ?>

<!--                                    <p class="text-muted">For individuals</p>-->
                        </div>
                    </div>
                </div>
                <br></br>
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">

                            <header class="panel-heading">
                                <h4 class="font-thin padder"><span class="fa fa-money">&nbsp; <b>Bank Status</b></span></h4>
                            </header>

                            <?php
                            if ($firm_type == 'partnership') {
                                if ($status == 10) {
                                    ?>

                                    <a   data-toggle="tooltip" title="Need to Upload!!" class="btn btn-circle btn-info"><i class="fa fa-thumbs-down"></i><small><b>Bank status</b></small></a>
    <?php } elseif ($status == 0) { ?>

                                    <a   data-toggle="tooltip" title="Submitted!" class="btn btn-circle btn-primary"><i class="glyphicon glyphicon-thumbs-up"></i><small><b>Bank status</b></small></a>
    <?php } elseif ($status == 1) { ?>

                                    <a   data-toggle="tooltip" title="Dispatch!" class="btn btn-circle btn-info"><i class="glyphicon glyphicon-thumbs-up"></i><small><b>Bank status</b></small></a>
    <?php } elseif ($status == 2) { ?>

                                    <a   data-toggle="tooltip" title="Sent Bank Details!" class="btn btn-circle btn-success"><i class="glyphicon glyphicon-thumbs-up"></i><small><b>Bank status</b></small></a>
    <?php } elseif ($status == 3) { ?>

                                    <a   data-toggle="tooltip" title="Failed!" class="btn btn-circle btn-danger"><i class="fa fa-times"></i><small><b>Bank status</b></small></a>
    <?php } elseif ($status == 4) { ?>

                                    <a   data-toggle="tooltip" title="Success!" class="btn btn-circle btn-success"><i class="glyphicon glyphicon-thumbs-up"></i><small><b>Bank status</b></small></a>
    <?php } elseif ($status == 5) { ?>

                                    <a   data-toggle="tooltip" title="Wrong!" class="btn btn-circle btn-danger"><i class="fa fa-times"></i><small><b>Bank status</b></small></a>
                                <?php } ?>

    <?php if ($canceled_check_status == 5) { ?>

                                    <a   data-toggle="tooltip" title="Need to Upload!!" class="btn btn-circle btn-info"><i class="fa fa-thumbs-down"></i><small><b>Canceled check</b></small></a>
    <?php } elseif ($canceled_check_status == 0) { ?>
                                    <span data-toggle="tooltip" title="waiting for approve!">
                                        <a   data-toggle="modal" data-target="#canceled_check" data-whatever="<?php echo $compid; ?>" class="btn btn-circle btn-warning"><i class="fa fa-exclamation"></i><small><b>Canceled check</b></small></a>
                                    </span>
    <?php } elseif ($canceled_check_status == 2) { ?>
                                    <span data-toggle="tooltip" title="Approved!">
                                        <a   data-toggle="modal" data-target="#canceled_check" data-whatever="<?php echo $compid; ?>" class="btn btn-circle btn-success"><i class="glyphicon glyphicon-thumbs-up"></i><small><b>Canceled check</b></small></a>
                                    </span>
    <?php } elseif ($canceled_check_status == 1) { ?>
                                    <span data-toggle="tooltip" title="Disapproved!">
                                        <a   data-toggle="modal" data-target="#canceled_check" data-whatever="<?php echo $compid; ?>" class="btn btn-circle btn-danger"><i class="fa fa-times"></i><small><b>Canceled check</b></small></a>
                                    </span>
                                <?php
                                }
                            } elseif ($firm_type == 'pvt_or_ltd') {

                                if ($status == 10) {
                                    ?>

                                    <a   data-toggle="tooltip" title="Need to Upload!!" class="btn btn-circle btn-info"><i class="fa fa-thumbs-down"></i><small><b>Bank status</b></small></a>
    <?php } elseif ($status == 0) { ?>

                                    <a   data-toggle="tooltip" title="Submitted!" class="btn btn-circle btn-primary"><i class="glyphicon glyphicon-thumbs-up"></i><small><b>Bank status</b></small></a>

                                <?php } elseif ($status == 1) { ?>

                                    <a   data-toggle="tooltip" title="Dispatch!" class="btn btn-circle btn-info"><i class="glyphicon glyphicon-thumbs-up"></i><small><b>Bank status</b></small></a>
                                <?php } elseif ($status == 2) { ?>

                                    <a   data-toggle="tooltip" title="Sent Bank Details!" class="btn btn-circle btn-success"><i class="glyphicon glyphicon-thumbs-up"></i><small><b>Bank status</b></small></a>
                                <?php } elseif ($status == 3) { ?>

                                    <a   data-toggle="tooltip" title="Failed!" class="btn btn-circle btn-danger"><i class="fa fa-times"></i><small><b>Bank status</b></small></a>
                                <?php } elseif ($status == 4) { ?>

                                    <a   data-toggle="tooltip" title="Success!" class="btn btn-circle btn-success"><i class="glyphicon glyphicon-thumbs-up"></i><small><b>Bank status</b></small></a>
                                <?php } elseif ($status == 5) { ?>

                                    <a   data-toggle="tooltip" title="Wrong!" class="btn btn-circle btn-danger"><i class="fa fa-times"></i><small><b>Bank status</b></small></a>
                                <?php } ?>

                                <?php if ($canceled_check_status == 5) { ?>

                                    <a   data-toggle="tooltip" title="Need to Upload!!" class="btn btn-circle btn-info"><i class="fa fa-thumbs-down"></i><small><b>Canceled check</b></small></a>
    <?php } elseif ($canceled_check_status == 0) { ?>
                                    <span data-toggle="tooltip" title="waiting for approve!">
                                        <a   data-toggle="modal" data-target="#canceled_check" data-whatever="<?php echo $compid; ?>" class="btn btn-circle btn-warning"><i class="fa fa-exclamation"></i><small><b>Canceled check</b></small></a>
                                    </span>
    <?php } elseif ($canceled_check_status == 2) { ?>
                                    <span data-toggle="tooltip" title="Approved!">
                                        <a   data-toggle="modal" data-target="#canceled_check" data-whatever="<?php echo $compid; ?>" class="btn btn-circle btn-success"><i class="glyphicon glyphicon-thumbs-up"></i><small><b>Canceled check</b></small></a>
                                    </span>
    <?php } elseif ($canceled_check_status == 1) { ?>
                                    <span data-toggle="tooltip" title="Disapproved!">
                                        <a   data-toggle="modal" data-target="#canceled_check" data-whatever="<?php echo $compid; ?>" class="btn btn-circle btn-danger"><i class="fa fa-times"></i><small><b>Canceled check</b></small></a>
                                    </span>
                                <?php
                                }
                            } elseif ($firm_type == 'proprietorship') {
                                if ($status == 10) {
                                    ?>

                                    <a   data-toggle="tooltip" title="Need to Upload!!" class="btn btn-circle btn-info"><i class="fa fa-thumbs-down"></i><small><b>Bank status</b></small></a>
                                <?php } elseif ($status == 0) { ?>

                                    <a   data-toggle="tooltip" title="Submitted!" class="btn btn-circle btn-primary"><i class="glyphicon glyphicon-thumbs-up"></i> <small><b>Bank status</b></small></a>

                                <?php } elseif ($status == 1) { ?>

                                    <a   data-toggle="tooltip" title="Dispatch!" class="btn btn-circle btn-info"><i class="glyphicon glyphicon-thumbs-up"></i><small><b>Bank status</b></small></a>
                                <?php } elseif ($status == 2) { ?>

                                    <a   data-toggle="tooltip" title="Sent Bank Details!" class="btn btn-circle btn-success"><i class="glyphicon glyphicon-thumbs-up"></i><small><b>Bank status</b></small></a>
                                <?php } elseif ($status == 3) { ?>

                                    <a   data-toggle="tooltip" title="Failed!" class="btn btn-circle btn-danger"><i class="fa fa-times"></i><small><b>Bank status</b></small></a>
                                <?php } elseif ($status == 4) { ?>

                                    <a   data-toggle="tooltip" title="Success!" class="btn btn-circle btn-success"><i class="glyphicon glyphicon-thumbs-up"></i><small><b>Bank status</b></small></a>
                                <?php } elseif ($status == 5) { ?>

                                    <a   data-toggle="tooltip" title="Wrong!" class="btn btn-circle btn-danger"><i class="fa fa-times"></i><small><b>Bank status</b></small></a>
    <?php } ?>

                                <?php if ($canceled_check_status == 5) { ?>

                                    <a   data-toggle="tooltip" title="Need to Upload!!" class="btn btn-circle btn-info"><i class="fa fa-thumbs-down"></i><small><b>Canceled check</b></small></a>
                                <?php } elseif ($canceled_check_status == 0) { ?>
                                    <span data-toggle="tooltip" title="waiting for approve!">
                                        <a   data-toggle="modal" data-target="#canceled_check" data-whatever="<?php echo $compid; ?>" class="btn btn-circle btn-warning"><i class="fa fa-exclamation"></i><small><b>Canceled check</b></small></a>
                                    </span>
                                <?php } elseif ($canceled_check_status == 2) { ?>
                                    <span data-toggle="tooltip" title="Approved!">
                                        <a   data-toggle="modal" data-target="#canceled_check" data-whatever="<?php echo $compid; ?>" class="btn btn-circle btn-success"><i class="glyphicon glyphicon-thumbs-up"></i><small><b>Canceled check</b></small></a>
                                    </span>
                                <?php } elseif ($canceled_check_status == 1) { ?>
                                    <span data-toggle="tooltip" title="Disapproved!">
                                        <a   data-toggle="modal" data-target="#canceled_check" data-whatever="<?php echo $compid; ?>" class="btn btn-circle btn-danger"><i class="fa fa-times"></i><small><b>Canceled check</b></small></a>
                                    </span>
    <?php
    }
}
?>

                        </div>


                    </div>
                </div>



            </div>
        </div>



    </div>




    <!-- WIDGETS -->

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
    <audio id="audio-alert" src="audio/alert.mp3" preload="auto"></audio>
    <audio id="audio-fail" src="audio/fail.mp3" preload="auto"></audio>
    <!-- END PRELOADS -->

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
    <script>
            $('#pan_prop').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget); // Button that triggered the modal
                var recipient = button.data('whatever'); // Extract info from data-* attributes
                var modal = $(this);
                var dataString = 'id=' + recipient;

                $.ajax({
                    type: "GET",
                    url: "/admin/document_preview_pan/",
                    data: dataString,
                    cache: false,
                    success: function (data) {
                        console.log(data);
                        modal.find('.ct').html(data);
                    },
                    error: function (err) {
                        console.log(err);
                    }
                });
            })
            $('#vat').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget); // Button that triggered the modal
                var recipient = button.data('whatever'); // Extract info from data-* attributes
                var modal = $(this);
                var dataString = 'id=' + recipient;

                $.ajax({
                    type: "GET",
                    url: "/admin/document_preview_vat/",
                    data: dataString,
                    cache: false,
                    success: function (data) {
                        console.log(data);
                        modal.find('.ct').html(data);
                    },
                    error: function (err) {
                        console.log(err);
                    }
                });
            })

            $('#cst').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget); // Button that triggered the modal
                var recipient = button.data('whatever'); // Extract info from data-* attributes
                var modal = $(this);
                var dataString = 'id=' + recipient;

                $.ajax({
                    type: "GET",
                    url: "/admin/document_preview_cst/",
                    data: dataString,
                    cache: false,
                    success: function (data) {
                        console.log(data);
                        modal.find('.ct').html(data);
                    },
                    error: function (err) {
                        console.log(err);
                    }
                });
            })

            $('#aoa').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget); // Button that triggered the modal
                var recipient = button.data('whatever'); // Extract info from data-* attributes
                var modal = $(this);
                var dataString = 'id=' + recipient;

                $.ajax({
                    type: "GET",
                    url: "/admin/document_preview_aoa/",
                    data: dataString,
                    cache: false,
                    success: function (data) {
                        console.log(data);
                        modal.find('.ct').html(data);
                    },
                    error: function (err) {
                        console.log(err);
                    }
                });
            })

            $('#shop_establish_trade').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget); // Button that triggered the modal
                var recipient = button.data('whatever'); // Extract info from data-* attributes
                var modal = $(this);
                var dataString = 'id=' + recipient;

                $.ajax({
                    type: "GET",
                    url: "/admin/document_preview_shop_establish_trade/",
                    data: dataString,
                    cache: false,
                    success: function (data) {
                        console.log(data);
                        modal.find('.ct').html(data);
                    },
                    error: function (err) {
                        console.log(err);
                    }
                });
            })

            $('#addressid').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget); // Button that triggered the modal
                var recipient = button.data('whatever'); // Extract info from data-* attributes
                var modal = $(this);
                var dataString = 'id=' + recipient;

                $.ajax({
                    type: "GET",
                    url: "/admin/document_preview_addressid/",
                    data: dataString,
                    cache: false,
                    success: function (data) {
                        console.log(data);
                        modal.find('.ct').html(data);
                    },
                    error: function (err) {
                        console.log(err);
                    }
                });
            })
            $('#businessid').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget); // Button that triggered the modal
                var recipient = button.data('whatever'); // Extract info from data-* attributes
                var modal = $(this);
                var dataString = 'id=' + recipient;

                $.ajax({
                    type: "GET",
                    url: "/admin/document_preview_businessid/",
                    data: dataString,
                    cache: false,
                    success: function (data) {
                        console.log(data);
                        modal.find('.ct').html(data);
                    },
                    error: function (err) {
                        console.log(err);
                    }
                });
            })
            $('#cenvat').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget); // Button that triggered the modal
                var recipient = button.data('whatever'); // Extract info from data-* attributes
                var modal = $(this);
                var dataString = 'id=' + recipient;

                $.ajax({
                    type: "GET",
                    url: "/admin/document_preview_cenvat/",
                    data: dataString,
                    cache: false,
                    success: function (data) {
                        console.log(data);
                        modal.find('.ct').html(data);
                    },
                    error: function (err) {
                        console.log(err);
                    }
                });
            })
            $('#servicetax').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget); // Button that triggered the modal
                var recipient = button.data('whatever'); // Extract info from data-* attributes
                var modal = $(this);
                var dataString = 'id=' + recipient;

                $.ajax({
                    type: "GET",
                    url: "/admin/document_preview_servicetax/",
                    data: dataString,
                    cache: false,
                    success: function (data) {
                        console.log(data);
                        modal.find('.ct').html(data);
                    },
                    error: function (err) {
                        console.log(err);
                    }
                });
            })
            $('#comp').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget); // Button that triggered the modal
                var recipient = button.data('whatever'); // Extract info from data-* attributes
                var modal = $(this);
                var dataString = 'id=' + recipient;

                $.ajax({
                    type: "GET",
                    url: "/admin/document_preview_pan_comp/",
                    data: dataString,
                    cache: false,
                    success: function (data) {
                        console.log(data);
                        modal.find('.ct').html(data);
                    },
                    error: function (err) {
                        console.log(err);
                    }
                });
            })
            $('#photoid').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget); // Button that triggered the modal
                var recipient = button.data('whatever'); // Extract info from data-* attributes
                var modal = $(this);
                var dataString = 'id=' + recipient;

                $.ajax({
                    type: "GET",
                    url: "/admin/document_preview_photoid/",
                    data: dataString,
                    cache: false,
                    success: function (data) {
                        console.log(data);
                        modal.find('.ct').html(data);
                    },
                    error: function (err) {
                        console.log(err);
                    }
                });
            })
            $('#deep').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget); // Button that triggered the modal
                var recipient = button.data('whatever'); // Extract info from data-* attributes
                var modal = $(this);
                var dataString = 'id=' + recipient;

                $.ajax({
                    type: "GET",
                    url: "/admin/document_preview_part_deed/",
                    data: dataString,
                    cache: false,
                    success: function (data) {
                        console.log(data);
                        modal.find('.ct').html(data);
                    },
                    error: function (err) {
                        console.log(err);
                    }
                });
            })
            $('#sign').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget); // Button that triggered the modal
                var recipient = button.data('whatever'); // Extract info from data-* attributes
                var modal = $(this);
                var dataString = 'id=' + recipient;

                $.ajax({
                    type: "GET",
                    url: "/admin/document_preview_sign/",
                    data: dataString,
                    cache: false,
                    success: function (data) {
                        console.log(data);
                        modal.find('.ct').html(data);
                    },
                    error: function (err) {
                        console.log(err);
                    }
                });
            })
            $('#moa').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget); // Button that triggered the modal
                var recipient = button.data('whatever'); // Extract info from data-* attributes
                var modal = $(this);
                var dataString = 'id=' + recipient;

                $.ajax({
                    type: "GET",
                    url: "/admin/document_preview_moa_aoa/",
                    data: dataString,
                    cache: false,
                    success: function (data) {
                        console.log(data);
                        modal.find('.ct').html(data);
                    },
                    error: function (err) {
                        console.log(err);
                    }
                });
            })
            $('#cert').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget); // Button that triggered the modal
                var recipient = button.data('whatever'); // Extract info from data-* attributes
                var modal = $(this);
                var dataString = 'id=' + recipient;

                $.ajax({
                    type: "GET",
                    url: "/admin/document_preview_cert_of_incorp/",
                    data: dataString,
                    cache: false,
                    success: function (data) {
                        console.log(data);
                        modal.find('.ct').html(data);
                    },
                    error: function (err) {
                        console.log(err);
                    }
                });
            })
            $('#canceled_check').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget); // Button that triggered the modal
                var recipient = button.data('whatever'); // Extract info from data-* attributes
                var modal = $(this);
                var dataString = 'id=' + recipient;

                $.ajax({
                    type: "GET",
                    url: "/admin/document_preview_canceled_check/",
                    data: dataString,
                    cache: false,
                    success: function (data) {
                        console.log(data);
                        modal.find('.ct').html(data);
                    },
                    error: function (err) {
                        console.log(err);
                    }
                });
            })
    </script>
</body>
</html>






