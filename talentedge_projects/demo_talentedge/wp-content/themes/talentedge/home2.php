<?php
/**
 * The template for displaying about us page.
 *
 * Template Name: Homepage2
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
    .videoContainer iframe, .videoContainer video{margin-top: -190px !important;}
</style>
<!-- ~~~~~~~~~~ main wrapper ~~~~~~~~~~ -->
    <section class="main-wrapper">
        <div class="banner-wrp" style="background-image: url('<?php echo get_field('banner_background_image')?>');">
            <!-- <img class="responsive-img" src="images/banner-cap.jpg" alt=""> -->

            <!-- background video -->
            <div class="videoContainer">
                <!-- <iframe width="100vw" src="https://www.youtube.com/embed/3sLcH6vwi2c?autoplay=1&controls=0&loop=1&playlist=GRonxog5mbw" frameborder="0" allowfullscreen></iframe>  -->
                <video class="bgvid" autobuffer autoloop autoplay loop='true'>
                    <source src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/video.mp4?te" type="video/mp4">
                    <p><a href="<?php echo esc_url( get_template_directory_uri() ); ?>/images/video.mp4">Download this video file.</a></p>
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
                               <?php echo get_field('headline');?>
                            </h1>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                         <?php if (is_user_logged_in()) { ?>
                        <a class="re_link" href="<?php echo home_url();?>/edit-profile"><?php echo get_field('suggest_button_text');?></a>
                        <?php } else { ?>
                            <a class="re_link" href="#loginpopup"><?php echo get_field('suggest_button_text');?></a>
                        <?php } ?>
                        <a class="re_link white" href="<?php echo home_url();?>/browse-courses"><?php echo get_field('discover_courses_button_text');?></a>
                    </div>
                </div>
            </div>

          
        </div>

        <!-- ~~~~~~~~~~~~~ Global partners ~~~~~~~~~~~~~ -->
        <div class="global-partners-section targetWaypoint">
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
                    <p class="">Choose form 250 courses from 70 Premiere organization worldwide </p>
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
                            <a href="<?php echo $termlink;?>" class="red-overlay" style="background-color: <?php echo $termcolor;?>;"></a>
                            <a class="show" href="<?php echo $termlink;?>">
                                <img src="<?php echo $catimage;?>">
                                <div class="cnt-rotate">
                                    <div class="change-angle">
                                        <i class="fa <?php echo $termicon;?>" aria-hidden="true"></i>
                                        <h3><?php echo $term->name; ?></h3>
                                    </div>
                                </div>
                            </a>
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
                 <!-- ~~~~~~~~~~~~~ why talent edge ~~~~~~~~~~~~~ -->
                <div class="te-openCard clearfix">
                    <div class="row">
                        <?php

                        // check if the repeater field has rows of data
                        if( have_rows('popular_news') ):

                            // loop through the rows of data
                            while ( have_rows('popular_news') ) : the_row();

                             ?>
                               <div class="col-md-4 col-sm-4 col-xs-6">
                                <div class="openCard-wrapper clearfix">
                                    <div class="left col-md-3 col-sm-12 col-xs-12">
                                        <div class="icon_left">
                                            <i class="fa <?php echo get_sub_field('icon');?>"></i>
                                        </div>
                                    </div>
                                    <div class="right col-md-9 col-sm-12 col-xs-12">
                                        <p><?php echo get_sub_field('title');?>
                                        <a href="<?php echo get_sub_field('link');?>"><?php echo get_sub_field('description');?></a></p>
                                        <div class="text-right"><a href="<?php echo get_sub_field('link');?>">Know More</a></div>
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
                                if (!preg_match('/(\d+(\.\d+)*)/', $number, $matches)) {
                                    // Could not find a matching number in the data - handle this appropriately
                                } else {
                                    $final_number = $matches[1];
                                }
                                ?>
                                <span class="tile-animate">
                                    <div><span class="animate-value" data-ani-value="<?php echo $final_number?>">0</span>M</div>
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
                              <a id="playVid" href="<?php echo $p_video;?>?rel=0&amp;controls=0&amp;autoplay=1&amp;loop=1">
                                <img class="carousel-image" src="<?php echo $imageurl;?>">
                                <span class="playIcon" href="#"><i class="fa icon-play"></i></span>
                                <div class="contentSlide">
                                <h3><?php echo $p_name;?></h3>
                                <h4><?php echo $p_designation;?></h4>
                                <h5><?php echo $p_company;?></h5>
                                <h6><?php echo $p_technology;?></h6>
                                </div>
                            </a>
                            <?php } else { ?>
                             <a>
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
                        <div class="taketest-left">
                            <img class="img-responsive" src="<?php echo get_field('askpro_background_image', 29);?>">
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
                        <div class="taketest-right">
                            <img class="img-responsive" src="<?php echo get_field('selfi_background_image', 29);?>">
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
                            <h3><?php echo get_field('app_headline', 29);?></h3>
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
                                            <div><?php echo $i_designation;?></div>
                                            <h3><a href="<?php echo get_permalink($instrcutor_id);?>"><?php echo $i_title;?></a></h3>
                                            <p>
                                                <?php echo $i_description;?>
                                            </p>
                                            <div class="re_link-blue"><a href="<?php echo get_permalink($instrcutor_id);?>">Read More</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        <?php endif; ?>




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
                                            <img class="img-responsive" src="<?php echo $i_profile_image;?>">
                                        </div>
                                        <div class="col-md-7 col-sm-12 col-xs-12">
                                           
                                            <h3><a href="<?php echo get_permalink();?>"><?php echo $i_title;?></a></h3>
                                            <div><?php echo $i_designation;?></div>
                                            <h4><?php echo $i_company?></h4>
                                            <h5><?php echo $i_batch_id?></h5>
                                            <p>
                                                <?php echo $i_testimonial;?>
                                            </p>
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
            <div class="cover_img" style="background: url('<?php echo get_field('enterprise_bg', 29);?>');">
                <div class="container">
                    <div class="text-center">
                        <h2 class="title">
                            <?php echo get_field('enterprise_headline', 29);?>
                        </h2>
                        <p><?php echo get_field('enterprise_subheadline', 29);?></p>
                        <div class="enterprice-btn">
                            <a href="#"><?php echo get_field('enterprise_button_text', 29);?></a>
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
                            $l_designation = get_field('designation', $learner_id);
                            $l_company = get_field('company', $learner_id);
                            $l_batch = get_field('select_batch', $learner_id);
                            $l_label = get_field('batch_name', $l_batch);

                            $l_title = get_the_title($learner_id);

                            $learners_image = wp_get_attachment_url( get_post_thumbnail_id($learner_id));

                                if ($learners_image){
                                    $learners_image_value = $learners_image;
                                }
                                else{
                                     $learners_image_value = get_field('default_faculty_image', 'option');
                                }

                           ?>
                            <div class="item">
                                <div class="col-md-9 col-sm-9 col-xs-12 text-center">
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
                                        <h4><?php echo $l_title;?></h4>
                                        <h5><?php echo $l_designation;?></h5>
                                        <h5><?php echo $l_company;?></h5>
                                        <h5><?php echo $l_label;?></h5>
                                    </div>
                                </div>
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
    </section>

<?php get_footer(); ?>