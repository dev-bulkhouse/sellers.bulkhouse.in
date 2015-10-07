<?php

        $doc_name_count = $this->vendor_model->countall_new($doc_name);
        ?>
        <div class="col-md-4">

            <!-- START WIDGET MESSAGES -->
            <div class="widget <?php
            if ($doc_name_count == 0) {
                echo "widget-default";
            } else {
                echo "widget-success";
            }
            ?> widget-item-icon" onclick="location.href = '/admin/details/<?php echo $doc_name; ?>';">
                <div class="widget-item-left">
                    <span class="fa fa-list-alt"></span>
                </div>
                <div class="widget-data">
                    <div class="widget-int num-count"><?php echo $doc_name_count; ?></div>
                    <div class="widget-title"><?php echo $doc_show_title; ?></div>
                    <div class="widget-subtitle">waiting for approval</div>
                </div>
                <div class="widget-controls">
                    <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
                </div>
            </div>
            <!-- END WIDGET MESSAGES -->

        </div>