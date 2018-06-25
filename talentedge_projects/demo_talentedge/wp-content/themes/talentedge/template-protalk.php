<?php
/**
 * The template for displaying contact page.
 *
 * Template Name: Pro Talk page
 *
 */

get_header(); ?>
<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/protalk.css" rel="stylesheet" />
<!-- ~~~~~~~~~~ main wrapper ~~~~~~~~~~ -->
    <section class="main-wrapper">
        <!-- ~~~~~~~~~~~~~ top banner ~~~~~~~~~~~~~ -->
        <div class="sectionBanner">
            <div class="container">
                <div class="pos_placer clearfix">
                    <div class="leftTeaser col-md-6 col-sm-7 col-xs-12">
                        <div class="row">
                            <div><img src="<?php echo get_field('protalk_logo');?>"></div>
                            <h1><?php echo get_field('banner_headline');?></h1>
                            <div class="clearfix">
                                <p><?php echo get_field('banner_subheadline');?></p>
                            </div>
                        </div>
                    </div>
                    <div class="rightTeaser col-md-5 col-sm-6 col-xs-12">
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
                    <p class="task_context"><?php echo get_field('features_description');?></p>
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
                <h2 class="text-center"><?php echo get_field('protalk_video_headline');?></h2>
                    
                     <?php
                       echo have_rows('protalk_videos');
                    // check if the repeater field has rows of data
                    if( have_rows('protalk_videos') ):
                        echo ' <ul class="row clearfix">';
                        // loop through the rows of data
                        while ( have_rows('protalk_videos') ) : the_row();
                        ?>
                        <li class="col-md-4 col-sm-4 col-xs-6 hidden">
                            <div class="wrapVideo"  style="background-image: url('<?php echo get_sub_field('profile_image')?>');">
                                <span class="overLay"></span>
                                <a href="<?php echo get_sub_field('video_link')?>?rel=0&amp;controls=0&amp;autoplay=1&amp;loop=1" class="playVideo" title="Play Video">
                                    <i class="fa icon-video"></i>
                                </a>
                            </div>
                            <div class="videoContext">
                                <h3><?php echo get_sub_field('name')?></h3>
                                <h6>
                                    <span><?php echo get_sub_field('designation')?> , <?php echo get_sub_field('company')?></span>
                                    <span><?php echo get_sub_field('technology')?></span>
                                </h6>
                            </div>
                        </li>
                        <?php
                        endwhile;
                        echo '</ul>';

                    endif;

                    ?>
                <div class="text-center"><a class="view_more" href="#">View More</a></div>
            </div>
        </div>
    </section>
<?php			
get_footer(); ?>
<script>
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
