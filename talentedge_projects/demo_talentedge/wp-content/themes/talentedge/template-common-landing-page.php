<?php
/**
 * The template for displaying franchise page.
 *
 * Template Name: Common Landing Page
 *
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>
    <?php talentedge_html_tag_schema(); ?>>

    <head>
	<!-- Google Tag Manager -->
<noscript>
<iframe src="//www.googletagmanager.com/ns.html?id=GTM-N35TX7"
height="0" width="0" style="display:none;visibility:hidden"></iframe>
</noscript>
<script>
(function (w, d, s, l, i) {
w[l] = w[l] || []; w[l].push({
'gtm.start':
new Date().getTime(), event: 'gtm.js'
}); var f = d.getElementsByTagName(s)[0],
j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : ''; j.async = true; j.src =
'//www.googletagmanager.com/gtm.js?id=' + i + dl; f.parentNode.insertBefore(j, f);
})(window, document, 'script', 'dataLayer', 'GTM-N35TX7');</script>
<!-- End Google Tag Manager -->


        <meta charset="<?php bloginfo('charset'); ?>">
        <title>Talentedge-Copal Amba</title>
        <link rel="shortcut icon" href="favicon.ico">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

        <!-- Windows Phone -->
        <meta name="msapplication-navbutton-color" content="#14378b">
        <!-- iOS Safari -->
        <meta name="apple-mobile-web-app-status-bar-style" content="#14378b">
        <link rel="icon" type="image/png" sizes="16x16" href="<?php echo esc_url(get_template_directory_uri()); ?>/favicon.png">
        <link rel="apple-touch-icon" href="<?php echo esc_url(get_template_directory_uri()); ?>/favicon.png">
        <link rel="apple-touch-icon" href="<?php echo esc_url(get_template_directory_uri()); ?>/favicon.png">
        <link rel="icon" href="<?php echo esc_url(get_template_directory_uri()); ?>/favicon.png">
        <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <link href="<?php echo esc_url(get_template_directory_uri()); ?>/assets/css/font-awesome.min.css" rel="stylesheet">
        <!-- Animate css -->
        <link type="text/css" rel='stylesheet' href="<?php echo esc_url(get_template_directory_uri()); ?>/assets/css/animate.css">
        <!-- End Animate css -->
        <!-- Bootstrap css -->
        <link type="text/css" rel='stylesheet' href="<?php echo esc_url(get_template_directory_uri()); ?>/assets/bootstrap/css/bootstrap.min.css">
        <link type="text/css" rel='stylesheet' href="<?php echo esc_url(get_template_directory_uri()); ?>/assets/bootstrap-progressbar/bootstrap-progressbar-3.2.0.min.css">

        <!-- End Bootstrap css -->
        <!-- Jquery UI css -->
        <link type="text/css" rel='stylesheet' href="<?php echo esc_url(get_template_directory_uri()); ?>/assets/jqueryui/jquery-ui.css">

        <link type="text/css" rel='stylesheet' href="<?php echo esc_url(get_template_directory_uri()); ?>/assets/jqueryui/jquery-ui.structure.css">
        <!-- End Jquery UI css -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;subset=latin,cyrillic-ext' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
        <link type="text/css" data-themecolor="default" rel='stylesheet' href="<?php echo esc_url(get_template_directory_uri()); ?>/css/common-landing-page-main-default.css">
        <link type="text/css" rel='stylesheet' href="<?php echo esc_url(get_template_directory_uri()); ?>/assets/rs-plugin/css/settings.css">
        <link type="text/css" rel='stylesheet' href="<?php echo esc_url(get_template_directory_uri()); ?>/assets/rs-plugin/css/settings-custom.css">
        <link rel="stylesheet" href="<?php echo esc_url(get_template_directory_uri()); ?>/assets/css/animation.css" type="text/css" media="screen" />
        <link rel="stylesheet" href="<?php echo esc_url(get_template_directory_uri()); ?>/assets/css/remodal.css">
        <link rel="stylesheet" href="<?php echo esc_url(get_template_directory_uri()); ?>/assets/css/remodal-default-theme.css">
        <style>
            .remodal-bg.with-red-theme.remodal-is-opening,
            .remodal-bg.with-red-theme.remodal-is-opened {
                filter: none;
            }

            .remodal-overlay.with-red-theme {
                background-color: #f44336;
            }

            .remodal.with-red-theme {
                background: #fff;
            }
        </style>
        <script src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/js/modernizr.custom.js"></script>
        <?php wp_head(); ?>
    </head>
    <?php
    $uploads = wp_upload_dir();
    ?>

    <body>

        <div id="home" class="home" data-scroll-index="0"></div>
        <header>

            <div class="container b-header__box b-relative">
                <div class="col-lg-9 col-md-9 col-xs-7 col-sm-6 header_image"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/te-logo-new.png" alt="" class="top_left_logo"></div>
                <div class="col-lg-3 col-md-3 col-xs-5 col-sm-6 header_image ">
                    <img src="<?php echo wp_get_attachment_url(get_post_meta(get_the_ID(), 'company_logo', true), 'full') ?>" alt="" class="pull-right logo_right">

                </div>
            </div>
        </header>
        <div class="l-main-container">
            <div id="enquiryID">
                <section class="b-bg-block f-bg-block b-bg-block-meadow">
                    <div id="color-overlay"></div>
                    <div class="container f-center">
                        <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12">
                            <h1 class="heading2">
                                <?php the_title() ?>
                                <?php the_content() ?>
                            </h1>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                            <div class="b-tagline-box b-diagonal-line-bg-light ">
                                <div class="b-tagline-box-inner">
                                    <div class="b-form-row f-primary-l f-title-big c-secondary">Talk to our counsellors to know more about this course</div>
                                    <hr class="b-hr" />
                                    <div class="row b-form-inline b-form-horizontal">
                                        <div class="col-xs-12">
                                          <?php echo do_shortcode("[gravityform id=6 title=false description=false ajax=true tabindex=49]") ?>
                                          <?php //echo do_shortcode(get_post_meta(get_the_id(), 'top_form', true)); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <section class="b-infoblock b-diagonal-line-bg-light b-diagonal-line-bg-light2 f-center" id="why-enrol" data-scroll-index="1">
                <div class="container">
                    <h2 class="f-center f-primary-b f-legacy-h2">Courses</h2>
                    <?php // print_r(get_post_meta(get_the_id(),'courses_details',true)); ?>
                    <div class="b-hr-stars f-hr-stars container">
                        <div class="b-hr-stars__group"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </div>
                    </div>

                    <?php
                    $array   = get_post_meta(get_the_ID(), 'courses_details', true);
                    $faculayArr = array();
                    $i=1;
                    foreach ($array as $pro_id)
                    {
                        $product = wc_get_product($pro_id);

                        //echo $pro_id; c_institute
                        $courseInstitueId = get_field('course_image', $pro_id);
                        $institueLogo     = get_field('logo', $courseInstitueId);
                        $institueName     = get_field('short_name', $courseInstitueId);
                        $cl_startdate2    = get_field('course_start_date', $pro_id, false, false);

                        $course_image       = get_field('course_image', $pro_id);
                        $duration           = get_field('duration', $pro_id);
                        $course_start_date  = get_field('course_start_date', $pro_id);
                        $lastdatetoregister = get_field('front-end_batch_name', $pro_id);
                        $course_short_name  = get_field('course_short_name', $pro_id);
                        $regular_price      = get_field('_regular_price', $pro_id);
                        $cop_usd_price      = get_field('_outside-india_regular_price', $pro_id);
                        $url                = get_permalink($pro_id);
                        $faculty            = get_field('faculty', $pro_id);
                        $faculayArr[]        = $faculty[0];

                        //$regular_price = get_post_meta($pro_id, '_regular_price');
                        //$cop_usd_price = get_post_meta($pro_id, 'cop_usd_price');
                        //echo $image;
                        //echo "<pre>";
                        //print_r($product);
                        //die;
                        ?>
                        <div class="col-md-4 col-sm-6 col-xs-12 f-left">
                            <!--<div class="f-infoblock-with-icon__info_title  f-primary-sb f-uppercase"><?php //echo $institueName; ?></div><br>-->
                            <img src="<?php echo $course_image ?>" alt="wizcraft" />
                            <br>
                            <br>
                            <h2 class="heading"><?= $product->get_title(); ?></h2>
                            <br>
                            <?php echo get_post_meta(get_the_ID(), 'course_tab_'.$i, true); ?>
                            <br>
                            <div class="text-center bgpink">
                                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/icon14.png" alt="calender" class="">
                                <p><font style="font-size:18px !important"><?= $course_start_date; ?></font>
                                    <br><font style="font-size:12px">{Last Date to Apply}</font></p>
                                <!--<img src="images/icon1.png" alt="calender" class="">
                            <p>3 hours on Saturdays from
                            <br>11.00 a.m. to 02.00 p.m. IST</p>-->
                                <p>Fee for Indian Residents: Rs
                                    <?= $regular_price; ?>+ GST</p>
                                <p>Fee for International Students: USD
                                    <?= $cop_usd_price; ?>
                                </p>
                                <a href="#modal3<?=$pro_id;?>"  title="view details" class="btn">View Details</a>
                                <a href="#modal4" title="Apply Now" class="btn">Apply Now</a>
                            </div>
<!--                            <div class="remodal" data-remodal-id="modal3" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
                                <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
                                <div>
                                    <section data-scroll-index="1">
                                        <div class="col-md-6 col-sm-6 col-xs-12  f-left" style="padding:0;">
                                            <div class="img_block" style="background:url(<?php echo $uploads['baseurl'] ?>/common-landing-page/Equity-Research-541x541.jpg) no-repeat">
                                            </div>
                                        </div>
                                       Removed popup box for view details
                                    </section>
                                </div>
                            </div>-->


                            <br>
                            <br>
                        </div>


                        <!--pawan-->
                        <div class="remodal" data-remodal-id="modal3<?=$pro_id;?>" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
                            <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
                            <div>
                                <section data-scroll-index="1">
                                    <div class="col-md-6 col-sm-6 col-xs-12  f-left" style="padding:0;">
                                        <div class="img_block" style="background:url(<?=$course_image;?>) no-repeat">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12 f-left">
                                        <div style="padding:20px 0;">
                                            <div class="popup_content"> <img src="<?php echo wp_get_attachment_url(get_post_meta(get_the_ID(), 'company_logo', true), 'full') ?>" alt="wizcraft" />
                                                <br>
                                                <br>
                                                <h1 class="heading">Equity Research And Company Valuation</h1><br>
                                                <h2 class="heading"><?php echo get_field('who_should_attend_healdine',$pro_id); ?></h2>
                                                 <ul style="margin-top:10px;">
                                                        <?php
                                                           if (have_rows('who_can_participate',$pro_id)):
                                                               while (have_rows('who_can_participate',$pro_id)) : the_row();
                                                                   $ww = 1;
                                                                   ?>
                                                        <li>
                                                            <span style="background-image: url(<?php echo get_sub_field('image'); ?>);"></span>
                                                                <div class="cnt-rotate">
                                                                    <div class="change-angle">
                                                                    <h3><?php echo get_sub_field('title'); ?></h3>
                                                                    </div>
                                                                    <div class="discription">
                                                                    <p><?php echo get_sub_field('description'); ?></p>
                                                                    </div>
                                                                </div>

                                                        </li>
                                                        <?php
                                                           endwhile;
                                                           endif;
                                                           ?>
                                                </ul>



                                                <div class="row clearfix eligibil-grids">
                                                    <?php if (get_field('education',$pro_id))
                                                       { ?>
                                                    <div class="eligibil-left col-md-12 col-sm-12 col-xs-12">
                                                        <h6>Education</h6>
                                                            <h5><?php //echo get_field('eligibility_subheadline',$pro_id); ?></h5>
                                                        <div class="e_content"><?php echo get_field('education',$pro_id); ?></div>
                                                    </div>
                                                    <?php } ?>
                                                    <?php if (get_field('work_experience',$pro_id))
                                                       { ?>
                                                    <div class="eligibil-left col-md-12 col-sm-12 col-xs-12">
                                                            <h6><?php echo get_field('work_experience_headline',$pro_id); ?></h6>
                                                            <div class="e_content"><?php echo get_field('work_experience',$pro_id); ?></div>
                                                    </div>
                                                <?php } ?>
                                                </div>

                                                <br>


                                                <?php
                  $s = 1;
                  if (have_rows('syllabus',$pro_id)):
                      ?>
               <div id="view_Syllabus" class="clearfix">
                  <h2><?php echo get_field('what_youll_learn_headline',$pro_id); ?></h2>
                  <div class="syntax-list">
                     <div class="panel-group" id="accordion">
                        <?php
                           while (have_rows('syllabus',$pro_id)) : the_row();
                               if ($s == 1)
                               {
                                   ?>
                        <div class="panel">
                           <div class="panel-heading">
                              <h4 class="panel-title">
                                <?php echo get_sub_field('headline'); ?>
                              </h4>
                           </div>

                        </div>
                        <?php }
                           else
                           { ?>
                        <div class="panel">
                           <div class="panel-heading">
                             <h4 class="panel-title">
                                <?php echo get_sub_field('headline'); ?>
                              </h4>
                           </div>

                        </div>
                        <?php } ?>
                        <?php $s++;
                           endwhile; ?>
                     </div>
                  </div>
               </div>
               <?php
                  endif;
                  ?>
<!--                                                <br>

                                                <h2 class="heading">Dates & Schedule</h2>

                                                <div class="list" style="margin-top:10px;">

                                                    <p>Last Date to Apply: 25 October 2017</p>
                                                    <p>Duration of the Course: 03 Months</p>
                                                    <p>Schedule of Classes: 3 hours on Saturdays from 11.00 a.m. to 02.00 p.m. IST</p>

                                                </div>
                                                <h2 class="heading">Course Fees</h2>

                                                <div class="list" style="margin-top:10px;">

                                                    <p>For Indian Residents: Rs 20,000+ GST</p>
                                                    <p>For International Students: USD 400</p>
                                                    <p>EMI Option Available</p>

                                                </div>

                                                <br>

                                                <br>-->

                                                <a href="#modal4" title="Enquire Know" class="enquiry">Enquire Now</a>
                                                <br>
                                                <br>
                                            </div>
                                        </div>
                                    </div>

                                </section>
                            </div>
                        </div>

                    <?php $i++; } ?>

                </div>
            </section>
            <section id="about5">
                <div class="">
                    <h2 class="f-center f-primary-b f-legacy-h2"> <?php echo get_post_meta(get_the_ID(), 'course_benefits_label', true); ?></h2>
                    <div class="container">
                        <div class="b-hr-stars f-hr-stars container">
                            <div class="b-hr-stars__group"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12  f-left" style="padding:0; background-color:#F6E94A;">
                        <div class="container text-center padd50">
                            <div class="col-lg-3 col-sm-3 col-md-3">
                                <?php echo get_post_meta(get_the_ID(), 'image_1', true); ?>
                            </div>
                            <div class="col-lg-3 col-sm-3 col-md-3">
                                <?php echo get_post_meta(get_the_ID(), 'image_2', true); ?>
                            </div>
                            <div class="col-lg-3 col-sm-3 col-md-3">
                                <?php echo get_post_meta(get_the_ID(), 'image_3', true); ?>
                            </div>
                            <div class="col-lg-3 col-sm-3 col-md-3">
                                <?php echo get_post_meta(get_the_ID(), 'image_4', true); ?>
                            </div>
                        </div>
                    </div>
            </section>
            <div class="clearfix"></div>
            <section id="about1">
                <div class="container">
                    <h2 class="f-center f-primary-b f-legacy-h2"><?php echo get_post_meta(get_the_ID(), 'who_should_attend', true); ?></h2>
                    <div class="b-hr-stars f-hr-stars container">
                        <div class="b-hr-stars__group"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12  f-left" style="padding:0;">
                        <div class="col-lg-4 col-sm-4 col-md-4 nopadding">
                             <?php echo get_post_meta(get_the_ID(), 'section_1', true); ?>
                        </div>
                        <div class="col-lg-4 col-sm-4 col-md-4 nopadding">
                             <?php echo get_post_meta(get_the_ID(), 'section_2', true); ?>
                        </div>
                        <div class="col-lg-4 col-sm-4 col-md-4 nopadding">
                             <?php echo get_post_meta(get_the_ID(), 'section_3', true); ?>
                        </div>
                    </div>
                </div>
            </section>
            <section id="about2">
                <div class="container">
                    <h2 class="f-center f-primary-b f-legacy-h2">Faculty</h2>
                    <div class="b-hr-stars f-hr-stars container">
                        <div class="b-hr-stars__group"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </div>
                    </div>

                    <?php
                    $fid              = $faculayArr[0];
                    if($fid!=''){
                    $vlink            = get_field('video_link', $fid);
                    $designation      = get_field('designation', $fid);
                    $name             = get_the_title($fid);
                    $select_institute = get_field('select_institute', $fid);
                    $excerpt          = get_field('excerpt', $fid);
                    $instname         = get_field('short_name', $select_institute);
                    $faculty_image    = get_featured_image($fid, 'faculty');
                    ?>


                   <div class="col-md-12 col-sm-12 col-xs-12  f-left" style="padding:0;">
                        <div class="col-lg-2 col-sm-2 col-md-2">
                            <img src="<?php echo $faculty_image; ?>" alt="<?=$name;?>" class="" />
                        </div>
                        <div class="col-lg-10 col-sm-10 col-md-10">
                            <span class="h2tag"><h2><?=$name;?></h2></span>
                            <span class="h4tag"><h4><?php echo $designation; ?></h4></span>
                        </div>
                        <p><?php echo $instname; ?> </p>
                        <p><?php echo $excerpt; ?></p>
                    </div>

                    <?php } ?>
                </div>
            </section>
            <section id="about4">
                <div class="">
                    <h2 class="f-center f-primary-b f-legacy-h2"><?php echo get_post_meta(get_the_ID(), 'talentedge_way_label', true); ?></h2>
                    <div class="b-hr-stars f-hr-stars container">
                        <div class="b-hr-stars__group"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12  f-left bggrey" style="padding:0;">
                        <div class="container">
                            <div class="col-lg-3 col-sm-3 col-md-3 text-center">
                                <?php echo get_post_meta(get_the_ID(), 'twsection_1', true); ?>
                            </div>
                            <div class="col-lg-3 col-sm-3 col-md-3 text-center">
                                <?php echo get_post_meta(get_the_ID(), 'twsection_2', true); ?>
                            </div>
                            <div class="col-lg-3 col-sm-3 col-md-3 text-center">
                                <?php echo get_post_meta(get_the_ID(), 'twsection_3', true); ?>
                            </div>
                            <div class="col-lg-3 col-sm-3 col-md-3 text-center">
                                <?php echo get_post_meta(get_the_ID(), 'twsection_4', true); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <div class="clearfix"></div>
            <section id="about1">
                <div class="container">
                    <h2 class="f-center f-primary-b f-legacy-h2 mar50"><?php echo get_post_meta(get_the_ID(), 'about_page_title', true); ?></h2>
                    <div class="b-hr-stars f-hr-stars container">
                        <div class="b-hr-stars__group"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12  f-left" style="padding:0;">
                        <p>
                            <?php echo get_post_meta(get_the_ID(), 'about_page_description', true); ?>
                        </p>
                    </div>
                </div>
            </section>
            <section id="about">
                <div class="container">
                    <h2 class="f-center f-primary-b f-legacy-h2"><?php echo get_post_meta(get_the_ID(), 'about_title', true); ?></h2>
                    <div class="b-hr-stars f-hr-stars container">
                        <div class="b-hr-stars__group"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12  f-left" style="padding:0;">
                        <p>
                            <?php echo get_post_meta(get_the_ID(), 'about_description', true); ?>
                        </p>
                    </div>
                </div>
            </section>
            <section id="about3">
                <div class="container">
                    <h2 class="f-center f-primary-b f-legacy-h2"> <?php echo get_post_meta(get_the_ID(), 'eligibility', true); ?></h2>
                    <div class="b-hr-stars f-hr-stars container">
                        <div class="b-hr-stars__group"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12  f-left" style="padding:0;">
                        <?php echo get_post_meta(get_the_ID(), 'eligibility_description', true); ?>
                    </div>
                </div>
            </section>
            <section id="about6">
                <div class="scroll container-fluid">
                    <div class="container">
                        <h2 class="f-center f-primary-b f-legacy-h2"><?php echo get_post_meta(get_the_ID(), 'title', true); ?></h2>
                        <div class="b-hr-stars f-hr-stars container">
                            <div class="b-hr-stars__group"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="main_container form">
                                    <span><?php echo get_post_meta(get_the_ID(), 'get_In_touch_description', true); ?></span>
                                    <div class="bg_blue2">
                                        <?php echo do_shortcode(get_post_meta(get_the_ID(), 'bottom_form', true)); ?>
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
                        <?php echo get_post_meta(get_the_ID(), 'terem_and_condition', true); ?>
                    </div>
                </div>
            </div>
        </footer>

        <?php wp_footer(); ?>
             <div class="remodal remodal2" data-remodal-id="modal4" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
                <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
                  <div class="">
                    <?php echo do_shortcode("[gravityform id=26 title=false description=false ajax=true tabindex=49]") ?>
                 </div>
            </div>
        <!-- bootstrap -->
        <script src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/js/scrollspy.js"></script>
        <script src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/bootstrap-progressbar/bootstrap-progressbar.js"></script>
        <script src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/bootstrap/js/bootstrap.min.js"></script>
        <!-- end bootstrap -->
        <script src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/jqueryui/jquery-ui.js"></script>
        <script src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/js/j.placeholder.js"></script>
        <script src="<?php echo esc_url(get_template_directory_uri()); ?>/js/common-landing-page-user.js"></script>
        <script src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/js/fontawesome-markers.js"></script>
        <script src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/js/remodal.js"></script>

    </body>

</html>
