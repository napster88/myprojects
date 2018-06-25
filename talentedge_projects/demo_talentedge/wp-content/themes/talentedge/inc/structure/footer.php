<?php
/**
 * Template functions used for the site footer.
 *
 */

if ( ! function_exists( 'talentedge_footer_widgets' ) ) {
	/**
	 * Display the footer widgets
	 * @since  1.0.0
	 * @return void
	 */
	function talentedge_footer_widgets() {
		?>
		<!-- Widgets start -->

	<?php if ( is_active_sidebar( 'sidebar-footer-area-1' ) || is_active_sidebar( 'sidebar-footer-area-2' ) || is_active_sidebar( 'sidebar-footer-area-3' ) || is_active_sidebar( 'sidebar-footer-area-4' ) ) : ?>

		<div class="module-small bg-dark talentedge_footer_sidebar">
			<div class="container">
				<div class="row">

					<?php if ( is_active_sidebar( 'sidebar-footer-area-1' ) ) : ?>
						<div class="col-sm-6 col-md-3 footer-sidebar-wrap">
							<?php dynamic_sidebar('sidebar-footer-area-1'); ?>
						</div>
					<?php endif; ?>
					<!-- Widgets end -->

					<?php if ( is_active_sidebar( 'sidebar-footer-area-2' ) ) : ?>
						<div class="col-sm-6 col-md-3 footer-sidebar-wrap">
							<?php dynamic_sidebar('sidebar-footer-area-2'); ?>
						</div>
					<?php endif; ?>
					<!-- Widgets end -->

					<?php if ( is_active_sidebar( 'sidebar-footer-area-3' ) ) : ?>
						<div class="col-sm-6 col-md-3 footer-sidebar-wrap">
							<?php dynamic_sidebar('sidebar-footer-area-3'); ?>
						</div>
					<?php endif; ?>
					<!-- Widgets end -->


					<?php if ( is_active_sidebar( 'sidebar-footer-area-4' ) ) : ?>
						<div class="col-sm-6 col-md-3 footer-sidebar-wrap">
							<?php dynamic_sidebar('sidebar-footer-area-4'); ?>
						</div>
					<?php endif; ?>
					<!-- Widgets end -->

				</div><!-- .row -->
			</div>
		</div>

	<?php endif; ?>

		<?php
	}
}

if ( ! function_exists( 'talentedge_footer_copyright_and_socials' ) ) {
	/**
	 * Display the theme copyright and socials
	 * @since  1.0.0
	 * @return void
	 */
	function talentedge_footer_copyright_and_socials() {

		?>
		<!-- Footer start -->
		<footer class="footer bg-dark">
			<!-- Divider -->
			<hr class="divider-d">
			<!-- Divider -->
			<div class="container">

				<div class="row">

					<?php
					/* Copyright */
					$talentedge_copyright = get_theme_mod('talentedge_copyright',__( '&copy; Themeisle, All rights reserved', 'talentedge' ));
					if( !empty($talentedge_copyright) ):
						echo '<div class="col-sm-6">';
							echo '<p class="copyright font-alt">'.$talentedge_copyright.'</p>';
							$talentedge_site_info_hide = get_theme_mod('talentedge_site_info_hide');
							if( isset($talentedge_site_info_hide) && $talentedge_site_info_hide != 1 ): ?>
							<p class="talentedge-poweredby-box"><a class="talentedge-poweredby" href="http://themeisle.com/themes/talentedge/" rel="nofollow">ShopIsle </a><?php _e('powered by','talentedge'); ?><a class="talentedge-poweredby" href="http://wordpress.org/" rel="nofollow"> WordPress</a></p>
							<?php
							endif;
						echo '</div>';
					endif;

					/* Socials icons */

					$talentedge_socials = get_theme_mod('talentedge_socials',json_encode(array( array('icon_value' => 'social_facebook' ,'link' => '#' ),array('icon_value' => 'social_twitter' ,'link' => '#'), array('icon_value' => 'social_dribbble' ,'link' => '#'), array('icon_value' => 'social_skype' ,'link' => '#') )));

					if( !empty( $talentedge_socials ) ):

						$talentedge_socials_decoded = json_decode($talentedge_socials);

						if( !empty($talentedge_socials_decoded) ):

							echo '<div class="col-sm-6">';

								echo '<div class="footer-social-links">';

									foreach($talentedge_socials_decoded as $talentedge_social):

										if( !empty($talentedge_social->icon_value) && !empty($talentedge_social->link) ) {
									
											if (function_exists ( 'icl_t' ) && !empty($talentedge_social->id)){


											
												$talentedge_social_icon_value = icl_t( 'Social '.$talentedge_social->id, 'Social icon', $talentedge_social->icon_value );
												
												$talentedge_social_link = icl_t( 'Social '.$talentedge_social->id, 'Social link', $talentedge_social->link );
												
												
												
												echo '<a href="'. esc_url( $talentedge_social_link ) .'"><span class="'.$talentedge_social_icon_value.'"></span></a>';		
												
											} else {
												
												echo '<a href="'.esc_url($talentedge_social->link).'"><span class="'.$talentedge_social->icon_value.'"></span></a>';					
											}
									
										}

									endforeach;

								echo '</div>';

							echo '</div>';

						endif;

					endif;
					?>
				</div><!-- .row -->

			</div>
		</footer>
		<!-- Footer end -->
		<?php
	}
}


if ( ! function_exists( 'talentedge_footer_wrap_open' ) ) {
	/**
	 * Display the theme copyright and socials
	 * @since  1.0.0
	 * @return void
	 */
	function talentedge_footer_wrap_open() {
		echo '</div><div class="bottom-page-wrap">';
	}

}


if ( ! function_exists( 'talentedge_footer_wrap_close' ) ) {
	/**
	 * Display the theme copyright and socials
	 * @since  1.0.0
	 * @return void
	 */
	function talentedge_footer_wrap_close() {
		echo '</div><!-- .bottom-page-wrap -->';
	}

}