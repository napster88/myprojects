<?php
global $db;
if(isset($_REQUEST['name']));
{
	$VAL=$_REQUEST['name'];
	$Rid=$_REQUEST['Recordid'];
	
}
	
echo "<script type='text/javascript'>alert('Record Already Active Founnd For this! $VAL')</script>";
echo "The record that already Active please cheack exists.
      click Back to Button to return to the Select New institute With This Program.";

//echo '<script> <button onclick="window.location.href="index.php?action=ajaxui#ajaxUILoc=index.php%3Fmodule%3Dte_te_semester%26action%3DDetailView%26record%3D$Rid">Back to create </button></script>';

 //echo '<script> alert("You can\'t add duplicate lead");callPage(); function callPage(){  window.location.href="index.php?module=Leads&action=ListView&record=' . $bean->id . '" } </script>';
              //  exit();
