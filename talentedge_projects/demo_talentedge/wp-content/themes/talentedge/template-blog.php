<?php
/*
Template Name: Blog template
*/
?>
<?php get_header(); ?>

	<!-- Wrapper start -->
	<div class="main">

	<!-- Header section start -->
	<?php
		$talentedge_header_image = get_header_image();
		if( !empty($talentedge_header_image) ):
			echo '<section class="page-header-module module bg-dark" data-background="'.$talentedge_header_image.'">';
		else:
			echo '<section class="page-header-module module bg-dark">';
		endif;
	?>
		<div class="container">

			<div class="row">

				<div class="col-sm-10 col-sm-offset-1">

					<h1 class="module-title font-alt"><?php the_title(); ?></h1>

					<?php

					/* Header description */

					$talentedge_shop_id = get_the_ID();

					if( !empty($talentedge_shop_id) ):

						$talentedge_page_description = get_post_meta($talentedge_shop_id, 'talentedge_page_description');

						if( !empty($talentedge_page_description[0]) ):
							echo '<div class="module-subtitle font-serif mb-0">'.$talentedge_page_description[0].'</div>';
						endif;

					endif;
					?>

				</div><!-- .col-sm-6 col-sm-offset-3 -->

			</div><!-- .row -->

		</div><!-- .container -->

	<?php
		echo '</section><!-- .module -->';
	?>
	<!-- Header section end -->

	<!-- Blog standar start -->
	<?php
		$talentedge_posts_per_page = get_option('posts_per_page'); /* number of latest posts to show */

		if( !empty($talentedge_posts_per_page) && ($talentedge_posts_per_page > 0) ):

			$talentedge_query = new WP_Query( array('post_type' => 'post', 'posts_per_page' => $talentedge_posts_per_page,'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1 ) ) );



			if ( have_posts() ) {

				?>
				<section class="module">
					<div class="container">

						<div class="row">

							<!-- Content column start -->
							<div class="col-sm-8" id="talentedge-blog-container">
								<?php

								while ( $talentedge_query->have_posts() ) {
									$talentedge_query->the_post();

									?>
									<div id="post-<?php the_ID(); ?>" <?php post_class("post"); ?> itemscope="" itemtype="http://schema.org/BlogPosting">

										<?php
										if ( has_post_thumbnail() ) {
											echo '<div class="post-thumbnail">';
												echo '<a href="'.get_permalink().'">';
													echo get_the_post_thumbnail($post->ID, 'talentedge_blog_image_size');
												echo '</a>';
											echo '</div>';
										}
										?>

										<div class="post-header font-alt">
											<h2 class="post-title"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h2>
											<div class="post-meta">
												<?php
												talentedge_posted_on();
												?>

											</div>
										</div>

										<div class="post-entry">
											<?php
											$shop_isleismore = @strpos( $post->post_content, '<!--more-->');
											if($shop_isleismore) :
												the_content();
											else :
												the_excerpt();
											endif;
											?>
										</div>

										<div class="post-more">
											<a href="<?php echo get_permalink(); ?>" class="more-link"><?php _e('Read more','talentedge'); ?></a>
										</div>

									</div>
									<?php

								}

								?>

								<!-- Pagination start-->
								<div class="pagination font-alt">
									<?php next_posts_link(__('<span class="meta-nav">&laquo;</span> Older posts', 'talentedge'), $talentedge_query->max_num_pages); ?>
									<?php previous_posts_link(__('Newer posts <span class="meta-nav">&raquo;</span>', 'talentedge'), $talentedge_query->max_num_pages); ?>
								</div>
								<!-- Pagination end -->
							</div>
							<!-- Content column end -->

							<!-- Sidebar column start -->
							<div class="col-sm-4 col-md-3 col-md-offset-1 sidebar">

								<?php do_action( 'talentedge_sidebar' ); ?>

							</div>
							<!-- Sidebar column end -->

						</div><!-- .row -->

					</div>
				</section>
				<!-- Blog standar end -->

				<?php
				/* Restore original Post Data */
				wp_reset_postdata();
			}

		endif;

		?>

<?php get_footer(); ?>