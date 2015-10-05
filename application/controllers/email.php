<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Email extends CI_Controller {

    public function send() {
        $this->load->library('email');
        $date = date('Y-m-d');

        $config['protocol'] = "smtp";
        $config['smtp_host'] = "ssl://smtp.bizmail.yahoo.com";
        $config['smtp_port'] = "465";
        $config['smtp_user'] = "vendors@bulkhouse.com";
        $config['smtp_pass'] = "sampath01";
        $config['charset'] = "utf-8";
        $config['newline'] = "\r\n";
        $this->email->initialize($config);

        $this->email->set_mailtype('html');
        $this->email->from($this->config->item('bot_email'), 'BULKHOUSE (Vendor Registration)');
        $this->email->to('developer@bulkhouse.com');
        $this->email->subject('This is Cron Job Activity - BULKHOUSE');
        //$this->load->view('welcome_message',null,TRUE);
        $base_url = base_url();
       $link = "<a href='/test/report/";
       $link .= $date;
       $link .= "'>click for download</a>";

        $message = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
</head><body>';
        
        $message .= 'Thanks for Subscribing with BULKHOUSE! Please <strong>';
       
        $message .= 'Click Here</strong> to activate your account. After you have activated your account, you will be asked for further registration !</p>';
        $message .= $link;
        $message .= '<p>Thank you!</p>';
        $message .= '<p>The Admin at BULKHOUSE</p>';
        $message .= '</body></html>';
        $this->email->set_newline("\r\n");

        $this->email->message($message);
//        $path = setrealpath('home/admin/Desktop/');
//        $this->email->attach($path,'grid-bg.png');
        $this->email->send();
        
    }
}

    