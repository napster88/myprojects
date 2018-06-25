<?php

/**
 * The template for displaying about us page.
 *
 * Template Name: Course Landing Form Page
 *
 */
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]> <html class="ie ie6 no-js" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie ie7 no-js" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie ie8 no-js" lang="en"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie ie9 no-js" lang="en"> <![endif]-->
<!--[if gt IE 9]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!-- Metas Page details-->
<title>Talentedge</title>
<meta name="description" content="UX designer and web developer">
<meta name="author" content="">
<!-- Mobile Specific Metas-->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--main style-->
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo bloginfo('stylesheet_directory'); ?>/assets/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo bloginfo('stylesheet_directory'); ?>/css/course-landing-form.css">
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo bloginfo('stylesheet_directory'); ?>/css/skins/default.css" data-name="skins">
<link type="text/css" rel="stylesheet" property="stylesheet" id="theme" href="<?php echo bloginfo('stylesheet_directory'); ?>/css/jquery-ui-1.8.16.custom.css">
<!--Theme Switcher -->

<!--google font style-->
<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<!--font-family: 'Metrophobic', sans-serif;-->
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300italic,300,400italic,600italic,600,700italic,700' rel='stylesheet' type='text/css'>
<!--font-family: 'Open Sans', sans-serif; -->
<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,400italic,500,300italic,300,100,500italic' rel='stylesheet' type='text/css'>
<!--font-family: 'Roboto', sans-serif; -->

<!-- font icon css style-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
</head>
<body onLoad="load()" onUnload="GUnload()">

<!--wrapper start-->
<div class="wrapper" id="wrapper">
  <!-- Preloader -->
  <div id="preloader">
    <div id="status"></div>
  </div>
  <!--Header start -->
  <header>
    <!--Language start -->
    <div class="container">

    </div>
    <!--/Language end -->
    <!--menu start-->
    <div class="menu">
      <div class="navbar-wrapper">
        <div class="container">
          <!-- Navbar start -->
          <div class="navwrapper">
            <div class="navbar navbar-inverse navbar-static-top">
              <div class="container">
                <div class="logo"><img src="<?php echo site_url(); ?>/wp-content/uploads/2018/05/tal-logo.png" alt="Talentedge"></div>
                <nav class="navArea">
                  <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                  </div>
                  <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav" id="navigation">
                     <!-- <li class="menuItem" id="home"><a href="<?php the_permalink(); ?>#wrapper">Home</a></li>-->
                      <li class="menuItem"><a href="<?php the_permalink(); ?>#courses">courses</a></li>
                       <li class="menuItem"><a href="<?php the_permalink(); ?>#teachers">faculty</a></li>
                      <li class="menuItem"><a href="<?php the_permalink(); ?>#features">About us</a></li>
                      <li class="menuItem"><a href="<?php the_permalink(); ?>#pricing">Academic Partners</a></li>

                      <li class="menuItem"><a href="<?php the_permalink(); ?>#testimonial">Success Story</a></li>

                     <li class="menuItem"><a href="<?php the_permalink(); ?>#contact">Contact us</a></li>
                    </ul>
                  </div>
                </nav>
              </div>
            </div>
          </div>
          <!-- Navbar end -->
        </div>
      </div>
    </div>
    <!--menu end-->

    <!--banner start -->
    <div class="header_v1">
      <div class="banner row" id="banner">
        <div class="col-xs-12 col-sm-6 col-md-12 col-lg-12 noPadd slides-container" style="height:100%">
          <!--background slide show start-->
          <div class="slide">
            <!--Header text1 start-->
            <div class="container hedaer-inner">
              <div class="bannerText">
                <h3>Learning Online Becomes Easier</h3>
                <p>Learn your desired skills via our online executive courses from anywhere, anytime using our AI & MI learning platform – <strong>SLIQ</strong></p>
                <p><a href="<?php echo  site_url(); ?>/browse-courses" class="smooth">View  Courses <i class="fa fa-angle-right"></i></a></p>
              </div>
            </div>
            <!--Header text1 end-->
            <img src="<?php echo site_url(); ?>/wp-content/uploads/2018/05/image01.jpg" alt="image01"></div>
          <div class="slide">
            <!--Header text2 start-->
            <div class="container hedaer-inner">
              <div class="bannerText">
                <h3>Learn online courses from anywhere</h3>
                <p>Learn from anywhere at any point in your Career Lifecycle and give a boost to your skills</p>
                <p><a href="<?php echo  site_url(); ?>/browse-courses" class="smooth">View  Courses <i class="fa fa-angle-right"></i></a></p>
              </div>
            </div>
            <!--Header text2 end-->
            <img src="<?php echo site_url(); ?>/wp-content/uploads/2018/05/image02.jpg" alt="image02"> </div>
          <!--background slide show end-->
        </div>
      </div>
    </div>
    <!--banner end -->

    <!--Header form -->
    <div class="container form-header">
      <div class="form-container">
        <h2 class="gform_course_landing-title">Accelerate your career with our online courses</h2>

        <div id="gform_course_landing">
          <?php echo do_shortcode('[gravityform id=34 title=false]'); ?>
        </div>
      </div>
    </div>
    <!--/Header form -->

  </header>
  <!--Header end -->
   <!--Available course start-->
  <section class="grey_section section_gap" id="courses">
    <div class="container">
      <div class="heading">
        <h1><span>Course Details</span></h1>
          <div class="row filtercopy">
          <p class="col-xs-12 col-sm-6 col-md-6 col-lg-3">Select the course you want to enrol for:</p>
              <div class="col-xs-12 col-sm-8 col-md-6 col-lg-9 marnegtop">
              <div class="select">
    <span class="arr" ></span>
    <select id="dy_course">

    </select>
  </div>
            <!--<select class="normal" id="dy_course">

                <option value="tab1" selected>Executive Development Program In Project Management For Senior Professionals from XLRI</option>
                <option value="tab2">Certified Cyber Warrior from IIIT Bangalore</option>
                 <option value="tab3">Executive Certificate Program in Strategic Management</option>
            </select>-->
          </div>
          </div>
      </div>
        <div id="tab-detail">

            <div class="row tab-text course_detail_show" id="tab">
        <!-- Vertical tabs start-->
         <!-- <h2><span>Executive Certificate Program in Strategic Management</span></h2>-->
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
          <ul class="nav nav-tabs custom-nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="<?php the_permalink(); ?>#syllabus3" aria-controls="syllabus" role="tab" data-toggle="tab">Syllabus</a></li>
            <li role="presentation"><a href="<?php the_permalink(); ?>#eligibility3" aria-controls="eligibility" role="tab" data-toggle="tab">Eligibility</a></li>

            <li role="presentation"><a href="<?php the_permalink(); ?>#fees3" aria-controls="fees" role="tab" data-toggle="tab">Fee & Schedule</a></li>
          </ul>
        </div>
        <!-- Vertical tabs end-->
        <!-- Vertical tabs content start-->
        <div class="col-xs-12 col-sm-6 col-md-8 col-lg-8 tab_text">
          <div class="tab-content">
            <!-- Vertical tabs content01 start-->
            <div role="tabpanel" class="tab-pane active" id="syllabus3">

              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 content-box">
                    <!-- syllabus -->
                    <p>Please select course.</p>
                </div>
              </div>

            </div>
            <!-- Vertical tabs content01 end-->
            <!-- Vertical tabs content02 start-->
            <div role="tabpanel" class="tab-pane fade" id="eligibility3">
              <div class="row">
               <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 content-box">
                  <p>Please Select Course</p>
                </div>
              </div>
            </div>
            <!-- Vertical tabs content02 end-->
            <!-- Vertical tabs content03 start-->

            <!-- Vertical tabs content04 end-->
            <!-- Vertical tabs content05 start-->
            <div role="tabpanel" class="tab-pane fade" id="fees3">
              <div class="row">
               <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 content-box">
                  <p>Please Select Course</p>
                </div>
              </div>
            </div>
            <!-- Vertical tabs content01 start-->
          </div>
        </div>
        <!-- Vertical tabs content end-->
      </div>
        </div>
    </div>
  </section>
  <!--/Available course end-->

    <!-- Teachers details start-->
  <section class="white_section section_gap" id="teachers">
    <div class="container nohover">
      <div class="heading">
        <h1><span>Meet your Faculty</span></h1>
        <p>Brightest minds from across the globe help you move up in your career through live and interactive sessions.</p>
      </div>
      <ul class="hover_listing  row faculty-box">
      </ul>
    </div>
  </section>
  <!-- Teachers details end-->

  <!--Membership features start -->
  <section class="white_section section_gap" id="features">
    <div class="container">
      <div class="heading">
        <h1><span>Why Talentedge</span></h1>
        <p>Talentedge offers courses jointly with world-leading institutes and corporates.<br>We enable working professionals to plan their future course of action and fast track their careers.</p>
      </div>
      <div class="row">
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
          <div class="membership_listing"> <span class="no-bg"><img src="<?php echo site_url(); ?>/wp-content/uploads/2018/05/premium-institute.png" alt="Premium Institute" /></span>
            <h3>Premium Institutes</h3>
           <p>Upgrade your knowledge and skills by learning from the best institute. </p>
          </div>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
          <div class="membership_listing"> <span class="no-bg"><img src="<?php echo site_url(); ?>/wp-content/uploads/2018/05/interactive-learning.png" alt="Premium Institute" /></span>
            <h3>Live & Interactive Classes</h3>
            <p>Live tutored classes, not recorded classes. </p>

          </div>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
          <div class="membership_listing"> <span class="no-bg"><img src="<?php echo site_url(); ?>/wp-content/uploads/2018/05/certificate.png" alt="Premium Institute" /></span>
            <h3>Certificate of Completion from Institute</h3>
            <p>Opportunity to earn a certificate of completion from the institute on successful completion.</p>

          </div>
        </div>
      </div>
      <div class="row sec_top20">
       <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
          <div class="membership_listing"> <span class="no-bg"><img src="<?php echo site_url(); ?>/wp-content/uploads/2018/05/case-study.png" alt="Premium Institute" /></span>
            <h3>Case study learning </h3>
            <p>Get real time industry insights by working on case studies, projects and simulations. </p>

          </div>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
          <div class="membership_listing"> <span class="no-bg"><img src="<?php echo site_url(); ?>/wp-content/uploads/2018/05/pay-emi.png" alt="Premium Institute" /></span>
            <h3>Instalment option Available </h3>
            <p>You can pay the course fees in Instalment too, thereby reducing the burden of paying at one go. </p>

          </div>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
          <div class="membership_listing"> <span class="no-bg"><img src="<?php echo site_url(); ?>/wp-content/uploads/2018/05/one-on-one.png" alt="Premium Institute" /></span>
            <h3>Dedicated Student Support </h3>
            <p>Our in-house student advisors will assist you for all course requirements.</p>

          </div>
        </div>

      </div>
    </div>
  </section>
  <!--/Membership features end -->
    <!--Partners start-->
  <section class="pricingtables section_gap" id="pricing">
    <div class="container">
      <div class="heading">
        <h1><span>Our Academic Partners</span></h1>
        <p>Talentedge offers the highest quality courses from Indian and International Institutes who share our commitment to excellence in Teaching and learning. </p>
      </div>
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <ul style="list-style-type:none;"> <!-- Partner 01 details start-->
         <li class="col-xs-6 col-sm-2 col-md-2 col-lg-2">
         <div class="img"><img src="<?php echo site_url(); ?>/wp-content/uploads/2018/05/MICA-1.png" alt="partner3"></div>
        </li>
        <!-- Partner 03 details end-->
        <!-- Partner 04 details start-->
       <li class="col-xs-6 col-sm-2 col-md-2 col-lg-2">
          <div class="img"><img src="<?php echo site_url(); ?>/wp-content/uploads/2018/05/IIM_K.png" alt="partner4"></div>
        </li>
        <!-- Partner 04 details end-->
            <!-- Partner 05 details start-->
       <li class="col-xs-6 col-sm-2 col-md-2 col-lg-2">
          <div class="img"><img src="<?php echo site_url(); ?>/wp-content/uploads/2018/05/Jack.png" alt="partner5"></div>
        </li>
        <!-- Partner 05 details end-->

         <!-- Partner 06 details start-->
        <li class="col-xs-6 col-sm-2 col-md-2 col-lg-2">
          <div class="img"><img src="<?php echo site_url(); ?>/wp-content/uploads/2018/05/spjimr-1.png" alt="partner6"></div>
        </li>
       <li class="col-xs-6 col-sm-2 col-md-2 col-lg-2">
          <div class="img"><img src="<?php echo site_url(); ?>/wp-content/uploads/2018/05/IIFT_white.png" alt="partner5"></div>
        </li>
        <!-- Partner 05 details end-->

         <!-- Partner 06 details start-->
        <li class="col-xs-6 col-sm-2 col-md-2 col-lg-2">
          <div class="img"><img src="<?php echo site_url(); ?>/wp-content/uploads/2018/05/XLRI-NEW.png" alt="partner6"></div>
        </li>

        <!-- Partner 06 details end-->
      </ul>
      </div>

      </div>
    </div>
  </section>
  <!--Partners end -->




    <!--Happy Students start-->
   <section class="grey_section section_gap" id="testimonial">
    <div class="container nohover">
      <div class="heading">
        <h1><span>Our Alumini</span></h1>
        <p>Have a look how our learners unleashed their true potential by learning from our executive courses</p>
      </div>
      <ul class="hover_listing row alumini-box">
      <!-- Happy Student 01 details start-->
        <li class="col-xs-12 col-sm-6 col-md-3 col-lg-3 noPadd noback">
          <div class="img"><img src="<?php echo site_url(); ?>/wp-content/uploads/2018/05/pankhuri.jpg" alt="">
          </div>
          <h3 class="uppercase">Pankhuri Kumari</h3>
          <p>Sr. Manager - Digital Initiatives-RBL Bank </p>
          <h6>Marketing & Brand Management</h6>
        </li>
        <!-- Happy Student 01 details end-->  <!-- Happy Student 01 details start-->
        <li class="col-xs-12 col-sm-6 col-md-3 col-lg-3 noPadd noback">
          <div class="img"><img src="<?php echo site_url(); ?>/wp-content/uploads/2018/05/abhik-das.jpg" alt=""></div>


          <h3 class="uppercase">Abhik Das</h3>
          <p>Senior Analyst - British Telecom</p>
          <h6>Strategic Management</h6>
        </li>
        <!-- Happy Student 01 details end-->
        <!-- Happy Student 03 details start-->
        <li class="col-xs-12 col-sm-6 col-md-3 col-lg-3 noPadd noback">
          <div class="img"> <img src="<?php echo site_url(); ?>/wp-content/uploads/2018/05/karthik-krishnaswami.jpg" alt=""></div>

          <h3 class="uppercase">Karthik Krishnaswami</h3>
          <p>Process Lead - Amazon</p>
          <h6>ACCA Preparatory Course</h6>
        </li>
        <!-- Happy Student 03 details end-->
        <!-- Happy Student 04 details start-->
        <li class="col-xs-12 col-sm-6 col-md-3 col-lg-3 noPadd noback">
          <div class="img"><img src="<?php echo site_url(); ?>/wp-content/uploads/2018/05/arunabh.jpg" alt=""></div>

          <h3 class="uppercase">Arunabh Sinha</h3>
          <p>Business Operations -Associate Manager - Accenture</p>
          <h6>Business Analytics & Big Data</h6>
        </li>
        <!-- Happy Student 04 details end-->
      </ul>


      </div></section>
  <!--Happy Students end-->

  <!--fun facts start -->

  <!--fun facts end -->





  <!--have Question start -->
  <section class="grey_section section_gap" id="contact">
    <div class="container">
      <div class="heading">
        <h1><span>Have A Question</span></h1>
        <p>Please feel free to contact us by dropping your details below. Our counsellors will get back to you within one business day</p>
      </div>
      <div class="row">

        <!-- contact from start-->
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <div id="message"></div>
            <div id="have-a-question-form">
            <?php echo do_shortcode('[gravityform id=23 title=false]'); ?>
          </div>
        </div>
        <!-- contact from end-->
      </div>
    </div>
  </section>
  <!--have Question end -->

  <!--Footer start-->
  <footer class="footer">
    <div class="container">
      <div class="row">
        <div class="pull-left">
          <p>&copy; 2018 Talentedge. All Rights Reserved</p>
        </div>
        <div class="pull-right"><a class="gototop smooth" href="<?php the_permalink(); ?>#wrapper">Go To Top<i class="fa fa-chevron-up"></i></a></div>
      </div>
    </div>
  </footer>
  <!--Footer end -->
</div>
<!--wrapper end-->
<!--modernizr js-->
<script type="text/javascript" src="<?php echo bloginfo('stylesheet_directory'); ?>/js/modernizr.custom.26633.js"></script>
<!--jquary min js-->
<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="crossorigin="anonymous"></script>
<script src="<?php echo bloginfo('stylesheet_directory'); ?>/assets/bootstrap/js/bootstrap.min.js"></script>
<!--for header jquery-->
<script src="<?php echo bloginfo('stylesheet_directory'); ?>/js/jquery.superslides.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
"use strict";
//<![CDATA[
	$('.header_v1 #banner').superslides({
	  animation: 'fade',
	  play: 5000
	});
//]]>
</script>




<script type="text/javascript" src="<?php echo bloginfo('stylesheet_directory'); ?>/js/jquery.ui.widget.min.js"></script>
<script type="text/javascript" src="<?php echo bloginfo('stylesheet_directory'); ?>/js/jquery.ui.rlightbox.js"></script>

<script defer src="<?php echo bloginfo('stylesheet_directory'); ?>/js/jquery.flexslider.js"></script>
<script src="<?php echo bloginfo('stylesheet_directory'); ?>/js/jquery.easing.js"></script>


<script type="text/javascript">
jQuery(function($) {
$(document).ready( function() {
  //enabling stickUp on the '.navbar-wrapper' class
	$('.navbar-wrapper').stickUp({
		parts: {
		  0: 'banner',
		  1: 'features',
		  2: 'courses',
		  3: 'teachers',
		  4: 'pricing',
		  5: 'testimonial',
		  6: 'blog',
		  7: 'contact'
		},
		itemClass: 'menuItem',
		itemHover: 'active',
		topMargin: 'auto'
		});

		// run rlightbox
		$( ".lb" ).rlightbox();
		$( ".lb_title-overwritten" ).rlightbox({overwriteTitle: true});

		$('.flexslider').flexslider({
			animation: "fade",
			animationLoop: true,
			slideshow: true,
			pauseOnAction: false,
			slideshowSpeed: 7000,
			controlNav: true,
			start: function(slider){
			$('body').removeClass('loading');
			}
		});

	var activeImage;

	var getmaxHeight = 0;
	$(".testimonialText li").each(function(index, element) {
        if($(this).height()>getmaxHeight){
			getmaxHeight = $(this).height();
			$(".footerTopContent").height(getmaxHeight);
			}
    });

    $(".testimonialText li").fadeTo("fast",0);
	$(".testimonialText li:first").fadeTo("fast",1);
	$(".imageSlide .imageBox").removeClass("activeImage");
	$(".imageSlide .imageBox:first").addClass("activeImage");
	$(".imageSlide .imageBox").mouseenter(function(){
		if(!$(this).hasClass("activeImage")){
			var gi = $(this).index();
			//console.log(gi);
			$(".imageSlide .imageBox").removeClass("activeImage");
			$(this).addClass("activeImage");
			$(".testimonialText li").fadeTo("fast",0);
			$(".testimonialText li:eq("+gi+")").fadeTo("fast",1);
			}
	})

	// Video lightbox
	$("a[data-rel^='prettyPhoto']").prettyPhoto();

	// for client work jquary
	var windowBottom = $(window).height()+0;
	var index=0;
	$(document).scroll(function(){
		divposition = parseInt($('.factabout').offset().top),10;
		divsrollpos = parseInt($(window).scrollTop()),10;
		ctop = parseInt(divposition-divsrollpos),10;
		if(ctop<Math.round(windowBottom/2)){
			if(index==0){

				$('.timer').each(count);

			}
			index++;
		}
	});



function count(options) {
	var $this = $(this);
	options = $.extend({}, options || {}, $this.data('countToOptions') || {});
	$this.countTo(options);
}


	});

});
$("#gform_course_landing .course_dynamic_field select option:first").val('');
var dy_course_option = $('#gform_course_landing .course_dynamic_field select').html();
$('#dy_course').html(dy_course_option);
$('#teachers').hide();
$('#gform_course_landing .course_dynamic_field select').on('change', function(){
  var courseId = $(this).val();
  $('select#dy_course>option[value="' + courseId + '"]').prop('selected', true);
  $('#teachers').hide();
  $('#teachers .faculty-box').html('');
  if(courseId != ''){
    // $('.course_detail_show').show();
    $('#teachers').show();
    getCourseDetailById(courseId);
    getBatchIdByCourseId(courseId);

  }else{
    $('#syllabus3 .content-box').html('<p>Pleas select course</p>');
    $('#eligibility3 .content-box').html('<p>Pleas select course</p>');
    $('#fees3 .content-box').html('<p>Pleas select course</p>');
  }

});
$('#dy_course').on('change', function(){
  var courseId = $(this).val();
  $('#teachers').hide();
  $('#teachers .faculty-box').html('');
  $('#gform_course_landing .course_dynamic_field select>option[value="' + courseId + '"]').prop('selected', true);
  if(courseId != ''){
    $('#teachers').show();
    // $('.course_detail_show').show();
    getCourseDetailById(courseId);
    getBatchIdByCourseId(courseId);

  }else{
    $('#syllabus3 .content-box').html('<p>Pleas select course</p>');
    $('#eligibility3 .content-box').html('<p>Pleas select course</p>');
    $('#fees3 .content-box').html('<p>Pleas select course</p>');
  }
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
       $('#syllabus3 .content-box').html(response);
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
       $('#eligibility3 .content-box').html(response);
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
       $('#fees3 .content-box').html(response);
       // console.log(response);
     }
  });

  // Faculty
  jQuery.ajax({
     type : "post",
     url : "<?php echo admin_url('admin-ajax.php'); ?>",
     data : {
       "action": "getCourseDetailById",
       "tabaction" : 'faculty',
       "courseId": courseId
      },
     success: function(response) {
       $('#teachers .faculty-box').html(response);
       // console.log(response);
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
         $('#input_34_13').val(batchId);
       }

     }
  });
}
</script>


<!--for theme custom jquery-->


</body>
</html>
