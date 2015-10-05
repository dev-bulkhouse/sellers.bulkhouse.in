<?php
require_once 'requ_api.php';
$cscartapi = new CSCartApi(
    array(
        'api_key' => 'nXWC5i0374A5CQw59D3uqZ51v25Fl2X8',
        'user_login' => 'santhosh.jeremiah@gmail.com',
        'api_url' => 'http://dev.bulkhouse/com/'
    )
);
print "<pre>";
try {
    $params = array(
        'status' => "A"
    );
    $products = $cscartapi->get("products/1", $params);
    print_r($products);
} catch (Exception $e) {
    print $e->getMessage();
}
print "<br/>" . $cscartapi->getApiVersion();
print "<br/>" . $cscartapi->getCartVersion();
?>