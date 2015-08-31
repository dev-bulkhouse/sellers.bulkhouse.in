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

$this->db->select('*');
$this->db->from('document_details');
$this->db->where(array('document_details.compid' => $compid));
$query = $this->db->get();
?>
<html lang="en" ng-app="myApp">
    <head>
        <meta charset="utf-8">
        <title>Seller | Bulkhouse</title>
        <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link rel="stylesheet" href="/css/app.v1.css">
        <link rel="stylesheet" href="/css/font.css" cache="false">
        <script src="/js/countries.js" type="text/javascript"></script>
        <link rel="stylesheet" type="text/css" href="/css/component.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css"/>
        <script src="/js/modernizr.custom.js"></script>
        <script src="/js/notify.js" type="text/javascript"></script>
    <!--    <script src="<?php echo site_url(); ?>js/vendor.js" type="text/javascript"></script>-->
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
            .form-group .required .control-label:after {
                content:"*";color:red;
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
        <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
        <script>
            $(document).ready(function(e) {

                var doc_type_comp_file = "#comp_file";
                var disp_layer_comp_file = "#targetLayer_21";
                var success_layer_comp_file = "#targetLayer21";

                var doc_arg_comp_file = "comp_file";

                run_doc_check(doc_type_comp_file, disp_layer_comp_file, success_layer_comp_file, doc_arg_comp_file);

            });

            function run_doc_check(doc_type, disp_layer, success_layer, doc_arg) {

                $(doc_type).on('submit', (function(e) {
                    e.preventDefault();
                    $.ajax({
                        xhr: function() {
                            var xhr = new window.XMLHttpRequest();
                            //Upload progress
                            xhr.upload.addEventListener("progress", function(evt) {
                                if (evt.lengthComputable) {
                                    var percentComplete = evt.loaded / evt.total;
                                    $(disp_layer).css("display", "block");
                                    console.log(percentComplete);
                                }
                            }, false);
                            //Download progress
                            xhr.addEventListener("progress", function(evt) {
                                if (evt.lengthComputable) {
                                    var percentComplete = evt.loaded / evt.total;
                                    //Do something with download progress
                                    console.log(percentComplete);
                                }
                            }, false);
                            return xhr;
                        },
                        url: "<?php echo site_url(); ?>upload_new/insert_and_upload/" + doc_arg,
                        type: "POST",
                        data: new FormData(this),
                        mimeType: "multipart/form-data",
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(data)
                        {
                            $(disp_layer).css("display", "none");
                            $(success_layer).html(data);

                            //                    $('a.md-close').trigger('click');
                            //                    setInterval('refreshPage()',3000);
                            location.reload();


                        },
                        error: function()
                        {

                        }

                    });

                }));

            }

        </script>
        <script>
            var myApp = angular.module('myApp', []);

            myApp.controller('checkBoxController', function($scope) {
                $scope.pro_category = [{name: 'Foods_and_Beverages'},
                    {name: 'The_Fashion'},
                    {name: 'The_Home'},
                    {name: 'Mobiles_Consumer_Electronics'},
                    {name: 'Packing_Stationery_Office_and_School'},
                    {name: 'Electrical_Lighting_and_Tools'},
                    {name: 'Sports_and_Toys'},
                    {name: 'Security_Computers_Telecom'},
                    {name: 'Agriculture'},
                    {name: 'Construction'},
                    {name: 'Industrial'}];


                $scope.selection = [];
                // toggle selection for a given employee by name
                $scope.toggleSelection = function toggleSelection(ProductCategory) {
                    var idx = $scope.selection.indexOf(ProductCategory);

                    // is currently selected
                    if (idx > -1) {
                        $scope.selection.splice(idx, 1);
                    }

                    // is newly selected
                    else {
                        $scope.selection.push(ProductCategory);
                    }
                };


                $scope.toggleSelection2 = function(b) {
                    compid = <?php echo $compid; ?>;

                    $.ajax({
                        url: "<?php echo site_url(); ?>main/pro_cat/" + compid + "/1/" + b,
                        type: "POST",
                        processData: false,
                        contentType: false,
                    });
                }
            });


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

        <script type="text/javascript">
            var attempt = 1;
            var SID = "";

            $(document).ready(function() {
                $("#enter_number").submit(function(e) {

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
                function(data) {
                    updateImage(data.ImageUrl, data.SessionId);
                }, "json");

            }



            function updateImage(ImageURL, vSID) {

                if (ImageURL === "Err" || ImageURL === "") {
                    Err();
                }
                else
                {
                    $("#Image").html("Dail 18001234547 to verify (Toll Free)");
                    SID = vSID;
                    PollStart("UnVerified");
                }
            }

            function CheckStatus()
            {

                $.post("<?php echo site_url(); ?>dail2verify/VerificationStatusAPIV2.php", {SID: SID},
                function(data) {
                    PollStart(data.VerificationStatus);
                }, "json");
            }


            function PollStart(vStatus)
            {

                attempt = attempt + 1;
                if (attempt >= 90) {
                    TimeoutCheck();
                }
                else
                if (vStatus === "UnVerified") {
                    $("#status").html("<b><i>" + (90 - attempt) + "</i> secs.</b>");
                    setTimeout(CheckStatus, 1000);
                }
                else if (vStatus === "VERIFIED")
                {
                    success();
<?php $details2 = $this->register_model->viewdata($compid);
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
    </head>
    <body style="background-color: white">
        <?php $this->load->view('template/main_head', array('firm_name' => $firm_name, 'firm_type' => $firm_type)); ?>
            <!-- /.aside -->
            <!-- .vbox -->
            <section id="content">

                <section class="vbox">
                    <header class="header bg-white b-b">
                        <div class="col-lg-6 col-md-8  col-sm-8" style="padding: 15px 0px 0px 0px">
                            <p <h5>Welcome to <b style="padding-right: 5px; border-bottom: 1px solid"><?php
                                    if (isset($firm_name)) {
                                        echo $firm_name;
                                    }
                                    ?></b><span> You have Registered as - <?php echo ucfirst($firm_type); ?></span></h5></p>
                        </div>
                        <div class="col-lg-3 col-md-2 col-sm-2">
                            <?php
                                $mobile_verification = $this->vendor_update->mobile_number($compid);
                                $verified_mobile = $this->vendor_update->latest_number($compid);
                                if ($mobile_verification != $verified_mobile) {
                                    ?>
                                    <div>
                                        <form id="enter_number">

                                            <div class="row">
                                                <div class="col-md-8" style="padding: 10px 0px 0px 0px">

                                                    <?php $details2 = $this->register_model->viewdata($compid);
                                                    foreach ($details2 as $row) {
                                                        ?>
                                                        <span>Mobile number not verified <?php
                                                            echo $row->mobile;
                                                            ?></span>
                                                        <input  value="<?php
                                                        echo $row->mobile;
                                                        ?>" type="hidden" name="phone_number" id="phone_number" class="bg-focus form-control">


                                                    </div>

                                                    <div class="col-md-4" style="padding: 10px 0px 0px 0px">
                                                        <input class="btn btn-sm btn-primary" type="submit" name="submit" value="Click here Verify" />
                                                    </div>
                                                </div>

                                            </form>
                                            <div class="row" id="dial2verify" style="display: none">
                                                <div class="col-md-8" style="padding: 10px 0px 0px 0px;">
                                                    <span id="Image" style="font-weight: bold"></span>
                                                    <span id="verified" style="font-weight: bold; display: none">Successfully verified !</span>
                                                </div>
                                                <div class="col-md-4" style="padding: 10px 0px 0px 0px;" id="status"><i class="fa fa-spinner"></i></div>
                                            </div>
                                        </div>
                                    <?php }
                                }
                            ?>

                        </div>
                        <div class="col-lg-3 col-md-2  col-sm-2 visible-lg visible-md visible-sm" style="padding: 15px 0px 0px 0px; text-align: right">
                            <a href="<?php echo site_url(); ?>user/logout"><i class="fa fa-sign-out"></i> logout</a>
                        </div>
                    </header>
                    <section class="scrollable wrapper" id="wizard">
                        <div class='notifications top-left'><?php $this->load->view('alert/success-message'); ?></div>


                        <div class="tab-content">
                            <section class="tab-pane active" id="basic">



                                <form id="comp_file" class="form-horizontal" method="POST" data-validate="parsley" enctype="multipart/form-data">
                                    <div class="form-group">

                                        <div class="form-group m-t-lg">
                                            <label class="col-lg-2 control-label">Company Profile:</label>
                                            <div class="col-lg-4 media m-t-none">


                                                <?php
                                                foreach ($query->result_array() as $row) {

                                                    if ($row['comp_file_lock'] == 0 && $row['comp_file_status'] == 5) {
                                                        ?>
                                                        <div class="media-body">
                                                            <input type="hidden" name="email" id="email" value="<?php $email; ?>">
                                                            <input type="hidden" class="form-control" name="comp_file" id="comp_file">
                                                            <input type="file" name="comp_file" title="Upload" class="btn btn-sm btn-primary m-b-sm">
                                                            <br>

                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <button class="btn btn-sm btn-primary" type="submit">Submit</button>

                                                    </div>

                                                <?php } elseif ($row['comp_file_status'] == 0) { ?>
                                                    <input type="file" disabled title="Uploaded" class="btn btn-sm btn-primary m-b-sm">
                                                    <?php
                                                }
                                            }
                                            ?>
                                            <div class="col-lg-4">
                                                <div id="targetLayer_21" style="display: none"><i class="fa fa-spinner fa-pulse"></i></div>
                                                <div id="targetLayer21"></div>

                                            </div>
                                        </div>

                                    </div>
                                </form>

                            </section>
                        </div>






                        <div class="col-md-12">
                            <div class="col-md-4">
                                <label class="control-label">Vendor Name:</label>
                                <input  placeholder="Contact Person" value="<?php
                                $details1 = $this->register_model->viewdata($compid);
                                foreach ($details1 as $row) {

                                    echo $row->vendor_name;
                                    ?>" name ="vendor_name" class="bg-focus form-control" disabled="disabled">
                                    <div class="line line-dashed m-t-lg"></div>
                                </div>

                                <div class="col-md-4">
                                    <label class="control-label">Email: <i class='fa fa-check'> verified</i></label>
                                    <input type="email"  placeholder="Contact Email" value="<?php
                                    echo $row->email;
                                    ?>" name="email" class="bg-focus form-control" disabled="disabled">
                                    <div class="line line-dashed m-t-lg"></div>
                                </div>

                                <div class="col-md-4">


                                    <label class="control-label">Mobile Number: <i class="fa fa-check" id="status2" style="display: none"> verified</i>
                                    <?php

                                if ($mobile_verification == $verified_mobile) { ?>
                                    <i class="fa fa-check"> verified</i>
                              <?php  }
                                ?>
                                    </label>
                                    <input  value="<?php
                                            echo $row->mobile;
                                            ?>" name="phone_number" id="phone_number" class="bg-focus form-control" disabled="disabled">


                                    <div class="line line-dashed m-t-lg"></div>
                                </div>

<?php } ?>
                        </div>

                        <form action="<?php echo base_url(); ?>main/update_vendor" method="post">

                            <div class="panel wrapper col-lg-8 col-md-8 col-sm-8">
                                <header class="panel-heading">
                                    <h4 class="font-thin padder">Vendor Details</h4>
                                </header>
                                <div class="row">




                                    <div class="form-group required">


                                        <div class="form-group required">

                                            <div class="col-sm-10" ng-hide="showme">

                                                <p id="social-buttons"> <a href="#" class="btn btn-rounded btn-sm btn-primary" ng-click="showme = true"><i class="fa fa-caret-right"></i> Additional Contact Details</a> </p>
                                                <div class="m-t-lg"></div>
                                            </div>
                                            <div class="col-sm-10" ng-show="showme">
                                                <p id="social-buttons"> <a href="#" class="btn btn-rounded btn-sm btn-primary" ng-click="showme = false"><i class="fa fa-caret-down"></i> Additional Contact Details</a> </p>


                                                <div class=" m-t-lg"></div>
                                            </div>

                                            <div class="col-sm-4" ng-show="showme">
                                                <label >Contact Person:</label>
                                                <input  placeholder="Contact Person" value="<?php
                                                echo $row->contact_name;
                                                ?>" name="contact_name" class="bg-focus form-control">
                                                <div class="line line-dashed m-t-lg"></div>
                                            </div>

                                            <div class="col-sm-4" ng-show="showme">
                                                <label>Email:</label>
                                                <input type="email"  placeholder="Contact Email" value="<?php
                                                echo $row->email_contact;
                                                ?>" name="email_contact" class="bg-focus form-control">
                                                <div class="line line-dashed m-t-lg"></div>
                                            </div>

                                            <div class="col-sm-3" ng-show="showme">
                                                <label>Mobile Number:</label>
                                                <input type="number"  placeholder="Mobile Number" pattern="[789][0-9]{9}" value="<?php
                                                echo $row->mobile_contact;
                                                ?>" name ="mobile_contact" class="bg-focus form-control" maxlength="11">
                                                <div class="line line-dashed m-t-lg"></div>
                                            </div>





                                            <div class="col-sm-10">
                                                <header class="panel-heading">
                                                    <h4 class="font-thin padder">Contact Details</h4>
                                                </header>
                                                <div class=" m-t-lg"></div>
                                            </div>

                                            <div class="col-sm-3">
                                                <label>Office Land Line:</label>
                                                <input type="number"  placeholder="Office Land Line" pattern="[0-9]*" value="<?php
                                                $details = $this->register_model->viewdata($compid);
                                                foreach ($details as $row) {
                                                    echo $row->land_line;
                                                    ?>" name ="land_line" class="bg-focus form-control"  maxlength="20">
                                                    <div class="line line-dashed m-t-lg"></div>
                                                </div>

                                                <div class="col-sm-3">
                                                    <label class="control-label">Address Line 1:</label>
                                                    <input type="text"  placeholder="Address line 1" value="<?php
                                                echo $row->address1;
                                                    ?>" name ="address1" class="bg-focus form-control" required="required">
                                                    <div class="line line-dashed m-t-lg"></div>
                                                </div>

                                                <div class="col-sm-3">
                                                    <label>Address Line 2:</label>
                                                    <input type="text"  placeholder="Address line 2" value="<?php
                                                echo $row->address2;
                                                    ?>" name ="address2" class="bg-focus form-control">
                                                    <div class="line line-dashed m-t-lg"></div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <label class="control-label">Country:</label>
                                                    <select id="country" name="country" value="<?php
                                                echo $row->country;
                                                    ?>"  class="bg-focus form-control" required="required"></select>
                                                    <div class="line line-dashed m-t-lg" ></div>
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
                                                    <input type="text"  placeholder="City"value="<?php
                                                echo $row->city;
                                                    ?>" name ="city" class="bg-focus form-control" >
                                                    <div class="line line-dashed m-t-lg"></div>
                                                </div>



                                                <div class="col-sm-3" >
                                                    <label class="control-label">Pin code:</label>
                                                    <input type="number" placeholder="Pincode" pattern="[0-9]*" value="<?php
                                                echo $row->pin_code;
                                                    ?>" name ="pin_code" class="bg-focus form-control" required="required">
                                                    <div class="line line-dashed m-t-lg"></div>
                                                </div>



                                                <div class="col-sm-3">
                                                    <label>Website:</label>
                                                    <input type="text"  placeholder="Website"  pattern="https?://.+" title="Include http://" value="<?php
                                                echo $row->website;
                                                    ?>" name ="website" class="bg-focus form-control">
                                                    <div class="line line-dashed m-t-lg"></div>
                                                </div>
                                                <div class="col-sm-10">
                                                    <header class="panel-heading">
                                                        <h4 class="font-thin padder">Company Details</h4>
                                                    </header>
                                                    <div class=" m-t-lg"></div>
                                                </div>

                                                <div class="col-sm-3">
                                                    <label class="control-label">Year of Established:</label>
                                                    <input type="number"  placeholder="Year of Established" value="<?php
                                                echo $row->year_establishment;
                                                    ?>" name ="year_establishment" class="bg-focus form-control" pattern="[0-9]*" required="required" maxlength="4">
                                                    <div class="line line-dashed m-t-lg"></div>
                                                </div>

                                                <div class="col-sm-3">
                                                    <label class="control-label">No of Employees:</label>
                                                    <select name="no_employees" class="form-control parsley-validated parsley-success" required="required">
                                                        <option value="">Select</option>
                                                        <option <?php $row->no_employees == '1 to 25' ? ' selected="selected"' : ''; ?> value="1 to 25">1 to 25</option>
                                                        <option <?php $row->no_employees == '25 to 50' ? ' selected="selected"' : ''; ?> value="25 to 50">25 to 50</option>
                                                        <option <?php $row->no_employees == '50 to 100' ? ' selected="selected"' : ''; ?> value="50 to 100">50 to 100</option>
                                                        <option <?php $row->no_employees == 'Above 100' ? ' selected="selected"' : ''; ?> value="Above 100">Above 100</option>
                                                    </select>
                                                    <div class="line line-dashed m-t-lg"></div>
                                                </div>

                                                <div class="col-sm-3">
                                                    <label data-toggle="tooltip" data-placement="top" title="Only Previous Year Turnover">Turnover (Lakhs):</label>
                                                    <input type="number" value="<?php
                                                echo $row->comp_turnover;
                                                    ?>"  placeholder="Company Turnover" pattern="[0-9]*" name ="comp_turnover" class="bg-focus form-control">
                                                    <div class="line line-dashed m-t-lg"></div>
                                                </div>

                                                <div class="col-sm-3">

                                                    <label>Quality Certification:</label>
                                                    <select name="cert_products"  class="form-control parsley-validated parsley-success">
                                                        <option value="">Select</option>
                                                        <option <?php $row->cert_products == 'ISI / BIS' ? ' selected="selected"' : ''; ?> value="ISI/BIS">ISI / BIS</option>
                                                        <option <?php $row->cert_products == 'ISO' ? ' selected="selected"' : ''; ?> value="ISO">ISO </option>

                                                        <option value="none">NONE</option>

                                                    </select>
                                                    <div class="line line-dashed m-t-lg"></div>
                                                </div>

                                                <div class="col-sm-5">
                                                    <label class="control-label">Registration Category:</label>
                                                    <select name="reg_category" class="form-control parsley-validated parsley-success" required="required">
                                                        <option value="">Select</option>
                                                        <option <?php $row->reg_category == 'Stockist/Distributor' ? ' selected="selected"' : ''; ?> value="Stockist/Distributor">Stockist / Distributor</option>
                                                        <option <?php $row->reg_category == 'MSME/SSI' ? ' selected="selected"' : ''; ?> value="MSME/SSI">MSME / SSI </option>
                                                        <option <?php $row->reg_category == 'Exporter' ? ' selected="selected"' : ''; ?> value="Exporter">Exporter </option>
                                                        <option <?php $row->reg_category == 'OriginalManufacturer' ? ' selected="selected"' : ''; ?> value="OriginalManufacturer">Original Manufacturer</option>
                                                        <option <?php $row->reg_category == 'Distributor/Agency' ? ' selected="selected"' : ''; ?> value="Distributor/Agency">Distributor / Agency</option>
                                                        <option <?php $row->reg_category == 'Others' ? ' selected="selected"' : '';
                                            }
                                                ?> value="Others">Others</option>
                                                </select>
                                                <div class="m-t-lg"></div>
                                            </div>


                                            <div class="col-sm-10">
                                                <header class="panel-heading">
                                                    <h4 class="font-thin padder">Dispatch Contact Details</h4>
                                                </header>
                                                <div class="m-t-lg"></div>
                                            </div>
                                            <div class="col-sm-4">
                                                <label class="control-label" >Contact Person:</label>
                                                <input  placeholder="Contact Person" value="<?php
                                                echo $row->dispat_person;
                                                ?>" name ="dispat_person" class="bg-focus form-control" required="required">
                                                <div class="line line-dashed m-t-lg"></div>
                                            </div>

                                            <div class="col-sm-4">
                                                <label class="control-label">Email:</label>
                                                <input  type="email"  placeholder="Contact Email" value="<?php
                                                echo $row->dispat_email;
                                                ?>" name="dispat_email" class="bg-focus form-control">
                                                <div class="line line-dashed m-t-lg"></div>
                                            </div>

                                            <div class="col-sm-3">
                                                <label class="control-label">Mobile Number:</label>
                                                <input type="number"  placeholder="Mobile Number" pattern="[789][0-9]{9}" value="<?php
                                                echo $row->dispat_mobile;
                                                ?>" name ="dispat_mobile" class="bg-focus form-control" maxlength="11">
                                                <div class="line line-dashed m-t-lg"></div>
                                            </div>
                                            <div class="col-sm-3">
                                                <label>Office Land Line:</label>
                                                <input type="number"  placeholder="Land Line" pattern="[0-9]*" value="<?php
                                                echo $row->dispat_land;
                                                ?>" name ="dispat_land" class="bg-focus form-control"  maxlength="20">
                                                <div class="line line-dashed m-t-lg"></div>
                                            </div>

                                            <div class="col-sm-3">
                                                <label class="control-label">Address Line 1:</label>
                                                <input type="text"  placeholder="Address line 1" value="<?php
                                                echo $row->dispat_address1;
                                                ?>" name ="dispat_address1" class="bg-focus form-control" required="required">
                                                <div class="line line-dashed m-t-lg"></div>
                                            </div>

                                            <div class="col-sm-3">
                                                <label>Address Line 2:</label>
                                                <input type="text"  placeholder="Address line 2" value="<?php
                                                echo $row->dispat_address2;
                                                ?>" name ="dispat_address2" class="bg-focus form-control">
                                                <div class="line line-dashed m-t-lg"></div>
                                            </div>
                                            <div class="col-sm-3">
                                                <label class="control-label">City:</label>
                                                <input type="text"  placeholder="City"value="<?php
                                                echo $row->dispat_city;
                                                ?>" name ="dispat_city" class="bg-focus form-control" >
                                                <div class="line line-dashed m-t-lg"></div>
                                            </div>






                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-2">

                                    <button class="btn btn-sm btn-primary" type="submit">Submit</button>

                                </div>
                            </div>

                        </form>

                        <form action="<?php echo base_url(); ?>main/pro_cat/<?php $compid; ?>" method="POST">
                            <div class="panel wrapper pull-right col-lg-4 col-md-4 col-sm-4">

                                <header class="panel-heading">
                                    <h4 class="font-thin padder">Product Categories  <button class="btn btn-sm btn-primary pull-right" type="submit" >Submit</button></h4>




                                </header>

                                <div class="row">
                                    <div class="form-group required">
                                        <div class="form-group required">

                                            <div class="col-lg-10" ng-controller="checkBoxController">

                                                <label class="control-label">Select your Products Categories:</label>
                                                <div ng-repeat="pro in pro_category">

                                                    <div class="action-checkbox">
                                                        <input id="{{pro.name}}" name="{{pro.name}}" type="checkbox" value="1" ng-checked="selection.indexOf(pro.name) > -1" ng-click="toggleSelection(pro.name);
                                                                     toggleSelection2(pro.name);"/>

                                                        <label for="{{pro.name}}"></label>
                                                        {{pro.name}}
                                                    </div>

                                                </div>
                                                <div class="line line-dashed m-t-lg"></div>




                                                <div class="col-lg-10">
                                                    <span style="color:black;" class="selected-item"><b><u>Selected Categories:</u></b></span>


                                                    <div ng-repeat="name in selection" class="selected-item">
                                                        <ul>
                                                            <li>{{name}}</li>
                                                        </ul>
                                                    </div>
                                                </div>

                                            </div>



                                        </div>
                                    </div>

                                </div>

                            </div>
                        </form>


                    </section>

                </section>
<?php $this->load->view('template/main_footer'); ?>