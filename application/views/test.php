<?php
 $client = new SoapClient('http://bulk.house/api/soap/?wsdl');

// If somestuff requires api authentification,
// then get a session token
$session = $client->login('inhouse_developer', '3125582');

$result = $client->call($session, 'customer.update', 
 array('customerId' => '293', 'customerData' => 
   array('password_hash'=> md5('test234'))));
var_dump ($result);
?>


