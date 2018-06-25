<?php
/**
 * The template for displaying all single posts.
 */

get_header();
$catId = get_the_category( $post->ID );
?>
<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/category-landing.css" rel="stylesheet" />
<?php
global $wp_query;
$tag = $wp_query->get_queried_object();
$catId = $tag->term_id;
$slug = $tag->slug;

$current_category = single_cat_title("", false);
if ( get_field('category_color', 'course-categories_'.$tag->term_id)){
$termcolor = get_field('category_color', 'course-categories_'.$tag->term_id);
}
else{
    $termcolor = '#244895';
}

?>
<style>
h2.title {
    font-size: 30px;
    color: #151515;
    font-family: "Oswald", sans-serif;
    line-height: 1.4;
    font-weight: bold;
}
    .learner-spearkers{max-width: 90%;}

</style>
<!-- ~~~~~~~~~~ main wrapper ~~~~~~~~~~ -->
    <section class="main-wrapper">
        <div class="te-banner-top" style="background: <?php echo $termcolor;?>;">
            <div class="container">
                <div class="left-te col-md-8 col-sm-12 col-xs-12">
                <div class="row wow slideInLeft">
                        <div class="banner-components">
                            <h2><?php echo get_field('headline','course-categories_'.$catId.'');?></h2>
                            <p><?php echo get_field('subheadline','course-categories_'.$catId.'');?></p>
                        </div>
                </div>
                </div>
                <div class="right-te col-md-4 col-sm-4 xs-hidden">
                    <div class="batch-Card">
                        <div class="guidForm">
                           <?php echo do_shortcode('[gravityform id=6 title=false ajax=true ]'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="cover_nav">
            <div class="secondaryNav">
                <div class="container">
                    <div class="valign">
                        <ul id="list_scroll" class="nav">
                            <li><a href="#view_Course_Overview">Course Offered</a></li>
                            <li><a href="#view_Universites_Partner">University Partner</a></li>
                              <li><a href="#view_Stats">Stats</a></li>
                            <li><a href="#view_meet-instructors">Faculty</a></li>
                            <li><a href="#view_Our-Alumni">Aluminis</a></li>
                            <li><a href="#view_Testimonials">Testimonials</a></li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix twoColumn-layout">
            <div class="container">
                <div class="left-te col-md-12 col-sm-12 col-xs-12">

                    <div class="row">
                        <!-- ~~~~~~~~~~~~~ Courses offered ~~~~~~~~~~~~~ -->
                        <div id="view_Course_Overview" class="te-courses-offered wow slideInUp">

                                    <div class="text-center">
                                    <h2 class="title">
                                        <?php echo get_cat_name($catId);?> Courses
                                    </h2>
                                </div>
                            <div class="clearfix">
                                <?php
                                //print_r($courses_arr2);
                                $instarray = array();
                                $faculty_array = array();
                                $alumni_array = array();
                                $testimonial_array = array();

                                $farray = array();

                                $cpindex=1;
				$key=0;
				$navreturnarray=array();
                            foreach ($courses_arr2 as &$bcourse) {

                                    $course_cat = $bcourse['cat'];
                                    $course_type = $bcourse['type'];
                                    $course_inst = $bcourse['inst']['id'];
                                    $course_ad = $bcourse['admission'];
                                    $course_img = $bcourse['image'];
                                    $course_link = $bcourse['link'];
                                    $course_shortname = $bcourse['shortname'];
                                    $course_duration = $bcourse['duration'];
                                    $course_excerpt = $bcourse['excerpt'];
                                    $course_start_date = get_field('course_start_date', false, false, $bcourse['id']);

                            if (in_array($catId,$course_cat)){

                                array_push($instarray, $course_inst);
                                array_push($farray, $bcourse['id']);

                                $f_array = get_field('faculty', $bcourse['id']);
                                foreach ($f_array as &$f_array_val) {
                                    array_push($faculty_array, $f_array_val);
                                }
                                $a_array = get_field('alumni', $bcourse['id']);
                                 foreach ($a_array as &$a_array_val) {
                                    array_push($alumni_array, $a_array_val->ID);
                                }
                                $t_array = get_field('testimonials', $bcourse['id']);
                                 foreach ($t_array as &$t_array_val) {
                                    array_push($testimonial_array, $t_array_val->ID);
                                }

                                if ($cpindex<=3){
                                    if (in_array($catId,$course_cat) && $cpindex<=3){
                                        array_push($course_inst, $instarray);
				$date = new DateTime($course_start_date);

                                            $cl_startdate = get_field('course_start_date', $bcourse['id'], false, false);
                                //$date = new DateTime($cl_startdate);
                                $timevalue = strtotime($cl_startdate);
                                $new_date = date('M Y', $timevalue);
                                $termdata = get_term( $course_cat[0], 'course-categories' );
                                if(get_post_meta($bcourse['id'], 'admission_open', true) == 'Yes'){
                                  $mxclass = 'admclass';
                                }else{
                                  $mxclass = '';
                                }
                                ?>

                                 <div class="col-md-4 col-sm-6 col-xs-6 card-university">
                                    <div class="col-courses-card">


                                         <div class="courseCover <?php echo $mxclass;?>" style="background-image: url(<?php echo $course_img?>);"></div>
                                    <div class="wrapCard">
                                        <div class="courseCard-detail">
                                            <div class="card">
                                                <h4 class="b_inst_name"><?php echo get_field('short_name', $course_inst);?></h4>
                                                <h2><a href="<?php echo $course_link;?>" onclick="return redirectsinglepage('<?php echo $course_link;?>','<?php echo $_GET['search']!=''?'Search Results':'Course Category';?>','<?php echo $course_shortname;?>',<?php echo $bcourse['id'];?>,'<?php echo get_field('short_name', $course_inst);?>','<?php echo $termdata->name;?>','<?php echo $new_date.' Batch';?>','<?php echo $key+1;?>' )" title="<?php echo $course_shortname;?>" style="cursor: pointer;"><?php echo $course_shortname;?></a></h2>
                                            </div>
                                            <ul>
                                            <?php
                                            $k=1;
                                            // check if the repeater field has rows of data
                                            if( have_rows('key_points', $bcourse['id']) ):

                                                // loop through the rows of data
                                                while ( have_rows('key_points', $bcourse['id']) ) : the_row();
                                                    if ($k<=2){
                                                   ?>
                                                   <li><?php echo get_sub_field('key_point');?></li>
                                                   <?php
                                                }
                                                $k++;
                                                endwhile;

                                            endif;

                                            ?>
                                            </ul>
                                        </div>
                                        <div class="viewDetailcard">
                                            <div class="course_period"><span>
                                            <?php
$termdata = get_term( $course_cat[0], 'course-categories' );
                                            // make date object
                                            $date = new DateTime($course_start_date);

                                            $cl_startdate = get_field('course_start_date', $bcourse['id'], false, false);
                                //$date = new DateTime($cl_startdate);
                                $timevalue = strtotime($cl_startdate);
                                $new_date = date('M Y', $timevalue);
                                            echo $new_date;?></span> Batch</div>
                                            <div  class="course_period"><span><?php echo $course_duration;?></span></div>
                                            <div class="btn-te"><a href="<?php echo $course_link;?>" class="redir_btn-a" onclick="return redirectsinglepage('<?php echo $course_link;?>','<?php echo $_GET['search']!=''?'Search Results':'Course Category';?>','<?php echo $course_shortname;?>',<?php echo $bcourse['id'];?>,'<?php echo get_field('short_name', $course_inst);?>','<?php echo $termdata->name;?>','<?php echo $new_date.' Batch';?>','<?php echo $key+1;?>' )" title="<?php echo $course_shortname;?>" style="cursor: pointer;">View Details</a></div>
                                        </div>
                                    </div>
                                    </div>
                                </div>

                                <?php
			if($key<10){
				$navreturnarray[$bcourse['id']]['name']=$course_shortname;
				$navreturnarray[$bcourse['id']]['id']=$bcourse['id'];
				$navreturnarray[$bcourse['id']]['brand']=get_field('short_name', $course_inst);
                                $navreturnarray[$bcourse['id']]['category']=$termdata->name;;
			 	$navreturnarray[$bcourse['id']]['variant']=$new_date.' Batch';
				$navreturnarray[$bcourse['id']]['list']=$_GET['search']!=''?'Search Results':'Course Category';
				$navreturnarray[$bcourse['id']]['position']=$key+1;
			}
			       $key=$key+1;
                                $cpindex++;
                                }
                                }
                            }
                        }

                                ?>
                                <div class="text-center redir_link clearfix col-md-12 col-sm-12 col-xs-12">
                                    <a href="<?php echo home_url();?>/browse-courses??id=te_<?php echo $catId;?>">View All</a>
                                </div>
                            </div>
                        </div>
                        <?php
//print_r($testimonial_array);
                        ?>

                        <!-- ~~~~~~~~~~~~~ institutions ~~~~~~~~~~~~~ -->
                        <div>
                            <?php if (!empty($instarray)) {?>
                            <div id="view_Universites_Partner" class="clearfix flex-row wow slideInUp">
                                <h2 class="head-title text-center">University Partner</h2>
                                <div class="row university_partners">
                                    <div class="col-md-12 col-md-12 col-md-12 col-md-12">
                                        <ul class="slide_Universites_partner owl-carousel owl-theme">
                                            <?php  foreach ($inst_arr_list as &$value) {
                                                if (in_array($value['id'],$instarray)){
                                                ?>
                                                 <li>
                                                 <div class="cover_all_ins" style="background-image: url(<?php echo $value['logo'];?>)">
                                                    <!-- <img src="<?php //echo $value['logo'];;?>" /> -->
                                                 </div>
                                                 <div class="i_title clearfix text-center"><?php echo $value['name'];;?>
                                                 </div>
                                                 </li>
                                                <?php  }
                                                 } ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>


                            <?php if( have_rows('stats', 'course-categories_'.$catId.'') ) {?>
                            <div class="flex-row">
                                <div id="view_Stats" class="row why_talent_detail wow slideInUp">
                                    <div class="left col-md-7 col-sm-6 col-xs-12">
                                        <?php echo get_field('content', 'course-categories_'.$catId.'');?>
                                    </div>
                                    <div class="right col-md-5 col-sm-6 col-xs-12">
                                        <?php

                                            echo '<ul>';
                                            // loop through the rows of data
                                            while ( have_rows('stats','course-categories_'.$catId.'') ) : the_row();
                                            ?>
                                              <li>
                                                <div><i class="fa <?php echo get_sub_field('icon');?>"></i></div>
                                                <h2><?php echo get_sub_field('title');?></h2>
                                                <p><?php echo get_sub_field('description');?></p>
                                            </li>
                                            <?php

                                            endwhile;

                                            echo '</ul>';
                                        ?>
                                    </div>
                                </div>
                                <div class="batch-Card">
                                    <div class="guidForm">
                                       <?php echo do_shortcode('[gravityform id=11 title=false ajax=true ]'); ?>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>

                <!-- ~~~~~~~~~~~~~ meet instructors ~~~~~~~~~~~~~ -->
                <?php if (!empty($faculty_array)) {?>
                <div id="view_meet-instructors" class="te-meet-instructors wow slideInUp">
                    <div class="clearfix">
                        <div class="text-center">
                            <h2 class="title">
                                Meet your Instructors
                            </h2>
                            <p>Learn from skilled instructors with professional experience in the field.</p>
                        </div>
                    <div class="clearfix">
                        <div class="col-md-12 col-sm-12 col-xs-12 instructors-widget">

                            <?php
                            $ik=1;
                            $faculty_arr = glbl_faculty_func();
                            foreach ($faculty_arr as &$faculty_list_value) {
                                 if (in_array($faculty_list_value['id'],$faculty_array )){

                                    if ($ik<=4) {
                            $faculty_image = get_featured_image($faculty_list_value['id'], 'faculty');
                                ?>
                            <div class="col-md-6 col-sm-6 col-xs-6 ind-col">
                                <div class="row">
                                    <div class="card-mid">
                                        <div class="col-md-4 col-sm-12 col-xs-12">
                                            <div class="rotate_img">
                                                <div class="anti_rotate_img" style="background-image: url(<?php echo $faculty_image;?>)">

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-7 col-sm-12 col-xs-12">
                                            <div><a href="<?php echo $faculty_list_value['link'];?>"><?php echo $faculty_list_value['designation'];?></a>
                                            </div>
                                            <h3><?php echo $faculty_list_value['name'];?></h3>
                                            <p><?php
                                                $desc = $faculty_list_value['excerpt'];
                                                echo truncate($desc, 100);?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                                }
                            $ik++;
                             }
                             } ?>
                             <?php if ($ik>4) { ?>
                            <div class="col-md-12 col-sm-12 col-xs-12 text-center viewAll-btn clearfix">
                                    <a href="<?php echo home_url()?>/faculty?fid=<?php echo $faculty_list_value['id'];?>">View All</a>
                            </div>
                            <?php } ?>

                        </div>

                        <div class="col-md-12 col-sm-12 col-xs-12 instructors-widget owl-carousel owl-theme mb-carousel">
                            <?php
                            $kk=1;
                            $faculty_arr = glbl_faculty_func();
                           foreach ($faculty_arr as &$faculty_list_value) {
                                 if (in_array($faculty_list_value['id'],$faculty_array )){

                                     if ($kk<=4){
                            $faculty_image2 = get_featured_image($faculty_list_value['id'], 'faculty');

                            ?>
                            <div class="col-md-6 col-sm-6 col-xs-6 ind-col">
                                <div class="row">
                                    <div class="card-mid">
                                        <div class="col-md-4 col-sm-12 col-xs-12">

                                            <div class="rotate_img">
                                                <div class="anti_rotate_img" style="background-image: url(<?php echo $faculty_image2;?>)"></div>
                                            </div>

                                        </div>
                                        <div class="col-md-7 col-sm-12 col-xs-12">

                                            <h3><a href="<?php echo $faculty_list_value['link'];?>"><?php echo $faculty_list_value['name'];?></a></h3>
                                            <div><?php echo $faculty_list_value['designation'];?>
                                            </div>


                                           <p><?php
                                                $desc = $faculty_list_value['excerpt'];
                                                echo truncate($desc, 100);?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                             <?php }  $kk++; }  } ?>
                        </div>
                    </div>

                    </div>
                </div>
                <?php } ?>


                <!-- Alumni Section Start -->
                 <?php if (!empty($farray)) {?>



                            <?php
                            $ak=0;
                            $alumni_arr = glbl_alumni_func();
                           foreach ($alumni_arr as &$alumni_list_value) {
                            //print_r($alumni_list_value);
                                 if (in_array($alumni_list_value['id'],$farray )) {
                                  if($ak==0){?>
                                   <div id="view_Our-Alumni" class="flex-row alumnis-widget wow slideInUp">
                                  <h2>Our Alumni’s</h2>
                        <div class="alumnis-list owl-carousel">
                                  <?php } ?>

                            $faculty_image = get_featured_image($alumni_list_value['id'], 'faculty');

                            ?>
                                     <div class="item">
                                        <div class="alumni_avator">
                                        <img class="img-responsive" src="<?php echo $faculty_image;?>" />
                                        </div>
                                        <div class="detailAlumni">
                                            <h3><?php echo $alumni_list_value['name'];?></h3>
                                            <h5><?php echo  $alumni_list_value['designation'];?></h5>
                                            <h5><?php echo  $alumni_list_value['company'];?></h5>
                                            </div>
                                    </div>
                                   <?php  if($ak==0){?>
                                   </div>
                    </div>
                     </div>
                                  <?php } ?>
                                     <?php
                                     $ak++;
                             }
                         }
                            ?>

                <?php } ?>

                <!-- Alumni Section End -->





                    </div>
                    </div>
                </div>
                <?php
                if ( $ak==0){ ?>
                    <style>#view_Our-Alumni{display:none;}</style>
                    <?php
                }
                ?>
            </div>
              </div>
              <div style="display:none">
              <?php //print_r($alumni_arr);?>
              </div>
            <?php if (!empty($farray)) {?>
            <div id="view_Testimonials" class="speaker_fluid wow slideInUp">
                <div class="container">
                    <div class="learner-spearkers">
                    <h2 class="title">Learner's Speak</h2>
                        <div class="learner-list owl-carousel">

                           <?php
                           $tm=1;
                           $pmk=1;
                           $test_arr = glbl_testimonials_func();
                           foreach ($test_arr as &$test_list_value) {
                                 if (in_array($test_list_value['course'], $farray )) {
                                if ($pmk<=5){
                            $faculty_image = get_featured_image($test_list_value['id'], 'faculty');
                            $video_link = get_field('video_link', $test_list_value['id']);
                             $dimg = get_field('default_video_image', 'option');
                            ?>



                            <div class="item">
                                <?php if ($video_link) { ?>
                                 <div class="col-md-9 col-sm-12 col-xs-12 videoItem quotes">
                                    <div class="videoTestimonial cover_full col-md-6 col-md-offset-4" style="background-image: url(<?php echo $dimg;?>);">
                                        <span class="overlayVideo"></span>
                                        <span class="videoPlay"><a class="playVideo fa icon-play_button" href="<?php echo $video_link;?>?rel=0&controls=0&autoplay=1&loop=1"></a></span>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-12 text-center">
                                     <div class="speaker_avator">
                                         <div class="rotate_img">
                                                <div class="anti_rotate_img"
                                                style="background-image: url(<?php echo $faculty_image;?>)">
                                                </div>
                                            </div>
                                        <h4><?php echo $test_list_value['name'];?></h4>
                                        <h5><?php echo $test_list_value['designation'];?>, <?php echo $test_list_value['company'];?></h5>
                                    </div>
                                </div>


                                <?php } else { ?>
                                <div class="col-md-3 col-sm-3 col-xs-12">
                                    <div class="speaker_avator">

                                        <div class="rotate_img">
                                                <div class="anti_rotate_img"
                                                style="background-image: url(<?php echo $faculty_image;?>)">
                                                </div>
                                            </div>
                                        <h4><?php echo $test_list_value['name'];?></h4>
                                        <h5><?php echo $test_list_value['designation'];?>, <?php echo $test_list_value['company'];?></h5>
                                    </div>
                                </div>
                                <div class="col-md-9 col-sm-12 col-xs-12 text-center quotes">
                                    <p>
                                        <?php echo $test_list_value['testimonial']?>
                                    </p>
                                </div>
                                <?php } ?>
                            </div>
                            <?php
                            }
                            $tm++;
                            $pmk++;
                            }
                        }
                                ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>

        </div>
         <?php
                if ( $tm==0){ ?>
                    <style>#view_Testimonials{display:none;}</style>
                    <?php
                }
                ?>
        </div>
    </section>

<?php
if($slug=='brand-sales-marketing'){?>
    <script type="application/ld+json">
                {
                    "@context": "http://schema.org",
                    "@type": "EducationEvent",
                    "name": "PG Certificate Program in Market Research and Data Analytics",
                    "description" : "Talentedge offers PG certificate Program in Data Analytics and Market Research from MICA, a post graduate online certificate training course in India.",
                    "performer":"Talentedge",
					"eventStatus": "open",

                    "location": {
                    "@type": "Place",
                    "name" : "Online Classroom",
                    "address":
                    { "@type": "PostalAddress", "name" : "PG Certificate Program in Market Research and Data Analytics", "addressLocality": "", "addressRegion": "" }
                    ,
                    "url": "https://talentedge.in/course/executive-courses/mica/pg-certificate-program-in-market-research-and-data-analytics-mr-01-0817-01/"
                    },

                    "startDate": "2017-09-30",

                    "url" : "https://talentedge.in/course/executive-courses/mica/pg-certificate-program-in-market-research-and-data-analytics-mr-01-0817-01/"
                }
            </script>





<script type="application/ld+json">
                {
                    "@context": "http://schema.org",
                    "@type": "EducationEvent",
                    "name": "Post Graduate Certificate Program in Marketing and Brand Management",
                    "description" : "MICA offers Marketing and Brand Management program in India. This program helps to leverage digital marketing skills to make overall brand management and strategy.",
                    "performer":"Talentedge",
					"eventStatus": "open",

                    "location": {
                    "@type": "Place",
                    "name" : "Online Classroom",
                    "address":
                    { "@type": "PostalAddress", "name" : "Post Graduate Certificate Program in Marketing and Brand Management", "addressLocality": "", "addressRegion": "" },
                    "url": "https://talentedge.in/course/executive-courses/mica/marketing-brand-management/"
                    },

                    "startDate": "2017-11-20",

                    "url" : "https://talentedge.in/course/executive-courses/mica/marketing-brand-management/"
                }
            </script>


<script type="application/ld+json">
                {
                    "@context": "http://schema.org",
                    "@type": "EducationEvent",
                    "name": "Online Digital Marketing Certification Course from XLRI Jamshedpur",
                    "description" : "Advance your career with online digital marketing certification course from XLRI Jamshedpur. Explore the best digital marketing online training course.",
                    "performer":"Talentedge",
					"eventStatus": "open",

                    "location": {
                    "@type": "Place",
                    "name" : "Online Classroom",
                    "address":
                    { "@type": "PostalAddress", "name" : "Online Digital Marketing Certification Course from XLRI Jamshedpur", "addressLocality": "", "addressRegion": "" },
                    "url": "https://talentedge.in/course/executive-courses/xlri-jamshedpur/digital-marketing/"
                    },

                    "startDate": "2017-11-20",

                    "url" : "https://talentedge.in/course/executive-courses/xlri-jamshedpur/digital-marketing/"
                }
            </script>

<?php }

if($slug=='analytics'){?>
      <script type="application/ld+json">
                {
                    "@context": "http://schema.org",
                    "@type": "EducationEvent",
                    "name": "Online PG Certification Courses in Market Research and Data Analytics",
                    "description" : "Talentedge offers PG certificate Program in Data Analytics and Market Research from MICA, a post graduate online certificate training course in India. Only live classes.",
                    "performer":"Talentedge",
					"eventStatus": "open",

                    "location": {
                    "@type": "Place",
                    "name" : "Online Classroom",
                    "address":
                    { "@type": "PostalAddress", "name" : "Online PG Certification Courses in Market Research and Data Analytics", "addressLocality": "", "addressRegion": "" }
                    ,
                    "url": "https://talentedge.in/course/executive-courses/mica/pg-certificate-program-in-market-research-and-data-analytics-mr-01-0817-01/"
                    },

                    "startDate": "2017-09-30",

                    "url" : "https://talentedge.in/course/executive-courses/mica/pg-certificate-program-in-market-research-and-data-analytics-mr-01-0817-01/"
                }
            </script>





<script type="application/ld+json">
                {
                    "@context": "http://schema.org",
                    "@type": "EducationEvent",
                    "name": "Big Data Analytics Executive Certificate Program",
                    "description" : "Enroll for big data analytics course with SPJIMR certification available online with Talentedge. Explore course details online.",
                    "performer":"Talentedge",
					"eventStatus": "open",

                    "location": {
                    "@type": "Place",
                    "name" : "Online Classroom",
                    "address":
                    { "@type": "PostalAddress", "name" : "Big Data Analytics Executive Certificate Program", "addressLocality": "", "addressRegion": "" },
                    "url": "https://talentedge.in/course/certificate-courses/spjimr-formerly-sp-jain-institute-of-management-and-research/big-data-analytics/"
                    },

                    "startDate": "2017-11-20",

                    "url" : "https://talentedge.in/course/certificate-courses/spjimr-formerly-sp-jain-institute-of-management-and-research/big-data-analytics/"
                }
            </script>


<script type="application/ld+json">
                {
                    "@context": "http://schema.org",
                    "@type": "EducationEvent",
                    "name": "Certified Data Science Using Excel and R Course Online from xlri Jamshedpur",
                    "description" : "Advance your career with Data Science Using Excel and R Course from XLRI Jamshedpur. Explore data science course online, syllabus, study material etc",

                    "performer":"Talentedge",
					"eventStatus": "open",

                    "location": {
                    "@type": "Place",
                    "name" : "Online Classroom",
                    "address":
                    { "@type": "PostalAddress", "name" : "Certified Data Science Using Excel and R Course Online from xlri Jamshedpur", "addressLocality": "", "addressRegion": "" },
                    "url": "https://talentedge.in/course/executive-courses/xlri-jamshedpur/executive-program-in-data-science-using-excel-r-ds-02-1116-01/"
                    },

                    "startDate": "2017-11-20",

                    "url" : "https://talentedge.in/course/executive-courses/xlri-jamshedpur/executive-program-in-data-science-using-excel-r-ds-02-1116-01/"
                }
            </script>
<?php }
?>
<script>

dataLayer.push({
  'event': 'productImpressions',
  'ecommerce': {
    'currencyCode': 'INR',     // Here we have given INR as example. If   other course is accessed by international students then it should be 'USD'
    'impressions': [<?php foreach($navreturnarray as $key =>$value){?>
     {
       'name': "<?php echo $value['name'];?>",      
       'id': <?php echo $value['id'];?>,
       'brand':"<?php echo $value['brand'];?>",
       'category': "<?php echo $value['category'];?>",
       'variant': "<?php echo $value['variant'];?>",
       'list': "<?php echo $value['list'];?>",
       'position': <?php echo $value['position'];?>
     },
     <?php }?>]
  }
});

</script>
<?php get_footer(); ?>
