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
<?php
$this->db->select('*');
$this->db->from('document_details');
$this->db->where(array('document_details.compid' => $compid));
$query = $this->db->get();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Seller | BulkHouse</title>
        <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link rel="stylesheet" href="/css/app.v1.css">
        <link rel="stylesheet" href="/css/font.css" cache="false">
        <link rel="stylesheet" type="text/css" href="/css/component.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css"/>
        <script src="/js/modernizr.custom.js"></script>

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
            }</style>
        <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
        <script>
            $(document).ready(function (e) {

                var doc_type_canceled_check = "#canceled_check";
                var disp_layer_canceled_check = "#targetLayer_20";
                var success_layer_canceled_check = "#targetLayer20";

                var doc_arg_canceled_check = "canceled_check";

                run_doc_check(doc_type_canceled_check, disp_layer_canceled_check, success_layer_canceled_check, doc_arg_canceled_check);

            });

            function run_doc_check(doc_type, disp_layer, success_layer, doc_arg) {

                $(doc_type).on('submit', (function (e) {
                    e.preventDefault();
                    $.ajax({
                        xhr: function () {
                            var xhr = new window.XMLHttpRequest();
                            //Upload progress
                            xhr.upload.addEventListener("progress", function (evt) {
                                if (evt.lengthComputable) {
                                    var percentComplete = evt.loaded / evt.total;
                                    $(disp_layer).css("display", "block");
                                    console.log(percentComplete);
                                }
                            }, false);
                            //Download progress
                            xhr.addEventListener("progress", function (evt) {
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
                        success: function (data)
                        {
                            $(disp_layer).css("display", "none");
                            $(success_layer).html(data);

                            //                    $('a.md-close').trigger('click');
                            //                    setInterval('refreshPage()',3000);
                            location.reload();


                        },
                        error: function ()
                        {

                        }

                    });

                }));

            }

        </script>

        <style>.m-b-sm {
                margin-bottom: 0px;
            }
            .form-group .required .control-label:after {
                content:"*";color:red;
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
    <body style="background-color: white">
        <?php $this->load->view('template/main_head', array('firm_name' => $firm_name, 'firm_type' => $firm_type)); ?>

        <!-- /.aside -->
        <!-- .vbox -->
        <section id="content" style="background-color: white">
            <section class="vbox">
                <section class="scrollable wrapper animated fadeInDown" id="wizard">
                    <div  class="col-ms-12">
                        <header class="panel-heading bg-primary" style=" color: black">
                            <span class="badge bg-info pull-right"></span> <i class="fa fa-bank"></i> Bank Details
                        </header>
                        <div style="background-color: white">
                            <div class="col-md-8">



                                <div class="step-content">
                                    <div class="row">
                                        <form id="canceled_check" method="post" enctype="multipart/form-data" style="margin-top: 10px">

                                            <input type="hidden" name="email" id="email" value="<?php echo $email; ?>">
                                            <?php
                                            foreach ($query->result_array() as $row) {

                                                if ($row['canceled_check_lock'] == 0 && $row['canceled_check_status'] == 5) {
                                                    ?>
                                                    <input type="hidden" class="form-control" name="canceled_check" id="canceled_check">

                                                    <input type="file" name="canceled_check" title="Upload Cancelled Cheque" class="btn btn-primary m-b-sm" style="margin-bottom: 10px;background-color: #594F8D">
                                                    <hr>
                                                    <div class="col-lg-2">

                                                        <button class="btn btn-sm btn-default" type="submit">Submit</button>

                                                    </div>
                                                <?php } elseif ($row['canceled_check_status'] == 0) { ?>
                                                    <input type="file" disabled title="Uploaded Cancelled Cheque <i class='fa fa-check'></i>" class="btn btn-primary m-b-sm" style="margin-bottom: 10px;background-color: #594F8D">
                                                <?php } elseif ($row['canceled_check_status'] == 2) { ?>
                                                    <input type="file" disabled title="Cancelled Cheque Approved <i class='fa fa-check'></i>" class="btn btn-primary m-b-sm" style="margin-bottom: 10px;background-color: #594F8D">
                                                <?php } elseif ($row['canceled_check_status'] == 1) { ?>
                                                    <input type="file" disabled title="Cancelled Cheque Reject <i class='fa fa-check'></i>" class="btn btn-primary m-b-sm" style="margin-bottom: 10px;background-color: #594F8D">

                                                    <?php
                                                }
                                            }
                                            ?>

                                            <div class="col-lg-4">
                                                <div id="targetLayer_20" style="display: none"><i class="fa fa-spinner fa-pulse"></i></div>
                                                <div id="targetLayer20"></div>

                                            </div>


                                        </form>
                                    </div>
                                    <div class="row" style="padding-top: 10px">
                                        <form action="<?php echo base_url(); ?>upload_new/banking" method="post">




                                            <div class="form-group required">


                                                <div class="form-group required">
                                                   
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <label class="control-label">Bank Account Name:</label>
                                                            <input type="hidden"  name ="email" value="<?php echo $email ?>">
                                                            <input type="text" placeholder="Bank Account Name" name ="account_name" class="bg-focus form-control" required="required" value=" <?php
                                                            $details = $this->register_model->bankdetails($compid);
                                                            foreach ($details as $row) {
                                                                echo $row->account_name;
                                                                ?>">
                                                                <div class="line line-dashed m-t-lg"></div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label class="control-label">Bank Account Number:</label>
                                                                <input type="text" placeholder="Bank Account Number" name ="account_number" pattern="[0-9]*" class="bg-focus form-control" required="required" value="<?php echo $row->account_number; ?>" max="20">
                                                                <div class="line line-dashed m-t-lg"></div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label class="control-label">Name of the Bank:</label>
                                                                <input type="text" placeholder="Bank Name" name ="bank_name" class="bg-focus form-control" required="required" value="<?php echo $row->bank_name; ?>">
                                                                <div class="line line-dashed m-t-lg"></div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label class="control-label">Bank Branch:</label>
                                                                <input type="text" placeholder="Bank Branch" name ="branch" class="bg-focus form-control" required="required" value="<?php echo $row->branch; ?>">
                                                                <div class="line line-dashed m-t-lg"></div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label class="control-label">IFSC Code:</label>
                                                                <input type="text" placeholder="IFSC Code" name ="ifsc" class="bg-focus form-control" required="required" value="<?php echo $row->ifsc; ?>">
                                                                <div class="line line-dashed m-t-lg"></div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label class="control-label">MICR Code:</label>
                                                                <input type="text" placeholder="MICR Code" name ="micr" class="bg-focus form-control" required="required" value="<?php echo $row->micr;
                                                               }
                                                            ?>">
                                                            <div class="line line-dashed m-t-lg"></div>
                                                        </div>


                                                    </div>

 <?php if($status != 10) {?>
                                                    <div class="actions m-t">
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                    </div>
 <?php } else {}?>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!--                                            <button type="button" class="btn btn-white btn-sm btn-prev" data-target="#form-wizard" data-wizard="previous" disabled="disabled">Previous</button>
                                                                                <button type="button" class="btn btn-white btn-sm btn-next" data-target="#form-wizard" data-wizard="next" data-last="Finish">Submit</button>-->


                                </div>

                            </div>


                        </div>

                    </div>


                </section>
            </section>

<?php $this->load->view('template/main_footer'); ?>