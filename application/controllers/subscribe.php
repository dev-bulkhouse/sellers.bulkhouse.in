<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Subscribe extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('subscribe_model');
        $this->load->helper('url');
    }

    public function index() {

        $this->load->view('template/header');
        $this->load->view('home');
        $this->load->view('template/footer');
    }



    public function subscribe_user() {

        $this->load->library('form_validation');

        $this->form_validation->set_rules('phone', 'Phone Number', 'trim|required|min_length[3]|max_length[10]|is_unique[vendors.phone]|xss_clean');
        $this->form_validation->set_rules('email', 'Email Address', 'trim|required|min_length[6]|max_length[100]|valid_email|is_unique[vendors.email]|xss_clean');


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header');
            $this->load->view('home');
            $this->load->view('template/footer');
        } else {

            $result = $this->subscribe_model->subscribe();

            if ($result) {
                $this->load->view('template/header');
                $this->load->view('status', array('company_name' => $result[0]));
                $this->load->view('template/footer');
            } else {
                echo 'please contact site administrator';
            }
        }
    }

    public function validate_email($email_address, $email_code) {

        $email_code = trim($email_code);
        $validated = $this->subscribe_model->validate_email($email_address, $email_code);

        if ($validated === true) {
            $show['email_id'] = $email_address;
//            $this->load->view('template/header');
            $this->load->view('register', $show);
//            $this->load->view('template/footer');
        } else {
            echo 'Error giving email activated confirmation, please contact admin@bulkhouse.com';
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect(site_url());
    }

}
