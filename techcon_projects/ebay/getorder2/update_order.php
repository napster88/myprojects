<?php 
	$verbm = 'CompleteSale';
//$dbc = mysqli_connect (DB_HOST, DB_USER, DB_PASS, DB_NAME);
$query="SELECT * FROM `empty_tracking_orders` ";
 $result = mysqli_query($dbc,$query);
 
 $query_track="SELECT * FROM `ebay_num_generate` ";
 $result_track = mysqli_query($dbc,$query_track);
 
 while($row=mysqli_fetch_array($result))
 {
 
 
 while($row_track=mysqli_fetch_array($result_track))
 {
 
 $status=file_get_contents("https://api.goshippo.com/tracks/ups/".$row_track['track_no']."/");
		$resultmm=json_decode($status, true);
		if($resultmm['tracking_status']['status']!="TRANSIT")
		{
			$query_track_del="DELETE FROM `ebay_num_generate` WHERE `track_no`='$row_track[track_no]'";
			$result_track_del = mysqli_query($dbc,$query_track_del);
			
		}
		else
		{
			
			
		$orderno=$row['order_num'];
		$trackno=$row_track['track_no'];

$settrackingXmlBody = '<?xml version="1.0" encoding="utf-8"?><CompleteSaleRequest xmlns="urn:ebay:apis:eBLBaseComponents"><WarningLevel>High</WarningLevel><OrderID>'.$orderno.'</OrderID><Shipment><ShipmentTrackingDetails><ShipmentTrackingNumber>'.$trackno.'</ShipmentTrackingNumber><ShippingCarrierUsed>UPS</ShippingCarrierUsed></ShipmentTrackingDetails></Shipment><Shipped>true</Shipped><RequesterCredentials><eBayAuthToken>'.$userToken.'</eBayAuthToken></RequesterCredentials></CompleteSaleRequest>';

			$session = new eBaySession($userToken, $devID, $appID, $certID, $serverUrl, $compatabilityLevel, $siteID, $verbm);

			$responseXml = $session->sendHttpRequest($settrackingXmlBody);

			$query_track_del="DELETE FROM `ebay_num_generate` WHERE `track_no`='$row_track[track_no]'";
			$result_track_del = mysqli_query($dbc,$query_track_del);
			$query_order_del="DELETE FROM `empty_tracking_orders` WHERE `order_num`='$row[order_num]'";	
			$result_order_del = mysqli_query($dbc,$query_order_del);
			$query = "INSERT INTO `ebay_transaction_tracking_num`(`trans_track_order_no`, `trans_track_track_no`, `created_date`) VALUES ('$orderno','$trackno',now())";
			$result = mysqli_query($dbc,$query);
			
			echo "Order Number: ".$orderno." ---- Transaction No: ".$trackno;
			break;
		}
		
 }
 
 
 }


?>