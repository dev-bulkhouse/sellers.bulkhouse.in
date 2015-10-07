<div class="row-fluid">
    <div class="large-12 columns" style="margin-bottom: 50px">
        <div class="large-4 columns" style="position: absolute; top:100px;padding: 20px; z-index: 999;">
    <?php $this->load->view('alert/success-message'); ?>
</div>
    </div>

    <div class="large-12 columns" >
<form action="/user/login_user" method="post" data-abide>
    <div class="row">
        <div class="large-8 columns large-centered">
            <div class="row collapse">
                <div class="small-12 columns">
                    <input type="email" name="email" placeholder="Email Id" required="">
                </div>
                <div class="small-12 columns">
                    <input type="password" name="password" placeholder="Password" required="">
                </div>
                <div class="small-12 columns small-centered">
                    <input type="submit" id="log_in" value="Log-in" class="button expand postfix">
                </div>
            </div>
        </div>
    </div>
</form>
        </div>
</div>
