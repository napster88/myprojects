<?php
function t_edge_register_user()
			{
					global $reg_errors;
					$reg_errors = new WP_Error;
					
				
				if (( username_exists( $_POST['email']))||( email_exists( $_POST['email'] ) ))
				{
					$reg_errors->add('user_name', 'Sorry, that username already exists!');
					echo "Email Already in use";
					 exit(0);
				}
									
									  
		$email=$_POST['email'];
		
		global $wpdb;
		$tablename = $wpdb->prefix . 'xlri_registration';
		 $userdata = array(
			'user_login'    =>   $_POST['email'],
			'user_email'    =>    $_POST['email'],
			'user_pass'     =>    $_POST['password'],
			'user_phone'    =>    $_POST['phone'],
			'phone_number' =>    $_POST['phone'],
			'first_name'     =>    $_POST['fname'],
        
        );
		$count=0;
		
		$sql = "SELECT FROM COUNT(*) ".$tablename."  WHERE from_register = 'Babd'  AND user_email = '".$email."'";
		//echo $sql;
		$count = $wpdb->get_var($sql);
		//echo "count is".$count;
		if ($count != 1){
			// && count($reg_errors)<1
			$user_id = wp_insert_user($userdata);
			add_user_meta( $user_id,'user_phone', $_POST['phone'] );
			add_user_meta( $user_id,'phone_number', $_POST['phone'] );
			add_user_meta( $user_id,'user_email', $_POST['email'] );
			
			if ( ! is_wp_error( $user_id )  ) {			
			
				$data = array(
					'user_email' => $_POST['email'],
				   'user_id' => $user_id,
					'user_phone' => $_POST['phone'],
					'utm_source' =>$_POST['utm_source'],
					'from_register' => 'Babd',
					
					'created_at' => current_time('mysql'));
					$siteUrl = get_bloginfo('url');
					$user_insert = $wpdb->insert($tablename, $data);
					
					 $subject="Welcome to Talentedge!";
					$headers = array('Content-Type: text/html; charset=UTF-8',
					'From:  Talentedge <admission@talentedge.in>');
					$message="Hi there,
						<br/><br/>
						Thank you for registering with Talentedge Take your career to the next level with our range of courses across categories.
						<br/>
						Username: ".$_POST['email'].
						"<br/>Password: ". $_POST['password'].
						"<br/>
						If you have any problems, please contact us at admission@talentedge.in
						<br/>
						<br/>
						Thanks,<br/>
						Team TalentEdge";
					wp_mail($email,$subject,$message,$headers);	
			
				$creds = array(
							'user_login'    => $_POST['email'],
							'user_password' =>  $_POST['password'],
							'remember'      => true
						);
						
						wp_signon( $creds, false );
				
				sliq_save_data($_POST['email'],$_POST['password'], $_POST['fname'],$_POST['phone'],$user_id);
				
				
			}
			
		}
			die();
	} 
	 function sliq_save_data($email,$password, $name,$phone,$user_id,$sliq_id='')
	 {
		 global $wpdb;
		 $sliqData = array();
          //  $name = $_POST['fname'];
		  
            $namediv = explode(' ', $name);
            $sliqData['username'] = $email;
            $sliqData['password'] = 'password';
            $sliqData['email'] = $email;
            $sliqData['mobile_no'] = $phone;
            $sliqData['fname'] = $namediv[0];
            $sliqData['lname'] = $namediv[1];
            $sliqData['gender'] = 'M';
            $sliqData['dob'] = '1970-01-01';
 	          $sliqData['status'] = '1';
            $sliqData['batch_id'] = '88';
			if($sliq_id>0){
            	$sliqData['lms_id'] = $sliq_id;
            }

 			//for live 40
			/* echo "<pre>";
		print_r($sliqData);
		echo "</pre>"; */
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
		/* echo "<pre>";
		print_r($decode);
		echo "</pre>"; */
		
		 if(($decode['resultData']['id']>0)&&(empty($sliq_id))){
                 $user = $wpdb->update('te_users', array('sliq_id' => $decode['resultData']['id']), array('ID' => $user_id));
		      
			$user = $wpdb->update('te_xlri_registration', array('sliq_id' => $decode['resultData']['id'],'log_value'=>$result), array('user_id' => $user_id));
			
           }
		   //for login case if xlri has data nut test is not given by user.
		   // in case registered user it always return 0
		   $tablename1=$wpdb->prefix . 'usermeta';
		  $sqlm = "SELECT COUNT(*) FROM  ".$tablename1."  WHERE user_id = '".$user_id."' && meta_key='babd_assesment_score'";
		$already_score=$wpdb->get_var($sqlm);

		 if ($already_score==0)
		 {
			auto_submission_form($email,'password','88');
		 }
		 else{
			?>
			
			<script>
			window.location.href = '<?php echo site_url().'/edit-profile';?>';
			</script>
	  
		 <?php }
		 
	 }
	 
	 function auto_submission_form($email,$password,$batch)
	 {
	echo	 '<html>
			<body>
			<form name="myform" id="auto_login_myform" action ="https://sliq.talentedge.in/users/login" method="POST">
			<input type= "hidden" name="usrky" value="'.$email.'"/>
			<input type="hidden" name="usrtkn" value="'.$password.'"/>
			<input type="hidden" name="otid" value="'.$batch.'"/>
			<input style="display:none;" type="submit" onclick="submitForm()"/>
			</form>
			</body>
			</html>';
			?>
			<script>
			console.log('<?php echo $email; ?>');
			console.log('<?php echo $password; ?>');
			console.log('<?php echo $batch; ?>');
			 
			jQuery('#auto_login_myform').submit();
			
			</script>
			<?php 
	 }
	 

	 function t_edge_login_user()
			{
				global $wpdb;
			
				 $username = trim($_POST['login_email']);
					$pass=$_POST['login_password'];
				
					
								
						$user=get_user_by('email',trim($username));
						
						/*  echo "<pre>";
						print_r($user);
						echo "</pre>";  */
						
						 $firstName = get_user_meta($user->ID, 'first_name', true);
						 $lastName = get_user_meta($user->ID, 'last_name', true);
						 $phone = get_user_meta($user->ID, 'phone_number', true); 
						$sliq_id=$user->data->sliq_id;
						$user_id=$user->ID;
						$name=$user->data->display_name;
		 				$phone='1234567890';
						 $email=trim($user->data->user_email);
						
						
						 
						$info = array();
					   $info['user_login'] = $username;
					   $info['user_password'] = $pass;
					   $info['remember'] = true;
						//print_r($info); 
						$user_signon = wp_signon( $info, false );
						  
					  if ( is_wp_error($user_signon) ){
						   
						 echo "Login Id and Password is invalid. Please check properly.";
						   
					 } else 
					   {
						   
						$count=0;
						$tablename = $wpdb->prefix . 'xlri_registration';
						$sql = "SELECT COUNT(*) FROM  ".$tablename."  WHERE from_register = 'Babd'  AND user_email = '".$email."'";
						
						$count = $wpdb->get_var($sql);
						
						if ($count != 1){
							
							$data = array(
									'user_email' => $email,
								   'user_id' => $user_id,
									'user_phone' => $phone,
									'from_register' => 'Babd',
									'utm_source' => $_POST['utm_source'],
									'created_at' => current_time('mysql')
									);
								//$siteUrl = get_bloginfo('url');
								$user_insert = $wpdb->insert($tablename, $data);
								
								// save  loggined userdata in sliq db
								
								
						}
							
							sliq_save_data($email,'password',$name,$phone,$user_id,$sliq_id);
								
				} 
					 			

				
				die();
			}  
			function t_edge_forget_password()
			{
				$email=$_POST['email'];
				$subject="Reset your Password";
				$salt = "498#2D83B631%3800EBD!801600D*7E3CC13";
				$password = hash('sha512', $salt.$email);
				/* $salt = "498#2D83B631%3800EBD!801600D*7E3CC13";
				$resetkey = hash('sha512', $salt.$email); */
				$link=site_url()."/babd-login?q=".$password."&&emailid=".$email."&&source=linkemail";
				$headers = array('Content-Type: text/html; charset=UTF-8',
				'From:  Talentedge <admission@talentedge.in>');
				$message="Hi there,
					<br/><br/>
					Please click below link to reset your password,
					<br/>
					<a href='".$link."'>Click Here</a>
					<br/>
					<br/>
					Thanks,<br/>
					Team TalentEdge";
				wp_mail($email,$subject,$message,$headers);	
				die();
			}
			function t_edge_update_password()
			{
				 $salt = "498#2D83B631%3800EBD!801600D*7E3CC13";
				 $email=$_POST['emailid'];
				 echo $_POST['user_id_key'];
				 echo $key=$salt.$email;
				
				$resetkey = hash('sha512', $key); 
				echo $resetkey;
				if($resetkey==$_POST['user_id_key'])
				{
					echo "yes";
					$user=get_user_by('email',$_POST['emailid']);
				print_r($user);
					 $user_id=$user->data->ID;
					
					 wp_set_password( $_POST['password'], $user_id );
				}
				
				die();
			}
add_action('wp_ajax_t-edge-update_password', 't_edge_update_password', 10);
add_action('wp_ajax_nopriv_t-edge-update_password', 't_edge_update_password', 10);
			
add_action('wp_ajax_t-edge-forget_password', 't_edge_forget_password', 10);
add_action('wp_ajax_nopriv_t-edge-forget_password', 't_edge_forget_password', 10);
add_action('wp_ajax_nopriv_t-edge-forget_password', 't_edge_forget_password', 10);
add_action('wp_ajax_t-edge-register_user', 't_edge_register_user', 10);
add_action('wp_ajax_nopriv_t-edge-register_user', 't_edge_register_user', 10);
add_action('wp_ajax_t_edge_login_user', 't_edge_login_user', 10);
add_action('wp_ajax_nopriv_t_edge_login_user', 't_edge_login_user', 10);
?>