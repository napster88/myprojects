<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 */
?>
<?php get_header(); 
?>

<?php
function get_inst_course($instid, $courses_arr2){

    $c .= '<ul class="clearfix">';
    $ic=1;
    //print_r($courses_arr2);
    foreach ($courses_arr2 as &$icourses) {
        $inst = $icourses['inst']['id'];
        if ($inst == $instid && $icourses['select_course']==0){
            if ($ic<=4){
            $c.= '<li class="col-md-6 col-sm-6 col-xs-12"><a href="'.$icourses['link'].'">'.$icourses['shortname'].'</a></li>';
            }
            $ic++;
        }
        
    }
    $c.='</ul>';
    return $c;
}

function get_inst_course_cat($instid, $courses_arr2){
    $a_array = array();
    foreach ($courses_arr2 as &$icourses) {
        $inst = $icourses['inst']['id'];
        if ($inst == $instid){
        $inst = $icourses['cat'];
         foreach( $inst as $post_category ) {
           array_push($a_array, $post_category);
        }
        }
    }
    $c = array_unique($a_array);
    return $c;
}

function get_inst_cert($instid, $courses_arr2){
    $a ='';
    $nav='';
    $exec = false;
    $cert = false;
    foreach ($courses_arr2 as &$icourses) {

        $inst = $icourses['inst']['id'];
        $type = $icourses['type'];
        if ($inst == $instid && $type == 1){
            $exec = true;
        }
        if ($inst == $instid && $type == 2){
            $cert = true;
        }

    }
    if ($exec){
    $a.= '<h4><i class="fa icon-course"></i><span>Executive Course</span></h4>';
    }
    if ($cert){
    $a.= '<h4><i class="fa icon-certificate-course"></i><span>Certificate Course</span></h4>'; 
    }
     return $a;
}

function get_inst_cert_type($instid, $courses_arr2, $ntype){
    $exec = false;
    foreach ($courses_arr2 as &$icourses) {

        $inst = $icourses['inst']['id'];
        $type = $icourses['type'];
        if ($inst == $instid && $type == $ntype){
            $exec = true;
        }

    }
    if ($exec){
    $nav.= 'ct_'.$ntype.'';
    }
    return $nav;
}

function get_inst_cert_ad($instid, $courses_arr2, $ntype){
    $exec = false;
    foreach ($courses_arr2 as &$icourses) {

        $inst = $icourses['inst']['id'];
        $type = $icourses['admission'];
        if ($inst == $instid && $type == $ntype){
            $exec = true;
        }

    }
    if ($exec){
    $nav.= 'ad_'.$ntype.'';
    }
    return $nav;
}


?>
<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/university-listing.css" rel="stylesheet" />
<!-- ~~~~~~~~~~ main wrapper ~~~~~~~~~~ -->
    <section class="main-wrapper">
        <div class="te-listing-courses-section">
            <!-- <div class="clearfix hidded">Search matches</div> -->

            <div class="container">
                <div class="clearfix row user_search_course">
                    <div class="col-md-8 col-sm-8 col-xs-12">
                        <p><?php echo get_field('institute_listing_headline','option')?></p>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                         <?php if (is_user_logged_in()) { ?>
                        <div class="redir_btn-a text-right"><a href="<?php echo home_url();?>/edit-profile/#suggestcourse">Suggest a course</a></div>
                         <?php } else { ?>
                          <div class="redir_btn-a text-right home_suggest"><a href="<?php echo get_bloginfo('url');?>/institute/#suggest_popup">Suggest a course</a></div>
                        <?php } ?>
                    </div>
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
                                            <input type="checkbox" value=".ad_Yes"/>
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
                      <!--  <div class="redir_btn-a"><a href="#">Suggest a course</a></div>-->
                    </div>
                    <div class="col-md-10 col-sm-12 col-xs-12 university-list-widget">
                        <div id="Container">
                            <div class="fail-message"><span>No Course were found matchinng the selected filters</span></div>
                            <ul class="te_university_list">
                        <?php
                             $c='';
                             $ct_e=false;
                             $ct_c=false;

                             foreach ($inst_arr_list as &$binst) {
                              
                                $instid = $binst['id'];
                                $ai_categories='';
                            $etype='';        
                            $adlist='';
                            $ctype='';
                            $acat = get_inst_course_cat($instid, $courses_arr2);
                             foreach( $acat as $post_category ) {
                                       $ai_categories .=  'te_'.$post_category.' ';
                                    }
                            $nav_exe = get_inst_cert_type($instid, $courses_arr2,1);
                            $nav_cert = get_inst_cert_type($instid, $courses_arr2,2);
                            $nav_ad = get_inst_cert_ad($instid, $courses_arr2,'Yes');
                        ?>
                        <li class="mix <?php echo $ai_categories;?> <?php echo $nav_exe;?> <?php echo $nav_cert;?> <?php echo $nav_ad;?> col-university-card clearfix">
                                    <div class="leftCover col-md-3 col-sm-4 col-xs-4">
                                        <div class="universityCover">
                                        <a href="<?php echo $binst['link'];?>"><img src="<?php echo $binst['logo'];?>"/></a>
                                        </div>
                                    </div>
                                    <div class="wrapCard col-md-9 col-sm-8 col-xs-8">
                                        <div class="instituteDetail clearfix">
                                            
                                            <div class="left col-md-8 col-sm-8 col-xs-12">
                                                <div class="row">
                                                    <h2>
                                                    <a href="<?php echo $binst['link'];?>">
                                                    <?php echo $binst['name'];?>
                                                    </a>
                                                    </h2>
                                                </div>
                                            </div>
                                            <div class="right col-md-4 col-sm-4 col-xs-12">
                                                <div class="row">
                                                  
                                                   <?php
                                                   echo $a = get_inst_cert($instid, $courses_arr2);
                                                   ?>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="courseAvail">
                                            <!-- <h3>Courses</h3> -->
                                            <?php
                                                echo $courses_list = get_inst_course($instid, $courses_arr2);
                                            ?>
                                            <a class="redir_btn" href="<?php echo $binst['link']?>">View Details</a>
                                        </div>
                                    </div>
                                </li>
                        <?php }  ?>
                            </ul>
                            <div class="gap"></div>
                            <div class="gap"></div>
                            <div class="gap"></div>
                            <!-- <div class="text-center"><a class="lazyLoad" href="#">More</a></div> -->
                        </div>
                    </div>
                </div>

                <!-- ~~~~~~~~~~~~~ Popular courses ~~~~~~~~~~~~~ -->
        <div class="te-Popular-courses wow slideInUp">
            <?php get_template_part( 'popular'); ?>
        </div>
    </section>
<?php           
get_footer(); ?>
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/jquery.mixitup.js"></script>
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/filter.js"></script>