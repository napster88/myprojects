
<div id="content" class="span10">
			<!-- content starts -->


			<div>
				<ul class="breadcrumb">
					<li>
						<a href="<?php echo site_url("administrator/home")?>"><?php echo lang("Home") ;?></a> <span class="divider">/</span>
					</li>
                    <li>
					   <a href="<?php echo site_url("administrator/branchs/")?>">الدول</a> <span class="divider">/</span>
					</li>
					<li>
						<?php echo lang("Add") ;?>
					</li>
				</ul>
			</div>
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						&nbsp;
						<div class="box-icon">

						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
						  <fieldset>
						 <legend>الدول</legend>
                         <p class="help-block">	<?php echo isset($message) ?$message : ''  ;?>   </p>
							<div class="control-group" id="titlegroup">
							  <label class="control-label" for="typeahead">اسم الدولة</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" name="Cform[name]" value="<?php echo isset($data['name']) ? $data['name'] : '';?>" id="typeahead"  data-provide="typeahead" data-items="4" data-source='[]'>
							   <p class="help-block">	<?php echo form_error('Cform[name]')  ;?>   </p>
							  <!--	<p class="help-block">Start typing to activate auto complete!</p>     -->
							  </div>
							</div>

                            <div class="control-group" id="titlegroup">
							  <label class="control-label" for="typeahead">رقم المستخدم</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" name="Cform[client_id]" value="<?php echo isset($data['client_id']) ? $data['client_id'] : '';?>" id="typeahead"  data-provide="typeahead" data-items="4" data-source='[]'>
							   <p class="help-block">	<?php echo form_error('Cform[client_id]')  ;?>   </p>
							  <!--	<p class="help-block">Start typing to activate auto complete!</p>     -->
							  </div>
							</div>

							<div class="form-actions">
							  <button type="submit" class="btn btn-primary"><?php echo lang("SaveChanges") ;?></button>
							  <button type="reset" class="btn"><?php echo lang("Cancel") ;?></button>
                              <input type="hidden" name="id" value="<?php echo isset($data['id']) ? $data['id'] : $id ; ?>"/>
                              <input type="hidden" name="table" value="branchs"/>
                              <input type="hidden" name="lang_id" value="<?php echo $langId ; ?>"/>
							</div>
						  </fieldset>
						</form>

					</div>
				</div><!--/span-->

			</div><!--/row-->
