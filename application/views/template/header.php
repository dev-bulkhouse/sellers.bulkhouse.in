<?php
if (isset($logged_in)) {
    $email = $this->session->userdata('email');
    $vendor_name = $this->session->userdata('vendor_name');
    $firm_name = $this->session->userdata('firm_name');
    $firm_type = $this->session->userdata('firm_type');
  } else {

}

?>
<!doctype html>
<html class="no-js" lang="en" ng-app="myApp">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bulkhouse Trading India Pvt Ltd| We Are Launching .....</title>
    <link rel="stylesheet" href="http://test.bulkhouse.in/assets/css/foundation.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.4.4/angular.min.js"></script>

    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700' rel='stylesheet' type='text/css'>
    <link href="http://test.bulkhouse.in/assets/css/added.css" rel="stylesheet" type="text/css"/>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="http://test.bulkhouse.in/assets/js/vendor/modernizr.js"></script>
    <script src="http://test.bulkhouse.in/assets/js/typed.js" type="text/javascript"></script>

    <script>
    $(function(){

        $(".typed").typed({
            strings: ["<span style='font-size:0.5em'>Hello! <b style='color: #D1011F'>Visitor.^1000</b> </span>","<span style='font-size:0.5em'>Subscribe for an exclusive free pre-launch sign-up offer ^1000</span>","<span style='font-size:0.7em'>Thank you for visiting us ! ^1000</span>","We are <b style='color: #D1011F'>Launching</b> Soon !!"],
            typeSpeed: 5,
            startDelay: 2000,
            backSpeed: 2,
            backDelay: 500,
            loop: false,
            showCursor: false,
            contentType: 'html', // or text
            // defaults to false for infinite loop
            loopCount: false,
            callback: function(){ foo(); },
            resetCallback: function() { newTyped(); }
        });



        $(".reset").click(function(){
            $("#typed").typed('reset');
        });

    });

    function newTyped(){ /* A new typed object */ }


    </script>
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
  <body style="background-image: url('/img/bg.jpg'); background-size: cover" ng-controller="stageController">
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

    <script type="text/javascript">
$(document).ready(function(){
 $("#email").keyup(function(){
  if($("#email").val().length >= 4)
  {
  $.ajax({
   type: "POST",
   url: "<?php echo base_url();?>/register/check_user",
   data: "email="+$("#email").val(),
   success: function(msg){
    if(msg=="false")
    {
    document.getElementById("email").setCustomValidity("Submit Unique EmailID");
    }
    else
    {
    document.getElementById("email").setCustomValidity('');
    }
   }
  });
  }

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
