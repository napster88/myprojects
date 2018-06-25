<?php
/* Faculty */
function glbl_faculty_func(){
  $fargs = array(
      'post_type' => 'faculty',
      'posts_per_page' => -1,
  );
  $faculty_arr = array();
  $faculty = new WP_Query(  $fargs );

  if ( $faculty->have_posts() ) :
  while ( $faculty->have_posts() ) : $faculty->the_post();

  $post_id = get_the_ID();
  $faculty_arr2['id'] = $post_id;
  $faculty_arr2['name'] = get_the_title($post_id);
  $faculty_arr2['designation'] = get_field('designation',$post_id);
  $faculty_arr2['excerpt'] = get_field('excerpt',$post_id);
  $faculty_arr2['inst'] = get_field('select_institute',$post_id);
  $faculty_arr2['link'] = get_permalink($post_id);
  $faculty_arr[$post_id] = $faculty_arr2;
  endwhile;
  wp_reset_postdata();
  endif;
  return $faculty_arr;
}

/* alumni */
function glbl_alumni_func(){

  //global $alumni_arr;
  $aargs = array(
      'post_type' => 'alumni',
      'posts_per_page' => -1,
  );
  $alumni_arr = array();
  $alumni = new WP_Query(  $aargs );

  if ( $alumni->have_posts() ) :
    while ( $alumni->have_posts() ) : $alumni->the_post();

      $post_id = get_the_ID();
      $alumni_arr2['id'] = $post_id;
      $alumni_arr2['name'] = get_the_title($post_id);
      $alumni_arr2['designation'] = get_field('designation',$post_id);
      $alumni_arr2['company'] = get_field('company',$post_id);
      $alumni_arr2['course'] = get_field('course_assoociated',$post_id);
      $alumni_arr2['link'] = get_permalink($post_id);
      $alumni_arr[$post_id] = $alumni_arr2;
    endwhile;
    wp_reset_postdata();
  endif;
  return $alumni_arr;
}

/* Testimonials */
function glbl_testimonials_func(){

  $targs = array(
      'post_type' => 'testimonial',
      'posts_per_page' => -1,
  );
  $test_arr = array();
  $test = new WP_Query(  $targs );

  if ( $test->have_posts() ) :
  while ( $test->have_posts() ) : $test->the_post();

  $post_id = get_the_ID();
  $test_arr2['id'] = $post_id;
  $test_arr2['name'] = get_the_title($post_id);
  $test_arr2['designation'] = get_field('designation',$post_id);
  $test_arr2['company'] = get_field('company',$post_id);
  //$test_arr2['course'] = get_field('select_course',$post_id);
   //$test_arr2['inst'] = get_field('c_institute',$test_arr2['course']);
  $test_arr2_batch = get_field('select_batch',$post_id);
  $test_arr2['batch'] = get_field('batch_name',$test_arr2_batch);

  $test_arr2['course'] =$test_arr2_batch;
  $test_arr2['inst'] = get_field('c_institute',$test_arr2_batch);
  $test_arr2['testimonial'] = get_field('testimonial',$post_id);
  $test_arr2['link'] = get_permalink($post_id);
  $test_arr[$post_id] = $test_arr2;
  endwhile;
  wp_reset_postdata();
  endif;
  return $test_arr;
}

add_action('wp_ajax_getCourseDetailById', 'getCourseDetailById', 10);
add_action('wp_ajax_nopriv_getCourseDetailById', 'getCourseDetailById', 10);
function getCourseDetailById(){
  $courseId = $_REQUEST['courseId'];
  $tabaction = $_REQUEST['tabaction'];
  $html = '';
  if($tabaction != '' && $tabaction == 'syllabus' && $courseId != ''){
    if (have_rows('syllabus',$courseId)):
      $html .= '<ul class="list list2">';
      while (have_rows('syllabus',$courseId)) : the_row();
        $html .= '<li>'. get_sub_field('headline') . '</li>';
      endwhile;
      $html .= '</ul>';
    endif;
  }elseif($tabaction != '' && $tabaction == 'eligibility' && $courseId != ''){
    if(get_post_meta($courseId, 'eligibility_headline', true)!= ''){
      // $html .= '<h3>'.get_post_meta($courseId, 'eligibility_headline', true).'</h3>';
    }
    if(get_post_meta($courseId, 'education', true)!= ''){
      $html .= get_post_meta($courseId, 'education', true);
    }
    if(get_post_meta($courseId, 'work_experience_headline', true)!= ''){
      $html .= '<h3>'.get_post_meta($courseId, 'work_experience_headline', true).'</h3>';
    }
    if(get_post_meta($courseId, 'work_experience', true)!= ''){
      $html .= get_post_meta($courseId, 'work_experience', true);
    }

  }elseif($tabaction != '' && $tabaction == 'fee' && $courseId != ''){

      // $html .= '<h3>Program Fee & Duration</h3>';
      $html .= '<ul class="list list2">';
        if(get_post_meta($courseId, '_regular_price', true)!= ''){
          $html .= '<li><strong>For Indian Residents </strong> Rs. '.get_post_meta($courseId, '_regular_price', true).' + GST*</li>';
        }
        if(get_post_meta($courseId, '_outside-india_price', true)!= ''){
          $html .= '<li><strong>For International Students </strong> USD: '.get_post_meta($courseId, '_outside-india_price', true).'</li>';
        }
        if(get_post_meta($courseId, 'installments', true)>0){
          $html .= '<li><strong>Emi options available</strong></li>';
        }

        $html .= '<li><strong>Duration </strong> '.get_post_meta($courseId, 'duration', true).'</li>';
        $html .= '<li><strong>Start - </strong> '.date("d/m/Y", strtotime(get_post_meta($courseId, 'course_start_date', true))).'</li>';
      $html .= '</ul>';

  }elseif($tabaction != '' && $tabaction == 'fee2' && $courseId != ''){

      // $html .= '<h3>Program Fee & Duration</h3>';
    $html .= '<ul class="text-left1">';
    $html .= '<li><strong>Start Date:</strong> '.date("d/m/Y", strtotime(get_post_meta($courseId, 'course_start_date', true))).'</li>';
    $html .= '<li><strong>Timings :</strong> '.get_post_meta($courseId, 'schedule_of_classes', true).'</li>';
    $html .= '<li><strong>Fee</strong> INR '.get_post_meta($courseId, '_regular_price', true).' + GST*</li>';
    $html .= '</ul>';

  }elseif($tabaction != '' && $tabaction == 'installment' && $courseId != ''){
    if(get_post_meta($courseId, 'installments', true)>0){
      $html .= '<h3>Instalment Schedule</h3>';
      $html .= '<table class="table table-responsive emiSchedule">';
      $html .= '<thead></thead><tbody><tr>';
      $inst_count = get_post_meta($courseId, 'installments', true);
         for($k=0; $k<$inst_count; $k++){
           $inst = $k+1;
           $imtext = $inst . " Instalment";
           $inr_lable = 'installments_'.$k.'_inr_price';
           $usd_lable = 'installments_'.$k.'_usd_price';
           $date_lable = 'installments_'.$k.'_installment_due_date';

           $in_currency   = get_post_meta($courseId, $inr_lable, true);
           $usd_currency  = get_post_meta($courseId, $usd_lable, true);
           $deadline  = date("d/m/Y", strtotime(get_post_meta($courseId, $date_lable, true)));

           $html .=  '<td class="full-width"><div class="minstallment"><strong>'.$imtext.'</strong></div>
                             <div class="amount"><span class="break_mb">Rs. '.$in_currency.' +<br>
                               GST*</span></div>
                             <div class="amount"><span class="break_mb">USD '.$usd_currency.'</span></div>
                             <div class="date"><span>Payment Deadline: </span>'.$deadline.'</div>
                             <div style="display:none">xxx</div>
                             <div class="sep"></div></td>';
         }

    /*  $html .=  '<td class="full-width"><div class="minstallment"><strong>1st Instalment</strong></div>
                      <div class="amount"><span class="break_mb">Rs. 30,000 +<br>
                        Taxes*</span></div>
                      <div class="amount"><span class="break_mb">USD 650</span></div>
                      <div class="date"><span>Payment Deadline: </span>18/05/2018</div>
                      <div style="display:none">xxx</div>
                      <div class="sep"></div></td>';
          */
        $html .= '</tr></tbody></table>';
    }


  }elseif($tabaction != '' && $tabaction == 'faculty' && $courseId != ''){
    $posts = get_field('faculty', $courseId);
    if ($posts):
      foreach ($posts as $post):
          // setup_postdata($post);
          $fid              = $post;
          $name             = get_the_title($fid);
          $select_institute = get_field('select_institute', $fid);
          $instname         = get_field('short_name', $select_institute);
          $faculty_image    = get_featured_image($fid, 'faculty');

          $html .= '<li class="col-xs-12 col-sm-6 col-md-3 col-lg-3 noPadd noback">';
          $html .= '<div class="img"><img src="'.$faculty_image.'" alt="teacher1"></div>';
          $html .= '<h3 class="uppercase"><a href="'.get_permalink($fid).'" target="_blank">'.$name.'</a></h3>';
          $html .= '<h4>'.$instname.'</h4>';
          $html .= '</li>';

        endforeach;
    endif;

  }elseif($tabaction != '' && $tabaction == 'batchid' && $courseId != ''){
      $html .= get_post_meta($courseId, 'batch_name', true);
  }

  echo $html;die();

}

function active_course_meta_box_func($object)
{
  wp_nonce_field(basename(__FILE__), "meta-box-nonce");
    if(get_page_template_slug($object->ID) == 'template-active-courses-page.php'){
      $active_course_list = json_decode(get_post_meta($object->ID, "active_course_list", true));
        ?>
        <h4>Select Active Courses</h4>
        <select name="active_course[]" multiple required style="height:160px;">
          <!-- post loop -->
          <?php
          // WP_Query arguments
          $args = array(
            'post_type' => array( 'product' ),
            'post_status' => array( 'publish' ),
            'posts_per_page'  => -1,
            'meta_query' => array(
                array(
                  'key'     => 'admission_open',
                  'value'   => 'Yes',
                  'compare' => '=',
                ),
              ),
            'order'                  => 'DESC',
            'orderby'                => 'date',
          );

          // The Query
          $query = new WP_Query( $args );

          // The Loop
          if ( $query->have_posts() ) {
            while ( $query->have_posts() ) {
              $query->the_post(); ?>
              <?php
              $selected = '';
                if(in_array(get_the_ID(), $active_course_list)){
                  $selected = 'selected';
                }
              ?>
              <option value="<?php echo get_the_ID(); ?>" <?php echo $selected; ?> > <?php echo get_the_title(get_the_ID()); ?></option>
            <?php }
          }
          // Restore original Post Data
          wp_reset_postdata();
          ?>
          <!-- post loop End -->
        </select>
        <?php

    }else{
      echo '<style>
        #active_course_meta{display:none;}
      </style>';
    }
}

function add_active_course_meta_box()
{
    add_meta_box("active_course_meta", "Active Courses", "active_course_meta_box_func", "page", "normal", "high", null);
}

add_action("add_meta_boxes", "add_active_course_meta_box");

function save_active_course_meta_box($post_id, $post, $update)
{

  // echo $_POST["active_course"]; die();

    if (!isset($_POST["meta-box-nonce"]) || !wp_verify_nonce($_POST["meta-box-nonce"], basename(__FILE__)))
        return $post_id;

    if(!current_user_can("edit_post", $post_id))
        return $post_id;

    if(defined("DOING_AUTOSAVE") && DOING_AUTOSAVE)
        return $post_id;

    $slug = "page";
    if($slug != $post->post_type)
        return $post_id;

    $meta_box_dropdown_value = "";

    if(isset($_POST["active_course"]))
    {
        $meta_box_dropdown_value = json_encode($_POST["active_course"]);

    }
    update_post_meta($post_id, "active_course_list", $meta_box_dropdown_value);

}

add_action("save_post", "save_active_course_meta_box", 10, 3);
