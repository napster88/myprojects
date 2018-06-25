<?php

/*  © 2013 eBay Inc., All Rights Reserved */ 
/* Licensed under CDDL 1.0 -  http://opensource.org/licenses/cddl1.php */
?>
<?php require_once('get-common/keys.php') ?> 
<?php require_once('get-common/eBaySession.php') ?> 
<?php
//SiteID must also be set in the Request's XML
//SiteID = 0  (US) - UK = 3, Canada = 2, Australia = 15, ....
//SiteID Indicates the eBay site to associate the call with
$siteID = 0;
//the call being made:
$verb = 'GetOrders';
$order1='362130850649-899141767023';
$order2='372116030444-975489310024';
///Build the request Xml string
$requestXmlBodyb = '<?xml version="1.0" encoding="utf-8" ?>';
$requestXmlBodyb .= '<GetOrdersRequest xmlns="urn:ebay:apis:eBLBaseComponents">';
//$requestXmlBody .= '<DetailLevel>ReturnAll</DetailLevel>';
$requestXmlBodyb .= '<OrderIDArray><OrderID>'.$order1.'</OrderID></OrderIDArray>'; 

//$requestXmlBody .= "<CreateTimeFrom>$CreateTimeFrom</CreateTimeFrom><CreateTimeTo>$CreateTimeTo</CreateTimeTo>";
$requestXmlBodyb .= '<OrderRole>Seller</OrderRole><OrderStatus>All</OrderStatus>';

$requestXmlBodyb .= "<RequesterCredentials><eBayAuthToken>$userToken</eBayAuthToken></RequesterCredentials>";
$requestXmlBodyb .= '</GetOrdersRequest>';
//Create a new eBay session with all details pulled in from included keys.php
$session = new eBaySession($userToken, $devID, $appID, $certID, $serverUrl, $compatabilityLevel, $siteID, $verb);

//send the request and get response
$responseXmlb = $session->sendHttpRequest($requestXmlBodyb);
$responseDocb = new DomDocument();
$order_detailb=$responseDocb->loadXML($responseXmlb);

$responseb = simplexml_import_dom($responseDocb);
$ordersb = $responseb->OrderArray->Order;
echo "<pre>";
try{
if(isset($ordersb->TransactionArray->Transaction->ShippingDetails->ShipmentTrackingDetails))
{
print_r($ordersb->TransactionArray->Transaction->ShippingDetails);
}
}catch(Exception $e){
	echo $e;
}
echo"</pre>"; 
?>