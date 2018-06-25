<?php 
define( 'WPL_PLUGIN_PATH', plugin_dir_url('../',__FILE__));?>
<script type="text/javascript">
<?php global $userpro; ?>
	jQuery(document).ready(function(){
           		
		  var html='<form id="wplLoginUserFrm" action="" method="get">';
			html+='<input type="hidden" id="wplUsername" name="wplUsername" value=""/>';
			html+='<input type="hidden" id="wplDisplayName" name="wplDisplayName" value=""/>'
			html+='<input type="hidden" id="wplProfilePic" name="wplProfilePic" value=""/>',
			html+='<input type="hidden" id="wplPosition" name="wplPosition" value=""/>',
			html+='<input type="hidden" id="wplFirstname" name="wplFirstname" value=""/>',
			html+='<input type="hidden" id="wplLastname" name="wplLastname" value=""/>',
			html+='<input type="hidden" id="wplIndustry" name="wplIndustry" value=""/>',
			html+='<input type="hidden" id="wplLocation" name="wplLocation" value=""/>',
			html+='<input type="hidden" id="wplCompanyname" name="wplCompanyname" value=""/>',
			html+='<input type="hidden" id="wplSocialNetwork" name="wplSocialNetwork" value=""/>',
			html+='<input type="hidden" id="wplLinkedinCheck" name="wplLinkedinCheck" value=""/>',	
			html+='<input type="hidden" id="wplEmail" name="wplEmail" value=""/>',
			html+='<input type="hidden" name="_wpnonce" value="<?php echo wp_create_nonce('linkedin_auth');?>">'
		    html+='</form>';

	      jQuery('body').append(html);
		jQuery('.wplLiLoginBtn').click(function(){
			wplLoginLinkedIn();
		});
	});
	var wpl_lUserName='';
	var wpl_lUserId='';
	var wpl_lUserEmail='';
	var wpl_ProfilePic='';
	var wpl_Position='';
	var wpl_Firstname='';
	var wpl_Lastname='';
	var wpl_Industry='';
	var wpl_Location='';
	var wpl_Companyname='';
	var wpl_socialNetwork='';
	var wpl_linkedinCheck='';
	var wpl_linkedin_auth_window;
	function wplLoginLinkedIn(){
		wpl_linkedin_auth_window=window.open('<?php echo WPL_PLUGIN_PATH;?>userpro/lib/linkedin-auth/linkedinAuth.php?plugin_url=<?php echo WPL_PLUGIN_PATH;?>&k=<?php echo userpro_get_option('linkedin_app_key');?>&s=<?php echo userpro_get_option('linkedin_Secret_Key');?>','name','width=600,height=500');
	}
	function wpl_set_linkedin_data(){
       jQuery('#wplUsername').val(wpl_lUserId);
		jQuery('#wplDisplayName').val(wpl_lUserName);
		jQuery('#wplEmail').val(wpl_lUserEmail);
		jQuery('#wplProfilePic').val(wpl_ProfilePic);
		jQuery('#wplPosition').val(wpl_Position);
		jQuery('#wplFirstname').val(wpl_Firstname);
		jQuery('#wplLastname').val(wpl_Lastname);
		jQuery('#wplIndustry').val(wpl_Industry);
		jQuery('#wplLocation').val(wpl_Location);
		jQuery('#wplCompanyname').val(wpl_Companyname);
		jQuery('#wplSocialNetwork').val(wpl_socialNetwork);
		jQuery('#wplLinkedinCheck').val(wpl_linkedinCheck);
	    jQuery('#wplLoginUserFrm').submit();
	}
</script>
