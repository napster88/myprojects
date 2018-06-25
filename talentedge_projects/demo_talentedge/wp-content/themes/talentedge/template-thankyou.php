<?php
/**
 * The template for displaying about us page.
 *
 * Template Name: Thank you page
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
<link href="<?php echo esc_url(get_template_directory_uri()); ?>/css/lp-style.css" rel="stylesheet">
<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/theme_custom.css" rel="stylesheet">
<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/thankyou.css" rel="stylesheet">
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/vendor/jquery/dist/jquery.min.js"></script>
<!-- Google Tag Manager -->
<noscript>
<iframe src="//www.googletagmanager.com/ns.html?id=GTM-N35TX7"
height="0" width="0" style="display:none;visibility:hidden"></iframe>
</noscript>
<script>
var dataLayer = dataLayer || [];
</script>
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

<script>
  dataLayer = [{
    'userId': "<?php echo $_COOKIE['nab_email'];?>"
  }];
</script>
<?php wp_head(); ?>
</head>
<input type="hidden" class="utm_coursedata" value="xlri-digitalmarketing-batch2">

        <!-- ~~~~~~~~~~~~~ top banner ~~~~~~~~~~~~~ -->
        <?php if($_GET['pid']=='33767'){
                $uname = $_REQUEST['uname'];?>
              <section class="main-wrapper">
                   <div class="container-fluid banner_secret">
	<div class="row">
    	<div class="col-lg-12">
        	<img src="<?php echo esc_url(get_template_directory_uri()) ?>/images/tlt-logo.png" alt="talentedge" class="logo"/>
                <img src="https://2jb9j7n786y2mcpn640xb9un-wpengine.netdna-ssl.com/wp-content/uploads/2016/11/VIL-New-Logo.jpg" class="logo" />
            <div class="bottom-space bnr_top_head">Yay! <?php echo $uname;?></div>
            <p>Your seat is confirmed for the "Live Talk Series"</p>
            <p>Check your email in a couple of minutes for your login details. </p>
            <div class="top-space bnr_top_head" style="display:none;"><span>Invite a Friend</span> </div>
            <p style="display:none;">to register and <span>Spread the Happiness</span></p>
            <div class="bottom-space-2" style="display:none;">
                <div class="share-buton">
                    <a href="#"><img src="<?php echo esc_url(get_template_directory_uri()) ?>/images/facebook.png" alt="share-on-facebook" /></a>
                </div>
                <div class="share-buton">
                    <a href="#"><img src="<?php echo esc_url(get_template_directory_uri()) ?>/images/twitter.png" alt="share-on-twitter" /></a>
                </div>
                <div class="share-buton">
                    <a href="#"><img src="<?php echo esc_url(get_template_directory_uri()) ?>/images/linked-in.png" alt="share-on-linked-in" /></a>
                </div>
            </div>


        </div>
    </div>
</div>
<div class="container speakers">
		<div class="heading">
        	<h1>Speakers</h1>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12 speaker-profile">
            	<div class="row">
                	<div class="col-lg-4 profile-img">
                    	<img src="<?php echo esc_url(get_template_directory_uri()) ?>/images/nithya-shanti.png" alt="" />
                    </div>
                    <div class="col-lg-8 profile-detail">
                    <h3>Nithya Shanti </h3>
                    <p>Internationally respected<br>spiritual teacher</p>
                    </div>
            	</div>
            </div>
             <div class="col-lg-4 col-md-4 col-sm-12 speaker-profile">
            	<div class="row">
                	<div class="col-lg-4 profile-img">
                    	<img src="<?php echo esc_url(get_template_directory_uri()) ?>/images/sriniwas.png" alt="" />
                    </div>
                    <div class="col-lg-8 profile-detail">
                    <h3>E.S Srinivas </h3>
                    <p>Professor<br>Organizational Behaviour, XLRI</p>
                    </div>
            	</div>
            </div>
             <div class="col-lg-4 col-md-4 col-sm-12 speaker-profile">
            	<div class="row">
                	<div class="col-lg-4 profile-img">
                    	<img src="<?php echo esc_url(get_template_directory_uri()) ?>/images/ashu-calapa_secret.png" alt="" />
                    </div>
                    <div class="col-lg-8 profile-detail">
                    <h3>Aashu Calapa </h3>
                    <p>Director<br>Million Jobs Mission</p>
                    </div>
            	</div>
            </div>
        </div>
        <div class="bottom-line top-space">
        	<h3>See you at the talk guys!</h3>
        </div>
</div>
<div class="btm_blue_strip">
</div>

        <?php }else{?>
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
                        session_start();
                        $_SESSION['leadId'] = $_REQUEST['leadid'];
                        $_SESSION['formId'] = $_REQUEST['formid'];
                        $uname = $_REQUEST['uname'];
                        if( !empty ($_REQUEST['cid']) ){
                            if($_SESSION['formId'] == '4' || $_SESSION['formId'] == '2'){
                                $stringArray = explode('_', $_REQUEST['cid']);
                                $courseId = $stringArray[0];
                            }
                            else{
                              $courseId = $_REQUEST['cid'];
                            }
                        }
                        else{
                          $entry = GFAPI::get_entry( $_SESSION['leadId'] );
                            $courseId = $entry['4'];
                        }
                     ?>
                    <div data="<?php echo $courseId;?>" class="clearfix">
                         <h3 class="text-uppercase"><?php echo $uname; ?>,</h3>
                        <?php

                            if ((!empty($courseId))&& ($courseId!=17875)){
                                $brochureLink  =  get_field('brouchure',$courseId); ?>
                                <h4>We are excited to see your interest in our</h4>
                                <h1><?php echo get_the_title($courseId); ?></h1>
                        <?php }
                        elseif($_REQUEST['pid'] == "22459"){ ?>
                         <h3> <?php echo get_field('default_text')  ?></h3>
                         <?php $brochureLink = "http://talentedge.in/wp-content/uploads/2017/04/EPGPM-Bro-2016-17_1.pdf" ;?>
                       <?php  }
                         else{ ?>
                             <h3> <?php

							 if(($_GET['formid']==30)||($_GET['cid']==17875))
							 {

								echo "Thank you for your interest in Talentedge.  All applicants for this course are required to undergo an eligibility assessment. Please check your email for details.";

							 }
						 else {
						 echo get_field('default_text'); }  ?>
						 </h3>

                        <?php $brochureLink  =  get_field('default_brochure');
                          }  ?>
                        <!-- <p>Help our counselors understand your profile better by sharing more details with us.
                        </p> -->

                        <div class="col-md-8 col-sm-12 col-xs-12">
                            <div class="row">
                            <?php
                            global $post;
                            if($_GET['formid']!=36)
                            {
                                  echo do_shortcode('[gravityform id= 14 title=false tabindex=40 description=false]');
                            }

                            ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="wrapper-btn">
                    <div class="container">
                        <div class="col-md-6 col-sm-8 col-xs-12 left_center">
                            <?php     if($_GET['formid']!=36)
                            {
                            if($brochureLink){ ?>
                            <a href="<?php echo $brochureLink ?>" download="Brochure">
                                <i class="fa icon-download"></i> Download Course Brochure</a>
                            <?php } ?>
                            <a href="<?php echo get_bloginfo('url');?>/browse-courses">
                                <i class="fa icon-my-course "></i>Check our other Programs</a>
                              <?php  } ?>
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
       <?php }?>
    </section>
<?php if($_REQUEST['cid'] == '6700' && $_REQUEST['pid'] == '7747' ) {?>

<!-- Offer Conversion: Digital_Marketing -->
<img src="http://primedigital.go2cloud.org/aff_l?offer_id=848&adv_sub=<?php echo $_REQUEST['pno']; ?>" width="1" height="1" />
<!-- // End Offer Conversion -->

<!-- Offer Conversion: Talentedge Digital-marketing -->
<img src="http://track.opicle.com/aff_l?offer_id=3044&adv_sub=<?php echo $_REQUEST['pno']; ?>" width="1" height="1" />
<!-- // End Offer Conversion -->

<?php } ?>

<?php if($_REQUEST['cid'] == '975' && $_REQUEST['pid'] == '7759' ) {?>
  <!-- Offer Conversion: MICA -->
<img src="http://primedigital.go2cloud.org/aff_l?offer_id=850&adv_sub=<?php echo $_REQUEST['pno']; ?>" width="1" height="1" />
<!-- // End Offer Conversion -->

<?php } ?>


<?php if($_REQUEST['cid'] == '15950' && $_REQUEST['pid'] == '15983' ) {?>
  <!-- Offer Conversion: MICA  Media Management-->
<img src="http://track.opicle.com/aff_l?offer_id=3044&adv_sub=<?php echo $_REQUEST['pno']; ?>" width="1" height="1" />
<!-- // End Offer Conversion -->

<?php } ?>

<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>

</body>
<iframe src="https://learn.indiaeducation.net/tembm/ping.jsp" scrolling="no" frameborder="0" width="1" height="1"></iframe>
<iframe src="https://learn.indiaeducation.net/tetm/ping.jsp" scrolling="no" frameborder="0" width="1" height="1"></iframe>
</html>
