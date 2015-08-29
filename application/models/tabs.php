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
