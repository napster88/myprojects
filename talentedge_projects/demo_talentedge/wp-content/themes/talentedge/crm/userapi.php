<?php
/**
 * The template for displaying contact page.
 *
 * Template Name: User API 
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

$action = $_POST['action'];

$email =   $_POST['email'];
$password = rand_string(8);



$crmUserId =   $_POST['crm_user_id'];
$first_name =   $_POST['first_name'];
$last_name =   $_POST['last_name'];
$gender =   $_POST['gender'];
$dob =   $_POST['dob'];
$mobile =   $_POST['mobile'];
$country =   $_POST['country'];
$state =   $_POST['state'];
$city =   $_POST['city'];
$pincode =   $_POST['pincode'];
$address =   $_POST['address'];




//$postType = get_post_type($insid);
$jsonvar = array();

if (!$action) {
      $jsonvar[] = array('status' => false , 'message' => 'You must include Action variable');
      echo json_encode($jsonvar);
      exit();
}

if($action == 'add'){
	if (!$password || !$first_name || !$email || !$crmUserId) {
      $jsonvar[] = array('status' => false , 'message' => 'You must include the Required parameters');
      echo json_encode($jsonvar);
      exit();
  	}
  	
    $existId = username_exists($email);

    if( null == $existId ) {

      // Generate the password and create the user
      $password = wp_generate_password( 12, false );
      $user_id = wp_create_user( $email, $password, $email );
 
      $new_role = 'Customer';
      wp_update_user(
        array(
          'ID'          =>    $user_id,
          'nickname'    =>    $first_name,
          'new_role' => $new_role
        )
      );

      // Set the role
      //$user = new WP_User( $user_id );
      //$user->set_role( 'Customer' );

      
      update_field('first_name', $first_name, 'user_'.$user_id.'');
      update_field('last_name', $last_name, 'user_'.$user_id.'');
      update_field('gender', $gender, 'user_'.$user_id.'');
      update_field('date_of_birth', $dob, 'user_'.$user_id.'');
      update_field('usereditprofile_email', $email, 'user_'.$user_id.'');
      update_field('phone_number', $mobile, 'user_'.$user_id.'');
      update_field('billing_country', $country, 'user_'.$user_id.'');
      update_field('billing_state', $state, 'user_'.$user_id.'');
      update_field('billing_city', $city, 'user_'.$user_id.'');
      update_field('billing_postcode', $pincode, 'user_'.$user_id.'');
      update_field('billing_address_1', $address, 'user_'.$user_id.'');
      update_field('crm_user_id', $crmUserId, 'user_'.$user_id.'');

      $adminEmail = get_option('admin_email');
      $headers = array('Content-Type: text/html; charset=UTF-8',
          'From:  Talentedge <admission@talentedge.in>','Disposition-Notification-To: '.$user_email.'\n');
      $subject = "Welcome to Talentedge!";
      $body = '<p> Hi there,<br><br>Thank you for registering with <a href="'.$siteUrl.'">Talentedge</a> 
                Take your career to the next level with our range of courses across categories.<br><br>
                 Username: '.$email .'<br>Password: '.$password .' <br><br>If you have any problems, please contact us at 
                '.$adminEmail.
                '<br><br>Thanks,<br>Team TalentEdge';


    //  wp_mail( $email, $subject, $body, $headers );
     

    } // end if


    if($user_id){
      $jsonvar[] = array('status' => true , 'message' => 'Success', 'userid' => $user_id, 'email'=> $email);
    }
    else{
       $jsonvar[] = array('status' => false , 'message' => 'Failed to create User', 'exist-userid'=>$existId);
    }
}
if($action == 'update'){ 

    $user = get_user_by( 'email', $email );
    $user_id = $user->ID;


      if($first_name){
        update_field('first_name', $first_name, 'user_'.$user_id.'');
      }
      if($last_name){
        update_field('last_name', $last_name, 'user_'.$user_id.'');
      }
      if($gender){  
        update_field('gender', $gender, 'user_'.$user_id.'');
      }
      if($dob){
        update_field('date_of_birth', $dob, 'user_'.$user_id.'');
      }
      if($email){
        update_field('usereditprofile_email', $email, 'user_'.$user_id.'');
      }
      if($mobile){
        update_field('phone_number', $mobile, 'user_'.$user_id.'');
      }
      if($country){
        update_field('billing_country', $country, 'user_'.$user_id.'');
      }
      if($state){
        update_field('billing_state', $state, 'user_'.$user_id.'');
      }
      if($city){
        update_field('billing_city', $city, 'user_'.$user_id.'');
      }
      if($pincode){
        update_field('billing_postcode', $pincode, 'user_'.$user_id.'');
      }
      if($address){
        update_field('billing_address_1', $address, 'user_'.$user_id.'');
      }  
    


     if($email){
        $jsonvar[] = array('status' => true , 'message' => 'Success', 'userid' => $user_id, 'email'=> $email);     }
    else{
        $jsonvar[] = array('status' => false , 'message' => 'Not updated');
    }
}
echo json_encode($jsonvar);
?>