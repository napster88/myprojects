<?php

/*  © 2013 eBay Inc., All Rights Reserved */ 
/* Licensed under CDDL 1.0 -  http://opensource.org/licenses/cddl1.php */
?>
<?php require_once('get-common/keys.php') ?> 
<?php require_once('get-common/eBaySession.php') ?> 
<?php
$siteID = 0;
//the call being made:
$verb = 'CompleteSale';
$orderno='362030088314-882732861023';
$trackno='TBA409043882000';
 

 
$settrackingXmlBody = '<?xml version="1.0" encoding="utf-8"?><CompleteSaleRequest xmlns="urn:ebay:apis:eBLBaseComponents"><WarningLevel>High</WarningLevel><OrderID>'.$orderno.'</OrderID><Shipment><ShipmentTrackingDetails><ShipmentTrackingNumber>'.$trackno.'</ShipmentTrackingNumber><ShippingCarrierUsed>AMZL US</ShippingCarrierUsed></ShipmentTrackingDetails></Shipment><Shipped>true</Shipped><RequesterCredentials><eBayAuthToken>'.$userToken.'</eBayAuthToken></RequesterCredentials></CompleteSaleRequest>';

			$session = new eBaySession($userToken, $devID, $appID, $certID, $serverUrl, $compatabilityLevel, $siteID, $verb);

			$responseXml = $session->sendHttpRequest($settrackingXmlBody);
			
			$responseDoc = new DomDocument();
			$order_detail=$responseDoc->loadXML($responseXml);
			$response = simplexml_import_dom($responseDoc);
			
			echo "<pre>";
			print_r($response);
			echo "</pre>";
			echo "Order Number: ".$orderno." ---- Transaction No: ".$trackno;
			
		
?>