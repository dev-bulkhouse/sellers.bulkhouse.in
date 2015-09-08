<?php
if ($logged_in) {
    $email = $this->session->userdata('email');
    $admin_type = $this->session->userdata('admin_type');
    $name = $this->session->userdata('name');
} else {

}
?>

<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="#">Home</a></li>
    <li><a href="\verification">Dashboard</a></li>


</ul>
<!-- END BREADCRUMB -->

<!-- PAGE TITLE -->
<div class="page-title">
    <h2><span class="fa fa-arrow-circle-o-left"></span>
        <?php if ($doc_type == "pan_prop") { ?> Pan-card
        <?php } elseif ($doc_type == "vat_cst") { ?>
            VAT CST
        <?php } elseif ($doc_type == "pan_comp") { ?>
            Company Pan-card
        <?php } elseif ($doc_type == "moa_aoa") { ?>
            MOA and AOA
        <?php } elseif ($doc_type == "cert_of_incorp") { ?>
            Certificate of Incorporation
        <?php } ?>
    </h2>
</div>
<!-- END PAGE TITLE -->

<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">

    <div class="row">
        <div class="col-md-12">

            <!-- START DEFAULT DATATABLE -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Verifying Vendor Documents </h3>
                    <ul class="panel-controls">
                        <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                        <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                        <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                    </ul>
                </div>
                <div class="panel-body">

                    <?php if ($doc_type == "pan_prop") { ?>

                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Company Name</th>
                                    <th>Pan Number</th>
                                    <th>Date of Submission</th>
                                    <th>Preview</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $this->db->select('*');
                                $this->db->from('document_details');
                                $this->db->join('vendor_details', 'vendor_details.id = document_details.compid');
                                $this->db->where(array('document_details.pan_prop_status' => 0));
                                $query = $this->db->get();
                                $pans_prop = $query->result();
                                ?>
                                <?php foreach ($pans_prop as $pan_prop) { ?>

                                    <tr>
                                        <td><?php echo $pan_prop->id; ?></td>
                                        <td><?php echo $pan_prop->vendor_name; ?></td>
                                        <td><?php echo $pan_prop->firm_name; ?></td>
                                        <td><?php echo $pan_prop->pan_prop; ?></td>
                                        <td><?php echo $pan_prop->pan_prop_date; ?></td>
                                        <td><a id='<?php echo $pan_prop->id; ?>' type="button" class="btn btn-info active" data-toggle="modal" data-target="#pan_prop" data-whatever="<?php echo $pan_prop->compid; ?>">View</a></td>
                                        <td><form style="float: left" method="post" action="/change/approve/<?php echo $pan_prop->compid . '/pan_prop' ?>"><button type="submit" class="btn btn-success active">Approve</button> </form>
                                            <form style="float: right" method="post" action="/change/disapprove/<?php echo $pan_prop->compid . '/pan_prop' ?>"><button type="submit" class="btn btn-danger active">Disapprove</button></form></td>
                                    </tr>
                                <?php } ?>


                            </tbody>
                        </table>


                        <!-- Modal -->



<?php } elseif ($doc_type == "vat_cst") { ?>

                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Company Name</th>
                                    <th>VAT - CST Number</th>
                                    <th>Date of Submission</th>
                                    <th>Preview</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $this->db->select('*');
                                $this->db->from('document_details');
                                $this->db->join('vendor_details', 'vendor_details.id = document_details.compid');
                                $this->db->where(array('document_details.vat_cst_status' => 0));
                                $query = $this->db->get();
                                $vats = $query->result();
                                ?>
    <?php foreach ($vats as $vat) { ?>

                                    <tr>
                                        <td><?php echo $vat->vendor_name; ?></td>
                                        <td><?php echo $vat->firm_name; ?></td>
                                        <td><?php echo $vat->vat_cst; ?></td>
                                        <td><?php echo $vat->vat_cst_date; ?></td>
                                        <td><button type="button" class="btn btn-info active" data-toggle="modal" data-target="#vat" data-whatever="<?php echo $vat->compid; ?>" >View</button></td>
                                       
                                        <td><form style="float: left" method="post" action="/change/approve/<?php echo $vat->compid . '/vat_cst' ?>"><button type="submit" class="btn btn-success active">Approve</button> </form><form style="float: right" method="post" action="/change/disapprove/<?php echo $vat->compid . '/vat_cst' ?>"><button type="submit" class="btn btn-danger active">Disapprove</button></form></td>
                                    </tr>
    <?php } ?>


                            </tbody>
                        </table>


                            </div>
                        </div>

<?php } elseif ($doc_type == "cst") { ?>

                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Company Name</th>
                                    <th>CST Number</th>
                                    <th>Date of Submission</th>
                                    <th>Preview</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $this->db->select('*');
                                $this->db->from('document_details');
                                $this->db->join('vendor_details', 'vendor_details.id = document_details.compid');
                                $this->db->where(array('document_details.cst_status' => 0));
                                $query = $this->db->get();
                                $csts = $query->result();
                                ?>
    <?php foreach ($csts as $cst) { ?>

                                    <tr>
                                        <td><?php echo $cst->vendor_name; ?></td>
                                        <td><?php echo $cst->firm_name; ?></td>
                                        <td><?php echo $cst->cst; ?></td>
                                        <td><?php echo $cst->cst_date; ?></td>
                                        <td><button type="button" class="btn btn-info active" data-toggle="modal" data-target="#cst" data-whatever="<?php echo $cst->compid; ?>">View</button></td>
                                        <td><form style="float: left" method="post" action="/change/approve/<?php echo $cst->compid . '/cst' ?>"><button type="submit" class="btn btn-success active">Approve</button> </form><form style="float: right" method="post" action="/change/disapprove/<?php echo $cst->compid . '/cst' ?>"><button type="submit" class="btn btn-danger active">Disapprove</button></form></td>
                                    </tr>
    <?php } ?>


                            </tbody>
                        </table>

                        
<?php } elseif ($doc_type == "aoa") { ?>

                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Company Name</th>
                                    <th>Date of Submission</th>
                                    <th>Preview</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $this->db->select('*');
                                $this->db->from('document_details');
                                $this->db->join('vendor_details', 'vendor_details.id = document_details.compid');
                                $this->db->where(array('document_details.aoa_status' => 0));
                                $query = $this->db->get();
                                $aoas = $query->result();
                                ?>
    <?php foreach ($aoas as $aoa) { ?>

                                    <tr>
                                        <td><?php echo $aoa->vendor_name; ?></td>
                                        <td><?php echo $aoa->firm_name; ?></td>
                                        <td><?php echo $aoa->aoa_date; ?></td>
                                        <td><button type="button" class="btn btn-info active" data-toggle="modal" data-target="#aoa" data-whatever="<?php echo $aoa->compid; ?>" >View</button></td>
                                        <td><form style="float: left" method="post" action="/change/approve/<?php echo $aoa->compid . '/aoa' ?>"><button type="submit" class="btn btn-success active">Approve</button> </form><form style="float: right" method="post" action="/change/disapprove/<?php echo $aoa->compid . '/aoa' ?>"><button type="submit" class="btn btn-danger active">Disapprove</button></form></td>
                                    </tr>
    <?php } ?>


                            </tbody>
                        </table>

                       
<?php } elseif ($doc_type == "shop_establish_trade") { ?>

                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Company Name</th>
                                    <th>Date of Submission</th>
                                    <th>Preview</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $this->db->select('*');
                                $this->db->from('document_details');
                                $this->db->join('vendor_details', 'vendor_details.id = document_details.compid');
                                $this->db->where(array('document_details.shop_establish_trade_status' => 0));
                                $query = $this->db->get();
                                $shop_establish_trades = $query->result();
                                ?>
    <?php foreach ($shop_establish_trades as $shop_establish_trade) { ?>

                                    <tr>
                                        <td><?php echo $shop_establish_trade->vendor_name; ?></td>
                                        <td><?php echo $shop_establish_trade->firm_name; ?></td>
                                        <td><?php echo $shop_establish_trade->shop_establish_trade_date; ?></td>
                                        <td><button type="button" class="btn btn-info active" data-toggle="modal" data-target="#shop_establish_trade" data-whatever="<?php echo $shop_establish_trade->compid; ?>" >View</button></td>
                                        <td><form style="float: left" method="post" action="/change/approve/<?php echo $shop_establish_trade->compid . '/shop_establish_trade' ?>"><button type="submit" class="btn btn-success active">Approve</button> </form><form style="float: right" method="post" action="/change/disapprove/<?php echo $shop_establish_trade->compid . '/shop_establish_trade' ?>"><button type="submit" class="btn btn-danger active">Disapprove</button></form></td>
                                    </tr>
    <?php } ?>


                            </tbody>
                        </table>

                        

<?php } elseif ($doc_type == "addressid") { ?>

                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Company Name</th>
                                    <th>Date of Submission</th>
                                    <th>Preview</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $this->db->select('*');
                                $this->db->from('document_details');
                                $this->db->join('vendor_details', 'vendor_details.id = document_details.compid');
                                $this->db->where(array('document_details.addressid_status' => 0));
                                $query = $this->db->get();
                                $addressids = $query->result();
                                ?>
    <?php foreach ($addressids as $addressid) { ?>

                                    <tr>
                                        <td><?php echo $addressid->vendor_name; ?></td>
                                        <td><?php echo $addressid->firm_name; ?></td>
                                        <td><?php echo $addressid->addressid_date; ?></td>
                                        <td><button type="button" class="btn btn-info active" data-toggle="modal" data-target="#addressid" data-whatever="<?php echo $addressid->compid; ?>" >View</button></td>
                                        <td><form style="float: left" method="post" action="/change/approve/<?php echo $addressid->compid . '/addressid' ?>"><button type="submit"  class="btn btn-success active">Approve</button> </form><form style="float: right" method="post" action="/change/disapprove/<?php echo $addressid->compid . '/addressid' ?>"><button type="submit"  class="btn btn-danger active">Disapprove</button></form></td>
                                    </tr>

    <?php } ?>

                            </tbody>
                        </table>

                       
<?php } elseif ($doc_type == "businessid") { ?>

                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Company Name</th>
                                    <th>Date of Submission</th>
                                    <th>Preview</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $this->db->select('*');
                                $this->db->from('document_details');
                                $this->db->join('vendor_details', 'vendor_details.id = document_details.compid');
                                $this->db->where(array('document_details.businessid_status' => 0));
                                $query = $this->db->get();
                                $businessids = $query->result();
                                ?>
    <?php foreach ($businessids as $businessid) { ?>

                                    <tr>
                                        <td><?php echo $businessid->vendor_name; ?></td>
                                        <td><?php echo $businessid->firm_name; ?></td>
                                        <td><?php echo $businessid->businessid_date; ?></td>
                                        <td><button type="button" class="btn btn-info active" data-toggle="modal" data-target="#businessid" data-whatever="<?php echo $businessid->compid; ?>">View</button></td>
                                        <td><form style="float: left" method="post" action="/change/approve/<?php echo $businessid->compid . '/businessid' ?>"><button type="submit" class="btn btn-success active">Approve</button> </form><form style="float: right" method="post" action="/change/disapprove/<?php echo $businessid->compid . '/businessid' ?>"><button type="submit" class="btn btn-danger active">Disapprove</button></form></td>
                                    </tr>
    <?php } ?>


                            </tbody>
                        </table>

                      
<?php } elseif ($doc_type == "cenvat") { ?>

                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Company Name</th>
                                    <th>Date of Submission</th>
                                    <th>Preview</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $this->db->select('*');
                                $this->db->from('document_details');
                                $this->db->join('vendor_details', 'vendor_details.id = document_details.compid');
                                $this->db->where(array('document_details.cenvat_status' => 0));
                                $query = $this->db->get();
                                $cenvats = $query->result();
                                ?>
    <?php foreach ($cenvats as $cenvat) { ?>

                                    <tr>
                                        <td><?php echo $cenvat->vendor_name; ?></td>
                                        <td><?php echo $cenvat->firm_name; ?></td>
                                        <td><?php echo $cenvat->cenvat_date; ?></td>
                                        <td><button type="button" class="btn btn-info active" data-toggle="modal" data-target="#cenvat" data-whatever="<?php echo $cenvat->compid; ?>">View</button></td>
                                        <td><form style="float: left" method="post" action="/change/approve/<?php echo $cenvat->compid . '/cenvat' ?>"><button type="submit" class="btn btn-success active">Approve</button> </form><form style="float: right" method="post" action="/change/disapprove/<?php echo $cenvat->compid . '/cenvat' ?>"><button type="submit" class="btn btn-danger active">Disapprove</button></form></td>
                                    </tr>
    <?php } ?>


                            </tbody>
                        </table>

                        

<?php } elseif ($doc_type == "servicetax") { ?>

                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Company Name</th>
                                    <th>Date of Submission</th>
                                    <th>Preview</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $this->db->select('*');
                                $this->db->from('document_details');
                                $this->db->join('vendor_details', 'vendor_details.id = document_details.compid');
                                $this->db->where(array('document_details.servicetax_status' => 0));
                                $query = $this->db->get();
                                $servicetaxs = $query->result();
                                ?>
                                <?php foreach ($servicetaxs as $servicetax) { ?>

                                    <tr>
                                        <td><?php echo $servicetax->vendor_name; ?></td>
                                        <td><?php echo $servicetax->firm_name; ?></td>
                                        <td><?php echo $servicetax->servicetax_date; ?></td>
                                        <td><button type="button" class="btn btn-info active" data-toggle="modal" data-target="#servicetax" data-whatever="<?php echo $servicetax->compid; ?>">View</button></td>
                                        <td><form style="float: left" method="post" action="/change/approve/<?php echo $servicetax->compid . '/servicetax' ?>"><button type="submit" class="btn btn-success active">Approve</button> </form><form style="float: right" method="post" action="/change/disapprove/<?php echo $servicetax->compid . '/servicetax' ?>"><button type="submit" class="btn btn-danger active">Disapprove</button></form></td>
                                    </tr>
    <?php } ?>


                            </tbody>
                        </table>

                       
<?php } elseif (($doc_type == "pan_comp")) { ?>
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Company Name</th>
                                    <th>Company PAN</th>
                                    <th>Date of Submission</th>
                                    <th>Preview</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
    <?php
    $this->db->select('*');
    $this->db->from('document_details');
    $this->db->join('vendor_details', 'vendor_details.id = document_details.compid');
    $this->db->where(array('document_details.pan_comp_status' => 0));
    $query = $this->db->get();
    $comps = $query->result();
    ?>
                                <?php foreach ($comps as $comp) { ?>

                                    <tr>
                                        <td><?php echo $comp->vendor_name; ?></td>
                                        <td><?php echo $comp->firm_name; ?></td>
                                        <td><?php echo $comp->pan_comp; ?></td>
                                        <td><?php echo $comp->pan_comp_date; ?></td>
                                        <td><button type="button" class="btn btn-info active" data-toggle="modal" data-target="#comp" data-whatever="<?php echo $comp->compid; ?>">View</button></td>
                                        <td><form style="float: left" method="post" action="/change/approve/<?php echo $comp->compid . '/pan_comp' ?>"><button type="submit" class="btn btn-success active">Approve</button> </form><form style="float: right" method="post" action="/change/disapprove/<?php echo $comp->compid . '/pan_comp' ?>"><button type="submit" class="btn btn-danger active">Disapprove</button></form></td>
                                    </tr>
    <?php } ?>


                            </tbody>
                        </table>

                     
<?php } elseif (($doc_type == "photoid")) { ?>
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Vendor Id number</th>
                                    <th>Date of Submission</th>
                                    <th>Preview</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
    <?php
    $this->db->select('*');
    $this->db->from('document_details');
    $this->db->join('vendor_details', 'vendor_details.id = document_details.compid');
    $this->db->where(array('document_details.photoid_status' => 0));
    $query = $this->db->get();
    $photoids = $query->result();
    ?>
    <?php foreach ($photoids as $photoid) { ?>

                                    <tr>
                                        <td><?php echo $photoid->vendor_name; ?></td>
                                        <td><?php echo $photoid->photoid; ?></td>
                                        <td><?php echo $photoid->photoid_date; ?></td>
                                        <td><button type="button" class="btn btn-info active" data-toggle="modal" data-target="#photoid" data-whatever="<?php echo $photoid->compid; ?>">View</button></td>
                                        <td><form style="float: left" method="post" action="/change/approve/<?php echo $photoid->compid . '/photoid' ?>"><button type="submit" class="btn btn-success active">Approve</button> </form><form style="float: right" method="post" action="/change/disapprove/<?php echo $photoid->compid . '/photoid' ?>"><button type="submit" class="btn btn-danger active">Disapprove</button></form></td>
                                    </tr>
    <?php } ?>


                            </tbody>
                        </table>

                      
<?php } elseif (($doc_type == "part_deed")) { ?>
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Company Name</th>
                                    <th>Partnership Deed</th>
                                    <th>Date of Submission</th>
                                    <th>Preview</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
    <?php
    $this->db->select('*');
    $this->db->from('document_details');
    $this->db->join('vendor_details', 'vendor_details.id = document_details.compid');
    $this->db->where(array('document_details.part_deed_status' => 0));
    $query = $this->db->get();
    $deeds = $query->result();
    ?>
    <?php foreach ($deeds as $deep) { ?>

                                    <tr>
                                        <td><?php echo $deep->vendor_name; ?></td>
                                        <td><?php echo $deep->firm_name; ?></td>
                                        <td><?php echo $deep->part_deed; ?></td>
                                        <td><?php echo $deep->part_deed_date; ?></td>
                                        <td><button type="button" class="btn btn-info active" data-toggle="modal" data-target="#deep" data-whatever="<?php echo $deep->compid; ?>">View</button></td>
                                        <td><form style="float: left" method="post" action="/change/approve/<?php echo $deep->compid . '/part_deed' ?>"><button type="submit" class="btn btn-success active">Approve</button> </form><form style="float: right" method="post" action="/change/disapprove/<?php echo $deep->compid . '/part_deed' ?>"><button type="submit" class="btn btn-danger active">Disapprove</button></form></td>
                                    </tr>
    <?php } ?>


                            </tbody>
                        </table>

                       

                            <?php } elseif (($doc_type == "sign")) { ?>
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Company Name</th>
                                    <th>Authorised Signatory</th>
                                    <th>Date of Submission</th>
                                    <th>Preview</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
    <?php
    $this->db->select('*');
    $this->db->from('document_details');
    $this->db->join('vendor_details', 'vendor_details.id = document_details.compid');
    $this->db->where(array('document_details.sign_status' => 0));
    $query = $this->db->get();
    $signs = $query->result();
    ?>
    <?php foreach ($signs as $sign) { ?>

                                    <tr>
                                        <td><?php echo $sign->vendor_name; ?></td>
                                        <td><?php echo $sign->firm_name; ?></td>
                                        <td><?php echo $sign->sign; ?></td>
                                        <td><?php echo $sign->sign_date; ?></td>
                                        <td><button type="button" class="btn btn-info active" data-toggle="modal" data-target="#sign" data-whatever="<?php echo $sign->compid; ?>">View</button></td>
                                        <td><form style="float: left" method="post" action="/change/approve/<?php echo $sign->compid . '/sign' ?>"><button type="submit" class="btn btn-success active">Approve</button> </form><form style="float: right" method="post" action="/change/disapprove/<?php echo $sign->compid . '/sign' ?>"><button type="submit" class="btn btn-danger active">Disapprove</button></form></td>
                                    </tr>
    <?php } ?>


                            </tbody>
                        </table>

                     
                            <?php } elseif (($doc_type == "cert_of_incorp")) { ?>
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Company Name</th>
                                    <th>Certificate Of Incorporation</th>
                                    <th>Date of Submission</th>
                                    <th>Preview</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
    <?php
    $this->db->select('*');
    $this->db->from('document_details');
    $this->db->join('vendor_details', 'vendor_details.id = document_details.compid');
    $this->db->where(array('document_details.cert_of_incorp_status' => 0));
    $query = $this->db->get();
    $certs = $query->result();
    ?>
    <?php foreach ($certs as $cert) { ?>

                                    <tr>
                                        <td><?php echo $cert->vendor_name; ?></td>
                                        <td><?php echo $cert->firm_name; ?></td>
                                        <td><?php echo $cert->cert_of_incorp; ?></td>
                                        <td><?php echo $cert->cert_of_incorp_date; ?></td>
                                        <td><button type="button" class="btn btn-info active" data-toggle="modal" data-target="#cert" data-whatever="<?php echo $cert->compid; ?>">View</button></td>
                                        <td><form style="float: left" method="post" action="/change/approve/<?php echo $cert->compid . '/cert_of_incorp' ?>"><button type="submit" class="btn btn-success active">Approve</button> </form><form style="float: right" method="post" action="/change/disapprove/<?php echo $cert->compid . '/cert_of_incorp' ?>"><button type="submit" class="btn btn-danger active">Disapprove</button></form></td>
                                    </tr>
    <?php } ?>


                            </tbody>
                        </table>

                       

                            <?php } elseif (($doc_type == "moa_aoa")) { ?>
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Company Name</th>
                                    <th>MOA and AOA</th>
                                    <th>Date of Submission</th>
                                    <th>Preview</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
    <?php
    $this->db->select('*');
    $this->db->from('document_details');
    $this->db->join('vendor_details', 'vendor_details.id = document_details.compid');
    $this->db->where(array('document_details.moa_aoa_status' => 0));
    $query = $this->db->get();
    $moas = $query->result();
    ?>
    <?php foreach ($moas as $moa) { ?>

                                    <tr>
                                        <td><?php echo $moa->vendor_name; ?></td>
                                        <td><?php echo $moa->firm_name; ?></td>
                                        <td><?php echo $moa->moa_aoa; ?></td>
                                        <td><?php echo $moa->moa_aoa_date; ?></td>
                                        <td><button type="button" class="btn btn-info active" data-toggle="modal" data-target="#moa" data-whatever="<?php echo $moa->compid; ?>">View</button><a target="_blank" href="<?php echo site_url(); ?>files/<?php echo $moa->compid; ?>/MOA.<?php echo $moa->moa_aoa_type; ?>">view</a></td>
                                        <td><form style="float: left" method="post" action="/change/approve/<?php echo $moa->compid . '/moa_aoa' ?>"><button type="submit" class="btn btn-success active">Approve</button> </form><form style="float: right" method="post" action="/change/disapprove/<?php echo $moa->compid . '/moa_aoa' ?>"><button type="submit" class="btn btn-danger active">Disapprove</button></form></td>
                                    </tr>
    <?php } ?>


                            </tbody>
                        </table>


                        <div id="moa" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Vendor Name:<b> <td><?php echo $moa->vendor_name; ?> <?php echo $moa->last_name; ?></b></h4>
                                    </div>
                                    <div class="modal-body">
                                        <table class="table datatable">
                                            <thead>
                                                <tr>


                                                    <th>Company Name</th>
                                                    <th>MOA and AOA</th>
                                                    <th>Date of Submission</th>
                                                    <th>Action</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>


                                                    <td><?php echo $moa->firm_name; ?></td>
                                                    <td><?php echo $moa->moa_aoa; ?></td>
                                                    <td><?php echo $moa->moa_aoa_date; ?></td>
                                                    <td><form style="float: left" method="post" action="/change/approve/<?php echo $moa->compid . '/moa_aoa' ?>"><button type="submit" class="btn btn-success active">Approve</button> </form><form style="float: right" method="post" action="/change/disapprove/<?php echo $moa->compid . '/moa_aoa' ?>"><button type="submit" class="btn btn-danger active">Disapprove</button></form></td>


                                                </tr>



                                            </tbody>
                                        </table>
                                        <hr>
                                        <!--                                                                                        <div class="modal-body">
                                                                                                                                    <img src="<?php echo site_url(); ?>files/<?php echo $moa->compid; ?>/MOA.<?php echo $moa->moa_aoa_type; ?>" class="img-responsive">
                                                                                                                                </div>-->
    <?php
    $filejpg = "http://sellers.bulkhouse.files.s3.amazonaws.com/" . $moa->compid . "_pan_card.jpg";
    $filepdf = "http://sellers.bulkhouse.files.s3.amazonaws.com/" . $moa->compid . "_pan_card.pdf";

    if ($moa_type == $filejpg) {
        ?>
                                            <div class="modal-body">
                                                <img src="http://sellers.bulkhouse.files.s3.amazonaws.com/<?php echo $moa->compid; ?>_pan_card.jpg" class="img-responsive">
                                            </div>
                                        <?php } elseif ($moa_type == $filepdf) { ?>
                                            <div class="modal-body">
                                                <iframe  width="100%" height="1000px" src="http://sellers.bulkhouse.files.s3.amazonaws.com/<?php echo $moa->compid; ?>_pan_card.pdf" class="img-responsive" >
                                            </div>
    <?php } else { ?>
                                            <div class="alert alert-warning" role="alert">
                                                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                                <strong>Warning!</strong>  The vendor didn't Upload preferred document.
                                            </div>
                                            <div class="modal-body">

                                                <div class="text-center">
                                                    <img src="http://aniconslibrary.com/wp-content/uploads/2014/07/Anicons-PaperFile.gif" class="login" height="200">
                                                </div>
                                            </div>
    <?php } ?>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>

                            </div>
                        </div>
<?php } ?>





                </div>
            </div>


        </div>
    </div>

</div>
<!-- PAGE CONTENT WRAPPER -->
</div>
<!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->

<!-- MESSAGE BOX-->
<div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
    <div class="mb-container">
        <div class="mb-middle">
            <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
            <div class="mb-content">
                <p>Are you sure you want to log out?</p>
                <p>Press No if youwant to continue work. Press Yes to logout current user.</p>
            </div>
            <div class="mb-footer">
                <div class="pull-right">
                    <a href="<?php echo site_url(); ?>admin/logout" class="btn btn-success btn-lg">Yes</a>
                    <button class="btn btn-default btn-lg mb-control-close">No</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END MESSAGE BOX-->

<!-- START PRELOADS -->
<audio id="audio-alert" src="audio/alert.mp3" preload="auto"></audio>
<audio id="audio-fail" src="audio/fail.mp3" preload="auto"></audio>
<!-- END PRELOADS -->

<!-- START SCRIPTS -->
<!-- START PLUGINS -->
<script type="text/javascript" src="js/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript" src="js/plugins/jquery/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/plugins/bootstrap/bootstrap.min.js"></script>
<!-- END PLUGINS -->

<!-- THIS PAGE PLUGINS -->
<script type='text/javascript' src='js/plugins/icheck/icheck.min.js'></script>
<script type="text/javascript" src="js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>

<script type="text/javascript" src="js/plugins/datatables/jquery.dataTables.min.js"></script>
<!-- END PAGE PLUGINS -->

<!-- START TEMPLATE -->
<script type="text/javascript" src="js/settings.js"></script>

<script type="text/javascript" src="js/plugins.js"></script>
<script type="text/javascript" src="js/actions.js"></script>
<!-- END TEMPLATE -->
<!-- END SCRIPTS -->
<script>
    $('#pan_prop').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget); // Button that triggered the modal
          var recipient = button.data('whatever'); // Extract info from data-* attributes
          var modal = $(this);
          var dataString = 'id=' + recipient;

            $.ajax({
                type: "GET",
                url: "/admin/document_preview_pan/",
                data: dataString,
                cache: false,
                success: function (data) {
                    console.log(data);
                    modal.find('.ct').html(data);
                },
                error: function(err) {
                    console.log(err);
                }
            });
    })
     $('#vat').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget); // Button that triggered the modal
          var recipient = button.data('whatever'); // Extract info from data-* attributes
          var modal = $(this);
          var dataString = 'id=' + recipient;

            $.ajax({
                type: "GET",
                url: "/admin/document_preview_vat/",
                data: dataString,
                cache: false,
                success: function (data) {
                    console.log(data);
                    modal.find('.ct').html(data);
                },
                error: function(err) {
                    console.log(err);
                }
            });
    })
    
    $('#cst').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget); // Button that triggered the modal
          var recipient = button.data('whatever'); // Extract info from data-* attributes
          var modal = $(this);
          var dataString = 'id=' + recipient;

            $.ajax({
                type: "GET",
                url: "/admin/document_preview_cst/",
                data: dataString,
                cache: false,
                success: function (data) {
                    console.log(data);
                    modal.find('.ct').html(data);
                },
                error: function(err) {
                    console.log(err);
                }
            });
    })
    
    $('#aoa').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget); // Button that triggered the modal
          var recipient = button.data('whatever'); // Extract info from data-* attributes
          var modal = $(this);
          var dataString = 'id=' + recipient;

            $.ajax({
                type: "GET",
                url: "/admin/document_preview_aoa/",
                data: dataString,
                cache: false,
                success: function (data) {
                    console.log(data);
                    modal.find('.ct').html(data);
                },
                error: function(err) {
                    console.log(err);
                }
            });
    })
    
    $('#shop_establish_trade').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget); // Button that triggered the modal
          var recipient = button.data('whatever'); // Extract info from data-* attributes
          var modal = $(this);
          var dataString = 'id=' + recipient;

            $.ajax({
                type: "GET",
                url: "/admin/document_preview_shop_establish_trade/",
                data: dataString,
                cache: false,
                success: function (data) {
                    console.log(data);
                    modal.find('.ct').html(data);
                },
                error: function(err) {
                    console.log(err);
                }
            });
    })
    
    $('#addressid').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget); // Button that triggered the modal
          var recipient = button.data('whatever'); // Extract info from data-* attributes
          var modal = $(this);
          var dataString = 'id=' + recipient;

            $.ajax({
                type: "GET",
                url: "/admin/document_preview_addressid/",
                data: dataString,
                cache: false,
                success: function (data) {
                    console.log(data);
                    modal.find('.ct').html(data);
                },
                error: function(err) {
                    console.log(err);
                }
            });
    })
    $('#businessid').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget); // Button that triggered the modal
          var recipient = button.data('whatever'); // Extract info from data-* attributes
          var modal = $(this);
          var dataString = 'id=' + recipient;

            $.ajax({
                type: "GET",
                url: "/admin/document_preview_businessid/",
                data: dataString,
                cache: false,
                success: function (data) {
                    console.log(data);
                    modal.find('.ct').html(data);
                },
                error: function(err) {
                    console.log(err);
                }
            });
    })
    $('#cenvat').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget); // Button that triggered the modal
          var recipient = button.data('whatever'); // Extract info from data-* attributes
          var modal = $(this);
          var dataString = 'id=' + recipient;

            $.ajax({
                type: "GET",
                url: "/admin/document_preview_cenvat/",
                data: dataString,
                cache: false,
                success: function (data) {
                    console.log(data);
                    modal.find('.ct').html(data);
                },
                error: function(err) {
                    console.log(err);
                }
            });
    })
    $('#servicetax').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget); // Button that triggered the modal
          var recipient = button.data('whatever'); // Extract info from data-* attributes
          var modal = $(this);
          var dataString = 'id=' + recipient;

            $.ajax({
                type: "GET",
                url: "/admin/document_preview_servicetax/",
                data: dataString,
                cache: false,
                success: function (data) {
                    console.log(data);
                    modal.find('.ct').html(data);
                },
                error: function(err) {
                    console.log(err);
                }
            });
    })
    $('#comp').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget); // Button that triggered the modal
          var recipient = button.data('whatever'); // Extract info from data-* attributes
          var modal = $(this);
          var dataString = 'id=' + recipient;

            $.ajax({
                type: "GET",
                url: "/admin/document_preview_pan_comp/",
                data: dataString,
                cache: false,
                success: function (data) {
                    console.log(data);
                    modal.find('.ct').html(data);
                },
                error: function(err) {
                    console.log(err);
                }
            });
    })
     $('#photoid').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget); // Button that triggered the modal
          var recipient = button.data('whatever'); // Extract info from data-* attributes
          var modal = $(this);
          var dataString = 'id=' + recipient;

            $.ajax({
                type: "GET",
                url: "/admin/document_preview_photoid/",
                data: dataString,
                cache: false,
                success: function (data) {
                    console.log(data);
                    modal.find('.ct').html(data);
                },
                error: function(err) {
                    console.log(err);
                }
            });
    })
     $('#deep').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget); // Button that triggered the modal
          var recipient = button.data('whatever'); // Extract info from data-* attributes
          var modal = $(this);
          var dataString = 'id=' + recipient;

            $.ajax({
                type: "GET",
                url: "/admin/document_preview_part_deed/",
                data: dataString,
                cache: false,
                success: function (data) {
                    console.log(data);
                    modal.find('.ct').html(data);
                },
                error: function(err) {
                    console.log(err);
                }
            });
    })
     $('#sign').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget); // Button that triggered the modal
          var recipient = button.data('whatever'); // Extract info from data-* attributes
          var modal = $(this);
          var dataString = 'id=' + recipient;

            $.ajax({
                type: "GET",
                url: "/admin/document_preview_sign/",
                data: dataString,
                cache: false,
                success: function (data) {
                    console.log(data);
                    modal.find('.ct').html(data);
                },
                error: function(err) {
                    console.log(err);
                }
            });
    })
     $('#moa').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget); // Button that triggered the modal
          var recipient = button.data('whatever'); // Extract info from data-* attributes
          var modal = $(this);
          var dataString = 'id=' + recipient;

            $.ajax({
                type: "GET",
                url: "/admin/document_preview_moa_aoa/",
                data: dataString,
                cache: false,
                success: function (data) {
                    console.log(data);
                    modal.find('.ct').html(data);
                },
                error: function(err) {
                    console.log(err);
                }
            });
    })
     $('#cert').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget); // Button that triggered the modal
          var recipient = button.data('whatever'); // Extract info from data-* attributes
          var modal = $(this);
          var dataString = 'id=' + recipient;

            $.ajax({
                type: "GET",
                url: "/admin/document_preview_cert_of_incorp/",
                data: dataString,
                cache: false,
                success: function (data) {
                    console.log(data);
                    modal.find('.ct').html(data);
                },
                error: function(err) {
                    console.log(err);
                }
            });
    })
    </script>
</body>
</html>






