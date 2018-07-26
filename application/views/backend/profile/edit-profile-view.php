<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <!--<small>Version 2.0</small>-->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Profile</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
		<div class="col-md-1"></div>
        <div class="col-md-6">
          <!-- TABLE: LATEST ORDERS -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Your Details</h3>
            </div>
			<div style="color:#ff0000;margin: 10px;">
			<?php echo validation_errors(); ?>
			<?php if($this->session->flashdata('flashdata')){ echo '<p>'.$this->session->flashdata('flashdata').'</p>'; }?>
			</div>
			<form method="post" action="<?php echo base_url('profile/update'); ?>" enctype="multipart/form-data" >
				<div class="box-body">
				<p>
				<img src="<?php echo base_url($userdata->photo); ?>" width="100" />
				<input type="hidden" name="old_photo" value="<?php echo $userdata->photo; ?>" />
				</p>
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-eye"></i></span>
					<input type="file" name="photo" class="form-control photo" />
				</div>
				  <p class="help-block" style="margin-left:40px;margin-bottom:0">Upload Profile photo here</p>
				  <br/>
				  <!-- /.form group -->
				 <p style="margin-bottom: 0;"><label>Email ID</label></p>
				  <div class="input-group">
					<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
					<input type="text" class="form-control" disabled placeholder="Email ID" value="<?php echo $userdata->emailid; ?>" />
				  </div>
				  <br/>
				  <!-- /.form group -->
				   <p style="margin-bottom: 0;"><label>Username</label></p>
				  <div class="input-group">
					<span class="input-group-addon"><i class="fa fa-user"></i></span>
					<input type="text" class="form-control" name="username" required placeholder="Username" value="<?php echo $userdata->username; ?>" />
				  </div>
				  <br/>
				  <!-- /.form group -->
				   <p style="margin-bottom: 0;"><label>First Name</label></p>
				  <div class="input-group">
					<span class="input-group-addon"><i class="fa fa-user"></i></span>
					<input type="text" name="first_name" class="form-control" required placeholder="First Name" value="<?php echo $userdata->fname; ?>" />
				  </div>
				  <br/>
				  <!-- /.form group -->
				   <p style="margin-bottom: 0;"><label>Last Name</label></p>
				  <div class="input-group">
					<span class="input-group-addon"><i class="fa fa-user"></i></span>
					<input type="text" name="last_name" class="form-control" placeholder="Last Name" value="<?php echo $userdata->lname; ?>" />
				  </div>
				  <br/>
				  <!-- /.form group -->
				   <p style="margin-bottom: 0;"><label>Old Password</label></p>
				  <div class="input-group">
					<span class="input-group-addon"><i class="fa fa-eye"></i></span>
					<input type="text" name="old_pass" class="form-control" autocomplete="off" value="" placeholder="Old Password" />
				  </div>
				  <br/>
				  <!-- /.form group -->
				   <p style="margin-bottom: 0;"><label>New Password</label></p>
				  <div class="input-group">
					<span class="input-group-addon"><i class="fa fa-eye-slash"></i></span>
					<input type="password" name="new_pass" class="form-control" autocomplete="false" value="" placeholder="New Password" />
				  </div>
				  <br/>
				  <!-- /.form group -->
				 <input type="hidden" name="user_role" value="<?php echo $userdata->user_type; ?>">
				 <input type="hidden" name="user_pass" value="<?php echo $userdata->password; ?>">
				</div>
				<!-- /.box-body -->
				<div class="box-footer">
					<button type="submit" class="btn btn-primary">Update</button>
				</div>
			</form>
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
		<div class="col-md-1"></div>
        <!-- Info boxes -->
	  <div class="col-md-4">
			
        </div>
      <!-- /.row -->
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>