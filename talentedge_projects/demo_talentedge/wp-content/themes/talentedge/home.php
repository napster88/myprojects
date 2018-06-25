<?php
/**
 * The template for displaying about us page.
 *
  * @package talentedge
 * Template Name: Homepage
 *
 */
 ?>
<?php get_header(); ?>
<?php
 if (isset($_REQUEST['data'])){
    session_start();
    $queryData = read_query_data($_REQUEST['data']);
    $_SESSION['userid'] =  $queryData['id'];
    $_SESSION['invitesource'] =  $queryData['invitesource'];
    //print_r($_SESSION);
 }
?>
<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/home.css" rel="stylesheet" />
<style>
   .te-openCard .openCard-wrapper{min-height: 120px;}
</style>
<!-- ~~~~~~~~~~ main wrapper ~~~~~~~~~~ -->
    <section class="main-wrapper">
        <div class="banner-wrp" style="background-image: url('<?php echo get_field('banner_background_image')?>');">
            <!-- <img class="responsive-img" src="images/banner-cap.jpg" alt=""> -->

            <!-- background video -->
            <div class="videoContainer">
                <!-- <iframe width="100vw" src="https://www.youtube.com/embed/3sLcH6vwi2c?autoplay=1&controls=0&loop=1&playlist=GRonxog5mbw" frameborder="0" allowfullscreen></iframe>  -->
                <video class="bgvid" autobuffer autoloop autoplay loop='true'>
                    <source src="<?php echo get_field('home_video_url')?>" type="video/mp4">
                    <p><a href="<?php echo get_field('home_video_url')?>">Download this video file.</a></p>
                    </object>
                </video>
            </div>

            <div class="banner-caption">
                <div class="container">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="te-vision">
                           <?php echo get_field('tagline');?>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="row">
                            <h1 class="col-md-8 col-sm-10 col-xs-12">
                               <?php echo get_field('description');?>
                            </h1>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12 links_to">
                        <a class="re_link" href="<?php echo home_url();?>/browse-courses"><?php echo get_field('discover_courses_button_text');?></a>
                        <?php if (is_user_logged_in()) { ?>
                        <a class="re_link  home_suggest white" href="<?php echo home_url();?>/edit-profile/#suggestcourse"><?php echo get_field('suggest_button_text');?></a>
                        <?php } else { ?>
                            <a class="re_link home_suggest white" href="#suggest_popup"><?php echo get_field('suggest_button_text');?></a>
                        <?php } ?>

                    </div>
                </div>
            </div>

            <!-- ~~~~~~~~~~~~~ Global partners duplicate ~~~~~~~~~~~~~ -->



            <div class="global-partners-section overVideo global-slider-widget targetWaypoint">

                <div class="container">
                    <!-- <div class="text-center">
                        <p class="global-partner">We partner with Globally reputed organizations  to create learner-centric oppurtunities</p>
                    </div> -->
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="global-client-slider global-slider-widget_demo">
                            <?php
                            $posts = get_field('institutions2', 29);

                            if( $posts ): ?>
                             <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
                            <?php setup_postdata($post); ?>
                            <a href="<?php echo get_permalink( $post->ID ); ?>"><img src="<?php echo get_field('banner_logo',$post->ID);?>" /></a>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ~~~~~~~~~~~~~ Global partners ~~~~~~~~~~~~~ -->
        <div class="global-partners-section" style="display: none;">
            <div class="container">
                <div class="text-center">
                    <p class="global-partner">We partner with Globally reputed organizations  to create learner-centric oppurtunities</p>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12 global-slider-widget ">
                    <div class="owl-carousel global-client-slider global-slider-widget_org owl-theme">
                        <?php
                        $posts = get_field('institutions', 29);

                        if( $posts ): ?>
                         <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
                        <?php setup_postdata($post); ?>
                        <a href="<?php echo get_permalink( $post->ID ); ?>"><img src="<?php echo get_field('logo',$post->ID);?>" /></a>
                        <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- ~~~~~~~~~~~~~ Browse courses ~~~~~~~~~~~~~ -->
        <div class="te-browse-courses">
            <div class="container">
                <div class="text-center">
                    <h2 class="title">Browse Courses</h2>
                    <p class="">Choose from 250 courses from 70 premier organizations worldwide</p>
                </div>
                <!-- diamond shaped grids -->
                <div class="col-md-12 col-sm-12 col-xs-12">

                    <?php

                    $bterms = get_field('select_categories_to_display', 29);
                    //print_r($bterms);
                    if( $bterms ): ?>

                        <ul class="grid-annoying clearfix">

                        <?php foreach( $bterms as $term ): ?>
                            <?php
                                if (get_field('category_image', 'course-categories_'.$term->term_id)){
                                    $catimage = get_field('category_image', 'course-categories_'.$term->term_id);
                                }
                                else{
                                     $catimage = get_field('default_category_image', 'option');
                                }
                                $termlink = get_term_link( $term->term_id );
                                $termicon = get_field('category_icon', 'course-categories_'.$term->term_id);
                                $termcolor = get_field('category_color', 'course-categories_'.$term->term_id);

                            ?>
                        <li>
                            <div id="<?php echo $term->term_id;?>" class="transform-rotate">
                            <a href="<?php echo home_url();?>/browse-courses?id=<?php echo $term->term_id;?>" class="red-overlay" style="background-color: <?php echo $termcolor;?>;"></a>
                            <a class="show" href="<?php echo home_url();?>/browse-courses?id=<?php echo $term->term_id;?>">
                                <img src="<?php echo $catimage;?>">
                                <div class="cnt-rotate">
                                    <div class="change-angle">
                                        <i class="fa <?php echo $termicon;?>" aria-hidden="true"></i>
                                        <h3><?php echo $term->name; ?></h3>
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
                    <a class="re_link" href="<?php echo home_url();?>/browse-courses">Browse All</a>
                </div>
            </div>
        </div>

        <!-- ~~~~~~~~~~~~~ Popular courses ~~~~~~~~~~~~~ -->


         <div class="te-Popular-courses wow slideInUp">
            <div class="container">
                <?php get_template_part( 'popular'); ?>
                <div class="te-openCard clearfix">
                    <div class="row">
                        <?php

                        // check if the repeater field has rows of data
                        if( have_rows('popular_news',29) ):

                            // loop through the rows of data
                            while ( have_rows('popular_news',29) ) : the_row();

                             ?>
                               <div class="col-md-4 col-sm-4 col-xs-6">
                                <div class="openCard-wrapper clearfix">
                                    <div class="left col-md-3 col-sm-12 col-xs-12">
                                        <div class="icon_left">
                                            <a href="<?php echo get_sub_field('link');?>"><i class="fa <?php echo get_sub_field('icon');?>"></i></a>
                                        </div>
                                    </div>
                                    <div class="right col-md-9 col-sm-12 col-xs-12">
                                        <p><a href="<?php echo get_sub_field('link');?>" style="color:#1a1a1a;"><?php echo get_sub_field('title');?></a></p>
                                        <div class="text-right"><a href="<?php echo get_sub_field('link');?>"><?php echo get_sub_field('button_text');?></a></div>
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

         <!-- ~~~~~~~~~~~~~ why talent edge ~~~~~~~~~~~~~ -->
        <div class="te-why-talent wow slideInUp">
            <div class="clearfix">
                <div class="text-center">
                    <h2 class="title">
                        <?php echo get_field('why_headline', 29)?>
                    </h2>
                </div>
                <div class="talent-wrapper clearfix">
                    <div class="col-md-7 col-md-offset-0 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0 left">
                        <?php
                        echo have_rows('features', 29);
                        // check if the repeater field has rows of data
                        if( have_rows('features', 29) ):
                            ?>
                         <ul id="talent">
                        <?php
                             $w =1;
                            // loop through the rows of data
                            while ( have_rows('features', 29) ) : the_row();

                            ?>
                             <li>
                                <a href="#talentTab<?php echo $w;?>">
                                    <div class="left-icon"><i class="fa <?php echo get_sub_field('icon')?>" aria-hidden="true"></i></div>
                                    <div class="right-content">
                                       <h3><?php echo get_sub_field('headline')?></h3>
                                        <p><?php echo get_sub_field('subheadline')?></p>
                                    </div>
                                </a>
                            </li>
                            <?php
                            $w++;
                            endwhile;

                       ?></ul>
                       <?php endif; ?>
                    </div>
                    <div class="col-md-5 col-sm-6 hidden-xs right">
                        <div class="tab-images">
                            <?php
                             if( have_rows('features', 29) ):
                                $ww=1;
                                while ( have_rows('features', 29) ) : the_row();

                                ?>
                                 <div id="talentTab<?php echo $ww;?>" class="tab-section">
                                    <img class="img-responsive" src="<?php echo get_sub_field('image')?>">
                                </div>
                                <?php
                                $ww++;
                                endwhile;
                              endif;
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="te-count-ani">
                <div class="container">
                    <div class="text-center">
                        <?php
                             if( have_rows('stats', 29) ):
                                while ( have_rows('stats', 29) ) : the_row();
                                $ww=1;
                                $number = get_sub_field('number');

                                ?>
                                <span class="tile-animate">
                                <div><span class="animate-value"><?php echo $number;?></span></div>
                                    <span class="text-value"><?php echo get_sub_field('text')?></span>
                                </span>
                                <?php
                                $ww++;
                                endwhile;
                              endif;
                            ?>
                    </div>
                </div>
            </div>
        </div>


        <!-- ~~~~~~~~~~~~~ Get the Edge in Learning with ~~~~~~~~~~~~~ -->
        <div class="te-edge-learning">
            <div class="container">
                <div class="text-center">
                    <h2 class="title">
                        <?php echo get_field('media_headline', 29);?>
                    </h2>
                    <p><?php echo get_field('media_subheadline', 29);?></p>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="carousel showcase">

                       <?php
                        $rows = get_field('protalk_videos' , 288);
                        $labels = array();
                        $field = get_field_object('protalk', 29);
                        $values = get_field('protalk', 29);
                        $pv = 0;
                        foreach ($values as $value) {
                            $first_row = $rows[$pv]; // get the first row
                            $p_image = $first_row['profile_image'];
                            if ($p_image){
                                $imageurl = $p_image;
                            }
                            else{
                                $imageurl = get_field('protalk_default_image','option');
                            }

                            $p_name = $first_row['name' ];
                            $p_designation = $first_row['designation' ];
                            $p_company = $first_row['company' ];
                            $p_technology = $first_row['technology' ];
                            $p_video = $first_row['video_link' ];

                           ?>
                           <?php if ($p_video) {?>
                              <a href="<?php echo $p_video;?>?rel=0&amp;controls=0&amp;autoplay=1&amp;loop=1" href="javascript: void(0);">
                                <span class="showcase-overlay-second"></span>
                                <img class="carousel-image" src="<?php echo $imageurl;?>">
                                <span class="playIcon"><i class="fa icon-play"></i></span>
                                <div class="contentSlide">
                                <h3><?php echo $p_name;?></h3>
                                <h4><?php echo $p_designation;?></h4>
                                <h5><?php echo $p_company;?></h5>
                                <h6><?php echo $p_technology;?></h6>
                                </div>
                            </a>
                            <?php } else { ?>
                             <a>
                                <span class="showcase-overlay-second"></span>
                                <img class="carousel-image" src="<?php echo $imageurl;?>">
                                <div class="contentSlide">
                                    <h3><?php echo $p_name;?></h3>
                                <h4><?php echo $p_designation;?></h4>
                                <h5><?php echo $p_designation;?></h5>
                                <h6><?php echo $p_technology;?></h6>
                                </div>
                            </a>
                            <?php } ?>
                           <?php
                           $pv++;
                        }
                        ?>
                    </div>

                    <!-- show videos for mobile and iPads -->
                    <div class="col-md-12 col-sm-12 col-xs-12 mobileVideos-section">
                        <div class="owl-carousel mobileVideos-slider owl-theme">
                            <?php
                            $rows = get_field('protalk_videos' , 288);
                            $labels = array();
                            $field = get_field_object('protalk', 29);
                            $values = get_field('protalk', 29);
                            $pv = 0;
                            foreach ($values as $value) {
                                $first_row = $rows[$pv]; // get the first row
                                $p_image = $first_row['profile_image'];
                                if ($p_image){
                                    $imageurl = $p_image;
                                }
                                else{
                                    $imageurl = get_field('protalk_default_image','option');
                                }

                                $p_name = $first_row['name' ];
                                $p_designation = $first_row['designation' ];
                                $p_company = $first_row['company' ];
                                $p_technology = $first_row['technology' ];
                                $p_video = $first_row['video_link' ];

                               ?>
                               <?php if ($p_video) {?>
                                   <div class="item">
                                        <a id="playVid" class="callVideo" href="<?php echo $p_video;?>?rel=0&amp;controls=0&amp;autoplay=1&amp;loop=1">
                                            <img class="carousel-image" src="<?php echo $imageurl;?>">
                                            <span class="playIcon" href="#"><i class="fa icon-play"></i></span>
                                            <span class="showcase-overlay-second"></span>
                                            <div class="contentSlide">
                                            <h3><?php echo $p_name;?></h3>
                                            <h4><?php echo $p_designation;?></h4>
                                            <h5><?php echo $p_company;?></h5>
                                            <h6><?php echo $p_technology;?></h6>
                                            </div>
                                        </a>
                                    </div>
                                <?php } else { ?>
                                 <a>
                                    <img class="carousel-image" src="<?php echo $imageurl;?>">
                                    <span class="showcase-overlay-second"></span>
                                    <div class="contentSlide">
                                        <h3><?php echo $p_name;?></h3>
                                    <h4><?php echo $p_designation;?></h4>
                                    <h5><?php echo $p_designation;?></h5>
                                    <h6><?php echo $p_technology;?></h6>
                                    </div>
                                </a>
                                <?php } ?>
                               <?php
                               $pv++;
                            }
                            ?>
                        </div>
                        <div class="btn-video text-center">
                            <a href="<?php echo home_url()?>/pro-talk">Discover Videos</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ~~~~~~~~~~~~~ discover video ~~~~~~~~~~~~~ -->
        <div class="te-discover-videos">
            <div class="container">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="text-center">
                        <div class="btn-discover">
                            <a href="<?php echo home_url()?>/pro-talk">Discover Videos</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="taketest">
                        <div class="taketest-left" style="background-image:url(<?php echo get_field('askpro_background_image', 29);?>)">
                            <!-- <img class="img-responsive" src="<?php //echo get_field('askpro_background_image', 29);?>"> -->
                            <div class="test-contents">
                                <div><i class="fa <?php echo get_field('askpro_icon', 29);?>" aria-hidden="true"></i></div>
                                <div class="askPro-Txt">
                                    <h3><?php echo get_field('askpro_title', 29);?></h3>
                                    <p><?php echo get_field('askpro_description', 29);?></p>
                                    <div class="btn-download">
                                        <a href="<?php echo home_url();?>/ask-pro"><?php echo get_field('askpro_button_text', 29);?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="taketest-right" style="background-image:url(<?php echo get_field('selfi_background_image', 29);?>)">
                            <!-- <img class="img-responsive" src="<?php //echo get_field('selfi_background_image', 29);?>"> -->
                            <div class="test-contents">
                                <div><i class="fa <?php echo get_field('selfi_icon', 29);?>" aria-hidden="true"></i></div>
                                <div class="askPro-Txt">
                                    <h3><?php echo get_field('selfi_title', 29);?></h3>
                                    <p><?php echo get_field('selfiscan_description', 29);?></p>
                                    <div class="btn-download">
                                        <a href="<?php echo home_url();?>/selfie-scan"><?php echo get_field('selfi_button_text', 29);?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix">
                        <div class="appAvailable text-center">
                            <h3 class="text-uppercase"><?php echo get_field('appstore_headline', 'option');?></h3>
                            <div>
                                <a href="<?php echo get_field('android_link','option')?>"><img src="<?php echo get_field('android_link_image','option')?>" alt=""></a>
                                <a href="<?php echo get_field('ios_link','option')?>"><img src="<?php echo get_field('ios_link_image','option')?>" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ~~~~~~~~~~~~~ meet instructors ~~~~~~~~~~~~~ -->
        <div class="te-meet-instructors wow slideInUp">
            <div class="container">
                <div class="text-center">
                    <h2 class="title">
                       <?php echo get_field('instructors_headline', 29);?>
                    </h2>
                    <p><?php echo get_field('instructors_subheadline', 29);?></p>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 instructors-widget">

                        <?php

                        $instrcutors = get_field('instrcutors', 29);
                        if( $instrcutors ): ?>
                            <?php foreach( $instrcutors as $instrcutor ):
                                $instrcutor_id = $instrcutor->ID;
                                $i_designation = get_field('designation', $instrcutor_id);
                                $i_description = get_field('description', $instrcutor_id);
                                $i_title = get_the_title($instrcutor_id);
                                $feat_image = wp_get_attachment_url( get_post_thumbnail_id($instrcutor_id));

                                 if ($feat_image){
                                    $i_profile_image = $feat_image;
                                }
                                else{
                                     $i_profile_image = get_field('default_faculty_image', 'option');
                                }
                             ?>
                               <div class="col-md-6 col-sm-6 col-xs-6 ind-col">
                                <div class="row">
                                    <div class="card-mid">
                                        <div class="col-md-4 col-sm-12 col-xs-12">
                                            <div class="rotate_img">
                                                <div class="anti_rotate_img" style="background-image: url(<?php echo $i_profile_image;?>)"></div>
                                            </div>
                                            <!-- <img class="img-responsive" src="<?php echo $i_profile_image;?>"> -->
                                        </div>
                                        <div class="col-md-7 col-sm-12 col-xs-12">
                                            <div class="designation"><?php echo $i_designation;?></div>
                                            <h3><a href="<?php echo get_permalink($instrcutor_id);?>"><?php echo $i_title;?></a></h3>
                                            <p>
                                                <?php echo truncate($i_description,100);?>
                                            </p>
                                            <div class="re_link-blue"><a href="<?php echo get_permalink($instrcutor_id);?>">Read More</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        <?php endif; ?>


                        <div class="col-md-12 text-center">
                            <a class="btn-normal big text-uppercase" href="<?php echo home_url();?>/faculty">View All</a>
                        </div>

                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12 instructors-widget owl-carousel owl-theme mb-carousel">
                        <?php

                        $instrcutors = get_field('instrcutors', 29);

                        if( $instrcutors ): ?>
                            <?php foreach( $instrcutors as $instrcutor ):
                                $instrcutor_id = $instrcutor->ID;
                                $i_testimonial = get_field('testimonial', $institute_id);
                                $i_description = get_field('description', $instrcutor_id);
                                $i_company = get_field('company', $instrcutor_id);

                                $i_course_id = get_field('select_course', $instrcutor_id);
                                $i_batch_id = get_field('select_batch', $instrcutor_id);

                                $i_title = get_the_title($instrcutor_id);
                                $feat_image = wp_get_attachment_url( get_post_thumbnail_id($instrcutor_id));

                                 if ($feat_image){
                                    $i_profile_image = $feat_image;
                                }
                                else{
                                     $i_profile_image = get_field('default_faculty_image', 'option');
                                }
                             ?>
                               <div class="col-md-6 col-sm-6 col-xs-6 ind-col">
                                <div class="row">
                                    <div class="card-mid">
                                        <div class="col-md-4 col-sm-12 col-xs-12">
                                            <!-- <img class="img-responsive" src="<?php //echo $i_profile_image;?>"> -->
                                            <div class="rotate_img">
                                                <div class="anti_rotate_img" style="background-image: url(<?php echo $i_profile_image;?>)"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-7 col-sm-12 col-xs-12">

                                            <h3><a href="<?php echo get_permalink();?>"><?php echo $i_title;?></a></h3>
                                            <div><?php echo $i_designation;?></div>
                                            <h4><?php echo $i_company?></h4>
                                            <h5><?php echo $i_batch_id?></h5>
                                            <p>
                                                <?php echo $i_testimonial;?>
                                            </p>

                                            <div class="text-center re_link-blue col-md-12">
                                                <a href="<?php echo get_permalink($instrcutor_id);?>">Read More</a>
                                            </div>
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


        <!-- ~~~~~~~~~~~~~ enterprice section ~~~~~~~~~~~~~ -->
        <div class="te-enterprice">
            <div class="cover_img parallax-container">
                <div class="parallax">
                    <img src="<?php echo get_field('enterprise_bg', 29);?>">
                </div>
                <div class="container">
                    <div class="text-center">
                        <h2 class="title">
                            <?php echo get_field('enterprise_headline', 29);?>
                        </h2>
                        <p><?php echo get_field('enterprise_subheadline', 29);?></p>
                        <div class="enterprice-btn">
                            <a href="<?php echo home_url();?>/enterprise"><?php echo get_field('enterprise_button_text', 29);?></a>
                        </div>
                    </div>
                </div>
                <div class="bottom_logos">
                    <div class="text-center">
                         <?php
                             if( have_rows('select_partners', 29) ):
                                while ( have_rows('select_partners', 29) ) : the_row();
                                $ww=1;
                                ?>
                                 <img src="<?php echo get_sub_field('logo');?>">
                                <?php
                                $ww++;
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
                    <h2 class="title">
                       <?php echo get_field('learners_headline', 29);?>
                    </h2>
                </div>
                <div class="learner-spearkers">
                    <div class="learner-list owl-carousel">
                        <?php
                         $learners_values = get_field('select_learners', 29);

                        if( $learners_values ):

                         foreach( $learners_values as $learner ):

                            $learner_id = $learner->ID;
                            $l_testimonial = get_field('testimonial', $learner_id);
                            $video_link = get_field('video_link', $learner_id);
                            $l_designation = get_field('designation', $learner_id);
                            $l_company = get_field('company', $learner_id);
                            $l_batch = get_field('select_batch', $learner_id);
                            $l_label = get_field('batch_name', $l_batch);
                            $dimg = get_field('default_video_image', 'option');;

                            $l_title = get_the_title($learner_id);

                            $cl_startdate2 = get_field('course_start_date', $l_batch, false, false);
                                //$date = new DateTime($cl_startdate);
                            $timevalue2 = strtotime($cl_startdate2);
                            $new_date2 = date('M Y', $timevalue2);

                            $learners_image = wp_get_attachment_url( get_post_thumbnail_id($learner_id));

                                if ($learners_image){
                                    $learners_image_value = $learners_image;
                                }
                                else{
                                     $learners_image_value = get_field('default_faculty_image', 'option');
                                }

                           ?>
                            <div class="item">
                                    <?php if ($video_link) {?>
                                 <div class="col-md-9 col-sm-12 col-xs-12 videoItem quotes">
                                    <div class="videoTestimonial cover_full col-md-6 col-md-offset-4" style="background-image: url(<?php echo $dimg;?>);">
                                        <span class="overlayVideo"></span>
                                        <span class="videoPlay"><a class="playVideo fa icon-play_button" href="<?php echo $video_link;?>?rel=0&controls=0&autoplay=1&loop=1"></a></span>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-12 pull-right">
                                    <div class="speaker_avator">
                                        <div class="rotate_img">
                                            <div class="anti_rotate_img"
                                            style="background-image: url(<?php echo $learners_image_value;?>)">
                                            </div>
                                        </div>
                                        <?php if ($l_title) {?>
                                        <h4><?php echo $l_title;?></h4>
                                        <?php } ?>
                                        <h5>
                                            <?php if ($l_designation) {?>
                                        <?php echo $l_designation;?>
                                        <?php } ?>
                                         <?php if ($l_company) {?>
                                        , <?php echo $l_company;?></h5>
                                        <?php } ?>
                                         <?php if ($l_label) {?>
                                        <h5><?php echo $l_label;?></h5>
                                        <?php } ?>
                                    </div>
                                </div>
                                <?php } else { ?>

                                <div class="col-md-9 col-sm-9 col-xs-12 text-center quotes">
                                    <p>
                                       <?php echo $l_testimonial;?>
                                    </p>

                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-12 pull-right">
                                    <div class="speaker_avator">
                                        <div class="rotate_img">
                                            <div class="anti_rotate_img"
                                            style="background-image: url(<?php echo $learners_image_value;?>)">
                                            </div>
                                        </div>
                                        <?php if ($l_title) {?>
                                        <h4><?php echo $l_title;?></h4>
                                        <?php } ?>
                                        <h5>
                                            <?php if ($l_designation) {?>
                                        <?php echo $l_designation;?>
                                        <?php } ?>
                                         <?php if ($l_company) {?>
                                        , <?php echo $l_company;?></h5>
                                        <?php } ?>
                                         <?php if ($new_date2) {?>
                                        <h5><?php echo $new_date2;?> Batch</h5>
                                        <?php } ?>
                                    </div>
                                </div>
                                <?php } ?>




                            </div>
                           <?php

                           $lv++;
                        endforeach;
                        endif;
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- ~~~~~~~~~~~~~ Awards & Affiliations ~~~~~~~~~~~~~ -->
        <?php if( have_rows('awards',29) ): ?>
            <div class="te-learners bg_award">
                <div class="container">
                    <div class="text-center">
                        <h2 class="title">
                            <?php echo get_field('awards_headline',29);?>
                        </h2>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12 global-award-slider-widget">
                        <div class="owl-carousel global-award-slider owl-theme">

                        <?php  while ( have_rows('awards',29) ) : the_row(); ?>
                         <img src="<?php echo get_sub_field('logo');?>" />
                        <?php endwhile; ?>

                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </section>

<?php get_footer(); ?>
