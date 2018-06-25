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
$verb = 'GetStore';



$requestXmlBody = '<?xml version="1.0" encoding="utf-8" ?>';
$requestXmlBody .= '<GetStoreRequest xmlns="urn:ebay:apis:eBLBaseComponents">';
$requestXmlBody .= ' <LevelLimit>1</LevelLimit>';
$requestXmlBody .= "<RequesterCredentials><eBayAuthToken>$userToken</eBayAuthToken></RequesterCredentials>";
$requestXmlBody .= '</GetStoreRequest>';
//Create a new eBay session with all details pulled in from included keys.php
$session = new eBaySession($userToken, $devID, $appID, $certID, $serverUrl, $compatabilityLevel, $siteID, $verb);
//send the request and get response
$responseXml = $session->sendHttpRequest($requestXmlBody);
echo "<pre>";
print_r($responseDoc);
echo "</pre>";
if (stristr($responseXml, 'HTTP 404') || $responseXml == '')
    die('<P>Error sending request');
//Xml string is parsed and creates a DOM Document object
$responseDoc = new DomDocument();
$responseDoc->loadXML($responseXml);
//get any error nodes
$errors = $responseDoc->getElementsByTagName('Errors');
$response = simplexml_import_dom($responseDoc);
$entries = $response->PaginationResult->TotalNumberOfEntries;
//if there are error nodes
if ($errors->length > 0) {
    echo '<P><B>eBay returned the following error(s):</B>';
    //display each error
    //Get error code, ShortMesaage and LongMessage
    $code = $errors->item(0)->getElementsByTagName('ErrorCode');
    $shortMsg = $errors->item(0)->getElementsByTagName('ShortMessage');
    $longMsg = $errors->item(0)->getElementsByTagName('LongMessage');
    
    //Display code and shortmessage
    echo '<P>', $code->item(0)->nodeValue, ' : ', str_replace(">", "&gt;", str_replace("<", "&lt;", $shortMsg->item(0)->nodeValue));
    
    //if there is a long message (ie ErrorLevel=1), display it
    if (count($longMsg) > 0)
        echo '<BR>', str_replace(">", "&gt;", str_replace("<", "&lt;", $longMsg->item(0)->nodeValue));
}else { //If there are no errors, continue
    if(isset($_GET['debug']))
    {  
       header("Content-type: text/xml");
       //print_r($responseXml);
    }else
     {  //$responseXml is parsed in view.php
        include_once 'view.php';
    }
} 
?>