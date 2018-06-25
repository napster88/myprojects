<?php
/**
 * The template for displaying about us page.
 *
 * Template Name: About us page
 *
 */

get_header(); ?>
<style type="text/css" media="screen">
    .subscibe-section{
        display: none;
    }
</style>
<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/bootstrap-widget.css" rel="stylesheet" />
<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/aboutus.css" rel="stylesheet" />
	<!-- ~~~~~~~~~~ main wrapper ~~~~~~~~~~ -->
    <section class="main-wrapper">
        <!-- ~~~~~~~~~~~~~ Banner section ~~~~~~~~~~~~~ -->
        <div class="sectionBanner">
            <div id="view_hero" style="background-color: <?php echo get_field('background_color');?>;    background-image: url(<?php echo get_field('background_image');?>);" class="te-banner-top coverImg cover_full white">
                <div class="container zIndex2">
                    <div class="left-te col-md-8 col-sm-12 col-xs-12">
                        <div class="clearfix">
                            <div class="banner-components">
                                <h1><?php echo get_field('headline');?></h1>
                                <h3 class="text-normal"><?php echo get_field('subheadline');?></h3>
                            </div>
                        </div>
                    </div>
                </div>
                <span class="overlay"></span>
            </div>
        </div>

        <!-- ~~~~~~~~~~~~~ Two column text paragraph section ~~~~~~~~~~~~~ -->
        <div class="clearfix">
            <div class="margin-top-25 margin-bottom-25 border-bottom aboutContent">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-md-6 col-xs-12 min-aboutContent">
                           <?php echo get_field('left_content');?>
                        </div>
                        <div class="col-md-6 col-md-6 col-xs-12 min-aboutContent">
                           <?php echo get_field('right_content');?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ~~~~~~~~~~~~~ Two column out vision section ~~~~~~~~~~~~~ -->
        <div class="clearfix">
            <div class="dividerColumn">
                <div class="container">
                    <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                        <h2 class="border-center oswalt text-uppercase"> <?php echo get_field('vision_headline');?></h2>
                        <div class="text-center margin-bottom-25">
                            <i class="fa <?php echo get_field('icon');?>"></i>
                        </div>
                        <h3 class="text-uppercase"> <?php echo get_field('vision_subheadline');?></h3>
                    </div>
                    <div class="margin-top-25 clearfix col-md-12 col-sm-12 col-xs-12">
                        
                        <?php
                        $a=1;
                        // check if the repeater field has rows of data
                        if( have_rows('content_blocks') ):

                            // loop through the rows of data
                            while ( have_rows('content_blocks') ) : the_row();

                            ?>
                            <?php if($a %2 == 0){ ?>  
                             <div class="row_divider row wrapper-flex">
                           
                            <div class="col left-padding text-left">
                                <h3 class=""><?php echo get_sub_field('title');?></h3>
                                <p><?php echo get_sub_field('description');?></p>
                            </div>
                             <div class="col right">
                                <div class="cover_full" style="background-image: url('<?php echo get_sub_field('image');?>')"></div>
                            </div>
                        </div>
                        <?php } else {?>

                        <div class="row_divider row wrapper-flex">
                            <div class="col right">
                                <div class="cover_full" style="background-image: url('<?php echo get_sub_field('image');?>')"></div>
                            </div>
                            <div class="col right-padding text-left">
                                <h3 class=""><?php echo get_sub_field('title');?></h3>
                              <p><?php echo get_sub_field('description');?></p>
                            </div>
                        </div>
                        <?php }?>

                                <?php
                                $a++;
                            endwhile;
                        endif;

                        ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- ~~~~~~~~~~~~~ offerSection section ~~~~~~~~~~~~~ -->
        <div class="offerSection margin-top-25 margin-bottom-25">
            <div class="container">
                <div class="row">
                    <h2 class="margin-top-45 oswalt text-uppercase text-center"><?php echo get_field('off_headline');?></h2>
                    <h5 class="margin-top-10 col-md-8 col-md-offset-2 text-center margin-bottom-25"><?php echo get_field('off_subheadline');?></h5>
                    <div class="offerTab margin-top-25 col-md-12 col-sm-12 col-xs-12">
                        <div id="rootwizard">
                            <?php
                                $t=1;

                                // check if the repeater field has rows of data
                                if( have_rows('offerings') ):
                                    echo ' <ul class="nav nav-tabs nav-justified responsive-tabs" role="tablist">';

                                    // loop through the rows of data
                                    while ( have_rows('offerings') ) : the_row();
                                    if ( $t==1) {$active='active';}else{$active='';}
                                       ?>
                                       <li role="presentation" class="<?php echo $active;?>"><a href="#tab<?php echo $t;?>" aria-controls="tab<?php echo $t;?>" role="tab" data-toggle="tab"><span><?php echo get_sub_field('title');?></span> </a></li>
                                       <?php
                                        $t++;
                                    endwhile;
                                   
                                    echo '</ul>';
                                endif;

                                ?>

                            <?php
                                $k=1;
                                // check if the repeater field has rows of data
                                if( have_rows('offerings') ):
                                    echo ' <div class="tab-content">';

                                    // loop through the rows of data
                                    while ( have_rows('offerings') ) : the_row();
     if ( $k==1) {$active2='active';}else{$active2='';}
                                       ?>
                                <div role="tabpanel" class="tab-pane <?php echo $active2;?>" id="tab<?php echo $k;?>">
                                    <div class="row clearfix">
                                        <div class="col-md-6 col-sm-8 col-xs-12">
                                            <?php echo get_sub_field('content')?>
                                        </div>
                                        <?php if (get_sub_field('image')){ ?>
                                        <div class="col-md-5 col-md-offset-1 col-sm-4 xs-hidden">
                                            <img src="<?php echo get_sub_field('image')?>" class="img-responsive">
                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                       <?php
                                       $k++;
                                    endwhile;
                                    echo '</div>';
                                endif;

                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ~~~~~~~~~~~~~ leadership section ~~~~~~~~~~~~~ -->
        <!-- <div class="leadershipGrid">
            <div class="container">
                <h3 class="text-blue border-line">Leadership Team</h3>
                <ul class="clearfix row">
                    <li class="col-md-4 col-sm-6 col-xs-6">
                        <div class="wrapImg" style="background-image: url('<?php echo esc_url( get_template_directory_uri() ); ?>/images/aboutus/blog-1.png');">
                        </div>
                        <div class="videoContext">
                            <div class="text-bold name text-uppercase">M Parker</div>
                            <div class="text-bold designation text-uppercase text-blue">Director & Chief Mentor</div>
                        </div>
                    </li>
                    <li class="col-md-4 col-sm-6 col-xs-6">
                        <div class="wrapImg" style="background-image: url('<?php echo esc_url( get_template_directory_uri() ); ?>/images/aboutus/blog-2.png');">
                        </div>
                        <div class="videoContext">
                            <div class="text-bold name text-uppercase">M Parker</div>
                            <div class="text-bold designation text-uppercase text-blue">Director & Chief Mentor</div>
                        </div>
                    </li>
                    <li class="col-md-4 col-sm-6 col-xs-6">
                        <div class="wrapImg" style="background-image: url('<?php echo esc_url( get_template_directory_uri() ); ?>/images/aboutus/blog-1.png');">
                        </div>
                        <div class="videoContext">
                            <div class="text-bold name text-uppercase">M Parker</div>
                            <div class="text-bold designation text-uppercase text-blue">Director & Chief Mentor</div>
                        </div>
                    </li>
                    <li class="col-md-4 col-sm-6 col-xs-6">
                        <div class="wrapImg" style="background-image: url('<?php echo esc_url( get_template_directory_uri() ); ?>/images/aboutus/blog-2.png');">
                        </div>
                        <div class="videoContext">
                            <div class="text-bold name text-uppercase">M Parker</div>
                            <div class="text-bold designation text-uppercase text-blue">Director & Chief Mentor</div>
                        </div>
                    </li>
                </ul>
            </div>
        </div> -->
    </section>
      <!-- ~~~~~~~~~~~~~ Awards & Affiliations ~~~~~~~~~~~~~ -->
        <?php if( have_rows('partners') ): ?>
            <div class="te-learners bg_award">
                <div class="container">
                    <div class="text-center">
                        <h2 class="title">
                            <?php echo get_field('partners_headline');?>
                        </h2>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12 global-award-slider-widget">
                        <div class="owl-carousel global-award-slider owl-theme">

                        <?php  while ( have_rows('partners') ) : the_row(); ?>
                         <img src="<?php echo get_sub_field('logo');?>" />
                        <?php endwhile; ?>
                       
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </section>

    <div class="requestfordemo">
    <div class="container">
        <div class="row row-centered">
         <h2 class="title white text-uppercase margin-bottom-25"><?php echo get_field('request_headline','option')?></h2>
        <div class="col-md-9 col-centered">

        <div class="guidForm">
        <?php
        echo do_shortcode('[gravityform id=19 title=false description=false ajax=true tabindex=30]');
        ?>
    </div>
        </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/jquery.bootstrap.wizard.js"></script>