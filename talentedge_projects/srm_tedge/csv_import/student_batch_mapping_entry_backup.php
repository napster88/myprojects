<?php
	if (!defined('sugarEntry') || !sugarEntry)die('Not A Valid Entry Point');
global $db;

$query="SELECT * FROM `user_batch_mappings`";
$result = $db->Query($query);

while ($row =$db->fetchByAssoc($result)){

$studentbean = BeanFactory::getBean('te_student');
$studentList = $studentbean->get_full_list('name',"te_student.sliq_student_id = '$row[user_id]'",1,-1);
 $student_bean_id=$studentList[0]->id;
	$batchbean = BeanFactory::getBean('te_ba_Batch');
	$batchList= $batchbean->get_full_list('name',"te_ba_Batch.sliq_batch_id = '$row[batch_id]'",1,-1);
	echo $batch_bean_name=$batchList[0]->name;
	echo "<br/>";
	echo $batch_bean_id=$batchList[0]->id;
	echo "<br/>";
 	echo $batch_code=$batchList[0]->batch_code;
	echo "<br/>";

		$studentbatchbean = BeanFactory::newBean('te_student_batch');
		$studentbatchbean->name=$batch_bean_name;
		$studentbatchbean->te_ba_batch_id_c=$batch_bean_id;
		$studentbatchbean->batch_code=$batch_code;

	$semester_bean_id='';
		$query_sem="SELECT * FROM `user_semester_mappings` WHERE `user_id`=$row[user_id] && `session_id`=$row[batch_id]";
		$result_sem =  $db->Query($query_sem);

		while ($row_sem =$db->fetchByAssoc($result_sem)){
				$semester_id=$row_sem['semester_id'];
				$semesterbean = BeanFactory::getBean('te_te_semester');
				$semesterList= $semesterbean->get_full_list('name',"te_te_semester.sliq_semester_id = '$semester_id'",1,-1);
			echo	$semester_bean_id=$semesterList[0]->id;
			echo "<br/>";

		}

		//get data from table user semester mappings
		$studentbatchbean->current_sems=$semester_bean_id;
		$studentbatchbean->sem_status='Enroll';
		$studentbatchbean->save();
		$student_batch_bean_id=$studentbatchbean->id;

	$student_batch_bean=BeanFactory::getBean('te_student',$student_bean_id);
		$student_batch_bean->load_relationship('te_student_te_student_batch_1');
	$student_batch_bean->te_student_te_student_batch_1->add($student_batch_bean_id);
	$student_batch_bean->save();
		//$student_batch_bean->id;

}

?>
