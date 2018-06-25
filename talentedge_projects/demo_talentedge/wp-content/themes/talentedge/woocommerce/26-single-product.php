<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @author      WooThemes
 * @package     WooCommerce/Templates
 * @version     1.6.4
 */
?>
<?php
/**
 * The template for displaying single product template.
 *
 * Template Name: Single Product Template
 *
 */

get_header(); ?>
<?php
    global $post;
    $postPar=$post->ID;
    $id = $post->ID;
    if($_GET['active']){
	$id=$batch_id=$_GET['active'];
    }else{

	$query_args = array(
	'post_type' => 'product',
	'posts_per_page' => 1,
    'post_status'    => 'publish',
    'meta_query' => array(
        'relation' => 'AND',
        array(
            'key' => 'product_parent',
            'value' => $id,
            'type' => '='
        ),
        array(
            'key' => 'admission_open',
            'value' => 'Yes',
            'type' => '='
        )
    )

	);
	$posts_array = get_posts( $query_args );
	if($posts_array && count($posts_array)>0){

		$id=$batch_id=$posts_array[0]->ID;

	} else{
		$batch_id=$id;
	}
     }
	$postBatch=$post=get_post($batch_id);

?>
<div style="display:none" id="postid">
<?php echo $batch_id;?>
<?php

echo  get_post_meta($batch_id, '_regular_price',true); ?>
</div>
<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/course-detail.css?v=2.1" rel="stylesheet" />
<style>
.woocommerce-Price-amount,
.previousbatchdiv,
.navigatBack {display:none;}
.emiSchedule .date{font-size: 12px;}
.certificate-view h3{
    padding:0px 0px 10px 0px;
}
.alumnis-widget h2{padding:0px 0px 0px 10px;}
.fclass2{padding:15px 0px 0px 0px !important;}
.fclass{padding:10px 0px 0px 0px !important;}
.font12{font-size: 12px;}
</style>
<div style="display:none">
<?php
$discount_array = get_discountvalue($batch_id);
print_r($discount_array);
echo $discount_array['newprice_inr'];
?>
</div>
<?php
$bannerbg='';
$bgcolor = '';
if (get_field('course_background_image')){
    $bimage = get_field('course_background_image');
    $bannerbg = "style='background-image: url('".$bimage."');'";
}
else{
    if (get_field('course_background_image','option')){
    $bimage = get_field('course_background_image','option');
     $bannerbg = "style='background-image: url('".$bimage."');'";
    }
}
if (get_field('course_background_color')){
    $bcolor = get_field('course_background_color');
     $bannercolor = "style='background: ".$bcolor.";background: -webkit-linear-gradient(top, #".$bcolor." 0%, ".$bcolor." 100%);background: linear-gradient(to bottom, ".$bcolor." 0%, ".$bcolor." 100%)'";
}
else{
     $bcolor = get_field('course_background_color', 'option');
     $bannercolor = "style='background: #".$bcolor.";background: -webkit-linear-gradient(top, ".$bcolor." 0%, ".$bcolor." 100%);background: linear-gradient(to bottom, ".$bcolor." 0%, ".$bcolor." 100%)'";
}
$coursearray = $courses_arr2[$post->ID];
$coursearrayBatch = $courses_arr2[$batch_id];
/*
$testimonial_array = array();
$t_array = get_field('testimonials', $id);
 foreach ($t_array as &$t_array_val) {
    array_push($testimonial_array, $t_array_val->ID);
}
  $alumni_array = array();
$a_array = get_field('alumni', $id);
 foreach ($a_array as &$a_array_val) {
    array_push($alumni_array, $a_array_val->ID);
}
*/
$brouchure = $coursearray['brouchure'];
?>
<div style="display:none" id="singlealumni">
<?php
echo $post->ID;
$categories_arr_list2 = unique_multidim_array($courses_arr2,'id');
echo '<br/>';
print_r($categories_arr_list2);?>
</div>
<?php
$userId = get_current_user_id();
$userData = get_userdata($userId);
$customer_email = $current_user->email;
$c_shortname = get_field('course_short_name',$post->ID);
$batch_name = get_field('batch_name',$batch_id);
$hideForm = get_field('show_query_in_detail_page',$post->ID);

?>
<input type="hidden" class="brouchureurl" name="brouchure" value="<?php echo $brouchure;?>"/>
 <!-- ~~~~~~~~~~ main wrapper ~~~~~~~~~~ -->
    <section id="post-<?php echo $batch_id;?>" class="main-wrapper">
        <div class="te-banner-top" <?php echo $bannercolor;?> <?php echo $bannerbg;?>>
            <div class="container">
                <div class="left-te col-md-8 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="banner-components">
                            <!-- <div class="exclisive">
                                <img src="../images/exclisive-badge-white.png" alt="">
                            </div> -->
                            <ul class="breadcrumbs">
                                <?php echo $coursearray['tagline'];?>
                            </ul>
                            <h1><?php echo $coursearray['name'];?></h1>
                            <?php $sp_inst = $coursearray['inst']['id'];?>

                             <a class="main_root" href="<?php echo get_permalink($sp_inst);?>">
                             <div class="institute-widget">
                                <picture><img src="<?php echo get_field('logo', $sp_inst)?>"/></picture>
                                <div class="instituteName">
                                    <div class="middleAlign">
                                        <h2><?php echo $coursearray['inst']['short_name'];?></h1>
                                    </div>
                                </div>
                            </div>
                            </a>
                            <?php if ($coursearray['partner']) {
                                $partner = $coursearray['partner'];
                                ?>
                            <a class="main_root" href="<?php echo get_permalink($partner);?>"><div class="institute-widget">
                                <picture><img src="<?php echo get_field('logo', $partner)?>"/></picture>
                                <div class="instituteName">
                                    <div class="middleAlign">
                                        <h1><?php echo get_the_title($partner)?></h1>
                                    </div>
                                </div>
                            </div>
                              </a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="right-te col-md-4 col-sm-4 xs-hidden">

                    <!-- <h3 class="navigatBack"><a href="#">View Previous Batch</a></h3> -->
                    <div class="previousbatchdiv">
                    <?php
                        $lcount=0;
                        $datearray = array();
                        $currentc_startdate = get_field('course_start_date', $batch_id, false, false);
                        $CourseDate = date("M Y", strtotime($currentc_startdate));
                        $CourseDate = date_create($CourseDate);

                        foreach ($courses_arr2 as &$course) {
                            $selectcourse = $course['select_course'];

                            if ($selectcourse == $batch_id){
                                $cid = $course['id'];
                                $p_startdate = get_field('course_start_date', $cid, false, false);
                                $p_startdate1 = date("M Y", strtotime($p_startdate));
                                $p_startdate2 = date_create($p_startdate1);
                                $diff =  date_diff($CourseDate, $p_startdate2);
                                $datearray[] = array('diff'=>$diff->days, 'cdate'=> $p_startdate1, 'cid'=>$cid);
                                sort($datearray);
                            }
                        }

                    echo '<div class="dropdown previousbatch">
                            <button class="btn dropdown-toggle" type="button" data-toggle="dropdown">Select Previous Batch <span class="caret"></span></button>
                            <ul class="dropdown-menu">';

                    foreach ($datearray as $key => $value) {
                        $cLink = get_permalink($postPar);
                        if($lcount < 2 ){
                            echo '<li><a href="'.$cLink.'?active='.$value['cid'].'">'.$value['cdate'].'</a></li>';
                        }

                        $lcount++;
                    }

                    echo '</ul></div>';
                    ?>
                    </div>
                    <?php  if ($_GET["active"]!=''){ ?>
                    <h3 class="activebatch"><a href="<?php echo get_permalink($postPar);?>">View Active Batch</a></h3>
                    <?php } ?>



                    <div class="batch-Card">
                        <?php $exclusive =  $coursearrayBatch['exclusive'];
                        if ($exclusive== 'Yes'){
                        ?>
                        <div class="exclusive">
                            <img src="<?php echo get_field('exclusive_image','option')?>" alt="">
                        </div>
                        <?php } ?>
                        <h4>Apply Before</h4>
                        <?php
                        $cl_startdate2 = get_field('course_start_date', $batch_id, false, false);
                                //$date = new DateTime($cl_startdate);
                                $timevalue2 = strtotime($cl_startdate2);
                                $new_date2 = date('M Y', $timevalue2);
                                $new_date3 = date('d/m/Y', $timevalue2);
                        ?>
                        <?php  $courselastdate = get_course_lastdate($batch_id); ?>

                        <?php if ($coursearrayBatch['admission']=='No') {?>

                         <h2 class="no"><?php echo  $coursearrayBatch['lastdate'];?></h2>
                        <?php } else{ ?>
                        <h2><?php echo  $courselastdate;?> </h2>
                        <?php } ?>
                        <h5 id="<?php echo $batch_id;?>">Batch - <?php echo  $new_date2;?></h5>

                        <div class="apply_btn" id="<?php echo $coursearrayBatch['select_course'];?>">

                       <?php




                      if ($coursearrayBatch['select_course']!=0 || $coursearrayBatch['admission']=='No'){
                            if (wc_customer_bought_product($customer_email, $userId,$coursearrayBatch)) { ?>
                             <p class="ubtntxt">You are already enrolled</p>
                             <div class="enrollCourse"><a href="<?php echo home_url();?>/edit-profile#myCourses">View Your Courses</div>
                            <?php } else { ?>
                            <div class="enrollCourse"><a href="#view_Course_Overview">Notify Me</a></div>
                            <?php } ?>
                        <?php } else {
                            if (wc_customer_bought_product($customer_email, $userId,$coursearrayBatch)) { ?>
                             <p class="ubtntxt">You are already enrolled</p>
                             <div class="enrollCourse"><a href="<?php echo home_url();?>/edit-profile#myCourses">View Your Courses</div>
                            <?php } else { ?>
                            <div class="enrollCourse">
                            <?php echo do_shortcode('[add_to_cart id="'.$batch_id.'"]');?>
                            </div>
                            <?php } ?>
                        <?php } ?>


                        </div>
                         <?php if ($brouchure) {?>
                        <div class="downloadBrocture">

                        <?php if (is_user_logged_in()) : ?>
                            <a href="<?php echo $brouchure; ?>"><i class="fa icon-download"></i>Download Brochure</a>
                        <?php else: ?>
                            <a data-remodal-target="brochure_download"><i class="fa icon-download"></i>Download Brochure</a>
                        <?php endif; ?>
                        </div>
                        <?php } ?>
                        <div class="coursePeriod">
                            <div class="months pad-bottom-10">
                                <b>Duration</b>
                            <?php $duration_months = extract_numbers( $coursearrayBatch['duration']);
                                ?>
                                <span class="monthsOfCourse"><?php echo $duration_months[0];?></span>
                                <p>Months</p>
                            </div>
                            <div class="startDate pad-bottom-10">
                                <i class="fa icon-calendar"></i>
                                <?php $cl_startdate = get_field('course_start_date', false, false);?>
                                <?php $date = new DateTime($cl_startdate);?>

                                <span>Start - <?php echo $date->format('jS M y'); ?></span>
                            </div>
                            <div class="timePeriod pad-bottom-10">
                                <div>
                                    <i class="fa icon-clock"></i>
                                    <span><?php echo get_field('schedule_of_classes')?></span>
                                </div>
                            </div>
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
                            <li><a href="#view_Course_Overview">Course Overview</a></li>
                            <?php  if( get_field('number_stats') || get_field('text_stats') ){?>
                            <li><a href="#to_Why_Talentedge"><?php echo get_field('why_talentedge_headline');?></a></li>
                            <?php } ?>
                            <?php if ( get_field('how_it_works_content')) {
                                $hline = get_field('how_it_works_headline');
                            ?>
                            <li><a href="#view_How_it_works"><?php echo $hline?></a></li>
                            <?php } ?>

                            <?php  if( get_field('institute_headline')) {?>
                                 <li><a href="#view_Institute"><?php echo get_field('institute_headline')?></a></li>
                            <?php } ?>

                            <?php  if( get_field('what_youll_learn_headline')) { ?>
                                 <li><a href="#view_Syllabus"><?php echo get_field('what_youll_learn_headline');?></a></li>
                            <?php } ?>

                             <?php  if( get_field('fee_emi_headline')) {?>
                                <li><a href="#view_Fee_EMI">
                                <?php echo get_field('fee_emi_headline');?></a></li>
                            <?php } ?>


                            <!--<li><a href="#view_Institute">Institute</a></li>-->
                            <!--<li><a href="#view_Syllabus">Syllabus</a></li>-->
                           <!-- <li><a href="#view_Fee_EMI">Fee & EMI</a></li>-->
                            <li style="display: none !important;"><a href="#dummy">Dummy</a></li>
                        </ul>

                     <?php


					if(!$hideForm){

                      if ($coursearray['select_course']!=0 || $coursearray['admission']=='No'){
                            if (wc_customer_bought_product($customer_email, $userId,$batch_id)) { ?>
                             <div class="enrollCourse"><a href="<?php echo home_url();?>/edit-profile#myCourses">View Your Courses</div>
                            <?php } else { ?>
                           <div class="enrollCourse"><a href="#view_Course_Overview">Notify Me</a></div>
                            <?php } ?>
                        <?php } else {
                            if (wc_customer_bought_product($customer_email, $userId,$batch_id)) { ?>
                             <div class="enrollCourse"><a href="<?php echo home_url();?>/edit-profile#myCourses">View Your Courses</div>
                            <?php } else { ?>
                            <div class="enrollCourse">
                            <?php echo do_shortcode('[add_to_cart id="'.$batch_id.'"]');?>
                            </div>
                            <?php } ?>
                        <?php } ?>
                     <?php } ?>

                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix twoColumn-layout">
            <div class="container">
                <div class="left-te col-md-8 col-sm-12 col-xs-12">
                    <div class="row">
                        <div id="view_Course_Overview">
                            <div class="base_detail">
                                <h2><?php echo get_field('course_headline');?></h2>
                                <?php echo get_field('course_description');?>
                            </div>
                            <div class="flex-row">
                                <div class="icon_grids row">
                                    <?php
                                     if( have_rows('core_benefits') ):
                                        while ( have_rows('core_benefits') ) : the_row();
                                        $ww=1;
                                        ?>
                                         <div class="twoColumn-grid col-md-6 col-sm-6 col-xs-6">
                                            <div class="left"><i class="fa <?php echo get_sub_field('icon');?>"></i></div>
                                            <div class="right">
                                                <h3><?php echo get_sub_field('headline');?></h3>
                                                <p><?php echo get_sub_field('subheadline');?></p>
                                            </div>
                                        </div>

                                        <?php
                                        endwhile;
                                      endif;
                                    ?>
                                </div>
                            </div>

                            <!-- Show rard side card for mobile -->
                            <div class="coverCard">
                                <div class="batch-Card cardSticky">
                                    <!-- <div class="exclusive">
                                        <img src="../images/exclusive-icon.png" alt="">
                                    </div> -->
                                    <div class="coursePeriod">
                                        <div class="months">
                                            <b>Duration</b>
                                            <span class="monthsOfCourse"><?php echo $duration_months[0];?></span>
                                            <p>Months</p>
                                        </div>
                                        <div class="startDate">
                                            <i class="fa icon-calendar"></i>
                                            <span>Start - <?php echo $date->format('jS M y'); ?></span>
                                        </div>
                                        <div class="timePeriod">
                                            <i class="fa icon-clock"></i>
                                            <div>
                                                <span><?php echo get_field('schedule_of_classes')?></span>
                                            </div>
                                        </div>
                                        <?php if ($brouchure) {?>
                                        <div class="downloadBrocture">
                                        <?php if (is_user_logged_in()) : ?>
                                            <a href="<?php echo $brouchure; ?>"><i class="fa icon-download"></i>Download Brochure</a>
                                        <?php else: ?>
                                            <a data-remodal-target="brochure_download"><i class="fa icon-download"></i>Download Brochure</a>
                                        <?php endif; ?>
                                        </div>
                                        <?php } ?>
                                    </div>
                                    <div class="apply_btn" style="margin-bottom: 10px;">
                                       <!--  <?php if (is_user_logged_in() )  { ?>

                                            <?php if ($user_brought) {?>
                                             <div class="enrollCourse">
                                            <?php echo do_shortcode('[add_to_cart id="'.$batch_id.'"]');?>
                                                </div>
                                            <?php } else { ?>
                                                <div class="enrollCourse">
                                            <?php echo do_shortcode('[add_to_cart id="'.$batch_id.'"]');?>
                                                </div>
                                            <?php } ?>

                                            <?php } else { ?>
                                            <div class="enrollCourse"> <a href="#loginpopup">Enrol Now</a></div>
                                            <?php } ?> -->
                                          <?php
                                            if ($coursearray['select_course']!=0 || $coursearray['admission']=='No'){
                                                if (wc_customer_bought_product($customer_email, $userId,$batch_id)) { ?>
                                                 <p class="ubtntxt">You are already enrolled</p>
                                                 <div class="enrollCourse"><a href="<?php echo home_url();?>/edit-profile#myCourses">View Your Courses</div>
                                                <?php } else { ?>
                                                <div class="enrollCourse"><a href="#view_Course_Overview">Notify Me</a></div>
                                                <?php } ?>
                                            <?php } else {
                                                if (wc_customer_bought_product($customer_email, $userId,$batch_id)) { ?>
                                                 <p class="ubtntxt">You are already enrolled</p>
                                                 <div class="enrollCourse"><a href="<?php echo home_url();?>/edit-profile#myCourses">View Your Courses</div>
                                                <?php } else { ?>
                                                <div class="enrollCourse">
                                                <?php echo do_shortcode('[add_to_cart id="'.$batch_id.'"]');?>
                                                </div>
                                                <?php } ?>
                                            <?php } ?>
                                    </div>
                                 <?php if ($coursearray['select_course']!=0 || $coursearray['admission']=='No'){ ?>

                                    <div class="guidForm">
                                        <?php
                                        echo do_shortcode('[gravityform id=10 title=false description=false ajax=true tabindex=39]');
                                        ?>
                                    </div>
                                <?php }else{ ?>
                                    <div class="guidForm">
                                        <?php
                                        echo do_shortcode('[gravityform id=10 title=false description=false ajax=true tabindex=30]');
                                        ?>
                                    </div>
                                <?php } ?>
                                </div>
                            </div>
                            <!-- end card for mobile -->

                            <div class="flex-row">
                                <h3 class="head-title"><?php echo get_field('who_should_attend_healdine');?></h3>
                                <div class="te-eligibility">
                                    <ul class="grid-annoying">
                                        <?php
                                         if( have_rows('who_can_participate') ):
                                            while ( have_rows('who_can_participate') ) : the_row();
                                            $ww=1;
                                            ?>
                                             <li>
                                                <a href="#" class="blue-overlay" style="background-color: #204188;"></a>
                                                <a class="show" href="#">
                                                    <span style="background-image: url(<?php echo get_sub_field('image');?>);"></span>
                                                    <div class="cnt-rotate">
                                                        <div class="change-angle">
                                                            <h3><?php echo get_sub_field('title');?></h3>
                                                        </div>
                                                        <div class="discription">
                                                            <p><?php echo get_sub_field('description');?></p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>

                                            <?php
                                            endwhile;
                                          endif;
                                        ?>
                                    </ul>
                                    <div class="row clearfix eligibil-grids">
                                        <div class="eligibility-widget">
                                            <h3 class="head-title col-md-12"><?php echo get_field('eligibility_headline');?></h3>
                                        </div>
                                        <?php if (get_field('education')) {?>
                                        <div class="eligibil-left col-md-12 col-sm-12 col-xs-12">
                                            <h6>Education</h6>
                                            <h5><?php echo get_field('eligibility_subheadline');?></h5>
                                           <div class="e_content"><?php echo get_field('education');?></div>
                                        </div>
                                        <?php } ?>
                                        <?php if (get_field('work_experience')) {?>
                                        <div class="eligibil-left col-md-12 col-sm-12 col-xs-12">
                                            <h6><?php echo get_field('work_experience_headline');?></h6>
                                            <div class="e_content"><?php echo get_field('work_experience');?></div>
                                        </div>
                                        <?php } ?>

                                    </div>
                                </div>
                            </div>
                            <div class="flex-row faculty-video-poster clearfix">
                            <?php
                            $posts = get_field('faculty');
                            if( $posts ):
                                $feaculty_headline = get_field('feaculty_headline');
                                ?>
                            <h3 class="head-title"><?php echo $feaculty_headline;?></h3>
                                <div class="row">
                            <?php
                            foreach( $posts as $post):
                                setup_postdata($post);
                            $fid = $post->ID;
                            $vlink = get_field('video_link', $fid);
                            $designation = get_field('designation', $fid);
                            $name = get_the_title($fid);
                            $select_institute = get_field('select_institute', $fid);
                            $excerpt = get_field('excerpt', $fid);
                            $instname = get_field('short_name', $select_institute);
                            $faculty_image = get_featured_image($fid, 'faculty');
                            ?>

                                    <div class="videoGrid col-md-12 col-sm-12 col-xs-12 col-xss-12">
                                        <div class="position_rel" style="background-image: url(<?php echo $faculty_image;?>);">

                                            <?php //if ($vlink) {?>
                                            <!-- <span class="overlayVideo"></span>
                                            <a href="<?php echo $vlink;?>?rel=0&amp;controls=0&amp;autoplay=1&amp;loop=1" class="playVideo" title="Play Video">
                                                <i class="fa icon-play_button"></i>
                                            </a> -->
                                            <?php //} else {?>
                                             <!-- <img src="<?php //echo $faculty_image;?>" class="img-responsive"> -->
                                            <?php //} ?>
                                        </div>
                                        <div class="left">
                                            <a href="<?php echo get_permalink($fid); ?>" target="_blank"><h3><?php echo $name;?></h3></a>
                                            <div class="faculty_domain"><?php echo $designation;?></div>
                                            <div class="faculty_from"><?php echo $instname;?></div>
                                            <p><?php echo $excerpt;?></p>
                                        </div>
                                    </div>
                                <?php
                                endforeach;

                                wp_reset_postdata();
                                 $courseVideo = get_field('faculty_course_video');

                                if($courseVideo){
                                ?>
                                <div data="<?php echo get_the_ID(); ?>" style="padding-left: 13px;" class="f_video">
                                    <iframe width="560" height="345"
                                        src="<?php echo $courseVideo; ?>">
                                    </iframe>
                                 </div>
                                <?php
                                } ?>

                                <?php
                                    if( have_rows('other_faculties') ): ?>
                                        <div class="otherfaculty_repeater col-md-12 col-sm-12 col-xs-12">
                                            <h3 class="head-title"><?php the_field('other_faculty_heading'); ?></h3>
                                        <?php while ( have_rows('other_faculties') ) : the_row();?>
                                            <div class="otherfaculty_list left">
                                                <h5><?php the_sub_field('other_faculty_title');?></h5>
                                                <h6><?php the_sub_field('other_faculty_designation');?></h6>
                                                <p><?php the_sub_field('other_faculty_description');?></p>
                                            </div>
                                        <?php endwhile; ?>
                                        </div>
                                    <?php endif; ?>


                                 </div>
                                <?php
                                endif;
                                ?>
                            </div>
                            <div class="certificate-view row flex-row">

                                <?php
                                     if( have_rows('certificates') ){

                                        ?>

                                     <div class="left col-md-6 col-sm-6 col-xs-12">
                                        <h3 class="head-title col-md-12">
                                        <?php echo get_field('certificate_headline');?>

                                        </h3>
                                        <?php echo get_field('certificates_content');?>
                                    </div>
                                    <div class="right col-md-6 col-sm-6 col-xs-12 pull-right">
                                    <div class="headCertificate"><a>View Sample Certificate</a></div>
                                             <aside class="list_certificates">
                                    <?php

                                        $cert=1;
                                        while ( have_rows('certificates') ) : the_row();
                                         $c_img = get_sub_field('certificate');
                                        ?>

                                           <a href="<?php echo $c_img['sizes']['large'];?>" data-effect="mfp-zoom-in" class="image-popups"><img class="img-responsive" src="<?php echo $c_img['sizes']['thumbnail'];?>"></a>

                                        <?php
                                            $cert++;
                                        endwhile;?>
                                        </aside>
                                        </div>
                                        <?php
                                      }
                                      else{
                                        ?>
                                        <div class="left col-md-12 col-sm-12 col-xs-12">
                                        <h3 class="head-title col-md-12">
                                        <?php echo get_field('certificate_headline');?>

                                        </h3>
                                        <?php echo get_field('certificates_content');?>
                                    </div>
                                        <?php
                                      }
                                    ?>
                            </div>
                        </div>
                        <div id="to_Why_Talentedge">
                            <div class="flex-row">
                            <?php  if( have_rows('number_stats') ){?>
                                <h2 class="head-title"><?php echo get_field('why_talentedge_headline');?></h2>
                                <?php } ?>
                                <div class="row why_talent_detail">
                                    <div class="left col-md-12 col-sm-12 col-xs-12">
                                         <?php
                                         if( have_rows('number_stats') ):?>

                                         <ul class="range_numaric">
                                         <?php
                                            while ( have_rows('number_stats') ) : the_row();
                                            ?>
                                             <li>
                                                <div class="range_value">
                                                <div>
                                                    <span data-ani-value="<?php echo get_sub_field('stats');?>"><?php echo get_sub_field('stats');?>
                                                    </span>
                                                    <?php echo get_sub_field('stats_symbol');?>
                                                </div>
                                                </div>
                                                <span class="rangeOf"><?php echo get_sub_field('text');?></span>
                                            </li>

                                            <?php
                                            endwhile;?>
                                            </ul>
                                            <?php
                                          endif;
                                        ?>
                                    </div>
                                    <div class="right col-md-12 col-sm-12 col-xs-12">
                                        <?php
                                         if( have_rows('text_stats') ):?>
                                         <ul>
                                         <?php
                                            while ( have_rows('text_stats') ) : the_row();
                                            ?>
                                              <li class="col-md-4 col-sm-4 col-xs-12">
                                                <div><i class="fa <?php echo get_sub_field('icon');?>"></i></div>
                                                <h2><?php echo get_sub_field('headline');?></h2>
                                                <p><?php echo get_sub_field('description');?></p>
                                            </li>

                                            <?php
                                            endwhile;?>
                                            </ul>
                                            <?php
                                          endif;
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <?php if(!$hideForm){ ?>
                <div class="right-te col-md-4 col-sm-4 xs-hidden">
                    <div class="coverCard">
                        <div class="batch-Card cardSticky">
                            <div class="coursePeriod">
                                <div class="months pad-bottom-10">
                                    <b>Duration</b>
                                    <span class="monthsOfCourse"><?php echo $duration_months[0];?></span>
                                    <p>Months</p>
                                </div>
                                <div class="startDate pad-bottom-10">
                                    <i class="fa icon-calendar"></i>
                                    <span>Start - <?php echo $date->format('jS M y'); ?></span>
                                </div>
                                <div class="timePeriod pad-bottom-10">
                                    <i class="fa icon-clock"></i>
                                    <div>
                                       <?php echo get_field('schedule_of_classes')?>
                                    </div>
                                </div>
                                <?php if ($brouchure) { ?>
                                <div class="downloadBrocture">
                                <?php if (is_user_logged_in()) : ?>
                                    <a href="<?php echo $brouchure; ?>"><i class="fa icon-download"></i>Download Brochure</a>
                                <?php else: ?>
                                    <a data-remodal-target="brochure_download"><i class="fa icon-download"></i>Download Brochure</a>
                                <?php endif; ?>
                                </div>
                                <?php } ?>
                            </div>
                         <?php if ($coursearray['select_course']!=0 || $coursearray['admission']=='No'){ ?>
                            <div class="guidForm">
                               <?php
                                echo do_shortcode('[gravityform id=18 title=false description=false ajax=true tabindex=49]');
                                ?>
                                <!-- <div class="referFriend text-center">Refer a Friend</div> -->
                            </div>
                        <?php } else { ?>

                            <div class="guidForm">
                               <?php
                                echo do_shortcode('[gravityform id=5 title=false description=false ajax=true tabindex=45]');
                                ?>
                                <!-- <div class="referFriend text-center">Refer a Friend</div> -->
                            </div>
                        <?php } ?>
                        </div>
                    </div>
                </div>
           <?php } ?>


            </div>

           <?php
             $testimonials = get_field('testimonials',$id);
             echo '<div style="display:none">';
             print_r($testimonials);
             echo '</div>';

            if ($testimonials) {
            ?>
            <div class="alumniBg">
                <div class="container">
                    <div class="left-te col-md-8 col-sm-12 col-xs-12">
                        <div class="flex-row alumnis-widget">
                            <div class="row">
                                <div class="learner-spearkers">
                                    <?php if (get_field('testimonials_headline')) { ?>
                                        <h2 class="alumnihead"><?php echo get_field('testimonials_headline');?></h2>
                                        <?php } ?>

                                    <div class="col-md-12 col-sm-12 col-xs-12">

                                        <div class="learner-list owl-carousel">

                                        <?php
                                       // $testimonials = get_field('testimonials');
                          foreach ($test_arr as &$ex_a) {

                             if (in_array($ex_a['id'],$testimonials)) {

                            $faculty_image = get_featured_image($ex_a['id'], 'faculty');
                            $l_batch = get_field('select_batch', $ex_a['id']);

                             $ldate = get_field('course_start_date', $l_batch, false, false);
                                //$date = new DateTime($cl_startdate);
                            $ldatevalue = strtotime($ldate);
                            $l_date = date('M Y', $ldatevalue);
                            $video_link = get_field('video_link', $ex_a['id']);
                            $video_image = get_field('video_image', $ex_a['id']);

                            if($video_image == ''){
                             $dimg = get_field('default_video_image', 'option');
                            }
                            else{
                                $dimg = $video_image;
                            }


                            ?>
                        <div class="item">
                            <?php if ($video_link) { ?>
                                <div class="col-md-9 col-sm-12 col-xs-12 videoItem quotes">
                                    <div class="videoTestimonial cover_full col-md-6 col-md-offset-4" style="background-image: url(<?php echo $dimg;?>);">
                                        <span class="overlayVideo"></span>
                                        <span class="videoPlay"><a class="playVideo fa icon-play_button" href="<?php echo $video_link;?>?rel=0&controls=0&autoplay=1&loop=1"></a></span>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-12 pull-right">
                                    <div class="speaker_avator">
                                        <div class="cover_avator">
                                        <img class="img-responsive" src="<?php echo $faculty_image;?>" />
                                        </div>
                                        <h4><?php echo $ex_a['name'];?></h4>
                                        <?php if($ex_a['designation'] != '') {?>
                                            <h5><?php echo $ex_a['designation'];?>, <?php echo $ex_a['company'];?></h5>
                                        <?php } ?>
                                        <?php if ($l_date) {?>
                                        <h5><?php echo $l_date;?> Batch</h5>
                                        <?php } ?>
                                    </div>
                                </div>
                                <?php } else {?>
                                <div class="col-md-9 col-sm-9 col-xs-12 text-left">

                                <p><?php echo $ex_a['testimonial'];?></p>

                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-12 pull-right">
                                    <div class="speaker_avator">
                                        <div class="cover_avator" >
                                            <img class="img-responsive" src="<?php echo $faculty_image;?>" />
                                        </div>
                                        <h4><?php echo $ex_a['name'];?></h4>
                                         <?php if($ex_a['designation'] != '') {?>
                                            <h5><?php echo $ex_a['designation'];?>, <?php echo $ex_a['company'];?></h5>
                                        <?php } ?>
                                        <?php if ($l_date) {?>
                                        <h5><?php echo $l_date;?> Batch</h5>
                                        <?php } ?>
                                    </div>
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


                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
             <?php
            $aliumni_block = get_field('alumni');
            if ($aliumni_block) {?>
             <div class="alumniBg">
                <div class="container">
                    <div class="left-te col-md-8 col-sm-12 col-xs-12">
                        <div class="flex-row alumnis-widget">
                            <div class="row">
                             <div class="alumnidiv">
                         <?php if (get_field('alumni_headline')) { ?>
                                        <h2 class="alumnihead"><?php echo get_field('alumni_headline');?></h2>
                                        <?php } ?>
                            <div class="clearfix">
                                <div class="alumnis-list owl-carousel">
                        <?php
                            $kp=0;
                            $alumni_arr = glbl_alumni_func();
                            foreach ($alumni_arr as &$alumni_list_value) {

                             if (in_array($alumni_list_value['id'],$aliumni_block)) {

                        ?>
                        <?php


                    $faculty_image = get_featured_image($alumni_list_value['id'], 'faculty');

                            ?>

                            <div class="item">
                                <div class="alumni_avator">
                                    <img src="<?php echo $faculty_image;?>"/>
                                </div>
                                <div class="detailAlumni">
                                <h3><?php echo $alumni_list_value['name'];?></h3>
                                <h5><?php echo  $alumni_list_value['designation'];?></h5>
                                <h5><?php echo  $alumni_list_value['company'];?></h5>

                                </div>
                            </div>
                            <?php
                            $kp++;
                                }
                            }
                                ?>
                               </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            </div>
            <?php } ?>
            <div class="container">
                <div class="left-te col-md-8 col-sm-12 col-xs-12">
                    <?php if ( get_field('how_it_works_content')) {?>
                    <div id="view_How_it_works">
                        <div class="row">

                             <?php if (get_field('how_it_works_headline')) { ?>
                            <h2 class="head-title"><?php echo get_field('how_it_works_headline');?></h2>
                            <?php } ?>
                            <div class="flex-row how_works">
                                <?php echo get_field('how_it_works_content');?>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <?php
            $view_inst_id =  $coursearray['inst']['id'];

            $i_bg = $coursearray['inst']['bg'];;
            ?>
            <div id="view_Institute" class="institute-fluid" style="background-image: url('<?php echo $i_bg;?>');">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-sm-12 col-xs-12 institute_left">
                            <div class="clearfix">
                                <h2><?php echo get_field('institute_headline')?></h2>
                                <div class="log_institute">
                                    <a href="<?php echo $coursearray['inst']['link']?>"><img class="img-responsive" src="<?php echo $coursearray['inst']['logo']?>"></a>
                                </div>
                            </div>
                            <div class="shortNotice_institute clearfix">
                                <h4>
                                <?php echo get_field('about_headline', $view_inst_id);?></h4>
                                <?php echo get_field('about_info', $view_inst_id);?>

                                <?php
                                         if( have_rows('stats', $view_inst_id) ):?>
                                         <ul class="range_numaric">
                                         <?php
                                            while ( have_rows('stats', $view_inst_id) ) : the_row();
                                            ?>
                                              <li>
                                                <div class="range_value">
                                                    <div><span data-ani-value="<?php echo get_sub_field('stats');?>">0</span><?php echo get_sub_field('stats_symbol');?></div>
                                                </div>
                                                <span class="rangeOf"><?php echo get_sub_field('text');?></span>
                                            </li>

                                            <?php
                                            endwhile;?>
                                            </ul>
                                            <?php
                                          endif;
                                        ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="te-emi-component">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-sm-12 col-xs-12 fee_emi">

                                        <?php
                                        $s=1;
                                         if( have_rows('syllabus') ):?>
                                <div id="view_Syllabus" class="clearfix">
                                <h2><?php echo get_field('what_youll_learn_headline');?></h2>
                                <div class="syntax-list">
                                    <div class="panel-group" id="accordion">
                                         <?php
                                            while ( have_rows('syllabus') ) : the_row();
                                            if ($s == 1){
                                            ?>
                                              <div class="panel">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $s;?>" aria-expanded="true"><?php echo get_sub_field('headline');?></a>
                                                    </h4>
                                                    </div>
                                                    <div id="collapse<?php echo $s;?>" class="panel-collapse collapse in">
                                                        <div class="panel-body">
                                                            <?php echo get_sub_field('description');?>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } else { ?>
                                            <div class="panel">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $s;?>"><?php echo get_sub_field('headline');?></a>
                                                    </h4>
                                                    </div>
                                                    <div id="collapse<?php echo $s;?>" class="panel-collapse collapse">
                                                        <div class="panel-body">
                                                            <?php echo get_sub_field('description');?>
                                                        </div>
                                                    </div>
                                                </div>
                                             <?php } ?>
                                            <?php
                                            $s++; endwhile;?>
                                               </div>
                                </div>
                            </div>
                                            <?php
                                          endif;
                                        ?>

                            <div id="view_Fee_EMI" class="clearfix">
                                <h2><?php echo get_field('fee_emi_headline');?></h2>
                                <div class="syntax-list">
                                    <div class="panel-group" id="feeandEmi">
                                        <div class="panel">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                              <a data-toggle="collapse" data-parent="#feeandEmi" href="#feeandEmi1" aria-expanded="true">Program Fee</a>
                                            </h4>
                                            </div>
                                            <div id="feeandEmi1" class="panel-collapse collapse in">
                                                <div class="panel-body">
                                                    <div class="feeStructure">
                                                        <table class="table table-responsive tableFee">
                                                            <tbody>
                                                                <?php
                                                                $i_price = get_post_meta($batch_id, '_regular_price',true);
                                                                $i_prices = get_post_meta($batch_id, '_regular_price',true);
                                                                if ($i_price){
                                                                ?>
                                                                <tr data="<?php echo  $i_prices; ?>">
                                                                    <td>For Indian Residents </td>

                                                                    <td align="right">
                                                                <?php if ($discount_array['newprice_inr']) { ?>
                                                                <div class="tprice">
                                                                     <h4 class="text-strike">Rs.<?php echo number_format($i_price);?>+ GST*</h4>
                                                                     <h4><?php echo $discount_array['discount_title'];?> Price:Rs. <?php echo number_format($discount_array['newprice_inr']);?>+ GST*</h4>
                                                                </div>
                                                                <?php } else {?>

                                                               <h4>Rs. <?php echo number_format($i_price);?>+ GST*</h4>
                                                                <?php } ?>


                                                                <?php

                                                                if ($new_date2){
                                                        ?>
                                                         <?php if ($coursearrayBatch['admission']=='No') {
                                                             $courselastdate =   $coursearrayBatch['lastdate'];
                                                        } ?>

                                                    <div class="date font12"><span>Payment Deadline: </span><?php echo $courselastdate;?>                                                            </div>
                                <?php } ?>
                                                                </td>
                                                                </tr>
                                                                <?php } ?>
                <?php $usd_price = get_post_meta($batch_id, '_outside-india_regular_price',true);
            if ($usd_price){
            ?>
                                                                <tr>

                                                                    <td>For International Students</td>
                    <td>
                    <?php if ($discount_array['newprice_usd']) { ?>
                        <div class="tprice">
                             <h4 class="text-strike">USD <?php echo $usd_price;?></h4>
                             <h4><?php echo $discount_array['discount_title'];?> Price: USD: <?php echo $discount_array['newprice_usd'];?></h4>
                        </div>
                        <?php } else {?>

                       <h4>USD: <?php echo $usd_price;?></h4>
                        <?php } ?>

                    <?php

                                if ($new_date2){
                        ?>

                    <div class="date font12"><span>Payment Deadline: </span><?php echo $courselastdate;?>                                                            </div>
<?php } ?>
                                                                    </td>

                                                                </tr>
                                                                <?php } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="emiStructure">
                                                        <table class="table table-responsive emiSchedule">

                                                            <?php

                                                            if( have_rows('installments') ): $im=1;?>
                                                                <caption>Instalment Schedule</caption>
                                                            <thead>
                                                            <tr>
                                                            <?php


                                                            $im=1;while ( have_rows('installments') ) : the_row();
                                                                     //if ($im == 1) {$itext = "1st Instalment";}
                                                                     //if ($im == 2) {$itext = "2nd Instalment";}
                                                                     //if ($im == 3) {$itext = "3rd Instalment";}
                                                                     //if ($im == 4) {$itext = "4th Instalment";}
                                                                     $itext = ordinal($im)." Instalment";

                                                            ?>
                                                             <th class="<?php echo $im; ?>"><?php echo $itext;?></th>
                                                            <?php  $im++; endwhile; ?>
                                                            </tr></thead>
                                                            <?php endif; ?>


                                                            <?php $kk=1; if( have_rows('installments') ):

 $icount = count( get_field('installments') );
                                                            ?>
                                                            <tbody><tr>
                                                            <?php  while ( have_rows('installments') ) : the_row();

                                                             //if ($kk == 1) {$imtext = "1st Instalment";}
                                                             //if ($kk == 2) {$imtext = "2nd Instalment";}
                                                             //if ($kk == 3) {$imtext = "3rd Instalment";}
                                                             //if ($kk == 4) {$imtext = "4th Instalment";}
                                                              $imtext = ordinal($kk)." Instalment";


                                                            $in_currency = get_sub_field('inr_price');
                                                            $usd_currency = get_sub_field('usd_price');
                                                            $cop_inr_price = get_sub_field('cop_inr_price');
                                                            $cop_usd_price = get_sub_field('cop_usd_price');
                                                            $label1 = get_field('label_1');
                                                            $label2 = get_field('label_2');
                                                            ?>
                                                            <td>
                                                            <?php if ($kk==1 && $label1){
                                                            ?>
                                                             <p class="pclass"><?php echo $label1;?></p>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php if ($kk!=1 && $label1){
                                                            ?>
                                                             <p class="pclass empty"></p>
                                                            <?php
                                                            }
                                                            ?>

                                                           <div class="minstallment"><?php echo $imtext;?></div>

                                <?php if ($discount_array['newprice_inr'] && $kk==$icount) {
                                    $disprice = $discount_array['discount_price_inr'];
                                    $new_i_discount = $in_currency - $disprice;
                                 ?>
                                 <div class="amount"><span class="break_mb text-strike">Rs. <?php echo number_format($in_currency);?> + GST*</span></div>
                                 <div class="amount"><span class="break_mb">Rs. <?php echo number_format($new_i_discount);?> + GST*</span></div>

                                <?php } else { ?>
                                 <div class="amount"><span class="break_mb">Rs. <?php echo number_format($in_currency);?> + GST*</span></div>
                                <?php } ?>

                                 <?php if ($discount_array['newprice_usd'] && $kk==$icount) {
                                    $disprice_ = $discount_array['discount_price_usd'];
                                    $new_usd_discount = $usd_currency - $disprice_;
                                 ?>
                                 <div class="amount"><span class="break_mb text-strike">USD <?php echo $usd_currency;?></span></div>
                                 <div class="amount"><span class="break_mb">USD <?php echo $new_usd_discount;?></span></div>

                                <?php } else { ?>
                                 <div class="amount"><span class="break_mb">USD <?php echo $usd_currency;?></span></div>
                                <?php } ?>



                                                                  <div class="date"><span>Payment Deadline: </span>
                                                              <?php
                                                                  if ($kk==1){
                                                                    echo get_course_lastdate($batch_id);
                                                                  } else{
                                                                    echo get_sub_field('installment_due_date');
                                                                  }
                                                              ?>
                                                              </div>
                                                              <div style="display:none">
                                                              <?php echo $cop_inr_price;?>
                                                              </div>


                                                            <?php if ($cop_inr_price) {?>

                                                             <div class="sep"></div>

                                                            <?php if ($kk==1 && $label2){
                                                            ?>
                                                             <p class="pclass"><?php echo $label2;?></p>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php if ($kk!=1 && $label2){
                                                            ?>
                                                             <p class="pclass empty"></p>
                                                            <?php
                                                            }
                                                            ?>


                                                             <div class="amount"><span class="break_mb">Rs. <?php echo number_format($cop_inr_price);?> + GST*</span>
                                                             </div>
                                                             <?php } ?>
                                                              <?php if ($cop_usd_price) {?>
                                                                     <div class="amount"><span class="break_mb">USD <?php echo $cop_usd_price;?></span>
                                                                     </div>
                                                                <?php } ?>
                                                                </td>
                                                            <?php  $kk++; endwhile; ?>
                                                             </tr>

                                                            </tbody>
                                                            <?php endif; ?>

                                                        </table>
                                                    </div>
                                                    <span class="" style="font-weight: bold;">Effective 01 July 2017, the prevailing Service Tax will be replaced by GST at an effective rate of 18%</span>

                                                </div>
                                            </div>
                                        </div>

                                        <?php if (get_field('app_headline')) {?>

                                              <div class="panel">
                                                <div class="panel-heading">
                                                <h4 class="panel-title">

                                              <a data-toggle="collapse" data-parent="#feeandEmi" href="#feeandEmi2"><?php echo get_field('app_headline');?></a>
                                              </h4>
                                            </div>
                                             <div id="feeandEmi2" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                <?php if (get_field('application_process')) {?>
                                                <?php echo get_field('application_process');?>
                                                <?php } else { ?>
                                                <?php echo get_field('application_process','option');?>
                                                <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                        <?php } ?>




                                                <?php if (get_field('lf_headline')) {?>
                                                 <div class="panel">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">



                                               <a data-toggle="collapse" data-parent="#feeandEmi" href="#feeandEmi3"><?php echo get_field('lf_headline');?></a>
                                                </h4>
                                            </div>
                                            <div id="feeandEmi3" class="panel-collapse collapse">
                                                <div class="panel-body">

                                                    <?php if (get_field('late_fees_and_cancellation')) {?>
                                                <?php echo get_field('late_fees_and_cancellation');?>
                                                <?php } else { ?>
                                                <?php echo get_field('late_fees_and_cancellation','option');?>
                                                <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                              <?php } ?>


                                                <?php if (get_field('c_headline')) {?>

                                                <div class="panel">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#feeandEmi" href="#feeandEmi4"><?php echo get_field('c_headline');?></a>
                                                </h4>
                                            </div>
                                            <div id="feeandEmi4" class="panel-collapse collapse">
                                                <div class="panel-body">

                                                <?php if (get_field('cancellation_policy')) {?>
                                                <?php echo get_field('cancellation_policy');?>
                                                <?php } else { ?>
                                                <?php echo get_field('cancellation_policy','option');?>
                                                <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                              <?php }  ?>



                                              <?php if (get_field('cbyt_headline')) {?>
                                                <div class="panel">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#feeandEmi" href="#feeandEmi5"><?php echo get_field('cbyt_headline');?></a>
                                                </h4>
                                            </div>
                                            <div id="feeandEmi5" class="panel-collapse collapse">
                                                <div class="panel-body">

                                                     <?php if (get_field('cancellation_by_talentedge')) {?>
                                                <?php echo get_field('cancellation_by_talentedge');?>
                                                <?php } else { ?>
                                                <?php echo get_field('cancellation_by_talentedge','option');?>
                                                <?php } ?>

                                                </div>
                                            </div>
                                        </div>
                                              <?php }  ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="dummy" class="clearfix"></div>
        </div>
        <!-- ~~~~~~~~~~~~~ Popular courses ~~~~~~~~~~~~~ -->
        <div class="te-Popular-courses">
            <div class="container">
                 <?php get_template_part( 'popular'); ?>
            </div>
        </div>
    </section>
<?php
function ordinal($number) {
    $ends = array('th','st','nd','rd','th','th','th','th','th','th');
    if ((($number % 100) >= 11) && (($number%100) <= 13))
        return $number. 'th';
    else
        return $number. $ends[$number % 10];
}
get_footer(); ?>
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/jquery.mixitup.js"></script>
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/filter.js"></script>
<script>
    var gridLength = $('.grid-annoying li').length;
    if ( gridLength > 3 ) {
        $('.grid-annoying').addClass('gridDiamond');
    }
    $('.single-product .te-Popular-courses h2').html('You might also like');
</script>

<!-- Brochure download popup -->
<div data-remodal-id="brochure_download" role="dialog" aria-labelledby="modal2Title" aria-describedby="modal2Desc">
   <button data-remodal-action="close" class="remodal-close">Close</button>
     <div class="brochure_download right">
        <div class="guidForm">
            <?php
             echo do_shortcode('[gravityform id=9 title=false description=false ajax=true tabindex=25]');
            ?>
        </div>
     </div>
</div>
<script>


$('#input_5_14').val("<?php echo $coursearray['inst']['short_name']; ?>");
$('#input_10_13').val("<?php echo $coursearray['inst']['short_name']; ?>");
$('#input_5_6').val("<?php echo $c_shortname; ?>");
$('#input_10_6').val("<?php echo $c_shortname; ?>");
$('#input_5_15').val("<?php echo $batch_name; ?>");
$('#input_10_14').val("<?php echo $batch_name; ?>");

/*footer form*/
$('#input_1_13').val("<?php echo $batch_name; ?>");
$('#input_1_14').val("<?php echo $coursearray['inst']['short_name']; ?>");
$('#input_1_15').val("<?php echo $c_shortname; ?>");
<?php if($hideForm){ ?>
$(document).ready(function() {
    /* ~~~~~~~~~~~~~~~~~~~~~~~~
        sticky form
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~*/
        function stickyRaightRail () {
            var summaries = $('.te-banner-top .right-te');
            summaries.each(function(i) {
                var summary = $(summaries[i]);
                var next = summaries[i + 1];

                summary.scrollToFixed({
                    marginTop: $('#header').outerHeight(true) + 40,
                    limit: function() {
                        var limit = 0;
                        if (next) {
                            limit = $(next).offset().top - $(this).outerHeight(true) - 10;
                        } else {
                            limit = $('footer').offset().top -
                            $(this).outerHeight(true) - 140;
                        }
                        return limit;
                    },
                    zIndex: 999
                });
            });
        }
        if ($('.te-banner-top .right-te').length > 0) {
            stickyRaightRail();
        }
        $(window).resize();
});
<?php } ?>
</script>
