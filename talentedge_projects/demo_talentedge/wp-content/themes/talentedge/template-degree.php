<?php
/**
 * The template for displaying about us page.
 *
 * Template Name: Degree Courses page
 *
 */

get_header(); ?>
<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/degree-course.css" rel="stylesheet" />
<style>
.callToactions{display:none;}
.title-sphere strong{
        font-weight: bold;
    margin: 8px 0px;
    display: block;
}
.title-sphere p{line-height: 16px;}
.subscibe-section{
    display: none;
}
</style>
 <!-- ~~~~~~~~~~ main wrapper ~~~~~~~~~~ -->
    <section class="main-wrapper">


        <!-- ~~~~~~~~~~~~~ Banner section ~~~~~~~~~~~~~ -->
        <div class="sectionBanner">
            <div id="view_hero" style="background-image: url(<?php echo get_field('background_image')?>);" class="te-banner-top coverImg cover_full">
                <div class="container zIndex2">
                    <div class="left-te col-md-8 col-sm-12 col-xs-12">
                        <div class="clearfix">
                            <div class="banner-components">
                                <h1><?php echo get_field('headline')?></h1>
                                <p><?php echo get_field('subheadline')?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <span class="overlay"></span>
            </div>
        </div>

        <!-- ~~~~~~~~~~~~~ single column section ~~~~~~~~~~~~~ -->
        <div class="gray_bg clearfix">
            <div class="singleColumn margin-top-45 margin-bottom-45 text-center">
                <div class="container">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="row">
                            <p><?php echo get_field('description');?> </p>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="row img-divider margin-top-25">
                                    
                                	<?php 

									if( have_rows('university') ):
										while ( have_rows('university') ) : the_row();
										?>

											 <div class="col-md-6 col-sm-6 col-xs-12">
		                                        <img src="<?php echo get_sub_field('logo')?>" class="img-responsive">
		                                    </div>
									<?php
										 endwhile;
										 endif;
									?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ~~~~~~~~~~~~~ sphere section ~~~~~~~~~~~~~ -->
        <div class="clearfix">
            <div class="singleColumn margin-top-45 text-center">
                <div class="container">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="row">
                            <h2 class="title black-clr text-uppercase"><?php echo get_field('e_headline');?> </h2>
                            <p><?php echo get_field('e_description');?></p>
                            <div class="radial-wrapper margin-top-25">
                                <div class="circle">
                                     <?php
                                     $kk=1;
                                   // if( have_rows('section') ):
                                        while ( have_rows('section') ) : the_row();
                                    
                                    ?>
                                    <?php if ($kk==1) {?>
                                    <div class="radial circle-<?php echo $kk;?>">
                                        <a href="#talentTab<?php echo $kk;?>">
                                           

                                            <div class="fa-span"><i class="fa <?php echo get_sub_field('icon')?>"></i>
                                                 <span class="show"><?php echo get_sub_field('headline');?></span>
                                            </div>

                                        </a>
                                    </div>
                                    <?php } else {?>
                                     <div class="radial circle-<?php echo $kk;?>" style="background-image: url('<?php echo esc_url( get_template_directory_uri() ); ?>/images//pattern_0<?php echo $kk;?>.png');">
                                        <a href="#talentTab<?php echo $kk;?>">
                                            <div class="fa-span"><i class="fa <?php echo get_sub_field('icon')?>"></i></div>
                                        </a>
                                    </div>
                                    <?php } ?>
                                    <?php
                                        $kk++;
                                        endwhile;
                                     //   endif;
                                        ?>
                                    <div class="tab-content text-left">
                                        
                                    <?php
                                    $e=1;
                                    if( have_rows('section') ):
                                        while ( have_rows('section') ) : the_row();
                                    ?>

                                        <div id="talentTab<?php echo $e;?>" class="tab-section">
                                            <div  class="radial-list-black">
                                                <div class="title-sphere">
                                                    <?php echo get_sub_field('content')?>
                                                </div>
                                                
                                            </div>
                                        </div>

                                        <?php
                                        $e++;
                                        endwhile;
                                        endif;
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ~~~~~~~~~~~~~ our alumni's section ~~~~~~~~~~~~~ -->
        <?php

			// check if the repeater field has rows of data
			if( have_rows('testimonial') ):
				?>
				 <div class="te-learners">
			            <div class="container">
			                <div class="text-center">
			                    <h2 class="title">
			                     <?php echo get_field('testimonials_headline');?>
			                    </h2>
			                </div>
			                <div class="learner-spearkers">
			                    <div class="learner-list owl-carousel">
				<?php

			 	// loop through the rows of data
			    while ( have_rows('testimonial') ) : the_row();

			        ?>

			         <div class="item">
                            <div class="col-md-9 col-sm-9 col-xs-12 text-center quotes">
                                <p>
                                  <?php echo get_sub_field('testimonial');?>
                                </p> 
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-12 pull-right">
                                <div class="speaker_avator">
                                    <div class="rotate_img">
                                        <div class="anti_rotate_img" 
                                        style="background-image: url(<?php echo get_sub_field('profile_image');?>)">
                                        </div>
                                    </div>
                                    <h4><?php echo get_sub_field('name');?></h4>
                                    <h5><?php echo get_sub_field('designation');?></h5>
                                </div>
                            </div>
                        </div>

			        <?php endwhile; ?>


			                    </div>
			                </div>
			            </div>
			        </div>

			<?php endif; ?>

    </section>
    <?php include( locate_template( 'template-request.php',false, false ) ); ?>
<?php get_footer(); ?>
<script>
    /* ===============================
        script for radial tabs
    ==================================*/
    $('.circle .tab-section').hide();
    $('.radial a').on('mouseenter', function(e) {
        $('.radial a.tab-active').removeClass('tab-active').parent().removeClass('shadow-glow');
        $('.tab-section:visible').hide();
        $(this.hash).show();
        $(this).addClass('tab-active').parent().addClass('shadow-glow');
        e.preventDefault();
    });
    setTimeout(function() {
        $('.radial a:first').trigger('click');
        $('.radial a:first').addClass('tab-active');
        $('.circle .tab-section:first').show();
    }, 500);

    $('.radial-wrapper .circle .radial a').click(function(){
       return false;
    });

</script>
