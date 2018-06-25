<?php
class showscoreClass{
   function ShowscoreList($bean, $event, $arguments){
			global $db;

	$idcard_student="SELECT name,b_stu.institute_id,b_stu.course,b_stu.current_sems from(SELECT te_in_institutes_id_c as institute_id,te_pr_programs_id_c as course,current_sems,te_ba_batch_id_c as batch_id from (select `te_student_te_student_batch_1te_student_batch_idb` from te_student ts INNER JOIN te_student_te_student_batch_1_c tsb ON ts.id=tsb.te_student_te_student_batch_1te_student_ida where ts.registration_no='".$bean->name."') std_rel INNER JOIN `te_student_batch` std_batch ON std_batch.id=std_rel.te_student_te_student_batch_1te_student_batch_idb)b_stu INNER JOIN te_ba_batch t_batch ON t_batch.id=b_stu.batch_id;";
	$get_institute=$db->query($idcard_student);
	$Srow =$db->fetchByAssoc($get_institute);



	$type_data="SELECT type.name,type.exam_type FROM (SELECT e_t.te_exam_types_te_exam_schemete_exam_types_idb as exam_typeid FROM (SELECT ts.id FROM te_exam_scheme_te_pr_programs_c tep INNER JOIN te_exam_scheme ts ON tep.te_exam_scheme_te_pr_programste_exam_scheme_ida=ts.id where tep.te_exam_scheme_te_pr_programste_pr_programs_idb='".$Srow['course']."') tsch_r INNER JOIN te_exam_types_te_exam_scheme_c e_t ON e_t.te_exam_types_te_exam_schemete_exam_scheme_ida=tsch_r.id) exam_type INNER JOIN te_exam_types type ON exam_type.exam_typeid=type.id;";
	$get_exam_type=$db->query($type_data);
  //echo "<pre>";
  //print_r($get_exam_type);

	while($Srow_type =$db->fetchByAssoc($get_exam_type)){
if(!empty($Srow_type['exam_type']))
		$Srows[]=$Srow_type;
	}
  //print_r($Srows);
	//echo $bean->id;
	$te_exam_result=BeanFactory::getBean('te_Exam_result',$bean->id);

	$te_exam_result->load_relationship('te_exam_result_te_exammarks');
	$assesment=$te_exam_result->te_exam_result_te_exammarks->getBeans();

	foreach($assesment as $key=>$val)
	{
		foreach($Srows as $exam_type){

			if($val->exam_type==$exam_type['name']){
				$score.= $val->exam_type.'-'.$val->total_persent.'<br/>';
				$bean->score_detail=$score;
				if($exam_type['exam_type']=='Main_Exam')
				{
					$bean->external_marks=$val->total_marks ;
				}
				else {
					$bean->internal_marks+=$val->total_marks ;
				}
			}
		}
	}
 /*$subsql="SELECT name FROM `te_subjects_master` WHERE id = '".$bean->te_te_subject_id_c."'";
 $subObj= $GLOBALS['db']->query($subsql);
 $subrow = $GLOBALS['db']->fetchByAssoc($subObj);
 $bean->score_detail=$subrow['name'];
*/
			//$html='<a href="index.php?entryPoint=result_download&id='.$bean->id.'" id="'.$bean->id.'" value='.$bean->id.' class="button" target="_blank">Download Result</a>';
			//$bean->created_by_name=$html;

	}
}

?>
