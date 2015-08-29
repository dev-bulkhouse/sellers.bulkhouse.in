<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Create_tables extends CI_Model {

    function __construct() {
        parent::__construct();

        $this->load->helper('url');
    }

    public function create() {

        $this->dbforge->create_table('ci_sessions');
        $this->dbforge->add_field("session_id varchar(40) NOT NULL DEFAULT 'default 0'");
        $this->dbforge->add_key('session_id', TRUE);
        $this->dbforge->add_field("ip_address varchar(45) NOT NULL DEFAULT 'default 0'");
        $this->dbforge->add_field("user_agent varchar(120) NOT NULL DEFAULT 'default 0'");
        $this->dbforge->add_field("last_activity int(10) NOT NULL DEFAULT 'default 0'");
        $this->dbforge->add_field("user_data text NOT NULL DEFAULT 'default 0'");


    }





}
