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
              <h3 class="box-title">All Orders updated by Software (Mode:automatically)</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
				  <th>Account linked</th>
				  <th>Title</th>
				  <th>Account Status</th>
				   <th>Order number</th>
                  <th>Tracking number</th>
				   <th>Order status</th>
				    <th>Upload Mode</th>
				    <th>updated On</th>
                   <th style="width:220px;">Action</th>
                </tr>
                </thead>
                <tbody>
				<?php
				
		if(!empty($total_ups))
		{
					foreach($total_ups as $data)
					{ 
					
					?>
					<tr id="row_<?php echo $data->id; ?>">
					 
					  <td style="word-break: break-word;"><img src="../../assets/images/<?php echo $data->account_type; ?>.jpg"  width="40px"></td>
					  
					  <td style="word-break: break-word;"><?php echo $data->user_account_name; ?></td> 
					  <td style="word-break: break-word;"><?php echo $data->account_status; ?></td>
					   <td style="word-break: break-word;"><?php echo $data->order_num; ?></td>
					   <td style="word-break: break-word;"><?php echo $data->track_num; ?></td> 
					   <td style="word-break: break-word;"><?php echo $data->order_status; ?></td>
					   <td style="word-break: break-word;"><?php echo $data->order_mode; ?></td>
					   <td style="word-break: break-word;"><?php echo $data->create_date; ?></td>
					   
						<td style="word-break: break-word;"><a class="btn btn-app" href="<?php echo base_url('plans/plan/'.$data->id); ?>"><i class="fa fa-eye"></i> View</a>
						<a class="btn btn-app" href="<?php echo base_url('plans/edit_plan/'.$data->id); ?>"><i class="fa fa-edit"></i> Edit</a>
						<a class="btn btn-app delete-alert" data-id="<?php echo $data->id; ?>" href="#" ><i class="fa fa-trash"></i> Delete</a>
					  </td>
					</tr>
					<?php }
				}?>
				
				
                </tbody>
                <tfoot>
                <tr>
               
				 <th>Account linked</th>
				  <th>Title</th>
				  <th>Account Status</th>
				   <th>Order number</th>
                  <th>Tracking number</th>
				   <th>Order status</th>
				     <th>Upload Mode</th>
				    <th>updated On</th>
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
 