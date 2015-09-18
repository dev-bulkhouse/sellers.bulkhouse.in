<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Intro extends CI_Controller {


    public function __construct() {
        parent::__construct();
 $this->load->helper('url');

  if($this->session->userdata('logged_in')){
            $this->logged_in = true;
            redirect('main','location');
        }  else {
            $this->logged_in = false;

        }
    }

	public function index()
	{
//                $this->load->view('template/header');
		$this->load->view('intro');
//                $this->load->view('template/footer');
	}
        public function terms() {

//                $this->load->view('template/header');
		$this->load->view('terms');
//                $this->load->view('template/footer');
        }
        public function export_terms() {

//                $this->load->view('template/header');
		$this->load->view('export_terms');
//                $this->load->view('template/footer');
        }

        public function register() {

            $this->load->view('intro_register');

        }



}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */