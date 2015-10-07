<div class="large-12 columns" style="padding-top: 50px; min-height: 500px; ">

    <div class="large-8 columns large-centered" style="border-bottom: 3px solid black; margin-bottom: 50px;">
    <h3 style="text-align: center">Admin panel</h3>
    <?php $this->load->view('alert/success-message'); ?>
    <p style="text-align: center" class="text_little">Authorised only to Approve Documents Uploaded by Vendors</p>
    </div>
<?php
$this->load->view('admin/forms/login_form');
?>
</div>
