<?php
/*
Plugin Name: Wp-Falconide
Version: 1.0
Description: Reconfigures the wp_mail() function to use SMTP instead of mail() and creates an options page to manage the settings.
Author: Falconide
*/

/**
 * @author Falconide
 * @copyright Falconide, 2015, All Rights Reserved
 * This code is released under the GPL licence version 3 or later, available here
 * http://www.gnu.org/licenses/gpl.txt
 */

/**
 * Setting options in wp-config.php
 */
 
if ( ! class_exists( 'class-logs.php' ) ) {
	require_once( 'class-logs.php' );
}

// Array of options and their default values
global $wpms_options;
$wpms_options = array (
	'wpp_api_key' => '',
	'wpp_mail_from' => '',
	'wpp_mail_from_name' => '',
	'wpp_mailer' => 'smtp',
	'wpp_mail_set_return_path' => 'false',
	'wpp_smtp_host' => 'smtp.falconide.com',
	'wpp_smtp_port' => '25',
	'wpp_smtp_ssl' => 'none',
	'wpp_smtp_auth' => false,
	'wpp_smtp_user' => '',
	'wpp_smtp_pass' => ''
);

define('SMTP_HOST', 'smtp.falconide.com');
/**
 * Activation function. This function creates the required options and defaults.
 */
if (!function_exists('wp_falconide_activate')) :
function wp_falconide_activate() {
	
	global $wpms_options;
	
	// Create the required options...
	foreach ($wpms_options as $name => $val) {
		add_option($name,$val);
	}
	
}
endif;

// Whitelist the plugin options in wp
if (!function_exists('wp_falconide_whitelist_options')) :
function wp_falconide_whitelist_options($whitelist_options) {
	
	global $wpms_options;
	
	// Add our options to the array
	$whitelist_options['email'] = array_keys($wpms_options);
	
	return $whitelist_options;
	
}
endif;


// To avoid any (very unlikely) clashes, check if the function alredy exists
if (!function_exists('phpmailer_init_smtp')) :
    // This code is copied, from wp-includes/pluggable.php as at version 2.2.2
    function phpmailer_init_smtp($phpmailer) {
		
		// Check that mailer is not blank, and if mailer=smtp, host is not blank
		if ( ! get_option('wpp_mailer') || ( get_option('wpp_mailer') == 'smtp' && ! SMTP_HOST ) ) {
			return;
		}
		
		/* Set the mailer type as per config above, this overrides the already called isMail method */
		// Set the mailer type as per config above, this overrides the already called isMail method
		$phpmailer->Mailer = get_option('wpp_mailer');
		$mail_from = get_option('wpp_mail_from');
		$mail_from_name = get_option('wpp_mail_from_name');
		if ( !empty($mail_from) )
		    $phpmailer->From = get_option('wpp_mail_from');
	    if ( !empty($mail_from_name) )
		    $phpmailer->FromName = get_option('wpp_mail_from_name');
				
		// Set the Sender (return-path) if required
		if (get_option('wpp_mail_set_return_path'))
			$phpmailer->Sender = $phpmailer->From;
		
		// Set the SMTPSecure value, if set to none, leave this blank
		$phpmailer->SMTPSecure = get_option('wpp_smtp_ssl') == 'none' ? '' : get_option('wpp_smtp_ssl');
		
		// If we're sending via SMTP, set the host
		if (get_option('wpp_mailer') == "smtp") {
		    $phpmailer->IsSMTP();
			
			// Set the SMTPSecure value, if set to none, leave this blank
			$phpmailer->SMTPSecure = get_option('wpp_smtp_ssl') == 'none' ? '' : get_option('wpp_smtp_ssl');
			
			// Set the other options
			$phpmailer->Host = SMTP_HOST;
			$phpmailer->Port = get_option('wpp_smtp_port');
			
			// If we're using smtp auth, set the username & password
			if (get_option('wpp_smtp_auth') == "true") {
				$phpmailer->SMTPAuth = TRUE;
				$phpmailer->Username = get_option('wpp_smtp_user');
				$phpmailer->Password = get_option('wpp_smtp_pass');
			}
		}
		
		// You can add your own options here, see the phpmailer documentation for more info:
		// http://phpmailer.sourceforge.net/docs/
		$phpmailer = apply_filters('wp_falconide_custom_options', $phpmailer);
		
		
		// STOP adding options here.
		
	    add_action('admin_enqueue_scripts', 'wp_falconide_scripts_method');
	
    } // End of phpmailer_init_smtp() function definition
endif;


/**
 * This function used to enqueue the required script files
 */
function wp_falconide_scripts_method() {
	if ( is_admin() ) {
	    if ( !isset($_REQUEST['page']) || !in_array($_REQUEST['page'], array('wp_falconide', 'wp_falconide_logs', 'wp_falconide_stats' ) ) )
	        return false;
		
		wp_register_style( 'wp-falconide', plugins_url( 'wp-falconide/css/wp-falconide-ui.css', false, '1.11.4' ) );
		wp_enqueue_style( 'wp-falconide' );
		wp_deregister_script('jquery-ui');
		wp_register_script('jquery-ui',plugins_url('js/jquery-ui.js', __FILE__), false, '1.11.4');
		wp_enqueue_script('jquery-ui');
   
	
		wp_enqueue_script(
			'custom-script',
			plugins_url('js/jquery.canvasjs.min.js', __FILE__),
			array('jquery')
		);
		wp_enqueue_script(
			'custom-js',
			plugins_url('js/tabs.js', __FILE__),
			array('jquery')
		);
		
		wp_register_style(
			'custom-style',
			plugins_url('css/wp-falconide-style.css', __FILE__), 
			false, '1.00'
		);
		wp_enqueue_style( 'custom-style' );
	}
}
//add_action('wp_enqueue_scripts', 'wp_falconide_scripts_method');
add_action('admin_enqueue_scripts', 'wp_falconide_scripts_method');


/**
 * This function outputs the plugin options page.
 */
if (!function_exists('wp_falconide_options_page')) :
// Define the function
function wp_falconide_options_page() {
	
	// Load the options
	global $wpms_options, $phpmailer;
	
	// Make sure the PHPMailer class has been instantiated 
	// (copied verbatim from wp-includes/pluggable.php)
	// (Re)create it, if it's gone missing
	if ( !is_object( $phpmailer ) || !is_a( $phpmailer, 'PHPMailer' ) ) {
		require_once ABSPATH . WPINC . '/class-phpmailer.php';
		require_once ABSPATH . WPINC . '/class-smtp.php';
		$phpmailer = new PHPMailer( true );
	}

	// Send a test mail if necessary
	if (isset($_POST['wpms_action']) && $_POST['wpms_action'] == __('Send Test', 'wp_falconide') && isset($_POST['to'])) {
		
		if ( !filter_var($_POST['to'], FILTER_VALIDATE_EMAIL) ) { ?>
		     <div id="login_error" class="error fade"><p>Please enter valid email address.</p></div>
			 <?php 
		} else {
		
		    check_admin_referer('test-email');
		
		    // Set up the mail variables
		    $to = $_POST['to'];
		    $subject = !empty($_POST['subject']) ? $_POST['subject'] : 'Falconide: ' . __('Test mail to ', 'wp_falconide') . $to;
		    if ( !empty($_POST['message']) )
			    $message = $_POST['message'];
		    else
			    $message = __('This is a test email generated by the WP falconide WordPress plugin.', 'wp_falconide');
		
		    // Set SMTPDebug to true
		    //$phpmailer->SMTPDebug = 4;
		    //$phpmailer->debug = true;
		
		    // Start output buffering to grab smtp debugging output
		    //ob_start();
		    $phpmailer->do_debug = SMTP::DEBUG_CONNECTION;
		    $error = '';
		    $phpmailer->Debugoutput = function($str, $level) { $error .= $str;};
            try{
		        // Send the test mail
		        $result = wp_mail($to,$subject,$message);
		
		        // Strip out the language strings which confuse users
		        //unset($phpmailer->language);
		        // This property became protected in WP 3.2
		
		    } catch ( phpmailerException $e ) {
        		$error = new WP_Error( 'phpmailer-exception', $e->errorMessage() );
	        } catch ( Exception $e ) {
        		$error = new WP_Error( 'phpmailer-exception-unknown', $e->getMessage() );
	        }
		
		    // Grab the smtp debugging output
		    //$smtp_debug = ob_get_clean();
		
		    //if smtp settings form submitted
		
		
		    // Output the response
		?>
		<?php if ( $result ) { ?>
<div id="message" class="updated fade"><p><strong><?php _e('Test Message Sent Success', 'wp_falconide'); ?></strong></p>
<?php //var_dump($result); 
?>
<?php 
/* uncomment for debugging purposes
<p><?php _e('The full debugging output is shown below:', 'wp_falconide'); ?></p>
<pre><?php var_dump($phpmailer); ?></pre>
<p><?php _e('The SMTP debugging output is shown below:', 'wp_falconide'); ?></p>
<pre><?php echo $smtp_debug ?></pre>
*/ ?>
</div>
<?php } else { 
        $error = $phpmailer->ErrorInfo;
?>
<div id="login_error" class="error fade"><p><strong><?php _e('Error while sending test message.', 'wp_falconide'); ?></strong></p>
    <?php if ( !empty($error) ) {
        echo "<p><strong>$error</strong></p>";
    } ?>
</div>
<?php } ?>
	<?php
		
		    // Destroy $phpmailer so it doesn't cause issues later
		    unset($phpmailer);

	    }
	}//ends else part validations
	
	
	$wp_falconide_option = sanitize_text_field($_REQUEST['wp_falconide_option']);
	$wp_falconide_option = $_REQUEST['wp_falconide_option'];
	
	if( isset($wp_falconide_option) && $wp_falconide_option == 1 ) {
	    $mail_from = sanitize_email($_POST['mail_from']);
	    $mail_from_name = sanitize_email($_POST['mail_from_name']); 
	    $mailer = sanitize_text_field($_POST['mailer']);
	    $mail_set_return_path = sanitize_text_field($_POST['mail_set_return_path']);
	    $smtp_host = sanitize_text_field($_POST['smtp_host']);
	    $smtp_port = intval($_POST['smtp_port']);
	    $smtp_ssl = sanitize_text_field($_POST['smtp_ssl']);
	    $smtp_auth = sanitize_text_field($_POST['smtp_auth']);
	    $smtp_user = sanitize_text_field($_POST['smtp_user']);
	    $smtp_pass = sanitize_text_field($_POST['smtp_pass']);
	    $api_key = sanitize_text_field($_POST['api_key']);
		if ( !empty($mail_from))
			update_option( 'wpp_mail_from', trim($mail_from));
		if ( !empty($mail_from_name) )
			update_option( 'wpp_mail_from_name', trim($mail_from_name));
		if ( !empty($mailer))
			update_option( 'wpp_mailer', trim($mailer));
		if ( !empty($mail_set_return_path))
			update_option( 'wpp_mail_set_return_path', trim($mail_set_return_path));
		if ( !empty($smtp_host))
			update_option( 'wpp_smtp_host', trim($smtp_host));
		if ( !empty($smtp_port))
			update_option( 'wpp_smtp_port', trim($smtp_port));
		if ( !empty($smtp_ssl))
			update_option( 'wpp_smtp_ssl', trim($smtp_ssl));
		if ( !empty($smtp_auth))
			update_option( 'wpp_smtp_auth', trim($smtp_auth));
		if ( !empty($smtp_user))
			update_option( 'wpp_smtp_user', trim($smtp_user));
		if ( !empty($smtp_pass))
			update_option( 'wpp_smtp_pass', trim($smtp_pass));
		if ( !empty($api_key))
			update_option( 'wpp_api_key', trim($api_key));
		?>
		<div id="message" class="updated fade"><p><strong><?php _e('Settings saved successfully', 'wp_falconide'); ?></strong></p></div>
<?php
	}
	
?>

<div class="wrap">
<div class="w-logo  with_transparent">
	<a class="w-logo-link" href="http://www.falconide.com/">
		<span class="w-logo-img">
			<img class="for_transparent" src="<?php echo home_url(); ?>/wp-content/plugins/wp-falconide/images/Falconide-logo.png" alt="Falconide: Cloud Based Triggered and Transactional Email Service">
		</span>
	</a>
	<span class="plugin-text"><h2>Falconide SMTP Service</h2></span>
	<div id="smtp_error" class="dspln"></div>
</div> <!-- end w-logo -->

<form method="post" action="admin.php?page=wp_falconide">
<?php wp_nonce_field('wpp_email-options', 'email_options_field'); ?>

<table class="optiontable form-table">
<tr valign="top">
<th scope="row"><label for="mail_from"><?php _e('Api Key', 'wp_falconide'); ?></label></th>
<td><input name="api_key" type="text" id="api_key" value="<?php print(get_option('wpp_api_key')); ?>" size="40" class="regular-text" />
<span class="description"><?php _e('Enter api key here form your falconide account.', 'wp_falconide'); if(get_option('db_version') < 6124) { print('<br /><span style="color: red;">'); _e('<strong>Please Note:</strong> You appear to be using a version of WordPress prior to 2.3. Please ignore the From Name field and instead enter Name&lt;email@domain.com&gt; in this field.', 'wp_falconide'); print('</span>'); } ?></span></td>
</tr>
</table>

<h3><?php _e('Email Settings', 'wp_falconide'); ?></h3>
<table class="optiontable form-table">
<tr valign="top">
<th scope="row"><label for="mail_from"><?php _e('From Email', 'wp_falconide'); ?></label></th>
<td><input name="mail_from" type="text" id="mail_from" value="<?php print(get_option('wpp_mail_from')); ?>" size="40" class="regular-text" />
<span class="description"><?php _e('Email address that emails should be sent from.', 'wp_falconide'); if(get_option('db_version') < 6124) { print('<br /><span style="color: red;">'); _e('<strong>Please Note:</strong> You appear to be using a version of WordPress prior to 2.3. Please ignore the From Name field and instead enter Name&lt;email@domain.com&gt; in this field.', 'wp_falconide'); print('</span>'); } ?></span></td>
</tr>
<tr valign="top">
<th scope="row"><label for="mail_from_name"><?php _e('From Name', 'wp_falconide'); ?></label></th>
<td><input name="mail_from_name" type="text" id="mail_from_name" value="<?php print(get_option('wpp_mail_from_name')); ?>" size="40" class="regular-text" />
<span class="description"><?php _e('Name that emails should be sent from.', 'wp_falconide'); ?></span></td>
</tr>
</table>


<table class="optiontable form-table">
<tr valign="top">
<th scope="row"><?php _e('Mailer', 'wp_falconide'); ?> </th>
<td><fieldset><legend class="screen-reader-text"><span><?php _e('Mailer', 'wp_falconide'); ?></span></legend>
<p><input id="mailer_smtp" type="radio" name="mailer" value="smtp" <?php checked('smtp', get_option('wpp_mailer')); ?> />
<label for="mailer_smtp"><?php _e('Send all WordPress emails via SMTP.', 'wp_falconide'); ?></label></p>
<p><input id="mailer_mail" type="radio" name="mailer" value="mail" <?php checked('mail', get_option('wpp_mailer')); ?> />
<label for="mailer_mail"><?php _e('Use the PHP mail() function to send emails.', 'wp_falconide'); ?></label></p>
</fieldset></td>
</tr>
</table>


<table class="optiontable form-table">
<tr valign="top">
<th scope="row"><?php _e('Return Path', 'wp_falconide'); ?> </th>
<td><fieldset><legend class="screen-reader-text"><span><?php _e('Return Path', 'wp_falconide'); ?></span></legend><label for="mail_set_return_path">
<input name="mail_set_return_path" type="checkbox" id="mail_set_return_path" value="true" <?php checked('true', get_option('wpp_mail_set_return_path')); ?> />
<?php _e('Set the return-path to match the From Email'); ?></label>
</fieldset></td>
</tr>
</table>

<h3><?php _e('SMTP Settings', 'wp_falconide'); ?></h3>
<p><?php _e('These settings only apply if you have chosen to send mail by SMTP above.', 'wp_falconide'); ?></p>

<table class="optiontable form-table">
<tr valign="top">
<th scope="row"><label for="smtp_host"><?php _e('SMTP Host', 'wp_falconide'); ?></label></th>
<td class="smtp-text"><?php echo SMTP_HOST; ?></td>
</tr>
<tr valign="top">
<th scope="row"><label for="smtp_port"><?php _e('SMTP Port', 'wp_falconide'); ?></label></th>
<td><input name="smtp_port" type="text" id="smtp_port" value="<?php print(get_option('wpp_smtp_port')); ?>" size="6" class="regular-text" /></td>
</tr>
<tr valign="top">
<th scope="row"><?php _e('Encryption', 'wp_falconide'); ?> </th>
<td><fieldset><legend class="screen-reader-text"><span><?php _e('Encryption', 'wp_falconide'); ?></span></legend>
<input id="smtp_ssl_none" type="radio" name="smtp_ssl" value="none" <?php checked('none', get_option('wpp_smtp_ssl')); ?> />
<label for="smtp_ssl_none"><span><?php _e('No encryption.', 'wp_falconide'); ?></span></label><br />
<input id="smtp_ssl_ssl" type="radio" name="smtp_ssl" value="ssl" <?php checked('ssl', get_option('wpp_smtp_ssl')); ?> />
<label for="smtp_ssl_ssl"><span><?php _e('Use SSL encryption.', 'wp_falconide'); ?></span></label><br />
<input id="smtp_ssl_tls" type="radio" name="smtp_ssl" value="tls" <?php checked('tls', get_option('wpp_smtp_ssl')); ?> />
<label for="smtp_ssl_tls"><span><?php _e('Use TLS encryption. This is not the same as STARTTLS. For most servers SSL is the recommended option.', 'wp_falconide'); ?></span></label>
</td>
</tr>
<tr valign="top">
<th scope="row"><?php _e('Authentication', 'wp_falconide'); ?> </th>
<td>
<input id="smtp_auth_false" type="radio" name="smtp_auth" value="false" <?php checked('false', get_option('wpp_smtp_auth')); ?> />
<label for="smtp_auth_false"><span><?php _e('No: Do not use SMTP authentication.', 'wp_falconide'); ?></span></label><br />
<input id="smtp_auth_true" type="radio" name="smtp_auth" value="true" <?php checked('true', get_option('wpp_smtp_auth')); ?> />
<label for="smtp_auth_true"><span><?php _e('Yes: Use SMTP authentication.', 'wp_falconide'); ?></span></label><br />
<span class="description"><?php _e('If this is set to no, the values below are ignored.', 'wp_falconide'); ?></span>
</td>
</tr>
<tr valign="top">
<th scope="row"><label for="smtp_user"><?php _e('Username', 'wp_falconide'); ?></label></th>
<td><input name="smtp_user" type="text" id="smtp_user" value="<?php print(get_option('wpp_smtp_user')); ?>" size="40" class="code" /></td>
</tr>
<tr valign="top">
<th scope="row"><label for="smtp_pass"><?php _e('Password', 'wp_falconide'); ?></label></th>
<td><input name="smtp_pass" type="text" id="smtp_pass" value="<?php print(get_option('wpp_smtp_pass')); ?>" size="40" class="code" /></td>
</tr>
</table>

<p class="submit"><input type="submit" name="submit" id="submit" class="button-primary" value="<?php _e('Save Changes'); ?>" /></p>
</p>
<input type="hidden" name="wp_falconide_option" value="1">
</form>

<h3><?php _e('Send a Test Email', 'wp_falconide'); ?></h3>
<div id="show_error" class="dspln"></div>
<form method="POST" action="admin.php?page=wp_falconide<?php //echo plugin_basename(__FILE__); ?>">
<?php wp_nonce_field('test-email'); ?>

<table class="optiontable form-table">
<tr valign="top">
<th scope="row"><label for="to"><?php _e('To:', 'wp_falconide'); ?></label></th>
<td><input name="to" type="text" id="to" value="" size="40" class="code" />
<span class="description"><?php _e('Type your email address here.', 'wp_falconide'); ?></span></td>
</tr>
<tr valign="top">
<th scope="row"><label for="to">Subject</label></th>
<td><input name="subject" type="text" id="subject" value="" size="40" class="code" />
<span class="description">Type your email subject here.</span></td>
</tr
<tr valign="top">
<th scope="row"><label for="to">Message</label></th>
<td><textarea name="message" id="email_message" class="code"></textarea>
<span class="description">Type your message here.</span></td>
</tr>
</table>
<p class="submit"><input type="submit" name="wpms_action" id="wpms_action" class="button-primary" value="<?php _e('Send Test', 'wp_falconide'); ?>" /></p>
</form>

</div> <!-- end wrap -->
	<?php
	
} // End of wp_falconide_options_page() function definition
endif;


/**
 * This function adds the required page (only 1 at the moment).
 */
if (!function_exists('wp_falconide_menus')) :
  function wp_falconide_menus() {
	
	if (function_exists('add_submenu_page')) {
		//add_options_page( 'Falconide Options', 'Wp Falconide', 'manage_options', 'wp_falconide', 'wp_falconide_options_page' );
		add_menu_page('Falconide Settings', 'Falconide Settings', 'manage_options', 'wp_falconide', 'wp_falconide_options_page');
			
		add_submenu_page( 'wp_falconide', 'Falconide Logs Report', 'Logs Report', 'manage_options', 'wp_falconide_logs', 'wp_falconide_logs');
		add_submenu_page( 'wp_falconide', 'Falconide Statistics Report', 'Statistics Report', 'manage_options', 'wp_falconide_stats', 'wp_falconide_stats');
	}
	
  } // End of wp_falconide_menus() function definition
endif;


/**
 * This function sets the from email value
 */
if (!function_exists('wp_falconide_mail_from')) :
function wp_falconide_mail_from ($orig) {
	
	// Get the site domain and get rid of www.
	$sitename = strtolower( $_SERVER['SERVER_NAME'] );
	if ( substr( $sitename, 0, 4 ) == 'www.' ) {
		$sitename = substr( $sitename, 4 );
	}

	$default_from = 'wordpress@' . $sitename;
	// End of copied code
	
	// If the from email is not the default, return it unchanged
	if ( $orig != $default_from ) {
		return $orig;
	}
	
	if (defined('WPMS_ON') && WPMS_ON) {
		if (defined('WPMS_MAIL_FROM') && WPMS_MAIL_FROM != false)
			return WPMS_MAIL_FROM;
	}
	elseif (is_email(get_option('wpp_mail_from'), false))
		return get_option('wpp_mail_from');
	
	// If in doubt, return the original value
	return $orig;
	
} // End of wp_falconide_mail_from() function definition
endif;


/**
 * This function sets the from name value
 */
if (!function_exists('wp_falconide_mail_from_name')) :
function wp_falconide_mail_from_name ($orig) {
	
	// Only filter if the from name is the default
	if ($orig == 'WordPress') {
		if (defined('WPMS_ON') && WPMS_ON) {
			if (defined('WPMS_MAIL_FROM_NAME') && WPMS_MAIL_FROM_NAME != false)
				return WPMS_MAIL_FROM_NAME;
		}
		elseif ( get_option('wpp_mail_from_name') != "" && is_string(get_option('mail_from_name')) )
			return get_option('wpp_mail_from_name');
	}
	
	// If in doubt, return the original value
	return $orig;
	
} // End of wp_falconide_mail_from_name() function definition
endif;

function wp_mail_plugin_action_links( $links, $file ) {
	if ( $file != plugin_basename( __FILE__ ))
		return $links;

	$settings_link = '<a href="admin.php?page=wp_falconide">' . __( 'Settings', 'wp_falconide' ) . '</a>';

	array_unshift( $links, $settings_link );

	return $links;
}



/**
 *	Stats function to show all statistics data
 *	fetched using falconide api
 */
if (!function_exists('wp_falconide_logs')) {
	function wp_falconide_logs() {
	    //create the object for class, if not exits
        if ( !isset($obj) )
            $obj = new Logs();
?>

<div class="wrap">

<!-- Display common html strucure -->
<?php echo $obj->common_html(); ?>
<br>

<h2 id="log_head"><?php _e('Falconide Logs', 'wp_falconide'); ?></h2>
<form id="emailSearchForm" method="post" action="admin.php?page=wp_falconide_logs">
<?php wp_nonce_field('wpp_from_to', 'wpp_from_to_field'); ?>
<input type="text" name="search_by_email" value="<?php echo !empty($_POST['search_by_email']) ? $_POST['search_by_email'] : ''; ?>" placeholder="Enter email to search">
<input type="hidden" name="paged" id="paged" value="<?php echo !empty($_REQUEST['paged']) ? $_REQUEST['paged'] : ''; ?>">
<input type="submit" name="search_button" value="Search" id="search_button" class="button-primary">
</form>
<script>
jQuery(document).ready(function($) {
    jQuery('.pagination-links a').click(function() {
        var action = jQuery(this).attr('href');
        if ( action != '' ) {
            //jQuery('#emailSearchForm').attr('action', action);
            var paged = getParameterByName('paged');
            jQuery('#paged').val(paged);
        }
        jQuery('#emailSearchForm').submit();
    });
    jQuery( "#emailSearchForm" ).submit(function( event ) {
      //alert( "Handler for .submit() called." );
      
    });
});
function getParameterByName(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
    results = regex.exec(location.search);
    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}
</script>
<?php
    // call table here
	$obj->prepare_items();
	$obj->display();
	
?>

</div> <!-- end wrap -->
<?php

	}
}// end of logs


/**
 *	Stats function to show all statistics data
 *	fetched using falconide api
 */
if (!function_exists('wp_falconide_stats')) {
	function wp_falconide_stats() {
	    //create the object for class, if not exits
        if ( !isset($obj) )
            $obj = new Logs();
            
		?>

<div class="wrap">

<!-- Display common html strucure -->
<?php echo $obj->common_html(); ?>
<br>

<h2><?php _e('Falconide Reports', 'wp_peipost'); ?></h2>

<?php
    $today_data   = array();
    $monthly_data = array();
	$date = date("d M, Y");
	$start_date = date('Y-m-d');
	$end_date = date('Y-m-d');
	$result_data = $obj->get_stats( $start_date, $end_date );
	
	if ( !empty($result_data) && is_array($result_data) ) {
	    $today_data = $result_data['data'];
	}

	if ( isset($_POST['dateRangeFormSubmit']) && !empty($_POST['dateRangeFormSubmit']) ) {
		$start_date = date('Y-m-d', strtotime($_POST['wpp_from_date']));
		$end_date = date('Y-m-d', strtotime($_POST['wpp_to_date']));
	} else {

		$start_date = date('Y-m-01');
		$end_date = date('Y-m-t');
	}
    $monthly_result = $obj->get_stats( $start_date, $end_date );
    if ( !empty($monthly_result) && is_array($monthly_result) ) {
	    $monthly_data = $monthly_result['data'];
	}
	$monthly_sent = 0;
	$monthly_bounce = 0;
	$monthly_open = 0;
	$monthly_click = 0;
	$monthly_dropped = 0;
	$monthly_invalid = 0;
	if ( !empty($monthly_data) && is_array($monthly_data) ) {
		foreach ( $monthly_data as $monthly ) {
			$monthly_sent += $monthly['sent'];
			$monthly_bounce += $monthly['bounce'];
			$monthly_open += $monthly['open'];
			$monthly_click += $monthly['click'];
			$monthly_dropped += $monthly['dropped'];
			$monthly_invalid += $monthly['invalid'];
		}
	}
	$max_days = date('t');
	/*$data = array();
	for( $i=0; $i<$max_days; $i++ ) {
		$data[] = array( 'y' => $monthly_data[$i], 'label' => $monthly_data[$i] );
	}*/

?>
<h4>Report for <?php echo $date; ?></h4>

<script type="text/javascript">
window.onload = function () {
	var chart = new CanvasJS.Chart("chartContainer",
	{
		animationEnabled: true,
		title:{
			text: ""
		},
		axisX: {
			title: "<?php echo $date; ?>",
        },
        
		data: [
		{
			type: "column", //change type to bar, line, area, pie, etc
			indexLabel: "{y}",
            indexLabelPlacement: "outside",  
            indexLabelOrientation: "horizontal",
			dataPoints: [
		{  y: <?php echo $today_data[0]['sent']; ?>, label: "Delivered" },
        {  y: <?php echo $today_data[0]['bounce']; ?>, label: "Bounced"},
        {  y: <?php echo $today_data[0]['open']; ?> , label: "Opened"},
        {  y: <?php echo $today_data[0]['click']; ?>, label: "Clicked" },
        {  y: <?php echo $today_data[0]['dropped']; ?>, label: "Dropped" },
        {  y: <?php echo $today_data[0]['invalid']; ?>, label: "Invalid"}
        
        ]
		}
		]
	});
 
	chart.render();
	
	//Second chart
	var chart = new CanvasJS.Chart("chartContainerSec",
	{
		animationEnabled: true,
		title:{
			text: ""
		},
		axisX: {
			title: "<?php echo date('d M', strtotime($start_date)); echo ' - ';echo date('d M, Y', strtotime($end_date)); ?>",
        },
		data: [
		{
			type: "column", //change type to bar, line, area, pie, etc
			indexLabel: "{y}",
            indexLabelPlacement: "outside",  
            indexLabelOrientation: "horizontal",
			dataPoints: [
		{  y: <?php echo $monthly_sent; ?>, label: "Delivered" },
        {  y: <?php echo $monthly_bounce; ?>, label: "Bounced"},
        {  y: <?php echo $monthly_open; ?> , label: "Opened"},
        {  y: <?php echo $monthly_click; ?>, label: "Clicked" },
        {  y: <?php echo $monthly_dropped; ?>, label: "Dropped" },
        {  y: <?php echo $monthly_invalid; ?>, label: "Invalid"}
        
        ]
		}
		]
	});

	chart.render();
}
</script>
<div id="chartContainer" style="height: 300px; width: 100%;"></div>
<div class="clear"></div>
<?php if ( isset($_POST['dateRangeFormSubmit']) && !empty($_POST['dateRangeFormSubmit']) ) { ?>
<script>
    jQuery(document).ready(function() {
        jQuery('#from_date').val( "<?php echo date( 'm/d/Y', strtotime($start_date) ); ?>" );
        jQuery('#to_date').val( "<?php echo date( 'm/d/Y',strtotime($end_date) ); ?>" );
    });
</script>
<?php } ?>
<div id="dateRangeDiv"><h4>From <?php echo date('d M, Y', strtotime($start_date)); ?> to <?php echo date('d M, Y', strtotime($end_date)); ?></h4>
<form id="dateRangeForm" method="post" action="admin.php?page=wp_falconide_stats">
<?php wp_nonce_field('wpp_from_to', 'wpp_from_to_field'); ?>
<label for="from">From</label>
<input type="text" id="from_date" name="wpp_from_date">
<label for="to">to</label>
<input type="text" id="to_date" name="wpp_to_date">
<input type="hidden" name="dateRangeFormSubmit" value="1">
</form>
</div>
<div id="chartContainerSec" style="height: 300px; width: 100%;"></div>

<h3><a href="http://app1.falconide.com/" target="_blank">For detailed statistics, please visit your Falconide Dashboard</a>.</h3>

</div> <!-- end wrap -->
<?php

	}
}// end of stats

if (!defined('WPMS_ON') || !WPMS_ON) {
	// Whitelist our options
	add_filter('whitelist_options', 'wp_falconide_whitelist_options');
	// Add the create pages options
	add_action('admin_menu','wp_falconide_menus');
	// Add an activation hook for this plugin
	register_activation_hook(__FILE__,'wp_falconide_activate');
	// Adds "Settings" link to the plugin action page
	add_filter( 'plugin_action_links', 'wp_mail_plugin_action_links',10,2);
}

// Add filters to replace the mail from name and emailaddress
add_filter('wp_mail_from','wp_falconide_mail_from');
add_filter('wp_mail_from_name','wp_falconide_mail_from_name');
load_plugin_textdomain('wp_falconide', false, dirname(plugin_basename(__FILE__)) . '/langs');

// Add an action on phpmailer_init
add_action('phpmailer_init','phpmailer_init_smtp');
