<?php
​
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
​
class Confirm_bank extends CI_Controller {
      function __construct() {
        parent::__construct();
        $this->load->model('register_model');
​
    }
​
    public function amount($cid) {
​
        $confirm_amount = $this->input->post('confirm_amount');
        $amount = $this->amt_chk($cid);
​
        if ($confirm_amount == $amount) {
​
            $this->bank_approved($cid);
            redirect(base_url().'main/','location');
​
        }elseif($confirm_amount != $amount){
            $atmpt = $this->atmpt_chk($cid);
            if ($atmpt >= 3) {
                $data= array(
                'status' => 5
            );
            $this->db->where(array('bank_details.compid' => $cid));
            $this->db->update('bank_details',$data);
            redirect(base_url().'main/','location');
​
            }else{
                $atmpt = $this->atmpt_chk($cid);
            $data= array(
                'attempts' => $atmpt + 1
            );
            $this->db->where(array('bank_details.compid' => $cid));
            $this->db->update('bank_details',$data);
​
           redirect(base_url().'main/','location');
​

            }}}
    public function reset_attempts($email) {

        $cid = $this->register_model->get_compid($email);
​
       $data = array(

           'status' => 2,
           'attempts' => 0

        );
        $this->db->where('compid', $cid);
        $this->db->update('bank_details', $data);
//        return 1;

    }
    public function amt_chk($cid) {
​
        $this->db->select('*');
        $this->db->from('bank_details');
        $this->db->where(array('bank_details.status' => 2));
        $this->db->where(array('bank_details.compid' => $cid));
        $query = $this->db->get();
        $bnk = $query->result();
        return $bnk[0]->amount;
​
    }
    public function atmpt_chk($cid) {
​
        $this->db->select('*');
        $this->db->from('bank_details');
        $this->db->where(array('bank_details.status' => 2));
        $this->db->where(array('bank_details.compid' => $cid));
        $query = $this->db->get();
        $bnk = $query->result();
        return $bnk[0]->attempts;
​
    }
​
    public function bank_approved($cid) {
         $data = array(
               'status' => 4,
         );
​
$this->db->where('compid', $cid);
$this->db->update('bank_details', $data);
​
​
    }
​
}