<?php
/* *
 * The template for displaying about us page.
 *
 * Template Name: business analytics  Login
 *
 */
 wp_head(); ?>
 <head>
 <!-- Google Tag Manager -->
<noscript>
<iframe src="//www.googletagmanager.com/ns.html?id=GTM-N35TX7"
height="0" width="0" style="display:none;visibility:hidden"></iframe>
</noscript>
<script>
(function (w, d, s, l, i) {
w[l] = w[l] || []; w[l].push({
'gtm.start':
new Date().getTime(), event: 'gtm.js'
}); var f = d.getElementsByTagName(s)[0],
j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : ''; j.async = true; j.src =
'//www.googletagmanager.com/gtm.js?id=' + i + dl; f.parentNode.insertBefore(j, f);
})(window, document, 'script', 'dataLayer', 'GTM-N35TX7');</script>
<!-- End Google Tag Manager -->

 
 <script src="<?php echo  get_template_directory_uri();?>/js/jquery.min.js"></script>
    <script src="<?php echo  get_template_directory_uri();?>/js/bootstrap.min.js"></script>
    <script src="<?php echo  get_template_directory_uri();?>/js/jCaptcha.js"></script>

<?php $utm_source=isset($_GET['utm_source'])?$_GET['utm_source']:'';  ?> <script>
     jQuery(document).ready(function()
	 {
			var myCaptcha = new jCaptcha({
				// set callback function
				callback: function(response, $captchaInputElement) {
					if (response == 'success') {
						$captchaInputElement[0].classList.remove('error');
						$captchaInputElement[0].classList.add('success');
						$captchaInputElement[0].placeholder = 'Submit successful!';
					}
					if (response == 'error') {
						$captchaInputElement[0].classList.remove('success');
						$captchaInputElement[0].classList.add('error');
						$captchaInputElement[0].placeholder = 'Please try again!';
				   }
				}

			});
			/* document.querySelector('form').addEventListener('.forget_password', function(e) {

			  e.preventDefault();

			  // captcha validate

			  myCaptcha.validate();

			});
 */


		 
		 
		 
		 
		 var source='<?php echo $_GET['source']; ?>';  //sourcelink
		// alert(source);
		 if(source=='linkemail')
		 {
			 
			 
			 				
				
				jQuery('.main_body').addClass('modal-open');
				jQuery('.main_body').append('<div class="modal-backdrop fade in"></div>');
				jQuery('#sign_in').css('display','block');
				jQuery('#sign_in').addClass('fade in');
						 
			jQuery('.update_forget_password_popup_inner').show();
			jQuery('.forget_password_popup_inner').hide();
			jQuery('.sign-in_inner_popup').hide();
			jQuery('.update_email-in_inner_popup').val('<?php echo $_GET['q']; ?>');
			
		 }
		 
		 function ValidateEmail(email) {
        var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
        return expr.test(email);
    };
	jQuery('.sign_in_phone').keyup(function (){
					let str=jQuery(this).val();
					if(str.length>10)
					{
						var mm=	str.slice(0,10);
						console.log(mm);
						jQuery(this).val(mm);
					}
					
	});
	
	
	jQuery('.sign_in_name').keyup(function (){
					let str=jQuery(this).val();
					if(str.length>50)
					{
						var mm=	str.slice(0,50);
						console.log(mm);
						jQuery(this).val(mm);
					}
					
	});jQuery('.sign_in_password').keyup(function (){
					let str=jQuery(this).val();
					if(str.length>15)
					{
						var mm=	str.slice(0,15);
						console.log(mm);
						jQuery(this).val(mm);
					}
					
	});
	
	
	  
	  jQuery('.forget_password_link').click(function(e)
			{
				jQuery('.forget_password_popup_inner').show();
				jQuery('.sign-in_inner_popup').hide();
				jQuery('.update_forget_password_popup_inner').hide();
				
			} );
			 
			
			jQuery('.signin_link').click(function(e)
			{
				
				//jQuery('.sign_up_popup_inner').hide();
				jQuery('.sign-in_inner_popup').show();
				jQuery('.forget_password_popup_inner').hide();
				jQuery('.update_forget_password_popup_inner').hide();
				
				//sign-in_inner_popup
				//	jQuery('#sign_in').addClass('in');
				//	jQuery('#sign_up').removeClass('in');
				//sign-in_inner_popup
			
			} );
			
			
			jQuery('.signin_main_link').click(function(e)
			{
				
				//jQuery('.sign_up_popup_inner').hide();
				jQuery('.sign-in_inner_popup').show();
				jQuery('.forget_password_popup_inner').hide();
				jQuery('.update_forget_password_popup_inner').hide();
				
				//sign-in_inner_popup
				//	jQuery('#sign_in').addClass('in');
				//	jQuery('#sign_up').removeClass('in');
				//sign-in_inner_popup
			
			} );
			
			
			
			
			
			/* jQuery('.signup_link').click(function(e)
			{
				jQuery('.forget_password_popup_inner').hide();
				jQuery('.sign-in_inner_popup').hide();
				jQuery('.sign_up_popup_inner').show();
				//jQuery('#sign_up').addClass('in');
				//jQuery('#sign_up').removeClass('in');
				//sign-in_inner_popup
			
			} ); */
			
			var pwd_updated='';
			
	jQuery('.update_password').click(function(e)
			{
				var c_pwd=jQuery('.confirm_password').val();
				var u_pwd=jQuery('.user_password').val();
				
				
				if(u_pwd==''||c_pwd=='')
				{
					jQuery('.t_error_message_update_pwd').html('Please fill form Properly');
				}
				else if(u_pwd!=c_pwd)
				{
					jQuery('.t_error_message_update_pwd').html('Password does not match!');
				}
				else
				{
				
				var ajaxurl="<?php echo admin_url('admin-ajax.php'); ?>";
				   jQuery('.update_password').val("Please Wait");
				 $.ajax({
					   type: "POST",
					   url: ajaxurl,
					   data: {
								'action': 't-edge-update_password',
								'user_id_key'   :  '<?php echo $_GET['q']; ?>',
								'emailid' :  '<?php echo $_GET['emailid']; ?>',
								'password' :jQuery('.user_password').val(),
				
						},
					   success: function (response) {
						   
						console.log(response);
						jQuery('.t_error_message_update_pwd').html('Congrats password has  changed.');
						jQuery('.update_password').val("update password");
						pwd_updated=1;
						//window.location.href('<?php echo site_url();?>/babd-login');
					   },		  
					});
					
					
				}
				
				if(pwd_updated==1)
				{
					window.location.href='<?php echo site_url();?>/babd-login';
				}
			});
		
	
		jQuery('.forget_password').click(function(e)
			{
				jQuery('.t_error_message_forget').html('');
				
				
				if (!ValidateEmail(jQuery('.forget_email').val())) {
           
					
					
					jQuery('.t_error_message_forget').html('Invalid email');
					e.preventDefault();
				} 
				
				
				
			  myCaptcha.validate();
			  
			  
			  if(jQuery('.jCaptcha').hasClass('success'))
			 {
			  
				var ajaxurl="<?php echo admin_url('admin-ajax.php'); ?>";
				   jQuery('.forget_password').val("Please Wait");
				 $.ajax({
					   type: "POST",
					   url: ajaxurl,
					   data: {
								'action': 't-edge-forget_password',
								'email'   :   jQuery('.forget_email').val(),
								
				
						},
					   success: function (response) {
						   
						  //console.log(response);
						jQuery('.t_error_message_forget').html('Link has been sent to your mail. Please check.');
						  jQuery('.forget_password').val("Send Link");
						 
				
					   },		  
					});
					
			 }
			});
		
	
		
		jQuery('.register_now').click(function(e)
			{
				var array_message= [];
				// var data = {};
				if((jQuery.trim(jQuery('.sign_in_email').val())=='')||(jQuery.trim(jQuery('.sign_in_phone').val())=='')||(jQuery.trim(jQuery('.sign_in_name').val())=='')||(jQuery.trim(jQuery('.sign_in_password').val())==''))
				{
					array_message.push('Please fill form properly');
				}
				
				if (!ValidateEmail(jQuery('.sign_in_email').val())) {
           
					array_message.push('Invalid email');
				} 
				var str=jQuery('.sign_in_phone').val();
				
				var mm=jQuery.isNumeric(str);
				
				
				
				if((str.length<10)||(str.length>10)||(mm==false))
				{
					array_message.push('Phone number should be 10 digit numeric.');
				}
						
						
				if(array_message.length>=1)
				{
					jQuery('.t_error_message_signin').find('.t_error_message_signin_ul').html('');
					
					for (var i = 0; i < array_message.length; i++) {
					
					jQuery('.t_error_message_signin').find('.t_error_message_signin_ul').append('<li>'+array_message[i]+'</li>');
					}
						e.preventDefault();
				}
				else
				{
				jQuery('.t_error_message_signin').find('.t_error_message_signin_ul').html('');
				 jQuery(this).val("PLEASE WAIT");
					var ajaxurl="<?php echo admin_url('admin-ajax.php'); ?>";
				 
				 $.ajax({
					   type: "POST",
					   url: ajaxurl,
					   data: {
								'action': 't-edge-register_user',
								'email'   :   jQuery('.sign_in_email').val(),
								'phone'    :    jQuery('.sign_in_phone').val(),
								'fname'     :    jQuery('.sign_in_name').val(),
								'password'     :    jQuery('.sign_in_password').val(),
								'utm_source' : '<?php echo $utm_source;?>'
						},
					   success: function (response) {
						
						  jQuery('.t_error_message_signin').find('.t_error_message_signin_ul').append(response);
						   jQuery('.register_now').val("REGISTER NOW");
					   },		  
					});
				}					
		});
		
			jQuery('.signin').click(function(e)
			{
				
				
				if((jQuery.trim(jQuery('.login_email').val())=='')||(jQuery.trim(jQuery('.login_password').val())==''))
				{
					 jQuery('.t_error_message_login').html('Please fill form properly');
					 e.preventDefault();
				}
				else
				{
					
				//	jQuery('.t_error_message_login').html('');
				
				 jQuery('.signin').val("PLEASE WAIT");
					
					var ajaxurl="<?php echo admin_url('admin-ajax.php'); ?>";
				 
				 $.ajax({
					   type: "POST",
					   url: ajaxurl,
					   data: {
								'action': 't_edge_login_user',
								'login_email'   :   jQuery('.login_email').val(),
								'login_password'     :    jQuery('.login_password').val(),
								'utm_source' : '<?php echo $utm_source;?>'
						},
					   success: function (response) {
						   
						 jQuery('.t_error_message_login').html(response);
						 
						   jQuery('.signin').val("SIGN IN");
					   },		  
					});
				}					
		});
		
	 });	 </script>
	
	
	

 
 
 </head>
 <?php 
  $current_user = wp_get_current_user();
 $user_id=$current_user->ID;
  if($current_user->ID!=0)
  {
	   $tablename1=$wpdb->prefix . 'usermeta';
		  $sqlm = "SELECT COUNT(*) FROM  ".$tablename1."  WHERE user_id = '".$user_id."' && meta_key='babd_assesment_score'";
		$already_score=$wpdb->get_var($sqlm);
	   if($already_score==0)
	   {
		   
		   
		   $email=$current_user->data->user_email;
			//$current_user->data->user_pass
			 $password='password';
			
			 $sliq_id= $current_user->data->sliq_id;
			 
			 $name=$current_user->data->display_name;
			 
			// $phone='1234567890';
			$firstName = get_user_meta($current_user->ID, 'first_name', true);
			$lastName = get_user_meta($current_user->ID, 'last_name', true);
			$phone = get_user_meta($current_user->ID, 'phone_number', true);
			$name=$firstName." ".$lastName;
			 
			

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
			
		 if(($decode['resultData']['id']>0)&&(empty($sliq_id))){
                 $user = $wpdb->update('te_users', array('sliq_id' => $decode['resultData']['id']), array('ID' => $user_id));
		      
			$user = $wpdb->update('te_xlri_registration', array('sliq_id' => $decode['resultData']['id'],'log_value'=>$result), array('user_id' => $user_id));
			
           }
				$batch='88';
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
	   else{
  
		   $url=site_url().'/edit-profile/#myassesment';
			header("Location: $url");
			?>
			<script>
			
			//jQuery('#myassesment').attr("aria-expanded","true");
				jQuery('#myassesment').addClass("active");
			
			</script>
			<?php
	  
	   }
	 	
		
  }
  else
  {
 ?>
<style>
  ul.mid-opt_list li:after{
	content: '';
	position: absolute;
	width: 36px;
	height: 36px;
	background: url(<?php echo site_url(); ?>/wp-content/uploads/2018/03/fast-frwrd.png) no-repeat 0px 0px;
	top: 45px;
	right: -40px;
}
.sign_up_popup_inner{
	background: url(<?php echo site_url(); ?>/wp-content/uploads/2018/03/signup-bg.jpg) no-repeat left top;
	min-height: 410px;
	max-height: 500px;
	background-color: #fff;
	padding: 0;
	float: left;
	width: 100%;
}

.sign_in_popup_inner{
	background: url(<?php echo site_url(); ?>/wp-content/uploads/2018/03/signin-bg.jpg) no-repeat left top;
	min-height: 306px;
	max-height: 370px;
	background-color: #fff;
	padding: 0;
	float: left;
	width: 100%;
}
.sign_in_new_link
{
	
    color: #fff;
    font-size: 22px;
    padding-top: 15px;
}
.sign_in_new_link > a
{
    color: #fff;
}
.sign_in_new_link > a:hover, .sign_in_new_link > a:focus{
	color: #fff;
	box-shadow: none;
	outline:none;
	
}
.already_have_account, .dont_have_account{
    width: 100%;
	display: block;
	color: #333;
	margin: 10px 0;	
}
.forget_password_link{
	width: 100%;
	display: block;
	color: #333;
	margin-bottom: 10px;
}
.popup_err_msg_red{
	color: #e70404;
	font-size:14px;
	display: block;
	margin: 15px 0 20px;
}
.t_error_message_signin_ul{
	margin: 20px 0;
	padding: 0;
	width:100%;
	color: red;
}
.t_error_message_signin_ul li{
	float: left:
	display: block;
	margin-bottom: 10px;
	color: #e70404;
	font-size:14px;
}
.t_error_message_signin_ul li:lst-child{
	margin-bottom: 0;
}
  </style>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Business Analytics & Big Data</title>
    <link href="<?php echo  get_template_directory_uri();?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo  get_template_directory_uri();?>/css/babd-style.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="main_body">
    <div id="main_wrappr">
      <div class="container top_logo_cont">
        <div class="row">
         <div class="col-md-1 col-xs-3"> 
          <img src="<?php echo site_url(); ?>/wp-content/uploads/2018/03/iim-kashipur.png">
         </div>
         <div class="col-md-3 col-xs-9 pull-right text-right"> 
          <img src="<?php echo site_url(); ?>/wp-content/uploads/2018/03/t-edge-white.png">
         </div>
        </div>
      </div>
      <div class="container mid_hdr_cont">
        <div class="row">
          <div class="col-md-4 col-xs-12">
            <div class="left_cert_cont">
              <img src="<?php echo site_url(); ?>/wp-content/uploads/2018/03/sample-cert.jpg" alt="" class="img-responsive">
            </div>
          </div>
          <div class="col-md-8 col-xs-12">
            <div class="col-md-10 col-sm-12 col-xs-12 no-padding">
              <div class="mid_top_hdr">
                Eligibility Assessment for
                <span>Executive Certification Program in</span> 
                Business Analytics & Big Data
                <span>from IIM Kashipur</span>
              </div>
              <div class="clearfix"></div>
              <div class="col-md-4 col-sm-5 col-xs-12 no-padding-left">
                <a href="#" class="btn btn-signup" data-toggle="modal" data-target="#sign_up">Sign Up</a>
              </div>
              <div class="col-md-8 col-sm-7 col-xs-12 sign_in_new_link">
                Already Registered? <a href="#" class="signin_main_link" data-toggle="modal" data-target="#sign_in">Sign In</a>
              </div>
              <div class="clearfix"></div>
              <div class="col-xs-12 mid-opt-cont">
                <ul class="mid-opt_list">
                  <li>
                    <div class="opt-round-circle">
                      <img src="<?php echo site_url(); ?>/wp-content/uploads/2018/03/usr-white.png" alt="">
                    </div>
                    <div class="opt-round-txt">
                      Signup for this assessment
                    </div>
                  </li>
                  <li>
                    <div class="opt-round-circle">
                      <img src="<?php echo site_url(); ?>/wp-content/uploads/2018/03/quiz-white.png" alt="">
                    </div>
                    <div class="opt-round-txt">
                      Take the timed quiz
                    </div>
                  </li>
                  <li>
                    <div class="opt-round-circle">
                      <img src="<?php echo site_url(); ?>/wp-content/uploads/2018/03/score-white.png" alt="">
                    </div>
                    <div class="opt-round-txt">
                      Get your score
                    </div>
                  </li>
                  <li>
                    <div class="opt-round-circle">
                      <img src="<?php echo site_url(); ?>/wp-content/uploads/2018/03/support-white.png" alt="">
                    </div>
                    <div class="opt-round-txt">
                      Let us connect back
                    </div>
                  </li>
                </ul>
              </div>
            </div>
            <div class="clearfix"></div>
            <p class="info-txt-inst">
              All applicants for IIM Kashipur’s Business Analytics & Big Data Certification Program are required to go through this mandatory eligibility assessment. This is a timed quiz and your scores at the end would be sent to our counsellors. For queries or concerns about this assessment please contact our counsellors at <span>91- 8376000600</span> from <span>9:30 AM</span> to <span>6:30 PM</span>
            </p>
          </div>
        </div>
      </div>

      <div class="clearfix"></div>
    </div>
    <!--Signup-Popup-->
  <div id="sign_up" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="sign_up_popup_inner">
          <div class="col-md-8 col-sm-12 col-md-offset-4">
            <h1>signup to proceed further</h1>
            <form method="post" action="">
              <div class="sign_up_popup_form">
                <div class="sign_up_popup_form_input col-xs-12 no-padding">
                  <input type="text" class="sign_in_name"  value="" name='fname'  placeholder="Your Full Name" required />
                </div>
              </div>
              <div class="sign_up_popup_form">
                <div class="sign_up_popup_form_input col-xs-12 no-padding">
                  <input type="text" class="sign_in_email" value="<?php echo $_GET['emailid'];?>" name="email"  placeholder="Email id" required />
                </div>
              </div>
              <div class="sign_up_popup_form">
                <div class="sign_up_popup_form_input col-xs-12 no-padding">
                  <input type="text" class="sign_in_phone"  value="" name="phone"  placeholder="Phone No." required />
                </div>
              </div>
              <div class="sign_up_popup_form">
                <div class="sign_up_popup_form_input col-xs-12 no-padding">
                  <input type="password" class="sign_in_password"  name="password" value=""  placeholder="Password ( 8-15 Character )"  required/>
                </div>
              </div>
              <input type="button"  value="register now" name="register" class="btn btn-signup_green register_now">
			  <!--<span class="already_have_account">Already have an account? <a class="signin_link" data-toggle="modal" data-target="#sign_in" target="" href="#">Login</a></span> -->
			  <div class="t_error_message_signin">
				  <ul class="t_error_message_signin_ul">
				  </ul>
			  </div>
			  
			  
            </form>
			
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--End-Signup-Popup-->
  <!--Signin-Popup-->
  <div id="sign_in" class="modal fade" role="dialog">
    <div class="modal-dialog ">
      <div class="modal-content">
        <div class="sign_in_popup_inner sign-in_inner_popup">
          <div class="col-md-8 col-sm-12 col-md-offset-4">
            <h1>sign in here</h1>
            <form  method="post" action="">
              <div class="sign_up_popup_form">
                <div class="sign_up_popup_form_input col-xs-12 no-padding">
                  <input type="text" name="login_email" class="login_email" id="" placeholder="Email id" />
                </div>
              </div>
              <div class="sign_up_popup_form">
                <div class="sign_up_popup_form_input col-xs-12 no-padding">
                  <input type="password" name="login_password" class="login_password" placeholder="Password" />
                </div>
              </div>
			   <a class="forget_password_link" target="" href="#">Forgot Password ?</a>
              <input type="button" name="signin" value="sign in" class="btn btn-signup_green signin">
    <!--   <span class="dont_have_account blk-link">Don't have account? <a class="signup_link" data-toggle="modal" data-target="#sign_up" target="" href="#">Sign up</a></span> -->
		 
		 </form>
		   <span class="t_error_message_login popup_err_msg_red"></span>  
			
          </div>
		  
		  
        </div>
		
		<!----- Reset password (start) -->
		
		<div class="forget_password_popup_inner sign_in_popup_inner" style="display:none;">
          <div class="col-md-8 col-sm-12 col-md-offset-4">
            <h1>reset password</h1>
            <form  method="post" action="">
              <div class="sign_up_popup_form">
                <div class="sign_up_popup_form_input col-xs-12 no-padding">
                 <input type="text" placeholder="Email ID*" name="username_or_email-280" id="forget_email" class="ok forget_email">
                </div>
				</div>
				<div class="sign_up_popup_form">
				  <div class="sign_up_popup_form_input col-xs-12 no-padding">
                 <input type="text" placeholder="Captcha" name="forget_captcha-280" id="forget_captcha"  class="ok jCaptcha forget_captcha">
                </div>
				  
              </div>
              
              <input type="button" name="forget_password" value="Send Link" class="btn btn-signup_green forget_password">
			 <span class="already_have_account blk-link"><a class="signin_link" target=""  href="#">Back to Login</a></span>
		 </form>
		   <span class="t_error_message_forget popup_err_msg_red"></span>  
			
          </div>
		 
        </div>
		
		<!--- reset password end  -->
		
		
		
		<!----- update password (start) -->
		
		<div class="update_forget_password_popup_inner sign_in_popup_inner" style="display:none;">
          <div class="col-md-8 col-sm-12 col-md-offset-4">
            <h1>Update password</h1>
            <form  method="post" action="">
              <div class="sign_up_popup_form">
                <div class="sign_up_popup_form_input col-xs-12 no-padding">
                 <input type="password" placeholder="Password" name="passowrd" id="update_forget_email" class="ok forget_email user_password">
                </div>
				</div>
				<div class="sign_up_popup_form">
				  <div class="sign_up_popup_form_input col-xs-12 no-padding">
                 <input type="password" placeholder="Confirm New Password" name="confirm_password"  class="ok confirm_password">
			<input type="hidden" placeholder="" name="confirm_password"  class="ok update_email">
<input type="hidden" placeholder="" value="<?php echo $_GET['q']; ?>"  class="ok update_key">


				 </div>
				  
              </div>
               
              <input type="button" name="update_password" value="Update Password" class="btn btn-signup_green update_password">
			    <span class="already_have_account blk-link"><a class="signin_link" target=""  href="#">Back to Login</a></span>
		 
			</form>
		   <span class="t_error_message_update_pwd" style="color:red;"></span>  
			
          </div>
		 
        </div>
		
		<!--- reset password end  -->
		
		
      </div>
    </div>
  </div>
 
  
  
  
  
  
  </body>
</html>
  <?php	   
			
  }
	wp_foot();	?>
  <!--End-Signin-Popup-->