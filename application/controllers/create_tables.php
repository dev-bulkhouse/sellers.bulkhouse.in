<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class Create_tables extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('tabs');
    }

    public function create() {


        $result = $this->tabs->create();

        if ($result) {
            echo 'created';
        }else{
            echo 'not created';
        }

    }

    public function insert() {


        $result = $this->tabs->insert();
        if ($result) {
            echo 'inserted';
        }else{
            echo 'not inserted';
        }

    }

    public function welcome() {
        echo("This is welcome page");
    }



}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */