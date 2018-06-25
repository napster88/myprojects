<div id="content" class="span10">
    <!-- content starts -->
    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header well" data-original-title>
                &nbsp;
                <div class="box-icon">
                </div>
            </div>
            <div class="box-content">
                <form class="form-horizontal" action="<?= base_url('driver/add_driver');  ?>" method="post" enctype="multipart/form-data">
                    <fieldset>
                        <legend> <?php echo lang("add_driver"); ?> </legend>
                        <p class="help-block">	<?php echo isset($message) ? $message : ''; ?>   </p>

                        <div class="control-group" id="titlegroup">
                            <label class="control-label" for="typeahead">Name English</label>
                            <div class="controls">
                                <input type="text" class="span6 typeahead" name="name_en" value="<?php echo isset($data['prod_num']) ? $data['prod_num'] : ''; ?>" id="typeahead"  data-provide="typeahead" data-items="4" data-source='[]'>
                                <p class="help-block">	<?php echo form_error('Cform[prod_num]'); ?>   </p>
                               <!--	<p class="help-block">Start typing to activate auto complete!</p>     -->
                            </div>
                        </div>
                        
                        <div class="control-group" id="titlegroup">
                            <label class="control-label" for="typeahead">Name Arabic</label>
                            <div class="controls">
                                <input type="text" class="span6 typeahead" name="name_ar" value="<?php echo isset($data['prod_num_en']) ? $data['prod_num_en'] : ''; ?>" id="typeahead"  data-provide="typeahead" data-items="4" data-source='[]'>
                                <p class="help-block">	<?php echo form_error('Cform[prod_num_en]'); ?>   </p>
                               <!--	<p class="help-block">Start typing to activate auto complete!</p>     -->
                            </div>
                        </div>

                        <div class="control-group" id="titlegroup">
                            <label class="control-label" for="typeahead">Car Type</label>
                            <div class="controls">
                                <input type="text" class="span6 typeahead" name="car_type" value="<?php echo isset($data['name']) ? $data['name'] : ''; ?>" id="typeahead"  data-provide="typeahead" data-items="4" data-source='[]'>
                                <p class="help-block">	<?php echo form_error('Cform[name]'); ?>   </p>
                               <!--	<p class="help-block">Start typing to activate auto complete!</p>     -->
                            </div>
                        </div>

                        <div class="control-group" id="titlegroup">
                            <label class="control-label" for="typeahead">Car Number</label>
                            <div class="controls">
                                <input type="text" class="span6 typeahead" name="car_number" value="<?php echo isset($data['name_en']) ? $data['name_en'] : ''; ?>" id="typeahead"  data-provide="typeahead" data-items="4" data-source='[]'>
                                <p class="help-block">	<?php echo form_error('Cform[name_en]'); ?>   </p>
                               <!--	<p class="help-block">Start typing to activate auto complete!</p>     -->
                            </div>
                        </div>

                        <div class="control-group" id="titlegroup">
                            <label class="control-label" for="typeahead">Driving licence</label>
                            <div class="controls">
                                <input type="text" class="span6 typeahead" name="driver_licence_number" value="<?php echo isset($data['min_charge']) ? $data['min_charge'] : ''; ?>" id="typeahead"  data-provide="typeahead" data-items="4" data-source='[]'>
                                <p class="help-block">	<?php echo form_error('Cform[min_charge]'); ?>   </p>
                               <!--	<p class="help-block">Start typing to activate auto complete!</p>     -->
                            </div>
                        </div>
                        
                        
                        <div class="form-actions">
			<button type="submit" class="btn btn-primary"><?php echo lang("SaveChanges") ;?></button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>