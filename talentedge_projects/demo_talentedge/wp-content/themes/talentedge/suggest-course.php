<?php
/**
 * The template for displaying about us page.
 *
 * Template Name: About us page
 *
 */

?>
	
                <div class="text-center">
                    <h2 class="title">
                      Suggested Courses 
                    </h2>
                </div>
                    
                    <?php 

                    $posts = get_field('popular',29);
                    if( $posts ): ?>
                    <ul class="clearfix row">
                       <?php foreach( $posts as $p ): // variable must NOT be called $post (IMPORTANT) ?>
                        <li class="suggest_course col-md-4 col-courses-card">
                            <div class="wrap_card">
                              <?php 
                              $course_id = $p->ID;
                              $course_short_name = get_field('course_short_name', $course_id);
                             //$course_start_date = get_field('course_start_date', $course_id);
                              $course_link = get_permalink( $course_id );
                              $course_duration = get_field('duration', $course_id);
                              $c_institute = get_field('c_institute', $course_id);
                        
                              if (get_field('course_image', $course_id)){
                                  $courseimage = get_field('course_image', $course_id);
                              }
                              else{
                                   $courseimage = get_field('default_course_image', 'option');
                              }

                              ?>
                            <div class="courseCover" style="background-image: url(<?php echo $courseimage?>);"></div>
                              <div class="wrapCard">
                                  <div class="courseCard-detail">
                                      <div class="card">
                                       <h4 class="b_inst_name"><?php echo get_field('short_name', $c_institute);?></h4>
                                          <h3><a href="<?php echo $course_link;?>"><?php echo $course_short_name;?></a></h3>
                                       </div>
                                       <ul>
                                          <?php 
                                              // check if the repeater field has rows of data
                                              if( have_rows('key_points', $course_id) ):

                                                  // loop through the rows of data
                                                  while ( have_rows('key_points', $course_id) ) : the_row();

                                                     ?>
                                                     <li><?php echo get_sub_field('key_point',$course_id );?></li>
                                                     <?php
                                                  endwhile;

                                              endif;

                                              ?>
                                              </ul>
                                  </div>
                                   <div class="viewDetailcard">
                                              <div class="course_period">
                                              <?php  
                                              // make date object
                                              $cl_startdate = get_field('course_start_date', $bcourse['id'], false, false);
                                            //$date = new DateTime($cl_startdate);
                                            $timevalue = strtotime($cl_startdate); 
                                            $new_date = date('M Y', $timevalue);
                                              echo $new_date;?></span> Batch</div>
                                              <div  class="course_period"><span><?php echo $course_duration;?></span></div>
                                              <div class="btn-te"><a class="redir_btn-a" href="<?php echo $course_link;?>" title="<?php echo $course_shortname;?>">View Detail</a></div>
                                          </div>
                                  </div>
                            </div>
                        </li>
                        <?php endforeach; ?>
                      </ul>
                    <?php endif; ?>
           