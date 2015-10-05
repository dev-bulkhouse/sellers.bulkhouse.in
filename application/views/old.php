<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Bulk House</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="keywords" content="HTML5 Template">
        <meta name="description" content="Mist â€” Multi-Purpose HTML Template">
        <meta name="author" content="zozothemes.com">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Favicon -->
        <link rel="shortcut icon" href="img/favicon.ico">
        <!-- Font -->
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Arimo:300,400,700,400italic,700italic'>
        <link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
        <!-- Font Awesome Icons -->
        <link href='css/font-awesome.min.css' rel='stylesheet' type='text/css'/>
        <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'>
        <!-- Bootstrap core CSS -->
        <link href="http://bulkhouse.in/css/bootstrap.min.css" rel="stylesheet">
        <link href="http://bulkhouse.in/css/hover-dropdown-menu.css" rel="stylesheet">
        <!-- Icomoon Icons -->
        <link href="http://bulkhouse.in/css/icons.css" rel="stylesheet">
        <!-- Revolution Slider -->
        <link href="http://bulkhouse.in/css/revolution-slider.css" rel="stylesheet">
        <link href="rs-plugin/css/settings.css" rel="stylesheet">
        <!-- Animations -->
        <link href="http://bulkhouse.in/css/animate.min.css" rel="stylesheet">
        <!-- Owl Carousel Slider -->
        <link href="http://bulkhouse.in/css/owl/owl.carousel.css" rel="stylesheet" >
        <link href="http://bulkhouse.in/css/owl/owl.theme.css" rel="stylesheet" >
        <link href="http://bulkhouse.in/css/owl/owl.transitions.css" rel="stylesheet" >
        <!-- PrettyPhoto Popup -->
        <link href="http://bulkhouse.in/css/prettyPhoto.css" rel="stylesheet">
        <!-- Custom Style -->
        <link href="http://bulkhouse.in/css/style.css" rel="stylesheet">
        <link href="http://bulkhouse.in/css/responsive.css" rel="stylesheet">
        <!-- Color Scheme -->
        <link href="http://bulkhouse.in/css/color.css" rel="stylesheet">


        <link href="https://cdnjs.cloudflare.com/ajax/libs/foundation/5.5.2/css/foundation.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.css" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.4.4/angular.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

        <style type="text/css">
        .transparent-header.dark-header .sticky-wrapper.is-sticky .navbar{
            background-color: #e1e1e1;
            }
            .navbar-brand > img{
                padding-top: 0px;
                }</style>
        <script>
(function(w,d,t,r,u,o,s,f){w[r]=w[r]||function(){(w._rq=w._rq||[]).push(Array.prototype.slice.call(arguments))} ;s=d.createElement(t),f=d.getElementsByTagName(t)[0];s.async=1;s.src=u;s.id='rtracker';s.setAttribute('data-organization-id',o); f.parentNode.insertBefore(s,f);})(window,document,'script','_route','//www.routecdn.com/tracker/route-tracker-min.js','55dc6f3fab3e3c45a4cfec32');
</script>
    </head>
    <body  ng-controller="stageController">
        <script type="text/javascript">
window.onload = function () {
	document.getElementById("password").onchange = validatePassword;
	document.getElementById("confirm_password").onchange = validatePassword;
}
function validatePassword(){
var pass2=document.getElementById("confirm_password").value;
var pass1=document.getElementById("password").value;
if(pass1!=pass2)
	document.getElementById("confirm_password").setCustomValidity("Passwords Don't Match");
else
	document.getElementById("confirm_password").setCustomValidity('');
//empty string means no validation error
}
</script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
  ga('create', 'UA-67208894-1', 'auto');
  ga('send', 'pageview');
</script>

    <script type="text/javascript">
$(document).ready(function(){


    $(".emailValidation_Export").blur(function(e) {
        e.preventDefault();
        $.post("http://yesdesigns.in/register/check_user", {email : $("#newEmail_Export").val()}, function (data) {
            if(data === "true") {
                $(".verify").css("display", "block");
                $(".verify_none").css("display", "none");
                $(".verify_none_chk").css("display", "none");
            } else if(data === "false") {
                $(".verify_none").css("display", "block");
                $(".verify").css("display", "none");
                $(".verify_none_chk").css("display", "none");
            } else if(data === "unknown") {
                $(".verify").css("display", "none");
                $(".verify_none").css("display", "none");
                $(".verify_none_chk").css("display", "block");
            }
        });
    });

    $(".emailValidation_Domestic").blur(function(e) {
        e.preventDefault();
        $.post("http://yesdesigns.in/register/check_user", {email : $("#newEmail_Domestic").val()}, function (data) {
            if(data === "true") {
                $(".verify").css("display", "block");
                $(".verify_none").css("display", "none");
                $(".verify_none_chk").css("display", "none");
            } else if(data === "false") {
                $(".verify_none").css("display", "block");
                $(".verify").css("display", "none");
                $(".verify_none_chk").css("display", "none");
            } else if(data === "unknown") {
                $(".verify").css("display", "none");
                $(".verify_none").css("display", "none");
                $(".verify_none_chk").css("display", "block");
            }
        });
    });

    $(".emailValidation_Both").blur(function(e) {
        e.preventDefault();
        $.post("http://yesdesigns.in/register/check_user", {email : $("#newEmail_Both").val()}, function (data) {
            if(data === "true") {
                $(".verify").css("display", "block");
                $(".verify_none").css("display", "none");
                $(".verify_none_chk").css("display", "none");
            } else if(data === "false") {
                $(".verify_none").css("display", "block");
                $(".verify").css("display", "none");
                $(".verify_none_chk").css("display", "none");
            } else if(data === "unknown") {
                $(".verify").css("display", "none");
                $(".verify_none").css("display", "none");
                $(".verify_none_chk").css("display", "block");
            }
        });
    });




// $("#email").click(function(){
//     alert("function check");
//  if($("#email").val().length >= 4)
//  {
//  $.ajax({
//   type: "POST",
//   url: "<?php // echo base_url();?>/register/check_user",
//   data: "email="+$("#email").val(),
//   success: function(msg){
//    if(msg=="false")
//    {
//    document.getElementById("email").setCustomValidity("Submit Unique EmailID");
//    }
//    else
//    {
//    document.getElementById("email").setCustomValidity('');
//    }
//   }
//  });
//  }
//
// });
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
    <div id="page" class="row-fluid">

            <!-- transparent header -->
            <div class="transparent-header dark-header">
                <header id="sticker" class="sticky-navigation">
                    <!-- Sticky Menu -->
                    <div>
                        <!-- navbar -->
                        <div class="navbar navbar-default navbar-bg-light" role="navigation">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="navbar-header">
                                            <!-- Button For Responsive toggle -->
                                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                                <span class="sr-only">Toggle navigation</span>
                                                <span class="icon-bar"></span>
                                                <span class="icon-bar"></span>
                                                <span class="icon-bar"></span></button>
                                            <!-- Logo -->

                                            <a class="navbar-brand" href="index.html">
                                                <img class="site_logo" alt="Site Logo" src="http://bulkhouse.in/img/logo.png" />
                                            </a></div>
                                        <!-- Navbar Collapse -->
                                        <div class="navbar-collapse collapse">
                                            <!-- nav -->

                                            <a target="_blank" href="#" data-toggle="modal" data-target="#Register_model" style="float:right; margin-top:20px;margin-left: 10px; color: white" class="btn btn-primary" type="submit"><i></i>Register as a Seller</a>
                                            <a target="_blank" href="#" data-toggle="modal" data-target="#myModal" style="float:right; margin-top:20px; color: white" class="btn btn-primary" type="submit"><i class="fa fa-lock"></i> Seller Login</a>

                                            <!-- Trigger the modal with a button -->




                                            <!-- Right nav -->
                                            <!-- Header Contact Content -->

                                            <!-- Header Contact Content -->
                                            <!-- Header Search Content -->
                                            <div class="bg-white hide-show-content no-display header-search-content white">
                                                <form role="search" class="navbar-form vertically-absolute-middle">
                                                    <div class="form-group">
                                                        <input type="text" placeholder="Enter your text &amp; Search Here" class="form-control" id="s" name="s" value="" />
                                                    </div>
                                                </form>
                                                <button class="close">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </div>
                                            <!-- Header Search Content -->
                                            <!-- Header Share Content -->
                                            <div class="bg-white hide-show-content no-display header-share-content white">
                                                <div class="vertically-absolute-middle social-icon gray-bg icons-circle i-3x">
                                                    <a href="#">
                                                        <i class="fa fa-facebook"></i>
                                                    </a>
                                                    <a href="#">
                                                        <i class="fa fa-twitter"></i>
                                                    </a>
                                                    <a href="#">
                                                        <i class="fa fa-pinterest"></i>
                                                    </a>
                                                    <a href="#">
                                                        <i class="fa fa-google"></i>
                                                    </a>
                                                    <a href="#">
                                                        <i class="fa fa-linkedin"></i>
                                                    </a></div>
                                                <button class="close">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </div>
                                            <!-- Header Share Content -->
                                        </div>
                                        <!-- /.navbar-collapse -->
                                    </div>
                                    <!-- /.col-md-12 -->
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.container -->
                        </div>
                        <!-- navbar -->
                    </div>
                    <!-- Sticky Menu -->
                </header>
                <!-- Sticky Navbar -->
            </div>
            <!-- Transparent Header Ends -->
            <section class="slider" id="home">
                <div id="main-slider">
                    <div id="carousel-example-generic1" class="carousel slide carousel-fade" data-ride="carousel" data-pause="false">
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            <!--                            <div class="item">
                                                            <img src="http://bulkhouse.in/img/s2.jpg" alt="" title="" width="2000" height="1080">
                                                            <div class="carousel-caption">
                                                                <h1 class="upper animation animated-item-1 pad-20"><span class="text-color">Powerful</span> Bootstrap Theme Forever</h1>
                                                                <a href="#" class="btn btn-default animation animated-item-2">Read More</a>
                                                            </div>
                                                        </div>
                                                        <div class="item">
                                                            <img src="http://bulkhouse.in/img/s1.jpg" alt="" title="" width="2000" height="1080">
                                                             <div class="carousel-caption">
                                                                 <h1 class="upper animation animated-item-1"><span class="text-color">Premium</span> HTML5 Template</h1>
                                                                 <p class="description  animation animated-item-2 pad-20 hidden-sm hidden-xs">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repudiandae odit iste exercitationem <br>praesentium deleniti nostrum laborum rem id nihil tempora.</p>
                                                             </div>
                                                        </div>-->
                            <div class="item active">
                                <img src="http://bulkhouse.in/img/1.jpg" alt="" title="" width="1500" height="600">
                                <!-- <div class="carousel-caption">
                                     <h1 class="upper animation animated-item-1"><span class="text-color">Premium</span> HTML5 Template</h1>
                                     <p class="description  animation animated-item-2 pad-20 hidden-sm hidden-xs">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repudiandae odit iste exercitationem <br>praesentium deleniti nostrum laborum rem id nihihttp://i.istockimg.com/image-zoom/45014010/3/380/253/zoom-45014010-3.jpgl tempora.</p>
                                 </div>-->
                            </div>
                            <div class="item">
                                <img src="http://bulkhouse.in/img/2.jpg" alt="" title="" width="1500" height="800">
                                <!-- <div class="carousel-caption">
                                     <h1 class="upper animation animated-item-1"><span class="text-color">Premium</span> HTML5 Template</h1>
                                     <p class="description  animation animated-item-2 pad-20 hidden-sm hidden-xs">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repudiandae odit iste exercitationem <br>praesentium deleniti nostrum laborum rem id nihil tempora.</p>
                                 </div>-->
                            </div>
                            <div class="item">
                                <img src="http://bulkhouse.in/img/3.jpg" alt="" title="" width="1500" height="800">
                                <!-- <div class="carousel-caption">
                                     <h1 class="upper animation animated-item-1"><span class="text-color">Premium</span> HTML5 Template</h1>
                                     <p class="description  animation animated-item-2 pad-20 hidden-sm hidden-xs">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repudiandae odit iste exercitationem <br>praesentium deleniti nostrum laborum rem id nihil tempora.</p>
                                 </div>-->
                            </div>

                        </div>
                        <!-- Controls -->
                        <a class="left carousel-control" href="#carousel-example-generic1" role="button" data-slide="prev">
                            <span class="fa fa-angle-left fa-2x" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic1" role="button" data-slide="next">
                            <span class="fa fa-angle-right fa-2x" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </section>
            <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog" style="z-index: 9999">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Seller Login</h4>
      </div>
      <div class="modal-body">
        <form action="http://yesdesigns.in/user/login_user" method="post">
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
                                <div class="col-sm-9 small-9 columns small-centered zeropadding">
                                    <div class="row">
                                        <input type="password" name="password" placeholder="Password" required="required">
                    <!--                    <small class="error">Please enter a valid password.</small>-->
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-9 small-9 columns small-centered zeropadding">
                                    <div class="row">
                                        <a href="#" data-toggle="modal" data-target="#fgtPassword" ><p style="font-size: 0.9em">forgot password?</p></a>
              <!--                    <small class="error">Please enter a valid password.</small>-->
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-2 col-md-2 col-lg-2 large-2 medium-2 small-2 columns large-centered medium-centered small-centered zeropadding">

                                    <input class="button radius small md-close" type="submit" value="Login" style="margin: 0px"/>


                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </form>
      </div>

    </div>

  </div>
</div>
<!--forgot password-->
<div id="fgtPassword" class="modal fade" role="dialog" style="z-index: 9999">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Forgot password</h4>
      </div>
      <div class="modal-body">
        <form action="http://yesdesigns.in/login/reset_password" method="post">
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
                                <div class="large-2 medium-2 small-2 columns large-centered medium-centered small-centered zeropadding">

                                    <input class="button radius small md-close" type="submit" value="Submit" style="margin: 0px"/>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
      </div>

    </div>

  </div>
</div>
<!--forgot password-->
<div id="Register_model" class="modal fade" role="dialog" style="z-index: 9999" ng-controller="Reg_for_Controller">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
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
            <form  id="form_reg" action="http://yesdesigns.in/register/register_user" method="post">
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
                            <label for="checkbox1" style="font-size: 0.8em"> I agree to the Terms & Conditions (Export <a href="http://yesdesigns.in/export_terms">)View</a></label>

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
            <form  id="form_reg" action="http://yesdesigns.in/register/register_user" method="post">
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
                            <label for="checkbox1" style="font-size: 0.8em"> I agree to the Terms & Conditions (Domestic <a href="http://yesdesigns.in/domestic_terms">)View</a></label>

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
            <form  id="form_reg" action="http://yesdesigns.in/register/register_user" method="post">
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
                            <label for="checkbox1" style="font-size: 0.8em"> I agree to the Terms & Conditions (Export <a href="http://yesdesigns.in/export_terms">)View</a></label>
                            </div>
                            <div class="large-6 columns">
                            <input id="checkbox1" type="checkbox" required="required">
                            <label for="checkbox1" style="font-size: 0.8em"> I agree to the Terms & Conditions (Domestic <a href="http://yesdesigns.in/domestic_terms">)View</a></label>
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
            <!-- slider --><br>
            <div class="section-title" data-animation="fadeInUp">
                <h2 class="title"><b>Welcome to Bulk House</b></h2>
                <center><h4>Your personalized domain to global export and domestic markets</h4></center>
            </div>
            <section id="who-we-are" class="page-section no-pad light-bg border-tb">
                <div class="container-fluid who-we-are">
                    <div class="row">
                        <div class="col-md-6 pad-60 medium-6 columns">
                            <div class="section-title text-left" data-animation="fadeInUp">
                                <!-- Title -->
                                <!--<h2 class="title">About Bulk House</h2>-->
                            </div>

                            <div class="col-md-12 medium-12 columns text-justify">
                                <h4>Our Business</h4>
                                <p style="font-family: 'Roboto Condensed', sans-serif; font-size: 15px">
                                    Bulkhouse is a versatile, user friendly interactive E commerce portal with a unique blend of market place cum store.
It offers an end to end solution for Buyers as well as Sellers with a robust marketing platform with host of value added features.
At Bulkhouse, International and Domestic buyers will be able to source their bulk purchase requirements through a single portal from products manufactured by the Indian SME, MSME manufacturers and also from wholesale dealers in India.
Bulkhouse prides itself for following a rigorous merchant selection process, ensuring genuineness of products offered to you via the marketplace.
Bulkhouse creates a favorable ecosystem to maximize growth opportunities for both buyers and Vendors by providing high quality fulfillment services and a secure payment infrastructure.
For exports, its unique consolidation and export logistics model with various shipping options offers buyers savings in logistics costs.
Bulkhouse believes in transparent business ethical and quality practices with strong focus on customer service and high service standards in product deliveries.</p>



                                <h4>Why Sell on Bulkhouse?</h4>
                                 <p style="font-family: 'Roboto Condensed', sans-serif; font-size: 15px">
                                   Reach millions through Bulkhouse! </br>
Selling on Bulkhouse helps you expand your business globally as well as within domestic markets beyond your domain!
Bulkhouse offers sellers an E commerce market place cum store with value add benefits under a single window for International and domestic trade.
With the trusted Bulkhouse E-commerce platform and fulfillment services, you will have access to the resources you need to build your business.
Bulkhouse is an end to end solution provider for the Buyer as well as the Vendors with transparent business ethical and quality practices with focus on customer service and high service standards in product deliveries..</p>


                            </div>
                        </div>
                        <div class="col-md-6 medium-6 columns no-pad text-center">
                            <!-- Image -->
                            <div class="image-bg" data-background="img/touch_world.jpg" width="300"></div>
                        </div>
                    </div>
                </div>
            </section>

            <section id="services" class="page-section">
                <div class="section-title animated fadeInUp visible" data-animation="fadeInUp">
                    <!-- Heading -->
                    <!--<h2 class="title">Services</h2>-->
                </div>
                <div class="container">
                    <div class="row">
                         <div class="col-md-4">

                            <div>
                                <img src="http://bulkhouse.in/img/transport.jpg" alt="" title="" width="450" height="600">
                            </div>
</div>
                        <div class="col-md-8">
                            <h4>Sellers' features for Domestic and Export Transactions</h4>
                             <p style="font-family: 'Roboto Condensed', sans-serif; font-size: 15px">
                                As a seller, you also benefit from Bulkhouse’s investment in technology, logistics and a secure payment infrastructure. </br>

Selling on Bulkhouse comes enabled with packaged features as: </br></p>
 <p style="font-family: 'Roboto Condensed', sans-serif; font-size: 15px">
<span style="font-family: 'Roboto Condensed', sans-serif; font-size: 18px">• </span>  Your own store - Display your wide range of products, manage your pricing, order quantities, delivery schedules, account and delivery information, access reports and respond to buyers.</br>
<span style="font-family: 'Roboto Condensed', sans-serif; font-size: 18px">• </span>   Global reach- Exploitation of untapped markets in select regions across the world with unmatched number of customers</br>
<span style="font-family: 'Roboto Condensed', sans-serif; font-size: 18px">• </span>   Sell in bulk </br>
<span style="font-family: 'Roboto Condensed', sans-serif; font-size: 18px">• </span>   Multi product offerings</br>
<span style="font-family: 'Roboto Condensed', sans-serif; font-size: 18px">• </span>   Ease of logistics-Door pickup and delivery,</br>
<span style="font-family: 'Roboto Condensed', sans-serif; font-size: 18px">• </span>   Price comparisons, Pricing advantages, cost-savings</br>
<span style="font-family: 'Roboto Condensed', sans-serif; font-size: 18px">• </span>   Ease of export formalities and documentation</br>
<span style="font-family: 'Roboto Condensed', sans-serif; font-size: 18px">• </span>   Dedicated customer service</br>
<span style="font-family: 'Roboto Condensed', sans-serif; font-size: 18px">• </span>   Secure and multiple payment options</p>
</div>
<div class="row">
                        <div class="col-md-8 medium-8 columns">
                           <h4>Major Products:</h4>
                            <div class=" text-justify">
                                 <p style="font-family: 'Roboto Condensed', sans-serif; font-size: 15px">Bulkhouse proposes to have over 12 major categories with 300+ sub product categories and over

                                    60000+ products spread across its product line. </p>

                                 <p style="font-family: 'Roboto Condensed', sans-serif; font-size: 15px">These products will be sourced primarily from India and mainland China through a system of closely

                                    monitored quality and buying process.</p>
                                     <p style="font-family: 'Roboto Condensed', sans-serif; font-size: 15px">The Product range will be  in these categories- Foods & Beverages, Garments and Apparels, Beauty and cosmetics products, Shoes , Home products,

                                                Furniture, Mobiles & Consumer Electronics, Packing Stationery, Office And School supplies,

                                                Sports, Toys, Electrical, Lighting, Tools and Hardware, Security systems, Computers & Telecom, Agriculture

                                                products, Construction, Industrial chemicals, Industrial machinery, Plastics raw material and finished

                                                products, Rubber and rubber products.</p>
                            </div>
</div>
 <div class="col-md-4 medium-4 columns">

                            <div>
                                <img src="http://bulkhouse.in/img/world_carton.jpg" alt="" title="" width="450" height="600">
                            </div>
</div>
</div>


                </div>
            </section>

            <footer id="footer">
                <div class="footer-widget">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-3 widget bottom-xs-pad-20">
                                <div class="widget-title">
                                    <!-- Title -->
                                    <h3 class="title">About Us</h3>
                                </div>
                                <!-- Text -->
                                <span style="font-family: 'Roboto Condensed', sans-serif; text: justify ;font-size: 12px"> Bulkhouse Trading India Pvt Ltd is a privately held company incorporated in March 2015 in Visakhapatnam, India.</br>Through our interactive platform, we intend to simplify trade! and  <b>“Anybody from anywhere can sell to anybody from anywhere in the world”!</b></span>
                                <!-- Address -->

                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3 widget bottom-xs-pad-20">
                                <div class="widget-title">
                                    <!-- Title -->
                                    <h3 class="title">BulkHouse</h3>
                                </div>
                                <nav>
                                    <ul>
                                        <!-- List Items -->
                                        <li><a href="#">Register as Seller</a></li>
                                        <li><a href="http://bulk.house/index.php/export-policies">Export Policies and Terms of use</a></li>
                                        <li><a href="http://bulk.house/index.php/domestic-policies/">Domestic Policies and Terms of use</a></li>

                                    </ul>
                                </nav>

                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3 widget">
                                <div class="widget-title">
                                    <!-- Title -->
                                    <h3 class="title">Contact us</h3>
                                </div>
                                <nav>
                                    <ul class="footer-blog">
                                        <!-- List Items -->
                                        <li><a href="#">Level II, The Office, Plot No 39, Ocean View Layout, Visakhapatnam-530003, India.</br>
                                            Email: sales@bulkhouse.com, Phone No: 0891 - 667 9999</a></li>
                                    </ul>
                                </nav>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3 widget newsletter bottom-xs-pad-20">
                                <div class="widget-title">
                                    <!-- Title -->
                                    <h3 class="title">know more about bulkhouse</h3>
                                </div>
                                <div>
                                    <!-- Text -->
                                    <p class="form-message1" style="display: none;"></p>
                                    <div class="clearfix"></div>
                                    <!-- Form -->
                                    <form id="subscribe_form" action="http://zozothemes.com/html/mist/light/subscription.php" method="post" name="subscribe_form" role="form">
                                        <div class="input-text form-group has-feedback">
                                            <input class="form-control" type="email" value="" name="subscribe_email" placeholder="Please Enter your Business Email-Id">
                                            <button class="submit bg-color" type="submit"><span class="glyphicon glyphicon-arrow-right"></span></button>
                                        </div>
                                    </form>
                                </div>

                                <!-- Social Links -->
                                <div class="social-icon gray-bg icons-circle i-3x">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                    <a href="#"><i class="fa fa-google"></i></a>
                                    <a href="#"><i class="fa fa-linkedin"></i></a>
                                </div>
                            </div>
                            <!-- .newsletter -->
                        </div>
                    </div>
                </div>
                <!-- footer-top -->
                <div class="copyright">
                    <div class="container">
                        <div class="row">
                            <!-- Copyrights -->
                            <div class="col-xs-10 col-sm-6 col-md-6">Â© 2015 Bulkhouse Trading Pvt Ltd, All rights reserved.
                                <br>
                                <!-- Terms Link -->
                                <a href="#">Terms of Use</a> / <a href="#"> Privacy Policy</a>
                            </div>
                            <div class="col-xs-2  col-sm-6 col-md-6 text-right page-scroll gray-bg icons-circle i-3x">
                                <!-- Goto Top -->
                                <a href="#page">
                                    <i class="glyphicon glyphicon-arrow-up"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- footer-bottom -->
            </footer>
            <!-- footer -->
        </div>
        <!-- page -->
        <!-- Scripts -->
        <script type="text/javascript" src="http://bulkhouse.in/js/jquery.min.js"></script>
        <script type="text/javascript" src="http://bulkhouse.in/js/bootstrap.min.js"></script>
        <!-- Menu jQuery plugin -->
        <script type="text/javascript" src="http://bulkhouse.in/js/hover-dropdown-menu.js"></script>
        <!-- Menu jQuery Bootstrap Addon -->
        <script type="text/javascript" src="http://bulkhouse.in/js/jquery.hover-dropdown-menu-addon.js"></script>
        <!-- Scroll Top Menu -->
        <script type="text/javascript" src="http://bulkhouse.in/js/jquery.easing.1.3.js"></script>
        <!-- Sticky Menu -->
        <script type="text/javascript" src="http://bulkhouse.in/js/jquery.sticky.js"></script>
        <!-- Bootstrap Validation -->
        <script type="text/javascript" src="http://bulkhouse.in/js/bootstrapValidator.min.js"></script>
        <!-- Revolution Slider -->
        <script type="text/javascript" src="http://bulkhouse.in/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
        <script type="text/javascript" src="http://bulkhouse.in/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
        <script type="text/javascript" src="http://bulkhouse.in/js/revolution-custom.js"></script>
        <!-- Portfolio Filter -->
        <script type="text/javascript" src="http://bulkhouse.in/js/jquery.mixitup.min.js"></script>
        <!-- Animations -->
        <script type="text/javascript" src="http://bulkhouse.in/js/jquery.appear.js"></script>
        <script type="text/javascript" src="http://bulkhouse.in/js/effect.js"></script>
        <!-- Owl Carousel Slider -->
        <script type="text/javascript"  src="http://bulkhouse.in/js/owl.carousel.min.js"></script>
        <!-- Pretty Photo Popup -->
        <script type="text/javascript"  src="http://bulkhouse.in/js/jquery.prettyPhoto.js"></script>
        <!-- Parallax BG -->
        <script type="text/javascript"  src="http://bulkhouse.in/js/jquery.parallax-1.1.3.js"></script>
        <!-- Fun Factor / Counter -->
        <script type="text/javascript"  src="http://bulkhouse.in/js/jquery.countTo.js"></script>
        <!-- Twitter Feed -->
        <script type="text/javascript" src="http://bulkhouse.in/js/tweet/carousel.js"></script>
        <script type="text/javascript" src="http://bulkhouse.in/js/tweet/scripts.js"></script>
        <script type="text/javascript" src="http://bulkhouse.in/js/tweet/tweetie.min.js"></script>
        <!-- Background Video -->
        <script type="text/javascript" src="http://bulkhouse.in/js/jquery.mb.YTPlayer.js"></script>
        <!-- Custom Js Code -->
        <script type="text/javascript" src="http://bulkhouse.in/js/custom.js"></script>
        <!-- Scripts -->
    </body>

</html>