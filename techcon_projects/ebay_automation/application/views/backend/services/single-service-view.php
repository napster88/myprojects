
<div class="content-wrapper" style="min-height: 946px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        View User
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Users</li>
        <li class="active">View</li>
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
				<div class="box-body">
				<div class="input-group">
					<img src="<?php echo base_url($agentdata[0]->photo); ?>" />
				  </div>
				  
				  <br/>
				  <!-- /.form group -->
				  <p style="margin-bottom: 0;"><label>Email ID</label></p>
				  <div class="input-group">
					<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
					<input type="email" name="emailid" class="form-control" disabled placeholder="Email ID" value="<?php echo $agentdata[0]->emailid; ?>" />
				  </div>
				  <br/>
				  <!-- /.form group -->
				  <p style="margin-bottom: 0;"><label>Username</label></p>
				  <div class="input-group">
					<span class="input-group-addon"><i class="fa fa-user"></i></span>
					<input type="text" name="username" class="form-control" disabled placeholder="Username" value="<?php echo $agentdata[0]->username; ?>" />
				  </div>
				  <br/>
				  <!-- /.form group -->
				  <p style="margin-bottom: 0;"><label>First Name</label></p>
				  <div class="input-group">
					<span class="input-group-addon"><i class="fa fa-user"></i></span>
					<input type="text" name="first_name" class="form-control" disabled placeholder="First Name" value="<?php echo $agentdata[0]->fname; ?>" />
				  </div>
				  <br/>
				  <!-- /.form group -->
				  <p style="margin-bottom: 0;"><label>Last Name</label></p>
				  <div class="input-group">
					<span class="input-group-addon"><i class="fa fa-user"></i></span>
					<input type="text" name="last_name" class="form-control" disabled placeholder="Last Name" value="<?php echo $agentdata[0]->lname; ?>" />
				  </div>
				  <br/>
				  
				  <!-- /.form group -->
				  

				</div>
				<!-- /.box-body -->
				<div class="box-footer">
					<a href="#"><button type="button" class="btn btn-primary">Edit</button></a>
				</div>

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