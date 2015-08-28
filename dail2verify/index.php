<!--
  @author Dial2Verify Labs, India
  @copyright 2013
  Built on Dial2Verify API V2 ( http://kb.dial2verify.in/questions/28 )
-->

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Phone Verification by Dial2Verify API V2 ( www.dial2verify.com )</title>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
	<script type="text/javascript">
	var attempt=1;
	var SID="";

		$(document).ready(function(){
			$("#enter_number").submit(function(e) {
			 e.preventDefault();
			 initiateDial2Verify();
		  	});
		});

		function initiateDial2Verify() {
			showCodeForm(1);
			GetVerificationImage();
		}

		function showCodeForm(code) {
			$("#dial2verify").fadeIn();
			$("#enter_number").fadeOut();
			$("#waiting_msg").text("Waiting for missed call from "+$("#phone_number").val());
		}

		function GetVerificationImage() {
			$.post("http://sellers.bulkhouse.in/dail2verify/GetImageAPIV2.php", { phone_number : $("#phone_number").val() },
				   function(data) { updateImage(data.ImageUrl,data.SessionId); }, "json");
		}



		function updateImage(ImageURL, vSID) {

                                if ( ImageURL === "Err" || ImageURL === ""  ) { Err(); }
                                else
                                {
                                 $("#Image").html("Please give a missed call to <br><img src=\""+ImageURL+"\"/>");
	                         SID = vSID;
	                         PollStart("UnVerified");
                                }
                }

		function CheckStatus()
		{
			$.post("http://sellers.bulkhouse.in/dail2verify/VerificationStatusAPIV2.php", { SID : SID },
				   function(data) { PollStart(data.VerificationStatus); }, "json");
		}


		function PollStart(vStatus)
		{
                         attempt =attempt+1;
                         if ( attempt >= 90  ) { TimeoutCheck(); }
                         else
                         if (vStatus === "UnVerified") {
                            $("#status").html("Please give a missed call in  <b><i>"+(90-attempt) +"</i></b> seconds.");
                            setTimeout(CheckStatus, 1000);
                           	}
                         else if (vStatus === "VERIFIED")
                        {
			          	success();
		            	}
                        else
                        TimeoutCheck();

		}


                function Err() {
                $("#status").html("Error!<br>Sorry something went wrong, Please cross check your telephone number.");
                }

		function success() {
			$("#status").text("Congrats !!! Phone Number Verified!");
                        alert('Thankyou');

		}

		function TimeoutCheck() {
			$("#status").text("Verification Failed!");
		}

	</script>
</head>
<body>
	<form id="enter_number">
		<p>Enter your phone number:</p>
		<p><input type="text" name="phone_number" id="phone_number" /></p>
		<p><input type="submit" name="submit" value="Verify" /></p>
	</form>

	<div id="dial2verify" style="display: none;">
		<p id="waiting_msg"></p>
		<p id="Image">Loading ..</strong></p>
                <p id="status">Loading ..</strong></p>
	</div>
</body>
</html>

