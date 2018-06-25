<?php
/**
 * The template for displaying contact page.
 *
 * Template Name: Xlri Registration
 *
 */

get_header(); 
?>

<?php

//$website = "http://example.com";
if($_POST){
$userdata = array();
    $userdata['user_login']  = $_POST['user_login'];
    $userdata['user_email']  = $_POST['user_email'];
    $userdata['phone_number']  =$_POST['phone_number'];
    $userdata['user_pass']  = '0Fq5w@T580te';
    $userdata['first_last']  = explode(" ",$_POST['user_login']);
    $userdata['first_name']  =  $userdata['first_last']['0'];
    $userdata['last_name']  = $userdata['first_last']['1'];
     $userdata['role']  = 'None';
$detail=get_user_by('email',$_POST['user_email']);
//echo "<pre>";print_r($detail);exit;
if($detail->data->ID>0){
$user_id=$detail->data->ID;
}else{	
$user_id = wp_insert_user( $userdata ) ;
}

//On success
if ( ! is_wp_error( $user_id ) ) {
global $wpdb;


    $tablename=$wpdb->prefix.'xlri_registration';

    $data=array(
        'user_email' => $_POST['user_email'], 
        'user_id' => $user_id,
        'created_at' => current_time( 'mysql'),
        'sliq_id' => 0);
      $siteUrl    = get_bloginfo('url');
     $wpdb->insert( $tablename, $data);
//echo"<pre>";print_r($data);
    //echo "User created : ". $user_id;
           $headers = array('Content-Type: text/html; charset=UTF-8',
            'From:  Talentedge <admission@talentedge.in>');
            $to =  $userdata['user_email'];
            $subject = "Talentedge XLRI Conference Registration confirmation";
            $body = '<p> Dear ' . $userdata['user_login'] . ',<br><br>Thank you for registering for "XLRI International Conference on Assessment Centers and Talent Management in Emerging Markets"
 <br><br>Find below the login details to attend the session online on 9th and 10th Dec, 2017<br><br><a href="' . $siteUrl . '/#loginpopup">'.$siteUrl.'/#loginpopup</a><br><br>Userid - '. $userdata['user_email'].'<br><br>
Password -  ' . $userdata['user_pass'] .'<br><br>Once logged in, you can view the session timings and details under "My Profile - XLRI Conference" tab. <br><br>The link to the sessions will be active on the slated time.<br><br>Looking forward to your participation!<br><br>Please feel free to reach us at rishita.samal@talentedge.in for any queries.<br><br>Thanks<br>
Team Talentedge<br>www.talentedge.in';
$result = wp_mail($to, $subject, $body, $headers);
//echo"<pre>";print_r($result);exit();
$sliqData = array();
            $name = $userdata['user_login'];
            $namediv = explode(' ', $name);
            $sliqData['username'] = $userdata['user_email'];
            $sliqData['password'] = '0Fq5w@T580te';
            $sliqData['email'] = $userdata['user_email'];
            $sliqData['mobile_no'] = $userdata['phone_number'];
            $sliqData['fname'] = $namediv[0];
            $sliqData['lname'] = $namediv[1];
            $sliqData['gender'] = 'M';
            $sliqData['dob'] = '1970-01-01';
 	    if($detail->data->sliq_id>0){
            	$sliqData['lms_id'] = $detail->data->sliq_id;
            }
            $sliqData['status'] = '1';
            $sliqData['batch_id'] = '61'; //for live 40
            $fields_string = http_build_query($sliqData);
            //open connection
            $ch = curl_init();
            //set the url, number of POST vars, POST data
            curl_setopt($ch, CURLOPT_URL, SLIQ_URL . "Api/openRegistration");
            //curl_setopt($ch, CURLOPT_URL, "http://localhost/aws/index.php?entryPoint=lead-genration&");
            curl_setopt($ch, CURLOPT_POST, count($sliqData));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
            //execute post
            $result = curl_exec($ch);
            $decode = json_decode($result, true);
	    if($decode['resultData']['id']>0){
                 $user = $wpdb->update('te_users', array('sliq_id' => $decode['resultData']['id']), array('ID' => $user_id));
		 $user = $wpdb->update('te_xlri_registration', array('sliq_id' => $decode['resultData']['id']), array('id' => $user_id));
            }
		$detail=get_user_by('email',$_POST['user_email']);
	    $sliqData = array();
            $name = $userdata['user_login'];
            $namediv = explode(' ', $name);
            $sliqData['username'] = $userdata['user_email'];
            $sliqData['password'] = '0Fq5w@T580te';
            $sliqData['email'] = $userdata['user_email'];
            $sliqData['mobile_no'] = $userdata['phone_number'];
            $sliqData['fname'] = $namediv[0];
            $sliqData['lname'] = $namediv[1];
            $sliqData['gender'] = 'M';
            $sliqData['dob'] = '1970-01-01';
 	    if($detail->data->sliq_id>0){
            	$sliqData['lms_id'] = $detail->data->sliq_id;
            }
            $sliqData['status'] = '1';
            $sliqData['batch_id'] = '62'; //for live 40
            $fields_string = http_build_query($sliqData);
            //open connection
            $ch = curl_init();
            //set the url, number of POST vars, POST data
            curl_setopt($ch, CURLOPT_URL, SLIQ_URL . "Api/openRegistration");
            //curl_setopt($ch, CURLOPT_URL, "http://localhost/aws/index.php?entryPoint=lead-genration&");
            curl_setopt($ch, CURLOPT_POST, count($sliqData));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
            //execute post
            $result = curl_exec($ch);
            $decode = json_decode($result, true);
	    /*if($decode['resultData']['id']>0){
                 $user = $wpdb->update('te_users', array('sliq_id' => $decode['resultData']['id']), array('ID' => $user_id));
		 $user = $wpdb->update('te_xlri_registration', array('sliq_id' => $decode['resultData']['id']), array('ID' => $user_id));
            }*/
            //echo "<pre>";print_r($decode);exit;
            
	}
}
?>

<section class="subscibe-section" style="background-color: #fff;" id="subscibe-section">
<div class="subscibe text-center">
             <h2> XLRI Conference Registration Form </h2>
</div>
      <form action="<?php echo get_option('siteurl'); ?>/xlri-registration/" method="post" class="form-horizontal">
<fieldset>

<!-- Form Name -->

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="name">Name</label>  
  <div class="col-md-4">
  <input id="user_login" name="user_login" type="text" placeholder="Enter your name" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="email">Email</label>  
  <div class="col-md-4">
  <input id="user_email" name="user_email" type="email" placeholder="Enter your email id" class="form-control input-md" required="">
    
  </div>
</div>



<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="contact">Mobile no.</label>  
  <div class="col-md-4">
  <input id="phone_number" name="phone_number" type="text" placeholder="Enter your contact no." class="form-control input-md" required="">
    
  </div>
</div>
<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="signup"></label>
  <div class="col-md-4">
    <button id="signup" name="signup" class="btn btn-success">Sign Up</button>
  </div>
</div>

</fieldset>
</form>
 </section>
<?php           
get_footer(); ?>
