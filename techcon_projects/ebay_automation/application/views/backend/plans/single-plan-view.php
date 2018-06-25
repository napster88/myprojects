
<div class="content-wrapper" style="min-height: 946px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        View Plan
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Plans</li>
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
              <h3 class="box-title">Plan Details</h3>
            </div>
				<div class="box-body">
				<div class="row">
					<div class="col-md-6">
					  <div class="input-group">
						<span class="input-group-addon"><i class="fa fa-circle-o"></i></span>
						<input type="text" name="title" class="form-control" required placeholder="Page Title" value="<?php echo $pagedata[0]->title; ?>" />
					  </div>
					  <br/>
					  <!-- /.form group -->
					</div>
					<div class="col-md-6">
					  <div class="input-group">
						<span class="input-group-addon"><i class="fa fa-circle-o"></i></span>
						<input type="text" disabled class="form-control" required placeholder="Menu Slug (ex: page-title)" value="<?php echo $pagedata[0]->slug; ?>" />
					  </div>
					  <br/>
					  <!-- /.form group -->
					</div>
				</div>
				  <textarea id="editor1" name="description" required rows="10" cols="80"><?php echo $pagedata[0]->description; ?></textarea>
					<br/>
					<div class="row">
						<div class="col-md-3">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-circle-o"></i></span>
								<input type="number" min="1" name="menu_order" class="form-control" placeholder="Menu Order" value="<?php echo $pagedata[0]->menu_order; ?>" />
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
									<option value="left" <?php if($pagedata[0]->layout=='left'){echo 'selected';} ?> >Left Layout</option>
									<option value="right" <?php if($pagedata[0]->layout=='right'){echo 'selected';} ?> >Right Layout</option>
									<option value="full" <?php if($pagedata[0]->layout=='full'){echo 'selected';} ?> >Full Layout</option>
								</select>
							</div>
							<br/>
							<!-- /.form group -->
						</div>
						<div class="col-md-3">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-circle-o"></i></span>
								<select name="status" class="form-control" required >
									<option value="1" <?php if($pagedata[0]->status=='1'){echo 'selected';} ?> >Publish</option>
									<option value="2" <?php if($pagedata[0]->status=='2'){echo 'selected';} ?> >Hide</option>
								</select>
							</div>
							<br/>
							<!-- /.form group -->
						</div>
					</div>
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