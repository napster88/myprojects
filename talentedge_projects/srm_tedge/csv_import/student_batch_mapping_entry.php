<?php
	if (!defined('sugarEntry') || !sugarEntry)die('Not A Valid Entry Point');
global $db;

		$query_sem="SELECT * FROM `user_semester_mappings`";
		//user_id=te_student->id;
		//session_id=te_ba_batch->id;
		//semester_id=get_full list
		$result_sem =  $db->Query($query_sem);
		while ($row_sem =$db->fetchByAssoc($result_sem)){
//echo $row_sem[user_id].'xxd';
//print_r($row_sem);
			$studentbean = BeanFactory::getBean('te_student');

			$studentList = $studentbean->get_full_list('name',"te_student.sliq_student_id = '$row_sem[user_id]'",1,-1);

			$tesemester=BeanFactory::getBean('te_te_semester');
			$semesterList= $tesemester->get_full_list('name',"te_te_semester.sliq_semester_id = '$row_sem[semester_id]'",1,-1);
			echo  $sem_bean=	$semesterList[0]->id;
			echo "sem is: ".	$semester_bean_id=$semesterList[0]->id;
			echo "<br/>";
			$program_bean_id='';
				 	$semester_bean_name=$semesterList[0]->name;
						$semester=BeanFactory::getBean('te_te_semester',$semester_bean_id);

		$semester->load_relationship('te_pr_programs_te_te_semester_1');
	$prog_detail=$semester->te_pr_programs_te_te_semester_1->getBeans();
	echo "<pre>";
//	print_r($prog_detail);
	foreach($prog_detail as $key=>$val)
	{
		$program_bean_id=$val->id;
	$institute_bean_id=	$val->te_in_institutes_te_pr_programs_1te_in_institutes_ida;
	}
//echo 'prog_id'.$program_bean_id;

			 $batchbean = BeanFactory::getBean('te_ba_Batch');
		 	$batchList= $batchbean->get_full_list('name',"te_ba_Batch.sliq_batch_id = '$row_sem[session_id]'",1,-1);

			echo	"student id is: ".	 $student_bean_id=$studentList[0]->id;
			echo '<br/>';
			echo	"student name is: ".		 $student_bean_name=$studentList[0]->name;

		 	$batch_bean_name=$batchList[0]->name;
		 	echo "<br/>";
		 	$batch_bean_id=$batchList[0]->id;
		 	echo "<br/>";
		  	$batch_code=$batchList[0]->batch_code;
		 	echo "<br/>";




		//		$semester_id=$row_sem['semester_id'];
			//	$semesterbean = BeanFactory::getBean('te_te_semester');
				//$semesterList= $semesterbean->get_full_list('name',"te_te_semester.sliq_semester_id = '$semester_id'",1,-1);

	//	}

		//get data from table user semester mappings
			$studentbatchbean = BeanFactory::newBean('te_student_batch');
			$studentbatchbean->name=$batch_bean_name;
			$studentbatchbean->te_ba_batch_id_c=$batch_bean_id;
			$studentbatchbean->batch_code=$batch_code;
			$studentbatchbean->te_pr_programs_id_c=$program_bean_id;
		$studentbatchbean->current_sems=$semester_bean_id;
		$studentbatchbean->sem_status='Enroll';
		$bean_id=create_guid();
		$query1="INSERT INTO `te_student_batch`(
			`id`,`name`, `te_ba_batch_id_c`,`batch_code`,`te_in_institutes_id_c`,`te_pr_programs_id_c`,`current_sems`,`sem_status`)
		 VALUES ('$bean_id' , '$batch_bean_name','$batch_bean_id', '$batch_code','$institute_bean_id','$program_bean_id','$semester_bean_id',
			'Enroll')";
		$db->Query($query1);


	//	print_r($studentbatchbean);
	//	$studentbatchbean->save();
		$student_batch_bean_id=$bean_id;
		$student_batch_bean=BeanFactory::getBean('te_student',$student_bean_id);
		$student_batch_bean->load_relationship('te_student_te_student_batch_1');
		$student_batch_bean->te_student_te_student_batch_1->add($student_batch_bean_id);
		$student_batch_bean->save();

}

?>
