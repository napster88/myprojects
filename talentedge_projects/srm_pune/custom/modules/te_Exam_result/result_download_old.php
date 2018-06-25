<?php
require_once 'custom/include/fpdf/fpdf.php';

$pdf=new FPDF('P','mm','A4');
global $db;

if(isset($_GET)){

	$sqls="SELECT id as studentid,name from te_student where `registration_no`='".$_GET['enrollid']."'";
	$studentObj =$db->query($sqls);
	$studentifo=array();
	$Srow =$db->fetchByAssoc($studentObj);

	$studentID =$Srow['studentid'];
	$registration_no=$_GET['enrollid'];
	$name=$Srow['name'];
	$studentifo[]=$Srow;

	/** JOIN BETWEEN EXAM_RESULT,EXAM_MARKS AND SUBJECT_MASTER*/
	$marks="SELECT name,exam_data.status,exam_data.description,exam_data.te_te_subject_id_c,exam_data.overallmarks,
exam_data.total_marks,exam_data.exam_type FROM (SELECT te_marks.status,te_marks.description,te_marks.te_te_subject_id_c,te_marks.te_exam_result_te_exammarkste_exammarks_idb,t_marks.exam_type,t_marks.total_marks,te_marks.total_marks as overallmarks from (Select ter.status,ter.description,ter.te_te_subject_id_c,ter.total_marks,`te_exam_result_te_exammarkste_exammarks_idb` from te_exam_result ter INNER JOIN te_exam_result_te_exammarks_c term ON ter.id=term.te_exam_result_te_exammarkste_exam_result_ida	 where ter.`te_student_id_c`='".$studentID."') te_marks INNER JOIN te_exammarks t_marks ON te_marks.te_exam_result_te_exammarkste_exammarks_idb=t_marks.id WHERE te_marks.status!='TBD') exam_data INNER JOIN te_subjects_master tsm ON tsm.id=exam_data.te_te_subject_id_c;";
	$resultObj_marks =$db->query($marks);

	$result=array();
	while($Srow =$db->fetchByAssoc($resultObj_marks)){
		  $result[]=$Srow;
	}


	/** JOIN BETWEEN STUDENT BATCH AND TE_STUDENT AND BATCH TABLE */
	$idcard_student="SELECT name,b_stu.institute_id,b_stu.course,b_stu.current_sems from(SELECT te_in_institutes_id_c as institute_id,te_pr_programs_id_c as course,current_sems,te_ba_batch_id_c as batch_id from (select `te_student_te_student_batch_1te_student_batch_idb` from te_student ts INNER JOIN te_student_te_student_batch_1_c tsb ON ts.id=tsb.te_student_te_student_batch_1te_student_ida where ts.id='".$studentID."') std_rel INNER JOIN `te_student_batch` std_batch ON std_batch.id=std_rel.te_student_te_student_batch_1te_student_batch_idb)b_stu INNER JOIN te_ba_batch t_batch ON t_batch.id=b_stu.batch_id;";
	$get_institute=$db->query($idcard_student);
	$Srow =$db->fetchByAssoc($get_institute);
	$course_id=$Srow['course'];
	$batch=$Srow['name'];

	$type_data="SELECT type.name,type.exam_type FROM (SELECT e_t.te_exam_types_te_exam_schemete_exam_types_idb as exam_typeid FROM (SELECT ts.id FROM te_exam_scheme_te_pr_programs_c tep INNER JOIN te_exam_scheme ts ON tep.te_exam_scheme_te_pr_programste_exam_scheme_ida=ts.id where tep.te_exam_scheme_te_pr_programste_pr_programs_idb='".$course_id."') tsch_r INNER JOIN te_exam_types_te_exam_scheme_c e_t ON e_t.te_exam_types_te_exam_schemete_exam_scheme_ida=tsch_r.id) exam_type INNER JOIN te_exam_types type ON exam_type.exam_typeid=type.id;";
	$get_exam_type=$db->query($type_data);

	while($Srow_type =$db->fetchByAssoc($get_exam_type)){
		$Srows[]=$Srow_type;
	}

	/** JOIN BETWEEN SUBJECT MASTER AND TE_SEMESTER*/
	$sem_info=" SELECT subj.name,subj.id,GROUP_CONCAT(DISTINCT t_sbj.te_subjects_master_te_te_semester_1te_subjects_master_ida SEPARATOR ',')as subject_id FROM (SELECT t_sem.name,t_sem.id from te_te_semester t_sem INNER JOIN te_pr_programs_te_te_semester_1_c prog_sem ON t_sem.id=prog_sem.te_pr_programs_te_te_semester_1te_te_semester_idb where prog_sem.te_pr_programs_te_te_semester_1te_pr_programs_ida='".$course_id."') subj INNER JOIN te_subjects_master_te_te_semester_1_c t_sbj ON subj.id=t_sbj.te_subjects_master_te_te_semester_1te_te_semester_idb GROUP BY subj.name;";
	$get_sem_info=$db->query($sem_info);

	while($sem_name =$db->fetchByAssoc($get_sem_info)){
		$semesters[]=$sem_name;
	}

	/** Query to get institute information by Id*/
	$institute_info="SELECT `id`,`name`,`logo`,`logo_two`,`allow_score`,`allow_grade`,`allow_both` from te_in_institutes where id='".$Srow['institute_id']."'";
	$get_institute_info=$db->query($institute_info);
	$institute_row =$db->fetchByAssoc($get_institute_info);
}
//var_dump(get_class_methods($pdf));
//print_r($institute_row);
$pdf->AddPage();

$filename='./upload/'.$Srow['institute_id'].'_logo';
if (!$institute_row['logo']){

	$pdf->SetFont("Times","","7");
	$pdf->Cell(50,10,$pdf->Image('http://www.ropeworksgear.com/site/skin/img/no-image.jpg',5,5,50,0,'',''),0,0);
}
else {

	$dir='./upload/logo';
	if(is_dir($dir)===false){
		mkdir($dir);
	}

	if (rename($filename,'./upload/logo/'.$institute_row['logo']))
	{

		/** Add Logo*/
		$pdf->SetFont("Arial","","7");
		$pdf->Cell(50,10,$pdf->Image('./upload/logo/'.$institute_row['logo'],5,5,50,0,'',''),0,0);
	}
	else{

		if(count(scandir('./upload/logo/')) == 2) {
			$pdf->SetFont("Arial","","7");
			$pdf->Cell(50,10,$pdf->Image('http://www.ropeworksgear.com/site/skin/img/no-image.jpg',5,5,40,0,'',''),0,0);
		} else {
		   $pdf->SetFont("Arial","","7");
		   $pdf->Cell(50,10,$pdf->Image('./upload/logo/'.$institute_row['logo'],5,5,50,0,'',''),0,0);

		}
	}
}

//$pdf->Cell(40,10,$pdf->Image('https://teja8.kuikr.com/images/QuikrEducation//image/institutev2/5537/Logo.jpg',10,1,30,0,'',''),0,0,C);


$pdf->SetFont("Arial","B","12");
$pdf->Ln();
//if(!empty($institute_row['logo_two']))
//{
 //$imgn=$institute_row['logo_two'];
//	$pdf->Cell(50,10,$pdf->Image('./upload/logo'.$imgn,155,5,50,0,'',''),0,0);

//}

//else {
	$pdf->Cell(50,10,$pdf->Image('http://www.ropeworksgear.com/site/skin/img/no-image.jpg',155,5,50,0,'',''),0,0);
//}
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont("Arial","","10");
$pdf->SetFont("Arial","B","12");
$pdf->MultiCell(0,10,"{$institute_row['name']}",0,C,0);
//$pdf->Image('C:\xampp\htdocs\srmpune\custom\modules\te_ExamManager.jpeg',40,0,0,0,'','');
//$pdf->Image("24-mewaruniversity.jpeg",10,10,189);
//$pdf->Image(0,10,"Mewar University Knowledge of Wisdom",1,1,C);

$pdf->SetFont("Arial","B","12");
$pdf->MultiCell(0,10,"ONLINE RESULT",0,C,0);
$pdf->MultiCell(0,10,"");

//$pdf->Cell(0,30,"Mewar University Knowledge of Wisdom",1,1,C);
//$pdf->Ln();

$pdf->SetFont("Arial","B","10");
$pdf->Cell(50,7,'Enrollment Number-',0,0,L);
$pdf->SetFont("Arial","","10");
$pdf->Cell(50,7,"{$registration_no}",0,1);

$pdf->SetFont("Arial","B","10");
$pdf->Cell(50,7,'Name-',0,0,L);
$pdf->SetFont("Arial","","10");
$pdf->Cell(50,7,"{$name}",0,1);

$course="select name, result_description from te_pr_programs where id='".$course_id."'";
$course_data =$db->query($course);
$Srow =$db->fetchByAssoc($course_data);
$course_name=$Srow['name'];
	$result_description=$Srow['result_description'];


$pdf->SetFont("Arial","B","10");
$pdf->Cell(50,7,'Program Name-',0,0,L);
$pdf->SetFont("Arial","","10");
$pdf->Cell(50,7,"{$course_name}",0,1);

$pdf->SetFont("Arial","B","10");
$pdf->Cell(50,7,'Batch-',0,0,L);
$pdf->SetFont("Arial","","10");
$pdf->Cell(50,7,"{$batch}",0,1);

$pdf->SetFont("Arial","B","10");
$pdf->Cell(50,7,'Specialization-',0,0,L);
$pdf->SetFont("Arial","","10");
$pdf->Cell(50,7,"",0,1);
$pdf->MultiCell(0,10,"");
//$pdf->Cell(0,10,"Exam Scheduled",1,1,C);

$pdf->SetFont("Arial","","10");


if(isset($_GET)){

	foreach($result as $result_val){
		$subject_marks['sub_name']=$result_val['name'];
		$subject_marks['exam_type']=$result_val['exam_type'];
		$subject_marks['total_marks']=$result_val['total_marks'];
		$subject_marks['status']=$result_val['status'];
		$subject_marks['grade']=$result_val['description'];
		$subject_marks['overallmarks']=$result_val['overallmarks'];

		$data[$result_val['te_te_subject_id_c']][]=$subject_marks;
	}
}

foreach($data as $sub_id=>$marks_value){

	foreach($semesters as $k=>$value){
		$subject_array=explode(',',$value['subject_id']);
		if(in_array($sub_id,$subject_array)){
			$sem_name1[$sub_id][]=$value['name'];
		}
	}

	foreach($marks_value as $value){
		$marksvalue[$value['exam_type']]=$value['total_marks'];
	}
	$marks_type=$marksvalue;
	$data_marks[$sub_id]=$marksvalue;
}

$pdf->SetFont("Arial","","10");

if($institute_row['id']!='6bd9b29f-f4fd-c95f-466c-5afab5d415d5' && $institute_row['id']!='9710db7f-73f2-d3e0-6227-5afab568feab'){
	$pdf->SetTextColor(255,255,255);
	$pdf->SetFillColor(19,41,79);
	$pdf->Cell(2,10,'',0,0,L,1);
	$pdf->Cell(34,10,'Semester',0,0,L,1);
	$pdf->Cell(68,10,'Subject',0,0,L,1);

}
else{
	$pdf->SetTextColor(255,255,255);
	$pdf->SetFillColor(19,41,79);
	$pdf->Cell(2,10,'',0,0,L,1);
	$pdf->Cell(34,10,'Semester',0,0,C,1);
	$pdf->Cell(75,10,'Subject',0,0,C,1);
}

if($institute_row['id']!='6bd9b29f-f4fd-c95f-466c-5afab5d415d5' && $institute_row['id']!='9710db7f-73f2-d3e0-6227-5afab568feab'){
	$pdf->Cell(30,10,'External Marks',0,0,L,1);
	$pdf->Cell(30,10,'Internal Marks',0,0,L,1);
}
else{
	//$pdf->Cell(20,10,'');
	//$pdf->Cell(20,10,'');
}
$pdf->Cell(20,10,'Result',0,0,L,1);

if($institute_row['allow_grade']){
	$pdf->Cell(20,10,'Grade',0,0,L,1);
}
else{
	//$pdf->Cell(20,10,"",0,0);
}

if($institute_row['allow_score']){
	$pdf->Cell(20,10,'Total',0,0,L,1);
}
else {
	$pdf->Cell(20,10,'',0,0);
	//$pdf->Ln();
}

//$pdf->Line(10,100,190,100);
$pdf->Ln();
$pdf->SetFont("Arial","","10");
$pdf->SetTextColor(0,0,0);

foreach($data as $k=>$marks_fix){
	$total_marks=0;
	$internalmarks=0;
	$sub_name=$marks_fix[0]['sub_name'];
	$status=$marks_fix[0]['status'];
	$grade=$marks_fix[0]['grade'];
	$overallmarks=$marks_fix[0]['overallmarks'];

	if($institute_row['id']!='6bd9b29f-f4fd-c95f-466c-5afab5d415d5' && $institute_row['id']!='9710db7f-73f2-d3e0-6227-5afab568feab'){
		$pdf->Cell(2,10,'',0,0,L,0);
		$pdf->Cell(34,10,"{$sem_name1[$k][0]}");

		$pdf->Cell(75,10,"{$sub_name}");
	}
	else{
		$pdf->Cell(2,10,'',0,0,L,0);
		$pdf->Cell(34,10,"{$sem_name1[$k][0]}");

		$pdf->Cell(75,10,"{$sub_name}");
	}

	foreach($data_marks as $m_key=>$d_marks){
		if($m_key==$k){
			foreach($d_marks as $e_type=> $d){

				foreach($Srows as $exam_type){
					if($e_type==$exam_type['name']){
						//$score.= $val->exam_type.'-'.$val->total_persent.'<br/>';
						//$bean->score_detail=$score;
						if($exam_type['exam_type']=='Main_Exam')
						{
							$externalmarks=$d;
						}
						else {
							$internalmarks+=$d;
						}
					}
				}
			}
			if($institute_row['id']!='6bd9b29f-f4fd-c95f-466c-5afab5d415d5' && $institute_row['id']!='9710db7f-73f2-d3e0-6227-5afab568feab'){
				$pdf->Cell(98,10,"{$externalmarks}",0,0,L);
				$pdf->Cell(98,10,"{$internalmarks}",0,0,L);
			}
			else{
				//$pdf->Cell(30,10,"",0,0,L);
				//$pdf->Cell(30,10,"",0,0,L);
			}
		}
	}

	$pdf->Cell(20,10,"{$status}");
	if($institute_row['allow_grade']){
		$pdf->Cell(20,10,"{$grade}",0,0);
	}
	else{
		//$pdf->Cell(20,10,"",0,0);
	}
	if($institute_row['allow_score']){
		$pdf->Cell(20,10,"{$overallmarks}",0,1);
	}
	else{
		$pdf->Cell(20,10,"",0,0);
		$pdf->Ln();
	}

}

$pdf->SetFont("Arial","","10");
$pdf->Ln();

$pdf->Ln();
$pdf->MultiCell(0,5,"{$result_description}",0,1);
$pdf->Ln();

$pdf->Ln();

$pdf->Cell(0,5,"*The above results are for display only",0,1);
//$pdf->Cell(0,5,'B:No candidaes allow in centre without hall ticket',0,1);
//$pdf->Cell(0,5,'C:students should reach before 15 miuites',0,1);

$pdf->SetFont("Arial","","10");
$pdf->Cell(0,10,"*Facility to display the general communication and guidelines below the online result",0,1);
//$pdf->WriteHTML("<h1>kapil </h1>");

$pdf->Output();
?>
