<div class="md-modal md-effect-10" id="<?php echo  $id_modal; ?>">
    <div class="md-content">

        <?php if ($doc_title == "Partnership Deed Details" || $doc_title == "Shop establishment/Trade Licence" || $doc_title == "Certificate of Incorporation Details" || $doc_title == "Memorandum Of Association" || $doc_title == "Articles Of Association" || $doc_title == "Resident Address Proof" || $doc_title == "Buiseness Address Proof") { ?>

        <h3 style="font-size: 2em"><?php echo  $doc_title; ?>  <a style="cursor: default; color: white" class="md-close" aria-label="Close">&#215;</a></h3>
        <div>
            <form id="<?php echo $doc_id;?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="email" id="email" value="<?php echo  $email; ?>">
                <div class="form-group required">
                    <label for="<?php echo $doc_id;?>"><?php echo $doc_placeholder;?>:</label>
                    <input type="hidden" class="form-control" name="<?php echo $doc_id;?>" id="<?php echo $doc_id;?>">

                </div>
                <input type="hidden" name="email" id="email" value="<?php echo  $email; ?>">
                <div class="form-group m-t-lg">

                    <div class="col-lg-12 media m-t-none">

                        <div class="media-body">
                            <input type="file" name="<?php echo  $doc_file; ?>" title="Browse" class="btn btn-sm btn-info m-b-sm">

                        </div>
                        <span><?php echo  $doc_note; ?></span>
                    </div>
                    <hr>
                    <div class="col-lg-2">
                        <button class="btn btn-sm btn-default" type="submit">Submit</button>

                    </div>
                    <div class="col-lg-4">
                        <div id="<?php echo  $doc_spinner; ?>" style="display: none"><i class="fa fa-spinner fa-pulse"></i></div>
                        <div id="<?php echo  $doc_status; ?>"></div>

                    </div>
                </div>

            </form>

            <a class="md-close" aria-label="Close">.</a>
        </div>

      <?php  } else { ?>

        <h3 style="font-size: 2em"><?php echo  $doc_title; ?>  <a style="cursor: default; color: white" class="md-close" aria-label="Close">&#215;</a></h3>
        <div>
            <form id="<?php echo $doc_id;?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="email" id="email" value="<?php echo  $email; ?>">
                <div class="form-group required">
                    <label for="<?php echo $doc_id;?>"><?php echo $doc_placeholder;?>:</label>
                    <input type="text" <?php echo $doc_pat;?> class="form-control" name="<?php echo $doc_id;?>" id="<?php echo $doc_id;?>" placeholder="<?php echo $doc_placeholder;?>" required="required">

                </div>
                <input type="hidden" name="email" id="email" value="<?php echo  $email; ?>">
                <div class="form-group m-t-lg">

                    <div class="col-lg-12 media m-t-none">

                        <div class="media-body">
                            <input type="file" name="<?php echo  $doc_file; ?>" title="Browse" class="btn btn-sm btn-info m-b-sm">

                        </div>
                        <span><?php echo  $doc_note; ?></span>
                    </div>
                    <hr>
                    <div class="col-lg-2">
                        <button class="btn btn-sm btn-default" type="submit">Submit</button>

                    </div>
                    <div class="col-lg-4">
                        <div id="<?php echo  $doc_spinner; ?>" style="display: none"><i class="fa fa-spinner fa-pulse"></i></div>
                        <div id="<?php echo  $doc_status; ?>"></div>

                    </div>
                </div>

            </form>

            <a class="md-close" aria-label="Close">.</a>
        </div>
        <?php  } ?>
    </div>
</div>