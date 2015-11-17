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
    public function db_backup()
{
    $DBUSER=$this->db->username;
    $DBPASSWD=$this->db->password;
    $DATABASE=$this->db->database;

    $filename = $DATABASE . ".sql.gz";
    $mime = "application/x-gzip";

    header( "Content-Type: " . $mime );
    header( 'Content-Disposition: attachment; filename="' . $filename . '"' );

    // $cmd = "mysqldump -u $DBUSER --password=$DBPASSWD $DATABASE | gzip --best";
    $cmd = "mysqldump -u $DBUSER --password=$DBPASSWD --no-create-info --complete-insert $DATABASE | gzip --best";

    passthru( $cmd );

    exit(0);
}
}
