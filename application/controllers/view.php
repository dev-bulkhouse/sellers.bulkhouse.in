<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class View extends CI_Controller {

    private $logged_in;

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('register_model');
        $this->load->model('vendor_model');
        $this->load->model('vendor_update');

        if ($this->session->userdata('logged_in')) {
            $this->logged_in = true;
            } else {
            $this->logged_in = false;
            redirect('/', 'location');
        }
    }

    public function account() {
        $this->load->view('template/header');
        $this->load->view('account');
        $this->load->view('template/footer');
    }

    public function bank() {
        $logged = $this->logged_in;
//                $this->load->view('template/header');
        $this->load->view('bank', array('logged_in' => $logged));
//                $this->load->view('template/footer');
    }

    public function settings() {
        $logged = $this->logged_in;
//                $this->load->view('template/header');
        $this->load->view('changepassword', array('logged_in' => $logged));
//                $this->load->view('template/footer');
    }

    public function company() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Email Address', 'trim|required|min_length[6]|max_length[100]|valid_email|is_unique[users.email]|xss_clean');
        $this->form_validation->set_message('is_unique[users.email]', 'The email is already taken');
        $logged = $this->logged_in;
//                $this->load->view('template/header');
        $this->load->view('companypro', array('logged_in' => $logged));

//                $this->load->view('template/footer');
    }

    public function view_data() {
        $logged = $this->logged_in;
//                $this->load->view('template/header');
        $this->load->view('view_details', array('logged_in' => $logged));
//                $this->load->view('template/footer');
    }

    public function terms() {

//                $this->load->view('template/header');
        $this->load->view('terms');
//                $this->load->view('template/footer');
    }
     public function mag_vendor() {

//                $this->load->view('template/header');
        $this->load->view('vendors');
//                $this->load->view('template/footer');
    }

    public function export_terms() {

//                $this->load->view('template/header');
        $this->load->view('export_terms');
//                $this->load->view('template/footer');
    }

    public function vendor_on_board() {
        $logged = $this->logged_in;
//                $this->load->view('template/header');
        $this->load->view('faqs', array('logged_in' => $logged));
//                $this->load->view('template/footer');
    }

    public function selling_process() {
        $logged = $this->logged_in;
//                $this->load->view('template/header');
        $this->load->view('faqs2', array('logged_in' => $logged));
//                $this->load->view('template/footer');
    }

    public function vendor_update() {
        $result = $this->vendor_update->edit();
//                $this->load->view('template/footer');
    }

    public function update_vendor() {
        $result = $this->register_model->update();


        if ($result) {
            $this->session->set_flashdata('success_message', 'Vendor Data Updated');
            redirect(base_url() . 'view/company', 'location');
        } else {
            redirect(base_url() . 'view/company', 'location');
        }
    }

    public function pending_vendor() {

        $result = $this->register_model->update_vend();
        if($result == true )
        {
        redirect(base_url() . 'main/', 'location');
        }
    }

    public function cenvat_doc($a, $b) {

        $this->register_model->cenvat_doc($a, $b);
    }

    public function serv_doc($a, $b) {

        $this->register_model->serv_doc($a, $b);
    }

    public function pro_cat($cid) {

        $result = $this->register_model->pro_caty($cid);

        if ($result) {
            $this->session->set_flashdata('success_message', 'Product Categories are Updated');
            redirect(base_url() . 'view/company', 'location');
        } else {
            $this->session->set_flashdata('error_message', 'Product Categories are Updated');
            redirect(base_url() . 'view/company', 'location');
        }
    }

    public function udc() {

        $this->load->view('forms/uploadform');
    }
     public function profile_step() {
         $logged = $this->logged_in;
        $this->load->view('pending_profile', array('logged_in' => $logged));
    }

    public function bank_step() {
        $logged = $this->logged_in;
        $this->load->view('pending_bank', array('logged_in' => $logged));
    }

    public function add_vendor() {

//        $this->load->view('admin/template/header');
        $result = $this->register_model->add_vendors();
        if ($result == 1) {
            redirect(base_url() . 'view/mag_vendor', 'location');
        }

//        $this->load->view('admin/template/footer');
    }
public function seller_update() {

//        $this->load->view('admin/template/header');
        $result = $this->register_model->insert_into();
        if ($result == 1) {
            redirect(base_url() . '', 'location');
        }

//        $this->load->view('admin/template/footer');
    }


    
   public function seller_test() {

        $this->load->view('seller_test');
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/view.php */