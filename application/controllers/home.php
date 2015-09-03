<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {


    public function __construct() {
        parent::__construct();
 $this->load->helper('url');

  if($this->session->userdata('logged_in')){
            $this->logged_in = true;
            redirect('main','location');
        }  else {
            $this->logged_in = false;
            redirect('http://bulkhouse.in','location');
        }



    }

	public function index()
	{
                $this->load->view('template/header');
		$this->load->view('home');
                $this->load->view('template/footer');
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

        public function aaptha($email, $firstname, $lastname, $password_sec) {
        $this->load->spark('mage-api/0.0.1');
        $this->mage_api->customer_create(array('email' => $email, 'firstname' => $firstname, 'lastname' => $lastname, 'password' => $password_sec, 'website_id' => 1, 'store_id' => 1, 'group_id' => 4));
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */