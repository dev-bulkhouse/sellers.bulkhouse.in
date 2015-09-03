<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

    private $logged_in;

    public function __construct() {
        parent::__construct();
 $this->load->helper('url');
 $this->load->model('register_model');
  $this->load->model('vendor_model');
  $this->load->model('vendor_update');

    if($this->session->userdata('logged_in')){
            $this->logged_in = true;

        }  else {
            $this->logged_in = false;
            redirect('http://bulkhouse.in/','location');
        }

    }

	public function index()
	{
                $logged = $this->logged_in;
//                $this->load->view('template/header',array('logged_in'=>$logged));
		$this->load->view('main',array('logged_in'=>$logged));
//                $this->load->view('template/footer');
	}

        public function account() {
                $this->load->view('template/header');
		$this->load->view('account');
                $this->load->view('template/footer');
        }
        public function bank() {
            $logged = $this->logged_in;
//                $this->load->view('template/header');
		$this->load->view('bank',array('logged_in'=>$logged));
//                $this->load->view('template/footer');
        }
         public function settings() {
            $logged = $this->logged_in;
//                $this->load->view('template/header');
		$this->load->view('changepassword',array('logged_in'=>$logged));
//                $this->load->view('template/footer');
        }
        public function company() {
            $this->load->library('form_validation');
       $this->form_validation->set_rules('email', 'Email Address', 'trim|required|min_length[6]|max_length[100]|valid_email|is_unique[users.email]|xss_clean');
       $this->form_validation->set_message('is_unique[users.email]', 'The email is already taken');
            $logged = $this->logged_in;
//                $this->load->view('template/header');
		$this->load->view('companypro',array('logged_in'=>$logged));

//                $this->load->view('template/footer');
        }
        public function view_data() {
            $logged = $this->logged_in;
//                $this->load->view('template/header');
		$this->load->view('view_details',array('logged_in'=>$logged));
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
         public function vendor_on_board() {
            $logged = $this->logged_in;
//                $this->load->view('template/header');
		$this->load->view('faqs',array('logged_in'=>$logged));
//                $this->load->view('template/footer');
        }
        public function selling_process() {
            $logged = $this->logged_in;
//                $this->load->view('template/header');
		$this->load->view('faqs2',array('logged_in'=>$logged));
//                $this->load->view('template/footer');
        }
        public function vendor_update() {
          $result = $this->vendor_update->edit();
//                $this->load->view('template/footer');
        }
         public function update_vendor() {
             $result = $this->register_model->update();


            if ($result) {
                 $this->session->set_flashdata('success_message', 'Vendor Data Updated');
                redirect(base_url().'main/company','location');

            } else {
                 redirect(base_url().'main/company','location');



            }
         }
          public function cenvat_doc($a,$b) {

              $this->register_model->cenvat_doc($a,$b);

        }

         public function serv_doc($a,$b) {

              $this->register_model->serv_doc($a,$b);

        }
         public function pro_cat($cid) {

             $result = $this->register_model->pro_caty($cid);

             if ($result) {
                 $this->session->set_flashdata('success_message', 'Product Categories are Updated');
                 redirect(base_url().'main/company','location');

            } else {
                 $this->session->set_flashdata('error_message', 'Product Categories are Updated');
                 redirect(base_url().'main/company','location');



            }

        }




}

/* End of file welcome.php */
/* Location: ./application/controllers/main.php */