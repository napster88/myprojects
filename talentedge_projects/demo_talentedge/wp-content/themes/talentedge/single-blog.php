<?php
/**
 * The template for displaying all single posts.
 */

get_header(); ?>
<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/blog.css" rel="stylesheet" />
    <style type="text/css">
        .te-banner-top .left-te .banner-components p{text-transform: inherit;}
         .filter-item ul li{    padding: 10px 15px;}
    .filter-item ul{
        width: 20em;
    height: 300px;
    /*overflow: auto;*/
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
    .subscibe-section{display:none;}
.subscibe-section, .callToactions{display:none;}    </style>
    <!-- ~~~~~~~~~~ main wrapper ~~~~~~~~~~ -->
    <section class="main-wrapper">
        <!-- ~~~~~~~~~~~~~ Banner section ~~~~~~~~~~~~~ -->
       <?php while ( have_posts() ) : the_post(); ?>
        <?php
         $image_attributes = wp_get_attachment_image_src(get_post_thumbnail_id( ), 'full');
        if ( $image_attributes ) {
          $f_image = $image_attributes[0];
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
                                    <li class="byline-avatar">
                                        <!--<img class="byline-avatar" src="http://admissionado.com/wp-content/uploads/2015/08/avatar-admissionado.jpg" alt="post author">
                                        -->
                                    </li>
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
                                        Post written by <span class="nameAuthor">Talentedge Team</span>                   <span class="post-meta-date"> <?php echo $time_string;?></span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <span class="overlay"></span>
            </div>
        </div>
        <div class="gray_bg clearfix">
            <div class="container">
            <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="filter_dropdown text-right">
                    <!-- <select name="SelectCatagery" class="text-uppercase">
                        <option value="0">Select A Category</option>
                        <option value="0">Category 1</option>
                        <option value="0">Category 2</option>
                        <option value="0">Category 3</option>
                    </select> -->
                    <?php
                    $args = array(
            'type'                     => 'blog',
            'taxonomy'                 => 'category'
            );
            $cats = get_categories( $args );
            if ($cats){
            ?>
              <nav class="filter-item">
                    <div class="nmenu">
                        <div><a href="<?php echo home_url();?>/blog">Blog</a> > <span><?php echo get_the_title();?></span></div>
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
        <div class="clearfix two_column">
            <div class="container">
                <div class="row">
                    <div class="left-te col-md-8 col-sm-12 col-xs-12">
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
                    <div class="right-te col-md-4 col-sm-4 col-xs-12">
                        <div class="batch-Card">
                            <div class="guidForm">
                               
                               <?php
                echo do_shortcode('[gravityform id=7 title=false description=false ajax=true tabindex=32]');
            ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endwhile; // end of the loop. ?>
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
</script>



