<?php
if (!ini_get('date.timezone')) {
  
    date_default_timezone_set('Asia/Kolkata');
}

// We change the headers of the page so that the browser will know what sort of file is dealing with. Also, we will tell the browser it has to treat the file as an attachment which cannot be cached.
header("Content-type: application/octet-stream");

header("Content-Disposition: attachment; filename=" . date('d_m_y_H_i_s') . "-Bank_Report.xls");
header("Pragma: no-cache");
header("Cache-control: private");
header("Expires: 0");

header("Cache-Control: no-cache");
header("Accept-Ranges: none");
?>


<table border='1'>


    <thead>
        <tr bgcolor="#199E7F" valign="middle">
            <th>Vendor Name</th>	
            <th>Vendor Email </th>	
            <th>Beneficary HolderName</th>	
            <th>Beneficary Bank Name</th>	
            <th>Account Type</th>	
            <th>Account No </th>	
            <th>IFSC Code</th>	
            <th>MICR Code</th>	
            <th>Amount Credited</th>	



        </tr>
    </thead>
    <tbody>
<?php
$this->db->select('*');
$this->db->from('bank_details');
$this->db->join('vendor_details', 'vendor_details.id = bank_details.compid');
$this->db->join('document_details', 'document_details.compid = bank_details.compid');
$this->db->where('vendor_details.firm_type', "proprietorship");
$this->db->where('bank_details.status', 1);
$this->db->group_by("bank_details.compid");
$query = $this->db->get();
$bank_data = $query->result();
?>
        <?php foreach ($bank_data as $bank_single) { ?>

            <tr>
                    <td><?php echo $bank_single->vendor_name; ?> <?php echo $bank_single->last_name; ?></td>
                    <td><?php echo $bank_single->email; ?></td>
                    <td><?php echo $bank_single->account_name; ?></td>
                    <td><?php echo $bank_single->bank_name; ?></td>
                    <td>Current</td>
                    <td><?php echo $bank_single->account_number; ?></td>
                    <td><?php echo $bank_single->ifsc; ?></td>
                    <td><?php echo $bank_single->micr; ?></td>

                    <td bgcolor="#FBEE53"><?php echo $bank_single->amount; ?></td>

            </tr>


        <?php } ?>

        <?php
        $this->db->select('*');
        $this->db->from('bank_details');
        $this->db->join('vendor_details', 'vendor_details.id = bank_details.compid');
        $this->db->join('document_details', 'document_details.compid = bank_details.compid');
        $this->db->where('vendor_details.firm_type', "partnership");
        $this->db->where('bank_details.status', 1);
        $this->db->group_by("bank_details.compid");
        $query2 = $this->db->get();
        $bank_data2 = $query2->result();
        ?>
        <?php foreach ($bank_data2 as $bank_single) { ?>

            <tr>
                <td><?php echo $bank_single->account_name; ?></td>
                <td><?php echo $bank_single->firm_name; ?></td>
                <td><?php echo $bank_single->account_number; ?></td>
                <td><?php echo $bank_single->bank_name; ?></td>
                <td><?php echo $bank_single->branch; ?></td>
                <td><?php echo $bank_single->ifsc; ?></td>
                <td><?php echo $bank_single->micr; ?></td>
                <td><?php echo $bank_single->date_of_submission; ?></td>
                <td bgcolor="#FBEE53"><?php echo $bank_single->amount; ?></td>

            </tr>


        <?php } ?>
        <?php
        $this->db->select('*');
        $this->db->from('bank_details');
        $this->db->join('vendor_details', 'vendor_details.id = bank_details.compid');
        $this->db->join('document_details', 'document_details.compid = bank_details.compid');
        $this->db->where('vendor_details.firm_type', "pvt_or_ltd");

        $this->db->where('bank_details.status', 1);
        $this->db->group_by("bank_details.compid");
        $query3 = $this->db->get();
        $bank_data3 = $query3->result();
        ?>
        <?php foreach ($bank_data3 as $bank_single) { ?>

            <tr>
                <td><?php echo $bank_single->account_name; ?></td>
                <td><?php echo $bank_single->firm_name; ?></td>
                <td><?php echo $bank_single->account_number; ?></td>
                <td><?php echo $bank_single->bank_name; ?></td>
                <td><?php echo $bank_single->branch; ?></td>
                <td><?php echo $bank_single->ifsc; ?></td>
                <td><?php echo $bank_single->micr; ?></td>
                <td><?php echo $bank_single->date_of_submission; ?></td>
                <td bgcolor="#FBEE53"><?php echo $bank_single->amount; ?></td>

            </tr>


<?php } ?>

    </tbody>
</table>




