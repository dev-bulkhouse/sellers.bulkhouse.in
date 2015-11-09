<?php

$id = 429;
$seller_type = 'Both';
$compid = 29;
 $client = new SoapClient('http://bulk.house/api/soap/?wsdl');

// If somestuff requires api authentification,
// then get a session token
$session = $client->login('inhouse_developer', '3125582');

$client->call($session, 'customer.update', 
 array('customerId' => $id, 'customerData' => 
   array('seller_type'=> $seller_type, 'seller_code' => $compid)));
return $client;

