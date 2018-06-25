<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class View_ebay_order extends CI_Controller {

	
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		if(!$this->session->userdata('loggedin')){
			redirect('backlogin', 'refresh');
		}
		$this->load->model('user_model');
		$this->load->model('transaction_model');
    }
	public function view_ebay_order_detail($pagereturn)
	{
		$production         = true;   // toggle to true if going against production
		$compatabilityLevel = 717;  
		$devID = 'e00f5818-f72c-46f1-b084-f71f951304a2';   // these prod keys are different from sandbox keys
        $appID = 'kapiltha-EBAYTEST-PRD-108faa0a3-8783ecde';
        $certID = 'PRD-08faa0a3a85f-bc46-42ff-88d0-6908';
        //set the Server to use (Sandbox or Production)
        $serverUrl = 'https://api.ebay.com/ws/api.dll';      // server URL different for prod and sandbox
        
        $userToken = 'AgAAAA**AQAAAA**aAAAAA**qynvWA**nY+sHZ2PrBmdj6wVnY+sEZ2PrA2dj6wJl4KlAZiCpwydj6x9nY+seQ**VLIDAA**AAMAAA**J1j5M19DSoaZR6ZvpPtAggdcBcKE+33BfW5Dln5qis//mOQL00/tgYgAeIGW5HeEC/Qz2yQ7cL5k/jcrbZSniDcPuHWvBEWUnphE/W5dNJVPwn/rRZqWqGMd4X/Hu8qWegCoAag2Yq1wOX0u9TPR0poE9x1eDfHNl4s08g2bOHxgPYYsDtycWXdyi2aK1EEca3iKo6TuP3gxkqzHC70HY/G2lt/xFHKkvZ/HtzmpHeGFCZF/Mv6+cL3lubaAxf4+X6fXKgrJGyneTkwaVE00DTeCaN4H0/BWp4OF/wbrlHAW3F9fCzphXbfUo03VMf+04G93T4E4V2S/5gexjyxsHcR+ZPU0RGtsFjJtyuIp3fu5toA3aa1gh5M6YWYV2qJvH7JlLb9UCTIhKnzKCUBtVxr8wnkbuyEywARRtXvGcCayXI2QLH/nJ9dXgq+8cbif2KJXXv+iM/3MWi5Tr67cuQ/4sn3PObkbizUzMaOf03aEwyZWwJNTH9Q4c48N/zDiPlUQveCJ1WbT5mVoyDjTw6navq7HJN1tFH4BE5kORM9KVu3C5+mxi6EvKjTRMq4mGDkhN8igpS8yNi5avRjDuSDvAUbaqN6TLltWkCgNNsIZ7qy7PsALncqeOxUQRlSrjdCUTPPnYa4DnsJ96aBWQwddJnWIF6+nsOG578oUAPkHnGMez7JzSe7EeAqScVPIxa8a4ljbe3L7ibq00aNOQPNtskkoI5UGCrt03OGm0szFDgy8dmqDUj66hztuO3PM';





$siteID = 0;

$verb = 'GetOrders';

//$new_timestamp = strtotime('-1 days', strtotime(date("Y-m-d")));
//$CreateTimeFrom = date("Y-m-d",$new_timestamp); //GMT
//$CreateTimeTo = date("Y-m-d");
 $CreateTimeFrom = date("2017-05-13 07:00:00"); //GMT
$CreateTimeTo = date("2017-06-23 07:00:00"); 

$requestXmlBody = '<?xml version="1.0" encoding="utf-8" ?>';
$requestXmlBody .= '<GetOrdersRequest xmlns="urn:ebay:apis:eBLBaseComponents">';
$requestXmlBody .= '<DetailLevel>ReturnAll</DetailLevel>';
//$requestXmlBody .= '<NumberOfDays>1</NumberOfDays>';
$requestXmlBody .= "<CreateTimeFrom>$CreateTimeFrom</CreateTimeFrom><CreateTimeTo>$CreateTimeTo</CreateTimeTo>";
$requestXmlBody .= '<OrderRole>Seller</OrderRole><OrderStatus>All</OrderStatus>';
$requestXmlBody .= '<Pagination>GetOrdersRequestType<EntriesPerPage>1000</EntriesPerPage><PageNumber>'.$pagereturn.'</PageNumber></Pagination>';
$requestXmlBody .= '<SortingOrder>Ascending</SortingOrder>';
$requestXmlBody .= "<RequesterCredentials><eBayAuthToken>$userToken</eBayAuthToken></RequesterCredentials>";
$requestXmlBody .= '</GetOrdersRequest>';


			$headers = array (
			'X-EBAY-API-COMPATIBILITY-LEVEL: ' . $compatabilityLevel,
			'X-EBAY-API-DEV-NAME: ' . $devID,
			'X-EBAY-API-APP-NAME: ' . $appID,
			'X-EBAY-API-CERT-NAME: ' . $certID,
			'X-EBAY-API-CALL-NAME: ' . $verb,			
			'X-EBAY-API-SITEID: ' . $siteID
		); 
		
		
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
		curl_setopt($connection, CURLOPT_POSTFIELDS, $requestXmlBody);
		
		//set it to return the transfer as a string from curl_exec
		curl_setopt($connection, CURLOPT_RETURNTRANSFER, 1);
		
		//Send the Request
		$responsexml = curl_exec($connection);
		
		//close the connection
		curl_close($connection); 
		
$responseDoc = new DomDocument();
$order_detail=$responseDoc->loadXML($responsexml);
$errors = $responseDoc->getElementsByTagName('Errors');
$response = simplexml_import_dom($responseDoc);
 $entries = $response->PaginationResult->TotalNumberOfEntries;
$response = simplexml_import_dom($responseDoc);
$orders = $response->OrderArray->Order;




	$data['head_title'] = 'View Order List.';
		$data['active'] = 'order';
		$data['active_sub'] = 'view_order';
		$data['body_class'] = 'hold-transition skin-blue sidebar-mini';
		$data['userdata'] = $this->session->userdata('loggedin');
		$userdata1 = $this->session->userdata('loggedin');
		$data['response'] = $response;
		$data['pagereturn']=$pagereturn;
		$this->load->view('template/head',$data);
		$this->load->view('template/header',$data);
		$this->load->view('template/sidenav',$data);
	$this->load->view('backend/ebay_order/order-view',$data);
		$this->load->view('template/footer',$data);
		$this->load->view('template/foot',$data);

	}
}