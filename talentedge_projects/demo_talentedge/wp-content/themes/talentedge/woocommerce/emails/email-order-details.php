<?php
/**
 * Order details table shown in emails.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/email-order-details.php.
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

$stateArray= unserialize( WP_STATES);

do_action( 'woocommerce_email_before_order_table', $order, $sent_to_admin, $plain_text, $email ); 

$items = $order->get_items();
$state=get_post_meta($order->id,'_billing_state',true);
$billingCountry=get_post_meta($order->id,'_billing_country',true);
$_customer_user=get_post_meta($order->id,'_customer_user',true);


$type=get_post_meta($order->id,'payment_type',true);
$_order_currency	=get_post_meta($order->id,'_order_currency',true);
if($_order_currency=='INR') $_order_currency='Rs. ';

foreach ( $items as $item ) {
    $product_name = $item['name'];
    $product_id = $item['product_id'];
    $product_variation_id = $item['variation_id'];
    $total=$item['line_total'];    
    $tax=$item['line_tax'];
    $net=$item['line_total'] + $item['line_tax'];
}

$_product = wc_get_product( $product_id );

$invType=get_transient('invocetype');
if($invType==1){
	 $total=$_product->get_price();
	 $tax=0;	
	 $net=$total;
}



 set_transient('rectype','0');
if($billingCountry=='IN'){
	$taxlbl=getTaxStatus($product_id,$_customer_user);
	set_transient('rectype',$taxlbl);
	if($taxlbl=='stax'){
			$cgdiv=$igdiv=$sgdiv=$ugdiv='display:none!important;visiblity:hidden!important;'; 
			$tax= ($invType==1) ? $total * 15 / 100 :$tax  ;
			$cgst='';
			$sgst='';
			$igst='';
			if($invType==1) $net=$total+$tax;
			
	}elseif($taxlbl=='cgst'){
			$sdiv=$igdiv='display:none!important;visiblity:hidden!important;';
			$cgst=($invType==1) ? $total * CGST / 100 : $tax/2;
			$sgst=($invType==1)? $total * SGST / 100: $tax/2;
			$igst='';
			$tax='';
			if($invType==1) $net=$total+$cgst + $sgst;
				
	}else{
		$sdiv=$cgdiv=$sgdiv='display:none!important;visiblity:hidden!important;'; 
			$cgst='';
			$sgst='';
			$igst=($invType==1)? $total * GST / 100 : $tax;
			$tax='';
			if($invType==1) $net=$total+$igst;

	}
							

}else{
	$cgdiv=$igdiv=$sgdiv=$ugdiv='display:none!important;visiblity:hidden!important;';
	
} 



//echo $sdiv;die;
?>


<div style="overflow: hidden!important;    display: block!important;" class="container default-bg">
            
            		<div class="row">
                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 mart25">
                    
                   	
                                        <div class="table-responsive">
                        		
                                
                                <table class=" table-bordered table-hover table-striped tablex" width="100%" border="0" style=" font-family: Oswald, sans-serif;border:none !important;width: 97%;!important">
                                  <tbody>
                                    
                                    <tr>
                                      
                                      <td class=" custom_td" style="border:1px solid #234795; padding-left:15px;  font-family: Oswald, sans-serif;"> Sr no.</td>
                                      <td class=" custom_td" style="border:1px solid #234795; padding-left:22px; font-family: Oswald, sans-serif;"> Description of Course </td>
                                      
                                       <td   class=" custom_td" style="border:1px solid #234795; padding-left:15px; min-width:100px; font-family: Oswald, sans-serif;<?php if($invType==1) { echo 'visible:hidden!important;display:none!important;'; }  ?>">
                                      Installment </td>
                                      
                                      <td class=" custom_td" style="border:1px solid #234795; padding-left:15px; min-width:100px; font-family: Oswald, sans-serif;">
                                      Course Amount</td>
                                      <td class=" custom_td" style="border:1px solid #234795; padding-left:15px;min-width:140px; font-family: Oswald, sans-serif;">
                                      Discount</td>
                                      <td class=" custom_td" style="border:1px solid #234795; padding-left:15px;min-width: 185px; font-family: Oswald, sans-serif;">
                                    Taxable Value</td>
                                      
                                    </tr>
                                    
                                    <tr class="paddl" style="background:#ebebeb!important;">
                                       <td valign="top" style="text-align:left;min-width: 65px;padding:13px 15px;border: 1px solid #ddd;!important;">01</td>
                                      <td style="padding:13px 18px;border: 1px solid #ddd;!important;"><?php echo $product_name ?></td>
                                      <td valign="top" style="<?php if($invType==1) { echo 'visible:hidden!important;display:none!important;'; }  ?>text-align:left;min-width: 100px;padding:13px 15px;border: 1px solid #ddd;!important;"><?php echo $type ?></td>
                                      <td valign="top" style="text-align:left;min-width: 100px;padding:13px 15px;border: 1px solid #ddd;!important;"><?php echo $_order_currency ?> <?php echo $total?></td>
                                       <td valign="top" style="text-align:left;min-width: 110px;padding:13px 15px;border: 1px solid #ddd;!important;">-</td>
                                        <td valign="top" style="text-align:left;min-width: 114px;padding:13px 15px;border: 1px solid #ddd;!important;"><?php echo $_order_currency ?> <?php echo $total?></td>
                                    </tr>
                                     <tr class="paddl" style="background:#ebebeb!important; <?php echo $cgdiv ?>  ">
                                       <td valign="top" style="text-align:left;min-width: 65px;padding:6px 15px;border: 1px solid #ddd;!important;"></td>
                                      <td style="padding:6px 18px;border: 1px solid #ddd;!important;"></td>
                                      <td valign="top" style="<?php if($invType==1) { echo 'visible:hidden!important;display:none!important;'; }  ?>text-align:left;min-width: 100px;padding:6px 15px;border: 1px solid #ddd;!important;"></td>
                                      <td valign="top" style="text-align:left;min-width: 100px;padding:6px 15px;border: 1px solid #ddd;!important;">CGST</td>
                                       <td valign="top" style="text-align:left;min-width: 110px;padding:6px 15px;border: 1px solid #ddd;!important;">9%</td>
                                        <td valign="top" style="text-align:left;min-width: 114px;padding:6px 15px;border: 1px solid #ddd;!important;"><?php echo ( $cgst) ? $_order_currency .  $cgst : ''?>  </td>
                                    </tr>
                                      <tr class="paddl" style="background:#ebebeb!important; <?php echo $sgdiv ?>   ">
                                       <td valign="top" style="text-align:left;min-width: 65px;padding:6px 15px;border: 1px solid #ddd;!important;"></td>
                                      <td style="padding:6px 18px;"></td>
                                      <td valign="top" style="<?php if($invType==1) { echo 'visible:hidden!important;display:none!important;'; }  ?>text-align:left;min-width: 100px;padding:6px 15px;border: 1px solid #ddd;!important;"></td>
                                      <td valign="top" style="text-align:left;min-width: 100px;padding:6px 15px;border: 1px solid #ddd;!important;">SGST</td>
                                       <td valign="top" style="text-align:left;min-width: 110px;padding:6px 15px;border: 1px solid #ddd;!important;">9%</td>
                                        <td valign="top" style="text-align:left;min-width: 114px;padding:6px 15px;border: 1px solid #ddd;!important;"><?php echo ( $sgst) ? $_order_currency .  $sgst : ''?>  </td>
                                    </tr>
                                      <tr class="paddl" style="background:#ebebeb!important;  <?php echo $igdiv ?>   ">
                                       <td valign="top" style="text-align:left;min-width: 65px;padding:6px 15px;border: 1px solid #ddd;!important;"></td>
                                      <td style="padding:6px 18px;border: 1px solid #ddd;!important;"></td>
                                      <td valign="top" style="<?php if($invType==1) { echo 'visible:hidden!important;display:none!important;'; }  ?>text-align:left;min-width: 100px;padding:6px 15px;border: 1px solid #ddd;!important;"></td>
                                      <td valign="top" style="text-align:left;min-width: 100px;padding:6px 15px;border: 1px solid #ddd;!important;">IGST</td>
                                       <td valign="top" style="text-align:left;min-width: 110px;padding:6px 15px;border: 1px solid #ddd;!important;">18%</td>
                                        <td valign="top" style="text-align:left;min-width: 114px;padding:6px 15px;border: 1px solid #ddd;!important;"><?php echo ( $igst)? $_order_currency .  $igst : '' ?> </td>
                                    </tr>
                                      <tr class="paddl" style="background:#ebebeb!important;    <?php  echo $sdiv; ?> ">
                                       <td valign="top" style="text-align:left;min-width: 65px;padding:6px 15px;border: 1px solid #ddd;!important;"></td>
                                      <td style="padding:6px 18px;border: 1px solid #ddd;!important;"></td>
                                      <td valign="top" style="<?php if($invType==1) { echo 'visible:hidden!important;display:none!important;'; }  ?>text-align:left;min-width: 100px;padding:6px 15px;border: 1px solid #ddd;!important;"></td>
                                      <td valign="top" style="text-align:left;min-width: 100px;padding:6px 15px;border: 1px solid #ddd;!important;">Service Tax</td>
                                       <td valign="top" style="text-align:left;min-width: 110px;padding:6px 15px;border: 1px solid #ddd;!important;"> 15% </td>
                                        <td valign="top" style="text-align:left;min-width: 114px;padding:6px 15px;border: 1px solid #ddd;!important;"> <?php echo ( $tax)? $_order_currency .  $tax  :'' ?> </td>
                                    </tr>
                                    
                                      <tr class="paddl" style="background:#ebebeb!important;">
                                       <td class="custom_td1" valign="top" style="border: 1px solid #ddd;!important;text-align:left;min-width: 65px;padding:6px 15px;border: 1px solid #ddd;!important;"></td>
                                      <td class="custom_td1" style="padding:6px 18px;border: 1px solid #ddd;!important;"></td>
                                      <td class="custom_td1" valign="top" style="<?php if($invType==1) { echo 'visible:hidden!important;display:none!important;'; }  ?>border: 1px solid #ddd;!important;text-align:left;min-width: 100px;padding:6px 15px;border: 1px solid #ddd;!important;"></td>
                                      <td class="custom_td1" valign="top" style="border: 1px solid #ddd;!important;text-align:left;min-width: 100px;padding:6px 15px;border: 1px solid #ddd;!important;"><strong>Total</strong></td>
                                       <td class="custom_td1" valign="top" style="border: 1px solid #ddd;!important;text-align:left;min-width: 110px;padding:6px 15px;border: 1px solid #ddd;!important;"></td>
                                        <td class="custom_td2" valign="top" style="border: 1px solid #ddd;!important;text-align:left;min-width: 114px;padding:6px 15px;border: 1px solid #ddd;!important;"><strong><?php echo $_order_currency ?> <?php echo $net  ?></strong></td>
                                    </tr>
                                     <tr class="paddl" style="background:#ebebeb;border:none !important;">
                                       <td valign="top" style="text-align:left;min-width: 65px;padding:6px 15px;border:none !important;"></td>
                                      <td style="padding:6px 18px;border:none !important;"></td>
                                      <td valign="top" style="<?php if($invType==1) { echo 'visible:hidden!important;display:none!important;'; }  ?>text-align:left;min-width: 100px;padding:6px 15px;border:none !important;"></td>
                                      <td valign="top" style="text-align:left;min-width: 100px;padding:6px 15px;border:none !important;"></td>
                                       <td valign="top" style="text-align:left;min-width: 110px;padding:6px 15px;border:none !important;"></td>
                                        <td valign="top" style="text-align:left;min-width: 114px;padding:6px 15px;border:none !important;">E. &amp; O. E.</td>
                                    </tr>
                                     
                                  </tbody>
                                 </table>
                                  <table>
                                  <tbody>
                                   </tbody></table>
                                    </div>
                                        </div>
								  </div>
                                 </div>


  
 <div class="container default-bg  table_padding mart30">
            <div class="row">
            <div class="col-lg-12 padp">
            		 <p><strong style="font-size:15px;line-height:16px;">Total Invoice Value (In Words) - </strong><?php echo  ucwords(numberTowords($net)) ?> Only</p>
                                    <p><strong style="font-size:15px;line-height:16px;">Amount of Tax subject to Reverse Charge :</strong> No</p>
                                    
            </div></div>
            </div> 
  
<?php do_action( 'woocommerce_email_after_order_table', $order, $sent_to_admin, $plain_text, $email ); ?>
