<?php
if ($logged_in) {
    $email = $this->session->userdata('email');
    $admin_type = $this->session->userdata('admin_type');
    $name = $this->session->userdata('name');

    if ($admin_type == "document_verifier") {

        $role = "Documents Verifier";
    } elseif ($admin_type == "bank_verifier") {

        $role = "Assistant Bank Admin";
    } elseif ($admin_type == "bank_verifier2") {

        $role = "Bank Admin";
    }
} else {

}
?><!DOCTYPE html>
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

    </head>
     <body class="page-container-boxed">
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

        <div id="comp_file" class="modal fade" role="dialog" tabindex="-1" aria-hidden="true" aria-labelledby="memberModalLabel">
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
                                <div class="profile-data-name"><?php echo $name; ?></div>
                                <div class="profile-data-title"><?php echo $role; ?></div>
                            </div>

                        </div>
                    </li>

                    <li class="active">
                        <a href="/verification"><span class="fa fa-desktop"></span> <span class="xn-text">Dashboard</span></a>
                    </li>
<?php if ($admin_type == "document_verifier") { ?>

                        <li class="active">
                            <a href="/admin/vendor_details"><span class="fa fa-desktop"></span> <span class="xn-text">Pending Vendors</span></a>
                        </li>
                        <li class="active">
                            <a href="/admin/vendor_profile"><span class="fa fa-desktop"></span> <span class="xn-text">Vendors Profiles</span></a>
                        </li>
<?php } ?>




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