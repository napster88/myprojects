<?php
/**
 * General functions used to integrate this theme with WooCommerce.
 *
 */

add_image_size( 'talentedge_cart_item_image_size', 58, 72, true );



/**
 * Before Content
 * Wraps all WooCommerce content in wrappers which match the theme markup
 * @since   1.0.0
 * @return  void
 */
if ( ! function_exists( 'talentedge_before_content' ) ) {
	function talentedge_before_content() {
		?>
		<div class="main">
	    	<?php
	}
}

/**
 * After Content
 * Closes the wrapping divs
 * @since   1.0.0
 * @return  void
 */
if ( ! function_exists( 'talentedge_after_content' ) ) {
	function talentedge_after_content() {
		?>
		</div><!-- .main -->

		<?php
	}
}

/**
 * Before Shop loop
 * @since   1.0.0
 * @return  void
 */
if ( ! function_exists( 'talentedge_shop_page_wrapper' ) ) {
	function talentedge_shop_page_wrapper() {
		?>
		<section class="module-small module-small-shop">
				<div class="container">

				<?php if( is_shop() || is_product_tag() || is_product_category() ):

						do_action( 'talentedge_before_shop' );

						if( is_active_sidebar( 'talentedge-sidebar-shop-archive' ) ) : ?>

							<div class="col-sm-9 shop-with-sidebar" id="talentedge-blog-container">

						<?php endif; ?>

				<?php endif; ?>

		<?php	
	}
}

/**
 * Before Product content
 * @since   1.0.0
 * @return  void
 */
function talentedge_product_page_wrapper() {
	echo '<section class="module module-super-small">
			<div class="container product-main-content">';
}

/**
 * After Product content
 * Closes the wrapping div and section
 * @since   1.0.0
 * @return  void
 */
if ( ! function_exists( 'talentedge_product_page_wrapper_end' ) ) {	
	function talentedge_product_page_wrapper_end() {
		?>
			</div><!-- .container -->
		</section><!-- .module-small -->
			<?php	
	}
}

/**
 * After Shop loop
 * Closes the wrapping div and section
 * @since   1.0.0
 * @return  void
 */
if ( ! function_exists( 'talentedge_shop_page_wrapper_end' ) ) {	
	function talentedge_shop_page_wrapper_end() {
		?>

			<?php if( (is_shop() || is_product_category() || is_product_tag() ) && is_active_sidebar( 'talentedge-sidebar-shop-archive' ) ): ?>

				</div>

				<!-- Sidebar column start -->
				<div class="col-sm-3 col-md-3 sidebar sidebar-shop">
					<?php do_action( 'talentedge_sidebar_shop_archive' ); ?>
				</div>
				<!-- Sidebar column end -->

			<?php endif; ?>

			</div><!-- .container -->
		</section><!-- .module-small -->
		<?php	
	}
}	

/**
 * Default loop columns on product archives
 * @return integer products per row
 * @since  1.0.0
 */
function talentedge_loop_columns() {
	if ( is_active_sidebar( 'talentedge-sidebar-shop-archive' ) ) {
		return apply_filters( 'talentedge_loop_columns', 3 ); // 3 products per row
	}
	else {
		return apply_filters( 'talentedge_loop_columns', 4 ); // 4 products per row
	}	
}

/**
 * Add 'woocommerce-active' class to the body tag
 * @param  array $classes
 * @return array $classes modified to include 'woocommerce-active' class
 */
function talentedge_woocommerce_body_class( $classes ) {
	if ( is_woocommerce_activated() ) {
		$classes[] = 'woocommerce-active';
	}

	return $classes;
}

/**
 * Cart Fragments
 * Ensure cart contents update when products are added to the cart via AJAX
 * @param  array $fragments Fragments to refresh via AJAX
 * @return array            Fragments to refresh via AJAX
 */
if ( ! function_exists( 'talentedge_cart_link_fragment' ) ) {
	function talentedge_cart_link_fragment( $fragments ) {
		global $woocommerce;

		ob_start();

		talentedge_cart_link();

		$fragments['a.cart-contents'] = ob_get_clean();

		return $fragments;
	}
}

/**
 * WooCommerce specific scripts & stylesheets
 * @since 1.0.0
 */
function talentedge_woocommerce_scripts() {
	global $talentedge_version;

	wp_enqueue_style( 'talentedge-woocommerce-style1', get_template_directory_uri() . '/inc/woocommerce/css/woocommerce.css', array(), 'v3' );
}

/**
 * Related Products Args
 * @param  array $args related products args
 * @since 1.0.0
 * @return  array $args related products args
 */
function talentedge_related_products_args( $args ) {
	$args = apply_filters( 'talentedge_related_products_args', array(
		'posts_per_page' => 4,
		'columns'        => 4,
	) );

	return $args;
}

/**
 * Product gallery thumnail columns
 * @return integer number of columns
 * @since  1.0.0
 */
function talentedge_thumbnail_columns() {
	return intval( apply_filters( 'talentedge_product_thumbnail_columns', 4 ) );
}

/**
 * Products per page
 * @return integer number of products
 * @since  1.0.0
 */
function talentedge_products_per_page() {
	return intval( apply_filters( 'talentedge_products_per_page', 12 ) );
}

/**
 * Query WooCommerce Extension Activation.
 * @var  $extension main extension class name
 * @return boolean
 */
function is_woocommerce_extension_activated( $extension = 'WC_Bookings' ) {
	return class_exists( $extension ) ? true : false;
}

/**
 * Header for shop page
 * @since  1.0.0
 */
function talentedge_header_shop_page( $page_title ) {

	$talentedge_title = '';

	$talentedge_header_image = get_header_image();
	if( !empty($talentedge_header_image) ):
		$talentedge_title = '<section class="' . ( is_woocommerce() ? 'woocommerce-page-title ' : '' ) . 'page-header-module module bg-dark" data-background="'.$talentedge_header_image.'">';
	else:
		$talentedge_title = '<section class="page-header-module module bg-dark">';
	endif;

		$talentedge_title .= '<div class="container">';

			$talentedge_title .= '<div class="row">';

				$talentedge_title .= '<div class="col-sm-6 col-sm-offset-3">';

					if( !empty($page_title) ):

						$talentedge_title .= '<h1 class="module-title font-alt">'.$page_title.'</h1>';

					endif;

					$talentedge_shop_id = get_option( 'woocommerce_shop_page_id' );

					if( !empty($talentedge_shop_id) ):

						$talentedge_page_description = get_post_meta($talentedge_shop_id, 'talentedge_page_description');

						if( !empty($talentedge_page_description[0]) ):
							$talentedge_title .= '<div class="module-subtitle font-serif mb-0">'.$talentedge_page_description[0].'</div>';
						endif;

					endif;
				
				$talentedge_title .= '</div>';

			$talentedge_title .= '</div><!-- .row -->';

		$talentedge_title .= '</div>';
	$talentedge_title .= '</section>';

	return $talentedge_title;
}

/**
 * New thumbnail size for cart page
 * @since  1.0.0
 */
function talentedge_cart_item_thumbnail( $thumb, $cart_item, $cart_item_key ) {
	
	$product = get_product( $cart_item['product_id'] );
	return $product->get_image( 'talentedge_cart_item_image_size' ); 
	
}


/**
 * Add meta box for page header description
 * @since  1.0.0
 */
function talentedge_page_description_box() {
	add_meta_box('talentedge_post_info', __('Header description','talentedge'), 'talentedge_page_description_box_callback', 'page', 'side', 'high');
}

/**
 * Add meta box for page header description - callback
 * @since  1.0.0
 */
function talentedge_page_description_box_callback() {
	global $post;
	?>
	<fieldset>
		<div>
			<p>
				<label for="talentedge_page_description"><?php _e('Description','talentedge'); ?></label><br />
				<?php wp_editor( get_post_meta($post->ID, 'talentedge_page_description', true), 'talentedge_page_description' ); ?>
			</p>
		</div>
	</fieldset>
	<?php
}



/**
 * Add meta box for page header description - save meta box
 * @since  1.0.0
 */
function talentedge_custom_add_save($postID){

	if($parent_id = wp_is_post_revision($postID))
	{
		$postID = $parent_id;
	}
	if (isset($_POST['talentedge_page_description'])) {
		talentedge_update_custom_meta($postID, $_POST['talentedge_page_description'], 'talentedge_page_description');
	}
}

/**
 * Add meta box for page header description - update meta box
 * @since  1.0.0
 */
function talentedge_update_custom_meta($postID, $newvalue, $field_name) {
	// To create new meta
	if(!get_post_meta($postID, $field_name)){
		add_post_meta($postID, $field_name, $newvalue);
	}else{
	// or to update existing meta
		update_post_meta($postID, $field_name, $newvalue);
	}
}

/**
 * Products slider on single page product
 * @since  1.0.0
 */
function talentedge_products_slider_on_single_page() {

	global $wp_customize;
	

	$talentedge_products_slider_single_hide = get_theme_mod('talentedge_products_slider_single_hide');

	if( isset($talentedge_products_slider_single_hide) && $talentedge_products_slider_single_hide != 1 ):
		echo '<hr class="divider-w">';
		echo '<section class="module module-small-bottom aya">';
	elseif ( isset( $wp_customize ) ):
		echo '<hr class="divider-w">';
		echo '<section class="module module-small-bottom talentedge_hidden_if_not_customizer">';
	endif;

	if( ( isset($talentedge_products_slider_single_hide) && $talentedge_products_slider_single_hide != 1 ) || isset( $wp_customize ) ):

			echo '<div class="container">';

				$talentedge_products_slider_title = get_theme_mod('talentedge_products_slider_title',__( 'Exclusive products', 'talentedge' ));
				$talentedge_products_slider_subtitle = get_theme_mod('talentedge_products_slider_subtitle',__( 'Special category of products', 'talentedge' ));

				if( !empty($talentedge_products_slider_title) || !empty($talentedge_products_slider_subtitle) ):
					echo '<div class="row">';
						echo '<div class="col-sm-6 col-sm-offset-3">';
							if( !empty($talentedge_products_slider_title) ):
								echo '<h2 class="module-title font-alt">'.$talentedge_products_slider_title.'</h2>';
							endif;
							if( !empty($talentedge_products_slider_subtitle) ):
								echo '<div class="module-subtitle font-serif">'.$talentedge_products_slider_subtitle.'</div>';
							endif;
						echo '</div>';
					echo '</div><!-- .row -->';
				endif;

				$talentedge_products_slider_category = get_theme_mod('talentedge_products_slider_category');

				if( !empty($talentedge_products_slider_category) && ($talentedge_products_slider_category != '-') ):

					$talentedge_products_slider_args = array( 'post_type' => 'product', 'posts_per_page' => 10, 'tax_query' => array(
						array(
							'taxonomy' => 'product_cat',
							'field'    => 'term_id',
							'terms'    => $talentedge_products_slider_category,
						)
					));

					$talentedge_products_slider_loop = new WP_Query( $talentedge_products_slider_args );

					if( $talentedge_products_slider_loop->have_posts() ):

							echo '<div class="row">';

								echo '<div class="owl-carousel text-center" data-items="5" data-pagination="false" data-navigation="false">';

									while ( $talentedge_products_slider_loop->have_posts() ) :

										$talentedge_products_slider_loop->the_post();

										echo '<div class="owl-item">';
											echo '<div class="col-sm-12">';
												echo '<div class="ex-product">';
													echo '<a href="'.get_permalink().'">' . woocommerce_get_product_thumbnail().'</a>';
													echo '<h4 class="shop-item-title font-alt"><a href="'.get_permalink().'">'.get_the_title().'</a></h4>';
														$product = new WC_Product( get_the_ID() );
														$rating_html = $product->get_rating_html( $product->get_average_rating() );
														if ( $rating_html && get_option( 'woocommerce_enable_review_rating' ) === 'yes' ) {
															echo '<div class="product-rating-home">' . $rating_html . '</div>';
														}
														if(!empty($product)):
															if( function_exists('get_woocommerce_price_format') ):
																$format_string = get_woocommerce_price_format();
															endif;	
															if( !empty($format_string) ):
																switch ( $format_string ) {
																	case '%1$s%2$s' :
																		echo get_woocommerce_currency_symbol().$product->price;
																	break;
																	case '%2$s%1$s' :
																		echo $product->price.get_woocommerce_currency_symbol();
																	break;
																	case '%1$s&nbsp;%2$s' :
																		echo get_woocommerce_currency_symbol().' '.$product->price;
																	break;
																	case '%2$s&nbsp;%1$s' :
																		echo $product->price.' '.get_woocommerce_currency_symbol();
																	break;
																}
															else:
																echo get_woocommerce_currency_symbol().$product->price;
															endif;
														endif;
													
												echo '</div>';
											echo '</div>';
										echo '</div>';

									endwhile;

									wp_reset_postdata();
								echo '</div>';

							echo '</div>';

					endif;

				else:

					$talentedge_products_slider_args = array( 'post_type' => 'product', 'posts_per_page' => 10);

					$talentedge_products_slider_loop = new WP_Query( $talentedge_products_slider_args );

					if( $talentedge_products_slider_loop->have_posts() ):

							echo '<div class="row">';

								echo '<div class="owl-carousel text-center" data-items="5" data-pagination="false" data-navigation="false">';

									while ( $talentedge_products_slider_loop->have_posts() ) :

										$talentedge_products_slider_loop->the_post();

										echo '<div class="owl-item">';
											echo '<div class="col-sm-12">';
												echo '<div class="ex-product">';
													echo '<a href="'.get_permalink().'">' . woocommerce_get_product_thumbnail().'</a>';
													echo '<h4 class="shop-item-title font-alt"><a href="'.get_permalink().'">'.get_the_title().'</a></h4>';
														$product = new WC_Product( get_the_ID() );
														$rating_html = $product->get_rating_html( $product->get_average_rating() );
														if ( $rating_html && get_option( 'woocommerce_enable_review_rating' ) === 'yes' ) {
															echo '<div class="product-rating-home">' . $rating_html . '</div>';
														}
														if(!empty($product)):
															if( function_exists('get_woocommerce_price_format') ):
																$format_string = get_woocommerce_price_format();
															endif;	
															if( !empty($format_string) ):
																switch ( $format_string ) {
																	case '%1$s%2$s' :
																		echo get_woocommerce_currency_symbol().$product->price;
																	break;
																	case '%2$s%1$s' :
																		echo $product->price.get_woocommerce_currency_symbol();
																	break;
																	case '%1$s&nbsp;%2$s' :
																		echo get_woocommerce_currency_symbol().' '.$product->price;
																	break;
																	case '%2$s&nbsp;%1$s' :
																		echo $product->price.' '.get_woocommerce_currency_symbol();
																	break;
																}
															else:
																echo get_woocommerce_currency_symbol().$product->price;
															endif;
														endif;
													
												echo '</div>';
											echo '</div>';
										echo '</div>';

									endwhile;

									wp_reset_postdata();
								echo '</div>';

							echo '</div>';

					endif;

				endif;

			echo '</div>';

		echo '</section>';

	endif;
}

if ( !function_exists( 'talentedge_search_products_no_results_wrapper' ) ) {
	function talentedge_search_products_no_results_wrapper() {
		
		$talentedge_body_classes = get_body_class();

		if( is_search() && in_array('woocommerce',$talentedge_body_classes) && in_array('search-no-results',$talentedge_body_classes) ) {
			echo '<section class="module-small module-small-shop">';
				echo '<div class="container">';
		}
	}
}	

if ( !function_exists( 'talentedge_search_products_no_results_wrapper_end' ) ) {
	function talentedge_search_products_no_results_wrapper_end() {
		
		$talentedge_body_classes = get_body_class();

		if( is_search() && in_array('woocommerce',$talentedge_body_classes) && in_array('search-no-results',$talentedge_body_classes) ) {
				echo '</div><!-- .container -->';
			echo '</section><!-- .module-small -->';
		}
	}
}	
