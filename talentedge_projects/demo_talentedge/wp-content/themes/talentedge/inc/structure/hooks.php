<?php
/**
 * talentedge hooks
 *
 * @package talentedge
 */

/**
 * General
 * @see  talentedge_setup()
 * @see  talentedge_widgets_init()
 * @see  talentedge_scripts()
 * @see  talentedge_get_sidebar()
 */
add_action( 'after_setup_theme',				'talentedge_setup' );
add_action( 'widgets_init',						'talentedge_widgets_init' );
add_action( 'wp_enqueue_scripts',				'talentedge_scripts',					10 );
add_action( 'admin_enqueue_scripts',        	'talentedge_admin_styles',           	10 );
add_action( 'talentedge_sidebar',				'talentedge_get_sidebar',				10 );
add_action( 'talentedge_sidebar_shop_archive',	'talentedge_get_sidebar_shop_archive',	10 );


/**
 * Header
 * @see  talentedge_primary_navigation()
 */
add_action( 'talentedge_header', 'talentedge_primary_navigation',		50 );

/**
 * Footer
 * @see  talentedge_footer_widgets()
 * @see  talentedge_footer_copyright_and_socials()
 */
add_action( 'talentedge_footer', 'talentedge_footer_wrap_open',	             	5 );
add_action( 'talentedge_footer', 'talentedge_footer_widgets',	                    10 );
add_action( 'talentedge_footer', 'talentedge_footer_copyright_and_socials',	    20 );
add_action( 'talentedge_footer', 'talentedge_footer_wrap_close',	             	30 );

/**
 * Homepage
 * @see  talentedge_homepage_content()
 * @see  talentedge_product_categories()
 * @see  talentedge_recent_products()
 * @see  talentedge_featured_products()
 * @see  talentedge_popular_products()
 * @see  talentedge_on_sale_products()
 */
add_action( 'homepage', 'talentedge_homepage_content',		10 );
add_action( 'homepage', 'talentedge_product_categories',	    20 );
add_action( 'homepage', 'talentedge_recent_products',		30 );
add_action( 'homepage', 'talentedge_featured_products',		40 );
add_action( 'homepage', 'talentedge_popular_products',		50 );
add_action( 'homepage', 'talentedge_on_sale_products',		60 );

/**
 * Posts
 * @see  talentedge_post_header()
 * @see  talentedge_post_meta()
 * @see  talentedge_post_content()
 * @see  talentedge_paging_nav()
 * @see  talentedge_post_nav()
 * @see  talentedge_display_comments()
 */
add_action( 'talentedge_loop_post',			'talentedge_post_header',		10 );
add_action( 'talentedge_loop_post',			'talentedge_post_meta',			20 );
add_action( 'talentedge_loop_post',			'talentedge_post_content',		30 );
add_action( 'talentedge_loop_after',		    'talentedge_paging_nav',		    10 );
add_action( 'talentedge_single_post',		'talentedge_post_header',		10 );
add_action( 'talentedge_single_post',		'talentedge_post_meta',			20 );
add_action( 'talentedge_single_post',		'talentedge_post_content',		30 );
add_action( 'talentedge_single_post_after',	'talentedge_post_nav',			10 );
add_action( 'talentedge_single_post_after',	'talentedge_display_comments',	10 );

/**
 * Pages
 * @see  talentedge_page_content()
 * @see  talentedge_display_comments()
 */
add_action( 'talentedge_page', 			'talentedge_page_content',		20 );
add_action( 'talentedge_page_after', 	'talentedge_display_comments',	10 );

/**
 * Extras
 * @see  talentedge_body_classes()
 * @see  talentedge_page_menu_args()
 */
add_filter( 'body_class',			'talentedge_body_classes' );
add_filter( 'wp_page_menu_args',	'talentedge_page_menu_args' );

/**
 * Customize
 * 
 * @see  talentedge_customize_preview_js()
 * @see  talentedge_customize_register()
 * @see  talentedge_customizer_script()
 */
 add_action( 'customize_preview_init',               'talentedge_customize_preview_js' );
 add_action( 'customize_register',                   'talentedge_customize_register' );
 add_action( 'customize_controls_enqueue_scripts',   'talentedge_customizer_script' );


/**
 * Shop page
 */
add_action( 'talentedge_before_shop', 		'woocommerce_breadcrumb',	             	10 );
add_action( 'talentedge_before_shop', 		'woocommerce_catalog_ordering',				20 );


/**
 * Define image sizes
 */
function talentedge_woocommerce_image_dimensions() {
	global $pagenow;
 
	if ( ! isset( $_GET['activated'] ) || $pagenow != 'themes.php' ) {
		return;
	}
  	$catalog = array(
		'width' 	=> '262',	// px
		'height'	=> '325',	// px
		'crop'		=> 1 		// true
	);
	$single = array(
		'width' 	=> '555',	// px
		'height'	=> '688',	// px
		'crop'		=> 1 		// true
	);
	$thumbnail = array(
		'width' 	=> '83',	// px
		'height'	=> '103',	// px
		'crop'		=> 1 		// false
	);
	// Image sizes
	update_option( 'shop_catalog_image_size', $catalog ); 		// Product category thumbs
	update_option( 'shop_single_image_size', $single ); 		// Single product image
	update_option( 'shop_thumbnail_image_size', $thumbnail ); 	// Image gallery thumbs
}
add_action( 'after_switch_theme', 'talentedge_woocommerce_image_dimensions', 1 );

 
/*
 * Number of thumbnails per row in product galleries
 */
add_filter ( 'woocommerce_product_thumbnails_columns', 'talentedge_thumb_cols', 99 );
function talentedge_thumb_cols() {
	return 6; 
}