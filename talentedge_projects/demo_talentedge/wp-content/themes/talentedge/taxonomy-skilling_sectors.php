<?php
/**
 * The template for displaying all single posts.
 */

get_header(); 
$catId = get_the_category( $post->ID );
?>
<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/skilling-sector.css" rel="stylesheet" />
<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/category-landing.css" rel="stylesheet" />

<?php 
global $wp_query;
$queried_object = get_queried_object(); 
$taxonomy = $queried_object->taxonomy;
$term_id = $queried_object->term_id;  
$current_category = single_cat_title("", false);
if ( get_field('category_color', 'course-categories_'.$tag->term_id)){
$termcolor = get_field('category_color', 'course-categories_'.$tag->term_id);
}
else{
    $termcolor = '#244895';
}

?>
<style>
h2.title {
    font-size: 30px;
    color: #151515;
    font-family: "Oswald", sans-serif;
    line-height: 1.4;
    font-weight: bold;
}
.learner-spearkers{max-width: 90%;}
.col-courses-card .courseCard-detail h2{
    padding-top: 29px;
}
.courseCard-detail{
    min-height: 100px !important;
}
.course-block{
    text-align: center;
    width: 100%;
    display: inline-block;
}

.card-university {
    margin-top: 35px;
    float: none;
    display: inherit;
    margin-left: -4px;
}
.redir_link{
    background-color: #f26522;
    color: #fff;
    font-size: 18px;
    padding: 12px 35px;
    border: 0px;
    min-width: 18px !important;
    box-shadow: 0 4px 0px #983100;
    display: inline-block;
    margin: 21px 0px 0;
    font-size: 14px;
    text-transform: uppercase;
    font-weight: 500;
    padding: 15px 25px 14px 25px;
    min-width: 190px;
}
.redir_link:hover{
    color: #fff;
}
</style>
<!-- ~~~~~~~~~~ main wrapper ~~~~~~~~~~ -->
    <section class="main-wrapper">
       <!-- ~~~~~~~~~~~~~ top banner ~~~~~~~~~~~~~ -->
        <div class="sectionBanner" style="background-image:url(<?php echo get_field('banner_background','skilling_sectors_<?php echo $catId;?>')?>);">
            <div class="container">
                <div class="pos_placer clearfix">
                    <div class="leftTeaser col-md-6 col-sm-6 col-xs-12">
                        <div class="row">
                            <h1 class="white text-bold"><?php echo $current_category;?></h1>
                            <div class="clearfix">
    <p><?php echo get_field('subheadline',$taxonomy . '_' . $term_id)?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container proTask_context">
            <div class="row clearfix">
                <div class="col-md-10 col-md-offset-1 col-sm-12 col-xs-12">
                    <p  class="task_context">
                        <?php echo get_field('desscription',$taxonomy . '_' . $term_id)?>
                    </p>
                </div>
            </div>
            
            <div class="course-block">    
<?php  
         $args = array(
            'post_type'  => 'skilling_courses',
            'numberposts'   => -1,
            'post_status' => 'publish',
            'orderby'    => 'date',
            'order'      => 'ASC',
            'meta_key'      => 'select_sector',
            'meta_value'    => $term_id
        );
        $query = new WP_Query( $args );
        $count = $query->post_count;

        $i = 0;
         if ( $query->have_posts()  ) {
            while ( $query->have_posts() ) : $query->the_post();   
                $post_id = get_the_ID();
                $background_image= get_field('course_image',$post_id);    
                
                ?>
                <div class="col-md-4 col-sm-6 col-xs-6 card-university">
                    <div class="col-courses-card">
                        <div class="courseCover" style="background-image: url('<?php echo $background_image; ?>' );"></div>
                            <div class="wrapCard">
                                <div class="courseCard-detail">
                                    <div class="card">
                                        <h2><a href="<?php echo get_permalink($post_id);?>"><?php echo get_the_title($post_id);?></a></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        <?php $i++ ; 
           if($i == 3) break; 
        endwhile;
        }

?>
       <?php if($count > 3) { ?>
        <div class="text-center  clearfix col-md-12 col-sm-12 col-xs-12">
            <a class="text-center redir_link" href="<?php echo home_url();?>/skilling-courses/?id=<?php echo $term_id;?>">Browse All</a>
        </div>
        <?php } ?>
        </div>     
</div>

        <?php include( locate_template( 'template-request.php',false, false ) ); ?>
   
        </section>
<?php get_footer(); ?>
<script>

 var selectid =  getParameterByName('id');
    setTimeout(function(){
        $('.te_'+ selectid).click();  
},1000)

if ( $('.global-client-slider') ) {
    $('.global-client-slider').owlCarousel({
        margin: 10,
        loop: false,
        // autoWidth:true,
        items: 5,
        nav: true,
        lazyLoad: true,
        navText: ["<span class='icon-back_arrow'>", "<span class='icon-left-arrow'>"],
        responsive: {
            0: {
                items: 2
            },
            567: {
                items: 3
            },
            768: {
                items: 3
            },
            1024: {
                items: 5,
                autoplay: true
            }
        }
    });
}
</script>