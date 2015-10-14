<!DOCTYPE html>
<?php
if ($logged_in) {
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
} else {

}
?>
<html lang="en" ng-app="myApp">
    <head>
        <!-- META SECTION -->
        <title>Pending | Vendor Banking</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <script src="/js/countries.js" type="text/javascript"></script>
        <link rel="icon" href="favicon.ico" type="image/x-icon" />

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
        </style>

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
                                <img src="/img/logo_small.png" alt="" width="230"/>
                        </div>
                            <div class="col-lg-6"></div>
            <div class="row" style="border-bottom:0;">

                <img src="/img/step2.jpg" alt="" width="100%"/>

                </div>


</div>
                                </div>
                            <div class="panel-heading">
                                <h3 class="panel-title"><span class="fa fa-building-o"></span> Update <strong>Bank Details</strong> </h3>
                                <button type="button" class="btn btn-primary mb-control pull-right" data-box="#message-box-info"><span class="glyphicon glyphicon-log-out"></span> Log out</button>
                            </div>
                            <div class="message-box message-box-info animated fadeIn" id="message-box-info">
                                <div class="mb-container">
                                    <div class="mb-middle">
                                        <div class="mb-title"><span class="fa fa-info"></span> Information</div>
                                        <div class="mb-content">
                                            <p>You Should Submit Bank Details and Preferred Documents then you can access your Account Thank you! </p>
                                        </div>
                                        <div class="mb-footer">

                                            <a href="<?php echo site_url(); ?>user/logout" class="btn btn-default btn-lg pull-right btn-sm"><i class="fa fa-sign-out"></i> Logout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="block">
                                <div class="page-title">
                                    <h3><span class="fa fa-money"></span> Bank Details</h3>
                                </div>
                            </div>
                            <form class="form-horizontal" action="<?php echo base_url(); ?>upload_new/update_banking" method="post">
                                <div class="panel-body">

                                    <div class="row ">

                                        <div class="col-md-12">

                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Bank Account Name</label>
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                          <input type="hidden" name="email" id="email" value="<?php echo  $email; ?>">
                                                        <input type="text" name ="account_name" class="form-control" required="required"/>
                                                    </div>
                                                     <span class="help-block">Enter Account Name</span>
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Bank Account Number</label>
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                        <input type="number" pattern="[0-9]*" name ="account_number" class="form-control" required="required"/>
                                                    </div>
                                                    <span class="help-block">Enter Account Number</span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Name of the Bank</label>
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                        <input type="text" name ="bank_name" class="form-control" required="required"/>
                                                    </div>
                                                    <span class="help-block">Enter Name of the bank</span>
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Branch Name</label>
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                        <input type="text" name ="branch" class="form-control" required="required"/>
                                                    </div>
                                                    <span class="help-block">Branch Name of your bank</span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">IFSC Code</label>
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                        <input type="text" name ="ifsc" class="form-control" required="required"/>
                                                    </div>
                                                    <span class="help-block">Enter Bank IFSC Code</span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label">MICR Code</label>
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                        <input type="text" name ="micr" class="form-control" required="required"/>
                                                    </div>
                                                    <span class="help-block">Enter Bank MICR Code</span>
                                                </div>
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
        <script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/56162b9712c288fc1fd7852f/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
        <!-- END SCRIPTS -->

    </body>
</html>






