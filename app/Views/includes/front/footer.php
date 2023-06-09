<div class="last">
    <h1> Call or whatsapp to know more or book an appointment: 6283285828 or write at travmaxfree@gmail.com</h1>
</div>
<div class="ring">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="ha">
                    <p><b>Copyright - ERC Max Ventures Pvt. Ltd. </b></p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="ha">
                    <p><a href="/terms_of_use"><b> Privacy Policy </b></a></p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="ha">
                    <p><a href="/terms_of_use"><b> Terms & Conditions </b></a></p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
$session = session();
if (!$session->has('is_customer_logged_in')) { ?>
    <div id="registerLoginModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-sm">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-body">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h2 class="modal-title fdr">Welcome to Travmax</h2>
                        <h2 class="modal-title fdr2" style="display:none">Forgot Password</h2>
                        <h2 class="modal-title sng-up" style="display:none">Register Free</h2>
                    </div>
                    <div class="col-sm-12 signin-sect fdr">
                        <div id="login-msg-div"></div>
                        <form class="form" action="" method="post" id="popup-login-form">
                            <p><label>User ID/Email/Phone</label> <input type="text" required name="user_name" class="form-control input-empty" placeholder=""></p>
                            <p><label>Password</label> <input type="password" required name="password" class="form-control input-empty"></p>
                            <div class="col-md-12 col-xs-12 keeplogin text-right ferd"><b>Forgot Password?</b></div><br>
                            <p><input type="submit" name="submit" value="Log In" class="btn btn-primary popup-login-button"></p>
                            <p class="rfre">If you don't have an Account <a href="/plans"><span class="svn"><b>Register Free</b></span></a></p>
                        </form>
                    </div>
                    <div class=" col-sm-12 loginform fdr2" style="display:none">
                        <div id="forget-msg-div"></div>
                        <form action="#" id="forgetpassword" autocomplete="on" method="POST">
                            <p><label>Username</label> <input type="text" required name="user_name" class="form-control input-empty" placeholder="Enter your User ID"></p>
                            <p class="keeplogin dgtbkt">
                                <input class="hdf btn btn-primary popup-login-button" name="submit" id="can" type="submit" value="check your Phone" />
                                <b class="lgt"> Login </b>
                            </p>
                        </form>
                    </div>
                    <div class="col-sm-12 signup-sect sng-up" style="display:none">
                        <div id="register-msg-div1"></div>
                        <form class="form" action="" method="post" id="popup-register-form">
                            <p><label>First Name</label>
                                <input required="required" type="text" name="f_name" class="form-control input-empty">
                            </p>
                            <p><label>Last Name</label>
                                <input type="text" name="l_name" class="form-control input-empty">
                            </p>
                            <p><label>Email</label>
                                <input required="required" type="email" name="email" class="form-control input-empty">
                            </p>
                            <p><label>Confirm Email</label>
                                <input required="required" type="email" name="cemail" class="form-control input-empty">
                            </p>
                            <p><label>Password</label> <input type="password" name="password" class="form-control input-empty"></p>
                            <p><label>Confirm Password</label> <input type="password" name="cpassword" class="form-control input-empty"></p>
                            <p><label>Phone</label> <input type="number" min="1" maxlength="10" name="phone" class="form-control input-empty"></p>
                            <div class="form-group">
                                <label for="sel1">State * </label>
                                <select required name="constituency" id="constituency" tabindex="9" type="text" class="form-control">
                                    <option value="">Select State</option>
                                    <?php if (!empty($constituency)) {
                                        foreach ($constituency as $value) {
                                            echo '<option value="' . $value['id'] . '"';
                                            echo '>' . $value['name'] . '</option>';
                                        }
                                    } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="sel1">City * </label>
                                <select required name="city" class="form-control" id="sub_constituency">
                                    <option value="">Select State first</option>
                                </select>
                            </div>
                            <p><input type="hidden" id="Fran_code_input" name="Fran_id" class="form-control input-empty"></p>
                            <p><label> Referral ID</label> <input type="text" id="bliss_code_input" name="bliss_code" class="form-control input-empty request-code-input" value="<?php if (!empty($_GET['refer_id'])) {
                                                                                                                                                                                        echo $_GET['refer_id'];
                                                                                                                                                                                    } ?>"></p>
                            <div id="sponsr_name"></div>
                            <div class="form-group">
                                <input checked="checked" name="term_condition" value="left" type="checkbox"><span class="check" style="color:#000;"> I acknowledge that I have read, understood and agree to all the <a href="#" style="cursor:pointer;">Terms & Conditions.</a></span>
                            </div>

                            <div class="request-code-div" style="display:none;">
                                <div id="request-code-result"></div>
                                <div class="input-group">
                                    <input type="text" class="form-control" maxlength="10" placeholder="Phone" value="">
                                    <div class="input-group-addon request-code-search glyphicon glyphicon-search"></div>
                                </div>
                            </div>
                            <p><input type="submit" name="submit" value="Register" class="btn btn-primary popup-register-button"></p>
                            <div class="col-md-12 keeplogin text-center" style="padding:0px;"><b><span>Already registered? </span><a href="javascript:;" class="show-login-form lgt">Login</a></b></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<script>
    jQuery(".ferd3").click(function() {
        jQuery(".fdr").hide();
        jQuery(".sng-up").show();
    });
    jQuery(".lgt").click(function() {
        jQuery(".fdr2").hide();
        jQuery(".sng-up").hide();
        jQuery(".fdr").show();
    });

    //Login Button Click
    jQuery('#popup-login-form').submit(function(event) {
        event.preventDefault();
        jQuery.ajax({
            type: "POST",
            url: "/login",
            data: jQuery("#popup-login-form").serialize(),
            success: function(data) {
                console.log(data);
                if (data.indexOf("alert alert-success") == "-1") {
                    jQuery("#login-msg-div").html(data);
                } else {
                    window.location.href = "/admin";
                }
            }
        });
    });
</script>