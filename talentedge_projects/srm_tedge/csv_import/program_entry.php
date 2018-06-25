<?php
	if (!defined('sugarEntry') || !sugarEntry)die('Not A Valid Entry Point');
global $db;

$query="SELECT * FROM `courses`";
$result = $db->Query($query);
//$coursebean = BeanFactory::newBean('te_pr_Programs');
while ($row =$db->fetchByAssoc($result)){
	if($row['id']!=0)
{
	$coursebean = BeanFactory::newBean('te_pr_Programs');
	$coursebean->sliq_course_id=$row['id'];
	$coursebean->name=$row['name'];
	$coursebean->course_Short_name=$row['short_code'];
	$coursebean->description=$row['description'];
	$coursebean->no_of_Semester=4;
	$coursebean->deleted='0';
	$coursebean->is_active='1';
	$coursebean->save();
	$instBean = BeanFactory::getBean('te_in_institutes');
	$beanList = $instBean->get_full_list('name',"te_in_institutes.sliq_institute_id = '$row[institute_id]'",1,-1);
 $institute_bean_id=$beanList[0]->id;
 $coursebean->load_relationship('te_in_institutes_te_pr_programs_1');
$coursebean->te_in_institutes_te_pr_programs_1->add($institute_bean_id);
	$coursebean->save();
	//echo $institute_bean->id;

 }
}

?>
