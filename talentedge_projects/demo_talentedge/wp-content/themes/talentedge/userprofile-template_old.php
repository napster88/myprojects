<?php
   /*
     Template Name: User Profile
    */
   
   acf_form_head();
   
   get_header();

   ?>
<link href="<?php echo esc_url(get_template_directory_uri()); ?>/css/lp-style.css" rel="stylesheet">
<link href="<?php echo esc_url(get_template_directory_uri()); ?>/css/myprofile.css" rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css" rel="stylesheet" />
<script src="https://connect.facebook.net/en_US/all.js#xfbml=1&appId=1810893482489616"></script>
<script src="https://apis.google.com/js/client.js"></script>

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
//echo SLIQ_URL."=====".$userData->data->sliq_id; 
           if($userData->data->sliq_id>0){
             $sliqData = array();             
             $sliqData['batch_id']=40;
             $sliqData['content_id']=1366;
             $ch = curl_init();
            $fields_string = http_build_query($sliqData);
            //set the url, number of POST vars, POST data
            curl_setopt($ch, CURLOPT_URL, SLIQ_URL . "/Api/joinLiveClass");
		curl_setopt($ch, CURLOPT_HEADER, FALSE);
            curl_setopt($ch, CURLOPT_HTTPHEADER,   array(
                        'userid: '.$userData->data->sliq_id));            
            curl_setopt($ch, CURLOPT_POST, count($sliqData));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
            //execute post
            $result = curl_exec($ch);
            $decode = json_decode($result, true);  
            $urlwatchlive=  $decode['resultData']['URL']; //exit; 
	if($userData->data->sliq_id==2308){      
           // echo "====<pre>";print_r($decode);echo "<pre>";//exit;
}
           }else{
$urlwatchlive='https://sliq.talentedge.in/webinar.php?room_id=1366';
}
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
                  <?php //if($userData->data->sliq_id>0){?>
                  <li class="<?php echo $activeclass;?>"><a href="#livechart" data-toggle="tab">
                     <i class="live_tlk_icn"></i>
                     <span>Live Talk</span>
                     </a>
                  </li>
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
               </ul>
            </div>
         </div>
         <div class="col-md-10 col-sm-9 col-xs-12 user_context">
            <!-- Tab panes -->
            <div class="tab-content user_panels">
               <div class="tab-pane <?php echo $classactive;?>" id="profile">
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
                        <div style="display:none">
                           <?php
                              //echo $customer_email;
                              //print_r($product_p);
                              ?>
                        </div>
                        <?php
                           if (in_array($product->id, $product_p))
                           {
                               $prod_id = $_product->id;
                           
                               $order_ids    = get_all_ordersby_pname($prod_id);
                               ?>
                        <div style="display:block">
                           <?php
                              //echo "<pre>";
                              //print_r($order_ids); 
                              ?>		
                        </div>
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
                               {
                                   
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
                                             ?>
                                       </div>
                                       <?php if ($grace_duedate >= $current_date)
                                          { ?>
                                       <span class="pay_now pull-right">
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
                                          //print_r($orderarray);
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
                <div class="tab-pane <?php echo $activeclass;?>" id="livechart">
                  <div class="container main">
 <div class="wrap_profile_info">
  <div class="col-md-12 col-xs-12">
    <div class="happiness_head">
      Coming Soon
    </div>
    <div class="happines-bnr-cont">
      <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/happiness-header.jpg" alt="" class="img-responsive">
   </div>
   <div class="col-md-12 col-xs-12 text-center" id="watchnow"> 
    <!--<a href="#" class="watch_happines_btn">Watch Now</a>-->
  </div>
<div class="col-md-12 col-xs-12 text-center" id="watchnownew11"> 
    <!--<a href="#" class="watch_happines_btn">Watch Now</a>-->
  </div>
  <div class="clearfix"></div>
  <div class="address_spkr_txt">
    <div class="live_ssn_txt">
      Live Talk session with
    </div>
    <div class="live_ssn_spkr">
      Mr Nithya Shanti
    </div>
    <div class="live_ssn_txt">
      on Happiness  “<span class="ssn_red">Accessible Practices for Happiness & Wellbeing in Daily Life</span>”
    </div>
    <div class="live_ssn_txt">
      Date: 05 th November, 2017    <span class="ssn_spratr">|</span>    Time: 11 AM
    </div>
  </div>
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

  
               </div>
                </div>
               <div class="tab-pane" id="myCertificates">
                  <div class="pad-lt-30 pad-rt-30">
                     <h3 class="text-uppercase margin-bt-20 margin-tp-20">
                     My Certificates</h2>
                     <?php get_user_certificate($userId); ?>
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
                           <img class="sloader" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/ajax-loader.gif" id="img" style="display:none"/ >
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
                        <strong class="text-bold text-uppercase"><?php echo $user_reference_code; ?></strong>
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
                              <!-- <a href="https://plus.google.com/share?url=<?php echo $inviteUrlGplus; ?>" onclick="javascript:window.open(this.href,
                                 '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
                                       <div class="google_plus">Google Connect<i class="userpro-icon-google-plus fa pull-right"></i></div></a> -->
                           </div>
                        </div>
                     </div>
                     <div class="right_form col-md-6 col-sm-6 col-xs-12">
                        <span class="orDivider-r"><em class="vMiddle">Or</em></span>
                        <h2 class="text-center show text-uppercase">Invite a friend</h2>
                        <?php
                           echo do_shortcode('[gravityform id=8 title=false ajax=true tabindex=32 ]');
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
                           <div class="text-right"><img id="loading-image" src="<?php echo get_template_directory_uri(); ?>/assets/images/ajax-loader.gif"></div>
                           <div class="text-right email_sent">Email sent</div>
                           <h2 class="text-center show text-uppercase">Referees</h2>
                           <div class="table_wrp_refer">
                              <?php get_listof_referred_userdata($userId); ?>	
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
                        <?php linkein_course_suggestor($userId); ?>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="clearfix"></div>
         <?php }
            else
            {
                ?>
         <div class='nologin row'>
			 <div class='col-xs-12 text-center'>
				<br><br> 
				<h4>Please login to continue</h4>
				<?php echo do_shortcode('[userpro template=login login_redirect= ' . $currentUrl . ' option=value  ]'); ?>
			 </div>
         </div>
        
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
<script>
// Set the date we're counting down to
var countDownDate = new Date("Nov 05, 2017 11:00:00").getTime();
<?php if($userData->data->sliq_id==12 || $userData->data->sliq_id==2308 || $userId==3){?>
//var countDownDate = new Date("Nov 04, 2017 01:27:00").getTime();
<?php }?>

// Update the count down every 1 second
var x = setInterval(function() {

  // Get todays date and time
  var now = new Date().getTime();

  // Find the distance between now an the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
  document.getElementById("watchnow").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";
if (distance < 0) {
document.getElementById("watchnow").innerHTML ='';
}
  // If the count down is finished, write some text 
  //if (distance < 0) {
    clearInterval(x);
    <?php if($urlwatchlive!='https://sliq.talentedge.in/webinar.php?room_id=1366'){?>
    document.getElementById("watchnownew").innerHTML = '<a href="<?php echo $urlwatchlive;?>" class="watch_happines_btn" target="_blank">Watch Now</a>';
    <?php }else{?>
	document.getElementById("watchnownew").innerHTML = '<a onClick="redirecturl(<?php echo $userId;?>);" class="watch_happines_btn">Watch Now</a>';
    <?php }?>
  //}
}, 1000);
</script>
<script>
//$(document).ready(function() {
function redirecturl(userid)
{
   var request = $.ajax({
  url: "https://talentedge.in/script.php",
  method: "POST",
  data: { id : userid },
  dataType: "html",
  success:function(data) {
      //alert(data); 
      var urldata = "https://sliq.talentedge.in/webinar.php?room_id=1366";
       window.open(urldata, '_blank');
    }
});
 

}
//});
</script>
