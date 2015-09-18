<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Seller | Bulkhouse</title>
        <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav">
        <meta name="keywords" content="modal, window, overlay, modern, box, css transition, css animation, effect, 3d, perspective" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css"/>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <!--
        <script src="<?php echo site_url(); ?>js/vendor.js" type="text/javascript"></script>-->
        <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.4.3/angular.min.js"></script>
        <link rel="stylesheet" href="<?php echo site_url() ?>/assets/css/foundation.css" />
        <style>
            /* code for animated blinking cursor */
            .typed-cursor{
                opacity: 1;
                font-weight: 100;
                -webkit-animation: blink 0.7s infinite;
                -moz-animation: blink 0.7s infinite;
                -ms-animation: blink 0.7s infinite;
                -o-animation: blink 0.7s infinite;
                animation: blink 0.7s infinite;
            }
            @-keyframes blink{
                0% { opacity:1; }
                50% { opacity:0; }
                100% { opacity:1; }
            }
            @-webkit-keyframes blink{
                0% { opacity:1; }
                50% { opacity:0; }
                100% { opacity:1; }
            }
            @-moz-keyframes blink{
                0% { opacity:1; }
                50% { opacity:0; }
                100% { opacity:1; }
            }
            @-ms-keyframes blink{
                0% { opacity:1; }
                50% { opacity:0; }
                100% { opacity:1; }
            }
            @-o-keyframes blink{
                0% { opacity:1; }
                50% { opacity:0; }
                100% { opacity:1; }
            }
            .msg-block {
                margin-top:5px;
            }
            .msg-error {
                color:#F00;
                font-size:14px;
            }
        </style>
        <style>
            input[type=number]::-webkit-inner-spin-button,
            input[type=number]::-webkit-outer-spin-button {
                -webkit-appearance: none;
                margin: 0;


            }
        </style>

    </head>
    <body   style="background-color: #A0000E">
        <script type="text/javascript">
            window.onload = function () {
                document.getElementById("password").onchange = validatePassword;
                document.getElementById("confirm_password").onchange = validatePassword;
            }
            function validatePassword() {
                var pass2 = document.getElementById("confirm_password").value;
                var pass1 = document.getElementById("password").value;
                if (pass1 != pass2)
                    document.getElementById("confirm_password").setCustomValidity("Passwords Don't Match");
                else
                    document.getElementById("confirm_password").setCustomValidity('');
//empty string means no validation error
            }
        </script>

        <script type="text/javascript">
            $(document).ready(function () {


                $(".emailValidation_Export").blur(function (e) {
                    e.preventDefault();
                    $.post("http://sellers.bulkhouse.in/register/check_user", {email: $("#newEmail_Export").val()}, function (data) {
                        if (data === "true") {
                            $(".verify").css("display", "block");
                            $(".verify_none").css("display", "none");
                            $(".verify_none_chk").css("display", "none");
                        } else if (data === "false") {
                            $(".verify_none").css("display", "block");
                            $(".verify").css("display", "none");
                            $(".verify_none_chk").css("display", "none");
                        } else if (data === "unknown") {
                            $(".verify").css("display", "none");
                            $(".verify_none").css("display", "none");
                            $(".verify_none_chk").css("display", "block");
                        }
                    });
                });

                $(".emailValidation_Domestic").blur(function (e) {
                    e.preventDefault();
                    $.post("http://sellers.bulkhouse.in/register/check_user", {email: $("#newEmail_Domestic").val()}, function (data) {
                        if (data === "true") {
                            $(".verify").css("display", "block");
                            $(".verify_none").css("display", "none");
                            $(".verify_none_chk").css("display", "none");
                        } else if (data === "false") {
                            $(".verify_none").css("display", "block");
                            $(".verify").css("display", "none");
                            $(".verify_none_chk").css("display", "none");
                        } else if (data === "unknown") {
                            $(".verify").css("display", "none");
                            $(".verify_none").css("display", "none");
                            $(".verify_none_chk").css("display", "block");
                        }
                    });
                });

                $(".emailValidation_Both").blur(function (e) {
                    e.preventDefault();
                    $.post("http://sellers.bulkhouse.in/register/check_user", {email: $("#newEmail_Both").val()}, function (data) {
                        if (data === "true") {
                            $(".verify").css("display", "block");
                            $(".verify_none").css("display", "none");
                            $(".verify_none_chk").css("display", "none");
                        } else if (data === "false") {
                            $(".verify_none").css("display", "block");
                            $(".verify").css("display", "none");
                            $(".verify_none_chk").css("display", "none");
                        } else if (data === "unknown") {
                            $(".verify").css("display", "none");
                            $(".verify_none").css("display", "none");
                            $(".verify_none_chk").css("display", "block");
                        }
                    });
                });



                document.getElementById('register_for').addEventListener('change', function () {
                    var style = this.value == 'Export' ? 'block' : 'none';
                    document.getElementById('Export').style.display = style;

                    var style = this.value == 'Domestic' ? 'block' : 'none';
                    document.getElementById('Domestic').style.display = style;

                    var style = this.value == 'Both' ? 'block' : 'none';
                    document.getElementById('Both').style.display = style;
                });
            });


        </script>

        <div class="row">
            <div class="large-12 columns" style="padding: 40px; background-color: white; margin-top: 40px; box-shadow: 0px 0px 10px 10px #992323; border-radius: 5px">

<h3 class="header" style="text-align: center;">Seller Registration</h3>

                <div class="large-12 columns">
                    <div class="row">
                    <div class="row">
                        <div id="register" aria-labelledby="firstModalTitle" aria-hidden="true" role="dialog">


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
                            <div class="large-12 columns">
                            <div id="Export" style="display: none;">
                                <form  id="form_reg" action="/register/register_user" method="post" >
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
                                                        <input name="email" id="newEmail_Export" type="email" class="emailValidation_Export"   placeholder="Please enter your Email Id" required="required" value="<?php echo set_value('email'); ?>">
                                                    </div>

                                                    <div class="small-4 columns zeropadding">
                                                        <span id="usr_verify" class="verify" style="display: none; font-size: 0.8em; padding: 10px" >Valid Email <i class="fa fa-check"></i></span>
                                                        <span id="usr_verify" class="verify_none" style="display: none;font-size: 0.8em;padding: 10px" >This Email-Id is already in use <i class="fa fa-times"></i></span>
                                                        <span id="usr_verify" class="verify_none_chk" style="display: none;font-size: 0.8em;padding: 10px" >Not a Valid <i class="fa fa-times"></i></span>

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
                                                <label for="checkbox1" style="font-size: 0.8em"> I agree to the Terms & Conditions (Export <a href="<?php echo site_url(); ?>export_terms">View</a>)</label>

                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="large-4 columns large-centered zeropadding">

                                                <input id="reg" class="button radius md-close butExport" type="submit" value="Register" style="margin: 0px"/>

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
                                                        <input name="email" id="newEmail_Domestic" class="emailValidation_Domestic" type="email"   placeholder="Please enter your Email Id" required="required" value="<?php echo set_value('email'); ?>">
                                                    </div>

                                                    <div class="small-4 columns zeropadding">
                                                        <span id="usr_verify" class="verify" style="display: none; font-size: 0.8em; padding: 10px" >Valid Email <i class="fa fa-check"></i></span>
                                                        <span id="usr_verify" class="verify_none" style="display: none;font-size: 0.8em;padding: 10px" >This Email-Id is already in use <i class="fa fa-times"></i></span>
                                                        <span id="usr_verify" class="verify_none_chk" style="display: none;font-size: 0.8em;padding: 10px" >Not a Valid <i class="fa fa-times"></i></span>

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
                                                <label for="checkbox1" style="font-size: 0.8em"> I agree to the Terms & Conditions (Domestic <a href="<?php echo site_url(); ?>domestic_terms">View</a>)</label>

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
                                                        <input name="email" id="newEmail_Both" class="emailValidation_Both" type="email" placeholder="Please enter your Email Id" required="required" value="<?php echo set_value('email'); ?>">
                                                    </div>

                                                    <div class="small-4 columns zeropadding">
                                                        <span id="usr_verify" class="verify" style="display: none; font-size: 0.8em; padding: 10px" >Valid Email <i class="fa fa-check"></i></span>
                                                        <span id="usr_verify" class="verify_none" style="display: none;font-size: 0.8em;padding: 10px" >This Email-Id is already in use <i class="fa fa-times"></i></span>
                                                        <span id="usr_verify" class="verify_none_chk" style="display: none;font-size: 0.8em;padding: 10px" >Not a Valid <i class="fa fa-times"></i></span>

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
                                                <div class="large-12 columns">
                                                    <input id="checkbox1" type="checkbox" required="required">
                                                    <label for="checkbox1" style="font-size: 0.8em"> I agree to the Terms & Conditions (Export <a href="<?php echo site_url(); ?>export_terms" target="_blank">View</a>)</label>
                                                </div>
                                                <div class="large-12 columns">
                                                    <input id="checkbox1" type="checkbox" required="required">
                                                    <label for="checkbox1" style="font-size: 0.8em"> I agree to the Terms & Conditions (Domestic <a href="<?php echo site_url(); ?>domestic_terms" target="_blank">View</a>)</label>
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
                        </div></div>
                    </div>
                </div>
            </div>
        </div>

        

        <script type="text/javascript" src="http://bulkhouse.in/js/jquery.min.js"></script>

        <!-- Bootstrap -->
        <!-- App -->
        <script src="<?php echo site_url() ?>/assets/js/foundation.min.js"></script>
        <script>
                        $(document).foundation();
        </script>
    </body>
</html>