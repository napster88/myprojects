<?php
	if (!defined('sugarEntry') || !sugarEntry)die('Not A Valid Entry Point');
global $db;

$query="SELECT * FROM `sessions`";
$result = $db->Query($query);
//$batchbean = BeanFactory::newBean('te_pr_Programs');
while ($row =$db->fetchByAssoc($result)){
	$batchbean = BeanFactory::newBean('te_ba_Batch');
	$batchbean->sliq_batch_id=$row['id'];
	$batchbean->name=$row['name'];
	$batchbean->batch_code=$row['short_code'];
	$batchbean->batch_start_date=$row['start_date'];
	//$batchbean->no_of_Semester=$row['end_date'];
//	$batchbean->batch_status='1';
	$batchbean->is_deleted='0';
	$batchbean->save();
	$instBean = BeanFactory::getBean('te_in_institutes');
	$beanList = $instBean->get_full_list('name',"te_in_institutes.sliq_institute_id = '$row[institute_id]'",1,-1);
 $institute_bean_id=$beanList[0]->id;
 	$batchbean->load_relationship('te_in_institutes_te_ba_batch_1');
	$batchbean->te_in_institutes_te_ba_batch_1->add($institute_bean_id);
	$batchbean->save();

}

?>
