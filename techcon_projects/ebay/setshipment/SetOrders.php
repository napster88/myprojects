<?php

/*  © 2013 eBay Inc., All Rights Reserved */ 
/* Licensed under CDDL 1.0 -  http://opensource.org/licenses/cddl1.php */
?>
<?php require_once('get-common/keys.php') ?> 
<?php require_once('get-common/eBaySession.php') ?> 
<?php
define("DB_NAME", "ebay_tracking_system");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_HOST", "localhost");
$dbc = mysqli_connect (DB_HOST, DB_USER, DB_PASS, DB_NAME);
$queryg="SELECT * FROM `start-stop` WHERE `action`='start-stop' &&`status`='true'";
	 $resultg = mysqli_query($dbc,$queryg);
	 
	 print_r($resultg);
$countg=mysqli_num_rows($resultg);

if($countg==1)
{
	$siteID = 0;
	//the call being made:
	$verb = 'CompleteSale';

	$query_order="SELECT * FROM `empty_tracking_orders` ";
	 $result_order = mysqli_query($dbc,$query_order);
	 
	 $query_track="SELECT * FROM `ebay_num_generate` ";
	 $result_track = mysqli_query($dbc,$query_track);
	 
	 while($row_order=mysqli_fetch_array($result_order))
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
					
					
				$orderno=$row_order['order_num'];
				$trackno=$row_track['track_no'];

				$settrackingXmlBody = '<?xml version="1.0" encoding="utf-8"?><CompleteSaleRequest xmlns="urn:ebay:apis:eBLBaseComponents"><WarningLevel>High</WarningLevel><OrderID>'.$orderno.'</OrderID><Shipment><ShipmentTrackingDetails><ShipmentTrackingNumber>'.$trackno.'</ShipmentTrackingNumber><ShippingCarrierUsed>UPS</ShippingCarrierUsed></ShipmentTrackingDetails></Shipment><Shipped>true</Shipped><RequesterCredentials><eBayAuthToken>'.$userToken.'</eBayAuthToken></RequesterCredentials></CompleteSaleRequest>';

					$session = new eBaySession($userToken, $devID, $appID, $certID, $serverUrl, $compatabilityLevel, $siteID, $verb);

					$responseXml = $session->sendHttpRequest($settrackingXmlBody);
					$responseDoc = new DomDocument();
					$order_detail=$responseDoc->loadXML($responseXml);
					$response = simplexml_import_dom($responseDoc);
					/* echo "<pre>";
					print_r($response);
					echo "</pre>" */;
					 $query_track_del="DELETE FROM `ebay_num_generate` WHERE `track_no`='$row_track[track_no]'";
					$result_track_del = mysqli_query($dbc,$query_track_del);
					
					
					if($response->Ack=="Success")
					{
						$query_order_del="DELETE FROM `empty_tracking_orders` WHERE `order_num`='$row_order[order_num]'";	
					$result_order_del = mysqli_query($dbc,$query_order_del);
					
					$query = "INSERT INTO `ebay_transaction_tracking_num`(`trans_track_order_no`, `trans_track_track_no`, `created_date`) VALUES ('$orderno','$trackno',now())";
					$result = mysqli_query($dbc,$query); 
					break;
					}
				
					//echo "Order Number: ".$orderno." ---- Transaction No: ".$trackno;
					
					
				}
				
		 }
	 
	 
	 }
}

?>