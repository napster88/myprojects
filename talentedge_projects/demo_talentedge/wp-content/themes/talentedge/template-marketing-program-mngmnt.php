<?php
/**
 * The template for displaying about us page.
 *
 * Template Name: Marketing program management
 *
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> <?php talentedge_html_tag_schema(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="theme-color" content="#73a3c2" id="themeColor">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width">
<meta name="theme-color" content="#14378b">
<!-- Windows Phone -->
<meta name="msapplication-navbutton-color" content="#14378b">
<!-- iOS Safari -->
<meta name="apple-mobile-web-app-status-bar-style" content="#14378b">

<link rel="icon" type="image/png" sizes="16x16" href="<?php echo esc_url( get_template_directory_uri() ); ?>/favicon.png">
<link rel="apple-touch-icon" href="<?php echo esc_url( get_template_directory_uri() ); ?>/favicon.png">
<link rel="apple-touch-icon" href="<?php echo esc_url( get_template_directory_uri() ); ?>/favicon.png">
<link rel="icon" href="<?php echo esc_url( get_template_directory_uri() ); ?>/favicon.png">
<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">


<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/marketing.css" rel="stylesheet">
<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/theme_custom.css" rel="stylesheet">
<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/marketing-landing.css" rel="stylesheet">
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/vendor/jquery/dist/jquery.min.js"></script>

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


<?php wp_head(); ?>
</head>
<?php 
$courseId =  get_field('select_course') ; 
$batch_name =  get_field('batch_name' ,$courseId);
$courseshort_name =  get_field('course_short_name' ,$courseId); 
$bannerImage = get_field('banner_image');
$course_lastdate =  get_field('front-end_batch_name',$courseId);
// $global_lastdate =  get_field('global_last_date', 'option');
//  if($global_lastdate){
//     $lastDate = $global_lastdate;
//  }
//  else{
//     $lastDate = $course_lastdate;
//  }
$lastDate = get_course_lastdate($courseId);



if($bannerImage){
    $bimage = $bannerImage;
}


?>
<input type="hidden" id="<?php echo $course_lastdate; ?>" class="utm_coursedata " value="<?php echo  $batch_name; ?>">
<input type="hidden" id="<?php echo $global_lastdate; ?>" class="utm_course_shortname" data="<?php echo $lastDate; ?>" value="<?php echo  $courseshort_name; ?>">

<style>
 /*.zopim ,#subscibe-section{
    display: none!important;
 }*/

 .coverImg .overlay {
   background-color: rgba(0,0,0,0);
}
.post-content img{
    display:inline-block;
    margin-left: 3px;
}



</style>
<body <?php body_class();?>>
    <!-- ~~~~~~~~~~ header ~~~~~~~~~~ -->
    <header id="header">
        <nav class="navbar yamm navbar-talent" role="navigation">
            <div class="navbar-header">
                <!-- <a href="../" class="navbar-brand"><img src="<?php echo get_field('logo','option')?>" /></a> -->
            </div>
            <div class="pull-right marketing_logo">
                <?php $in_id = get_field('select_institute');
                 $inshort_name = get_field('short_name',$in_id);
                $in_logo = get_field('logo', $in_id);
                ?>
                <img src="<?php echo $in_logo;?>" />
            </div>
        </nav>
    </header>
 <input type="hidden" class="utm_institute" value="<?php echo  $inshort_name; ?>">  
    <!-- ~~~~~~~~~~ main wrapper ~~~~~~~~~~ -->
    <section class="main-wrapper">
        <div class="cover_nav">
            <div class="secondaryNav">
                <div class="container">
                    <div class="valign">
                        <ul id="list_scroll" class="nav">
                            <li><a href="#view_programe_Highlights">HIGHLIGHTS</a></li>
                            <li><a href="#view_programe_Detail">DETAILS</a></li>
                            
                            <?php
                                $mmenu = 1;
                                // check if the repeater field has rows of data
                                if( have_rows('content_section') ):

                                    // loop through the rows of data
                                    while ( have_rows('content_section') ) : the_row();
                                
                                    ?>
                                      <li><a href="#view_<?php echo $mmenu;?>"><?php echo get_sub_field('headline');?></a></li>


                                    <?php
                                       
                                    $mmenu++;
                                    endwhile;
                                endif;

                                ?>
                            <li><a href="#view_Faculty">FACULTY</a></li>
                            <li><a href="#view_aluminis">Alumni</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div id="view_hero" style="background-image: url(<?php echo $bimage; ?>);" class="te-banner-top coverImg">
            <div class="container">
                <div class="left-te zIndex2 col-md-8 col-sm-12 col-xs-12">
                    <div class="row wow slideInLeft">
                        <div class="banner-components">
                            <h3><?php echo get_field('tagline');?></h3>
                            <h1><?php echo get_field('headline');?></h1>
                            <p><?php echo get_field('subheadline');?></p>
                        </div>
                    </div>
                </div>
                <div class="right-te col-md-4 col-sm-4 xs-hidden">
                    <div class="coverCard">
                        <div class="batch-Card">
                            <div class="guidForm">
                            <p class="form_head">Drop your details to know more about programme</p>
                               <?php
                                    echo do_shortcode('[gravityform id=7 title=false description=false ajax=true tabindex=50]');
                                ?>
                                <!--  <?php if($lastDate): ?>
                                <div class="text-center last_duration"><span><?php //echo "Last date of application:"." ".$lastDate; ?></span></div>
                                <?php endif; ?> -->
                                <div class="text-center last_duration"><span><?php echo "Last date of application: 30/04/2017 "?></span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <span class="overlay"></span>
        </div>
        <div class="clearfix twoColumn-layout">
            <div class="container">
                <div class="left-te col-md-8 col-sm-12 col-xs-12">
                <!-- <h2><?php //echo get_field('h_headline');?></h2> -->
                    <div class="row">
                        <div id="view_programe_Highlights" class="">
                            <div class="">
                                <div class="icon_grids row wow slideInLeft">
                                    <?php

                                    // check if the repeater field has rows of data
                                    if( have_rows('highlights') ):

                                        // loop through the rows of data
                                        while ( have_rows('highlights') ) : the_row();

                                        ?>
                                         <div class="twoColumn-grid col-md-6 col-sm-6 col-xs-6 col-xss-12">
                                        <div class="left"><i class="fa <?php echo get_sub_field('icon')?>"></i></div>
                                        <div class="right">
                                            <h3><?php echo get_sub_field('headline')?></h3>
                                            <p><?php echo get_sub_field('subheadline')?></p>
                                        </div>
                                    </div>

                                        <?php

                                        endwhile;

                                    endif;

                                    ?>
                                </div>
                            </div>

                            <!-- Show rard side card for mobile -->
                            
                            <!-- end card for mobile -->
                        </div>
                        <div class="batch-Card ">
                            <div class="guidForm">
                               <?php
                                    echo do_shortcode('[gravityform id=12 title=false description=false ajax=true tabindex=75]');
                                ?>
                                <?php if($lastDate): ?>
                                <div class="text-center last_duration"><span><?php echo "Last date of application:"." ".$lastDate; ?></span></div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div id="view_programe_Detail" class="">
                            <div class="mr-programDetail wow slideInLeft">
                                <h2><?php echo get_field('p_headline');?></h2>
                                <div class="tab_detail">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs" role="tablist">
                                        <?php
                                        $t=1;
                                    // check if the repeater field has rows of data
                                    if( have_rows('program_details') ):
                                      
                                        // loop through the rows of data
                                        while ( have_rows('program_details') ) : the_row();
                                        if ($t==1){ $ac = 'active';}else{$ac='';}
                                        ?>
                                          <li role="presentation" class="<?php echo $t." ".$ac;?>"><a href="#tab_<?php echo $t;?>" aria-controls="tab_fee_shedule" role="tab" data-toggle="tab"><?php echo get_sub_field('headline')?></a></li>

                                        <?php
                                        $t++;
                                        endwhile;

                                    echo '</ul>';
                                    endif;

                                    ?>
                                      
                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        
                                        <?php
                                        $tt=1;;
                                    // check if the repeater field has rows of data
                                    if( have_rows('program_details') ):

                                        // loop through the rows of data
                                        while ( have_rows('program_details') ) : the_row();
                                        if ($tt==1){ $ac2 = 'active';}else{$ac2='';}
                                        ?>
                                         <div role="tabpanel" class="tab-pane <?php echo $ac2;?>" id="tab_<?php echo $tt;?>">
                                           <?php echo get_sub_field('content');?>
                                        </div>

                                        <?php
                                        $tt++;
                                        endwhile;

                                    endif;

                                    ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 xs-hidden"></div>
            </div>
             <?php
            $p = 1;
            // check if the repeater field has rows of data
            if( have_rows('content_section') ):
                $output='';
                // loop through the rows of data
                while ( have_rows('content_section') ) : the_row();
                if (get_sub_field('background_image')){
                    $bimgae = get_sub_field('background_image');
                    $output = 'style="background-image: url("'.$bimgae.'")';
                }
                else{
                    $bimgae='';
                }
                ?>

                <?php if ($bimgae)  {?>
                <div id="view_<?php echo $p;?>" class="institute-fluid coverImg" style="background-image: url('<?php echo $bimgae;?>')">
                    <div class="container zIndex2">
                        <div class="col-md-8 col-sm-12  col-xs-12 institute_left">
                            <div class="row shortNotice_institute_list">
                            <h2 class="head-title white"><?php echo get_sub_field('headline');?></h2>
                                <div class="post-content list-arrow-white">
                                    <?php echo get_sub_field('content');?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <span class="overlay"></span>
                </div>
                <?php  } 
                else { ?>

                <div id="view_<?php echo $p;?>" class="">
                    <div class="container">
                        <div class="col-md-8 col-sm-12  col-xs-12 institute_left">
                            <div class="row shortNotice_institute_list">
                            <h2 class="head-title"><?php echo get_sub_field('headline');?></h2>
                                <div class="post-content list-arrow-white black-arrow">
                                    <?php echo get_sub_field('content');?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php } ?>


                <?php
                $p++;
                endwhile;
            endif;

            ?>
            <div id="view_Faculty" class="view_Faculty ">
                <div class="container">
                    <div class="">
                        <div class="clearfix"><h2>Faculty</h2></div>
                    </div>
                    <div class="clearfix">
                       <div class="flex-row faculty-video-poster">
                            <div class="col-md-8 col-sm-12 col-xs-12">
                                <div class="row">
                                    <?php 
                                    $instrcutors = get_field('faculty');
                                    if( $instrcutors ): ?>
                                        <?php foreach( $instrcutors as $instrcutor ):
                                            $instrcutor_id = $instrcutor->ID;
                                            $i_designation = get_field('designation', $instrcutor_id); 
                                            $i_description = get_field('description', $instrcutor_id);
                                            $i_title = get_the_title($instrcutor_id);
                                            $i_excerpt =  get_field('excerpt', $instrcutor_id);
                                             $feat_image = wp_get_attachment_url( get_post_thumbnail_id($instrcutor_id));

                                             if ($feat_image){
                                                $i_profile_image = $feat_image;
                                            }
                                            else{
                                                 $i_profile_image = get_field('default_faculty_image', 'option');
                                            }
                                         ?>
                                            <div class="avatarFaculty">
                                                <div class="avator" style="background-image: url(<?php echo $i_profile_image;?>)"></div>
                                                <!-- <img src="<?php //echo $i_profile_image;?>"/> -->
                                                <div class="contextFaculty">
                                                    <a href="<?php echo get_permalink($instrcutor_id)?>" target="_blank"><h3><?php echo  $i_title;?></h3></a>
                                                    <div class="faculty_domain"><?php echo $i_designation;?></div>
                                                    <p><?php echo $i_excerpt;?></p>
                                                   <!--  <div class="faculty_from"><?php
                                                    $f_inst_id = $bcourse['inst'];
                                                    echo $f_inst_name = get_field('short_name',$f_inst_id);
                                                    ?></div> -->

                                                    <?php if(get_field('email',$instrcutor_id)) { ?>
                                                    <div class="faculty_mail"><i class="fa icon-email">
                                                        
                                                        </i>
                                                        <a href="mailto:<?php echo get_field('email',$instrcutor_id) ;?>"><?php  echo get_field('email',$instrcutor_id);?>
                                                            
                                                        </a>
                                                    </div>
                                                    <?php } ?>
                                            </div>
                                            </div>

                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php if (get_field('alumni') || get_field('testimonials') ) {?>
            <div id="view_aluminis" class="">
                <div class="container">
                    <div class="col-md-8 col-sm-12 col-xs-12">
                        <div class="row">
                            <div class="alumnis-widget wow slideInLeft">
                            <?php
                            $d_alumni = get_field('alumni');
                                        //print_r($d_alumni);

                                        if( $d_alumni ):
                            ?>
                                <h2>Our Alumni</h2>
                                <div class="alumnis-list owl-carousel row">
                                        <?php
                                        
                                        
                                            foreach( $d_alumni as $ma ): 
                                                $d_alumni_v = $ma->ID;
                                        ?>
                                        <?php 
                                        $a_profile_image = get_featured_image($d_alumni_v, 'faculty'); 
                                        ?>
                                        <div class="item">
                                            <div class="alumni_avator">
                                                <img src="<?php echo $a_profile_image;?>"/>
                                            </div>
                                            <div class="detailAlumni">
                                                <h3><?php echo get_the_title($d_alumni_v); ?></h3>
                                                <h4><?php echo get_field('designation', $d_alumni_v); ?></h4>
                                                <h5><?php echo get_field('company', $d_alumni_v); ?></h5>
                                                
                                            </div>
                                        </div>
                                        <?php
                                            endforeach;
                                            wp_reset_postdata();
                                           
                                        ?>
                                </div>
                            <?php  endif; ?>
                                <div class="learner-spearkers">
                                    <div class="learner-list owl-carousel">
                                       
                                       <?php

                                            $d_testimonials = get_field('testimonials');
                                            //print_r($d_testimonials);
                                                    if( $d_testimonials ):
                                                        foreach( $d_testimonials as $d_testimonial ): 

                                            $testimonial_image_value = get_featured_image($d_testimonial, 'faculty');

                                            $t_id = $d_testimonial->ID;
                                            
                                            $t_name = get_the_title($t_id);
                                            $t_designation = get_field('designation', $t_id);
                                            $t_company = get_field('company', $t_id);

                                            $t_course = get_field('select_course', $t_id);
                                            $t_batch_id = get_field('select_batch', $t_id);
                                             $t_batch = get_field('batch_name', $t_batch_id);
                                            $t_testimonial = get_field('testimonial', $t_id);
                                                  
                                                    ?>

                                                    <div class="item">
                                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                                            <div class="speaker_avator">
                                                                <div class="cover_avator">
                                                                    <img class="img-responsive img-circle" src="<?php echo $testimonial_image_value;?>" />
                                                                </div>
                                                                <h3><?php echo $t_name;?></h3>
                                                                <h5><?php echo $t_designation;?>, <?php echo $t_company;?></h5>
                                                                <h5><?php echo $t_batch;?></h5>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-9 col-sm-9 col-xs-12 text-center quotes">
                                                            <p>
                                                                <?php echo $t_testimonial?>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <?php
                                            endforeach;
                                                        wp_reset_postdata();
                                                        endif;
                                            ?>
                                    
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </section>

    <!-- ~~~~~~~~~~ news letter ~~~~~~~~~~ -->
    <!-- <section class="subscibe-section" id="subscibe-section">
        <div class="subscibe text-center">
            <h2>Not sure which course to take, Lets talk</h2>
            <?php echo do_shortcode('[gravityform id=1 title=false ajax=true tabindex=98 ]'); ?>
        </div>
    </section> -->

    <div class="container">
        <h2>Get In Touch</h2>
        <div class="article_btm">
            <?php 
                echo do_shortcode('[gravityform id=23 title=false description=false ajax=true tabindex=38]');
            ?>
        </div>
    </div>

    <!-- ~~~~~~~~~~ footer ~~~~~~~~~~ -->
    <footer>
        <!-- <section class="container">
            <div class="row">
            <div class="col-md-8 col-sm-12 col-xs-12 overHide">
                <div class="row">
                    <div class="col-md-3 toggle">
                        <div class="inner">
                            <h5>Home</h5>
                            <ul class="li">
                                <li><a href="<?php echo home_url();?>/browse-courses">Browse Courses</a></li>
                                <li><a href="<?php echo home_url();?>/institute">Institutions</a></li>
                                <li><a href="<?php echo home_url();?>/enterprise">Enterprise</a></li>
                                <li><a href="http://www.talentedge.in/blog/" target="_blank">Blog</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 toggle">
                        <div class="inner">
                            <h5>Talentedge</h5>
                            <ul class="li">
                                <li><a href="<?php echo home_url();?>/about-us">About Us</a></li>
                                <li><a href="<?php echo home_url();?>/ask-pro">Ask Pro</a></li>
                                <li><a href="<?php echo home_url();?>/pro-talk">Pro Talk</a></li>
                                <li><a href="<?php echo home_url();?>/selfie-scan">Selfie Scan Test</a></li>
                                <li><a href="<?php echo home_url();?>/media">Media</a></li>
                                <li><a href="<?php echo home_url();?>/articles">Articles</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 toggle">
                        <div class="inner">
                            <h5>Usage</h5>
                            <ul class="li">
                                <li><a href="<?php echo home_url();?>/terms-of-use">Terms of Use</a></li>
                                <li><a href="<?php echo home_url();?>/privacy-policy">Privacy Policy</a></li>
                                <li><a href="<?php echo home_url();?>/end-user-agreement">End User Agreement</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 toggle">
                        <div class="inner">
                            <h5>Contact</h5>
                            <ul class="li">
                                <li><a href="#">For Learners</a></li>
                                <li><a href="#">For Corporates</a></li>
                                <ul class="social-links list-inline"> 
                                    <!-- <li><a href="https://goo.gl/62i82A" target="_blank">
                                        <i class="fa fa-linkedin fa-2x"></i>
                                    </a></li> --> 
                                    <!--<li><a href="<?php echo get_field('facebook','option')?>" target="_blank">
                                        <i class="fa icon-facebook"></i>
                                    </a></li> 
                                    <li><a href="<?php echo get_field('twitter','option')?>" target="_blank">
                                        <i class="fa fa-twitter icon-twitter"></i></a></li> 
                                    <li><a href="<?php echo get_field('google_plus','option')?>" target="_blank">
                                        <i class="fa icon-google"></i>
                                    </a></li> 
                                </ul>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-12 col-xs-12 pull-right overHide">
                <div class="text-center">
                    <h4 class="ucase"><?php echo get_field('app_headline','option')?></h4>
                    <a href="<?php echo get_field('android_link','option')?>"><img src="<?php echo get_field('footer_google_play_icon','option');?>" class="inline" /></a>
                    <a href="<?php echo get_field('ios_link','option')?>"><img src="<?php echo get_field('footer_ios_icon','option');?>" class="inline" /></a>
                </div>
            </div>
            </div>
        </section> -->
        <div class="footer_copyrights clearfix">
            <div class="container">
                <div class="col-md-6 col-sm-6 col-xs-8 col-ft">Copyright © 2016 <span class="text-uppercase">TALENTEDGE</span> All rights reserved.</div>
                <div class="col-md-6 col-sm-6 col-xs-4 text-right col-ft">Crafted by 
                <a title="Best User Experience UX/UI India" href="https://inkoniq.com/" target="_blank">INKONIQ</a></div>
            </div>
        </div>
    </footer>
    <?php wp_footer(); ?>
    <!-- footer end -->
    
    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/theme_scripts.js"></script>
    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/theme_custom.js"></script>
    <script>
    var $ = jQuery;

$(document).ready(function() {
   // $('#input_7_16').val('<?php echo get_the_title();?>');
    /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        Nav sticky
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
        function stickyNav() {
            var el = $('.cover_nav'),
                waypoint = new Waypoint({
                    element: el,
                    handler: function(direction) {
                        if (direction === 'down') {
                            el.addClass('stickMe');
                        } else {
                            el.removeClass('stickMe');
                        }
                    }
                })
        }
        stickyNav();

    $('.nav-tabs').tab();

    /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        WOW Animate Init
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
        if ($('.wow').length > 0) {
            wow = new WOW(
                {
                    boxClass:     'wow',      // default
                    animateClass: 'animated', // default
                    offset:       0,          // default
                    mobile:       true,       // default
                    live:         true        // default
                }
            )
            wow.init();   
        }

    /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        Material input animation 
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
        function materialInput(){
            $(".mat-input").focus(function(){
                $(this).parent().addClass("is-active is-completed");
            });

            $(".mat-input").focusout(function(){
                if($(this).val() === "")
                    $(this).parent().removeClass("is-completed");
                $(this).parent().removeClass("is-active");
            })
        }
        materialInput();

    /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        Owl Init
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
        var learnerList = $('.learner-list').length;
        if (learnerList > 0) {
            $('.learner-list').owlCarousel({
                margin: 5,
                loop: false,
                items: 1,
                nav: false,
                dots: true,
                mouseDrag: false,
                responsive: {
                    0: {
                        items: 1
                    },
                    569: {
                        items: 2
                    },
                    1024: {
                        items: 1,
                        autoplay: true
                    }
                }
            });
        }

        if ($('.mb-carousel').length > 0) {
            $('.mb-carousel').owlCarousel({
                loop: false,
                items: 4,
                nav: false,
                dots: true,
                mouseDrag: false,
                responsive: {
                    0: {
                        items: 1,
                        dots: true
                    },
                    569: {
                        items: 2,
                        dots: true
                    },
                    1024: {
                        items: 4,
                        dots: false,
                        autoplay: true
                    }
                }
            });
        }
        if ($('.alumnis-list').length > 0) {
            $('.alumnis-list').owlCarousel({
                loop: false,
                items: 3,
                nav: false,
                dots: false,
                mouseDrag: false,
                responsive: {
                    0: {
                        items: 1,
                        dots: true
                    },
                    567: {
                        items: 2,
                        dots: true
                    },
                    1024: {
                        items: 3,
                        dots: false,
                        autoplay: true
                    }
                }
            });
        }

    /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        Scrollspy active classes for navigation 
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
        if ($('.secondaryNav').length > 0) {
            $('body').scrollspy({target: ".secondaryNav", offset: 57});

            // Add smooth scrolling on all links inside the navbar
            $("#list_scroll a").on('click', function(event) {
                if (this.hash !== "") {
                    event.preventDefault();
                    var hash = this.hash;

                    $('html, body').animate({
                        scrollTop: $(hash).offset().top - 56
                    }, 800, function() {
                        // window.location.hash = '';
                    });
                }
            });
        }
    /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ 
        Footer list toggle on mobile
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
        
        $('footer .toggle h5').on('click', function(e) {
            e.preventDefault();
            var parent = $(this).parents('.toggle');
            parent.toggleClass('selected');
            parent.siblings().removeClass('selected');

            parent.siblings().find('.li').slideUp();
            parent.find('.li').slideToggle('fast');
        });


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

  /*utm tracking*/

        var utm_source =  getParameterByName('utm_source');
        var utm_medium =  getParameterByName('utm_medium');
        var utm_campaign =  getParameterByName('utm_campaign');
        var utm_term =  getParameterByName('utm_term');
        var utm_coursedata = $('.utm_coursedata').val();
        var courseshortname = $('.utm_course_shortname').val();
        var instshortname = $('.utm_institute').val();
        //console.log(courseshortname);
        
        if(utm_source != ''){
          $('#input_7_4').val(utm_source);
          $('#input_12_4').val(utm_source);
          $('#input_23_4').val(utm_source);
          $('#input_1_10').val(utm_source);
        }
        if(utm_medium != ''){
          $('#input_7_5').val(utm_medium);
          $('#input_12_5').val(utm_medium);
          $('#input_23_5').val(utm_medium);
          $('#input_1_11').val(utm_medium);
        }

        if(utm_campaign != ''){
          $('#input_7_6').val(utm_campaign);
          $('#input_12_6').val(utm_campaign);
          $('#input_23_6').val(utm_campaign);
          $('#input_1_12').val(utm_campaign);
        }

        if(utm_term != ''){
          $('#input_7_7').val(utm_term);
          $('#input_12_7').val(utm_term);
          $('#input_23_7').val(utm_term);
          $('#input_1_13').val(utm_term);
        }
        
        if(utm_term == null){
            $('#input_7_7').val(utm_coursedata);
            $('#input_12_7').val(utm_coursedata);
            $('#input_1_13').val(utm_coursedata);
            $('#input_23_7').val(utm_coursedata);
        }
          
          $('#input_7_15').val(courseshortname);
          $('#input_12_15').val(courseshortname);
          $('#input_23_15').val(courseshortname);
          $('#input_1_14').val(instshortname);
          $('#input_7_16').val(instshortname);
          $('#input_12_16').val(instshortname);
          $('#input_23_16').val(instshortname);
          $('#input_1_15').val(courseshortname);
          $('#input_7_17').val('<?php echo $courseId ;?>');
          $('#input_12_17').val('<?php echo $courseId ;?>');
          $('#input_23_17').val('<?php echo $courseId ;?>');


</script>



</body>

</html>
    
    
<?php ?>