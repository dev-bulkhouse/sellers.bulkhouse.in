<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Register_model extends CI_Model {

    function __construct() {
        parent::__construct();

        date_default_timezone_set('Asia/Kolkata');
    }

    public function add_vendor() {
//        $pro_cat = "";
//        $pro_category = $this->input->post('pro_category');
//        foreach ($pro_category as $pro) {
//            $pro_cat .= $pro . ",";
//        }
//        $pro_cat = substr($pro_cat, 0, -1);
        $time = date("Y-m-d") . "|" . date("h:i:s");
        $email = $this->input->post('email');
        $first_name = $this->input->post('firstname');
        $last_name = $this->input->post('lastname');
        $password_sec = $this->input->post('password');


        $firm_type = $this->input->post('firm_type');
        $firm_name = $this->input->post('firm_name');
        $mobile = $this->input->post('mobile');


        $data = array(
            'email' => $this->input->post('email'),
            'password' => sha1($this->config->item('bulk-lock') . $this->input->post('password')),
            'vendor_name' => $first_name,
            'last_name' => $last_name,
            'mobile' => $this->input->post('mobile'),
            'firm_name' => $this->input->post('firm_name'),
            'firm_type' => $this->input->post('firm_type'),
            'reg_as' => $this->input->post('reg_as'),
            'agree' => $this->input->post('agree'),
            'registered_on' => $time,
        );

        $this->db->insert('vendor_details', $data);

        $compid = $this->get_compid($email);

        $data4 = array(
            'compid' => $compid,
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password'),
            'date' => date('d-m-Y H:i:s')
        );

        $this->db->insert('sec_vendor_authinfo', $data4);
//        $this->activate_seller($email, $firstname, $password_sec, $lastname);



        $data3 = array(
            'compid' => $compid
        );

        $this->db->insert('document_details', $data3);
        $this->db->insert('bank_details', $data3);
        $this->db->insert('pro_cat', $data3);
        $this->db->insert('vendor_mobile', $data3);

        $reg_as = $this->get_reg_as($email);

        if ($reg_as == 'Domestic') {
            
        } else {
            $data2 = array(
                'compid' => $compid,
            );
            $this->db->insert('credit_limit', $data2);
        }

        if ($this->db->affected_rows() === 1) {
            $this->set_session($email);
            $this->send_confirmation_mail($email);
            $custid = $this->activate_seller($email, $first_name, $last_name, $password_sec);
//          $this->activate_account($email);
            return array($first_name, $email, $firm_type, $firm_name, $mobile, $custid);
        } else {
            echo "i am really sorry!";
        }
    }

    public function activate_seller($email, $firstname, $lastname, $password_sec) {
        $this->load->spark('mage-api/0.0.1');
        $result = $this->mage_api->customer_create(array('email' => $email, 'firstname' => $firstname, 'lastname' => $lastname, 'password' => $password_sec, 'website_id' => 1, 'store_id' => 1, 'group_id' => 4));
        return $result;
    }

    public function update() {

        $compid = $this->session->userdata('id');
        $email = $this->session->userdata('email');

        $data = array(
            'max_credit_limit' => $this->input->post('max_credit_limit'),
            'address1' => $this->input->post('address1'),
            'address2' => $this->input->post('address2'),
            'city' => $this->input->post('city'),
            'state' => $this->input->post('state'),
            'pin_code' => $this->input->post('pin_code'),
            'country' => $this->input->post('country'),
            'contact_name' => $this->input->post('contact_name'),
            'mobile_contact' => $this->input->post('mobile_contact'),
            'email_contact' => $this->input->post('email_contact'),
            'website' => $this->input->post('website'),
            'land_line' => $this->input->post('land_line'),
            'year_establishment' => $this->input->post('year_establishment'),
            'no_employees' => $this->input->post('no_employees'),
            'comp_turnover' => $this->input->post('comp_turnover'),
            'reg_category' => $this->input->post('reg_category'),
            'pro_category' => $this->input->post('pro_category'),
            'tax_reg' => $this->input->post('tax_reg'),
            'cert_products' => $this->input->post('cert_products'),
            'dispat_person' => $this->input->post('dispat_person'),
            'dispat_email' => $this->input->post('dispat_email'),
            'dispat_mobile' => $this->input->post('dispat_mobile'),
            'dispat_land' => $this->input->post('dispat_land'),
            'dispat_address1' => $this->input->post('dispat_address1'),
            'dispat_address2' => $this->input->post('dispat_address2'),
            'dispat_city' => $this->input->post('dispat_city'),
        );


        $this->db->where(array('vendor_details.id' => $compid));
        $this->db->update('vendor_details', $data);
    }

    public function update_vend() {

        $compid = $this->session->userdata('id');
        $email = $this->session->userdata('email');

        $data = array(
            'max_credit_limit' => $this->input->post('max_credit_limit'),
            'address1' => $this->input->post('address1'),
            'address2' => $this->input->post('address2'),
            'city' => $this->input->post('city'),
            'state' => $this->input->post('state'),
            'pin_code' => $this->input->post('pin_code'),
            'country' => $this->input->post('country'),
            'contact_name' => $this->input->post('contact_name'),
            'mobile_contact' => $this->input->post('mobile_contact'),
            'email_contact' => $this->input->post('email_contact'),
            'website' => $this->input->post('website'),
            'land_line' => $this->input->post('land_line'),
            'year_establishment' => $this->input->post('year_establishment'),
            'no_employees' => $this->input->post('no_employees'),
            'comp_turnover' => $this->input->post('comp_turnover'),
            'reg_category' => $this->input->post('reg_category'),
            'pro_category' => $this->input->post('pro_category'),
            'tax_reg' => $this->input->post('tax_reg'),
            'cert_products' => $this->input->post('cert_products'),
            'dispat_person' => $this->input->post('dispat_person'),
            'dispat_email' => $this->input->post('dispat_email'),
            'dispat_mobile' => $this->input->post('dispat_mobile'),
            'dispat_land' => $this->input->post('dispat_land'),
            'dispat_address1' => $this->input->post('dispat_address1'),
            'dispat_address2' => $this->input->post('dispat_address2'),
            'dispat_city' => $this->input->post('dispat_city'),
        );
        $this->db->where(array('vendor_details.id' => $compid));
        $this->db->update('vendor_details', $data);
        if ($this->db->affected_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function cenvat_doc($cid, $stat) {
        $data4 = array(
            'cenvat_required' => $stat
        );
        $this->db->where(array('vendor_details.id' => $cid));
        $this->db->update('vendor_details', $data4);
    }

    public function serv_doc($cid, $stat) {
        $data4 = array(
            'servicetax_required' => $stat
        );
        $this->db->where(array('vendor_details.id' => $cid));
        $this->db->update('vendor_details', $data4);
    }

    public function pro_caty($cid) {
        $data4 = array(
            'The_Fashion' => $this->input->post('The_Fashion'),
            'The_Home' => $this->input->post('The_Home'),
            'Mobiles_Consumer_Electronics' => $this->input->post('Mobiles_Consumer_Electronics'),
            'Packing_Stationery_Office_and_School' => $this->input->post('Packing_Stationery_Office_and_School'),
            'Electrical_Lighting_and_Tools' => $this->input->post('Electrical_Lighting_and_Tools'),
            'Sports_and_Toys' => $this->input->post('Sports_and_Toys'),
            'Security_Computers_Telecom' => $this->input->post('Security_Computers_Telecom'),
            'Agriculture' => $this->input->post('Agriculture'),
            'Construction' => $this->input->post('Construction'),
            'Industrial' => $this->input->post('Industrial')
        );
        $this->db->where(array('compid' => $cid));
        $this->db->update('pro_cat', $data4);
        return 1;
    }

    public function get_compid($email) {
        $this->db->select('id');
        $this->db->from('vendor_details');
        $this->db->where(array('vendor_details.email' => $email));
        $query = $this->db->get();

        foreach ($query->result_array() as $row) {

            return $row['id'];
        }
    }

    public function get_email($compid) {
        $this->db->select('email');
        $this->db->from('vendor_details');
        $this->db->where(array('vendor_details.id' => $compid));
        $query = $this->db->get();

        foreach ($query->result_array() as $row) {

            return $row['email'];
        }
    }

    public function get_mag_cust_id($email) {
        $this->db->select('custid');
        $this->db->from('mag_cust');
        $this->db->where(array('mag_cust.email' => $email));
        $query = $this->db->get();

        foreach ($query->result_array() as $row) {

            return $row['custid'];
        }
    }

    public function get_reg_as($email) {
        $this->db->select('reg_as');
        $this->db->from('vendor_details');
        $this->db->where(array('vendor_details.email' => $email));
        $query = $this->db->get();

        foreach ($query->result_array() as $row) {

            return $row['reg_as'];
        }
    }

    public function set_session($email) {

        $sql = "SELECT * FROM vendor_details WHERE email = '" . $email . "' LIMIT 1";

        $result = $this->db->query($sql);

        $row = $result->row();

        $sess_data = array(
            'id' => $row->id,
            'email' => $row->email,
            'firm_type' => $row->firm_type,
            'firm_name' => $row->firm_name,
            'vendor_name' => $row->vendor_name,
            'registered_on' => $row->registered_on,
            'mobile' => $row->mobile,
            'logged_in' => 0
        );

        $this->email_code = md5((string) $row->registered_on . $this->config->item('bulk-lock'));
        $this->session->set_userdata($sess_data);
    }

    private function send_confirmation_mail($email) {
        $this->load->helper('url');
        $this->load->library('email');
//        $email = $this->session->userdata('email');

        $email_code = $this->email_code;
        $config['protocol'] = "sendmail";
        $config['smtp_host'] = "smtp.sendgrid.net";
        $config['smtp_port'] = "587";
        $config['smtp_user'] = "vendors_bulkhouse";
        $config['smtp_pass'] = "asdftrew12";
        $config['charset'] = "utf-8";
        $config['newline'] = "\r\n";
        $this->email->initialize($config);
        $this->email->set_mailtype('html');
        $this->email->from('vendorsupport@bulkhouse.in', 'Bulkhouse Vendor Managment Team');
        $this->email->to($email);
        $this->email->bcc('kishorechandra.developer@gmail.com');
        $this->email->subject('BULKHOUSE - Please activate your account now');
        $base_url = base_url();
        $link = $base_url . "register/validate_email/" . $email . "/" . $email_code;
        $link_remove = $base_url . "register/validate_email_remove/" . $email . "/" . $email_code . "/remove";
//       $date_last = date('d F Y', mktime(date("m"), date("d") + 2, date("Y")));
//       $time_last = date('H:i:s', mktime(date("H") + 24, date("i"), date("s")));
        $date2 = new DateTime();
        $date2->modify('+2 days');


        $message = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
</head><body>';
        $message .= '<p>Dear ' . $this->session->userdata('vendor_name') . ',</p>';
        $message .= '<p>Thank you for registering on Bulkhouse! </p>';
        $message .= '<p>This is your first step in registration as a Vendor with Bulkhouse. Please <strong>';
        $message .= '<a href="';
        $message .= $link;
        $message .= '">Click Here</a></strong> to verify the E-mail ID and to activate your account .</p>';
        $message .= '<p>After you have activated your account, you will be required to complete the further registration formalities!</p>';
        $message .= '<p>Upon confirmation of the above link, kindly login with the verified E-mail ID</p>';
        $message .= '<p>In case you are unable to login, please Email to vendorsupport@bulkhouse.com or call at the below listed Helpline Number</p>';
        $message .= '<p>This link expires at ';
        $message .= date('H:i:s');
        $message .= ' hrs on ';
        $message .= $date2->format('d F Y');
        $message .= '.</p><p>If you wish to abort the registration process now or before expiry, ';
        $message .= 'please click on <strong><a href="';
        $message .= $link_remove;
        $message .= '">Cancel Registration</a></strong></p>';
        $message .= '<p>Thank you!</p>';
        $message .= '<p>Vendors Team </p>';
        $message .= '<p>Vendor Support: ';
        $message .= $this->config->item('bulk-support-number');
        $message .='</p>';
        $message .= '<p>(Mon-Sat 1000am-1800pm)</p>';


        $this->email->message($message);
        $this->email->send();
    }

    private function welcome_mail() {
        $this->load->helper('url');
        $this->load->library('email');
        $email = $this->session->userdata('email');
        $email_code = $this->email_code;
        $config['protocol'] = "smtp";
        $config['smtp_host'] = "smtp.sendgrid.net";
        $config['smtp_port'] = "587";
        $config['smtp_user'] = "vendors_bulkhouse";
        $config['smtp_pass'] = "bulkhouse@vizag123";
        $config['charset'] = "utf-8";
        $config['newline'] = "\r\n";
        $this->email->initialize($config);

        $this->email->set_mailtype('html');
        $this->email->from($this->config->item('bot_email'), 'Bulkhouse Vendor Managment Team');
        $this->email->to($email);
        $this->email->subject('BULKHOUSE - Please activate your account now');
        $base_url = base_url();
        $link = $base_url . "register/validate_email/" . $email . "/" . $email_code;
        $link_remove = $base_url . "register/validate_email_remove/" . $email . "/" . $email_code . "/remove";
//       $date_last = date('d F Y', mktime(date("m"), date("d") + 2, date("Y")));
//       $time_last = date('H:i:s', mktime(date("H") + 24, date("i"), date("s")));
        $date2 = new DateTime();
        $date2->modify('+1 week');


        $message = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
</head><body>';
        $message .= '<p>Dear ' . $this->session->userdata('vendor_name') . ',</p>';
        $message .= '<p>Thank you for registering on Bulkhouse! </p>';
        $message .= '<p>This is your first step in registration as a Vendor with Bulkhouse. Please <strong>';
        $message .= '<a href="';
        $message .= $link;
        $message .= '">Click Here</a></strong> to verify the E-mail ID and to activate your account .</p>';
        $message .= '<p>After you have activated your account, you will be required to complete the further registration formalities!</p>';
        $message .= '<p>Upon confirmation of the above link, kindly login with the verified E-mail ID</p>';
        $message .= '<p>In case you are unable to login, please Email to vendorsupport@bulkhouse.com or call at the below listed Helpline Number</p>';
        $message .= '<p>This link expires at ';
        $message .= date('H:i:s');
        $message .= ' hrs on ';
        $message .= $date2->format('d F Y');
        $message .= '.</p><p>If you wish to abort the registration process now or before expiry, ';
        $message .= 'please click on <strong><a href="';
        $message .= $link_remove;
        $message .= '">Cancel Registration</a></strong></p>';
        $message .= '<p>Thank you!</p>';
        $message .= '<p>Vendors Team </p>';
        $message .= '<p>Vendor Support: ';
        $message .= $this->config->item('bulk-support-number');
        $message .='</p>';
        $message .= '<p>(Mon-Sat 1000am-1800pm)</p>';


        $this->email->message($message);
        $this->email->send();
    }

    public function validate_email($email_address, $email_code) {

        $sql = "SELECT email, registered_on FROM vendor_details WHERE email = '" . $email_address . "' LIMIT 1";
        $result = $this->db->query($sql);
        $row = $result->row();

        if ($result->num_rows() === 1) {
            if (md5((string) $row->registered_on . $this->config->item('bulk-lock')) === $email_code) {

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

    public function validate_email_remove($email_address, $email_code, $remove) {

        $sql = "SELECT email, registered_on FROM vendor_details WHERE email = '" . $email_address . "' LIMIT 1";
        $result = $this->db->query($sql);
        $row = $result->row();

        if ($result->num_rows() === 1) {
            if (md5((string) $row->registered_on . $this->config->item('bulk-lock')) === $email_code && $remove === "remove") {
                $reason = 'self';
                $result = $this->remove_account($email_address, $reason);
            }
            if ($result === true) {
                return true;
            } else {
                echo 'There is and error removing your account. Please contact admin@bulkhouse.in';
                return false;
            }
        } else {
            echo 'There is a error on validating your email . Please contact admin@bulkhouse.in';
        }
    }

    public function del($email_address) {
        $sql = "SELECT email, registered_on FROM vendor_details WHERE email = '" . $email_address . "' LIMIT 1";
        $result = $this->db->query($sql);
        $row = $result->row();
//        echo "deleted on bulkhouse.in";
        $custid = $this->get_mag_cust_id($email_address);
        $this->load->spark('mage-api/0.0.1');
        $this->mage_api->customer_delete($custid);
    }

    public function activate_account($email_address) {


        $data3 = array(
            'activation' => 1,
        );

        $this->db->where('email', $email_address);
        $this->db->update('vendor_details', $data3);



        if ($this->db->affected_rows() == 1) {

            return true;
        } else {
            echo'Error when activating your account, please contact admin@bulkhouse.com';
            return false;
        }
    }

    public function add_agents() {
        $data = array(
            'agent_id' => $this->input->post('agent_id'),
            'agent_name' => $this->input->post('agent_name'),
        );
        $this->db->insert('employee', $data);
        if ($this->db->affected_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function viewleads() {
        $this->db->select('*');
        $this->db->from('leads');

        $query = $this->db->get();
        return $query->result();
    }

    public function editleads($id) {



        $this->db->select('*');
        $this->db->from('leads');
        $this->db->where(array('leads.id' => $id));
        $query = $this->db->get();
        return $query->result_array();
    }

    public function remove_account($email_address, $reason) {

        $this->db->where('email', $email_address);
        $this->db->delete('vendor_details');

        if ($this->db->affected_rows() == 1) {

            $data_remove = array(
                'email' => $email_address,
                'date' => date('d-m-Y H:i:s'),
                'reason' => $reason
            );


            $this->db->insert('removed_vendors', $data_remove);
            if ($this->db->affected_rows() == 1) {
                return true;
            } else {
                echo'Error when removing your account, please contact admin@bulkhouse.com';
                return false;
            }

            return true;
        } else {
            echo'Error when removing your account, please contact admin@bulkhouse.com';
            return false;
        }
    }

    public function set_session_auto($email) {

        $sql = "SELECT * FROM vendor_details WHERE email = '" . $email . "' LIMIT 1";

        $result = $this->db->query($sql);

        $row = $result->row();

        $sess_data = array(
            'id' => $row->id,
            'email' => $email,
            'firm_type' => $row->firm_type,
            'firm_name' => $row->firm_name,
            'vendor_name' => $row->vendor_name,
            'mobile' => $row->mobile,
            'logged_in' => 1
        );

//        $this->email_code = md5((string) $row->createdOn);
        $this->session->set_userdata($sess_data);
    }

    public function chk_category($email_address) {

        $sql = "SELECT email, category, id FROM users WHERE email = '" . $email_address . "' LIMIT 1";
        $result = $this->db->query($sql);
        $row = $result->row();

        if ($result->num_rows() === 1) {

            $result = $this->activate_profile($row->category, $row->id);

            if ($result === true) {
                return true;
            } else {
                echo 'There is and error activating your profile. Please contact admin@yeswebs.in';
                return false;
            }
        } else {
            echo 'There is a error on validating your email . Please contact admin@yeswebs.in';
        }
    }

    public function viewdata($compid) {
        $this->db->select('*');
        $this->db->from('vendor_details');
        $this->db->where(array('vendor_details.id' => $compid));
        $query = $this->db->get();
        return $query->result();
    }

    public function bankdetails($compid) {
        $this->db->select('*');
        $this->db->from('bank_details');
        $this->db->join('vendor_details', 'bank_details.compid = vendor_details.id');
        $this->db->where(array('bank_details.compid' => $compid));
        $query = $this->db->get();
        return $query->result();
    }

    public function docdata($compid) {
        $this->db->select('*');
        $this->db->from('vendor_details');
        $this->db->where(array('vendor_details.id' => $compid));
        $query = $this->db->get();
        return $query->result();
    }

    public function pro_cat($compid) {
        $this->db->select('*');
        $this->db->from('pro_cat');
        $this->db->where(array('compid' => $compid));
        $query = $this->db->get();
        return $query->result();
    }

    public function check_user_exist($email) {
        $this->db->select('email');
        $this->db->from('vendor_details');
        $this->db->where(array('vendor_details.email' => $email));
        $query = $this->db->get();

        if ($query->num_rows() > 0) {

            return true;
        } else {
            return false;
        }
    }

    public function add_leads($email, $name, $phone, $agent) {
        $data = array(
            'vendor_email' => $email,
            'vendor_name' => $name,
            'vendor_phone' => $phone,
            'agent_id' => $agent,
            'date' => date('d-m-Y H:i:s')
        );
        $this->db->insert('leads', $data);
        if ($this->db->affected_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function update_lead($email, $name, $phone, $agent, $id) {
        $data = array(
            'vendor_email' => $email,
            'vendor_name' => $name,
            'vendor_phone' => $phone,
            'agent_id' => $agent,
        );
        $this->db->where(array('leads.id' => $id));
        $this->db->update('leads', $data);
        if ($this->db->affected_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function check_email_lead($email) {
        $this->db->select('vendor_email,agent_id');
        $this->db->from('leads');
        $this->db->where(array('leads.vendor_email' => $email));
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $vendorEmail = $row['vendor_email'];
                $agentId = $row['agent_id'];
                return array('one', $vendorEmail, $agentId);
            }
        } else {
            return array('two');
        }
    }

}
