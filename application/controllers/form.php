<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Form extends CI_Controller {



    public function __construct() {
        parent::__construct();

         $this->load->model('form_submit');
        $this->load->helper('url');
    }

    public function index() {

//        $this->load->view('admin/template/header');
        $this->load->view('team');
//        $this->load->view('admin/template/footer');
    }

        public function let_us_know_you() {

            $result = $this->form_submit->let_us_know_you();
            if ($result == 1) {
                redirect('http://www.bulkhouse.com', 'location');
            }

        }


    }




