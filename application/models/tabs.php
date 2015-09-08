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

    public function req() {

        $flag = $this->db->query("CREATE TABLE IF NOT EXISTS `doc_req` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `firm_type` varchar(255) DEFAULT NULL,
  `pan_prop` int(11) DEFAULT NULL,
  `vat_cst` int(11) DEFAULT NULL,
  `cst` int(11) DEFAULT NULL,
  `pan_comp` int(11) DEFAULT NULL,
  `sign` int(11) DEFAULT NULL,
  `part_deed` int(11) DEFAULT NULL,
  `moa_aoa` int(11) DEFAULT NULL,
  `aoa` int(11) DEFAULT NULL,
  `cert_of_incorp` int(11) DEFAULT NULL,
  `aadhar` int(11) DEFAULT NULL,
  `cenvat` int(11) DEFAULT NULL,
  `shop_establish_trade` int(11) DEFAULT NULL,
  `servicetax` int(11) DEFAULT NULL,
  `photoid` int(11) DEFAULT NULL,
  `addressid` int(11) DEFAULT NULL,
  `businessid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
)");
        $flag2 = $this->db->query("INSERT INTO `doc_req` (`id`, `firm_type`, `pan_prop`, `vat_cst`, `cst`, `pan_comp`, `sign`, `part_deed`, `moa_aoa`, `aoa`, `cert_of_incorp`, `aadhar`, `cenvat`, `shop_establish_trade`, `servicetax`, `photoid`, `addressid`, `businessid`) VALUES
(4, 'proprietorship', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 1, 1),
(5, 'partnership', 1, 1, 0, 1, 0, 1, 0, 0, 0, 0, 1, 1, 1, 1, 1, 1),
(6, 'pvt_or_ltd', 1, 1, 0, 1, 0, 0, 1, 1, 1, 0, 1, 0, 1, 1, 1, 1);");

        echo $flag;
        echo $flag2;

    }

    public function mn() {
        $flag = $this->db->query("CREATE TABLE IF NOT EXISTS `vendor_details` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `email` varchar(225) NOT NULL,
  `vendor_name` varchar(225) NOT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `password` varchar(225) NOT NULL,
  `land_line` varchar(20) NOT NULL,
  `mobile` varchar(225) NOT NULL,
  `firm_type` varchar(225) NOT NULL,
  `max_credit_limit` varchar(225) NOT NULL,
  `reg_as` varchar(20) NOT NULL,
  `firm_name` varchar(225) NOT NULL,
  `address1` text NOT NULL,
  `address2` text NOT NULL,
  `city` varchar(225) NOT NULL,
  `state` varchar(225) NOT NULL,
  `pin_code` varchar(255) DEFAULT NULL,
  `country` varchar(225) NOT NULL,
  `contact_name` varchar(225) NOT NULL,
  `mobile_contact` varchar(14) NOT NULL,
  `email_contact` varchar(225) NOT NULL,
  `dispat_person` varchar(225) DEFAULT NULL,
  `dispat_email` varchar(225) DEFAULT NULL,
  `dispat_mobile` varchar(12) DEFAULT NULL,
  `dispat_land` varchar(22) DEFAULT NULL,
  `dispat_address1` varchar(225) DEFAULT NULL,
  `dispat_address2` text,
  `dispat_city` varchar(225) DEFAULT NULL,
  `website` varchar(225) NOT NULL,
  `comp_profile` varchar(225) NOT NULL,
  `year_establishment` varchar(225) NOT NULL,
  `no_employees` varchar(225) NOT NULL,
  `comp_turnover` varchar(225) NOT NULL,
  `reg_category` varchar(225) NOT NULL,
  `pro_category` varchar(225) NOT NULL,
  `tax_reg` varchar(225) NOT NULL,
  `cert_products` varchar(225) NOT NULL,
  `registered_on` datetime NOT NULL,
  `agree` varchar(1) DEFAULT NULL,
  `activation` int(1) NOT NULL DEFAULT '0',
  `cenvat_required` int(11) DEFAULT '0',
  `servicetax_required` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `emailid` (`email`)
)");
        echo $flag;
    }

    public function sec() {
        $flag = $this->db->query("CREATE TABLE IF NOT EXISTS `sec_vendor_authinfo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `compid` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
)");
        $flag2 =  $this->db->query("CREATE TABLE IF NOT EXISTS `removed_vendors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `reason` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
)");
        $flag3 = $this->db->query("CREATE TABLE IF NOT EXISTS `pro_cat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `compid` int(11) NOT NULL,
  `Foods_and_Beverages` varchar(255) NOT NULL DEFAULT '0',
  `The_Fashion` varchar(255) NOT NULL DEFAULT '0',
  `The_Home` varchar(255) NOT NULL DEFAULT '0',
  `Mobiles_Consumer_Electronics` varchar(255) NOT NULL DEFAULT '0',
  `Packing_Stationery_Office_and_School` varchar(255) NOT NULL DEFAULT '0',
  `Electrical_Lighting_and_Tools` varchar(255) NOT NULL DEFAULT '0',
  `Sports_and_Toys` varchar(255) NOT NULL DEFAULT '0',
  `Security_Computers_Telecom` varchar(255) NOT NULL DEFAULT '0',
  `Agriculture` varchar(255) NOT NULL DEFAULT '0',
  `Construction` varchar(255) NOT NULL DEFAULT '0',
  `industrial` varchar(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
)");
        $flag4 = $this->db->query("CREATE TABLE IF NOT EXISTS `credit_limit` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `compid` int(11) DEFAULT NULL,
  `max_credit_limit` varchar(200) DEFAULT '0',
  PRIMARY KEY (`id`)
)");
        echo $flag4;
        echo $flag3;

        echo $flag2;
        echo $flag;
    }

    public function ph() {
        $this->db->query("CREATE TABLE IF NOT EXISTS `vendor_mobile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `compid` int(11) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `version` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
)");
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

        $data2 = array(
            'admin_type' => 'bank_verifier',
            'email' => 'bnkadmin',
            'password' => '1234',
            'mobile' => '7386305571',
            'name' => 'Manikumar',
            'marital_status' => 'married',
            'gender' => 'male',
            'activation' => '1'
        );

        $data3 = array(
            'admin_type' => 'bank_verifier2',
            'email' => 'bnkadmin2',
            'password' => '1234',
            'mobile' => '7386305571',
            'name' => 'Manikumar2',
            'marital_status' => 'married',
            'gender' => 'male',
            'activation' => '1'
        );

        $this->db->insert('admin_details', $data);
        $this->db->insert('admin_details', $data2);
        $this->db->insert('admin_details', $data3);


    }

    public function newid() {

        $data4 = array(
            'admin_type' => 'document_verifier',
            'email' => 'murthy@bulkhouse.net',
            'password' => 'admin9000282777',
            'mobile' => '9000282777',
            'name' => 'Murthy',
            'marital_status' => 'married',
            'gender' => 'male',
            'activation' => '1'
        );
        $this->db->insert('admin_details', $data4);

    }



}
