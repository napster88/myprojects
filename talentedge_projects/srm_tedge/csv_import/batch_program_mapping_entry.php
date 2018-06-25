
<?php
	if (!defined('sugarEntry') || !sugarEntry)die('Not A Valid Entry Point');
global $db;

$query="SELECT * FROM `course_session_mappings` ";
$result = $db->Query($query);

while ($row =$db->fetchByAssoc($result)){


$programbean = BeanFactory::getBean('te_pr_Programs');
$programList = $programbean->get_full_list('name',"te_pr_Programs.sliq_course_id = '$row[course_id]'",1,-1);
 $program_bean_id=$programList[0]->id;
//$instituteList = $programbean->get_full_list('name',"te_pr_Programs.sliq_program_id = '$row[course_id]'",1,-1);

$batchbean = BeanFactory::getBean('te_ba_Batch');
$batchList= $batchbean->get_full_list('name',"te_ba_Batch.sliq_batch_id = '$row[session_id]'",1,-1);


 $batch_bean_id=$batchList[0]->id;

$newbatchbean=BeanFactory::getBean('te_ba_Batch',$batch_bean_id);
$newbatchbean->load_relationship('te_pr_programs_te_ba_batch_1');

$newbatchbean->te_pr_programs_te_ba_batch_1->add($program_bean_id);
$newbatchbean->save();

}

?>
