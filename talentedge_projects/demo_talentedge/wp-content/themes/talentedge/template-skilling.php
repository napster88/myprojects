<?php
/**
 * The template for displaying contact page.
 *
 * Template Name: Skilling page
 *
 */

get_header(); ?>
<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/skilling.css" rel="stylesheet" />
<style>
    .subscibe-section{display:none;}
    .te-banner-top .left-te{padding:25vh 0 26vh;}
</style>
<!-- ~~~~~~~~~~ main wrapper ~~~~~~~~~~ -->
    <section class="main-wrapper">


        <!-- ~~~~~~~~~~~~~ Banner section ~~~~~~~~~~~~~ -->
        <div class="sectionBanner">
            <div id="view_hero" style="background-image: url(<?php echo get_field('background_image')?>);" class="te-banner-top coverImg cover_full">
                <div class="container zIndex2">
                    <div class="left-te col-md-8 col-sm-12 col-xs-12 text-left">
                        <div class="clearfix">
                            <div class="banner-components">
                                <h1 class="xt"><?php echo get_field('banner_headline');?></h1>
                            </div>
                        </div>
                    </div>
                </div>
                <span class="overlay"></span>
            </div>
        </div>

        <!-- ~~~~~~~~~~~~~ Global partners ~~~~~~~~~~~~~ -->
        <div class="global-partners-section">
            <div class="container">
                <div class="col-md-12 col-sm-12 col-xs-12 global-slider-widget">
                    <div class="owl-carousel global-client-slider owl-theme">
                        <?php

// check if the repeater field has rows of data
if( have_rows('partners') ):

    // loop through the rows of data
    while ( have_rows('partners') ) : the_row();

    ?>
<img class="owl-lazy" data-src="<?php echo get_sub_field('image');?>" />
    <?php

    endwhile;

endif;

?>
                    </div>
                </div>
            </div>
        </div>

        <!-- ~~~~~~~~~~~~~ Browse courses ~~~~~~~~~~~~~ -->
        <div class="te-browse-courses">
            <div class="container">
                <div class="text-center">
                    <h2 class="title text-uppercase"><?php echo get_field('sheadline');?></h2>
                    <p class=""><?php echo get_field('sdescription');?></p>
                </div>
                <!-- diamond shaped grids -->
                <div class="col-md-12 col-sm-12 col-xs-12">
                    
                    <?php 

$terms = get_field('sectors');
//print_r($terms);
if( $terms ): ?>

                    <ul class="grid-annoying">
                    <?php foreach( $terms as $term ): 
                    $term_id = $term;
                    $termcat = get_term( $term_id, 'skilling_sectors' );
                    $taxonomy ='skilling_sectors';
                    $term_link = get_term_link( $term_id );
                    ?>
                           <li>
                            <div class="transform-rotate">
                                <a href="<?php echo $term_link;?>" class="red-overlay" style="background-color: <?php echo get_field('background_color',$taxonomy . '_' . $term_id)?>;"></a>
                                <a class="show" href="<?php echo $term_link;?>">
                                    <img src="<?php echo get_field('homepage_image',$taxonomy . '_' . $term_id)?>">
                                    <div class="cnt-rotate">
                                        <div class="change-angle">
                                            <i class="fa <?php echo get_field('homepage_icon',$taxonomy . '_' . $term_id)?>" aria-hidden="true"></i>
                                            <h3><?php echo $termcat->name; ?></h3>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </li>

                        <?php endforeach; ?>

    </ul>

<?php endif; ?>
                     
                       
                </div>
                 <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                    <a class="re_link" href="<?php echo home_url();?>/skilling-courses">Browse All</a>
                </div>
            
            </div>
        </div>

        <!-- ~~~~~~~~~~~~~ why talent edge ~~~~~~~~~~~~~ -->
        <div class="te-why-talent">
            <div class="clearfix">
                <div class="text-center">
                    <h2 class="title  text-uppercase">
                        <?php echo get_field('whyheadline');?>
                    </h2>
                </div>
                <div class="talent-wrapper clearfix">
                    <div class="col-md-7 col-md-offset-0 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0 left">
                        <ul id="talent">
                             <?php
                             $f=1;
                // check if the repeater field has rows of data
                 echo have_rows('features');
                if( have_rows('features') ):

                    // loop through the rows of data
                    while ( have_rows('features') ) : the_row();

                    ?>
                     <li>
                        <a href="#talentTab<?php echo $f;?>">
                            <div class="left-icon"><i class="fa <?php echo get_sub_field('icon')?>" aria-hidden="true"></i></div>
                            <div class="right-content">
                                <h3><?php echo get_sub_field('title')?></h3>
                                <p><?php echo get_sub_field('description')?></p>
                            </div>
                        </a>
                    </li>
                    <?php
                    $f++;
                    endwhile;

                endif;

                ?>
                        </ul>
                    </div>
                    <div class="col-md-5 col-sm-6 hidden-xs right">
                        <div class="tab-images">
                          <?php
                          $ff=1;
                // check if the repeater field has rows of data
                if( have_rows('features') ):

                    // loop through the rows of data
                    while ( have_rows('features') ) : the_row();

                    ?>
                     
                            <div id="talentTab<?php echo $ff;?>" class="tab-section">
                                <img src="<?php echo get_sub_field('image');?>">
                            </div>
                    <?php
                    $ff++;
                    endwhile;

                endif;

                ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- ~~~~~~~~~~~~~ Two column section our skilling centers ~~~~~~~~~~~~~ -->
        <div class="clearfix">
            <div class="twoColumn margin-top-45 margin-bottom-45 text-center">
                <div class="container services">
                    <h2 class="title black-clr text-uppercase text-center"><?php echo get_field('skheadline')?></h2>
                    <p><?php echo get_field('sksubheadline')?></p>
                    <div class="clearfix">
                        <div class="list_provider_slider">
                    <!-- <form accept-charset="utf-8" class="skilling_form">
                        <div class="col-md-6 col-sm-6 col-xs-12 text-left">
                            <input type="text" name="" value="" placeholder="State">
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 text-left">
                            <input type="text" name="" value="" placeholder="City">
                        </div>
                    </form> -->

                     <?php
                // check if the repeater field has rows of data
                if( have_rows('centers') ):
                    // loop through the rows of data
                    while ( have_rows('centers') ) : the_row();
                   
                    ?>
                     <div class="list_provider hidden">
                        <div class="text-center">
                            <h3 class="title black-clr text-uppercase">
                            <!-- <i class="fa icon-last-mile"></i> -->
                            <?php echo get_sub_field('center_name');?></h3>
                            <div class="gray-clr">
                                <p><?php echo get_sub_field('location');?></p>
                            </div>
                        </div>
                    </div>      
                     
                    <?php
                    endwhile;
                endif;

                ?>
                </div>
                <div class="text-center"><a class="view_more" href="#">View More</a></div>
                    </div>
                </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ~~~~~~~~~~~~~ enterprice section ~~~~~~~~~~~~~ -->
        <div class="te-enterprice">
            <div class="cover_img parallax-container">
                <span class="overlay"></span>
                <div class="parallax">
                    <img src="<?php echo get_field('employee_background_image')?>">
                </div>
                <div class="container zIndex3">
                    <div class="text-center">
                        <h2 class="title white text-uppercase margin-bottom-20"><?php echo get_field('eheadline')?></h2>
                        <p><?php echo get_field('esubheadline')?></p>
                        
                    </div>
                </div>
                <div class="bottom_logos zIndex3">
                    <div class="text-center">
                         <?php
                // check if the repeater field has rows of data
                if( have_rows('clients') ):

                    // loop through the rows of data
                    while ( have_rows('clients') ) : the_row();

                    ?>
                                <img src="<?php echo get_sub_field('image');?>">
                    <?php
                    endwhile;

                endif;

                ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- ~~~~~~~~~~~~~ learners speak ~~~~~~~~~~~~~ -->
        <div class="te-learners">
            <div class="container">
                <div class="text-center">
                    <h2 class="title text-uppercase black-clr">
                        <?php echo get_field('theadline');?>
                    </h2>
                </div>
                <div class="learner-spearkers">
                    <div class="learner-list owl-carousel">
                        
                         <?php
                // check if the repeater field has rows of data
                if( have_rows('testimonials') ):

                    // loop through the rows of data
                    while ( have_rows('testimonials') ) : the_row();

                    ?>
                                <div class="item">
                            <div class="col-md-9 col-sm-9 col-xs-12 text-center quotes">
                                <p><?php echo get_sub_field('testimonial');?>
                                </p> 
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-12 pull-right">
                                <div class="speaker_avator">
                                    <div class="rotate_img">
                                        <div class="anti_rotate_img" style="background-image: url(<?php echo get_sub_field('image');?>)">
                                        </div>
                                    </div>
                                    <h4><?php echo get_sub_field('name');?></h4>
                                    <h5><?php echo get_sub_field('details');?></h5>
                                </div>
                            </div>
                        </div>
                    <?php
                    endwhile;

                endif;

                ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- ~~~~~~~~~~~~~ Case Studies ~~~~~~~~~~~~~ -->
        <div class="clearfix">
            <div class="caseStudies text-center margin-bottom-45">
                <div class="container">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="row">
                            <h2 class="title black-clr text-uppercase margin-top-45"><?php echo get_field('case_studies_headline')?></h2>
                            <div class="col-wrapper clearfix">
                                

                                  <?php
                                  $c=1;
                // check if the repeater field has rows of data
                if( have_rows('case_studies') ):

                    // loop through the rows of data
                    while ( have_rows('case_studies') ) : the_row();

                if ($c==1){
                    $html = 'case col-1 full-vh quarter-vw cover_full';
                }
                else if ($c==2){
                     $html = 'case col-2 half-vh aThird-vw cover_full';
                }
                else if ($c==3){    
                     $html = 'case col-3 half-vh half-vw cover_full';
                }
                else if ($c==4){
                     $html = 'case col-4 half-vh half-vw cover_full';
                }

                    ?>  <div class="<?php echo $html;?>" style="background-image: url('<?php echo get_sub_field('image');?>')">
                                    <span class="overlay"></span>
                                    <div class="caseContext text-left">
                                        <h3>
                                        <a class="white" href="<?php echo get_sub_field('pdf');?>" target="_blank"><?php echo get_sub_field('title');?></a>
                                        </h3>
                                        <p class="white"><?php echo get_sub_field('description');?></p>
                                    </div>
                                </div>
                    <?php
                    $c++;
                    endwhile;

                endif;

                ?>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       <div class="requestfordemo">
    <div class="container">
        <div class="row row-centered">
         <h2 class="title white text-uppercase margin-bottom-25"><?php echo get_field('footer_form_headline')?></h2>
        <div class="col-md-9 col-centered">

        <div class="guidForm">
        <?php
        echo do_shortcode('[gravityform id=21 title=false description=false ajax=true tabindex=30]');
        ?>
    </div>
        <p><?php echo get_field('footer_form_email')?></p>
        </div>
        </div>
    </div>
</div>
    </section>
<?php			
get_footer(); ?>
<script>
    $('.global-client-slider').owlCarousel({
        margin: 10,
        loop: false,
        // autoWidth:true,
        items: 5,
        nav: true,
        lazyLoad: true,
        navText: ["<span class='icon-back_arrow'>", "<span class='icon-left-arrow'>"],
        responsive: {
            0: {
                items: 2
            },
            567: {
                items: 3
            },
            768: {
                items: 3
            },
            1024: {
                items: 5,
                autoplay: true
            }
        }
    });

    function showMore(){
        $('.hidden:lt(6)').removeClass('hidden');
        if( $('.hidden').length < 1 ){
            $('.view_more').hide();
        }
    };

    $(document).ready(function(){
        $('.hidden:lt(6)').removeClass('hidden');
        $('.view_more').on('click', showMore);
        if( $('.hidden').length < 6 ){
            $('.view_more').hide();
        }
    });
</script>
