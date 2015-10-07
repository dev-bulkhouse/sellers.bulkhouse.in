<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login_model extends CI_Model {

    function __construct() {
        parent::__construct();

        $this->load->helper('url');
        $this->load->model('register_model');
    }

    public function login_user() {

        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $sql = "SELECT * FROM vendor_details WHERE email = '" . $email . "' LIMIT 1";
        $result = $this->db->query($sql);
        $row = $result->row();
        if ($result->num_rows() === 1) {
            if ($row->activation) {

                if ($row->password === sha1($this->config->item('bulk-lock') . $password))
                {
                    // authenticated, now update the user's session
                        $vendor_name = $row->vendor_name;
                        $email = $row->email;
                        $firm_type = $row->firm_type;
                        $firm_name = $row->firm_name;
                        $mobile = $row->mobile;

                    $this->set_session_user($vendor_name, $email, $firm_type, $firm_name, $mobile);
                    return 'logged_in';
                } else {
                    return'incorrect_password';
                }
            } else {
               return'not_activated';
            }
        } else {
            return'email_not_found';
        }
    }

    public function set_session_user($vendor_name, $email, $firm_type, $firm_name, $mobile) {

        $sql = "SELECT * FROM vendor_details WHERE email = '" . $email . "' LIMIT 1";

        $result = $this->db->query($sql);

        $row = $result->row();

        $sess_data = array(
            'id' => $row->id,
            'email' => $email,
            'firm_type' => $firm_type,
            'firm_name' => $firm_name,
            'vendor_name' => $vendor_name,
            'mobile' => $mobile,
            'logged_in' => 1
        );

//        $this->email_code = md5((string) $row->createdOn);
        $this->session->set_userdata($sess_data);
    }

    public function login_admin() {

        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $sql = "SELECT * FROM admin_details WHERE email = '" . $email . "' LIMIT 1";
        $result = $this->db->query($sql);
        $row = $result->row();
        if ($result->num_rows() === 1) {
            if ($row->activation) {

                if ($row->password === $password)
                {
                    // authenticated, now update the user's session
                        $id = $row->id;
                        $admin_email = $row->email;
                        $admin_type = $row->admin_type;
                        $name = $row->name;
                        $mobile = $row->mobile;

                    $this->set_session_admin($id, $admin_email, $admin_type, $name, $mobile);
                    return 'logged_in';
                } else {
                    return'incorrect_password';
                }
            } else {
               return'not_activated';
            }
        } else {
            return'email_not_found';
        }
    }
    public function set_session_admin($id, $admin_email, $admin_type, $name, $mobile) {

        $sql = "SELECT * FROM admin_details WHERE email = '" . $admin_email . "' LIMIT 1";

        $result = $this->db->query($sql);

        $row = $result->row();

        $sess_data2 = array(
            'id' => $row->id,
            'admin_email' => $admin_email,
            'admin_type' => $admin_type,
            'name' => $name,
            'mobile' => $mobile,
            'logged_in' => 1
        );

         $this->session->set_userdata($sess_data2);

    }

    public function email_exists($email){

        $sql = "SELECT vendor_name, email, password FROM vendor_details WHERE email = '" . $email . "' LIMIT 1";
        $result = $this->db->query($sql);
        $row = $result->row();
//        $pass5 = mb_substr($row->password, 0, 5);

        return ($result->num_rows() === 1 && $row->email) ?$row->vendor_name:false;
    }

    public function verify_reset_password_code($email, $code){
        $sql = "SELECT vendor_name, email FROM vendor_details WHERE email = '" . $email . "' LIMIT 1";
        $result = $this->db->query($sql);
        $row = $result->row();
        $vendorname = $row->vendor_name;
        if($result->num_rows() === 1){
            $code = sha1($this->config->item('bulk-lock').$vendorname);
            return ($code)?true:false;
        }  else {
            return false;
        }
    }

    public function update_password($email,$pass){

        $password = sha1($this->config->item('bulk-lock') . $pass);
        $new_password = $this->input->post('password');
        $data = array(
               'password' => $password,
            );
$this->db->where('email', $email);
$this->db->update('vendor_details', $data);
        if($this->db->affected_rows() === 1){
            $custid = $this->register_model->get_mag_cust_id($email);
             $this->register_model->update_seller($custid, $new_password);
            return 1;
        }  else {
            return 0;
        }
    }




}
