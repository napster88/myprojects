<?php
	if (!defined('sugarEntry') || !sugarEntry)die('Not A Valid Entry Point');
global $db;

$st_array=array(
MUR1701187,
MUR1701188,
MUR1701189,
MUR1701190,
MUR1701279,
MUR1701285,
MUR1701286,
MUR1701295,
MUR1701301,
MUR1701306,
MUR1701308,
MUR1701321,
MUR1701322,
MUR1701330,
MUR1701331,
MUR1701332,
MUR1701336,
MUR1701337,
MUR1701364,
MUR1801324
);

//print_r($st_array);
echo 'university,Enrollment ID, Batch_code,Exam Month/Date,Course,Semester ,Subject_code,Exam_name,Exam Scores';
	echo "<br/>";






	foreach($st_array as $erollment_no)
	{
		$bean = BeanFactory::newBean('te_student');
		$stList = $bean->get_full_list('name',"te_student.registration_no = '$erollment_no'",1,-1);
		$student_bean_id=$stList[0]->id;
		$student_name=$stList[0]->name;
	$student_batch_bean=BeanFactory::getBean('te_student',$student_bean_id);
		$student_batch_bean->load_relationship('te_student_te_student_batch_1');
		$m=$student_batch_bean->te_student_te_student_batch_1->getBeans();
		$batch_bean_id='';
		$prog_bean_id='';
		foreach($m as $key=>$val)
		{
			$batch_bean_id=$val->te_ba_batch_id_c;
			$prog_bean_id=$val->te_pr_programs_id_c;
		}

	$batchlistbean = BeanFactory::getBean('te_ba_Batch',$batch_bean_id);

		$batchlistbean->load_relationship('te_pr_programs_te_ba_batch_1');
		$m=$batchlistbean->te_pr_programs_te_ba_batch_1->getBeans();

	$inst_name='';
	$course_name='';
		foreach($m as $key=>$val)
		{

		$inst_name=$val->te_in_institutes_te_pr_programs_1_name;
		 //$course_name=$val->name;
		}

		$progbean = BeanFactory::getBean('te_pr_Programs',$prog_bean_id);
		$course_name= $progbean->name;
		$progbean->load_relationship('te_pr_programs_te_te_semester_1');
		$proglistbeans=$progbean->te_pr_programs_te_te_semester_1->getBeans();

		foreach($proglistbeans as $prog_id=>$val)
		{
			$subbean = BeanFactory::getBean('te_te_semester',$prog_id);
			$semester=$val->name;

			$subbean->load_relationship('te_subjects_master_te_te_semester_1');
			$sublistbean=$subbean->te_subjects_master_te_te_semester_1->getBeans();
		//	echo  "subject list:";
			$day=19;

			foreach($sublistbean as $subkey=>$val)
			{
				$exam_date='2018-2-'.$day;
		 $val->name. '('.$val->subject_code.')';

		$subject_id=$val->id;


	echo $inst_name.','.$erollment_no.','.$batchlistbean->batch_code.','.$exam_date.','.$course_name.','.$semester.','.$val->subject_code.',External';
		echo "<br/>";
	echo $inst_name.','.$erollment_no.','.$batchlistbean->batch_code.','.$exam_date.','.$course_name.','.$semester.','.$val->subject_code.',Assignment 1';
	echo "<br/>";
	echo $inst_name.','.$erollment_no.','.$batchlistbean->batch_code.','.$exam_date.','.$course_name.','.$semester.','.$val->subject_code.',Assignment 2';
	echo "<br/>";
		$bean_id=create_guid();
		$query1="INSERT INTO `te_exammanager`(`id`,`name`, `subject`,`city`,`state`,`exam_date`,`exam_time`,`exam_status`,`te_student_id_c`)
		 VALUES ('$bean_id' , '$erollment_no', '$val->id','Faridabad','HR','$exam_date','10:30 AM-12:00 PM','Active','$student_bean_id')";
		$db->Query($query1);

	$day++;
		 //as name

	}

		}

	}


	/* $query="SELECT * FROM `examdata_migrations`";
	$result = $db->Query($query);

	while ($row =$db->fetchByAssoc($result)){
		echo "<pre>";
		print_r($row);
		$studentbean = BeanFactory::newBean('te_student');
		$studentList = $studentbean->get_full_list('name',"te_student.lms_username = '$row[Student_ID]'",1,-1);
	 	echo $student_bean_id=$studentList[0]->id;
	  echo $student_bean_name=$studentList[0]->name;
		echo $student_bean_reg=$studentList[0]->registration_no;
		echo $student_sliq_id=$studentList[0]->sliq_student_id;

		$subjectlistbean = BeanFactory::newBean('te_Subjects_master');
		$subjectbean = $subjectlistbean->get_full_list('name',"te_Subjects_master.sliq_subjects_id = '$row[Subject_ID]'",1,-1);
		echo '<br/>';
		echo $subject_bean_id= $subjectbean[0]->id;
		echo '<br/>';
		echo $subject_name= $subjectbean[0]->name;
		echo $subject_code=$subjectbean[0]->subject_code;
		$subject_totalmarks=$subjectbean[0]->overall_total_marks;
		$subject_passingmarks=$subjectbean[0]->overall_passing_marks;




		$semlistbean = BeanFactory::newBean('te_te_semester');
		$sembean = $semlistbean->get_full_list('name',"te_te_semester.sliq_semester_id = '$row[Semester_ID]'",1,-1);
		echo '<br/>';
		echo $sem_bean_id= $sembean[0]->id;
		echo '<br/>';
		echo $sem_name= $sembean[0]->name;
	//	echo $subject_code=$subjectbean[0]->subject_code;
	//	$subject_totalmarks=$subjectbean[0]->overall_total_marks;
	//	$subject_passingmarks=$subjectbean[0]->overall_passing_marks;
	$proglistbean = BeanFactory::newBean('te_pr_Programs');
	$progbean = $proglistbean->get_full_list('name',"te_pr_Programs.sliq_course_id = '$row[Course_ID]'",1,-1);
	echo '<br/>';
	echo $prog_bean_id= $progbean[0]->id;
	echo '<br/>';
	echo $prog_name= $progbean[0]->name;


	$batchlistbean = BeanFactory::newBean('te_ba_Batch');
	$batchbean = $batchlistbean->get_full_list('name',"te_ba_Batch.sliq_batch_id = '$row[Session_ID]'",1,-1);
	echo '<br/>';
	echo $batch_bean_id= $batchbean[0]->id;
	echo '<br/>';
	echo $batch_name= $batchbean[0]->name;

		die();

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
	//	$bean->save();



		//die();
	}
	*/
?>
