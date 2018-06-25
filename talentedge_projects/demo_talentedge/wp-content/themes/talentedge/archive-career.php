<?php
/**
 * The template for displaying archive pages.
 *
 * Template Name: Careers page
 *
 */
?>
<?php get_header(); ?>

<style type="text/css" media="screen">
    .subscibe-section{
        display: none;
    }
</style>
<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/career.css" rel="stylesheet" />
    <!-- ~~~~~~~~~~ main wrapper ~~~~~~~~~~ -->
    <section class="main-wrapper">

        <!-- ~~~~~~~~~~~~~ Banner section ~~~~~~~~~~~~~ -->
        <div class="sectionBanner">
            <div id="view_hero" style="background-image: url(<?php echo get_field('banner_image');?>);" class="te-banner-top coverImg cover_full">
                <div class="container zIndex2">
                    <div class="left-te col-md-12 col-sm-12 col-xs-12">
                        <div class="clearfix">
                            <div class="banner-components">
                                <h1><?php echo get_field('headline');?></h1>
                                <h3 class="text-white"><?php echo get_field('subheadline');?></h3>
                                <p><?php echo get_field('description');?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <span class="overlay"></span>
            </div>
        </div>


        <!-- ~~~~~~~~~~~~~ dividerColumn Two column section ~~~~~~~~~~~~~ -->
        <div class="gray_bg clearfix">
            <div class="dividerColumn clearfix">
                <div class="col-md-6 col-md-6 col-xs-12 left gray_black_clr">
                   <?php echo get_field('content');?>
                </div>
                <div class="col-md-6 col-md-6 col-xs-12 right">
    <div class="cover_full" style="background-image: url('<?php echo get_field('image');?>')"></div>
                </div>
            </div>      
                <?php if( have_rows('gallery') ): ?>
                    <div class="galleryStrip text-center clearfix">
                    <h3><?php echo get_field('gallery_headilne');?></h3>
                    <section class="magnific-all">
                    <div class="half left owl-theme owl-carousel gallerSlider col-md-12 col-sm-12 col-xs-12">
                    <?php while ( have_rows('gallery') ) : the_row(); ?>

                         <a href="<?php echo get_sub_field('image');?>" data-effect="mfp-zoom-in" class="item cover_full" data-title="<?php echo get_field('gallery_headilne');?>" style="background-image: url(<?php echo get_sub_field('image');?>)">
                         </a>

                    <?php endwhile; ?>
                    </div>
                    </section>
                    </div>
                <?php endif;  ?>
        </div>

        <!-- ~~~~~~~~~~~~~ current openings section ~~~~~~~~~~~~~ -->
        <div class="openings">
            <div class="container">
                <h3 class="text-center"><?php echo get_field('current_openings_headline');?></h3>
                   <?php
$_terms = get_terms( array('careers') );
//print_r($_terms);
foreach ($_terms as $term) :

    $term_slug = $term->slug;
    $_posts = new WP_Query( array(
                'post_type'         => 'careers',
                'posts_per_page'    => -1, //important for a PHP memory limit warning
                'tax_query' => array(
                    array(
                        'taxonomy' => 'careers',
                        'field'    => 'slug',
                        'terms'    => $term_slug,
                    ),
                ),
            ));

    if( $_posts->have_posts() ) :

        echo ' <div class="jobCategory"><h4 class="text-bold">'.$term->name.'</h4> <div class="syntax-list"><div class="panel-group" id="accordion">';
        $inside=1;
        while ( $_posts->have_posts() ) : $_posts->the_post();
        ?>
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#<?php echo $term_slug;?>_<?php echo $inside;?>" class="collapsed">
                        <div class="jobTitle"><?php echo get_the_title();?></div>
                        <h6 class="jobLocation"><?php echo get_field('location');?></h6>
                    </a>
                </div>
            </div>
            <div id="<?php echo $term_slug;?>_<?php echo $inside;?>" class="panel-collapse collapse">
                <div class="panel-body">
                    <?php echo the_content();?>
                    <div class="text-right">
        <a href="<?php echo home_url();?>/job-application?pid=<?php echo $post->ID;?>" class="btn-normal no-shadow text-uppercase">Apply Now</a>
                    </div>
                </div>
            </div>
        </div>
        <?php
        $inside++;
        endwhile;
        echo '</div></div></div>';

    endif;
    wp_reset_postdata();

endforeach;
?>
            </div>
        </div>
    </section>


    <div class="requestfordemo">
        <div class="container">
            <div class="row row-centered">
             <h2 class="title white text-uppercase margin-bottom-25">Reach out to apply for a suitable role</h2>
            <div class="col-md-9 col-centered">

            <div class="guidForm">
            <?php
            echo do_shortcode('[gravityform id=19 title=false description=false ajax=true tabindex=30]');
            ?>
        </div>
            </div>
            </div>
        </div>
    </div>

<?php           
get_footer(); ?>
<script>
    $('.magnific-all').each(function() {
            var $container = $(this);
            var $imageLinks = $container.find('.item');

            var items = [];
            $imageLinks.each(function() {
                var $item = $(this);
                var type = 'image';
                if ($item.hasClass('magnific-youtube')) {
                  type = 'iframe';
                }
                var magItem = {
                  src: $item.attr('href'),
                  type: type
                };
                magItem.title = $item.data('title');    
                items.push(magItem);
            });

            $imageLinks.magnificPopup({
                mainClass: 'mfp-fade',
                items: items,
                gallery:{
                    enabled:true,
                    tPrev: $(this).data('prev-text'),
                    tNext: $(this).data('next-text')
                },
                type: 'image',
                callbacks: {
                    beforeOpen: function() {
                        var index = $imageLinks.index(this.st.el);
                        if (-1 !== index) {
                          this.goTo(index);
                        }
                    }
                }
            });
        });
</script>