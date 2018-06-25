<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ebay_api  {
	 
	

	public function sendHttpRequest($requestBody,$userToken, $devID, $appID, $certID, $serverUrl, $compatabilityLevel, $siteID, $verb)
	{
		
	$headers = array (
			'X-EBAY-API-COMPATIBILITY-LEVEL: ' . $compatLevel,
			'X-EBAY-API-DEV-NAME: ' . $devID,
			'X-EBAY-API-APP-NAME: ' . $appID,
			'X-EBAY-API-CERT-NAME: ' . $certID,
			'X-EBAY-API-CALL-NAME: ' . $verb,			
			'X-EBAY-API-SITEID: ' . $siteID,
		);
		
		//initialise a CURL session
		$connection = curl_init();
		//set the server we are using (could be Sandbox or Production server)
		curl_setopt($connection, CURLOPT_URL, $serverUrl);
		
		//stop CURL from verifying the peer's certificate
		curl_setopt($connection, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($connection, CURLOPT_SSL_VERIFYHOST, 0);
		
		//set the headers using the array of headers
		curl_setopt($connection, CURLOPT_HTTPHEADER, $headers);
		
		//set method as POST
		curl_setopt($connection, CURLOPT_POST, 1);
		
		//set the XML body of the request
		curl_setopt($connection, CURLOPT_POSTFIELDS, $requestBody);
		
		//set it to return the transfer as a string from curl_exec
		curl_setopt($connection, CURLOPT_RETURNTRANSFER, 1);
		
		//Send the Request
		$response = curl_exec($connection);
		
		//close the connection
		curl_close($connection);
		
		//return the response
		
	}
	
	
	
	
	
	
}