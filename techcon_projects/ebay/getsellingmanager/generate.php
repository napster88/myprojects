<?php 


 foreach($fake_track_num as $val)
{
	
$query = "INSERT INTO `ebay_num_generate`(`track_no`,`create_date`) VALUES ('$val',now())";
	$result = mysqli_query($dbc,$query);
	
}

foreach($order_id as $val)
{
	
$query = "INSERT INTO `empty_tracking_orders`(`order_num`,`create_date`) VALUES ('$val',now())";
	$result = mysqli_query($dbc,$query);
	
} 

//echo "Trackin Number and Order Numbers saved in database";

//include_once 'update_order.php';
?>