<?php
/**
 * Customer invoice email
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/customer-invoice.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates/Emails
 * @version     2.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * @hooked WC_Emails::email_header() Output the email header
 */
do_action( 'woocommerce_email_header', $email_heading, $email ); 

$user_id=get_post_meta($order->id,'_customer_user',true);
$items = $order->get_items();
foreach ( $items as $item ) {
	 $product_id = $item['product_id'];
	 $product_name = $item['name'];
}
$institute=get_post_meta($product_id,'c_institute',true)	;
 
$instObj=get_post($institute);
$nameUsr= get_post_meta($order->id,'_billing_first_name',true);

?>

Hi <?php  echo $nameUsr ?><br><br>
 
Congratulations for enrolling in  <?php  echo $product_name ?> from  <?php  echo $instObj->post_title ?>. We acknowledge your payment for the course.<br>
<br>Please find attached invoice for the course fees.  Reach back to us if you find any discrepancy in the invoice.<br><br>
 
Each student at Talentedge is assigned a student relationship manager. One of our SRMs would reach out to you for more details about the classes, fees instalments at an appropriate time.
 <br>
 
<?php if ( $order->has_status( 'pending' ) ) : ?>
	<p><?php printf( __( 'An order has been created for you on %s. To pay for this order please use the following link: %s', 'woocommerce' ), get_bloginfo( 'name', 'display' ), '<a href="' . esc_url( $order->get_checkout_payment_url() ) . '">' . __( 'pay', 'woocommerce' ) . '</a>' ); ?></p>
<?php endif;  ?>


<?php  do_action( 'woocommerce_email_footer', $email ); ?>

