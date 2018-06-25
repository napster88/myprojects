<?php


if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( $order ) : 
?>

	<?php if ( $order->has_status( 'failed' ) ) : ?>

		<!--<p class="woocommerce-thankyou-order-failed"><?php _e( 'Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction. Please attempt your purchase again.', 'woocommerce' ); ?></p>

		<p class="woocommerce-thankyou-order-failed-actions">
			<a href="<?php echo esc_url( $order->get_checkout_payment_url() ); ?>" class="button pay"><?php _e( 'Pay', 'woocommerce' ) ?></a>
			<?php if ( is_user_logged_in() ) : ?>
				<a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>" class="button pay"><?php _e( 'My Account', 'woocommerce' ); ?></a>
			<?php endif; ?>
		</p>
		-->

	<?php else : ?>
	
	
<?php 



$course_id='';

 foreach ($order->get_items() as $item)
        {
           $product_name = $item['name'];
            $sku          = $item['product_id'];
			$course_name=$product_name;
			$course_id=$sku;
        }
		    $current_user     = wp_get_current_user();
			$current_user=$current_user->ID;
		$institute = get_field('c_institute', $course_id);
		$logo_id= get_field('logo', $institute);
		$institute_name   = get_field('short_name', $institute);
		 
			$course_name           = $item['name'];
           $order_currency = get_post_meta($order->id,'_order_currency',true);
              // $batchid         = get_field('batch_name', $course_id);
        
	$order_total = get_post_meta($order->id,'_order_total',true);
	
	if($course_id=='1060')
	{

?>
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="col-md-4 col-sm-5 col-xs-12">
            	<div class="thnks_bg">	
 	           		<div class="thnks_inst_txt">
 	           			<?php echo $course_name;?>  <span class="thnks_bl">Course from  <?php echo $institute_name;?></span>
 	           		</div>
 	           		<div class="thnks_inst_logo">
 	           			<img src="<?php echo $logo_id; ?>">
 	           		</div>
 	           	</div>
            </div>
            <div class="col-md-8 col-sm-7 col-xs-12">
            	<div class="thnks_bg">
            		<div class="thnks_check">
            			<img src="<?php echo site_url();?>/wp-content/uploads/2018/02/multi-checks.png" alt="">
            		</div>
            		<div class="thnks_mid_head">
            			Thanks!
            		</div>
            		<div class="thnks_payment_txt">
            			We have received your payment of <span><?php echo $order_currency." ".$order_total;?></span>
            		</div>
            	</div>
            </div>
            <div class="col-xs-12 thnks_inst_txt thnks_btm">
            	Your application for <?php echo $course_name;?>  Course from <span><?php echo $institute_name;?></span>  is still not complete.
            </div>
            <div class="col-xs-12">
            	 	<a href="<?php echo get_site_url();?>/arden_form?course_id='<?php echo $course_id;?>&&course_name=<?php echo $course_name;?>&&current_user=<?php echo $current_user;?>&&order_id=<?php echo $order->id ;?>" class="btn btn-thnks-blue">Complete Application</a>
            </div>
            </div>
          </div>
        </div>
	
	<?php } else {?>
	
	
	

		<p class="woocommerce-thankyou-order-received"><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', __( 'Thank you. Your order has been received.', 'woocommerce' ), $order ); ?></p>

		<ul class="woocommerce-thankyou-order-details order_details">
			<li class="order">
				<?php _e( 'Order Number:', 'woocommerce' ); ?>
				<strong><?php echo $order->get_order_number(); ?></strong>
			</li>
			<li class="date">
				<?php _e( 'Date:', 'woocommerce' ); ?>
				<strong><?php echo date_i18n( get_option( 'date_format' ), strtotime( $order->order_date ) ); ?></strong>
			</li>
			<li class="total">
				<?php _e( 'Total:', 'woocommerce' ); ?>
				<strong><?php echo $order->get_formatted_order_total(); ?></strong>
			</li>
			<?php if ( $order->payment_method_title ) : ?>
			<li class="method">
				<?php _e( 'Payment Method:', 'woocommerce' ); ?>
				<strong><?php echo $order->payment_method_title; ?></strong>
			</li>
			<?php endif; ?>
		</ul>
		<div class="clear"></div>

		
		<?php } //end of if dddddddd ?>
		
		
		
	<?php endif; ?>

	<?php do_action( 'woocommerce_thankyou_' . $order->payment_method, $order->id ); ?>
	<?php do_action( 'woocommerce_thankyou', $order->id ); ?>

<?php else : ?>

	<p class="woocommerce-thankyou-order-received"><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', __( 'Thank you. Your order has been received.', 'woocommerce' ), null ); ?></p>

	
	
	
	
	
	
<?php endif; ?>



<style>

*{
	margin:0; 
	padding:0;
	border:0;
	outline:0;
	font-size:100%; 
	vertical-align:baseline; 
	background:transparent;}
a{
	text-decoration:none;
}
ul, ol{
	list-style:none; 
}
@font-face {
  font-family: 'Roboto-Light';
  src: url('<?php echo  get_template_directory_uri();?>/fonts/Roboto-Light.eot');
  src: url('<?php echo get_template_directory_uri();?>/fonts/Roboto-Light.eot?#iefix') format('embedded-opentype'),
       url('<?php echo get_template_directory_uri();?>/fonts/Roboto-Light.woff') format('woff'),
       url('<?php echo get_template_directory_uri();?>/fonts/Roboto-Light.ttf')  format('truetype'),
       url('<?php echo get_template_directory_uri();?>/fonts/Roboto-Light.svg#svgFontName') format('svg');
}
.thnks_bg{
	background-color: #f7f7f7;
	border: 1px dashed #e7e7e7;
	padding: 20px;
	min-height: 210px;

}
.thnks_inst_txt{
	font-family: 'Roboto-Light';
	font-size: 21px;
	color: #191919;
	line-height: 24px;
}
.thnks_inst_txt span{
	color: #183d8d;
	font-weight: 600;
}
.thnks_bl{
	display: block;
}
.thnks_inst_logo{
	width: 50px;
	display: block;
	margin-top: 20px;
}
.thnks_inst_logo img{
	width: 100%;
	height: auto;
}
.thnks_check{
	display: block;
	margin: 0 auto 20px;
	text-align: center;
}
.thnks_mid_head{
	font-family: 'Roboto-Light';
	font-size: 26px;
	color: #191919;
	line-height: 26px;
	font-weight: 600;
	display: block;
	margin: 0 auto 15px;
	text-align: center;
}
.thnks_payment_txt{
	font-family: 'Roboto-Light';
	font-size: 26px;
	color: #191919;
	line-height: 26px;
	text-align: center;
}
.thnks_payment_txt span{
	font-weight: 600;
}
.thnks_btm{
	display: block;
	margin: 75px auto 30px;
	text-align: center;
}
.btn-thnks-blue{
	background-color: #183d8d;
	border-radius: 3px;
	-moz-border-radius: 3px;
	-webkit-border-radius: 3px;
	-moz-border-radius: 3px;
	color: #fff;
	font-family: 'Roboto-Light';
	font-size: 24px;
	line-height: 24px;
	font-weight: 600;
	width: 340px;
	padding: 15px;
	display: block;
	margin: 0 auto;
}
.btn-thnks-blue:hover, .btn-thnks-blue:focus, .btn-thnks-blue:active:focus{
	outline: none;
	color: #fff;
	box-shadow: none;
}

@media only screen and (min-width: 320px) and (max-width: 599px){
	.thnks_bg{
		min-height: auto;
	}
	.col-md-9 > .thnks_bg{
		margin-top: 20px;
	}
	.thnks_inst_txt{
		font-size: 18px;
	}
	.thnks_bl{
		display: inline-block;
	}
	.thnks_inst_logo{
		margin: 20px auto 0;
	}
	.thnks_mid_head{
		font-size: 22px;
	}
	.thnks_payment_txt{
		font-size: 18px;
	}
	.thnks_btm{
		margin: 20px auto;
	}
	.btn-thnks-blue{
		width: 260px;
		font-size: 20px;
		line-height: 20px;
	}
}
@media only screen and (min-width: 600px) and (max-width: 767px){
	.thnks_bg{
		min-height: auto;
	}
	.col-md-9 > .thnks_bg{
		margin-top: 20px;
	}
	.thnks_bl{
		display: inline-block;
	}
	.thnks_inst_logo{
		margin: 20px auto 0;
	}
	.thnks_btm{
		margin: 20px auto;
	}
}
@media only screen and (min-width: 768px) and (max-width: 1199px){
	.thnks_bg{
		min-height: 230px;
	}
}
</style>






