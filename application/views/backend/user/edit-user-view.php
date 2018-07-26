
<div class="content-wrapper" style="min-height: 946px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $head_title; ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>User</li>
        <li class="active">Edit</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- SELECT2 EXAMPLE -->
      
      <!-- /.box -->

      <div class="row">
		<div class="col-md-1"></div>
        <div class="col-md-6">

          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">User Details</h3>
            </div>
			<div style="color:#ff0000;margin: 10px;">
			<?php echo validation_errors(); ?>
			<?php if($this->session->flashdata('flashdata')){ echo '<p>'.$this->session->flashdata('flashdata').'</p>'; }?>
			</div>
			<form method="post" action="<?php echo base_url('user/updateuser/'.$agentdata[0]->id); ?>" enctype="multipart/form-data" >
				<div class="box-body">
				 <p style="margin-bottom: 0;"><label>Email ID</label></p>
				  <div class="input-group">
					<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
					<input type="text" class="form-control" disabled placeholder="Email ID" value="<?php echo $agentdata[0]->emailid; ?>" />
				  </div>
				  <br/>
				  <!-- /.form group -->
				   <p style="margin-bottom: 0;"><label>Username</label></p>
				  <div class="input-group">
					<span class="input-group-addon"><i class="fa fa-user"></i></span>
					<input type="text" class="form-control" disabled placeholder="Username" value="<?php echo $agentdata[0]->username; ?>" />
				  </div>
				  <br/>
				  <!-- /.form group -->
				   <p style="margin-bottom: 0;"><label>First Name</label></p>
				  <div class="input-group">
					<span class="input-group-addon"><i class="fa fa-user"></i></span>
					<input type="text" name="first_name" class="form-control" required placeholder="First Name" value="<?php echo $agentdata[0]->fname; ?>" />
				  </div>
				  <br/>
				  <!-- /.form group -->
				   <p style="margin-bottom: 0;"><label>Last Name</label></p>
				  <div class="input-group">
					<span class="input-group-addon"><i class="fa fa-user"></i></span>
					<input type="text" name="last_name" class="form-control" placeholder="Last Name" value="<?php echo $agentdata[0]->lname; ?>" />
				  </div>
				  <br/>
				  <!-- /.form group -->
				 <input type="hidden" name="user_role" value="<?php echo $agentdata[0]->user_type; ?>">
				</div>
				<!-- /.box-body -->
				<div class="box-footer">
					<button type="submit" class="btn btn-primary">Update</button>
				</div>
			</form>
          </div>
          <!-- /.box -->

          
          

        </div>
        <!-- /.col (left) -->
		<div class="col-md-1"></div>
        <div class="col-md-4">
			
        </div>
        <!-- /.col (right) -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>