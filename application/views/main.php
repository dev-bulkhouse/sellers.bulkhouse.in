<?php
if ($logged_in) {
    $compid = $this->session->userdata('id');
    $email = $this->session->userdata('email');
    $vendor_name = $this->session->userdata('vendor_name');
    $firm_name = $this->session->userdata('firm_name');
    $firm_type = $this->session->userdata('firm_type');
    $credit_limit = $this->vendor_model->credit_limit($compid);
    $show['compid'] = $compid;
    $show['email'] = $email;
    $show['vendor_name'] = $vendor_name;
    $show['firm_name'] = $firm_name;
    $show['firm_type'] = $firm_type;
} else {

}
$responcea = $this->vendor_update->status_bank($compid);
if ($responcea == 'Need To Submit' || $responcea == 'Failed' || $responcea == 'wrong' || $responcea == 'submitted') {
    $val = 30;
} elseif ($responcea == 'Sent bank Details') {
    $val = 60;
} elseif ($responcea == 'Sucess') {
    $val = 100;
} else {
    $val = 0;
}
?>
<?php
$sql = "SELECT * FROM document_details WHERE compid = '" . $compid . "' LIMIT 1";
$res = $this->db->query($sql);
$row_docs = $res->row();

$sql = "SELECT * FROM doc_req WHERE firm_type = '" . $firm_type . "' LIMIT 1";
$doc_req = $this->db->query($sql);
$req_docs = $doc_req->row();

$sql = "SELECT * FROM vendor_details WHERE email = '" . $email . "' LIMIT 1";
$opt_doc = $this->db->query($sql);
$opt_docs = $opt_doc->row();



if (isset($opt_docs->cenvat_required)) {
    $cenvat_id = $opt_docs->cenvat_required;
//$cenvat_id = 1;
}
if (isset($opt_docs->servicetax_required)) {
    $servicetax_id = $opt_docs->servicetax_required;
//$cenvat_id = 1;
}


$this->db->select('*');
$this->db->from('document_details');
$this->db->where(array('document_details.compid' => $compid));
$query = $this->db->get();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Seller | Bulkhouse</title>
        <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link rel="stylesheet" href="/css/app.v1.css">
        <link rel="stylesheet" href="/css/font.css" cache="false">

        <link rel="stylesheet" type="text/css" href="/css/component.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css"/>
        <script src="/js/modernizr.custom.js"></script>
        <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <!--    <script src="<?php echo site_url(); ?>js/vendor.js" type="text/javascript"></script>-->
        <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.4.3/angular.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.4.3/angular-animate.js"></script>
        <script>
            $(document).ready(function(e) {

                var doc_type_pan = "#pan";
                var disp_layer_pan = "#targetLayer_5";
                var success_layer_pan = "#targetLayer5";

                var doc_arg_pan = "pan_prop";

                run_doc(doc_type_pan, disp_layer_pan, success_layer_pan, doc_arg_pan);

                var doc_type_vat = "#vat_cst";
                var disp_layer_vat = "#targetLayer_6";
                var success_layer_vat = "#targetLayer6";

                var doc_arg_vat = "vat_cst";

                run_doc(doc_type_vat, disp_layer_vat, success_layer_vat, doc_arg_vat);

//                var doc_type_cst = "#cst";
//                var disp_layer_cst = "#targetLayer_12";
//                var success_layer_cst = "#targetLayer12";
//
//                var doc_arg_cst = "cst";
//
//                run_doc(doc_type_cst, disp_layer_cst, success_layer_cst, doc_arg_cst);

                var doc_type_pan_comp = "#pan_comp";
                var disp_layer_pan_comp = "#targetLayer_7";
                var success_layer_pan_comp = "#targetLayer7";

                var doc_arg_pan_comp = "pan_comp";

                run_doc(doc_type_pan_comp, disp_layer_pan_comp, success_layer_pan_comp, doc_arg_pan_comp);

                var doc_type_part_deed = "#part_deed";
                var disp_layer_part_deed = "#targetLayer_8";
                var success_layer_part_deed = "#targetLayer8";

                var doc_arg_part_deed = "part_deed";

                run_doc(doc_type_part_deed, disp_layer_part_deed, success_layer_part_deed, doc_arg_part_deed);

                var doc_type_sign = "#sign";
                var disp_layer_sign = "#targetLayer_9";
                var success_layer_sign = "#targetLayer9";

                var doc_arg_sign = "sign";

                run_doc(doc_type_sign, disp_layer_sign, success_layer_sign, doc_arg_sign);

                var doc_type_cert_of_incorp = "#cert_of_incorp";
                var disp_layer_cert_of_incorp = "#targetLayer_10";
                var success_layer_cert_of_incorp = "#targetLayer10";

                var doc_arg_cert_of_incorp = "cert_of_incorp";

                run_doc(doc_type_cert_of_incorp, disp_layer_cert_of_incorp, success_layer_cert_of_incorp, doc_arg_cert_of_incorp);

                var doc_type_moa_aoa = "#moa_aoa";
                var disp_layer_moa_aoa = "#targetLayer_11";
                var success_layer_moa_aoa = "#targetLayer11";

                var doc_arg_moa_aoa = "moa_aoa";

                run_doc(doc_type_moa_aoa, disp_layer_moa_aoa, success_layer_moa_aoa, doc_arg_moa_aoa);

                var doc_type_aoa = "#aoa";
                var disp_layer_aoa = "#targetLayer_13";
                var success_layer_aoa = "#targetLayer13";

                var doc_arg_aoa = "aoa";

                run_doc(doc_type_aoa, disp_layer_aoa, success_layer_aoa, doc_arg_aoa);

                var doc_type_shop_establish_trade = "#shop_establish_trade";
                var disp_layer_shop_establish_trade = "#targetLayer_14";
                var success_layer_shop_establish_trade = "#targetLayer14";

                var doc_arg_shop_establish_trade = "shop_establish_trade";

                run_doc(doc_type_shop_establish_trade, disp_layer_shop_establish_trade, success_layer_shop_establish_trade, doc_arg_shop_establish_trade);

                var doc_type_cenvat = "#cenvat";
                var disp_layer_cenvat = "#targetLayer_15";
                var success_layer_cenvat = "#targetLayer15";

                var doc_arg_cenvat = "cenvat";

                run_doc(doc_type_cenvat, disp_layer_cenvat, success_layer_cenvat, doc_arg_cenvat);

                var doc_type_servicetax = "#servicetax";
                var disp_layer_servicetax = "#targetLayer_16";
                var success_layer_servicetax = "#targetLayer16";

                var doc_arg_servicetax = "servicetax";

                run_doc(doc_type_servicetax, disp_layer_servicetax, success_layer_servicetax, doc_arg_servicetax);

                var doc_type_photoid = "#photoid";
                var disp_layer_photoid = "#targetLayer_17";
                var success_layer_photoid = "#targetLayer17";

                var doc_arg_photoid = "photoid";

                run_doc(doc_type_photoid, disp_layer_photoid, success_layer_photoid, doc_arg_photoid);

                var doc_type_addressid = "#addressid";
                var disp_layer_addressid = "#targetLayer_18";
                var success_layer_addressid = "#targetLayer18";

                var doc_arg_addressid = "addressid";

                run_doc(doc_type_addressid, disp_layer_addressid, success_layer_addressid, doc_arg_addressid);

                var doc_type_businessid = "#businessid";
                var disp_layer_businessid = "#targetLayer_19";
                var success_layer_businessid = "#targetLayer19";

                var doc_arg_businessid = "businessid";

                run_doc(doc_type_businessid, disp_layer_businessid, success_layer_businessid, doc_arg_businessid);




            });

            function run_doc(doc_type, disp_layer, success_layer, doc_arg) {

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
//                            location.reload();

                        },
                        error: function()
                        {
                        }

                    });

                }));

            }

        </script>

        <style>
            *{
                box-sizing:border-box;
                -moz-box-sizing:border-box;
                -webkit-box-sizing:border-box;
            }

            .inputBtnSection{

            }
            .fileUpload {
                position: relative;
                overflow: hidden;
                /*border:solid 1px gray;*/
                display:inline-block;
                vertical-align:top;
            }
            .uploadBtn{
                display: inline-block;
                padding: 6px 12px;
                margin-bottom: 0;
                font-size: 14px;
                font-weight: normal;
                line-height: 1.428571429;
                text-align: center;
                vertical-align: middle;
                cursor: pointer;
                border: 1px solid transparent;
                border-radius: 4px;
                white-space: nowrap;
                -webkit-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                -o-user-select: none;
                user-select: none;
            }

            .fileUpload input.upload {
                position: absolute;
                top: 0;
                right: 0;
                margin: 0;
                padding: 0;
                font-size: 20px;
                cursor: pointer;
                opacity: 0;
                filter: alpha(opacity=0);


            }

            .list-group-item{
                font-size: 1.2em
            }
            .btn-default {
                color: #fff !important;
                background-color: #5DCFF3;
                border-color: #5DCFF3;
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
        <!--[if lt IE 9]>
        <script src="js/ie/respond.min.js" cache="false"></script>
        <script src="js/ie/html5.js" cache="false"></script>
        <script src="js/ie/fix.js" cache="false"></script>
        <![endif]-->

        <script type="text/javascript">
            $(document).ready(function() {

                window.setTimeout(function() {
                    $("#status_main").fadeTo(500, 0).slideUp(500, function() {
                        $(this).remove();
                    });
                }, 5000);

            });
        </script>

    </head>
    <body  ng-app="ngAnimate" style="background-color: white">
        <?php $this->load->view('template/main_head', array('firm_name' => $firm_name, 'firm_type' => $firm_type)); ?>
        <!-- /.aside -->
        <!-- .vbox -->

        <!--                <div class="alert alert-success alert-block">
                                        <button type="button" class="close" data-dismiss="alert"><i class="icon-remove"></i>
                                        </button>
                                        <h4><i class="icon-bell-alt"></i>Thankyou for Registering!</h4>
                                        <p>Welcome to Bulkhouse Seller Dashboard</p>
                                    </div>-->

        <section class="vbox" style="background-color: #fff">



            <section class="scrollable wrapper animated fadeInDown" >

                <div class="row" style="margin: 10px">
                    <img width="100%" src="<?php echo site_url(); ?>assets/img/banner.jpg" alt=""/>
                    <?php if ($val < 100) { ?>

                    <?php } ?>

                </div>
                <div class="alert alert-block" id='status_main' style="background-color: #1B8EDE; color: white;z-index: 999;">
                    <button type="button" class="close" data-dismiss="alert"><i class="icon-remove"></i>
                    </button>
                    <h4><i class="icon-bell-alt"></i>Account not Complete! <span style="font-size: 0.7em">  -  Please submit pending documents and details</span></h4>

                </div>
                <div class="col-md-12 visible-md visible-sm visible-xs">
                        <p style="color: black">Account Complete Status</p>
                        <div class="progress progress-xs  m-t-sm">

                            <div class="progress-bar progress-bar-success" data-toggle="tooltip" data-original-title="<?php echo $val; ?>" style="width: <?php echo $val; ?>%"></div>

                        </div>


                    </div>

                <div class="row" style="margin-bottom: 10px; padding: 10px">
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-lg-6">
                                <header class="panel-heading bg-primary" style=" color: black">
                                    <span class="badge bg-info pull-right"></span> <i class="icon-paste"></i>Inventory and Sales
                                </header>
                                <div class="list-group" style="padding: 10px; background-color: white;border: 1px whitesmoke solid">
                                    <article class="media">

                                        <div class="media-body">
                                            <a target="_blank" href="http://bulk.house/index.php/marketplace/seller/login/"><span class="badge" style="font-size: 1.2em"><i class="fa fa-plus" style="font-size: 1em"> Add Products</i></span></a>



                                        </div>
                                    </article>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <section class="panel no-borders">
                                    <header class="panel-heading bg-success lter">
                                        <span class="pull-right"><?php echo date('l'); ?></span>
                                        <span class="h4">Today Sales $0.00
                                            <br>
                                             <br>
                                            <small class="text-muted">Your Credit Balance - <i class="fa fa-rupee"><?php
                                                    setlocale(LC_MONETARY, 'en_IN');
                                                    echo money_format('%!i', $credit_limit)
                                                    ?></i> </small>
                                        </span>
                                        <div class="text-center padder m-b-n-sm m-t-sm">
                                            <div class="sparkline" data-type="line" data-resize="true" data-height="65" data-width="100%" data-line-width="2" data-line-color="#fff" data-spot-color="#fff" data-fill-color="" data-highlight-line-color="#fff" data-spot-radius="3" data-data="[0,0,0,0,0,0,0,0,0,0,0,0]"></div>
                                            <div class="sparkline inline" data-type="bar" data-height="45" data-bar-width="6" data-bar-spacing="10" data-bar-color="#92cf5c">0,0,0,0,0,0,0,0,0,0,0,0</div>
                                        </div>
                                    </header>
                                    <div class="panel-body">
                                        <div>
                                            <span class="text-muted">Sales in June:</span>
                                            <span class="h3 block">$0.00</span>
                                        </div>
                                        <div class="row m-t-sm">
                                            <div class="col-xs-4">
                                                <small class="text-muted block">From market</small>
                                                <span>$0.00</span>
                                            </div>
                                            <div class="col-xs-4">
                                                <small class="text-muted block">Referal</small>
                                                <span>$0.00</span>
                                            </div>
                                            <div class="col-xs-4">
                                                <small class="text-muted block">Affiliate</small>
                                                <span>$0.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-6" style="border-left: 2px whitesmoke solid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="col-lg-4 visible-lg" style="background-color: white;">
                                    <header class="panel-heading">
                                        Account Status
                                    </header>
                                    <div class="panel-body text-center">
<!--                                            <h4>3,450</h4> <small class="text-muted block">Worldwide visitors</small>-->
                                        <div class="inline">

                                            <div class="easypiechart" data-percent="<?php echo $val; ?>" data-line-width="7" data-track-color="#eee" data-bar-color="#afcf6f" data-scale-color="#fff" data-loop="false" data-size="70"> <span class="h4"><?php echo $val; ?></span>%

                                            </div>
                                            <div class="easypie-text">Complete</div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-8">

                                    <header class="panel-heading bg-primary" style=" color: black">
                                        <span class="badge bg-info pull-right"></span> <i class="icon-paste"></i>Status Updates
                                    </header>
                                    <div class="list-group bg-white" style="padding:20px; background-color: white; border: 1px whitesmoke solid">

                                        <?php
                                        $responce = $this->vendor_update->status_update($firm_type, $compid);
                                        if ($responce == 'Need To Upload') {
                                            ?>


                                            <article class="media">

                                                <div class="media-body">

                                                    <i class="fa fa-upload" style="font-size: 1.2em">Waiting for Document Upload</i>

                                                </div>
                                            </article>

                                        <?php } elseif ($responce == 'Waiting for Approved') { ?>



                                            <article class="media">
                                                <div class="media-body">

                                                    <i class="fa fa-upload" style="font-size: 1.2em">Waiting for Approval</i>

                                                </div>

                                            </article>


                                        <?php } elseif ($responce == 'Approved') { ?>




                                            <article class="media">

                                                <div class="media-body">

                                                    <i class="fa fa-check-square" style="font-size: 1.2em"> Documents are Approved</i>

                                                </div>
                                            </article>




                                        <?php } elseif ($responce == 'Disapproved') { ?>



                                            <article class="media">

                                                <div class="media-body">

                                                    <div class="media-body">

                                                        <i class="fa fa-exclamation" style="font-size: 1.2em">Documents Are Disapproved</i>

                                                    </div>

                                                </div>
                                            </article>



                                        <?php } ?>
                                        <?php
                                        $responce = $this->vendor_update->status_profile($compid);
                                        if ($responce == 'Need To Submit') {
                                            ?>

                                            <article class="media">

                                                <div class="media-body">


                                                    <i class="fa fa-building" style="font-size: 1.2em"> Company Profile Details Pending <a href="/main/company"> <i class="fa fa-edit"> Update</i></a></i>


                                                </div>
                                            </article>
                                        <?php } ?>




                                        <?php
                                        $responce = $this->vendor_update->status_bank($compid);
                                        if ($responce == 'Need To Submit') {
                                            ?>




                                            <article class="media">

                                                <div class="media-body">

                                                    <i class="fa fa-check-square" style="font-size: 1.2em"> Waiting for Bank Details</i>

                                                </div>
                                            </article>

                                        <?php } elseif ($responce == 'submitted') { ?>
                                            <article class="media">

                                                <div class="media-body">

                                                    <i class="fa fa-check-square" style="font-size: 1.2em"> Bank Details Submitted</i>

                                                </div>
                                            </article>
                                        <?php } elseif ($responce == 'Dispatch') { ?>




                                            <article class="media">
                                                <div class="pull-left thumb-sm">
                                                    <span class="icon-stack">
                                                        <i class="icon-circle text-success icon-stack-base"></i>
                                                        <i class="icon-flag icon-light"></i>
                                                    </span>
                                                </div>
                                                <div class="media-body">

                                                    <i class="fa fa-bank" style="font-size: 1.2em"> Waiting for Bank verification</i>

                                                </div>
                                            </article>


                                        <?php } elseif ($responce == 'Sent bank Details') { ?>


                                            <article class="media">

                                                <div class="media-body">
                                                    <i class="fa fa-bank" style="font-size: 1.2em"> Please Submit Amount credited in your bank account</i>

                                                    <form action="/confirm_bank/amount/<?php echo $compid ?>" method="POST" style="margin: 5px 0px 0px 20px">
                                                        <input type="text" name="confirm_amount">
                                                        <input type="submit">
                                                    </form>

                                                </div>
                                            </article>



                                        <?php } elseif ($responce == 'Failed') { ?>



                                            <article class="media">

                                                <div class="media-body">
                                                    <i class="fa fa-bank" style="font-size: 1.2em"> Bank Details are Disapproved</i>

                                                    <a href="#" class="alert-link"></a> and try submitting again.

                                                </div>
                                            </article>




                                        <?php } elseif ($responce == 'Sucess') { ?>
                                            <article class="media">

                                                <div class="media-body">
                                                    <i class="fa fa-bank" style="font-size: 1.2em"> Bank Details are Approved</i>



                                                </div>
                                            </article>



                                        <?php } elseif ($responce == 'wrong') { ?>
                                            <article class="media">
                                                <div class="pull-left thumb-sm">
                                                    <span class="icon-stack">
                                                        <i class="icon-circle text-success icon-stack-base"></i>
                                                        <i class="icon-flag icon-light"></i>
                                                    </span>
                                                </div>
                                                <div class="media-body">

                                                    <a href="#" class="h5">Wrong Amounts Entered 3 Times Please Contact Admin</a>


                                                </div>
                                            </article>



                                        <?php } ?>





                                    </div>


                                </div>
                            </div>
                        </div>

                        <!----------------------------->
                        <?php
                        $data['email'] = $email;
                        $data['doc_title'] = 'Value-Added Tax and Central Sales Tax Details';
                        $data['id_modal'] = 'modal-vat_cst';
                        $data['doc_placeholder'] = 'VAT-CST Number';
                        $data['doc_pat'] = '';
                        $data['doc_id'] = 'vat_cst';
                        $data['doc_note'] = 'Please Upload Document here.<p style="font-size:0.8em">Note: Only JPG and PDF files allowed</p>';
                        $data['doc_file'] = 'upload_file2';
                        $data['doc_spinner'] = 'targetLayer_6';
                        $data['doc_status'] = 'targetLayer6';
                        $this->load->view('forms/document_form', $data);
                        ?>


                        <!----------------------------->
                        <?php
                        $data['email'] = $email;
                        $data['doc_title'] = 'Pancard Details';
                        $data['id_modal'] = 'modal-pan';
                        $data['doc_placeholder'] = 'Pan Number';
                        $data['doc_pat'] = 'pattern="[A-Za-z]{5}\d{4}[A-Za-z]{1}"';
                        $data['doc_id'] = 'pan';
                        $data['doc_note'] = 'Please Upload Document here.<p style="font-size:0.8em">Note: Only JPG and PDF files allowed</p>';
                        $data['doc_file'] = 'upload_file1';
                        $data['doc_spinner'] = 'targetLayer_5';
                        $data['doc_status'] = 'targetLayer5';
                        $this->load->view('forms/document_form', $data);
                        ?>


                        <!----------------------------->
                        <?php
                        $data['email'] = $email;
                        $data['doc_title'] = 'Partnership Deed Details';
                        $data['id_modal'] = 'modal-part_deed';
                        $data['doc_placeholder'] = 'Upload Document Copy';
                        $data['doc_pat'] = '';
                        $data['doc_id'] = 'part_deed';
                        $data['doc_note'] = 'Please Upload Document here.<p style="font-size:0.8em">Note: Only JPG and PDF files allowed</p>';
                        $data['doc_file'] = 'upload_file4';
                        $data['doc_spinner'] = 'targetLayer_8';
                        $data['doc_status'] = 'targetLayer8';
                        $this->load->view('forms/document_form', $data);
                        ?>



                        <!----------------------------->
                        <?php
                        $data['email'] = $email;
                        $data['doc_title'] = 'Company Pan-card Details';
                        $data['id_modal'] = 'modal-pan_comp';
                        $data['doc_placeholder'] = 'Company Pan Number';
                        $data['doc_pat'] = '';
                        $data['doc_id'] = 'pan_comp';
                        $data['doc_note'] = 'Please Upload Document here.<p style="font-size:0.8em">Note: Only JPG and PDF files allowed</p>';
                        $data['doc_file'] = 'upload_file3';
                        $data['doc_spinner'] = 'targetLayer_7';
                        $data['doc_status'] = 'targetLayer7';
                        $this->load->view('forms/document_form', $data);
                        ?>
                        <!----------------------------->
                        <?php
                        $data['email'] = $email;
                        $data['doc_title'] = 'Authorised Signatory Details';
                        $data['id_modal'] = 'modal-sign';
                        $data['doc_placeholder'] = 'Authorised Signatory';
                        $data['doc_pat'] = '';
                        $data['doc_id'] = 'sign';
                        $data['doc_note'] = '';
                        $data['doc_file'] = 'upload_file5';
                        $data['doc_spinner'] = 'targetLayer_9';
                        $data['doc_status'] = 'targetLayer9';
                        $this->load->view('forms/document_form', $data);
                        ?>

                        <!----------------------------->
                        <?php
                        $data['email'] = $email;
                        $data['doc_title'] = 'Certificate of Incorporation Details';
                        $data['id_modal'] = 'modal-cert_of_incorp';
                        $data['doc_placeholder'] = 'Upload Document Copy';
                        $data['doc_pat'] = '';
                        $data['doc_id'] = 'cert_of_incorp';
                        $data['doc_note'] = 'Please Upload Document here.<p style="font-size:0.8em">Note: Only JPG and PDF files allowed</p>';
                        $data['doc_file'] = 'upload_file6';
                        $data['doc_spinner'] = 'targetLayer_10';
                        $data['doc_status'] = 'targetLayer10';
                        $this->load->view('forms/document_form', $data);
                        ?>

                        <!----------------------------->
                        <?php
                        $data['email'] = $email;
                        $data['doc_title'] = 'Memorandum Of Association';
                        $data['id_modal'] = 'modal-moa_aoa';
                        $data['doc_placeholder'] = 'Upload Document Copy';
                        $data['doc_pat'] = '';
                        $data['doc_id'] = 'moa_aoa';
                        $data['doc_note'] = 'Please Upload Document here.<p style="font-size:0.8em">Note: Only PDF files allowed</p>';
                        $data['doc_file'] = 'upload_file7';
                        $data['doc_spinner'] = 'targetLayer_11';
                        $data['doc_status'] = 'targetLayer11';
                        $this->load->view('forms/document_form', $data);
                        ?>
                        <!----------------------------->
                        <?php
                        $data['email'] = $email;
                        $data['doc_title'] = 'Articles Of Association';
                        $data['id_modal'] = 'modal-aoa';
                        $data['doc_placeholder'] = 'Upload Document Copy';
                        $data['doc_pat'] = '';
                        $data['doc_id'] = 'aoa';
                        $data['doc_note'] = 'Please Upload Document here.<p style="font-size:0.8em">Note: Only PDF files allowed</p>';
                        $data['doc_file'] = 'upload_file9';
                        $data['doc_spinner'] = 'targetLayer_13';
                        $data['doc_status'] = 'targetLayer13';
                        $this->load->view('forms/document_form', $data);
                        ?>
                        <!----------------------------->
                        <?php
                        $data['email'] = $email;
                        $data['doc_title'] = 'Shop establishment/Trade Licence';
                        $data['id_modal'] = 'modal-shop_establish_trade';
                        $data['doc_placeholder'] = 'Upload Document Copy';
                        $data['doc_pat'] = '';
                        $data['doc_id'] = 'shop_establish_trade';
                        $data['doc_note'] = 'Please Upload any of one Document.<p style="font-size:0.8em">Note: Only PDF files allowed</p>';
                        $data['doc_file'] = 'upload_file10';
                        $data['doc_spinner'] = 'targetLayer_14';
                        $data['doc_status'] = 'targetLayer14';
                        $this->load->view('forms/document_form', $data);
                        ?>
                        <!----------------------------->
                        <?php
                        $data['email'] = $email;
                        $data['doc_title'] = 'CENVAT Details';
                        $data['id_modal'] = 'modal-cenvat';
                        $data['doc_placeholder'] = 'CENVAT Number';
                        $data['doc_id'] = 'cenvat';
                        $data['doc_note'] = 'Note: Please Upload Certificate Copy';
                        $data['doc_pat'] = '';
                        $data['doc_file'] = 'upload_file11';
                        $data['doc_spinner'] = 'targetLayer_15';
                        $data['doc_status'] = 'targetLayer15';
                        $this->load->view('forms/document_form', $data);
                        ?>
                        <!----------------------------->
                        <?php
                        $data['email'] = $email;
                        $data['doc_title'] = 'Service Tax Details';
                        $data['id_modal'] = 'modal-servicetax';
                        $data['doc_placeholder'] = 'Service Tax Number';
                        $data['doc_pat'] = '';
                        $data['doc_id'] = 'servicetax';
                        $data['doc_note'] = 'Please Upload Document here.<p style="font-size:0.8em">Note: Only JPG and PDF files allowed</p>';
                        $data['doc_file'] = 'upload_file12';
                        $data['doc_spinner'] = 'targetLayer_16';
                        $data['doc_status'] = 'targetLayer16';
                        $this->load->view('forms/document_form', $data);
                        ?>
                        <!----------------------------->
                        <?php
                        $data['email'] = $email;
                        $data['doc_title'] = 'Photo Identity Proof';
                        $data['id_modal'] = 'modal-photoid';
                        $data['doc_placeholder'] = 'Id Number';
                        $data['doc_pat'] = '';
                        $data['doc_id'] = 'photoid';
                        $data['doc_note'] = 'Note: Only Aadhar Card or Passport Copy. <p style="font-size:0.8em">Note: Only JPG and PDF files allowed</p>';
                        $data['doc_file'] = 'upload_file13';
                        $data['doc_spinner'] = 'targetLayer_17';
                        $data['doc_status'] = 'targetLayer17';
                        $this->load->view('forms/document_form', $data);
                        ?>
                        <!----------------------------->
                        <?php
                        $data['email'] = $email;
                        $data['doc_title'] = 'Resident Address Proof';
                        $data['id_modal'] = 'modal-addressid';
                        $data['doc_placeholder'] = 'Resident Address Prrof';
                        $data['doc_pat'] = '';
                        $data['doc_id'] = 'addressid';
                        $data['doc_note'] = 'Note: Only Aadhar Card or Passport Copy Accepted. <p style="font-size:0.8em">Note: Only JPG and PDF files allowed</p>';
                        $data['doc_file'] = 'upload_file14';
                        $data['doc_spinner'] = 'targetLayer_18';
                        $data['doc_status'] = 'targetLayer18';
                        $this->load->view('forms/document_form', $data);
                        ?>
                        <!----------------------------->
                        <?php
                        $data['email'] = $email;
                        $data['doc_title'] = 'Buiseness Address Proof';
                        $data['id_modal'] = 'modal-businessid';
                        $data['doc_placeholder'] = 'Buiseness Address Proof';
                        $data['doc_pat'] = '';
                        $data['doc_id'] = 'businessid';
                        $data['doc_note'] = 'Note: Only Lease deed, Shop & Establishment Licence, Trade Licence, Certificate Of Incorporation, Articles Of Association or Memorandum Of Association are Accepted. <p style="font-size:0.8em">Note: Only JPG and PDF files allowed</p>';
                        $data['doc_file'] = 'upload_file15';
                        $data['doc_spinner'] = 'targetLayer_19';
                        $data['doc_status'] = 'targetLayer19';
                        $this->load->view('forms/document_form', $data);
                        ?>





                        <!--Documents status -->

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="list-group bg-white" style="background-color: whitesmoke">
                                    <header class="panel-heading bg-primary" style=" color: black">
                                        <span class="badge bg-info pull-right"></span> Submit Documents
                                    </header>
                                    <?php if ($req_docs->pan_prop == 1) { ?>
                                        <a href="#" class="list-group-item">
                                            <i class="icon-chevron-right"></i>
                                            <?php
                                            foreach ($query->result_array() as $row) {

                                                if ($row['pan_prop_lock'] == 0 && $row['pan_prop_status'] == 5) {
                                                    ?>
                                                    <span class="badge md-trigger" data-modal="modal-pan">Please Submit</span>
                                                <?php } elseif ($row['pan_prop_status'] == 0) { ?>
                                                    <span class="badge md-success">Waiting for approve</span>
                                                <?php } elseif ($row['pan_prop_status'] == 1) { ?>
                                                    <span class="badge md-trigger" data-modal="modal-pan">Please Resubmit</span>
                                                <?php } elseif ($row['pan_prop_status'] == 2) { ?>
                                                    <span class="badge md-success">Approved</span>
                                                    <?php
                                                }
                                            }
                                            ?>
                                            <i class="icon-list-alt"></i> Personal PAN card
                                            <span> - <i data-toggle="tooltip" data-placement="top" title="Mandatory, please  submit Personal PAN Card" class="fa fa-question-circle"></i></span>
                                        </a>

                                    <?php } ?>
                                    <!----------------------------->
                                    <?php if ($req_docs->vat_cst == 1) { ?>
                                        <a href="#" class="list-group-item">
                                            <i class="icon-chevron-right"></i>
                                            <?php
                                            foreach ($query->result_array() as $row) {

                                                if ($row['vat_cst_lock'] == 0 && $row['vat_cst_status'] == 5) {
                                                    ?>
                                                    <span class="badge md-trigger" data-modal="modal-vat_cst">Please Submit</span>
                                                <?php } elseif ($row['vat_cst_status'] == 0) { ?>
                                                    <span class="badge md-success">Waiting for approve</span>
                                                <?php } elseif ($row['vat_cst_status'] == 1) { ?>
                                                    <span class="badge md-trigger" data-modal="modal-vat_cst">Please Resubmit</span>
                                                <?php } elseif ($row['vat_cst_status'] == 2) { ?>
                                                    <span class="badge md-success">Approved</span>
                                                    <?php
                                                }
                                            }
                                            ?>


                                            <i class="icon-rupee"></i> Central Sales Tax-Value-Added Tax (VAT-CST)

                                            <span> - <i data-toggle="tooltip" data-placement="top" title="Mandatory, please submit number with registration certificate. For within the state transactions" class="fa fa-question-circle"></i></span>
                                        </a>     <?php } ?>
                                    <!----------------------------->



                                    <?php if ($req_docs->pan_comp == 1) { ?>
                                        <a href="#" class="list-group-item">
                                            <i class="icon-chevron-right"></i>
                                            <?php
                                            foreach ($query->result_array() as $row) {

                                                if ($row['pan_comp_lock'] == 0 && $row['pan_comp_status'] == 5) {
                                                    ?>
                                                    <span class="badge md-trigger" data-modal="modal-pan_comp">Please Submit</span>
                                                <?php } elseif ($row['pan_comp_status'] == 0) { ?>
                                                    <span class="badge md-success">Waiting for approve</span>
                                                <?php } elseif ($row['pan_comp_status'] == 1) { ?>
                                                    <span class="badge md-trigger" data-modal="modal-pan_comp">Please Resubmit</span>
                                                <?php } elseif ($row['pan_comp_status'] == 2) { ?>
                                                    <span class="badge md-success">Approved</span>
                                                    <?php
                                                }
                                            }
                                            ?>

                                            <i class="icon-list-alt"></i> Company PAN
                                            <span> - <i data-toggle="tooltip" data-placement="top" title="Mandatory, please  submit number Firm PAN card" class="fa fa-question-circle"></i></span>

                                        </a>
                                    <?php } ?>
                                    <!----------------------------->
                                    <?php if ($req_docs->part_deed == 1) { ?>
                                        <a href="#" class="list-group-item">
                                            <i class="icon-chevron-right"></i>
                                            <?php
                                            foreach ($query->result_array() as $row) {

                                                if ($row['part_deed_lock'] == 0 && $row['part_deed_status'] == 5) {
                                                    ?>
                                                    <span class="badge md-trigger" data-modal="modal-part_deed">Please Submit</span>
                                                <?php } elseif ($row['part_deed_status'] == 0) { ?>
                                                    <span class="badge md-success">Waiting for approve</span>
                                                <?php } elseif ($row['part_deed_status'] == 1) { ?>
                                                    <span class="badge md-trigger" data-modal="modal-part_deed">Please Resubmit</span>
                                                <?php } elseif ($row['part_deed_status'] == 2) { ?>
                                                    <span class="badge md-success">Approved</span>
                                                    <?php
                                                }
                                            }
                                            ?>

                                            <i class="fa fa-users"></i> Partnership Deed
                                            <span> - <i data-toggle="tooltip" data-placement="top" title="Mandatory to know your Company’s constitution.(Please attach)" class="fa fa-question-circle"></i></span>
                                        </a>
                                    <?php } ?>
                                    <!----------------------------->
                                    <?php if ($req_docs->sign == 1) { ?>
                                        <a href="#" class="list-group-item">
                                            <i class="icon-chevron-right"></i>
                                            <?php
                                            foreach ($query->result_array() as $row) {

                                                if ($row['sign_lock'] == 0 && $row['sign_status'] == 5) {
                                                    ?>
                                                    <span class="badge md-trigger" data-modal="modal-sign">Please Submit</span>
                                                <?php } elseif ($row['sign_status'] == 0) { ?>
                                                    <span class="badge md-success">Waiting for approve</span>
                                                <?php } elseif ($row['sign_status'] == 1) { ?>
                                                    <span class="badge md-trigger" data-modal="modal-sign">Please Resubmit</span>
                                                <?php } elseif ($row['sign_status'] == 2) { ?>
                                                    <span class="badge md-success">Approved</span>
                                                    <?php
                                                }
                                            }
                                            ?>

                                            <i class="icon-bookmark"></i> Authorised Signatory
                                        </a>
                                    <?php } ?>
                                    <!----------------------------->
                                    <?php if ($req_docs->cert_of_incorp == 1) { ?>
                                        <a href="#" class="list-group-item">
                                            <i class="icon-chevron-right"></i>
                                            <?php
                                            foreach ($query->result_array() as $row) {

                                                if ($row['cert_of_incorp_lock'] == 0 && $row['cert_of_incorp_status'] == 5) {
                                                    ?>
                                                    <span class="badge md-trigger" data-modal="modal-cert_of_incorp">Please Submit</span>
                                                <?php } elseif ($row['cert_of_incorp_status'] == 0) { ?>
                                                    <span class="badge md-success">Waiting for approve</span>
                                                <?php } elseif ($row['cert_of_incorp_status'] == 1) { ?>
                                                    <span class="badge md-trigger" data-modal="modal-cert_of_incorp">Please Resubmit</span>
                                                <?php } elseif ($row['cert_of_incorp_status'] == 2) { ?>
                                                    <span class="badge md-success">Approved</span>
                                                    <?php
                                                }
                                            }
                                            ?>

                                            <i class="icon-bookmark"></i> Certificate Of Incorporation
                                            <span> - <i data-toggle="tooltip" data-placement="top" title="Mandatory to know your Company’s constitution.(Please attach)" class="fa fa-question-circle"></i></span>
                                        </a>
                                    <?php } ?>
                                    <!----------------------------->
                                    <?php if ($req_docs->moa_aoa == 1) { ?>
                                        <a href="#" class="list-group-item">
                                            <i class="icon-chevron-right"></i>
                                            <?php
                                            foreach ($query->result_array() as $row) {

                                                if ($row['moa_aoa_lock'] == 0 && $row['moa_aoa_status'] == 5) {
                                                    ?>
                                                    <span class="badge md-trigger" data-modal="modal-moa_aoa">Please Submit</span>
                                                <?php } elseif ($row['moa_aoa_status'] == 0) { ?>
                                                    <span class="badge md-success">Waiting for approve</span>
                                                <?php } elseif ($row['moa_aoa_status'] == 1) { ?>
                                                    <span class="badge md-trigger" data-modal="modal-moa_aoa">Please Resubmit</span>
                                                <?php } elseif ($row['moa_aoa_status'] == 2) { ?>
                                                    <span class="badge md-success">Approved</span>
                                                    <?php
                                                }
                                            }
                                            ?>

                                            <i class="icon-bookmark"></i> Memorandum Of Association (MOA)
                                            <span> - <i data-toggle="tooltip" data-placement="top" title="Mandatory to know your Company’s constitution.(Please attach)" class="fa fa-question-circle"></i></span>
                                        </a>
                                    <?php } ?>
                                    <!----------------------------->
                                    <?php if ($req_docs->aoa == 1) { ?>
                                        <a href="#" class="list-group-item">
                                            <i class="icon-chevron-right"></i>
                                            <?php
                                            foreach ($query->result_array() as $row) {

                                                if ($row['aoa_lock'] == 0 && $row['aoa_status'] == 5) {
                                                    ?>
                                                    <span class="badge md-trigger" data-modal="modal-aoa">Please Submit</span>
                                                <?php } elseif ($row['aoa_status'] == 0) { ?>
                                                    <span class="badge md-success">Waiting for approve</span>
                                                <?php } elseif ($row['aoa_status'] == 1) { ?>
                                                    <span class="badge md-trigger" data-modal="modal-aoa">Please Resubmit</span>
                                                <?php } elseif ($row['aoa_status'] == 2) { ?>
                                                    <span class="badge md-success">Approved</span>
                                                    <?php
                                                }
                                            }
                                            ?>

                                            <i class="icon-bookmark"></i> Articles Of Association (AOA)
                                            <span> - <i data-toggle="tooltip" data-placement="top" title="Mandatory to know your Company’s constitution.(Please attach)" class="fa fa-question-circle"></i></span>
                                        </a>
                                    <?php } ?>
                                    <!----------------------------->
                                    <?php if ($req_docs->shop_establish_trade == 1) { ?>
                                        <a href="#" class="list-group-item">
                                            <i class="icon-chevron-right"></i>
                                            <?php
                                            foreach ($query->result_array() as $row) {

                                                if ($row['shop_establish_trade_lock'] == 0 && $row['shop_establish_trade_status'] == 5) {
                                                    ?>
                                                    <span class="badge md-trigger" data-modal="modal-shop_establish_trade">Please Submit</span>
                                                <?php } elseif ($row['shop_establish_trade_status'] == 0) { ?>
                                                    <span class="badge md-success">Waiting for approve</span>
                                                <?php } elseif ($row['shop_establish_trade_status'] == 1) { ?>
                                                    <span class="badge md-trigger" data-modal="modal-shop_establish_trade">Please Resubmit</span>
                                                <?php } elseif ($row['shop_establish_trade_status'] == 2) { ?>
                                                    <span class="badge md-success">Approved</span>
                                                    <?php
                                                }
                                            }
                                            ?>

                                            <i class="icon-bookmark"></i> Shop establishment/Trade License
                                            <span> - <i data-toggle="tooltip" data-placement="top" title="Mandatory to know your Company’s constitution.(Please attach)" class="fa fa-question-circle"></i></span>
                                        </a>
                                    <?php } ?>

                                    <script>
                                        function save_cenvat(va) {
                                            compid = <?php echo $compid; ?>;

                                            $.ajax({
                                                url: "<?php echo site_url(); ?>/main/cenvat_doc/" + compid + "/" + va,
                                                type: "POST",
                                                processData: false,
                                                contentType: false,
                                            });
                                        }

                                        function save_serv(va) {
                                            compid = <?php echo $compid; ?>;

                                            $.ajax({
                                                url: "<?php echo site_url(); ?>/main/serv_doc/" + compid + "/" + va,
                                                type: "POST",
                                                processData: false,
                                                contentType: false,
                                            });
                                        }


                                    </script>
                                    <div class="col-lg-12" style="margin-bottom: 10px; margin-top: 10px; padding-bottom: 10px">

                                        <header class="panel-heading">
                                            <span style="font-size: 1.2em">Are you registered with CENVAT ? <span> - <i data-toggle="tooltip" data-placement="top" title="Mandatory, if “YES”, please  submit number with Registration certificate" class="fa fa-question-circle"></i></span></span>
                                            <?php
                                            if (isset($cenvat_id)) {

                                                if ($cenvat_id == 0) {
                                                    ?>

                                                    <i style="float: right" class="label badge" ng-hide="showme"   name="otherdoc" ng-click="showme = true" value="Yes" onclick="save_cenvat('1')">YES</i>
                                                    <i style="float: right" class="label bg-light badge" ng-show="showme"   name="otherdoc" ng-click="showme = false" value="No" onclick="save_cenvat('0')">NO</i>

                                                <?php } elseif ($cenvat_id == 1) { ?>

                                                    <i style="float: right" class="label badge" ng-show="showme1"   name="otherdoc" ng-click="showme1 = false" value="Yes" onclick="save_cenvat('1')">YES</i>
                                                    <i style="float: right" class="label bg-light badge" ng-hide="showme1"   name="otherdoc" ng-click="showme1 = true" value="No" onclick="save_cenvat('0')">NO</i>

                                                <?php
                                                }
                                            }
                                            ?>

                                        </header>


                                        <div class="list-group bg-white" style="background-color: whitesmoke" ng-show="showme">

<?php if ($req_docs->cenvat == 1) { ?>
                                                <a class="list-group-item">
                                                    <i class="icon-chevron-right"></i>
                                                    <?php
                                                    foreach ($query->result_array() as $row) {

                                                        if ($row['cenvat_lock'] == 0 && $row['cenvat_status'] == 5) {
                                                            ?>
                                                            <span class="badge md-trigger" data-modal="modal-cenvat">Please Submit</span>
                                                        <?php } elseif ($row['cenvat_status'] == 0) { ?>
                                                            <span class="badge md-success">Waiting for approve</span>
                                                        <?php } elseif ($row['cenvat_status'] == 1) { ?>
                                                            <span class="badge md-trigger" data-modal="modal-cenvat">Please Resubmit</span>
                                                        <?php } elseif ($row['cenvat_status'] == 2) { ?>
                                                            <span class="badge md-success">Approved</span>
                                                            <?php
                                                        }
                                                    }
                                                    ?>

                                                    <i class="icon-rupee"></i> CENVAT
                                                    <span> - <i data-toggle="tooltip" data-placement="top" title="Only Submit CENVAT if you are registered - (Disable if not having. Click NO to Disable)" class="fa fa-question-circle"></i></span>
                                                </a>
                                        <?php } ?>
                                        </div>
                                        <?php
                                        if (isset($cenvat_id)) {

                                            if ($cenvat_id == 1) {
                                                ?>


                                                <div  class="list-group bg-white" style="background-color: whitesmoke" ng-hide="showme1" >

        <?php if ($req_docs->vat_cst == 1) { ?>
                                                        <a class="list-group-item">
                                                            <i class="icon-chevron-right"></i>
                                                            <?php
                                                            foreach ($query->result_array() as $row) {

                                                                if ($row['cenvat_lock'] == 0 && $row['cenvat_status'] == 5) {
                                                                    ?>
                                                                    <span class="badge md-trigger" data-modal="modal-cenvat">Please Submit</span>
                                                                <?php } elseif ($row['cenvat_status'] == 0) { ?>
                                                                    <span class="badge md-success">Waiting for approve</span>
                                                                <?php } elseif ($row['cenvat_status'] == 1) { ?>
                                                                    <span class="badge md-trigger" data-modal="modal-cenvat">Please Resubmit</span>
                                                                <?php } elseif ($row['cenvat_status'] == 2) { ?>
                                                                    <span class="badge md-success">Approved</span>
                                                                <?php
                                                                }
                                                            }
                                                            ?>

                                                            <i class="icon-rupee"></i> CENVAT
                                                            <span> - <i data-toggle="tooltip" data-placement="top" title="Only Submit CENVAT if you are registered - (Disable if not having. Click NO to Disable)" class="fa fa-question-circle"></i></span>
                                                        </a>
                                                <?php } ?>
                                                </div>

                                            <?php
                                            }
                                        }
                                        ?>


                                        <header class="panel-heading">
                                            <span style="font-size: 1.2em">Are you a Service TAX Payer ? <span> - <i data-toggle="tooltip" data-placement="top" title="Mandatory, if “YES”, please  submit number with Registration certificate" class="fa fa-question-circle"></i></span></span>
                                            <?php
                                            if (isset($servicetax_id)) {

                                                if ($servicetax_id == 0) {
                                                    ?>

                                                    <i style="float: right" class="label badge" ng-hide="showme5"   name="otherdoc" ng-click="showme5 = true" value="Yes" onclick="save_serv('1')">YES</i>
                                                    <i style="float: right" class="label bg-light badge" ng-show="showme5"   name="otherdoc" ng-click="showme5 = false" value="No" onclick="save_serv('0')">NO</i>

    <?php } elseif ($servicetax_id == 1) { ?>

                                                    <i style="float: right" class="label badge" ng-show="showme2"   name="otherdoc" ng-click="showme2 = false" value="Yes" onclick="save_serv('1')">YES</i>
                                                    <i style="float: right" class="label bg-light badge"  ng-hide="showme2"   name="otherdoc" ng-click="showme2 = true" value="No" onclick="save_serv('0')">NO</i>

    <?php
    }
}
?>

                                        </header>


                                        <div class="list-group bg-white" style="background-color: whitesmoke" ng-show="showme5">

                                                <?php if ($req_docs->servicetax == 1) { ?>
                                                <a class="list-group-item">
                                                    <i class="icon-chevron-right"></i>
                                                    <?php
                                                    foreach ($query->result_array() as $row) {

                                                        if ($row['servicetax_lock'] == 0 && $row['servicetax_status'] == 5) {
                                                            ?>
                                                            <span class="badge md-trigger" data-modal="modal-servicetax">Please Submit</span>
                                                        <?php } elseif ($row['servicetax_status'] == 0) { ?>
                                                            <span class="badge md-success">Waiting for approve</span>
                                                        <?php } elseif ($row['servicetax_status'] == 1) { ?>
                                                            <span class="badge md-trigger" data-modal="modal-servicetax">Please Resubmit</span>
                                                        <?php } elseif ($row['servicetax_status'] == 2) { ?>
                                                            <span class="badge md-success">Approved</span>
            <?php
        }
    }
    ?>

                                                    <i class="icon-rupee"></i> Service Tax
                                                    <span> - <i data-toggle="tooltip" data-placement="top" title="Only Submit Service TAX ID if you are registered - (Disable if not having. Click NO to Disable)" class="fa fa-question-circle"></i></span>
                                                </a>
                                        <?php } ?>
                                        </div>
                                        <?php
                                        if (isset($servicetax_id)) {

                                            if ($servicetax_id == 1) {
                                                ?>


                                                <div class="list-group bg-white" style="background-color: whitesmoke" ng-hide="showme2">

                                                        <?php if ($req_docs->servicetax == 1) { ?>
                                                        <a class="list-group-item">
                                                            <i class="icon-chevron-right"></i>
                                                            <?php
                                                            foreach ($query->result_array() as $row) {

                                                                if ($row['servicetax_lock'] == 0 && $row['servicetax_status'] == 5) {
                                                                    ?>
                                                                    <span class="badge md-trigger" data-modal="modal-servicetax">Please Submit</span>
                                                                <?php } elseif ($row['servicetax_status'] == 0) { ?>
                                                                    <span class="badge md-success">Waiting for approve</span>
                                                                <?php } elseif ($row['servicetax_status'] == 1) { ?>
                                                                    <span class="badge md-trigger" data-modal="modal-servicetax">Please Resubmit</span>
                                                                <?php } elseif ($row['servicetax_status'] == 2) { ?>
                                                                    <span class="badge md-success">Approved</span>
                    <?php
                }
            }
            ?>

                                                            <i class="icon-rupee"></i> Service Tax
                                                            <span> - <i data-toggle="tooltip" data-placement="top" title="Only Submit Service TAX ID and Copy if you are registered - (Disable if not having. Click NO to Disable)" class="fa fa-question-circle"></i></span>
                                                        </a>
                                                <?php } ?>
                                                </div>

    <?php
    }
}
?>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div>
                                    <div class="list-group bg-white" style="background-color: whitesmoke">
                                        <header class="panel-heading bg-primary" style=" color: black">
                                            <span class="badge bg-info pull-right"></span> Vendor Photo ID Documents
                                        </header>
                                            <?php if ($req_docs->photoid == 1) { ?>
                                            <a href="#" class="list-group-item">
                                                <i class="icon-chevron-right"></i>
                                                <?php
                                                foreach ($query->result_array() as $row) {

                                                    if ($row['photoid_lock'] == 0 && $row['photoid_status'] == 5) {
                                                        ?>
                                                        <span class="badge md-trigger" data-modal="modal-photoid">Please Submit</span>
                                                    <?php } elseif ($row['photoid_status'] == 0) { ?>
                                                        <span class="badge md-success">Waiting for approve</span>
                                                    <?php } elseif ($row['photoid_status'] == 1) { ?>
                                                        <span class="badge md-trigger" data-modal="modal-photoid">Please Resubmit</span>
                                                    <?php } elseif ($row['photoid_status'] == 2) { ?>
                                                        <span class="badge md-success">Approved</span>
            <?php
        }
    }
    ?>
                                                <i class="icon-user"></i> Photo ID
                                                <span> - <i data-toggle="tooltip" data-placement="top" title="Mandatory, please  submit number with either PAN Card/Aadhar card or passport copy" class="fa fa-question-circle"></i></span>
                                            </a>

<?php } ?>

                                    </div>
                                </div>
                                <div>
                                    <div class="list-group bg-white" style="background-color: whitesmoke">
                                        <header class="panel-heading bg-primary" style=" color: black">
                                            <span class="badge bg-info pull-right"></span> Address Documents
                                        </header>
                                            <?php if ($req_docs->addressid == 1) { ?>
                                            <a href="#" class="list-group-item">
                                                <i class="icon-chevron-right"></i>
                                                <?php
                                                foreach ($query->result_array() as $row) {

                                                    if ($row['addressid_lock'] == 0 && $row['addressid_status'] == 5) {
                                                        ?>
                                                        <span class="badge md-trigger" data-modal="modal-addressid">Please Submit</span>
                                                    <?php } elseif ($row['addressid_status'] == 0) { ?>
                                                        <span class="badge md-success">Waiting for approve</span>
                                                    <?php } elseif ($row['addressid_status'] == 1) { ?>
                                                        <span class="badge md-trigger" data-modal="modal-addressid">Please Resubmit</span>
                                                    <?php } elseif ($row['addressid_status'] == 2) { ?>
                                                        <span class="badge md-success">Approved</span>
            <?php
        }
    }
    ?>
                                                <i class="icon-home"></i> Vendor Residence Address
                                                <span> - <i data-toggle="tooltip" data-placement="top" title="BSNL Bill or Rent Lease deed or Aadhar Card or Passport or Bank statement(lessthan 3months)" class="fa fa-question-circle"></i></span>
                                            </a>

                                            <?php } ?>
                                            <?php if ($req_docs->businessid == 1) { ?>
                                            <a href="#" class="list-group-item">
                                                <i class="icon-chevron-right"></i>
                                                <?php
                                                foreach ($query->result_array() as $row) {

                                                    if ($row['businessid_lock'] == 0 && $row['businessid_status'] == 5) {
                                                        ?>
                                                        <span class="badge md-trigger" data-modal="modal-businessid">Please Submit</span>
                                                    <?php } elseif ($row['businessid_status'] == 0) { ?>
                                                        <span class="badge md-success">Waiting for approve</span>
                                                    <?php } elseif ($row['businessid_status'] == 1) { ?>
                                                        <span class="badge md-trigger" data-modal="modal-businessid">Please Resubmit</span>
                                                    <?php } elseif ($row['businessid_status'] == 2) { ?>
                                                        <span class="badge md-success">Approved</span>
            <?php
        }
    }
    ?>
                                                <i class="icon-building"></i> Business Address
                                                <span> - <i data-toggle="tooltip" data-placement="top" title="Any one of : BSNL Bill /Rent Lease deed/AOA & MOA/ Shop & Establishment license/ Trade license/VAT registration/Bank statement(lessthan 3months)" class="fa fa-question-circle"></i></span>
                                            </a>

<?php } ?>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>





                </div>






                <!--Documents status -->














            </section>


        </section>

<?php $this->load->view('template/main_footer'); ?>