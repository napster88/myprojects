jQuery(document).ready(function(){
	
	/**************************/
	/**** Generate uniq id ****/
	/**************************/
	
	function talentedge_uniqid(prefix, more_entropy) {

	  if (typeof prefix === 'undefined') {
		prefix = '';
	  }

	  var retId;
	  var formatSeed = function(seed, reqWidth) {
		seed = parseInt(seed, 10)
		  .toString(16); // to hex str
		if (reqWidth < seed.length) { // so long we split
		  return seed.slice(seed.length - reqWidth);
		}
		if (reqWidth > seed.length) { // so short we pad
		  return Array(1 + (reqWidth - seed.length))
			.join('0') + seed;
		}
		return seed;
	  };

	  // BEGIN REDUNDANT
	  if (!this.php_js) {
		this.php_js = {};
	  }
	  // END REDUNDANT
	  if (!this.php_js.uniqidSeed) { // init seed with big random int
		this.php_js.uniqidSeed = Math.floor(Math.random() * 0x75bcd15);
	  }
	  this.php_js.uniqidSeed++;

	  retId = prefix; // start with prefix, add current milliseconds hex string
	  retId += formatSeed(parseInt(new Date()
		.getTime() / 1000, 10), 8);
	  retId += formatSeed(this.php_js.uniqidSeed, 5); // add seed hex string
	  if (more_entropy) {
		// for more entropy we add a float lower to 10
		retId += (Math.random() * 10)
		  .toFixed(8)
		  .toString();
	  }

	  return retId;
	}

	function talentedge_refresh_general_control_values(){
		jQuery(".talentedge_general_control_droppable").each(function(){
			var values = [];
			var th = jQuery(this);
			th.find(".talentedge_general_control_repeater_container").each(function(){
				var icon_value = jQuery(this).find('select').val();
				var text = jQuery(this).find(".talentedge_text_control").val();
				var link = jQuery(this).find(".talentedge_link_control").val();
				var label = jQuery(this).find(".talentedge_label_control").val();
				var subtext = jQuery(this).find(".talentedge_subtext_control").val();
				var description = jQuery(this).find(".talentedge_description_control").val();
				var image_url = jQuery(this).find(".custom_media_url").val();
				var id = jQuery(this).find(".talentedge_box_id").val();
				if( (icon_value != '') || (text != '') || (image_url != '') || (subtext != '') || (label != '') || (link != '') || (description != '') ){
					values.push({
						"icon_value" : icon_value,
						"text" : text,
						"link" : link,
						"image_url" : image_url,
						"subtext" : subtext,
						"label" : label,
						"link"  : link,
						"description" : description,
						"id" : id
					});
				}

			});

			th.find('.talentedge_repeater_colector').val(JSON.stringify(values));
			th.find('.talentedge_repeater_colector').trigger('change');
		});
	}

    jQuery('#customize-theme-controls').on('click','.talentedge-customize-control-title',function(){
        jQuery(this).next().slideToggle();
    });
    function media_upload(button_class) {

		jQuery('body').on('click', button_class, function(e) {
			var button_id ='#'+jQuery(this).attr('id');
			var display_field = jQuery(this).parent().children('input:text');
			var _custom_media = true;

			wp.media.editor.send.attachment = function(props, attachment){
				if ( _custom_media  ) {
					if(typeof display_field != 'undefined'){
						switch(props.size){
							case 'full':
								display_field.val(attachment.sizes.full.url);
								display_field.trigger('change');
								break;
							case 'medium':
								display_field.val(attachment.sizes.medium.url);
								display_field.trigger('change');
								break;
							case 'thumbnail':
								display_field.val(attachment.sizes.thumbnail.url);
								display_field.trigger('change');
								break;
							case 'talentedge_team':
								display_field.val(attachment.sizes.talentedge_team.url);
								display_field.trigger('change');
								break
							case 'talentedge_services':
								display_field.val(attachment.sizes.talentedge_services.url);
								display_field.trigger('change');
								break
							case 'talentedge_customers':
								display_field.val(attachment.sizes.talentedge_customers.url);
								display_field.trigger('change');
								break;
							default:
								display_field.val(attachment.url);
								display_field.trigger('change');
						}
					}
					_custom_media = false;
				} else {
					return wp.media.editor.send.attachment( button_id, [props, attachment] );
				}
			}
			wp.media.editor.open(button_class);
			window.send_to_editor = function(html) {

			}
			return false;
		});
	}

    media_upload('.custom_media_button_shop_isle');
    jQuery(".custom_media_url").live('change',function(){
        talentedge_refresh_general_control_values();
        return false;
    });

	jQuery("#customize-theme-controls").on('change', '.talentedge_icon_control',function(){
		talentedge_refresh_general_control_values();
		return false;
	});

	jQuery(".talentedge_general_control_new_field").on("click",function(){

		var th = jQuery(this).parent();
		var id = 'talentedge_' + talentedge_uniqid();
		if(typeof th != 'undefined') {

            var field = th.find(".talentedge_general_control_repeater_container:first").clone();
            if(typeof field != 'undefined'){
                field.find(".talentedge_general_control_remove_field").show();
                field.find("select").val('');
                field.find(".talentedge_text_control").val('');
                field.find(".talentedge_link_control").val('');
				field.find(".talentedge_label_control").val('');
				field.find(".talentedge_subtext_control").val('');
				field.find(".talentedge_box_id").val(id);
                field.find(".custom_media_url").val('');
                th.find(".talentedge_general_control_repeater_container:first").parent().append(field);
                talentedge_refresh_general_control_values();
            }

		}
		return false;
	 });

	jQuery("#customize-theme-controls").on("click", ".talentedge_general_control_remove_field",function(){
		if( typeof	jQuery(this).parent() != 'undefined'){
			jQuery(this).parent().parent().remove();
			talentedge_refresh_general_control_values();
		}
		return false;
	});

	jQuery("#customize-theme-controls").on('keyup', '.talentedge_text_control',function(){
		 talentedge_refresh_general_control_values();
	});

	jQuery("#customize-theme-controls").on('keyup', '.talentedge_link_control',function(){
		talentedge_refresh_general_control_values();
	});

	jQuery("#customize-theme-controls").on('keyup', '.talentedge_label_control',function(){
		talentedge_refresh_general_control_values();
	});

	jQuery("#customize-theme-controls").on('keyup', '.talentedge_subtext_control',function(){
		talentedge_refresh_general_control_values();
	});

	jQuery("#customize-theme-controls").on('keyup', '.talentedge_description_control',function(){
		talentedge_refresh_general_control_values();
	});

	/*Drag and drop to change order*/
	jQuery(".talentedge_general_control_droppable").sortable({
		update: function( event, ui ) {
			talentedge_refresh_general_control_values();
		}
	});


	/* Forum and Documentation links in customizer */

	jQuery( '#customize-theme-controls > ul' ).prepend('<li class="accordion-section talentedge-upsells">');

	jQuery( '.talentedge-upsells' ).append('<a style="width: 80%; margin: 5px auto 5px auto; display: block; text-align: center;" href="http://themeisle.com/forums/forum/shopisle/" class="button" target="_blank">{support}</a>'.replace('{support}',objectL10n.support));

	jQuery( '.talentedge-upsells' ).append('<a style="width: 80%; margin: 5px auto 5px auto; display: block; text-align: center;" href="http://themeisle.com/documentation-talentedge/" class="button" target="_blank">{documentation}</a>'.replace('{documentation}',objectL10n.documentation));

	jQuery( '#customize-theme-controls > ul' ).prepend('</li>');

	jQuery('.preview-notice').append('<a class="talentedge-upgrade-to-pro-button" href="http://themeisle.com/themes/talentedge-pro/" class="button" target="_blank">{pro}</a>'.replace('{pro}',objectL10n.pro));
});
