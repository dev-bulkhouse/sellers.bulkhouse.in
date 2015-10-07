<?php

/**
 * @author Dial2Verify Labs, India
 * @copyright 2013
 * Built on Dial2Verify API V2 ( http://kb.dial2verify.in/questions/28 )
 */

   // Accept Telephone Number As An Input   	
	$TelNumber=substr($_REQUEST["phone_number"],-10);

  // Replace with your Dial2Verify API Passkey generated using ( http://kb.dial2verify.in/?q=5 )
    $API_KEY='RA-4F8ABF4F-22F8-4AD6-9DA9-66FB779433BD';
  
  // Get API Image Response
    $APIUrl="http://engine.dial2verify.in/Integ/API.dvf?mobile=$TelNumber&passkey=$API_KEY&notify=http://engine.dial2verify.in/Integ/CatchAll.dvf&e-notify=support@dial2verify.in&out=JSON&cn=IN";
    $json=file_get_contents($APIUrl);

  // Write a JSON Object response 
    header('Content-type: application/json');
    echo($json);



?>