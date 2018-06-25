<?php
	if (!defined('sugarEntry') || !sugarEntry)die('Not A Valid Entry Point');
global $db;

$query="SELECT * FROM `mig_users`";
$result = $db->Query($query);
//$batchbean = BeanFactory::newBean('te_pr_Programs');
while ($row =$db->fetchByAssoc($result)){

	$bean = BeanFactory::newBean('te_student');
	echo "<pre>";

	$bean->sliq_student_id=$row['id'];
	$bean->name=$row['fname']." ".$row['lname'];
	$bean->email=$row['email'];
	$bean->mobile=$row['mobile_no'];
	$bean->dob=$row['dob'];
	$bean->gender=$row['gender'];
	$bean->status=$row['status'];
	$bean->permanent_address=$row['address'];
	$bean->city=$row['city_id'];
	$bean->state=$row['state_id'];
	$bean->country=$row['country_id'];
	$bean->pin_code=$row['pincode'];
	$bean->lms_username=$row['username'];
	$bean->lms_password=$row['password'];
	$bean->registration_no= $row['enrollment_id'];
	$bean->description=$row['profile_summary'];
	$bean->upload_image= $row['pic'];
	$bean->save();



	//die();
}

?>
