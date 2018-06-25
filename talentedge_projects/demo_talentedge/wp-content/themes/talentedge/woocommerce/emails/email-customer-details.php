<?php
/**
 * Additional Customer Details
 *
 * This is extra customer data which can be filtered by plugins. It outputs below the order item table.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/email-customer-details.php.
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
$id=get_transient('myorder');
$invType=get_transient('invocetype');
$orderID=$id->id;
$_customer_user=get_post_meta($orderID,'_customer_user',true);
$_invno=get_post_meta($orderID,'_bewpi_formatted_invoice_number',true);
$items = $id->get_items();
foreach ( $items as $item ) {
	 $product_id = $item['product_id'];
}	

$batchCode=get_post_meta( $product_id,'batch_name',true);
 
$date=$id->order_date;
$name= get_post_meta($orderID,'_billing_first_name',true) . ' ' . get_post_meta($orderID,'_billing_last_name',true);
$billingCountry=get_post_meta($orderID,'_billing_country',true);
 
$state=get_post_meta($orderID,'_billing_state',true);
$paymmode=get_post_meta($orderID,'_payment_method_title',true);
$tid=get_post_meta($orderID,'_order_txnid',true);
$address= $stateArray[$state]['name'] . $billingCountry;
$code=$stateArray[$state]['code'];
?>



<div style="overflow: hidden!important;    display: block!important;" class="container invoice default-bg pad20">
            
            		
                    <div class=" row">
                    <div class="col-lg-4 col-sm-12 col-md-4 col-xs-12 ">
                            <div class=""><p align="left" style="font-family: Oswald, sans-serif; padding:5px;font-size:25px;"><?php echo ($invType==1)?'Tax Invoice' : 'Receipt' ?></p></div>
                            
                            <p align="left" style="font-family: Oswald, sans-serif; padding:5px;font-size:15px;"><?php echo ($invType==1)?'ORIGINAL FOR RECIPIENT' : '' ?></p>
                            </div>
                             <div class="col-lg-8 col-sm-12 col-md-8 col-xs-12 invoice2">
                            <div> <p>  <?php echo ($invType==1)? 'Serial No. of Invoice' : 'Receipt No.'?> <?php echo ($invType == 1)? $_invno : $orderID ?> </p>
                                    <p>Date of Receipt : <?php echo date('d/m/Y',strtotime($date)) ?></p></div>
                            </div></div>
                            <div class=" row">
                     <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 mar30">
                    
                   
                    		</div>
                            <div class="col-lg-8 col-sm-12 col-md-8 col-xs-12 ">
                            <div class="customer"><p align="left" style="font-family: Oswald, sans-serif;padding-left:16px!important;">Details of Receiver (Billed to)</p></div>
                            		<table style=" font-family: Oswald, sans-serif;" width="100%">
                                     <tbody><tr>
                                    <td width="50%" style="border:1px solid #ccc;padding: 4px 15px;;text-transform:uppercase;">Name of student : </td>
                                   <td width="50%" style="border:1px solid #ccc;padding: 4px 18px;;"> <?php echo $name ?></td>
                                    </tr>
                                    <tr>
                                    <td width="50%" style="border:1px solid #ccc;padding: 4px 15px;;text-transform:uppercase;">Address  of Student : </td>
                                   <td width="50%" style="border:1px solid #ccc;padding: 4px 18px;;"> <?php echo $address ?> </td>
                                    </tr>
                                    <tr  <?php  echo ($billingCountry!='IN') ? 'style="display:none!important;visiblity:hidden!important"' : ''?> >
                                    <td width="50%" style="border:1px solid #ccc;padding: 4px 15px;;text-transform:uppercase;">State Code : </td>
                                    <td width="50%" style="border:1px solid #ccc;padding: 4px 18px;;text-transform:uppercase;"> <?php echo $code ?> </td>
                                    </tr>
                                    <tr>
                                    <td width="50%" style="border:1px solid #ccc;padding: 4px 15px;;text-transform:uppercase;">Place of Supply : </td>
                                    <td width="50%" style="border:1px solid #ccc;padding: 4px 18px;;"> <?php echo $state ?></td>
                                    </tr>
                                     <tr>
                                    <td width="50%" style="border:1px solid #ccc;padding: 4px 15px;;text-transform:uppercase;">GSTIN :</td>
                                   <td width="50%" style="border:1px solid #ccc;padding: 4px 18px;;">  Unregistered</td>
                                    </tr>
                                    <tr>
                                    <td width="50%" style="border:1px solid #ccc;padding: 4px 15px;;text-transform:uppercase;">Enrollment No. : </td>
                                    <td width="50%" style="border:1px solid #ccc;padding: 4px 18px;;text-transform:uppercase;font-size:13px;"> <?php echo $_customer_user ?> </td>
                                    </tr>
                                     <tr>
                                    <td width="50%" style="border:1px solid #ccc;padding: 4px 15px;;text-transform:uppercase;">Batch No. :</td>
                                    <td width="50%" style="border:1px solid #ccc;padding: 4px 18px;;font-size:13px;"> <?php echo $batchCode ?> </td>
                                    </tr>
                                     <tr style="<?php if($invType==1) { echo 'visible:hidden!important;display:none!important;'; } ?>">
                                    <td width="50%" style="border:1px solid #ccc;padding: 4px 15px;;text-transform:uppercase;">Mode of Payment : </td>
                                    <td width="50%" style="border:1px solid #ccc;padding: 4px 18px;;font-size:13px;"> <?php echo $paymmode ?></td>
                                    </tr>
                                     <tr  style="<?php if($invType==1) { echo 'visible:hidden!important;display:none!important;'; } ?>" >
                                    <td width="50%" style="border:1px solid #ccc;padding: 4px 15px;;text-transform:uppercase;">Transaction ID : </td>
                                    <td width="50%" style="border:1px solid #ccc;padding: 4px 18px;;text-transform:lowercase;font-size:13px;"> <?php echo $tid ?></td>
                                    </tr>
                                    
                                   
                                    
                               
                                    </tbody></table>
                                
                                   
                            
                            </div>
                            
                             
                            
                            
                           
                    
                    
                    </div>
                    
            
            
            </div>


