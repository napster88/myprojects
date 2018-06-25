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
                       <?php echo get_field('popular_headline', 29)?>
                    </h2>
                </div>

                <!-- only for mobile -->
                <div class="popularCourseCard clearfix">
                    <?php

                    $posts = get_field('popular', 29);
                    if( $posts ): ?>

                        <ul class="clearfix row">
                        <?php foreach( $posts as $p ): // variable must NOT be called $post (IMPORTANT) ?>
                            <?php

                            $course_id = $p->ID;
                            $institute_id = get_field('c_institute', $course_id);
                            $institute_logo = get_field('logo', $institute_id);
                            $institute_title = get_the_title( $institute_id );



                            ?>
                            <li class="col-md-2 col-sm-6 col-xs-6">
                                <div class="cardSmall">
                                    <div class="clearfix">
                                        <div class="left">



<div class="text-center img_height" style="background-image: url(<?php echo $institute_logo;?>);">
                                            </div>

                                            <div class="bottom_course">
                                                <h3><a href="<?php echo get_permalink( $course_id ); ?>"><?php echo get_field('course_short_name', $course_id ); ?></a></h3>
                                                <h4><?php echo $institute_title;?></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </div>


                <!-- check this hell -->
                <div class="colcarou clearfix">

                    <?php

                    $posts = get_field('popular',29);

                    if( $posts ): ?>


                        <?php foreach( $posts as $p ): // variable must NOT be called $post (IMPORTANT)
														$mxclass = '';
													if(get_post_meta($course_id, 'admission_open', true) == 'Yes'){
														$mxclass = 'admclass';
													}
													 ?>
                        <div class="cardSmall <?php echo $mxclass; ?>">
                             <div class="wrapp_All">
                            <?php
                            $course_id = $p->ID;
                            $institute_id = get_field('c_institute', $course_id);
                            $institute_logo = get_field('logo', $institute_id);
                            $institute_title = get_field('short_name', $institute_id );
                            $course_excerpt = get_field( 'course_excerpt', $course_id);

                             $course_excerpt = substr($course_excerpt, 0, 350);

                            if (get_field('course_image', $course_id)){
                                $courseimage = get_field('course_image', $course_id);
                            }
                            else{
                                 $courseimage = get_field('default_course_image', 'option');
                            }

                            ?>
                             <div class="left">
                                <div class="course_provider">
                                     <img class="sliderCover" src="<?php echo $courseimage;?>" alt="<?php echo get_the_title( $course_id ); ?>">
                                    <?php if ($institute_logo) {?>
                                    <div class="pad_around"><img class="provider" src="<?php echo $institute_logo;?>" alt=""></div>
                                    <?php } ?>
                                </div>
                                <div class="bottom_course">
                                    <h3><a href="<?php echo get_permalink( $course_id ); ?>"><?php echo get_field('course_short_name', $course_id ); ?></a></h3>
                                    <h4><?php echo $institute_title;?></h4>
                                </div>
                            </div>
                            <div class="hidden-xs right">
                                <h3>
                                    <a href="<?php echo get_permalink( $course_id );?>"><?php echo get_field('course_short_name', $course_id ); ?></a>
                                </h3>
                                <h4><?php echo $institute_title;?></h4>
                                <p><?php echo truncate($course_excerpt, 250);?></p>
                                <div class="text-right knowMore-btn">
                                    <a href="<?php echo get_permalink( $course_id ); ?>" title="">Know More</a>
                                </div>
                            </div>
                             </div>
                    </div>

                        <?php endforeach; ?>

                    <?php endif; ?>
                </div>
