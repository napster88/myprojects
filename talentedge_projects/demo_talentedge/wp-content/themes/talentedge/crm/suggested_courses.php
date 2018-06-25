<?php
/**
 * The template for displaying contact page.
 *
 * Template Name: Sugges API 
 *
 */
?>
<?php
header('Content-type: application/json;');
header("Access-Control-Allow-Origin: *");


$username = $_SERVER['PHP_AUTH_USER'];
$password = $_SERVER['PHP_AUTH_PW'];
$user = wp_authenticate( $username, $password );
	
if ( is_wp_error( $user ) ) {
	$wp_json_basic_auth_error = $user;
	echo json_encode(['error' => false, 'message' => 'Authentication Failed']); exit;
}

//$userid = $user->ID;

$email = $_POST['email'];

//$postType = get_post_type($insid);
$jsonvar = array();

if (!$email) {
      $jsonvar[] = array('status' => false , 'message' => 'User Email is Required');
      echo json_encode($jsonvar);
      exit();
}

//$email='Madhu123@inkoniq.com';
$user = get_user_by( 'email', $email );
$userId = $user->ID;

     if ($userId){

     $postIdArray = array();
     $userDesignation = get_user_meta($userId,'user_li_position');
     $userIndustry = get_user_meta($userId,'user_li_industry');
     $userExperience = get_user_meta($userId,'user_li_experience');
     global $wpdb;
     $qry_args = array(
        'post_status' => 'publish', // optional
        'post_type' => 'product', // Change to match your post_type
        'posts_per_page' => -1, // ALL posts
        );
        $the_query = new WP_Query( $qry_args );

            // The Loop
            if ( $the_query->have_posts() ) {
               // The Loop
                while ( $the_query->have_posts() ) : $the_query->the_post(); 
                    $post_id = get_the_ID();
                    $CourseDesignation = get_field('suggestion_designation', $post_id);
                    $CourseIndustry = get_field('suggestion_industry',$post_id);
                    $CourseExperience = get_field('suggestion_experience',$post_id);
                    $select_course = get_field('select_course',$post_id);
                    if($select_course == 0){

                        if (in_array($userDesignation[0], $CourseDesignation) &&in_array($userIndustry[0], $CourseIndustry) && in_array($userExperience[0], $CourseExperience) ) {
                            array_push( $postIdArray, $post_id);
                        }
                    }      
                endwhile; 
              ?>          
               <?php  if( $postIdArray ): ?>
                      
                <?php //print_r($postIdArray); ?>
                       <?php foreach( $postIdArray as $p ): // variable must NOT be called $post (IMPORTANT) ?>
                          

                      <?php
                            $course_id = $p;
                            $course_short_name = get_field('course_short_name', $course_id);
                            $course_batch_name = get_field('batch_name', $course_id);
                            $course_start_date = get_field('course_start_date', $course_id);
                            $course_link = get_permalink( $course_id );
                            $course_duration = get_field('duration', $course_id);
                      
                            if (get_field('course_image', $course_id)){
                                $courseimage = get_field('course_image', $course_id);
                            }
                            else{
                                 $courseimage = get_field('default_course_image', 'option');
                            }

                            ?>

                        <?php
                        $gif_data[] = array(
                            'program'  => $course_short_name,
                            'batch' => $course_batch_name,
                            'link' => $course_link,
                            'duration' => $course_duration,
                            'start_date' => $course_start_date
                        );
                         $jsonvar[] = $gif_data;
                        ?>


                        
                        <?php endforeach; ?>

                <?php endif;

                }?>

                <?php
                     if (empty($jsonvar)) {

                       $posts = get_field('popular', 29);
                       //print_r($posts);
                        if( $posts ):

                           foreach( $posts as $p ):

                            $course_id = $p->ID;
                            $course_short_name = get_field('course_short_name', $course_id);
                            $course_batch_name = get_field('batch_name', $course_id);
                            $course_start_date = get_field('course_start_date', $course_id);
                            $course_link = get_permalink( $course_id );
                            $course_duration = get_field('duration', $course_id);
                      
                            if (get_field('course_image', $course_id)){
                                $courseimage = get_field('course_image', $course_id);
                            }
                            else{
                                 $courseimage = get_field('default_course_image', 'option');
                            }

                            ?>

                        <?php
                        $gif_data[] = array(
                            'program'  => $course_short_name,
                            'batch' => $course_batch_name,
                            'link' => $course_link,
                            'duration' => $course_duration,
                            'start_date' => $course_start_date
                        );
                         

                         endforeach;
                         $jsonvar[] = $gif_data;

                         endif;
                        ?>
                      
                <?php } ?>
                   
           <?php  
         }
echo json_encode($jsonvar);
?>