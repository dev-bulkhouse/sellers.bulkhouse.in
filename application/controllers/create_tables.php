<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class Create_tables extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('tabs');
    }

    public function create() {


       $this->tabs->create();



    }

    public function insert() {


        $this->tabs->insert();


    }

    public function bank() {


        $this->tabs->bank();


    }

    public function doc() {


        $this->tabs->doc();


    }

    public function req() {


        $this->tabs->req();


    }

    public function mn() {


        $this->tabs->mn();


    }

    public function sec() {



        $this->tabs->sec();


    }

     public function ph() {



        $this->tabs->ph();


    }

    public function welcome() {
        echo("This is welcome page");
    }



}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */