<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
require_once APPPATH."/third_party/xlszen.php"; 
class Test extends CI_Controller {
    
    function __construct() {
        parent::__construct();
       
           }
    public function report($date) {
      
        $this->db->select('account_name, account_number,bank_name,branch,ifsc,micr,amount');
        $this->db->from('bank_details');
         $this->db->join('vendor_details', 'bank_details.compid = vendor_details.id');
        $this->db->where('bank_details.status', 3);
        $this->db->where('bank_details.dispatch_date', $date);
        $query = $this->db->get();
        $excel = $query->result();
        $data = array();
        $data = array(
            
                   1 => array ('Account Name','Account Number','Bank Name','Branch','IFSC','MICR','Deposit Amount')
            );
        
        foreach ($excel as $report)
        {
        $data[] = $report;
        }

// generate file (constructor parameters are optional)
$xls = new Excel_XML('UTF-8', false, 'Dispatched Sheet');
$xls->addArray($data);
$xls->generateXML('Dispatched on'.$date);
        
    }
    public function bank_report() {
               $this->db->select('vendor_name, firm_name, email, mobile');
           
                $this->db->from('vendor_details');
                $this->db->join('bank_details','bank_details.compid = vendor_details.id');
                 $this->db->where('bank_details.status', 10);
                $query = $this->db->get();
                $excel = $query->result();
                $data1 = array();
              
                $data1 = array(
                    
                   1 => array ('Name','CompanyName','email','Mobile'),
                       
                  );
            foreach ($excel as $report)
        {
        $data1[] = $report;
        }
      
        

// generate file (constructor parameters are optional)
$xls = new Excel_XML('UTF-8', false, 'Dispatched Sheet');
$xls->addArray($data1);
$xls->generateXML('pending report');
        
    }
}

    