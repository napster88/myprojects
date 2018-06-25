<?php 
/**
 * The template for displaying contact page.
 *
 * Template Name: Media page
 *
 */

get_header();?>
    <!-- ~~~~~~~~~~ main wrapper ~~~~~~~~~~ -->
    <section class="main-wrapper">

        <!-- ~~~~~~~~~~~~~ Banner section ~~~~~~~~~~~~~ -->
        <div class="sectionBanner">
            <div id="view_hero" style="background-color: #244895;" class="te-banner-top coverImg cover_full">
                <div class="container zIndex2">
                    <div class="left-te col-md-12 col-sm-12 col-xs-12">
                        <div class="clearfix">
                            <div class="banner-components">
                                <h1><?php echo the_title(); ?></h1>
                                <?php echo get_field('content'); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <span class="overlay"></span>
            </div>
        </div>

        <!-- ~~~~~~~~~~~~~ dividerColumn Two column section ~~~~~~~~~~~~~ -->
      <?php $mediaArray = get_field ('media_section');
      	   // echo "<pre>";
      	   // print_r($mediaArray);

      	   $yearArray =array();
	       $imageArray = array();
	       $i = 0;
	       foreach ($mediaArray as $media) {
				$yearArray[] = $media['year'];
			 	foreach ($media as $images) {
			 		foreach ($images as $image) {
			 			$imageArray[] = array($image['image']['url']);
			 		}
			 	}			
	       }
	       // echo "<pre>";
	       // print_r($yearArray);
	       // print_r($imageArray);
	       
       ?>

        <div class="clearfix">
            <div class="container">
                <div class="galleryStrip">
                    <h3>Media Coverage</h3>
                        <div class="row">
                      
                            <div class="year_slider clearfix">
                           <?php if(have_rows('media_section')) : ?>
                                <ul class="slide_months owl-theme owl-carousel">
                               		<?php while ( have_rows('media_section') ) : the_row();  

                               		   $year = get_sub_field('year');?>
          							
          								<li><a href="#tab_<?php echo $year; ?>"><?php echo $year ; ?></a></li>	
          							<?php endwhile; ?>
                                </ul>
                            <?php endif; ?>
                            </div>

                           <?php if(have_rows('media_section')) : 
                           		while ( have_rows('media_section') ) : the_row(); 
                           		$year = get_sub_field('year');
                           		?>
	                            <div id="tab_<?php echo $year; ?>" class="tab-section">
	                           		 <?php if(have_rows('image_section')) : ?>
	                           		<div class="pop-mediaGallery clearfix">
	                           		<?php while ( have_rows('image_section') ) : the_row(); ?>
                                        <div class="img-container">
                                        <a href="<?php echo get_sub_field('image'); ?>" data-effect="mfp-zoom-in" class="col-md-4 col-sm-4 col-xs-6 col-xss-12" style="background-image: url(<?php echo get_sub_field('image'); ?>)"></a>
                               		     <p><?php echo get_sub_field('title'); ?></p>  
                                         </div>
                                    <?php endwhile; ?>
	                                </div>
	                                <?php else: ?> 
	                                	<h5 class="text-center text-bold">No images uploaded.</h5>
	                            <?php  endif ?>
	                            </div>
                           	  <?php 
                           	  endwhile; endif; ?>
                        </div>
                </div>
            </div>
        </div>

        <!-- ~~~~~~~~~~~~~ dividerColumn Two column section ~~~~~~~~~~~~~ -->
        <div class="youtube_channer margin-bottom-20">
            <div class="container">
                <h3>You tube</h3>
                <div class="col-md-8">
                    <div class="row">
                    <?php echo get_field('youtube') ;?>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="twitter_section pull-right">
                        <h4 class="social-head">Follow our twitter feed</h4>    
                        <?php echo do_shortcode('[statictweets skin="default" resource="usertimeline" user="TalentedgeEdu" list="" query="" id="" count="5" retweets="on" replies="on" ajax="off" show="username,screenname,avatar,time,actions,media"/]') ?>
                    </div>
                    <div class="fb_Section pull-right">
                        <h4 class="social-head">Join us on facebook</h4>
                       <?php echo do_shortcode('[custom-facebook-feed]'); ?>
                        
                    </div>
                </div>  
            </div>    
        </div>
 
    </section>

    <!-- ~~~~~~~~~~ news letter ~~~~~~~~~~ -->
    <section class="subscibe-section" id="subscibe-section">
        <div class="subscibe text-center">
            <h2>Contact us for PR or Media enquiries</h2>
            <?php echo do_shortcode('[gravityform id=25 title=false ajax=true tabindex=98 ]'); ?>
        </div>
    </section>


    <footer>
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
   <script>
        $('.galleryStrip .tab-section').hide();
        $('.slide_months a').on('click', function(e) {
            $('.slide_months a.tab-active').removeClass('tab-active');
            $('.tab-section:visible').hide();
            $(this.hash).show();
            $(this).addClass('tab-active');
            e.preventDefault();
        });
        setTimeout(function() {
            $('.slide_months li:first a').trigger('click');
        }, 230);

        var owl = $('.slide_months');
        owl.owlCarousel({
            margin: 10,
            loop: false,
            // autoWidth:true,
            items: 5,
            stagePadding: 0,
            nav: true,
            lazyLoad: true,
            autoplay: false,
            dots: true,
            navText: ["<span class='icon-left-_arrow'>", "<span class='icon-left-arrow'>"],
            responsive: {
                0: {
                    items: 2,
                    nav: true,
                    autoplay: false
                },
                567: {
                    items: 2,
                    nav: true,
                },
                768: {
                    items: 4,
                    nav: true,
                },
                1024: {
                    items: 5
                }
            },
            onTranslated: function(){
                console.log('active tab');
            }
        });

        if ($('.pop-mediaGallery').length > 0) {
            var itemPop = $('.pop-mediaGallery');
            itemPop.each(function(index, el){
                $(".pop-mediaGallery").eq(index).magnificPopup({
                    type: 'image',
                    delegate: 'a',
                    removalDelay: 500,
                    callbacks: {
                        beforeOpen: function() {
                            this.st.image.markup = this.st.image.markup.replace('mfp-figure', 'mfp-figure mfp-with-anim');
                            this.st.mainClass = this.st.el.attr('data-effect');
                        }
                    },
                    closeOnContentClick: true,
                    midClick: true ,
                    gallery: {
                        enabled: true,
                        navigateByImgClick: true,
                        preload: [0,1]
                    },
                    image: {
                        tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
                        titleSrc: function(item) {
                            return item.el.attr('title') + '<small>by Marsel Van Oosten</small>';
                        }
                    }
                });
                console.log(el);
            });
        }

        /* ================ slider year and trigger manualy ========== */

            $(document).on("click", ".slide_months .owl-item.active:last a", function() {
                owl.trigger('next.owl.carousel');
            });
            $(document).on("click", ".slide_months .owl-item.active:first a", function() {
                owl.trigger('prev.owl.carousel', [300]);
            });
    </script>

</body>

</html>
    
    
<?php ?>