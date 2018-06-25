<?php
add_action('wp_ajax_check_user_score', 'check_user_score', 10);
add_action('wp_ajax_nopriv_check_user_score', 'check_user_score', 10);

function check_user_score()
{
  $status = 0;
  if(!is_user_logged_in()){
    $email = $_POST['email'];
  }else{
    $current_user = wp_get_current_user();
    $email = $current_user->user_email;
  }
  //  echo $email;die();
    $user = get_user_by( 'email', $email );
    if(!empty($user)){
      $userID = $user->ID;
      $havemeta = get_user_meta($userID, 'babd_assesment_score', true);
      if($havemeta){
          if($havemeta < 6){
            $status = 2;
          }else{
            $status = 1;
          }
      }
    }
    echo $status;die();
}
add_action('wp_ajax_up_popup_login_user', 'up_popup_login_user', 10);
add_action('wp_ajax_nopriv_up_popup_login_user', 'up_popup_login_user', 10);

function up_popup_login_user()
{
  $info = array();
   $info['user_login'] = $_POST['email'];
   $info['user_password'] = $_POST['pass'];
   $info['remember'] = true;

   $user_signon = wp_signon( $info, false );
   if ( is_wp_error($user_signon) ){
       echo false;
   } else {
        echo true;
   }
   die();
}
add_action('wp_ajax_check_registered_user', 'check_registered_user', 10);
add_action('wp_ajax_nopriv_check_registered_user', 'check_registered_user', 10);

function check_registered_user()
{
  $status = 0;
  if(!is_user_logged_in()){
    $email = $_POST['email'];
    $email_encoded = rtrim(strtr(base64_encode($email), '+/', '-_'), '=');
    setcookie('nab_email', $email_encoded, time() + (86400 * 365), "/");
  //  echo $email;die();
    $user = get_user_by( 'email', $email );
    if(!empty($user)){
      $newpass = wp_generate_password( 8, false );
      $user_id = $user->ID;
      $user_name = $user->first_name;
      wp_set_password( $newpass, $user_id );

      $to = $email;
      $subject = 'Your new password for Talentedge';
      $body = 'Dear '.$user_name;
      $body .= '<br/><br/>We have noticed that you are trying to enrol for a course on <a href="'.home_url().'">Talentedge</a>.';
      $body .= '<br/><br/>Please use the following system generated password to login: '.$newpass;
      $body .= '<br/><br/><br/>Team Talentedge';

      $headers = array('Content-Type: text/html; charset=UTF-8');
      $headers[] = 'From: Talentedge <admission@talentedge.in>';
      //$headers[] = 'Cc: John Q Codex <jqc@wordpress.org>';
      //$headers[] = 'Cc: iluvwp@wordpress.org';
      if(wp_mail( $to, $subject, $body, $headers )){
        $status = 1;
      }
    }
  }
  echo $status;
  die();
}

function my_load_scripts($hook) {

    // create my own version codes
    $my_js_ver  = date("ymd-Gis", time());
    $current_user = wp_get_current_user();
    $email_encoded='';
    if($current_user->data->user_login!=''){
        $email_encoded = rtrim(strtr(base64_encode($current_user->data->user_login), '+/', '-_'), '=');
        setcookie('nab_email', $email_encoded, time() + (86400 * 365), "/");
    //echo "<pre>";print_r($_COOKIE);echo "</pre>";
    }
    $emailval = $_COOKIE['nab_email']==''?$email_encoded:$_COOKIE['nab_email'];
    $dataToBePassed = array(
        'emailval' => $emailval
    );
    //wp_enqueue_script( 'nablerjs', get_template_directory_uri(). '/js/nablerjs.js', array(), $my_js_ver  );
    wp_enqueue_script( 'nablerjs', get_template_directory_uri(). '/js/nablerjs.js' );
    wp_localize_script( 'nablerjs', 'nab_vars', $dataToBePassed );
}
add_action('wp_enqueue_scripts', 'my_load_scripts');

/**
 * Register a custom menu page.
 */
function wpdocs_register_babd_list_menu_page(){
    add_menu_page( 'BABD List', 'BABD List', 'read', 'babdlist', 'babd_list_menu_page','', 6 );
}
add_action( 'admin_menu', 'wpdocs_register_babd_list_menu_page' );

/**
 * Display a custom menu page
 */
function babd_list_menu_page(){
  require_once ('babdlist-admin.php');
}
?>
