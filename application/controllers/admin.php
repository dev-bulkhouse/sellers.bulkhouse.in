<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if ($this->session->userdata('logged_in')) {
            $this->logged_in = true;
//            redirect(base_url().'verification/','location');
        } else {
            $this->logged_in = false;
//            redirect(base_url(),'location');
        }



        $this->load->model('login_model');
        $this->load->model('vendor_update');
        $this->load->helper('url');
    }

    public function index() {

//        $this->load->view('admin/template/header');
        $this->load->view('admin/login');
//        $this->load->view('admin/template/footer');
    }
     public function exports() {

//        $this->load->view('admin/template/header');
        $this->load->view('admin/export');
//        $this->load->view('admin/template/footer');
    }
    public function removed() {
        $this->load->view('admin/removed');
    }

    public function employees() {

//        $this->load->view('admin/template/header');
        $this->load->view('admin/employee');
//        $this->load->view('admin/template/footer');
    }
    public function add_agent() {

//        $this->load->view('admin/template/header');
        $result = $this->register_model->add_agents();
          if($result == 1){
            redirect(base_url() . 'admin/employees', 'location');
       }

//        $this->load->view('admin/template/footer');
    }

    public function leads() {

//        $this->load->view('admin/template/header');
        $this->load->view('admin/leads');
//        $this->load->view('admin/template/footer');
    }
    public function delete_lead($id)
	{
                $this->db->select('*');
        $this->db->from('leads');
        $this->db->where(array('leads.id' => $id));
       $result = $this->db->delete('leads');

		 if($result == 1){
            redirect(base_url() . 'admin/employees', 'location');
       }
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

            switch ($result) {
                case 'logged_in':
//                  $realname = $this->session->userdata('realname');
//                  $this->session->set_flashdata('success_message', 'Hi! '.ucfirst($realname).' You have Successfully Logged In!');
                    redirect(base_url() . 'verification/', 'location');
                    break;
                case 'incorrect_password':
//                  $this->load->view('template/header');
                    $this->session->set_flashdata('error_message', 'Incorrect Password');
//                    echo "wrong password";
                    redirect(base_url() . 'admin/', 'location');
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
        redirect('http://sellers.bulkhouse.in/admin', 'location');
    }

    public function details($doc_type) {

        if ($this->session->userdata('logged_in')) {
            $this->logged_in = true;
            $logged = $this->logged_in;
            $this->load->view('admin/template/header', array('doc_type' => $doc_type, 'logged_in' => $logged));
            $this->load->view('admin/document_details', array('doc_type' => $doc_type, 'logged_in' => $logged));
        } else {
            $this->logged_in = false;
            redirect(base_url() . 'admin/', 'location');
        }
    }

    public function vendor_details() {

        if ($this->session->userdata('logged_in')) {
            $this->logged_in = true;
            $logged = $this->logged_in;
            $this->load->view('admin/template/header', array('logged_in' => $logged));
            $this->load->view('admin/vendor_registers', array('logged_in' => $logged));
        } else {
            $this->logged_in = false;
            redirect(base_url() . 'admin/', 'location');
        }
    }

    public function vendor_profile() {

        if ($this->session->userdata('logged_in')) {
            $this->logged_in = true;
            $logged = $this->logged_in;
            $this->load->view('admin/template/header', array('logged_in' => $logged));
            $this->load->view('admin/vendor_profile', array('logged_in' => $logged));
        } else {
            $this->logged_in = false;
            redirect(base_url() . 'admin/', 'location');
        }
    }

    public function vendor_doc($id) {
        $vendor_details1 = $this->register_model->doc_data($id);
        foreach ($vendor_details1->result_array() as $row) {
            $detail['pan_prop'] = $row['pan_prop'];
        }
        if ($this->session->userdata('logged_in')) {
            $this->logged_in = true;
            $logged = $this->logged_in;
            $this->load->view('admin/template/header', array('logged_in' => $logged));
            //$this->load->view('admin/template/header',array('id'=>$id,'logged_in'=>$logged));
            $this->load->view('admin/document_details', $detail);
            //$this->load->view('admin/profiles',array('id'=>$id,'logged_in'=>$logged));
        } else {
            $this->logged_in = false;
            redirect(base_url() . 'admin/', 'location');
        }
    }

    public function profile($id) {

        $this->db->select('*');
        $this->db->from('vendor_details');
        $this->db->join('document_details', 'document_details.compid = vendor_details.id');
           $this->db->join('bank_details', 'bank_details.compid = vendor_details.id');

        $this->db->where(array('vendor_details.id' => $id));
         $this->db->group_by("vendor_details.id");

        $query = $this->db->get();
        foreach ($query->result_array() as $row) {
            $details['compid'] = $row['compid'];
            $details['vendor_name'] = $row['vendor_name'];
            $details['last_name'] = $row['last_name'];
            $details['company_name'] = $row['firm_name'];
            $details['firm_type'] = $row['firm_type'];
            $details['firm_name'] = $row['firm_name'];
            $details['email'] = $row['email'];
            $details['mobile'] = $row['mobile'];
            $details['pan_prop_status'] = $row['pan_prop_status'];
             $details['pan_comp_status'] = $row['pan_comp_status'];
              $details['vat_cst_status'] = $row['vat_cst_status'];
               $details['part_deed_status'] = $row['part_deed_status'];
               $details['photoid_status'] = $row['photoid_status'];
               $details['shop_establish_trade_status'] = $row['shop_establish_trade_status'];
               $details['businessid_status'] = $row['businessid_status'];
               $details['cert_of_incorp_status'] = $row['cert_of_incorp_status'];
               $details['moa_aoa_status'] = $row['moa_aoa_status'];
                 $details['aoa_status'] = $row['aoa_status'];
                  $details['addressid_status'] = $row['addressid_status'];
                   $details['status'] = $row['status'];
                    $details['comp_file_status'] = $row['comp_file_status'];
                    $details['canceled_check_status'] = $row['canceled_check_status'];
                     $details['address1'] = $row['address1'];
                       $details['address2'] = $row['address2'];
                        $details['city'] = $row['city'];
                         $details['state'] = $row['state'];
                          $details['country'] = $row['country'];
                           $details['pin_code'] = $row['pin_code'];
                             $details['cenvat_status'] = $row['cenvat_status'];
                               $details['servicetax_status'] = $row['servicetax_status'];
                               $details['year_establishment'] = $row['year_establishment'];
                               $details['no_employees'] = $row['no_employees'];
                               $details['reg_category'] = $row['reg_category'];
                               $details['website'] = $row['website'];
                                $details['land_line'] = $row['land_line'];
                                 $details['cert_products'] = $row['cert_products'];
                                  $details['comp_turnover'] = $row['comp_turnover'];
                                   $details['registered_on'] = $row['registered_on'];

                                    $details['document'] = $row['pan_prop'];
            $details['document_date'] = $row['pan_prop_date'];
            $details['type'] = $row['pan_prop_type'];
            $details['file_name'] = "_pan_card";
            $details['button'] = "/pan_prop";

             $details['document'] = $row['vat_cst'];
            $details['document_date'] = $row['vat_cst_date'];
            $details['type'] = $row['vat_cst_type'];
            $details['file_name'] = "_vat";
            $details['button'] = "/vat_cst";

            $details['document_date'] = $row['aoa_date'];
            $details['type'] = $row['aoa_type'];
            $details['file_name'] = "_aoa";
            $details['button'] = "/aoa";

             $details['document_date'] = $row['shop_establish_trade_date'];
            $details['type'] = $row['shop_establish_trade_type'];
            $details['file_name'] = "_shop_establish_trade_date";
            $details['button'] = "/shop_establish_trade";

            $details['file_name'] = "_addressid";
            $details['button'] = "/addressid";
            $details['document_date'] = $row['addressid_date'];
            $details['type'] = $row['addressid_type'];

             $details['file_name'] = "_businessid";
            $details['button'] = "/businessid";
            $details['document_date'] = $row['businessid_date'];
            $details['type'] = $row['businessid_type'];


            $details['document_date'] = $row['pan_comp_date'];
            $details['type'] = $row['pan_comp_type'];
            $details['document_name'] = "Company PAN Number";
            $details['file_name'] = "_pan_comp";
            $details['button'] = "/pan_comp";

            $this->load->view('admin/profiles', $details);
        }

    }

    public function bankdetails() {

        if ($this->session->userdata('logged_in')) {
            $this->logged_in = true;
            $logged = $this->logged_in;
            $this->load->view('admin/template/header', array('logged_in' => $logged));
            $this->load->view('admin/bank_final_details', array('logged_in' => $logged));
        } else {
            $this->logged_in = false;
            redirect(base_url() . 'admin/', 'location');
        }
    }

    public function bankaccounts() {


        if ($this->session->userdata('logged_in')) {
            $this->logged_in = true;
            $logged = $this->logged_in;
            $this->load->view('admin/template/header', array('logged_in' => $logged));
            $this->load->view('admin/bank_details', array('logged_in' => $logged));
        } else {
            $this->logged_in = false;
            redirect(base_url() . 'admin/', 'location');
        }
    }

    public function bankaccounts2() {


        if ($this->session->userdata('logged_in')) {
            $this->logged_in = true;
            $logged = $this->logged_in;
            $this->load->view('admin/template/header', array('logged_in' => $logged));
            $this->load->view('admin/bank_final_details', array('logged_in' => $logged));
        } else {
            $this->logged_in = false;
            redirect(base_url() . 'admin/', 'location');
        }
    }

    public function document_preview_pan() {
        $compid = $_GET['id'];
        $this->db->select('*');
        $this->db->from('document_details');
        $this->db->join('vendor_details', 'vendor_details.id = compid');
        $this->db->where(array('vendor_details.id' => $compid));
        $query = $this->db->get();
        foreach ($query->result_array() as $row) {
            $details['compid'] = $row['compid'];
            $details['vendor_name'] = $row['vendor_name'];
            $details['last_name'] = $row['last_name'];
            $details['company_name'] = $row['firm_name'];
            $details['firm_type'] = $row['firm_type'];
            $details['firm_name'] = $row['firm_name'];
            $details['email'] = $row['email'];
            $details['mobile'] = $row['mobile'];
            $details['document'] = $row['pan_prop'];
            $details['document_date'] = $row['pan_prop_date'];
            $details['type'] = $row['pan_prop_type'];
            $details['file_name'] = "_pan_card";
            $details['button'] = "/pan_prop";
            $details['document_name'] = "Pan Card Number";

            $this->load->view('admin/preview_details', $details);
        }
    }

    public function document_preview_vat() {
        $compid = $_GET['id'];
        $this->db->select('*');
        $this->db->from('document_details');
        $this->db->join('vendor_details', 'vendor_details.id = compid');
        $this->db->where(array('vendor_details.id' => $compid));
        $query = $this->db->get();
        foreach ($query->result_array() as $row) {
            $details['compid'] = $row['compid'];
            $details['vendor_name'] = $row['vendor_name'];
            $details['last_name'] = $row['last_name'];
            $details['company_name'] = $row['firm_name'];
            $details['firm_type'] = $row['firm_type'];
            $details['firm_name'] = $row['firm_name'];
            $details['email'] = $row['email'];
            $details['mobile'] = $row['mobile'];
            $details['document'] = $row['vat_cst'];

            $details['document_date'] = $row['vat_cst_date'];
            $details['type'] = $row['vat_cst_type'];
            $details['file_name'] = "_vat";
            $details['button'] = "/vat_cst";
            $details['document_name'] = "VAT Number";

            $this->load->view('admin/preview_details', $details);
        }
    }

    public function document_preview_cst() {
        $compid = $_GET['id'];
        $this->db->select('*');
        $this->db->from('document_details');
        $this->db->join('vendor_details', 'vendor_details.id = compid');
        $this->db->where(array('vendor_details.id' => $compid));
        $query = $this->db->get();
        foreach ($query->result_array() as $row) {
            $details['compid'] = $row['compid'];
            $details['vendor_name'] = $row['vendor_name'];
            $details['last_name'] = $row['last_name'];
            $details['company_name'] = $row['firm_name'];
            $details['firm_type'] = $row['firm_type'];
            $details['firm_name'] = $row['firm_name'];
            $details['email'] = $row['email'];
            $details['mobile'] = $row['mobile'];
            $details['document'] = $row['cst'];
            $details['document_date'] = $row['cst_date'];
            $details['type'] = $row['cst_type'];
            $details['file_name'] = "_cst";
            $details['button'] = "/cst";
            $details['document_name'] = "CST Number";

            $this->load->view('admin/preview_details', $details);
        }
    }

    public function document_preview_aoa() {
        $compid = $_GET['id'];
        $this->db->select('*');
        $this->db->from('document_details');
        $this->db->join('vendor_details', 'vendor_details.id = compid');
        $this->db->where(array('vendor_details.id' => $compid));
        $query = $this->db->get();
        foreach ($query->result_array() as $row) {
            $details['compid'] = $row['compid'];
            $details['vendor_name'] = $row['vendor_name'];
            $details['last_name'] = $row['last_name'];
            $details['company_name'] = $row['firm_name'];
            $details['firm_type'] = $row['firm_type'];
            $details['firm_name'] = $row['firm_name'];
            $details['email'] = $row['email'];
            $details['mobile'] = $row['mobile'];
            $details['address'] = "Address";
            $details['address1'] = $row['address1'];
            $details['address2'] = $row['address2'];

            $details['document_date'] = $row['aoa_date'];
            $details['type'] = $row['aoa_type'];
            $details['file_name'] = "_aoa";
            $details['button'] = "/aoa";

            $this->load->view('admin/preview_details', $details);
        }
    }

    public function document_preview_shop_establish_trade() {
        $compid = $_GET['id'];
        $this->db->select('*');
        $this->db->from('document_details');
        $this->db->join('vendor_details', 'vendor_details.id = compid');
        $this->db->where(array('vendor_details.id' => $compid));
        $query = $this->db->get();
        foreach ($query->result_array() as $row) {
            $details['compid'] = $row['compid'];
            $details['vendor_name'] = $row['vendor_name'];
            $details['last_name'] = $row['last_name'];
            $details['company_name'] = $row['firm_name'];
            $details['firm_type'] = $row['firm_type'];
            $details['firm_name'] = $row['firm_name'];
            $details['email'] = $row['email'];
            $details['mobile'] = $row['mobile'];
            $details['address'] = "Address";
            $details['address1'] = $row['address1'];
            $details['address2'] = $row['address2'];

            $details['document_date'] = $row['shop_establish_trade_date'];
            $details['type'] = $row['shop_establish_trade_type'];
            $details['file_name'] = "_shop_establish_trade";

            $details['button'] = "/shop_establish_trade";
            $details['document_name'] = "Shop establish trade Number";

            $this->load->view('admin/preview_details', $details);
        }
    }

    public function document_preview_addressid() {
        $compid = $_GET['id'];
        $this->db->select('*');
        $this->db->from('document_details');
        $this->db->join('vendor_details', 'vendor_details.id = compid');
        $this->db->where(array('vendor_details.id' => $compid));
        $query = $this->db->get();
        foreach ($query->result_array() as $row) {
            $details['compid'] = $row['compid'];
            $details['vendor_name'] = $row['vendor_name'];
            $details['last_name'] = $row['last_name'];
            $details['company_name'] = $row['firm_name'];
            $details['firm_type'] = $row['firm_type'];
            $details['firm_name'] = $row['firm_name'];
            $details['email'] = $row['email'];
            $details['mobile'] = $row['mobile'];
            $details['file_name'] = "_addressid";
            $details['button'] = "/addressid";
            $details['document_date'] = $row['addressid_date'];
            $details['type'] = $row['addressid_type'];
            $details['document_name'] = "AddressID Number";
            $this->load->view('admin/preview_details', $details);
            $details['address'] = "Address";
            $details['address1'] = $row['address1'];
            $details['address2'] = $row['address2'];
        }
    }

    public function document_preview_businessid() {
        $compid = $_GET['id'];
        $this->db->select('*');
        $this->db->from('document_details');
        $this->db->join('vendor_details', 'vendor_details.id = compid');
        $this->db->where(array('vendor_details.id' => $compid));
        $query = $this->db->get();
        foreach ($query->result_array() as $row) {
            $details['compid'] = $row['compid'];
            $details['vendor_name'] = $row['vendor_name'];
            $details['last_name'] = $row['last_name'];
            $details['company_name'] = $row['firm_name'];
            $details['firm_type'] = $row['firm_type'];
            $details['firm_name'] = $row['firm_name'];
            $details['email'] = $row['email'];
            $details['mobile'] = $row['mobile'];
            $details['file_name'] = "_businessid";
            $details['button'] = "/businessid";
            $details['document_date'] = $row['businessid_date'];
            $details['type'] = $row['businessid_type'];
            $details['document_name'] = "BusinessID Number";
            $this->load->view('admin/preview_details', $details);
        }
    }

    public function document_preview_cenvat() {
        $compid = $_GET['id'];
        $this->db->select('*');
        $this->db->from('document_details');
        $this->db->join('vendor_details', 'vendor_details.id = compid');
        $this->db->where(array('vendor_details.id' => $compid));
        $query = $this->db->get();
        foreach ($query->result_array() as $row) {
            $details['compid'] = $row['compid'];
            $details['vendor_name'] = $row['vendor_name'];
            $details['last_name'] = $row['last_name'];
            $details['company_name'] = $row['firm_name'];
            $details['firm_type'] = $row['firm_type'];
            $details['firm_name'] = $row['firm_name'];
            $details['email'] = $row['email'];
            $details['mobile'] = $row['mobile'];
            $details['file_name'] = "_cenvat";
            $details['button'] = "/cenvat";
            $details['document_date'] = $row['cenvat_date'];
            $details['type'] = $row['cenvat_type'];
            $details['document_name'] = "CENVAT Number";

            $this->load->view('admin/preview_details', $details);
        }
    }

    public function document_preview_servicetax() {
        $compid = $_GET['id'];
        $this->db->select('*');
        $this->db->from('document_details');
        $this->db->join('vendor_details', 'vendor_details.id = compid');
        $this->db->where(array('vendor_details.id' => $compid));
        $query = $this->db->get();
        foreach ($query->result_array() as $row) {
            $details['compid'] = $row['compid'];
            $details['vendor_name'] = $row['vendor_name'];
            $details['last_name'] = $row['last_name'];
            $details['company_name'] = $row['firm_name'];
            $details['firm_type'] = $row['firm_type'];
            $details['firm_name'] = $row['firm_name'];
            $details['email'] = $row['email'];
            $details['mobile'] = $row['mobile'];
            $details['document_name'] = "Service TAX Number";
            $details['document_date'] = $row['servicetax_date'];
            $details['type'] = $row['servicetax_type'];
            $details['file_name'] = "_servicetax";
            $details['button'] = "/servicetax";


            $this->load->view('admin/preview_details', $details);
        }
    }

    public function document_preview_pan_comp() {
        $compid = $_GET['id'];
        $this->db->select('*');
        $this->db->from('document_details');
        $this->db->join('vendor_details', 'vendor_details.id = compid');
        $this->db->where(array('vendor_details.id' => $compid));
        $query = $this->db->get();
        foreach ($query->result_array() as $row) {
            $details['compid'] = $row['compid'];
            $details['vendor_name'] = $row['vendor_name'];
            $details['last_name'] = $row['last_name'];
            $details['company_name'] = $row['firm_name'];
            $details['firm_type'] = $row['firm_type'];
            $details['firm_name'] = $row['firm_name'];
            $details['email'] = $row['email'];
            $details['mobile'] = $row['mobile'];
            $details['document'] = $row['pan_comp'];
            $details['document_date'] = $row['pan_comp_date'];
            $details['type'] = $row['pan_comp_type'];
            $details['document_name'] = "Company PAN Number";
            $details['file_name'] = "_pan_company";
            $details['button'] = "/pan_comp";
            $this->load->view('admin/preview_details', $details);
        }
    }

    public function document_preview_photoid() {
        $compid = $_GET['id'];
        $this->db->select('*');
        $this->db->from('document_details');
        $this->db->join('vendor_details', 'vendor_details.id = compid');
        $this->db->where(array('vendor_details.id' => $compid));
        $query = $this->db->get();
        foreach ($query->result_array() as $row) {
            $details['compid'] = $row['compid'];
            $details['vendor_name'] = $row['vendor_name'];
            $details['last_name'] = $row['last_name'];
            $details['company_name'] = $row['firm_name'];
            $details['firm_type'] = $row['firm_type'];
            $details['firm_name'] = $row['firm_name'];
            $details['email'] = $row['email'];
            $details['mobile'] = $row['mobile'];
            $details['document'] = $row['photoid'];
            $details['document_date'] = $row['photoid_date'];
            $details['type'] = $row['photoid_type'];
            $details['document_name'] = "PhotoID Number";
            $details['file_name'] = "_photoid";
            $details['button'] = "/photoid";
            $details['address'] = "Address";
            $details['address1'] = $row['address1'];
            $details['address2'] = $row['address2'];
            $this->load->view('admin/preview_details', $details);
        }
    }

    public function document_preview_part_deed() {
        $compid = $_GET['id'];
        $this->db->select('*');
        $this->db->from('document_details');
        $this->db->join('vendor_details', 'vendor_details.id = compid');
        $this->db->where(array('vendor_details.id' => $compid));
        $query = $this->db->get();
        foreach ($query->result_array() as $row) {
            $details['compid'] = $row['compid'];
            $details['vendor_name'] = $row['vendor_name'];
            $details['last_name'] = $row['last_name'];
            $details['company_name'] = $row['firm_name'];
            $details['firm_type'] = $row['firm_type'];
            $details['firm_name'] = $row['firm_name'];
            $details['email'] = $row['email'];
            $details['mobile'] = $row['mobile'];
            $details['document'] = $row['part_deed'];
            $details['document_date'] = $row['part_deed_date'];
            $details['type'] = $row['part_deed_type'];
            $details['file_name'] = "_partnership_deed";
            $details['button'] = "/part_deed";
            $details['address'] = "Address";
            $details['address1'] = $row['address1'];
            $details['address2'] = $row['address2'];

            $this->load->view('admin/preview_details', $details);
        }
    }

    public function document_preview_sign() {
        $compid = $_GET['id'];
        $this->db->select('*');
        $this->db->from('document_details');
        $this->db->join('vendor_details', 'vendor_details.id = compid');
        $this->db->where(array('vendor_details.id' => $compid));
        $query = $this->db->get();
        foreach ($query->result_array() as $row) {
            $details['compid'] = $row['compid'];
            $details['vendor_name'] = $row['vendor_name'];
            $details['last_name'] = $row['last_name'];
            $details['company_name'] = $row['firm_name'];
            $details['firm_type'] = $row['firm_type'];
            $details['firm_name'] = $row['firm_name'];
            $details['email'] = $row['email'];
            $details['mobile'] = $row['mobile'];
            $details['document'] = $row['sign'];
            $details['document_date'] = $row['sign_date'];
            $details['type'] = $row['sign_type'];
            $details['file_name'] = "_sign";
            $details['button'] = "/sign";
            $details['document_name'] = "Authorised Signatory Number";

            $this->load->view('admin/preview_details', $details);
        }
    }

    public function document_preview_moa_aoa() {
        $compid = $_GET['id'];
        $this->db->select('*');
        $this->db->from('document_details');
        $this->db->join('vendor_details', 'vendor_details.id = compid');
        $this->db->where(array('vendor_details.id' => $compid));
        $query = $this->db->get();
        foreach ($query->result_array() as $row) {
            $details['compid'] = $row['compid'];
            $details['vendor_name'] = $row['vendor_name'];
            $details['last_name'] = $row['last_name'];
            $details['company_name'] = $row['firm_name'];
            $details['firm_type'] = $row['firm_type'];
            $details['firm_name'] = $row['firm_name'];
            $details['email'] = $row['email'];
            $details['mobile'] = $row['mobile'];
            $details['document'] = $row['moa_aoa'];
            $details['document_date'] = $row['moa_aoa_date'];
            $details['type'] = $row['moa_aoa_type'];
            $details['file_name'] = "_moa_aoa";
            $details['button'] = "/moa_aoa";
            $details['address'] = "Address";
            $details['address1'] = $row['address1'];
            $details['address2'] = $row['address2'];

            $this->load->view('admin/preview_details', $details);
        }
    }

    public function document_preview_cert_of_incorp() {
        $compid = $_GET['id'];
        $this->db->select('*');
        $this->db->from('document_details');
        $this->db->join('vendor_details', 'vendor_details.id = compid');
        $this->db->where(array('vendor_details.id' => $compid));
        $query = $this->db->get();
        foreach ($query->result_array() as $row) {
            $details['compid'] = $row['compid'];
            $details['vendor_name'] = $row['vendor_name'];
            $details['last_name'] = $row['last_name'];
            $details['company_name'] = $row['firm_name'];
            $details['firm_type'] = $row['firm_type'];
            $details['firm_name'] = $row['firm_name'];
            $details['email'] = $row['email'];
            $details['mobile'] = $row['mobile'];
            $details['document'] = $row['cert_of_incorp'];
            $details['document_date'] = $row['cert_of_incorp_date'];
            $details['type'] = $row['cert_of_incorp_type'];
            $details['file_name'] = "_certificate_of_incorporation";
            $details['button'] = "/cert_of_incorp";
            $details['document_name'] = "Certificate Of Incorporation";
            $details['address'] = "Address";
            $details['address1'] = $row['address1'];
            $details['address2'] = $row['address2'];
            $this->load->view('admin/preview_details', $details);
        }
    }

    public function document_preview_profile() {
        $compid = $_GET['id'];
        $this->db->select('*');
        $this->db->from('document_details');
        $this->db->join('vendor_details', 'vendor_details.id = compid');
        $this->db->where(array('vendor_details.id' => $compid));
        $query = $this->db->get();
        foreach ($query->result_array() as $row) {
            $details['compid'] = $row['compid'];
            $details['vendor_name'] = $row['vendor_name'];
            $details['last_name'] = $row['last_name'];
            $details['company_name'] = $row['firm_name'];
            $details['firm_type'] = $row['firm_type'];
            $details['firm_name'] = $row['firm_name'];
            $details['email'] = $row['email'];
            $details['mobile'] = $row['mobile'];
            $details['document'] = $row['comp_file'];
            $details['document_date'] = $row['comp_file_date'];
            $details['type'] = $row['comp_file_type'];
            $details['file_name'] = "_comp_file";
            $details['button'] = "/comp_file";
            $details['address'] = "Address";
            $details['address1'] = $row['address1'];
            $details['address2'] = $row['address2'];
            $this->load->view('admin/preview_details', $details);
        }
    }
    public function document_preview_canceled_check() {
        $compid = $_GET['id'];
        $this->db->select('*');
        $this->db->from('document_details');
        $this->db->join('vendor_details', 'vendor_details.id = compid');
        $this->db->where(array('vendor_details.id' => $compid));
        $query = $this->db->get();
        foreach ($query->result_array() as $row) {
            $details['compid'] = $row['compid'];
            $details['vendor_name'] = $row['vendor_name'];
            $details['last_name'] = $row['last_name'];
            $details['company_name'] = $row['firm_name'];
            $details['firm_type'] = $row['firm_type'];
            $details['firm_name'] = $row['firm_name'];
            $details['email'] = $row['email'];
            $details['mobile'] = $row['mobile'];
            $details['document'] = $row['canceled_check'];
            $details['document_date'] = $row['canceled_check_date'];
            $details['type'] = $row['canceled_check_type'];
            $details['file_name'] = "_canceled_check";
            $details['button'] = "/canceled_check";
            $details['address'] = "Address";
            $details['address1'] = $row['address1'];
            $details['address2'] = $row['address2'];
            $this->load->view('admin/preview_details', $details);
        }
    }


    public function add_leads() {
            $email = $this->input->post('email');
            $name = $this->input->post('name');
            $phone = $this->input->post('phone');
            $agent = $this->input->post('agent');
            $res = $this->register_model->check_email_lead($email);
            if ($res[0] == 'one') {
                $email2 = $res[1];
                $agent2 = $res[2];
                $this->session->set_flashdata('success_message', 'This Email : '.$email2.' was already in the leads of agent '.$agent2.'.');
            redirect(base_url() . 'admin/leads', 'location');

            }elseif($res[0] == 'two'){
                $result = $this->register_model->add_leads($email,$name,$phone,$agent);
       if($result == 1){
            redirect(base_url() . 'admin/leads', 'location');
       }
            }


       }
       public function edit_lead($id)
	{
		$result=$this->register_model->editleads($id);
                 foreach ($result as $row) {

             $data['vendor_email'] = $row['vendor_email'];
             $data['vendor_phone'] = $row['vendor_phone'];
             $data['vendor_name'] = $row['vendor_name'];

             $data['id'] = $id;
        }

		$this->load->view('admin/edit_lead',$data);

	}

        public function edit_agent($id)
	{
		$result=$this->register_model->editagents($id);
                 foreach ($result as $row) {

             $data['agent_name'] = $row['agent_name'];
             $data['agent_id'] = $row['agent_id'];
             $data['id'] = $id;
        }

		$this->load->view('admin/edit_agent',$data);

	}
        public function delete_agent($id)
	{
		$this->db->where('id', $id);
                $this->db->delete('employee');
                if ($this->db->affected_rows() == 1) {
                redirect(base_url() . 'admin/view_agents', 'location');
        }



	}

        public function view_agents() {
            $this->load->view('admin/view_agents');
        }
	public function update_lead()
	{

		$email = $this->input->post('email');
                $name = $this->input->post('name');
                $phone = $this->input->post('phone');
                $agent = $this->input->post('agent');
                $id = $this->input->post('id');

           $result = $this->register_model->update_lead($email,$name,$phone,$agent,$id);
       if($result == 1){
            redirect(base_url() . 'admin/employees', 'location');
       }

	}

        public function update_agent()
	{

		$agent_name = $this->input->post('agent_name');
                $agent_id = $this->input->post('agent_id');
                $id = $this->input->post('id');

           $result = $this->register_model->update_agent($agent_name,$agent_id,$id);
       if($result == 1){
            redirect(base_url() . 'admin/view_agents', 'location');
       }

	}

}
