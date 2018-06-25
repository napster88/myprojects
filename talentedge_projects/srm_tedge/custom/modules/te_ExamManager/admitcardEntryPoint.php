<?php 

require_once 'custom/include/fpdf/fpdf.php';


$pdf=new FPDF();
	global $db;
	
if(isset($_GET)){
	$enrollno=$_GET['enrollno'];
	$s_name=$_GET['s_name'];
	$c_name=$_GET['c_name'];
	$sem=$_GET['sem'];
	$batch=$_GET['batch'];
	
	$sql="select te_in_institutes_id_c from te_student_batch where (te_ba_batch_id_c='".$batch."') limit 1";
	$te_batch=$db->query($sql);
	//print_r($te_batch);
	while($Srow =$db->fetchByAssoc($te_batch)){
		$sql="select description from te_exam where (te_in_institutes_id_c='".$Srow['te_in_institutes_id_c']."') limit 1";
		$description=$db->query($sql);
		while($Srow =$db->fetchByAssoc($description)){
			$description= $Srow['description'];
		}
	}
	//die("sdfd");
	
	//batch=json_encode($batch);
}
//var_dump(get_class_methods($pdf));

$pdf->AddPage();

$pdf->SetFont("Times","B","10");
$pdf->Cell(0,10,"Admit Card",1,1,C);
//$pdf->Image('C:\xampp\htdocs\srmpune\custom\modules\te_ExamManager.jpeg',40,0,0,0,'','');
//$pdf->Image("24-mewaruniversity.jpeg",10,10,189);
//$pdf->Image(0,10,"Mewar University Knowledge of Wisdom",1,1,C);

$pdf->SetFont("Times","B","10");
$pdf->MultiCell(0,10,"
Mewar University Knowledge of Wisdom",1,C);
//$pdf->Cell(0,30,"Mewar University Knowledge of Wisdom",1,1,C);

$pdf->SetFont("Times","","10");
$pdf->Cell(100,10,'Enrollment Number:');
$pdf->Cell(100,10,"{$enrollno}",0,1);

$pdf->Cell(100,10,'Name: ');
$pdf->Cell(100,10,"{$s_name}",0,1);

$pdf->Cell(100,10,'Program Name:');
$pdf->Cell(100,10,"{$c_name}",0,1);

$pdf->Cell(0,10,"Exam Scheduled",1,1,C);

$pdf->SetFont("Times","B","10");
$pdf->Cell(40,10,'Name of Exam');
$pdf->Cell(40,10,'Centre');
$pdf->Cell(40,10,'Semester');
$pdf->Cell(40,10,'Date');
$pdf->Cell(40,10,'Time',0,1);

$pdf->SetFont("Times","","10");
if(isset($_GET)){
	
	$sql="select `name`,`subject`,`city`,`state`,`exam_date`,`exam_time`,`exam_center`,`exam_status` from te_exammanager where (te_student_id_c='".$_GET['studentID']."' AND exam_status='Active')";
	$te_exammanager=$db->query($sql);

	$exammanager=array();
	
	
	if($te_exammanager->num_rows>0){
		while($Srow =$db->fetchByAssoc($te_exammanager)){ 
			
			//echo json_encode($Srow);
			$exammanager[]=$Srow;
			
			/*$exam_name=$Srow['name'];
			$pdf->Cell(50,10,"Welcome");
			$pdf->Cell(50,10,'b1');
			$pdf->Cell(50,10,'a');
			$pdf->Cell(50,10,'a',0,1);*/
		}
	}
	
	foreach($exammanager as $e){
		$sql1="select `name` from `te_subjects_master` where `id`='".$e['subject']."'";
		$te_te_subject=$db->query($sql1);
		
		if($te_te_subject->num_rows>0){
			while($Srow =$db->fetchByAssoc($te_te_subject)){
					$sub_name=$Srow['name'];
			}
		}
		$name=$e['name'];
		$exam_date=$e['exam_date'];
		$exam_time=$e['exam_time'];
		$exam_center=$e['exam_center'];
		$pdf->Cell(40,10,"{$sub_name}");
		$pdf->Cell(40,10,"{$exam_center}");
		$pdf->Cell(40,10,"{$sem}");
		$pdf->Cell(40,10,"{$exam_date}");
		$pdf->Cell(40,10,"{$exam_time}",0,1);
	}
}

$pdf->Cell(0,10,"Instructions",1,1,C);

$pdf->SetFont("Times","I","10");
$pdf->Cell(0,5,"{$description}",0,1);
//$pdf->Cell(0,5,'B:No candidaes allow in centre without hall ticket',0,1);
//$pdf->Cell(0,5,'C:students should reach before 15 miuites',0,1);

$pdf->SetFont("Arial","I","8");
$pdf->Cell(0,10,"System Generated HAll Ticket required no Signature",1,1,C);
$pdf->Output();

?>