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
            }</style>
         <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
        <script>
            $(document).ready(function(e) {

                var doc_type_canceled_check = "#canceled_check";
                var disp_layer_canceled_check = "#targetLayer_20";
                var success_layer_canceled_check = "#targetLayer20";

                var doc_arg_canceled_check = "canceled_check";

                run_doc_check(doc_type_canceled_check, disp_layer_canceled_check, success_layer_canceled_check, doc_arg_canceled_check);

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
                        url: "http://sellers.bulkhouse.in/upload_new/insert_and_upload/" + doc_arg,
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
        </style>

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

                    </footer>
                    <section>
                        <!-- user -->
<!--                       <div class="bg-info nav-user hidden-xs pos-rlt">
                            <div class="nav-avatar pos-rlt">
                                <a href="#" data-toggle="dropdown">
                                    <i class="fa fa-user"> My Account</i>
                                    <span class="caret caret-white"></span>
                                </a>
                                  <ul class="dropdown-menu m-t-sm animated fadeInLeft">
                                    <span class="arrow top"></span>
                                    <li>
                                       <a href="/main/settings">Change Password</a>
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
                                <li  class="active">
                                    <a href="/main/bank">
                                        <i class="icon-money"></i>
                                        <span>Bank Details</span>
                                    </a>
                                </li>
                                <li>
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

                            </ul>
                        </nav>
                        <!-- / nav -->
                        <!-- note -->

                        <!-- / note -->
                    </section>
                </section>
            </aside>
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
                        <div class="col-lg-6 col-md-4  col-sm-4 visible-lg visible-md visible-sm" style="padding: 15px 0px 0px 0px; text-align: right"><a href="http://sellers.bulkhouse.in/user/logout"><i class="fa fa-sign-out"></i> logout</a></div>
                    </header>

                    <section class="scrollable wrapper" id="wizard">
                        <div  class="col-ms-12">
                            <header class="panel-heading" style="background-color: #1D90E0; color: white">
                                <span class="badge bg-info pull-right"></span> <i class="fa fa-bank"></i> Bank Details
                            </header>
                            <div style="background-color: white">
                        <div class="col-md-8">



                                <div class="step-content">
                                    <div class="row">
                                    <form id="canceled_check" method="post" enctype="multipart/form-data" style="margin-top: 10px">

                                                <input type="hidden" name="email" id="email" value="<?= $email; ?>">
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
                                                        <input type="hidden"  name ="email" value="<?= $email ?>">
                                                        <input type="text" placeholder="Bank Account Name" name ="account_name" class="bg-focus form-control" required="required" value=" <?php
                                                        $details = $this->register_model->bankdetails($compid);
                                                        foreach ($details as $row) {
                                                            echo $row->account_name;
                                                            ?>">
                                                            <div class="line line-dashed m-t-lg"></div>
                                                        </div>
                                                        <div class="col-md-5">
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
                                                           } ?>">
                                                        <div class="line line-dashed m-t-lg"></div>
                                                    </div>


                                                </div>


                                                <div class="actions m-t">
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>

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


                    </section>                                                                           </section>


                <footer class="footer bg-light dker bg-gradient">
                    <p>Bulkhouse Vendor verification Panel</p>
                </footer>

                <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="body"></a>
            </section>
            <!-- /.vbox -->
        </section>
        <script src="/css/app.v1.js"></script>
        <!-- Bootstrap -->
        <!-- Sparkline Chart -->
        <!-- App -->
    </body>
</html>