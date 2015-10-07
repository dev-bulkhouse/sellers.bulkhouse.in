<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Old extends CI_Controller {


    public function __construct() {
        parent::__construct();
 $this->load->helper('url');

  if($this->session->userdata('logged_in')){
            $this->logged_in = true;
            redirect('main','location');
        }  else {
            $this->logged_in = false;
//            redirect('http://bulkhouse.in','location');
        }



    }

	public function index()
	{
//                $this->load->view('template/header');
		$this->load->view('old');
//                $this->load->view('template/footer');
	}




}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */