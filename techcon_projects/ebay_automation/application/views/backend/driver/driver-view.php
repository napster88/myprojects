<div class="content-wrapper" style="min-height: 916px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       <?php echo $head_title; ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Drivers</li>
        <li class="active"><?php echo $head_title; ?></li>
      </ol>
    </section>
	<input type="hidden" class="delete_url" value="<?php echo base_url('driver/hide'); ?>" />
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">All Drivers list</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
				  <th>Driver ID</th>
				  <th>Photo</th>
                  <th>Username</th>
                  <th>Email ID</th>
                  <th style="width:220px;">Action</th>
                </tr>
                </thead>
                <tbody>
				<?php if(!empty($driverlist)){
					foreach($driverlist as $data){ ?>
					<tr id="row_<?php echo $data->id; ?>">
					  <td><?php echo $data->id; ?></td>
					  <td><img src="<?php echo base_url().$data->photo; ?>" width="40" /></td>
					  <td style="word-break: break-word;"><?php echo $data->username; ?></td>
					  <td style="word-break: break-word;"><?php echo $data->emailid; ?></td>
					  <td>
						<a class="btn btn-app" href="<?php echo base_url('driver/viewdriver/'.$data->id); ?>"><i class="fa fa-eye"></i> View</a>
						<a class="btn btn-app" href="<?php echo base_url('driver/edit_driver/'.$data->id); ?>"><i class="fa fa-edit"></i> Edit</a>
						<a class="btn btn-app delete-alert" data-id="<?php echo $data->id; ?>" href="#" ><i class="fa fa-trash"></i> Delete</a>
					  </td>
					</tr>
					<?php }
				}?>
                </tbody>
                <tfoot>
                <tr>
                  <th>User ID</th>
				  <th>Photo</th>
                  <th>Username</th>
                  <th>Email ID</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>