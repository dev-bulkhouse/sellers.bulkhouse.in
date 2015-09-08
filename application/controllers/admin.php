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

     public function document_preview_pan() {
        $compid = $_GET['id'];
        $this->db->select('*');
        $this->db->from('document_details');
        $this->db->join('vendor_details', 'vendor_details.id = compid');
        $this->db->where(array('vendor_details.id' => $compid));
        $query = $this->db->get();
        foreach($query->result_array() as $row)
{
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
     $details['file_name']= "_pan_card";
      $details['button']= "/pan_prop";
     $details['document_name']= "Pan Card Number";

     $this->load->view('admin/preview_details',$details);

}

    }

    public function document_preview_vat() {
        $compid = $_GET['id'];
        $this->db->select('*');
        $this->db->from('document_details');
        $this->db->join('vendor_details', 'vendor_details.id = compid');
        $this->db->where(array('vendor_details.id' => $compid));
        $query = $this->db->get();
        foreach($query->result_array() as $row)
{
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
     $details['type'] = $row['pan_prop_type'];
      $details['file_name']= "_vat";
        $details['button']= "/vat";
     $details['document_name']= "VAT Number";

     $this->load->view('admin/preview_details',$details);

}

    }
     public function document_preview_cst() {
        $compid = $_GET['id'];
        $this->db->select('*');
        $this->db->from('document_details');
        $this->db->join('vendor_details', 'vendor_details.id = compid');
        $this->db->where(array('vendor_details.id' => $compid));
        $query = $this->db->get();
        foreach($query->result_array() as $row)
{
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
      $details['file_name']= "_cst";
        $details['button']= "/cst";
        $details['document_name']= "CST Number";

     $this->load->view('admin/preview_details',$details);

}

    }
     public function document_preview_aoa() {
        $compid = $_GET['id'];
        $this->db->select('*');
        $this->db->from('document_details');
        $this->db->join('vendor_details', 'vendor_details.id = compid');
        $this->db->where(array('vendor_details.id' => $compid));
        $query = $this->db->get();
        foreach($query->result_array() as $row)
{
     $details['compid'] = $row['compid'];
     $details['vendor_name'] = $row['vendor_name'];
     $details['last_name'] = $row['last_name'];
     $details['company_name'] = $row['firm_name'];
     $details['firm_type'] = $row['firm_type'];
     $details['firm_name'] = $row['firm_name'];
     $details['email'] = $row['email'];
     $details['mobile'] = $row['mobile'];

     $details['document_date'] = $row['aoa_date'];
     $details['type'] = $row['aoa_type'];
      $details['file_name']= "_aoa";
        $details['button']= "/aoa";
        $details['document_name']= "AOA Number";

     $this->load->view('admin/preview_details',$details);

}

    }
     public function document_preview_shop_establish_trade() {
        $compid = $_GET['id'];
        $this->db->select('*');
        $this->db->from('document_details');
        $this->db->join('vendor_details', 'vendor_details.id = compid');
        $this->db->where(array('vendor_details.id' => $compid));
        $query = $this->db->get();
        foreach($query->result_array() as $row)
{
     $details['compid'] = $row['compid'];
     $details['vendor_name'] = $row['vendor_name'];
     $details['last_name'] = $row['last_name'];
     $details['company_name'] = $row['firm_name'];
     $details['firm_type'] = $row['firm_type'];
     $details['firm_name'] = $row['firm_name'];
     $details['email'] = $row['email'];
     $details['mobile'] = $row['mobile'];

     $details['document_date'] = $row['shop_establish_trade_date'];
     $details['type'] = $row['shop_establish_trade_type'];
      $details['file_name']= "_shop_establish_trade_date";

     $details['button']= "/shop_establish_trade";
        $details['document_name']= "Shop establish trade Number";

     $this->load->view('admin/preview_details',$details);

}

    }
     public function document_preview_addressid()            {
        $compid = $_GET['id'];
        $this->db->select('*');
        $this->db->from('document_details');
        $this->db->join('vendor_details', 'vendor_details.id = compid');
        $this->db->where(array('vendor_details.id' => $compid));
        $query = $this->db->get();
        foreach($query->result_array() as $row)
{
     $details['compid'] = $row['compid'];
     $details['vendor_name'] = $row['vendor_name'];
     $details['last_name'] = $row['last_name'];
     $details['company_name'] = $row['firm_name'];
     $details['firm_type'] = $row['firm_type'];
     $details['firm_name'] = $row['firm_name'];
     $details['email'] = $row['email'];
     $details['mobile'] = $row['mobile'];
     $details['file_name']= "_addressid";
     $details['button']= "/addressid";
     $details['document_date'] = $row['addressid_date'];
     $details['type'] = $row['addressid_type'];
     $details['document_name']= "AddressID Number";
     $this->load->view('admin/preview_details',$details);

}

    }
     public function document_preview_businessid()           {
        $compid = $_GET['id'];
        $this->db->select('*');
        $this->db->from('document_details');
        $this->db->join('vendor_details', 'vendor_details.id = compid');
        $this->db->where(array('vendor_details.id' => $compid));
        $query = $this->db->get();
        foreach($query->result_array() as $row)
{
     $details['compid'] = $row['compid'];
     $details['vendor_name'] = $row['vendor_name'];
     $details['last_name'] = $row['last_name'];
     $details['company_name'] = $row['firm_name'];
     $details['firm_type'] = $row['firm_type'];
     $details['firm_name'] = $row['firm_name'];
     $details['email'] = $row['email'];
     $details['mobile'] = $row['mobile'];
     $details['file_name']= "_businessid";
     $details['button']= "/businessid";
     $details['document_date'] = $row['businessid_date'];
     $details['type'] = $row['businessid_type'];
   $details['document_name']= "BusinessID Number";
     $this->load->view('admin/preview_details',$details);

}

    }
     public function document_preview_cenvat()     {
        $compid = $_GET['id'];
        $this->db->select('*');
        $this->db->from('document_details');
        $this->db->join('vendor_details', 'vendor_details.id = compid');
        $this->db->where(array('vendor_details.id' => $compid));
        $query = $this->db->get();
        foreach($query->result_array() as $row)
{
     $details['compid'] = $row['compid'];
     $details['vendor_name'] = $row['vendor_name'];
     $details['last_name'] = $row['last_name'];
     $details['company_name'] = $row['firm_name'];
     $details['firm_type'] = $row['firm_type'];
     $details['firm_name'] = $row['firm_name'];
     $details['email'] = $row['email'];
     $details['mobile'] = $row['mobile'];
    $details['file_name']= "_cenvat";
     $details['button']= "/cenvat";
     $details['document_date'] = $row['cenvat_date'];
     $details['type'] = $row['cenvat_type'];
        $details['document_name']= "CENVAT Number";

     $this->load->view('admin/preview_details',$details);

}

    }
     public function document_preview_servicetax() {
        $compid = $_GET['id'];
        $this->db->select('*');
        $this->db->from('document_details');
        $this->db->join('vendor_details', 'vendor_details.id = compid');
        $this->db->where(array('vendor_details.id' => $compid));
        $query = $this->db->get();
        foreach($query->result_array() as $row)
{
     $details['compid'] = $row['compid'];
     $details['vendor_name'] = $row['vendor_name'];
     $details['last_name'] = $row['last_name'];
     $details['company_name'] = $row['firm_name'];
     $details['firm_type'] = $row['firm_type'];
     $details['firm_name'] = $row['firm_name'];
     $details['email'] = $row['email'];
     $details['mobile'] = $row['mobile'];
       $details['document_name']= "Service TAX Number";
     $details['document_date'] = $row['servicetax_date'];
     $details['type'] = $row['servicetax_type'];
     $details['file_name']= "_servicetax";
     $details['button']= "/servicetax";


     $this->load->view('admin/preview_details',$details);

}

    }
     public function document_preview_pan_comp() {
        $compid = $_GET['id'];
        $this->db->select('*');
        $this->db->from('document_details');
        $this->db->join('vendor_details', 'vendor_details.id = compid');
        $this->db->where(array('vendor_details.id' => $compid));
        $query = $this->db->get();
        foreach($query->result_array() as $row)
{
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
   $details['document_name']= "Company PAN Number";
    $details['file_name']= "_pan_comp";
     $details['button']= "/pan_comp";
     $this->load->view('admin/preview_details',$details);

}

    }
     public function document_preview_photoid() {
        $compid = $_GET['id'];
        $this->db->select('*');
        $this->db->from('document_details');
        $this->db->join('vendor_details', 'vendor_details.id = compid');
        $this->db->where(array('vendor_details.id' => $compid));
        $query = $this->db->get();
        foreach($query->result_array() as $row)
{
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
   $details['document_name']= "PhotoID Number";
    $details['file_name']= "_photoid";
     $details['button']= "/photoid";
     $this->load->view('admin/preview_details',$details);

}

    }
     public function document_preview_part_deed() {
        $compid = $_GET['id'];
        $this->db->select('*');
        $this->db->from('document_details');
        $this->db->join('vendor_details', 'vendor_details.id = compid');
        $this->db->where(array('vendor_details.id' => $compid));
        $query = $this->db->get();
        foreach($query->result_array() as $row)
{
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
      $details['file_name']= "_part_deed";
     $details['button']= "/part_deed";
        $details['document_name']= "Partnership deed Number";

     $this->load->view('admin/preview_details',$details);

}

    }
     public function document_preview_sign() {
        $compid = $_GET['id'];
        $this->db->select('*');
        $this->db->from('document_details');
        $this->db->join('vendor_details', 'vendor_details.id = compid');
        $this->db->where(array('vendor_details.id' => $compid));
        $query = $this->db->get();
        foreach($query->result_array() as $row)
{
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
      $details['file_name']= "_sign";
     $details['button']= "/sign";
        $details['document_name']= "Authorised Signatory Number";

     $this->load->view('admin/preview_details',$details);

}

    }
     public function document_preview_moa_aoa() {
        $compid = $_GET['id'];
        $this->db->select('*');
        $this->db->from('document_details');
        $this->db->join('vendor_details', 'vendor_details.id = compid');
        $this->db->where(array('vendor_details.id' => $compid));
        $query = $this->db->get();
        foreach($query->result_array() as $row)
{
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
       $details['document_name']= "MOA and AOA Number";
        $details['file_name']= "_moa_aoa";
     $details['button']= "/moa_aoa";

     $this->load->view('admin/preview_details',$details);

}

    }
    public function document_preview_cert_of_incorp() {
        $compid = $_GET['id'];
        $this->db->select('*');
        $this->db->from('document_details');
        $this->db->join('vendor_details', 'vendor_details.id = compid');
        $this->db->where(array('vendor_details.id' => $compid));
        $query = $this->db->get();
        foreach($query->result_array() as $row)
{
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
     $details['file_name']= "_cert_of_incorp_type";
     $details['button']= "/cert_of_incorp_type";
       $details['document_name']= "Certificate Of Incorporation";

     $this->load->view('admin/preview_details',$details);

}

    }
   

}
