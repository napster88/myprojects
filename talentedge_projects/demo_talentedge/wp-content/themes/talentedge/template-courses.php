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
.slist{    border-bottom: 2px solid #ccc;
    margin: 20px 20px 20px 32px !Important;
    padding: 10px !important;}
.te_course_list{margin-top:30px;}
.searcterm h4{font-size: 20px;
    margin: 0px 0px 0px 30px;
}
.searcterm span{font-weight: bold;}
</style>
<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/course-listing.css" rel="stylesheet" />

<?php
$sterm = $_GET['search'];

// if($_GET['id']){
// $sterm = $_GET['id'];
// }

$args = array(
        'post_type' => 'product',
        'fields' => 'ids',
        'numberposts' => -1,
        's' => $sterm
    );
 $myposts = get_posts( $args);
//echo '<div style="display:none" class="'.$stermid.'">';
echo '<div style="display:none" class="'.$sterm.'" id="courseslist">';
print_r($myposts);
echo '</div>'
?>

 <!-- ~~~~~~~~~~ main wrapper ~~~~~~~~~~ -->
    <section class="main-wrapper">
        <div class="te-listing-courses-section">
            <!-- <div class="clearfix hidded">Search matches</div> -->

            <div class="container">
                <!-- <div class="clearfix row user_search_course">
                    <div class="col-md-8 col-sm-8 col-xs-12">
                        <p><?php echo get_field('browse_course_page_headline','option')?></p>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                         <?php if (is_user_logged_in()) { ?>
                        <div class="redir_btn-a text-right"><a href="<?php echo home_url();?>/edit-profile">Suggest a course</a></div>
                         <?php } else { ?>
                          <div class="redir_btn-a text-right"><a href="#loginpopup">Suggest a course</a></div>
                        <?php } ?>
                    </div>
                </div> -->
                <div class="contain-search row">
                    <div class="col-md-2 sm-hidden xs-hidden filter-widget">
                        <div class="text-right"><a href="#" data-target="#popFilter" data-toggle="modal" class="filterIcon" type="button">Filter</a></div>
                        <div class="filter-list" id="popFilter">
                            <form class="controls" id="Filters">
                                <div class="text-left clearfix">
                                    <button id="Reset" class="reset pull-right">Reset Filters</button>
                                </div>

                                <fieldset class="filter-group checkboxes">

                                    <h3>All Category <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></h3>
                                    <div class="overScroll">
                                   <?php
                                    //print_r($categories_arr_list);
                                    foreach ($categories_arr_list as &$btaxonomy) {
                                        ?>
                                        <div class="checkbox">
                                                <input type="checkbox" class="te_<?php echo $btaxonomy['id'];?>" value=".te_<?php echo $btaxonomy['id'];?>"/>
                                                <label><?php echo $btaxonomy['name'];?></label>
                                                <input type="hidden" name="b_inst" class=""/>
                                            </div>
                                        <?php
                                    }
                                    ?>
                                    </div>
                                </fieldset>

                                <fieldset class="filter-group checkboxes">
                                    <h3>All Institutes</h3>
                                    <div class="overScroll">
                                    <?php
                                    //print_r($inst_arr_list);
                                     foreach ($inst_arr_list as &$binst) {
                                        ?>
                                        <div class="checkbox"><input type="checkbox" class="te_<?php echo $binst['id'];?>" value=".te_<?php echo $binst['id'];?>"/><label><?php echo $binst['short_name'];?></label></div>
                                        <?php
                                     }
                                    ?>

                                    </div>
                                </fieldset>

                                <fieldset class="filter-group checkboxes">
                                    <h3>Type of Course</h3>
                                    <div class="overScroll">
                                    <div class="checkbox">
                                        <input type="checkbox" value=".ct_1" class="ct_1"/>
                                        <label>Executive</label>
                                    </div>
                                    <div class="checkbox">
                                        <input type="checkbox" value=".ct_2" class="ct_2"/>
                                        <label>Certificate</label>
                                    </div>
                                    </div>
                                </fieldset>
                                <fieldset class="filter-group checkboxes">
                                    <h3>Status</h3>
                                    <div class="overScroll">
                                    <div class="checkbox">
                                        <input type="checkbox" value=".te_Yes" class="te_Yes"/>
                                        <label>Admission Open</label>
                                    </div>
                                    </div>
                                </fieldset>
                                <div class="callActionFilter">
                                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">Apply Filter</button>
                                   <button id="Reset" class="reset">Reset Filter</button>
                                 </div>

                            </form>
                        </div>
                        <!--<div class="redir_btn-a"><a href="#">Suggest a course</a></div>-->
                    </div>
                    <div class="col-md-10 col-sm-12 col-xs-12 course-list-widget">
                        <div id="Container">
                            <div class="fail-message"><span>No Course were found matchinng the selected filters</span></div>
                            <?php if ($sterm) {?>
                                <div class="searcterm">
                                    <h4>Search Term: <span><?php echo $sterm;?></span></h4>
                                </div>
                            <?php } ?>

                            <ul class="te_course_list clearfix">
                            <?php
                            $navreturnarray=get_admissionopen_browsec($myposts);
                            $nabarray=array();
                            $key=count($navreturnarray);
                            $acount = sizeof($courses_arr2);
                            $co_count=1;
                            //print_r($courses_arr2);
                               foreach ($courses_arr2 as &$bcourse) {
                                $mxclass='';
                                $search='';
                                $course_cat = $bcourse['cat'];
                                $select_course = $bcourse['select_course'];
                                $course_type = $bcourse['type'];
                                $course_inst = $bcourse['inst']['id'];
                                $course_ad = $bcourse['admission'];
                                $course_img = $bcourse['image'];
                                $course_link = $bcourse['link'];
                                $course_shortname = $bcourse['shortname'];
                                 $course_duration = $bcourse['duration'];

                                 $course_start_date = get_field('course_start_date', false, false, $bcourse['id']);


                            if ($select_course==0 && $co_count<$acount){

                                if ( $course_cat) {
                                    $ai_categories='';
                                    foreach( $course_cat as $post_category ) {
                                       $ai_categories .=  'te_'.$post_category.' ';
                                    }
                                     //echo $ai_categories;
                                }

                                if ($course_ad=='Yes'){
                                    $mxclass = 'admclass';
                                }
                                else
                                {
                                    $mxclass = '';
                                }
                                  if (in_array($bcourse['id'], $myposts)){
                                    $search = 'search';
                                }
                                else{
                                    $search ='';
                                }
$date = new DateTime($course_start_date);

                                            $cl_startdate = get_field('course_start_date', $bcourse['id'], false, false);
                                //$date = new DateTime($cl_startdate);
                                $timevalue = strtotime($cl_startdate);
                                $new_date = date('M Y', $timevalue);
$termdata = get_term( $course_cat[0], 'course-categories' );
                        ?>
                         <?php if ($course_ad != 'Yes') :?>
                      <!--  <li id="<?php echo $bcourse['id'];?>" class="mix <?php echo $ai_categories;?> ct_<?php echo $course_type;?> te_<?php echo $course_inst;?> te_<?php echo $course_ad;?> <?php echo $search;?> col-courses-card">
                                    <div class="courseCover <?php echo $mxclass;?>" style="background-image: url(<?php echo $course_img?>);"></div>
                                    <div class="wrapCard">
                                        <div class="courseCard-detail">
                                            <div class="card">
                                                <h4 class="b_inst_name"><?php echo get_field('short_name', $course_inst);?></h4>
                                                <h2><a href="<?php echo $course_link;?>" onclick="return redirectsinglepage('<?php echo $course_link;?>','<?php echo $_GET['search']!=''?'Search Results':'Course Category';?>','<?php echo $course_shortname;?>',<?php echo $bcourse['id'];?>,'<?php echo get_field('short_name', $course_inst);?>','<?php echo $termdata->name;?>','<?php echo $new_date.' Batch';?>','<?php echo $key+1;?>' )" style="cursor: pointer;" title="<?php echo $course_shortname;?>"><?php echo $course_shortname;?></a></h2>
                                            </div>
                                            <ul>
                                            <?php
                                            $k=1;
                                            // check if the repeater field has rows of data
                                            if( have_rows('key_points', $bcourse['id']) ):

                                                // loop through the rows of data
                                                while ( have_rows('key_points', $bcourse['id']) ) : the_row();
                                                    if ($k<=2){
                                                   ?>
                                                   <li><?php echo get_sub_field('key_point');?></li>
                                                   <?php
                                                }
                                                $k++;
                                                endwhile;

                                            endif;

                                            ?>
                                            </ul>
                                        </div>
                                        <div class="viewDetailcard">
                                            <div class="course_period"><span>
                                            <?php
                                            // make date object
                                            $date = new DateTime($course_start_date);

                                            $cl_startdate = get_field('course_start_date', $bcourse['id'], false, false);
                                //$date = new DateTime($cl_startdate);
                                $timevalue = strtotime($cl_startdate);
                                $new_date = date('M Y', $timevalue);
				$termdata = get_term( $course_cat[0], 'course-categories' );
                                            echo $new_date;?></span> Batch</div>
                                            <div  class="course_period"><span><?php echo $course_duration;?></span></div>
                                            <div class="btn-te"><a class="redir_btn-a"  href="<?php echo $course_link;?>"  onclick="return redirectsinglepage('<?php echo $course_link;?>','<?php echo $_GET['search']!=''?'Search Results':'Course Category';?>','<?php echo $course_shortname;?>',<?php echo $bcourse['id'];?>,'<?php echo get_field('short_name', $course_inst);?>','<?php echo $termdata->name;?>','<?php echo $new_date.' Batch';?>','<?php echo $key+1;?>' )" style="cursor: pointer;" title="<?php echo $course_shortname;?>">View Details</a></div>
                                        </div>
                                    </div>
                                </li> -->
 <?php //echo "&&&&&";
$countarray=count($navreturnarray);
$remaining=10-$countarray;
$excourse=explode(" ",$ai_categories);//echo "======".in_array("te_".$_GET['id'],$excourse);
//echo "<pre>";print_r($excourse);echo "</pre>";
                          if(($_GET['search']=='' || $search == 'search') && $new_date!='' && ($_GET['id']=='' || $_GET['id']=='te_'.$course_inst || $_GET['id']==$course_inst || in_array($_GET['id'],$excourse) || in_array("te_".$_GET['id'],$excourse) )){//echo "###".$_GET['id']."====".'te_'.$course_inst;
                               if($key<$remaining){
				$navreturnarray[$bcourse['id']]['name']=$course_shortname;
				$navreturnarray[$bcourse['id']]['id']=$bcourse['id'];
				$navreturnarray[$bcourse['id']]['brand']=get_field('short_name', $course_inst);
                                $navreturnarray[$bcourse['id']]['category']=$termdata->name;
			 	$navreturnarray[$bcourse['id']]['variant']=$new_date.' Batch';
				$navreturnarray[$bcourse['id']]['list']=$_GET['search']!=''?'Search Results':'Course Category';
				$navreturnarray[$bcourse['id']]['position']=$key+1;
                               }
			       $key=$key+1;
			     }?>
                        <?php endif; ?>
                        <?php }
                        $co_count++;
                      }  ?>
                            </ul>
                            <div class="gap"></div>
                            <div class="gap"></div>
                            <div class="gap"></div>
                            <!-- <div class="text-center"><a class="lazyLoad" href="#">More</a></div> -->
                        </div>
                        <div class="pager-list">
                            <!-- Pagination buttons will be generated here -->
                        </div>
                    </div>
                </div>

                <!-- ~~~~~~~~~~~~~ Popular courses ~~~~~~~~~~~~~ -->
        <div class="te-Popular-courses wow slideInUp">
            <div class="clearfix">
                 <?php get_template_part( 'popular'); ?>
            </div>
        </div>
    </section>
<script>

dataLayer.push({
  'event': 'productImpressions',
  'ecommerce': {
    'currencyCode': 'INR',     // Here we have given INR as example. If   other course is accessed by international students then it should be 'USD'
    'impressions': [<?php foreach($navreturnarray as $key =>$value){?>
     {
       'name': "<?php echo $value['name'];?>",      
       'id': <?php echo $value['id'];?>,
       'brand':"<?php echo $value['brand'];?>",
       'category': "<?php echo $value['category'];?>",
       'variant': "<?php echo $value['variant'];?>",
       'list': "<?php echo $value['list'];?>",
       'position': <?php echo $value['position'];?>
     },
     <?php }?>]
  }
});
</script>

<?php
get_footer(); ?>
<script>
    var selectid =  getParameterByName('id');
    setTimeout(function(){
        $('.te_'+ selectid).click();
    },1000)

    $('.page-template-template-courses .te-Popular-courses h2').html('You might also like');
</script>
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/jquery.mixitup.js"></script>
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/jquery.mixitup-pagination.js"></script>
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/filter.js"></script>
<script>
  // $('#Filters #Reset').click();
  $('#Filters')[0].reset();
</script>
