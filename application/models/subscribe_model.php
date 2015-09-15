    <?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Subscribe_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }



    private $email_code;

    public function subscribe() {


//        $company = $this->input->post('company_name');
        $email = $this->input->post('email');
//        $phone = $this->input->post('phone');

        $time = date("Y-m-d") . "|" . date("h:i:s");

        $data = array(
//            'company' => $company,
            'email' => $email,
//            'phone' => $phone,
            'subscribedOn' => $time,
        );

        $this->db->insert('vendors', $data);


        if ($this->db->affected_rows() === 1) {
            $this->set_session($email);
            $this->send_validation_email();
            return array($email);
        } else {
            echo "i am really sorry!";
        }
    }

    public function set_session($email) {

        $sql = "SELECT id, subscribedOn FROM vendors WHERE email = '" . $email . "' LIMIT 1";

        $result = $this->db->query($sql);

        $row = $result->row();

        $sess_data = array(
            'email' => $email,
            'logged_in' => 0
        );

        $this->email_code = md5((string) $row->subscribedOn.$this->config->item('bulk-lock'));
        $this->session->set_userdata($sess_data);
    }

    private function send_validation_email() {
        $this->load->helper('url');
        $this->load->library('email');
        $email = $this->session->userdata('email');
        $email_code = $this->email_code;

        $config['protocol'] = "smtp";
        $config['smtp_host'] = "ssl://smtp.bizmail.yahoo.com";
        $config['smtp_port'] = "465";
        $config['smtp_user'] = "vendors@bulkhouse.com";
        $config['smtp_pass'] = "sampath01";
        $config['charset'] = "utf-8";
        $config['newline'] = "\r\n";
        $this->email->initialize($config);

        $this->email->set_mailtype('html');
        $this->email->from($this->config->item('bot_email'), 'BULKHOUSE (Vendor Registration)');
        $this->email->to($email);
        $this->email->subject('Please activate your link - BULKHOUSE');
        //$this->load->view('welcome_message',null,TRUE);
        $base_url = base_url();
       $link = $base_url."subscribe/validate_email/".$email."/".$email_code;

        $message = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
</head><body>';
        $message .= '<p>Dear <?php echo $company member ?>' . $this->session->userdata('realname') . ',</p>';
        $message .= 'Thanks for Subscribing with BULKHOUSE! Please <strong>
        <a href="';
        $message .= $link;
        $message .= '">Click Here</a></strong> to activate your account. After you have activated your account, you will be asked for further registration !</p>';
        $message .= '<p>Thank you!</p>';
        $message .= '<p>The Admin at BULKHOUSE</p>';
        $message .= '</body></html>';
        $this->email->set_newline("\r\n");

        $this->email->message($message);
        $this->email->send();
    }

    public function validate_email($email_address, $email_code) {

        $sql = "SELECT email, subscribedOn FROM vendors WHERE email = '" . $email_address . "' LIMIT 1";
        $result = $this->db->query($sql);
        $row = $result->row();

        if ($result->num_rows() === 1) {
            if (md5((string) $row->subscribedOn.$this->config->item('bulk-lock')) === $email_code) {

                $result = $this->activate_account($email_address);
            }
            if ($result === true) {
                return true;
            } else {
                echo 'There is and error activating your account. Please contact admin@bulkhouse.in';
                return false;
            }
        } else {
            echo 'There is a error on validating your email . Please contact admin@bulkhouse.in';
        }
    }

    private function activate_account($email_address) {

        $sql = "UPDATE vendors SET Activation =1 WHERE email = '" . $email_address . "' LIMIT 1 ";
        $this->db->query($sql);
        if ($this->db->affected_rows() === 1) {
            return true;
        } else {
            echo'Error when activating your account in the database, please contact admin@bulkhouse.in';
            return false;
        }
    }

    public function get_imp() {
        $this->db->select('*');
        $this->db->from('sec_vendor_authinfo');
        $this->db->join('mag_cust', 'mag_cust.email = email');
        $query = $this->db->get();

        return $query->result_array();

    }

}
