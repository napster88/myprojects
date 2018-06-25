<?php

/*  © 2013 eBay Inc., All Rights Reserved */ 
/* Licensed under CDDL 1.0 -  http://opensource.org/licenses/cddl1.php */
?>
<?php require_once('get-common/keys.php') ?> 
<?php require_once('get-common/eBaySession.php') ?> 
<?php require_once('get-common/dbconnect.php') ?> 
<?php
$query_start="SELECT * FROM `start-stop` WHERE `action`='start-stop' &&`status`='true'";
	 $result_start = mysqli_query($dbc,$query_start);
$count_start=mysqli_num_rows($result_start);
if($count_start==1)
{

//SiteID must also be set in the Request's XML
//SiteID = 0  (US) - UK = 3, Canada = 2, Australia = 15, ....
//SiteID Indicates the eBay site to associate the call with
$siteID = 0;
//the call being made:
$verb = 'GetOrders';
//Time with respect to GMT
//by default retreive orders in last 30 minutes
//$CreateTimeFrom = gmdate("Y-m-d\TH:i:s",time()-180000000); //current time minus 30 minutes
//$CreateTimeTo = gmdate("Y-m-d\TH:i:s");
//If you want to hard code From and To timings, Follow the below format in "GMT".
//$CreateTimeFrom = gmdate("2017-04-16\T12:01:01"); //GMT
//$CreateTimeTo = gmdate("2017-04-18\T23:59:59"); //GMT
///Build the request Xml string
$new_timestamp = strtotime('-1 days', strtotime(date("Y-m-d")));
$CreateTimeFrom = date("Y-m-d",$new_timestamp); //GMT
$CreateTimeTo = date("Y-m-d");
$CreateTimeFrom = date("2017-05-13 07:00:00"); //GMT
$CreateTimeTo = date("2017-05-14 07:00:00"); 
$requestXmlBody = '<?xml version="1.0" encoding="utf-8" ?>';
$requestXmlBody .= '<GetOrdersRequest xmlns="urn:ebay:apis:eBLBaseComponents">';
$requestXmlBody .= '<DetailLevel>ReturnAll</DetailLevel>';
//$requestXmlBody .= '<NumberOfDays>1</NumberOfDays>';

$requestXmlBody .= "<CreateTimeFrom>$CreateTimeFrom</CreateTimeFrom><CreateTimeTo>$CreateTimeTo</CreateTimeTo>";
$requestXmlBody .= '<OrderRole>Seller</OrderRole><OrderStatus>All</OrderStatus>';

$requestXmlBody .= "<RequesterCredentials><eBayAuthToken>$userToken</eBayAuthToken></RequesterCredentials>";
$requestXmlBody .= '</GetOrdersRequest>';
//Create a new eBay session with all details pulled in from included keys.php
$session = new eBaySession($userToken, $devID, $appID, $certID, $serverUrl, $compatabilityLevel, $siteID, $verb);

//send the request and get response
$responseXml = $session->sendHttpRequest($requestXmlBody);

$responseDoc = new DomDocument();
$order_detail=$responseDoc->loadXML($responseXml);

//get any error nodes
$errors = $responseDoc->getElementsByTagName('Errors');
$response = simplexml_import_dom($responseDoc);
$entries = $response->PaginationResult->TotalNumberOfEntries;

 include_once 'view.php';
}
?>