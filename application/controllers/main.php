<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Main extends CI_Controller {

    private $logged_in;

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('register_model');
        $this->load->model('vendor_model');
        $this->load->model('vendor_update');

        if ($this->session->userdata('logged_in')) {
            $this->logged_in = true;
            $this->update_profile();
        } else {
            $this->logged_in = false;
            redirect('/', 'location');
        }
    }

    public function index() {
        $logged = $this->logged_in;
//                $this->load->view('template/header',array('logged_in'=>$logged));
        //$this->load->view('main',array('logged_in'=>$logged));
//                $this->load->view('template/footer');
    }

    public function account() {
        $this->load->view('template/header');
        $this->load->view('account');
        $this->load->view('template/footer');
    }
    public function update_profile() {
        $email = $this->session->userdata('email');
        $compid = $this->register_model->get_compid($email);
        $logged = $this->logged_in;

        $profile = $this->vendor_update->profile_update($compid);
        if ($profile == true) {

            $this->load->view('pending_profile', array('logged_in' => $logged));
        } else {
            $this->update_bank();
        }
    }

    public function update_bank() {
        $email = $this->session->userdata('email');
        $compid = $this->register_model->get_compid($email);
        $logged = $this->logged_in;
//                $this->load->view('template/header');
        $bank = $this->vendor_update->status_bank($compid);
        if ($bank == 'Need To Submit') {
            $this->load->view('pending_bank', array('logged_in' => $logged));
        } else {
            $this->update_doc();
        }
//                $this->load->view('template/footer');
    }

    public function update_doc() {
        $email = $this->session->userdata('email');
        $compid = $this->register_model->get_compid($email);
        $logged = $this->logged_in;
//                $this->load->view('template/header');
        $doc_red = $this->vendor_update->redirect($compid);
        if ($doc_red == false) {

            $this->load->view('pending_doc', array('logged_in' => $logged));
        } elseif ($doc_red == true) {

           $this->dashboard();
        } {

        }
//                $this->load->view('template/footer');
    }

    public function dashboard() {
        $logged = $this->logged_in;
//                $this->load->view('template/header');
        $this->load->view('main', array('logged_in' => $logged));
//                $this->load->view('template/footer');
    }


    public function cenvat_doc($a, $b) {

        $this->register_model->cenvat_doc($a, $b);
    }

    public function serv_doc($a, $b) {

        $this->register_model->serv_doc($a, $b);
    }
 public function test() {

         $this->load->view('test');
    }


    }

/* End of file welcome.php */
/* Location: ./application/controllers/main.php */