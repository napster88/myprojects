<div class="login-box">
  <div class="login-logo">
    <!--<img src="<?php echo base_url();?>assets/images/logo.png" width="200" />-->
	<h1 style="color: #fff;padding-top: 30px;">Logo Here</h1>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Enter Your Email Address To Reset Password</p>

    <form action="<?php echo base_url();?>backlogin/doreset" method="post">
      <div class="form-group has-feedback">
        <input type="email" name="email" class="form-control" placeholder="Email Address">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      
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
          <button type="submit" class="btn btn-primary btn-block btn-flat">Send Confirmation</button>
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