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

<style>
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
    <body  ng-app="ngAnimate" style="background-color: white">
       <?php $this->load->view('template/main_head', array('firm_name' => $firm_name, 'firm_type' => $firm_type)); ?>
            <!-- /.aside -->
            <aside class="lter">

                <header class="header b-b">

                    <p class="h4 animated bounceInDown"> STEP BY STEP GUIDE TO THE SELLING PROCESS</p>

                </header>
                <section class="vbox">

                    <footer class="footer b-t">
                        <form class="m-t-sm">
                            <div class="input-group">

                                <div class="input-group-btn">

                                </div>
                            </div>
                        </form>
                    </footer>
                    <section class="scrollable">


                        <div class="panel-body" style="background-color: white">
                            <p><b>FAQ'S</b></p>
                            <div class="line pull-in"></div>
                            <p>The Bulkhouse Vendor platform allows Vendors to register their businesses, sell products, and manage various aspects related to the products and orders.

                                This section familiarizes you with the key business processes and system concepts. </p>

                        </div>


                        <div class="panel panel-default">
                            <div class="panel-heading">

                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#bulkhouse1"><span>1.</span><b>How do I start building my online store? How does it work ?</b></a>

                            </div>
                            <div id="bulkhouse1" class="panel-collapse collapse out">
                                <div class="panel-body">
                                    <p>An on-line store, in essence, is a ready-to-sell catalog of products.

                                        Bulkhouse system automatically creates your on-line store based on product information supplied by you.</p>

                                    <p>All you need to do is to:</p>
                                    <ul>
                                        <li>Decide the Main Category your product falls in.</li>
                                        <li>Decide the sub-category of your products till the last drop down level.</li>
                                        <li>Fill in the product Name, specifications, packing size, dimensions etc. as required in the list</li>
                                        <li>You will need to upload product images of HD quality.</li>
                                        <li>Also, include product uses, features, dimensions and other defining characteristics.</li>
                                        <li>Set your minimum order and maximum order quantities per lot.</li>
                                        <li>Set your selling price per lot. Your selling price should include all taxes, handling & packing.</li>
                                        <li>Intimate the delivery time information for your product(s). The delivery time will be the time taken to ship the order to our warehouse.</li>
                                    </ul>
                                    <p><b>Please spend some time going through the Vendors registration Step by Step section.</b></p>

                                    <p>If you need help, please feel free to contact our</br>
                                        Helpdesk: <b>vendorsupport@bulkhouse.com / vsupport@bulkhouse.in</b> </br>
                                        or call <b> <?php echo $this->config->item('bulk-support-number'); ?> </b></p>
                                </div>
                            </div>

                            <div class="panel-heading">

                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#bulkhouse2"> <span>2.</span>
                                    <b>Pricing: Who decides the price of the products ?</b> </a>

                            </div>
                            <div id="bulkhouse2" class="panel-collapse collapse out">
                                <div class="panel-body">
                                    <ul>
                                        <li>As a vendor, you will set the price of your products.</li>
                                        <li>If buyer has accepted the displayed price, ordered and paid online to Bulkhouse– Vendor’s confirmation is not necessary and the Purchase order is raised by Bulkhouse to the Vendor automatically.</li>
                                        <li>At times the buyer may not accept your selling price and may set his/her bargain price. In case buyer has not accepted displayed price and opted for bargaining, the order will go to Vendor for acceptance of bargain price or the Vendor may accept bargain price or reject the order or place counter price.</li>
                                        <li>Reduce selling costs-Bulk ordersIf an order once accepted by the Vendor is not executed, Bulkhouse will levy penalty as per the provisions of the Agreement.
                                        </li>
                                    </ul>

                                </div>
                            </div>
                            <div class="panel-heading">

                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#bulkhouse3"><span>3.</span>
                                    <b>Order information and order confirmation</b> </a>

                            </div>
                            <div id="bulkhouse3" class="panel-collapse collapse out">
                                <div class="panel-body">
                                    <ul>
                                        <li>Buyer browses your products; adds selected ones in shopping cart and places the order to Bulkhouse.</li>
                                        <li> Order Information :</li>
                                        <li>
                                            <ul>
                                                <li>Log-in to your dashboard on bulkhouse.com– Online Store – Transactions and check order status</li>
                                                <li>Review orders and reply to buyer's communication wherever required. You receive order information through e-mail as well as messaging system of Bulkhouse.</li>
                                            </ul>
                                        </li>
                                        <li>Upon order confirmation to Bulkhouse, you shall be intimated to keep all your ordered products ready for shipping by the specific date.</li>
                                        <li> If you are unable to ship any product by the due date - please remove it from your store. If the product is temporarily unavailable – change its availability status accordingly (e.g. Out of Stock)</li>

                                    </ul>
                                </div>
                            </div>
                            <div class="panel-heading">

                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#bulkhouse4"> <span>4.</span>
                                    <b>What kind of packing material should I use to pack my products? Does Bulkhouse provide packaging material ?</b> </a>

                            </div>
                            <div id="bulkhouse4" class="panel-collapse collapse out">
                                <div class="panel-body">
                                    <p> Bulkhouse believes a good product is as good as it’s packaging. Good quality packaging material ensures your products remain undamaged, impresses the customers and has a lasting appeal.

                                        All products will be packed only in the material with Bulkhouse packing standards. The packing material will have to be purchased by you from the list of various packaging material providers in the industry which can be supplied to you on request.</p>
                                    </ul>

                                </div>
                            </div>
                            <div class="panel-heading">

                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#bulkhouse5">  <span>5.</span>
                                    <b>How do I dispatch my products ?</b> </a>

                            </div>
                            <div id="bulkhouse5" class="panel-collapse collapse out">
                                <div class="panel-body">
                                    <p>Bulkhouse offers simplified logistics solutions!! We will handle shipping of your products.</p>
                                    <p><b>For export transactions:</b></p>
                                    <ul>
                                        <li>All you need to do is pack the products and keep it ready for dispatch and inform us. Our logistics partner will pick up the product from you for onward delivery to the Bulkhouse warehouse mentioned in the Purchase order raised by Bulkhouse.</li>
                                        <li>For locations where the Pin codes are unserviceable and or locations where our logistics partners are unable to pick up your orders, you will have to deliver your ordered consignments at your own cost to the Bulkhouse warehouse mentioned in the Purchase order raised by Bulkhouse.</li>
                                        <li> As and when your pin code and/or locations you entered become serviceable, the consignments shall be picked up by our logistics partners.</li>

                                    </ul>
                                    <p><b>For domestic transactions:</b></p>
                                    <ul>
                                        <li>All you need to do is pack the products and keep it ready for dispatch and inform us. Our logistics partner will pick up the product from you for onward delivery it to the customer.</li>
                                        <li> For locations where the Pin codes are unserviceable and/or locations where our logistics partners are unable to pick up your orders, you will have to deliver your ordered consignments at your own cost to the shipping address of the customer.</li>
                                        <li> As and when your Pin Code you entered becomes serviceable, the consignments shall be picked up by our logistics partners.  </li>

                                    </ul>
                                </div>
                            </div>
                            <div class="panel-heading">

                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#bulkhouse6"> <span>6.</span>
                                    <b>Invoicing</b> </a>

                            </div>
                            <div id="bulkhouse6" class="panel-collapse collapse out">
                                <div class="panel-body">
                                    <p><b>For export transactions:</b></p>
                                    <ul>
                                        <li>All Invoices, packing lists will be raised favoring <b>Bulkhouse Trading India Pvt Ltd</b>, mentioning the location/ delivery of the warehouse.</li>
                                        <li>If required, the Vendor will have to feed shipment information including the Invoice and tracking number in shipping section of Online Store in your vendor dashboard.</li>

                                    </ul>
                                    <p><b>For domestic transactions:</b></p>
                                    <ul>
                                        <li>All Invoices, packing lists will be raised favoring the customer as mentioned in the Purchase order raised by the customer.</li>
                                        <li> The Vendor will have to feed shipment information including the Invoice and tracking number in shipping section of Online Store in your vendor dashboard.</li>

                                    </ul>
                                </div>
                            </div>
                            <div class="panel-heading">

                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#bulkhouse7"><span>7.</span>
                                    <b>Order Rejection - Dispute Settlement :</b> </a>

                            </div>
                            <div id="bulkhouse7" class="panel-collapse collapse out">
                                <div class="panel-body">
                                    <ul>
                                        <li>The consignment shall be duly inspected by Bulkhouse representatives upon receipt of at the warehouse for quality, quantity, damages etc.</li>
                                        <li>In case the consignment is rejected partly or wholly, due to any valid reason, then Bulkhouse at its discretion may refuse to accept your shipment/return your product.</li>
                                        <li>In such cases, Vendor will have to replace the ordered item(s).</li>
                                        <li>The vendor will also be responsible for reverse logistics and other handling charges where rejected order is returned to the Vendor along with the penal provisions of the Vendor agreement.</li>
                                        <li>You should try to avoid such scenario by being extra careful about quality, quantity, and packaging and delivery time of your products.</li>

                                    </ul>

                                </div>
                            </div>
                            <div class="panel-heading">

                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#bulkhouse8"> <span>8.</span>
                                    <b>Payments</b> </a>

                            </div>
                            <div id="bulkhouse8" class="panel-collapse collapse out">
                                <div class="panel-body">
                                    <p><b>For export transactions:</b></p>
                                    <p>
                                        The payment will be made directly to your bank account through RTGS/NEFT transactions within 45 days to a maximum of 90 business days of receipt at Bulkhouse warehouse.
                                    </p>
                                    <p><b>For domestic  transactions:</b></p>
                                    <p>
                                        The payment will be made directly to your bank account through NEFT transactions within 30 business days of dispatching an order.

                                        The actual payment period will vary depending on how long you have been selling at Bulkhouse, your customer ratings and number of orders fulfilled.
                                    </p>
                                </div>
                            </div>
                            <div class="panel-heading">

                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#bulkhouse9">   <span>9.</span>
                                    <b>How will I handle customer service ?</b> </a>

                            </div>
                            <div id="bulkhouse9" class="panel-collapse collapse out">
                                <div class="panel-body">
                                    Bulkhouse will facilitate you to respond to customers' concerns efficiently through your Vendor dashboard. You will have the opportunity to address your Buyer’s queries through a Chat window or E mail.
                                </div>
                            </div>
                            <div class="panel-heading">

                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#bulkhouse10">   <span>10.</span>
                                    <b>Promotions</b> </a>

                            </div>
                            <div id="bulkhouse10" class="panel-collapse collapse out">
                                <div class="panel-body">
                                    <p>   Bulkhouse at times will run free and partnered promotion campaigns, specially targeting retailers, dealers, distributors, B2C Portals etc. You may participate in the partnered promotions programs initiated by Bulkhouse from time to time on payment basis ;the rates which shall be intimated through various communications to you by Bulkhouse. </p>
                                </div>
                            </div>
                            <div class="panel-heading">

                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#bulkhouse11"> <span>11.</span>
                                    <b>General</b> </a>

                            </div>
                            <div id="bulkhouse11" class="panel-collapse collapse out">
                                <div class="panel-body">
                                    <ul>
                                        <li>Bulkhouse aims to initiate a successful transaction between Bulkhouse and the Buyer, however small the order amount may be. The idea is to create better mutual trust and open door for more transactions in future. If your very first shipment runs into trouble - whole purpose of Bulkhouse gets defeated.</li>
                                        <li>Buyer is free to rate you on various parameters. He is free to compliment or write adverse review or rate you badly - all such will be available in public on the Bulkhouse website. Bulkhouse will not be responsible for such acts.</li>
                                    </ul>
                                </div>
                            </div>



                        </div>









                    </section>

                </section>

            </aside>



            <!-- .vbox -->

            <!-- /.vbox -->
        </section>
<?php $this->load->view('template/main_footer'); ?>