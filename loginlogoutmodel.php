<div class="modal fade shadow" role="dialog" tabindex="-1" id="myModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="display: block;">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <div>
                <ul class="nav nav-tabs">
                    <li ><a class="text-primary" style="font-size:12px; padding:5px;" href="#tab-1" role="tab" data-toggle="tab">Login </a></li>
                    <li><a class="text-primary" style="font-size:12px; padding:5px;" href="#tab-2" role="tab" data-toggle="tab">Register </a></li>
                    <li><a class="text-primary" style="font-size:12px; padding:5px;"  href="#tab-3" role="tab" data-toggle="tab">Forgot password? </a></li>
                </ul>
                <div class="tab-content" >
                    <div class="tab-pane active" role="tabpanel" id="tab-1">
                        <div class="login-card"><img src="assets/img/avatar_2x.png" class="profile-img-card">
                            <form class="form-signin" action="" method="post" name="log" onsubmit="return validateForm1();" >
                                <input class="form-control" style="font-size:12px;" type="email" required="" placeholder="Email address" autofocus="" id="email1" name="email">
                                <input class="form-control" type="password" style="font-size:12px;" required="" placeholder="Password" id="password" name="password">
                                <div class="checkbox">
                                    <div class="checkbox">
                                        <label style="font-size:12px;">
                                            <input type="checkbox" name="remember" style="font-size:12px;" value="on">Remember me</label>
                                    </div>
                                </div>
                                <button class="btn btn-primary btn-block btn-lg btn-signin" type="submit" name="login" id="login">Sign in</button>
                            </form>
                            <ul class="nav nav-tabs">
                                <li>
                                    <a href="#tab-3" role="tab" data-toggle="tab" style="font-size:12px;" class="forgot-password">Forgot your password?</a>
                                </li>
                        </div>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="tab-2">
                        <form id="form_container"  class="bootstrap-form-with-validation"  action="" method="post" name="f" onsubmit="return validateForm();"  enctype="multipart/form-data">
                            <div class="form-group has-success">
                                <label class="control-label" style="font-size:12px;" for="uname">Name </label>
                                <input class="form-control  input-sm"  
                                type="text" name="uname" style="font-size:12px;" id="uname">
                            </div>
                            <div class="form-group has-success">
                                <label class="control-label" style="font-size:12px;" for="fname">Batch-no </label>
                                <input class="form-control input-sm" style="font-size:12px;" type="text" name="fname" id="fname">
                            </div>
                            <!-- <div class="form-group has-warning">
                                <label class="control-label" style="font-size:12px;" for="password-input">Last-name </label>
                                <input class="form-control input-sm" style="font-size:12px;" type="text" name="lname" id="lname" >
                            </div> -->
                            <div class="form-group has-warning">
                                <label class="control-label" style="font-size:12px;" for="password-input">Gender:- </label>
                                <div class="radio">
                                    <label class="control-label" style="font-size:12px;">
                                        <input type="radio"  id="gender1" value="male" name="gender">Male</label>
                                </div>
                                <div class="radio">
                                    <label class="control-label" style="font-size:12px;">
                                        <input type="radio"  id="gender2" value="female" name="gender" >Female</label>
                                </div>
                            </div>
                            <div class="form-group has-warning" style="display:flex;">
                                <label class="control-label" style="font-size:12px; display: absolute; margin-top:15px;"  for="dob">DOB:- </label>
                                <select name="yearOfBirth" style="font-size:12px;" style="color:black;">
                                <option style="font-size:12px;" class="input-sm" value="">---Select year---</option>
                                <?php for ($i = 1980; $i < date('Y'); $i++) : ?>
                                <option style="font-size:12px;" value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php endfor; ?>
                                </select>
                                <select style="font-size:12px;" name="monthOfBirth" style="color:black;"> 
                                <option style="font-size:12px;" class="input-sm" value="">---Select month---</option>
                                <?php for ($i = 1; $i <= 12; $i++) : ?>
                                <option value="<?php echo ($i < 10) ? '0'.$i : $i; ?>"><?php echo $i; ?></option>
                                <?php endfor; ?>
                                </select>
                                <select style="font-size:12px;" name="dateOfBirth" style="color:black;">
                                <option class="input-sm"value="">---Select date---</option>
                                <?php for ($i = 1; $i <= 31; $i++) : ?>
                                <option class="input-sm" style="font-size:12px;" value="<?php echo ($i < 10) ? '0'.$i : $i; ?>"><?php echo $i; ?></option>
                                <?php endfor; ?>
                                </select>
                            </div>
                            <div class="form-group has-warning">
                                <label class="control-label" style="font-size:12px;" for="password-input">Interested in:- </label>
                                <div class="radio">
                                    <label class="control-label" style="font-size:12px;">
                                        <input type="radio"  id="interest1" value="AndroidDevelopment" name="interest">Android Development</label>
                                </div>
                                <div class="radio">
                                    <label class="control-label" style="font-size:12px;">
                                        <input type="radio"  id="interest2" value="WebDevelopment" name="interest" >Web Development</label>
                                </div>
                            </div>
                            <div class="form-group has-error has-feedback">
                                <label style="font-size:12px;" class="control-label" for="exception ">Any other skills ? </label>
                                <input style="font-size:12px;" class="form-control input-sm"  name="exception" id="exception">
                            </div>
                            <div class="form-group has-error has-feedback">
                                <label style="font-size:12px;" class="control-label" for="email">Email :-</label>
                                <input style="font-size:12px;" class="form-control input-sm" type="email" name="email" id="email2"></div>
                            <div class="form-group has-error has-feedback">
                                <label style="font-size:12px;" class="control-label" for="mobile">Mobile     :-</label>
                                <input style="font-size:12px;" class="form-control input-sm"  name="mobile" id="mobile"></div>
                            <div class="form-group has-error has-feedback">
                                <label style="font-size:12px;" class="control-label" for="pass1">Password:- </label>
                                <input style="font-size:12px;" class="form-control input-sm" type="password" id="pass1"  name="pass1"></div>
                            <div class="form-group has-error has-feedback">
                                <label style="font-size:12px;" class="control-label" for="pass2">Confirm Password:- </label>
                                <input style="font-size:12px;" class="form-control input-sm" type="password" name="pass2" id="pass2"></i></div>
                            
                                <label style="font-size:12px; color:black;" class="control-label" for="photo" >Choose Profile Picture:-</label>
                                <input style="font-size:12px; color:grey;" class="input-sm" type="file" name="image">
                                <div class="form-group has-success">
                                <div class="checkbox">
                                    <label class="control-label" style="font-size:12px;">
                                        <input  type="checkbox" name="checkbox" required="">Agree Terms and Conditions.</label>
                                </div>
                            </div>
                            <div class="form-group has-warning">
                                <p  style="font-size:12px;" class="form-static-control text-lowercase text-center text-info bg-danger" style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-seri;">By Clicking Register , verification code will be send to your email-id, after the proper verification you will be able to login to your account successfully.</p>
                            </div>
                            <div class="form-group has-warning">
                                <button style="font-size:12px;" class="btn btn-success btn-block" name="sub" type="submit" >Register </button>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="tab-3">
                        <form name="send" action="" method="post">
                            <input type="text" style="font-size:12px;" class="text input-sm" name="femail" value="" placeholder="Enter your registered email" required  ><a href="#" class=" icon email"></a>
                            <div class="submit three">
                                <input type="submit" class="btn-primary btn-sm" style="margin-left:50px; padding:5px;" name="send"  value="Send Email" >
                            </div>
                        </form>
                    </div>
                </div>
                </div>
                </div>
            </div>
        </div>
</div>
