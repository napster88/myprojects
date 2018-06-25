<?php
/**
 * The template for displaying contact page.
 *
 * Template Name: Askpro page
 *
 */

get_header(); 
?>
<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/askpro.css" rel="stylesheet" />
<!-- ~~~~~~~~~~ main wrapper ~~~~~~~~~~ -->
    <section class="main-wrapper">
        <!-- ~~~~~~~~~~~~~ top banner ~~~~~~~~~~~~~ -->
        <div class="sectionBanner">
            <div class="container">
                <div class="pos_placer clearfix">
                    <div class="leftTeaser col-md-6 col-sm-7 col-xs-12">
                        <div class="row">
                            <div><img src="<?php echo get_field('askpro_logo')?>"></div>
                            <h1><?php echo get_field('banner_headline')?></h1>
                            <div class="clearfix">
                                <p><?php echo get_field('banner_subheadline')?></p>
                            </div>
                        </div>
                    </div>
                    <div class="rightTeaser col-md-6 col-sm-5 col-xs-12">
                        <div class="row">
                            <div class="appAvailable text-center text-uppercase">
                                <h3><?php echo get_field('appstore_headline','option')?></h3>
                                <div>
                                    <a href="<?php echo get_field('android_link','option')?>"><img src="<?php echo get_field('android_link_image','option')?>" alt=""></a>
                                    <a href="<?php echo get_field('ios_link','option')?>"><img src="<?php echo get_field('ios_link_image','option')?>" alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ~~~~~~~~~~~~~ askproi middle content ~~~~~~~~~~~~~ -->

        <div class="singleColumn margin-top-45 margin-bottom-45 text-center">
            <div class="container">
                <div class="col-md-10 col-md-offset-1 col-sm-12 col-xs-12">
                    <p class="task_context"><?php echo get_field('features_description')?></p>
                </div>
            </div>
        </div>
        <div class="container proTask_context">
            <div class="listPro">
                    <?php

                    // check if the repeater field has rows of data
                    if( have_rows('features') ):
                        echo ' <ul class="row clearfix">';
                        // loop through the rows of data
                        while ( have_rows('features') ) : the_row();
                        ?>
                        <li class="col-md-4 col-sm-4 col-xs-6">
                            <h2><?php echo get_sub_field('title')?></h2>
                            <div><i class="fa <?php echo get_sub_field('icon')?>"></i></div>
                            <p><?php echo get_sub_field('description')?></p>
                        </li>
                        <?php
                        endwhile;
                        echo '</ul>';

                    endif;

                    ?>
            </div>
            <div class="protalkVideos">
                <h2 class="text-center"><?php echo get_field('advice_headline1')?></h2>
                   
                    <?php
                     echo have_rows('advices');
                    // check if the repeater field has rows of data
                    if( have_rows('advices') ):
                        echo ' <ul class="row clearfix">';
                        // loop through the rows of data
                        while ( have_rows('advices') ) : the_row();
                        ?>
                         <li class="col-md-4 col-sm-4 col-xs-6">
                        <div class="wrapVideo"  style="background-image: url('<?php echo get_sub_field('profile_image')?>');">
                        </div>
                        <div class="videoContext">
                            <h3><?php echo get_sub_field('name')?></h3>
                            <h6>
                                <span><?php echo get_sub_field('designation')?></span>
                            </h6>
                            <p class="content_border"><?php echo get_sub_field('description')?></p>
                        </div>
                    </li>
                        <?php
                        endwhile;
                        echo '</ul>';

                    endif;

                    ?>
            </div>
            <div class="getAdvice">
                <h2 class="text-center"><?php echo get_field('advice_headline')?></h2>
                <div class="advicer_Context">
                    <?php echo get_field('advice_details')?>
                    <!-- <div class="text-left"><a class="view_more" href="#">View More</a></div> -->
                </div>
            </div>
        </div>
    </section>
<?php			
get_footer(); ?>

<script>
    function heightLevel() {
        var maxHeight = 0;
        $('.content_border').each(function() { 
            maxHeight = Math.max(maxHeight, $(this).height()); 
        }).height(maxHeight);
    }
    heightLevel();
    $(window).resize(function(event) {
        heightLevel();
        console.log('res');
    });
</script>
