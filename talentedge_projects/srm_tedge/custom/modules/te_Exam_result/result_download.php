<?php

require_once 'custom/include/fpdf/fpdf.php';


$pdf=new FPDF();
	global $db;

if(isset($_GET)){

	$sqls="SELECT s.`name`,s.email,s.registration_no,s.id AS studentid,sb.te_pr_programs_id_c as course_id,s.mobile,sb.added_specialization,b.id as batch_id,b.name as batch,sb.id,sb.current_sems AS currentsemid,csem.name AS currentsemname FROM `te_student` AS s INNER JOIN te_student_te_student_batch_1_c as ssbr ON ssbr.te_student_te_student_batch_1te_student_ida=s.id INNER JOIN te_student_batch as sb ON sb.id=ssbr.te_student_te_student_batch_1te_student_batch_idb INNER JOIN te_ba_batch AS b ON b.id=sb.te_ba_batch_id_c INNER JOIN te_te_semester AS csem ON sb.current_sems = csem.id WHERE s.deleted=0 AND s.`registration_no`='".$_GET['enrollid']."'";

	$studentObj =$db->query($sqls);
	$studentifo=array();
	while($Srow =$db->fetchByAssoc($studentObj)){
		  $studentID =$Srow['studentid'];
		  $registration_no=$Srow['registration_no'];
		  $name=$Srow['name'];
		  $batch=$Srow['batch'];
		  $course_id=$Srow['course_id'];
		  $sem_name=$Srow['currentsemname'];
		  $studentifo[]=$Srow;
	}

	$marks="Select te_marks.status,te_marks.description,te_marks.te_te_subject_id_c,te_marks.te_exam_result_te_exammarkste_exammarks_idb,t_marks.exam_type,t_marks.total_marks from (Select ter.status,ter.description,ter.te_te_subject_id_c,`te_exam_result_te_exammarkste_exammarks_idb` from te_exam_result ter INNER JOIN te_exam_result_te_exammarks_c term ON ter.id=term.te_exam_result_te_exammarkste_exam_result_ida	 where ter.`te_student_id_c`='".$studentID."') te_marks INNER JOIN te_exammarks t_marks ON te_marks.te_exam_result_te_exammarkste_exammarks_idb=t_marks.id";
	$resultObj_marks =$db->query($marks);

	$result=array();
	while($Srow =$db->fetchByAssoc($resultObj_marks)){
		  $result[]=$Srow;
	}
}
//var_dump(get_class_methods($pdf));

$pdf->AddPage();

$pdf->SetFont("Times","B","10");
$pdf->Cell(40,10,$pdf->Image('https://teja8.kuikr.com/images/QuikrEducation//image/institutev2/5537/Logo.jpg',10,1,30,0,'',''),0,0,C);
$pdf->Cell(100,10,"Venketeshwar Open University",0,1,C);

$pdf->Ln();
//$pdf->Image('C:\xampp\htdocs\srmpune\custom\modules\te_ExamManager.jpeg',40,0,0,0,'','');
//$pdf->Image("24-mewaruniversity.jpeg",10,10,189);
//$pdf->Image(0,10,"Mewar University Knowledge of Wisdom",1,1,C);

$pdf->SetFont("Times","B","10");
$pdf->MultiCell(0,10,"Result Exam feb-2018",1,C);
//$pdf->Cell(0,30,"Mewar University Knowledge of Wisdom",1,1,C);

$pdf->SetFont("Times","","10");
$pdf->Cell(100,10,'Enrollment Number:');
$pdf->Cell(100,10,"{$registration_no}",0,1);

$pdf->Cell(100,10,'Name: ');
$pdf->Cell(100,10,"{$name}",0,1);

$course="select name,result_description from te_pr_programs where id='".$course_id."'";
$course_data =$db->query($course);

while($Srow =$db->fetchByAssoc($course_data)){
	  $course_name=$Srow['name'];
		$result_description=$Srow['result_description'];
}

$pdf->Cell(100,10,'Program Name:');
$pdf->Cell(100,10,"{$course_name}",0,1);

$pdf->Cell(100,10,'Batch:');
$pdf->Cell(100,10,"{$batch}",0,1);

$pdf->Cell(100,10,'Specialisation:');
$pdf->Cell(100,10,"",0,1);

//$pdf->Cell(0,10,"Exam Scheduled",1,1,C);

$pdf->SetFont("Times","","10");
if(isset($_GET)){

	foreach($result as $result_val){

		$sql1="select `name` from `te_subjects_master` where `id`='".$result_val['te_te_subject_id_c']."'";
		$te_te_subject=$db->query($sql1);

		if($te_te_subject->num_rows>0){
			while($Srow =$db->fetchByAssoc($te_te_subject)){
					$sub_name=$Srow['name'];
			}
		}
		$subject_marks['sub_name']=$sub_name;
		$subject_marks['exam_type']=$result_val['exam_type'];
		$subject_marks['total_marks']=$result_val['total_marks'];
		$subject_marks['status']=$result_val['status'];
		$subject_marks['grade']=$result_val['description'];

		$data[$result_val['te_te_subject_id_c']][]=$subject_marks;

		/*$grade=$result_val['description'];
		$status=$result_val['status'];

		$pdf->Cell(50,10,"{$sem_name}");
		$pdf->Cell(50,10,"{$sub_name}");
		$pdf->Cell(50,10,"{$status}");
		$pdf->Cell(50,10,"{$grade}",0,1);*/
	}
}

foreach($data as $sub_id=>$marks_value){
	foreach($marks_value as $value){
		$marksvalue[$value['exam_type']]=$value['total_marks'];
	}

	$marks_type=$marksvalue;
	$data_marks[$sub_id]=$marksvalue;
	//$marksvalue['sub_name']=$marks_value['sub_name'];

	//$marksvalue['grade']=$marks_value['grade'];

}


$pdf->SetFont("Times","B","10");
$pdf->Cell(30,10,'Semester');
$pdf->Cell(30,10,'Subject');

foreach($marks_type as $s_id=>$m_value){
	$pdf->Cell(30,10,"{$s_id}");
}
$pdf->Cell(30,10,'Result');
$pdf->Cell(30,10,'Grade',0,0);
$pdf->Cell(30,10,'Total',0,1);

$pdf->SetFont("Times","","10");
foreach($data as $k=>$marks_fix){
	$total_marks=0;
	$sub_name=$marks_fix[0]['sub_name'];
	$status=$marks_fix[0]['status'];
	$grade=$marks_fix[0]['grade'];
	$pdf->Cell(30,10,"{$sem_name}");
	$pdf->Cell(30,10,"{$sub_name}");

	foreach($data_marks as $m_key=>$d_marks){
		if($m_key==$k){
			foreach($d_marks as $d){
				$total_marks+=$d;
				$pdf->Cell(30,10,"{$d}");
			}
		}
	}

	$pdf->Cell(30,10,"{$status}");
	$pdf->Cell(30,10,"{$grade}",0,0);
	$pdf->Cell(30,10,"{$total_marks}",0,1);
}
//print_r($data_marks);

$pdf->SetFont("Arial","","10");

$pdf->Ln();
$pdf->MultiCell(0,5,"{$result_description}",0,1);
$pdf->Ln();

//$pdf->Cell(0,5,"*The above results are for display only",0,1);
//$pdf->Cell(0,5,'B:No candidaes allow in centre without hall ticket',0,1);
//$pdf->Cell(0,5,'C:students should reach before 15 miuites',0,1);

$pdf->SetFont("Arial","","10");
//$pdf->Cell(0,10,"*Facility to display the general comminication and guidelines below the online result",0,1);
$pdf->WriteHTML("<h1>kapil </h1>");
$pdf->Output();

?>
