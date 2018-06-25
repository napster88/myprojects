<div class="login-box">
  <div class="login-logo">
    <!--<img src="<?php echo base_url();?>assets/images/logo.png" width="200" />-->
	<h1 style="color: #fff;padding-top: 30px;">Logo Here</h1>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Reset Password Here</p>
	
    <form action="<?php echo base_url();?>backlogin/resetpass" method="post">
      <div class="form-group has-feedback">
		
        <input type="password" name="password" class="form-control" placeholder="New Password*" required />
        <span class="form-control-feedback"><i class="fa fa-fw fa-eye-slash"></i></span>
      </div>
	  <div class="form-group has-feedback">
        <input type="password" name="cpassword" class="form-control" placeholder="Confirm Password*" required />
        <span class="form-control-feedback"><i class="fa fa-fw fa-eye"></i></span>
      </div>
      <input type="hidden" name="userid" value="<?php echo $userid; ?>" />
      <div class="row">
        <div class="col-xs-6">
          <div class="checkbox icheck">
            <label>
              <a href="<?php echo base_url('backlogin'); ?>">Login Here</a>
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-6">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Reset</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
	<div style="color:#ff0000;">
	<?php echo validation_errors(); ?>
	<?php if($this->session->flashdata('flashdata')){ echo '<p>'.$this->session->flashdata('flashdata').'</p>'; }?>
	</div>
    <!--<a href="register.html" class="text-center">Register a new membership</a>-->

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->