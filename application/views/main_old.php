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
        background:#8C0000;
        color:#fff;
    }
    .uploadBtn2{
        background:#8C0000;
        color:#fff;
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
</style>
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/themes/base/jquery-ui.css" id="theme">
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="<?php echo site_url(); ?>js/vendor.js" type="text/javascript"></script>
<div class="large-12 columns zeropadding" style="background-color: #a30000">
    <div class="large-7 columns">
        <ul class="list-set">
            <li><a href="/main"><i class="fa fa-home"></i> Home</a></li>
            <li><i class="fa fa-info-circle"></i> About Us</li>
            <li><i class="fa fa-book"></i> Documentation</li>
            <li><i class="fa fa-question-circle"></i> Support</li>
            <li><i class="fa fa-envelope"></i> Contact</li>
        </ul>
    </div>
    <div class="large-5 columns">
        <ul class="list-set">
            <li class="right"><a href="<?php echo base_url(); ?>user/logout">Logout <i class="fa fa-sign-out"></i></a>

            </li>
            <li class="right"><a href="main/account">My Account  <i class="fa fa-cog"></i></a>

            </li>
            <li class="right"><span class="label">20</span>  Notifications <i class="fa fa-exclamation"></i></li>
        </ul>
    </div>
</div>
<div class="large-12 columns" style="padding-top: 10px">
    <div class="large-12 columns panel">
        <div class="large-6 columns zeropadding"><h5> Welcome to <b style="padding-bottom: 5px; border-bottom: 1px solid"><?php
if (isset($firm_name)) {
    echo $firm_name;
}
?></b></h5></div>
        <div class="large-6 columns zeropadding">
            <p style="text-align: right" class="text_little"><b>Account Status</b> : Pending Verification</p>

        </div>
    </div>
</div>
 
<div class="large-15 columns panel   radius" data-equalizer-watch="inn" style="margin-top: 20px">
  <div class="row-fluid" data-equalizer="main" >
     
    <?php $this->load->view('main_home/top_left', $show); ?>
    <?php $this->load->view('main_home/top_mid', $show); ?>
    <?php $this->load->view('main_home/top_right', $show); ?>
  </div>
           
</div>

            <div class="large-5 columns main_panel_grid " data-equalizer-watch="main" data-equalizer="inn">
            <div class="large-10 columns panel   radius" data-equalizer-watch="inn" style="margin-top: 20px">
            <form action="<?php echo base_url(); ?>upload_new/banking"  method="post" data-abide> 
               
                <h5 style="border-bottom: 1px solid"><i class="fa fa-bank"></i> Banking Details</h5>
                <div class="Bank_details large-12 columns">
                    <label>Bank Account Name <small>required</small>
                        <input type="hidden" name="email" id="email" value="<?php echo $email; ?>">
                        <input type="text" name="account_name" required placeholder="Account Name">
                    </label>
                    <small class="error">Please enter a valid name.</small>
                </div>
                <div class="Bank_details large-12 columns">
                    <label>Bank Account Number: <small>required</small>
                        <input type="text" name="account_number" required placeholder="Account Number">
                    </label>
                    <small class="error">Please enter a valid name.</small>
                </div>
                <div class="Bank_details large-12 columns">
                    <label>Bank Name: <small>required</small>
                        <input type="text" name="bank_name" required placeholder="Bank Name:">
                    </label>
                    <small class="error">Please enter a valid name.</small>
                </div>
                <div class="Bank_details large-12 columns">
                    <label>Bank Branch: <small>required</small>
                        <input type="text" name="branch" required placeholder="Bank Branch">
                    </label>
                    <small class="error">Please enter a valid name.</small>
                </div>
                <div class="Bank_details large-12 columns">
                    <label>Bank IFSC Code: <small>required</small>
                        <input type="text" name="ifsc" required placeholder="IFSC Code">
                    </label>
                    <small class="error">Please enter a valid name.</small>
                </div>
                <div class="Bank_details large-12 columns">
                    <label>Bank MICR Code: <small>required</small>
                        <input type="text" name="micr" required placeholder="MICR Code">
                    </label>
                    <small class="error">Please enter a valid name.</small>
                </div>
               
                <div class="Form_submit large-6 columns">
                <input class="button expand" id="submit" type="submit">
                </div>
            </form>
            </div>
                  
                </div>
<div class="panel">
<form enctype="multipart/form-data" action="<?php echo base_url(); ?>upload_new/upload" method="post" data-abide>
                <div class="Bank_details large-12 columns">
                    <label>Bank Canceled Cheque Image Upload: <small>required</small>
                        <i class="fa fa-folder-open-o"></i> <input name="canceled_cheque" id="uploadBtn" type="file" />
                    </label>
                    <small class="error">Please enter a valid name.</small>
                </div>
                      
		   	<div class="text" style="float: right;">

			<input type="submit" value="Upload" name="upload" class="submit" />
		</div>
		<br style="clear:both; height: 0px;" />
		
                 </form>
        </div>
      


<script src="<?php echo site_url(); ?>js/jquery-1.9.1.min.js"></script>
<script src="<?php echo site_url(); ?>js/vendor/modernizr.js"></script>
<script src="<?php echo site_url(); ?>js/vendor/jquery.js"></script>
<script src="<?php echo site_url(); ?>js/foundation/foundation.js"></script>
<script src="<?php echo site_url(); ?>js/foundation/foundation.equalizer.js"></script>
<script src="<?php echo site_url(); ?>js/foundation/foundation.dropdown.js"></script>
<script src="<?php echo site_url(); ?>js/foundation/foundation.reveal.js"></script>
<script src="<?php echo site_url(); ?>js/foundation/foundation.tooltip.js"></script>

<script>
    $(document).foundation({
        "magellan-expedition": {
            active_class: 'active', // specify the class used for active sections
            threshold: 0, // how many pixels until the magellan bar sticks, 0 = auto
            destination_threshold: 0, // pixels from the top of destination for it to be considered active
            throttle_delay: 50, // calculation throttling to increase framerate
            fixed_top: 0, // top distance in pixels assigend to the fixed element on scroll
            offset_by_height: true // whether to offset the destination by the expedition height. Usually you want this to be true, unless your expedition is on the side.
        }

    });
    $(document).foundation('reveal', 'reflow');

    $(document).foundation({
  reveal : {
    animation_speed: 200

  }
});

</script>


<script>
                        var compid = <?php echo $compid; ?>;
                        if (typeof (EventSource) !== "undefined") {
                            var source = new EventSource("<?php echo site_url(); ?>change/lock/" + compid + "/pan_prop_lock/pan_prop_status");
                            source.onmessage = function(event) {
                                if ( document.getElementById('sub_access1') !== null ) {
                            document.getElementById("sub_access1").style.display = event.data;
                                }
                            };

                        } else {
                            document.getElementById("sub_access1").innerHTML = "Sorry, your browser does not support server-sent events...";

                        }
                        if (typeof (EventSource) !== "undefined") {
                            var source = new EventSource("<?php echo site_url(); ?>change/unlock/" + compid + "/pan_prop_lock/pan_prop_status");
                            source.onmessage = function(event) {
                                if ( document.getElementById('no_access1') !== null ) {
                            document.getElementById("no_access1").style.display = event.data;
                                }
                            };

                        } else {
                            document.getElementById("no_access1").innerHTML = "Sorry, your browser does not support server-sent events...";

                        }
                        if (typeof (EventSource) !== "undefined") {
                            var source = new EventSource("<?php echo site_url(); ?>change/disapproved/" + compid + "/pan_prop_lock/pan_prop_status");
                            source.onmessage = function(event) {
                                if ( document.getElementById('disapproved1') !== null ) {
                            document.getElementById("disapproved1").style.display = event.data;
                                }
                            };

                        } else {
                            document.getElementById("disapproved1").innerHTML = "Sorry, your browser does not support server-sent events...";

                        }

                        //VAT CST

                        if (typeof (EventSource) !== "undefined") {
                            var source = new EventSource("<?php echo site_url(); ?>change/lock/" + compid + "/vat_cst_lock/vat_cst_status");
                            source.onmessage = function(event) {
                                 if ( document.getElementById('sub_access2') !== null ) {
                            document.getElementById("sub_access2").style.display = event.data;
                                 }
                            };

                        } else {
                            document.getElementById("sub_access2").innerHTML = "Sorry, your browser does not support server-sent events...";

                        }
                        if (typeof (EventSource) !== "undefined") {
                            var source = new EventSource("<?php echo site_url(); ?>change/unlock/" + compid + "/vat_cst_lock/vat_cst_status");
                            source.onmessage = function(event) {
                                 if ( document.getElementById('no_access2') !== null ) {
                            document.getElementById("no_access2").style.display = event.data;
                                 }
                            };

                        } else {
                            document.getElementById("no_access2").innerHTML = "Sorry, your browser does not support server-sent events...";

                        }
                        if (typeof (EventSource) !== "undefined") {
                            var source = new EventSource("<?php echo site_url(); ?>change/disapproved/" + compid + "/vat_cst_lock/vat_cst_status");
                            source.onmessage = function(event) {
                                if ( document.getElementById('disapproved2') !== null ) {
                            document.getElementById("disapproved2").style.display = event.data;
                                }
                            };

                        } else {
                            document.getElementById("disapproved2").innerHTML = "Sorry, your browser does not support server-sent events...";

                        }

                        //Company PAN

                        if (typeof (EventSource) !== "undefined") {
                            var source = new EventSource("<?php echo site_url(); ?>change/lock/" + compid + "/pan_comp_lock/pan_comp_status");
                            source.onmessage = function(event) {
                                 if ( document.getElementById('sub_access3') !== null ) {
                            document.getElementById("sub_access3").style.display = event.data;
                                 }
                            };

                        } else {
                            document.getElementById("sub_access3").innerHTML = "Sorry, your browser does not support server-sent events...";

                        }
                        if (typeof (EventSource) !== "undefined") {
                            var source = new EventSource("<?php echo site_url(); ?>change/unlock/" + compid + "/pan_comp_lock/pan_comp_status");
                            source.onmessage = function(event) {
                                  if ( document.getElementById('no_access3') !== null ) {
                            document.getElementById("no_access3").style.display = event.data;
                                  }
                            };

                        } else {
                            document.getElementById("no_access3").innerHTML = "Sorry, your browser does not support server-sent events...";

                        }
                        if (typeof (EventSource) !== "undefined") {
                            var source = new EventSource("<?php echo site_url(); ?>change/disapproved/" + compid + "/pan_comp_lock/pan_comp_status");
                            source.onmessage = function(event) {
                                 if ( document.getElementById('disapproved3') !== null ) {
                            document.getElementById("disapproved3").style.display = event.data;
                                 }
                            };

                        } else {
                            document.getElementById("disapproved3").innerHTML = "Sorry, your browser does not support server-sent events...";

                        }

                        //Partnership Deed

                        if (typeof (EventSource) !== "undefined") {
                            var source = new EventSource("<?php echo site_url(); ?>change/lock/" + compid + "/part_deed_lock/part_deed_status");
                            source.onmessage = function(event) {
                                 if ( document.getElementById('sub_access4') !== null ) {
                            document.getElementById("sub_access4").style.display = event.data;
                                 }
                            };

                        } else {
                            document.getElementById("sub_access4").innerHTML = "Sorry, your browser does not support server-sent events...";

                        }
                        if (typeof (EventSource) !== "undefined") {
                            var source = new EventSource("<?php echo site_url(); ?>change/unlock/" + compid + "/part_deed_lock/part_deed_status");
                            source.onmessage = function(event) {
                                 if ( document.getElementById('no_access4') !== null ) {
                            document.getElementById("no_access4").style.display = event.data;
                                 }
                            };

                        } else {
                            document.getElementById("no_access4").innerHTML = "Sorry, your browser does not support server-sent events...";

                        }
                        if (typeof (EventSource) !== "undefined") {
                            var source = new EventSource("<?php echo site_url(); ?>change/disapproved/" + compid + "/part_deed_lock/part_deed_status");
                            source.onmessage = function(event) {
                                if ( document.getElementById('disapproved4') !== null ) {
                            document.getElementById("disapproved4").style.display = event.data;
                                }
                            };

                        } else {
                            document.getElementById("disapproved4").innerHTML = "Sorry, your browser does not support server-sent events...";

                        }

                        //Authorised Signatory

                        if (typeof (EventSource) !== "undefined") {
                            var source = new EventSource("<?php echo site_url(); ?>change/lock/" + compid + "/sign_lock/sign_status");
                            source.onmessage = function(event) {
                                 if ( document.getElementById('sub_access5') !== null ) {
                            document.getElementById("sub_access5").style.display = event.data;
                                 }
                            };

                        } else {
                            document.getElementById("sub_access5").innerHTML = "Sorry, your browser does not support server-sent events...";

                        }
                        if (typeof (EventSource) !== "undefined") {
                            var source = new EventSource("<?php echo site_url(); ?>change/unlock/" + compid + "/sign_lock/sign_status");
                            source.onmessage = function(event) {
                                 if ( document.getElementById('no_access5') !== null ) {
                            document.getElementById("no_access5").style.display = event.data;
                                 }
                            };

                        } else {
                            document.getElementById("no_access5").innerHTML = "Sorry, your browser does not support server-sent events...";

                        }
                        if (typeof (EventSource) !== "undefined") {
                            var source = new EventSource("<?php echo site_url(); ?>change/disapproved/" + compid + "/sign_lock/sign_status");
                            source.onmessage = function(event) {
                                 if ( document.getElementById('disapproved5') !== null ) {
                            document.getElementById("disapproved5").style.display = event.data;
                                 }
                            };

                        } else {
                            document.getElementById("disapproved5").innerHTML = "Sorry, your browser does not support server-sent events...";

                        }

                        //Certification of Incorporation

                        if (typeof (EventSource) !== "undefined") {
                            var source = new EventSource("<?php echo site_url(); ?>change/lock/" + compid + "/cert_of_incorp_lock/cert_of_incorp_status");
                            source.onmessage = function(event) {
                                if ( document.getElementById('sub_access6') !== null ) {
                            document.getElementById("sub_access6").style.display = event.data;
                                }
                            };

                        } else {
                            document.getElementById("sub_access6").innerHTML = "Sorry, your browser does not support server-sent events...";

                        }
                        if (typeof (EventSource) !== "undefined") {
                            var source = new EventSource("<?php echo site_url(); ?>change/unlock/" + compid + "/cert_of_incorp_lock/cert_of_incorp_status");
                            source.onmessage = function(event) {
                                if ( document.getElementById('no_access6') !== null ) {
                            document.getElementById("no_access6").style.display = event.data;
                                }
                            };

                        } else {
                            document.getElementById("no_access6").innerHTML = "Sorry, your browser does not support server-sent events...";

                        }
                        if (typeof (EventSource) !== "undefined") {
                            var source = new EventSource("<?php echo site_url(); ?>change/disapproved/" + compid + "/cert_of_incorp_lock/cert_of_incorp_status");
                            source.onmessage = function(event) {
                                 if ( document.getElementById('disapproved6') !== null ) {
                            document.getElementById("disapproved6").style.display = event.data;
                                 }
                            };

                        } else {
                            document.getElementById("disapproved6").innerHTML = "Sorry, your browser does not support server-sent events...";

                        }


                        //MOA and AOA

                        if (typeof (EventSource) !== "undefined") {
                            var source = new EventSource("<?php echo site_url(); ?>change/lock/" + compid + "/moa_aoa_lock/moa_aoa_status");
                            source.onmessage = function(event) {
                                if ( document.getElementById('sub_access7') !== null ) {
                            document.getElementById("sub_access7").style.display = event.data;
                                }
                            };

                        } else {
                            document.getElementById("sub_access7").innerHTML = "Sorry, your browser does not support server-sent events...";

                        }
                        if (typeof (EventSource) !== "undefined") {
                            var source = new EventSource("<?php echo site_url(); ?>change/unlock/" + compid + "/moa_aoa_lock/moa_aoa_status");
                            source.onmessage = function(event) {
                                  if ( document.getElementById('no_access7') !== null ) {
                            document.getElementById("no_access7").style.display = event.data;
                                  }
                            };

                        } else {
                            document.getElementById("no_access7").innerHTML = "Sorry, your browser does not support server-sent events...";

                        }
                        if (typeof (EventSource) !== "undefined") {
                            var source = new EventSource("<?php echo site_url(); ?>change/disapproved/" + compid + "/moa_aoa_lock/moa_aoa_status");
                            source.onmessage = function(event) {
                                if ( document.getElementById('disapproved7') !== null ) {
                            document.getElementById("disapproved7").style.display = event.data;
                                }
                            };

                        } else {
                            document.getElementById("disapproved7").innerHTML = "Sorry, your browser does not support server-sent events...";

                        }
                    </script>
