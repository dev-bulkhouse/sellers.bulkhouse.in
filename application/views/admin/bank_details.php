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

    <li><a href="\verification">Dashboard</a></li>
    <li><a href="#">Bank</a></li>
    <li class="active">Bank Accounts</li>
</ul>
<!-- END BREADCRUMB -->

<!-- PAGE TITLE -->
<div class="page-title">
    <h2><span class="fa fa-arrow-circle-o-left"></span>
        Bank Accounts For Approvals
    </h2>
</div>
<!-- END PAGE TITLE -->

<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">

    <div class="row">
        <div class="col-md-12">

            <!-- START DEFAULT DATATABLE -->
            <div class="panel panel-default">

                <div class="panel-body">



                    <table class="table datatable table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Account Name</th>
                                <th>Company Name</th>
                                <th>Account Number</th>
                                <th>Bank Name</th>
                                <th>Branch</th>
                                <th>IFS-Code</th>
                                <th>MICR</th>
                                <th>Date of Submission</th>
                                <th>Canceled Cheque</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
<?php
$this->db->select('*');
$this->db->from('bank_details');
$this->db->join('vendor_details', 'vendor_details.id = bank_details.compid');
$this->db->join('document_details', 'document_details.compid = bank_details.compid');
$this->db->where('vendor_details.firm_type', "proprietorship");
$this->db->where('document_details.pan_prop_status', '2');
$this->db->where('document_details.vat_cst_status', '2');

$this->db->where('document_details.photoid_status', '2');

$this->db->group_by("bank_details.compid");
$query = $this->db->get();
$bank_data = $query->result();
?>
                            <?php foreach ($bank_data as $bank_single) { ?>

                                <tr>
                                    <td><?php echo $bank_single->account_name; ?></td>
                                    <td><?php echo $bank_single->firm_name; ?></td>
                                    <td><?php echo $bank_single->account_number; ?></td>
                                    <td><?php echo $bank_single->bank_name; ?></td>
                                    <td><?php echo $bank_single->branch; ?></td>
                                    <td><?php echo $bank_single->ifsc; ?></td>
                                    <td><?php echo $bank_single->micr; ?></td>
                                    <td><?php echo $bank_single->date_of_submission; ?></td>
                                    <td><button type="button" class="btn btn-info btn-rounded" data-toggle="modal" data-target="#canceled_check" data-whatever="<?php echo $bank_single->compid; ?>">View</button></td>
    <?php if ($bank_single->status == 0) { ?>
                                        <td><form style="float: left" method="post" action="/change/dispatch/<?php echo $bank_single->compid . '/' . $bank_single->account_number; ?>"><button type="submit" class="btn btn-primary">Dispatch</button> </form></td>
    <?php } elseif ($bank_single->status == 1) { ?>
                                        <td><button style="float: left"  class="btn btn-success">Dispatched</button></td>
                                 
                                         <?php } elseif ($bank_single->status == 3) { ?>
                                        <td><button style="float: left"  class="btn btn-success">Reject</button></td>
                                  <?php } elseif ($bank_single->status == 4) { ?>
                                        <td><button style="float: left"  class="btn btn-success">Approved</button></td>
                                    <?php } ?>
                                </tr>


                                <?php } ?>

<?php
$this->db->select('*');
$this->db->from('bank_details');
$this->db->join('vendor_details', 'vendor_details.id = bank_details.compid');
$this->db->join('document_details', 'document_details.compid = bank_details.compid');
$this->db->where('vendor_details.firm_type', "partnership");

$this->db->where('document_details.pan_comp_status', '2');
$this->db->where('document_details.vat_cst_status', '2');
$this->db->where('document_details.part_deed_status', '2');

$this->db->where('document_details.photoid_status', '2');

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
                                    <td><button type="button" class="btn btn-info btn-rounded" data-toggle="modal" data-target="#canceled_check" data-whatever="<?php echo $bank_single->compid; ?>">View</button></td>
    <?php if ($bank_single->status == 0) { ?>
                                        <td><form style="float: left" method="post" action="/change/dispatch/<?php echo $bank_single->compid . '/' . $bank_single->account_number; ?>"><button type="submit" class="btn btn-primary">Dispatch</button> </form></td>
    <?php } elseif ($bank_single->status == 1) { ?>
                                        <td><button style="float: left"  class="btn btn-success">Dispatched</button></td>
    <?php } ?>
                                </tr>


                                <?php } ?>
                                <?php
                                $this->db->select('*');
                                $this->db->from('bank_details');
                                $this->db->join('vendor_details', 'vendor_details.id = bank_details.compid');
                                $this->db->join('document_details', 'document_details.compid = bank_details.compid');
                                $this->db->where('vendor_details.firm_type', "pvt_or_ltd");
                                $this->db->where('document_details.pan_comp_status', '2');
                                $this->db->where('document_details.vat_cst_status', '2');
                                $this->db->where('document_details.moa_aoa_status', '2');
                              
                                $this->db->where('document_details.photoid_status', '2');
                              
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
                                    <td><button type="button" class="btn btn-info btn-rounded" data-toggle="modal" data-target="#canceled_check" data-whatever="<?php echo $bank_single->compid; ?>">View</button></td>
    <?php if ($bank_single->status == 0) { ?>
                                        <td><form style="float: left" method="post" action="/change/dispatch/<?php echo $bank_single->compid . '/' . $bank_single->account_number; ?>"><button type="submit" class="btn btn-primary">Dispatch</button> </form></td>
    <?php } elseif ($bank_single->status == 1) { ?>
                                        <td><button style="float: left"  class="btn btn-success">Dispatched</button></td>
    <?php } ?>
                                </tr>


                                <?php } ?>

                        </tbody>
                    </table>





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
<script type="text/javascript" src="/js/plugins/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="/js/plugins/jquery/jquery-ui.min.js"></script>
        <script type="text/javascript" src="/js/plugins/bootstrap/bootstrap.min.js"></script>                
        <!-- END PLUGINS -->

        <!-- THIS PAGE PLUGINS -->
        <script type='text/javascript' src='/js/plugins/icheck/icheck.min.js'></script>
        <script type="text/javascript" src="/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
        
        <script type="text/javascript" src="/js/plugins/bootstrap/bootstrap-datepicker.js"></script>
        <script type="text/javascript" src="/js/plugins/bootstrap/bootstrap-timepicker.min.js"></script>
        <script type="text/javascript" src="/js/plugins/bootstrap/bootstrap-colorpicker.js"></script>
        <script type="text/javascript" src="/js/plugins/datatables/jquery.dataTables.min.js"></script>
        
        <!-- END THIS PAGE PLUGINS -->       

        <!-- START TEMPLATE -->
        <script type="text/javascript" src="js/settings.js"></script>
        
        <script type="text/javascript" src="/js/plugins.js"></script>        
        <script type="text/javascript" src="/js/actions.js"></script>   
        <!-- END TEMPLATE -->
    <!-- END SCRIPTS -->
<script>
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
            error: function (err) {
                console.log(err);
            }
        });
    })
</script>
</body>
</html>






