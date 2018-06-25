<?php
$data=array();
header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=report.csv');
 $output = fopen('php://output', 'w');
        fputcsv($output, array('university','Enrollment ID','Batch_code','Exam Month/Date','Course','Semester','Subject_code','Exam_name','Exam Scores'));

if (($file = fopen("./upload/vou_without_TC_v1.csv", 'r')) === false) {
	echo 'There was an error loading the CSV file.';
} else {

	$not=array(
	'External' =>'12',
	'Assignment 1' =>'13',
	'Assignment 2' =>'14',
	);
   while (($line = fgetcsv($file, 1000)) !== false) {

	foreach($not as $key=>$val)
	{
	  $data['univ']='Venkateshwara Open University School of Strategic Management';
	  $data['enroll']=$line['1'];
	  $data['batch']=$line['2'];
	  $data['date']='2018-2-23';
	  $data['course']=$line['5'];
	  $data['sem']=$line['9'];
	  $data['sub_code']=$line['11'];
	  $data['exam_name']=$key;
	  $data['exam_score']=$line[$val];

	  //."','".$line['2']."',2018-2-23'"."','".$line['5']."','".$line['9']."','".$line['11'].",'External','".$line['12']."'";
	//  $data.="'Suresh Gyan Vihar University (DE)','".$line['1']."','".$line['2']."',2018-2-23'"."','".$line['5']."','".$line['9']."','".$line['11'].",'Assignment 1'.'",'".$line['13']."'\n";
	  //$data.="'Suresh Gyan Vihar University (DE)','".$line['1']."','".$line['2']."',2018-2-23'"."','".$line['5']."','".$line['9']."','".$line['11'].",'Assignment 2'.'",'".$line['14']."'\n";
		if($line[0]!='User ID')
		{
			fputcsv($output, $data);
		}
	 }

	}

	 foreach($data as $val)
	{
		fputcsv($output, $val);
	}

	fclose($output);
	fclose($handle);
}


?>
