<?php
//if (!isset($email_id)) {
//
//   redirect(base_url(),'location');
//}
//$email = $email_id;
$email = "gssvenkatesh92@gmail.com";
$phone = "+917386305571";
$firm_name = "ORBIT.Co.Ltd";
?>

    <link rel="stylesheet" href="/css/foundation.css" />
   <link href="/css/zurb5-multiselect.css" rel="stylesheet" type="text/css"/>
    <script src="/js/vendor/modernizr.js"></script>
        <script src="/js/jquery-1.9.1.min.js"></script>
        <script src="/js/countries.js" type="text/javascript"></script>
       <script>
        window.onmousedown = function (e) {
    var el = e.target;
    if (el.tagName.toLowerCase() == 'option' && el.parentNode.hasAttribute('multiple')) {
        e.preventDefault();

        // toggle selection
        if (el.hasAttribute('selected')) el.removeAttribute('selected');
        else el.setAttribute('selected', '');

        // hack to correct buggy behavior
        var select = el.parentNode.cloneNode(true);
        el.parentNode.parentNode.replaceChild(select, el.parentNode);
    }
}
        </script>
        <script>
               function addSubject(){
    selectedSubject = document.getElementById('reg_as').value
    if (selectedSubject == 'Both'){
        document.getElementById('max_credit_limit').style.visibility = 'visible';
         document.getElementById('max_credit_limit').style.display = '';
        
}
else
{
//Hide the textbox
document.getElementById('max_credit_limit').style.visibility = 'hidden';
         document.getElementById('max_credit_limit').style.display = 'none';

}
    }


            </script>
    <body>
    <form action="<?php echo base_url(); ?>register/register_user" method="post" data-abide>
        <div id="register">
	<div class="fieldset">
        <fieldset>
        <h2 class="fs-title" style="border-bottom: 1px solid"><i class="fa fa-user-plus"></i> Vendor Registration</h2>
                  <br>

                <div class="email-field large-12 columns">
                    <label>Email Id<small> Verified <i class="fa fa-check"></i></small>

                        <input disabled=""  value="<?php echo $email; ?>" type="email" required>
                        <input name="email" value="<?php echo $email; ?>" type="hidden">
                    </label>

                </div>
                <div class="password-field large-6 columns">
                    <label>Password <small>required</small>
                        <input id="password" type="password" name="password" required placeholder="please enter password">
                    </label>
                    <small class="error">Please enter a valid password.</small>
                </div>
                <div class="confirm-password-field large-6 columns">
                    <label>Confirm Password <small>required</small>
                        <input type="password" required data-equalto="password" data-invalid="" placeholder="please confirm password" >
                    </label>
                    <small class="error">Passwords must match.</small>
                </div>
                  <div class="vendor-field large-12 columns">
                    <label>Vendor First Name <small>required</small>
                        <input type="text" name="vendor_name" placeholder="Please Enter your Name" required>
                    </label>
                    <small class="error">Please enter a valid name.</small>
                </div>
                    <div class="vendor-field large-12 columns">
                    <label>Vendor Last Name <small>required</small>
                        <input type="text" name="last_name" placeholder="Please Enter your Last Name" required>
                    </label>
                    <small class="error">Please enter a valid name.</small>
                </div>
                 <div class="phone-field large-6 columns">
                    <label>Mobile <small> To be Verified <i class="fa fa-close"></i></small>
                        <input disabled="" value="<?php echo $phone; ?>" type="text" required>
                    </label>
                    <small class="error">Please enter a valid name.</small>
                </div>
                <input name="mobile" value="<?php echo $phone; ?>" type="hidden">

                <div class="Form_submit large-6 columns">
                    <input type="button" name="next" id="next" class="next button" value="Next"  />
                </div>
          </fieldset>
	</div>
	<div class="fieldset">
        <fieldset>
		<h2 class="fs-title" style="border-bottom: 1px solid"><i class="fa fa-building-o"></i> Firm Details</h2>
		<br>
		<div class="Firm_Name large-12 columns">
                    <label>Firm Name <small>required</small>
                          <input disabled=""  value="<?php echo $firm_name; ?>" type="text" required>
                        <input name="firm_name" value="<?php echo $firm_name; ?>" type="hidden">
                    </label>
                </div>
		<div class="Firm_Category-field large-12 columns">
                    <label>Firm Type <small>required</small>
                        <select name="firm_type">
                            <option value="">Select</option>
                            <option value="proprietorship">Proprietorship</option>
                            <option value="partnership">Partnership</option>
                            <option value="pvt_or_ltd">Private Limited Company / Limited Company</option>
                        </select>
                    </label>
                    <small class="error">Please enter a valid name.</small>
                </div>
                 <div class="landline-field large-6 columns" >
                    <label>Register as <small>required</small>
                         <select name="reg_as" id="reg_as" onchange="addSubject()">
                            <option value="">Select</option>
                            <option value="Export">Export</option>
                            <option value="Domestic">Domestic</option>
                            <option value="Both">Both</option>
                        </select>

                    </label>
                       </div>
                  
                 <div class="landline-field large-6 columns">
                    <label>
                  <select name="max_credit_limit" id="max_credit_limit" >
          <option value="">Max credit Limit</option>
          <option value="1 to 25">1 to 25</option>
          <option value="25 to 50">25 to 50</option>
          <option value="50 to 100">50 to 100</option>
          <option value="Above 100">Above 100</option>
        </select>
                    </label>
                    <small class="error">Please enter a Credit.</small>
                </div>
                
              

                <div class="Form_submit large-6 columns">
		<input type="button" name="previous" class="previous button" value="Previous">
		<input type="button" name="next" class="next button" value="Next">
                </div>
        </fieldset>
	</div>
	<div class="fieldset">
        <fieldset>
		<h2 class="fs-title" style="border-bottom: 1px solid"><i class="fa fa-phone"></i> Contact Information</h2>
		<br>
                <div class="vendor-field large-12 columns">
                    <label>Address 1 <small>required</small>
                        <input type="text" name="address1" placeholder="Please Enter your Address" required>
                    </label>
                    <small class="error">Please enter a Address.</small>
                </div>
                 <div class="vendor-field large-12 columns">
                    <label>Address 2 <small>required</small>
                        <input type="text" name="address2" placeholder="Please Enter your Address" required>
                    </label>
                    <small class="error">Please enter a Address.</small>
                </div>
                <div class="landline-field large-6 columns">
                    <label>City <small>required</small>
                        <input type="text" name="city" placeholder="Enter city" required>
                    </label>
                    <small class="error">Please enter a city name.</small>
                </div>
                 
                
                
                                                          <div class="landline-field large-6 columns">
                                                               <label>Country <small>required</small>
                                                                <select id="country" name="country"  class="bg-focus form-control" placeholder="Select Country"></select>
                                                                 </label>
                    <small class="error">Please enter a state name.</small>
                </div>
                                                        
                                                           <div class="landline-field large-6 columns">
                                                   <label>State/Province/Region <small>required</small>
       
                                                          <select name="state" id="state" class="bg-focus form-control" placeholder="Enter state"  ></select>
                                                      
                                                          <script language="javascript">
                                                populateCountries("country", "state");

                                                     </script>
                                   
                                          </label>
                    <small class="error">Please enter a state name.</small>
                </div>
                
                
                
    
                <div class="landline-field large-6 columns">
                    <label>Postal/Zip Code <small>required</small>
                        <input type="text" name="pin_code" placeholder="Enter Postal/Zip Code" required>
                    </label>
                    <small class="error">Please enter Postal/Zip Code.</small>
                </div>
            
                <div class="landline-field large-6 columns">
                    <label>Contact Person <small>required</small>
                        <input type="text" name="contact_name" placeholder="Enter Contact Person" required>
                    </label>
                    <small class="error">Please enter Contact Number.</small>
                </div>
                 <div class="landline-field large-6 columns">
                    <label>Mobile <small>required</small>
                        <input type="text" name="mobile_contact" placeholder="Enter Company Mobile" required>
                    </label>
                    <small class="error">Please enter Company Mobile.</small>
                </div>
                 <div class="email-field large-12 columns">
                    <label>e-mail <small>required</small>
                        <input type="text" name="email_contact" placeholder="Enter Company email" required>
                    </label>
                    <small class="error">Please Company email.</small>
                </div>
                <div class="email-field large-12 columns">
                    <label>Website <small>required</small>
                        <input type="text" name="website" placeholder="Enter Company website">
                    </label>
                    <small class="error">Please Company Website.</small>
                </div>
		<div class="landline-field large-6 columns">
                    <label>Land line <small>required</small>
                        <input type="text" name="land_line" placeholder="Enter Landline" required>
                    </label>
                    <small class="error">Please enter a valid name.</small>
                </div>


		<div class="Form_submit large-6 columns">
                   <input type="button" name="previous" class="previous button" value="Previous">
		<input type="button" name="next" class="next button" value="Next">
                </div>

	</div>
            <div class="fieldset">
            <fieldset>
  <h2 class="fs-title" style="border-bottom: 1px solid"><i class="fa fa-user"></i> Please Create Your Company Profile </h2>

      <div class="large-12 columns">
        <label>Company Profile</label>
        <input type="file" name="comp_profile" placeholder="Upload Company Profile">
      </div>
         <div class="landline-field large-6 columns">
            <label>Year of Establishment <small>required</small>
                 <input type="text" name="year_establishment" placeholder="Enter Year" required>
            </label>
                    <small class="error">Please enter a Year of Establishment.</small>
                </div>
       <div class="landline-field large-6 columns">
      <label>No. of Employees <small>required</small>
       <select name="no_employees">
          <option value="">Select</option>
          <option value="1 to 25">1 to 25</option>
          <option value="25 to 50">25 to 50</option>
          <option value="50 to 100">50 to 100</option>
          <option value="Above 100">Above 100</option>
        </select>
      </label>
         </div>
       <div class="landline-field large-6 columns">
            <label>Company Turnover <small>required</small>
        <input type="text" placeholder="Company Turnover" name="comp_turnover">
        </label>
                    <small class="error">Please enter a Company Turnover.</small>
      </div>

        <div class="landline-field large-6 columns">
            <label>Registration Category <small>required</small>

      <select name="reg_category">
          <option value="">Select</option>
          <option value="Stockist/Distributor">Stockist / Distributor</option>
          <option value="MSME/SSI">MSME / SSI </option>
          <option value="Exporter">Exporter </option>
          <option value="OriginalManufacturer">Original Manufacturer</option>
           <option value="Distributor/Agency">Distributor / Agency</option>
            <option value="Others">Others</option>
        </select>
      </label>
         <small class="error">Please enter a Registration Category</small>
         </div>

<!--  <div class="landline-field large-12 columns">
       <label>Please tell us your Product Categories <small>required</small>
    <select name="sites-list" size="12" multiple>
        <option value="site-1">Foods & Beverages Mart</option>
        <option value="site-2">The Fashion Mart</option>
        <option value="site-3">The Home Mart</option>
        <option value="site-4">Mobiles & Consumer Electronics</option>
        <option value="site-5">Packing Stationery,Office and School Mart</option>
        <option value="site-6">Electrical,Lighting & Tools Mart</option>
        <option value="site-7">Sports &Toys Mart</option>
        <option value="site-8">Security , Computers & Telecom Mart</option>
        <option value="site-9">Agriculture Mart</option>
         <option value="site-10">Construction Mart</option>
          <option value="site-11">Industrial Mart</option>
           <option value="site-12">Premium Mart</option>
    </select>
            </label>
  <small class="error">Check Product Categories</small>
</div>-->

              <div class="landline-field large-12 columns">
                <label for="box2">Please tell us your Product Categories <small>required</small></label>
                <select id="box2" name="pro_category[]" multiple="multiple">
        <option value="1">Foods & Beverages Mart</option>
        <option value="2">The Fashion Mart</option>
        <option value="3">The Home Mart</option>
        <option value="4">Mobiles & Consumer Electronics</option>
        <option value="5">Packing Stationery,Office and School Mart</option>
        <option value="6">Electrical,Lighting & Tools Mart</option>
        <option value="7">Sports &Toys Mart</option>
        <option value="8">Security , Computers & Telecom Mart</option>
        <option value="9">Agriculture Mart</option>
        <option value="10">Construction Mart</option>
        <option value="11">Industrial Mart</option>
        <option value="12">Premium Mart</option>
                </select>
        <small class="error">Check Product Categories</small>
              </div>


      <div class="landline-field large-6 columns">
          <label>Sales Tax registration(VAT/ TIN) No <small>required</small>

        <input type="text" placeholder="VAT / TIN" name="tax_reg">
        </label>
           <small class="error">Please enter a Tax registration</small>
      </div>
  <div class="landline-field large-6 columns">
           <label>Quality Certification of products <small>required</small>
      <select name="cert_products">
             <option value="">Select</option>
          <option value="ISI/BSI">ISI / BSI</option>
          <option value="ISO">ISO </option>
          <option value="AnyOther">Any Other </option>

        </select>
      </label>
        <small class="error">Please enter a Certification of products</small>
         </div>


   <div class="terms_of_conditions large-12 columns">
                    <label><small>By creating an account you have read and agree to the <a href="#">terms and conditions</a>.</small></label>
                   <label for="checkbox">I Agree<input id="checkbox" type="checkbox" required name="agree" value="1">
                    <small class="error">You must agree to the terms and conditions.</small>
                     </label>
   </div>


                 <div class="Form_submit large-6 columns">
                    <input class="button expand" id="submit" type="submit">
                    <input type="button" name="previous" class="previous button" value="Previous">
                </div>
  </fieldset>
                </div>
        </div>
    </form>
    <script>
      $('select').foundationSelect();
      $(document).foundation();
    </script>
    </body>

  <script>
$(document).ready(function(){
    $.multistepform({
        container:'register',
        form_method:'get',
    })
});
</script>
<link href="/css/multi.css" rel="stylesheet" type="text/css"/>
<link href="/css/foundation-select.css" rel="stylesheet" type="text/css"/>
<script src="/js/vendor/jquery.js"></script>
<script src="/js/foundation/foundation.js"></script>
<script src="/js/foundation/foundation.equalizer.js"></script>
<script src="/js/foundation/foundation.dropdown.js"></script>
<script src="/js/foundation/foundation-select.js" type="text/javascript"></script>
<script src="http://thecodeplayer.com/uploads/js/jquery-1.9.1.min.js" type="text/javascript"></script>
<script src="http://thecodeplayer.com/uploads/js/jquery.easing.min.js" type="text/javascript"></script>
<script src="/js/multi.js" type="text/javascript"></script>
<script src="/js/zurb5-multiselect.js" type="text/javascript"></script>

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

</script>
 <script type="text/javascript">
$("select#box2").zmultiselect({
    live: false,
    placeholder: "Product Categories",
    filter: false
});
</script>