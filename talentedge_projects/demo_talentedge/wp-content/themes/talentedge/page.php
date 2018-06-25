<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 */

get_header(); ?>
<style>
.banner-headline{padding:3% 0;}
p{
font-size: 16px;
line-height: 26px;
font-family: proxima-nova, sans-serif;
color: #333;
}
h2{
font-size: 28px;
line-height: 34px;
font-weight: 600;
margin:20px 0px;
}

h3{
font-size: 24px;
line-height: 30px;
font-weight: 600;
margin:20px 0px;
}
/*.woocommerce-order-pay .banner-headline {
    height: 400px;
}
.woocommerce-order-pay .banner-headline  .woocommerce{display:none;}
*/
</style>
 <?php if (!is_checkout()) {?>
<section class="section-banner" style="background:#f2f2f2">
<div class="container">
	<div class="">
		<div class="banner-headline nn">
		<h2><?php echo get_the_title();?></h2>
		</div>
	</div>
</div>
</section>
<?php } ?>

<div class="container">
	<div class="">
		<div class="banner-headline entry-content">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<?php the_content(); ?>
		<?php endwhile; endif; ?>
		</div>
	</div>
</div>


<?php get_footer(); ?>