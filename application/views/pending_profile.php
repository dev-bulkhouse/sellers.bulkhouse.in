<!DOCTYPE html>
<?php

    $compid = $this->session->userdata('id');
    $email = $this->session->userdata('email');
    $vendor_name = $this->session->userdata('vendor_name');
    $firm_name = $this->session->userdata('firm_name');
    $firm_type = $this->session->userdata('firm_type');
    $show['compid'] = $compid;
    $show['email'] = $email;
    $show['vendor_name'] = $vendor_name;
    $show['firm_name'] = $firm_name;
    $show['firm_type'] = $firm_type;

?>
<html lang="en" ng-app="myApp">
    <head>
        <!-- META SECTION -->
        <title>Pending | Vendor profile</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <script src="/js/countries.js" type="text/javascript"></script>
        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.4.3/angular.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.4.3/angular-animate.js"></script>
        <!-- END META SECTION -->

        <!-- CSS INCLUDE -->
        <link rel="stylesheet" type="text/css" id="theme" href="/css/theme-default.css"/>
        <!-- EOF CSS INCLUDE -->
        <style>
            input[type=number]::-webkit-inner-spin-button,
            input[type=number]::-webkit-outer-spin-button {
                -webkit-appearance: none;
                margin: 0;
            }
            .bg-primary {
                background-color: #F5F5F5;
                color: #010101;
            }
            .bg-primary .nav li a {
                color: #010101;
            }
            .bg-primary .nav li a:hover {
                color: #010101;
            }

            .bs-wizard {margin-top: 40px;}

        </style>
        <script src="http://code.jquery.com/jquery-1.9.1.js"></script>

    </head>
    <body class="page-container-boxed">
        <!-- START PAGE CONTAINER -->
        <div class="container">
            <div class="page-content-wrap">

                <div class="row">
                    <div class="col-lg-8 centered col-lg-offset-2">


                        <div class="panel panel-default">
                             <div class="panel">
                        <div class="mb-container">

                             <div class="col-lg-6">
                                <img src="/img/bulkhouse_logo_white-01.png" alt="" width="230"/>
                        </div>
                            <div class="col-lg-6"></div>

            <div class="row" style="border-bottom:0;">

                <img src="/img/step1.jpg" alt="" width="100%"/>
                </div>

</div>
                                </div>
                            <div class="panel-heading">
                                <h3 class="panel-title">Update <strong>Profile Details</strong> </h3>
                                <button type="button" class="btn btn-primary mb-control pull-right" data-box="#message-box-info"><span class="glyphicon glyphicon-log-out"></span> Log out</button>
                            </div>
                            <div class="message-box message-box-info animated fadeIn" id="message-box-info">
                                <div class="mb-container">
                                    <div class="mb-middle">
                                        <div class="mb-title"><span class="fa fa-info"></span> Information</div>
                                        <div class="mb-content">
                                            <p>You Should Submit Profile Form, Bank Details and Preferred Documents then you can access your Account Thank you! </p>
                                        </div>
                                        <div class="mb-footer">

                                            <a href="<?php echo site_url(); ?>user/logout" class="btn btn-default btn-lg pull-right">Logout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                             <div class="col-lg-12">

                            <div class="block">

                                <div class="page-title">
                                    <h3><span class="fa fa-building-o"></span> Company Details</h3>
                                </div>
                            </div>
                            <form class="form-horizontal" action="<?php echo base_url(); ?>view/pending_vendor" method="post">


                                <div class="panel-body">

                                    <div class="row">

                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <label class="col-md-5 control-label">Year of established</label>
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                        <input type="number" name ="year_establishment" class="form-control" pattern="[0-9]*" required="required" maxlength="4"/>
                                                    </div>
                                                    <span class="help-block">Company established on </span>
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label class="col-md-5 control-label">Turnover</label>
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="fa fa-inr"></span></span>
                                                        <input type="number" pattern="[0-9]*" name ="comp_turnover" class="form-control"/>
                                                    </div>
                                                    <span class="help-block">Company Turnover in Lacks</span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-5 control-label">Registration Category</label>
                                                <div class="col-md-6">
                                                    <select  name="reg_category" class="form-control select" required="required">
                                                        <option value="">Select Category</option>
                                                        <option value="Stockist/Distributor">Stockist / Distributor</option>
                                                        <option  value="MSME/SSI">MSME / SSI </option>
                                                        <option  value="Exporter">Exporter </option>
                                                        <option  value="OriginalManufacturer">Original Manufacturer</option>
                                                        <option  value="Distributor/Agency">Distributor / Agency</option>
                                                        <option  value="Others">Others</option>
                                                    </select>
                                                    </select>
                                                    <span class="help-block">Company Registration Category</span>
                                                </div>
                                            </div>



                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-md-5 control-label">No. of employee's</label>
                                                <div class="col-md-6">
                                                    <select name="no_employees" class="form-control select" required="required">
                                                        <option value="">Select employee's</option>
                                                        <option  value="1 to 25">1 to 25</option>
                                                        <option  value="25 to 50">25 to 50</option>
                                                        <option  value="50 to 100">50 to 100</option>
                                                        <option  value="Above 100">Above 100</option>
                                                    </select>
                                                    <span class="help-block">Select Number of Employees's</span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label  class="col-md-5 control-label">Quality Certification</label>
                                                <div class="col-md-6">
                                                    <select name="cert_products" class="form-control select">
                                                        <option value="">Select Certification</option>
                                                        <option value="ISI/BIS">ISI / BIS</option>
                                                        <option value="ISO">ISO </option>
                                                    </select>
                                                    <span class="help-block">Company Quality Certification </span>
                                                </div>
                                            </div>



                                        </div>

                                    </div>

                                </div>

                                <div class="col-md-12" style="margin-bottom: 30px;">
                                    <div class="row">
                                        <div class="col-md-6" style="border-right: solid darkgray thin">

                                            <!-- START VALIDATIONENGINE PLUGIN -->
                                            <div class="block">
                                                <div class="page-title">
                                                    <h3><span class="fa fa-building-o"></span> Contact Details</h3>
                                                </div>
                                                <div class="panel-body">
                                                    <form id="validate" role="form" class="form-horizontal" action="javascript:alert('Form #validate submited');">
                                                        <div class="form-group">
                                                            <label class="col-md-5 control-label">Office Land line:</label>
                                                            <div class="col-md-7">
                                                                <input type="text" class="form-control"  name ="land_line"/>
                                                                <span class="help-block">Required, max size = 8</span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-5 control-label">Address 1:</label>
                                                            <div class="col-md-7">
                                                                <textarea type="text" class="validate[required,min[18],max[120]] form-control" name ="address1" required></textarea>
                                                                <span class="help-block">Required, min size = 5, max size = 10</span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-5 control-label">Address 2:</label>
                                                            <div class="col-md-7">
                                                                <textarea type="text" class="form-control" name ="address2" ></textarea>
                                                                <span class="help-block">Required, min size = 5, max size = 10</span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-5 control-label">Country:</label>
                                                            <div class="col-md-7">
                                                                <select name="country" id="country" class="form-control select" value="<?php
                                                                echo $row->state;
                                                                ?>" required="required"></select>
                                                                <span class="help-block">Select Country</span>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-md-5 control-label">State:</label>
                                                            <div class="col-md-7">
                                                                <select name="state" id="state" class="form-control" value="<?php
                                                                echo $row->state;
                                                                ?>" required="required"></select>
                                                                <span class="help-block">Required</span>
                                                            </div>
                                                            <script language="javascript">
                                                                populateCountries("country", "state");

                                                            </script>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-5 control-label">City:</label>
                                                            <div class="col-md-7">
                                                                <input type="text" class="form-control" name ="city" required/>
                                                                <span class="help-block">Required</span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-5 control-label">Pin code:</label>
                                                            <div class="col-md-7">
                                                                <input type="number" class="form-control" name ="pin_code" pattern="[0-9]*" required/>
                                                                <span class="help-block">Required,max size = 10</span>
                                                            </div>
                                                        </div>


                                                        <div class="form-group">
                                                            <label class="col-md-5 control-label">WebSite:</label>
                                                            <div class="col-md-7">
                                                                <input type="text" name="website" value="http://" class="form-control" required/>
                                                                <span class="help-block">Required, url</span>
                                                            </div>
                                                        </div>
                                                        <div class="page-title">
                                                            <h3><span class="fa fa-phone"></span> Addtional Contact Details</h3>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-5 control-label">Contact Person:</label>
                                                            <div class="col-md-7">
                                                                <input type="text" placeholder="Contact Person"
                                                                       name="contact_name" class="bg-focus form-control">
                                                                <div class="line line-dashed m-t-lg"></div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-5 control-label">Email:</label>
                                                            <div class="col-md-7">

                                                                <input type="email"  placeholder="Contact Email" class="bg-focus form-control">
                                                                <div class="line line-dashed m-t-lg"></div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">

                                                            <label class="col-md-5 control-label">Mobile Number:</label>
                                                            <div class="col-md-7">
                                                                <input type="number"  placeholder="Mobile Number" pattern="[789][0-9]{9}" name ="mobile_contact" class="bg-focus form-control" maxlength="11">
                                                                <div class="line line-dashed m-t-lg"></div>
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                            <!-- END VALIDATIONENGINE PLUGIN -->

                                        </div>

                                        <div class="col-md-6" >

                                            <!-- START JQUERY VALIDATION PLUGIN -->
                                            <div class="block">
                                                <div class="page-title">
                                                    <h3><span class="fa fa-truck"></span> Dispatch Contact Details</h3>
                                                </div>

                                                <div class="panel-body">
                                                    <div class="form-group">
                                                        <label class="col-md-5 control-label">Contact Person:</label>
                                                        <div class="col-md-7">
                                                            <input type="text" class="form-control" name="login" name ="dispat_person" required/>
                                                            <span class="help-block">Required</span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-5 control-label">E-mail:</label>
                                                        <div class="col-md-7">
                                                            <input type="email" value="" name="email" name="dispat_email" class="form-control" required/>
                                                            <span class="help-block">required email</span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-5 control-label">Mobile Number::</label>
                                                        <div class="col-md-7">
                                                            <input type="number" class="form-control" name ="dispat_mobile" pattern="[789][0-9]{9}"/>
                                                            <span class="help-block">min size = 18, max size = 100</span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-5 control-label">Office Land Line:</label>
                                                        <div class="col-md-7">
                                                            <input type="number" class="form-control" name ="dispat_land" pattern="[0-9]*"/>
                                                            <span class="help-block">min size = 18, max size = 100</span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-5 control-label">Address 1:</label>
                                                        <div class="col-md-7">
                                                            <textarea type="text" class="validate[required,min[18],max[120]] form-control" name ="dispat_address1" required></textarea>
                                                            <span class="help-block">Required, min size = 15, max size = 20</span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-5 control-label">Address 2:</label>
                                                        <div class="col-md-7">
                                                            <textarea type="text" class="form-control" name ="dispat_address2" ></textarea>
                                                            <span class="help-block">If Required</span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-5 control-label">City:</label>
                                                        <div class="col-md-7">
                                                            <input type="text" class="form-control" name ="dispat_city" required/>
                                                            <span class="help-block">Required</span>
                                                        </div>
                                                    </div>


                                                </div>

                                                <!-- END JQUERY VALIDATION PLUGIN -->
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <div class="panel-footer">

                                    <button class="btn btn-primary pull-right" type="submit">Submit</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


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

        <script type='text/javascript' src='/js/plugins/bootstrap/bootstrap-datepicker.js'></script>
        <script type='text/javascript' src='/js/plugins/bootstrap/bootstrap-select.js'></script>

        <script type='text/javascript' src='/js/plugins/validationengine/languages/jquery.validationEngine-en.js'></script>
        <script type='text/javascript' src='/js/plugins/validationengine/jquery.validationEngine.js'></script>

        <script type='text/javascript' src='/js/plugins/jquery-validation/jquery.validate.js'></script>

        <script type='text/javascript' src='/js/plugins/maskedinput/jquery.maskedinput.min.js'></script>
        <!-- END THIS PAGE PLUGINS -->

        <!-- START TEMPLATE -->
        <script type="text/javascript" src="js/settings.js"></script>

        <script type="text/javascript" src="/js/plugins.js"></script>
        <script type="text/javascript" src="/js/actions.js"></script>
        <!-- END TEMPLATE -->

        <script type="text/javascript">
                                               var jvalidate = $("#jvalidate").validate({
                                                   ignore: [],
                                                   rules: {
                                                       email: {
                                                           required: true,
                                                           email: true
                                                       },
                                                   }
                                               });

        </script>

        <!-- END SCRIPTS -->

    </body>
</html>






