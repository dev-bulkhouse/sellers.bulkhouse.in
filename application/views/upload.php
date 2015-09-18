<!DOCTYPE html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Upload Document(s)</title>
    <link rel="stylesheet" href="css/foundation.css" />
    
    <script src="js/vendor/modernizr.js"></script>
        <script src="js/jquery-1.9.1.min.js"></script>
    </head>
    <body>
        
                    <!--<div id="moreImageUpload"></div>
                    <div style="clear:both;"></div>
                    <div id="moreImageUploadLink" style="display:none;margin-left: 10px;">
                        <a href="javascript:void(0);" id="attachMore">Attach another file</a>
                    </div>-->
<div class="large-12 columns zeropadding" style="background-color: #a30000">
    <div class="large-8 columns">
        <ul class="list-set">
            <li><i class="fa fa-home"></i> Home</li>
            <li><i class="fa fa-info-circle"></i> About Us</li>
            <li><i class="fa fa-book"></i> Documentation</li>
            <li><i class="fa fa-question-circle"></i> Support</li>
            <li><i class="fa fa-envelope"></i> Contact</li>
        </ul>
    </div>
    <div class="large-4 columns">
        <ul class="list-set">
            <li class="right">My Account  <i class="fa fa-cog"></i>

            </li>
            <li class="right"><span class="label">20</span>  Notifications <i class="fa fa-exclamation"></i></li>
        </ul>
    </div>
</div>
<div class="large-12 columns" style="padding-top: 10px">
    <div class="large-12 columns panel">
        <div class="large-6 columns zeropadding"><h5> Welcome to <b style="padding-bottom: 5px; border-bottom: 1px solid">Sri Sai Steel Manufacturing Pvt.Ltd</b></h5></div>
        <div class="large-6 columns zeropadding">
            <p style="text-align: right" class="text_little"><b>Account Status</b> : Pending Verification</p>

        </div>
    </div>
</div> 
<div class="row-fluid" data-equalizer="main" >
    <div class="large-5 columns main_panel_grid text_little " data-equalizer-watch="main" data-equalizer="inn">
        <div class="large-12 columns panel radius" data-equalizer-watch="inn" style="margin-top: 20px">
            <h5 style="border-bottom: 1px solid">Train Your Self</h5>
            <div class="large-12 columns">
                <div class="large-3 columns" >Documentation</div>
                <div class="large-1 columns"><i class="fa fa-caret-right"></i>  </div>
                 <div class="large-8 columns">Vendor Document Approval </div>
            </div>
            <div class="large-12 columns">
                <div class="large-3 columns" >Documentation</div>
                <div class="large-1 columns"><i class="fa fa-caret-right"></i>  </div>
                 <div class="large-8 columns">Vendor Document Approval </div>
            </div>
            <div class="large-12 columns">
                <div class="large-3 columns" >Documentation</div>
                <div class="large-1 columns"><i class="fa fa-caret-right"></i>  </div>
                 <div class="large-8 columns">Vendor Document Approval </div>
            </div>
            <div class="large-12 columns">
                <div class="large-3 columns" >Documentation</div>
                <div class="large-1 columns"><i class="fa fa-caret-right"></i>  </div>
                 <div class="large-8 columns">Vendor Document Approval </div>
            </div>
            <div class="large-12 columns">
                <div class="large-3 columns" >Documentation</div>
                <div class="large-1 columns"><i class="fa fa-caret-right"></i>  </div>
                 <div class="large-8 columns">Vendor Document Approval </div>
            </div>
            <div class="large-12 columns">
                <div class="large-3 columns" >Documentation</div>
                <div class="large-1 columns"><i class="fa fa-caret-right"></i>  </div>
                 <div class="large-8 columns">Vendor Document Approval </div>
            </div>
            <div class="large-12 columns">
                <div class="large-3 columns" >Documentation</div>
                <div class="large-1 columns"><i class="fa fa-caret-right"></i>  </div>
                 <div class="large-8 columns">Vendor Document Approval </div>
            </div>
        </div>
    </div>
    <div class="large-3 columns  main_panel_grid text_little" data-equalizer-watch="main" data-equalizer="inn">
        <div class="large-12 columns panel  radius" data-equalizer-watch="inn" style="margin-top: 20px">
            <h5 style="border-bottom: 1px solid">Important Info</h5>
            <img src="http://placehold.it/350x250">
            <p>this is text</p>
        </div>
    </div>
    
    <div class="large-4 columns main_panel_grid " data-equalizer-watch="main" data-equalizer="inn">
   
        <div class="large-12 columns panel   radius" data-equalizer-watch="inn" style="margin-top: 20px">
            <div class="message_box">
            <?php
            if (isset($success) && strlen($success)) {
                echo '<div class="success">';
                echo '<div data-alert class="alert-box success radius">'
  .$success.
'</div>';
                echo '</div>';
            }
 
            if (isset($errors) && strlen($errors)) {
                echo '<div class="error">';
               echo '<div data-alert class="alert-box alert round"">'
  .$errors.
'</div>';
                echo '</div>';
            }
 
            if (validation_errors()) {
                echo validation_errors('<div class="error">', '</div>');
            }
            ?>
        </div>
            <div>
            <?php
            echo form_open_multipart($this->uri->uri_string(), array('id' => 'upload-file-form'));
            ?>
            <h5 style="border-bottom: 1px solid"><i class="fa fa-newspaper-o"></i> Documents Information</h5>
            <label><b>Pan Number:</b><input type="text" name="pan" id="pan" placeholder="Pan Number"></label>
            <p class="text_little"><i class="step fi-upload size-14"></i><b>UPLOAD PAN CARD</b>:<input type="file" name="upload_file1" id="upload_file1" readonly="true"/></p>
            <label><b>Tin Number:</b><input type="text" name="tin" placeholder="Tin Number"></label>
            <p class="text_little"><i class="step fi-upload size-14"></i> <b>UPLOAD TIN PROOF</b>:<input type="file" name="upload_file3" id="upload_file3" readonly="true"/></p>
             <label><b>Tan Number:</b><input type="text" name="tan" placeholder="Tan Number"></label>
            <p class="text_little"><i class="step fi-upload size-14"></i> <b>UPLOAD TAN PROOF </b>: <input type="file" name="upload_file2" id="upload_file2" readonly="true"/></p>
           
            <div class="switch round small">
                No Tan ID <input id="exampleCheckboxSwitch" type="checkbox"  name="notan" value="1">
            <label for="exampleCheckboxSwitch"></label>
             </div> 
            </div>        
        </div>
        

</div>
    
     <div class="large-4 columns main_panel_grid " data-equalizer-watch="main" data-equalizer="inn">
   
        <div class="large-12 columns panel   radius" data-equalizer-watch="inn" style="margin-top: 20px">
            <div class="message_box">
                <h5 style="border-bottom: 1px solid"><i class="fa fa-newspaper-o"></i>Documents</h5>
            <p class="text_little"><i class="step fi-upload size-14"></i><b>UPLOAD ADDRES PROOF</b>:<input type="file" name="upload_file4" id="upload_file4" readonly="true"/></p>
            
            <p class="text_little"><i class="step fi-upload size-14"></i><b>UPLOAD ID PROOF</b>:<input type="file" name="upload_file5" id="upload_file5" readonly="true"/></p>
             <p><input type="submit" name="file_upload" value="Upload" class="small radius button"/></p>
             <?php
            echo form_close();
            ?>
             </div>
        </div>
            </div>
          <div class="large-3 small-3 columns">
    <label>CC me?</label>
  </div>
  <div class="large-3 small-3 columns end">
    <div class="switch tiny">
      <input id="x" name="switch-x" type="radio" checked>
      <label for="x" onclick="">No</label>
      <input id="x1" name="switch-x" type="radio">
      <label for="x1" onclick="">yes</label>
      <span></span>
    </div>
  </div>
                      
    </body>
</html>
  
<script src="js/vendor/jquery.js"></script>
<script src="js/foundation/foundation.js"></script>
<script src="js/foundation/foundation.equalizer.js"></script>
<script src="js/foundation/foundation.dropdown.js"></script>
<script>
    $(document).foundation({
        "magellan-expedition": {
            active_class: 'active', // specify the class used for active sections
            threshold: 0, // how many pixels until the magellan bar sticks, 0 = auto
            destination_threshold: 0, // pixels from the top of destination for it to be considered active
            throttle_delay: 50, // calculation throttling to increase framerate
            fixed_top: 0, // top distance in pixels assigend to the fixed element on scroll
            offset_by_height: true // whether to offset the destination by the expedition height. Usually you want this to be true, unless your expedition is on the side.
        }

    });

</script>
<script type="text/javascript">
    $(document).ready(function() {
        var upload_number = 2;
        $('#attachMore').click(function() {
            //add more file
            var moreUploadTag = '';
            moreUploadTag += '<div class="element"><label for="upload_file"' + upload_number + '>Upload File ' + upload_number + '</label>';
            moreUploadTag += '<input type="file" id="upload_file' + upload_number + '" name="upload_file' + upload_number + '"/>';
            moreUploadTag += '&nbsp;<a href="javascript:del_file(' + upload_number + ')" style="cursor:pointer;" onclick="return confirm(\"Are you really want to delete ?\")">Delete ' + upload_number + '</a></div>';
            $('<dl id="delete_file' + upload_number + '">' + moreUploadTag + '</dl>').fadeIn('slow').appendTo('#moreImageUpload');
            upload_number++;
        });
    });
</script>
<script type="text/javascript">
    function del_file(eleId) {
        var ele = document.getElementById("delete_file" + eleId);
        ele.parentNode.removeChild(ele);
    }
</script>

<!--<script type="text/javascript">
    $(document).ready(function() {
        $("input[id^='upload_file']").each(function() {
            var id = parseInt(this.id.replace("upload_file", ""));
            $("#upload_file" + id).change(function() {
                if ($("#upload_file" + id).val() !== "") {
                    $("#moreImageUploadLink").show();
                }
            });
        });
    });
</script>-->