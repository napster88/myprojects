
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
              <h3 class="box-title">Account Details</h3>
            </div>
			<div style="color:#ff0000;margin: 10px;">
			<?php 
			print_r($account_detail);
			echo validation_errors(); ?>
			<?php if($this->session->flashdata('flashdata')){ echo '<p>'.$this->session->flashdata('flashdata').'</p>'; }?>
			</div>
			<form method="post" action="<?php  echo base_url('account/updateaccount/'.$account_detail[0]->account_id).'/'.$acc_type; ?>" enctype="multipart/form-data" >
				<div class="box-body">
				  <div class="input-group">
					<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
					<input type="text" name="" class="form-control" required placeholder="Account type" value="<?php echo strtoupper($account_detail[0]->account_type); ?>" disabled />
				  </div>
				  <br/>
				 
				
				  <!-- /.form group -->
				  <div class="input-group">
					<span class="input-group-addon"><i class="fa fa-user"></i></span>
					<input type="text" name="user_account_name" class="form-control" required placeholder="Account Title" value="<?php echo $account_detail[0]->user_account_name; ?>" />
				  </div>
				  <br/>
				 
				 
				  <div class="input-group">
					<span class="input-group-addon"><i class="fa fa-user"></i></span>
					<textarea  name="account_token" class="form-control" style="height: 250px;" placeholder="Access Token"><?php  echo $account_detail[0]->account_token; ?></textarea>
				  </div>
				  <br/>
			
				  
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