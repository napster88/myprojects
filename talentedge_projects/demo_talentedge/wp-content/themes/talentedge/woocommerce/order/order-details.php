<?php
/**
 * Order details
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/order/order-details.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.6.0
 */
?>
<style type="text/css">
	.pending {
	 color:#f26522;
	}

</style>
<?php 

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$order = wc_get_order( $order_id );

$show_purchase_note    = $order->has_status( apply_filters( 'woocommerce_purchase_note_order_statuses', array( 'completed', 'processing' ) ) );
$show_customer_details = is_user_logged_in() && $order->get_user_id() === get_current_user_id();
?>
<h2><?php _e( 'Order Details', 'woocommerce' ); ?></h2>
<?php if ( $order->has_status( 'failed' ) ) { 
$status = 'FAILED';
$status_cls = 'failed';
 } elseif ( $order->has_status( 'completed' )) {
$status = 'SUCCESS';

$status_cls = 'success';
}
else{
$status = 'PENDING';

$status_cls = 'pending';
}
?>
<?php
		global $current_user;
       get_currentuserinfo();
       $uid = $current_user->ID;
       $uname = get_user_meta( $uid, 'billing_first_name', true );
    ?>
<?php
foreach($order->get_items() as $item) {
			    $product_name = $item['name'];
			    $sku = $item['product_id'];
		}

$inst = get_field('c_institute', $sku);
$inst_name = get_field('short_name', $inst);
?>
<table class="shop_table order_details">
	<!--<thead>
		<tr>
			<th class="product-name"><?php _e( 'Course', 'woocommerce' ); ?></th>
			<th class="product-total"><?php _e( 'Total', 'woocommerce' ); ?></th>
		</tr>
	</thead>
	-->
	<tbody>
		<tr>
			<td>Enrolment ID</td>
				<td><strong><?php echo $order->get_order_number(); ?></strong></td>
		</tr>
		<tr class="paymenttd">
			<td><strong>Payment Status</strong></td>
			<td><strong class="<?php echo $status_cls;?>"><?php echo $status;?></strong></td>
		</tr>
		<tr>
			<td>Student Name</td>
			<td><?php echo $uname; echo $page->ID;?></td>
		</tr>
		<tr>
			<td>Date</td>
			<td><strong><?php echo date_i18n( get_option( 'date_format' ), strtotime( $order->order_date ) ); ?></strong>
			</td>
		</tr>
		<tr>
			<td>Course</td>
			<td><?php echo $product_name;?></td>
		</tr>
		<tr>
			<td>Institute</td>
			<td><?php echo $inst_name;?></td>
		</tr>
		
		<?php
			foreach( $order->get_items() as $item_id => $item ) {
				$product = apply_filters( 'woocommerce_order_item_product', $order->get_product_from_item( $item ), $item );

				wc_get_template( 'order/order-details-item.php', array(
					'order'			     => $order,
					'item_id'		     => $item_id,
					'item'			     => $item,
					'show_purchase_note' => $show_purchase_note,
					'purchase_note'	     => $product ? get_post_meta( $product->id, '_purchase_note', true ) : '',
					'product'	         => $product,
				) );
			}
		?>
		<?php do_action( 'woocommerce_order_items_table', $order ); ?>
	
	</tbody>
	<tfoot>
		<?php
			foreach ( $order->get_order_item_totals() as $key => $total ) {
				?>
				<tr>
					<th scope="row"><?php echo $total['label']; ?></th>
					<td><?php echo $total['value']; ?></td>
				</tr>
				<?php
			}
		?>
	</tfoot>
</table>

<?php do_action( 'woocommerce_order_details_after_order_table', $order ); ?>

<?php if ( $show_customer_details ) : ?>
	<?php wc_get_template( 'order/order-details-customer.php', array( 'order' =>  $order ) ); ?>
<?php endif; ?>
