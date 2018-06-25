<?php
/**
 * The template for displaying contact page.
 *
 * Template Name: Course API 
 *
 */
?>
<?php
 


header('Content-type: application/json;');
header("Access-Control-Allow-Origin: *");

 
	// /* Authentication check */
	// $username = $_SERVER['PHP_AUTH_USER'];
	// $password = $_SERVER['PHP_AUTH_PW'];
	// $user = wp_authenticate( $username, $password);
	
	// if ( is_wp_error( $user ) ) {
	// 	$wp_json_basic_auth_error = $user;
	// 	echo json_encode(['error' => false, 'message' => 'Authentication Failed']); exit;
	// }


$_POST=$_REQUEST;

	/*getting post fields*/
	$action = $_POST['action'];
	$crmid =  $_POST['batch_crmid'];
	$pcrmid =  $_POST['programme_crmid'];
	$program_name = $_POST['pname'];
	$batchid =  $_POST['batchID'];
	$p_desc = $_POST['pexcerpt'];
	$institute_crmid = $_POST['inst_crm_id'];
	$batch_start_date = $_POST['batch_start_date'];
	$duration  = $_POST['duration'];
	$fees_inr = $_POST['fees_inr'];
	$fees_usd = $_POST['fees_usd'];
	$course_type = $_POST['course_type']; 
	$course_status = $_POST['batch_status'];
	$last_date_to_register = $_POST['last_date_to_register'];
	$installmentinf = $_POST['installment_detail'];
	$postStatus = $_POST['program_status'];
	$discountInr = $_POST['discount_inr'];
	$discountUsd = $_POST['discount_usd'];

		if($postStatus == "draft"){
			$postStatus = $postStatus;
		}
		elseif($postStatus == "publish") {
			$postStatus = $postStatus;
		}
		else{
			$postStatus = "draft";
		}
 
	if( strpos($installmentinf, '|') !== false) {
	    $insfinalArray = expl($installmentinf,'|,');
	}
	else{
		
	    $insfinalArray = array(explode(',',$installmentinf));
	}

	$instCount = count($insfinalArray); 
	
 
	array_unshift($insfinalArray,"");
	unset($insfinalArray[0]);
	
	
	  $args = array(
		'numberposts' => -1,
		'post_type'   => 'product',
		'meta_key'    => 'crm_programme_id',
		'meta_value'  => $pcrmid,
		'post_status' => array('publish', 'pending', 'draft')
	  ); 
	  $c =   get_posts($args);

//print_r($c);die;

	  $proID =  $c[0]->ID; 

	 if (!$proID) {
		$jsonvar[] = array('status' => $course_id , 'message' => 'Wrong CRM Programme ID');
		echo json_encode($jsonvar);
		exit();
	 }
	
	$getBatchCode=get_post_meta($proID,'batch_name',true);
	$postParent=get_post_meta($proID,'product_parent',true);
	if(!$getBatchCode && empty($postParent)){
		$action='updatePrevous';
	}
	



     global $wpdb;
    // echo "select post_id from   te_postmeta where meta_key='field_59075aff790ec' and meta_value='" . $institute_crmid . "'";
     $insID=$wpdb->get_row("select post_id from   te_postmeta where meta_key='field_59075aff790ec' and meta_value='" . $institute_crmid . "'");
     ///////print_r($insID);die; 
   if($insID){
    $instituteArray =   get_post($insID->post_id);
    if($instituteArray->post_type=='institute'){
          $instituteId= $instituteArray ->ID;
    }
   }

    //$instituteId =  $instituteArray[0]->ID; 

	$jsonvar = array();
	if (!$action) {
	      $jsonvar[] = array('status' => $action , 'message' => 'You must include Action variable');
	      echo json_encode($jsonvar);
	      exit();
	}

	if($action == 'updatePrevous'){
		
		
		 $post_update = array(
	        'ID'           => $proID,
	        'post_title'   => $program_name
	      ); 
	    
	      $updatetitle = wp_update_post($post_update);
		 $course_id=$proID;
		 if ($course_id){
	        update_post_meta( $course_id, '_regular_price', $fees_inr );
	        update_post_meta( $course_id, '_outside-india_regular_price', $fees_usd );
	        update_post_meta( $course_id, 'product_parent', $proID );
	        update_field( 'field_578e1d79b82c8', $batchid, $course_id );
	        update_field( 'field_5907598ad1e26', $crmid, $course_id );

	        update_field( 'field_594251219d54d', $crmid, $course_id );
            update_field( 'field_594250a99d54c', $pcrmid, $course_id );
            update_field( 'field_578f62fb9a3c6', $p_desc, $course_id );
	        update_field( 'field_578f1b3f89c70', $batch_start_date, $course_id );
	        update_field( 'field_578f1b5589c71', $duration, $course_id );
	        update_field( 'field_58104cb874b75', $course_status, $course_id );
	        update_field( 'field_57b2e9319dd11', $course_type, $course_id );
	        update_field( 'field_578f2240b23ee', $last_date_to_register, $course_id );
	        update_field( 'field_57a31c5b211a7', $instituteId, $course_id );
	        if($instCount > 1){
	          foreach ($insfinalArray as $key => $value) {
	              $row = array(
	                'field_57bd8d6fb97d7' =>  $value[0],
	                'field_57bd8d7bb97d8' =>  $value[1],
	                'field_57bd8d86b97d9' =>  $value[2]
	              );         
	            add_row('field_57bd8d5cb97d6', $row, $course_id);
	          }
	        }  
	  	} 

			if($course_id){
		        $jsonvar[] = array('status' => true , 'message' => 'Success', 'course_id' => $course_id);
		    }
		      else{
		         $jsonvar[] = array('status' => false , 'message' => 'Failed to create course_status');
		      }
		
		
	}	
		
	if($action == 'add'){
		if (!$program_name || !$crmid || !$batchid) {
	      $jsonvar[] = array('status' => false , 'message' => 'You must include the Required parameters');
	      echo json_encode($jsonvar);
	      exit();
	  	}

	  	$my_post = array(
	    'post_title'    => $program_name,
	    'post_type'     => 'product',
	    'post_status'   => $postStatus
	    );
	    $course_id = wp_insert_post($my_post, true);


	    if ($course_id){
	        update_post_meta( $course_id, '_regular_price', $fees_inr );
	        update_post_meta( $course_id, '_outside-india_regular_price', $fees_usd );
	        update_post_meta( $course_id, 'product_parent', $proID );
	        update_field( 'field_578e1d79b82c8', $batchid, $course_id );
	        update_field( 'field_594251219d54d', $crmid, $course_id );
            update_field( 'field_594250a99d54c', $pcrmid, $course_id );
	        update_field( 'field_578f62fb9a3c6', $p_desc, $course_id );
	        update_field( 'field_578f1b3f89c70', $batch_start_date, $course_id );
	        update_field( 'field_578f1b5589c71', $duration, $course_id );
	        update_field( 'field_58104cb874b75', $course_status, $course_id );
	        update_field( 'field_57b2e9319dd11', $course_type, $course_id );
	        update_field( 'field_578f2240b23ee', $last_date_to_register, $course_id );
	        update_field( 'field_57a31c5b211a7', $instituteId, $course_id );
	        if(get_post_meta($proID,'product_parent',true)){
				update_post_meta($course_id,'product_parent',$proID);
			}else{
				add_post_meta($course_id,'product_parent',$proID);
			}
			
			/*Adding Discount*/


			if($discountInr || $discountUsd){

				$arrayArgs = array(
					'post_title'    => "discount-".$course_id."-".$program_name,
					'post_type'     => 'discounts',
					'post_status'   => 'publish'
				);
					
				$discountId = wp_insert_post($arrayArgs, true);
				if($discountId){
					update_field( 'field_580a522d41d79', 'Course', $discountId );
		        	update_field( 'field_57ff5da038b15', '1', $discountId );	
		        	update_field( 'field_580a52fb41d7a', '1', $discountId );	
		        	update_field( 'field_57ff5da038c6a', $discountInr, $discountId );	
		        	update_field( 'field_57ff5da03acd1', $discountUsd, $discountId );	
		        	update_field( 'field_57ff5da03b1f6', $course_id, $discountId );						
	        	}
			}
			
	        if($instCount > 1){
	          foreach ($insfinalArray as $key => $value) {
	              $row = array(
	                'field_57bd8d6fb97d7' =>  $value[0],
	                'field_57bd8d7bb97d8' =>  $value[1],
	                'field_57bd8d86b97d9' =>  $value[2]
	              );         
	            add_row('field_57bd8d5cb97d6', $row, $course_id);
	          }
	        }  
	  	} 

			if($course_id){
		        $jsonvar[] = array('status' => true , 'message' => 'Success', 'course_id' => $course_id);
		    }
		      else{
		         $jsonvar[] = array('status' => false , 'message' => 'Failed to create course_status');
		      }
	} 

	if($action == 'update'){ 
	    if (!$crmid || !$batchid) {
	      $jsonvar[] = array('status' => false , 'message' => 'You must include the Required parameters');
	      echo json_encode($jsonvar);
	      exit();
	    }
		
	      $args = array(
	        'numberposts' => -1,
	        'post_type'   => 'product',
	       
	        'post_status' => array('publish', 'pending', 'draft'),
                'meta_query' => array(         
                  array(
                    'key' => 'crm_id_programme',
                    'value' =>  $crmid,
                    'type' => '='
                  ),         
                 )
	      ); 
	      $c =   get_posts($args);
              // print_r($c);
	      $course_id =  $c[0]->ID; 

		 if (!$course_id) {
	        $jsonvar[] = array('status' => $course_id , 'message' => 'Wrong CRM Course ID');
	        echo json_encode($jsonvar);
	        exit();
	    }


	    $intalmentData=  get_field('installments',$course_id); 
	    $insdataCount = count($intalmentData);
	    
	   
	    if($program_name) {
	      $post_update = array(
	        'ID'           => $course_id,
	        'post_title'   => $program_name
	      ); 
	    
	      $updatetitle = wp_update_post($post_update);
	    } 

		update_post_meta( $course_id, 'product_parent', $proID );

	    if($fees_inr){
	      update_post_meta( $course_id, '_regular_price', $fees_inr );
	    }
	    if($fees_usd){
	      update_post_meta( $course_id, '_outside-india_regular_price', $fees_usd );
	    }
	    if($batchid){
	      update_field( 'field_578e1d79b82c8', $batchid, $course_id );
	    } 
	    if($p_desc){
	      update_field( 'field_578f62fb9a3c6', $p_desc, $course_id );
	    }
	    if($batch_start_date){
	      update_field( 'field_578f1b3f89c70', $batch_start_date, $course_id );
	    }
	    if($duration){
	      update_field( 'field_578f1b5589c71', $duration, $course_id );
	    }
	    if($course_status){
	      update_field( 'field_58104cb874b75', $course_status, $course_id );
	    }
	    if($course_type){
	      update_field( 'field_57b2e9319dd11', $course_type, $course_id );
	    }
	    if($last_date_to_register){
	      update_field( 'field_578f2240b23ee', $last_date_to_register, $course_id );
	    }
	    if($instituteId){
	      update_field( 'field_57a31c5b211a7', $instituteId, $course_id );
	    }
		if(get_post_meta($proID,'product_parent',true)){
			update_post_meta($course_id,'product_parent',$proID);
		}else{
			add_post_meta($course_id,'product_parent',$proID);
		}

			
			/*Adding Discount*/
			if($discountInr || $discountUsd){

				$discountArgs = array(
					'numberposts' => -1,
	        		'post_type'   => 'discounts',
	      			'post_status' => array('publish', 'pending', 'draft'),
	                'meta_query' => array(         
	                  array(
	                    'key' => 'select_courses',
	                    'value' =>  $course_id,
	                    'type' => '='
	                  ),         
	                )
				);

				$getDiscount = get_posts($discountArgs);
				$discountId =  $getDiscount[0]->ID;
				
				if(empty($getDiscount)){
					$arrayArgs = array(
						'post_title'    => "discount-".$course_id."-".$program_name,
					    'post_type'     => 'discounts',
					    'post_status'   => 'publish'
					);
					
					$discountId = wp_insert_post($arrayArgs, true);
					update_field( 'field_580a522d41d79', 'Course', $discountId );
	        		update_field( 'field_57ff5da038b15', '1', $discountId );	
	        		update_field( 'field_580a52fb41d7a', '1', $discountId );	
	        		update_field( 'field_57ff5da038c6a', $discountInr, $discountId );	
	        		update_field( 'field_57ff5da03acd1', $discountUsd, $discountId );	
	        		update_field( 'field_57ff5da03b1f6', $course_id, $discountId );						

				}
				else{
					update_field( 'field_57ff5da038c6a', $discountInr, $discountId );	
	        		update_field( 'field_57ff5da03acd1', $discountUsd, $discountId );	
				}
			}
		   

		    if($instCount >  1 ){ 

 
		    	if($insdataCount > $instCount){
				      $leftinst = 	$insdataCount - $instCount;
				      for($i=1; $i <= $leftinst; $i++){
 							$indexRow = $instCount + $i;
				      		
				      		delete_row( 'field_57bd8d5cb97d6', $indexRow, $course_id);
				      }
				}	

				if ($insdataCount < $instCount){

					$insfinalArray1 = array_slice($insfinalArray,0, $insdataCount);
				    array_unshift($insfinalArray1,"");
					unset($insfinalArray1[0]);

				    $insfinalArray2 = array_slice($insfinalArray,$insdataCount, $instCount);
				   	array_unshift($insfinalArray2,"");
					unset($insfinalArray2[0]);
	 
		    		//print_r($insfinalArray1);

		    		//print_r($insfinalArray2);

		    		//die('ssss'); 
				    if($insfinalArray1){
				    	
				    	foreach ($insfinalArray1 as $key => $value) {
				         	if($value[0]) {  $instInr = $value[0]; }
					        if($value[1]) {  $instUsd = $value[1]; }
					        if($value[2]) {  $instDate = $value[2]; }
					        $row = array(
					            'field_57bd8d6fb97d7' =>  $instInr,
					            'field_57bd8d7bb97d8' =>  $instUsd,
					            'field_57bd8d86b97d9' =>  $instDate
					        );  
							update_row('field_57bd8d5cb97d6', $key, $row, $course_id);
				    	}
					}

					if($insfinalArray2){
				    	
				    	foreach ($insfinalArray2 as $key => $value) {
				         	if($value[0]) {  $instInr = $value[0]; }
					        if($value[1]) {  $instUsd = $value[1]; }
					        if($value[2]) {  $instDate = $value[2]; }
					        $row = array(
					            'field_57bd8d6fb97d7' =>  $instInr,
					            'field_57bd8d7bb97d8' =>  $instUsd,
					            'field_57bd8d86b97d9' =>  $instDate
					        );  
							add_row('field_57bd8d5cb97d6', $row, $course_id);
				    	}
					}  
		    
		   		 }

		   		 if($insdataCount == $instCount){

		   		 	foreach ($insfinalArray as $key => $value) {
				         	if($value[0]) {  $instInr = $value[0]; }
					        if($value[1]) {  $instUsd = $value[1]; }
					        if($value[2]) {  $instDate = $value[2]; }
					        $row = array(
					            'field_57bd8d6fb97d7' =>  $instInr,
					            'field_57bd8d7bb97d8' =>  $instUsd,
					            'field_57bd8d86b97d9' =>  $instDate
					        );  
							update_row('field_57bd8d5cb97d6', $key, $row, $course_id);
				    	}
		   		 }

		}   		 
	    //echo get_the_modified_time('h:i:sa', $course_id);

	    if($updatetitle || $fees_inr || $fees_usd || $insfinalArray || $batchid 
	      || $p_desc || $course_type || $duration || $course_status || $last_date_to_register || $batch_start_date || $institute_crmid){
	         $jsonvar[] = array('status' => true , 'message' => 'Success', 'course_id' => $course_id, 'crmid'=> $crmid);
	    }
	    else{
	        $jsonvar[] = array('status' => false , 'message' => 'Not updated');
	    }
	}
echo json_encode($jsonvar); 
?>
