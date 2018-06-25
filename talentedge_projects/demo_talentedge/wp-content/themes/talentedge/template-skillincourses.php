<?php
/**
 * The template for displaying contact page.
 *
 * Template Name: Skilling Courses page
 *
 */

get_header(); 

?>
<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/skilling-list.css" rel="stylesheet" />
<style>
    .subscibe-section{
        display: none;
    }
</style>
 <!-- ~~~~~~~~~~ main wrapper ~~~~~~~~~~ -->
    <section class="main-wrapper">
        <div class="te-listing-courses-section">
            <!-- <div class="clearfix hidded">Search matches</div> -->

            <div class="container">
                <div class="clearfix row user_search_course">
                    <!-- <div class="col-md-8 col-sm-8 col-xs-12">
                        <p><?php //echo get_field('description');?></p>
                    </div> -->
                    <!--<div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="redir_btn-a text-right"><a href="#">Suggest a course</a></div>
                    </div>
                    -->
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
                                    <h3>Sectors<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></h3>
                                    <div class="overFlow_filter">
                                      <?php
                                   $terms = get_terms( 'skilling_sectors', 'orderby=count&hide_empty=0' );
                                    if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
                                        foreach ( $terms as $term ) {
                                        ?>
                               
                                        <div class="checkbox">
                                            <input type="checkbox" class="<?php echo $term->term_id;?>" value=".te_<?php echo $term->term_id;?>"/>
                                           <label><?php echo $term->name;?></label>
                                        </div>
                                        <?php
                                    }
                                    }
                                    ?>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-10 col-sm-12 col-xs-12 course-list-widget">
                        <div id="Container">
                            <div class="fail-message"><span>No course were found matchinng the selected filters</span></div>
                            
                            <?php
                                $loop = new WP_Query( array( 'post_type' => 'skilling_courses' ,'posts_per_page'=>-1 ) );
                                if ( $loop->have_posts() ) : ?>
                                 <ul class="te_course_list clearfix">
                                <?php
                                    while ( $loop->have_posts() ) : $loop->the_post(); 
                                    $postid =  $post->ID;  
                                    $catid = get_field('select_sector');
                                    $current_category = single_cat_title($catid, false);
                                ?> 
                           
                        
                                <li class="mix te_<?php echo $catid;?> col-courses-card">
                                    <div class="courseCover" style="background-image: url(<?php echo get_field('course_image')?>);"></div>
                                    <div class="wrapCard">
                                        <div class="courseCard-detail">
                                            <div class="card">
                                                <h2><a href="<?php echo get_permalink($postid);?>"><?php echo get_the_title();?></a></h2>
                                                <h3><?php echo $current_category?></h3>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <?php endwhile;?>
                                </ul>
                        <?php endif;
                        wp_reset_postdata();
                    ?>
                            <div class="gap"></div>
                            <div class="gap"></div>
                            <div class="gap"></div>
                            <div class="text-center"><a class="popular_course" href="#">View Our Popular Courses</a></div>
                        </div>
                    </div>
                </div>

                 <!-- ~~~~~~~~~~~~~ Popular courses ~~~~~~~~~~~~~ -->

       
         <!-- <div class="te-Popular-courses wow slideInUp">
            <div class="container">
                <?php //get_template_part( 'popular'); ?>
            </div>
        </div> -->
    </section>
    <?php include( locate_template( 'template-request.php',false, false ) ); ?>
<?php           
get_footer(); ?>

<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/jquery.mixitup.js"></script>
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/jquery.mixitup-pagination.js"></script>
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/filter.js"></script>