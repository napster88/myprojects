<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @author      WooThemes
 * @package     WooCommerce/Templates
 * @version     2.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}



$_SESSION['customprice'] = false;

//wc_print_notices();

do_action( 'woocommerce_before_checkout_form', $checkout );

// If checkout registration is disabled and not logged in, the user cannot checkout
if ( ! $checkout->enable_signup && ! $checkout->enable_guest_checkout && ! is_user_logged_in() ) {
    echo apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) );
    return;
}

$returntype=1;
$productId = "";
$contents = WC()->cart->cart_contents;
if( $contents ) foreach ( $contents as $cart_item ){
   $productId = $cart_item['product_id'];
}

$taxStatus=getTaxStatus($productId,get_current_user_id());
$stax=$taxStatus;
if($taxStatus=='stax'){
		echo '<input type="hidden" id="showtaxlblhr" value="0" />';
		echo '<input type="hidden" id="showtaxlbl" value="1" />';
}elseif($taxStatus=='cgst'){
			echo '<input type="hidden" id="showtaxlblhr" value="1" />';
			echo '<input type="hidden" id="showtaxlbl" value="0" />';
}else{
			echo '<input type="hidden" id="showtaxlblhr" value="0" />';
			echo '<input type="hidden" id="showtaxlbl" value="0" />';
}

$parray= get_all_products_ordered_by_user_();
if ($parray){

}
else{
    $parray= array();
}
?>
<style type="text/css">.none, #place_order, .step3div{display:none;}
/*
.btn-normal{
        padding: 6px 0px;
    text-align: center;
    margin-right: 20px;
    margin-bottom: 30px;
}
*/
.active_1{display:none;}
</style>
<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/css/checkout.css?date=06-02-2018" rel="stylesheet">






<div class="row-centered">
<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">




        <section id="<?php echo $paid_amount;?>" class="col-md-10 col-sm-12 col-xs-12 col-centered">
                <div class="wizard">
                    <div class="wizard-inner">
                        <ul class="nav nav-tabs" role="tablist">

                            <?php if (!in_array($productId, $parray)){
                                $state = 'disabled';
                                $display = 'active';

                                ?>
                            <li role="presentation" class="active">
                                <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1">
                                    <span class="round-tab">
                                        1
                                    </span>
                                    <span class="text-tab-title">Enter Your Details</span>
                                </a>
                            </li>
                            <?php } else {
                                $state = 'active';
                                $display = 'none';

                                 $returntype = 2; ?>

                                 <style>
                                 .statpopup{
                                   position: fixed;
                                   z-index: 10;
                                   top: 20%;
                                   left: 33%;
                                   width: 30%;
                                   padding: 20px;
                                   display: none;
                                   border: 1px solid #000;
                                   background: #fff;
                                   text-align: left;
                                 }
                                 .statpopup_overlay{
                                   position: fixed;
                                   z-index: 9;
                                   top: 0;
                                   left: 0;
                                   width: 100%;
                                   height: 100%;
                                   display: none;
                                   background: #000000a3;
                                 }
                                 .popup_state_update{
                                   border: 1px solid #ccc;
                                    width: 100px;
                                    text-align: center;
                                    padding: 5px 0;
                                    cursor: pointer;
                                    background-color: #ccc;
                                 }
                               #popup_billing_state{
                                 padding: 5px;
                               }
                                 </style>
                                 <div class="statpopup_overlay"></div>
                                 <div class="statpopup">
                                   <p>
                                     <select name="popup_billing_state" id="popup_billing_state" class="state_select " data-placeholder="" autocomplete="address-level1"><option value="">Select a state…</option><option value="AP">Andhra Pradesh</option><option value="AR">Arunachal Pradesh</option><option value="AS">Assam</option><option value="BR">Bihar</option><option value="CT">Chhattisgarh</option><option value="GA">Goa</option><option value="GJ">Gujarat</option><option value="HR">Haryana</option><option value="HP">Himachal Pradesh</option><option value="JK">Jammu and Kashmir</option><option value="JH">Jharkhand</option><option value="KA">Karnataka</option><option value="KL">Kerala</option><option value="MP">Madhya Pradesh</option><option value="MH">Maharashtra</option><option value="MN">Manipur</option><option value="ML">Meghalaya</option><option value="MZ">Mizoram</option><option value="NL">Nagaland</option><option value="OR">Orissa</option><option value="PB">Punjab</option><option value="RJ">Rajasthan</option><option value="SK">Sikkim</option><option value="TN">Tamil Nadu</option><option value="TS">Telangana</option><option value="TR">Tripura</option><option value="UK">Uttarakhand</option><option value="UP">Uttar Pradesh</option><option value="WB">West Bengal</option><option value="AN">Andaman and Nicobar Islands</option><option value="CH">Chandigarh</option><option value="DN">Dadar and Nagar Haveli</option><option value="DD">Daman and Diu</option><option value="DL">Delhi</option><option value="LD">Lakshadeep</option><option value="PY">Pondicherry (Puducherry)</option></select>
                                   </p>
                                   <br/>
                                   <p><div class="popup_state_update" onclick="popup_state_update()">Update</div></p>
                                 </div>
                                 <script>
                                   function popup_state_update(){
                                     var state = jQuery('#popup_billing_state').val();
                                     if(state!=''){
                                       jQuery('#billing_state').val(state);
                                       jQuery('.statpopup').hide();
                                       jQuery('.statpopup_overlay').hide();
                                     }else{
                                       jQuery('#popup_billing_state').css('border','1px solid red');
                                     }
                                   }
                                 </script>
                                 <?php
                                  $currentUserId = get_current_user_id();
                                  // echo get_user_meta( $currentUserId, 'billing_state', true );

                                  if(trim(get_user_meta( $currentUserId, 'billing_state', true )) == ': Select State' && trim(get_user_meta( $currentUserId, 'billing_country', true )) != ''){
                                    ?>
                                      <script>
                                        setTimeout(function(){
                                          jQuery('.statpopup').show();
                                          jQuery('.statpopup_overlay').show();
                                        },2000);
                                      </script>
                                    <?php
                                  }
                                  ?>
                              <?php }?>
                            <?php //echo get_field('select_form_position',$productId); ?>
                            <?php if(get_field('select_form_position',$productId) == 'checkout'){ ?>
                            <li role="presentation" class="<?php echo $state;?>">
                                <a href="#step4" data-toggle="tab" aria-controls="step4" role="tab" title="Step 4">
                                    <span class="round-tab">
                                        2
                                    </span>
                                    <span class="text-tab-title">Other Details</span>
                                </a>
                            </li>
                          <?php } ?>
                            <li role="presentation" class="<?php if(get_field('select_form_position',$productId) == 'checkout'){ echo 'disabled'; } else { echo $state; }?>">
                                <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Step 2">
                                    <span class="round-tab">
                                        <?php if(get_field('select_form_position',$productId) == 'checkout'){
                                        echo '3';
                                      }else {
                                        echo '2';
                                      }  ?>

                                    </span>
                                    <span class="text-tab-title">Review Fees Amount</span>
                                </a>
                            </li>
                            <!--<li role="presentation" class="disabled">
                                <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Step 3">
                                    <span class="round-tab">
                                      <?php if(get_field('select_form_position',$productId) == 'checkout'){
                                      echo '4';
                                    }else {
                                      echo '3';
                                    }  ?>
                                    </span>
                                    <span class="text-tab-title">Select Payment Mode</span>
                                </a>
                            </li>-->
                             <!-- <li role="presentation" class="disabled">
                                <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Complete">
                                    <span class="round-tab">
                                        <i class="glyphicon glyphicon-ok"></i>
                                    </span>
                                    <span class="text-tab-title">Make Payment Success</span>
                                </a>
                            </li> -->
                        </ul>
                    </div>

                    <form role="form">
                        <div class="tab-content tab_contentdiv">
                            <div class="tab-pane <?php echo $display;?>" role="tabpanel" id="step1">
                                <div class="checkout_1">
                                <div class="col-md-4">
                                <div class="batch-Card col-courses-card">
                                    <?php
                                    $inst =  get_field('c_institute',$productId);
                                    ?>
                                    <div class="imgdiv" style="background-image: url(https://talentedge.in/wp-content/uploads/2017/12/popular-course-7-new.png);"></div>
                                    <div class="course_title">
                                    <h5><?php echo get_field('course_short_name',$productId);?></h5>
                                    <p><?php echo get_field('short_name',$inst);?></p>

                                    <?php
                        $cl_startdate2 = get_field('course_start_date', $productId, false, false);
                                //$date = new DateTime($cl_startdate);
                                $timevalue2 = strtotime($cl_startdate2);
                                $new_date2 = date('M Y', $timevalue2);
                                 if($productId!=35006){
                        ?>

                                    <p><?php echo $new_date2;?> Batch</p>
                                 <?php  } ?>
                                    </div>
                                    <div class="coursePeriod">
                                        <div class="months pad-bottom-10">
                                            <b>Duration</b>
                                        <?php
                                        $batch = get_field('duration',$productId);
                                        $duration_months = extract_numbers( $batch);
					$duration_months[0]=$duration_months[1]!=''?$duration_months[0].".".$duration_months[1]:$duration_months[0];
                                            ?>
                                               <span class="monthsOfCourse"><?=($productId==35006)? '2' : $duration_months[0];?></span>
                                             <p><?=($productId==35006)? 'Days' : 'Months';?></p>
                                        </div>
                                        <div class="startDate pad-bottom-10">
                                            <i class="fa icon-calendar"></i>
                                            <?php
                                             $new_date3 = date('jS M y', $timevalue2);
                                             ?>

                                              <span>Start - <?=($productId==35006)? '9 -10 Dec, 2017' : $new_date3;?></span>
                                        </div>
                                        <div class="timePeriod pad-bottom-10">
                                            <i class="fa icon-clock"></i>
                                            <div>
                                                <span><?php echo get_field('schedule_of_classes', $productId)?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                                <div class="col-md-8">

                                <?php if ( sizeof( $checkout->checkout_fields ) > 0 ) : ?>
							<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>

                                <?php if (empty($total_order_array)) { ?>
                                     <?php do_action( 'woocommerce_checkout_billing' ); ?>
                                <?php } ?>
                                <?php do_action( 'woocommerce_checkout_shipping' ); ?>
                                 <?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>
                                <?php endif; ?>

                                <?php if ( is_user_logged_in() ) { } else {?>
                                <div class="divider-or"><span>or</span></div>
                                <div class="checkout_login">
                                    <p>Already have an account? <a href="#checkout_popup">Login</a></p>
                                </div>
                                <?php } ?>
                                </div>

                                </div>
                                <ul class="list-inline pull-right">
                                    <li><button type="button" class="btn-normal next-step" id="validatebtn">Next</button></li>
                                </ul>
                            </div>
                            <?php if(get_field('select_form_position',$productId) == 'checkout'){ ?>
                            <div class="tab-pane <?php echo $state;?>" role="tabpanel" id="step4">
                                <div class="checkout_2">
                                  <h2>Form Here..</h2>
                                  <?php
                                    $formId = get_field('select_course_form',$productId);
                                    gravity_form($formId, false, false, false, '', false, '');
                                  ?>
                                  <ul class="list-inline pull-right">
                                      <?php if ($returntype==1){ ?>
                                      <li class=""><button type="button" class="btn-normal prev-step">Previous</button></li>
                                      <?php } ?>
                                      <li><button type="button" class="btn-normal next-step">Next</button></li>
                                  </ul>
                                </div>
                            </div>
                          <?php } ?>
                            <div class="tab-pane <?php if(get_field('select_form_position',$productId) != 'checkout'){ echo $state; } ?>" role="tabpanel" id="step2">
                                <div class="checkout_2">

                                <?php


                    $course_image = get_field('course_image', $productId);

                    echo '<div class="row"><div class="course_info"><div class="course_image col-md-3"><img class="img-responsive" src="'.$course_image.'"></div><div id="checkoutdiv">';


                    get_Installment_price3($productId,$stax);
                    echo '</div></div></div>';

                                ?>
                                </div>
                                <ul class="list-inline pull-right">
                                  <?php if(get_field('select_form_position',$productId) == 'checkout' || $returntype==1) { ?>
                                    <li class=""><button type="button" class="btn-normal prev-step">Previous</button></li>
                                    <?php } ?>
                                    <li>
                                      <!--<button type="button" class="btn-normal next-step">Next</button>-->
                                      <?php do_action( 'woocommerce_checkout_order_review' ); ?>
                                    </li>
                                </ul>

	<style>
	#idfc-coupon-popup,#jet-coupon-popup{
		position: fixed;
		z-index: 99999999;
		top: 200px;
		left: 30%;
	}
	</style>
        <div id="jet-coupon-popup" style="display:none;">
                                   <button type="button" class="btn btn-info btn-lg jetpopup" data-toggle="modal" data-target="#privilege_member">Open Modal</button>
                                   <!-- Modal -->
                                  <div id="privilege_member" class="modal fade" role="dialog">
                                    <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                      <button type="button" class="close" data-dismiss="modal"></button>
                                      <div class="privilege_member_inner-container">
                                      <div class="privilege_member_inner_top">
                                        <h1>Dear <span class="billing_first_name_span"></span></h1>
										<?php if(isset($_COOKIE['jetcoupon']) === true) { ?>
										<p>Your JetPrivilege Membership account would be credited with JPMiles after 45 days.<p>
										 <?php } else { ?>
                                        <p>Please enter your JetPrivilege Membership Number to avail this offer*</p>
										 <?php } ?>
                                        <form id="privilege_form">
										<?php if(isset($_COOKIE['jetcoupon']) === true) { ?>
                                            <div class="privilege_popup_form">

                                          <div class="privilege_popup_form_input col-xs-12">
                                          <input type="text" value="" name="jet_code" id="jetcouponcode" class="jet_code" placeholder="JetPrivilege Membership Number">
                                          </div>
                                        </div>
										<div class="privilege_popup_form_input col-xs-6">
										<button type="button"  id="privilege_form_btn" class="continue_btn">Confirm</button>
										</div>
										<div class="privilege_popup_form_input col-xs-6">
										<button type="button" data-dismiss="modal" class="continue_btn">Cancel</button>
										</div>
                                         <?PHP } else { ?>
										 <div class="privilege_popup_form">

                                          <div class="privilege_popup_form_input col-xs-12">
                                          <input type="text" value=""  name="jet_code" id="jetcouponcode" class="jet_code" placeholder="JetPrivilege Membership Number">
                                          </div>
                                        </div>
                                        <button type="button" id="privilege_form_btn" class="continue_btn">Continue</button>
                                          <?php } ?>

                                        </form>
                                        <div class="terms">*Terms and Conditions Apply</div>
                                      </div>
                                      <div class="clearfix"></div>
                                      <div class="privilege_member_inner_bottom">
                                        <div class="col-xs-6">
                                        <img src="<?php echo bloginfo('stylesheet_directory'); ?>/images/jet-privilege.gif" alt="Jet Privilege" class="img-responsive">
                                        </div>
                                        <div class="col-xs-6">
                                        <img src="<?php echo bloginfo('stylesheet_directory'); ?>/images/t-edge-logo.gif" alt="Talentedge" class="img-responsive">
                                        </div>
                                      </div>
                                      </div>
                                    </div>

                                    </div>
                                  </div>
                                </div>
								<div id="idfc-coupon-popup" style="display:none;">
								 <!-- Modal -->
								 <button type="button" class="btn btn-info btn-lg idfcpopup" data-toggle="modal" data-target="#payment_gateway">Open Modal</button>
									<div id="payment_gateway" class="modal fade" role="dialog">
									  <div class="modal-dialog">

										<!-- Modal content-->
										<div class="modal-content">
											<button type="button" class="close" data-dismiss="modal"></button>
										  <div class="payment_gateway_inner-container">
											<div class="payment_gateway_inner-container_top">
											  <p><span class="billing_first_name_span"></span>, you would now be taken to payment gateway. Keep your IDFC Debit card ready to check 10% fee waiver eligibility</p>
											  <div class="payment_confirmation_btn_cont">
												<div class="col-md-6 col-sm-6 col-xs-12">
													<?php do_action( 'woocommerce_checkout_order_review' ); ?>
												  <!--<button class="continue_btn">CONTINUE</button>-->
												  <?php //do_action( 'woocommerce_checkout_before_order_review' ); ?>
													<!--<div id="order_review" class="woocommerce-checkout-review-order">
														<?php //do_action( 'woocommerce_checkout_order_review' ); ?>
													</div>-->
													<?php //do_action( 'woocommerce_checkout_after_order_review' ); ?>
												</div>
												<div class="col-md-6 col-sm-6 col-xs-12">
												  <button type="button" class="cancel_btn" data-dismiss="modal">CANCEL</button>
												</div>
											  </div>
											</div>
											<div class="clearfix"></div>
											<div class="privilege_member_inner_bottom">
											  <div class="col-xs-5">
												<img src="<?php echo bloginfo('stylesheet_directory'); ?>/images/idfc-bank.gif" alt="Jet Privilege" class="img-responsive img-right">
											  </div>
											  <div class="col-xs-7">
												<img src="<?php echo bloginfo('stylesheet_directory'); ?>/images/t-edge-logo.gif" alt="Talentedge" class="img-responsive">
											  </div>
											</div>
										  </div>
										  </div>
										</div>
									  </div>


								</div>

                            </div>
            <div class="tab-pane" role="tabpanel" id="step3">
                <div class="checkout_3">


                <div id="paymentoptions">
                        <div class="payment_options">

                        <div class="row c_inr">
                            <div class="payment_header">
                            <h4>Chose any of the following payment modes : </h4>
                            </div>
                            <div class="col-md-12 col-centered">
                                <div class="paymentoptions">
                                    <div class="cards">
                                    <?php
                                    $k=1;
                                    // check if the repeater field has rows of data
                                    //print_r(have_rows('cards','option'));
                                    if( have_rows('cards','option') ):

                                        // loop through the rows of data
                                        while ( have_rows('cards','option') ) : the_row();

                                        //print_r(the_row());
                                        ?>
                                        <div id="carddiv" class="col-md-3 active_<?php echo $k;?>">

                                            <div  class="card" onclick="GetCardName('<?php echo get_sub_field('name');?>')">
                                                <h5><?php echo get_sub_field('name');?></h5>
                                                <img src="<?php echo get_sub_field('logo');?>" class="img-responsive"/>
                                                <input type="hidden" value="<?php echo get_sub_field('select_payment');?>" class="ptype"/>

                                            </div>
                                        </div>
                                        <?php
                                        $k++;
                                        endwhile;
                                    endif;
                                    ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row c_inr">
                            <div class="col-md-12 col-centered">
                                <div class="paymentoptions">
                                    <div class="cards">
                                    <?php
                                    // check if the repeater field has rows of data
                                    if( have_rows('other_options','option') ):

                                        // loop through the rows of data
                                        while ( have_rows('other_options','option') ) : the_row();

                                            //print_r(the_row());
                                        ?>
                                        <div class="col-md-3">

                                            <div class="card" onclick="GetCardName('<?php echo get_sub_field('name');?>')">
                                                <h5><?php echo get_sub_field('name');?></h5>
                                                <img src="<?php echo get_sub_field('logo');?>" class="img-responsive"/>
                                                <input type="hidden" value="<?php echo get_sub_field('select_payment');?>" class="ptype"/>

                                            </div>
                                        </div>
                                        <?php

                                        endwhile;
                                    endif;
                                    ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row row-centered c_usd">
                                <div class="col-md-12 col-centered">
                                    <div class="paymentoptions">
                                        <div class="col-md-5 col-centered">
                                            <div class="card active">
                                                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/international.jpg" class="img-responsive">
                                                <input type="hidden" value="payu_in" class="ptype">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>

                        </div>
                    </div>
                    <?php do_action( 'woocommerce_checkout_before_order_review' ); ?>
                <div id="order_review" class="woocommerce-checkout-review-order">
                    <?php do_action( 'woocommerce_checkout_order_review' ); ?>
                </div>


                                <?php do_action( 'woocommerce_checkout_after_order_review' ); ?>

                                </div>
                                <ul class="list-inline step3div">
                                    <li><button type="button" class="btn-normal prev-step">Previous</button></li>
                                     <!--<?php if ($returntype==1){ ?>-->
                                   <!-- <li class="none"><button type="button" class="btn-normal btn-info-full next-step">Proceed to Payment</button></li>
                                    <?php } ?>
                                    -->
                                </ul>
                            </div>
                            <!-- <div class="tab-pane" role="tabpanel" id="complete">
                                <h3>Complete</h3>
                                <p>You have successfully completed all steps.</p>
                            </div> -->
                            <div class="clearfix"></div>
                        </div>
                    </form>
                </div>
            </section>
			<div class="step_imgloader" style="display:none;position: absolute;top: 40%;left: 50%;">
				<img src="<?php echo bloginfo('stylesheet_directory'); ?>/assets/images/ajax-loading.gif" />
			</div>
</form>
</div>
<?php
$userId = get_current_user_id();
$ref = get_user_meta($userId, "referred_by");
if ( is_user_logged_in() ) {
 ?>
 <script>
     jQuery('#referralID_field').hide();

 </script>
 <?php
}

?>
<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>
<script>
jQuery('#billing_email_field').append('<p class="countrytext">Email ID will be used as your User ID</p>');
jQuery('#billing_country_field').append('<?=($productId!=35006)? '<p class="countrytext">All the Study Material Will be sent to this location.</p>' : '' ?>');

</script>
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/checkout.js?date=16-01-2018"></script>

<?php
	if(get_user_meta(get_current_user_id(),'billing_state',true)=='' && is_user_logged_in()){ ?>

		<div id="my-modal" class="modal fade in">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Update State to checkout</h4>
					</div>
					<div class="modal-body">
					   <select name="billing_billing_state" id="billing_billing_stateuser" class="select " data-allow_clear="true" data-placeholder="Enter state">
											<option value="" selected="selected">--Select State--</option><option value="AP">Andhra Pradesh</option><option value="AR">Arunachal Pradesh</option><option value="AS">Assam</option><option value="BR">Bihar</option><option value="CT">Chhattisgarh</option><option value="GA">Goa</option><option value="GJ">Gujarat</option><option value="HR">Haryana</option><option value="HP">Himachal Pradesh</option><option value="JK">Jammu &amp; Kashmir</option><option value="JH">Jharkhand</option><option value="KA">Karnataka</option><option value="KL">Kerala</option><option value="MP">Madhya Pradesh</option><option value="MH">Maharashtra</option><option value="MN">Manipur</option><option value="ML">Meghalaya</option><option value="MZ">Mizoram</option><option value="NL">Nagaland</option><option value="OR">Odisha</option><option value="PB">Punjab</option><option value="RJ">Rajasthan</option><option value="SK">Sikkim</option><option value="TN">Tamil Nadu</option><option value="TR">Tripura</option><option value="UK">Uttarakhand</option><option value="UP">Uttar Pradesh</option><option value="WB">West Bengal</option><option value="AN">Andaman &amp; Nicobar</option><option value="CH">Chandigarh</option><option value="DN">Dadra and Nagar Haveli</option><option value="DD">Daman &amp; Diu</option><option value="DL">Delhi</option><option value="LD">Lakshadweep</option><option value="PY">Puducherry</option>
										</select>
						 <small class="errdiv" style="display:none">Please select state </small>
					</div>
					<div class="modal-footer">
						  <button type="button" class="btn btn-default updateuserstate" >Update</button>
					</div>
				</div>
			</div>
		</div>
		<div class="modal-backdrop fade in"></div>
		<style>.modal {
			display:block;
		}</style>


		<script>
		$(document).ready(function () {
			//$('#stateModal').attr('style','opacity: 1; top: 29%; position: fixed; left: 5%; display: block; height: 300px; padding-right: 15px;');
			//$('body').append('<div class="modal-backdrop fade in"></div>');
		$('#stateModal').modal('show');

			$('.updateuserstate').on('click',function(){

				if($('#billing_billing_stateuser').val()==''){
					$('.errdiv').show(); return false;
				}

			})

		});


		</script>
<?php }

set_transient('IDFCStatus',0, 600*60);
 ?>
<script type='text/javascript' src='//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js'></script>
<link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">

                <script>
                     function GetCardName(name){

                         if(name=='10% Off on Debit Cards')
                         {

                            <?php

                            $idfc_log    = get_user_meta($userId, 'idfc_log', true);
                            $idfc_status = getIDFCLog($userId, $productId, $idfc_log);
                            if ($idfc_status != 1)
                            {
                                ?>
                                toastr.options = { "closeButton": true,  "positionClass": "toast-top-center", "preventDuplicates": true}
                                toastr["error"]("Sorry, you are ineligible for this offer. This offer is valid only for first time customers.");
                            <?php }

                            ?>
                             //alert('<?=$idfc_status?>');
                         }
                        //alert(name);

                          $.ajax({
                           async: false,
                           type: "POST",
                           data: {
                               cardname:name,
                               action: 'set_card_name'
                               },
                                dataType: "text",
                                url: ajaxurl,
                                success: function(data) {
                                   console.log(data);
                                }
                            });
                    }


                    </script>
                    <?php if(!is_user_logged_in()){ ?>
                    <!--Change-Password-Popup-->
                    <div id="open_pass_popup" data-toggle="modal" data-target="#up_change_pass" style="display:none;">Sign In</div>
                    <div id="up_change_pass" class="modal fade" role="dialog" style="display:none;">
                      <div class="modal-dialog up_change_pass_modal">
                        <div class="modal-content">
                          <button type="button" class="up_change_passclose" data-dismiss="modal"></button>
                          <div class="up_change_pass_popup_inner">
                            <div class="col-md-7 col-sm-12 col-md-offset-5">
                              <h2 class="up_change_pass_mar_top80">It seems your account already exists.  Your new password has been emailed to your inbox</h2>
                              <!--<h2 id="up_useremail_id" class="up_change_pass_mar_btm30 up_change_pass_blue-head"></h2>-->
                              <h2 class="up_change_pass_mar_btm30">Enter password to continue</h2>
                              <form action="" method="post" id="up_userpass_form" name="up_userpass_form">
                                <div class="up_change_pass_popup_form">
                                  <div class="up_change_pass_popup_form_input col-xs-12 no-padding-left">
                                    <input type="password" value="" class="up_userpass" placeholder="Enter New Password Here" />
                                    <span class="pass_error">You have entered wrong password</span>
                                  </div>
                                  <input type="hidden" class="up_useremail" value="" />
                                </div>
                                <button type="button" id="up_userpass_form_submit" class="btn btn-change_blue_pass">Continue <i class="fa fa-chevron-right"></i></button>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!--End-Change-Password-Popup-->
                    <?php } ?>
                    <!--Assessment-Eligibility-Popup-->
                    <div id="open_assess_popup" data-toggle="modal" data-target="#assess_eligibilty_pop" style="display:none;">Assesment Popup</div>
                    <div id="assess_eligibilty_pop" class="modal fade" role="dialog" style="display:none;">
                      <div class="modal-dialog up_change_pass_modal">
                        <div class="modal-content">
                          <button type="button" class="up_change_passclose" data-dismiss="modal"></button>
                          <div class="assess_eligibilty_pop_inner">
                            <div class="col-md-7 col-sm-12 col-md-offset-5">
                              <h2 class="assess_eligibilty_mar_top80"><span id="assess_username"></span>, You need to take an eligibility assessment before enrolling in this course</h2>
                              <h2 class="assess_eligibilty_mar30">Click <span>OK</span> to go to the assessment.</h2>
                              <div class="col-md-4 col-xs-6 no-padding-left">
                                <a href="<?php echo site_url(); ?>/babd-login"><button type="button" id="" class="btn btn-assess_blue_confirm">ok</button></a>
                              </div>
                              <div class="col-md-8 col-xs-6">
                                <a href="<?php echo site_url(); ?>"><button type="button" id="" class="btn btn-assess_gray_reject">later</button></a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!--Assessment-Eligibility-Popup-->
                    <!--Assessment-Eligibility-Complete-Popup-->
                    <div id="open_assess_done_popup" data-toggle="modal" data-target="#assess_eligibilty_complete_pop" style="display:none;">Assesment done</div>
                    <div id="assess_eligibilty_complete_pop" class="modal fade" role="dialog" style="display:none;">
                      <div class="modal-dialog up_change_pass_modal">
                        <div class="modal-content">
                          <button type="button" class="up_change_passclose" data-dismiss="modal"></button>
                          <div class="assess_eligibilty_complete_pop_inner">
                            <div class="col-md-8 col-sm-12 col-md-offset-4">
                              <h2 class="assess_eligibilty_complete_head_mar60">
                                Your assessment is complete, our
                                counsellors will get in touch with you
                                for further steps or you may reach out to them on:
                              </h2>
                              <div class="clearfix"></div>
                              <div class="col-md-1 col-xs-2 no-padding-left">
                                <img src="<?php echo bloginfo('stylesheet_directory');?>/assets/images/assment-complete-call-icn.png">
                              </div>
                              <div class="col-md-11 col-xs-10 assment-complete-call">
                                8376000600
                              </div>
                              <div class="clearfix"></div>
                              <div class="col-md-1 col-xs-2 no-padding-left assment-complete-mail-mar-top10">
                                <img src="<?php echo bloginfo('stylesheet_directory');?>/assets/images/assment-complete-mail-icn.png">
                              </div>
                              <div class="col-md-11 col-xs-10 assment-complete-mail">
                                <a href="mailto:enquiry.dtd@talentedge.in">enquiry.dtd@talentedge.in</a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!--Assessment-Eligibility-Complete-Popup-->
