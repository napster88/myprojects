<?php 
  require_once('get-common/dbconnect.php'); 

$myval='';
$mysqlm="SELECT * FROM `start-stop` WHERE `action`='start-stop'";
$resultm=mysqli_query($dbc,$mysqlm);
while($row=mysqli_fetch_array($resultm))
 {
	$myval= $row['status'];
	
 }  

?>