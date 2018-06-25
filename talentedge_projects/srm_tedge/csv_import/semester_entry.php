<?php
	if (!defined('sugarEntry') || !sugarEntry)die('Not A Valid Entry Point');
global $db;

$query="SELECT * FROM `semesters`";
$result = $db->Query($query);
//$batchbean = BeanFactory::newBean('te_pr_Programs');
while ($row =$db->fetchByAssoc($result)){
	$batchbean = BeanFactory::newBean('te_te_semester');
	$batchbean->sliq_semester_id=$row['id'];
	$batchbean->name=$row['name'];
	$batchbean->deleted='0';
	$batchbean->save();
	$progBean = BeanFactory::getBean('te_pr_Programs');
	$progList = $progBean->get_full_list('name',"te_pr_Programs.sliq_course_id = '$row[course_id]'",1,-1);
 	$prog_bean_id=$progList[0]->id;
 	$batchbean->load_relationship('te_pr_programs_te_te_semester_1');
	$batchbean->te_pr_programs_te_te_semester_1->add($prog_bean_id);
	$batchbean->save();
}
?>
