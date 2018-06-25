<?php
   /*
     Template Name: User Profile
    */

   acf_form_head();

   get_header();

   ?>
<link href="<?php echo esc_url(get_template_directory_uri()); ?>/css/lp-style.css?date=27122007" rel="stylesheet">
<link href="<?php echo esc_url(get_template_directory_uri()); ?>/css/myprofile.css" rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css" rel="stylesheet" />
<script src="https://connect.facebook.net/en_US/all.js#xfbml=1&appId=1810893482489616"></script>
<script src="https://apis.google.com/js/client.js"></script>
<script type="text/javascript">
   jQuery(document).ready(function ($) {
       //$('#editProfile form input[type=email]').prop('disabled', true);
   });
</script>

 <script>
      $(document).ready(function() {
$('.join-now-btn').click(function() {
  //alert( "hello test" );
	var id=$(this).attr('id');
	$.ajax({
	  type: "POST",
	  url: "/serverscript.php",
	  data:'value='+id,
	 // cache: false,
	  success: function(data){
	     var win = window.open(data, '_blank');
		if (win) {
		    //Browser has allowed it to be opened
		    win.focus();
		} else {
		    //Browser has blocked it
		    alert('Please allow popups for this website');
		}
	  }
	});
});
$('.watch_btn').click(function() {
  //alert( "hello test" );
	var id=$(this).attr('id');
	$.ajax({
	  type: "POST",
	  url: "/serverscriptelsa.php",
	  data:'value='+id,

	  success: function(data){
	     var win = window.open(data, '_blank');
		if (win) {
		    //Browser has allowed it to be opened
		    win.focus();
		} else {
		    //Browser has blocked it
		    alert('Please allow popups for this website');
		}
	  }
	});
});

        var owl = $('.owl-carousel');
        owl.owlCarousel({
          rtl: false,
          dots: false,
          margin: 10,
          nav: true,
          loop: false,
          autoplay:true,
          autoplayTimeout:5000,
          autoplayHoverPause:true,
          responsive: {
          0: {
            items: 1
          },
          600: {
            items: 2
          },
          1000: {
            items: 3
          }
        }
      })
              // Custom Navigation Events
    $(".next").click(function(){
    owl.trigger('owl.next');
    })
    $(".prev").click(function(){
    owl.trigger('owl.prev');
    })
            })
          </script>
<style type="text/css">
   #editProfile,
   .pay_now .woocommerce-Price-amount, .email_sent,
   .acf-field-57fde46de37f4, #loading_image_invite ,.email_sent_invite,
   .email_verified, .acf-field-582421462abc4{
   display: none;
   }
   .user_tabs .acf-spinner.is-active{
   display: none !important;
   }
   .user_tabs .leftUserRail .acf-form-submit{
   display: none;
   }
   .enroll_failed{
   font-size: 16px;
   color: #cc0000;
   font-weight: bold;
   }
   .enroll_failed span{
   position: relative;
   width: 15px;
   height: 15px;
   background: #cc0000;
   -moz-border-radius: 50%;
   -o-border-radius: 50%;
   -webkit-border-radius: 50%;
   -ms-border-radius: 50%;
   border-radius: 50%;
   display: inline-block;
   margin-right: 5px;
   top: 2px;
   }
   .none, .nocourses_div{display: none;}
   .scnotice{padding:20px 0px;}
   .fail_status{display:none;}
   #watchnow{display:block; margin-top: 30px; color:#244895; font-size:24px;font-style:italic; font-weight:bold;}
	.live_tlk_icn {
	background: url('/wp-content/themes/talentedge/images/live-talk.png') no-repeat 0 0;
	width: 21px;
	height: 21px;
	display:inline-block;
	float:left;
	margin-right:10px;

}
</style>
<div id="primary" class="content-area">
   <main id="main" class="site-main" role="main">
      <?php
         if (is_user_logged_in())
         {
             $userId              = get_current_user_id();
             $userData            = get_userdata($userId);
             $user_reference_code = get_field('user_reference_code', 'user_' . $userId);
             $activeclass=$classactive='';
            if($userData->data->sliq_id>0){
                 $activeclass='active';
                 $classactive='';
             }else{
                 $activeclass='';
                 $classactive='active';
             }
//echo $_SESSION['sliq_url'];exit;
           if($userData->data->sliq_id>0){
             $sliqData = array();
             //$sliqData['userid']=$userData->data->sliq_id;
             $sliqData['batch_id']=40;
             $sliqData['content_id']=1694;
             $ch = curl_init();
            $fields_string = http_build_query($sliqData);
            //set the url, number of POST vars, POST data
            curl_setopt($ch, CURLOPT_URL, SLIQ_URL . "/Api/joinLiveClass");
		curl_setopt($ch, CURLOPT_HEADER, FALSE);
            curl_setopt($ch, CURLOPT_HTTPHEADER,   array(
                        'userid: '.$userData->data->sliq_id));
            //curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            //curl_setopt($ch, CURLOPT_URL, "http://localhost/aws/index.php?entryPoint=lead-genration&");
            curl_setopt($ch, CURLOPT_POST, count($sliqData));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
            //execute post
            $result = curl_exec($ch);
            $decode = json_decode($result, true);
            //$url=  $decode['resultData']['URL']; //exit;
            $urlwatchlive=  $decode['resultData']['URL']; //exit;
            //$urlwatchlive=  'https://sliq.talentedge.in/webinar.php?room_id=1535'; //exit;
            //if($userData->data->sliq_id==2308){
            //echo "====<pre>";print_r($decode);echo "<pre>";//exit;
            //}
           }else{
$urlwatchlive='https://sliq.talentedge.in/webinar.php?room_id=1694';
}
            //echo "<pre>";print_r($decode);exit;

             ?>
      <input type="hidden" class="reference_code" value="<?php echo $user_reference_code ?>">
      <input type="hidden" class="site_url" value="<?php echo get_bloginfo('url'); ?>">
      <input type="hidden" class="user_fname" value="<?php echo $userData->first_name; ?>">
      <div class="clearfix userProfile_wrapper">
         <div class="col-md-2 col-sm-3 col-xs-12 user_tabs">
            <!-- required for floating -->
            <div class="leftUserRail">
               <?php
                  $user_profile        = get_field('profile_image', 'user_' . $userId . '');
                  if (empty($user_profile))
                  {
                      $avatar = esc_url(get_template_directory_uri()) . '/images/profile_placeholder.svg';
                      echo "<img class='placeholder-img' src = '" . $avatar . "'>";
                      // echo "<span class='uploadSize'>Upload profile image dimension of 300x300</span>";
                  }
                  $options = array(
                      'post_id'      => 'user_' . $userId, // $user_profile,
                      'field_groups' => array(592),
                      'uploader'     => 'basic',
                      'submit_value' => 'Upload image'
                  );
                  acf_form($options);

                  echo "<div class='full_name text-center'>" . $userData->first_name . " " . $userData->last_name . "</div>";


                  ?>
               <!-- Nav tabs -->
               <ul class="nav nav-tabs tabs-left sideways">
                  <li class="<?php echo $classactive;?>"><a href="#profile" data-toggle="tab">
                     <i class="fa icon-profile"></i>
                     <span>Profile</span>
                     </a>
                  </li>
                  <li><a href="#myCourses" data-toggle="tab">
                     <i class="fa icon-my-course"></i>
                     <span>My Courses</span>
                     </a>
                  </li>
				  <?php $tablename1=$wpdb->prefix . 'usermeta';
		  $sqlm = "SELECT COUNT(*) FROM  ".$tablename1."  WHERE user_id = '".$userId."' && meta_key='babd_assesment_score'";
		$already_score=$wpdb->get_var($sqlm);
		if($already_score!=0)
		{
	?>
				   <li><a href="#myassesment" data-toggle="tab">
                     <i class="fa icon-my-course"></i>
                     <span>Assesment</span>
                     </a>
                  </li>
		 <?php }


        global $wpdb;
	$statuscheck=0;
        $result = $wpdb->get_results( "SELECT * FROM te_xlri_registration");
        foreach ( $result as $print )   {
         $userid =   $print->user_id;
      if ($userid == get_current_user_id() && $statuscheck==0){
	$statuscheck=1;
?>
          <li><a href="#xlriconference" data-toggle="tab">
                     <i class="fa icon-xli-conference"></i>
                     <span>XLRI Conference</span>
                     </a>
                  </li>
            <?php
  }
}
      ?>
<?php
if($statuscheck==0){
//$orderlist    = get_all_ordersby_pname('35006');
//if(get_current_user_id()=='23621'){
//echo $order_id."<pre>";print_r($orderlist);echo "</pre>";
//}
//echo $order_id."<pre>";print_r($order_id);echo "</pre>";
//exit;
//}
/* $orderlistdata       = json_decode(json_encode($orderlist), True);
foreach ( $orderlistdata as $orderind ) {
   //$product_id = $item['product_id'];
       if ($orderind['customer_user'] == get_current_user_id() && ($orderind['post_status']=='wc-completed' || $orderind['post_status']=='wc-processing')){?>
        <li><a href="#xlriconference" data-toggle="tab">
                     <i class="fa icon-xli-conference"></i>
                     <span>XLRI Conference</span>
                     </a>
                  </li>
<?php
     	 }
	} */
}
?>

        <?php  global $wpdb;
		$current_id = get_current_user_id();
        $result = $wpdb->get_results( "SELECT * FROM te_xlri_registration WHERE from_register = 'Elsa' AND user_id = $current_id");
		 if ($result){?>
                  <li class="<?php echo $activeclass;?>"><a href="#livechart" data-toggle="tab">
                     <i class="live_tlk_icn"></i>
                     <span>Live Talk</span>
                     </a>
                  </li>
				   <?php
  }

      ?>
                  <?php //}?>
                  <li><a href="#myCertificates" data-toggle="tab">
                     <i class="fa icon-certificate-course"></i>
                     <span>My Certificates</span>
                     </a>
                  </li>
                  <li><a href="#referEarn" data-toggle="tab">
                     <i class="fa icon-refer-and-earn"></i>
                     <span>Refer & Earn</span>
                     </a>
                  </li>
                  <li>
                     <a href="#suggestcourse" data-toggle="tab">
                        <i class="fa icon-suggested-course"></i>
                        <!-- <img src="<?php //echo esc_url( get_template_directory_uri() );  ?>/images/icon-suggested-course.svg"> -->
                        <span>Course Suggester</span>
                     </a>
                  </li>
                  <li><a href="#selfieScan" data-toggle="tab">
                     <i class="fa icon-selfie-scan"></i>
                     <span>Selfie scan</span>
                     </a>
                  </li>
				   <li><a href="#application_form" data-toggle="tab">
                     <i class="fa icon-selfie-scan"></i>
                     <span>Application form</span>
                     </a>
                  </li>
				  <li><a href="#arden_form" data-toggle="tab">
                     <i class="fa icon-selfie-scan"></i>
                     <span>Arden form</span>
                     </a>
                  </li>
               </ul>
            </div>
         </div>
         <div class="col-md-10 col-sm-9 col-xs-12 user_context">
            <!-- Tab panes -->
            <div class="tab-content user_panels">
               <div class="tab-pane <?php if($already_score==0) echo "active"; echo $classactive;?>" id="profile">
                  <div class="wrapp_edit  pad-lt-30 col-md-12">
                     <div class="wrap_profile_info ">
                        <div class="profile_action text-right col-md-12 col-sm-12 col-xs-12">	<span id="displayedit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</span>
                        </div>
                        <div id="displayProfile">
                           <div class="profile_info">
                              <div style="display:none;"><?php // print_r($_SESSION); ?></div>
                              <h3><?php echo "Profile Info"; ?></h3>
                              <div class="row">
                                 <?php
                                    $firstName = get_field('first_name', 'user_' . $userId);
                                    echo "<div class='first_name col-md-6 col-sm-6 col-xs-6 userDisplay'><label>First Name</label><span>" . $firstName . " </span></div>";

                                    $lastName = get_field('last_name', 'user_' . $userId);
                                    echo "<div class='last_name col-md-6 col-sm-6 col-xs-6 userDisplay'><label>Last Name</label><span>" . $lastName . " </span></div>";

                                    $gender = get_field('gender', 'user_' . $userId);
                                    echo "<div class='gender col-md-6 col-sm-6 col-xs-6 userDisplay'><label>Gender</label><span>" . $gender . " </span></div>";

                                    $dob = get_field('date_of_birth', 'user_' . $userId);
                                    echo "<div class='email col-md-6 col-sm-6 col-xs-6 userDisplay'><label>Date of Birth</label><span>" . $dob . "</span></div>";

                                    //$email = get_field('usereditprofile_email','user_'.$userId);
                                    $email          = $userData->user_email;
                                    ?>
                                 <div class='email col-md-6 col-sm-6 col-xs-6 userDisplay'>
                                    <?php echo "<label>Email</label><span class='email_userprofile'>" . $email . "</span>"; ?>
                                    <?php
                                       // $verify_check =  get_user_meta($userId,'verified_user',true);
                                       // if($verify_check == 1 && !empty($verify_check)){
                                       // 	echo "<p class='verifiedok'>Verified</p>";
                                       // }
                                       // else{
                                       // 	echo "<a href='javascript:void(0)' class='verify_email'>Verify Email</a><p class='email_verified'>Please check your Email to verify.</p>";
                                       // }
                                       ?>
                                 </div>
                                 <?php
                                    $mobileNumber   = get_field('phone_number', 'user_' . $userId);
                                    echo "<div class='mobile_number col-md-6 col-sm-6 col-xs-6 userDisplay'><label>Mobile Number</label><span>" . $mobileNumber . "</span></div>";
                                    ?>
                              </div>
                           </div>
                           <div class="address_info">
                              <h3><?php echo "Address Info"; ?></h3>
                              <div class="row">
                                 <?php
                                    $billingCountry = get_field('billing_country', 'user_' . $userId);
                                    echo"<div class='billing_country col-md-6 col-sm-6 col-xs-6 userDisplay'><label>Country</label><span>" . $billingCountry . "</span></div>";

                                    //$billingState =	get_field('billing_state','user_'.$userId);
                                    $billingState = get_field('billing_state', 'user_' . $userId);

                                    $value_state = $billingState['value'];
                                    $label_state = $billingState['choices'][$value_state];

                                    echo "<div class='billing_state col-mind-6 col-sm-6 col-xs-6 userDisplay'><label>State</label><span>" . $billingState . "</span></div>";

                                    $billingCity = get_field('billing_city', 'user_' . $userId);
                                    echo "<div class='billing_city col-md-6 col-sm-6 col-xs-6 userDisplay'><label>City</label><span>" . $billingCity . "</span></div>";

                                    $billingPostcode = get_field('billing_postcode', 'user_' . $userId);
                                    echo "<div class='billing_postcode col-md-6 col-sm-6 col-xs-6 userDisplay'><label>Pin code</label><span>" . $billingPostcode . "</span></div>";

                                    $billingaddress = get_field('billing_address_1', 'user_' . $userId);
                                    echo"<div class='billing_address col-md-6 col-sm-6 col-xs-6 userDisplay'><label>Address</label><span>" . $billingaddress . "</span></div>";
                                    ?>
                              </div>
                           </div>
                           <div class="education_repeater">
                              <h3><?php echo "Education"; ?></h3>
                              <?php if (have_rows('user_education', 'user_' . $userId)): ?>
                              <?php while (have_rows('user_education', 'user_' . $userId)) : the_row(); ?>
                              <div class="Education_qualification">
                                 <h5><?php the_sub_field('user_university', 'user_' . $userId); ?></h5>
                                 <h6><?php the_sub_field('user_degree', 'user_' . $userId); ?></h6>
                                 <h6>
                                    <span><?php the_sub_field('start_date', 'user_' . $userId); ?></span>
                                    <span><?php the_sub_field('end_date', 'user_' . $userId); ?></span>
                                 </h6>
                              </div>
                              <?php
                                 endwhile;
                                 endif;
                                 ?>
                           </div>
                           <div class="experience_repeater">
                              <h3><?php echo "Experience"; ?></h3>
                              <?php if (have_rows('user_experience', 'user_' . $userId)): ?>
                              <?php while (have_rows('user_experience', 'user_' . $userId)) : the_row(); ?>
                              <div class="experience">
                                 <h5><?php the_sub_field('user_designation', 'user_' . $userId); ?></h5>
                                 <h6><?php the_sub_field('user_company_name', 'user_' . $userId); ?></h6>
                                 <h6>
                                    <span><?php the_sub_field('start_date', 'user_' . $userId); ?> </span>
                                    <span> <?php the_sub_field('end_date', 'user_' . $userId); ?>
                                    </span>
                                 </h6>
                              </div>
                              <?php
                                 endwhile;
                                 endif;
                                 ?>
                           </div>
                        </div>
                        <div id="editProfile">
                           <div class="editableUserTable">
                              <div class="changePassDiv"><a id="clickcheck" href="#changePwd">Change password</a></div>
                              <div id="pasword_change" role="dialog" aria-labelledby="modal2Title" aria-describedby="modal2Desc">
                                 <a class="backToEdit text-uppercase" href="javascript: void(0);">
                                 <i class="fa icon-back_arrow"></i>Back to Edit Profile
                                 </a>
                                 <div class="change_password">
                                    <?php echo do_shortcode('[userpro template=edit]'); ?>
                                 </div>
                              </div>
                              <a class="backToProfile text-uppercase" href="javascript: void(0);">
                              <i class="fa icon-back_arrow"></i>Back to Profile
                              </a>
                              <?php
                                 $options        = array(
                                     'post_id'      => 'user_' . $userId, // $user_profile,
                                     'field_groups' => array(565),
                                     'submit_value' => 'Update Profile'
                                 );
                                 acf_form($options);
                                 ?>
                           </div>
                        </div>
                     </div>
                     <div class="flipkart-refer vertical clearfix">
                        <!-- <div class="flexbox">
                           <img class="flipkard_logo" src="<?php echo esc_url(get_template_directory_uri()); ?>/images/flipkart-logo.png">
                           <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/circle-refer.png">
                           <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/circle-refer-rs.png">
                           <div class="flipkart-short-txt">Refer a Friend now, Avail amazing coupons from Flipkart</div>
                           <a class="btn-normal" href="#">Refer Friend</a>
                           </div> -->
                        <div class="max-width">
                           <img class="img-rounded" src="<?php echo esc_url(get_template_directory_uri()); ?>/images/flipkart-add-1.png">
                           <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/refferel.jpg">
                        </div>
                     </div>
                  </div>
               </div> <div class="tab-pane" id="application_form">
                  <div class="pad-lt-30 pad-rt-30">
				  <h3 class="text-uppercase margin-tp-20">
                     My Courses</h2>
                     <div class="verticalMiddle">
				   <div class="wrapp_edit  pad-lt-30 col-md-12">
                     <div class="wrap_profile_info ">
                        <div class="profile_action text-right col-md-12 col-sm-12 col-xs-12">	<span id="displayedit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</span>
                        </div>
				    </div>
				    </div>


				  </div> </div>
				  </div>

				  <div class="tab-pane" id="arden_form">
                  <div class="pad-lt-30 pad-rt-30">
				  <h3 class="text-uppercase margin-tp-20">
                     Arden form</h2>
					  <div class="verticalMiddle">
					   <div class="wrapp_edit  pad-lt-30 col-md-12">
						 <div class="wrap_profile_info ">
							<div class="profile_action text-right col-md-12 col-sm-12 col-xs-12">	<span id="displayedit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i><a href=""> Edit</a></span>
							</div>
						</div>
						</div>

				  </div>
					 <?php
						global $wpdb;
						$customer_orders = get_posts( array(
							'numberposts' => - 1,
							'meta_key'    => '_customer_user',
							'meta_value'  => get_current_user_id(),
							'post_type'   => array( 'shop_order' ),
							'post_status' => array( 'wc-completed' ),
						));
					$product_list=array();
					$order_id ='';
						foreach($customer_orders as $orderdata){

							$order_id = $orderdata->ID;
							$order = wc_get_order( $order_id );
							$pid ='';
							foreach ( $order->get_items() as $item ) {
								 $pid = $item['product_id'];

								 array_push($product_list, $pid);
							}
						}

						if(in_array('1060',$product_list))
						{

						$query="select * from te_rg_lead_detail
						RIGHT JOIN  te_rg_lead_meta ON te_rg_lead_detail.`lead_id` = te_rg_lead_meta.`lead_id`
						WHERE te_rg_lead_detail.`form_id`='27' && te_rg_lead_detail.`field_number`='53' && te_rg_lead_detail.`value`='$userId' && te_rg_lead_meta.`meta_key`='resume_url'";

						 $result=$wpdb->get_results($query);

						// count =0 means:
							//  it means  either user did not fill arden form
						   //  or user completes form
						 // count =1 means:
						    // it has  partial entry.
							//generate url
						 if(count($result)==0)
						 {
							$query1="select * from te_rg_lead_detail
							RIGHT JOIN  te_rg_lead_meta ON te_rg_lead_detail.`lead_id` = te_rg_lead_meta.`lead_id`
							WHERE te_rg_lead_detail.`form_id`='27' && te_rg_lead_detail.`field_number`='53' && te_rg_lead_detail.`value`='$userId' && te_rg_lead_meta.`meta_key`='gravityformspartialentries_is_fulfilled'";
              echo $query1;
							$result1=$wpdb->get_results($query1);


							if(count($result1)==0)
							// it has  neither token nor complete form
							{
								?>


								<a href="<?php echo site_url(); ?>/arden_form?action=edit&&courseid=1060&&course_name=Executive%20Certificate%20Program%20In%20Luxury%20&%20Fashion%20Events%20&%20Brand%20Communication&&current_user=<?php echo $userId; ?>&&order_id=<?php echo $order_id; ?>">Complete Arden form</a>

						<?php 	} else

							{
								echo "Form is already submitted";

							}

						 }
						 else{
										//it has gf_token

						 ?>
							 <a href="<?php echo $result[0]->meta_value; ?>&&action=update">Complete Ardon form</a>
						<?php  }

						 /* echo "<pre>";
						 print_r($result);
						 	 print_r($result1);
						  echo "</pre>";  */
						}
						?>






				  </div>
				  </div>





               <div class="tab-pane" id="myCourses">




                  <div class="pad-lt-30 pad-rt-30">
                     <h3 class="text-uppercase margin-tp-20">
                     My Courses</h2>
                     <div class="verticalMiddle">
                        <?php
                           $userId         = get_current_user_id();
                           $current_user   = wp_get_current_user();
                           $customer_email = $userData->user_email;

                           $args = array(
                               'post_type'      => 'product',
                               'posts_per_page' => -1
                           );
                           $loop = new WP_Query($args);
                           if ($loop->have_posts())
                           {
                               while ($loop->have_posts()) : $loop->the_post();
                                   $_product  = get_product($loop->post->ID);
                                   $cp        = 0;
                                   $product_p = customer_bought_product($customer_email);
                                   ?>

                        <?php
                           if (in_array($product->id, $product_p))
                           {
                               $prod_id = $_product->id;

                            //   $order_ids    = get_all_ordersby_pname($prod_id);
                               $order_ids    = get_all_ordersby_pname2($prod_id, $userId);
                              // echo '<pre>';print_r($order_ids);echo '</pre>';
                               ?>

                        <?php
                           $orderarray2  = array();
                           $orderarray   = array();
                           $paid_amount_ = '';
                           $paid_tax_    = '';
                           $orderDiscount= '';
                           $amount_extax = '';
                           $idfc_discount= '';
                           $oarray       = json_decode(json_encode($order_ids), True);
                           $coursetype='';
                           foreach ($oarray as $order)
                           {

                               if ($order['customer_user'] == $userId)
                               {//echo $userId;
                                  // if($userId=='22752'){
					//echo "===<pre>";print_r($order);echo "</pre>";
                                   //}
                                   $order_total       = $order['order_total'];
                                   $order_tax         = $order['order_tax'];
                                   $order_currency    = $order['order_currency'];
                                   $orderarray2['id'] = $order['order_id'];
                                   $coursetype        = $order['coursetype'];
                                   $idfc_discount    += ($order_total-$order['order_tax']) * get_post_meta( $order['order_id'], 'idfc_percentage',true) / 100;
                                   $orderarray2['order_total']     = $order_total;
                                   $orderarray2['order_tax']       = $order_tax;
                                   $orderarray2['date']            = $order['post_date'];
                                   $orderarray2['status']          = $order['post_status'];
                                   $orderarray[$order['order_id']] = $orderarray2;

                                   if ($orderarray2['status'] == 'wc-completed')
                                   {
                                       $paid_tax_    += $order_tax;
                                       $paid_amount_ += $order_total;
                                       $amount_extax = $paid_amount_ - $paid_tax_;
                                   }
                               }
                           }

                           $orderinfo_user     = get_orderdetails_user($userId, $prod_id);

                           //print_r($orderinfo_user);

                           $disscount = get_discountvalue($prod_id);
                           if($order_currency=="INR"){
                               //$orderDiscount = $disscount['discount_price_inr']+$idfc_discount;
                               $orderDiscount = $disscount['discount_price_inr'];
                           }else{
                               //$orderDiscount = $disscount['discount_price_usd']+$idfc_discount;
                               $orderDiscount = $disscount['discount_price_usd'];
                           }


                           //$order_currency = $orderinfo_user['currency'];
                           $currencySymbol     = get_woocommerce_currency_symbol($order_currency);
                           $order_final_amount = $orderinfo_user['final_amount'];
                           $order_discount     = $orderinfo_user['order_discount'];
                           $order_coupon       = $orderinfo_user['order_coupon'];

                           $order_payment_type = $orderinfo_user['payment_type'];

                           if (empty($order_payment_type))
                           {

                               $order_payment_type = 'Full';
                           }

                           $regularPrice = get_product_price($prod_id, $order_currency,$coursetype);
                           //echo "regularPrice=".$regularPrice;

                          // echo $prod_id."==". $order_currency."==".$coursetype;
                           if (empty($amount_extax))
                           {
                               $amount_extax = '0';
                           }

                           if ($orderDiscount)
                           {
                               $camt = $orderDiscount;
                           }
                           elseif ($order_coupon)
                           {
                               $camt = $order_coupon;
                           }
                           else
                           {
                               $camt = "";
                           }

                           if ($camt)
                           {
                               $afterdiscount = $regularPrice - $camt;
                           }
                           else
                           {
                               $afterdiscount = $regularPrice;
                           }

                           $pending_amount = $afterdiscount - $amount_extax;
                           ?>
                        <div class="coursePurchased">
                           <?php
                              $courseInstitueId = get_field('c_institute', $prod_id);
                              $institueLogo     = get_field('logo', $courseInstitueId);
                              $institueName     = get_field('short_name', $courseInstitueId);
                              $cl_startdate2    = get_field('course_start_date', $prod_id, false, false);
                              //$date = new DateTime($cl_startdate);
                              $timevalue2       = strtotime($cl_startdate2);
                              $new_date2        = date('M Y', $timevalue2);
                              ?>
                           <div class="infoContainer clearfix">
                              <div class="col-md-8 col-sm-8 col-xs-8 courceDetail">
                                 <div class="row">
                                    <div class="img_University">
                                       <img src="<?php echo $institueLogo; ?>">
                                    </div>
                                    <div class="courseBasic">
                                       <a class="product_title" href="<?php echo get_permalink($prod_id); ?>"><?php echo get_the_title($prod_id) . ""; ?></a>
                                       <a class="institute_name" href="<?php echo get_permalink($courseInstitueId); ?>"><?php echo $institueName; ?>
                                       </a>
                                       <h5 id="<?php echo $prod_id; ?>">Batch - <?php echo $new_date2; ?></h5>
                                    </div>
                                    <?php
                                       if ($order_payment_type == 'Full')
                                       {
                                           $ptext = 'Full Payment';
                                       }
                                       else
                                       {
                                           $ptext = 'Installments';
                                       }
                                       ?>
                                    <h5 class="ptypediv">Payment Type: <span><?php echo $ptext; ?></span></h5>
                                    <div class="col-md-12 col-sm-12 col-xs-12 installment_dataSHow">
                                       <div class="installment_section">
                                          <?php if ($order_payment_type != 'Full')
                                             { ?>
                                          <?php
                                             /* getting installment of products */
                                             get_installment_data($prod_id, $order_currency,$coursetype);
                                             ?>
                                          <?php } ?>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="status courceEnroled col-md-4 col-sm-4 col-xs-4">
                                 <div class="row">
                                    <?php if ($amount_extax == 0)
                                       { ?>
                                    <div class="enroll_blue text-uppercase text-bold text-right enroll_failed"><span></span>Payment Pending</div>
                                    <?php }
                                       else
                                       { ?>
                                    <div class="enroll_blue text-uppercase text-bold text-right"><span></span>Enrolled</div>
                                    <?php } ?>
                                    <?php
                                       if ($pending_amount <= 0)
                                       {
                                           echo "<div class='enroll_orange'> <span></span> Payment Complete</div>";
                                       }
                                       else
                                       {
                                           ?>
                                    <div class="product_actual_price">
                                       <div class="total_amount">
                                          <h6 class="text-bold">
                                             <b>Total Amount* :</b>
                                             <span class="product_price">
                                                <?php
                                                   echo $currencySymbol . $regularPrice;
                                                   ?>
                                                <!-- <i class="fa">i</i> -->
                                             </span>
                                          </h6>
                                       </div>
                                       <div class="paid">
                                          <h6  class="text-bold">
                                             <b>Paid Amount* :</b>
                                             <span class="paid_amount">
                                                <?php
                                                   echo $currencySymbol . ($amount_extax-$idfc_discount);
                                                   ?>
                                                <!-- <i class="fa">i</i> -->
                                             </span>
                                          </h6>
                                       </div>
                                       <?php if ($camt)
                                          { ?>
                                       <div class="total_amount">
                                          <h6 class="text-bold">
                                             <b>Discount Amount* :</b>
                                             <span class="product_price">
                                                <?php
                                                   echo $currencySymbol . $camt;
                                                   ?>
                                                <!-- <i class="fa">i</i> -->
                                             </span>
                                          </h6>
                                       </div>
                                       <?php } ?>
                                       <?php if ($idfc_discount!='' && $cmt=='')
                                          { ?>
                                        <div class="total_amount">
                                          <h6 class="text-bold">
                                             <b>Discount Amount* :</b>
                                             <span class="product_price">
                                             <?php
                                                echo $currencySymbol . $idfc_discount;
                                                ?>
                                             </span>
                                          </h6>
                                       </div>
                                       <?php } ?>

                                       <div class = "pending_amount">
                                          <h6  class="text-bold">
                                             <b>Pending Amount* : </b>
                                             <span class = "balance_amount">
                                                <?php
                                                   echo $currencySymbol . $pending_amount;
                                                   ?>
                                                <!-- <i class="fa">i</i> -->
                                             </span>
                                          </h6>
                                       </div>
                                       <div class="due_date">
                                          <?php
                                             if ($payment_type == 'Full')
                                             {
                                                 //$dueDate = get_field('front-end_batch_name', $prod_id );

                                                 if (get_field('global_last_date', 'option'))
                                                 {
                                                     $dueDate = get_field('global_last_date', 'option');
                                                 }
                                                 else
                                                 {
                                                     $dueDate = get_field('front-end_batch_name', $prod_id);
                                                 }



                                                 echo "<h6  class='text-bold'> Due Date " . $dueDate . "</h6>";
                                             }
                                             else
                                             {
                                                 if ($order_currency == 'INR')
                                                 {
                                                     $order_currency = 'IN';
                                                 }
                                                 /* due date for installment */
                                                 $installmentArray = get_inst_end_date($prod_id, $amount_extax, $order_currency);
                                                 $dueDate          = $installmentArray['date'];
                                                 echo "<h6  class='text-bold'> Due Date " . $dueDate . "</h6>";
                                             }
                                             $date          = date_create_from_format('d/m/Y', $dueDate);
                                             $formated_date = date_format($date, 'Y-m-d');
                                             $datetime      = new DateTime($formated_date);
                                             $grace_period  = get_field('grace_period', 'option');
                                             $datetime->modify("+ " . $grace_period . " day");
                                             $grace_duedate = $datetime->format('Y-m-d');
                                             $current_date  = date('Y-m-d');
					     $productcat = get_post_meta($prod_id, 'course_categories',true);
					     $productcat=array_reverse($productcat);
					     $inst =  get_field('c_institute',$prod_id);
 					     $brand=get_field('short_name',$inst);
						$termdata = get_term( $productcat[0], 'course-categories' );?>
                                       </div>
                                       <?php if ($grace_duedate >= $current_date)
                                          { ?>
                                       <span class="pay_now pull-right carttoadd" id="<?php echo $regularPrice.'***'.get_the_title($prod_id).'***'.$prod_id.'***'.$new_date2.'***'.$termdata->name.'***'.$brand;?>">
                                       <?php echo do_shortcode('[add_to_cart id="' . $prod_id . '"]'); ?>
                                       </span>
                                       <?php }
                                          else
                                          { ?>
                                       <div class="apply-wrapper">Due date is over please contact our respresentatives for further details.
                                          <button class="margin-tp-20 btn-normal apply-disable apply-btn" disabled="disabled">Pay Now</button>
                                       </div>
                                       <?php } ?>
                                    </div>
                                    <?php } ?>
                                 </div>
                              </div>
                           </div>
                           <a href="javascript: void(0);" class="order_History">Order History <i class="fa icon-down-arrow"></i></a>
                           <a href="javascript: void(0);" class="emi_Pay">EMI Payment <i class="fa icon-down-arrow"></i></a>
                           <div class="infoToggle">
                              <div class="col-md-12 col-sm-12 col-xs-12 orderDetail_dataSHow">
                                 <div class="orderDetail_dataTable">
                                    <table class="orderDetail table table-responsive">
                                       <caption>Invoice Payment Method</caption>
                                       <thead>
                                          <tr>
                                             <th>Enrollment id</th>
                                             <th>Amount</th>
                                             <th>Purchase Date</th>
                                             <th>Download invoice/Receipt</th>
                                             <th>Status</th>
                                          </tr>
                                       </thead>
                                       <?php
                                          //$orderarray2 = $orderarray['orders'];
                                      //  echo '<pre>';  print_r($orderarray);
                                      //  echo '</pre>';
                                          foreach ($orderarray as $ordera)
                                          {
                                              //	$url = admin_url( 'admin-ajax.php?bewpi_action=view&post=' . $ordera['id'] . '&nonce=' . wp_create_nonce( 'view' ) );

                                              $uploads = wp_upload_dir();
                                              $invNO   = get_post_meta($ordera['id'], '_bewpi_formatted_invoice_number', true);
                                              if ($invNO)
                                              {
                                                  $url = admin_url('admin-ajax.php?bewpi_action=view&post=' . $ordera['id'] . '&nonce=' . wp_create_nonce('view'));
                                              }
                                              if (file_exists($uploads['basedir'] . '/receipts/' . $ordera['id'] . '.pdf'))
                                              {
                                                  $urlRec = admin_url('admin-ajax.php?action=downloadrec&post=' . $ordera['id'] . '&nonce=' . wp_create_nonce('view'));
                                              }

                                              if (!$url && !$urlRec)
                                              {

                                              }



                                              if ($ordera['status'] == 'wc-completed')
                                              {
                                                  $orderStatus = 'Completed';
                                              }
                                              elseif (( $ordera['status'] == 'wc-pending'))
                                              {
                                                  $orderStatus = 'Pending';
                                              }
                                              elseif (( $ordera['status'] == 'wc-processing'))
                                              {
                                                  $orderStatus = 'Processing';
                                              }
                                              elseif (( $ordera['status'] == 'wc-on-hold'))
                                              {
                                                  $orderStatus = 'On-Hold';
                                              }
                                              elseif (( $ordera['status'] == 'wc-cancelled'))
                                              {
                                                  $orderStatus = 'Cancelled';
                                              }
                                              elseif (( $ordera['status'] == 'wc-failed'))
                                              {
                                                  $orderStatus = 'Failed';
                                              }
                                              ?>
                                              <?php if($orderStatus != 'Cancelled' && $orderStatus != 'Failed'){?>
                                       <tr class="<?php echo $ordera['status']; ?>">
                                          <td><?php echo $ordera['id'] . "<br>"; ?> </td>
                                          <td class="total_<?php echo $orderdata->post_status; ?>"><?php echo $currencySymbol; ?><?php echo $ordera['order_total']; ?></td>
                                          <td><?php
                                             $date = new DateTime($ordera['date']);
                                             echo $date->format('jS-M-Y');
                                             ?> </td>
                                          <td>
                                             <?php if ($ordera['status'] == 'wc-completed')
                                                { ?>
                                             <?php if ($url)
                                                { ?>
                                             <a class="downloadFile" href="<?php echo $url; ?>"><i class="fa icon-download2"></i>Invoice</a>
                                             <?php } ?>
                                             <?php if ($urlRec)
                                                { ?>
                                             <a class="downloadFile" href="<?php echo $urlRec; ?>"><i class="fa icon-download2"></i>Receipt</a>
                                             <?php
                                                }
                                                if (!$url && !$urlRec)
                                                {
                                                    echo '<p>NA</p>';
                                                }
                                                }
                                                else
                                                {
                                                ?>
                                             <?php echo "<p>NA</p>";
                                                } ?>
                                          </td>
                                          <td><?php echo $orderStatus; ?></td>
                                       </tr>
                                       <?php } ?>
                                       <?php } ?>
                                    </table>

                                 </div>

                              </div>

                              <div class="col-md-12 col-sm-12 col-xs-12 installment_dataSHow">
                                 <div class="installment_section">
                                    <?php
                                       /* getting installment of products */
                                       get_installment_data($page->ID, $currency);
                                       ?>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <?php $tax_free         = get_field('tax_free', $page->ID);?>
                         <p align="right" style="font-size:11px;"> <?php echo $tax_free=='Yes'?'':'*Excluding All Taxes';?> </p>
                        <?php
                           $cp++;
                           }
                           endwhile;
                           }
                           ?>
                     </div>

                     <div class="nocourses_div">
                        <p class='text-center'>Currently not enrolled in any course. Start Learning</P>
                        <div class='text-center margin-tp-20'><a class='btn-normal text-uppercase' href='<?php echo home_url() ?>/browse-courses/'>Browse Courses</a></div>
                     </div>
                  </div>
               </div>


			   <!---start of assesment -->

			   <?php

			   $tablename1=$wpdb->prefix . 'usermeta';
		$sqlm = "SELECT * FROM  ".$tablename1."  WHERE user_id = '".$userId."' && meta_key='babd_assesment_score_detail'";
		$result=$wpdb->get_results($sqlm);

		$datamm=$result[0]->meta_value;


		$vals1=unserialize($datamm);

		$vals=unserialize($vals1);



		  $sqlm = "SELECT COUNT(*) FROM  ".$tablename1."  WHERE user_id = '".$userId."' && meta_key='babd_assesment_score'";
		$already_score=$wpdb->get_var($sqlm);
	if($already_score>=1)
	{
			   ?>


		   <div class="tab-pane  active <?php echo $classactive;?>" id="myassesment">

			   <div class="col-xs-12">
        <div class="assessment_top_head">
          <span><?php echo $firstName; ?></span>, Your Assessment for Executive Certificate Program In Business Analytics And Big Data Course is Complete.
        </div>
        <div class="assessment_score_head">
          Your Score:
        </div>
        <div class="clearfix"></div>
        <div class="col-xs-12 assessment-attempt-cont">
          <ul class="assment-attemt-list">
            <li>
              <div class="assment-round">
              <?php $time_test= $vals['duration'];
			  if($time_test<60)
					   { echo "00 : ".sprintf("%02s", $time_test);
					   }
					   else
					   {
						$tt=$time_test%60;
						$tmt=$time_test/60;
					    echo sprintf("%02s",(int)$tmt)." : ".sprintf("%02s", $tt);
					  }


			  ?>
                <span>min : sec</span>
              </div>
              <div class="assment-attempt-txt">
                Time Taken
              </div>
            </li>
            <li>
              <div class="assment-round">
                 <?php echo $vals['attempt']; ?>
              </div>
              <div class="assment-attempt-txt">
                Questions Attempted
              </div>
            </li>
            <li>
              <div class="assment-round">
                <?php echo $vals['correct']; ?>
              </div>
              <div class="assment-attempt-txt">
                Questions Correct
              </div>
            </li>
            <li>
              <div class="assment-round">
                 <?php echo $vals['score']; ?>
              </div>
              <div class="assment-attempt-txt">
                Total Score
              </div>
            </li>
          </ul>
        </div>
        <div class="clearfix"></div>
        <p class="assessment_txt">
      <?php if($vals['score']>=6)

				{


					echo "Our counsellors with connect with you shortly to assist you with the enrolment process. Alternately <a href='".site_url()."/iim-kashipur/executive-certificate-program-business-analytics-big-data/'><strong>Click Here</strong></a> to complete the enrolment process yourself.";
				}
				else
				{
				echo "Our counsellors will connect with you for next step. You may also get in touch with us at <span>8376000600</span> or  write to us at <a href='mailto:enquiry.dtd@talentedge.in'><span>enquiry.dtd@talentedge.in</span></a>"	;
				}


			?>
        </p>
      </div>
      <div class="clearfix"></div>


			 </div>

	<?php } ?>
  <!---End of assesment -->







		<!-- XLRI Conference-->
		<div class="tab-pane" id="xlriconference">
                  <div class="pad-lt-30 pad-rt-30">
                     <h3 class="text-uppercase margin-tp-20">XLRI Conference</h3>
					 <div class="wrap_profile_info">
  <div class="col-md-12 col-xs-12">
    <div class="happines-bnr-cont hdr-mar-top-25">
      <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/header-bnr.jpg" alt="" class="img-responsive">
   </div>
   <div class="col-xs-12 conf-mid-head">
    Watch the Conference Live from XLRI Jamshedpur
  </div>
 <div class="clearfix"></div>
  <div class="col-md-6 col-sm-12 col-xs-12 conf-sessn-seprator">
    <div class="conf-sessn-contnr">
      <div class="conf-top-gry-head">
        Day 1 Sessions - 9th Dec, 2017
      </div>
      <div class="sessn-time-inner-sec">
        <div class="sessn-time">Time: 11:00 to 12:15 </div>
        <div class="sessn-spkr-details">
          Innaugral Session facilitated by Dr. George Thornton & Dr.R.K. Premaranjan
        </div>
        <div class="sessn_btn_cont">
          <a id="61_1774_<?php echo $userData->data->sliq_id;?>" class="sessn_btn join-now-btn">Join Now</a>
        </div>
      </div>
      <div class="clearfix"></div>
      <div class="sessn-time-inner-sec">
        <div class="sessn-time">Time: 12:30 PM to 13:45 PM</div>
        <div class="sessn-spkr-details">
          Global standards in Assessment Center and its growth in Emerging Markets by Dr. Svetlana Simonenko
          <table cellspacing="0" cellpadding="0" border="0" class="spkr-table">
            <tr>
              <td>12:30 to 12:45</td>
              <td>Andreas Lohff: Global standards in Assessment and its growth in Emerging Markets <a id="61_1776_<?php echo $userData->data->sliq_id;?>" class="join-now-btn">Join Now</a></td>
            </tr>
            <tr>
              <td>12:45 to 13:00</td>
              <td>Pearl John: Global standards for the Assessment Centre Method and its growth in Emerging Markets<a id="61_1777_<?php echo $userData->data->sliq_id;?>" class="join-now-btn">Join Now</a></td>
            </tr>
            <tr>
              <td>13:00 to 13:15</td>
              <td>Helen Baron: The Role of Standards in Improving Assessment Centre Practice<a id="61_1778_<?php echo $userData->data->sliq_id;?>" class="join-now-btn">Join Now</a></td>
            </tr>
            <tr>
              <td>13:15 to 13:30</td>
              <td>Mehmet Sürmeli: Similarities and Differences among Turkey, International, and Other Country-Specific Assessment Center Standards: An Exploration of Reasons<a id="61_1779_<?php echo $userData->data->sliq_id;?>" class="join-now-btn">Join Now</a></td>
            </tr>
          </table>
        </div>
        <!-- <div class="clearfix"></div>
        <div class="sessn_btn_cont">
          <a href="#" class="sessn_btn">Coming Soon</a>
        </div> -->
      </div>
      <div class="sessn-time-inner-sec">
        <div class="sessn-time">Time: 15:00 to 16:30</div>
        <div class="sessn-spkr-details">
          Advances in Assessment Centers in Selection Application by Dr Pearl John
          <table cellspacing="0" cellpadding="0" border="0" class="spkr-table">
            <tr>
              <td>15:00 to 16:00</td>
              <td>Live from XLRI Jamshedpur: Manohar Garikapati Lazarus, Ritesh Pratap Singh, Shatrunjay Krishna<a id="61_1780_<?php echo $userData->data->sliq_id;?>" class="join-now-btn">Join Now</a></td>
            </tr>
            <tr>
              <td>16:00 to 16:20</td>
              <td>Suzanne Tsacoumis: Rich-Media Assessments: Do They Work?<a id="61_1782_<?php echo $userData->data->sliq_id;?>" class="join-now-btn">Join Now</a></td>
            </tr>
          </table>
        </div>
        <!-- <div class="clearfix"></div>
        <div class="sessn_btn_cont">
          <a href="#" class="sessn_btn">Coming Soon</a>
        </div> -->
      </div>
      <div class="sessn-time-inner-sec">
        <div class="sessn-time">Time: 17:00 to 19:30 </div>
        <div class="sessn-spkr-details">
          Contemporary Development in Developing People Competencies using AC by Bhawana Mishra
          <table cellspacing="0" cellpadding="0" border="0" class="spkr-table">
            <tr>
              <td>17:00 to 19:30</td>
              <td>Live from XLRI Jamshedpur: Asim Satpathy, Bharat Grover, Parameswar Nayak, Premalatha P, Sandeep Olker, Sumit Sethi<a id="61_1781_<?php echo $userData->data->sliq_id;?>" class="join-now-btn">Join Now</a></td>
            </tr>
            <tr>
              <td>17:30 to 17:45</td>
              <td>TV Rao: Looking Back and Moving Forward: Lessons in using ADCs to Build People Competencies based on experience and research<a id="61_1783_<?php echo $userData->data->sliq_id;?>" class="join-now-btn">Join Now</a></td>
            </tr>
            <tr>
              <td>18:45 to 19:00</td>
              <td>Sandra Schlebusch: Coaching Development Centers – Combining Assessment Centre methodology and coaching<a id="61_1784_<?php echo $userData->data->sliq_id;?>" class="join-now-btn">Join Now</a></td>
            </tr>
          </table>
        </div>
        <!-- <div class="clearfix"></div>
        <div class="sessn_btn_cont">
          <a href="#" class="sessn_btn">Coming Soon</a>
        </div> -->
      </div>
      <div class="clearfix"></div>
    </div>
  </div>
  <div class="col-md-6 col-sm-12 col-xs-12">
    <div class="conf-sessn-contnr">
      <div class="conf-top-gry-head">
        Day 2 Sessions - 10th Dec, 2017
      </div>
      <div class="sessn-time-inner-sec">
        <div class="sessn-time">Time: 11:30 to 13:00</div>
        <div class="sessn-spkr-details">
           Validity Issues in Assessment Centre by Dr Christof Obermann
           <table cellspacing="0" cellpadding="0" border="0" class="spkr-table">
            <tr>
              <td>11:30 to 11:45</td>
              <td>Anna Baczynska and George Thornton: Relationships of Analytical, Practical, and Emotional Intelligence with Behavioral Dimensions of Performance of Top Managers<a id="62_1787_<?php echo $userData->data->sliq_id;?>" class="join-now-btn">Join Now</a></td>
            </tr>
            <tr>
              <td>11:45 to 13:00</td>
              <td>Live from XLRI Jamshedpur: Swati Aggarwal, Darryl Parrant, Svetlana Simonenko, George C. Thornton III, Premarajan RK<a id="62_1785_<?php echo $userData->data->sliq_id;?>" class="join-now-btn">Join Now</a></td>
            </tr>
          </table>
        </div>
        <!-- <div class="clearfix"></div>
        <div class="sessn_btn_cont">
          <a href="#" class="sessn_btn">Coming Soon</a>
        </div> -->
      </div>
      <div class="sessn-time-inner-sec">
        <div class="sessn-time">Time: 15:00 PM to 18:30 PM</div>
        <div class="sessn-spkr-details">
          Technology and Assessment Centre by Dr L Gurunathan
          <table cellspacing="0" cellpadding="0" border="0" class="spkr-table">
            <tr>
              <td>15:00 to 17:30</td>
              <td>Live from XLRI Jamshedpur: Aldira Meyer,Tessa Gracia, Tanvi Chaturvedi, Amit Kumar, Christof Obermann and Sanjeev Grover <a id="62_1786_<?php echo $userData->data->sliq_id;?>" class="join-now-btn">Join Now</a></td>
            </tr>
<tr>
              <td>16:20 to 16:50</td>
              <td>Julian Hewitt, Mia Bunn, & Anne Buckett: Using a video-based assessment center to select Grade 12 scholars for a teaching scholarship in South Africa <a id="62_1788_<?php echo $userData->data->sliq_id;?>" class="join-now-btn">Join Now</a></td>
            </tr>
            <tr>
              <td>17:30 to 17:45</td>
              <td>Josh Liff: Improving Human Evaluation Processes with the Use of Artificial Intelligence in Virtual Simulations<a id="62_1790_<?php echo $userData->data->sliq_id;?>" class="join-now-btn">Join Now</a></td>
            </tr>
            <tr>
              <td>17:45 to 18:00</td>
              <td>Nathan Mondragon: Improving Human Evaluation Processes with the Use of Artificial Intelligence in Virtual Simulations<a id="62_1791_<?php echo $userData->data->sliq_id;?>" class="join-now-btn">Join Now</a></td>
            </tr>
            <tr>
              <td>18:00 to 18:30</td>
              <td>Martin Lanik: Two Disruptive Technologies Changing the Assessment Center Practice<a id="62_1791_<?php echo $userData->data->sliq_id;?>" class="join-now-btn">Join Now</a></td>
            </tr>
          </table>
        </div>
        <!-- <div class="clearfix"></div>
        <div class="sessn_btn_cont">
          <a href="#" class="sessn_btn">Coming Soon</a>
        </div> -->
      </div>
      <div class="sessn-time-inner-sec">
        <div class="sessn-time">Time: 19:00 PM to 20:00 PM</div>
        <div class="sessn-spkr-details">
          Pleanary session: past present and future of assessment centres by Dr. Bill Byham
        </div>
        <div class="clearfix"></div>
        <div class="sessn_btn_cont"><a id="62_1799_<?php echo $userData->data->sliq_id;?>" class="sessn_btn join-now-btn">Join Now</a>

        </div>
      </div>
      <div class="clearfix"></div>
    </div>
  </div>
  <div class="clearfix"></div>
  <div class="meet_spkr_head mar-top-80">
    Meet your Speakers
    <span><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/spkr-btm-seprator.png"></span>
  </div>
 <div class="inner-slider-cont">
    <div class="owl-carousel">
      <div class="item">
        <div class="spkr-holder">
        <div class="spkr-round">
          <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/spkr/george-thornton.jpg">
        </div>
        <div class="spkr-name">
          Dr George C Thornton III
        </div>
        <div class="spkr-intro">
          Professor Emeritus, Colorado State University, USA
        </div>
      </div>
      </div>
      <div class="item">
        <div class="spkr-holder">
        <div class="spkr-round">
          <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/spkr/rk-premarajan.jpg">
        </div>
        <div class="spkr-name">
          Dr. R. K. Premarajan
        </div>
        <div class="spkr-intro">
          M.A. (Calicut), Ph.D. (IIT Bombay) XLRI Jamshedpur
        </div>
      </div>
      </div>
      <div class="item">
        <div class="spkr-holder">
        <div class="spkr-round">
          <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/spkr/bill-byham.jpg">
        </div>
        <div class="spkr-name">
          Bill Byham
        </div>
        <div class="spkr-intro">
          Executive Chairman at Development Dimensions International (DDI)
          Purdue University Greater Pittsburgh Area
        </div>
      </div>
      </div>
      <div class="item">
        <div class="spkr-holder">
        <div class="spkr-round">
          <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/spkr/mehmet.jpg">
        </div>
        <div class="spkr-name">
          Mehmet Sürmeli
        </div>
        <div class="spkr-intro">
          Founder at Top Talent Solutions (TTS) Turkey
          İstanbul Bilgi Üniversitesi
          Istanbul, Turke
        </div>
      </div>
      </div>
      <div class="item">
        <div class="spkr-holder">
        <div class="spkr-round">
          <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/spkr/svetlana-simonenko.jpg">
        </div>
        <div class="spkr-name">
          Svetlana Simonenko
        </div>
        <div class="spkr-intro">
          Managing Partner at Detech (Development Technologies Ltd)
          Lomonosov Moscow State University (MSU)
          Moscow, Russian Federation
        </div>
      </div>
      </div>
      <div class="item">
        <div class="spkr-holder">
        <div class="spkr-round">
          <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/spkr/anna-baczy.jpg">
        </div>
        <div class="spkr-name">
          Anna Baczyńska
        </div>
        <div class="spkr-intro">
          Assistant Professor at Kozminski University
          Masovian District, Nowy Dwor Mazowiecki County, Poland
        </div>
      </div>
      </div>
      <div class="item">
        <div class="spkr-holder">
        <div class="spkr-round">
          <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/spkr/anna-czarcz.jpg">
        </div>
        <div class="spkr-name">
          Anna Czarczyńska
        </div>
        <div class="spkr-intro">
          Dean Koźmiński University
          ProValues Foundation Warsaw, Masovian District, Poland
        </div>
      </div>
      </div>
      <div class="item">
        <div class="spkr-holder">
        <div class="spkr-round">
          <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/spkr/andreas-lohff.jpg">
        </div>
        <div class="spkr-name">
          Andreas Lohff
        </div>
        <div class="spkr-intro">
          Managing Director & Owner, cut-e Group
          Hamburg Area, Germany
        </div>
      </div>
      </div>
      <div class="item">
        <div class="spkr-holder">
        <div class="spkr-round">
          <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/spkr/sandra-schlebusch.jpg">
        </div>
        <div class="spkr-name">
          Sandra Schlebusch
        </div>
        <div class="spkr-intro">
          Managing Director at LEMASA - Select Talent-Develop Talent-Nurture Talent
          North West University, South Africa Johannesburg Area, South Africa
        </div>
      </div>
      </div>
      <div class="item">
        <div class="spkr-holder">
        <div class="spkr-round">
          <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/spkr/aldira-meyer.jpg">
        </div>
        <div class="spkr-name">
          Aldira Meyer
        </div>
        <div class="spkr-intro">
          Consultant at daya dimensi Indonesia
        </div>
      </div>
      </div>
      <div class="item">
        <div class="spkr-holder">
        <div class="spkr-round">
          <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/spkr/tessa-gracia.jpg">
        </div>
        <div class="spkr-name">
          Tessa Gracia
        </div>
        <div class="spkr-intro">
          Talent Management Consultant at Daya Dimensi Indonesia Universitas Indonesia

        </div>
      </div>
      </div>
      <div class="item">
        <div class="spkr-holder">
        <div class="spkr-round">
          <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/spkr/suzanne-tsacoumis.jpg">
        </div>
        <div class="spkr-name">
          Suzanne Tsacoumis
        </div>
        <div class="spkr-intro">
          Vice President at HumRRO The University of Georgia Washington D.C. Metro Area
        </div>
      </div>
      </div>
      <div class="item">
        <div class="spkr-holder">
        <div class="spkr-round">
          <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/spkr/martin-lanik.jpg">
        </div>
        <div class="spkr-name">
          Martin Lanik
        </div>
        <div class="spkr-intro">
          CEO at Pinsight Colorado State University Greater Denver Area
        </div>
      </div>
      </div>
      <div class="item">
        <div class="spkr-holder">
        <div class="spkr-round">
          <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/spkr/josh-liff.jpg">
        </div>
        <div class="spkr-name">
          Josh Liff
        </div>
        <div class="spkr-intro">
          Senior IO Psychologist at HireVue | Digital Video & Predictive Analytics to Build & Coach the World's Best Teams
          Colorado State University Denver, Colorado
        </div>
      </div>
      </div>
      <div class="item">
        <div class="spkr-holder">
        <div class="spkr-round">
          <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/spkr/nathan-mondragon.jpg">
        </div>
        <div class="spkr-name">
          Nathan Mondragon
        </div>
        <div class="spkr-intro">
          Chief IO Psychologist at HireVue Colorado State University Erie, Colorado
        </div>
      </div>
      </div>
      <div class="item">
        <div class="spkr-holder">
        <div class="spkr-round">
          <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/spkr/christof-obermann.jpg">
        </div>
        <div class="spkr-name">
          Christof Obermann
        </div>
        <div class="spkr-intro">
          Professor and dean for business psychology at the University of Applied Sciences in Cologne
published his first edition of his book “Assessment Center” back in 1992, the current 6th edition just went out.
        </div>
      </div>
      </div>
      <div class="item">
        <div class="spkr-holder">
        <div class="spkr-round">
          <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/spkr/s-pandey.jpg">
        </div>
        <div class="spkr-name">
          Dr. S. Pandey
        </div>
        <div class="spkr-intro">
          Dr. S. Pandey, Ph.D. (I.I.Sc., Bangalore), Managing Director, Corporate Comprehensive Management Consultants (CCMC). Currently heading CCMC; has consultancy experience of 25+ years.
        </div>
      </div>
      </div>
      <div class="item">
        <div class="spkr-holder">
        <div class="spkr-round">
          <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/spkr/satish-pradhan.jpg">
        </div>
        <div class="spkr-name">
          Satish Pradhan
        </div>
        <div class="spkr-intro">
          Satish Pradhan is currently an Independent Consultant. He retired as Advisor, Tata Sons Limited in 2015.
        </div>
      </div>
      </div>
      <div class="item">
        <div class="spkr-holder">
        <div class="spkr-round">
          <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/spkr/helen-baron.jpg">
        </div>
        <div class="spkr-name">
          Helen Baron
        </div>
        <div class="spkr-intro">
        AFBPsS C Psychol Work Psychology and Psychometrics Independent Consultant  The Hebrew University of Jerusalem
        London, United Kingdom
         </div>
      </div>
      </div>
    </div>
  </div>
  <div class="clearfix"></div>
<div class="lp_upcoming_txt mar-top-50">
  Upcoming Events
  <span>Currently there ara no events. Watch out this space for more</span>
</div>

</div>
</div>
</div>
					</div>


    <!--            <div class="tab-pane <?php echo $activeclass;?>" id="livechart">
                  <div class="container main">
				  <div class="wrap_profile_info">
  <div class="col-md-12 col-xs-12">

    <div class="happines-bnr-cont">
      <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/profile-hdr.jpg" alt="" class="img-responsive">
   </div>
  <div class="clearfix"></div>

  <div class="meet_spkr_head">
    Meet your Speakers
    <span><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/spkrelsa-btm-seprator.png"></span>
  </div>
  <div class="col-md-12 col-sm-12 col-xs-12">
    <ul class="past-spkr-list">
      <li>
        <div class="past-spkr-img">
          <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/spkr/pramath-sinha.jpg">
         </div>
         <div class="past-spkr-head">
          Pramath Sinha
         </div>
         <div class="past-spkr-info">
          Founder, Vedica Scholars Programme
for Women, Ex- McKinsey & ABP Pvt Ltd.
         </div>
         <div class="date-time-past-spkr">
          Date: 06th January, 2018
         </div>
		 <div class="spkr-timing">
          11 AM -  12 PM
         </div>
         <div class="click-watch-btn-cont">
          <a  id="66_1906_<?php echo $userData->data->sliq_id;?>" class="watch_btn">Join Now</a>
        </div>
      </li>
      <li>
        <div class="past-spkr-img">
          <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/spkr/vinita-bali.jpg">
         </div>
         <div class="past-spkr-head">
          Vinita Bali
         </div>
         <div class="past-spkr-info">
          Former MD in Britannia Industries
         </div>
         <div class="date-time-past-spkr">
          Date: 13th January, 2018
         </div>
		 <div class="spkr-timing">
          11 AM -  12 PM
         </div>
         <div class="click-watch-btn-cont">
          <a  id="66_1906_<?php echo $userData->data->sliq_id;?>" class="watch_btn">Join Now</a>
        </div>
      </li>
	  <li>
        <div class="past-spkr-img">
          <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/ishita-anand.jpg">
         </div>
         <div class="past-spkr-head">
          Ishita Anand
         </div>
         <div class="past-spkr-info">
          Founder and CEO of BitGiving
         </div>
         <div class="date-time-past-spkr">
          Date: 20th January, 2018
         </div>
         <div class="spkr-timing">
          11 AM -  12 PM
         </div>
         <div class="click-watch-btn-cont">
          <a  id="66_1906_<?php echo $userData->data->sliq_id;?>" class="watch_btn">Join Now</a>
        </div>
      </li>
    </ul>
  </div>
  <div class="clearfix"></div>
  <div class="col-md-10 col-md-offset-1 col-sm-12 col-xs-12">
  <ul class="meet_spkr_list">
      <li>
        <div class="faculty_lp_intro">
          <strong>Pramath Sinha</strong> has worked in diverse fields spanning business and strategy, consulting, leadership and academia. He spent 12 years with McKinsey & Company in North America and India, heading leadership and media practices. He was the Group MD and CEO of ABP Pvt Ltd., a $200 million Indian media conglomerate with interests in newspapers, magazines, television and online.
        </div>
        <div class="faculty_lp_intro">
          He was also the Founder and Trustee of Ashoka University (ashoka.edu.in), India’s first liberal arts university. His most recent venture is the Vedica Scholars Programme for Women in Delhi, an alternative master’s in business administration (MBA) programme.
        </div>
    </li>
    <li>
        <div class="faculty_lp_intro">
          <strong>Vinita Bali</strong> is a global business leader with extensive experience in leading large Companies both in India and overseas. She has worked with eminent multinationals like The Coca-Cola Company and Cadbury Schweppes PLC in a variety of Marketing, General Management and Chief Executive roles in the UK, Nigeria, South Africa, Latin America and the USA, in addition to Britannia Industries Ltd., in India.
        </div>
        <div class="faculty_lp_intro">
          Effective April 2014, Vinita moved from a full time operational role as MD & CEO in Britannia to pursue her wide-ranging interests in the corporate and development sectors, through a portfolio of roles and responsibilities.
        </div>
    </li>
	<li>
        <div class="faculty_lp_intro">
          <strong>Ishita Anand</strong> is the Founder and CEO of BitGiving, India’s leading online crowdfunding platform which helps raise funds online and gives wings to entrepreneurial ideas, creative minds and social issues. Anand’s infectious energy, perseverance and foresightedness has helped BitGiving grow from a two member company to a leader in the crowdfunding niche. Named in the Forbes Under 30 List for Asia in 2017, Ishita is passionate about building products and is a self confessed geek .
        </div>
        <div class="faculty_lp_intro">
          An erstwhile film-maker, Anand is an alumnus of Lady Shri Ram College. She is also affiliated with the Lean In Foundation and is heading the circles for Women Entrepreneurs in India.
        </div>
    </li>
  </ul>
</div>
<div class="clearfix"></div>
<div class="lp_upcoming_txt">
  Upcoming Events
  <span>Currently there ara no events. Watch out this space for more</span>
</div>

</div>
</div>
<div class="clearfix"></div>

end live chart
-->


 <!--<div class="wrap_profile_info">
  <div class="col-md-12 col-xs-12">
    <div class="happiness_head">
      Coming Soon
    </div>
    <div class="happines-bnr-cont">
      <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/happiness-header.jpg" alt="" class="img-responsive">
   </div>
   <div class="col-md-12 col-xs-12 text-center" id="watchnow_xxx">
    <a href="#" class="watch_happines_btn" target="_blank">Coming Soon</a>
  </div>
  <div class="clearfix"></div>
  <div class="address_spkr_txt">
    <div class="live_ssn_txt">
     In case you missed the first session,
    </div>
        <div class="live_ssn_txt">
     watch Nithya Shanti speak about creating Personal Happiness
    </div>
        <div class="clearfix"></div>
      <div class="col-md-12 col-xs-12 text-center" id="watchnow_xxx">
    <a href="https://sliq.talentedge.in/Embed/videoPlayer?id=1366" class="watch_happines_btn" target="_blank">Click to Watch</a>
      </div>
<!--    <div class="live_ssn_spkr">
      Mr Nithya Shanti
    </div>
    <div class="live_ssn_txt">
      on Happiness  “<span class="ssn_red">Accessible Practices for Happiness & Wellbeing in Daily Life</span>”
    </div>
    <div class="live_ssn_txt">
      Date: 05 th November, 2017    <span class="ssn_spratr">|</span>    Time: 11 AM
    </div>
  </div>
-->
<!--<div class="clearfix"></div> <br>
  <div class="meet_spkr_head">
    Meet your Speakers
    <span><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/spkr-btm-seprator.png"></span>
  </div>
  <ul class="meet_spkr_list clearfix">
      <li>
        <img src="https://2jb9j7n786y2mcpn640xb9un-wpengine.netdna-ssl.com/wp-content/uploads/2017/10/nithya-1.jpg" class="faculty_round_img"/>
        <div class="faculty_lp_name">Mr Nithya Shanti </div>
        <div class="faculty_lp_intro">
          An internationally respected spiritual teacher, seminar leader, writer and educator, Nitya Shanti is committed to sharing practical wisdom teachings for happiness and enlightenment with people in a joyful and transformational way.
        </div>
        <div class="read_blu_btn">
          <a href="https://talentedge.in/faculty/nithya-shanti/" class="read_blu">Read more</a>
        </div>
    </li>
    <li>
        <img src="https://2jb9j7n786y2mcpn640xb9un-wpengine.netdna-ssl.com/wp-content/uploads/2017/10/srinivas-1.jpg" class="faculty_round_img"/>
        <div class="faculty_lp_name">E S Srinivas </div>
        <div class="faculty_lp_intro">
          Eminent Professor of Organizational Behaviour, Mr. E S Srinivas has been teaching OB at XLRI Jamshedpur from 1994. He worked as faculty at the Indian School of Business (ISB) for 3 years and continues as visiting faculty at ISB.
        </div>
        <div class="read_blu_btn">
          <a href="https://talentedge.in/faculty/prof-e-s-srinivas/" class="read_blu">Read more</a>
        </div>
    </li>
    <li>
        <img src="https://2jb9j7n786y2mcpn640xb9un-wpengine.netdna-ssl.com/wp-content/uploads/2017/10/aashu-1.jpg" class="faculty_round_img"/>
        <div class="faculty_lp_name">Aashu Calapa </div>
        <div class="faculty_lp_intro">
          An industry leader in HR with more than 24 years of work experience in various organizations such as Wipro, Redbus, Firstsource and the Live Love Laugh Foundation, Mr Aashu Calapa has successfully held various leadership positions in India and abroad.
        </div>
        <div class="read_blu_btn">
          <a href="https://talentedge.in/faculty/mr-aashu-calapa/" class="read_blu">Read more</a>
        </div>
    </li>

  </ul>
<div class="lp_upcoming_txt">
  Upcoming Events
  <span>Currently there are no events. Watch out this space for more.</span>
</div>

</div>
</div>
<div class="clearfix"></div>


               </div>-->
                </div>
<!--               <div class="tab-pane" id="myCertificates">
                  <div class="pad-lt-30 pad-rt-30">
                     <h3 class="text-uppercase margin-bt-20 margin-tp-20">
                     My Certificates</h2>
                     <?php //get_user_certificate($userId); ?>
                  </div>
               </div>
               <div class="tab-pane" id="selfieScan">
                  <div class="pad-lt-30 pad-rt-30">
                     <h3 class="text-uppercase margin-bt-20 margin-tp-20">
                     Selfie Scan</h2>
                     <div class="selfidiv">
                        <?php
                           $selfiuser = get_user_meta($userId, "selfiscan");

                           if ($selfiuser != 1)
                           {
                               ?>
                        <div class="step1">
                           <p class="scnotice">Please update the mandatory profile fields to proceed with the test - <a href="<?php echo home_url(); ?>/edit-profile	">update profile</a></p>
                           <button class="btn btn-normal marginT15" id="selfiscanbtn">
                           Take a Test
                           </button>
                           <img class="sloader" src="<?php //echo esc_url(get_template_directory_uri()); ?>/assets/images/ajax-loader.gif" id="img" style="display:none"/ >
                           <p class="fail_status">Failed to Enable Selfiscan, Please try again.</p>
                        </div>
                        <div class="step2 none">
                           <select class="form-control" id="SelectedInterest" name="SelectedInterest">
                              <option value="">Select Interest Test</option>
                              <option value="2">Are You A Go Getter</option>
                              <option value="4">Are You A Leader</option>
                              <option value="5">Know Yourself</option>
                              <option value="1">Selfie Scan</option>
                              <option value="3">Winning Attitude</option>
                           </select>
                           <p class="smsg"></p>
                           <button class="btn btn-normal marginT15" id="selfiscanlink">
                           Go to Test page
                           </button>
                        </div>
                        <?php }
                           else
                           { ?>
                        <div class="step2">
                           <select class="form-control" id="SelectedInterest" name="SelectedInterest">
                              <option value="">Select Interest Test</option>
                              <option value="2">Are You A Go Getter</option>
                              <option value="4">Are You A Leader</option>
                              <option value="5">Know Yourself</option>
                              <option value="1">Selfie Scan</option>
                              <option value="3">Winning Attitude</option>
                           </select>
                           <p class="smsg"></p>
                           <button class="btn btn-normal marginT15" id="selfiscanlink">
                           Go to Test page
                           </button>
                        </div>
                        <?php } ?>
                     </div>
                  </div>
               </div>
               <div class="tab-pane" id="referEarn">
                  <div class="pad-lt-30 pad-rt-30 clearfix col-md-12">
                     <h3 class="text-uppercase margin-bt-20 margin-tp-20">Refer & Earn</h3>
                     <div class="refergplus-wrapper"></div>
                     <script type="javascript">auth();</script>
                     <p class="text-center myCode_refer">Your unique code is:
                        <strong class="text-bold text-uppercase"><?php //echo $user_reference_code; ?></strong>
                     </p>
                     <p class="max-width-750 text-center">
                        Help your friends succeed in their career. Refer them to us and win prizes or vouchers on every successful enrolment.
                     </p>
                     <div class="left_form col-md-6 col-sm-6 col-xs-12 pull-right">
                        <h2 class="text-center show text-uppercase">Invite multiple friends</h2>
                        <?php
                           /* url for Facebook */
                           //$queryStringFb = "id=".$userId."&invitesource=facebook&referralcode=".$user_reference_code."/#loginpopup";
                           $queryStringFb      = "?referralcode=" . $user_reference_code . "#loginpopup";
                           $encodedStringFb    = base64_encode($queryStringFb);
                           ///$inviteUrlFb = get_bloginfo('url')."?data=".$encodedStringFb."/#loginpopup";
                           $inviteUrlFb        = get_bloginfo('url') . $queryStringFb;
                           /* url for google plus */
                           $queryStringGplus   = "id=" . $userId . "&invitesource=google";
                           $encodedStringGplus = base64_encode($queryStringGplus);
                           //$inviteUrlGplus = get_bloginfo('url')."?data=".$encodedStringGplus;
                           $inviteUrlGplus     = get_bloginfo('url') . "?referralcode=" . $user_reference_code . "#loginpopup";
                           ?>
                        <div class="social_referral">
                           <div id="shareBtn" class="facebook">Facebook Connect<i class="fa icon-facebook pull-right"></i></div>
                           <div class="googleplus">
                              <a class="gplusrefer" onclick="auth();" href="#">
                                 <div class="google_plus">Google Connect<i class="userpro-icon-google-plus fa pull-right"></i></div>
                              </a>
                               <a href="https://plus.google.com/share?url=<?php //echo $inviteUrlGplus; ?>" onclick="javascript:window.open(this.href,
                                 '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
                                       <div class="google_plus">Google Connect<i class="userpro-icon-google-plus fa pull-right"></i></div></a>
                           </div>
                        </div>
                     </div>
                     <div class="right_form col-md-6 col-sm-6 col-xs-12">
                        <span class="orDivider-r"><em class="vMiddle">Or</em></span>
                        <h2 class="text-center show text-uppercase">Invite a friend</h2>
                        <?php
                           //echo do_shortcode('[gravityform id=8 title=false ajax=true tabindex=32 ]');
                           ?>
                     </div>
                  </div>
                  <div class="table_ref clearfix col-md-12">
                     <div class="pad-lt-30 pad-rt-30 clearfix">
                        <h3 class="text-uppercase margin-bt-20 margin-tp-20">How it works</h3>
                        <ul class="list-bullet margin-bt-20">
                           <li>Refer your friends, family or colleagues to us through any of the above method.</li>
                           <li>Our Counselling team will call up your referees and introduce our programmes to them.</li>
                           <li>If your referred lead enrols in a course, you are eligible for prize.</li>
                           <li>Prizes are released once your referred lead makes complete payment of the course.</li>
                        </ul>
                        <div class="pad_around ">
                           <div class="text-right"><img id="loading-image" src="<?php //echo get_template_directory_uri(); ?>/assets/images/ajax-loader.gif"></div>
                           <div class="text-right email_sent">Email sent</div>
                           <h2 class="text-center show text-uppercase">Referees</h2>
                           <div class="table_wrp_refer">
                              <?php //get_listof_referred_userdata($userId); ?>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="tab-pane" id="suggestcourse">
                  <div class="pad-lt-30 pad-rt-30 text-center titleTop">
                     <h3 class="mySUggestTitle margin-tp-20">
                     Try out our automated course
                     suggestor. Our smart algorithms analyse your linkedin profile and map it to best courses for you</h2>
                     <div class="course_sugg">
                        <?php //linkein_course_suggestor($userId); ?>
                     </div>
                  </div>
               </div>-->
            </div>
         </div>
         <div class="clearfix"></div>
         <?php }
            else
            {
                ?>
<!--        <div class='nologin row'>
			 <div class='col-xs-12 text-center'>
				<br><br>
				<h4>Please login to continue</h4>
				<?php //echo do_shortcode('[userpro template=login login_redirect= ' . $currentUrl . ' option=value  ]'); ?>
			 </div>
         </div>-->

         <?php }
            ?>
      </div>
   </main>
</div>
<!-- .content-area -->
<script>
   // Facebook share code
   jQuery(document).ready(function ($) {
       var referrence_code = $('.reference_code').val();
       var site_url = $('.site_url').val();
       var user_fname = $('.user_fname').val();
       if ($('.leftUserRail .acf-image-uploader img').attr('src') == '') {
           $('.leftUserRail .acf-form-submit').show();
           $('.placeholder-img').addClass('show');
       }
       $(document).on('click', '.leftUserRail .acf-image-uploader .-cancel', function () {
           $('.leftUserRail .acf-form-submit').slideToggle();

       });

       $('#input_8_4').val(referrence_code);
       $('#input_8_5').val(site_url);
       $('#input_8_6').val(user_fname);
       $('#input_8_8').val(<?php echo $userId; ?>);
       if ($('.userProfile_wrapper').length > 0) {
           var isOnIOS = navigator.userAgent.match(/iPad/i) || navigator.userAgent.match(/iPhone/i);
           var eventName = isOnIOS ? "pagehide" : "beforeunload";

           window.addEventListener(eventName, function (event) {
               window.event.cancelBubble = true;
               window.scroll(0, 0);
           });
       }
   });

   document.getElementById('shareBtn').onclick = function () {
       var referrence_code = $('.reference_code').val();
       FB.ui({
           display: 'popup',
           method: 'share',
           title: 'Talentedge – Premium Executive Courses from IIM, XLRI, MICA',
           href: "<?php echo $inviteUrlFb; ?>",
           description: "Join a certification program. Use my unique code " + referrence_code + " on registration.",
       }, function (response) {});

   }

   /*load */
   window.___gcfg = {
       lang: 'en-US',
       parsetags: 'onload'
   };

</script>
<!-- google plus api -->
<script src="https://apis.google.com/js/platform.js" async defer></script>
<?php //get_sidebar();  ?>
<?php get_footer(); ?>
<script>
   jQuery(document).ready(function ($) {
       //$('.apply-disable').html('Pay Now');
       if ($('.coursePurchased').length != 0) {
           $('.nocourses_div').hide();
       } else {
           $('.nocourses_div').show();
       }
       $('.pay_now a').html('Pay Now');
       $('.enrollCourse a').html('Pay Now');
       var check = false;
       var fname = $('.profile_info .first_name span').html();
       var lname = $('.profile_info .last_name span').html();
       var dob = $('.profile_info .email span').html();
       var gender = $('.profile_info .gender span').html();
       var country = $('.profile_info .billing_country span').html();
       var city = $('.profile_info .billing_city span').html();
       var state = $('.profile_info .billing_state span').html();
       if (fname != '' && lname != '' && dob != '' && fname != '' && gender != '' && country != '' && state != '' && city != '') {
           check = true;
       }
       if (check) {
           $('.scnotice').hide();
       } else {
           $('#selfiscanbtn').attr('disabled', 'disabled');
       }
   });

   $('#selfiscanlink').click(function () {
       if ($('#SelectedInterest').val()) {
           $('.smsg').hide();
           var url = 'http://mywheebox.com/WET-2/startTestAPI.obj?compCode=0017000&testName=Selfie Scan&domainName=Interest Test&login_id=hareesh@inkoniq.com&OSR=osr';
           window.open(url, '_blank')
       } else {
           $('.smsg').html('Please select the test from the dropdown');
       }
   });


   $('#selfiscanbtn').click(function () {
       $('#selfiscanbtn').attr('disabled', 'disabled');
       $('.sloader').show();
       var fname = $('.profile_info .first_name span').html();
       var lname = $('.profile_info .last_name span').html();
       var dob = $('.profile_info .email span').html();
       var gender = $('.profile_info .gender span').html();
       var country = $('.profile_info .billing_country span').html();
       var city = $('.profile_info .billing_city span').html();
       var state = $('.profile_info .billing_state span').html();
       var email = $('#semail').val();
       $.ajax({
           type: "POST",
           url: ajaxurl,
           data: {
               'action': 'create_selfi_user',
               'fname': fname,
               'lname': lname,
               'dob': dob,
               'gender': gender,
               'country': country,
               'city': city,
               'state': state,
               'email': email
           },
           success: function (data) {
               alert(data);
               alert(data.status);
               if (data.status == 1) {
                   $('.sloader').hide();
                   $('.step1').hide();
                   $('.step2').show();
               } else {
                   $('.fail_status').show();
                   //$('.step1').add('<p>Failed to Enable Selfiscan, Please try again.</p>');
               }
           },
           error: function (errorThrown) {
               console.log(errorThrown);
           }
       });
   });

</script>
<script type="text/javascript">
   jQuery(document).ready(function ($) {
       //$('#editProfile form input[type=email]').prop('disabled', true);
       $('.carttoadd').click(function(){
            var valueall=$(this).attr('id');//alert(valueall);
	    var splitvalue=valueall.split('***');
            dataLayer.push({'event': 'checkout',
			    'ecommerce': {'checkout':
				 		{'actionField': {'step': 1},       
						  'products': [{'name': splitvalue[1],
								'id': splitvalue[2],
								'price': splitvalue[0],
								'brand': splitvalue[5],
								'category': splitvalue[4],
								'variant': splitvalue[3]+' batch',
								'quantity': 1
							     }]
						}
					     },
			   'eventCallback': function() {
				//document.location = nextTab($active);
			    }
			});
		//alert('add to cart222222');
	})
   });
</script>
