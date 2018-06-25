<div <?php post_class('post'); ?> id="post-<?php the_ID(); ?>" itemscope="" itemtype="http://schema.org/BlogPosting">

	<?php
	/**
 	 * @hooked talentedge_post_header() - 10
 	 * @hooked talentedge_post_meta() - 20
 	 * @hooked talentedge_post_content() - 30
	 */
	do_action( 'talentedge_loop_post' );
	?>

</div><!-- #post-## -->