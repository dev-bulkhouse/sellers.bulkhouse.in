<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin extends CI_Controller {



    public function __construct() {
        parent::__construct();

         if($this->session->userdata('logged_in')){
            $this->logged_in = true;
//            redirect(base_url().'verification/','location');

        }  else {
            $this->logged_in = false;
//            redirect(base_url(),'location');
        }



        $this->load->model('login_model');
        $this->load->helper('url');
    }

    public function index() {

//        $this->load->view('admin/template/header');
        $this->load->view('admin/login');
//        $this->load->view('admin/template/footer');
    }

    public function login_admin() {

        $this->load->library('form_validation');
        //$this->form_validation->set_rules('email', 'Email Address', 'trim|required|min_length[6]|max_length[100]|valid_email|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[3]|max_length[50]');


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header');
            echo "Wrong Email and Password";
//            $this->load->view('login');
            $this->load->view('template/footer');
        } else {

            $result = $this->login_model->login_admin();

            switch ($result){
                case 'logged_in':
//                  $realname = $this->session->userdata('realname');
//                  $this->session->set_flashdata('success_message', 'Hi! '.ucfirst($realname).' You have Successfully Logged In!');
                    redirect(base_url().'verification/','location');
                    break;
                case 'incorrect_password':
//                  $this->load->view('template/header');
                    $this->session->set_flashdata('error_message', 'Incorrect Password');
//                    echo "wrong password";
                    redirect(base_url().'admin/','location');
                    break;
                case 'not_activated':
                    $this->load->view('template/header');
                    echo "<div style='text-align:center'><h1>not activated </h1><h3>Please Activate againg if you have already activated</h3><h4>Click On You Email Link - We are on Migration</h4></div>";
                    $this->load->view('template/footer');
                    break;
                case 'email_not_found':
                    $this->load->view('template/header');
                    echo "email not found";
                    $this->load->view('template/footer');
                    break;

            }
        }
    }

     public function logout() {
        $this->session->sess_destroy();
        redirect('/admin','location');
    }

    public function details($doc_type) {

        if($this->session->userdata('logged_in')){
            $this->logged_in = true;
            $logged = $this->logged_in;
            $this->load->view('admin/template/header',array('doc_type'=>$doc_type,'logged_in'=>$logged));
            $this->load->view('admin/document_details',array('doc_type'=>$doc_type,'logged_in'=>$logged));

        }  else {
            $this->logged_in = false;
           redirect(base_url().'admin/','location');
        }
    }
    public function vendor_details() {

        if($this->session->userdata('logged_in')){
            $this->logged_in = true;
            $logged = $this->logged_in;
            $this->load->view('admin/template/header',array('logged_in'=>$logged));
            $this->load->view('admin/vendor_registers',array('logged_in'=>$logged));

        }  else {
            $this->logged_in = false;
           redirect(base_url().'admin/','location');
        }
    }
    public function bankdetails() {

        if($this->session->userdata('logged_in')){
            $this->logged_in = true;
            $logged = $this->logged_in;
            $this->load->view('admin/template/header',array('logged_in'=>$logged));
            $this->load->view('admin/bank_final_details',array('logged_in'=>$logged));

        }  else {
            $this->logged_in = false;
           redirect(base_url().'admin/','location');
        }
    }

    public function bankaccounts() {


         if($this->session->userdata('logged_in')){
            $this->logged_in = true;
            $logged = $this->logged_in;
            $this->load->view('admin/template/header',array('logged_in'=>$logged));
            $this->load->view('admin/bank_details',array('logged_in'=>$logged));

        }  else {
            $this->logged_in = false;
           redirect(base_url().'admin/','location');
        }
    }
    public function bankaccounts2() {


         if($this->session->userdata('logged_in')){
            $this->logged_in = true;
            $logged = $this->logged_in;
            $this->load->view('admin/template/header',array('logged_in'=>$logged));
            $this->load->view('admin/bank_final_details',array('logged_in'=>$logged));

        }  else {
            $this->logged_in = false;
           redirect(base_url().'admin/','location');
        }
    }

}
