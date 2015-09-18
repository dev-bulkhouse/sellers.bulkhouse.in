<?php 
$proxy = new SoapClient('http://bulk.house/api/v2_soap/?wsdl'); 

$sessionId = $proxy->login((object)array('username' => 'inhouse_developer', 'apiKey' => '3125582')); 
$result = $proxy->customerCustomerCreate((object)array('sessionId' => $sessionId->result, 'customerData' => ((object)array(
'email' => 'cosmetics.myra@gmail.com',
'firstname' => 'Shrinivas',
'lastname' => 'Ghanu',
'password' => 'India@12345',
'website_id' => '1',
'group_id' => '4',
'store_id' => '1'
))));   
var_dump($result->result);
?> 


