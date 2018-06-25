<?php

/*
Template Name:  Linked process
*/

$linkedina_key = get_field('linkedin_key','option');
$linkedina_secret = get_field('linkedin_secret','option');

 
session_start();
$baseURL = get_bloginfo('template_url').'/linkedin';
$callbackURL =  get_bloginfo('url').'/process/';
$linkedinApiKey = $linkedina_key;
$linkedinApiSecret = $linkedina_secret;
$linkedinScope = 'r_basicprofile r_emailaddress';


include_once(ABSPATH.'wp-content/themes/talentedge/linkedin/http.php');
include_once(ABSPATH.'wp-content/themes/talentedge/linkedin/oauth_client.php');

//db class instance


if (isset($_GET["oauth_problem"]) && $_GET["oauth_problem"] <> "") {
  // in case if user cancel the login. redirect back to home page.
  $_SESSION["err_msg"] = $_GET["oauth_problem"];
  
 
 // wp_redirect(get_bloginfo('url').'/edit-profile/');
  exit;
}



$client = new oauth_client_class;
$client->debug = false;
$client->debug_http = true;

$client->redirect_uri = $callbackURL;
$client->client_id = $linkedinApiKey;
$application_line = __LINE__;
$client->client_secret = $linkedinApiSecret;

if (strlen($client->client_id) == 0 || strlen($client->client_secret) == 0)


  die('Please go to LinkedIn Apps page https://www.linkedin.com/secure/developer?newapp= , '.
			'create an application, and in the line '.$application_line.
			' set the client_id to Consumer key and client_secret with Consumer secret. '.
			'The Callback URL must be '.$client->redirect_uri).' Make sure you enable the '.
			'necessary permissions to execute the API calls your application needs.';

/* API permissions
 */
//var_dump($client->access_token, $client->Initialize());
//exit();

$client->scope = $linkedinScope;
if (($success = $client->Initialize())) {

  if (($success = $client->Process())) {
  
    if (strlen($client->authorization_error)) {
      $client->error = $client->authorization_error;
      var_dump($client->error);
      $success = false;
    } elseif (strlen($client->access_token)) {

      $success = $client->CallAPI(
					'http://api.linkedin.com/v1/people/~:(firstName,lastName,emailAddress,id,picture-url,location,industry,specialties,positions,summary,skills)', 
					'GET', array(
						'format'=>'json'
					), array('FailOnAccessError'=>true), $user);
    }
  }
  $success = $client->Finalize($success);

}

if ($client->exit) exit;
if ($success) {
   $industry =$user->industry;
    $position = $user->positions->values;
    $designation = "";
    foreach ($position as $positions){
       $designation =  $positions->title;
    }
    $userId = get_current_user_id();
    $linkedinCheck = "yes";

  $designation = preg_replace('/\s+/', '', $designation);
  $industry = preg_replace('/\s+/', '', $industry);
      

          $metas = array( 
              'user_li_position'   => $designation,
              'user_li_industry' => $industry,
              'user_li_linkedincheck' =>$linkedinCheck,
              'user_li_linkedin_email' =>$user->emailAddress
          );
          foreach($metas as $key => $value) {
              update_user_meta( $userId, $key, $value );
          }

    wp_redirect(get_bloginfo('url').'/edit-profile/#suggestcourse');

  //$query_string = 'position='.$designation.'&industry='.$industry.'&linkedincheck = yes';
  //?'.$query_string);

} else {
   $_SESSION["err_msg"] = $client->error;
}
//header("location:index.php");
exit;
?>

