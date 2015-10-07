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
.editbox
{
display:none
}
td
{
padding:5px;
}
.editbox
{
border:solid 1px #000;
}
.edit_tr:hover
{
background:url(edit) right no-repeat #80C8E5;
cursor:pointer;
}
</style>
<script type="text/javascript" src="http://ajax.googleapis.com/
ajax/libs/jquery/1.5/jquery.min.js"></script>

</head>
<body style="background-color: white">
<?php $this->load->view('template/main_head', array('firm_name' => $firm_name, 'firm_type' => $firm_type)); ?>
<section id="content" style="background-color: white">
<section class="vbox">



    <section class="scrollable animated fadeInDown">

        <section class="hbox stretch">

            <!--                                                <aside class="aside-lg bg-light lter b-r">
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
                                                                                <input type="hidden" name="email" id="email" value="<?php // echo $email;    ?>">

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
                ?>"> <i class="fa fa-rupee"><?php
                setlocale(LC_MONETARY, 'en_IN');
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
                                                                </aside>-->


                <aside class="bg-white">
                    <section class="vbox">
                        <!--                                    <header class="header bg-light bg-gradient">-->


                        <section class="scrollable" >
                            <div class="tab-content">
                                <div class="tab-pane active" id="activity">

                                    <form class="form-horizontal" method="get" data-validate="parsley" style="margin:40px; padding:10px; background-color: white; border-radius: 10px ">

                                        <div class="row">


                                            <div class=" col-xs-12 col-sm-12 col-md-4 col-lg-4">

                                                <div class="panel">
                                                    <div class="panel-heading bg-primary" style=" color: black">

                                                        <h3 class="panel-title">
                                                            Vendor Details</h3>

                                                    </div>

                                    <table class="table table-hover">
                                                        <tbody>


                                                                <td>Vendor Name:</td>
                                                                <td><b><?php
                                                                        echo $row->vendor_name;$row->firm_name.''.$row->last_name;
                                                                        ?></b></td>
                                                            </tr>
                                                             <tr>
                                                                <td>Firm Name:</td>
                                                                <td><b><?php
                                                                        echo $row->firm_name;
                                                                        ?></b></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Email:</td>
                                                                <td><b> <?php
                                                                        echo $row->email;
                                                                        ?></b></td>
                                                            </tr>

                                                            <tr>
                                                                <td>Contact Number:</td>
                                                                <td> <b><?php
                                                                        echo $row->mobile;
                                                                        ?>
                                                                    </b></td>
                                                            </tr>


                                                        </tbody>
                                                    </table>

                                                </div>
                                                <div class="panel">
                                                    <div class="panel-heading bg-primary" style=" color: black">

                                                        <h3 class="panel-title">
                                                            Account Details</h3>
                                                    </div>
                                                    <table class="table table-hover">
                                                        <tbody>


                                                            <tr>
                                                                <td>Login Email:</td>
                                                                <td> <b><?php
                                                                        echo $row->email;
                                                                        ?></b></td>
                                                            </tr>

                                                            <tr><td>Password:</td>
                                                        <b>
                                                            <td> <span><span style="font-size: 0.7em"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> - </span><a data-original-title="Change Password" data-toggle="tooltip" href="/settings" style="font-size: 0.8em; color: blue"><i class="icon-edit"></i></a></span>
                                                            </td>
                                                        </b>
                                                        </tr>


                                                        </tbody>
                                                    </table>



                                                </div>


                                            </div>

                                            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8" >


                                                <div class="panel">
                                                    <div class="panel-heading bg-primary" style=" color: black">

                                                        <h3 class="panel-title">
                                                            Company Profile</h3>

                                                    </div>
                                                    <div class="panel-body">
                                                        <div class="row">


                                                            <div class=" col-md-12 col-lg-12 ">
                                                                <table class="table table-hover table-responsive table-condensed">
                                                                    <tbody>
                                                                    <header class="panel-heading">
                                                                        <h4 class="font-thin padder">Vendor Contact Person<span class="pull-right" style="margin-top: -10px">

                                                                                <a data-original-title="Edit" data-toggle="tooltip" type="button" class="btn btn-sm" style="background-color: #428BCA; color: white" onclick="location.href = '/profile01';">Edit <i class="icon-edit"></i></a>
                                                                            </span></h4>
                                                                    </header>
                                                                    <tr>
                                                                        <th width="30%"><b>Contact Person:</b></th>
                                                                        <td> <?php
                                                                            echo $row->contact_name;
                                                                            ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th><b>Contact Email:</b></th>
                                                                        <td> <?php
                                                                            echo $row->email_contact;
                                                                            ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><b>Contact Mobile:</b></td>
                                                                        <td> <?php
                                                                            echo $row->mobile_contact;
                                                                            ?></td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td><b>Land Line:</b></td>
                                                                        <td> <?php
                                                                            echo $row->land_line;
                                                                            ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><b>Address 1:</b></td>
                                                                        <td> <?php
                                                                            echo $row->address1;
                                                                            ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><b>Address 2:</b></td>
                                                                        <td> <?php
                                                                            echo $row->address2;
                                                                            ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><b>City:</b></td>
                                                                        <td> <?php
                                                                            echo $row->city;
                                                                            ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><b>State:</b></td>
                                                                        <td> <?php
                                                                            echo $row->state;
                                                                            ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><b>Country:</b></td>
                                                                        <td> <?php
                                                                            echo $row->country;
                                                                            ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><b>Website:</b></td>
                                                                        <td> <a><?php
                                                                                echo $row->website;
                                                                                ?></a></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><b>Year of Establishment:</b></td>
                                                                        <td><?php echo $row->year_establishment; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><b>No. of Employees:</b></td>
                                                                        <td><?php echo $row->no_employees; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><b>Company Turnover:</b></td>
                                                                        <td><i class="fa fa-rupee"> <?php
                                                                                setlocale(LC_MONETARY, 'en_IN');
                                                                                if ($row->comp_turnover == 0) {
                                                                                    $row->comp_turnover = 0.00;
                                                                                }
                                                                                echo money_format('%!i', $row->comp_turnover)
                                                                                ?></i><p><?php
                                                                                echo $this->vendor_model->convert_number($row->comp_turnover) . " Rupees";
                                                                                if ($row->comp_turnover == 0) {
                                                                                    $row->comp_turnover = 0.00;
                                                                                }
                                                                                ?></p></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><b>Registration Category:</b></td>
                                                                        <td><?php echo $row->reg_category; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><b>Certification of Products:</b></td>
                                                                        <td><?php
                                                                            echo $row->cert_products;
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                </tr>


                                                                </tr>

                                                                </tbody>
                                                            </table>

                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
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
<?php $this->load->view('template/main_footer'); ?>