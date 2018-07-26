
<div class="content-wrapper" style="min-height: 946px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Plan
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Plans</a></li>
        <li class="active">Add Plan</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Plan Details</h3>
            </div>
			<div style="color:#ff0000;margin: 10px;">
			<?php echo validation_errors(); ?>
			<?php if($this->session->flashdata('flashdata')){ echo '<p>'.$this->session->flashdata('flashdata').'</p>'; }?>
			</div>
			<form method="post" action="<?php echo base_url('plans/addplan'); ?>" enctype="multipart/form-data" >
				<div class="box-body">
				<div class="row">
					<div class="col-md-6">
					  <div class="input-group">
						<span class="input-group-addon"><i class="fa fa-circle-o"></i></span>
						<input type="text" name="title" class="form-control" required placeholder="Page Title" value="<?php echo set_value('title'); ?>" />
					  </div>
					  <br/>
					  <!-- /.form group -->
					</div>
					<div class="col-md-6">
					  <div class="input-group">
						<span class="input-group-addon"><i class="fa fa-circle-o"></i></span>
						<input type="text" name="slug" class="form-control" required placeholder="Menu Slug (ex: page-title)" value="<?php echo set_value('slug'); ?>" />
					  </div>
					  <br/>
					  <!-- /.form group -->
					</div>
				</div>
				  <textarea id="editor1" name="description" required rows="10" cols="80">This is text editor</textarea>
					<br/>
					<div class="row">
						<div class="col-md-3">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-circle-o"></i></span>
								<input type="number" min="1" name="menu_order" class="form-control" placeholder="Menu Order" value="<?php echo set_value('menu_order'); ?>" />
							</div>
							<br/>
							<!-- /.form group -->
						</div>
						<div class="col-md-3">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-circle-o"></i></span>
								<select name="parent" class="form-control" >
									<option value="" >Parent Page</option>
									<option value="right">Right Layout</option>
									<option value="full">Full Layout</option>
								</select>
							</div>
							<br/>
							<!-- /.form group -->
						</div>
						<div class="col-md-3">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-circle-o"></i></span>
								<select name="layout" class="form-control" required >
									<option value="left" selected >Left Layout</option>
									<option value="right">Right Layout</option>
									<option value="full">Full Layout</option>
								</select>
							</div>
							<br/>
							<!-- /.form group -->
						</div>
						<div class="col-md-3">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-circle-o"></i></span>
								<select name="status" class="form-control" required >
									<option value="1" selected >Publish</option>
									<option value="2">Hide</option>
								</select>
							</div>
							<br/>
							<!-- /.form group -->
						</div>
					</div>
				</div>
				<!-- /.box-body -->
				<div class="box-footer">
					<button type="submit" class="btn btn-primary">Add Plan</button>
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