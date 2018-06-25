<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package mwd
 */

get_header(); ?>
<!-- ~~~~~~~~~~ main wrapper ~~~~~~~~~~ -->
    <section class="main-wrapper">
        <div class="sectionBanner">
            <div id="bg_404" style="background-image: url(<?php echo get_field('404image','option')?>);" class="">
                <div class="mini-container">
                    <h3 class="text-white"><?php echo get_field('404headline','option')?></h3>
                    <div class="">
                        <div class="search">
                            <!--<input type="text" name="search" placeholder="Search by Course Name">-->
                            <!--<?php echo do_shortcode( '[aws_search_form]' ); ?>-->
                            <div class="searchdiv">
                                <input id="search-hidden-mode" name="search" placeholder="Find a course" type="text" data-list=".hidden_mode_list" data-nodata="No results found" autocomplete="off">
                                <ul class="vertical hidden_mode_list">
                                  <?php foreach ($courses_arr2 as &$ex_b) {
                                    if ($ex_b['select_course']==0){
                                        if ($ex_b['admission'] =='Yes'){
                                        $adm = '<span class="adopen">Admission Open</span>';
                                        }
                                        else{
                                           $adm=''; 
                                        }
                                        $inid = $ex_b['inst']['id'];
                                        $inst_id = get_field('short_name', $inid);
                                    ?>
                                   <li>
                                   <a href="<?php echo $ex_b['link']; ?>">
                                       <span class="sname"><?php echo $ex_b['shortname'];?></span>
                                       <span class="type"><?php echo $inst_id;?></span>
                                       <?php echo $adm;?>
                                   </a>
                                   </li>
                                  <?php }  } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <h3 class="text-white text-center">
                        <div class="orSep"><span class="">OR</span></div>
                       <?php echo get_field('404subheadline','option')?>
                    </h3>
                    <div class="text-center text-white">
                        <a href="#callAction-modal" data-toggle="tooltip" data-placement="top" class="btn-normal no-shadow"><?php echo get_field('404buttontext','option');?></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/theme_scripts.js"></script>

<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/theme_custom.js"></script>
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/global.js"></script>

<script>
      $('#search-hidden-mode').hideseek({
    hidden_mode: true,
    highlight: true,
    min_chars: 3,
    nodata: 'No results found'
  });
       $('#search-hidden-mode3').hideseek({
    hidden_mode: true,
    highlight: true,
    min_chars: 3,
    nodata: 'No results found'
  });
      
      $('#search-hidden-mode').on("_after", function() {
        if ($('.hidden_mode_list li.no-results')){
        $('.searchdiv .hidden_mode_list').css('height','220px');
        $('.searchdiv .no-results').html('');
        $('.searchdiv .no-results').append($('#notfound_results').html());
        $('.notfound_results').show();
        }
        else{
            $('.searchdiv .hidden_mode_list').css('height','auto');
        }
    });

      $('#search-hidden-mode3').on("_after", function() {
        if ($('.searchdiv2 .hidden_mode_list li.no-results')){
        $('.searchdiv2 .hidden_mode_list').css('height','220px');
        $('.searchdiv2 .no-results').html('');
        $('.searchdiv2 .no-results').append($('#notfound_results').html());
        $('.searchdiv2 .notfound_results').show();
        }
        else{
            $('.searchdiv2 .hidden_mode_list').css('height','auto');
        }
    });
</script>

<script>
    var hg = $(window).height() - $('header').height();
    $('#bg_404').css('min-height',hg);
    $(window).resize(function(event) {
        var hg = $(window).height() - $('header').height();
        $('#bg_404').css('min-height',hg);
    });
</script>