<?php
/**
 * The template for displaying contact page.
 *
 * Template Name: Faculty page
 *
 */

get_header(); ?>
<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/faculty-listing.css" rel="stylesheet" />
<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/gray.css" rel="stylesheet" />
<!-- ~~~~~~~~~~ main wrapper ~~~~~~~~~~ -->
    <section class="main-wrapper">
        <div class="te-listing-courses-section">

            <div class="container">
                <div class="facultyListBanner text-center col-md-10 col-md-offset-2">
                    <h2><?php the_title();?></h2>
                    <?php the_content();?>
                </div>
                <div class="contain-search row">
                    <div class="col-md-2 sm-hidden xs-hidden filter-widget">
                        <div class="text-right"><a href="#" data-target="#popFilter" data-toggle="modal" class="filterIcon" type="button">Filter</a></div>
                        <div class="filter-list" id="popFilter">
                            <form class="controls" id="Filters">
                                <div class="text-right">
                                    <button id="Reset" class="reset">Clear Filters</button>
                                </div>
                              
                                <fieldset class="filter-group checkboxes">
                                    <h3>All Institutes <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></h3>
                                    <?php
                 $loop = new WP_Query( array( 'post_type' => 'faculty','posts_per_page' => -1 ) );
                                    if ( $loop->have_posts() ) :
                                        while ( $loop->have_posts() ) : $loop->the_post(); 
                                        $Institute = get_field('select_institute');
                                        $in_id =  $Institute->ID;
                                        $ipost = get_post( $in_id );
                                        $slug = $ipost->post_name;
                                    ?>
                                        <div class="checkbox">
                                            <input type="checkbox" value=".te_<?php echo $slug;?>"/>
                                            <label><?php get_the_title($in_id);?></label>
                                        </div>
                                        <?php endwhile;
                                    endif;
                                    wp_reset_postdata();
                                ?>
                                </fieldset>
                            </form>
                        </div>
                    </div>






                    <div class="col-md-10 col-sm-12 col-xs-12 faculty-list-widget">
                        <div id="Container">
                            <div class="fail-message"><span>No Course were found matchinng the selected filters</span></div>
                            <ul class="te_faculty_list clearfix">
                                <?php
                $loop = new WP_Query( array( 'post_type' => 'faculty','posts_per_page' => -1 ) );
                                    if ( $loop->have_posts() ) :
                                        while ( $loop->have_posts() ) : $loop->the_post(); 
                                        $l_inst = get_field('select_institute');
                                        $l_designation = get_field('designation');
                                        $l_description = get_field('description');
                                        $i_id =  $l_inst->ID;
                                        $i_post = get_post( $i_id );
                                        $i_slug = $i_post->post_name;
                                        if (get_field('profile_image')){
                                            $i_profile_image = get_field('profile_image');
                                        }
                                        else{
                                             $i_profile_image = get_field('default_faculty_image', 'option');
                                        }
                                    ?>
                                    
                                    <li class="mix te_<?php echo $i_slug;?>">
                                        <!-- <div class="courseCover" style="background-image: url(<?php //echo $i_profile_image;?>);"></div> -->

                                        <div class="col-half courseCover" data-label="Gray">
                                            <div style="
                                            background-image   : url(<?php echo $i_profile_image;?>);
                                            display         : inline-block;
                                            width: 170px;
                                            height: 170px;
                                            background-size: 180px auto;
                                            " class="grayscale"></div>
                                            
                                        </div>
                                        <div class="wrapCard">
                                            <div class="facultyCard-detail">
                                                <h4><?php echo $l_designation;?></h4>
                                                <h3><?php echo $l_designation;?><?php echo get_the_title();?></h3>
                                                <p><?php echo $l_description;?></p>
                                            </div>
                                            <div class="re_link-blue"><a href="#!">Read More</a></div>
                                        </div>
                                    </li>
                                        <?php endwhile;
                                    endif;
                                    wp_reset_postdata();
                                ?>
                            </ul>
                            <div class="gap"></div>
                            <div class="gap"></div>
                            <div class="gap"></div>
                        </div> 
                        <!--<div class="text-center"><a href="#" class="redir_btn">View all</a></div>  -->
                    </div>



                </div>

               <!-- ~~~~~~~~~~~~~ Popular courses ~~~~~~~~~~~~~ -->
        <div class="te-Popular-courses wow slideInUp">
            <div class="container">
                <div class="text-center">
                    <h2 class="title">
                       <?php echo get_field('popular_headline', 29)?>
                    </h2>
                </div>

                <!-- only for mobile -->
                <div class="popularCourseCard clearfix">
                    <?php 

                    $posts = get_field('popular', 29);
                    if( $posts ): ?>

                        <ul class="clearfix row">
                        <?php foreach( $posts as $p ): // variable must NOT be called $post (IMPORTANT) ?>
                            <?php 

                            $course_id = $p->ID;
                            $institute_id = get_field('select_institute', $course_id);
                            $institute_id = get_field('logo', $institute_id); 
                            $institute_title = get_the_title( $institute_id );


                            if (get_field('course_image', $course_id)){
                                $courseimage = get_field('course_image', $course_id);
                            }
                            else{
                                 $courseimage = get_field('default_course_image', 'option');
                            }

                            ?>
                            <li class="col-md-2 col-sm-6 col-xs-6">
                                <div class="cardSmall">
                                    <div class="clearfix">
                                        <div class="left">
                                            <div class="text-center"><img src="<?php echo $courseimage;?>" alt=""></div>
                                            <div class="bottom_course">
                                                <h3><a href="<?php echo get_permalink( $course_id ); ?>"><?php echo get_the_title( $course_id ); ?></a></h3>
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

                    $posts = get_field('popular',29);

                    if( $posts ): ?>

                       
                        <?php foreach( $posts as $p ): // variable must NOT be called $post (IMPORTANT) ?>
                        <div class="cardSmall">
                             <div class="wrapp_All">
                            <?php 
                            $course_id = $p->ID;
                            $institute_id = get_field('c_institute', $course_id);
                            $institute_logo = get_field('logo', $institute_id); 
                            $institute_title = get_the_title( $institute_id );
                            $course_excerpt = get_field( 'course_excerpt', $institute_id );


                            if (get_field('course_image', $course_id)){
                                $courseimage = get_field('course_image', $course_id);
                            }
                            else{
                                 $courseimage = get_field('default_course_image', 'option');
                            }

                            ?>
                             <div class="left">
                                <div class="course_provider">
                                     <img src="<?php echo $courseimage;?>" alt="">
                                    <?php if ($institute_logo) {?>
                                    <img class="provider" src="<?php echo $institute_logo;?>" alt="">
                                    <?php } ?>
                                </div>
                                <div class="bottom_course">
                                    <h3><a href="<?php echo get_permalink( $course_id ); ?>"><?php echo get_the_title( $course_id ); ?></a></h3>
                                    <h4><?php echo $institute_title;?></h4>
                                </div>
                            </div>
                            <div class="hidden-xs right">
                                 <h4><?php echo $institute_title;?></h4>
                                <p><?php echo $course_excerpt; ?></p>
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
    </section>
<?php           
get_footer(); ?>
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/jquery.mixitup.js"></script>
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/gray.js"></script>
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/filter.js"></script>