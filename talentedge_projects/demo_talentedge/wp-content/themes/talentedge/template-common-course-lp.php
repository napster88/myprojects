<?php
/* *
 * The template for displaying about us page.
 *
 * Template Name: Common Course Landing Page
 *
 */
// wp_head();
?>
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
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo esc_url(get_template_directory_uri()); ?>/css/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo esc_url(get_template_directory_uri()); ?>/css/css/main.css">
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo esc_url(get_template_directory_uri()); ?>/css/css/skins/default.css" data-name="skins">

<!--Theme Switcher -->

<!--google font style-->
<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<!--font-family: 'Metrophobic', sans-serif;-->
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300italic,300,400italic,600italic,600,700italic,700' rel='stylesheet' type='text/css'>
<!--font-family: 'Open Sans', sans-serif; -->
<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,400italic,500,300italic,300,100,500italic' rel='stylesheet' type='text/css'>
<!--font-family: 'Roboto', sans-serif; -->

<!-- font icon css style-->
<link rel="stylesheet" href="<?php echo esc_url(get_template_directory_uri()); ?>/css/css/font-awesome.min.css">
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
                <div class="logo"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/images/tal-logo.png" alt="Talentedge"></div>
                <nav class="navArea">
                  <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                  </div>
                  <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav" id="navigation">
                     <!-- <li class="menuItem" id="home"><a href="index.html#wrapper">Home</a></li>-->
                      <li class="menuItem"><a href="index.html#courses">courses</a></li>
                       <li class="menuItem"><a href="index.html#teachers">faculty</a></li>
                      <li class="menuItem"><a href="index.html#features">About us</a></li>
                      <li class="menuItem"><a href="index.html#pricing">Academic Partners</a></li>

                      <li class="menuItem"><a href="index.html#testimonial">Success Story</a></li>

                     <li class="menuItem"><a href="index.html#contact">Contact us</a></li>
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
                <p><a href="index.html#courses" class="smooth">View  Courses <i class="fa fa-angle-right"></i></a></p>
              </div>
            </div>
            <!--Header text1 end-->
            < src="<?php echo esc_url(get_template_directory_uri()); ?>/images/images/header-image/image01.jpg" alt="image01"></div>
          <div class="slide">
            <!--Header text2 start-->
            <div class="container hedaer-inner">
              <div class="bannerText">
                <h3>Learn online courses from anywhere</h3>
                <p>Learn from anywhere at any point in your Career Lifecycle and give a boost to your skills</p>
                <p><a href="index.html#courses" class="smooth">View  Courses <i class="fa fa-angle-right"></i></a></p>
              </div>
            </div>
            <!--Header text2 end-->
            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/images/header-image/image02.jpg" alt="image02"> </div>
          <!--background slide show end-->
        </div>
      </div>
    </div>
    <!--banner end -->

    <!--Header form -->
    <div class="container form-header">
      <div class="form-container">
        <h2>Accelerate your career with our online courses</h2>
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-row">
            <input type="text" placeholder="Name" class="normal">
          </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-row">
            <input type="text" placeholder="Email Address" class="normal">
          </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-row">
            <input type="text" placeholder="Phone" class="normal">
          </div>

          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-row">
            <select class="normal">
              <option> Select Learning Program</option>
               <option> DATA ANALYTICS</option>
                <option> LEADERSHIP</option>
                 <option> HR</option>
                  <option> BUSINESS MANAGEMENT</option>
            </select>
          </div>

          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <input type="button" class="button" value="Enrol Now">
          </div>
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
       <option value="tab1" selected>Executive Development Program In Project Management For Senior Professionals from XLRI</option>
                <option value="tab2">Certified Cyber Warrior from IIIT Bangalore</option>
                 <option value="tab3">Executive Certificate Program in Strategic Management</option>
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
            <div class=" tab-text course_detail_show" id="tab1">
        <!-- Vertical tabs start-->
        <!--  <h2><span>Executive Development Program In Project Management For Senior Professionals from XLRI</span></h2>-->
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
          <ul class="nav nav-tabs custom-nav-tabs" role="tablist">
            <li role="presentation" class="active">
                <a href="index.html#syllabus" aria-controls="syllabus" role="tab" data-toggle="tab">Syllabus</a>
            </li>
            <li role="presentation">
                <a href="index.html#eligibility" aria-controls="eligibility" role="tab" data-toggle="tab">Eligibility</a>
            </li>

            <li role="presentation">
                <a href="index.html#fees" aria-controls="fees" role="tab" data-toggle="tab">Fee & Schedule</a>
            </li>
          </ul>
        </div>
        <!-- Vertical tabs end-->
        <!-- Vertical tabs content start-->
        <div class="col-xs-12 col-sm-6 col-md-8 col-lg-8 tab_text">
          <div class="tab-content">
            <!-- Vertical tabs content01 start-->
            <div role="tabpanel" class="tab-pane active" id="syllabus">
              <div class="row">  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                   <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                   <ul class="list list2">
            <li><strong>Module 1:</strong> Basic Concepts & Applications of Project Management</li>
            <li><strong>Module 2:</strong> Project Modelling and Management with Applications in MS-Project</li>
            <li><strong>Module 3:</strong> Financial & Risk Aspects of Projects</li>
            <li><strong>Module 4:</strong> Workshop on Risk Assessment & Management in Projects</li>

          </ul>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                   <ul class="list list2">

            <li><strong>Module 5:</strong> People Management in Projects</li>
            <li><strong>Module 6:</strong> Project Governance & Monitoring</li>
            <li><strong>Module 7:</strong> Custom Module A for Non-IT Professionals</li>
            <li><strong>Module 7:</strong> Custom Module B for IT Professionals</li>


          </ul>
          </div>
                </div>
              </div>
            </div>
            <!-- Vertical tabs content01 end-->
            <!-- Vertical tabs content02 start-->
            <div role="tabpanel" class="tab-pane fade" id="eligibility">
              <div class="row">

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                 <ul class="list list2">
            <li><strong>For Indian Participants –</strong> Graduates (10+2+3) or Diploma Holders (only 10+2+3) from a recognized university (UGC/AICTE/DEC/AIU/State Government) in any discipline.</li>
            <li><strong>For International Participants –</strong> Graduation or equivalent degree from any recognized University or Institution in their respective country.</li>
            <li><strong>Minimum of 8 years of work experience</strong> as on 01 April 2018 of which at least 3 years must have been in a project management role OR at least 5 years in a project execution role.</li>
            </ul>
                </div>
              </div>
            </div>
            <!-- Vertical tabs content02 end-->

            <!-- Vertical tabs content05 start-->
            <div role="tabpanel" class="tab-pane fade" id="fees">
              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                  <h3>Program Fee & Duration</h3>

                  <ul class="list list2">
            <li><strong>For Indian Residents </strong> Rs. 90,000+ GST*</li>
            <li><strong>For International Students </strong> USD: 1900</li>
            <li><strong>Emi options available</strong> </li>
            </ul>


                  <ul class="list list2">
            <li><strong>Duration </strong> 6 Months</li>
            <li><strong>Start - </strong> 24th Jun 18</li>

            </ul>
                </div>
              </div>
            </div>
            <!-- Vertical tabs content01 start-->
          </div>
        </div>
        <!-- Vertical tabs content end-->
      </div>
            <div class="row tab-text" id="tab2">
        <!-- Vertical tabs start-->
        <!--  <h2><span>Certified Cyber Warrior from IIIT Bangalore</span></h2>-->
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
          <ul class="nav nav-tabs custom-nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="index.html#syllabus2" aria-controls="syllabus" role="tab" data-toggle="tab">Syllabus</a></li>
            <li role="presentation"><a href="index.html#eligibility2" aria-controls="eligibility" role="tab" data-toggle="tab">Eligibility</a></li>

            <li role="presentation"><a href="index.html#fees2" aria-controls="fees" role="tab" data-toggle="tab">Fee & Schedule</a></li>
          </ul>
        </div>
        <!-- Vertical tabs end-->
        <!-- Vertical tabs content start-->
        <div class="col-xs-12 col-sm-6 col-md-8 col-lg-8 tab_text">
          <div class="tab-content">
            <!-- Vertical tabs content01 start-->
            <div role="tabpanel" class="tab-pane active" id="syllabus2">
              <div class="row">  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">


                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                   <ul class="list list2">
            <li>Cyber Security Foundation</li>
            <li>Introduction to IT Act and Cyber Laws</li>
            <li>Introduction to Dark web and Deep Web</li>
            <li>Network Security & Best practices for secured n/w administration</li>
            <li>Vulnerabilities in various layers of Information Systems</li>


          </ul>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                   <ul class="list list2">

            <li>Brief Introduction to Cyber Risk and Cyber Insurance Best Practices</li>
            <li>Introduction to Physical Security & importance to protect IT Assets</li>
            <li>Introduction to Blockchain, Cryptocurrencies and Bitcoins</li>
            <li>Cyber Security Design and Maintaining Resilience</li>


          </ul>
          </div>
                </div>
              </div>
            </div>
            <!-- Vertical tabs content01 end-->
            <!-- Vertical tabs content02 start-->
            <div role="tabpanel" class="tab-pane fade" id="eligibility2">
              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                 <ul class="list list2">
            <li><strong>For Indian Participants –</strong> Graduates (10+2+3) or Diploma Holders (only 10+2+3) from a recognized university (UGC/AICTE/DEC/AIU/State Government) in any discipline.</li>
            <li><strong>For International Participants –</strong> Graduation or equivalent degree from any recognized University or Institution in their respective country.</li>
            <li><strong>Minimum of 8 years of work experience</strong> as on 01 April 2018 of which at least 3 years must have been in a project management role OR at least 5 years in a project execution role.</li>
            </ul>
                </div>
              </div>
            </div>
            <!-- Vertical tabs content02 end-->
            <!-- Vertical tabs content03 start-->

            <!-- Vertical tabs content04 end-->
            <!-- Vertical tabs content05 start-->
            <div role="tabpanel" class="tab-pane fade" id="fees2">
              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                  <h3>Program Fee & Duration</h3>

                  <ul class="list list2">
            <li><strong>For Indian Residents </strong> Rs. 90,000+ GST*</li>
            <li><strong>For International Students </strong> USD: 1900</li>
            <li><strong>Emi options available</strong> </li>
            </ul>


                  <ul class="list list2">
            <li><strong>Duration </strong> 6 Months</li>
            <li><strong>Start - </strong> 24th Jun 18</li>

            </ul>
                </div>
              </div>
            </div>
            <!-- Vertical tabs content01 start-->
          </div>
        </div>
        <!-- Vertical tabs content end-->
      </div>
            <div class="row tab-text" id="tab3">
        <!-- Vertical tabs start-->
         <!-- <h2><span>Executive Certificate Program in Strategic Management</span></h2>-->
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
          <ul class="nav nav-tabs custom-nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="index.html#syllabus3" aria-controls="syllabus" role="tab" data-toggle="tab">Syllabus</a></li>
            <li role="presentation"><a href="index.html#eligibility3" aria-controls="eligibility" role="tab" data-toggle="tab">Eligibility</a></li>

            <li role="presentation"><a href="index.html#fees3" aria-controls="fees" role="tab" data-toggle="tab">Fee & Schedule</a></li>
          </ul>
        </div>
        <!-- Vertical tabs end-->
        <!-- Vertical tabs content start-->
        <div class="col-xs-12 col-sm-6 col-md-8 col-lg-8 tab_text">
          <div class="tab-content">
            <!-- Vertical tabs content01 start-->
            <div role="tabpanel" class="tab-pane active" id="syllabus3">
              <div class="row">  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                   <ul class="list list2">
            <li>Core Concepts in Strategic Management</li>
            <li>Corporate Strategies</li>
            <li>Strategic Business Unit (SBU) Level Strategies</li>
            <li>Functional Strategies</li>
            <li>Competitive Strategies</li>


          </ul>
          </div>
           <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                   <ul class="list list2">

            <li>Managing Strategic Change and Innovation</li>
            <li>Strategic Leadership</li>
            <li>Corporate Governance & Ethics in Strategy Formulation</li>
            <li>Blue Ocean Strategy</li>

          </ul>
          </div>
                </div>
              </div>
            </div>
            <!-- Vertical tabs content01 end-->
            <!-- Vertical tabs content02 start-->
            <div role="tabpanel" class="tab-pane fade" id="eligibility3">
              <div class="row">
               <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                 <ul class="list list2">
            <li><strong>For Indian Participants –</strong> Graduates (10+2+3) or Diploma Holders (only 10+2+3) from a recognized university (UGC/AICTE/DEC/AIU/State Government) in any discipline.</li>
            <li><strong>For International Participants –</strong> Graduation or equivalent degree from any recognized University or Institution in their respective country.</li>
            <li><strong>Minimum of 8 years of work experience</strong> as on 01 April 2018 of which at least 3 years must have been in a project management role OR at least 5 years in a project execution role.</li>
            </ul>
                </div>
              </div>
            </div>
            <!-- Vertical tabs content02 end-->
            <!-- Vertical tabs content03 start-->

            <!-- Vertical tabs content04 end-->
            <!-- Vertical tabs content05 start-->
            <div role="tabpanel" class="tab-pane fade" id="fees3">
              <div class="row">
               <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                  <h3>Program Fee & Duration</h3>

                  <ul class="list list2">
            <li><strong>For Indian Residents </strong> Rs. 90,000+ GST*</li>
            <li><strong>For International Students </strong> USD: 1900</li>
            <li><strong>Emi options available</strong> </li>
            </ul>


                  <ul class="list list2">
            <li><strong>Duration </strong> 6 Months</li>
            <li><strong>Start - </strong> 24th Jun 18</li>

            </ul>
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
      <ul class="hover_listing  row"> <!-- Teacher 01 details start-->
        <li class="col-xs-12 col-sm-6 col-md-3 col-lg-3 noPadd noback">
          <div class="img_1"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/images/teachers/teacher1.jpg" alt="teacher1">

          </div>
          <h3 class="uppercase"><a href="https://talentedge.in/faculty/dr-falguni-vasavada-oza/" target="_blank">DR. FALGUNI VASAVADA-OZA</a></h3>

          <h4>MICA</h4>
        </li>
        <!-- Teacher 01 details end-->
        <!-- Teacher 02 details start-->
        <li class="col-xs-12 col-sm-6 col-md-3 col-lg-3 noPadd noback">
          <div class="img_1"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/images/teachers/teacher2.jpg" alt="teacher2">

          </div>
          <h3 class="uppercase"><a href="https://talentedge.in/faculty/dr-charles-newman/" target="_blank">Dr. CHARLES NEWMAN</a></h3>

          <h4>Jack Welch Management Institute</h4>
        </li>
        <!-- Teacher 02 details end--> <!-- Teacher 03 details start-->
        <li class="col-xs-12 col-sm-6 col-md-3 col-lg-3 noPadd noback">
          <div class="img_1"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/images/teachers/teacher3.jpg" alt="teacher3">

          </div>
          <h3 class="uppercase"><a href="https://talentedge.in/faculty/prof-sabyasachi-sengupta/ " target="_blank">Prof. SABYASACHI SENGUPTA </a></h3>

          <h4>XLRI Jamshedpur</h4>
        </li>
        <!-- Teacher 03 details end-->
        <!-- Teacher 04 details start-->
        <li class="col-xs-12 col-sm-6 col-md-3 col-lg-3 noPadd noback">
          <div class="img_1"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/images/teachers/teacher4.jpg" alt="teacher4">

          </div>
           <h3 class="uppercase"><a href="https://talentedge.in/faculty/dr-harish-ramani/ " target="_blank">DR. HARISH RAMANI </a></h3>

          <h4>IIIT Bangalore</h4>
        </li>
        <!-- Teacher 04 details end-->
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
          <div class="membership_listing"> <span class="no-bg"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/images/premium-institute.png" alt="Premium Institute" /></span>
            <h3>Premium Institutes</h3>
           <p>Upgrade your knowledge and skills by learning from the best institute. </p>
          </div>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
          <div class="membership_listing"> <span class="no-bg"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/images/interactive-learning.png" alt="Premium Institute" /></span>
            <h3>Live & Interactive Classes</h3>
            <p>Live tutored classes, not recorded classes. </p>

          </div>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
          <div class="membership_listing"> <span class="no-bg"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/images/certificate.png" alt="Premium Institute" /></span>
            <h3>Certificate of Completion from Institute</h3>
            <p>Opportunity to earn a certificate of completion from the institute on successful completion.</p>

          </div>
        </div>
      </div>
      <div class="row sec_top20">
       <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
          <div class="membership_listing"> <span class="no-bg"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/images/case-study.png" alt="Premium Institute" /></span>
            <h3>Case study learning </h3>
            <p>Get real time industry insights by working on case studies, projects and simulations. </p>

          </div>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
          <div class="membership_listing"> <span class="no-bg"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/images/pay-emi.png" alt="Premium Institute" /></span>
            <h3>Instalment option Available </h3>
            <p>You can pay the course fees in Instalment too, thereby reducing the burden of paying at one go. </p>

          </div>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
          <div class="membership_listing"> <span class="no-bg"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/images/one-on-one.png" alt="Premium Institute" /></span>
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
         <div class="img_1"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/images/MICA-1.png" alt="partner3"></div>
        </li>
        <!-- Partner 03 details end-->
        <!-- Partner 04 details start-->
       <li class="col-xs-6 col-sm-2 col-md-2 col-lg-2">
          <div class="img_1"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/images/IIM_K.png" alt="partner4"></div>
        </li>
        <!-- Partner 04 details end-->
            <!-- Partner 05 details start-->
       <li class="col-xs-6 col-sm-2 col-md-2 col-lg-2">
          <div class="img_1"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/images/Jack.png" alt="partner5"></div>
        </li>
        <!-- Partner 05 details end-->

         <!-- Partner 06 details start-->
        <li class="col-xs-6 col-sm-2 col-md-2 col-lg-2">
          <div class="img_1"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/images/spjimr-1.png" alt="partner6"></div>
        </li>
       <li class="col-xs-6 col-sm-2 col-md-2 col-lg-2">
          <div class="img_1"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/images/IIFT_white.png" alt="partner5"></div>
        </li>
        <!-- Partner 05 details end-->

         <!-- Partner 06 details start-->
        <li class="col-xs-6 col-sm-2 col-md-2 col-lg-2">
          <div class="img_1"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/images/XLRI-NEW.png" alt="partner6"></div>
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
      <ul class="hover_listing row">
      <!-- Happy Student 01 details start-->
        <li class="col-xs-12 col-sm-6 col-md-3 col-lg-3 noPadd noback">
          <div class="img_1"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/images/pankhuri.jpg" alt="">
          </div>
          <h3 class="uppercase">Pankhuri Kumari</h3>
          <p>Sr. Manager - Digital Initiatives-RBL Bank </p>
          <h6>Marketing & Brand Management</h6>
        </li>
        <!-- Happy Student 01 details end-->  <!-- Happy Student 01 details start-->
        <li class="col-xs-12 col-sm-6 col-md-3 col-lg-3 noPadd noback">
          <div class="img_1"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/images/abhik-das.jpg" alt=""></div>


          <h3 class="uppercase">Abhik Das</h3>
          <p>Senior Analyst - British Telecom</p>
          <h6>Strategic Management</h6>
        </li>
        <!-- Happy Student 01 details end-->
        <!-- Happy Student 03 details start-->
        <li class="col-xs-12 col-sm-6 col-md-3 col-lg-3 noPadd noback">
          <div class="img_1"> <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/images/karthik-krishnaswami.jpg" alt=""></div>

          <h3 class="uppercase">Karthik Krishnaswami</h3>
          <p>Process Lead - Amazon</p>
          <h6>ACCA Preparatory Course</h6>
        </li>
        <!-- Happy Student 03 details end-->
        <!-- Happy Student 04 details start-->
        <li class="col-xs-12 col-sm-6 col-md-3 col-lg-3 noPadd noback">
          <div class="img_1"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/images/arunabh.jpg" alt=""></div>

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
          <form method="post" action="php/contact.php.html" name="cform" id="cform">
            <div class="form-row col-xs-12 col-sm-12 col-md-3 col-lg-3 normal">
              <input name="name" id="name" type="text" class="col-xs-12 col-sm-12 col-md-3 col-lg-3 normal" placeholder="Name">
            </div>
            <div class="form-row col-xs-12 col-sm-12 col-md-3 col-lg-3 normal">
              <input name="email" id="email" type="email" class=" col-xs-12 col-sm-12 col-md-3 col-lg-3 normal" placeholder="Email Address">
            </div>
               <div class="form-row col-xs-12 col-sm-12 col-md-3 col-lg-3 normal">
              <input name="phone" id="phone" type="text" class=" col-xs-12 col-sm-12 col-md-3 col-lg-3 normal" placeholder="Phone">
            </div>
              <div class="form-row col-xs-12 col-sm-12 col-md-3 col-lg-3 normal">
              <input type="submit" id="submit" name="send" class="button" value="Submit">
            </div>
            <div id="simple-msg"></div>
          </form>
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
        <div class="pull-right"><a class="gototop smooth" href="index.html#wrapper">Go To Top<i class="fa fa-chevron-up"></i></a></div>
      </div>
    </div>
  </footer>
  <!--Footer end -->
</div>
<!--wrapper end-->
<!--modernizr js-->
<script type="text/javascript" src="<?php echo esc_url(get_template_directory_uri()); ?>/js/js/modernizr.custom.26633.js"></script>
<!--jquary min js-->
<script type="text/javascript" src="<?php echo esc_url(get_template_directory_uri()); ?>/js/js/jquery-1.11.2.min.js"></script>
<script src="<?php echo esc_url(get_template_directory_uri()); ?>/js/js/bootstrap.min.js"></script>

<!--for placeholder jquery-->
<script type="text/javascript" src="<?php echo esc_url(get_template_directory_uri()); ?>/js/js/jquery.placeholder.js"></script>

<!--for header jquery-->
<script type="text/javascript" src="<?php echo esc_url(get_template_directory_uri()); ?>/js/js/stickUp.js"></script>
<script src="<?php echo esc_url(get_template_directory_uri()); ?>/js/js/jquery.superslides.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
"use strict";
//<![CDATA[
	$('.header_v1 #banner').superslides({
	  animation: 'fade',
	  play: 5000
	});
//]]>
</script>

<!--for portfolio jquery-->
<script src="<?php echo esc_url(get_template_directory_uri()); ?>/js/js/jquery.isotope.js" type="text/javascript"></script>
<link type="text/css" rel="stylesheet" property="stylesheet" id="theme" href="<?php echo esc_url(get_template_directory_uri()); ?>/css/css/jquery-ui-1.8.16.custom.css">
<link type="text/css" rel="stylesheet" property="stylesheet" href="<?php echo esc_url(get_template_directory_uri()); ?>/css/css/lightbox.min.css">
<script type="text/javascript" src="<?php echo esc_url(get_template_directory_uri()); ?>/js/js/jquery.ui.widget.min.js"></script>
<script type="text/javascript" src="<?php echo esc_url(get_template_directory_uri()); ?>/js/js/jquery.ui.rlightbox.js"></script>

<!--for video lightbox -->
<link rel="stylesheet" property="stylesheet" href="<?php echo esc_url(get_template_directory_uri()); ?>/css/css/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main stylesheet" />
<script src="<?php echo esc_url(get_template_directory_uri()); ?>/js/js/jquery.prettyPhoto.js" type="text/javascript"></script>

<!--contact form js-->


<script src="http://maps.google.com/maps?file=api&amp;v=2.x&amp;key=ABQIAAAAjU0EJWnWPMv7oQ-jjS7dYxSPW5CJgpdgO_s4yyMovOaVh_KvvhSfpvagV18eOyDWu7VytS6Bi1CWxw" type="text/javascript"></script>


<!--about jquery-->
<script src="<?php echo esc_url(get_template_directory_uri()); ?>/js/js/jquery.classyloader.min.js.html"></script>
<script defer src="<?php echo esc_url(get_template_directory_uri()); ?>/js/js/jquery.flexslider.js"></script>
<script src="<?php echo esc_url(get_template_directory_uri()); ?>/js/js/jquery.easing.js"></script>
<script src="<?php echo esc_url(get_template_directory_uri()); ?>/js/js/jquery.mousewheel.js"></script>
<script defer src="<?php echo esc_url(get_template_directory_uri()); ?>/js/js/slideroption.js"></script>

<!--Home Testimonial -->
<script>


</script>

<!--for coundown jquary-->
<script type="text/javascript" src="<?php echo esc_url(get_template_directory_uri()); ?>/js/js/jquery.countTo.js"></script>
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

    // Show/hide course
    $('#dy_course').on('change', function() {
        var getIndex = this.value;
        $('.tab-text').removeClass('course_detail_show');
        $('#'+getIndex).addClass('course_detail_show');
    });



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
</script>


<!--for theme custom jquery-->
<script src="<?php echo esc_url(get_template_directory_uri()); ?>/js/js/custom.js"></script>

</body>
</html>
