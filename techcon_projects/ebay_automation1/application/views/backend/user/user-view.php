<div class="content-wrapper" style="min-height: 916px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       <?php echo $head_title; ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Users</li>
        <li class="active"><?php echo $head_title; ?></li>
      </ol>
    </section>
	<input type="hidden" class="delete_url" value="<?php echo base_url('user/hide'); ?>" />
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">All Users list</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
				  <th>User ID</th>
				  <th>Photo</th>
                  <th>Username</th>
                  <th>Email ID</th>
				    <th>Status</th>
                  <th style="width:220px;">Action</th>
                </tr>
                </thead>
                <tbody>
				<?php if(!empty($userlist)){
					foreach($userlist as $data){ ?>
					<tr id="row_<?php echo $data->id; ?>">
					  <td><?php echo $data->id; ?></td>
					  <td><img src="<?php echo base_url().$data->photo; ?>" width="40" /></td>
					  <td style="word-break: break-word;"><?php echo $data->username; ?></td>
					  <td style="word-break: break-word;"><?php echo $data->emailid; ?></td>
					  
					   <td><?php if($data->status == '1'){ echo "<span style='padding: 2px 12px;background: #00a65a;color: #fff;border-radius: 10px;line-height: 40px;'>Active</span>";}else{ echo "<span style='padding: 2px 12px;background: #dd4b39;color: #fff;border-radius: 10px;line-height: 40px;'>Inactive</span>"; } ?></td>
					 
					  
					  
					  <td>
						<a class="btn btn-app" href="<?php echo base_url('user/viewuser/'.$data->id); ?>"><i class="fa fa-eye"></i> View</a>
						<a class="btn btn-app" href="<?php echo base_url('user/edit_user/'.$data->id); ?>"><i class="fa fa-edit"></i> Edit</a>
						<a class="btn btn-app delete-alert" data-id="<?php echo $data->id; ?>" status="<?php if($data->status == '1'){ echo '1'; } else { echo '0'; } ?>" href="#" ><i class="fa fa-trash"></i><?php if($data->status == '1'){ echo 'Delete'; } else {echo "Restore"; } ?></a>
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
				   <th>Status</th>
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