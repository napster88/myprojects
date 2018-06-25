<?php 
require('WriteHTML.php');

global $db;

$pdf=new FPDF();
	
$pdf->AddPage();
//https://www.elated.com/articles/create-nice-looking-pdfs-php-fpdf/
/** Add Logo*/
$pdf->SetFont("Times","","7");
$pdf->Cell(50,10,$pdf->Image('https://teja8.kuikr.com/images/QuikrEducation//image/institutev2/5537/Logo.jpg',10,12,30,0,'',''),0,0);

/** draw vertical line*/
$pdf->Line(50,10,50,45);

$pdf->SetFont("Times","B","7");
$pdf->MultiCell(50,10,"SURESH GYAN VIHAR UNIVERSITY
Visit Us:www.gyan.com
Student Indentification Card",0);


$pdf -> SetY(10);
$pdf -> SetX(130); 
$pdf->MultiCell(60,10,"GENERAL INSTRUCTIONS
1)This Id card Must be carried by student
2)The Card is not transferrable",0);

/** draw Horizontal line*/
$pdf->Line(10,45,120,45);

/** for next line*/
$pdf->Ln();
if(isset($_GET)){
	$idcard="select * from te_student where id='".$_GET['id']."'";
	$te_estudent=$db->query($idcard);
	
	while($Srow =$db->fetchByAssoc($te_estudent)){ 	
		$te_student[]=$Srow;
	}
	
	//$te_student=json_decode(stripslashes(html_entity_decode($_GET['msg'])),true);
	foreach($te_student as $student){
		$pdf->MultiCell(50,10,"Enrollment No.:			{$student['registration_no']}
		Name:			{$student['name']}
		Father:			{$student['father_name']}
		Course:			BCA
		Session:			2017-2018
		Contact No.:			{$student['mobile']}",0);
	}
}

$pdf->SetFont("Times","B","8");
$pdf -> SetY(55); 
$pdf -> SetX(60); 
$pdf->Cell(50,10,$pdf->Image('http://yokibu.com/communityspeak/wp-content/uploads/2011/03/AJEET-PASSPORT-SIZE-PHOTO.jpg',70,60,30,0,'',''),0,0);


$pdf -> SetY(60);
$pdf -> SetX(130); 
$pdf->MultiCell(60,10,"Address of the University
SURESH GYAN VIAHR UNIVERSITY
MAHAL JAGAT PURA JAIPUR-302025",1,C);

$pdf->Output();

?>
