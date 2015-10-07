<?php

/**
 * @author Dial2Verify Labs, India
 * @copyright 2013
 * Built on Dial2Verify API V2 ( http://kb.dial2verify.in/questions/28 )
 */

   // Accept Auth Session ID As An Input   	
	$SID=$_REQUEST["SID"];
    
    $json = array();
	$VerificationCall="http://engine.dial2verify.in/Integ/UserLayer/DataFeed_APIV2.dvf?SID=$SID";

   // Make a call to Dial2Verify API & Parse The JSON Response
	$RequestPayload=json_decode(file_get_contents($VerificationCall),true);
	$VerifStatus=$RequestPayload["VerificationStatus"];
     

	$json["VerificationStatus"]=$VerifStatus;
	
   // Write a JSON Object response 
    header('Content-type: application/json');
    echo(json_encode($json));


