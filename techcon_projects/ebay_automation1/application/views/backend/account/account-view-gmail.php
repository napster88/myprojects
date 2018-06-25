<div class="content-wrapper" style="min-height: 916px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       <?php echo $head_title; ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Plans</li>
        <li class="active"><?php echo $head_title; ?></li>
      </ol>
    </section>
	<input type="hidden" class="delete_url" value="<?php echo base_url('plans/hide'); ?>" />
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">All Plans list</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
				  
				  <th>Account</th>
                  <th>Title</th>
				    <th>Token</th>
                  <th>Status</th>
                  <th style="width:220px;">Action</th>
                </tr>
                </thead>
                <tbody>
				<?php
print_r($gmaillist);
		if(!empty($gmaillist)){
					foreach($gmaillist as $data){ ?>
					<tr id="row_<?php echo $data->id; ?>">
					 
					  <td style="word-break: break-word;"><img src="../assets/images/<?php echo $data->account_type; ?>.jpg"  width="40px"></td>
					  <td style="word-break: break-word;"><?php echo $data->user_account_name; ?></td>
					   <td style="word-break: break-word;"><?php echo $data->user_account_name; ?></td>
					  <td><?php if($data->account_status == 'active'){ echo "<span style='padding: 2px 12px;background: #00a65a;color: #fff;border-radius: 10px;line-height: 40px;'>Active</span>";}else{ echo "<span style='padding: 2px 12px;background: #dd4b39;color: #fff;border-radius: 10px;line-height: 40px;'>Hidden</span>"; } ?></td>
					  <td>
						<a class="btn btn-app" href="<?php echo base_url('account/account_disable/'.$data->account_id); ?>"><i class="fa fa-eye"></i> Disable</a>
						<a class="btn btn-app" href="<?php echo base_url('account/account_edit/'.$data->account_id); ?>"><i class="fa fa-edit"></i> Edit</a>
						<a class="btn btn-app delete-alert" data-id="<?php echo $data->account_id; ?>" href="#" ><i class="fa fa-trash"></i> Delete</a>
					  </td>
					</tr>
					<?php }
				}?>
				
				
                </tbody>
                <tfoot>
                <tr>
               
				 <th>Account</th>
                  <th>Title</th>
				    <th>Token</th>
                  <th>Status</th>
                  <th style="width:220px;">Action</th>
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
 