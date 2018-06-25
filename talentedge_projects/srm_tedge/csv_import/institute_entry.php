<?php
	if (!defined('sugarEntry') || !sugarEntry)die('Not A Valid Entry Point');
//$bean = BeanFactory::newBean('te_in_institutes');

global $db;

$query="SELECT * FROM `institutes` ";

$result = $db->Query($query);

while ($row =$db->fetchByAssoc($result)){
  $bean = BeanFactory::newBean('te_in_institutes');
  $bean->sliq_institute_id=$row['id'];
  $bean->name=$row['name'];
  $bean->description=$row['description'];
  $bean->short_name=$row['short_code'];
  $bean->institute_code=$row['short_code'];
  $bean->address_line1=$row['address'];
  $bean->deleted=0;
  $bean->Pincode=$row['pincode'];
  $bean->email=$row['email'];

  $bean->faxnumber=$row['contact_no'];

  $bean->save();

}


  //Populate bean fields
//$bean->save();
?>
