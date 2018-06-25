<?php
/**
 * The template for displaying all single posts.
 */

get_header(); ?>
<style>
.faculty_head_mid_center h2{
    font-size: 24px;
    font-weight: bold;
    text-transform: uppercase;
    color: #244895;
	margin: 30px 0 0 0;
	text-align: center;
}

.te_course_list 
{
    display: flex;
    flex-direction: row;
    justify-content: center;
    flex-wrap: wrap;
	
}


</style>
<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/course-listing.css" rel="stylesheet" />

<?php
$args = array(
        'post_type' => 'product',
       // 'fields' => 'ids',
        'numberposts' => -1,
       // 's' => $sterm
    );
 $myposts = get_posts( $args);


?>
<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/facultyDetail.css" rel="stylesheet" />
<style>
.h2f{
        padding: 40px 0px 0px 15px;
    font-size: 24px;
    font-weight: 600;
}

</style>
<!-- ~~~~~~~~~~ main wrapper ~~~~~~~~~~ -->
    <section class="main-wrapper">
        <div class="container">
             <?php
                        $i_profile_image = get_featured_image($post->ID, 'faculty');

                        ?>
            <div class="row">

            <?php $inst_id = get_field('select_institute'); ?>
            <!-- <h2 class="h2f">Faculty: <span><?php //echo get_the_title($inst_id);?></span></h2> -->
            </div>
            <div class="row facultyDetail">
                <div class="col-md-3 col-sm-4 col-xs-4 facultyPerson">
                    <!-- <img src="<?php //echo $i_profile_image;?>" /> -->
                    <div class="cover" style="background-image: url(<?php echo $i_profile_image;?>);"></div>
                </div>
                <div class="col-md-9 col-sm-8 col-xs-8 facultyContext">
                    <div class="facultyDesig">
                        <h3><?php echo get_the_title();?></h3>
                        <h4><?php echo get_field('designation');?></h4>
                        <h5><?php echo get_the_title($inst_id);?></h5>
                    </div>
                    <p>
                    <?php echo get_field('description');?>
                    </p>
                </div>
            </div>
			 <div class="contain-search row">
			 <div class="col-xs-12 faculty_head_mid_center">


                    <h2>Courses taken by <?php echo get_the_title();?></h2>
					</div>
			 <div class="col-md-12 col-xs-12 course-list-widget">
         <div class="facult_course_card">
			<ul class="te_course_list clearfix">
			<?php
			$idarray=array();
		//	$new_arr=array();
			$parent_array=array();
			 $max_course=array();
			$final_max_course=array();

			foreach($myposts as $key=>$val)
 {
	$faculty_avail=get_post_meta($val->ID,'faculty',true);

	if(in_array($post->ID,$faculty_avail))
	{
$parent_id=get_field( 'product_parent',$val->ID );

$idarray[$val->ID]['parent_id']=$parent_id;


$mxclass ='';
$idarray[$val->ID]['id']=$val->ID;
 $idarray[$val->ID]['course_img']= get_field('course_image', $val->ID);
//$course_ad = get_field('admission',$val->ID);
 $idarray[$val->ID]['course_cat'] = get_field('course_categories', $val->ID);
 //print_r($course_cat);
$idarray[$val->ID]['select_course'] = get_field('select_course', $val->ID);
$idarray[$val->ID]['course_type'] = get_field('course_type', $val->ID);
  $idarray[$val->ID]['course_inst'] = get_field('c_institute', $val->ID);
$course_ad = get_field('admission_open', $val->ID);
//$course_img = get_field('image', $val->ID);
$idarray[$val->ID]['course_link'] = get_field('link', $val->ID);
$idarray[$val->ID]['course_shortname'] = get_field('course_short_name', $val->ID);
$idarray[$val->ID]['course_duration'] = get_field('duration', $val->ID);
$idarray[$val->ID]['course_start_date'] = get_field('course_start_date', false, false, $val->ID);
 //44
 if ($course_ad=='Yes'){
	$idarray[$val->ID]['mxclass'] = 'admclass';
}
$idarray[$val->ID]['termdata'] = get_term( $course_cat[0], 'course-categories' );
 if ( $course_cat) {
						$ai_categories='';
						foreach( $course_cat as $post_category ) {
						   $ai_categories .=  'te_'.$post_category.' ';
						}
						 //echo $ai_categories;
                                }
			$productParent = get_post_meta($val->ID, 'product_parent',true);
    if ($productParent != '')
        {
          $idarray[$val->ID]['course_link'] = get_permalink($productParent);
        }
        else
        {
            $idarray[$val->ID]['course_link']= get_permalink($val->ID);
        }

		$idarray[$val->ID]['ai_categories']=$ai_categories;
	//	$new_arr[$val->ID]=$parent_id;



					$cl_startdate = get_field('course_start_date', $val->ID, false, false);
                                //$date = new DateTime($cl_startdate);
                                $timevalue = strtotime($cl_startdate);
                                //$new_date = date('M Y', $timevalue);

								$month=date('m', $timevalue);
								$year=date('Y', $timevalue);
								 $new_date = $year.$month;

		if(!empty($parent_id))
		{

			$parent_array[$parent_id][$val->ID]=$new_date;
			}
		else{
			$parent_array[$val->ID][$val->ID]=$new_date;
		}

	}

 }

  foreach($parent_array as $key=>$val)
  {

	$max_course[] = array_keys($val,max($val));

  }




   foreach($max_course as $key=>$val)
   {

	   $final_max_course[]= $val[0];
   }



	foreach($final_max_course as $key=>$val)
	{

?>

  <li id="<?php echo $idarray[$val]['id'];?>" class="mix  <?php echo $idarray[$val]['ai_categories'];?> ct_<?php echo $course_type;?> te_<?php echo $course_inst;?> te_<?php echo $course_ad;?> search col-courses-card">
                                    <div class="courseCover <?php echo $idarray[$val]['mxclass'];?>" style="background-image: url(<?php  echo $idarray[$val]['course_img']; ?>);"></div>
                                    <div class="wrapCard">
                                        <div class="courseCard-detail">
                                            <div class="card">
                                                <h4 class="b_inst_name"><?php echo get_field('short_name', $idarray[$val]['course_inst']);?></h4>
                                                <h2><a href="<?php echo $idarray[$val]['course_link'];?>" onclick="return redirectsinglepage('<?php echo $idarray[$val]['course_link'];?>','Course Category','<?php echo $idarray[$val]['course_shortname'];?>',<?php echo $idarray[$val]['id'];?>,'<?php echo get_field('short_name', $idarray[$val]['course_inst']);?>','<?php echo $idarray[$val]['termdata']->name;?>','<?php echo $new_date.' Batch';?>','<?php echo $key+1;?>' )" style="cursor: pointer;" title="<?php echo $idarray[$val]['course_shortname'];?>"><?php echo $idarray[$val]['course_shortname'];?></a></h2>
                                            </div>
                                            <ul>
                                            <?php

                                            $k=1;
                                            // check if the repeater field has rows of data
                                            if( have_rows('key_points', $idarray[$val]['id']) ):

                                                // loop through the rows of data
                                                while ( have_rows('key_points', $idarray[$val]['id']) ) : the_row();
                                                    if ($k<=2){
                                                   ?>
                                                   <li><?php

												   echo get_sub_field('key_point');?></li>
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
                                            $date = new DateTime($idarray[$val]['course_start_date']);

                                            $cl_startdate = get_field('course_start_date', $idarray[$val]['id'], false, false);
                                //$date = new DateTime($cl_startdate);
                                $timevalue = strtotime($cl_startdate);
                                $new_date = date('M Y', $timevalue);
						$termdata = get_term( $idarray[$val]['course_cat'][0], 'course-categories' );

                                            echo $new_date;?></span> Batch</div>
                                            <div  class="course_period"><span><?php echo  $idarray[$val]['course_duration'];?></span></div>
                                            <div class="btn-te"><a class="redir_btn-a" href="<?php echo  $idarray[$val]['course_link'];  ?>" onclick="return redirectsinglepage('<?php echo  $idarray[$val]['course_link'];  ?>','<?php echo $_GET['search']!=''?'Search Results':'Course Category';?>','<?php echo $idarray[$val]['course_shortname'];?>',<?php echo $idarray[$val]['id'];?>,'<?php echo get_field('short_name', $course_inst);?>','<?php echo $termdata->name;?>','<?php echo $new_date.' Batch';?>','<?php echo $key+1;?>' )" style="cursor: pointer;"  title="<?php echo $idarray[$val]['course_shortname'];?>">View Details</a></div>
                                        </div>
                                    </div>
                                </li>



	<?php  }



 ?>
		</ul>
		</div>
		</div> </div>

			 <div class="row">
            <?php if (get_field('video_link')) {
                $videolink = get_field('video_link');
                ?>
            <div class="clearfix facultyVideo text-center">
                <h6>Learn from skilled instructors with professional experience in the field.</h6>
                <div class="wrapVideo" style="background-image: url('<?php echo get_field('default_video_image','option')?>');">
                    <span class="overLay"></span>
                    <a href="<?php echo $videolink;?>?rel=0&amp;controls=0&amp;autoplay=1&amp;loop=1" class="playVideo" title="Play Video">
                        <i class="fa icon-play"></i>
                    </a>
                </div>
            </div>
            <?php } ?>
        </div>
    </section>
	<style>

	 .container .te_course_list .mix {
    display: block !important;
}
	</style>
<?php get_footer(); ?>
