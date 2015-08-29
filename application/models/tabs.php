<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tabs extends CI_Model {

    function __construct() {
        parent::__construct();

        $this->load->helper('url');
    }

    public function create() {

        $this->db->create_table('admin_details');
        $this->db->add_field("id int(11) NOT NULL AUTO_INCREMENT");
        $this->db->add_key('id', TRUE);
        $this->db->add_field("admin_type varchar(200) NOT NULL DEFAULT 'default 0'");
        $this->db->add_field("email varchar(200) NOT NULL DEFAULT 'default 0'");
        $this->db->add_field("password varchar(200) NOT NULL DEFAULT 'default 0'");
        $this->db->add_field("mobile varchar(100) NOT NULL DEFAULT 'default 0'");
        $this->db->add_field("name varchar(100) NOT NULL DEFAULT 'default 0'");
        $this->db->add_field("marital_status varchar(100) NOT NULL DEFAULT 'default 0'");
        $this->db->add_field("gender varchar(100) NOT NULL DEFAULT 'default 0'");
        $this->db->add_field("activation tinyint(1) NOT NULL DEFAULT 'default 0'");

        return;
    }

    public function insert() {

   $data = array(
   'admin_type' => 'document_verifier' ,
   'email' => 'docadmin' ,
   'password' => '1234',
   'mobile' => '7386305571',
   'name' => 'Reddy',
   'maritak_status' => 'married',
   'gender' => 'male',
   'activation' => '1'
);

$this->db->insert('admin_details', $data);

return;

    }





}
