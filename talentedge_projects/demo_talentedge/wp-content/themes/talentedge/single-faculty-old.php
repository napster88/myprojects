<?php
/**
 * The template for displaying all single posts.
 */

get_header(); ?>
<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/facultyDetail.css" rel="stylesheet" />
<style>
.h2f{
        padding: 40px 0px 0px 15px;
    font-size: 24px;
    font-weight: 600;
}

</style>
<!-- ~~~~~~~~~~ main wrapper ~~~~~~~~~~ -->
    <section class="main-wrapper">
        <div class="container">
             <?php
                        $i_profile_image = get_featured_image($post->ID, 'faculty');
                            
                        ?>
            <div class="row">
            <?php $inst_id = get_field('select_institute'); ?>
            <!-- <h2 class="h2f">Faculty: <span><?php //echo get_the_title($inst_id);?></span></h2> -->
            </div>
            <div class="row facultyDetail">
                <div class="col-md-3 col-sm-4 col-xs-4 facultyPerson">
                    <!-- <img src="<?php //echo $i_profile_image;?>" /> -->
                    <div class="cover" style="background-image: url(<?php echo $i_profile_image;?>);"></div>
                </div>
                <div class="col-md-9 col-sm-8 col-xs-8 facultyContext">
                    <div class="facultyDesig">
                        <h3><?php echo get_the_title();?></h3>
                        <h4><?php echo get_field('designation');?></h4>
                        <h5><?php echo get_the_title($inst_id);?></h5>
                    </div>
                    <p>
                    <?php echo get_field('description');?>
                    </p>
                </div>
            </div>
            <?php if (get_field('video_link')) { 
                $videolink = get_field('video_link');
                ?>
            <div class="clearfix facultyVideo text-center">
                <h6>Learn from skilled instructors with professional experience in the field.</h6>
                <div class="wrapVideo" style="background-image: url('<?php echo get_field('default_video_image','option')?>');">
                    <span class="overLay"></span>
                    <a href="<?php echo $videolink;?>?rel=0&amp;controls=0&amp;autoplay=1&amp;loop=1" class="playVideo" title="Play Video">
                        <i class="fa icon-play"></i>
                    </a>
                </div>
            </div>
            <?php } ?>
        </div>
    </section>
<?php get_footer(); ?>