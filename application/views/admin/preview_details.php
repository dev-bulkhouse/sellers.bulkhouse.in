<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Vendor Name:<b><?php echo $vendor_name; ?> <?php echo $last_name; ?></b></h4>
</div>
<div class="modal-body">
    <table class="table datatable">
        <thead>
            <tr>


                <th>Company Name</th>

                <th>Date of Submission</th>
                <th>Action</th>

            </tr>
        </thead>
        <tbody>
            <tr>


                <td><?php echo $company_name; ?></td>

                <td><?php echo $document_date; ?></td>
                <td><form style="float: left" method="post" action="/change/approve/<?php echo $compid . $button ?>"><button type="submit" class="btn btn-success active">Approve</button> </form><form style="float: right" method="post" action="/change/disapprove/<?php echo $compid . '/' . $button ?>"><button type="submit" class="btn btn-danger active">Disapprove</button></form></td>


            </tr>



        </tbody>
    </table>
    <hr>
    <?php if (isset($document)) { ?>
        <div class="col-md-6">

            <div class="panel panel-success push-up-20">
                <div class="panel-body panel-body-pricing">
                    <h3>
                        <th><?php echo $document_name ?></th>
                    <?php } else {

                    } ?><br/><small>
<?php if (isset($document)) { ?>
                            <td><?php echo $document; ?></td>
                        </small></h3>

                </div>

            </div>

        </div>
<?php } else {

} ?>
<?php if (isset($address1)) { ?>
        <div class="col-md-6">

            <div class="panel panel-success push-up-20">
                <div class="panel-body panel-body-pricing">
                    <h3>
                        <th><?php echo $address ?></th>
<?php } else {

} ?><br/><small>
<?php if (isset($address1)) { ?>
                            <td><?php echo $address1; ?><br><?php echo $address2; ?></td>
                        </small></h3>

                </div>

            </div>

        </div>
    <?php } else {

    } ?>

    <!--                                                                                            <div class="modal-body">
                                                                                                    <img src="<?php echo site_url(); ?>files/<?php echo $cert->compid; ?>/certification_of_incorporation.<?php echo $cert->cert_of_incorp_type; ?>" class="img-responsive">
                                                                                                </div>-->
<?php
$pan_prop_type = $type;

$filejpg = "http://sellers.bulkhouse.files.s3.amazonaws.com/" . $compid . $file_name . ".jpg";
$filejpg_a = "http://sellers.bulkhouse.files.s3.amazonaws.com/" . $compid . $file_name . ".JPG";
$filepdf = "http://sellers.bulkhouse.files.s3.amazonaws.com/" . $compid . $file_name . ".pdf";
$filepdf_a = "http://sellers.bulkhouse.files.s3.amazonaws.com/" . $compid . $file_name . ".PDF";
if ($pan_prop_type == $filejpg || $pan_prop_type == $filejpg_a) {
    ?>
        <div class="modal-body">
            <img src="<?php echo $pan_prop_type; ?>" class="img-responsive">
        </div>
<?php } elseif ($pan_prop_type == $filepdf || $pan_prop_type == $filepdf_a) { ?>
        <div class="modal-body">
            <iframe  width="100%" height="1000px" src="<?php echo $pan_prop_type; ?>" class="img-responsive" >
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