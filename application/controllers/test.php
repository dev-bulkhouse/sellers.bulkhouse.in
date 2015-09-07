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
$xls->generateXML('pending bank report');

    }
     public function vendor_report() {
               $this->db->select('vendor_name, firm_name, email, mobile');

                $this->db->from('vendor_details');

                 $this->db->where('vendor_details.activation', 1);
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
$xls->generateXML('Vendors report');

    }
     public function pending_email_report() {
               $this->db->select('vendor_name, firm_name, email, mobile');

                $this->db->from('vendor_details');

                 $this->db->where('vendor_details.activation', 0);
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
$xls->generateXML('pending email report');

    }
     public function pending_pro_report() {
               $this->db->select('vendor_name, firm_name, email, mobile');
               $this->db->from('vendor_details');
                $this->db->join('document_details','document_details.compid = vendor_details.id');
                $this->db->where('document_details.pan_prop_status', 5);
                $this->db->or_where('document_details.vat_cst_status', 5);
                 $this->db->or_where('document_details.shop_establish_trade_status', 5);
                  $this->db->or_where('document_details.photoid', 5);
                   $this->db->or_where('document_details.addressid', 5);
                    $this->db->or_where('document_details.businessid', 5);
                     $this->db->group_by("vendor_details.id");

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
$xls->generateXML('pending prop report');

    }
     public function pending_pvt_report() {
               $this->db->select('vendor_name, firm_name, email, mobile');
               $this->db->from('vendor_details');
                $this->db->join('document_details','document_details.compid = vendor_details.id');
                $this->db->where('document_details.pan_prop_status', 5);
                $this->db->or_where('document_details.vat_cst_status', 5);
                 $this->db->or_where('document_details.pan_comp_status', 5);
                   $this->db->or_where('document_details.moa_aoa_status', 5);
                     $this->db->or_where('document_details.aoa_status', 5);
                      $this->db->or_where('document_details.cert_of_incorp_status', 5);

                  $this->db->or_where('document_details.photoid', 5);
                   $this->db->or_where('document_details.addressid', 5);
                    $this->db->or_where('document_details.businessid', 5);
                     $this->db->group_by("vendor_details.id");

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
$xls->generateXML('pending PVT-LTD report');

    }
     public function pending_pat_report() {
             $this->db->select('vendor_name, firm_name, email, mobile');
                $this->db->from('vendor_details');
                $this->db->join('document_details','document_details.compid = vendor_details.id');
                $this->db->where('document_details.pan_prop_status', 5);
                $this->db->or_where('document_details.vat_cst_status', 5);
                 $this->db->or_where('document_details.pan_comp_status', 5);
                 $this->db->or_where('document_details.part_deed_status', 5);
                 $this->db->or_where('document_details.shop_establish_trade_status', 5);
                  $this->db->or_where('document_details.photoid', 5);
                   $this->db->or_where('document_details.addressid', 5);
                    $this->db->or_where('document_details.businessid', 5);
                     $this->db->group_by("vendor_details.id");
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
$xls->generateXML('pending partneship report');

    }
}

