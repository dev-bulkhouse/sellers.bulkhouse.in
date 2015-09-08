<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_main extends CI_Controller {

    private $logged_in;

    public function __construct() {
        parent::__construct();
 $this->load->helper('url');
$this->load->model('vendor_model');
    if($this->session->userdata('logged_in')){
            $this->logged_in = true;
            redirect(base_url().'verification/','location');

        }  else {
            $this->logged_in = false;
            redirect(base_url(),'location');
        }

    }

	public function index()
	{
                $logged = $this->logged_in;
//
		$this->load->view('admin/main',array('logged_in'=>$logged));
//                $this->load->view('admin/template/footer');
	}

        public function account() {
            $this->load->view('template/header');
		$this->load->view('account');
                $this->load->view('template/footer');
        }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */