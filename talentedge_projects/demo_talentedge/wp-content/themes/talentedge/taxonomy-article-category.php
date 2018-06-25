<?php
/**
 * The template for displaying category pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 */
?>
<?php get_header(); ?>
<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/blog.css" rel="stylesheet" />
    <!-- ~~~~~~~~~~ main wrapper ~~~~~~~~~~ -->
    <section class="main-wrapper">
        <!-- ~~~~~~~~~~~~~ Banner section ~~~~~~~~~~~~~ -->
        <div class="sectionBanner">
            <div id="view_hero" style="background-image: url(<?php echo get_field('articles_background_image','option');?>);" class="te-banner-top coverImg cover_full">
                <div class="container zIndex2">
                    <div class="left-te col-md-8 col-sm-12 col-xs-12">
                        <div class="clearfix">
                            <div class="banner-components">
                                <h1 class="text-uppercase"><?php echo $current_category = single_cat_title("", false);?></h1>
                            </div>
                        </div>
                    </div>
                    <div class="right-te col-md-4 col-sm-4 xs-hidden">
                        <div class="batch-Card">
                            <div class="guidForm">
                            <?php
                echo do_shortcode('[gravityform id=7 title=false description=false ajax=true tabindex=32]');
            ?>
                            </div>
                        </div>
                    </div>
                </div>
                <span class="overlay"></span>
            </div>
        </div>
        <div class="white_bg clearfix">
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
            'taxonomy'                 => 'article-category'
            );
            $cats = get_categories( $args );
            if ($cats){
            ?>
              <nav class="filter-item">
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

                <li><a href="<?php echo home_url();?>/article-category/<?php echo $cat->slug;?>"><?php echo $head;?></a></li>
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
     
                    
        <?php if ( have_posts() ) {?>
        <div class="gray_bg clearfix">
        <div class="container">
            <div class="row margin-top-20 margin-bottom-20 clearfix">
                <div class="col-md-12 col-sm-12 col-xs-12">
                <?php

                while ( have_posts() ) {
                    the_post();

                                ?>  
                    <div class="<?php post_class("post"); ?>" id="post-<?php the_ID(); ?>" itemscope="" itemtype="http://schema.org/BlogPosting">
                    <article class="has-table">
                        <div class="row-table">
                            <!-- Post Img -->
                            <?php
                        $faculty_image = get_featured_image($post->ID, 'faculty');
                            ?>
        <section class="half has-bgimg" style="background-image:url('<?php echo $faculty_image?>')"></section>
                            <!-- Post Content -->
                            <section class="half has-content">
                                <div class="content">
                                <?php
                                $time_string = '<time class="entry-date published updated" datetime="%1$s" itemprop="datePublished">%2$s</time>';

                                            $time_string = sprintf( $time_string,
                                                esc_attr( get_the_date( 'c' ) ),
                                                esc_html( get_the_date() ),
                                                esc_attr( get_the_modified_date( 'c' ) ),
                                                esc_html( get_the_modified_date() )
                                            );
                                ?>
                                    <span class="post-meta"><?php echo $time_string;?></span>
                                    <i class="meta-sep">|</i>
                                    <span class="post-meta meta-author"><a href="<?php echo get_permalink(); ?>" title="Posts by Talentedge Team" rel="author">Talentedge Team</a></span>
                                    <h2 class="post-title"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h2>
                                   <div class="post-entry">
                                        <?php
                                        $shop_isleismore = @strpos( $post->post_content, '<!--more-->');
                                        if($shop_isleismore) :
                                            the_content();
                                        else :
                                            the_excerpt();
                                        endif;
                                        ?>
                                    </div>
                                    <div class="post-more">
                                        <a href="<?php echo get_permalink(); ?>" class="link-more"><?php _e('Read more','talentedge'); ?></a>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </article>
                     </div>
                    <?php
                    }
                    wp_reset_postdata();
                    ?>
                    <!-- Pagination start-->
                            <div class="pagination font-alt">
                                <?php next_posts_link(__('<span class="meta-nav">&laquo;</span> Older posts', 'talentedge')); ?>
                                <?php previous_posts_link(__('Newer posts <span class="meta-nav">&raquo;</span>', 'talentedge')); ?>
                            </div>
                            <!-- Pagination end -->
                   </div>
                </div>
            </div>
            </div>
        <?php } ?>
        
    </section>
<?php           
get_footer(); ?>
<script>
    /*blog script*/
    $(document).on('click', '.filter-item ul li.label', function(event) {
        event.preventDefault();
        $('.filter-item').toggleClass('open');
    });
</script>