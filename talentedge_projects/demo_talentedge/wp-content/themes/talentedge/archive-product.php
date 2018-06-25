<?php
/**
 * The template for displaying contact page.
 *
 * Template Name: Browse Courses page
 *
 */

get_header(); 
?>

<style>
.checkbox:last-child{margin-bottom:15px;}

</style>
<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/course-listing.css" rel="stylesheet" />


 <!-- ~~~~~~~~~~ main wrapper ~~~~~~~~~~ -->
    <section class="main-wrapper">
        <div class="te-listing-courses-section">
            <!-- <div class="clearfix hidded">Search matches</div> -->

            <div class="container">
                <div class="clearfix row user_search_course">
                    <div class="col-md-8 col-sm-8 col-xs-12">
                        <p><?php echo get_field('browse_course_page_headline','option')?></p>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                         <?php if (is_user_logged_in()) { ?>
                        <div class="redir_btn-a text-right"><a href="<?php echo home_url();?>/edit-profile">Suggest a course</a></div>
                         <?php } else { ?>
                          <div class="redir_btn-a text-right"><a href="#loginpopup">Suggest a course</a></div>
                        <?php } ?>
                    </div>
                </div>
                <div class="contain-search row">
                    <div class="col-md-2 sm-hidden xs-hidden filter-widget">
                        <div class="text-right"><a href="#" data-target="#popFilter" data-toggle="modal" class="filterIcon" type="button">Filter</a></div>
                        <div class="filter-list" id="popFilter">
                            <form class="controls" id="Filters">
                                <div class="text-left">
                                    <button id="Reset" class="reset">Reset Filters</button>
                                </div>
                                
                                <fieldset class="filter-group checkboxes">
                                    
                                    <h3>All Category <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></h3>
                                    <div class="overScroll">
                                   <?php
                                    //print_r($categories_arr_list);
                                    foreach ($categories_arr_list as &$btaxonomy) {
                                        ?>
                                        <div class="checkbox">
                                                <input type="checkbox" value=".te_<?php echo $btaxonomy['id'];?>"/>
                                                <label><?php echo $btaxonomy['name'];?></label>
                                            </div>
                                        <?php
                                    }
                                    ?>
                                    </div>
                                </fieldset>
                              
                                <fieldset class="filter-group checkboxes">
                                    <h3>All Institutes</h3>
                                    <div class="overScroll">
                                    <?php
                                    //print_r($inst_arr_list);
                                     foreach ($inst_arr_list as &$binst) {
                                        ?>  
                                        <div class="checkbox"><input type="checkbox" value=".te_<?php echo $binst['id'];?>"/><label><?php echo $binst['short_name'];?></label></div>
                                        <?php
                                     }
                                    ?>
                                    
                                    </div>
                                </fieldset>
                              
                                <fieldset class="filter-group checkboxes">
                                    <h3>Type of Course</h3>
                                    <div class="overScroll">
                                    <div class="checkbox">
                                        <input type="checkbox" value=".ct_1"/>
                                        <label>Executive</label>
                                    </div>
                                    <div class="checkbox">
                                        <input type="checkbox" value=".ct_2"/>
                                        <label>Certificate</label>
                                    </div>
                                    </div>
                                </fieldset>
                                <fieldset class="filter-group checkboxes">
                                    <h3>Status</h3>
                                    <div class="overScroll">
                                    <div class="checkbox">
                                        <input type="checkbox" value=".te_Yes"/>
                                        <label>Addmission Open</label>
                                    </div>
                                    </div>
                                </fieldset>
                                <div class="callActionFilter">
                                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">Apply Filter</button>
                                   <button id="Reset" class="reset">Reset Filter</button>
                                 </div>
                                
                            </form>
                        </div>
                        <!--<div class="redir_btn-a"><a href="#">Suggest a course</a></div>-->
                    </div>
                    <div class="col-md-10 col-sm-12 col-xs-12 course-list-widget">
                        <div id="Container">
                            <div class="fail-message"><span>No Course were found matchinng the selected filters</span></div>
                            <ul class="te_course_list clearfix">
                            <?php 
                            $sterm = $_GET['s'];
                            
                            //print_r($courses_arr2);
                              foreach ($courses_arr2 as &$bcourse) {
                                $search='';
                                $title = get_the_title($bcourse['id']);
                                $tt_title = strtolower($title);
                                $course_cat = $bcourse['cat'];
                                $select_course = $bcourse['select_course'];
                                $course_type = $bcourse['type'];
                                $course_inst = $bcourse['inst']['id'];
                                $course_ad = $bcourse['admission'];
                                $course_img = $bcourse['image'];
                                $course_link = $bcourse['link'];
                                $course_shortname = $bcourse['shortname'];
                                 $course_duration = $bcourse['duration'];

                                 $course_start_date = get_field('course_start_date', false, false, $bcourse['id']);
                                if ( $course_cat) {
                                    $ai_categories='';
                                    foreach( $course_cat as $post_category ) {
                                       $ai_categories .=  'te_'.$post_category.' ';
                                    }
                                     //echo $ai_categories;
                                }

                            if ($select_course==0 || $select_course=''){  

                                if (strpos($tt_title,$sterm)) {
                                    $search = 'search';
                                }
                        ?>
                        <li class="mix <?php echo $ai_categories;?> ct_<?php echo $course_type;?> te_<?php echo $course_inst;?> te_<?php echo $course_ad;?> <?php echo $search;?>  col-courses-card">
                                    <div class="courseCover" style="background-image: url(<?php echo $course_img?>);"></div>
                                    <div class="wrapCard">
                                        <div class="courseCard-detail">
                                            <div class="card">
                                                <h2><a href="<?php echo $course_link;?>"><?php echo $course_shortname;?></a></h2>
                                            </div>
                                            <ul>
                                            <?php

                                            // check if the repeater field has rows of data
                                            if( have_rows('key_points', $bcourse['id']) ):

                                                // loop through the rows of data
                                                while ( have_rows('key_points', $bcourse['id']) ) : the_row();

                                                   ?>
                                                   <li><?php echo get_sub_field('key_point');?></li>
                                                   <?php
                                                endwhile;

                                            endif;

                                            ?>
                                            </ul>
                                        </div>
                                        <div class="viewDetailcard">
                                            <div class="course_period"><i class="fa icon-calendar"></i><span>
                                            <?php  
                                            // make date object
                                            $date = new DateTime($course_start_date);
                                            echo $date->format('M j');?></span></div>
                                            <div  class="course_period"><i class="fa icon-clock"></i><span><?php echo $course_duration;?></span></div>
                                            <div class="btn-te"><a class="redir_btn-a" href="<?php echo $course_link;?>" title="<?php echo $course_shortname;?>">View Detail</a></div>
                                        </div>
                                    </div>
                                </li>
                        <?php }  } ?>
                            </ul>
                            <div class="gap"></div>
                            <div class="gap"></div>
                            <div class="gap"></div>
                            <!-- <div class="text-center"><a class="lazyLoad" href="#">More</a></div> -->
                        </div>
                        <div class="pager-list">
                            <!-- Pagination buttons will be generated here -->
                        </div>
                    </div>
                </div>

                <!-- ~~~~~~~~~~~~~ Popular courses ~~~~~~~~~~~~~ -->
        <div class="te-Popular-courses wow slideInUp">
            <div class="clearfix">
                 <?php get_template_part( 'popular'); ?>
            </div>
        </div>
    </section>
<?php           
get_footer(); ?>
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/jquery.mixitup.js"></script>
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/jquery.mixitup-pagination.js"></script>
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/filter.js"></script>