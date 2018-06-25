<?php
/**
 * The template for displaying contact page.
 *
 * Template Name: Programme API 
 *
 */
?>
<?php
 

header('Content-type: application/json;');
header("Access-Control-Allow-Origin: *");

 
	/* Authentication check */
	$username = $_SERVER['PHP_AUTH_USER'];
	$password = $_SERVER['PHP_AUTH_PW'];
	$user = wp_authenticate( $username, $password);
	
	if ( is_wp_error( $user ) ) {
		$wp_json_basic_auth_error = $user;
		echo json_encode(['error' => false, 'message' => 'Authentication Failed']); exit;
	}
          //print_r($_POST);
	/*getting post fields*/
	$action = $_POST['action'];
	$crmid =  $_POST['programmed_crmid'];
	$program_name = $_POST['pname'];	
	$institute_crmid = $_POST['inst_crm_id'];
	$postStatus = "draft";


	/* getting institute id 
	$insArgs = array(
        'numberposts' => -1,
        'post_type'   => 'institute',
        'meta_key'    => 'crm_id',
        'meta_value'  => $institute_crmid,
        'post_status' => array('publish', 'pending', 'draft')
      ); */

     global $wpdb;
    // echo "select post_id from   te_postmeta where meta_key='field_59075aff790ec' and meta_value='" . $institute_crmid . "'";
     $insID=$wpdb->get_row("select post_id from   te_postmeta where meta_key='field_59075aff790ec' and meta_value='" . $institute_crmid . "'");
     //print_r($insID);die; 
   if($insID){
    $instituteArray =   get_post($insID->post_id);
    if($instituteArray->post_type=='institute'){
          $instituteId= $instituteArray ->ID;
    }
   }
   //print_r($instituteArray);
   // $instituteId =  $instituteArray[0]->ID;die; 

	$jsonvar = array();

	if (!$action) {
	      $jsonvar[] = array('status' => $action , 'message' => 'You must include Action variable');
	      echo json_encode($jsonvar);
	      exit();
	}

	if($action == 'add'){
		if (!$program_name || !$crmid ) {
	      $jsonvar[] = array('status' => false , 'message' => 'You must include the Required parameters');
	      echo json_encode($jsonvar);
	      exit();
	  	}
	  	
	  	$my_post = array(
	    'post_title'    => $program_name,
	    'post_type'     => 'product',
	    'post_status'   => 'draft'
	    );
	    $course_id = wp_insert_post($my_post, true);


	    if ($course_id){
	        update_post_meta( $course_id, '_regular_price', 0 );
	        update_post_meta( $course_id, '_outside-india_regular_price', 0 );	         
	        update_field( 'field_593e892e881ae', $crmid, $course_id );
                update_field( 'crm_programme_id', $crmid, $course_id );
	        update_field( 'field_57a31c5b211a7', $instituteId, $course_id );
	        if($instCount > 1){
	          foreach ($insfinalArray as $key => $value) {
	              $row = array(
	                'field_57bd8d6fb97d7' =>  $value[0],
	                'field_57bd8d7bb97d8' =>  $value[1],
	                'field_57bd8d86b97d9' =>  $value[2]
	              );         
	            add_row('field_57bd8d5cb97d6', $row, $course_id);
	          }
	        }  
	  	} 

			if($course_id){
		        $jsonvar[] = array('status' => true , 'message' => 'Success', 'course_id' => $course_id);
		    }
		      else{
		         $jsonvar[] = array('status' => false , 'message' => 'Failed to create course_status');
		      }
	} 
	
	
	

	if($action == 'update'){ 
	    if (!$program_name || !$crmid ) {
	      $jsonvar[] = array('status' => false , 'message' => 'You must include the Required parameters');
	      echo json_encode($jsonvar);
	      exit();
	    }

	      $args = array(
	        'numberposts' => -1,
	        'post_type'   => 'product',
	        'meta_key'    => 'crm_programme_id',
	        'meta_value'  => $crmid,
	        'post_status' => array('publish', 'pending', 'draft')
	      ); 
	      $c =   get_posts($args);
	      $course_id =  $c[0]->ID; 

		 if (!$course_id) {
	        $jsonvar[] = array('status' => $course_id , 'message' => 'Wrong CRM Programme ID');
	        echo json_encode($jsonvar);
	        exit();
	    }

 
	    /*
	    if($program_name) {
	      $post_update = array(
	        'ID'           => $course_id,
	        'post_title'   => $program_name
	      ); 
	    
	      $updatetitle = wp_update_post($post_update);
	    } 
            */
	    
	    if($instituteId){
	      //update_field( 'field_57a31c5b211a7', $instituteId, $course_id );
	    }

	    	 
            //if($updatetitle  || $institute_crmid){
	    if($institute_crmid){
	         $jsonvar[] = array('status' => true , 'message' => 'Success', 'course_id' => $course_id, 'crmid'=> $crmid);
                 
                 $fp = fopen('programme_api_log_.txt', 'a'); fwrite($fp,  "[".date("F d, Y h:i:s A")."]course_id  updated=".$course_id); fclose($fp);
	    }
	    else{
	        $jsonvar[] = array('status' => false , 'message' => 'Not updated');
                $fp = fopen('programme_api_log_.txt', 'a'); fwrite($fp,  "[".date("F d, Y h:i:s A")."]course_id not updated=".$course_id); fclose($fp);
	    }
	}
echo json_encode($jsonvar); 
?>
