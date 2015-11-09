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
    <h2><span ><a href="\verification" class="fa fa-arrow-circle-o-left"></a></span>
        <?php if ($doc_type == "pan_prop") { ?> Pan Card
        <?php } elseif ($doc_type == "vat_cst") { ?>
            VAT - CST
        <?php } elseif ($doc_type == "pan_comp") { ?>
            Company Pan-card
        <?php } elseif ($doc_type == "moa_aoa") { ?>
            MOA and AOA
       
      <?php } elseif ($doc_type == "photoid") { ?>
         PHOTO-ID
      
      <?php } elseif ($doc_type == "cenvat") { ?>
         CENVAT Proof
     
        <?php } elseif ($doc_type == "part_deed") { ?>
        New Partnership Deed

          <?php } elseif ($doc_type == "canceled_check") { ?>
     Canceled Check
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

                        <table class="table datatable table-hover">
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

                        <table class="table datatable table-hover">
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

<?php } elseif ($doc_type == "cenvat") { ?>

                      <table class="table datatable table-hover">
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

<?php } elseif (($doc_type == "pan_comp")) { ?>
                        <table class="table datatable table-hover">
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
                        <table class="table datatable table-hover">
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
                        <table class="table datatable table-hover">
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


<?php } elseif (($doc_type == "moa_aoa")) { ?>
                        <table class="table datatable table-hover">
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
                                        <td><button type="button" class="btn btn-info active" data-toggle="modal" data-target="#moa" data-whatever="<?php echo $moa->compid; ?>">View</button></td>
                                        <td><form style="float: left" method="post" action="/change/approve/<?php echo $moa->compid . '/moa_aoa' ?>"><button type="submit" class="btn btn-success active">Approve</button> </form><form style="float: right" method="post" action="/change/disapprove/<?php echo $moa->compid . '/moa_aoa' ?>"><button type="submit" class="btn btn-danger active">Disapprove</button></form></td>
                                    </tr>
    <?php } ?>


                            </tbody>
                        </table>



                        </div>

        
        <?php } elseif (($doc_type == "canceled_check")) { ?>
                        <table class="table datatable table-hover">
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
    $this->db->where(array('document_details.canceled_check_status' => 0));
    $query = $this->db->get();
    $canceled_checks = $query->result();
    ?>
    <?php foreach ($canceled_checks as $canceled_check) { ?>

                                    <tr>
                                        <td><?php echo $canceled_check->compid; ?></td>
                                        <td><?php echo $canceled_check->vendor_name; ?></td>
                                        <td><?php echo $canceled_check->firm_name; ?></td>
                                        <td><?php echo $canceled_check->comp_file_date; ?></td>
                                        <td><button type="button" class="btn btn-info active" data-toggle="modal" data-target="#canceled_check" data-whatever="<?php echo $canceled_check->compid; ?>">View</button></td>
                                        <td><form style="float: left" method="post" action="/change/approve/<?php echo $canceled_check->compid . '/canceled_check' ?>"><button type="submit" class="btn btn-success active">Approve</button> </form><form style="float: right" method="post" action="/change/disapprove/<?php echo $canceled_check->compid . '/canceled_check' ?>"><button type="submit" class="btn btn-danger active">Disapprove</button></form></td>
                                    </tr>
    <?php } ?>


                            </tbody>
                        </table>



                        </div>
<?php } ?>
    





                </div>
            </div>


        </div>
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
    $('#comp_file').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget); // Button that triggered the modal
          var recipient = button.data('whatever'); // Extract info from data-* attributes
          var modal = $(this);
          var dataString = 'id=' + recipient;

            $.ajax({
                type: "GET",
                url: "/admin/document_preview_profile/",
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
     $('#canceled_check').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget); // Button that triggered the modal
          var recipient = button.data('whatever'); // Extract info from data-* attributes
          var modal = $(this);
          var dataString = 'id=' + recipient;

            $.ajax({
                type: "GET",
                url: "/admin/document_preview_canceled_check/",
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






