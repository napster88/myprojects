<div class="alumniBg">
                <div class="container">
                    <div class="left-te col-md-8 col-sm-12 col-xs-12">
                        <div class="flex-row alumnis-widget">
                            <div class="row">
                                <div class="learner-spearkers">
                                    
                                <?php
                                 $testimonials = get_field('testimonials');

                                if ($testimonials) {
                                ?>

                                    <h2 class="col-md-12 col-sm-12 col-xs-12">
                                    <?php echo get_field('testimonials_headline','option');?>
                                        
                                    </h2>
                                   
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="learner-list owl-carousel">

                                        <?php  
                                       // $testimonials = get_field('testimonials');
                           foreach ($testimonials as &$test_list_value) { 
                                 $faculty_image = get_featured_image($test_list_value['id'], 'faculty');

                            ?>
                        <div class="item">
                        
                                <div class="col-md-9 col-sm-9 col-xs-12 text-center">
                        
                                <p><?php echo $test_list_value['testimonial'];?></p>

                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-12 pull-right">
                                    <div class="speaker_avator">
                                        <div class="cover_avator">
                                        <img class="img-responsive" src="<?php echo $faculty_image;?>" />
                                        </div>
                                        <h4><?php echo $test_list_value['name'];?></h4>
                                        <h5><?php echo $test_list_value['designation'];?>, <?php echo $test_list_value['company'];?></h5>
                                        <h5><?php echo $test_list_value['batch'];?></h5>
                                    </div>
                                </div>
                        </div>
                                            <?php

                                            
                                           }
                                                

                                            ?>
                                        </div>
                                    </div>
                                <?php } ?>
                                </div>
                            </div>
                            <?php 
                            $aliumni_block = get_field('alumni');
                            if ($aliumni_block) {?>
                           <h2 class="alumnihead">Our Alumni</h2>
                            <div class="clearfix">
                                <div class="alumnis-list owl-carousel">
                        <?php  
                            $kp=0;
                           foreach ($aliumni_block as &$alumni_list_value) { 
                        ?>
                        <?php


                    $faculty_image = get_featured_image($alumni_list_value['id'], 'faculty');

                            ?>
                                       
                            <div class="item">
                                <div class="alumni_avator">
                                    <img src="<?php echo $faculty_image;?>"/>
                                </div>
                                <div class="detailAlumni">
                                <h3><?php echo $alumni_list_value['name'];?></h3>
                                <h5><?php echo  $alumni_list_value['designation'];?></h5>
                                <h5><?php echo  $alumni_list_value['company'];?></h5>
                                    
                                </div>
                            </div>
                            <?php
                            $kp++;
                                }
                                ?>
                               </div>
                            </div>
                            <?php } ?>
                            <?php if ($kp==0) {?>
                            <style> .alumnihead{display:none !important;}</style>
                            <?php } ?>
                            
                        </div>
                    </div>
                </div>
            </div>