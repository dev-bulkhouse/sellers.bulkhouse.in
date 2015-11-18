<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');


class Manage extends CI_Controller {
private $logged_in;



    public function __construct() {
        parent::__construct();
    }

    public function index() {

//        $this->load->view('admin/template/header');
        $this->load->view('team');
//        $this->load->view('admin/template/footer');
    }

    public function imp() {


        $this->load->view('secimp');


    }

    public function agent_code($agent_id) {
       $this->db->select('vendor_name,email,mobile,firm_type,address1,city,state,pin_code,country,contact_name,status');
        $this->db->from('vendor_details');
        $this->db->where(array('vendor_details.agent_id' => $agent_id));
        $query = $this->db->get();

        $data = $query->result_array();
        echo json_encode($data);



    }

   public function agent_cod($agent_id) {
        $this->db->select('vendor_name,email,mobile,firm_type,address1,city,state,pin_code,country,contact_name');
        $this->db->from('vendor_details');
        $this->db->where(array('vendor_details.agent_id' => $agent_id));
        $query = $this->db->get();

        $data = $query->result_array();
        echo json_encode($data);
    }
public function export() {

//        $this->load->view('admin/template/header');
        $this->load->view('test');
//        $this->load->view('admin/template/footer');
    }
    public function export_vendor()
{
$this->load->helper('url');
                $this->load->helper('csv');

            $query = $this->db->query('SELECT * FROM vendor_details');
            $num = $query->num_fields();
            $var =array();
            $i=1;
            $fname="";
            while($i <= $num){
                $test = $i;
                $value = $this->input->post($test);

                if($value != ''){
                        $fname= $fname." ".$value;
                        array_push($var, $value);

                    }
                 $i++;
            }

            $fname = trim($fname);

            $fname=str_replace(' ', ',', $fname);

            $this->db->select($fname);
            $quer = $this->db->get('vendor_details');

            query_to_csv($quer,TRUE,'vendor_details'.'.csv');




 }
 public function export_bank()
{
$this->load->helper('url');
                $this->load->helper('csv');

            $query = $this->db->query('SELECT * FROM bank_details');
            $num = $query->num_fields();
            $var =array();
            $i=1;
            $fname="";
            while($i <= $num){
                $test = $i;
                $value = $this->input->post($test);

                if($value != ''){
                        $fname= $fname." ".$value;
                        array_push($var, $value);

                    }
                 $i++;
            }
            $fname = trim($fname);

            $fname=str_replace(' ', ',', $fname);

            $this->db->select($fname);
            $quer = $this->db->get('bank_details');

            query_to_csv($quer,TRUE,'bank_details'.'.csv');
 }
 public function export_doc()
{
$this->load->helper('url');
                $this->load->helper('csv');

            $query = $this->db->query('SELECT * FROM document_details');
            $num = $query->num_fields();
            $var =array();
            $i=1;
            $fname="";
            while($i <= $num){
                $test = $i;
                $value = $this->input->post($test);

                if($value != ''){
                        $fname= $fname." ".$value;
                        array_push($var, $value);

                    }
                 $i++;
            }

            $fname = trim($fname);

            $fname=str_replace(' ', ',', $fname);

            $this->db->select($fname);
            $quer = $this->db->get('document_details');

            query_to_csv($quer,TRUE,'document_details'.'.csv');
 }

 public function req_doc()
{
$this->load->helper('url');
                $this->load->helper('csv');

            $query = $this->db->query('SELECT * FROM doc_req');
            $num = $query->num_fields();
            $var =array();
            $i=1;
            $fname="";
            while($i <= $num){
                $test = $i;
                $value = $this->input->post($test);

                if($value != ''){
                        $fname= $fname." ".$value;
                        array_push($var, $value);

                    }
                 $i++;
            }

            $fname = trim($fname);

            $fname=str_replace(' ', ',', $fname);

            $this->db->select($fname);
            $quer = $this->db->get('doc_req');

            query_to_csv($quer,TRUE,'doc_req'.'.csv');
 }

 public function mag_cust()
{
$this->load->helper('url');
                $this->load->helper('csv');

            $query = $this->db->query('SELECT * FROM mag_cust');
            $num = $query->num_fields();
            $var =array();
            $i=1;
            $fname="";
            while($i <= $num){
                $test = $i;
                $value = $this->input->post($test);

                if($value != ''){
                        $fname= $fname." ".$value;
                        array_push($var, $value);

                    }
                 $i++;
            }

            $fname = trim($fname);

            $fname=str_replace(' ', ',', $fname);

            $this->db->select($fname);
            $quer = $this->db->get('mag_cust');

            query_to_csv($quer,TRUE,'mag_cust'.'.csv');
 }

 public function sec_vendor_authinfo()
{
$this->load->helper('url');
                $this->load->helper('csv');

            $query = $this->db->query('SELECT * FROM sec_vendor_authinfo');
            $num = $query->num_fields();
            $var =array();
            $i=1;
            $fname="";
            while($i <= $num){
                $test = $i;
                $value = $this->input->post($test);

                if($value != ''){
                        $fname= $fname." ".$value;
                        array_push($var, $value);

                    }
                 $i++;
            }

            $fname = trim($fname);

            $fname=str_replace(' ', ',', $fname);

            $this->db->select($fname);
            $quer = $this->db->get('sec_vendor_authinfo');

            query_to_csv($quer,TRUE,'sec_vendor_authinfo'.'.csv');
 }

 public function leads()
{
$this->load->helper('url');
                $this->load->helper('csv');

            $query = $this->db->query('SELECT * FROM leads');
            $num = $query->num_fields();
            $var =array();
            $i=1;
            $fname="";
            while($i <= $num){
                $test = $i;
                $value = $this->input->post($test);

                if($value != ''){
                        $fname= $fname." ".$value;
                        array_push($var, $value);

                    }
                 $i++;
            }

            $fname = trim($fname);

            $fname=str_replace(' ', ',', $fname);

            $this->db->select($fname);
            $quer = $this->db->get('leads');

            query_to_csv($quer,TRUE,'leads'.'.csv');
 }

 public function employee()
{
$this->load->helper('url');
                $this->load->helper('csv');

            $query = $this->db->query('SELECT * FROM employee');
            $num = $query->num_fields();
            $var =array();
            $i=1;
            $fname="";
            while($i <= $num){
                $test = $i;
                $value = $this->input->post($test);

                if($value != ''){
                        $fname= $fname." ".$value;
                        array_push($var, $value);

                    }
                 $i++;
            }

            $fname = trim($fname);

            $fname=str_replace(' ', ',', $fname);

            $this->db->select($fname);
            $quer = $this->db->get('employee');

            query_to_csv($quer,TRUE,'employee'.'.csv');
 }

 public function vendor_mobile()
{
$this->load->helper('url');
                $this->load->helper('csv');

            $query = $this->db->query('SELECT * FROM vendor_mobile');
            $num = $query->num_fields();
            $var =array();
            $i=1;
            $fname="";
            while($i <= $num){
                $test = $i;
                $value = $this->input->post($test);

                if($value != ''){
                        $fname= $fname." ".$value;
                        array_push($var, $value);

                    }
                 $i++;
            }

            $fname = trim($fname);

            $fname=str_replace(' ', ',', $fname);

            $this->db->select($fname);
            $quer = $this->db->get('vendor_mobile');

            query_to_csv($quer,TRUE,'vendor_mobile'.'.csv');
 }

 public function update_seller()
{
$this->load->helper('url');
                $this->load->helper('csv');

            $query = $this->db->query('SELECT * FROM update_seller');
            $num = $query->num_fields();
            $var =array();
            $i=1;
            $fname="";
            while($i <= $num){
                $test = $i;
                $value = $this->input->post($test);

                if($value != ''){
                        $fname= $fname." ".$value;
                        array_push($var, $value);

                    }
                 $i++;
            }

            $fname = trim($fname);

            $fname=str_replace(' ', ',', $fname);

            $this->db->select($fname);
            $quer = $this->db->get('update_seller');

            query_to_csv($quer,TRUE,'update_seller'.'.csv');
 }

}
