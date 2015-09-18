
   <!DOCTYPE html>
   <html lang="en">
       <head>
           <meta charset="utf-8">
           <title>Reset Password | Sellers.Bulkhouse</title>
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
       </head>

       <body>
           <section id="content" class="m-t-lg wrapper-md animated fadeInDown">
               <?php $this->load->view('alert/success-message'); ?>
               <div class="row m-n">
                   <div class="col-md-4 col-md-offset-4 m-t-lg">
                       <section class="panel">
                           <header class="panel-heading bg bg-primary text-center"> Reset Password </header>
                           <form action="/login/update_password" method="POST" class="panel-body">
                               <?php if (isset($email_hash, $email_code)) { ?>
                         <input type="hidden" value="<?php echo $email_hash; ?>" name="email_hash" />
                         <input type="hidden" value="<?php echo $email_code; ?>" name="email_code" />
                         <input type="hidden" value="<?php echo $email; ?>" name="email" />
                         <?php } ?>
                               <div class="form-group">
                                   <label class="control-label">New Password</label>
                                   <input type="password" name="password" id="npassword" placeholder="New Password" class="form-control">
                               </div>
                               <div class="form-group">
                                   <label class="control-label">Confirm Password</label>
                                   <input type="password"  id="cpassword" placeholder="Conform Password" class="form-control">
                               </div>

                               <button type="submit" class="btn btn-info">Reset</button>
                               <div class="line line-dashed"></div>

                           </form>
                       </section>

                   </div>
               </div>
           </section>
           <!-- footer -->

           <!-- / footer -->
           <script src="/css/app.v1.js"></script>
           <!-- Bootstrap -->
           <!-- app -->
       </body>
   </html>
