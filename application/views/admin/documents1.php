<div class="large-10 columns panel large-centered" style="height: 400px"></div>
<div class="large-10 columns large-centered">
    <div class="large-3 columns panel left"></div>
    <div class="large-3 columns panel left"></div>
    <div class="large-3 columns panel left"></div>
    <div class="large-3 columns panel left"></div>
    <div class="large-3 columns panel left"></div>
    <div class="large-3 columns panel left"></div>
    <div class="large-3 columns panel left"></div>
</div>




<div class="large-3 columns" style="background-color: white">
    <h4>Proprietorship Firm Pan Cards -  Waiting for Approval </h4>
 <table>
  <tr>
    <th>Name of Company</th>
    <th>Name of Vendor</th>
    <th>PAN Details</th>
  </tr>
<?php

        $this->db->select('*');
        $this->db->from('document_details');
        $this->db->join('vendor_details', 'document_details.compid = vendor_details.id');
        $this->db->where(array('document_details.pan_prop_status' => 0));
       
        $pan_res_all = $this->db->get();
        $doc_details = $pan_res_all->result();


        foreach ($doc_details as $row) {
             ?>


  <tr>
      <td><?php echo $row->firm_name; ?></td>
    <td><?php echo $row->vendor_name; ?></td>
    <td><?php
                     if (isset($row->pan_prop)) {
                         echo $row->pan_prop;
                        }

    ?></td>
  </tr>
<?php } ?>
  </table>
</div>
<div class="large-3 columns" style="background-color: white">
    <h4>Proprietorship Firm VAT CST -  Waiting for Approval </h4>
 <table>
  <tr>
    <th>Name of Company</th>
    <th>Name of Vendor</th>
    <th>VAT- CST Details</th>
  </tr>
<?php

        $this->db->select('*');
        $this->db->from('document_details');
        $this->db->join('vendor_details', 'document_details.compid = vendor_details.id');
        $this->db->where(array('document_details.vat_cst_status' => 0));
        $vat_res_all = $this->db->get();
        $doc_vat_details = $vat_res_all->result();


        foreach ($doc_vat_details as $row) {
             ?>


  <tr>
    <td><?php echo $row->firm_name; ?></td>
    <td><?php echo $row->vendor_name; ?></td>
    <td><?php
                     if (isset($row->vat_cst)) {
                         echo $row->vat_cst;
                        }

    ?></td>
  </tr>
<?php } ?>
  </table>
</div>

<div class="large-3 columns" style="background-color: white">
    <h4>Company PAN Cards -  Waiting for Approval </h4>
 <table>
  <tr>
    <th>Name of Company</th>
    <th>Name of Vendor</th>
    <th>Company PAN Details</th>
  </tr>
<?php

        $this->db->select('*');
        $this->db->from('document_details');
        $this->db->join('vendor_details', 'document_details.compid = vendor_details.id');
        $this->db->where(array('document_details.pan_comp_status' => 0));
        $pan_comp_all = $this->db->get();
        $pan_comp_details = $pan_comp_all->result();


        foreach ($pan_comp_details as $row) {
             ?>


  <tr>
    <td><?php echo $row->firm_name; ?></td>
    <td><?php echo $row->vendor_name; ?></td>
    <td><?php
                     if (isset($row->pan_comp)) {
                         echo $row->pan_comp;
                        }

    ?></td>
  </tr>
<?php } ?>
  </table>
</div>
<div class="large-3 columns" style="background-color: white">
    <h4>Authorised Signatory -  Waiting for Approval </h4>
 <table>
  <tr>
    <th>Name of Company</th>
    <th>Name of Vendor</th>
    <th>Signing Authoroty Details</th>
  </tr>
<?php

        $this->db->select('*');
        $this->db->from('document_details');
        $this->db->join('vendor_details', 'document_details.compid = vendor_details.id');
        $this->db->where(array('document_details.sign_status' => 0));
        $sign_all = $this->db->get();
        $sign_details = $sign_all->result();


        foreach ($sign_details as $row) {
             ?>


  <tr>
    <td><?php echo $row->firm_name; ?></td>
    <td><?php echo $row->vendor_name; ?></td>
    <td><?php
                     if (isset($row->sign)) {
                         echo $row->sign;
                        }

    ?></td>
  </tr>
<?php } ?>
  </table>
</div>
<div class="large-3 columns" style="background-color: white">
    <h4>Partnership Deed -  Waiting for Approval </h4>
 <table>
  <tr>
    <th>Name of Company</th>
    <th>Name of Vendor</th>
    <th>Partnership Details</th>
  </tr>
<?php

        $this->db->select('*');
        $this->db->from('document_details');
        $this->db->join('vendor_details', 'document_details.compid = vendor_details.id');
        $this->db->where(array('document_details.part_deed_status' => 0));
        $part_deed_all = $this->db->get();
        $part_deed_details = $part_deed_all->result();


        foreach ($part_deed_details as $row) {
             ?>


  <tr>
    <td><?php echo $row->firm_name; ?></td>
    <td><?php echo $row->vendor_name; ?></td>
    <td><?php
                     if (isset($row->part_deed)) {
                         echo $row->part_deed;
                        }

    ?></td>
  </tr>
<?php } ?>
  </table>
</div>

<div class="large-3 columns" style="background-color: white">
    <h4>MOA and AOA -  Waiting for Approval </h4>
 <table>
  <tr>
    <th>Name of Company</th>
    <th>Name of Vendor</th>
    <th>MOA and AOA Details</th>
  </tr>
<?php

        $this->db->select('*');
        $this->db->from('document_details');
        $this->db->join('vendor_details', 'document_details.compid = vendor_details.id');
        $this->db->where(array('document_details.moa_aoa_status' => 0));
        $moa_aoa_all = $this->db->get();
        $moa_aoa_details = $moa_aoa_all->result();


        foreach ($moa_aoa_details as $row) {
             ?>


  <tr>
    <td><?php echo $row->firm_name; ?></td>
    <td><?php echo $row->vendor_name; ?></td>
    <td><?php
                     if (isset($row->moa_aoa)) {
                         echo $row->moa_aoa;
                        }

    ?></td>
  </tr>
<?php } ?>
  </table>
</div>

<div class="large-3 columns" style="background-color: white">
    <h4>Certificate Of Incorporation -  Waiting for Approval </h4>
 <table>
  <tr>
    <th>Name of Company</th>
    <th>Name of Vendor</th>
    <th>Certificate Of Incorporation Details</th>
  </tr>
<?php

        $this->db->select('*');
        $this->db->from('document_details');
        $this->db->join('vendor_details', 'document_details.compid = vendor_details.id');
        $this->db->where(array('document_details.cert_of_incorp_status' => 0));
        $cert_of_incorp_all = $this->db->get();
        $cert_of_incorp_details = $cert_of_incorp_all->result();


        foreach ($cert_of_incorp_details as $row) {
             ?>


  <tr>
    <td><?php echo $row->firm_name; ?></td>
    <td><?php echo $row->vendor_name; ?></td>
    <td><?php
                     if (isset($row->cert_of_incorp)) {
                         echo $row->cert_of_incorp;
                        }

    ?></td>
  </tr>
<?php } ?>
  </table>
</div>