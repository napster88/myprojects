<?php
/**
 * The template for displaying about us page.
 *
 * Template Name: Get Order status Paytm
 *
 */

?>

<?php
	$updatedOrder =array();
	$args = array(
	'post_type'  => 'shop_order',
	'post_status' => 'wc-pending',
	'posts_per_page' => -1 ,
	'orderby'    => 'date',
	'order'      => 'ASC',
);
$query = new WP_Query( $args );


 if ( $query->have_posts()  ) {
    while ( $query->have_posts() ) : $query->the_post();    
        /*updating the status*/   
    $post_id = get_the_ID();
    $post_date = get_the_date();
    $payment_method  = get_post_meta($post_id, $key = '_payment_method', true);
    $order_currency  = get_post_meta($post_id, $key = '_order_currency', true);
    $order_total  = get_post_meta($post_id, $key = '_order_total', true);
    $order_txnid  = get_post_meta($post_id, $key = '_order_txnid', true);
  //echo "<pre>";
  //print_r($post);
  if($payment_method == 'payu_in'){

  	//echo get_post_meta('21610', $key = '_order_txnid', true);
    	if($order_currency == "INR"){
    	    $key  =  "355yxa";
    		$salt = "2b5lchnL";
    	}
    	else{
			$key  = "VIDjse";
			$salt = "PpC2vPCs";
    	}

    	$command = "verify_payment";
		$var1 = $order_txnid ; // Transaction ID

		$hash_str = $key  . '|' . $command . '|' . $var1 . '|' . $salt ;
		$hash = strtolower(hash('sha512', $hash_str));

		//echo "hash = <br>". $hash;

	    $r = array('key' => $key , 'hash' =>$hash , 'var1' => $var1, 'command' => $command);
	    
	    $qs= http_build_query($r);

	    $wsUrl = "https://info.payu.in/merchant/postservice?form=2";
	   	$c = curl_init();
	    curl_setopt($c, CURLOPT_URL, $wsUrl);
	    curl_setopt($c, CURLOPT_POST, 1);
	    curl_setopt($c, CURLOPT_POSTFIELDS, $qs);
	    curl_setopt($c, CURLOPT_CONNECTTIMEOUT, 30);
	    curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
	    curl_setopt($c, CURLOPT_SSL_VERIFYHOST, 0);
	    curl_setopt($c, CURLOPT_SSL_VERIFYPEER, 0);
	    $o = curl_exec($c);
	    if (curl_errno($c)) {
	      $sad = curl_error($c);
	      throw new Exception($sad);
	    }
	    curl_close($c);

	    $valueSerialized = @unserialize($o);
	    if($o === 'b:0;' || $valueSerialized !== false) {
	      print_r($valueSerialized);
	    }
	   
	   $arraya =	json_decode($o);
	   //echo "<pre>";
	   //print_r($arraya);
	    foreach ($arraya as $value) {
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
		}
	}

	if($payment_method == 'atom'){
		$date = new DateTime($post_date);
       
		
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, "https://payment.atomtech.in/paynetz/vfts?merchantid=1195&merchanttxnid=".$post_id."&amt=".$order_total."&tdate=".$date->format('Y-m-d')."");
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		$result = curl_exec($curl);
		curl_close($curl);

        $xml = simplexml_load_string($result);
		$array = json_encode($xml);
		$array1 = json_decode($array, true);
		foreach ($array1 as $atomdata) {
			
			if ($atomdata['VERIFIED'] == 'SUCCESS'){
				$order = new WC_Order($post_id);
			   	$order->update_status('completed', 'Updated with API');
	 			$updatedOrder[] = $post_id;
	 		}
	 		if ($atomdata['VERIFIED'] == 'FAILED'){
				$order = new WC_Order($post_id);
			   	$order->update_status('failed', 'Updated with API');
	 			$updatedOrder[] = $post_id;
	 		}
		}
	}  

	if($payment_method == 'paytm'){
		//echo "INside Paytm";
		//echo $post_id;
	    $curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, "https://secure.paytm.in/oltp/HANDLER_INTERNAL/TXNSTATUS?JsonData={'MID':'Arrina00210248388259','ORDERID':'".$post_id."'}");
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		$result = curl_exec($curl);
		curl_close($curl);
		$finalResults = json_decode($result);
  	  	//echo "<pre>";
	    //print_r($finalResults);

	    if($finalResults->STATUS == 'TXN_SUCCESS'){
		    $order = new WC_Order($post_id);
    		$order->update_status('completed', 'Updated with API');
	 		$updatedOrder[] = $post_id;
	 	}
		if($finalResults->STATUS == 'TXN_FAILURE'){
			$order = new WC_Order($post_id);
			$order->update_status('failed', 'Updated with API');
			$updatedOrder[] = $post_id;
		}
	}

    endwhile; 
 }
//echo "<pre>";
//print_r($updatedOrder);


 /*get failed order status*/

 getfailed_orderstatus();


?>