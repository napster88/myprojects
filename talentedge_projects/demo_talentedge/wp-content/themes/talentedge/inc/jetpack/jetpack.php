<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function talentedge_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'talentedge-blog-container',
		'footer'    => 'page',
	) );
}
add_action( 'after_setup_theme', 'talentedge_jetpack_setup' );
