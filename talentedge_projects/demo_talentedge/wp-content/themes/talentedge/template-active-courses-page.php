<?php
/**
 * The template for displaying about us page.
 *
 * Template Name: Active courses Page
 *
 */
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Talentedge</title>
<link rel="shortcut icon" href="favicon.ico">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">

<!-- Animate css -->
<link type="text/css" rel='stylesheet' href="<?php echo bloginfo('stylesheet_directory'); ?>/css/css/animate.css">
<!-- End Animate css -->

<!-- Bootstrap css -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link type="text/css" rel='stylesheet' href="<?php echo bloginfo('stylesheet_directory'); ?>/js/bootstrap-progressbar-3.2.0.min.css">

<!-- End Bootstrap css -->

<!-- Jquery UI css -->
<link type="text/css" rel='stylesheet' href="<?php echo bloginfo('stylesheet_directory'); ?>/css/css/jquery-ui.min.css">
<link type="text/css" rel='stylesheet' href="<?php echo bloginfo('stylesheet_directory'); ?>/css/jquery-ui.structure.css">
<!-- End Jquery UI css -->

<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;subset=latin,cyrillic-ext' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<link type="text/css" data-themecolor="default" rel='stylesheet' href="<?php echo bloginfo('stylesheet_directory'); ?>/css/active_course_page.css">
<link type="text/css" rel='stylesheet' href="<?php echo bloginfo('stylesheet_directory'); ?>/assets/rs-plugin/css/settings.css">
<link type="text/css" rel='stylesheet' href="<?php echo bloginfo('stylesheet_directory'); ?>/assets/rs-plugin/css/settings-custom.css">
<link rel="stylesheet" href="<?php echo bloginfo('stylesheet_directory'); ?>/assets/css/animation.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo bloginfo('stylesheet_directory'); ?>/assets/css/remodal.css">
<link rel="stylesheet" href="<?php echo bloginfo('stylesheet_directory'); ?>/assets/css/remodal-default-theme.css">
<script src="<?php echo bloginfo('stylesheet_directory'); ?>/js/js/jquery-1.11.2.min.js"></script>
<style>
.remodal-bg.with-red-theme.remodal-is-opening, .remodal-bg.with-red-theme.remodal-is-opened {
	filter: none;
}
.remodal-overlay.with-red-theme {
	background-color: #f44336;
}
.remodal.with-red-theme {
	background: #fff;
}
</style>
<script src="<?php echo bloginfo('stylesheet_directory'); ?>/js/js/modernizr.custom.26633.js"></script>
</head>
<body>
<div class="remodal remodal2 headerforn" data-remodal-id="modal4" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
  <button data-remodal-action="close" class="remodal-close" aria-label="Close">Close</button>
  <div>
    <div class="b-tagline-box b-diagonal-line-bg-light ">
          <div class="b-tagline-box-inner">
            <div class="b-form-row f-primary-l f-title-big c-secondary">Talk to our counsellors to know more about this course</div>
            <!--<hr class="b-hr" />-->
            <div class="row b-form-inline b-form-horizontal">
              <div class="col-xs-12">
                <?php echo do_shortcode('[gravityform id=23 title=false]'); ?>
              </div>
            </div>
          </div>
        </div>
  </div>
</div>
<div class="remodal" data-remodal-id="modal3" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
  <button data-remodal-action="close" class="remodal-close" aria-label="Close">Close</button>
  <div class="remodal_width">
    <section data-scroll-index="1">
      <h3 class="course-header"><strong>Acca preparatory course from london school of business & finance : P1 – P7</strong></h3>
      <div class="border-only">
        <nav class="col-sm-4 col-xs-12 noright" id="myScrollspy">
          <div class="leftpart">
            <ul class="nav nav-pills nav-stacked" data-spy="affix" data-offset-top="205">
              <li class="active"><a href="#section1">Syllabus</a></li>
              <li><a href="#section2">Eligibility</a></li>
              <li><a href="#section3">Fee & Schedule </a></li>
            </ul>
            <div class="side-panelq">
							<div class="fee_box"></div>
              <!--<ul class="text-left1">
                <li><strong>Start Date:</strong> 24 June 2018</li>
                <li><strong>Timings :</strong> 3 Hours every Sunday from 06.30 p.m. to 09.30 p.m. IST</li>
                <li><strong>Fee</strong> INR 65,000</li>
              </ul>-->
              <ul class="text-left2">
                <a href="#modal4" title="Apply Now" data-id="" class="btn applyBtn">Apply Now</a>
              </ul>
            </div>
          </div>
        </nav>
        <div class="col-sm-8 col-xs-12 popup_content noleft">
          <div id="section1" class="syllabus">
          	<h1>Syllabus</h1>
						<div class="content_box"></div>
          </div>
          <div id="section2" class="eligibility">
						<h1>Eligibility</h1>
						<div class="content_box"></div>
          </div>
          <div id="section3" class="fee">
						<h1>Fee & Schedule</h1>
						<div class="content_box"></div>
						<div class="installment_box"></div>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>
<div id="home" class="home" data-scroll-index="0"></div>
<header>
  <div class="container b-header__box b-relative">
    <div class="col-lg-9 col-md-9 col-xs-7 col-sm-6 header_image"><img src="<?php echo site_url(); ?>/wp-content/uploads/2018/06/talentedge-logo.png" alt="" class="top_left_logo"></div>
  </div>
</header>
<div class="l-main-container">
  <section class="b-bg-block f-bg-block b-bg-block-meadow">
    <div id="color-overlay"></div>
    <div class="container f-center">
      <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <h1 class="heading2">Learn Online Courses from Anywhere<br>
          <font class="marbig" style="font-size:20px;color:#fff;">Learn from anywhere at any point in your Career Lifecycle and give a boost to your skills</font>

          <!--<div class="logos"><img src="<?php echo site_url(); ?>/wp-content/uploads/2018/06/logo1.png" alt="Parsons"><img src="<?php echo site_url(); ?>/wp-content/uploads/2018/06/logo2.png"b alt="Wizcraft" ></div>-->

          <a href="#why-enrol" title="Know More" class="enquiry mar20">Know More</a> </h1>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 headerforn">
        <div class="b-tagline-box b-diagonal-line-bg-light ">
          <div class="b-tagline-box-inner">
            <div class="b-form-row f-primary-l f-title-big c-secondary">Talk to our counsellors to know more about courses</div>
            <!--<hr class="b-hr" />-->
            <div class="row b-form-inline b-form-horizontal">
              <div class="col-xs-12">
                <?php echo do_shortcode('[gravityform id=23 title=false]'); ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="b-infoblock b-diagonal-line-bg-light b-diagonal-line-bg-light2 f-center" id="why-enrol" data-scroll-index="1">
    <div class="container">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <h2 class="f-center f-primary-b f-legacy-h2">Courses</h2>
        <div class="b-hr-stars f-hr-stars container">
          <div class="b-hr-stars__group"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </div>
        </div>
        <div class="part-1">
          <!-- post loop -->
          <?php
          $courses_arr =  json_decode(get_post_meta(get_the_ID(), 'active_course_list', true));
          // The Loop
          // print_r($courses_arr);die();
          if ( !empty($courses_arr) ) {
            foreach ( $courses_arr as  $courseId) {
              if(get_post_meta($courseId, 'admission_open', true) == 'Yes'){
               ?>
              <div class="col-md-4 col-sm-6 col-xs-12 f-left admclass">
                <?php

                if (get_field('course_image', $courseId))
                {
                    $course_image = get_field('course_image', $courseId);
                }
                else
                {
                    $course_image = get_field('course_default_image', 'option');
                }
                ?>
                <div class="shadowbox"> <img src="<?php echo $course_image; ?>" alt="<?php echo get_the_title($courseId); ?>" />
                  <div class="f-infoblock-with-icon__info_title  f-primary-sb f-uppercase"><?php echo get_field('course_short_name', $courseId); ?></div>
                  <div class="text-center bgpink">
                    <ul class="high-text">
                      <?php
                      $k = 1;
                      // check if the repeater field has rows of data
                      if (have_rows('key_points', $courseId)):

                      // loop through the rows of data
                      while (have_rows('key_points', $courseId)) : the_row();
                      if ($k <= 2)
                      {
                      ?>
                        <li><?php echo get_sub_field('key_point'); ?></li>
                      <?php
                      }
                      $k++;
                      endwhile;

                      endif;
                      ?>
                      <!--<li>Lorem Ipsum is simply dummy text of the printing. </li>
                      <li>Lorem Ipsum is simply dummy text of the printing. </li>-->
                    </ul>
                    <a href="#modal3" title="view details" class="btn viewDetailBtn" data-id="<?php echo $courseId; ?>" data-title="<?php echo get_field('course_short_name', $courseId); ?>" >View Details</a> <a href="#modal4" data-id="<?php echo $courseId; ?>" title="Apply Now" class="btn applyBtn">Apply Now</a> </div>
                  </div>
                </div>
            <?php }
              }
          }
          // Restore original Post Data

          ?>
          <!-- post loop End -->
        </div>
      </div>
    </div>
  </section>
  <div class="clearfix"></div>
  <section id="about">
    <div class="container">
      <div class="col-md-12 col-sm-12 col-xs-12" >
        <h2 class="f-center f-primary-b f-legacy-h2">About Talentedge</h2>
        <div class="b-hr-stars f-hr-stars container">
          <div class="b-hr-stars__group"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </div>
        </div>
        <div class="col-md-12 col-sm-12 col-xs-12  f-left" style="padding:0;">
          <p>Talentedge is an Ed-Tech firm. We are the first to bring ‘Live & Interactive’ anywhere learning in digital format. Our ability to recreate classroom type interactions in the virtual world has struck a chord with over 3, 00,000 individuals and corporate learners.Talentedge partners with top Indian & International institutes including IIMs, XLRI, MICA, SPJIMR, Jack Welch Management Institute (JWMI) and also with renowned corporates like OLX, Viacom 18, Society of Human Resource Management (SHRM) and others.</p>
        </div>
      </div>
    </div>
  </section>
  <div class="container">
    <div class="col-md-12 col-sm-12 col-xs-12" >
      <h2 class="f-center f-primary-b f-legacy-h2">Talentedge Way</h2>
      <div class="b-hr-stars f-hr-stars container">
        <div class="b-hr-stars__group"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </div>
      </div>
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12  f-left" style="padding:0; background-color:#eef5f8;" >
      <div class="text-center ">
        <div class="col-lg-3 col-sm-3 col-md-3 padd50"> <img src="<?php echo site_url(); ?>/wp-content/uploads/2018/06/iconc.png" alt="icon">
          <p>Live & Interactive online classes - not recorded lectures</p>
        </div>
        <div class="col-lg-3 col-sm-3 col-md-3 padd50"> <img src="<?php echo site_url(); ?>/wp-content/uploads/2018/06/iconb.png" alt="icon">
          <p>Learn from anywhere without leaving your job</p>
        </div>
        <div class="col-lg-3 col-sm-3 col-md-3 padd50"> <img src="<?php echo site_url(); ?>/wp-content/uploads/2018/06/icona.png" alt="icon">
          <p>Certificate of Completion from partner institute</p>
        </div>
        <div class="col-lg-3 col-sm-3 col-md-3 padd50"> <img src="<?php echo site_url(); ?>/wp-content/uploads/2018/06/icond.png" alt="icon">
          <p>Fees payable in instalments</p>
        </div>
      </div>
    </div>
  </div>
  <section id="about6">
    <div class="scroll container-fluid">
      <div class="container">
        <div class="col-md-12 col-sm-12 col-xs-12" >
          <h2 class="f-center f-primary-b f-legacy-h2">Have A Question</h2>
          <div class="b-hr-stars f-hr-stars container">
            <div class="b-hr-stars__group"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="main_container form"> <span>Please feel free to contact us by dropping your details below. Our counsellors will get back to you within one business day</span>
                <div class="bg_blue2 btm_blue_frm">
                  <?php echo do_shortcode('[gravityform id=23 title=false]'); ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<footer>
  <div class="b-footer-primary">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-xs-12"> </div>
        <div class="col-sm-6 col-xs-12 f-copyright b-copyright">Copyright © 2018 TALENTEDGE All rights reserved</div>
        <div class="col-sm-6 col-xs-12 f-copyright b-copyright text-right">*Conditions Apply</div>
      </div>
    </div>
  </div>
</footer>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="<?php echo bloginfo('stylesheet_directory'); ?>/assets/js/user.js"></script>
<!-- bootstrap -->
<script src="<?php echo bloginfo('stylesheet_directory'); ?>/assets/js/scrollspy.js"></script>
<script src="<?php echo bloginfo('stylesheet_directory'); ?>/assets/js/bootstrap-progressbar.js"></script>
<script src="<?php echo bloginfo('stylesheet_directory'); ?>/js/js/bootstrap.min.js"></script>
<!-- end bootstrap -->
<script src="<?php echo bloginfo('stylesheet_directory'); ?>/assets/js/jquery-ui.js"></script>
<script src="<?php echo bloginfo('stylesheet_directory'); ?>/assets/js/j.placeholder.js"></script>
<script src="<?php echo bloginfo('stylesheet_directory'); ?>/assets/js/fontawesome-markers.js"></script>
<script src="<?php echo bloginfo('stylesheet_directory'); ?>/assets/js/remodal.js"></script>
<script>
$(document).ready(function(){
	$('.inner-tab li').click(function(){
		var index = $(this).index();
		$(this).parent().find('li').removeClass('active');
		$(this).addClass('active');
		$(this).parent().next().find('.tab-text').hide();
		$(this).parent().next().find('.tab-text').eq(index).fadeIn();
		return false;
	});

  $('.viewDetailBtn').click(function(e){
		$('#section1 .content_box').html('');
		$('#section2 .content_box').html('');
		$('#section3 .content_box').html('');
		$('#section3 .installment_box').html('');
		$('.side-panelq .fee_box').html('');

		var courseID = $(this).attr('data-id');
    var courseTitle = $(this).attr('data-title');
    if(courseID !=''){
			$('.course-header strong').text(courseTitle);
      getCourseDetailById(courseID);
      getBatchIdByCourseId(courseID);
      $('.applyBtn').attr('data-id', courseID);

    }else{
      $('#section1 .content_box').html('');
      $('#section2 .content_box').html('');
      $('#section3 .content_box').html('');
			$('#section3 .installment_box').html('');
			$('.side-panelq .fee_box').html('');
    }

  });
  $('.applyBtn').click(function(e){
    var courseID = $(this).attr('data-id');
    if(courseID !=''){
      getBatchIdByCourseId(courseID);
    }
  });

});


function getCourseDetailById(courseId){
  console.log(courseId);

  // syllabus
  jQuery.ajax({
     type : "post",
     url : "<?php echo admin_url('admin-ajax.php'); ?>",
     data : {
       "action": "getCourseDetailById",
       "tabaction" : 'syllabus',
       "courseId": courseId
      },
     success: function(response) {
       $('#section1 .content_box').html(response);
       // console.log(response);
     }
  });

  // eligibility
  jQuery.ajax({
     type : "post",
     url : "<?php echo admin_url('admin-ajax.php'); ?>",
     data : {
       "action": "getCourseDetailById",
       "tabaction" : 'eligibility',
       "courseId": courseId
      },
     success: function(response) {
       $('#section2 .content_box').html(response);
       // console.log(response);
     }
  });

  // Fees
  jQuery.ajax({
     type : "post",
     url : "<?php echo admin_url('admin-ajax.php'); ?>",
     data : {
       "action": "getCourseDetailById",
       "tabaction" : 'fee',
       "courseId": courseId
      },
     success: function(response) {
       $('#section3 .content_box').html(response);
       // console.log(response);
     }
  });

	// Fees2 box
  jQuery.ajax({
     type : "post",
     url : "<?php echo admin_url('admin-ajax.php'); ?>",
     data : {
       "action": "getCourseDetailById",
       "tabaction" : 'fee2',
       "courseId": courseId
      },
     success: function(response) {
       $('.side-panelq .fee_box').html(response);
       // console.log(response);
     }
  });

	// Installment
  jQuery.ajax({
     type : "post",
     url : "<?php echo admin_url('admin-ajax.php'); ?>",
     data : {
       "action": "getCourseDetailById",
       "tabaction" : 'installment',
       "courseId": courseId
      },
     success: function(response) {
       $('#section3 .installment_box').html(response);

        console.log(response);
     }
  });

}
function getBatchIdByCourseId(courseId){
  // Batch ID
  jQuery.ajax({
     type : "post",
     url : "<?php echo admin_url('admin-ajax.php'); ?>",
     data : {
       "action": "getCourseDetailById",
       "tabaction" : 'batchid',
       "courseId": courseId
      },
     success: function(batchId) {
       if(batchId!=''){
         $('#input_23_7').val(batchId);
       }

     }
  });
}
</script>
<style>
.fee_box .list.list2, .eligibility{
	text-align: left;
}
</style>
</body>
</html>
