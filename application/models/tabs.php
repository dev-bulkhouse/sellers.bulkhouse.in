<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tabs extends CI_Model {

    function __construct() {
        parent::__construct();

        $this->load->helper('url');
        $this->load->dbforge();
    }

    public function create() {


        $fields = array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'admin_type' => array(
                'type' => 'VARCHAR',
                'constraint' => '200',
                'default' => 0,
            ),
            'email' => array(
                'type' => 'VARCHAR',
                'constraint' => '200',
                'default' => 0,
            ),
            'password' => array(
                'type' => 'VARCHAR',
                'constraint' => '200',
                'default' => 0,
            ),
            'mobile' => array(
                'type' => 'VARCHAR',
                'constraint' => '200',
                'default' => 0,
            ),
            'name' => array(
                'type' => 'VARCHAR',
                'constraint' => '200',
                'default' => 0,
            ),
            'marital_status' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'default' => 0,
            ),
            'gender' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'default' => 0,
            ),
            'activation' => array(
                'type' => 'TINYINT',
                'constraint' => '1',
                'default' => 0,
            ),
        );

        $this->dbforge->add_field($fields);

        $this->dbforge->add_key('id', TRUE);

        $this->dbforge->create_table('admin_details');

    }

    public function bank() {


        $fields = array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'compid' => array(
                'type' => 'INT',
                'constraint' => 11,
            ),
            'account_name' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'default' => 0,
            ),
            'account_number' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'default' => 0,
            ),
            'bank_name' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'default' => 0,
            ),
            'branch' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'default' => 0,
            ),
            'ifsc' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'default' => 0,
            ),
            'micr' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'default' => 0,
            ),
            'date_of_submission' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'default' => 0,
            ),
            'status' => array(
                'type' => 'INT',
                'constraint' => '11',
                'default' => 10,
            ),
            'dispatch_date' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'default' => 0,
            ),
            'amount' => array(
                'type' => 'VARCHAR',
                'constraint' => '4',
                'default' => NULL,
            ),
            'attempts' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'default' => NULL,
            ),

        );

        $this->dbforge->add_field($fields);

        $this->dbforge->add_key('id', TRUE);

        $this->dbforge->create_table('bank_details');

    }

    public function doc() {
   $flag = $this->db->query("CREATE TABLE IF NOT EXISTS `document_details` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `compid` int(11) DEFAULT '0',
  `pan_prop` varchar(255) DEFAULT '0',
  `pan_prop_date` varchar(255) DEFAULT '0',
  `pan_prop_status` int(11) DEFAULT '5',
  `pan_prop_lock` int(11) DEFAULT '0',
  `pan_prop_type` varchar(255) DEFAULT NULL,
  `vat_cst` varchar(255) DEFAULT '0',
  `vat_cst_date` varchar(255) DEFAULT '0',
  `vat_cst_status` int(11) DEFAULT '5',
  `vat_cst_lock` int(11) DEFAULT '0',
  `vat_cst_type` varchar(255) DEFAULT NULL,
  `cst` varchar(255) NOT NULL DEFAULT '0',
  `cst_date` varchar(255) NOT NULL DEFAULT '0',
  `cst_status` int(11) NOT NULL DEFAULT '5',
  `cst_lock` int(11) NOT NULL DEFAULT '0',
  `cst_type` varchar(255) NOT NULL DEFAULT '0',
  `pan_comp` varchar(255) DEFAULT '0',
  `pan_comp_date` varchar(255) DEFAULT '0',
  `pan_comp_status` int(11) DEFAULT '5',
  `pan_comp_lock` int(11) DEFAULT '0',
  `pan_comp_type` varchar(255) DEFAULT NULL,
  `part_deed` varchar(255) DEFAULT '0',
  `part_deed_date` varchar(255) DEFAULT '0',
  `part_deed_status` int(11) DEFAULT '5',
  `part_deed_lock` int(11) DEFAULT '0',
  `part_deed_type` int(255) DEFAULT '0',
  `sign` varchar(255) DEFAULT '0',
  `sign_date` varchar(255) DEFAULT '0',
  `sign_status` int(11) DEFAULT '5',
  `sign_lock` int(11) DEFAULT '0',
  `sign_type` varchar(255) DEFAULT NULL,
  `cert_of_incorp` varchar(255) DEFAULT '0',
  `cert_of_incorp_date` varchar(255) DEFAULT '0',
  `cert_of_incorp_status` int(11) DEFAULT '5',
  `cert_of_incorp_lock` int(11) DEFAULT '0',
  `cert_of_incorp_type` varchar(255) DEFAULT NULL,
  `moa_aoa` varchar(255) DEFAULT '0',
  `moa_aoa_date` varchar(255) DEFAULT '0',
  `moa_aoa_status` int(11) DEFAULT '5',
  `moa_aoa_lock` int(11) DEFAULT '0',
  `moa_aoa_type` varchar(255) DEFAULT '0',
  `aoa` varchar(255) DEFAULT '0',
  `aoa_date` varchar(255) DEFAULT '0',
  `aoa_status` int(11) DEFAULT '5',
  `aoa_lock` int(11) DEFAULT '0',
  `aoa_type` varchar(255) DEFAULT '0',
  `shop_establish_trade` varchar(255) DEFAULT '0',
  `shop_establish_trade_date` varchar(255) DEFAULT '0',
  `shop_establish_trade_status` int(11) DEFAULT '5',
  `shop_establish_trade_lock` int(11) DEFAULT '0',
  `shop_establish_trade_type` varchar(255) DEFAULT '0',
  `cenvat` varchar(255) DEFAULT '0',
  `cenvat_date` varchar(255) DEFAULT '0',
  `cenvat_status` int(11) DEFAULT '5',
  `cenvat_lock` int(11) DEFAULT '0',
  `cenvat_type` varchar(255) DEFAULT '0',
  `vat` varchar(255) DEFAULT '0',
  `vat_date` varchar(255) DEFAULT '0',
  `vat_status` int(11) DEFAULT '5',
  `vat_lock` int(11) DEFAULT '0',
  `vat_type` varchar(255) DEFAULT '0',
  `servicetax` varchar(255) DEFAULT '0',
  `servicetax_date` varchar(255) DEFAULT '0',
  `servicetax_status` int(11) DEFAULT '5',
  `servicetax_lock` int(11) DEFAULT '0',
  `servicetax_type` varchar(255) DEFAULT '0',
  `photoid` varchar(255) DEFAULT '0',
  `photoid_date` varchar(255) DEFAULT '0',
  `photoid_status` int(11) DEFAULT '5',
  `photoid_lock` int(11) DEFAULT '0',
  `photoid_type` varchar(255) DEFAULT '0',
  `addressid` varchar(255) DEFAULT '0',
  `addressid_date` varchar(255) DEFAULT '0',
  `addressid_status` int(11) DEFAULT '5',
  `addressid_lock` int(11) DEFAULT '0',
  `addressid_type` varchar(255) DEFAULT '0',
  `businessid` varchar(255) DEFAULT '0',
  `businessid_date` varchar(255) DEFAULT '0',
  `businessid_status` int(11) DEFAULT '5',
  `businessid_lock` int(11) DEFAULT '0',
  `businessid_type` varchar(255) DEFAULT '0',
  `canceled_check` varchar(255) NOT NULL DEFAULT '0',
  `canceled_check_date` varchar(255) NOT NULL DEFAULT '0',
  `canceled_check_status` int(11) NOT NULL DEFAULT '5',
  `canceled_check_lock` int(11) NOT NULL DEFAULT '0',
  `canceled_check_type` varchar(255) NOT NULL DEFAULT '0',
  `comp_file` varchar(255) NOT NULL DEFAULT '0',
  `comp_file_date` varchar(255) NOT NULL DEFAULT '0',
  `comp_file_status` int(11) NOT NULL DEFAULT '5',
  `comp_file_lock` int(11) NOT NULL DEFAULT '0',
  `comp_file_type` varchar(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `companyid` (`compid`)
)");
   echo $flag;
    }

    public function insert() {

        $data = array(
            'admin_type' => 'document_verifier',
            'email' => 'docadmin',
            'password' => '1234',
            'mobile' => '7386305571',
            'name' => 'Reddy',
            'marital_status' => 'married',
            'gender' => 'male',
            'activation' => '1'
        );

        $this->db->insert('admin_details', $data);

    }



}
