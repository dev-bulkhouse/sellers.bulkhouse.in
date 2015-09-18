
<!--
<form action="/admin/login_admin" method="post" data-abide>
    <div class="row">
        <div class="large-9 columns large-centered" >
            <div class="row collapse">
                <div class="small-12 columns">
                    <input type="email" name="email" placeholder="Email Id" required="">
                </div>
                <div class="small-12 columns">
                    <input type="password" name="password" placeholder="Password" required="">
                </div>
                <div class="small-12 columns">
                    <input type="submit" id="log_in" value="Log-in" class="button postfix expand">
                </div>
            </div>
        </div>
    </div>
</form>-->

<form action="/admin/login_admin" class="form-horizontal" method="post">
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="text" name="email" class="form-control" placeholder="Email ID"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="password" name="password" class="form-control" placeholder="Password"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <a href="#" class="btn btn-link btn-block">Forgot your password?</a>
                        </div>
                        <div class="col-md-6">
                            <input type="submit" id="log_in" value="Log-in" class="btn btn-info btn-block">
                           
                        </div>
                    </div>
                    </form>