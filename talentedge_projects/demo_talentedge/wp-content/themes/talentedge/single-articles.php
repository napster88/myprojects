<?php
/**
 * The template for displaying all single posts.
 */

get_header(); ?>
<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/article-detail.css" rel="stylesheet" />
    <style type="text/css">
        footer{
            display: none;
        }

        #header, #subscibe-section{
            display: none;
        }
        #header.keepHeader{
            display: block;
        }
        .te-banner-top .left-te .banner-components p{text-transform: inherit;}
         .filter-item ul li{    padding: 10px 15px;}
        .filter-item ul{
            width: 20em;
        height: 300px;
        overflow: auto;
        }
        .nmenu{
                position: absolute;
        left: 10px;
        top: 23px;
        }
        .nmenu i{
            font-size: 12px;
        padding: 0px 10px;
        color: #ccc;
        }
        .post-content p{
            margin-bottom: 0;
        }
        b {
            font-weight: bold;
            font-size: 16px;
            margin-bottom: 10px;
            display: block;
        }

        b + br {
            display: none;
        }
        
        .callToactions{display:none;}    
    </style>

     <!-- ~~~~~~~~~~ Header ~~~~~~~~~~ -->
    <header id="header" class="keepHeader checker">
        <nav class="navbar yamm navbar-talent" role="navigation">
            <div class="navbar-header">
                <a href="../" class="navbar-brand"><img src="<?php echo get_field('logo','option')?>" /></a>
            </div>
            <div class="pull-right marketing_logo">
                <?php $in_id = get_field('select_institute');
                $in_logo = get_field('logo', $in_id);
                $inshort_name = get_field('short_name',$in_id);
                $courseId =  get_field('select_course') ; 
                $batch_name =  get_field('batch_name' ,$courseId);
                $courseshort_name =  get_field('course_short_name' ,$courseId);
                $background_image =  get_field('background_image');
    //            $course_lastdate =  get_field('front-end_batch_name',$courseId);
				// $global_lastdate =  get_field('global_last_date', 'option');
				//  if($global_lastdate){
				// 	$lastDate = $global_lastdate;
				//  }
				//  else{
				// 	$lastDate = $course_lastdate;
				//  }

                $lastDate = get_course_lastdate($courseId);
                ?>
                <img src="<?php echo $in_logo;?>" />
            </div>
        </nav>
    </header>
    <input type="hidden" class="utm_article_batch" value="<?php echo  $batch_name; ?>">
    <input type="hidden" class="utm_article_shortname" value="<?php echo  $courseshort_name; ?>">
    <input type="hidden" class="utm_article_institute" value="<?php echo  $inshort_name; ?>">  
    <!-- ~~~~~~~~~~ main wrapper ~~~~~~~~~~ -->
    <section class="main-wrapper">
        <!-- ~~~~~~~~~~~~~ Banner section ~~~~~~~~~~~~~ -->
       <?php while ( have_posts() ) : the_post(); ?>
        <?php
         //$image_attributes = wp_get_attachment_image_src(get_post_thumbnail_id( ), 'thumbnail');
        if ( $background_image ) {
          $f_image = $background_image; 
        }
        else{
            $f_image = get_field('blog_default_image','option');
        }
        ?>
        <div class="sectionBanner detailBlog">
            <div id="view_hero" style="background-image: url('<?php echo $f_image;?>');background-size: cover;" class="te-banner-top coverImg cover_full">
                <div class="container zIndex2">
                    <div class="left-te">
                        <div class="clearfix">
                            <div class="banner-components">
                                <!-- <h1 class="post-title"><?php the_title(); ?></h1> -->
                                <!-- <ul class="post-meta-byline">
                                    <li class="byline-credit">
                                        <?php
                                        $time_string = '<time class="entry-date published updated" datetime="%1$s" itemprop="datePublished">%2$s</time>';

                                            $time_string = sprintf( $time_string,
                                                esc_attr( get_the_date( 'c' ) ),
                                                esc_html( get_the_date() ),
                                                esc_attr( get_the_modified_date( 'c' ) ),
                                                esc_html( get_the_modified_date() )
                                            );
                                        ?>
                                        <span class="post-meta-date"> <?php echo $time_string;?></span>
                                    </li>
                                </ul> -->
                            </div>
                        </div>
                    </div>
                    <!-- <div class="right-te col-md-4 col-sm-4 xs-hidden pull-right">
                        <div class="batch-Card">
                            <div class="guidForm">
                               
                               <?php
                                    //echo do_shortcode('[gravityform id=22 title=false description=false ajax=true tabindex=58]');
                                ?>
                            </div>
                        </div>
                    </div> -->
                </div>
                <span class="overlay"></span>
            </div>
        </div>

        <div class="clearfix two_column">
            <div class="container">
                <div class="row">
                    
                    <div class="left-te col-md-8 col-sm-12 col-xs-12">

                        <h1 class="post-title"><?php the_title(); ?></h1>
                        
                        <div class="batch-Card">
                            <div class="guidForm">
                               <p class="form_head">Drop your details to know more about programme</p>
                               <?php
                                    echo do_shortcode('[gravityform id=24 title=false description=false ajax=true tabindex=32]');
                                ?>
                                 <?php if($lastDate): ?>
                                <p class="article_ldate"><?php echo "Last date of application:"." ".$lastDate; ?></p>
                                <?php endif; ?>
                            </div>
                        </div>

                        
                        <div class="post-content clearfix text-left">
                               <div class="post-entry" itemprop="articleBody">
                                <?php
                                the_content(
                                    sprintf(
                                        __( 'Continue reading %s', 'talentedge' ),
                                        '<span class="screen-reader-text">' . get_the_title() . '</span>'
                                    )
                                );
                                
                                ?>
                                <h2>Want to know how can this course help in your profile?</h2>
                                <div class="article_btm">
                                <?php 
                                  echo do_shortcode('[gravityform id=23 title=false description=false ajax=true tabindex=38]');
                                ?>
                                </div>
                                <?php
                                echo get_field('article_about_talentedge','option');
                                wp_link_pages( array(
                                    'before' => '<div class="page-links">' . __( 'Pages:', 'talentedge' ),
                                    'after'  => '</div>',
                                ) );
                                ?>
                                
                                </div><!-- .entry-content -->
                        </div>
                    </div>
                    <div class="right-te col-md-4 col-sm-4 xs-hidden">
                        <div class="batch-Card">
                            <div class="guidForm">
                               <p class="form_head">Drop your details to know more about programme</p>
                               <?php
                                    echo do_shortcode('[gravityform id=22 title=false description=false ajax=true tabindex=32]');
                                ?>
                                 <?php if($lastDate): ?>
                                <p class="article_ldate"><?php echo "Last date of application:"." ".$lastDate; ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endwhile; // end of the loop. ?>
        <?php //include( locate_template( 'template-request.php',false, false ) ); ?>
    </section>
     <div class="footer_copyrights clearfix">
            <div class="container">
                <div class="col-md-6 col-sm-6 col-xs-8 col-ft"> </div>
                <div class="col-md-6 col-sm-6 col-xs-4 text-right col-ft"><a href="<?php echo get_home_url();?>/privacy-policy">Privacy Policy </a> | <a href="<?php echo get_home_url();?>/about-us/">About Us</a></div>
            </div>
    </div>
<?php get_footer();
$brochureLink  =  get_field('brouchure',$courseId); ?>
<script>
    var summaries = $('.two_column .right-te');
    summaries.each(function(i) {
        var summary = $(summaries[i]);
        var next = summaries[i + 1];

        summary.scrollToFixed({
            marginTop: 15,
            limit: function() {
                var limit = 0;
                if (next) {
                    limit = $(next).offset().top - $(this).outerHeight(true) - 20;
                } else {
                    limit = $('.footer_copyrights').offset().top - $(this).outerHeight(true) - 20;
                }
                return limit;
            },
            zIndex: 999
        });
    });
  


/*utm tracking*/

        var utm_source =  getParameterByName('utm_source');
        var utm_medium =  getParameterByName('utm_medium');
        var utm_campaign =  getParameterByName('utm_campaign');
        var utm_term =  getParameterByName('utm_term');
        var utm_batch = $('.utm_article_batch').val();
        var utm_cshortname = $('.utm_article_shortname').val();
        var instshortname = $('.utm_article_institute').val();
        //console.log(courseshortname);
        
        if(utm_source != ''){
          $('#input_22_4').val(utm_source);
          $('#input_23_4').val(utm_source);
          $('#input_24_4').val(utm_source);
          $('#input_1_10').val(utm_source);
        }
        if(utm_medium != ''){
          $('#input_22_5').val(utm_medium);
          $('#input_23_5').val(utm_medium);
          $('#input_24_5').val(utm_medium);
          $('#input_1_11').val(utm_medium);
        }

        if(utm_campaign != ''){
          $('#input_22_6').val(utm_campaign);
          $('#input_23_6').val(utm_campaign);
          $('#input_24_6').val(utm_campaign);
          $('#input_1_12').val(utm_campaign);
        }

        if(utm_term != ''){
          $('#input_22_7').val(utm_term);
          $('#input_23_7').val(utm_term);
          $('#input_24_7').val(utm_term);
          $('#input_1_13').val(utm_term);
        }
        
        if(utm_term == null){
            $('#input_22_7').val(utm_batch);
            $('#input_23_7').val(utm_batch);
            $('#input_24_7').val(utm_batch);
            $('#input_1_13').val(utm_batch);
        }
          
          $('#input_22_15').val(utm_cshortname);
          $('#input_23_15').val(utm_cshortname);
          $('#input_24_15').val(utm_cshortname);
          $('#input_1_15').val(utm_cshortname);
          $('#input_22_16').val(instshortname);
          $('#input_23_16').val(instshortname);
          $('#input_24_16').val(instshortname);
          $('#input_1_14').val(instshortname);
          $('#input_22_17').val('<?php echo $courseId ;?>');
          $('#input_23_17').val('<?php echo $courseId ;?>');
          $('#input_24_17').val('<?php echo $courseId ;?>'); 
	  $('#input_22_21').val('<?php echo $brochureLink ;?>');
</script>



