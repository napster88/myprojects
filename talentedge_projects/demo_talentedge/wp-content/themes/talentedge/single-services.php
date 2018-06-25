<?php
/**
 * The template for displaying all single posts.
 */

get_header(); ?>
<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/enterprise.css" rel="stylesheet" />
<style>
    .subscibe-section{display:none;}
</style>
<!-- ~~~~~~~~~~ main wrapper ~~~~~~~~~~ -->
    <section class="main-wrapper">


        <!-- ~~~~~~~~~~~~~ Banner section ~~~~~~~~~~~~~ -->
        <div class="sectionBanner">
            <div id="view_hero" style="background-image: url(<?php echo get_field('background_image')?>);" class="te-banner-top coverImg cover_full">
                <div class="container zIndex2">
                    <div class="left-te col-md-8 col-sm-12 col-xs-12">
                        <div class="clearfix">
                            <div class="banner-components">
                                <h1><?php echo get_the_title();?></h1>
                                <p><?php echo get_field('subheadline')?></p>
                               
                            </div>
                        </div>
                    </div>
                </div>
                <span class="overlay"></span>
            </div>
        </div>

        <div class="singleColumn margin-top-45 margin-bottom-45 text-center">
            <div class="container">
                <div class="col-md-10 col-md-offset-1 col-sm-12 col-xs-12">
                    <p><?php echo  get_field('description');?></p>
                </div>
            </div>
        </div>


        <!-- ~~~~~~~~~~~~~ Two column section ~~~~~~~~~~~~~ -->
        <div class="gray_bg clearfix">
            <div class="dividerColumn center-column-icon text-center margin-bottom-20 clearfix">
          
            <div class="container">
                
               <!-- <div class="col-md-6 col-md-6 col-xs-12 right">
                    <div class="cover_full" style="background-image: url(<?php echo get_field('image');?>)"></div>
                </div>
                -->
                
                <div class="col-md-offset-2 col-md-4 col-md-6 col-xs-12 gray_black_clr">

                <?php
                if ( get_field('feature_headline')){
                    $feature =  get_field('feature_headline');
                }else{
                    $feature = 'Features';
                }
                ?>
                <div class="text-center icons-wrp-ft"><i class="fa icon-our-usp"></i></div>
                    <h3 class=""><?php echo $feature;?></h3>
                    <?php

// check if the repeater field has rows of data
if( have_rows('features') ):
    echo '<ul class="list-arrow text-left">';
    // loop through the rows of data
    while ( have_rows('features') ) : the_row();?>
   <li><?php echo get_sub_field('title');?></li>

<?php
    endwhile;
echo '</ul>';

    // no rows found

endif;

?>
</div>
<div class="col-md-4 col-md-6 col-xs-12 gray_black_clr">
<?php
                if ( get_field('benefits_headline')){
                    $bene =  get_field('benefits_headline');
                }else{
                    $bene = 'Benefits';
                }
                ?>
                <div class="text-center icons-wrp-ft"><i class="fa icon-our-purpose"></i></div>
                    <h3 class=""><?php echo $bene;?></h3>
                    <?php

// check if the repeater field has rows of data
if( have_rows('benefits') ):
    echo '<ul class="list-arrow text-left">';
    // loop through the rows of data
    while ( have_rows('benefits') ) : the_row();?>
   <li><?php echo get_sub_field('title');?></li>

<?php
    endwhile;
echo '</ul>';

    // no rows found

endif;

?>
                </div>
                </div>
            </div>
        </div>

<?php include( locate_template( 'temp-resource.php',false, false ) ); ?>
           <?php include( locate_template( 'template-request.php',false, false ) ); ?>

    </section>
    
<?php get_footer(); ?>