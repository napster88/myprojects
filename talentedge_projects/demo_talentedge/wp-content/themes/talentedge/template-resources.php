<?php
/**
 * The template for displaying contact page.
 *
 * Template Name: Resources page
 *
 */

get_header(); ?>
<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css//enterprise.css" rel="stylesheet" />
<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css//clients.css" rel="stylesheet" />
<style>
    .f2bg{background:#f2f2f2;}
    .wrapper-flex img{width:50%;}
    .caseStudies .caseContext p{color:#fff;}
</style>
 <!-- ~~~~~~~~~~~~~ single column section ~~~~~~~~~~~~~ -->
        <div class="gray_bg clearfix">
            <div class="singleColumn margin-top-45 margin-bottom-45 text-center">
                <div class="container">
                 <div class="row">
                    <div class="col-md-10">
                            <h2 class="title black-clr text-uppercase text-left"><?php echo get_field('headline')?></h2>
                            <p class="text-left"><?php echo get_field('subheadline')?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


         <!-- ~~~~~~~~~~~~~ Case Studies ~~~~~~~~~~~~~ -->
        <div class="clearfix">
            <div class="caseStudies text-center margin-bottom-45 margin-top-45">
                <div class="container">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="row">
                            <h2 class="title black-clr text-uppercase margin-bottom-45"><?php echo get_field('case_studies_headline')?></h2>
                            <div class="col-wrapper clearfix">
                                

                                  <?php
                                  $c=1;
                // check if the repeater field has rows of data
                if( have_rows('case_studies') ):

                    // loop through the rows of data
                    while ( have_rows('case_studies') ) : the_row();

                if ($c==1){
                    $html = 'case col-1 full-vh quarter-vw cover_full';
                }
                else if ($c==2){
                     $html = 'case col-2 half-vh aThird-vw cover_full';
                }
                else if ($c==3){    
                     $html = 'case col-3 half-vh half-vw cover_full';
                }
                else if ($c==4){
                     $html = 'case col-4 half-vh half-vw cover_full';
                }

                    ?>  <div class="<?php echo $html;?>" style="background-image: url('<?php echo get_sub_field('image');?>')">
                                    <span class="overlay"></span>
                                    <div class="caseContext text-left">
                                        <h3>
                                        <a class="white" href="<?php echo get_sub_field('pdf');?>" target="_blank"><?php echo get_sub_field('title');?></a>
                                        </h3>
                                        <p class="white"><?php echo get_sub_field('description');?></p>
                                    </div>
                                </div>
                    <?php
                    $c++;
                    endwhile;

                endif;

                ?>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

         <!-- ~~~~~~~~~~~~~ Blog section ~~~~~~~~~~~~~ -->
        <div class="blogGallery">
            <div class="container">
                <h2 class="text-uppercase black-clr text-center"><?php echo get_field('blog_headline');?></h2>
                

                <?php 

$posts = get_field('select_blog');

if( $posts ): ?>
   <ul class="clearfix row">
    <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
        <?php setup_postdata($post);

        $image_attributes = wp_get_attachment_image_src(get_post_thumbnail_id( ), 'thumbnail');
        if ( $image_attributes ) {
          $f_image = $image_attributes[0];
        }
        else{
            $f_image = get_field('blog_default_image','option');
        }

         $time_string = '<time class="entry-date published updated" datetime="%1$s" itemprop="datePublished">%2$s</time>';

                                            $time_string = sprintf( $time_string,
                                                esc_attr( get_the_date( 'c' ) ),
                                                esc_html( get_the_date() ),
                                                esc_attr( get_the_modified_date( 'c' ) ),
                                                esc_html( get_the_modified_date() )
                                            );

         ?>
           <li class="col-md-4 col-sm-4 col-xs-6">
                        <div class="wrapImg" style="background-image: url('<?php echo $f_image;?>');">
                        </div>
                        <div class="videoContext">
                            <h6><?php echo $time_string;?></h6>
                            <h5><a href="<?php echo get_permalink();?>"><?php echo get_the_title();?></a></h5>
                            <p><?php
                                        $shop_isleismore = @strpos( $post->post_content, '<!--more-->');
                                        if($shop_isleismore) :
                                            the_content();
                                        else :
                                            the_excerpt();
                                        endif;
                                        ?></p>
                        </div>
                    </li>


    <?php endforeach; ?>
    </ul>
    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
<?php endif; ?>
            </div>
            <div class="text-center">
                        <a class="redirect_res btn-lightOrange white text-center text-uppercase" href="<?php echo home_url()?>/blog">View More</a>
                    </div>
        </div>

<?php include( locate_template( 'template-request.php',false, false ) ); ?>

<?php			
get_footer(); ?>