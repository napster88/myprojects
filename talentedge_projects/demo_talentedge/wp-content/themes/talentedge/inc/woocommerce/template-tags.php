<?php
/**
 * Custom template tags used to integrate this theme with WooCommerce.
 *
 * @package talentedge
 */

/**
 * Cart Link
 * Displayed a link to the cart including the number of items present and the cart total
 * @param  array $settings Settings
 * @return array           Settings
 * @since  1.0.0
 */
if ( ! function_exists( 'talentedge_cart_link' ) ) {
	function talentedge_cart_link() {
		?>
			<a class="cart-contents" href="<?php echo esc_url( WC()->cart->get_cart_url() ); ?>" title="<?php _e( 'View your shopping cart', 'talentedge' ); ?>">
				<?php echo wp_kses_data( WC()->cart->get_cart_subtotal() ); ?> <span class="count"><?php echo wp_kses_data( sprintf( _n( '%d item', '%d items', WC()->cart->get_cart_contents_count(), 'talentedge' ), WC()->cart->get_cart_contents_count() ) );?></span>
			</a>
		<?php
	}
}

/**
 * Upsells
 * Related products on single page and line above it
 * @since   1.0.0
 * @return  void
 * @uses    woocommerce_upsell_display()
 */
if ( ! function_exists( 'talentedge_upsell_display' ) ) {
	function talentedge_upsell_display() {
		echo '</div></div>';
		global $product;
		$upsells = $product->get_upsells();
		if ( !empty($upsells) && (count($upsells) > 0) ) {
			echo '<hr class="divider-w">';
		}
		echo '<div class="container">';
		woocommerce_upsell_display( -1, 3 );
		$related = $product->get_related();
		if ( !empty($related) && (count($related) > 0) ) {
			echo '</div>';
			echo '<hr class="divider-w">';
			echo '<div class="container">';
		}
	}
}

/**
 * Sorting wrapper
 * @since   1.4.3
 * @return  void
 */
function talentedge_sorting_wrapper() {
	echo '<div class="row">';
		echo '<div class="col-sm-12">';
}

/**
 * Sorting wrapper close
 * @since   1.4.3
 * @return  void
 */
function talentedge_sorting_wrapper_close() {
		echo '</div>';
	echo '</div>';
}

/**
 * ShopIsle shop messages
 * @since   1.4.4
 * @uses    do_shortcode
 */
function talentedge_shop_messages() {
	if ( ! is_checkout() ) {
		echo wp_kses_post( do_shortcode( '[woocommerce_messages]' ) );
	}
}

/**
 * Pagination on shop page
 * @since  1.0.0
 */
if ( ! function_exists( 'talentedge_woocommerce_pagination' ) ) {
	function talentedge_woocommerce_pagination() {
		if ( woocommerce_products_will_display() ) {	
			woocommerce_pagination();
		}
	}
}