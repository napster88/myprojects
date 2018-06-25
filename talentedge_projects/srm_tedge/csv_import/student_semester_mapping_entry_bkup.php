<?php
	if (!defined('sugarEntry') || !sugarEntry)die('Not A Valid Entry Point');
global $db;

$query="SELECT * FROM `user_semester_mappings`";
$result = $db->Query($query);

while ($row =$db->fetchByAssoc($result)){
echo "<pre>";
//print_r($row);
$studentbean = BeanFactory::getBean('te_student');
$studentList = $studentbean->get_full_list('name',"te_student.sliq_student_id = '$row[user_id]'",1,-1);
 $student_bean_id=$studentList[0]->id;
	//$instituteList = $programbean->get_full_list('name',"te_pr_Programs.sliq_program_id = '$row[course_id]'",1,-1);

	$batchbean = BeanFactory::getBean('te_ba_Batch');
	$batchList= $batchbean->get_full_list('name',"te_ba_Batch.sliq_batch_id = '$row[batch_id]'",1,-1);
	//print_r($batchList);
$batch_bean_name=$batchList[0]->name;
	 $batch_bean_id=$batchList[0]->id;
 	$batch_code=$batchList[0]->batch_code;
	$studentbatchbean = BeanFactory::newBean('te_student_batch');
		$studentbatchbean->name=$batch_bean_name;
		$studentbatchbean->te_ba_batch_id_c=$batch_bean_id;
		$studentbatchbean->batch_code=$batch_code;
		$studentbatchbean->save();
		$student_batch_bean_id=$studentbatchbean->id;

		$student_batch_bean=BeanFactory::getBean('te_student',$student_bean_id);
	 	$student_batch_bean->load_relationship('te_student_te_student_batch_1');
		$student_batch_bean->te_student_te_student_batch_1->add($student_batch_bean_id);
//print_r($student_batch_bean);
//$query1="INSERT INTO `te_student_te_student_batch_1_c`(`id`,  `te_student_te_student_batch_1te_student_ida`, `te_student_te_student_batch_1te_student_batch_idb`) VALUES ()"



		$student_batch_bean->save();
		echo 	$student_batch_bean->id;
/*
	$newstudentbean = BeanFactory::getBean('te_student_batch',$student_bean_id);
	$newstudentbean->load_relationship('te_student_te_student_batch_1');
	$newstudentbean->te_student_te_student_batch_1->add($batch_bean_id);
	$newstudentbean->save();

*/
}

?>
