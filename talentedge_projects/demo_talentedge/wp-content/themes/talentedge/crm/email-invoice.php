<?php
/**
 * The template for displaying contact page.
 *
 * Template Name: Email Invoice API 
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

$orderId = $_POST['order_id'];

$jsonvar = array();

if (!$orderId) {
      $jsonvar[] = array('status' => false , 'message' => 'You must include order id');
      echo json_encode($jsonvar);
      exit();
}
else{
  $invoiceNum = get_post_meta( $orderId, '_bewpi_formatted_invoice_number', true);
  $invoiceName = $invoiceNum.".pdf";
  $invoiceYear = get_post_meta( $orderId, '_bewpi_invoice_year', true);

  $useEmail = get_post_meta( $orderId, '_billing_email', true);
  $from_mail = "admin@talentedge.in"; 
  $from_name = "Talentedge";
  $subject = "Requested Order invoice" ;
  $message = "Please find the invoice for the payment done on talentedge";
  $headers = 'From: Talentedge <admin@talentedge.in>' . "\r\n";
  $headers .= 'Content-Type: text/html; charset=UTF-8';
  $attachment = array(WP_CONTENT_DIR."/uploads/bewpi-invoices/".$invoiceYear."/".$invoiceName);
  
  $result = wp_mail($useEmail, $subject, $message, $headers,$attachment); 

  if($result == true){
     $jsonvar[] = array('status' => true , 'message' => 'Email sent successfully');
  }
  else{
    $jsonvar[] = array('status' => false , 'message' => 'Email not sent Wrong order id');
  }

}

echo json_encode($jsonvar);
?>