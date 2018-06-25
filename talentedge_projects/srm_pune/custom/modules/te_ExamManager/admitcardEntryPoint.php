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
		
		$ins_id=$Srow['te_in_institutes_id_c'];
		$sql="select description from te_exam where (te_in_institutes_id_c='".$Srow['te_in_institutes_id_c']."') limit 1";
		$description=$db->query($sql);
		while($Srow =$db->fetchByAssoc($description)){
			$description= $Srow['description'];
		}
	}
	
	/** Query to get institute information by Id*/
	$institute_info="select `name`,`address_line1`,`address_line2`,`Pincode`,`logo` from te_in_institutes where id='".$ins_id."'";
	$get_institute_info=$db->query($institute_info);
	$institute_row =$db->fetchByAssoc($get_institute_info);
	
	
	
	//batch=json_encode($batch);
}
//var_dump(get_class_methods($pdf));

$pdf->AddPage();

$pdf->SetFont("Times","B","10");
$pdf->Cell(0,10,"Admit Card",1,1,C);

$filename='./upload/'.$ins_id.'_logo';

if (!$institute_row['logo']){
	$pdf->SetFont("Times","","7");
	$pdf->Cell(50,1,$pdf->Image('http://www.ropeworksgear.com/site/skin/img/no-image.jpg',85,25,30,0,'',''),0,1,C);
}

else{
	$dir='./upload/logo';
	if(is_dir($dir)===false){
		mkdir($dir);
	}

	if (rename($filename,'./upload/logo/'.$institute_row['logo']))
	{
		/** Add Logo*/
		$pdf->SetFont("Times","","7");
		$pdf->Cell(50,1,$pdf->Image('./upload/logo/'.$institute_row['logo'],85,25,30,0,'',''),0,1,C);
	}
	else{
		$pdf->SetFont("Times","","7");
		$pdf->Cell(50,1,$pdf->Image('./upload/logo/'.$institute_row['logo'],85,25,30,0,'',''),0,1,C);
	}
}

$pdf->SetFont("Times","B","8");
$pdf->MultiCell(0,20,"
{$institute_row['name']}",1,C);
//$pdf->Cell(0,30,"Mewar University Knowledge of Wisdom",1,1,C);

$pdf->SetFont("Times","B","8");
$pdf->Cell(100,10,'Enrollment Number:');
$pdf->SetFont("Times","","8");
$pdf->Cell(100,10,"{$enrollno}",0,1);

$pdf->SetFont("Times","B","8");
$pdf->Cell(100,10,'Name: ');
$pdf->SetFont("Times","","8");
$pdf->Cell(100,10,"{$s_name}",0,1);

$pdf->SetFont("Times","B","8");
$pdf->Cell(100,10,'Program Name:');
$pdf->SetFont("Times","","8");
$pdf->Cell(100,10,"{$c_name}",0,1);

$pdf->Cell(0,10,"Exam Scheduled",1,1,C);

$pdf->SetFont("Times","B","8");
$pdf->Cell(40,10,'Name of Exam');
$pdf->Cell(40,10,'Centre');
$pdf->Cell(40,10,'Semester');
$pdf->Cell(40,10,'Date');
$pdf->Cell(40,10,'Time',0,1);

$pdf->SetFont("Times","","8");
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

$pdf->SetFont("Times","I","8");
$pdf->Cell(0,5,"{$description}",0,1);
//$pdf->Cell(0,5,'B:No candidaes allow in centre without hall ticket',0,1);
//$pdf->Cell(0,5,'C:students should reach before 15 miuites',0,1);

$pdf->SetFont("Arial","I","8");
$pdf->Cell(0,10,"System Generated HAll Ticket required no Signature",1,1,C);
$pdf->Output();

?>