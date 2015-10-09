<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

header('Access-Control-Allow-Origin: *');

class Register extends CI_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->model('register_model');
        $this->load->helper('url');
    }

    public function index() {

        $this->load->view('register');
    }

    public function register_user() {

        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[vendor_details.email]');
//       $this->form_validation->set_rules('realname', 'Real Name', 'trim|required|min_length[3]|max_length[20]|xss_clean');
//       $this->form_validation->set_rules('email', 'Email Address', 'trim|required|min_length[6]|max_length[100]|valid_email|is_unique[users.email]|xss_clean');
//       $this->form_validation->set_message('is_unique[users.email]', 'The email is already taken');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('success_message', 'Please Submit your Unique email ID ');
            redirect(base_url() . '', 'location');
        } else {

            $result = $this->register_model->add_vendor();




            if ($result) {
                $this->session->set_flashdata('success_message', $result[0] . ' You Have Succesfully Registered please check the confirmation link in ' . $result[1]);
                $data = array(
                    'email' => $result[1],
                    'custid' => $result[5]
                );

                $this->db->insert('mag_cust', $data);
                redirect(base_url() . '', 'location');
            } else {
                echo 'please contact site administrator';
            }
        }
    }

    public function validate_email($email_address, $email_code) {

        $email_code = trim($email_code);
        $validated = $this->register_model->validate_email($email_address, $email_code);

        if ($validated === true) {

            $this->register_model->set_session_auto($email_address);
            $vendor_name = $this->session->userdata('vendor_name');
            $this->session->set_flashdata('success_message', 'Hi! ' . ucfirst($vendor_name) . ' You have Successfully Registered and Logged In!');
            redirect(base_url() . 'main/', 'location');
        } else {
            echo 'Error giving email activated confirmation, please contact admin@bulkhouse.in';
        }
    }

    public function team_lead() {

        $email_address = $this->input->post('email');
        $vendor_code = $this->input->post('code');

        if ($vendor_code == $this->config->item('vendor_code')) {


            $this->register_model->set_session_auto($email_address);
            $vendor_name = $this->session->userdata('vendor_name');
            $this->session->set_flashdata('success_message', 'Hi! ' . ucfirst($vendor_name) . ' You have Successfully Registered and Logged In!');
            redirect(base_url() . 'main/', 'location');
        } else {
//            $this->session->set_flashdata('success_message', 'Hi! '.ucfirst($vendor_name).' You have Successfully Registered and Logged In!');
            redirect(base_url() . 'manage/', 'location');
        }
    }

    public function validate_email_remove($email_address, $email_code, $remove) {

        $email_code = trim($email_code);
        $validated = $this->register_model->validate_email_remove($email_address, $email_code, $remove);

        if ($validated === true) {

//            $this->register_model->set_session_auto($email_address);
            $vendor_name = $this->session->userdata('vendor_name');
            $this->session->set_flashdata('success_message', 'Hi! ' . ucfirst($vendor_name) . ' your cancelation of account is done. We are expecting a return back from you thankyou.');
            redirect(base_url(), 'location');
        } else {
            echo 'Error giving email activated confirmation, please contact admin@bulkhouse.in';
        }
    }

    public function req_cenvat($compid, $num) {
        $data = array(
            'cenvat_required' => $num
        );
        $this->db->where('id', $compid);
        $this->db->update('vendor_details', $data);
    }

    public function check_user() {
        $email = $this->input->post('email');
        $regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
        if (preg_match($regex, $email)) {
            $result = $this->register_model->check_user_exist($email);
            if ($result) {
                echo "false";
            } else {
                echo "true";
            }
        } else {
            echo "unknown";
        }
    }

    public function delete($id) {

        $this->db->where('id', $id);

        $this->db->delete('vendor_details');
        redirect(base_url() . 'admin/vendor_profile', 'location');
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */