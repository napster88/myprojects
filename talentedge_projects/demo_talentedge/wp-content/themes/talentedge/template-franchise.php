<?php
/**
 * The template for displaying franchise page.
 *
 * Template Name: Channel Franchise Page
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


<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 

 

	<!-- Google Tag Manager --> 
	
	<!-- End Google Tag Manager -->	

    <!-- FAVICON  -->
    <!-- Place your favicon.ico in the images directory -->
   <!-- <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">-->
    
    <!-- =========================
       STYLESHEETS 
    ============================== -->
    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/bootstrap/css/bootstrap.min.css">

    <!-- FONT ICONS -->
    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/css/icons/iconfont.css">
    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/css/font-awesome.min.css">
     
    <!-- GOOGLE FONTS -->
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
    
    <!-- PLUGINS STYLESHEET -->
    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/css/magnific-popup.css">
    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/css/owl.carousel.css">
    
    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/css/animate.css">
  
    
 

    <!-- RESPONSIVE FIXES -->
    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/responsive.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

<?php wp_head(); ?>
   
   <!-- CUSTOM STYLESHEET -->
    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/freanchise-style.css">
</head>

<body data-spy="scroll" data-target="#main-navbar">
<div class="overlayCon send-enquiry">
  <div class="overlayBox">
    <div class="overlayClose"></div>
    <div class="overlaypadding">
      <h4 class="text-center">Join Now</h4>
       
      
    </div>
  </div>
</div>

    <!-- Preloader -->
    
    


    <div class="main-container" id="page">

        <!-- =========================
             HEADER 
        ============================== -->
        <header id="nav1-3">
            <nav class="navbar navbar-fixed-top bg-transparent" id="main-navbar">
            
                <div class="container">
                    
                    <div class="navbar-header">
                      
                        <!-- Image Logo For Background Transparent -->
                        <a href="<?php echo site_url() ?>" class="navbar-brand logo-black smooth-scroll"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/te-logo-new.png" alt="logo" /></a>
                        <a href="<?php echo site_url() ?>" class="navbar-brand logo-white smooth-scroll"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/TE-white.png" alt="logo" /></a> 
                    </div><!-- /End Navbar Header -->
                </div>
            </nav>
        </header>
        


        <!-- =========================
            HERO SECTION
        ============================== -->
        <section id="hero9" class="bg-img hero-leadbox p-t-lg p-b-md content-align-md" style="background:#0B8FBF;">
            

            <div class="container">
                <div class="row y-middle">
                    <!-- Intro Text -->
                    <div class="col-sm-12 col-md-7 center-md text-white">
                        <h1><?php the_title() ?></h1>
                        <p class="lead m-b-md"><?php the_content() ?></p> 
                        <div class="imgbanner">  
                        <!--<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/shield.png" alt="shield" class="imgban">  -->
                        </div>           
                    </div>
                    <!-- Quote Form -->
                    <div class="col-sm-12 col-md-5">
						 <h4 class="center-md text-center">Join Now</h4>
                         <?php echo do_shortcode("[gravityform id=26 title=false description=false ajax=true tabindex=49]") ?>
                    </div><!-- /End Quote Form -->
                </div><!-- /End Row -->
            </div><!-- /End Container -->

        </section>
        <!-- /End Hero Section -->



        <!-- =========================
           FEATURES SECTION 
        ============================== -->
        <section id="features4-1" class="p-b-lg">
            <div class="container">
                <!-- Section Header -->
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="section-header text-center wow fadeIn">
                            <h2><?php echo get_post_meta(get_the_ID(),'section_title',true) ?></h2>
                               
                        </div>
                    </div>
                </div>
                <!-- Features Row -->
                <div class="row features-block">
                    <div class="col-sm-4 img-left m-b-md clearfix text-center"> 
                        <?php echo do_shortcode(get_post_meta(get_the_ID(),'sec_column1',true)); ?>
                    </div>
                    <div class="col-sm-4 img-left m-b-md clearfix text-center"> 
                       <?php echo do_shortcode(get_post_meta(get_the_ID(),'sec_column2',true)) ?>
                    </div>
                    <div class="col-sm-4 img-left m-b-md clearfix text-center"> 
                        <?php echo do_shortcode(get_post_meta(get_the_ID(),'sec_column3',true)) ?>
                    </div>
                </div>
                <!-- Features Row -->
                
            </div><!-- /End Container -->        
        </section>  
        <!-- /End Services -->



 <!-- =========================
           course SECTION 
        ============================== -->
        <section id="features2-2" class="p-y-lg" style="background-color:#ededed;">
            
            <div class="container">
                <!-- Section Header -->
                <div class="row">
                <div class="col-md-8 col-md-offset-2">
                        <div class="section-header text-center wow fadeIn">
                            <h2> <?php echo get_post_meta(get_the_ID(),'our_prod_title',true) ?></h2>
                            
                        </div>
                    </div>
                    
                </div>

               
					 
					<?php echo   apply_filters('the_content',get_post_meta(get_the_ID(),'our_prod_courses',true));?>
                    
             
             
            </div><!-- /End Container -->

        </section>   
        <!-- /End Features Section -->
         <!-- =========================
           course SECTION 
        ============================== -->
        <section id="features2-3" class="p-y-lg" style="background-color:#fff;">
            
            <div class="container">
                <!-- Section Header -->
                <div class="row">
                <div class="col-md-8 col-md-offset-2">
                        <div class="section-header text-center wow fadeIn">
                            <h2>  <?php echo get_post_meta(get_the_ID(),'op_title',true) ?></h2>
                            
                        </div>
                    </div>
                    
                </div>

               <?php echo do_shortcode (get_post_meta(get_the_ID(),'op_banners',true)) ?>
            </div><!-- /End Container -->

        </section>   
        <!-- /End Features Section -->


       

        <!-- =========================
           FEATURES SECTION 
        ============================== -->
        <section id="features2-1" class="p-y-lg" style="background-color:#ededed;">
            
            <div class="container">
                <!-- Section Header -->
                <div class="row">
                <div class="col-md-8 col-md-offset-2">
                        <div class="section-header text-center wow fadeIn">
                            <h2>  <?php echo get_post_meta(get_the_ID(),'ba_title',true) ?></h2>
                            
                        </div>
                    </div>
                    
                </div>

                <div class="row text-center features-block c3">
                    <!-- Feature Item -->
                    <div class="col-sm-4"> 
                    <div class="Serbod text-white">
                      <?php echo do_shortcode(get_post_meta(get_the_ID(),'ba_column_1',true)) ?>
                        </div>
                    </div>
                    <!-- Feature Item -->
                    <div class="col-sm-4"> 
                     <div class="Serbod">
                       <?php echo do_shortcode(get_post_meta(get_the_ID(),'ba_column2',true)) ?>
                        </div>
                    </div>
                    <!-- Feature Item -->
                    <div class="col-sm-4"> 
                     <div class="Serbod text-white">
                        <?php echo do_shortcode(get_post_meta(get_the_ID(),'ba_column_3',true)) ?>
                        </div>
                    </div>
                </div>
            </div><!-- /End Container -->

        </section>   
        <!-- /End Features Section -->


 
        <section id="features4-2" class="p-b-lg">
            <div class="container">
                <!-- Section Header -->
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="section-header text-center wow fadeIn">
                            <h2><?php echo get_post_meta(get_the_ID(),'wh_title',true) ?></h2>
                               
                        </div>
                    </div>
                </div>
                <!-- Features Row -->
                <div class="row features-block">
                    <div class="col-sm-4 img-left m-b-md clearfix text-center"> 
                       <?php echo do_shortcode(get_post_meta(get_the_ID(),'wh_column1',true))?>
                    </div>
                    <div class="col-sm-4 img-left m-b-md clearfix text-center"> 
                       <?php echo do_shortcode(get_post_meta(get_the_ID(),'wh_column_2',true)) ?>
                    </div>
                    <div class="col-sm-4 img-left m-b-md clearfix text-center"> 
                        <?php echo do_shortcode(get_post_meta(get_the_ID(),'wh_column3',true)) ?>
                    </div>
                </div>
                <!-- Features Row -->
                
            </div><!-- /End Container -->        
        </section>  
      


		 <?php echo get_post_meta(get_the_ID(),'about_talentedge',true) ?>
        
        
        <!-- =========================
             FOOTER
        ============================== -->
        <?php if(get_post_meta(get_the_ID(),'footer_fr_cont',true)){ ?>
			<footer id="footer2-2" class="p-y footer f2 bg-edit bg-dark" style="background-color: #234795;">
				<div class="container">
					<div class="row text-white">
						<div class="col-sm-12 col-xs-12">
							
							 <?php echo get_post_meta(get_the_ID(),'footer_fr_cont',true) ?>
						</div>
						
						
					</div><!-- /End Row -->
				</div><!-- /End Container -->

			</footer>
        <?php } ?>
        <!-- /End Footer -->
        


    </div><!-- /End Main Container -->

    <!-- Back to Top Button -->
    <a href="#" class="top" style="background-color:#0B8FBF;">Top</a>


    <!-- =========================
         SCRIPTS 
    ============================== -->


    <?php wp_footer();?>
</body>
</html>
