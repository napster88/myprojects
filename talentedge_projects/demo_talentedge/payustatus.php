<?php
/**
 * The template for displaying about us page.
 *
 * Template Name: Get Order status Paytm
 *
 *///echo "4444444444444";exit;
include('wp-load.php');

?>

<?php

//echo "testname";exit;
$from = "example@talentedge.in";
$fromname = "Prateek";
$to = "ashis.mohanty@talentedge.in";//Recipients list (semicolon separated)
$api_key = 'fbb5606b326850fce2fa335cdce8dc16';
$subject = "Test Mail for payu";
$jsonDataDecode = $_REQUEST;
$orderID = trim(preg_replace("/[^0-9\.]/", '', $jsonDataDecode['productinfo']));
$orderStatus = trim($jsonDataDecode['status']);
$txnid = trim($jsonDataDecode['txnid']);
$pymnt_src = $jsonDataDecode['payment_source'];
$todays_date = date("Y-m-d H:i:s");
$json_data = json_encode($jsonDataDecode);
$data = array(
		'payu_values' => "'".json_encode($jsonDataDecode)."'",
		'order_id' => $orderID,
		'txn_id' => $txnid,
		'payment_source' => $pymnt_src,
		'created_at' => $todays_date,
		'updated_at' => $todays_date
	);
$tablename = $wpdb->prefix . 'check_payu_status';
$wpdb->insert($tablename, $data);

if( $orderID != '' && $orderStatus == "success" ) {
	sleep(45);
	global $wpdb;
	$sql = "SELECT `post_status` FROM `te_posts` WHERE ID = '$orderID' LIMIT 1"; 
	$results = $wpdb->get_results( $sql );
	if($results[0]->post_status == 'wc-pending' ) {
		//$query = "Update te_posts SET post_status='wc-completed' WHERE ID='$orderID' ";
		//$dataUpdated = $wpdb->query( $query );
		//echo "Order Status Successfully";
		$order = new WC_Order($orderID);
		/*$order->update_status('completed', 'Updated with Payu API');
		$updatedOrder[] = $orderID;
		$order->add_order_note( __( 'PayU payment completed', 'woocommerce_payu_in' ) . ' (Transaction id: ' . $txnid . ')' );
		$order->payment_complete();*/
		$content = "payu test===".json_encode($order);
		$data=array();
		$data['subject']= rawurlencode($subject);                                                                       
		$data['fromname']= rawurlencode($fromname);                                                             
		$data['api_key'] = $api_key;
		$data['from'] = $from;
		$data['content']= rawurlencode($content);
		$data['recipients']= $to;
		$apiresult = callApidata(@$api_type,@$action,$data);	
	} else{
		echo "Order already in complete state";
	}
} else{
	echo "Not able to find Order Number";
}
//echo trim($apiresult);

function callApidata($api_type='', $api_activity='', $api_input='') {
        $data = array();
        $result = http_post_form("https://api.falconide.com/falconapi/web.send.rest", $api_input);
        return $result;
}

function http_post_form($url,$data,$timeout=20) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url); 
        curl_setopt($ch, CURLOPT_FAILONERROR, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1); 
        curl_setopt($ch, CURLOPT_TIMEOUT, $timeout); 
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
        curl_setopt($ch, CURLOPT_POST, 1); 
        curl_setopt($ch, CURLOPT_RANGE,"1-2000000");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data); 
        curl_setopt($ch, CURLOPT_REFERER, @$_SERVER['REQUEST_URI']);
        $result = curl_exec($ch); 
        $result = curl_error($ch) ? curl_error($ch) : $result;
        curl_close($ch);
        return $result;
}
?>
