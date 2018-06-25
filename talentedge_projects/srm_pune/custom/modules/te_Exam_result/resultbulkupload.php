<?php
$data=array();
header('Content-Type: text/csv; charset=utf-8');
       header('Content-Disposition: attachment; filename=report.csv');
 $output = fopen('php://output', 'w');
       fputcsv($output, array('course_id','semester_id','subject_id','user_id','username','enrollment_id','email','Assignment 1','Assignment 2','total_marks','passing_marks','is_passed'));

if (($file = fopen("./upload/VOU_student_marks.csv", 'r')) === false) {
	echo 'There was an error loading the CSV file.';
} else {
	
	$not=array(
	'External' =>'12',
	'Assignment 1' =>'13',
	'Assignment 2' =>'14',
	);
   while (($line = fgetcsv($file, 1000)) !== false) {
	
	//foreach($not as $key=>$val)
	//{
	$csv[$line[3]][]=$line;
		
	 /* $data['univ']='Suresh Gyan Vihar University (DE)';
	  $data['enroll']=$line['1'];
	  $data['batch']=$line['2'];
	  $data['date']='2018-2-23';
	  $data['course']=$line['5'];
	  $data['sem']=$line['9'];
	  $data['sub_code']=$line['11'];
	  $data['exam_name']=$key;
	  $data['exam_score']=$line[$val];*/
	
	  //."','".$line['2']."',2018-2-23'"."','".$line['5']."','".$line['9']."','".$line['11'].",'External','".$line['12']."'";
	//  $data.="'Suresh Gyan Vihar University (DE)','".$line['1']."','".$line['2']."',2018-2-23'"."','".$line['5']."','".$line['9']."','".$line['11'].",'Assignment 1'.'",'".$line['13']."'\n";
	  //$data.="'Suresh Gyan Vihar University (DE)','".$line['1']."','".$line['2']."',2018-2-23'"."','".$line['5']."','".$line['9']."','".$line['11'].",'Assignment 2'.'",'".$line['14']."'\n";

		/*if($line[0]!='User ID')
		{	
			fputcsv($output, $data);
		}*/
	 //}
   
	}
	
	foreach($csv as $key=>$val){
		
		  $data['course_id']=$val[0][0];
		  $data['semester_id']=$val[0][1];
		  $data['subject_id']=$val[0][2];
		  $data['user_id']=$val[0][3];
		  $data['username']=$val[0][4];
		  $data['enrollment_id']=$val[0][5];
		  $data['email']=$val[0][6];
		  $data['Assignment 1']=$val[0][10];
		  $data['Assignment 2']=$val[1][10];
		  $data['total_marks']=$val[0][8];
		  $data['passing_marks']=$val[0][9];
		  $data['is_passed']=$val[0][11];
		  
		if($key!='user_id')
		{	
			fputcsv($output, $data);
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