<?php
/**
 * The template for displaying contact page.
 *
 * Template Name: Askpro Template
 *
 */

get_header(); ?>
<?php  $pageid = get_the_ID();?>
<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/home.css" rel="stylesheet" />
<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/askpro.css" rel="stylesheet" />
<!-- ~~~~~~~~~~ main wrapper ~~~~~~~~~~ -->
    <section class="main-wrapper">
        <!-- ~~~~~~~~~~~~~ top banner ~~~~~~~~~~~~~ -->
        <div class="sectionBanner">
            <div class="container">
                <div class="pos_placer clearfix">
                    <div class="leftTeaser col-md-6 col-sm-7 col-xs-12">
                        <div class="row">
                            <h1><?php echo get_field('banner_headline')?></h1>
                            <div class="clearfix">
                                <p><?php echo get_field('banner_subheadline')?></p>
                            </div>
                        </div>
                    </div>
                    <!--<div class="rightTeaser col-md-6 col-sm-5 col-xs-12">
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
                    -->
                </div>
            </div>
        </div>
        <!-- ~~~~~~~~~~~~~ askproi middle content ~~~~~~~~~~~~~ -->
        <div class="container proTask_context">
            <div class="row clearfix">
                <div class="col-md-10 col-md-offset-1 col-sm-12 col-xs-12 text-center">
                    <p class="task_context"><?php echo get_field('features_description')?></p>
                </div>
            </div>
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
                            <p><?php echo get_sub_field('description')?></p>
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
            <div class="te-Popular-courses wow slideInUp">
                <div class="container">
                    <div class="text-center">
                    <h2 class="title">
                       <?php echo get_field('popular_headline')?>
                    </h2>
                </div>


                <!-- only for mobile -->
                <div class="popularCourseCard clearfix">
                    <?php 

                    $posts = get_field('popular_courses');
                    if( $posts ): ?>

                        <ul class="clearfix row">
                        <?php foreach( $posts as $p ): // variable must NOT be called $post (IMPORTANT) ?>
                            <?php 

                            $course_id = $p->ID;
                            $institute_id = get_field('c_institute', $course_id);
                            $institute_logo = get_field('logo', $institute_id); 
                            $institute_title = get_the_title( $institute_id );


                           
                            ?>
                            <li class="col-md-2 col-sm-6 col-xs-6">
                                <div class="cardSmall">
                                    <div class="clearfix">
                                        <div class="left">
                                            <div class="text-center img_height"><img src="<?php echo $institute_logo;?>" alt=""></div>
                                            <div class="bottom_course">
                                                <h3><a href="<?php echo get_permalink( $course_id ); ?>"><?php echo get_field('course_short_name', $course_id ); ?></a></h3>
                                                <h4><?php echo $institute_title;?></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </div>


                <!-- check this hell -->
                <div class="colcarou clearfix">
                    
                    <?php 

                    $posts = get_field('popular_courses');

                    if( $posts ): ?>

                       
                        <?php foreach( $posts as $p ): // variable must NOT be called $post (IMPORTANT) ?>
                        <div class="cardSmall">
                             <div class="wrapp_All">
                            <?php 
                            $course_id = $p->ID;
                            $institute_id = get_field('c_institute', $course_id);
                            $institute_logo = get_field('logo', $institute_id); 
                            $institute_title = get_field('short_name', $institute_id );
                            $course_excerpt = get_field( 'course_excerpt', $course_id);


                            if (get_field('course_image', $course_id)){
                                $courseimage = get_field('course_image', $course_id);
                            }
                            else{
                                 $courseimage = get_field('default_course_image', 'option');
                            }

                            ?>
                             <div class="left">
                                <div class="course_provider">
                                     <img class="sliderCover" src="<?php echo $courseimage;?>" alt="<?php echo get_the_title( $course_id ); ?>">
                                    <?php if ($institute_logo) {?>
                                    <img class="provider" src="<?php echo $institute_logo;?>" alt="">
                                    <?php } ?>
                                </div>
                                <div class="bottom_course">
                                    <h3><a href="<?php echo get_permalink( $course_id ); ?>"><?php echo get_field('course_short_name', $course_id ); ?></a></h3>
                                    <h4><?php echo $institute_title;?></h4>
                                </div>
                            </div>
                            <div class="hidden-xs right">
                                <h3>
                                    <a href="<?php echo get_permalink( $course_id );?>"><?php echo get_field('course_short_name', $course_id ); ?></a>
                                </h3>
                                <h4><?php echo $institute_title;?></h4>
                                <p><?php echo $course_excerpt; ?></p>
                                <div class="text-right knowMore-btn">
                                    <a href="<?php echo get_permalink( $course_id ); ?>" title="">Know More</a>
                                </div>
                            </div>
                             </div>
                    </div>
                           
                        <?php endforeach; ?>
                      
                    <?php endif; ?>
                </div>
                </div>
            </div>
        </div>
    </section>
<?php           
get_footer(); ?>