<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 */
?>
<?php get_header(); ?>
<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/faculty-listing.css" rel="stylesheet" />
<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/gray.css" rel="stylesheet" />
<!-- ~~~~~~~~~~ main wrapper ~~~~~~~~~~ -->
    <section class="main-wrapper">
        <div class="te-listing-courses-section">

            <div class="container">
                <div class="facultyListBanner text-center col-md-10 col-md-offset-2">
                    <h2><?php get_field('faculty_headline','option')?></h2>
                    <?php get_field('faculty_subheadline','option');?>
                </div>
                <div class="contain-search row">
                    <div class="col-md-2 sm-hidden xs-hidden filter-widget">
                        <div class="text-right"><a href="#" data-target="#popFilter" data-toggle="modal" class="filterIcon" type="button">Filter</a></div>
                        <div class="filter-list" id="popFilter">
                            <form class="controls" id="Filters">
                                <div class="text-right">
                                    <button id="Reset" class="reset">Reset Filters</button>
                                </div>

                                <fieldset class="filter-group checkboxes">
                                    <h3>All Institutes <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></h3>
                                    <div class="overScroll">
                                       <?php
                                    //print_r($inst_arr_list);
                                     foreach ($inst_arr_list as &$binst) {
                                        ?>
                                        <div class="checkbox"><input class="te_<?php echo $binst['id'];?>" type="checkbox" value=".te_<?php echo $binst['id'];?>"/><label><?php echo $binst['short_name'];?></label></div>
                                        <?php
                                     }
                                    ?>
                                    </div>
                                </fieldset>
                                <div class="callActionFilter">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">Apply Filter</button>
                                    <button id="Reset" class="reset">Reset Filter</button>
                                </div>
                            </form>
                        </div>
                    </div>
 					<div class="col-md-10 col-sm-12 col-xs-12 faculty-list-widget">
                        <div id="Container">
                            <div class="fail-message"><span>No Course were found matchinng the selected filters</span></div>
                            <ul class="te_faculty_list clearfix">
                                <?php
                                    //print_r($faculty_arr);
                                    $faculty_arr = glbl_faculty_func();
                                     foreach ($faculty_arr as &$fac) {
                                        $i_profile_image = get_featured_image($fac['id'], 'faculty');
                                    ?>
                                    <li class="mix te_<?php echo $fac['inst'];?>">
                                        <a href="<?php echo $fac['link'];?>">
                                            <!-- <div class="courseCover" style="background-image: url(<?php //echo $i_profile_image;?>);"></div> -->
                                            <div class="rotate_img">
                                                <div class="col-half courseCover anti_rotate_img" data-label="Gray">
                                                    <div style="
                                                    background-image   : url(<?php echo $i_profile_image;?>);
                                                    display         : inline-block;
                                                    width: 180px;
                                                    height: 180px;
                                                    background-size: 180px auto;
                                                    " class="grayscale"></div>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="wrapCard">
                                            <div class="facultyCard-detail">
                                                <h4><?php echo $fac['designation'];?></h4>
                                                <h3><a href="<?php echo $fac['link'];?>"><?php echo $fac['name'];?></a></h3>
                                                <?php if ($fac['excerpt']) {?>
                                                <p><?php echo truncate($fac['excerpt'], 100);?></p>
                                                <?php } ?>
                                                <div class="re_link-blue"><a href="<?php echo $fac['link'];?>">Read More</a></div>
                                            </div>

                                        </div>
                                    </li>
                                <?php
                                }
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
            <div class="clearfix">
                <?php get_template_part( 'popular'); ?>
            </div>
        </div>
    </section>
<?php
get_footer(); ?>
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/gray.js"></script>
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/jquery.mixitup.js"></script>
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/filter.js"></script>
