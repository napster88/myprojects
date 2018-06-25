<?php
/**
 * The template for displaying contact page.
 *
 * Template Name: Institute API 
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

$userid = $user->ID;
$action = $_POST['action'];
$insName = $_POST['instname'];
$insDesc = $_POST['insdescription'];
$crmid =   $_POST['crmid'];


$postType = get_post_type($insid);
$jsonvar = array();

if (!$action) {
      $jsonvar[] = array('status' => false , 'message' => 'You must include Action variable');
      echo json_encode($jsonvar);
      exit();
}

if($action == 'add'){
	if (!$insName || !$crmid) {
      $jsonvar[] = array('status' => false , 'message' => 'You must include the Required parameters');
      echo json_encode($jsonvar);
      exit();
  	}
  	$my_post = array(
    'post_title'    => $insName,
    'post_type'     => 'institute',
    'post_status'   => 'draft'
    );
    $inst_id = wp_insert_post($my_post, true);

   
    // Saving desciption field
    $desc_key = "field_5795b8991b81e";
    $desc_value = $insDesc;
    update_field( $desc_key, $desc_value, $inst_id);

    // Saving crm id
    $crm_key = "field_59075aff790ec";
    $crm_value = $crmid;
    update_field( $crm_key, $crm_value, $inst_id);


    if($inst_id){
      $jsonvar[] = array('status' => true , 'message' => 'Success', 'institute_id' => $inst_id, 'crmid'=> $crmid);
    }
    else{
       $jsonvar[] = array('status' => false , 'message' => 'Faile to create institute');
    }
}
if($action == 'update'){ 

	$args = array(
        'post_type'     => 'institute',
        'post_status'   => 'any',
        'meta_query'    => array(
                                array(
                                    'key'   => 'crm_id',
                                    'value' => $crmid,
                                    'compare'   => 'LIKE'
                                ))
    );

    $c =   get_posts($args);
    $insid =  $c[0]->ID;


	 if (!$insid) {
        $jsonvar[] = array('status' => false , 'message' => 'Wrong CRM Institute ID');
        echo json_encode($jsonvar);
        exit();
    }

    if($insName) {
      $post_update = array(
        'ID'           => $insid,
        'post_title'   => $insName
      ); 
    
      $updatetitle = wp_update_post($post_update);
    } 

    if($insDesc){    
      //Updating title
      $desc_key = "field_5795b8991b81e";
      $desc_value = $insDesc;
      $updatedesc = update_field( $desc_key, $desc_value, $insid);
    }

     if($updatetitle || $updateimg || $updatedesc){
         $jsonvar[] = array('status' => true , 'message' => 'Success', 'institute_id' => $insid, 'crmid'=> $crmid);
    }
    else{
        $jsonvar[] = array('status' => false , 'message' => 'Not updated');
    }
}
echo json_encode($jsonvar);
?>