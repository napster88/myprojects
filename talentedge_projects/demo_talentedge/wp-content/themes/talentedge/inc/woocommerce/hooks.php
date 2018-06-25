<?php
/**
 * talentedge WooCommerce hooks
 *
 * @package talentedge
 */

/**
 * Styles
 * @see  talentedge_woocommerce_scripts()
 */
add_action( 'wp_enqueue_scripts', 			'talentedge_woocommerce_scripts',		20 );
add_filter( 'woocommerce_enqueue_styles', 	'__return_empty_array' );

/**
 * Layout
 * @see  talentedge_before_content()
 * @see  talentedge_after_content()
 * @see  woocommerce_breadcrumb()
 * @see  talentedge_shop_messages()
 */
 
remove_action( 'woocommerce_before_main_content', 	'woocommerce_breadcrumb', 					20, 0 );
remove_action( 'woocommerce_before_main_content', 	'woocommerce_output_content_wrapper', 		10 );
remove_action( 'woocommerce_after_main_content', 	'woocommerce_output_content_wrapper_end', 	10 );
remove_action( 'woocommerce_sidebar', 				'woocommerce_get_sidebar', 					10 );
remove_action( 'woocommerce_before_shop_loop', 		'woocommerce_result_count', 				20 );
remove_action( 'woocommerce_before_shop_loop', 		'woocommerce_catalog_ordering', 			30 );
remove_action( 'woocommerce_after_shop_loop', 		'woocommerce_pagination', 					10 );
remove_action( 'woocommerce_archive_description', 	'woocommerce_product_archive_description',  10 );

add_action( 'talentedge_before_shop', 				'woocommerce_product_archive_description', 	5 );

add_action( 'woocommerce_before_main_content', 		'talentedge_before_content', 				10 );

add_action( 'woocommerce_before_shop_loop', 		'talentedge_shop_page_wrapper', 				20 );

add_action( 'talentedge_content_top', 				'talentedge_shop_messages', 				    21 );

add_action( 'woocommerce_after_shop_loop',			'talentedge_sorting_wrapper',				23 );
add_action( 'woocommerce_after_shop_loop', 			'talentedge_woocommerce_pagination', 		24 );
add_action( 'woocommerce_after_shop_loop',			'talentedge_sorting_wrapper_close',			25 );
add_action( 'woocommerce_after_shop_loop', 			'talentedge_shop_page_wrapper_end', 			40 );

add_action( 'woocommerce_after_main_content', 		'talentedge_after_content', 				    50 );

add_filter( 'woocommerce_page_title', 'talentedge_header_shop_page');

/* WooCommerce Search Products Page - No results */
add_action( 'woocommerce_archive_description',      'talentedge_search_products_no_results_wrapper',      10);
add_action( 'woocommerce_after_main_content',       'talentedge_search_products_no_results_wrapper_end',  10);

/**
 * Products
 * @see  talentedge_upsell_display()
 */
remove_action( 'woocommerce_before_single_product', 'action_woocommerce_before_single_product', 10, 1 );
remove_action( 'woocommerce_after_single_product', 'action_woocommerce_after_single_product', 10, 1 );

add_action( 'woocommerce_before_single_product', 'talentedge_product_page_wrapper', 10, 1 );
add_action( 'woocommerce_before_single_product', 'woocommerce_breadcrumb', 11 );
add_action( 'woocommerce_after_single_product', 'talentedge_product_page_wrapper_end', 10, 1 ); 
 
remove_action( 'woocommerce_after_single_product_summary', 	'woocommerce_upsell_display', 				15 );
add_action( 'woocommerce_after_single_product_summary', 	'talentedge_upsell_display', 				15 );
remove_action( 'woocommerce_before_shop_loop_item_title', 	'woocommerce_show_product_loop_sale_flash', 10 );
add_action( 'woocommerce_after_shop_loop_item_title', 		'woocommerce_show_product_loop_sale_flash', 6 );

/* add products slider */
add_action( 'woocommerce_after_single_product',             'talentedge_products_slider_on_single_page', 10, 0 );

/* notices */
remove_action( 'woocommerce_before_single_product',         'wc_print_notices', 10 );
add_action( 'woocommerce_before_single_product',            'wc_print_notices', 60 );

/**
 * Filters
 * @see  talentedge_woocommerce_body_class()
 * @see  talentedge_cart_link_fragment()
 * @see  talentedge_thumbnail_columns()
 * @see  talentedge_related_products_args()
 * @see  talentedge_products_per_page()
 * @see  talentedge_loop_columns()
 */
add_filter( 'body_class', 								'talentedge_woocommerce_body_class' );
add_filter( 'woocommerce_product_thumbnails_columns', 	'talentedge_thumbnail_columns' );
add_filter( 'woocommerce_output_related_products_args', 'talentedge_related_products_args' );
add_filter( 'loop_shop_per_page', 						'talentedge_products_per_page' );
add_filter( 'loop_shop_columns', 						'talentedge_loop_columns' );

if ( defined( 'WC_VERSION' ) && version_compare( WC_VERSION, '2.3', '>=' ) ) {
	add_filter( 'woocommerce_add_to_cart_fragments', 'talentedge_cart_link_fragment' );
} else {
	add_filter( 'add_to_cart_fragments', 'talentedge_cart_link_fragment' );
}

/**
 * Integrations
 * @see  talentedge_woocommerce_integrations_scripts()
 */
add_action( 'wp_enqueue_scripts', 'talentedge_woocommerce_integrations_scripts' );

/**
* Cart page
*/
add_filter( 'woocommerce_cart_item_thumbnail', 'talentedge_cart_item_thumbnail', 10, 3 );


/* Meta box for header description on shop page */
add_action('admin_menu', 'talentedge_page_description_box');
add_action('save_post', 'talentedge_custom_add_save');

/* WooCommerce compare list plugin */
if( function_exists('wccm_render_catalog_compare_info') ) {
	
	remove_action( 'woocommerce_before_shop_loop', 'wccm_render_catalog_compare_info' );
	
	add_action( 'woocommerce_before_shop_loop', 'wccm_render_catalog_compare_info', 30 );

	add_action( 'talentedge_wccm_compare_list','wccm_render_catalog_compare_info' );
}	

if( function_exists('wccm_add_single_product_compare_buttton') ) {
	
	remove_action( 'woocommerce_single_product_summary', 'wccm_add_single_product_compare_buttton', 35 );
	
	add_action( 'woocommerce_product_meta_end', 'wccm_add_single_product_compare_buttton', 35 );
}