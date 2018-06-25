<?php
	if (!defined('sugarEntry') || !sugarEntry)die('Not A Valid Entry Point');
global $db;
$query="SELECT res.id as bean_id,res.name,res.total_marks as overall_score,res.total_prsent, res.te_te_subject_id_c as subject_id,
te_exammarks.exam_type,te_exammarks.id as exammarks_id, te_exammarks.total_marks as  obtained_percent ,te_exammarks.total_persent as obtained_marks,
te_subjects_master.name as subject_name, te_subjects_master.overall_passing_marks,te_subjects_master.overall_total_marks  FROM `te_exam_result` as res
INNER JOIN `te_exam_result_te_exammarks_c` ON res.id = te_exam_result_te_exammarks_c.te_exam_result_te_exammarkste_exam_result_ida
INNER JOIN `te_exammarks` ON te_exammarks.id=te_exam_result_te_exammarks_c.te_exam_result_te_exammarkste_exammarks_idb
INNER JOIN `te_subjects_master` ON res.te_te_subject_id_c=te_subjects_master.id";
//WHERE res.id='3250244d-afba-ae0d-8440-5b111ab50931'";
$result_grade=array();
//echo $query="SELECT *  FROM `te_exam_result_te_exammarks_c` WHERE `te_exam_result_te_exammarkste_exam_result_ida` LIKE '1018b481-875e-fed4-9607-5b10e0042070'";
/*
$query="SELECT res.id,res.name,res.total_prsent, res.te_te_subject_id_c, sub.id as sub_id, sub.overall_passing_marks
FROM `te_exam_result` as res INNER JOIN `te_subjects_master` as sub ON res.te_te_subject_id_c=sub.id
WHERE res.id='10575399-810f-633e-fd60-5b111af9413c'";
$result_grade=array();
$studentObj =$db->query($query);
*/
//print_r($studentObj);

$studentObj =$db->query($query);
$new_array=array();
$new_result_array=array();
//$bean_arry=array();
while($row =$db->fetchByAssoc($studentObj)){
//	print_r($row)
$result_grade['bean_id']=$row['bean_id'];
 $result_grade['enrollment_id']=$row['name'];
 $result_grade['overall_score']=$row['overall_score'];
 $result_grade['total_prsent']=$row['total_prsent'];
$result_grade['subject_name']=$row['subject_name'];
$result_grade['overall_passing_marks']=$row['overall_passing_marks'];
$result_grade['overall_total_marks']=$row['overall_total_marks'];
$baenid=$row['bean_id'];
 $exam_type=$row['exam_type'];
 $exam_id=$row['exammarks_id'];
 $bean_arry[$baenid][$exam_type]=array('exam_id'=>$row['exammarks_id'],'percentage'=>   $row['obtained_percent'],	'marks_obtained'=>$row['obtained_marks'] );
//	$result_grade['score'][$baenid]=$bean_arry;
//$bean_result =array($exam_type=>$row['obtained_marks']);
$new_array[$baenid]=$result_grade;
///array_push($new_array[$baenid]['score'],$bean_result);
$new_result_array=$bean_arry;
}

//echo "<pre>";

//print_r($new_array);
//print_r($new_result_array);

$new_grade_result=array();
	foreach($new_array as $row)
	{

		$bean_id=$row['bean_id'];

		if($row['overall_passing_marks']=='46')
		{
			$marks_obtained=$row['total_prsent'];
//echo "hell".$row['score']['Assignment 2']['marks_obtained'];
echo $new_result_array[$bean_id]['Assignment 1']['marks_obtained'];
			if(($new_result_array[$bean_id]['Assignment 1']['marks_obtained']<40)||($new_result_array[$bean_id]['Assignment 2']['marks_obtained']<40))
			{

				$new_grade_result[$bean_id]="E1";
			}
			else if($new_result_array[$bean_id]['External']['marks_obtained']<40)
				{
					echo	$new_grade_result[$bean_id]="E2";
				}

			else
				{// code...}

					if($marks_obtained<45)
					{
					 $new_grade_result[$bean_id]="E2";
					}
					 if(($marks_obtained>=46)&&($marks_obtained<=54))
					 {
						 $new_grade_result[$bean_id]="C";
					 }
					 if(($marks_obtained>=55)&&($marks_obtained<=63))
					 {
						 $new_grade_result[$bean_id]="C+";
					 }
					 if(($marks_obtained>=64)&&($marks_obtained<=72))
					 {
						 $new_grade_result[$bean_id]="B";
					 }
					 if(($marks_obtained>=73)&&($marks_obtained<=81))
					 {
						 $new_grade_result[$bean_id]="B+";
					 }
					 if(($marks_obtained>=82)&&($marks_obtained<=90))
					 {
						 $new_grade_result[$bean_id]="A";
					 }
					 if($marks_obtained>=91)
					 {
						 $new_grade_result[$bean_id]="A+";
					 }
				 }


		}
	}
//print_r($new_grade_result);

foreach($new_grade_result as $id=>$grade)
{

	$updatequery="UPDATE `te_exam_result` SET `description`='$grade' WHERE `id`='$id'";
	$db->query($updatequery);
}

?>
