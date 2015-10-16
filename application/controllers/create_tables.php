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
       $this->tabs->insert();
       $this->tabs->newid();
       $this->tabs->bank();
       $this->tabs->doc();
       $this->tabs->req();
       $this->tabs->mn();
       $this->tabs->sec();
       $this->tabs->ph();
       $this->tabs->mag_cust();
       $this->tabs->employee();
        $this->tabs->leads();



    }
    
    public function let_us_know_you() {
        $this->tabs->let_us_know_you();
    }

    public function agent_leads() {
        $this->tabs->employee();
        $this->tabs->leads();
    }

    public function insert() {


        $this->tabs->insert();


    }

    public function newid() {


        $this->tabs->newid();


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

    public function mag_cust() {
        $this->tabs->mag_cust();
    }

    public function welcome() {
        echo("This is welcome page");
    }



}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */