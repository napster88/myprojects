
<div class="content-wrapper" style="min-height: 946px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Vehicle
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Vehicles</a></li>
        <li class="active">Add Vehicle</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Vehicle Details</h3>
            </div>
			<div style="color:#ff0000;margin: 10px;">
			<?php echo validation_errors(); ?>
			<?php if($this->session->flashdata('flashdata')){ echo '<p>'.$this->session->flashdata('flashdata').'</p>'; }?>
			</div>
			<form method="post" action="<?php echo base_url('services/addservice'); ?>" enctype="multipart/form-data" >
				<div class="box-body">
					<div class="row">
						<div class="col-md-6">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-circle-o"></i></span>
								<input type="text" name="vehicle_name" class="form-control" required placeholder="Vehicle Name" value="<?php echo set_value('vehicle_name'); ?>" />
							</div>
							<br/>
							<!-- /.form group -->
						</div>
						<div class="col-md-6">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-circle-o"></i></span>
								<input type="text" name="vehicle_no" class="form-control" required placeholder="Vehicle Number" value="<?php echo set_value('vehicle_no'); ?>" />
							</div>
							<br/>
							<!-- /.form group -->
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-circle-o"></i></span>
								<select name="vehicle_cat" class="form-control" required >
									<option value="">Vehicle Category</option>
								</select>
							</div>
							<br/>
							<!-- /.form group -->
						</div>
						<div class="col-md-6">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-circle-o"></i></span>
								<select name="vehicle_type" class="form-control" required >
									<option value="">Vehicle Type</option>
								</select>
							</div>
							<br/>
							<!-- /.form group -->
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-circle-o"></i></span>
								<select name="vehicle_company" class="form-control" required >
									<option value="">Vehicle Company</option>
								</select>
							</div>
							<br/>
							<!-- /.form group -->
						</div>
						<div class="col-md-6">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-circle-o"></i></span>
								<select name="vehicle_driver" class="form-control" required >
									<option value="">Vehicle Driver</option>
									<?php if(!empty($driverlist)){
										foreach($driverlist as $driver){
											echo '<option value="'.$driver->id.'">'.$driver->fname.' '.$driver->lname.'</option>';
										}
									}?>
								</select>
							</div>
							<br/>
							<!-- /.form group -->
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-circle-o"></i></span>
								<textarea name="vehicle_detail" class="form-control" rows="10" required placeholder="Vehicle Details" ></textarea>
							</div>
							<br/>
							<!-- /.form group -->
						</div>
					</div>
				</div>
				<!-- /.box-body -->
				<div class="box-footer">
					<button type="submit" class="btn btn-primary">Add Vehicle</button>
				</div>
			</form>
          </div>
          <!-- /.box -->
        </div>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>