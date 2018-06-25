<?php
/**
 * The template for displaying all single posts.
 */

get_header(); ?>
<style>
    .mtop20{margin-top:20px;}
</style>
<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/university-detail.css" rel="stylesheet" />
<?php $pid =  $post->ID;?>
<input type='hidden' id="pid" value="<?php echo $pid;?>"/>
<style>
    .none{display: none !important;}
</style>
<?php
$inst_ids = get_field('select_courses', $pid);
if ($inst_ids){
    $myposts = $inst_ids;
}
else{
$args = array(
        'post_type' => 'product',
        'fields' => 'ids',
        'meta_query' => array(
            array(
                'key'     => 'c_institute',
                'value'   => $pid,
                'compare' => '=',
            ),
        ),
    );
 $myposts = get_posts( $args);
  echo '<div id="inst_courses" style="display:none">';
                                    //print_r($myposts);
                                    echo '</div>';
}

$testimonial_array = array();
$faculty_array = array();
$test_arr = glbl_testimonials_func();
foreach ($test_arr as &$ex_a) {
    $inst = $ex_a['inst'];
    if ($inst==$pid){
        array_push($testimonial_array, $ex_a['id']);
    }
}
$faculty_arr = glbl_faculty_func();
foreach ($faculty_arr as &$faculty) {
    $inst = $faculty['inst'];
    if ($inst==$pid){
        array_push($faculty_array, $faculty['id']);
    }
}
  echo '<div id="test" style="display:none">';
                                    //print_r($testimonial_array);
                                    echo '</div>';

    echo '<div id="test" style="display:none">';
                                    //print_r($faculty_arr);
                                    echo '</div>';

?>

<!-- ~~~~~~~~~~ main wrapper ~~~~~~~~~~ -->
    <section class="main-wrapper">
        <div class="banner-wrp" style="background-image: url('<?php echo get_field('background_image');?>');">
            <div class="container">
                <div class="col-md-8 col-sm-12 col-xs-12 left-te">
                    <div class="row">
                        <div class="university-banner">
                            <?php
                             if (get_field('logo')){
                                $courseimage = get_field('logo');
                            }
                            else{
                                 $courseimage = get_field('default_institute_image', 'option');
                            }
                            ?>
                            <div class="universityLogo">
                                <img src="<?php echo $courseimage;?>">
                            </div>
                            <div class="university_basic">
                                <h1><?php echo get_the_title($pid);?></h1>
                                <h3><?php echo get_field('lcoation', $pid);?></h3>
                                <p><?php echo get_field('tagline', $pid);?></p>
                                <!-- <a class="red_link" href="<?php //echo home_url();?>/browse-courses?id=<?php //echo $pid; ?>">View all Courses</a> -->
                            </div>
                            <div class="te-university-ani">
                                <div class="text-left flexMe row">
                                     <?php
                                         if( have_rows('stats',$pid) ):?>
                                         <?php
                                            while ( have_rows('stats', $pid) ) : the_row();
                                            ?>
                                              <div class="col-md-4 col-sm-4 col-xs-4 col_xss_animate">
                                                <span class="tile-animate">
                                                    <div><span class="animate-value" data-ani-value="<?php echo get_sub_field('stats')?>">00</span><?php echo get_sub_field('stats_symbol')?></div>
                                                    <span class="text-value"><?php echo get_sub_field('text');?></span>
                                                </span>
                                            </div>
                                            <?php
                                            endwhile;?>
                                            <?php
                                          endif;
                                        ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 xs-hidden right-te">
                    <div class="row">
                        <div class="batch-Card">
                            <div class="guidForm">
                                <?php echo do_shortcode('[gravityform id=2 title=false ajax=true ]'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- secondary nav -->
        <div class="cover_nav">
            <div class="secondaryNav">
                <div class="container">
                    <div class="valign">
                        <ul id="list_scroll" class="nav">
                            <li><a href="#view_Course_Offered">Courses offered</a></li>
                            <li><a href="#view_Meet_instructors">Faculty</a></li>
                            <li><a href="#view_How_it_works">About Us</a></li>
                            <li><a href="#view_Testimonials">Testimonials</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>



        <!-- ~~~~~~~~~~~~~ Courses offered ~~~~~~~~~~~~~ -->
        <?php $selected_courses = get_field('select_courses');
         echo '<div id="inst_selected_courses" style="display:none">';
                                    //print_r($selected_courses);
                                    echo '</div>';
         if ($selected_courses){
            echo '<div style="display:none">';
                                    echo 'selected';
                                    echo '</div>';
            $iposts = $selected_courses;
         }
         else{
            $iposts = $myposts;
             echo '<div style="display:none">';
                                    echo 'default';
                                    echo '</div>';
         }

         if ($iposts){

        ?>
        <div id="view_Course_Offered" class="te-courses-offered selected_courses">
            <div class="container">
                <div class="text-center">
                    <h2 class="title">
                        Courses offered
                    </h2>
                </div>
                <div class="course-list-widget clearfix">
                    <div class="wrapAllCourse clearfix row">
                        <?php
                       $totalcount=0;
                       $kk=1;
			$navreturnarray=array();
			$key=0;
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
                        $scourse = $bcourse['select_course'];
                        $course_start_date = get_field('course_start_date', false, false, $bcourse['id']);


                        if ($course_inst==$pid && $scourse==0){
                            $totalcount++;
                            echo '<div style="display:none">';
                            echo $course_inst;
                            echo '</div>';
                        }

                        if (in_array($bcourse['id'], $iposts) && $kk<=3){

                             if ($course_ad=='Yes'){
                                    $mxclass = 'admclass';
                                }
                                else
                                {
                                    $mxclass = '';
                                }
			$list=$_GET['search']!=''?'Search Results':'Course Category';

                        $cl_startdate2 = get_field('course_start_date', $bcourse['id'], false, false);
                                //$date = new DateTime($cl_startdate);
                                $timevalue2 = strtotime($cl_startdate2);
                                $new_date2 = date('M Y', $timevalue2);
                                $termdata = get_term( $course_cat[0], 'course-categories' );
                                if(get_post_meta($bcourse['id'], 'admission_open', true) == 'Yes'){
                                  $mxclass = 'admclass';
                                }
                        ?>
                         <div id="<?php echo $bcourse['id'];?>" class="col-md-4 col-sm-6 col-xs-12 card-university <?php echo $class;?>">
                            <div class="col-courses-card">
                                <div class="courseCover <?php echo $mxclass;?>" style="background-image: url(<?php echo $course_img;?>);"></div>
                                <div class="wrapCard text-left">
                                    <div class="courseCard-detail">
                                        <div class="card">
                                            <h3><a href="<?php echo $course_link;?>" class="redir_btn-a" onclick="return redirectsinglepage('<?php echo $course_link;?>','<?php echo $list;?>','<?php echo $course_shortname;?>',<?php echo $bcourse['id'];?>,'<?php echo get_field('short_name', $course_inst);?>','<?php echo $termdata->name;?>','<?php echo $new_date2.' Batch';?>','<?php echo $key+1;?>' )" title="<?php echo $course_shortname;?>" style="cursor: pointer;" title="<?php echo $course_shortname;?>"><?php echo $course_shortname;?></a></h3>
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

                                        <?php
						$termdata = get_term( $course_cat[0], 'course-categories' );
                        $cl_startdate2 = get_field('course_start_date', $bcourse['id'], false, false);
                                //$date = new DateTime($cl_startdate);
                                $timevalue2 = strtotime($cl_startdate2);
                                $new_date2 = date('M Y', $timevalue2);
                        ?>


                                        <div class="course_period"><span><?php echo $new_date2;?></span> Batch</div>
                                        <div  class="course_period"><span><?php echo $course_duration;?></span></div>
                                        <div class="btn-te text-center"><a href="<?php echo $course_link;?>" class="redir_btn-a" onclick="return redirectsinglepage('<?php echo $course_link;?>','<?php echo $list;?>','<?php echo $course_shortname;?>',<?php echo $bcourse['id'];?>,'<?php echo get_field('short_name', $course_inst);?>','<?php echo $termdata->name;?>','<?php echo $new_date2.' Batch';?>','<?php echo $key+1;?>' )" title="<?php echo $course_shortname;?>" style="cursor: pointer;">View Detail</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php
			if($key<10){
				$navreturnarray[$bcourse['id']]['name']=$course_shortname;
				$navreturnarray[$bcourse['id']]['id']=$bcourse['id'];
				$navreturnarray[$bcourse['id']]['brand']=get_field('short_name', $course_inst);
                                $navreturnarray[$bcourse['id']]['category']=$termdata->name;
			 	$navreturnarray[$bcourse['id']]['variant']=$new_date2.' Batch';
				$navreturnarray[$bcourse['id']]['list']=$_GET['search']!=''?'Search Results':'Course Category';
				$navreturnarray[$bcourse['id']]['position']=$key+1;
			}
			       $key=$key+1;
                        $kk++;
                        }
                   // }
                }
                        ?>
                    </div>
                </div>
                <?php
                echo '<div id="inst_selected_courses" style="display:none">';
                                   echo $totalcount;
                                    echo '</div>';
                if ($totalcount>3) { ?>
                <div class="text-center redir_link clearfix mtop20">
                    <a href="<?php echo home_url();?>/browse-courses?id=te_<?php echo $pid;?>">View All</a>
                </div>
                <?php } ?>
            </div>
        </div>
        <?php }  ?>



         <?php if (!empty($faculty_array)) {?>
        <!-- ~~~~~~~~~~~~~ meet instructors ~~~~~~~~~~~~~ -->
        <div id="view_Meet_instructors" class="te-meet-instructors">
            <div class="container">
                <div class="text-center">
                    <h2 class="title">
                        <?php echo get_field('faculty_headline','option');?>
                    </h2>
                    <p><?php echo get_field('faculty_subheadline','option');?></p>
                </div>
                <div class="clearfix">
                    <div class="col-md-12 col-sm-12 col-xs-12 instructors-widget">

                        <?php
                        $ff=1;
                         $finst=1;
                         $faculty_arr = glbl_faculty_func();
                       foreach ($faculty_arr as &$bcourse) {
                            $inst = $bcourse['inst'];

                            if ($inst==$pid){

                                if ($ff<=4){
                               $faculty_image = get_featured_image($bcourse['id'], 'faculty');
                        ?>
                         <div id="<?php echo $bcourse['id'];?>" class="col-md-6 col-sm-6 col-xs-6 ind-col">
                                <div class="row">
                                    <div class="card-mid">
                                        <div class="col-md-4 col-sm-12 col-xs-12">
                                            <div class="rotate_img">
                                                <div class="anti_rotate_img" style="background-image: url(<?php echo $faculty_image;?>)"></div>
                                            </div>
                                            <!-- <img class="img-responsive" src="<?php echo $i_profile_image;?>"> -->
                                        </div>
                                        <div class="col-md-7 col-sm-12 col-xs-12 text-left">
                                            <div><?php echo $bcourse['designation'];?></div>
                                            <h3><a href="<?php echo $bcourse['link'];?>"><?php echo $bcourse['name'];?></a></h3>
                                             <?php if ($bcourse['excerpt']) {?>
                                            <p>
                                               <?php echo truncate($bcourse['excerpt'],100);?>
                                            </p>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        <?php
                            $ff++;
                        }
                    }
                    }
                        ?>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12 instructors-widget owl-carousel owl-theme mb-carousel">
                        <?php
                        $ff=1;
                        $faculty_arr = glbl_faculty_func();
                        foreach ($faculty_arr as &$bcourse) {
                            $inst = $bcourse['inst'];
                            if ($inst==$pid){

                                if ($ff<=4) {
                                $faculty_image = get_featured_image($bcourse['id'], 'faculty');
                        ?>
                         <div id="<?php echo $bcourse['id'];?>" class="col-md-6 col-sm-6 col-xs-6 ind-col">
                                <div class="row">
                                    <div class="card-mid">
                                        <div class="col-md-4 col-sm-12 col-xs-12">
                                            <img src="<?php echo $faculty_image;?>">
                                        </div>
                                        <div class="col-md-7 col-sm-12 col-xs-12">
                                            <div><?php echo $bcourse['designation'];?></div>
                                            <h3><a href="<?php echo $bcourse['link'];?>"><?php echo $bcourse['name'];?></a></h3>
                                            <?php if ($bcourse['excerpt']) {?>
                                            <p>
                                               <?php echo truncate($bcourse['excerpt'],100);?>
                                            </p>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        <?php
                        $ff++;
                    }
                }
                }
                        ?>
                    </div>
                </div>
            </div>
            <?php if ($ff>4) { ?>
            <div class="text-center redir_link clearfix">
                <a href="<?php echo home_url();?>/faculty?id=<?php echo $pid;?>">View All</a>
            </div>
            <?php } ?>
        </div>
        <?php } ?>

        <!-- ~~~~~~~~~~~~~ About XLRI ~~~~~~~~~~~~~ -->
        <div id="view_How_it_works" class="te-why-talent">
            <div class="clearfix">
                <div class="talent-wrapper clearfix">
                    <div class="col-md-6 col-sm-6 col-xs-12 right">
                        <div class="tab-images">
                            <div class="university_aside">
                                <img src="<?php echo get_field('institute_about_image');?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-md-offset-0 col-sm-6 col-sm-offset-0 col-xs-12 col-xs-offset-0 left">
                        <div id="talentdiv">
                        <h2 class="text-center"><?php echo get_field('about_headline');?></h2>
                        <?php echo get_field('about_info');?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ~~~~~~~~~~~~~ learners speak ~~~~~~~~~~~~~ -->
        <?php if (!empty($testimonial_array)) {?>
            <div id="view_Testimonials" class="speaker_fluid wow slideInUp te-learners te-meet-instructors">
                <div class="container">
                <div class="text-center">
                    <h2 class="title">
                      <?php echo get_field('testimonials_headline','option')?>
                    </h2>
                </div>
                    <div class="learner-spearkers">
                        <div class="learner-list owl-carousel">
                         <?php
                         $test_arr = glbl_testimonials_func();
                           foreach ($test_arr as &$test_list_value) {
                            $courseid = $test_list_value['course'];
                            $inst = $test_list_value['inst'];

                            if ($inst == $pid){
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
                        }
                                ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>


    </section>
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
<script type="text/javascript">
jQuery( document ).ready(function($) {
    $("#input_2_4 > option").each(function() {
        var pid = $('#pid').val();
            var value = this.value;
            $(this).hide();
             var instid = value.split('_');
            console.log(instid['0']);
             if (instid['1']==pid){
                $(this).show();
             }
    });
     jQuery(document).bind('gform_post_render', function(){
        if ($("#input_2_4")) {
         $("#input_2_4 > option").each(function() {
            var pid = $('#pid').val();
                var value = this.value;
                $(this).hide();
                 var instid = value.split('_');
                console.log(instid['0']);
                 if (instid['1']==pid){
                    $(this).show();
                 }
            });
        }
    });
});
</script>
