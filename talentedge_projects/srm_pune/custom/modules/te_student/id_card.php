<?php 
require('WriteHTML.php');

global $db;

$pdf=new FPDF();
	
$pdf->AddPage();
//https://www.elated.com/articles/create-nice-looking-pdfs-php-fpdf/
/** Add Logo*/
if(isset($_GET)){
	
	/** query to Fetch institute and course Id */
	$idcard_student="select te_in_institutes_id_c as institute_id,te_pr_programs_id_c as course from (select `te_student_te_student_batch_1te_student_batch_idb` from te_student ts INNER JOIN te_student_te_student_batch_1_c tsb ON ts.id=tsb.te_student_te_student_batch_1te_student_ida where ts.id='".$_GET['id']."') std_rel INNER JOIN `te_student_batch` std_batch ON std_batch.id=std_rel.te_student_te_student_batch_1te_student_batch_idb";
	$get_institute=$db->query($idcard_student);
	$Srow =$db->fetchByAssoc($get_institute);
	
	/** Query to get institute information by Id*/
	$institute_info="select `name`,`address_line1`,`address_line2`,`Pincode`,`logo` from te_in_institutes where id='".$Srow['institute_id']."'";
	$get_institute_info=$db->query($institute_info);
	$institute_row =$db->fetchByAssoc($get_institute_info);
	
	/** Query to get course name */
	$course_info="select `name` from te_pr_programs where id='".$Srow['course']."'";
	$get_course_info=$db->query($course_info);
	$course_row =$db->fetchByAssoc($get_course_info);
}
$filename='./upload/'.$Srow['institute_id'].'_logo';


if (!$institute_row['logo']){

	$pdf->SetFont("Times","","7");
	$pdf->Cell(50,10,$pdf->Image('http://www.ropeworksgear.com/site/skin/img/no-image.jpg',10,12,30,0,'',''),0,0);
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
		$pdf->Cell(50,10,$pdf->Image('./upload/logo/'.$institute_row['logo'],10,12,30,0,'',''),0,0);
	}
	else{
		$pdf->SetFont("Times","","7");
		$pdf->Cell(50,10,$pdf->Image('./upload/logo/'.$institute_row['logo'],10,12,30,0,'',''),0,0);
	}
}

/** draw vertical line*/
$pdf->Line(50,10,50,40);

$pdf->SetFont("Times","B","7");
$pdf->MultiCell(50,7,"{$institute_row['name']}
Visit Us:www.gyan.com
Student Indentification Card",0,C);


$pdf -> SetY(10);
$pdf -> SetX(130); 
$pdf->MultiCell(60,5,"          GENERAL INSTRUCTIONS
1)This Id card Must be carried by student for identification and attending examination
2)The Card is not transferrable
3)Loss of this card should be reported to the University Support services in writing immediately OR contact on:",0);

/** draw Horizontal line*/
$pdf->Line(10,40,120,40);

/** for next line*/
//$pdf->Ln();

if(isset($_GET)){
	$idcard="select * from te_student where id='".$_GET['id']."'";
	$te_estudent=$db->query($idcard);
	
	while($Srow =$db->fetchByAssoc($te_estudent)){ 	
		$te_student[]=$Srow;
	}
	
	//$te_student=json_decode(stripslashes(html_entity_decode($_GET['msg'])),true);
	foreach($te_student as $student){
		
		$upload_image=$student['upload_image'];
		
		$pdf->MultiCell(50,5,"Enrollment No.:    {$student['registration_no']}
		Name:    {$student['name']}
		Father:    {$student['father_name']}
		Course:    {$course_row['name']}
		Session:    2017-2018
		Contact No.:    {$student['mobile']}",0);
	}
}


$studentfilename='./upload/'.$_GET['id'].'_upload_image';

$pdf->SetFont("Times","B","8");
$pdf -> SetY(55); 
$pdf -> SetX(60); 

if (!$upload_image){
	$pdf->SetFont("Times","","7");
	$pdf->Cell(50,10,$pdf->Image('http://www.ropeworksgear.com/site/skin/img/no-image.jpg',70,50,30,0,'',''),0,0);
}

else{
	
	$dir='./upload/upload_image';
	if(is_dir($dir)===false){
		mkdir($dir);
	}
	
	if(rename($studentfilename,'./upload/upload_image/'.$upload_image))
	{
		/** Add Logo*/
		$pdf->SetFont("Times","","7");
		$pdf->Cell(50,10,$pdf->Image('./upload/upload_image/'.$upload_image,70,50,30,0,'',''),0,0);
	}
	else{
		$pdf->SetFont("Times","","7");
		$pdf->Cell(50,10,$pdf->Image('./upload/upload_image/'.$upload_image,70,50,30,0,'',''),0,0);
	}
}
$pdf->SetFont("Times","B","7");
$pdf -> SetY(60);
$pdf -> SetX(130); 
$pdf->MultiCell(60,5,"Address of the University
{$institute_row['address_line1']}
{$institute_row['address_line2']} , {$institute_row['Pincode']}",0,C);

$pdf->Output();

?>
