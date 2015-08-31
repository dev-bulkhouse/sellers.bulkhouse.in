<?php
if ($logged_in) {
    $compid = $this->session->userdata('id');
    $email = $this->session->userdata('email');
    $vendor_name = $this->session->userdata('vendor_name');
    $firm_name = $this->session->userdata('firm_name');
    $firm_type = $this->session->userdata('firm_type');
    $show['compid'] = $compid;
    $show['email'] = $email;
    $show['vendor_name'] = $vendor_name;
    $show['firm_name'] = $firm_name;
    $show['firm_type'] = $firm_type;
} else {

}
?>
<?php
$this->db->select('*');
$this->db->from('document_details');
$this->db->where(array('document_details.compid' => $compid));
$query = $this->db->get();
?>
   <!DOCTYPE html>
   <html lang="en">
       <head>
           <meta charset="utf-8">
           <title>Change Password | Sellers.Bulkhouse</title>
           <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav">
           <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
           <link rel="stylesheet" href="/css/app.v1.css">
           <link rel="stylesheet" href="/css/font.css" cache="false">
           <!--[if lt IE 9]>
           <script src="js/ie/respond.min.js" cache="false"></script>
           <script src="js/ie/html5.js" cache="false"></script>
           <script src="js/ie/fix.js" cache="false"></script>
           <![endif]-->
            <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
       <script type="text/javascript">
window.onload = function () {
	document.getElementById("npassword").onchange = validatePassword;
	document.getElementById("cpassword").onchange = validatePassword;
}
function validatePassword(){
var pass2=document.getElementById("cpassword").value;
var pass1=document.getElementById("npassword").value;
if(pass1!=pass2)
	document.getElementById("cpassword").setCustomValidity("Passwords Don't Match");
else
	document.getElementById("cpassword").setCustomValidity('');
//empty string means no validation error
}
</script>
<style>
            .bg-primary {
                background-color: #F1F1F1;
    color: black;
}
.bg-primary .nav li a {
    color: black;
}
        </style>
       </head>

       <body style="background-color: white">
           <?php $this->load->view('template/main_head',array('firm_name'=>$firm_name,'firm_type'=>$firm_type)); ?>


               <?php $this->load->view('alert/success-message'); ?>
           <section>
               <div class="row m-n animated fadeInDown">
                   <div class="col-md-12 col-lg-4 col-md-offset-4  m-t-lg">
                       <section class="panel">
                           <header class="panel-heading bg bg-primary text-center"> Change Password </header>
                           <form action="/user/change" method="POST" class="panel-body">
                               <div class="form-group">
                                   <label class="control-label">Old Password</label>
                                   <input type="password" name="opassword" placeholder="Old Password" class="form-control">
                               </div>
                               <div class="form-group">
                                   <label class="control-label">New Password</label>
                                   <input type="password" name="npassword" id="npassword" placeholder="New Password" class="form-control">
                               </div>
                               <div class="form-group">
                                   <label class="control-label">Confirm Password</label>
                                   <input type="password" name="cpassword" id="cpassword" placeholder="Confirm Password" class="form-control">
                               </div>

                               <button type="submit" class="btn btn-info">Change</button>
                               <div class="line line-dashed"></div>

                           </form>
                       </section>

                   </div>
               </div>
           </section>
<?php $this->load->view('template/main_footer'); ?>