<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package talentedge
 */

if ( ! is_active_sidebar( 'talentedge-sidebar-shop-archive' ) ) {
	return;
}
?>

<div id="secondary" class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'talentedge-sidebar-shop-archive' ); ?>
</div><!-- #secondary -->
