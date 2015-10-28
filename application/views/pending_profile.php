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
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <script src="/js/countries.js" type="text/javascript"></script>
    <link rel="icon" href="favicon.ico" type="image/x-icon"/>
    <link rel="stylesheet" href="/css/app.v1.css">
    <link rel="stylesheet" href="/css/font.css" cache="false">


    <script src="/js/modernizr.custom.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.4.3/angular.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.4.3/angular-animate.js"></script>
    <!-- END META SECTION -->

    <!-- CSS INCLUDE -->
    <link rel="stylesheet" type="text/css" id="theme" href="/css/theme-default.css"/>
    <!-- EOF CSS INCLUDE -->
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <style>
        .m-b-sm {
            margin-bottom: 0px;
        }

        .form-group .required .control-label:after {
            content: "*";
            color: red;
        }

        .bg-primary {
            background-color: #18659B;
            color: #fff;
        }

        .bg-primary .nav li a {
            color: #fff;
        }

        .panel-heading {

            background-color: whitesmoke;
            padding: 7px 15px;
        }
    </style>

    <script type="text/javascript">
        var attempt = 1;
        var SID = "";

        $(document).ready(function () {
            $("#enter_number").submit(function (e) {

                e.preventDefault();
                initiateDial2Verify();
            });
        });

        function initiateDial2Verify() {
            showCodeForm(1);
            GetVerificationImage();
        }

        function showCodeForm(code) {
            $("#dial2verify").fadeIn();
            $("#enter_number").fadeOut();
            $("#waiting_msg").text("Call to the below numnber");
        }

        function GetVerificationImage() {

            $.post("<?php echo site_url(); ?>dail2verify/GetImageAPIV2.php", {phone_number: $("#phone_number").val()},
                function (data) {
                    updateImage(data.ImageUrl, data.SessionId);
                }, "json");

        }


        function updateImage(ImageURL, vSID) {

            if (ImageURL === "Err" || ImageURL === "") {
                Err();
            }
            else {
                $("#Image").html("Dail 18001234547 to verify (Toll Free)");
                SID = vSID;
                PollStart("UnVerified");
            }
        }

        function CheckStatus() {

            $.post("<?php echo site_url(); ?>dail2verify/VerificationStatusAPIV2.php", {SID: SID},
                function (data) {
                    PollStart(data.VerificationStatus);
                }, "json");
        }


        function PollStart(vStatus) {

            attempt = attempt + 1;
            if (attempt >= 90) {
                TimeoutCheck();
            }
            else if (vStatus === "UnVerified") {
                $("#status").html("<b><i>" + (90 - attempt) + "</i> secs.</b>");
                setTimeout(CheckStatus, 1000);
            }
            else if (vStatus === "VERIFIED") {
                success();
                <?php
                $details2 = $this->register_model->viewdata($compid);
                foreach ($details2 as $row) {
                    ?>
                compid = <?php echo $compid; ?>;
                mobile = <?php echo $row->mobile; ?>;
                $.ajax({
                    url: "<?php echo site_url(); ?>change/mobile_verified/" + compid + '/' + mobile,
                    type: "POST"

                });
                <?php } ?>
            }
            else
                TimeoutCheck();

        }


        function Err() {
            $("#status").html("Error!<br>Sorry something went wrong, Please cross check your telephone number.");
        }

        function success() {
            $("#status2").fadeIn();
            $("#status").fadeOut();
            $("#Image").fadeOut();
            $("#verified").fadeIn();


        }

        function TimeoutCheck() {
            $("#status").text(" Failed!");
        }

    </script>
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
            <img src="/img/logo_small.png" alt="" width="100"/>
        </div>
        <div class="col-lg-6"></div>

        <div class="row" style="border-bottom:0;">

            <img src="/img/step1.jpg" alt="" width="100%"/>
        </div>

    </div>
</div>
<div class="panel-heading">
    <h3 class="panel-title">Update <strong>Profile Details</strong></h3>

    <button type="button" class="btn btn-primary mb-control pull-right" data-box="#message-box-info"><span
            class="glyphicon glyphicon-log-out"></span> Log out
    </button>
</div>
<div class="message-box message-box-info animated fadeIn" id="message-box-info">
    <div class="mb-container">
        <div class="mb-middle">
            <div class="mb-title"><span class="fa fa-info"></span> Information</div>
            <div class="mb-content">
                <p>You Should Submit Profile Form, Bank Details and Preferred Documents then you can access your Account
                    Thank you! </p>
            </div>
            <div class="mb-footer">

                <a href="<?php echo site_url(); ?>user/logout" class="btn btn-default btn-lg pull-right btn-sm"><i
                        class="fa fa-sign-out"></i> Logout</a>
            </div>
        </div>
    </div>
</div>

<div class="col-lg-12">
<section class="scrollable wrapper" id="wizard">
<div class='notifications top-left'><?php $this->load->view('alert/success-message'); ?></div>


<div class="col-md-12">
<div class="block">
    <div class="page-title">
        <h3><span class="fa fa-building-o"></span> Vendor Details</h3>
    </div>


    <div class="col-md-6">
        <label class="control-label">Email: <i class='fa fa-check'> verified</i></label>
        <input type="email" placeholder="Contact Email" value="<?php
        $details1 = $this->register_model->viewdata($compid);
        foreach ($details1 as $row) {
        echo $row->email;
        ?>" name="email" class="bg-focus form-control" disabled="disabled">

        <div class="line line-dashed m-t-lg"></div>
    </div>

    <div class="col-md-6">
        <?php
        $mobile_verification = $this->vendor_update->mobile_number($compid);
        $verified_mobile = $this->vendor_update->latest_number($compid);
        if ($mobile_verification != $verified_mobile) {
            ?>
            <div class="col-md-6">
                <label class="control-label">Mobile Number: <i class="fa fa-check" id="status2" style="display: none">
                        verified</i>
                    <?php if ($mobile_verification == $verified_mobile) { ?>
                        <i class="fa fa-check"> verified</i>
                    <?php
                    }
                    ?>
                </label>
                <input value="<?php
                echo $row->mobile;
                ?>" name="phone_number" id="phone_number" class="bg-focus form-control" disabled="disabled">


                <div class="line line-dashed m-t-lg"></div>
            </div>

        <?php
        }
        }
        ?>

    </div>


</div>


<form action="<?php echo base_url(); ?>view/pending_vendor" method="post">
<div class="block">
    <div class="page-title">
        <h3><span class="fa fa-phone"></span> Additional Details</h3>
    </div>


    <div class="form-group required">


        <div class="form-group required">
            <div class="col-sm-4" ng-show="showme">
                <label>Contact Person:</label>
                <input placeholder="Contact Person" value="<?php
                echo $row->contact_name;
                ?>" name="contact_name" class="bg-focus form-control">

                <div class="line line-dashed m-t-lg"></div>
            </div>

            <div class="col-sm-4" ng-show="showme">
                <label>Email:</label>
                <input type="email" placeholder="Contact Email" value="<?php
                echo $row->email_contact;
                ?>" name="email_contact" class="bg-focus form-control">

                <div class="line line-dashed m-t-lg"></div>
            </div>

            <div class="col-sm-3" ng-show="showme">
                <label>Mobile Number:</label>
                <input type="number" placeholder="Mobile Number" pattern="[789][0-9]{9}" value="<?php
                echo $row->mobile_contact;
                ?>" name="mobile_contact" class="bg-focus form-control" maxlength="11">

                <div class="line line-dashed m-t-lg"></div>
            </div>
        </div>
    </div>
</div>
<div class="block">

    <div class="page-title">
        <h3><span class="fa fa-building-o"></span> Company Details</h3>
    </div>

    <div class="form-group required">


        <div class="form-group required">
            <div class="col-sm-3">
                <label class="control-label">Year of Established:</label>
                <input type="number" placeholder="Year of Established" value="<?php
                echo $row->year_establishment;
                ?>" name="year_establishment" class="bg-focus form-control" pattern="[0-9]*" required="required"
                       maxlength="4">

                <div class="line line-dashed m-t-lg"></div>
            </div>

            <div class="col-sm-3">
                <label class="control-label">No of Employees:</label>
                <select name="no_employees" class="form-control parsley-validated parsley-success" required="required">
                    <option value="">Select</option>
                    <option <?php echo $row->no_employees == '1 to 25' ? ' selected="selected"' : ''; ?>value="1 to 25">
                        1 to 25
                    </option>
                    <option <?php echo $row->no_employees == '25 to 50' ? ' selected="selected"' : ''; ?>
                        value="25 to 50">25 to 50
                    </option>
                    <option <?php echo $row->no_employees == '50 to 100' ? ' selected="selected"' : ''; ?>
                        value="50 to 100">50 to 100
                    </option>
                    <option <?php echo $row->no_employees == 'Above 100' ? ' selected="selected"' : ''; ?>
                        value="Above 100">Above 100
                    </option>
                </select>

                <div class="line line-dashed m-t-lg"></div>
            </div>

            <div class="col-sm-3">
                <label class="control-label" data-toggle="tooltip" data-placement="top"
                       title="Only Previous Year Turnover">Turnover:</label>
                <input type="number" value="<?php
                echo $row->comp_turnover;
                ?>" placeholder="Company Turnover" pattern="[0-9]*" name="comp_turnover" class="bg-focus form-control">

                <div class="line line-dashed m-t-lg"></div>
            </div>

            <div class="col-sm-3">

                <label>Quality Certification:</label>
                <select name="cert_products" class="form-control parsley-validated parsley-success">
                    <option value="">Select</option>
                    <option <?php echo $row->cert_products == 'ISI / BIS' ? ' selected="selected"' : ''; ?>
                        value="ISI/BIS">ISI / BIS
                    </option>
                    <option <?php echo $row->cert_products == 'ISO' ? ' selected="selected"' : ''; ?> value="ISO">ISO
                    </option>

                    <option <?php echo $row->cert_products == 'none' ? ' selected="selected"' : ''; ?> value="none">
                        NONE
                    </option>

                </select>

                <div class="line line-dashed m-t-lg"></div>
            </div>

            <div class="col-sm-5">
                <label class="control-label">Registration Category:</label>
                <select name="reg_category" class="form-control parsley-validated parsley-success" required="required">
                    <option value="">Select</option>
                    <option <?php echo $row->reg_category == 'Stockist/Distributor' ? ' selected="selected"' : ''; ?>
                        value="Stockist/Distributor">Stockist / Distributor
                    </option>
                    <option <?php echo $row->reg_category == 'MSME/SSI' ? ' selected="selected"' : ''; ?>
                        value="MSME/SSI">MSME / SSI
                    </option>
                    <option <?php echo $row->reg_category == 'Exporter' ? ' selected="selected"' : ''; ?>
                        value="Exporter">Exporter
                    </option>
                    <option <?php echo $row->reg_category == 'OriginalManufacturer' ? ' selected="selected"' : ''; ?>
                        value="OriginalManufacturer">Original Manufacturer
                    </option>
                    <option <?php echo $row->reg_category == 'Distributor/Agency' ? ' selected="selected"' : ''; ?>
                        value="Distributor/Agency">Distributor / Agency
                    </option>
                    <option <?php echo $row->reg_category == 'Others' ? ' selected="selected"' : '';
                    ?> value="Others">Others
                    </option>
                </select>

                <div class="m-t-lg"></div>
            </div>


        </div>
    </div>

</div>


<div class="block">

    <div class="page-title">
        <h3><span class="fa fa-mobile-phone"></span> Contact Details</h3>
    </div>

    <div class="form-group required">


        <div class="form-group required">
            <div class="col-sm-3">
                <label>Office Land Line:</label>
                <input type="number" placeholder="Office Land Line" pattern="[0-9]*" value="<?php
                $details = $this->register_model->viewdata($compid);
                foreach ($details as $row) {
                echo $row->land_line;
                ?>" name="land_line" class="bg-focus form-control" maxlength="20">

                <div class="line line-dashed m-t-lg"></div>
            </div>

            <div class="col-sm-3">
                <label class="control-label">Address Line 1:</label>
                <input type="text" placeholder="Address line 1" value="<?php
                echo $row->address1;
                ?>" name="address1" class="bg-focus form-control" required="required">

                <div class="line line-dashed m-t-lg"></div>
            </div>

            <div class="col-sm-3">
                <label>Address Line 2:</label>
                <input type="text" placeholder="Address line 2" value="<?php
                echo $row->address2;
                ?>" name="address2" class="bg-focus form-control">

                <div class="line line-dashed m-t-lg"></div>
            </div>
            <div class="col-sm-3">
                <label class="control-label">Country:</label>

                <select id="country" name="country" value="<?php
                echo $row->country;
                ?>" class="bg-focus form-control" required="required">

                </select>

                <div class="line line-dashed m-t-lg"></div>
            </div>

            <div class="col-sm-3">

                <label class="control-label">State:</label>

                <select name="state" id="state" class="bg-focus form-control" value="<?php
                echo $row->state;
                ?>" required="required"></select>
                <script language="javascript">
                    populateCountries("country", "state");

                </script>

                <div class="line line-dashed m-t-lg"></div>
            </div>
            <div class="col-sm-3">
                <label class="control-label">City:</label>
                <input type="text" placeholder="City" value="<?php
                echo $row->city;
                ?>" name="city" class="bg-focus form-control">

                <div class="line line-dashed m-t-lg"></div>
            </div>


            <div class="col-sm-3">
                <label class="control-label">Pin code:</label>
                <input type="number" placeholder="Pincode" pattern="[0-9]*" value="<?php
                echo $row->pin_code;
                ?>" name="pin_code" class="bg-focus form-control" required="required">

                <div class="line line-dashed m-t-lg"></div>
            </div>


            <div class="col-sm-3">
                <label>Website:</label>
                <input type="text" placeholder="Website" pattern="https?://.+" title="Include http://" value="<?php
                echo $row->website;
                ?>" name="website" class="bg-focus form-control">

                <div class="line line-dashed m-t-lg"></div>
            </div>

        </div>
    </div>
</div>


<div class="block">
    <div class="page-title">
        <h3><span class="fa fa-truck"></span> Dispatch Contact Details</h3>
    </div>
    <div class="form-group required">


        <div class="form-group required">

            <div class="col-sm-4">
                <label class="control-label">Contact Person:</label>
                <input placeholder="Contact Person" value="<?php
                echo $row->dispat_person;
                ?>" name="dispat_person" class="bg-focus form-control" required="required">

                <div class="line line-dashed m-t-lg"></div>
            </div>

            <div class="col-sm-4">
                <label class="control-label">Email:</label>
                <input type="email" placeholder="Contact Email" value="<?php
                echo $row->dispat_email;
                ?>" name="dispat_email" class="bg-focus form-control">

                <div class="line line-dashed m-t-lg"></div>
            </div>

            <div class="col-sm-3">
                <label class="control-label">Mobile Number:</label>
                <input type="number" placeholder="Mobile Number" pattern="[789][0-9]{9}" value="<?php
                echo $row->dispat_mobile;
                ?>" name="dispat_mobile" class="bg-focus form-control" maxlength="11">

                <div class="line line-dashed m-t-lg"></div>
            </div>
            <div class="col-sm-3">
                <label>Office Land Line:</label>
                <input type="number" placeholder="Land Line" pattern="[0-9]*" value="<?php
                echo $row->dispat_land;
                ?>" name="dispat_land" class="bg-focus form-control" maxlength="20">

                <div class="line line-dashed m-t-lg"></div>
            </div>

            <div class="col-sm-3">
                <label class="control-label">Address Line 1:</label>
                <input type="text" placeholder="Address line 1" value="<?php
                echo $row->dispat_address1;
                ?>" name="dispat_address1" class="bg-focus form-control" required="required">

                <div class="line line-dashed m-t-lg"></div>
            </div>

            <div class="col-sm-3">
                <label>Address Line 2:</label>
                <input type="text" placeholder="Address line 2" value="<?php
                echo $row->dispat_address2;
                ?>" name="dispat_address2" class="bg-focus form-control">

                <div class="line line-dashed m-t-lg"></div>
            </div>
            <div class="col-sm-3">
                <label class="control-label">City:</label>
                <input type="text" placeholder="City" value="<?php
                echo $row->dispat_city;
                }
                ?>" name="dispat_city" class="bg-focus form-control">

                <div class="line line-dashed m-t-lg"></div>
            </div>

            <div class="col-lg-2">

                <button class="btn btn-sm btn-primary" type="submit">Submit</button>

            </div>
        </div>
    </div>
</div>

</form>
</div>
</section>
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

<script type="text/javascript">
    var Tawk_API = Tawk_API || {}, Tawk_LoadStart = new Date();
    (function () {
        var s1 = document.createElement("script"), s0 = document.getElementsByTagName("script")[0];
        s1.async = true;
        s1.src = 'https://embed.tawk.to/56162b9712c288fc1fd7852f/default';
        s1.charset = 'UTF-8';
        s1.setAttribute('crossorigin', '*');
        s0.parentNode.insertBefore(s1, s0);
    })();
</script>
<!-- END SCRIPTS -->

</body>
</html>






