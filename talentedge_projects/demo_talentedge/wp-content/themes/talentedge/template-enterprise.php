<?php
/**
 * The template for displaying contact page.
 *
 * Template Name: Enterprise page
 *
 */

get_header(); ?>
<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/enterprise.css" rel="stylesheet" />
<style>
    .statsCover{background:#3246b2;}
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
                                <h1><?php echo get_field('headline')?></h1>
                                <p><?php echo get_field('subheadline')?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <span class="overlay"></span>
            </div>
        </div>

    

        <!-- ~~~~~~~~~~~~~ Two column section ~~~~~~~~~~~~~ -->
        <div class="clearfix" id="offerings">
            <div class="twoColumn margin-top-45 margin-bottom-45 text-center">
                <div class="container services">
                    <h2 class="title black-clr text-uppercase text-center"><?php echo get_field('sheadline');?></h2>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                <img src="<?php echo get_field('services_icon');?>" width="80" />
                        <div class="pad-LR-35 text-center margin-bottom-20">
                            <h3 class="title black-clr text-uppercase darkOrange"><?php echo get_field('services_headline');?></h3>
                           	<?php 

$posts = get_field('services');

if( $posts ): ?>
    <ul>
    <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
        <?php setup_postdata($post); ?>
        <li>
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </li>
    <?php endforeach; ?>
    </ul>
    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
<?php endif; ?>
                        </div>
                        <div class="text-center text-uppercase">
                                <a class="redirect_link" href="<?php echo home_url();?>/services">Learn More</a>
                            </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="pad-LR-35 text-center margin-bottom-20">
                             <img src="<?php echo get_field('products_icon');?>" width="80" />
                            <h3 class="title black-clr text-uppercase lightOrange"><?php echo get_field('products_headline');?></h3>
                           	<?php 

$posts = get_field('products');

if( $posts ): ?>
    <ul>
    <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
        <?php setup_postdata($post); ?>
        <li>
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </li>
    <?php endforeach; ?>
    </ul>
    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
<?php endif; ?>
                        </div>
                        <div class="text-center text-uppercase">
                                <a class="redirect_link" href="<?php echo home_url();?>/products">Learn More</a>
                            </div>
                    </div>
                </div>

            </div>
            
        </div>

        <!-- ~~~~~~~~~~~~~ Service widget section ~~~~~~~~~~~~~ -->
        <div class="coverImg text-center">
        <img src="<?php echo get_field('why_image');?>" class="img-responsive"/>
        </div>


         <!-- ~~~~~~~~~~~~~ Stats section ~~~~~~~~~~~~~ -->
        <div class="clearfix statsCover cover_full">
            <div class="container">
                
                    
<?php 
if( have_rows('stats') ):
?>
   <ul class="range_numaric">
    <?php while ( have_rows('stats') ) : the_row(); ?>
         <li>
            <div class="range_value">
                <div><?php echo get_sub_field('headline');?></div>
            </div>
            <span class="rangeOf"><?php echo get_sub_field('subheadline');?></span>
        </li>
    <?php  endwhile; ?>
    </ul>
    <?php endif; ?>
                  
            </div>
        </div>

        <!-- ~~~~~~~~~~~~~ Single column Industries we work section-1 ~~~~~~~~~~~~~ -->
        <div class="clearfix">
            <div class="singleColumn margin-top-45 margin-bottom-45 text-center">
                <div class="container">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="row">
                            <h2 class="title gray_black_clr text-uppercase margin-bottom-45"><?php echo get_field('industry_headline');?></h2>
                            

                             	<?php 

$posts = get_field('select_industries');

if( $posts ): ?>
     <ul class="intestries_List carousel text-center owl-carousel">
    <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
        <?php setup_postdata($post); ?>
         <li>
           <a href="<?php echo get_permalink();?>"> <div class="white rounded lightOrange_bg img-circle">
                <div><i class="fa <?php echo get_field('icon');?>"></i></div>
            </div>
            <div class="text-uppercase"><?php the_title(); ?></div>
            </a>
        </li>
    <?php endforeach; ?>
    </ul>
    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
<?php endif; ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ~~~~~~~~~~~~~ Single column our clients ~~~~~~~~~~~~~ -->
        <div class="gray_bg clearfix">
            <div class="singleColumn margin-top-45 margin-bottom-45 text-center">
                <div class="container">
                    <div class="col-md-10 col-md-offset-1 col-sm-12 col-xs-12 ourClients-fluid">
                        <div class="row">
                            <h2 class="title gray_black_clr text-uppercase margin-bottom-45"><?php echo get_field('cheadline');?></h2>
                            <p><?php echo get_field('cdescription');?></p>
                           
                                    <?php

// check if the repeater field has rows of data
if( have_rows('clients') ):?>
<div class="ourClients-wrapper">
                                <div class="ourClients owl-carousel">  

  <?php   while ( have_rows('clients') ) : the_row(); ?>

 	 <div class="item"><img src="<?php echo get_sub_field('logo')?>"></div>

  <?php  endwhile; ?>

  </div>
                            </div>

<?php endif; ?>



                                 
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include( locate_template( 'temp-resource.php',false, false ) ); ?>
        <?php include( locate_template( 'template-request.php',false, false ) ); ?>


    </section>
<?php			
get_footer(); ?>
<script type="text/javascript">
    var $ = jQuery;

$(document).ready(function() {
     var learnerList = $('.ourClients').length;
    if (learnerList > 0) {
        $('.ourClients').owlCarousel({
            margin: 5,
            loop: true,
            items: 4,
            nav: false,
            dots: true,
            mouseDrag: true,
            autoplay: false,
            responsive: {
                0: {
                    items: 1,
                    dots: true,
                },
                413: {
                    items: 2,
                    dots: true,
                },
                735: {
                    items: 4,
                }
            }
        });
    }
    if ($('.intestries_List').length) {
        $('.intestries_List').owlCarousel({
            loop: false,
            items: 6,
            nav: false,
            dots: false,
            mouseDrag: false,
            autoplay: false,
            responsive: {
                0: {
                    items: 2,
                    dots: true
                },
                413: {
                    items: 3,
                    dots: true
                },
                735: {
                    items: 4,
                    dots: true
                },
                1024: {
                    items: 6
                }
            }
        });
    } 
});
</script>