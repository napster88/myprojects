<?php

$API_Key="60eeb5b9bf67a292ab8dbc8fef8379e1";
$API_Secret_Key="efe68c7980a6799e70799ef0227e0a78";
$shops_myshopify_domain="";

$shopify = shopify_api_client($shops_myshopify_domain, NULL, $API_Key, $API_Secret_Key, true);

	try
	{
		// Get all products
		$products = $shopify('GET', '/admin/products.json', array('published_status'=>'published'));


		// Create a new recurring charge
		$charge = array
		(
			"recurring_application_charge"=>array
			(
				"price"=>10.0,
				"name"=>"Super Duper Plan",
				"return_url"=>"http://super-duper.shopifyapps.com",
				"test"=>true
			)
		);

		try
		{
			// All requests accept an optional fourth parameter, that is populated with the response headers.
			$recurring_application_charge = $shopify('POST', '/admin/recurring_application_charges.json', $charge, $response_headers);

			// API call limit helpers
			echo shopify_calls_made($response_headers); // 2
			echo shopify_calls_left($response_headers); // 298
			echo shopify_call_limit($response_headers); // 300

		}
		catch (ShopifyApiException $e)
		{
			// If you're here, either HTTP status code was >= 400 or response contained the key 'errors'
		}

	}
	catch (ShopifyApiException $e)
	{
		/* $e->getInfo() will return an array with keys:
			* method
			* path
			* params (third parameter passed to $shopify)
			* response_headers
			* response
			* shops_myshopify_domain
			* shops_token
		*/
	}
	catch (ShopifyCurlException $e)
	{
		// $e->getMessage() returns value of curl_errno() and $e->getCode() returns value of curl_ error()
	}
?>


