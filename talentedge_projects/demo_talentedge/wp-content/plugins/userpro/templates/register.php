<a href="#" class="userpro-close-popup"><?php _e('Close','userpro'); ?></a>
<div class="userpro userpro-<?php echo $i; ?> userpro-<?php echo $layout; ?>" <?php userpro_args_to_data( $args ); ?>>
	
	<div class="userpro-head">

		<div class="userpro-left"><?php echo $args["{$template}_heading"]; ?></div>
		<?php if ($args["{$template}_side"]) { ?>
		<div class="userpro-right"><a href="#" data-template="<?php echo $args["{$template}_side_action"]; ?>"><?php echo $args["{$template}_side"]; ?></a></div>
		<?php } ?>
		<div class="userpro-clear"></div>
	</div>
	
	<div class="userpro-body">
	<?php   if(isset($args["form_role"]))
		 $_SESSION['form_role']=$args["form_role"];
		else
		 $_SESSION['form_role']='';
		?>
		<?php do_action('userpro_pre_form_message'); ?>

		<form action="" method="post" data-action="<?php echo $template; ?>">
		
			<input type="hidden" name="redirect_uri-<?php echo $i; ?>" id="redirect_uri-<?php echo $i; ?>" value="<?php if (isset( $args["{$template}_redirect"] ) ) echo $args["{$template}_redirect"]; ?>" />
			
			<?php // Hook into fields $args, $user_id
			if (!isset($user_id)) $user_id = 0;
			$hook_args = array_merge($args, array('user_id' => $user_id, 'unique_id' => $i));
			do_action('userpro_before_fields', $hook_args);
			do_action('userpro_inside_form_register');
			?>
			
			<?php
			// Multiple Registration Forms Support
			if (isset($args['type']) && $userpro->multi_type_exists($args['type'])) {
				$group = array_intersect_key( userpro_fields_group_by_template( $template, $args["{$template}_group"] ), array_flip($userpro->multi_type_get_array($args['type'])) );
			} else {
				$group = userpro_fields_group_by_template( $template, $args["{$template}_group"] );
			}
			?>
		
			<?php foreach( $group as $key => $array ) { ?>
				<?php if($key=='billing_state'){
						if ($array) echo userpro_edit_field( $key, $array, $i, $args ); ?>
					    <div class="userpro-field userpro-field-billing_state_temp  even" data-key="billing_state_temp"  style="display:none;position:relative">
							<div class="userpro-input">
							 
							 <select id="signupStatefields" class="signupStatefields" name="state_temp" data-ui="0" data-ajax="0" data-multiple="0" data-placeholder="Select" data-allow_null="0"><option value="" selected>---Select State---</option><option value="AP">Andhra Pradesh</option><option value="AR">Arunachal Pradesh</option><option value="AS">Assam</option><option value="BR">Bihar</option><option value="CT">Chhattisgarh</option><option value="GA">Goa</option><option value="GJ">Gujarat</option><option value="HR"  >Haryana</option><option value="HP">Himachal Pradesh</option><option value="JK">Jammu &amp; Kashmir</option><option value="JH">Jharkhand</option><option value="KA">Karnataka</option><option value="KL">Kerala</option><option value="MP">Madhya Pradesh</option><option value="MH">Maharashtra</option><option value="MN">Manipur</option><option value="ML">Meghalaya</option><option value="MZ">Mizoram</option><option value="NL">Nagaland</option><option value="OR">Odisha</option><option value="PB">Punjab</option><option value="RJ">Rajasthan</option><option value="SK">Sikkim</option><option value="TN">Tamil Nadu</option><option value="TR">Tripura</option><option value="UK">Uttarakhand</option><option value="UP">Uttar Pradesh</option><option value="WB">West Bengal</option><option value="AN">Andaman &amp; Nicobar</option><option value="CH">Chandigarh</option><option value="DN">Dadra and Nagar Haveli</option><option value="DD">Daman &amp; Diu</option><option value="DL">Delhi</option><option value="LD">Lakshadweep</option><option value="PY">Puducherry</option></select>				

							</div>
							</div>
							
							<div class="userpro-clear"></div>
				<?php	}else{					
							if ($array) echo userpro_edit_field( $key, $array, $i, $args );
				
					}
				} ?>
			
			<?php // Hook into fields $args, $user_id
			if (!isset($user_id)) $user_id = 0;
			$hook_args = array_merge($args, array('user_id' => $user_id, 'unique_id' => $i));
			do_action('userpro_after_fields', $hook_args);
			?>
						
			<?php // Hook into fields $args, $user_id
			if (!isset($user_id)) $user_id = 0;
			$hook_args = array_merge($args, array('user_id' => $user_id, 'unique_id' => $i));
			do_action('userpro_before_form_submit', $hook_args);
			?>
			
			<?php if ($args["{$template}_button_primary"] ||  $args["{$template}_button_secondary"] ) { ?>
			<div class="userpro-field userpro-submit userpro-column">
			
				<?php // Hook into fields $args, $user_id
				if (!isset($user_id)) $user_id = 0;
				$hook_args = array_merge($args, array('user_id' => $user_id, 'unique_id' => $i));
				if(userpro_get_option('sociallogin')=='1')				
				do_action('userpro_inside_form_submit', $hook_args);
				?>
				
				<?php if ($args["{$template}_button_primary"]) { ?>
				<input type="submit" value="<?php echo $args["{$template}_button_primary"]; ?>" class="userpro-button" />
				<?php } ?>
				
				<?php if ($args["{$template}_button_secondary"]) { ?>
				<input type="button" value="<?php echo $args["{$template}_button_secondary"]; ?>" class="userpro-button secondary" data-template="<?php echo $args["{$template}_button_action"]; ?>" />
				<?php } ?>

				<img src="<?php echo $userpro->skin_url(); ?>loading.gif" alt="" class="userpro-loading" />
				<div class="userpro-clear"></div>
				
			</div>
			<?php } ?>
		
		</form>
	
	</div>

</div>
<script>

$('.registerdiv .signupStatefields').on('change',function(){
	
	$('.registerdiv .userpro-field-billing_state input').val($(this).val());
	if($(this).val()!=''){
		$('.registerdiv .userpro-field-billing_state_temp .userpro-warning').remove();
	}
})	
	
$('.registerdiv .userpro-field-billing_country select').on('change',function(){
	
	$('.registerdiv .userpro-field-billing_state_temp select').val('');
	$('.registerdiv .userpro-field-billing_state input').val('');
	if($(this).val()=='India'){
		$('.registerdiv .userpro-field-billing_state_temp').show();
		$('.registerdiv .userpro-field-billing_state').hide();
	}else{
		$('.registerdiv .userpro-field-billing_state_temp').hide();
		$('.registerdiv .userpro-field-billing_state').show();		
	}
})

$('.registerdiv .userpro-button').on('click',function(){
	 
	if($('.registerdiv .userpro-field-billing_country select').val()=='India'){
		  
		if($('.registerdiv .userpro-field-billing_state_temp select').val()==''){
			 
			$('.registerdiv .userpro-field-billing_state_temp').append('<div class="userpro-warning" style="top: 0px; opacity: 1;"><i class="userpro-icon-caret-up"></i>This field is required</div>');
		}
	}
	 
	
})

</script>
