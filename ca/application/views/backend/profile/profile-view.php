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
				<div class="box-body">
				<div class="input-group">
					<img src="<?php echo base_url($userdata->photo); ?>" width="100" />
				  </div>
				  
				  <br/>
				  <!-- /.form group -->
				  <p style="margin-bottom: 0;"><label>Email ID</label></p>
				  <div class="input-group">
					<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
					<input type="email" name="emailid" class="form-control" disabled placeholder="Email ID" value="<?php echo $userdata->emailid; ?>" />
				  </div>
				  <br/>
				  <!-- /.form group -->
				  <p style="margin-bottom: 0;"><label>Username</label></p>
				  <div class="input-group">
					<span class="input-group-addon"><i class="fa fa-user"></i></span>
					<input type="text" name="username" class="form-control" disabled placeholder="Username" value="<?php echo $userdata->username; ?>" />
				  </div>
				  <br/>
				  <!-- /.form group -->
				  <p style="margin-bottom: 0;"><label>First Name</label></p>
				  <div class="input-group">
					<span class="input-group-addon"><i class="fa fa-user"></i></span>
					<input type="text" name="first_name" class="form-control" disabled placeholder="First Name" value="<?php echo $userdata->fname; ?>" />
				  </div>
				  <br/>
				  <!-- /.form group -->
				  <p style="margin-bottom: 0;"><label>Last Name</label></p>
				  <div class="input-group">
					<span class="input-group-addon"><i class="fa fa-user"></i></span>
					<input type="text" name="last_name" class="form-control" disabled placeholder="Last Name" value="<?php echo $userdata->lname; ?>" />
				  </div>
				  <br/>
				  
				  <!-- /.form group -->
				  

				</div>
				<!-- /.box-body -->
				<div class="box-footer">
					<a href="<?php echo base_url('profile/edit'); ?>"><button type="button" class="btn btn-primary">Edit</button></a>
				</div>

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