<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Manage extends CI_Controller {



    public function __construct() {
        parent::__construct();

         
        $this->load->model('login_model');
        $this->load->helper('url');
    }

    public function index() {

//        $this->load->view('admin/template/header');
        $this->load->view('team');
//        $this->load->view('admin/template/footer');
    }

   

}
