<?php

/*  © 2013 eBay Inc., All Rights Reserved */ 
/* Licensed under CDDL 1.0 -  http://opensource.org/licenses/cddl1.php */
?>
<?php require_once('get-common/keys.php') ?> 
<?php require_once('get-common/eBaySession.php') ?> 
<?php

$siteID = 0;

$verb = 'SetShipmentTrackingInfo';


 $settrackingXmlBody = '<?xml version="1.0" encoding="utf-8" ?><SetShipmentTrackingInfoRequest xmlns="urn:ebay:apis:eBLBaseComponents"><OrderID>371947041837-957830339024</OrderID> <Shipment>   <ShippedTime>2017-04-18T20:27:00.000Z</ShippedTime><ShipmentTrackingDetails><ShippingCarrierUsed>UPSI</ShippingCarrierUsed><ShipmentTrackingNumber>1Z2FW2350221802694</ShipmentTrackingNumber></ShipmentTrackingDetails></Shipment><RequesterCredentials><eBayAuthToken>$userToken</eBayAuthToken></RequesterCredentials></SetShipmentTrackingInfoRequest>';
  
//Create a new eBay session with all details pulled in from included keys.php
$session = new eBaySession($userToken, $devID, $appID, $certID, $serverUrl, $compatabilityLevel, $siteID, $verb);
//send the request and get response
$responseXml = $session->sendHttpRequest($settrackingXmlBody);


//Xml string is parsed and creates a DOM Document object
$responseDoc = new DomDocument();
$order_detail=$responseDoc->loadXML($responseXml);

      $response = simplexml_import_dom($responseDoc);
$orders = $response->OrderArray->Order;
 print_r($responseXml);
?>