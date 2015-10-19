<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Form_submit extends CI_Model {

    function __construct() {
        parent::__construct();

        date_default_timezone_set('Asia/Kolkata');
    }

    public function let_us_know_you() {
        $time = date("Y-m-d") . "|" . date("h:i:s");
        $email = $this->input->post('email');
        $name = $this->input->post('name');
        $mobile = $this->input->post('mobile');
        $company = $this->input->post('company');
        $message = $this->input->post('message');


        $data = array(
            'email' => $this->input->post('email'),
            'name' => $name,
            'company' => $company,
            'mobile' => $mobile,
            'message' => $message,
            'submited_on' => $time
        );

        $this->db->insert('let_us_know_you', $data);

        if ($this->db->affected_rows() === 1) {
            $this->send_confirmation_mail($email,$name,$company,$mobile,$message);
            return 1;
        } else {
            return 0;
        }
    }

    public function contact() {
        $time = date("Y-m-d") . "|" . date("h:i:s");
        $email = $this->input->post('email');
        $name = $this->input->post('name');
        $message = $this->input->post('message');


        $data = array(
            'email' => $email,
            'message' => $message,
            'name' => $name,
            'submited_on' => $time
        );

        $this->db->insert('dotcom_contacts', $data);

        if ($this->db->affected_rows() === 1) {
            $this->send_contact_confirmation_mail($email,$name,$message);
            return 1;
        } else {
            return 0;
        }
    }


    private function send_confirmation_mail($email,$name,$company,$mobile,$message2) {
        $this->load->helper('url');
        $this->load->library('email');
        $config['protocol'] = "sendmail";
        $config['smtp_host'] = "smtp.sendgrid.net";
        $config['smtp_port'] = "587";
        $config['smtp_user'] = "vendors_bulkhouse";
        $config['smtp_pass'] = "asdftrew12";
        $config['charset'] = "utf-8";
        $config['newline'] = "\r\n";
        $this->email->initialize($config);
        $this->email->set_mailtype('html');
        $this->email->from('info@bulkhouse.com', 'Bulkhouse International');
        $this->email->to('leads@bulkhouse.com');
        $this->email->bcc('admin@bulkhouse.com');
        $this->email->bcc('kishorechandra.developer@gmail.com');
        $this->email->subject('Bulkhouse.com - New Subscribtion Info');

        $message = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
</head><body>';
        $message .= '<p>Dear Sir,</p>';
        $message .= '<p>This is New Subscribtion info</p>';
        $message .= '<p>Name : ';
        $message .= $name;
        $message .= '</p>';
        $message .= '<p>Email Id : ';
        $message .= $email;
        $message .= '</p>';

        $message .= '<p>Company : ';
        $message .= $company;
        $message .= '</p>';

        $message .= '<p>Mobile : ';
        $message .= $mobile;
        $message .= '</p>';

        $message .= '<p>Message : ';
        $message .= $message2;
        $message .= '</p>';

        $message .= '<p>Thank you!</p>';
        $message .= '<p>Automail Bulkhouse.com </p>';
        $this->email->message($message);
        $this->email->send();
    }


    private function send_contact_confirmation_mail($email,$name,$message1) {
        $this->load->helper('url');
        $this->load->library('email');
        $config['protocol'] = "sendmail";
        $config['smtp_host'] = "smtp.sendgrid.net";
        $config['smtp_port'] = "587";
        $config['smtp_user'] = "vendors_bulkhouse";
        $config['smtp_pass'] = "asdftrew12";
        $config['charset'] = "utf-8";
        $config['newline'] = "\r\n";
        $this->email->initialize($config);
        $this->email->set_mailtype('html');
        $this->email->from('info@bulkhouse.com', 'Bulkhouse International');
        $this->email->to('leads@bulkhouse.com');
        $this->email->bcc('admin@bulkhouse.com');
        $this->email->bcc('kishorechandra.developer@gmail.com');
        $this->email->subject('Bulkhouse.com - New Contact Message Info');

        $message = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
</head><body>';
        $message .= '<p>Dear Sir,</p>';
        $message .= '<p>This is Contact Message from bulkhouse.com</p>';
        $message .= '<p>Name : ';
        $message .= $name;
        $message .= '</p>';
        $message .= '<p>Email Id : ';
        $message .= $email;
        $message .= '</p>';
        $message .= '<p>Message : ';
        $message .= $message1;
        $message .= '</p>';
        $message .= '<p>Thank you!</p>';
        $message .= '<p>Automail Bulkhouse.com </p>';
        $this->email->message($message);
        $this->email->send();
    }


}
