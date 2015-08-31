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
    background-color: #18659B;
    color: #fff;
}
.bg-primary .nav li a {
    color: #fff;
}
        </style>
    </head>
    <body  ng-app="ngAnimate">
        <?php $this->load->view('template/main_head', array('firm_name' => $firm_name, 'firm_type' => $firm_type)); ?>
            <!-- /.aside -->
            <aside class="bg-light lter">
               
                <header class="header b-b">

                    <p class="h4 animated bounceInDown">STEP BY STEP GUIDE TO VENDOR ON-BOARDING</p>

                </header>
                <section class="vbox">

                    <footer class="footer b-t">
                        <form class="m-t-sm">
                            <div class="input-group">
                                <p>Bulkhouse Vendor verification Panel</p>
                                <div class="input-group-btn">
                                    <button class="btn btn-sm btn-white">
                                        <i class="icon-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </footer>
                    <section class="scrollable">


                        <div class="panel-body">
                            <p><b>FAQ'S</b></p>
                            <div class="line pull-in"></div>
                            <p>This Manual guides you on <b>"How you can register"</b> as a vendor and get answers to your queries during the registration process with Bulkhouse as a Vendor</p>

                            <p>Please go through the document carefully. It is a mandatory Step by Step process to register your Company to sell any product on Bulkhouse websites.</p>

                        </div>


                        <div class="panel panel-default">
                            <div class="panel-heading">

                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#bulkhouse1"><span>1.</span><b>Why sell on Bulkhouse ?</b></a>

                            </div>
                            <div id="bulkhouse1" class="panel-collapse collapse out">
                                <div class="panel-body">
                                    Bulkhouse offers an exclusive platform for vendors to sell in international and domestic markets in bulk.As a vendor on Bulkhouse, you will gain access to international and domestic buyers through a user friendly online system.Bulkhouse is all about <b>simplifying trade</b> without getting into the complexities involved in B2B e-commerce and export transactions
                                </div>
                            </div>

                            <div class="panel-heading">

                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#bulkhouse2"> <span>2.</span>
                                    <b>What are the advantages of selling and buying on Bulkhouse ?</b> </a>

                            </div>
                            <div id="bulkhouse2" class="panel-collapse collapse out">
                                <div class="panel-body">
                                    <p>It’s simplifying trade on Bulkhouse!! when on Bulkhouse, you are a part of an exclusive business community, have an online market place and avail value added services on a single portal! We offer a host of features with abundant advantages like:</p>
                                    <ul>
                                        <li>Get the best prices on your orders</li>
                                        <li>Sell worldwide</li>
                                        <li>Place minimum lot order quantities</li>
                                        <li>Reduce selling costs-sell only bulk orders</li>
                                        <li>Realize more by reducing intermediary margins</li>
                                        <li>Make a mark on your quality assured products</li>
                                        <li>Simplified Logistics- Pick up from your doorstep</li>


                                    </ul>

                                </div>
                            </div>
                            <div class="panel-heading">

                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#bulkhouse3"><span>3.</span>
                                    <b>Who can sell on Bulkhouse ? </b> </a>

                            </div>
                            <div id="bulkhouse3" class="panel-collapse collapse out">
                                <div class="panel-body">
                                    Anyone selling new and genuine products is welcome. To start selling, you need to go through the registration process.
                                </div>
                            </div>
                            <div class="panel-heading">

                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#bulkhouse4"> <span>4.</span>
                                    <b> How do I join as a Vendor ?</b> </a>

                            </div>
                            <div id="bulkhouse4" class="panel-collapse collapse out">
                                <div class="panel-body">
                                    <p> To join, you need to register first as a vendor. You can start the registration process by going to <b>www.bulkhouse.in</b> and clicking on the "Register as seller" button, where you will be guided through step by step registration process.
                                    </p>
                                    </br>
                                    <p>You will need to:</p>
                                    <ul>
                                        <li>Choose where you want to sell-either domestic nor exports or both</li>
                                        <li>Fill in your business e mail Id, name and mobile number.</li>
                                        <li>You will get a verification link to the email ID submitted to us at the time of subscription, which upon confirmation shall be your user name.</li>
                                        <li>Give your consent to the Terms and conditions and other permission related documents hosted for the use of Bulkhouse website.</li>
                                        <li>You will be guided to the Vendor registration panel.</li>
                                        <li>Fill in the Vendor registration form in all fields with required details</li>

                                        <li>You will be asked to upload your relevant KYC and tax related documents.</li>
                                        <li>This information will be sent to our Website moderator, who will respond within the stipulated time with his approval or requirement for additional information which you will need to submit.</li>
                                        <li>Upon approval, you will be taken to your Vendor dashboard for creating your own store, uploading your products, images, minimum and maximum order quantities, price details etc. These will be subject to our Admin-II & III level approvals.</li>
                                        <li>Once approved, your products will be displayed on the website.</li>



                                        <p>Please spend some time going through this Vendors registration Step by Step section.</p>
                                        <p>If you need help, please feel free to contact our</br>
                                            Helpdesk: <b>vendorsupport@bulkhouse.com / vsupport@bulkhouse.in</b> </br>
                                            or call <b> <?php echo $this->config->item('bulk-support-number'); ?> </b></p>
                                    </ul>

                                </div>
                            </div>
                            <div class="panel-heading">

                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#bulkhouse5">  <span>5.</span>
                                    <b>What is a Vendor account ?</b> </a>

                            </div>
                            <div id="bulkhouse5" class="panel-collapse collapse out">
                                <div class="panel-body">
                                    <p>Vendor account is the credentials that you use to operate on the Bulkhouse Vendor portal.</p>
                                    <p>A Vendor account is created as soon as the Vendor successfully signs up during the first step of the registration process.</p>
                                </div>
                            </div>
                            <div class="panel-heading">

                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#bulkhouse6"> <span>6.</span>
                                    <b>How much do I pay to join Bulkhouse ?</b> </a>

                            </div>
                            <div id="bulkhouse6" class="panel-collapse collapse out">
                                <div class="panel-body">
                                    <p>Joining on Bulkhouse at present is absolutely <b>FREE!!-No Registration Fee</b> .</p>
                                    <p>No listing fee at present for general listing.Any value added services defined on the website are however chargeable as per the rates mentioned in the website.</p>
                                </div>
                            </div>
                            <div class="panel-heading">

                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#bulkhouse7"><span>7.</span>
                                    <b>When is the registration process complete ?</b> </a>

                            </div>
                            <div id="bulkhouse7" class="panel-collapse collapse out">
                                <div class="panel-body">
                                    The registration is completed after you have provided all the required information during the step by step registration process and carried out all the verification processes.
                                </div>
                            </div>
                            <div class="panel-heading">

                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#bulkhouse8"> <span>8.</span>
                                    <b>Why do I need to verify my email address ?</b> </a>

                            </div>
                            <div id="bulkhouse8" class="panel-collapse collapse out">
                                <div class="panel-body">
                                    The email address you have provided now will be set as your login email and primary contact email. You need this email ID to log on to your Bulkhouse Vendor account. You will receive all communications from Bulkhouse on the primary contact email address.
                                </div>
                            </div>
                            <div class="panel-heading">

                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#bulkhouse9">   <span>9.</span>
                                    <b>Is it possible to change my contact email later ?</b> </a>

                            </div>
                            <div id="bulkhouse9" class="panel-collapse collapse out">
                                <div class="panel-body">
                                    You cannot update the login email, but it is possible to only update the primary contact email. We will correspond with you on the primary contact email only. You can update it on the Manage Profile page after you have completed your registration.
                                </div>
                            </div>
                            <div class="panel-heading">

                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#bulkhouse10">   <span>10.</span>
                                    <b>Why do I have to verify my mobile number ?</b> </a>

                            </div>
                            <div id="bulkhouse10" class="panel-collapse collapse out">
                                <div class="panel-body">
                                    The contact number you have provided now will be set as your login contact number and primary contact number. You can use your login contact number to log on to your Bulkhouse Vendor account. You will receive all communications from Bulkhouse on the primary contact number.
                                </div>
                            </div>
                            <div class="panel-heading">

                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#bulkhouse11"> <span>11.</span>
                                    <b>Can I change my contact number later ?</b> </a>

                            </div>
                            <div id="bulkhouse11" class="panel-collapse collapse out">
                                <div class="panel-body">
                                    You can only update the primary contact number through the Manage profile page .Upon new telephone number confirmation; you will receive all communications from Bulkhouse on the new primary contact number.
                                </div>
                            </div>
                            <div class="panel-heading">

                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#bulkhouse12">  <span>12.</span>
                                    <b>What are the essential documents mandatory for registering a Vendor ?</b> </a>

                            </div>
                            <div id="bulkhouse12" class="panel-collapse collapse out">
                                <div class="panel-body">
                                    To register as a Vendor, we require your personal as well as Business KYC documents. These are mandatory and are to be mentioned and uploaded.
                                    The relevant documents will appear as pop-ups on right click of <b>"?"</b> symbol in the relevant document type .
                                </div>
                            </div>
                            <div class="panel-heading">

                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#bulkhouse13">  <span>13.</span>
                                    <b>How can a discrepancy occur ?</b> </a>

                            </div>
                            <div id="bulkhouse13" class="panel-collapse collapse out">
                                <div class="panel-body">
                                    A discrepancy can occur if the information provided by you while registering your business does not match the number on the scanned copy of the documents uploaded by you.
                                </div>
                            </div>
                            <div class="panel-heading">

                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#bulkhouse14">

                                    <p><span>14.</span><b>What if I want to more than one location listed as my pick up location ? Will I face any problem if my pick up address is different from my Registered TIN/VAT ?</b></p>


                                </a>

                            </div>
                            <div id="bulkhouse14" class="panel-collapse collapse out">
                                <div class="panel-body">
                                    Yes, it is possible to list more than one branch or warehouse as your pickup location within the same state. However, TIN/VAT registration number for the additional locations should be the same as mentioned in your TIN registration certificate submitted earlier.For pick up locations not within the same state, you need to furnish us the TIN/ VAT registration details for the location of your additional warehouse(s). In all cases, the Branch/warehouse location address, Pin codes and Bank details with documentary evidence need to be submitted for verification and prior approval from Bulkhouse before its listing.
                                </div>
                            </div>
                            <div class="panel-heading">

                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#bulkhouse15"> <span>15.</span>
                                    <b>Is updating my PAN/TIN/TAN allowed later on ?</b> </a>

                            </div>
                            <div id="bulkhouse15" class="panel-collapse collapse out">
                                <div class="panel-body">
                                    Yes, you can update the PAN/TIN/TAN details on the Edit Profile page after you have completed the registration steps. But the documents need to be verified by us. After the documents are verified, you can raise a ticket with Vendor Support Team to update the documents. Till then, your account will remain in the suspended mode awaiting our approval of the revised documents.
                                </div>
                            </div>
                            <div class="panel-heading">

                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#bulkhouse16"> <span>16.</span>
                                    <b>What does an 'active' account status mean ?</b> </a>

                            </div>
                            <div id="bulkhouse16" class="panel-collapse collapse out">
                                <div class="panel-body">
                                    An active account means your account has fulfilled all the necessary approvals from our end required to be a vendor. This gives you an access to log on to your Vendor account and access your listings; you can sell, and respond to buyer actions. You will also receive payments for orders fulfilled.
                                </div>
                            </div>
                            <div class="panel-heading">

                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#bulkhouse17"> <span>17.</span>
                                    <b>How will I be notified when my account becomes 'active' ?</b> </a>

                            </div>
                            <div id="bulkhouse17" class="panel-collapse collapse out">
                                <div class="panel-body">
                                    You will receive an email from us on your primary contact email address notifying the status of your account turning <b>'active'</b>.
                                </div>
                            </div>
                            <div class="panel-heading">

                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#bulkhouse18">  <span>18.</span>
                                    <b>Why is the status of my account registration 'pending' or 'inactive' ?</b> </a>

                            </div>
                            <div id="bulkhouse18" class="panel-collapse collapse out">
                                <div class="panel-body">
                                    <p>The status of an account could be pending because of the following reasons:</p>
                                    <ul>
                                        <li>Registration steps are incomplete</li>
                                        <li>Manage Profile is not filled out</li>
                                        <li>Verifications are pending</li>
                                        <li>Bank account details mismatch.</li>
                                        <li>Primary phone number mismatch</li>
                                        <li>Primary email address mismatch</li>
                                        <li>Area Pin Code is not serviced by Bulkhouse</li>

                                    </ul>

                                    <p>
                                        You can comply with the above KYC process to help Bulkhouse reactivate your Vendor account registration process.
                                    </p>

                                </div>
                            </div>
                            <div class="panel-heading">

                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#bulkhouse19">  <span>19.</span>
                                    <b>What does a 'Blacklisted' account status mean ?</b> </a>

                            </div>
                            <div id="bulkhouse19" class="panel-collapse collapse out">
                                <div class="panel-body">
                                    A blacklisted account means you will not be allowed to log on to your account. Once blacklisted, your will not be able to access your Vendor account and your products will no longer be visible on Bulkhouse website.
                                </div>
                            </div>
                            <div class="panel-heading">

                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#bulkhouse20">  <span>20.</span>
                                    <b>Why will my Vendor account be blacklisted ?</b> </a>

                            </div>
                            <div id="bulkhouse20" class="panel-collapse collapse out">
                                <div class="panel-body">
                                    <p>An account could be blacklisted for one of the following reasons:</p>
                                    <ul>
                                        <li>Selling prohibited products</li>
                                        <li>Selling fake products</li>
                                        <li>Selling branded products without brand owners’ confirmation in writing</li>
                                        <li>Breach of contract or terms  and conditions</li>
                                        <li>Repeated default in orders execution </li>
                                        <li>Threat and abuse</li>
                                        <li>Fake claims /reviews/ratings</li>
                                        <li>Consistent negative customer feedback</li>
                                        <li>High number of disputes</li>
                                    </ul>

                                </div>
                            </div>
                            <div class="panel-heading">

                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#bulkhouse21">  <span>21.</span>
                                    <b>Who is a preferred Vendor ?</b></a>

                            </div>
                            <div id="bulkhouse21" class="panel-collapse collapse out">
                                <div class="panel-body">
                                    A preferred Vendor is one who is considered the best for a particular product and is shown at the top of the Vendors’ list.A Vendor becomes preferred based on SLA parameters such as delivery, no complaints, settlement defect rate, last sale, price, etc.
                                </div>
                            </div>

                            <header class="footer b-b">

                                <p class="h4 animated bounceInDown">GUIDE TO STEP BY STEP vendor on-boarding</p>

                            </header>
                        </div>









                    </section>

                </section>

            </aside>



            <!-- .vbox -->

            <!-- /.vbox -->
        </section>
        <script src="/js/classie.js"></script>
        <script src="/js/modalEffects.js"></script>
        <script>
            // this is important for IEs
            var polyfilter_scriptpath = '/js/';
        </script>
        <script src="/js/cssParser.js"></script>
        <script src="/js/css-filters-polyfill.js"></script>
        <script src="/css/app.v1.js"></script>
        <!-- Bootstrap -->
        <!-- Sparkline Chart -->
        <!-- App -->
    </body>
</html>