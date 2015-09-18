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
    <body>
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
        <div class="row" >
            <div class="large-12 columns" >
                <div class="row">
                    <img src=""/>
                </div>
            </div>
            <div class="large-12 columns" >

                        <div id="login" aria-labelledby="firstModalTitle" aria-hidden="true" role="dialog">
                            <h3 class="header" style="text-align: center">Vendor Login  </h3>
                            <!--  <form action="/user/login_user" method="post" data-abide>-->
                            <form action="/user/login_user" method="post">
                                <div class="row" style="padding-top: 20px">
                                    <div class="row">
                                        <div class="large-8 large-centered columns">

                                            <div class="row">
                                                <div class="small-6 columns  zeropadding">
                                                    <div class="row">
                                                        <input type="email" name="email" placeholder="Email Id" required="required">
                                <!--                        <small class="error">Please enter a valid Email.</small>-->
                                                    </div>
                                                </div>
                                                <div class="small-6 columns zeropadding">
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
                                                <div class="large-10 columns large-centered zeropadding" style="text-align: center">

                                                    <input class="button expand radius small md-close" type="submit" value="Login" style="margin: 0px"/>


                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>



            </div>
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

        <script type="text/javascript" src="http://bulkhouse.in/js/jquery.min.js"></script>

        <!-- Bootstrap -->
        <!-- App -->
        <script src="<?php echo site_url() ?>/assets/js/foundation.min.js"></script>
        <script>
                        $(document).foundation();
        </script>
    </body>
</html>