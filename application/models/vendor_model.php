<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Vendor_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function countapproved($firm_type) {

        $this->db->select('id');
        $this->db->from('document_details');
        $this->db->join('vendor_details', 'vendor_details.id = compid');
        $this->db->where('vendor_details.firm_type', $firm_type);
        if ($firm_type == $firm_type) {
            $this->db->where('document_details.pan_prop_status', '2');
            $this->db->where('document_details.vat_cst_status', '2');
            $this->db->where('document_details.shop_establish_trade_status', '2');
            $this->db->where('document_details.photoid_status', '2');
            $this->db->where('document_details.addressid_status', '2');
            $this->db->where('document_details.businessid_status', '2');
        } elseif ($firm_type == $firm_type) {
            $this->db->where('document_details.pan_prop_status', '2');
            $this->db->where('document_details.pan_comp_status', '2');
            $this->db->where('document_details.vat_cst_status', '2');
            $this->db->where('document_details.part_deed_status', '2');
            $this->db->where('document_details.shop_establish_trade_status', '2');
            $this->db->where('document_details.photoid_status', '2');
            $this->db->where('document_details.addressid_status', '2');
            $this->db->where('document_details.businessid_status', '2');
        } elseif ($firm_type == $firm_type) {
            $this->db->where('document_details.pan_prop_status', '2');
            $this->db->where('document_details.pan_comp_status', '2');
            $this->db->where('document_details.vat_cst_status', '2');
            $this->db->where('document_details.moa_aoa_status', '2');
            $this->db->where('document_details.aoa_status', '2');
            $this->db->where('document_details.cert_of_incorp_status', '2');
            $this->db->where('document_details.photoid_status', '2');
            $this->db->where('document_details.addressid_status', '2');
            $this->db->where('document_details.businessid_status', '2');
        }
        return $this->db->count_all_results();
    }

    public function countall_new($doc_type) {
        $status_type = $doc_type.'_status';
        $this->db->select('*');
        $this->db->from('document_details');
        $this->db->join('vendor_details', 'document_details.compid = vendor_details.id');
        $this->db->where(array('document_details.'.$status_type => 0));
        return $this->db->count_all_results();
    }

     public function credit_limit($compid) {

        $this->db->select('*');
        $this->db->from('credit_limit');
        $this->db->where(array('credit_limit.compid' => $compid));
        $query = $this->db->get();
         $credit = $query->result();
          foreach($credit as $row1)
                {
                         return $row1->max_credit_limit;
                }



    }



    public function convert_number($number) {
		if (($number < 0) || ($number > 99999999999)) {
			throw new Exception("Number is out of range");
		}
		$Gn = floor($number / 1000000);
		/* Millions (giga) */
		$number -= $Gn * 1000000;
		$kn = floor($number / 1000);
		/* Thousands (kilo) */
		$number -= $kn * 1000;
		$Hn = floor($number / 100);
		/* Hundreds (hecto) */
		$number -= $Hn * 100;
		$Dn = floor($number / 10);
		/* Tens (deca) */
		$n = $number % 10;
		/* Ones */
		$res = "";
		if ($Gn) {
			$res .= $this->convert_number($Gn) .  "Million";
		}
		if ($kn) {
			$res .= (empty($res) ? "" : " ") .$this->convert_number($kn) . " Thousand";
		}
		if ($Hn) {
			$res .= (empty($res) ? "" : " ") .$this->convert_number($Hn) . " Hundred";
		}
		$ones = array("", "One", "Two", "Three", "Four", "Five", "Six", "Seven", "Eight", "Nine", "Ten", "Eleven", "Twelve", "Thirteen", "Fourteen", "Fifteen", "Sixteen", "Seventeen", "Eightteen", "Nineteen");
		$tens = array("", "", "Twenty", "Thirty", "Fourty", "Fifty", "Sixty", "Seventy", "Eigthy", "Ninety");
		if ($Dn || $n) {
			if (!empty($res)) {
				$res .= " and ";
			}
			if ($Dn < 2) {
				$res .= $ones[$Dn * 10 + $n];
			} else {
				$res .= $tens[$Dn];
				if ($n) {
					$res .= "-" . $ones[$n];
				}
			}
		}
		if (empty($res)) {
			$res = "zero";
		}
		return $res;
	}
}

?>