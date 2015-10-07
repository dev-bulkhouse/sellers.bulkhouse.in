<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('login_model');
        $this->load->model('register_model');
        $this->load->helper('url');
    }

    public function index() {

        $this->load->view('template/header');
        $this->load->view('home');
        $this->load->view('template/footer');
    }

    public function login_user() {

        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Email Address', 'trim|required|min_length[6]|max_length[100]|valid_email|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[3]|max_length[50]');


        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error_message', 'not a valid email and password');
         redirect(base_url().'','location');
        } else {

            $result = $this->login_model->login_user();

            switch ($result){
                case 'logged_in':
                  $vendor_name = $this->session->userdata('vendor_name');
                  $this->session->set_flashdata('success_message', 'Hi! '.ucfirst($vendor_name).' You have Successfully Logged In!');
                    redirect(base_url().'main/','location');
                    break;
                case 'incorrect_password':
                    $this->load->view('template/header');
                    $this->session->set_flashdata('error_message', 'Incorrect Password');
                     redirect(base_url().'','location');

//                    $this->load->view('/login');
                    $this->load->view('template/footer');
                    break;
                case 'not_activated':
                    $this->load->view('template/header');

                     $this->session->set_flashdata('warning_message', 'Your account is not yet activated. To activate your account, please click on the verification link sent to your Email ID.<br/>Thank you');
                redirect(base_url().'','location');
                    $this->load->view('template/footer');
                    break;
                case 'email_not_found':
                    $this->load->view('template/header');

                      $this->session->set_flashdata('success_message', 'email not found');
                redirect(base_url().'','location');
                    $this->load->view('template/footer');
                    break;

            }
        }
    }


public function change() // we will load models here to check with database
{
$sql = $this->db->select("*")->from("vendor_details")->where("email",$this->session->userdata('email'))->get();

foreach ($sql->result() as $my_info) {

$db_password = $my_info->password;
$id = $my_info->id;

}

if(sha1($this->config->item('bulk-lock') .$this->input->post("opassword")) == $db_password){

$fixed_pw = sha1($this->config->item('bulk-lock') .$this->input->post("npassword"));
$new_password = $this->input->post("npassword");
$data = array(
               'password' => $fixed_pw
            );
$this->db->where('id', $id);
$this->db->update('vendor_details', $data);
$custemail = $this->register_model->get_email($id);
$custid = $this->register_model->get_mag_cust_id($custemail);
$this->update_seller($custid, $new_password);
   $this->session->set_flashdata('success_message', 'Password Updated');
                redirect(base_url().'','location');
return false;

}else

    $this->session->set_flashdata('alert_message', 'Wrong Old Password');
                redirect(base_url().'view/settings','location');

return false;

}

    public function update_seller($id,$new_password) {
        
        $client = new SoapClient('http://bulk.house/api/soap/?wsdl');

// If somestuff requires api authentification,
// then get a session token
$session = $client->login('inhouse_developer', '3125582');

$client->call($session, 'customer.update', 
 array('customerId' => $id, 'customerData' => 
   array('password_hash'=> md5($new_password))));


// If you don't need the session anymore
//$client->endSession($session);
      //  $this->load->spark('mage-api/0.0.1');
        //$this->mage_api->customer_update(array('customerId' => $id,'customerData' => array('password_hash' => md5($new_password))));
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('http://bulkhouse.in/','location');
    }

    public function update_field(){
//        alert('Added');
    }

}
