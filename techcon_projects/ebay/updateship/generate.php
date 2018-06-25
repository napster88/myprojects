<?php require "eBaySession.php";
 $devID = 'e00f5818-f72c-46f1-b084-f71f951304a2';   // these prod keys are different from sandbox keys
        $appID = 'kapiltha-EBAYTEST-PRD-108faa0a3-8783ecde';
        $certID = 'PRD-08faa0a3a85f-bc46-42ff-88d0-6908';
        //set the Server to use (Sandbox or Production)
        $serverUrl = 'https://api.ebay.com/ws/api.dll';      // server URL different for prod and sandbox
        //the token representing the eBay user to assign the call with
        $userToken = 'AgAAAA**AQAAAA**aAAAAA**qynvWA**nY+sHZ2PrBmdj6wVnY+sEZ2PrA2dj6wJl4KlAZiCpwydj6x9nY+seQ**VLIDAA**AAMAAA**J1j5M19DSoaZR6ZvpPtAggdcBcKE+33BfW5Dln5qis//mOQL00/tgYgAeIGW5HeEC/Qz2yQ7cL5k/jcrbZSniDcPuHWvBEWUnphE/W5dNJVPwn/rRZqWqGMd4X/Hu8qWegCoAag2Yq1wOX0u9TPR0poE9x1eDfHNl4s08g2bOHxgPYYsDtycWXdyi2aK1EEca3iKo6TuP3gxkqzHC70HY/G2lt/xFHKkvZ/HtzmpHeGFCZF/Mv6+cL3lubaAxf4+X6fXKgrJGyneTkwaVE00DTeCaN4H0/BWp4OF/wbrlHAW3F9fCzphXbfUo03VMf+04G93T4E4V2S/5gexjyxsHcR+ZPU0RGtsFjJtyuIp3fu5toA3aa1gh5M6YWYV2qJvH7JlLb9UCTIhKnzKCUBtVxr8wnkbuyEywARRtXvGcCayXI2QLH/nJ9dXgq+8cbif2KJXXv+iM/3MWi5Tr67cuQ/4sn3PObkbizUzMaOf03aEwyZWwJNTH9Q4c48N/zDiPlUQveCJ1WbT5mVoyDjTw6navq7HJN1tFH4BE5kORM9KVu3C5+mxi6EvKjTRMq4mGDkhN8igpS8yNi5avRjDuSDvAUbaqN6TLltWkCgNNsIZ7qy7PsALncqeOxUQRlSrjdCUTPPnYa4DnsJ96aBWQwddJnWIF6+nsOG578oUAPkHnGMez7JzSe7EeAqScVPIxa8a4ljbe3L7ibq00aNOQPNtskkoI5UGCrt03OGm0szFDgy8dmqDUj66hztuO3PM';       
$endpointurl = 'https://webservices.ebay.com/BulkDataExchangeService';
 $outputFileName = "XOLTResult.xml";

//query to update tracking number with respect to order

 $settrackingXmlBody = '<?xml version="1.0" encoding="utf-8" ?><BulkDataExchangeRequests>    <Header><Version>955</Version><SiteID>0</SiteID></Header><SetShipmentTrackingInfoRequest xmlns="urn:ebay:apis:eBLBaseComponents"><OrderID>371765014902-926868586024</OrderID> <OrderLineItemID>110035505229-23336925001</OrderLineItemID><Shipment>   <ShippedTime>2017-04-18T20:27:00.000Z</ShippedTime><ShipmentTrackingDetails><ShippingCarrierUsed>UPS</ShippingCarrierUsed><ShipmentTrackingNumber>1Z2FW2350221802694</ShipmentTrackingNumber></ShipmentTrackingDetails></Shipment><RequesterCredentials><eBayAuthToken>$userToken</eBayAuthToken></RequesterCredentials></SetShipmentTrackingInfoRequest></BulkDataExchangeRequests>';
  
  
   $request = stream_context_create($form);
  //$session = new eBaySession($userToken, $devID, $appID, $certID, $endpointurl, $compatabilityLevel, $siteID, $verb);
//$response = $session->sendHttpRequest($requestXmlBody);
 $response = stream_get_contents($session);
$fw = fopen($outputFileName,'w');
            fwrite($fw , "Response: \n" . $response . "\n");
            fclose($fw);

            //get response status
            $resp = new SimpleXMLElement($response);
            echo $resp->Response->ResponseStatusDescription . "\n";
//if u want to chek order track of single order

/* 
$CreateTimeFrom = gmdate("2017-04-16\T12:01:01"); //GMT
$CreateTimeTo = gmdate("2017-04-18\T23:59:59"); //GMT
///Build the request Xml string
$requestXmlBodyb = '<?xml version="1.0" encoding="utf-8" ?>';
$requestXmlBodyb .= '<GetOrdersRequest xmlns="urn:ebay:apis:eBLBaseComponents">';
//$requestXmlBody .= '<DetailLevel>ReturnAll</DetailLevel>';
$requestXmlBodyb .= '<OrderIDArray><OrderID>371765014902-926868586024</OrderID></OrderIDArray>';

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
print_r($ordersb);
echo"</pre>"; */
?>