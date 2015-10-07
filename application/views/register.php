<div id="Register_model" class="modal fade" role="dialog" style="z-index: 9999" ng-controller="Reg_for_Controller">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Seller Registration</h4>
      </div>
      <div class="modal-body">

            <div class="row" style="padding-top: 20px">
                <div class="small-9 columns small-centered zeropadding">
                    <div class="small-6 columns small-centered  zeropadding">
                                    <div class="row">
                                        <label> Register For
                                            <select id="register_for">
                                                <option value="">Select</option>
                                                <option value="Export">Export Transactions</option>
                                                <option value="Domestic">Domestic Transactions</option>
                                                <option value="Both">Both</option>
                                            </select>
                                        </label>
                                    </div>
                                </div>
                </div>
            </div>

            <div id="Export" style="display: none">
            <form  id="form_reg" action="http://sellers.bulkhouse.in/register/register_user" method="post">
                <div class="row" style="padding-top: 20px">
                    <div class="row">
                        <div class="small-9 columns small-centered zeropadding">
                            <div class="row">
                                <div class="small-12 columns  zeropadding">
                                    <div class="row">
                                        <label>Firm Type <small>required</small>
                                            <select name="firm_type" required="required">
                                                <option value="">Select</option>
                                                <option value="proprietorship">Proprietorship</option>
                                                <option value="partnership">Partnership</option>
                                                <option value="pvt_or_ltd">Private Limited Company / Limited Company</option>
                                            </select>
                                        </label>
                                    </div>
                                </div>

                                <input name="reg_as" type="hidden" value="Export">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="small-9 small-centered columns zeropadding">
                            <div class="row">

                                <input name="firm_name" type="text" id="right-label" placeholder="Please enter your Company Name" required="required">

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="small-9 columns small-centered zeropadding">
                            <div class="row">
                                <div class="small-6 columns zeropadding">
                                    <div class="row">

                                        <input name="firstname" type="text"  id="right-label" placeholder="Firstname" required="required">
                    <!--                    <small class="error">Vendor Name is required.</small>-->
                                    </div>
                                </div>

                                <div class="small-6 columns zeropadding">
                                    <div class="row">

                                        <input name="lastname" type="text"  id="right-label" placeholder="Lastname" required="required">
                    <!--                    <small class="error">Vendor Name is required.</small>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="small-9 columns small-centered zeropadding">
                            <div class="row">
                                <div class="small-8 columns zeropadding">
                                    <input name="email" type="email"  id="newEmail_Export" class="emailValidation_Export" placeholder="Please enter your Email Id" required="required" value="">
                                </div>

                                <div class="small-4 columns zeropadding">
                                    <span id="usr_verify" class="verify" style="display: none; font-size: 0.8em; padding: 10px" >Valid Email <i class="fa fa-check"></i></span>
                                    <span id="usr_verify" class="verify_none" style="display: none; font-size: 0.8em;padding: 10px" >This Email-Id is already in use <i class="fa fa-times"></i></span>
                                    <span id="usr_verify" class="verify_none_chk" style="display: none; font-size: 0.8em;padding: 10px" >Not a Valid Email <i class="fa fa-times"></i></span>

                    <!--<span id="usr_verify" class="verify_not_done" >no</span>-->

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="small-9 columns small-centered zeropadding">
                            <div class="row">
                                <div class="small-6 columns zeropadding">
                                    <div class="row">

                                        <input name="password" type="password"  id="password"  placeholder="Please enter Password" required>
                                        <!--<small class="error">Please Enter Password.</small>-->
                                    </div>
                                </div>
                                <div class="small-6 columns  zeropadding">
                                    <div class="row">

                                        <input  type="password"  id="confirm_password"  placeholder="Please repeat Password" required><!--
                    <!--                    <small class="error">Please Repeat Password.</small>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="small-9 columns small-centered zeropadding">
                            <div class="row">

                                <input name="mobile" type="number"  id="right-label" pattern="^[7-9][0-9]{9}$" placeholder="Please enter your Mobile number" required="required">
            <!--                    <small class="error">An Phone Number is required.</small>-->
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="large-9 columns small-centered zeropadding">
                            <input id="checkbox1" type="checkbox" required="required">
                            <label for="checkbox1" style="font-size: 0.8em"> I agree to the Terms & Conditions (Export <a href="http://sellers.bulkhouse.in/export_terms">)View</a></label>

                        </div>
                    </div>

                    <div class="row">
                        <div class="large-4 columns large-centered zeropadding">

                            <input id="reg" class="button radius md-close" type="submit" value="Register" style="margin: 0px"/>

                        </div>
                    </div>
                </div>
            </form>
            </div>
            <div id="Domestic" style="display: none">
            <form  id="form_reg" action="http://sellers.bulkhouse.in/register/register_user" method="post">
                <div class="row" style="padding-top: 20px">
                    <div class="row">
                        <div class="small-9 columns small-centered zeropadding">
                            <div class="row">
                                <div class="small-12 columns  zeropadding">
                                    <div class="row">
                                        <label>Firm Type <small>required</small>
                                            <select name="firm_type" required="required">
                                                <option value="">Select</option>
                                                <option value="proprietorship">Proprietorship</option>
                                                <option value="partnership">Partnership</option>
                                                <option value="pvt_or_ltd">Private Limited Company / Limited Company</option>
                                            </select>
                                        </label>
                                    </div>
                                </div>

                                 <input name="reg_as" type="hidden" value="Domestic">


                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="small-9 small-centered columns zeropadding">
                            <div class="row">

                                <input name="firm_name" type="text" id="right-label" placeholder="Please enter your Company Name" required="required">

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="small-9 columns small-centered zeropadding">
                            <div class="row">
                                <div class="small-6 columns zeropadding">
                                    <div class="row">

                                        <input name="firstname" type="text"  id="right-label" placeholder="Firstname" required="required">
                    <!--                    <small class="error">Vendor Name is required.</small>-->
                                    </div>
                                </div>

                                <div class="small-6 columns zeropadding">
                                    <div class="row">

                                        <input name="lastname" type="text"  id="right-label" placeholder="Lastname" required="required">
                    <!--                    <small class="error">Vendor Name is required.</small>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="small-9 columns small-centered zeropadding">
                            <div class="row">
                                <div class="small-8 columns zeropadding">
                                    <input name="email" type="email"  id="newEmail_Domestic" class="emailValidation_Domestic" placeholder="Please enter your Email Id" required="required" value="">
                                </div>

                                <div class="small-4 columns zeropadding">
                                    <span id="usr_verify" class="verify" style="display: none; font-size: 0.8em; padding: 10px" >Valid Email <i class="fa fa-check"></i></span>
                                    <span id="usr_verify" class="verify_none" style="display: none; font-size: 0.8em;padding: 10px" >This Email-Id is already in use <i class="fa fa-times"></i></span>
                                    <span id="usr_verify" class="verify_none_chk" style="display: none; font-size: 0.8em;padding: 10px" >Not a Valid Email <i class="fa fa-times"></i></span>

                    <!--<span id="usr_verify" class="verify_not_done" >no</span>-->

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="small-9 columns small-centered zeropadding">
                            <div class="row">
                                <div class="small-6 columns zeropadding">
                                    <div class="row">

                                        <input name="password" type="password"  id="password"  placeholder="Please enter Password" required>
                                        <!--<small class="error">Please Enter Password.</small>-->
                                    </div>
                                </div>
                                <div class="small-6 columns  zeropadding">
                                    <div class="row">

                                        <input  type="password"  id="confirm_password"  placeholder="Please repeat Password" required><!--
                    <!--                    <small class="error">Please Repeat Password.</small>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="small-9 columns small-centered zeropadding">
                            <div class="row">

                                <input name="mobile" type="number"  id="right-label" pattern="^[7-9][0-9]{9}$" placeholder="Please enter your Mobile number" required="required">
            <!--                    <small class="error">An Phone Number is required.</small>-->
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="large-9 columns small-centered zeropadding">
                            <input id="checkbox1" type="checkbox" required="required">
                            <label for="checkbox1" style="font-size: 0.8em"> I agree to the Terms & Conditions (Domestic <a href="http://sellers.bulkhouse.in/domestic_terms">)View</a></label>

                        </div>
                    </div>

                    <div class="row">
                        <div class="large-4 columns large-centered zeropadding">

                            <input id="reg" class="button radius md-close" type="submit" value="Register" style="margin: 0px"/>

                        </div>
                    </div>
                </div>
            </form>
            </div>
            <div id="Both" style="display: none">
            <form  id="form_reg" action="http://sellers.bulkhouse.in/register/register_user" method="post">
                <div class="row" style="padding-top: 20px">
                    <div class="row">
                        <div class="small-9 columns small-centered zeropadding">
                            <div class="row">
                                <div class="small-12 columns  zeropadding">
                                    <div class="row">
                                        <label>Firm Type <small>required</small>
                                            <select name="firm_type" required="required">
                                                <option value="">Select</option>
                                                <option value="proprietorship">Proprietorship</option>
                                                <option value="partnership">Partnership</option>
                                                <option value="pvt_or_ltd">Private Limited Company / Limited Company</option>
                                            </select>
                                        </label>
                                    </div>
                                </div>

                                 <input name="reg_as" type="hidden" value="Both">


                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="small-9 small-centered columns zeropadding">
                            <div class="row">

                                <input name="firm_name" type="text" id="right-label" placeholder="Please enter your Company Name" required="required">

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="small-9 columns small-centered zeropadding">
                            <div class="row">
                                <div class="small-6 columns zeropadding">
                                    <div class="row">

                                        <input name="firstname" type="text"  id="right-label" placeholder="Firstname" required="required">
                    <!--                    <small class="error">Vendor Name is required.</small>-->
                                    </div>
                                </div>

                                <div class="small-6 columns zeropadding">
                                    <div class="row">

                                        <input name="lastname" type="text"  id="right-label" placeholder="Lastname" required="required">
                    <!--                    <small class="error">Vendor Name is required.</small>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="small-9 columns small-centered zeropadding">
                            <div class="row">
                                <div class="small-8 columns zeropadding">
                                    <input name="email" type="email"  id="newEmail_Both" class="emailValidation_Both" placeholder="Please enter your Email Id" required="required" value="">
                                </div>

                                <div class="small-4 columns zeropadding">
                                    <span id="usr_verify" class="verify" style="display: none; font-size: 0.8em; padding: 10px" >Valid Email <i class="fa fa-check"></i></span>
                                    <span id="usr_verify" class="verify_none" style="display: none; font-size: 0.8em;padding: 10px" >This Email-Id is already in use <i class="fa fa-times"></i></span>
                                    <span id="usr_verify" class="verify_none_chk" style="display: none; font-size: 0.8em;padding: 10px" >Not a Valid Email <i class="fa fa-times"></i></span>

                    <!--<span id="usr_verify" class="verify_not_done" >no</span>-->

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="small-9 columns small-centered zeropadding">
                            <div class="row">
                                <div class="small-6 columns zeropadding">
                                    <div class="row">

                                        <input name="password" type="password"  id="password"  placeholder="Please enter Password" required>
                                        <!--<small class="error">Please Enter Password.</small>-->
                                    </div>
                                </div>
                                <div class="small-6 columns  zeropadding">
                                    <div class="row">

                                        <input  type="password"  id="confirm_password"  placeholder="Please repeat Password" required><!--
                    <!--                    <small class="error">Please Repeat Password.</small>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="small-9 columns small-centered zeropadding">
                            <div class="row">

                                <input name="mobile" type="number"  id="right-label" pattern="^[7-9][0-9]{9}$" placeholder="Please enter your Mobile number" required="required">
            <!--                    <small class="error">An Phone Number is required.</small>-->
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="large-9 columns small-centered zeropadding">
                            <div class="large-6 columns">
                            <input id="checkbox1" type="checkbox" required="required">
                            <label for="checkbox1" style="font-size: 0.8em"> I agree to the Terms & Conditions (Export <a href="http://sellers.bulkhouse.in/export_terms">)View</a></label>
                            </div>
                            <div class="large-6 columns">
                            <input id="checkbox1" type="checkbox" required="required">
                            <label for="checkbox1" style="font-size: 0.8em"> I agree to the Terms & Conditions (Domestic <a href="http://sellers.bulkhouse.in/domestic_terms">)View</a></label>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="large-4 columns large-centered zeropadding">

                            <input id="reg" class="button radius md-close" type="submit" value="Register" style="margin: 0px"/>

                        </div>
                    </div>
                </div>
            </form>
            </div>
      </div>

    </div>

  </div>
</div>