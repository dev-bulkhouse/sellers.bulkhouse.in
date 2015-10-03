
<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mail extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('mail_model');
        $this->load->helper('url');
    }

    public function index() {

        $this->load->view('mail');

    }
    public function mail_user() {

        $this->load->library('form_validation');

        $this->form_validation->set_rules('email', 'Email Address', 'trim|required|min_length[6]|max_length[100]|valid_email|is_unique[subscribe_india.email]|xss_clean');


        if ($this->form_validation->run() == FALSE) {

            $this->load->view('mail');
        } else {

            $result = $this->mail_model->mail();

            if ($result) {

                redirect(base_url(),'location');

            } else {
                echo 'please contact site administrator';
            }
        }
    }

    public function validate_email($email_address, $email_code) {

        $email_code = trim($email_code);
        $validated = $this->mail_model->validate_email($email_address, $email_code);
    }
}
