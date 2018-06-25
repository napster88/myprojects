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
	$updatedOrder =array();
	$args = array(
	'post_type'  => 'shop_order',
	'post_status' => 'wc-failed',
	'posts_per_page' => -1,
	'orderby'    => 'date',
	'order'      => 'ASC',
	'date_query' => array(
			'after' => '-10 days',
	),
);
$query = new WP_Query( $args );
//echo "======<pre>";print_r($query);exit;
function getkeyValue($postId, $key) {
	global $wpdb;
	$querystr = "SELECT te_postmeta.meta_value FROM te_postmeta WHERE post_id = ".$postId." AND meta_key = '".$key."' ";
	$pageposts = $wpdb->get_results($querystr);
	return $pageposts;
}
	
 if ( $query->have_posts()  ) {
    while ( $query->have_posts() ) : $query->the_post();    
    /*updating the status*/   
    $post_id = get_the_ID();
    $post_date = get_the_date();
	$post_id=37320;
	$payment_method = '';
	$fetchKeyresult = getkeyValue($post_id, '_payment_method');
	
	if($fetchKeyresult[0]->meta_value == 'payu_in') {
		$payment_method = $fetchKeyresult[0]->meta_value;
	}
	if ($fetchKeyresult[0]->meta_value == 'INR') {
		$order_currency = $fetchKeyresult[0]->meta_value;
	}

    $order_total  = get_post_meta($post_id, $key = '_order_total', true);
    $order_txnid  = get_post_meta($post_id, $key = '_order_txnid', true);
//echo $payment_method;exit;
  if($payment_method == 'payu_in'){
    	if($order_currency == "INR"){
    	    
			$key  = "355yxa";
			$salt = "2b5lchnL";
    	}
    	else{
			$key  =  "355yxa";
    		$salt = "2b5lchnL";
    	}
    	$command = "verify_payment";
		$order_txnid=37320;
		if($order_txnid) {echo "start";
			$var1 = ''; //Transaction ID
			$hash_str = $key  . '|' . $command . '|' . $var1 . '|' . $salt ;
			$hash = strtolower(hash('sha512', $hash_str));
			$r = array('key' => $key , 'hash' =>$hash , 'var1' => $var1, 'command' => $command);
			$qs= http_build_query($r);

			$wsUrl = "https://secure.payu.com/api/v2_1/orders/37320";
			$c = curl_init();
			curl_setopt($c, CURLOPT_URL, $wsUrl);
			curl_setopt($c, CURLOPT_POST, 1);
			curl_setopt($c, CURLOPT_POSTFIELDS, $qs);
			curl_setopt($c, CURLOPT_CONNECTTIMEOUT, 30);
			curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($c, CURLOPT_SSL_VERIFYHOST, 0);
			curl_setopt($c, CURLOPT_SSL_VERIFYPEER, 0);
			echo $o = curl_exec($c);
			if (curl_errno($c)) {echo "continue";
			  $sad = curl_error($c);
			  throw new Exception($sad);
			}
			curl_close($c);

			$valueSerialized = @unserialize($o);
			if($o === 'b:0;' || $valueSerialized !== false) {echo "condition";
			  print_r($valueSerialized);
			}
		   
		   $arraya =	json_decode($o);
	echo "=====<pre>"; print_r($o);exit;
			/*foreach ($arraya as $value) {
					foreach ($value as $val1) {	
						if($val1->status == "success"){
							$order = new WC_Order($post_id);
							$order->update_status('completed', 'Updated with API');
							$updatedOrder[] = $post_id;
						}
						if($val1->status == "failure"){
							$order = new WC_Order($post_id);
							$order->update_status('failed', 'Updated with API');
							$updatedOrder[] = $post_id;
						}
					}		
			}*/
		}
  }
    endwhile; 
 }
 /*get failed order status*/

 getfailed_orderstatus();

?>
