<?php
/**
 * The template for displaying archive pages.
 *
 * Template Name: Referral page
 *
 */
?>

<?php get_header(); ?>
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
.overlay {
    position: absolute;
    content: "";
    display: block;
    left: 0;
    top: 0;
    right: 0;
    bottom: 0;
    background: rgba(0,0,0,0.5);
    z-index: 1;
}
.te-banner-top {
    background-color: #244895;
    background-position: top;
    min-height: 150px;
    color: #fff;
}
.coverImg {
    position: relative;
}
.coverImg .zIndex2 {
    position: relative;
    z-index: 2;
    min-height: 60vh;
}
h1 {
    font-size: 50px;
    color: #fff;
    font-family: "Oswald",sans-serif;
    line-height: 1.4;
    font-weight: bold;
}
.te-banner-top .left-te {
    position: absolute;
    top: 52%;
    transform: translateY(-50%);
}
p {
    font-size: 16px;
    line-height: 26px;
    font-family: proxima-nova, sans-serif;
    color: #333;
}
.container .entry-content {
    max-width: 880px !important;
    margin: 0 auto !important;
}
.container .entry-content strong {
    font-weight: bold;
    font-size: 16px;
    /*margin-bottom: 10px;*/
    display: inline-block;
}
p + ul {
    padding-top: 8px;
}

.container .entry-content li {
    padding-left: 20px;
    background-image: url(/wp-content/themes/talentedge/images/arrow_sup.png) !important;
    background-repeat: no-repeat;
    background-position: 0 4px;
    background-size: 11px;
    margin-bottom: 15px;
}
.subscibe-section{
    display: none;
}

.container .entry-content li:first-child {
    margin-top: 10px;
}

/*.woocommerce-order-pay .banner-headline {
    height: 400px;
}
.woocommerce-order-pay .banner-headline  .woocommerce{display:none;}
*/
</style>
<!-- <link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/career.css" rel="stylesheet" />
 --> <?php if (!is_checkout()) {?>
<!-- <section class="section-banner" style="background:#f2f2f2">
<div class="container">
	<div class="">
		<div class="banner-headline nn">
		<h2><?php echo get_the_title();?></h2>
		</div>
	</div>
</div> -->
</section>
  <div class="sectionBanner">
            <div id="view_hero" style="background-image: url(<?php echo get_field('background_image') ?>);" class="te-banner-top coverImg cover_full">
                <div class="container zIndex2">
                    <div class="left-te col-md-12 col-sm-12 col-xs-12">
                        <div class="clearfix">
                            <div class="banner-components">
                                <h1><?php echo get_the_title();?></h1>
                               <!--  <h3 class="text-white"><?php echo get_field('subheadline');?></h3>
                                <p><?php echo get_field('description');?></p> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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