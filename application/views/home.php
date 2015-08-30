<div class="row-fluid">
    <div>

        <div class="large-12 columns" style="background-image: url('http://sellers.bulkhouse.in/assets/img/grid-01_morelite.pngg')">
            <div class="large-12 columns large-centered" >
                <div class="large-4 columns medium-4" style="padding: 10px 50px 10px 10px"><img width="100%" src="http://sellers.bulkhouse.in/assets/img/bulkhouse_fnal_logo-01_small-01.png" alt=""/></div>
                <div class="large-4 columns medium-4 show-for-medium-up right" style="padding: 10px 50px 10px 10px">
                    <a href="#" data-reveal-id="register" class="radius button small" style="position: relative;float: right; margin: 10px; z-index: 999"><b>Register as Seller</b></a>
                    <a href="#" data-reveal-id="login" class="radius button small" style="position: relative;float: right; margin: 10px; z-index: 999"><b>Login</b></a>
                </div>
                <div class="columns small-12 small-centered show-for-small-down" style="padding: 10px 50px 10px 10px">
                    <a href="#" data-reveal-id="register" class="radius button" style="position: relative; margin: 10px; z-index: 999"><b>Register as Seller</b></a>
                    <a href="#" data-reveal-id="login" class="radius button" style="position: relative; margin: 10px; z-index: 999"><b>Login</b></a>
                </div>
            </div>
        </div>


        <div class="row-fluid">


            <div class="large-8 columns" style="margin-top: 100px;z-index: 999"><?php $this->load->view('alert/success-message'); ?></div>
        </div>

        <div id="login" class="reveal-modal tiny" data-reveal aria-labelledby="firstModalTitle" aria-hidden="true" role="dialog">
            <h3 class="subheader">Seller Login </h3>
            <!--  <form action="/user/login_user" method="post" data-abide>-->
            <form action="/user/login_user" method="post">
                <div class="row" style="padding-top: 20px">
                    <div class="row">
                        <div class="large-12 columns">

                            <div class="row">
                                <div class="small-9 columns small-centered zeropadding">
                                    <div class="row">
                                        <input type="email" name="email" placeholder="Email Id" required="required">
                <!--                        <small class="error">Please enter a valid Email.</small>-->
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="small-9 columns small-centered zeropadding">
                                    <div class="row">
                                        <input type="password" name="password" placeholder="Password" required="required">
                    <!--                    <small class="error">Please enter a valid password.</small>-->
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="small-9 columns small-centered zeropadding">
                                    <div class="row">
                                        <a href="#" data-reveal-id="forgotpassword"><p style="font-size: 0.9em">forgot password?</p></a>
              <!--                    <small class="error">Please enter a valid password.</small>-->
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="large-4 columns large-centered zeropadding">

                                    <input class="button radius small md-close" type="submit" value="Login" style="margin: 0px"/>


                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </form>
            <a class="close-reveal-modal" aria-label="Close">&#215;</a>
        </div>
        <div id="forgotpassword" class="reveal-modal tiny" data-reveal aria-labelledby="firstModalTitle" aria-hidden="true" role="dialog">
            <h3 class="subheader">Forgot password</h3>
            <form action="/login/reset_password" method="post">
                <div class="row" style="padding-top: 20px">
                    <div class="row">
                        <div class="large-12 columns">

                            <div class="row">
                                <div class="small-9 columns small-centered zeropadding">
                                    <div class="row">
                                        <input type="email" name="email" placeholder="Please enter registered Email Id" required="required">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="large-4 columns large-centered zeropadding">

                                    <input class="button radius small md-close" type="submit" value="Submit" style="margin: 0px"/>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <a class="close-reveal-modal" aria-label="Close">&#215;</a>
        </div>

        <div id="register" class="reveal-modal" data-reveal aria-labelledby="firstModalTitle" aria-hidden="true" role="dialog" ng-controller="Reg_for_Controller">
            <h3 class="subheader">Seller Registration</h3>

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
            <form  id="form_reg" action="/register/register_user" method="post">
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
                                    <input name="email" type="email"  id="email" placeholder="Please enter your Email Id" required="required" value="<?php echo set_value('email'); ?>">
                                </div>

                                <div class="small-4 columns zeropadding">
                                    <span id="usr_verify" class="verify" style="display: none; font-size: 0.8em; padding: 10px" >Valid Email <i class="fa fa-check"></i></span>
                                    <span id="usr_verify" class="verify_none" style="display: none;font-size: 0.8em;padding: 10px" >This Email-Id is already in use <i class="fa fa-times"></i></span>
                                    <span id="usr_verify" class="verify_none_chk" style="display: none;font-size: 0.8em;padding: 10px" >Not a Valid Email <i class="fa fa-times"></i></span>

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
                            <label for="checkbox1" style="font-size: 0.8em"> I agree to the Terms & Conditions (Export <a href="http://sellers.bulkhouse.in/export_terms">View</a>)</label>

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
            <form  id="form_reg" action="/register/register_user" method="post">
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
                                    <input name="email" type="email"  id="email" placeholder="Please enter your Email Id" required="required" value="<?php echo set_value('email'); ?>">
                                </div>

                                <div class="small-4 columns zeropadding">
                                    <span id="usr_verify" class="verify" style="display: none; font-size: 0.8em; padding: 10px" >Valid Email <i class="fa fa-check"></i></span>
                                    <span id="usr_verify" class="verify_none" style="display: none;font-size: 0.8em;padding: 10px" >This Email-Id is already in use <i class="fa fa-times"></i></span>
                                    <span id="usr_verify" class="verify_none_chk" style="display: none;font-size: 0.8em;padding: 10px" >Not a Valid Email <i class="fa fa-times"></i></span>

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
                            <label for="checkbox1" style="font-size: 0.8em"> I agree to the Terms & Conditions (Domestic <a href="http://sellers.bulkhouse.in/domestic_terms">View</a>)</label>

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
            <form  id="form_reg" action="/register/register_user" method="post">
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
                                    <input name="email" type="email"  id="email" placeholder="Please enter your Email Id" required="required" value="<?php echo set_value('email'); ?>">
                                </div>

                                <div class="small-4 columns zeropadding">
                                    <span id="usr_verify" class="verify" style="display: none; font-size: 0.8em; padding: 10px" >Valid Email <i class="fa fa-check"></i></span>
                                    <span id="usr_verify" class="verify_none" style="display: none;font-size: 0.8em;padding: 10px" >This Email-Id is already in use <i class="fa fa-times"></i></span>
                                    <span id="usr_verify" class="verify_none_chk" style="display: none;font-size: 0.8em;padding: 10px" >Not a Valid Email <i class="fa fa-times"></i></span>

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
                            <label for="checkbox1" style="font-size: 0.8em"> I agree to the Terms & Conditions (Export <a href="http://sellers.bulkhouse.in/export_terms">View</a>)</label>
                            </div>
                            <div class="large-6 columns">
                            <input id="checkbox1" type="checkbox" required="required">
                            <label for="checkbox1" style="font-size: 0.8em"> I agree to the Terms & Conditions (Domestic <a href="http://sellers.bulkhouse.in/domestic_terms">View</a>)</label>
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
            <a class="close-reveal-modal" aria-label="Close">&#215;</a>
        </div>

        <!--          <div class="row-fluid">
                      <div class="large-8 columns large-centered" style="height: 100px">
                      <div class="large-12 columns large-centered show-for-large-up">
                          <div style="text-align: center; font-size: 4em;"><span style="color: transparent">.</span><span  class="typed"></span></div>
                      </div>
                      <div class="small-12 columns small-centered show-for-medium-down">
                          <div style="text-align: center; font-size: 2em;"><span style="color: transparent">.</span><span  class="typed"></span></div>
                      </div>
                      </div>
                  </div>-->
        <!--          <div class="row-fluid">
                      <div class="large-12 columns" style="position: relative; margin-bottom:0px">

                      <div  class="large-6 columns large-centered ">
                <p id="type2" style="text-align: center"></p>
                <form action="http://sellers.bulkhouse.in/assets/insert.php" method="post" data-abide>
              <div class="row collapse">

                <div class="small-7 columns email-field">

                    <input type="email" name="email" required placeholder="Enter Email Id here">
                    <small class="error">An email address is required.</small>
                </div>
                <div class="small-5 columns">
                    <input type="submit" class="button postfix" value="Go">

                </div>

              </div>
                    </form>
            </div>
                          <div class="large-10 columns large-centered"><p style="text-align: center">Subscribe for an exclusive free pre-launch sign-up offer</p></div>
                      </div>

          </div>-->
    </div>
</div>
<!--<script src="js/vendor/jquery.js"></script>-->
<script src="http://sellers.bulkhouse.in/assets/js/foundation.min.js"></script>
<script>
    $(document).foundation();
</script>