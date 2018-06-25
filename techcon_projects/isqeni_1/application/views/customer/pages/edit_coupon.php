<div id="content" class="span10">
    <div>
        <ul class="breadcrumb">
            <li>
                <a href="<?php echo site_url("administrator/home") ?>"><?php echo lang("Home"); ?></a> <span class="divider">/</span>
            </li>
            <li>
                <a href="<?php echo site_url("administrator/products/") ?>"><?php echo lang("Products"); ?></a>
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
			<?php $data=$coupon_data[0]; ?>
          
            <div class="box-content">
                <form class="form-horizontal" action="<?php echo base_url('coupon/edit_coupon_confirm/'.$data['id']); ?>" method="post" enctype="multipart/form-data">
                    <fieldset>
                        <legend><?php echo lang("vouchers"); ?></legend>
                        <div class="control-group" id="titlegroup">
                            <label class="control-label" for="typeahead"><?php echo lang("coupon_title"); ?></label>
                            <div class="controls">
                                <input type="text" class="span6 typeahead" name="Cform[coupon_title]" value="<?php echo isset($data['coupon_title']) ? $data['coupon_title'] : ''; ?>" id="typeahead"  data-provide="typeahead" data-items="4" data-source='[]'>
                                <p class="help-block">	<?php // echo form_error('Cform[coupon_title]'); ?>   </p>
                               <!--	<p class="help-block">Start typing to activate auto complete!</p>     -->
                            </div>
                        </div>
                        <div class="control-group" id="titlegroup">
                            <label class="control-label" for="typeahead"><?php echo lang("coupon_code"); ?></label>
                            <div class="controls">
                                <input type="text" class="span6 typeahead" name="Cform[coupon_code]" value="<?php echo isset($data['coupon_code']) ? $data['coupon_code'] : ''; ?>" id="typeahead"  data-provide="typeahead" data-items="4" data-source='[]'>
                               
                                <p class="help-block">	<?php // echo form_error('Cform[coupon_code]'); ?>   </p>
                               <!--	<p class="help-block">Start typing to activate auto complete!</p>     -->
                            </div>
                        </div>
                        <div class="control-group" id="titlegroup">
                            <label class="control-label" for="typeahead"><?php echo lang("start_date"); ?></label>
                            <div class="controls">
                                <input type="text" class="span6 typeahead" name="Cform[start_date]" value="<?php echo isset($data['start_date']) ? $data['start_date'] : ''; ?>" id="typeahead"  data-provide="typeahead" data-items="4" data-source='[]'>
                                <p class="help-block">	<?php // echo form_error('Cform[start_date]'); ?>   </p>
                               <!--	<p class="help-block">Start typing to activate auto complete!</p>     -->
                            </div>
                        </div>
                        <div class="control-group" id="titlegroup">
                            <label class="control-label" for="typeahead"><?php echo lang("end_date"); ?></label>
                            <div class="controls">
                                <input type="text" class="span6 typeahead" name="Cform[end_date]" value="<?php echo isset($data['end_date']) ? $data['end_date'] : ''; ?>" id="typeahead"  data-provide="typeahead" data-items="4" data-source='[]'>
                                <p class="help-block">	<?php // echo form_error('Cform[end_date]'); ?>   </p>
                               <!--	<p class="help-block">Start typing to activate auto complete!</p>     -->
                            </div>
                        </div>
                        <div class="control-group" id="titlegroup">
                            <label class="control-label" for="typeahead"><?php echo lang("product_id"); ?></label>
                            <div class="controls">
                                <input type="number" class="span6 typeahead" name="Cform[product_id]" value="<?php echo isset($data['product_id']) ? $data['product_id'] : ''; ?>" id="typeahead"  data-provide="typeahead" data-items="4" data-source='[]'>
                                <p class="help-block">	<?php // echo form_error('Cform[product_id]'); ?>   </p>
                               <!--	<p class="help-block">Start typing to activate auto complete!</p>     -->
                            </div>
                        </div>
                        <div class="control-group" id="titlegroup">
                            <label class="control-label" for="typeahead"><?php echo lang("status"); ?></label>
                            <div class="controls">
                                <input type="text" class="span6 typeahead" name="Cform[status]" value="<?php echo isset($data['status']) ? $data['status'] : ''; ?>" id="typeahead"  data-provide="typeahead" data-items="4" data-source='[]'>
                                <p class="help-block">	<?php // echo form_error('Cform[status]'); ?>   </p>
                               <!--	<p class="help-block">Start typing to activate auto complete!</p>     -->
                            </div>
                        </div>

                        <div class="control-group" id="titlegroup">
                            <label class="control-label" for="typeahead"><?php echo lang("Coupon_type"); ?></label>
                            <div class="controls">
                                <input type="text" class="span6 typeahead" name="Cform[type]" value="<?php echo isset($data['type']) ? $data['type'] : ''; ?>" id="typeahead"  data-provide="typeahead" data-items="4" data-source='[]'>
                                <p class="help-block">	<?php // echo form_error('Cform[type]'); ?>   </p>
                               <!--	<p class="help-block">Start typing to activate auto complete!</p>     -->
                            </div>
                        </div>
    <div class="control-group" id="titlegroup">
                            <label class="control-label" for="typeahead"><?php echo lang("Coupon_value"); ?></label>
                            <div class="controls">
                                <input type="text" class="span6 typeahead" name="Cform[value]" value="<?php echo isset($data['value']) ? $data['value'] : ''; ?>" id="typeahead"  data-provide="typeahead" data-items="4" data-source='[]'>
                                <p class="help-block">	<?php // echo form_error('Cform[value]'); ?>   </p>
                               <!--	<p class="help-block">Start typing to activate auto complete!</p>     -->
                            </div>
                        </div>
                        
                        <div class="control-group" id="titlegroup">
                            <label class="control-label" for="typeahead"><?php echo lang("percentage"); ?></label>
                            <div class="controls">
                                <input type="text" class="span6 typeahead" name="Cform[percentage]" value="<?php echo isset($data['percentage']) ? $data['percentage'] : ''; ?>" id="typeahead"  data-provide="typeahead" data-items="4" data-source='[]'>
                                <p class="help-block">	<?php // echo form_error('Cform[percentage]'); ?>   </p>
                               <!--	<p class="help-block">Start typing to activate auto complete!</p>     -->
                            </div>
                        </div>
                        
                        <div class="control-group" id="titlegroup">
                            <label class="control-label" for="typeahead"><?php echo lang("flat_value"); ?></label>
                            <div class="controls">
                                <input type="text" class="span6 typeahead" name="Cform[flat_value]" value="<?php echo isset($data['flat_value']) ? $data['flat_value'] : ''; ?>" id="typeahead"  data-provide="typeahead" data-items="4" data-source='[]'>
                                <p class="help-block">	<?php // echo form_error('Cform[flat_value]'); ?>   </p>
                               <!--	<p class="help-block">Start typing to activate auto complete!</p>     -->
                            </div>
                        </div>
                        
                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary"><?php echo lang("SaveChanges"); ?></button>
                            <button type="reset" class="btn"><?php echo lang("Cancel"); ?></button>

                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
