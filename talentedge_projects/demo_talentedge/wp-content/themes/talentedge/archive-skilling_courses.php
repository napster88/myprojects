<?php
/**
 * The template for displaying contact page.
 *
 * Template Name: Browse Courses page
 *
 */

get_header(); 
?>

<style>
.checkbox:last-child{margin-bottom:15px;}

</style>
<?php
$taxonomy = 'skilling_sectors';
$tax = get_fiedl('select_sector');
$term = get_term( $tax, $taxonomy );
?>
<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/course-listing.css" rel="stylesheet" />
 <!-- ~~~~~~~~~~ main wrapper ~~~~~~~~~~ -->
    <section class="main-wrapper">
        <div class="te-banner-top">
            <div class="container">
                <div class="left-te col-md-8 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="banner-components">
                            
                            <h1 class="white text-uppercase"><?php echo get_the_title();?></h1>
                            <div class="institute-widget">
                                <div class="instituteName">
                                    <div class="middleAlign">
                                        <h3><?php echo $term->name;?></h3>
                                        <!--<h6>Sub Sector 1</h6>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="cover_nav">
            <div class="secondaryNav">
                <div class="container">
                    <div class="valign">
                        <ul id="list_scroll" class="nav">
                            <li><a href="#view_Course_Overview"><?php echo get_field('overview_headline');?><</a></li>
                            <li><a href="#to_Why_Talentedge"><?php echo get_field('nveqf_headline');?><</a></li>
                            <li><a href="#view_How_it_works"><?php echo get_field('qualification_headline');?><</a></li>
                            <li><a href="#view_Syllabus"><?php echo get_field('nos_headline');?><</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix twoColumn-layout">
            <div class="container">
                <div class="left-te col-md-8 col-sm-12 col-xs-12">
                    <div class="row">
                        <div id="view_Course_Overview">
                         <h2><?php echo get_field('overview_headline');?></h2>
                              <?php

// check if the repeater field has rows of data
if( have_rows('overview') ):

    // loop through the rows of data
    while ( have_rows('overview') ) : the_row();

    ?>
  <div class="base_detail">
                                <h4 class="head-title margin-top-20"><?php echo get_sub_feild('headline');?></h4>
                                <p><?php echo get_sub_feild('subheadline');?></p>
                            </div>
    <?php

    endwhile;

endif;

?>

                        </div>

                        <div id="to_Why_Talentedge" class="margin-top-35">
                            <div class="base_detail">
                                <h2><?php echo get_field('nveqf_headline');?></h2>
                                <h3>Level 4</h3>
                            </div>
                        </div>
                        <div id="view_How_it_works" class="margin-top-35">
                        <h2><?php echo get_field('qualification_headline');?></h2>
                            <?php

// check if the repeater field has rows of data
if( have_rows('qualification') ):

    // loop through the rows of data
    while ( have_rows('qualification') ) : the_row();

    ?>
        <div class="base_detail">
                                <h2>Qualification</h2>
                                <h4 class="margin-top-20"><?php echo get_sub_feild('headline');?></h4>
                                <p><?php echo get_sub_feild('subheadline');?></p>
                            </div>
    <?php

    endwhile;

endif;

?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="te-emi-component margin-top-35">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-sm-12 col-xs-12 fee_emi">
                            <div id="view_Syllabus" class="clearfix">
                                <h2 class="head-title"><?php echo get_field('nos_headline');?></h2>
                                <div class="syntax-list">
                                    <div class="panel-group" id="accordion">
                                       <?php
$kk=1;
// check if the repeater field has rows of data
if( have_rows('nos') ):

    // loop through the rows of data
    while ( have_rows('nos') ) : the_row();
    if ($kk=1){
    ?>

                                        <div class="panel">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                              <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $kk;?>" aria-expanded="false"><?php echo get_sub_field('headline')?></a>
                                            </h4>
                                            </div>
                                            <div id="collapse1" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                   <?php echo get_sub_field('description')?>
                                                </div>
                                            </div>
                                        </div>
                                        <?php } else { ?>
                                        <div class="panel">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                              <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $kk;?>"><?php echo get_sub_field('headline')?></a>
                                            </h4>
                                            </div>
                                            <div id="collapse2" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                     <?php echo get_sub_field('description')?>
                                                </div>
                                            </div>
                                        </div>
                                        <?php } ?>

                                         <?php
                                         $kk++;

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
    </section>

<?php           
get_footer(); ?>

<script>
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
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/jquery.mixitup.js"></script>
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/jquery.mixitup-pagination.js"></script>
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/filter.js"></script>