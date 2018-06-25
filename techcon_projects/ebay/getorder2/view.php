<?php
$response = simplexml_import_dom($responseDoc);
$orders = $response->OrderArray->Order;
//echo "Please wait...";
?>
<table><tr><th>Order ID</th><th>Order Status</th><th>Carrier Used</th><th>Tracking Num</th><th>LastModifiedTime</th><th>CreatedTime</th><th>ShippedTime</th></tr>
 <?php $last_trackorder=array();
 $order_id=array();
 $fake_track_num=array();
 
 foreach ($orders as $order) {
	 
	/*  echo "<pre>";
print_r($order);
echo "</pre>"; */
	 $carries= $order->TransactionArray->Transaction->ShippingDetails->ShipmentTrackingDetails->ShippingCarrierUsed;
	 $ship_num=$order->TransactionArray->Transaction->ShippingDetails->ShipmentTrackingDetails->ShipmentTrackingNumber;
	 $status=(string)$order->OrderStatus;
	 
	 
	 ?><tr><td>
	<?php 
	
	
	$order->OrderID; ?></td><td>
	<?php  echo $status ; ?></td>
	<td><?php echo  $carries;?></td>
	 <td><?php echo $ship_num ?></td><td>
	
	<?php echo $order->CheckoutStatus->LastModifiedTime; ?>
	</td>
	<td>
	
	<?php echo $order->CreatedTime; ?>
	</td>
	<td>
	
	<?php echo $order->ShippedTime; 
	
	?>
	</td></tr>
	<?php
	 if($carries=="UPS")
	{	
	$val=(string)$ship_num;  //stores ups tracking system

$last_trackorder[] = $val;
		
	}
else if(($carries==NULL)&&($status=="Completed")) 
{
	$order_id[]=(string)$order->OrderID; // It stores empty staus orders
}
 }

 ?></table>
 <?php  

  $new_fake_no=array();
 $count=count($last_trackorder)-1;
 for($ii=$count;$ii>=0;$ii--)
 {
 //last ups tracking number
 $last_tcno=$last_trackorder[$ii];
 //starting 16 digit of ups tracking number
$start_string= substr($last_tcno, 0, -2);

//last two digit of tracking number
 $end_string= substr($last_tcno,-2)+9;

//generate 18 digit ups fake tracking number
 

  for($i=$end_string;$i<=99;$i+=9)  // forward tracking numbers
{
	$num=$start_string.$i;
	$status=file_get_contents("https://api.goshippo.com/tracks/ups/".$start_string.$i."/");
		$resultmm=json_decode($status, true);
		$query="SELECT * FROM `ebay_transaction_tracking_num` WHERE `trans_track_track_no`=$num ";
 $result = mysqli_query($dbc,$query);

if($resultmm['tracking_status']['status']=="TRANSIT")
		{
			$fake_track_num[]=$start_string.$i;
		}	
	
		
		
		
} 
 } 
 echo count($order_id)." orders unshipped";
 echo count($fake_track_num)." generated fake trackin numbers";
  include_once 'generate.php'; 

?>