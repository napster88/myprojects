<?php
/**
 * The template for displaying Media News page.
 *
 * Template Name: Media News
 *
 */
 get_header();
 ?>
<style>
#subscibe-section{
  display: none;
}
.news-img{
  width: 254px;
  height: 180px;
}
</style>
<link href="<?php echo bloginfo('stylesheet_directory'); ?>/css/bootstrap.css" rel="stylesheet">
<link href="<?php echo bloginfo('stylesheet_directory'); ?>/css/style-media.css" rel="stylesheet">
 <section class="banner">
 <div class="container">
 <div class="banner-text">
 <h1>Talentedge<br>In News</h1>
 </div>
 </div>
 </section>


 <div class="social-icon">



 <div class="container">

   <div class="row">
     <div class="text-center">
       <div class="all-icons"><ul>
 <li><a onclick="window.open('http://www.facebook.com/sharer.php?u=<?php echo get_permalink(); ?>&amp;src=sdkpreparse','popup','width=600,height=600'); return false;"  href="http://www.facebook.com/sharer.php?u=<?php echo get_permalink(); ?>" ><i class="fa fa-facebook"></i></a></li>
   <li><a onclick="window.open('https://www.linkedin.com/shareArticle?mini=true&url=<?php echo get_permalink(); ?>&title=<?php echo  $post->post_title; ?>&source=LinkedIn','popup','width=600,height=600'); return false;" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo get_permalink(); ?>&title=<?php echo  $post->post_title; ?>&source=LinkedIn"><i class="fa fa-linkedin"></i></a></li>
    <li><a href="https://twitter.com/intent/tweet?url=<?php echo get_permalink(); ?>&text=<?php echo $post->post_title; ?>"><i class="fa fa-twitter"></i></a></li>
      <li><a href="https://www.youtube.com/channel/UCzQyAGItgd2BYRMTq5uLdOA" target="_blank"><i class="fa fa-youtube-play"></i></a></li>
 </ul></div></div>
     </div>
   </div>
   </div>

   <div class="courses_news">
       <div class="container">

       <div class="row">
         <div class="text-center heading">
         <h2>Media Coverage</h2>
         <img src="<?php echo site_url(); ?>/wp-content/uploads/2018/03/star.png" class="img-responsive" alt="star">
         </div>
       </div>
       <div class="row">
           <div class="col-md-12">
             <?php
             $args = array(
               'meta_key'     => 'category_section',
               'meta_value'   => 'Media Coverage',
               'meta_compare' => '=',
               'post_type'    => 'news'
                );
                $the_query = new WP_Query( $args );
                if ( $the_query->have_posts() ) :
                  $iindex = 1; ?>
             <div class="carousel carousel-showmanymoveone newloop slide" <?php if($the_query->found_posts > 3){ echo 'id="carouselmediacov"'; } ?> >
               <div class="carousel-inner">
               <?php
                     while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                      <div  class="item <?php if($iindex == 1){ echo 'active'; } ?>">
                        <div class="col-sm-3 text-center section-1">
                          <img src="<?php echo get_field('image', get_the_ID(), true); ?>" alt="<?php the_title(); ?>" class="news-img">
                          <p><span>Date:</span>  <?php echo get_field('date', get_the_ID(), true); ?></p>
                          <div class="news-head"><h4><?php the_title(); ?></h4></div>
                          <div class="news-content"><p><?php echo get_field('content', get_the_ID(), true); ?></p></div>
                          <a href="<?php echo get_field('read_more_link', get_the_ID(), true); ?>" target="_blank"><button type="button" class="btn btn-info btn-sm">Read More</button></a>
                        </div>
                      </div>
                  	<?php $iindex++; endwhile; ?>

            </div>
            <?php if($the_query->found_posts > 4){ ?>
              <a class="left carousel-control" href="<?php the_permalink();?>#carouselmediacov" data-slide="prev"><i class="fa fa-angle-left"></i></a>
              <a class="right carousel-control" href="<?php the_permalink();?>#carouselmediacov" data-slide="next"><i class="fa fa-angle-right"></i></a>
            <?php } ?>
          </div>
            <?php wp_reset_postdata(); ?>
          <?php endif; ?>
        </div>
       </div>
     </div>
   </div>
   <div class="courses_news">
   <div class="container">

   <div class="row">
     <div class="text-center heading">
     <h2>Awards &amp; Recognitions</h2>
     <img src="<?php echo site_url(); ?>/wp-content/uploads/2018/03/star.png" class="img-responsive" alt="star">
     </div></div>
     <div class="row">
       <div class="col-md-12">
         <?php
         $args = array(
           'meta_key'     => 'category_section',
           'meta_value'   => 'Awards & Recognitions',
           'meta_compare' => '=',
           'post_type'    => 'news'
            );
            $award_query = new WP_Query( $args );
            //echo $award_query->found_posts;
            if ( $award_query->have_posts() ) : ?>

         <div class="carousel carousel-showmanymoveone newloop slide"  <?php if($award_query->found_posts > 3){ echo 'id="carouselaward"'; } ?> >
           <div class="carousel-inner">

              <!-- the loop -->
              <?php while ( $award_query->have_posts() ) : $award_query->the_post(); ?>
                <div class="col-sm-4 text-center section-1">
                <img src="<?php echo get_field('image', get_the_ID(), true); ?>" alt="<?php the_title(); ?>" class="news-img">
                <p><span>Date:</span>  <?php echo get_field('date', get_the_ID(), true); ?></p>
                <div class="news-head"><h4><?php the_title(); ?></h4></div>
                <div class="news-content"><p><?php echo get_field('content', get_the_ID(), true); ?></p></div>
                  <a href="<?php echo get_field('read_more_link', get_the_ID(), true); ?>" target="_blank"><button type="button" class="btn btn-info btn-sm">Read More</button></a>

                </div>
              <?php endwhile; ?>

        </div>
        <?php if($award_query->found_posts > 3){ ?>
          <a class="left carousel-control" href="<?php the_permalink();?>#carouselaward" data-slide="prev"><i class="fa fa-angle-left"></i></a>
          <a class="right carousel-control" href="<?php the_permalink();?>#carouselaward" data-slide="next"><i class="fa fa-angle-right"></i></a>
        <?php } ?>
      </div>
      <?php wp_reset_postdata(); ?>
    <?php endif; ?>
    </div>
   </div></div>
   </div>
<div class="courses_news">
 <div class="container">
   <div class="row">
     <div class="text-center heading">
     <h2>Our Academic Partners</h2>
     <img src="<?php echo site_url(); ?>/wp-content/uploads/2018/03/star.png" class="img-responsive" alt="star">
     </div>
   </div>
    <div class="row">
      <div class="col-md-12">
        <div class="carousel carousel-showmanymoveone slide" id="carouselABC">
          <div class="carousel-inner">
            <?php
                $iindex =1;
                //$inst_arr_list = glbl_course_func('institute_list');
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
     							 <div class="item <?php if($iindex == 1){ echo 'active'; } ?>">
                     <div class="col-xs-12 col-sm-6 col-md-3 slider-image-thumbnails">
                       <a href="<?php echo $invalue['link']; ?>">
                         <div class="media_partner_logo_cont">
                           <img src="<?php echo $i_logo?>" class="img-responsive">
                         </div>
                       </a>
                     </div>
                   </div>
     							<?php } ?>
               <?php } $iindex++; } ?>

          </div>
          <a class="left carousel-control" href="<?php the_permalink();?>#carouselABC" data-slide="prev"><i class="fa fa-angle-left"></i></a>
          <a class="right carousel-control" href="<?php the_permalink();?>#carouselABC" data-slide="next"><i class="fa fa-angle-right"></i></a>
        </div>
      </div>
    </div>
 </div>
 </div>
<?php get_footer(); ?>
