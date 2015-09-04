<?php

class Welcome extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('date');
		$this->load->model('Users','',TRUE);
	}


	function index()
	{


        }

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */