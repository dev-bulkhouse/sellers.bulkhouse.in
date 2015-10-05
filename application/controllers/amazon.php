<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
require_once APPPATH."/third_party/aws/aws-autoloader.php";
class Amazon extends CI_Controller {

    function __construct() {
        parent::__construct();
    }
    public function report($date) {}
}

?>