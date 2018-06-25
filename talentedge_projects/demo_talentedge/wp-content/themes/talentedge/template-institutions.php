<?php
/**
 * The template for displaying contact page.
 *
 * Template Name: institutions page
 *
 */

get_header();
echo 'ss';
 ?>
<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/university-listing.css" rel="stylesheet" />
<!-- ~~~~~~~~~~ main wrapper ~~~~~~~~~~ -->
    <section class="main-wrapper">
        <div class="te-listing-courses-section">
            <!-- <div class="clearfix hidded">Search matches</div> -->

            <div class="container">
                <div class="clearfix row user_search_course">
                    <div class="col-md-8 col-sm-8 col-xs-12">
                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using.</p>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="redir_btn-a text-right"><a href="#">Suggest a course</a></div>
                    </div>
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
                                    <h3>All Category <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></h3>
                                    <div class="overScroll">
                                        <div class="checkbox">
                                            <input type="checkbox" value=".te_data_Analytics"/>
                                            <label>Data Analytics</label>
                                        </div>
                                        <div class="checkbox">
                                            <input type="checkbox" value=".te_data_Science"/>
                                            <label>Data Science</label>
                                        </div>
                                        <div class="checkbox">
                                            <input type="checkbox" value=".te_e_Commerce"/>
                                            <label>E-Commerce</label>
                                        </div>
                                        <div class="checkbox">
                                            <input type="checkbox" value=".te_entrepreneurship"/>
                                            <label>Entrepreneurship</label>
                                        </div>
                                    </div>
                                </fieldset>
                              
                                <fieldset class="filter-group checkboxes">
                                    <h3>All Institutes</h3>4
                                    <div class="overScroll">
                                        <div class="checkbox">
                                            <input type="checkbox" value=".te_IIM"/>
                                            <label>IIM</label>
                                        </div>
                                        <div class="checkbox">
                                            <input type="checkbox" value=".te_MICA"/>
                                            <label>MICA</label>
                                        </div>
                                        <div class="checkbox">
                                            <input type="checkbox" value=".te_XLRI"/>
                                            <label>XLRI</label>
                                        </div>
                                        <div class="checkbox">
                                            <input type="checkbox" value=".te_Parsons"/>
                                            <label>Parsons</label>
                                        </div>
                                    </div>
                                </fieldset>
                              
                                <fieldset class="filter-group checkboxes">
                                    <h3>Type of Course</h3>
                                    <div class="overScroll">
                                        <div class="checkbox">
                                            <input type="checkbox" value=".te_Executive"/>
                                            <label>Executive</label>
                                        </div>
                                        <div class="checkbox">
                                            <input type="checkbox" value=".te_Certificate"/>
                                            <label>Certificate</label>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset class="filter-group checkboxes">
                                    <h3>Status</h3>
                                    <div class="overScroll">
                                        <div class="checkbox">
                                            <input type="checkbox" value=".te_Addmission_Open"/>
                                            <label>Addmission Open</label>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset class="filter-group checkboxes">
                                    <h3>Experience</h3>
                                    <div class="overScroll">
                                        <div class="checkbox">
                                            <input type="checkbox" value=".te_Beginners"/>
                                            <label>Beginners</label>
                                        </div>
                                        <div class="checkbox">
                                            <input type="checkbox" value=".te_Mid_Management"/>
                                            <label>Mid Management</label>
                                        </div>
                                        <div class="checkbox">
                                            <input type="checkbox" value=".te_Senior_Management"/>
                                            <label>Senior Management</label>
                                        </div>
                                    </div>
                                </fieldset>
                              
                              <!-- <fieldset class="filter-group search">
                                <h4>Search</h4>
                                <input type="text" placeholder="Search ..."/>
                              </fieldset> -->
                            </form>

                        </div>
                        <div class="redir_btn-a"><a href="#">Suggest a course</a></div>
                    </div>
                    <div class="col-md-10 col-sm-12 col-xs-12 university-list-widget">
                        <div id="Container">
                            <div class="fail-message"><span>No Course were found matchinng the selected filters</span></div>
                            <ul class="te_university_list">
                                <li class="mix te_MICA col-university-card clearfix">
                                    <div class="leftCover col-md-3 col-sm-4 col-xs-4">
                                        <div class="universityCover">
                                            <a href="#"><img src="../images/mica_img-1.png"></a>
                                        </div>
                                    </div>
                                    <div class="wrapCard col-md-9 col-sm-8 col-xs-8">
                                        <div class="instituteDetail clearfix">
                                            
                                            <div class="left col-md-8 col-sm-8 col-xs-12">
                                                <div class="row">
                                                    <h2>Mudra Institute of Communications</h2>
                                                    <h5>Ahemedabad</h5>
                                                </div>
                                            </div>
                                            <div class="right col-md-4 col-sm-4 col-xs-12">
                                                <div class="row">
                                                    <h4><i class="fa icon-41"></i><span>Executive Course</span></h4>
                                                    <h4><i class="fa icon-42"></i><span>Certificate Course</span></h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="courseAvail">
                                            <h3>Courses</h3>
                                            <ul class="clearfix">
                                                <li class="col-md-6 col-sm-6 col-xs-12"><a class="#">Digital Marketing</a></li>
                                                <li  class="col-md-6 col-sm-6 col-xs-12"><a class="#">Marketing and Brand Management</a></li>
                                                <li  class="col-md-6 col-sm-6 col-xs-12"><a class="#">ECommerce Business Management</a></li>
                                            </ul>
                                            <a class="redir_btn" href="#">View Detail</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="mix te_XLRI col-university-card clearfix">
                                    <div class="leftCover col-md-3 col-sm-4 col-xs-4">
                                        <div class="universityCover">
                                            <a href="#"><img src="../images/client-partner-44.png"></a>
                                        </div>
                                    </div>
                                    <div class="wrapCard col-md-9 col-sm-8 col-xs-8">
                                        <div class="instituteDetail clearfix">
                                            
                                            <div class="left col-md-8 col-sm-8 col-xs-12">
                                                <div class="row">
                                                    <h2>Mudra Institute of Communications</h2>
                                                    <h5>Ahemedabad</h5>
                                                </div>
                                            </div>
                                            <div class="right col-md-4 col-sm-4 col-xs-12">
                                                <div class="row">
                                                    <h4><i class="fa icon-41"></i><span>Executive Course</span></h4>
                                                    <h4><i class="fa icon-42"></i><span>Certificate Course</span></h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="courseAvail">
                                            <h3>Courses</h3>
                                            <ul class="clearfix">
                                                <li class="col-md-6 col-sm-6 col-xs-12"><a class="#">Digital Marketing</a></li>
                                                <li  class="col-md-6 col-sm-6 col-xs-12"><a class="#">Marketing and Brand Management</a></li>
                                                <li  class="col-md-6 col-sm-6 col-xs-12"><a class="#">ECommerce Business Management</a></li>
                                            </ul>
                                            <a class="redir_btn" href="#">View Detail</a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <div class="gap"></div>
                            <div class="gap"></div>
                            <div class="gap"></div>
                            <div class="text-center"><a class="lazyLoad" href="#">More</a></div>
                        </div>
                    </div>
                </div>

                <!-- ~~~~~~~~~~~~~ Might like course ~~~~~~~~~~~~~ -->
                <div class="mightLike">
                    <div class="te-Popular-courses">
                        <div class="clearfix">
                            <div class="text-center">
                                <h2 class="title">
                                    Popular Courses
                                </h2>
                            </div>

                            <!-- only for mobile -->
                            <div class="popularCourseCard clearfix">
                                <ul class="clearfix row">
                                    <li class="col-md-2 col-sm-6 col-xs-6">
                                        <div class="cardSmall">
                                            <div class="clearfix">
                                                <div class="left">
                                                    <div class="text-center"><img src="../images/course-provider-1.png" alt=""></div>
                                                    <div class="bottom_course">
                                                        <h3><a href="#">Strategic Performance</a></h3>
                                                        <h4>XLRI</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="col-md-2 col-sm-6 col-xs-6">
                                        <div class="cardSmall">
                                            <div class="">
                                                <div class="text-center"><img src="../images/client-partner-4.png"></div>
                                                <div class="bottom_course">
                                                    <h3><a href="#">Financial Management </a></h3>
                                                    <h4>XLRI</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="col-md-2 col-sm-6 col-xs-6">
                                        <div class="cardSmall">
                                            <div class="">
                                                <div class="text-center"><img src="../images/client-partner-2.jpg"></div>
                                                <div class="bottom_course">
                                                    <h3><a href="#">Leadership and Strategy </a></h3>
                                                    <h4>JWMI</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="col-md-2 col-sm-6 col-xs-6">
                                        <div class="cardSmall">
                                            <div class="">
                                                <div class="text-center"><img src="../images/client-partner-3.jpg"></div>
                                                <div class="bottom_course">
                                                    <h3><a href="#">Strategic Performance</a></h3>
                                                    <h4>XLRI</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <!-- check this hell -->
                            <div class="colcarou clearfix">
                                <div class="cardSmall">
                                    <div class="wrapp_All">
                                        <div class="left">
                                            <div class="course_provider">
                                                <img src="../images/popular-course-3.png" alt="">
                                                <img class="provider" src="../images/course-provider-1.png" alt="">
                                            </div>
                                            <div class="bottom_course">
                                                <h3><a href="#">Strategic Performance</a></h3>
                                                <h4>XLRI</h4>
                                            </div>
                                        </div>
                                        <div class="hidden-xs right">
                                            <h3>
                                                <a href="#">Executive Programme In Fashion Business Management</a>
                                            </h3>
                                            <h4>The new School Parsons</h4>
                                            <p>
                                                This programme is designed with an intent to provide the participants with a comprehensive exposure to various aspects of managing the fashion business.
                                            </p>
                                            <div class="text-right knowMore-btn">
                                                <a href="#" title="">Know More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="cardSmall">
                                    <div class="wrapp_All">
                                        <div class="left">
                                            <div class="course_provider">
                                                <img src="../images/popular-course-6.png" alt="">
                                                <img class="provider" src="../images/client-partner-44.png" alt="">
                                            </div>
                                            <div class="bottom_course">
                                                <h3><a href="#">Strategic Performance</a></h3>
                                                <h4>XLRI</h4>
                                            </div>
                                        </div>
                                        <div class="hidden-xs right">
                                            <h3>
                                                <a href="#">Executive Programme In Fashion Business Management</a>
                                            </h3>
                                            <h4>The new School Parsons</h4>
                                            <p>
                                                This programme is designed with an intent to provide the participants with a comprehensive exposure to various aspects of managing the fashion business.
                                            </p>
                                            <div class="text-right knowMore-btn">
                                                <a href="#" title="">Know More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="cardSmall">
                                    <div class="wrapp_All">
                                        <div class="left">
                                            <div class="course_provider">
                                                <img src="../images/popular-course-7.png" alt="">
                                                <img class="provider" src="../images/wizcraft.png" alt="">
                                            </div>
                                            <div class="bottom_course">
                                                <h3><a href="#">Strategic Performance</a></h3>
                                                <h4>XLRI</h4>
                                            </div>
                                        </div>
                                        <div class="hidden-xs right">
                                            <h3>
                                                <a href="#">Executive Programme In Fashion Business Management</a>
                                            </h3>
                                            <h4>The new School Parsons</h4>
                                            <p>
                                                This programme is designed with an intent to provide the participants with a comprehensive exposure to various aspects of managing the fashion business.
                                            </p>
                                            <div class="text-right knowMore-btn">
                                                <a href="#" title="">Know More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="cardSmall">
                                    <div class="wrapp_All">
                                        <div class="left">
                                            <div class="course_provider">
                                                <img src="../images/popular-course-8.png" alt="">
                                                <img class="provider" src="../images/client-partner-44.png" alt="">
                                            </div>
                                            <div class="bottom_course">
                                                <h3><a href="#">Strategic Performance</a></h3>
                                                <h4>XLRI</h4>
                                            </div>
                                        </div>
                                        <div class="hidden-xs right">
                                            <h3>
                                                <a href="#">Executive Programme In Fashion Business Management</a>
                                            </h3>
                                            <h4>The new School Parsons</h4>
                                            <p>
                                                This programme is designed with an intent to provide the participants with a comprehensive exposure to various aspects of managing the fashion business.
                                            </p>
                                            <div class="text-right knowMore-btn">
                                                <a href="#" title="">Know More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ~~~~~~~~~~~~~ Might like course end ~~~~~~~~~~~~~ -->

            </div>
        </div>
    </section>
<?php			
get_footer(); ?>
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/jquery.mixitup.js"></script>
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/filter.js"></script>