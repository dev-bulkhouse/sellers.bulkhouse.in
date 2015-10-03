<header class="header b-b">
    <div class="col-lg-6 col-md-8  col-sm-12" style="padding: 15px 0px 0px 0px">
        <p <h5> Welcome to <b style="padding-right: 5px; padding: 3px 10px; background-color: #b4b4b4; color: white"><?php
                if (isset($firm_name)) {

                    echo $firm_name;
                }
                ?></b><span> You have Registered as - <b style="padding-right: 5px; padding: 3px 10px; background-color: #b4b4b4; color: white"><?php
                if ($firm_type == "proprietorship") {
                    echo "Proprietorship Firm";
                } elseif ($firm_type == "partnership") {
                    echo "PartnerShip Firm";
                } elseif ($firm_type == "pvt_or_ltd") {
                    echo "Private LTD or Limited Firm";
                }
                ?></b></span></h5></p>
    </div>
    <div class="col-lg-6 col-md-4  col-sm-12 " style="padding: 15px 0px 0px 0px; text-align: right"><a href="<?php echo site_url(); ?>user/logout"><i class="fa fa-sign-out"></i> logout</a></div>
</header>