<?php
/**
 * The template for displaying contact page.
 *
 * Template Name: Leads API  
 *
 */
?>
<?php


header('Content-type: application/json;');
header("Access-Control-Allow-Origin: *");
 

$username = $_SERVER['PHP_AUTH_USER'];
$password = $_SERVER['PHP_AUTH_PW'];
$user = wp_authenticate( $username, $password);
	
if ( is_wp_error( $user ) ) {
	$wp_json_basic_auth_error = $user;
	echo json_encode(['error' => false, 'message' => 'Authentication Failed']); exit;
}

 $action = $_POST['action'];
   
  /* Lead Info */

  $leadSource = $_POST['lead_source'];
  $leadName = $_POST['user_name'];
  $leadEmail = $_POST['user_email'];
  $leadPhone = $_POST['user_phone'];
  $batchCode = $_POST['batch_code'];
  $leadStatus = $_POST['lead_status'];
  $leadCreationDate = $_POST['created_date'];
  $leadCity = $_POST['city'];
  $leadAge = $_POST['age'];
  $leadCompany = $_POST['company'];
  $leadFunctionalArea = $_POST['functional_area'];
  $leadWorkex = $_POST['work_exp'];
  $leadEducation = $_POST['education'];
  $leadPreviousCourse = $_POST['previous_course'];
  $leadCrmid = $_POST['lead_crmid'];
  
  /* Referral Info */
  $leadReferredBy = $_POST['referred_by'];
  $jsonvar = array();

if (!$action) {
      $jsonvar[] = array('status' => $action , 'message' => 'You must include Action variable');
      echo json_encode($jsonvar);
      exit();
}


if($action == 'add'){ 

  if (!$leadSource) {
      $jsonvar[] = array('status' => 'false' , 'message' => 'You must include Lead Source');
      echo json_encode($jsonvar);
      exit();
  }	
	
  if($leadSource == 'Referral') {

	  if (!$leadName || !$leadEmail || !$leadPhone || !$leadReferredBy || !$leadCrmid) {
      $jsonvar[] = array('status' => 'false' , 'message' => 'You must include the Required parameters');
      echo json_encode($jsonvar);
      exit(); 
  	}
  }

  else {
    if (!$leadName || !$leadEmail || !$leadPhone || !$leadCrmid) {
      $jsonvar[] = array('status' => 'false' , 'message' => 'You must include the Required parameters');
      echo json_encode($jsonvar);
      exit(); 
    }
  }
  	//print_r($_POST);
  	//die();

      $my_post = array(
        'post_title'  => $leadEmail ,
        'post_status' => 'publish',
        'post_type' => 'crm-leads', 
        'post_author' => 1,
        'post_date' => $leadCreationDate,
        'meta_input'   => array(
	        'lead_source' => $leadSource,
	        'name' => $leadName,
	        'phone' => $leadPhone,
	        'batch_code'=> $batchCode,
	        'status' => $leadStatus,
	        'age' => $leadAge,
	        'city' => $leadCity,
	        'company' => $leadCompany,
	        'functional_area' => $leadFunctionalArea,
	        'work_experiance' => $leadWorkex,
	        'education' => $leadEducation,
	        'previous_courses' => $leadPreviousCourse,
	        'referred_by' => $leadReferredBy,
	        'lead_crmid' => $leadCrmid
        ),
      ); 
      	
    $result = wp_insert_post($my_post);


  	if($result){
        $jsonvar[] = array('status' => 'true' , 'message' => 'Success', 'lead_id' => $result , 'crm-leadid' => $leadCrmid);
      }
      else{
         $jsonvar[] = array('status' => 'false' , 'message' => 'Failed to create Lead');
      }
   
   } 


if($action == 'update'){ 
    if (!$leadCrmid) {
      $jsonvar[] = array('status' => false , 'message' => 'You must include the Required parameters');
      echo json_encode($jsonvar);
      exit();
    }
      
      $args = array(
        'numberposts' => -1,
        'post_type'   => 'crm-leads',
        'meta_key'    => 'lead_crmid',
        'meta_value'  => $leadCrmid,
        'post_status' => 'any'
      ); 
      $leadArray =   get_posts($args);
      $lead_id =  $leadArray[0]->ID; 


	 if (!$lead_id) {
        $jsonvar[] = array('status' => $course_id , 'message' => 'Wrong CRM Lead ID');
        echo json_encode($jsonvar);
        exit();
    }
 

    if($leadEmail) {
      $post_update = array(
        'ID'           => $lead_id,
        'post_title'   => $leadEmail
      ); 
    
      $updatetitle = wp_update_post($post_update);
    } 

    if($leadSource){
      update_post_meta( $lead_id, 'lead_source', $leadSource );
    }
    if($leadName){
      update_post_meta( $lead_id, 'name', $leadName );
    }
    if($leadPhone){
      update_post_meta( $lead_id, 'phone', $leadPhone );
    }
    if($batchCode){
      update_post_meta( $lead_id, 'batch_code', $batchCode);
    }
    if($leadStatus){
      update_post_meta( $lead_id, 'status', $leadStatus );
    }
    if($leadAge){
      update_post_meta( $lead_id, 'age', $leadAge );
    }
    if($leadCity){
      update_post_meta( $lead_id, 'city', $leadCity );
    }
    if($leadCompany){
     update_post_meta( $lead_id, 'company', $leadCompany );
    }
    if($leadFunctionalArea){
      update_post_meta( $lead_id, 'functional_area', $leadFunctionalArea );
    }
    if($leadWorkex){
      update_post_meta( $lead_id, 'work_experiance', $leadWorkex );
    }
    if($leadEducation){
      update_post_meta( $lead_id, 'education', $leadEducation );
    }
    if($leadPreviousCourse){
      update_post_meta( $lead_id, 'previous_courses', $leadPreviousCourse );
    }
    if($leadReferredBy){
      update_post_meta( $lead_id, 'referred_by', $leadReferredBy );
    }

    if($leadCreationDate){
	    wp_update_post(
	          array (
	              'ID'            => $lead_id, // ID of the post to update
	              'post_date'     => $leadCreationDate,
	              'post_date_gmt' => get_gmt_from_date($leadCreationDate)
	          )
	    );
	}    
    
    //echo get_the_modified_time('h:i:sa', $course_id);

    if($leadSource || $leadName || $leadPhone || $batchCode || $leadStatus 
      || $leadAge || $leadCity || $leadCompany || $leadFunctionalArea || $leadWorkex || $leadEducation ||
      $leadPreviousCourse || $leadReferredBy || $leadCreationDate)
    {
        $jsonvar[] = array('status' => 'true' , 'message' => 'Lead updated', 'lead_id' => $lead_id , 'crm-leadid' => $leadCrmid);
    }
    else{
        $jsonvar[] = array('status' => false , 'message' => 'Not updated');
    }
}
echo json_encode($jsonvar); 
?>