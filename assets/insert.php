<?php
$con = mysql_connect("vendor-data.ct4kuyvudbep.us-west-1.rds.amazonaws.com","vendor_user","bulkhouse");
$time = date("Y-m-d") . "|" . date("h:i:s");
$ip_address = get_client_ip_env();

// Function to get the client ip address
 

function get_client_ip_env() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
        $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';

    return $ipaddress;
}

if (isset($_POST[email])) {

    $email = $_POST[email];

}
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }



mysql_select_db("vendor_data", $con);



$sql="INSERT INTO subscribe_india (email, subscribedOn, ip_address)
VALUES
('$email','$time','$ip_address')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
header('Location: http://bulkhouse.in');

mysql_close($con)
?>