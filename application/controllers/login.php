<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller

{

     public function __construct()
     {
          parent::__construct();
          $this->load->library('session');
          $this->load->helper('form');
          $this->load->helper('url');
          $this->load->helper('html');
          $this->load->database();
          $this->load->library('form_validation');
          //load the login model
          $this->load->model('login_model');
     }
      public function index()

        {
                $this->load->view('template/header');
		$this->load->view('login');
                $this->load->view('template/footer');
	}

     public function login_user()
     {
          //get the posted values
          $email = $this->input->post("email");
          $password = $this->input->post("password");

          //set validations
          $this->form_validation->set_rules("email", "Email", "trim|required");
          $this->form_validation->set_rules("password", "Password", "trim|required");

          if ($this->form_validation->run() == FALSE)
          {
               //validation fails
               $this->load->view('login_form');
          }
          else
          {
               //validation succeeds
               if ($this->input->post('log_in') == "Login")
               {
                    //check if username and password is correct
                    $usr_result = $this->login_model->get_user($email, $password);
                    if ($email_result > 0) //active user record is present
                    {
                         //set the session variables
                         $sessiondata = array(
                              'username' => $email,
                              'loginuser' => TRUE
                         );
                         $this->session->set_userdata($sessiondata);
                         redirect("index");
                    }
                    else
                    {
                               $this->session->set_flashdata('success_message', 'Invalid email and password! ');
                                redirect(base_url().'','location');
                    }
               }
               else
               {
                      redirect(base_url().'','location');
               }
          }
     }


      public function reset_password(){
         $email = trim($this->input->post('email'));
        if(isset($email)&& !empty($email)){

        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Email Address', 'trim|required|min_length[6]|max_length[100]|valid_email|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error_message', 'Please enter a valid email id "'.$email.'" not seems like an email id');
                redirect(base_url().'','location');
        } else {
            $result = $this->login_model->email_exists($email);

            if ($result) {

                $this->send_reset_password_email($email, $result);
                $this->session->set_flashdata('success_message', 'Your password reset link has been sent to your Email ID ');
                                redirect(base_url().'','location');
//                $this->load->view('template/header');
//                echo "password reset sent to email";
//                $this->load->view('login/view_reset_password_sent',array('email' => $email));
//                $this->load->view('template/footer');

            }  else {
                $this->session->set_flashdata('error_message', 'This email has not been registered with us');
                redirect(base_url().'','location');
            }

        }
    }  else {
        $this->load->view('template/header');
            $this->load->view('login/reset_password');
            $this->load->view('template/footer');
    }
    }

    private function send_reset_password_email($email, $vendorname){

        $this->load->library('email');
        $email_code = sha1($this->config->item('bulk-lock').$vendorname);

        $this->email->set_mailtype('html');
        $this->email->from($this->config->item('bot_email'), 'Bulkhouse (Support)');
        $this->email->to($email);
        $this->email->subject('Please Reset your password - BULKHOUSE');

        $message = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
</head><body>';
        $message .= '<p>Dear ' . $vendorname . ',</p>';
        $message .= 'We want to help you to reset your password! Please <strong><a href="' . base_url() . 'login/reset_password_form/' . $email . '/' .
                $email_code . '">Click Here</a></strong> to reset your password.';
        $message .= '<p>Thank you!</p>';
        $message .= '<p>The Vendor Support Team - bulkhouse.in</p>';
        $message .= '</body></html>';

        $this->email->message($message);
        $this->email->send();

    }


    public function reset_password_form($email, $email_code){
        if(isset($email, $email_code)){
            $email = trim($email);
            $email_hash = sha1($email.$email_code);
            $verified = $this->login_model->verify_reset_password_code($email, $email_code);

            if($verified){
//                $this->load->view('template/header');
                $this->load->view('/resetpassword', array('email_hash' => $email_hash, 'email_code' => $email_code, 'email'=>$email));
//                $this->load->view('template/footer');
            }  else {
                 $this->load->view('template/header');
                $this->load->view('login/view_reset_password', array('error' => 'There was a problem with the link. please click it again or request to reset your password again', 'email' => $email));
                $this->load->view('template/footer');
            }
        }
    }

    public function update_password(){
        $email = $this->input->post('email');
        $email_hash = $_POST['email_hash'];
        $email_code =  $_POST['email_code'];
        $email_sha =  sha1($_POST['email'].$_POST['email_code']);
//        echo $email = trim($email)."<br/>";
//        echo $email_hash = trim($email_hash)."<br/>";
//        echo $email_code = trim($email_code)."<br/>";
//        echo $email_sha = trim($email_sha)."<br/>";
        if (!isset($email,$email_hash) || $email_hash !== $email_sha) {
                echo 'Error updating your password';
        } else {

     $result = $this->login_model->update_password();

     if($result){

         $this->session->set_flashdata('success_message', 'Password reset successfull! ');
         redirect(base_url().'','location');
     }  else {
         $this->session->set_flashdata('error_message', 'Password reset failed please click back on the same link');
         redirect(base_url().'','location');
     }
 }

    }




}?>