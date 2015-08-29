<?php

header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Create_tables extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('create_tables');
    }

    public function create() {


        $result = $this->create_tables->create();

        if ($result) {
            echo 'created';
        }

    }

    public function insert() {


        $result = $this->create_tables->insert();
        if ($result) {
            echo 'inserted';
        }

    }



}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */