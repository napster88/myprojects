<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package talentedge
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	/**
	 * @hooked talentedge_page_content - 20
	 */
	do_action( 'talentedge_page' );
	?>
</article><!-- #post-## -->
