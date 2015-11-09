<?php
// $client = new SoapClient('http://bulk.house/api/soap/?wsdl');
//
//// If somestuff requires api authentification,
//// then get a session token
//$session = $client->login('inhouse_developer', '3125582');
//
//$result = $client->call($session, 'customer.update', 
// array('customerId' => '293', 'customerData' => 
//   array('password_hash'=> md5('test234'))));
//var_dump ($result);

function customerLogin(){
    require_once "/app/Mage.php"; 
    Mage::app('default');
    Mage::getSingleton("core/session", array("name" => "frontend"));
    $user = 'shyla@bulkhouse.net';
    $password = 'bulk123';
    $flag = 0;  
    $resultArr = array();
    $session = Mage::getSingleton('customer/session');
    try{        
        $result = $session->login($user,$password);
        //$customer = $session->getCustomer();      
        $session->setCustomerAsLoggedIn($session->getCustomer());
        $resultArr['flag'] = 1;
        $resultArr['msg'] ='Logged in as '.$session->getCustomer()->getName();
        $cusArr = array(
              'isLoggedIn'  => true,
              'name'        => $session->getCustomer()->getName(),
              'id'          => $session->getId(),
              'email'       =>$session->getCustomer()->getEmail(),
          );
        $resultArr['customerData'] = $cusArr;   
        $jsonReturn = json_encode($resultArr);
        return $jsonReturn;
    }catch(Exception $e){
        $resultArr['flag'] = 0;
        $resultArr['msg'] = $e->getMessage();   
        $jsonReturn = json_encode($resultArr);
        return $jsonReturn;
    }
}

echo customerLogin();
?>
