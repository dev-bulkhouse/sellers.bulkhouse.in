<div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Vendor Name:<b><?php echo $vendor_name; ?> <?php echo $last_name; ?></b></h4>
                                    </div>
                                    <div class="modal-body">
                                        <table class="table datatable">
                                            <thead>
                                                <tr>


                                                    <th>Company Name</th>
                                                    <?php if(isset($document)){ ?>
                                                    <th><?php echo $document_name ?></th>
                                                    <?php }else{} ?>
                                                    <th>Date of Submission</th>
                                                    <th>Action</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>


                                                    <td><?php echo $company_name; ?></td>
                                                      <?php if(isset($document)){ ?>
                                                    <td><?php echo $document; ?></td>
                                                      <?php }else{} ?>
                                                    <td><?php echo $document_date; ?></td>
                                                    <td><form style="float: left" method="post" action="/change/approve/<?php echo $compid .$button ?>"><button type="submit" class="btn btn-success active">Approve</button> </form><form style="float: right" method="post" action="/change/disapprove/<?php echo $compid . '/'.$button ?>"><button type="submit" class="btn btn-danger active">Disapprove</button></form></td>


                                                </tr>



                                            </tbody>
                                        </table>
                                        <hr>
                                        <!--                                                                                            <div class="modal-body">
                                                                                                                                        <img src="<?php echo site_url(); ?>files/<?php echo $cert->compid; ?>/certification_of_incorporation.<?php echo $cert->cert_of_incorp_type; ?>" class="img-responsive">
                                                                                                                                    </div>-->
    <?php
$pan_prop_type = $type;

$filejpg = "http://sellers.bulkhouse.files.s3.amazonaws.com/".$compid.$file_name.".jpg";
$filepdf = "http://sellers.bulkhouse.files.s3.amazonaws.com/".$compid.$file_name.".pdf";
if ($pan_prop_type == $filejpg){ ?>
              <div class="modal-body">
                           <img src="<?php echo $pan_prop_type; ?>" class="img-responsive">
                        </div>
<?php }elseif ($pan_prop_type == $filepdf){ ?>
 <div class="modal-body">
     <iframe  width="100%" height="1000px" src="<?php echo $pan_prop_type; ?>" class="img-responsive" >
                        </div>
	<?php }else {?>
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