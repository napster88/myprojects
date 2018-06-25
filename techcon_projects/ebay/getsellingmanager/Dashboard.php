<?php // if ( ! defined( 'ABSPATH' ) ) exit; 
session_start();
if(!isset($_SESSION['id']))
{
	header('location:index.php');
}

date_default_timezone_set('America/Los_Angeles');



echo date('Y-m-d H:i:sP') . "\n";
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

<span class="label_title"></span>
<span class="label_btn">Start/Stop Your Script</span>
<!-- Rounded switch -->
 <label class="switch">
 <input type="checkbox" class="start_stop" value="1">
  <div class="slider round"></div>
</label>
<div class="response"></div>


<?php  require_once('get-common/keys.php'); ?> 
<?php  require_once('get-common/eBaySession.php'); ?> 
<?php require_once('onload.php'); 

 
 require_once('get-common/dbconnect.php'); 

$siteID = 203;
//the call being made:
$verb = 'GetSellingManagerSoldListings';

 $pgno=isset($_GET['page_id'])?$_GET['page_id']:'1';
$CreateTimeFrom = date("2017-04-01"); //GMT
$CreateTimeTo = date("2017-05-02"); 
$page_no='';


 $requestXmlBody = '<?xml version="1.0" encoding="utf-8"?>';
$requestXmlBody .= '<GetSellingManagerSoldListingsRequest xmlns="urn:ebay:apis:eBLBaseComponents">';
 //$requestXmlBody .= '<Archived>1</Archived>';
// $requestXmlBody .= '<Filter>PaidNotShipped</Filter>';
 $requestXmlBody .= '<Pagination>GetSellingManagerSoldListings';
 $requestXmlBody .= '<EntriesPerPage>100</EntriesPerPage>';
 $requestXmlBody .= '<PageNumber>'.$pgno.'</PageNumber>';
 $requestXmlBody .= '</Pagination>';
 //$requestXmlBody .= '<SaleDateRange>dateTime';
//$requestXmlBody .= '<TimeFrom>'.$CreateTimeFrom.'</TimeFrom>';
  //$requestXmlBody .= '<TimeTo>'.$CreateTimeTo.'</TimeTo>';
//$requestXmlBody .= '</SaleDateRange>'; 
 $requestXmlBody .= '<RequesterCredentials><eBayAuthToken>'.$userToken.'</eBayAuthToken></RequesterCredentials>';
 
$requestXmlBody .= '</GetSellingManagerSoldListingsRequest>';
 



//Create a new eBay session with all details pulled in from included keys.php
$session = new eBaySession($userToken, $devID, $appID, $certID, $serverUrl, $compatabilityLevel, $siteID, $verb);
$responseXml = $session->sendHttpRequest($requestXmlBody);

$responseDoc = new DomDocument();
$order_detail=$responseDoc->loadXML($responseXml);
$errors = $responseDoc->getElementsByTagName('Errors');

$response = simplexml_import_dom($responseDoc);
//print_r($response);
echo $entries = $response->PaginationResult->TotalNumberOfEntries;
 
$response = simplexml_import_dom($responseDoc);

$page=$entries/100;
$page_no=(integer)$page;
$page_no;
if($page>$page_no)
{
	$page_no++;
} 
?>
<div class="table_shown">
<table class="m_table"><tr><th>Sr. No.</th><th>Record No.</th><th>Order ID</th><th>Order Status</th><th>Carrier Used</th><th>Tracking Num</th><th>CreatedTime</th></tr>
 <?php $last_trackorder=array();
 $order_id=array();
 $fake_track_num=array();
 $cm=($pgno-1)*100;
 $c=1+$cm;

  foreach ($response as $order) {
	//->SellingManagerSoldTransaction->CreationTime
	?>
	<tr><td></td><td><?php echo $order->SellingManagerSoldTransaction->SaleRecordID;?></td>
	
	<td><?php echo $order->SellingManagerSoldTransaction->OrderLineItemID;?></td>
	
<td><?php  echo $order->OrderStatus->ShippedStatus;  ?></td>

<td></td>
<?php
echo "<pre>";

print_r($order);

echo"</pre>";
?>
<td>
<?php
?>
</td>
<td><?php echo $order->CreationTime; ?></td>
</tr>
<?php 	
	

	 }

   
?>


</table>


</div>
</div>
<div class="pagination"><?php  
 for($i=1;$i<=$page_no;$i++)
{
	?><span style="padding:5px; align :center;"><a href="?page_id=<?php echo $i;?>"><?php echo $i;?></a></span><?php 
}  
?>
</div>
<style>
.pagination
{
	text-align: center;
}
.response
{
    
    font-family: sans-serif;
    padding:3px;
    font-weight:400;
}
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
.m_table td
{
	padding:5px;
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
padding-right: 28px;
padding-left: 28px;
/*margin: 131px 250 0 250;*/
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
  background-color: #5DB809;
}

input:focus + .slider {
  box-shadow: 0 0 1px #5DB809;
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

	
		var val='<?php echo $myval; ?>';
				
				if (val=="true")
				{
				jQuery('.start_stop').prop("checked",true);	
	              jQuery('.response').html('Your script is currently ON');
				}
				else
				{
				    jQuery('.response').html('Your script is currently OFF');
				}
				
	
	jQuery('.start_stop').change(function(){
		
		var mdata=jQuery(this).prop("checked");
		
		jQuery.ajax({                                      
			url: murl+'query.php',    
			type:'post', 
			data: { mdata:mdata},                      
            success: function(response)          //on recieve of reply
			{ 
			    
			   // jQuery('.response').empty();
			   
			    jQuery('.response').html(response);
			} 
		});
		
			
	});
	
});
</script>
</body>
</html>