<html>
<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<meta name="description" content="Nifty Modal Window Effects with CSS Transitions and Animations" />
		<meta name="keywords" content="modal, window, overlay, modern, box, css transition, css animation, effect, 3d, perspective" />
		<meta name="author" content="Codrops" />
			<link rel="stylesheet" type="text/css" href="/css/component.css" />
		<script src="/js/modernizr.custom.js"></script>
	</head>
</body>
       <div class="form-group required">
                                                      
                                             
                                                       <div class="form-group required">
<form action="/user/login_user" method="post" data-abide>
    <div class="row">
        <div class="large-12 columns">
            <div class="row collapse">
                <div class="small-5 columns">
                    <input type="email" name="email" placeholder="Email Id" required="">
                </div>
                <div class="small-5 columns">
                    <input type="password" name="password" placeholder="Password" required="">
                </div>
                <div class="small-2 columns">
                    <input type="submit" id="log_in" value="Log-in" class="button postfix">
                    <input type="button"class="md-trigger md-setperspective" data-modal="modal-13" value="Sign UP!">

                </div>
            </div>
        </div>
    </div>
     </div>
</form>

<div class="md-modal md-effect-13" id="modal-13">
			<div class="md-content">
				<h3>Vendor Registration <a class="md-close">&#215;</a></h3>
				<div>
					<form action="/register/register_user" method="post" data-abide>
    <div class="row" style="padding-top: 20px">
        <div class="row">
            <div class="small-9 columns small-centered zeropadding">
                <div class="row">
            <div class="small-6 columns  zeropadding">
                <div class="row">
                    <label>Firm Type <small>required</small>
                        <select name="firm_type">
                            <option value="">Select</option>
                            <option value="proprietorship">Proprietorship</option>
                            <option value="partnership">Partnership</option>
                            <option value="pvt_or_ltd">Private Limited Company / Limited Company</option>
                        </select>
                    </label>
                </div>
            </div>

            <div class="small-6 columns  zeropadding">
                <div class="row">
                    <label> Register As
                    <select name="reg_as">
                        <option value="">Select</option>
                        <option value="Export">Export</option>
                        <option value="Domestic">Domestic</option>
                        <option value="Both">Both</option>
                    </select>
                    </label>
                </div>
            </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="small-9 columns small-centered zeropadding">
                <div class="row">

                    <input name="firm_name" type="text" id="right-label" placeholder="Please enter your Company Name">

                </div>
            </div>
        </div>
        <div class="row">
            <div class="small-9 columns small-centered zeropadding">
                <div class="row">

                    <input name="vendor_name" type="text" required id="right-label" placeholder="Firstname | Lastname">
                    <small class="error">Vendor Name is required.</small>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="small-9 columns small-centered zeropadding">
                <div class="row">

                    <input name="email" type="email" required id="right-label" placeholder="Please enter your Email Id">
                    <small class="error">An email address is required.</small>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="small-9 columns small-centered zeropadding">
                <div class="row">
            <div class="small-6 columns zeropadding">
                <div class="row">

                    <input name="password" type="password" required id="right-label"  placeholder="Please enter Password">
                    <small class="error">Please Enter Password.</small>
                </div>
            </div>
            <div class="small-6 columns  zeropadding">
                <div class="row">

                    <input type="password" required id="right-label"  placeholder="Please repeat Password">
                    <small class="error">Please Repeat Password.</small>
                </div>
            </div>
            </div>
            </div>
        </div>
        <div class="row">
            <div class="small-9 columns small-centered zeropadding">
                <div class="row">

                    <input name="mobile" type="text" required id="right-label" pattern="^[7-9][0-9]{9}$" placeholder="Please enter your Mobile number">
                    <small class="error">An Phone Number is required.</small>
                </div>
            </div>
        </div>
        <div class="row">
        <div class="large-9 columns small-centered zeropadding">
      <label>Agree Terms & Conditions</label>
      <input id="checkbox1" type="checkbox"><label for="checkbox1">I Agree</label>

    </div>
        </div>

        <div class="row">
            <div class="large-4 columns large-centered zeropadding">

                <input class="button expand small md-close" type="submit" value="Register" style="margin: 0px"/>

            </div>
        </div>
    </div>
</form>


				</div>
			</div>
		</div>
                  <script src="/js/classie.js"></script>
		<script src="/js/modalEffects.js"></script>
		<script>
			// this is important for IEs
			var polyfilter_scriptpath = '/js/';
		</script>
		<script src="/js/cssParser.js"></script>
		<script src="/js/css-filters-polyfill.js"></script>
</body>
</html>