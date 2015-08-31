<?php

header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Change extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
         $this->load->model('register_model');
         $this->load->model('vendor_update');
    }

    public function lock($compid, $doc_lock, $doc_status) {
        $this->output->set_content_type('text/event-stream');
        $this->output->set_header('Cache-Control: no-cache');
//            $time = date('r');
//  echo "data: The server time is: {$time}\n\n";


        $this->db->select('*');
        $this->db->from('document_details');
        $this->db->where(array('document_details.compid' => $compid));
        $query = $this->db->get();

        foreach ($query->result_array() as $row) {

            if ($row[$doc_lock] == 0 && $row[$doc_status] == 5) {
                echo "data: block \n\n";
            } else {
                echo "data: none \n\n";
            }

        }
    }

    public function unlock($compid, $doc_lock, $doc_status) {
        $this->output->set_content_type('text/event-stream');
        $this->output->set_header('Cache-Control: no-cache');
//            $time = date('r');
//  echo "data: The server time is: {$time}\n\n";


        $this->db->select('*');
        $this->db->from('document_details');
        $this->db->where(array('document_details.compid' => $compid));
        $query = $this->db->get();

        foreach ($query->result_array() as $row) {

            if ($row[$doc_lock] == 1 && $row[$doc_status] == 0) {
                echo "data: block \n\n";
            } else {
                echo "data: none \n\n";
            }

        }
    }

    public function disapproved($compid, $doc_lock, $doc_status) {
        $this->output->set_content_type('text/event-stream');
        $this->output->set_header('Cache-Control: no-cache');
//            $time = date('r');
//  echo "data: The server time is: {$time}\n\n";


        $this->db->select($doc_status);
        $this->db->from('document_details');
        $this->db->where(array('document_details.compid' => $compid));
        $query = $this->db->get();

        foreach ($query->result_array() as $row) {

            if ($row[$doc_status] == 1) {
                echo "data: block \n\n";
            } else {
                echo "data: none \n\n";
            }

        }
    }

    public function approve($compid,$type){

        $data = array(
        $type.'_status' => 2,
         );

$this->db->where('compid', $compid);
$this->db->update('document_details', $data);

redirect('/admin/details/'.$type,'location');

    }



    public function disapprove($compid,$type){

        $data = array(
               $type.'_status' => 1,
         );

$this->db->where('compid', $compid);
$this->db->update('document_details', $data);

redirect('/admin/details/'.$type,'location');


    }
     public function sucess($compid){

        $data = array(
               'status' => 2,
         );

$this->db->where('compid', $compid);
$this->db->update('bank_details', $data);

redirect('/admin/bankdetails');


    }
     public function failed($compid){

        $data = array(
               'status' => 3,
         );

$this->db->where('compid', $compid);
$this->db->update('bank_details', $data);

redirect('/admin/bankdetails');
    }

    public function f_rand($min=0,$max=1,$mul=1000000){
    if ($min>$max) return false;
    return mt_rand($min*$mul,$max*$mul)/$mul;
}
    public function dispatch($compid,$acno){
        $date = date("Y-m-d");
        $rand = rand(1, 4);
        $data = array(
               'status' => 1,
               'dispatch_date' => $date,

               'amount' => $this->f_rand(1,3,$rand)
         );

$this->db->where('compid', $compid);
$this->db->update('bank_details', $data);
$email = $this->register_model->get_email($compid);
//$this->send_confirmation_mail($email,$acno);
redirect('/admin/bankaccounts','location');


    }

    private function send_confirmation_mail($email,$acno) {
         $this->load->helper('url');
        $this->load->library('email');
        //$email_code = $this->email_code;
        $config['protocol'] = "smtp";
        $config['smtp_host'] = "ssl://smtp.bizmail.yahoo.com";
        $config['smtp_port'] = "465";
        $config['smtp_user'] = "vendors@bulkhouse.com";
        $config['smtp_pass'] = "sampath01";
        $config['charset'] = "utf-8";
        $config['newline'] = "\r\n";
        $this->email->initialize($config);

        $this->email->set_mailtype('html');
        $this->email->from($this->config->item('bot_email'), 'Bulkhouse Vendor Managment (Staff)');
        $this->email->to($email);
        $this->email->subject('We have Sent you Amounts to your Bank - Bulkhouse');

        $message = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
</head><body>';
        $message .= '<p>Dear Sir,</p>';
        $message .= 'Your Documents already got Approved and we are in the process of verifying you bank details, soon you will be diposited with a few amounts to your Bank Account Number : ';
        $message .= $acno;
        $message .= ' </p>';
        $message .= '<p>Please Verify the diposit amount in bank account and submit on dashboard bank verification input</p>';
        $message .= '<p>Thank you!</p>';
        $message .= '<p>The Team at Bulkhouse</p>';
        $message .= '</body></html>';

        $this->email->message($message);
        $this->email->send();
    }


    public function mobile_verified($compid,$mobile){

        $result = $this->vendor_update->mobile_verified($compid,$mobile);
        if ($result == 1) {
            echo "updated";
        }  else {
            echo "not updated";
        }

    }

    public function insert_val() {


        $last_id = $this->last_compid();

        $data3 = array(
            'compid' => $last_id + 1
        );

        $this->db->insert('vendor_mobile', $data3);

    }

     public function last_compid() {

        $this->db->select('compid');
        $this->db->from('vendor_mobile');
        $this->db->order_by("compid", "desc");
        $this->db->limit(1);
        $query = $this->db->get();
        $ver = $query->result();
        return $ver[0]->compid;

    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */