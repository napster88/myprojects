<?php

use Premmerce\UrlManager\UrlManagerPlugin;

/**
 * WooCommerce Permalink Manager
 *
 * @package           Premmerce\UrlManager
 *
 * @wordpress-plugin
 * Plugin Name:       WooCommerce Permalink Manager
 * Plugin URI:        https://premmerce.com/woocommerce-permalink-manager-remove-shop-product-product-category-url/
 * Description:       Premmerce WooCommerce Permalink Manager allows you to change WooCommerce permalink and remove product and product_category slugs from the URL.
 * Version:           1.1.2
 * Author:            premmerce
 * Author URI:        https://premmerce.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       premmerce-url-manager
 * Domain Path:       /languages
 *
 * WC requires at least: 3.0.0
 * WC tested up to: 3.2.5
 */

// If this file is called directly, abort.
if(!defined('WPINC')){
	die;
}

call_user_func(function(){
	require_once plugin_dir_path(__FILE__) . 'vendor/autoload.php';

	if(!get_option('premmerce_version')){
		require_once plugin_dir_path(__FILE__) . '/freemius.php';
	}

	$main = new UrlManagerPlugin(__FILE__);

	register_activation_hook(__FILE__, [$main, 'activate']);

	register_deactivation_hook(__FILE__, [$main, 'deactivate']);

	register_uninstall_hook(__FILE__, [UrlManagerPlugin::class, 'uninstall']);

	$main->run();
});
