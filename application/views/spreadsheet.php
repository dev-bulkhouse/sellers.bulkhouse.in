<?php
if( ! ini_get('date.timezone') )
{
   date_default_timezone_set('GMT');
}

// We change the headers of the page so that the browser will know what sort of file is dealing with. Also, we will tell the browser it has to treat the file as an attachment which cannot be cached.
header("Content-type: application/octet-stream");
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header("Content-Disposition: attachment; filename=".date('d_m_y_H_i_s')."-export_agent.xls");
header("Pragma: no-cache");
header("Expires: 0");

?>

<table border='1'>

    <tr bgcolor="#199E7F" valign="middle">
        <th>Vendor Name</th>
        <th>Company Name</th>
        <th>Email</th>
        <th>Contact</th>
        <th>Register Time</th>
        <th>Firm Type</th>
        <th>Pan Card</th>
        <th>Photo id</th>
        <th>Address Proof</th>
        <th>Buisness Proof</th>
        <th>VAT-CST</th>
        <th>Company Pan</th>
        <th>Shop Establishment or Trade</th>
        <th>COI</th>
        <th>MOA</th>
        <th>AOA</th>
        <th>Partnership Deed</th>
        <th>Company Profile</th>
        <th>Canceled Cheque</th>
        <th>Agent Name</th>
        <th>Agent ID</th>

    </tr>
    <tbody>
        <?php
        $this->db->select('*');
        $this->db->from('document_details');
        $this->db->join('vendor_details', 'vendor_details.id = document_details.compid');
        $this->db->join('leads', 'leads.vendor_email = vendor_details.email', 'left');
        $this->db->join('employee', 'employee.agent_id = leads.agent_id', 'left');


        $query = $this->db->get();
        $vendors = $query->result();
        ?>

        <?php foreach ($vendors as $vendor) { ?>


            <tr>
                <td><span class="fa fa-user"> &nbsp<b><?php echo $vendor->vendor_name; ?> <?php echo $vendor->last_name; ?></b></span></td>
                <td><span class="fa fa-building-o"> &nbsp<b><?php echo $vendor->firm_name; ?></b></span></td>
                <td><span class="fa fa-envelope"> <?php echo $vendor->email; ?></span></td>
                <td><span class="fa fa-phone"> <?php echo $vendor->mobile; ?></span></td>
                <td><?php echo $vendor->registered_on; ?></td>
                <td><?php echo $vendor->firm_type; ?></td>


                <?php if ($vendor->pan_prop_status == 0) { ?>
                   <td bgcolor="#35B7A5">WFA</td>
                <?php } elseif ($vendor->pan_prop_status == 2) { ?>
                    <td bgcolor="#00FF00">Approve</td>
                <?php } elseif ($vendor->pan_prop_status == 1) { ?>
                    <td bgcolor="#FF0000">Reject</td>
                <?php } elseif ($vendor->pan_prop_status == 5) { ?>
                     <td bgcolor="#FBEE53">Due</td>
                <?php } ?>
                <?php if ($vendor->photoid_status == 0) { ?>
                   <td bgcolor="#35B7A5">WFA</td>
                <?php } elseif ($vendor->photoid_status == 2) { ?>
                    <td bgcolor="#00FF00">Approve</td>
                <?php } elseif ($vendor->photoid_status == 1) { ?>
                    <td bgcolor="#FF0000">Reject</td>
                <?php } elseif ($vendor->photoid_status == 5) { ?>
                    <td bgcolor="#FBEE53">Due</td>
                <?php } ?>


                <?php if ($vendor->addressid_status == 0) { ?>
                   <td bgcolor="#35B7A5">WFA</td>
                <?php } elseif ($vendor->addressid_status == 2) { ?>
                    <td bgcolor="#00FF00">Approve</td>
                <?php } elseif ($vendor->addressid_status == 1) { ?>
                    <td bgcolor="#FF0000">Reject</td>
                <?php } elseif ($vendor->addressid_status == 5) { ?>
                     <td bgcolor="#FBEE53">Due</td>
                <?php } ?>


                <?php if ($vendor->businessid_status == 0) { ?>
                   <td bgcolor="#35B7A5">WFA</td>
                <?php } elseif ($vendor->businessid_status == 2) { ?>
                    <td bgcolor="#00FF00">Approve</td>
                <?php } elseif ($vendor->businessid_status == 1) { ?>
                    <td bgcolor="#FF0000">Reject</td>
                <?php } elseif ($vendor->businessid_status == 5) { ?>
                     <td bgcolor="#FBEE53">Due</td>
                <?php } ?>

                <?php if ($vendor->vat_cst_status == 0) { ?>
                   <td bgcolor="#35B7A5">WFA</td>
                <?php } elseif ($vendor->vat_cst_status == 2) { ?>
                    <td bgcolor="#00FF00">Approve</td>
                <?php } elseif ($vendor->vat_cst_status == 1) { ?>
                    <td bgcolor="#FF0000">Reject</td>
                <?php } elseif ($vendor->vat_cst_status == 5) { ?>
                     <td bgcolor="#FBEE53">Due</td>
                <?php } ?>

                <?php if ($vendor->firm_type == 'proprietorship') { ?>
                    <td>NA</td>
                <?php } else { ?>
                    <?php if ($vendor->pan_comp_status == 0) { ?>
                       <td bgcolor="#35B7A5">WFA</td>
                    <?php } elseif ($vendor->pan_comp_status == 2) { ?>
                        <td bgcolor="#00FF00">Approve</td>
                    <?php } elseif ($vendor->pan_comp_status == 1) { ?>
                        <td bgcolor="#FF0000">Reject</td>
                    <?php } elseif ($vendor->pan_comp_status == 5) { ?>
                         <td bgcolor="#FBEE53">Due</td>
                    <?php }
                }
                ?>






                <?php if ($vendor->firm_type == 'pvt_or_ltd') { ?>
                    <td>NA</td>
                <?php } else { ?>
                    <?php if ($vendor->shop_establish_trade_status == 0) { ?>
                       <td bgcolor="#35B7A5">WFA</td>
                    <?php } elseif ($vendor->shop_establish_trade_status == 2) { ?>
                        <td bgcolor="#00FF00">Approve</td>
                    <?php } elseif ($vendor->shop_establish_trade_status == 1) { ?>
                        <td bgcolor="#FF0000">Reject</td>
                    <?php } elseif ($vendor->shop_establish_trade_status == 5) { ?>
                         <td bgcolor="#FBEE53">Due</td>
                    <?php }
                }
                ?>




                <?php if ($vendor->firm_type == 'pvt_or_ltd') { ?>
                    <?php if ($vendor->cert_of_incorp_status == 0) { ?>
                       <td bgcolor="#35B7A5">WFA</td>
                    <?php } elseif ($vendor->cert_of_incorp_status == 2) { ?>
                        <td bgcolor="#00FF00">Approve</td>
                    <?php } elseif ($vendor->cert_of_incorp_status == 1) { ?>
                        <td bgcolor="#FF0000">Reject</td>
                    <?php } elseif ($vendor->cert_of_incorp_status == 5) { ?>
                         <td bgcolor="#FBEE53">Due</td>
                    <?php }
                } else {
                    ?>
                    <td>NA</td>
                <?php } ?>

                <?php if ($vendor->firm_type == 'pvt_or_ltd') { ?>
                    <?php if ($vendor->moa_aoa_status == 0) { ?>
                       <td bgcolor="#35B7A5">WFA</td>
                    <?php } elseif ($vendor->moa_aoa_status == 2) { ?>
                        <td bgcolor="#00FF00">Approve</td>
                    <?php } elseif ($vendor->moa_aoa_status == 1) { ?>
                        <td bgcolor="#FF0000">Reject</td>
                    <?php } elseif ($vendor->moa_aoa_status == 5) { ?>
                         <td bgcolor="#FBEE53">Due</td>
                    <?php }
                } else {
                    ?>
                    <td>NA</td>
                <?php } ?>

                <?php if ($vendor->firm_type == 'pvt_or_ltd') { ?>
                    <?php if ($vendor->aoa_status == 0) { ?>
                       <td bgcolor="#35B7A5">WFA</td>
                    <?php } elseif ($vendor->aoa_status == 2) { ?>
                        <td bgcolor="#00FF00">Approve</td>
                    <?php } elseif ($vendor->aoa_status == 1) { ?>
                        <td bgcolor="#FF0000">Reject</td>
                    <?php } elseif ($vendor->aoa_status == 5) { ?>
                         <td bgcolor="#FBEE53">Due</td>
                    <?php }
                } else {
                    ?>
                    <td>NA</td>
                <?php } ?>

                <?php if ($vendor->firm_type == 'partnership') { ?>
                    <?php if ($vendor->part_deed_status == 0) { ?>
                       <td bgcolor="#35B7A5">WFA</td>
                    <?php } elseif ($vendor->part_deed_status == 2) { ?>
                        <td bgcolor="#00FF00">Approve</td>
                    <?php } elseif ($vendor->part_deed_status == 1) { ?>
                        <td bgcolor="#FF0000">Reject</td>
                    <?php } elseif ($vendor->part_deed_status == 5) { ?>
                         <td bgcolor="#FBEE53">Due</td>
                    <?php }
                } else {
                    ?>
                    <td>NA</td>
                <?php } ?>

                <?php if ($vendor->comp_file_status == 0) { ?>
                   <td bgcolor="#35B7A5">WFA</td>
                <?php } elseif ($vendor->comp_file_status == 2) { ?>
                    <td bgcolor="#00FF00">Approve</td>
                <?php } elseif ($vendor->comp_file_status == 1) { ?>
                    <td bgcolor="#FF0000">Reject</td>
                <?php } elseif ($vendor->comp_file_status == 5) { ?>
                     <td bgcolor="#FBEE53">Due</td>
                <?php } ?>

                <?php if ($vendor->canceled_check_status == 0) { ?>
                   <td bgcolor="#35B7A5">WFA</td>
                <?php } elseif ($vendor->canceled_check_status == 2) { ?>
                    <td bgcolor="#00FF00">Approve</td>
                <?php } elseif ($vendor->canceled_check_status == 1) { ?>
                    <td bgcolor="#FF0000">Reject</td>
                <?php } elseif ($vendor->canceled_check_status == 5) { ?>
                     <td bgcolor="#FBEE53">Due</td>
                <?php } ?>

    <?php if ($vendor->agent_id != NULL) { ?>

                    <td><?php echo $vendor->agent_name; ?></td>
                    <td bgcolor="#EF7F7F"><?php echo $vendor->agent_id; ?></td>
    <?php } else { ?>
                    <td bgcolor="#9E1919">No Agent</td>
    <?php } ?>





            </tr>


<?php } ?>

    </tbody>
</table>
