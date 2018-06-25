<?php
/**
 * The template for displaying about us page.
 *
 * Template Name: Scholarship Page
 *
 */
get_header(); 
?>
<!--<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">-->
<!--<link href="<?php // echo esc_url( get_template_directory_uri() ); ?>/css/home.css" rel="stylesheet" />-->
 <div class="clearfix"></div>
 <div id="scholarship_bnr">
      <div class="container">
        <div class="row">
          <div class="col-xs-12 bnr_txt_main">
            Scholarship Offers
            <span>from</span>
            Partners
          </div>
        </div>
      </div>
    </div>
      <div class="container">
        <div class="row">
          <div class="col-xs-12 schlrship_mid_head">
            Active Offers
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="schlrship_prtnr_cont pr-fr">
                <div class="partner-logo">
                  <img src="<?php echo esc_url(get_template_directory_uri()) ?>/images/idfc-partner-logo.gif" alt="">
                </div>
                <div class="prtnr_mid_txt">
                  Offer for
                  <span>IDFC Debit Card</span>
                  Holders
                </div>
                <a href="<?php echo site_url(); ?>/idfc-partnership/" class="btn detail-btn">View Details</a>
              </div>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="schlrship_prtnr_cont pr-fl">
                <div class="partner-logo">
                  <img src="<?php echo esc_url(get_template_directory_uri()) ?>/images/jet-partner-logo.gif" alt="">
                </div>
                <div class="prtnr_mid_txt">
                 JPMiles
                 <span>for Members</span>
                </div>
                <a href="<?php echo site_url(); ?>/jet-partnership/" class="btn detail-btn">View Details</a>
              </div>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-12 schlrship_mid_head">
            Learn with Talentedge
          </div>
        </div>
        <div class="row">
          <div class="col-xs-12 lrnr-cont">
            <div class="col-md-6 col-xs-12">
              <div class="lrng_inner">
                <div class="col-md-2 col-xs-12">
                  <img src="<?php echo esc_url(get_template_directory_uri()) ?>/images/online-lrng-icn.gif" alt="">
                </div>
                <div class="col-md-10 col-xs-12">
                  <div class="lrng_blue_head">Online Live Face-to-Face learning</div>
                  <div class="lrng_txt_info">
                    In the age of video calling our technology takes you beyond recorded or textual content to Live sessions with eminent faculty to make your learning enriching and keep you engaged.
                  </div>
                </div>
              </div>
              <div class="lrng_inner">
                <div class="col-md-2 col-xs-12">
                  <img src="<?php echo esc_url(get_template_directory_uri()) ?>/images/lrn-eminent-icn.gif" alt="">
                </div>
                <div class="col-md-10 col-xs-12">
                  <div class="lrng_blue_head">Learn from eminent faculty from globally leading institutes</div>
                  <div class="lrng_txt_info">
                    In the age of video calling our technology takes you beyond recorded or textual content to Live sessions with eminent faculty to make your learning enriching and keep you engaged.
                  </div>
                </div>
              </div>
              <div class="lrng_inner">
                <div class="col-md-2 col-xs-12">
                  <img src="<?php echo esc_url(get_template_directory_uri()) ?>/images/recreating-icn.gif" alt="">
                </div>
                <div class="col-md-10 col-xs-12">
                  <div class="lrng_blue_head">Recreating classroom-type interactions in the digital world</div>
                  <div class="lrng_txt_info">
                    In the age of video calling our technology takes you beyond recorded or textual content to Live sessions with eminent faculty to make your learning enriching and keep you engaged.
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-xs-12"></div>
          </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
          <div class="col-xs-12 brws-sec">
            <a href="<?php echo site_url(); ?>/browse-courses" class="btn btn-browse-courses">Browse Our Courses</a>
          </div>
        </div>
		<div class="row">
          <div class="col-xs-12 schlrship_mid_head">
            Our Academy Partners
          </div>
          <div class="clearfix"></div>
          <div id="demo">
            <div class="col-xs-12">
              <div id="owl-demo" class="owl-carousel">
			 <?php 
                                         $iindex=1;
                                         foreach ($inst_arr_list as &$invalue) {
                                          if ($invalue['logo']){
                                                $i_logo = $invalue['logo'];
                                                   }
                                                    else{
                                                         $i_logo = get_field('default_course_image', 'option');
                                                    }
                                                    if ($iindex<=16){
                                                    ?>
                  
                 <?php if($invalue['logo']){ ?>
							 <div class="item"> <a href="<?php echo $invalue['link']; ?>"><div style="background-image: url(<?php echo $i_logo?>);" class="sclr_partner"></div></a></div>
							<?php } ?>
                      <?php } $iindex++; } ?>
                
          </div> 
       </div>
    </div>
	<div class="clearfix"></div>
	<div class="h50">
	</div>
        </div>          
                       
      </div><script>
    $(document).ready(function() {
      $("#owl-demo").owlCarousel({
        autoPlay: true,
        items : 6,
        navigation: true,
        loop: true,
        margin: 10,
        pagination: false,
        itemsDesktop : [1199,4],
        itemsDesktopSmall : [979,3]
      });
      $( ".owl-prev").html('<i class="fa fa-chevron-left"></i>');
      $( ".owl-next").html('<i class="fa fa-chevron-right"></i>');
    });
    </script>
 
	  <?php           
get_footer(); ?>
