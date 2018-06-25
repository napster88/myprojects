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
<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/css/checkout.css" rel="stylesheet">
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
                                 $returntype = 2;
                                }?>

                            <li role="presentation" class="<?php echo $state;?>">
                                <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Step 2">
                                    <span class="round-tab">
                                        2
                                    </span>
                                    <span class="text-tab-title">Review Fees Amount</span>
                                </a>
                            </li>
                            <li role="presentation" class="disabled">
                                <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Step 3">
                                    <span class="round-tab">
                                       3
                                    </span>
                                    <span class="text-tab-title">Select Payment Mode</span>
                                </a>
                            </li>
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
                                    <div class="imgdiv" style="background-image: url(http://wordpress.stunnerweb.in/talentedgeqa/wp-content/uploads/2016/07/popular-course-7.png);"></div>
                                    <div class="course_title">
                                    <h5><?php echo get_field('course_short_name',$productId);?></h5>
                                    <p><?php echo get_field('short_name',$inst);?></p>
                                    
                                    <?php
                        $cl_startdate2 = get_field('course_start_date', $productId, false, false);
                                //$date = new DateTime($cl_startdate);
                                $timevalue2 = strtotime($cl_startdate2); 
                                $new_date2 = date('M Y', $timevalue2);
                        ?>

                                    <p><?php echo $new_date2;?> Batch</p>
                                    </div>
                                    <div class="coursePeriod">
                                        <div class="months pad-bottom-10">
                                            <b>Duration</b>
                                        <?php 
                                        $batch = get_field('duration',$productId);
                                        $duration_months = extract_numbers( $batch);
                                            ?>
                                            <span class="monthsOfCourse"><?php echo $duration_months[0];?></span>
                                            <p>Months</p>
                                        </div>
                                        <div class="startDate pad-bottom-10">
                                            <i class="fa icon-calendar"></i>
                                            <?php 
                                             $new_date3 = date('jS M y', $timevalue2);
                                             ?>

                                            <span>Start - <?php echo $new_date3; ?></span>
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
                            <div class="tab-pane <?php echo $state;?>" role="tabpanel" id="step2">
                                <div class="checkout_2">
                                
                                <?php

                                       
                    $course_image = get_field('course_image', $productId);

                    echo '<div class="row"><div class="course_info"><div class="course_image col-md-3"><img class="img-responsive" src="'.$course_image.'"></div><div id="checkoutdiv">';


                    get_Installment_price3($productId);
                    echo '</div></div></div>';

                                ?>
                                </div>
                                <ul class="list-inline pull-right">
                                    <?php if ($returntype==1){ ?>
                                    <li class=""><button type="button" class="btn-normal prev-step">Previous</button></li>
                                    <?php } ?>
                                    <li><button type="button" class="btn-normal next-step">Next</button></li>
                                </ul>
                            </div>
            <div class="tab-pane" role="tabpanel" id="step3">
                <div class="checkout_3">
                               
                
                <div id="paymentoptions">
                        <div class="payment_options">
                       
                        <div class="row c_inr">
                            <div class="payment_header">
                            <h4>Chose any of the following payment mode</h4>
                            </div>
                            <div class="col-md-12 col-centered">
                                <div class="paymentoptions">
                                    <div class="cards">
                                    <?php
                                    $k=1;
                                    // check if the repeater field has rows of data
                                    if( have_rows('cards','option') ):

                                        // loop through the rows of data
                                        while ( have_rows('cards','option') ) : the_row();
                                        ?>
                                        <div id="carddiv" class="col-md-3 active_<?php echo $k;?>">
                                            <div  class="card">
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

                                        ?>
                                        <div class="col-md-3">
                                            <div class="card">
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
jQuery('#billing_country_field').append('<p class="countrytext">All the Study Material Will be sent to this location.</p>');

</script>
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/checkout.js"></script>