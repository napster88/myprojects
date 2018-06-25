<?php
/**
 * The template for displaying about us page.
 *
 * Template Name: Thank you Xlri
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


<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/vendor/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/theme_custom.css" rel="stylesheet">
<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/thankyou.css" rel="stylesheet">
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

<?php //print_r($_REQUEST); die; ?>
<!-- <input type="hidden" class="utm_coursedata" value="xlri-digitalmarketing-batch2"> -->
<body style="background-image: url('<?php echo get_field("banner_image"); ?>')">
    <!-- ~~~~~~~~~~ header ~~~~~~~~~~ -->
   <header id="header">
        <div class="container">
            <div class="">
                <nav class="navbar yamm navbar-talent" role="navigation">
                    <div class="navbar-header">
                        <a href="<?php echo home_url();?>" class="navbar-brand"><img src="<?php echo get_field('white_logo','option')?>" /></a>
                    </div>
                </nav>
            </div>
        </div>
    </header>
    <!-- ~~~~~~~~~~ main wrapper ~~~~~~~~~~ -->
        <section class="main-wrapper">
        <!-- ~~~~~~~~~~~~~ top banner ~~~~~~~~~~~~~ -->
        <div class="askproSection">
            <div class="sectionBanner">
                <div class="container">
                    <?php
                        if($_REQUEST['entry_name']){
                          $uname = $_REQUEST['entry_name'];
                        }
                        if($_REQUEST['entry_email']){
                          $email = $_REQUEST['entry_email'];
                        }
                        if($_REQUEST['entry_phone']){
                          $phone = $_REQUEST['entry_phone'];
                        }
                        if($_REQUEST['entry_phone']){
                          $city = $_REQUEST['entry_city'];
                        }
                        if($_REQUEST['entry_education']){
                          $education = $_REQUEST['entry_education'];
                        }
                        if($_REQUEST['entry_experience']){
                          $experience = $_REQUEST['entry_experience'];
                        }
                        $courseId = '15891';
                        $batch_name =  get_field('batch_name' ,$courseId);
                        $courseshort_name =  get_field('course_short_name' ,$courseId); 
                        $form_id = 7;
                        $ins_id =  get_field('c_institute' ,$courseId);
                        $inshort_name = get_field('short_name',$ins_id);
                        // add entry

                        if( !empty($uname) && !empty($email) && !empty($phone) )
                        $entry = array(
                            "form_id" => $form_id,
                            "1" => $uname,
                            "3" =>$phone,
                            "7" =>$batch_name,     
                            "8" =>$education,
                            "9" =>$experience,
                            "10" =>$city,
                            "13" =>$email,
                            "15" =>$courseshort_name,
                            "16" =>$inshort_name,
                            "17" =>$courseId,
                        );

                        $entry_id = GFAPI::add_entry($entry);

                        // //session_start(); 
                        // $_SESSION['leadId'] = $_REQUEST['leadid'];
                        // $_SESSION['formId'] = $_REQUEST['formid'];
                        // $uname = $_REQUEST['uname'];
                        // if( !empty ($_REQUEST['cid']) ){
                        //     $courseId = $_REQUEST['cid'];
                        // } 
                        // else{
                        //   $entry = GFAPI::get_entry( $_SESSION['leadId'] ); 
                        //     $courseId = $entry['4'];
                        // }
                     ?>   
                   <div class="clearfix">
                         <h3 class="text-uppercase"><?php echo $uname; ?>,</h3>
                        <?php  
                            if (!empty($courseId)){ 
                                $brochureLink  =  get_field('brouchure',$courseId); ?>
                                <h4>We are excited to see your interest in our</h4>
                                <h1><?php echo get_the_title($courseId); ?></h1>
                        <?php } else{ ?>
                             <h3> <?php echo get_field('default_text')  ?></h3>
                        <?php $brochureLink  =  get_field('default_brochure'); 
                          }  ?>
                        </p> 
                        
                        <div class="col-md-8 col-sm-12 col-xs-12">
                            <div class="row">
                            <?php 
                                //echo do_shortcode('[gravityform id= 14 title=false tabindex=40 description=false]');
                            ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="wrapper-btn">
                    <div class="container">
                        <div class="col-md-6 col-sm-8 col-xs-12 left_center">
                            <?php if($brochureLink){ ?>
                            <a href="<?php echo $brochureLink ?>" download="Brochure">
                                <i class="fa icon-download"></i> Download Course Brochure</a>
                            <?php } ?>
                            <a href="<?php echo get_bloginfo('url');?>/browse-courses">
                                <i class="fa icon-my-course "></i>Check our other Programs</a>
                        </div>
                        <div class="col-md-6 col-sm-4 col-xs-12">
                            <div class="text-right">
                                <div class="callUs">
                                    <span>Call Us:</span> <a href="callto:+91 8376000600">+91 8376000600</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>

</body>

</html>
