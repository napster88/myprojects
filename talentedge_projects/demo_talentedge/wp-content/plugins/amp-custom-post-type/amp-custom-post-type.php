<?php
/*
Plugin Name: AMP Custom Post Type
Description: Enable Custom post type support for AMP pages
Author: Ahmed Kaludi, Mohammed Kaludi
Version: 1.3
Author URI: https://ampforwp.com/
*/
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

//custom prefix for Fuctions and variables : ampforwp_cpt_

// Plugin activation check
if(is_admin()){
	include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
		if ( !class_exists('Ampforwp_Init') ) {
			add_filter( 'plugin_action_links', 'ampforwp_cpt_plugin_activation_link_new', 10, 6 );
			// Add Activate Parent Plugin button in settings page

				function ampforwp_cpt_plugin_activation_link_new( $actions, $plugin_file ) {
					static $plugin;
					if (!isset($plugin))
						$plugin = plugin_basename(__FILE__);
						if ($plugin == $plugin_file) {
								$cpt_settings_button = array('settings' => '<a href="admin.php?page=amp_options&tab=2">' . __('Settings', 'ampforwp_cpt') . '</a>');
							if ( class_exists('Ampforwp_Init') ) {
							    //if parent plugin is activated
										$actions = array_merge( $actions, $cpt_settings_button );
							} else{
								if(class_exists('Ampforwp_Init')){
									$actions = array_merge( $actions, $cpt_settings_button );
								}else{
								$please_activate_parent_plugin = array('Please Activate Parent plugin' => '<a href="plugin-install.php?s=accelerated+mobile+pages&tab=search&type=term">'. __('Please Activate Parent plugin', 'ampforwp') . '</a>');
								$actions = array_merge( $please_activate_parent_plugin,$actions );
							}
							}
		 				}
						return $actions;
			}
		}
	}

//Options for Custom Post Types Starts here
if ( ! function_exists( 'ampforwp_cpt_custom_post_type_support_section' ) ) {
	function ampforwp_cpt_custom_post_type_support_section($sections){

		$options=get_option('ampforwp_cpt_generated_post_types');

	    $sections[] = array(
	        'title' 	=> __('Custom Post Type', 'redux-framework-demo'),
	        'icon' 		=> 'el el-th-large',
	        'fields' 	=>  array(
				array(
					'id'       => 'ampforwp-custom-type',
					'type'     => 'select',
					'title'    => __('Number of Custom Types', 'redux-framework-demo'),
					'multi'=> true,
					//'data' => 'post_type',
					'options'=>$options,
				),
				array(
					'id'       => 'ampforwp-custom-type-amp-endpoint',
					'type'     => 'switch',
					'title'    => __('Make endpoint ?amp', 'redux-framework-demo'),
					'default'   => 0,
					'subtitle'  => 'Enable this option when /amp/ is giving 404 after resaving the permalink settings.',
					'desc'      => __( 'Making endpoints ?amp is required for directory based themes or have multiple taxonomies in the url. Question mark in the url will not make any differance in the SEO.' ),

				),
			),
	    );
	    return $sections;
	}
}
// Get all the post types and add metaboxs of the ads in this post types
add_action('admin_init', 'ampforwp_cpt_generate_postype');
function ampforwp_cpt_generate_postype(){
 ampforwp_cpt_post_types();
}

function ampforwp_cpt_post_types(){
  $args       = "";
  $get_post_types = "";
  $post_types   = array();

  $args = array(
     'public'   => true,
  );

  $get_post_types = get_post_types( $args, 'objects');

  foreach ( $get_post_types  as $post_type ) {
    $post_types[$post_type->name] = $post_type->label;
  }

  $post_types =apply_filters( 'ampforwp_cpt_modify_post_types', $post_types );


	if ( isset($post_types['post'] ) ) { unset($post_types['post']); } 
	if ( isset($post_types['page'] ) )  { unset($post_types['page']); }
	if ( isset($post_types['attachment'] ) ) {unset($post_types['attachment']);}
	if ( isset($post_types['guest-author'] ) ) {unset($post_types['guest-author']);}
	if ( isset($post_types['amp-cta'] ) ) {unset($post_types['amp-cta']);}
    if ( isset($post_types['wprss_feed_item'] ) ){unset($post_types['wprss_feed_item']);}
	if ( isset($post_types['wprss_feed'] ) ) {unset($post_types['wprss_feed']);}

  $options=get_option('ampforwp_cpt_generated_post_types');

    $count_current_pt=count( $post_types );
    $count_saved_pt = count( $options);

    if($count_current_pt>$count_saved_pt){
      $array_1 = (array) $post_types;
	  $array_2 = (array) $options;
    }

    else{
      $array_1 = (array) $options;
	  $array_2 = (array) $post_types;
    }

	if( array_diff( $array_1, $array_2 ) ) {
      update_option('ampforwp_cpt_generated_post_types',$post_types);
    }
}
add_filter("redux/options/redux_builder_amp/sections", 'ampforwp_cpt_custom_post_type_support_section');

//Adding Custom Post type starts here
if ( ! function_exists( 'ampforwp_cpt_add_custom_post_type_support' ) ) {
	function ampforwp_cpt_add_custom_post_type_support() {
		add_rewrite_endpoint( AMP_QUERY_VAR, EP_PERMALINK | EP_PAGES | EP_ROOT );

		global $redux_builder_amp;
		if($redux_builder_amp['ampforwp-custom-type']){
			foreach($redux_builder_amp['ampforwp-custom-type'] as $custom_post){
			    add_post_type_support( $custom_post, AMP_QUERY_VAR );
			}
		}

	}
	add_action( 'init', 'ampforwp_cpt_add_custom_post_type_support', 100);
}

add_filter('ampforwp_modify_rel_canonical','ampforwp_cpt_modify_rel_canonical');
function ampforwp_cpt_modify_rel_canonical($url) {
	global $redux_builder_amp, $wp;
	$post_types = "";
	$current_cpt_url = "";
	$post_types = $redux_builder_amp['ampforwp-custom-type'];

	// If Option "Make endpoint ?amp" is Off then return.
	if ( ! $redux_builder_amp['ampforwp-custom-type-amp-endpoint'] ) {
		return $url;
	}

	if ( is_post_type_archive( $post_types ) ||  is_singular( $post_types )) {
		$current_cpt_url = home_url( $wp->request );
		$url 			= trailingslashit( $current_cpt_url ) . '?amp';
		return $url;
	}

	return $url;

}


/* Plugin Updater */
add_action( 'init', 'ampforwp_cpt_updater' );
/**
 * Load and Activate Plugin Updater Class.
 * @since 0.1.0
 */
function ampforwp_cpt_updater() {

    /* Load Plugin Updater */
    require_once( trailingslashit( plugin_dir_path( __FILE__ ) ) . '/updater/update.php' );

    /* Updater Config */
    $config = array(
        'base'         => plugin_basename( __FILE__ ), //required
        'repo_uri'     => 'http://magazine3.com/updates/',
        'repo_slug'    => 'ampforwp-custom-post-type',
    );

    /* Load Updater Class */
    new AMPFORWP_Cpt_Updater( $config );
}

//custom editors for every post type
require 'custom-amp-editor.php';