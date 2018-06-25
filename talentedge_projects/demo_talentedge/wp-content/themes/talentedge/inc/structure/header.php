<?php
/**
 * Template functions used for the site header.
 *
 * @package talentedge
 */

if ( ! function_exists( 'talentedge_primary_navigation' ) ) {
	/**
	 * Display Primary Navigation
	 * @since  1.0.0
	 * @return void
	 */
	function talentedge_primary_navigation() {

		global $wp_customize;

		?>
		<!-- Navigation start -->
		<nav class="navbar navbar-custom navbar-transparent navbar-fixed-top" role="navigation">

			<div class="container">
				<div class="header-container">

					<div class="navbar-header">
						<?php

							$talentedge_logo = get_theme_mod('talentedge_logo');
							echo '<div class="talentedge_header_title"><div class="talentedge-header-title-inner">';
							if( !empty($talentedge_logo) ):
								echo '<a href="'.esc_url( home_url( '/' ) ).'" class="logo-image"><img src="'.$talentedge_logo.'"></a>';
								if( isset( $wp_customize ) ):
									echo '<h1 class="site-title talentedge_hidden_if_not_customizer""><a href="'.esc_url( home_url( '/' ) ).'" title="'.esc_attr( get_bloginfo( 'name', 'display' ) ).'" rel="home">'.get_bloginfo( 'name' ).'</a></h1>';
									echo '<h2 class="site-description talentedge_hidden_if_not_customizer"><a href="'.esc_url( home_url( '/' ) ).'" title="'.esc_attr( get_bloginfo( 'name', 'display' ) ).'" rel="home">'.get_bloginfo( 'description' ).'</a></h2>';
								endif;
							else:
								if( isset( $wp_customize ) ):
									echo '
											<a href="'.esc_url( home_url( '/' ) ).'" class="logo-image talentedge_hidden_if_not_customizer">
												<img src="">
											</a>
										';
								endif;							
								echo '<h1 class="site-title"><a href="'.esc_url( home_url( '/' ) ).'" title="'.esc_attr( get_bloginfo( 'name', 'display' ) ).'" rel="home">'.get_bloginfo( 'name' ).'</a></h1>';
								echo '<h2 class="site-description"><a href="'.esc_url( home_url( '/' ) ).'" title="'.esc_attr( get_bloginfo( 'name', 'display' ) ).'" rel="home">'.get_bloginfo( 'description' ).'</a></h2>';
							endif;
							echo '</div></div>';
						?>

						<div type="button" class="navbar-toggle" data-toggle="collapse" data-target="#custom-collapse">
							<span class="sr-only"><?php _e('Toggle navigation','talentedge'); ?></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</div>
					</div>

					<div class="header-menu-wrap">
						<div class="collapse navbar-collapse" id="custom-collapse">

							<?php wp_nav_menu( array('theme_location' => 'primary', 'container' => false, 'menu_class' => 'nav navbar-nav navbar-right') ); ?>

						</div>
					</div>

					<?php if( class_exists( 'WooCommerce' ) ): ?>
						<div class="navbar-cart">
							
							<div class="header-search">
								<div class="glyphicon glyphicon-search header-search-button"></div>
								<div class="header-search-input">
									<form role="search" method="get" class="woocommerce-product-search" action="<?php echo esc_url( home_url( '/'  ) ); ?>">
										<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search Products&hellip;', 'placeholder', 'talentedge' ); ?>" value="<?php echo get_search_query(); ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label', 'talentedge' ); ?>" />
										<input type="submit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'talentedge' ); ?>" />
										<input type="hidden" name="post_type" value="product" />
									</form>
								</div>
							</div>

							<?php if( function_exists( 'WC' ) ): ?>
								<div class="navbar-cart-inner">
									<a href="<?php echo WC()->cart->get_cart_url() ?>" title="<?php _e( 'View your shopping cart','talentedge' ); ?>" class="cart-contents">
										<span class="icon-basket"></span>
										<span class="cart-item-number"><?php echo trim( WC()->cart->get_cart_contents_count() ); ?></span>
									</a>
								</div>
							<?php endif; ?>

						</div>
					<?php endif; ?>
	
				</div>
			</div>

		</nav>
		<!-- Navigation end -->
		<?php
	}
}