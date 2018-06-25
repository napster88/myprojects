<?php



if (!defined('sugarEntry') || !sugarEntry)die('Not A Valid Entry Point');
global $app_list_strings,$current_user,$sugar_config,$db;
/* New */
if(!empty($_POST["country_id"])) {
	$query ="SELECT * FROM states WHERE countryID = '" . $_POST["country_id"] . "'";
	$result = $db->Query($query);
	$row =$db->fetchByAssoc($result) 


?>
	 <input name="city[{$i}]" type="text"  value="<?php echo $row["name"];?>" id='city'>
<?php
	}


if($_POST['source']=='centre'){
	global $db;
	$query ="UPDATE te_exammanager SET exam_center='".$_POST['centre']."' where id='".$_POST['id']."'; ";
	$result = $db->Query($query);

	echo "Centre Uploaded successfully!!";

}
?>
