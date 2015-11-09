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
<style type="text/css">
   
tr. {
        padding: 0.5em;
        background-color: #909090;
        background: -webkit-gradient(linear, left top, left bottom, from(#909090), to(#ababab));
        background: -moz-linear-gradient(top, #909090, #ababab);
        color: #efefef;
    }


  

    </style>
<table border='1'>
    
    <tr bgcolor="#199E7F" valign="middle">
        <th>Vendor Name</th>
        <th>Company Name</th>
        <th>Email</th>
        <th>Contact</th>
        <th>Register As</th>
        <th>Register Time</th>
        <th>Firm Type</th>
        <th>Pan Card</th>
        <th>Photo id</th>
       
        <th>VAT-CST</th>
        <th>Company Pan</th>
       
        <th>MOA</th>
       
        <th>Partnership Deed</th>
       
        <th>Canceled Cheque</th>
          <th>Bank Details</th>
        <th>Agent Name</th>
        <th>Agent ID</th>
       
    </tr>
     <tbody>
                                        <?php
                                        $this->db->select('*');
                                        $this->db->from('vendor_details');
                                        $this->db->where(array('vendor_details.activation' => 1));
                                        $this->db->join('document_details', 'document_details.compid = vendor_details.id');
                                        $this->db->join('bank_details', 'bank_details.compid = vendor_details.id', 'left');
                                        $this->db->join('leads', 'leads.vendor_email = vendor_details.email', 'left');
                                        $this->db->join('employee', 'employee.agent_id = leads.agent_id', 'left');



                                        $query = $this->db->get();
                                        $vendors = $query->result();
                                        ?>

                                        <?php foreach ($vendors as $vendor) { ?>


                                            <tr>
                                                <td>
                                                    <span class="fa fa-user"> <b><?php echo $vendor->vendor_name; ?> <?php echo $vendor->last_name; ?></b></span></td>
                                                   <td> <span class="fa fa-building-o"> <b><?php echo $vendor->firm_name; ?></b></span></td>
                                                  <td>  <span class="fa fa-envelope"> <?php echo $vendor->email; ?></span></td>
                                                  <td>  <span class="fa fa-phone"> <?php echo $vendor->mobile; ?></span></td>
                                                    <td> <span class="fa fa-registered"><b> <?php echo $vendor->reg_as; ?></b></span></td>


                                                <td><?php echo $vendor->registered_on; ?></td>
                                                <td><?php echo $vendor->firm_type; ?></td>

 <?php if ($vendor->firm_type == 'proprietorship') { ?>
                                                    <?php if ($vendor->pan_prop_status == 0) { ?>
                                                    <td class="info">WFA</td>
                                                <?php } elseif ($vendor->pan_prop_status == 2) { ?>
                                                    <td class="success">Approve</td>
                                                <?php } elseif ($vendor->pan_prop_status == 1) { ?>
                                                    <td class="danger">Reject</td>
                                                <?php } elseif ($vendor->pan_prop_status == 5) { ?>
                                                    <td class="warning">Due</td>
                                                
                                                        <?php
                                                    }
                                                } else {
                                                    ?>
                                                    <td>NA</td>
                                                <?php } ?>
                                                    
                                                    
                                              
                                                <?php if ($vendor->photoid_status == 0) { ?>
                                                    <td class="info">WFA</td>
                                                <?php } elseif ($vendor->photoid_status == 2) { ?>
                                                    <td class="success">Approve</td>
                                                <?php } elseif ($vendor->photoid_status == 1) { ?>
                                                    <td class="danger">Reject</td>
                                                <?php } elseif ($vendor->photoid_status == 5) { ?>
                                                    <td class="warning">Due</td>
                                                <?php } ?>



                                                <?php if ($vendor->vat_cst_status == 0) { ?>
                                                    <td class="info">WFA</td>
                                                <?php } elseif ($vendor->vat_cst_status == 2) { ?>
                                                    <td class="success">Approve</td>
                                                <?php } elseif ($vendor->vat_cst_status == 1) { ?>
                                                    <td class="danger">Reject</td>
                                                <?php } elseif ($vendor->vat_cst_status == 5) { ?>
                                                    <td class="warning">Due</td>
                                                <?php } ?>

                                                <?php if ($vendor->firm_type == 'proprietorship') { ?>
                                                    <td>NA</td>
                                                <?php } else { ?>
                                                    <?php if ($vendor->pan_comp_status == 0) { ?>
                                                        <td class="info">WFA</td>
                                                    <?php } elseif ($vendor->pan_comp_status == 2) { ?>
                                                        <td class="success">Approve</td>
                                                    <?php } elseif ($vendor->pan_comp_status == 1) { ?>
                                                        <td class="danger">Reject</td>
                                                    <?php } elseif ($vendor->pan_comp_status == 5) { ?>
                                                        <td class="warning">Due</td>
                                                        <?php
                                                    }
                                                }
                                                ?>






                                              




                                             

                                                <?php if ($vendor->firm_type == 'pvt_or_ltd') { ?>
                                                    <?php if ($vendor->moa_aoa_status == 0) { ?>
                                                        <td class="info">WFA</td>
                                                    <?php } elseif ($vendor->moa_aoa_status == 2) { ?>
                                                        <td class="success">Approve</td>
                                                    <?php } elseif ($vendor->moa_aoa_status == 1) { ?>
                                                        <td class="danger">Reject</td>
                                                    <?php } elseif ($vendor->moa_aoa_status == 5) { ?>
                                                        <td class="warning">Due</td>
                                                        <?php
                                                    }
                                                } else {
                                                    ?>
                                                    <td>NA</td>
                                                <?php } ?>

                                                

                                                <?php if ($vendor->firm_type == 'partnership') { ?>
                                                    <?php if ($vendor->part_deed_status == 0) { ?>
                                                        <td class="info">WFA</td>
                                                    <?php } elseif ($vendor->part_deed_status == 2) { ?>
                                                        <td class="success">Approve</td>
                                                    <?php } elseif ($vendor->part_deed_status == 1) { ?>
                                                        <td class="danger">Reject</td>
                                                    <?php } elseif ($vendor->part_deed_status == 5) { ?>
                                                        <td class="warning">Due</td>
                                                        <?php
                                                    }
                                                } else {
                                                    ?>
                                                    <td>NA</td>
                                                <?php } ?>

                                               

                                                <?php if ($vendor->canceled_check_status == 0) { ?>
                                                    <td class="info">WFA</td>
                                                <?php } elseif ($vendor->canceled_check_status == 2) { ?>
                                                    <td class="success">Approve</td>
                                                <?php } elseif ($vendor->canceled_check_status == 1) { ?>
                                                    <td class="danger">Reject</td>
                                                <?php } elseif ($vendor->canceled_check_status == 5) { ?>
                                                    <td class="warning">Due</td>
                                                <?php } ?>

                                                <?php if ($vendor->status == 4) { ?>
                                                    <td class="success">Approved</td>
                                                <?php } elseif ($vendor->status == 2) { ?>
                                                    <td class="info">Amount Credited</td>
                                                <?php } elseif ($vendor->status == 1){ ?>
                                                    <td class="success">On Process</td>
                                              <?php } elseif ($vendor->status == 0) { ?>
                                                    <td class="info">WFA</td>
                                              <?php } elseif ($vendor->status == 10) { ?>
                                                    <td class="warning">Due</td>
                                              <?php } elseif ($vendor->status == 3) { ?>
                                                    <td class="danger">Rejected</td>
                                              <?php } elseif ($vendor->status == 5) { ?>
                                                    <td class="danger">Wrong</td>
                                              <?php } ?>
                                                    
                                                <?php if ($vendor->agent_id == NULL) { ?>


                                                    <td class="active">
                                                        No Agent

                                                    </td>
                                                <?php } else { ?>
                                                    <td class="active"><?php echo $vendor->agent_name; ?></td>


                                                <?php } ?>

                                                      <td class="danger"><?php echo $vendor->agent_id; ?></td>
                                            </tr>


                                        <?php } ?>

                                    </tbody>
</table>
  