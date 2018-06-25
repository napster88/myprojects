<?php
/**
 * The template for displaying all single posts.
 */

get_header(); ?>
<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/blog.css" rel="stylesheet" />
    <style type="text/css">
        footer{
            display: none;
        }
        #header{
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
    <header id="header" class="keepHeader">
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
                                <h1 class="post-title"><?php the_title(); ?></h1>
                               <!-- <h3><?php echo the_excerpt();?></h3>-->
                                <ul class="post-meta-byline">
                                   <!-- <li class="byline-avatar">
                                        <img class="byline-avatar" src="http://admissionado.com/wp-content/uploads/2015/08/avatar-admissionado.jpg" alt="post author">
                                    </li>
                                    -->
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
                                        <!--
                                    Post written by <span class="nameAuthor">Talentedge Team</span>
                                    -->
                                        <span class="post-meta-date"> <?php echo $time_string;?></span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="right-te col-md-4 col-sm-4 xs-hidden pull-right">
                        <div class="batch-Card">
                            <div class="guidForm">
                               
                               <?php
                echo do_shortcode('[gravityform id=7 title=false description=false ajax=true tabindex=58]');
            ?>
                            </div>
                        </div>
                    </div>
                </div>
                <span class="overlay"></span>
            </div>
        </div>
<!--
        <div class="gray_bg clearfix">
            <div class="container">
            <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="filter_dropdown text-right">
                    <?php
                    $args = array(
            'type'                     => 'articles',
            'taxonomy'                 => 'category'
            );
            $cats = get_categories( $args );
            if ($cats){
            ?>
              <nav class="filter-item">
                    <div class="nmenu">
                      
                    </div>
                        <ul style="z-index: 10;">
                            <li class="label"><span data-label="Select a Category">Select a Category</span>
                            <div class="carett"></div>
                            </li>
            <?php
            foreach( $cats as $cat) {
                if($cat->parent == 0) {
                    $parent_cat = null;
                    $head = $cat->name;
                    $head_id = $cat->term_id;
                }?>

                <li><a href="<?php echo home_url();?>/category/<?php echo $cat->slug;?>"><?php echo $head;?></a></li>
            <?php }  ?>
             </ul>
                    </nav>
            <?php
            }

                    ?>
                  

                </div>
                </div>
                </div>
            </div>
        </div> 
        -->
        <div class="clearfix two_column">
            <div class="container">
                <div class="row">
                    <div class="batch-Card mobileFormShow">
                        <div class="guidForm">
                           
                           <?php
            echo do_shortcode('[gravityform id=12 title=false description=false ajax=true tabindex=69]');
        ?>
                        </div>
                    </div>
                    <div class="left-te col-md-8 col-md-offset-2 col-sm-12 col-xs-12">
                        <div class="post-content clearfix text-left">
                               <div class="post-entry" itemprop="articleBody">
                                <?php
                                the_content(
                                    sprintf(
                                        __( 'Continue reading %s', 'talentedge' ),
                                        '<span class="screen-reader-text">' . get_the_title() . '</span>'
                                    )
                                );

                                wp_link_pages( array(
                                    'before' => '<div class="page-links">' . __( 'Pages:', 'talentedge' ),
                                    'after'  => '</div>',
                                ) );
                                ?>
                                </div><!-- .entry-content -->
                        </div>
                    </div>
                    <!-- <div class="right-te col-md-4 col-sm-4 col-xs-12">
                        <div class="batch-Card">
                            <div class="guidForm">
                               
                               <?php
                //echo do_shortcode('[gravityform id=7 title=false description=false ajax=true tabindex=32]');
            ?>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
        <?php endwhile; // end of the loop. ?>
        <?php //include( locate_template( 'template-request.php',false, false ) ); ?>
    </section>
<?php get_footer(); ?>
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
                        limit = $('.subscibe-section').offset().top - $(this).outerHeight(true) - 20;
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
          $('#input_7_4').val(utm_source);
          $('#input_12_4').val(utm_source);
          $('#input_1_10').val(utm_source);
        }
        if(utm_medium != ''){
          $('#input_7_5').val(utm_medium);
          $('#input_12_5').val(utm_medium);
          $('#input_1_11').val(utm_medium);
        }

        if(utm_campaign != ''){
          $('#input_7_6').val(utm_campaign);
          $('#input_12_6').val(utm_campaign);
          $('#input_1_12').val(utm_campaign);
        }

        if(utm_term != ''){
          $('#input_7_7').val(utm_term);
          $('#input_12_7').val(utm_term);
          $('#input_1_13').val(utm_term);
        }
        
        if(utm_term == null){
            $('#input_7_7').val(utm_batch);
            $('#input_12_7').val(utm_batch);
            $('#input_1_13').val(utm_batch);
        }
          
          $('#input_7_15').val(utm_cshortname);
          $('#input_12_15').val(utm_cshortname);
          $('#input_1_15').val(utm_cshortname);
          $('#input_7_16').val(instshortname);
          $('#input_12_16').val(instshortname);
          $('#input_1_14').val(instshortname);
          $('#input_7_17').val('<?php echo $courseId ;?>');
          $('#input_12_17').val('<?php echo $courseId ;?>'); 

</script>



