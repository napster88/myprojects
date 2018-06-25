<?php
/**
 * The template for displaying contact page.
 *
 * Template Name: Selfi Scan page
 *
 */

get_header(); ?>
<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/selfi.css" rel="stylesheet" />
<!-- ~~~~~~~~~~ main wrapper ~~~~~~~~~~ -->
    <section class="main-wrapper">
        <!-- ~~~~~~~~~~~~~ top banner ~~~~~~~~~~~~~ -->
        <div class="askproSection">
            <div class="sectionBanner">
                <div class="container">
                    <h1><?php echo get_field('banner_headline');?></h1>
                    <div class="clearfix">
                        <p><?php echo get_field('banner_subheadline');?>
                        <a class="text-center" href="<?php echo get_field('header_button_link');?>"><?php echo get_field('header_button_text');?></a>
                        </p>
                    </div>
                </div>
            </div>
            <!-- ~~~~~~~~~~~~~ Description askpro ~~~~~~~~~~~~~ -->
            <div class="sectionContext">
                <div class="container">
                   <?php echo get_field('content');?>

                </div>
            </div>
        </div>




        <!-- ~~~~~~~~~~~~~ enterprice section ~~~~~~~~~~~~~ -->
        <div class="te-enterprice">
            <div class="cover_img" style="background-image: url(' <?php echo get_field('footer_background_image');?>');">
                <div class="container">
                    <div class="text-center">
                        <h2 class="title">
                            <?php echo get_field('footer_headline');?>
                        </h2>
                        <p><?php echo get_field('footer_subheadline');?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php			
get_footer(); ?>