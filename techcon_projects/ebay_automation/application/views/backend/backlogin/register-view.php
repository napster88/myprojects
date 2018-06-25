<div class="login-box">
    <div class="login-logo">
      <!--<img src="<?php echo base_url(); ?>assets/images/logo.png" width="200" />-->
        <h1 style="color: #fff;padding-top: 30px;">Register Account</h1>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Register to start your session</p>

        <div style="color:#ff0000;margin: 10px;">
			<?php echo validation_errors(); ?>
			<?php if($this->session->flashdata('flashdata')){ echo '<p>'.$this->session->flashdata('flashdata').'</p>'; }?>
			</div>
			<form method="post" action="<?php echo base_url('account/do_register'); ?>" enctype="multipart/form-data" >
				<div class="box-body">
				  <div class="input-group">
					<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
					<input type="email" name="emailid" class="form-control" required placeholder="Email ID" value="<?php echo set_value('emailid'); ?>" />
				  </div>
				  <br/>
				  <!-- /.form group -->
				  <div class="input-group">
					<span class="input-group-addon"><i class="fa fa-user"></i></span>
					<input type="text" name="username" class="form-control" required placeholder="Username" value="<?php echo set_value('username'); ?>" />
				  </div>
				  <br/>
				  <!-- /.form group -->
				  <div class="input-group">
					<span class="input-group-addon"><i class="fa fa-user"></i></span>
					<input type="text" name="fname" class="form-control" required placeholder="First Name" value="<?php echo set_value('fname'); ?>" />
				  </div>
				  <br/>
				  <!-- /.form group -->
				  <div class="input-group">
					<span class="input-group-addon"><i class="fa fa-user"></i></span>
					<input type="text" name="lname" class="form-control" placeholder="Last Name" value="<?php echo set_value('lname'); ?>" />
				  </div>
				  <br/>
				  <!-- /.form group -->
				  <div class="input-group">
					<span class="input-group-addon"><i class="fa fa-eye-slash"></i></span>
					<input type="password" name="password" class="form-control" required placeholder="password">
				  </div>
				  <br/>
				  <!-- /.form group -->
				  <!--<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-eye"></i></span>
					<input type="text" name="cpassword" class="form-control" required placeholder="Confirm">
				  </div>
				  <br/>-->
				  <!-- /.form group -->
				  
				  <div class="input-group">
					<span class="input-group-addon"><i class="fa fa-user"></i></span>
					<input type="text" name="mobile" class="form-control" placeholder="Mobile Number" value="<?php echo set_value('mobile'); ?>" />
				  </div>
				  <br/>
				  <!-- /.form group -->
				  
				  <div class="input-group">
					<label>
					  <input type="radio" name="gender" class="minimal" value="male" <?php if(set_value('gender') != null){ if(set_value('gender')=='male'){ echo 'checked'; } }else{ echo 'checked';} ?> /> Male
					</label>&nbsp;&nbsp;&nbsp;&nbsp;
					<label>
					  <input type="radio" name="gender" class="minimal" value="female" <?php if(set_value('gender')=='female'){ echo 'checked'; }?> /> Female
					</label>
				  </div>
				  
				  <!-- /.form group -->

				</div>
				<!-- /.box-body -->
				<div class="box-footer">
					<button type="submit" class="btn btn-primary">Register</button>
				</div>
			</form>
        <div style="color:#ff0000;">
            <?php echo validation_errors(); ?>
            <?php if ($this->session->flashdata('flashdata')) {
              echo '<p>' . $this->session->flashdata('flashdata') . '</p>';
            } ?>
        </div>
        <!--<div class="social-auth-links text-center">
          <p>- OR -</p>
          <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
            Facebook</a>
          <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
            Google+</a>
        </div>-->
        <!-- /.social-auth-links -->

        <a href="<?php echo base_url('backlogin'); ?>">Sign In</a><br>
        <!--<a href="register.html" class="text-center">Register a new membership</a>-->

    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->