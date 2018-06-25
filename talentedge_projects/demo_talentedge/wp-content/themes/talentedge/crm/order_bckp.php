<?php
/**
 * The template for displaying contact page.
 *
 * Template Name: Order API 
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
  $userEmail = $_POST['user_email'];
  $userFname = $_POST['first_name'];
  $userMobile = $_POST['mobile']; 
  $crmUserId = $_POST['lead_id'];
  $batchCrmid = $_POST['batch_crmid'];
  $orderTotal = $_POST['order_total'];
  $orderCurrency = $_POST['order_currency'];
  $paymentMethod = $_POST['payment_method'];
  $paymentDate =   $_POST['payment_date'];
  $orderDate = date("Y-m-d", strtotime($paymentDate)); 
  $paymentRealized = $_POST['payment_realized'];
  $paymentReferenceNum = $_POST['payment_referencenum']; 
  $crmOrderId = $_POST['crm_orderid'];

 // print_r($_POST);

  $jsonvar = array();

if (!$action) {
      $jsonvar[] = array('status' => $action , 'message' => 'You must include Action variable');
      echo json_encode($jsonvar);
      exit();
}

if($action == 'add'){
	  if (!$batchCrmid || !$userEmail || !$userFname || !$crmUserId || !$orderTotal || !$orderCurrency || !$paymentMethod || !$paymentDate) {
      $jsonvar[] = array('status' => false , 'message' => 'You must include the Required parameters');
      echo json_encode($jsonvar);
      exit();  
  	}

  	$userId = email_exists($userEmail);
   
    if($userId) {
  		$userId = $userId;
  		update_user_meta( $userId, 'crm_lead_id', $crmUserId );
    }

    else{ 

    	  // Generate the password and create the user
	      $password = wp_generate_password( 12, false );
	      $userId = wp_create_user( $userEmail, $password, $userEmail );
	 
	      $new_role = 'Customer';
	      wp_update_user(
	        array(
	          'ID'          =>    $userId,
	          'nickname'    =>    $first_name,
	          'new_role' => $new_role
	        )
	      );
		
         

		update_field('field_57bc127b6da72', $userFname, 'user_'.$userId.'');		
		update_field('field_57bc16b8819af', $userMobile, 'user_'.$userId.'');
		update_user_meta( $userId, 'crm_lead_id', $crmUserId );
		update_field('field_57bc166487d17', $email, 'user_'.$user_id.'');
 	
  }	

  	 
		     $options = array(
		        'numberposts' => -1,
		        'post_type'   => 'product',
		        'meta_key'    => 'crm_id_programme',
		        'meta_value'  => $batchCrmid,
		        'post_status' => array('publish', 'pending', 'draft')
		      ); 
		      $c =   get_posts($options);
		      $course_id =  $c[0]->ID; 
                      
                      //echo $GLOBALS['wp_query']->request;
                      //global $wpdb;   echo "";   print_r($wpdb->queries);   echo ""; die;
                      
		      if (!$course_id) {
		        $jsonvar[] = array('status' => $course_id , 'message' => 'Wrong CRM Course ID');
		        echo json_encode($jsonvar);
		        exit();
		        }

		    if ($course_id){
		        $args = array(
		           'customer_id'   => $userId,
		        );

		        /* Getting all the customer detail by Order id */

		        $userData = get_userdata($userId);
		        $userFname = $userData->first_name ;
		        $userLname = $userData->last_name;
		        $userEmail = $userData->user_email;

		        $userAddress = get_user_meta($userId, 'billing_address_1', true);
		        $userCity = get_user_meta($userId, 'billing_city', true);
		        $userCountry = get_user_meta($userId, 'billing_country', true);
		        if($userCountry){
              $userCountry = $userCountry;
            }
            else{ 
              $userCountry = "IN";
            }

            $userState = get_user_meta($userId, 'billing_state', true);
		        $userPhone = get_user_meta($userId, 'billing_phone', true);

		        $address = array(
		            'first_name' => $userFname,
		            'last_name'  => $userLname ,
		            'email'      => $userEmail,
		            'phone'      => $userPhone,
		            'address_1'  => $userAddress,
		            'city'       => $userCity,
		            'state'      => $userState,
		            'country'    => $userCountry
		        );

		        /*Creating Orders*/
		        $order = wc_create_order($args);

		        /*Assigning product to order*/
		        $order->add_product( get_product( $course_id ),1);

		        update_post_meta( $order->id, '_order_currency', $orderCurrency);
		        update_post_meta( $order->id, '_payment_method', $paymentMethod); 

		        update_post_meta( $order->id, '_payment_method_title', $paymentMethod); 
		        update_post_meta( $order->id, 'payement_reference_num', $paymentReferenceNum); 
		        update_post_meta( $order->id, 'crm_orderid', $crmOrderId); 


		        /*setting Address of the user*/
		        $order->set_address( $address, 'billing' );

		        $order->set_address( $address, 'shipping' );

		        $order = wc_get_order($order->id);

		        $items = $order->get_items();

		        $itemId = '';
		        foreach ($items as $key => $value) {
		            $itemId = $key;
		        }

		        /*Adding price of the course*/
		        wc_update_order_item_meta($itemId, '_line_subtotal', $orderTotal);

		        wc_update_order_item_meta($itemId, '_line_total', $orderTotal);

		        /*Calculating the total with the tax based on country*/
		        $order->calculate_totals();

		        $args = array(
                    'ID' => $order->id,
                    'post_date' => $orderDate
                );

                $out = wp_update_post($args, true);

		        /*Updating the order status*/

		      if($paymentRealized == 1) {
		        $order->update_status('completed', 'Order created through CRM'); 
		      }
		      else{
		         $order->add_order_note("Order created through CRM");
		      }
		    }

			if($order->id){
		        $jsonvar[] = array('status' => true , 'message' => 'Success', 'order_id' => $order->id);
		      }
		      else{
		         $jsonvar[] = array('status' => false , 'message' => 'Failed to create Order');
		      }
 		
 }		 


if($action == 'update'){ 
    if (!$crmOrderId) {
      $jsonvar[] = array('status' => false , 'message' => 'You must include the Required parameters');
      echo json_encode($jsonvar);
      exit();
    }
      
      $args = array(
        'numberposts' => -1,
        'post_type'   => 'shop_order',
        'meta_key'    => 'crm_orderid',
        'meta_value'  => $crmOrderId,
        'post_status' => 'wc-completed'
      ); 
      $orderArray =   get_posts($args);
      $orderId =  $orderArray[0]->ID; 

      $order = new WC_Order($orderId);

	 if (!$orderId) {
        $jsonvar[] = array('status' => $course_id , 'message' => 'Wrong CRM Order ID');
        echo json_encode($jsonvar);
        exit();
    }

  else{
    //echo $orderId;
   //exit();

      if($userId){
        update_post_meta( $orderId, '_customer_user', $userId);
      }

      // if($orderTotal){
      //     $order = wc_get_order($orderId);
      //     $items = $order->get_items();
      //     $itemId = ''
      //     foreach ($items as $key => $value) {
      //         $itemId = $key;
      //     }
      //     /*Adding price of the course*/
      //     wc_update_order_item_meta($itemId, '_line_subtotal', $orderTotal);

      //     wc_update_order_item_meta($itemId, '_line_total', $orderTotal);

      //     /*Calculating the total with the tax based on country*/
      //     $order->calculate_totals();
        
      // }

      if($orderCurrency){
        update_post_meta( $orderId, '_order_currency', $orderCurrency);
      }

      if($paymentMethod){
        update_post_meta( $orderId, '_payment_method', $paymentMethod); 

        update_post_meta( $orderId, '_payment_method_title', $paymentMethod);
      }

      // if($paymentDate){
      //   wp_update_post(
      //     array (
      //         'ID'            => $orderId, // ID of the post to update
      //         'post_date'     => $paymentDate,
      //         'post_date_gmt' => get_gmt_from_date($paymentDate)
      //     )
      //   );        
      // }

      if($paymentRealized){
          if($paymentRealized == "1") {
            $order->update_status('completed', 'Order created through CRM'); 
          }
          if($paymentRealized == "0") {
            $order->update_status('pending', 'Order created through CRM'); 
        }
      } 

      if($paymentReferenceNum){
          update_post_meta( $orderId, 'payement_reference_num', $paymentReferenceNum); 
      }
      

  }
    
    //echo get_the_modified_time('h:i:sa', $course_id);

    if($userId || $orderTotal || $orderCurrency || $paymentMethod || $paymentDate || $paymentRealized || $paymentReferenceNum){
         $jsonvar[] = array('status' => true , 'message' => 'Success', 'order_id' => $orderId, 'crm_orderid'=> $crmOrderId);
    }
    else{
        $jsonvar[] = array('status' => false , 'message' => 'Order not updated');
    }
}
echo json_encode($jsonvar); 
?> 