<?php
/**
 * The template for displaying all single posts.
 */

get_header(); ?>
<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/enterprise.css" rel="stylesheet" />

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
                                <p><?php echo get_field('description');?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <span class="overlay"></span>
            </div>
        </div>

         <!-- ~~~~~~~~~~~~~ single column section ~~~~~~~~~~~~~ -->
        <div class="gray_bg clearfix">
            <div class="singleColumn margin-top-45 margin-bottom-45 text-center">
               <div class="container">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="row">
                           <h2><?php echo get_field('problem_headline');?></h2>
                                <p><?php echo get_field('problem_statement');?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ~~~~~~~~~~~~~ Service widget section ~~~~~~~~~~~~~ -->
        <div class="services_widget coverImg text-center" style="background-image: url('../images/service_bg.png')">
            <span class="overlay blue_bg"></span>
            <div class="zIndex2">
                <h2 class="white text-uppercase">Services</h2>
                <div class="container white">
                    <div class="servicesMore">
                       
                        <?php

                        $posts = get_field('select_services');
                        if( $posts ):?>
                         <ul class="intestries_List text-center clearfix">
                        <?php
                            foreach( $posts as $post):
                                setup_postdata($post); ?>

                            <li>
                                  <a href="<?php echo get_permalink();?>">
                                <div class="white rounded img-circle">
                                   <div><i class="fa <?php echo get_field('icon');?>"></i></div>
                                </div>
                                <div class="text-uppercase name_ins white"><?php echo get_the_title();?></div>
                                </a>
                            </li>

                            <?php
                            endforeach;
                            wp_reset_postdata();?>
                            </ul>
                            <?php
                            endif;
                            ?>





                    </div>
                </div>
            </div>
        </div>
        <!-- ~~~~~~~~~~~~~ Service widget orange section ~~~~~~~~~~~~~ -->
        <div class="services_widget coverImg text-center" style="background-image: url('../images/service_bg.png')">
            <span class="overlay orange_bg"></span>
            <div class="zIndex2">
                <h2 class="white text-uppercase">Products</h2>
                <div class="container white">
                    <div class="servicesMore">
                        
                        
                          <?php

                        $posts = get_field('select_products');
                        if( $posts ):?>
                         <ul class="intestries_List text-center clearfix">
                        <?php
                            foreach( $posts as $post):
                                setup_postdata($post); ?>

                            <li>
                                  <a href="<?php echo get_permalink();?>">
                                <div class="white rounded img-circle">
                                   <div><i class="fa <?php echo get_field('icon');?>"></i></div>
                                </div>
                                <div class="text-uppercase name_ins white"><?php echo get_the_title();?></div>
                                </a>
                            </li>

                            <?php
                            endforeach;
                            wp_reset_postdata();?>
                            </ul>
                            <?php
                            endif;
                            ?>


                      
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ~~~~~~~~~~~~~ Single column our clients ~~~~~~~~~~~~~ -->
     <?php if( have_rows('clients') ):?>
        <div class="gray_bg clearfix">
            <div class="singleColumn margin-top-45 margin-bottom-45 text-center">
                <div class="container">
                    <div class="col-md-10 col-md-offset-1 col-sm-12 col-xs-12 ourClients-fluid">
                        <div class="row">
                            <h2 class="title gray_black_clr text-uppercase margin-bottom-45"><?php echo get_field('cheadline');?></h2>
                            <p><?php echo get_field('cdescription');?></p>
                           
                                   
<div class="ourClients-wrapper">
                                <div class="ourClients owl-carousel">  

  <?php   while ( have_rows('clients') ) : the_row(); ?>

     <div class="item"><img src="<?php echo get_sub_field('logo')?>"></div>

  <?php  endwhile; ?>

  </div>
                            </div>




                                 
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php endif; ?>
<?php include( locate_template( 'temp-resource.php',false, false ) ); ?>
           <?php include( locate_template( 'template-request.php',false, false ) ); ?>

    </section>
    
<?php get_footer(); ?>
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
});
</script>