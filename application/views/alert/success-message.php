<?php $message = $this->session->flashdata('success_message');
 if ($message != NULL) {?>
<div data-alert class="alert-box radius"><?php echo $message;?>
 <a href="#" class="close">&times;</a></div>
<?php }  else {

} ?>


<?php $message = $this->session->flashdata('error_message');
 if ($message != NULL) {?>
<div data-alert class="alert-box radius" style="background-color: gray"><?php echo $message;?>
 <a href="#" class="close">&times;</a></div>
<?php }  else {

} ?>

<?php $message = $this->session->flashdata('warning_message');
 if ($message != NULL) {?>
<div data-alert class="alert-box radius" style="background-color: #D1001F; border: none; color: white"><?php echo $message;?>
 <a href="#" class="close">&times;</a></div>
<?php }  else {

} ?>