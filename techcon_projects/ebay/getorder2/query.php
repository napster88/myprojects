<?php 
 require_once('get-common/dbconnect.php'); 
$val=$_POST['mdata'];



$mysql="UPDATE `start-stop` SET `status`='$val',`created_date`=now() WHERE `action`='start-stop'";
mysqli_query($dbc,$mysql);
?>