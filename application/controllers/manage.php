<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Manage extends CI_Controller {
private $logged_in;


    public function __construct() {
        parent::__construct();
    }

    public function index() {

//        $this->load->view('admin/template/header');
        $this->load->view('team');
//        $this->load->view('admin/template/footer');
    }

    public function imp() {


        $this->load->view('secimp');


    }
    
}
