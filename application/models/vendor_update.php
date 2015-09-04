<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Vendor_update extends CI_Model {

    function __construct() {
        parent::__construct();
    }



    public function add_document($document_info, $file_type, $sourcePath, $targetPath, $dir, $comp_id,$a) {
        $file_type = explode('/', $file_type);
        if($file_type[1] == 'jpeg'){
            $file_type[1] = 'jpg';
        }

        $c = array(
            $a => $document_info,
            $a.'_date' => date('Y-m-d'),
            $a.'_status' => 0,
            $a.'_lock' => 1,
            $a.'_type' => $file_type[1]
        );
        $this->db->where('compid', $comp_id);
        $this->db->update('document_details', $c);
        if (!file_exists($dir)) {
            mkdir($dir, 0777);
            move_uploaded_file($sourcePath, $targetPath);


            return "Uploaded!!";
        } else {
            move_uploaded_file($sourcePath, $targetPath);

            return "Uploaded!!";
        }
    }



     public function add_bank($comp_id) {
         $time = date("Y-m-d") . "|" . date("h:i:s");
         $banking = array(

                    'account_name' => $this->input->post('account_name'),
                    'account_number' => $this->input->post('account_number'),
                    'bank_name' => $this->input->post('bank_name'),
                    'branch' => $this->input->post('branch'),
                    'ifsc' => $this->input->post('ifsc'),
                    'micr' => $this->input->post('micr'),
                    'date_of_submission' =>$time,
                    'compid' => $comp_id,
                    'status' =>0

             );
             $this->db->where('compid', $comp_id);
        $this->db->update('bank_details', $banking);
        return 1;
         }



    public function credit($comp_id) {

                $data3 = array(
                   'max_credit_limit' => $this->input->post('max_credit_limit'),
                    'compid' => $comp_id

                );

                $this->db->where('compid', $comp_id);
                $this->db->update('credit_limit', $data3);

                return 1 ;

        }
         public function status_update($firm_type , $compid) {


        $this->db->select('*');
        $this->db->from('document_details');
        $this->db->join('vendor_details', 'document_details.compid = vendor_details.id');
        $this->db->where(array('document_details.compid' => $compid));
        $query = $this->db->get();
        $result = $query->result();
        foreach ($result as $st) {

            $pan_prop_status = $st->pan_prop_status;
            $vat_cst_status = $st->vat_cst_status;
            $cst_status = $st->cst_status;
            $pan_comp_status = $st->pan_comp_status;
            $part_deed_status = $st->part_deed_status;
            $cert_of_incorp_status = $st->cert_of_incorp_status;
            $moa_aoa_status = $st->moa_aoa_status;
            $aoa_status = $st->aoa_status;
            $shop_establish_trade =$st->shop_establish_trade;
            $photoid =$st->photoid;
            $businessid =$st->businessid;



             if($firm_type == 'partnership'){
                 if($photoid == 5 ||$vat_cst_status == 5 || $cst_status == 5 || $pan_comp_status == 5 || $part_deed_status == 5 ){
                     return "Need To Upload";
                 }elseif($photoid == 0 || $vat_cst_status == 0 || $cst_status == 0 || $pan_comp_status == 0 || $part_deed_status == 0){
                     return "Waiting for Approved";
                 }elseif($photoid == 2 || $vat_cst_status == 2 || $cst_status == 2 || $pan_comp_status == 2 || $part_deed_status == 2){
                     return "Approved";

                 }elseif($photoid == 1 || $vat_cst_status == 1 || $cst_status == 1 || $pan_comp_status == 1 || $part_deed_status == 1){
                     return "Disapproved";
                 }

             }elseif ($firm_type == 'proprietorship') {
                      if($businessid == 5 || $photoid == 5 || $vat_cst_status == 5 || $pan_prop_status == 5 || $cst_status == 5 || $shop_establish_trade == 5){
                     return "Need To Upload";
                 }elseif($businessid == 0 || $photoid == 0 || $vat_cst_status == 0 || $pan_prop_status == 0 || $cst_status == 0 || $shop_establish_trade == 0){
                     return "Waiting for Approved";
                 }elseif($businessid == 2 || $photoid == 2 || $vat_cst_status == 2 || $pan_prop_status == 2 || $cst_status == 2 || $shop_establish_trade == 2){
                     return "Approved";

                 }elseif($businessid == 1 || $photoid == 1 || $vat_cst_status == 1 || $pan_prop_status == 1 || $cst_status == 1 || $shop_establish_trade == 1){
                     return "Disapproved";
                 }

        }elseif ($firm_type == 'pvt_or_ltd') {

                 if($photoid == 5 || $vat_cst_status == 5 || $cst_status == 5 || $pan_comp_status == 5 || $cert_of_incorp_status == 5 || $moa_aoa_status == 5 || $aoa_status == 5 ){
                     return "Need To Upload";
                 }elseif($photoid == 0 || $vat_cst_status == 0 || $cst_status == 0 || $pan_comp_status == 0 || $cert_of_incorp_status == 0 || $moa_aoa_status == 0 || $aoa_status == 0){
                     return "Waiting for Approved";
                 }elseif($photoid == 2 || $vat_cst_status == 2 || $cst_status == 2 || $pan_comp_status == 2 || $cert_of_incorp_status == 2 || $moa_aoa_status == 2 || $aoa_status == 2){
                     return "Approved";

                 }elseif($photoid == 2 || $vat_cst_status == 1 || $cst_status == 1 || $pan_comp_status == 1 || $cert_of_incorp_status == 1 || $moa_aoa_status == 1 || $aoa_status == 1){
                     return "Disapproved";
                 }

                 }
            }
              }
                public function status_bank($compid) {


        $this->db->select('*');
        $this->db->from('bank_details');
        $this->db->join('vendor_details', 'bank_details.compid = vendor_details.id');
        $this->db->where(array('bank_details.compid' => $compid));
        $query = $this->db->get();
        $result = $query->result();
        foreach ($result as $st) {

            $status = $st->status;


                 if($status == 10){
                     return "Need To Submit";
                 }elseif($status == 0){
                     return "submitted";
                 }elseif($status == 1){
                     return "Dispatch";
                 }elseif($status == 2){
                     return "Sent bank Details";
                 }elseif($status == 3){
                     return "Failed";
                 }elseif($status == 4){
                     return "Sucess";
                 }elseif($status == 5){
                     return "wrong";
                 }

             }
                }

                public function status_profile($compid) {
$this->db->select('*');
        $this->db->from('vendor_details');
        $this->db->where(array('vendor_details.id' => $compid));
        $query = $this->db->get();
        $result = $query->result();
        foreach ($result as $st) {

            $address1 = $st->address1;
            $address2 = $st->address2;
            $city = $st->city;
            $state = $st->state;
            $pincode = $st->pin_code;
            $contact_name = $st->contact_name;
            $mobile_contact = $st->mobile_contact;
            $email_contact = $st->email_contact;
            $year_establishment = $st->year_establishment;
            $comp_turnover = $st->comp_turnover;
            $reg_category = $st->reg_category;
            $tax_reg = $st->tax_reg;
            $cert_products = $st->cert_products;
            $agree = $st->agree;





                 if($address1 == "" || $address2 == "" || $city == "" || $state == "" || $pincode == "" || $contact_name == "" || $mobile_contact == "" || $email_contact == "" || $year_establishment == "" || $comp_turnover == "" || $reg_category == "" || $tax_reg == "" || $cert_products == "" ){
                     return "Need To Submit";
                 }

             }
                }


        public function mobile_verified($compid,$mobile){

        $last_version = $this->latest_number_version($compid);
        $date = date("d-m-Y H:i:s");

        $data = array(
               'compid' => $compid,
               'mobile' => $mobile,
               'version' => $last_version + 1,
               'date' => $date

         );

        $this->db->insert('vendor_mobile', $data);
        return $this->db->affected_rows();


     }

    public function latest_number($compid) {

        $this->db->select('mobile,version');
        $this->db->from('vendor_mobile');
        $this->db->where(array('vendor_mobile.compid' => $compid));
        $this->db->order_by("version", "desc");
        $this->db->limit(1);
        $query = $this->db->get();
        $ver = $query->result();
        return $ver[0]->mobile;

    }

     public function mobile_number($compid) {

        $this->db->select('mobile');
        $this->db->from('vendor_details');
        $this->db->where(array('vendor_details.id' => $compid));
        $this->db->limit(1);
        $query = $this->db->get();
        $num = $query->result();

        return $num[0]->mobile;

    }

    public function latest_number_version($compid) {

        $this->db->select('version');
        $this->db->from('vendor_mobile');
        $this->db->where(array('vendor_mobile.compid' => $compid));
        $this->db->order_by("version", "desc");
        $this->db->limit(1);
        $query = $this->db->get();
        $ver = $query->result();
        return $ver[0]->version;

    }
    public function edit($compid,$field) {

        $compid = $this->session->userdata('id');
        $email = $this->session->userdata('email');

        $data = array(
           $field => $this->input->post($field)
        );


        $this->db->where(array('vendor_details.id' => $compid));
        $this->db->update('vendor_details', $data);
    }



    }


