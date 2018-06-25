<?php // if ( ! defined( 'ABSPATH' ) ) exit; 
session_start();
if(!isset($_SESSION['id']))
{
	header('location:index.php');
}

 ?>

<html>

<head>
<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.17/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.17/jquery-ui.min.js"></script>
</head>
<body>
<div class="dashboard">
<span class="label_Logout"><a href="logout.php">Logout</a></span><span class="label_change"><a href="changepwd.php"></a></span>

<span class="label_title">Dashboard</span>
<span class="label_btn">Start/Stop Your Script</span>
<!-- Rounded switch -->
 <label class="switch">
 <input type="checkbox" class="start_stop" value="1">
  <div class="slider round"></div>
</label>


<?php // require_once('get-common/keys.php'); ?> 
<?php // require_once('get-common/eBaySession.php'); ?> 
<?php require_once('onload.php'); 
/* 
 
 require_once('get-common/dbconnect.php'); 
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
$CreateTimeFrom = gmdate("2017-04-16\T12:01:01"); //GMT
$CreateTimeTo = gmdate("2017-04-18\T23:59:59"); //GMT
///Build the request Xml string
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
$response = simplexml_import_dom($responseDoc);
$orders = $response->OrderArray->Order;

?>
<div class="table_shown">
<table style="width:850px;"><tr><th>Order ID</th><th>Order Status</th><th>Carrier Used</th><th>Tracking Num</th><th>CreatedTime</th></tr>
 <?php $last_trackorder=array();
 $order_id=array();
 $fake_track_num=array();
 
 foreach ($orders as $order) {
	 $carries= $order->TransactionArray->Transaction->ShippingDetails->ShipmentTrackingDetails->ShippingCarrierUsed;
	 $ship_num=$order->TransactionArray->Transaction->ShippingDetails->ShipmentTrackingDetails->ShipmentTrackingNumber;
	 $status=(string)$order->OrderStatus;
	 
	 $date = new DateTime($order->CreatedTime);
	 ?> <tr><td>
	<?php  echo $order->OrderID; ?></td><td>
	<?php  echo $status ; ?></td>
	<td><?php echo  $carries;?></td>
	 <td><?php echo $ship_num ?></td>
	<td>
	
	<?php echo $date->format('Y-m-d'); ?>
	</td>
	</tr>
 <?php }
 
   */
?>


</table>
</div>
</div>
<style>
.label_change,
.label_Logout
{
	text-align:right;
	
font-family: sans-serif;
font-weight: 800;

}
.table_shown
{
	overflow-y:scroll;
	height:500px;
	
}
.label_title
{
	display:none;
	text-align:center;
	font-family: fantasy;
	font-size:30px;
	color: #2196F3;
}

.label_btn
{
	text-align:left;
	font-family: fantasy;
	font-size:20px;
	padding-bottom:10px;
}
.dashboard span{
	display:block;
}
.dashboard{
	
	
	border: solid 1px #000;
padding: 28px;
margin: 131px 250 0 250;
min-height: 300px;
}
/* The switch - the box around the slider */
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

/* Hide default HTML checkbox */
.switch input {display:none;}

/* The slider */
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
 height: 28px;
width: 27px;
left: 2px;
bottom: 3px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(48px);
  -ms-transform: translateX(48px);
  transform: translateX(48px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
  width: 80px;

}

.slider.round:before {
  border-radius: 50%;
}

</style>
<script>
jQuery(document).ready(function()
{
	var myURL=window.location.href;
	var murl=myURL.substring( 0, myURL.lastIndexOf( "/" ) + 1);
console.log(murl);
	
		var val='<?php echo $myval; ?>';
				
				if (val=="true")		
				jQuery('.start_stop').prop("checked",true);	
	 
	
	jQuery('.start_stop').change(function(){
		
		var mdata=jQuery(this).prop("checked");
		
		jQuery.ajax({                                      
			url: murl+'query.php',    
			type:'post', 
			data: { mdata:mdata},                      
            success: function(response)          //on recieve of reply
			{    } 
		});
		
			
	});
	
});
</script>
</body>
</html>