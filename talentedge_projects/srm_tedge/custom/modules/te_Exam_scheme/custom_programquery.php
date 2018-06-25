<?php
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
require_once('custom/include/Email/sendmail.php'); 
global $current_user,$db;
class programs{
	function programsave($bean, $event, $argument){
				
			/*
			$studentSql="SELECT program_lising,name AS examscheme FROM te_exam_scheme WHERE id = '".$lead_id."'";
			$studentObj = $db->query($studentSql);
			$student = $db->fetchByAssoc($studentObj);
			$studentemail=$student['program_lising'];
			echo $studentemail;
			*/
			$progrmaIds=$bean->program_lising;
			$progrmString=str_replace("^","",$progrmaIds);
			$programArry=explode(",",$progrmString);
			 if (empty($bean->fetched_row['id'])){
			foreach($programArry as $value){
			$lead_lead_id = create_guid();
	
			$InsRel="INSERT INTO te_exam_scheme_te_pr_programs_c (`id`, `date_modified`, `te_exam_scheme_te_pr_programste_exam_scheme_ida`, `te_exam_scheme_te_pr_programste_pr_programs_idb`) VALUES ('".$lead_lead_id."','".date('Y-m-d H:i:s')."','".$bean->id."','".$value."')";
			$GLOBALS['db']->query($InsRel);			
				}
			
			}	
				
		}		
		/* Edite view Condition @manish*/
		function examtypesub($bean, $event, $argument){
		#$bean->number_exams=isset($_REQUEST['examtype'])? $_REQUEST['examtype']: '';
		#$res1=$GLOBALS['db']->query("DELETE FROM te_installments WHERE name='".$bean->id."'");
		#$res2=$GLOBALS['db']->query("DELETE FROM te_ba_batch_te_installments_1_c WHERE te_ba_batch_te_installments_1te_ba_batch_ida='".$bean->id."'");

		for($x=1;$x<=$_REQUEST['examtype'];$x++){
			$name_index="name_".$x;
			$exam_type_index="exam_type_".$x;
			$passing_prsent_index="passing_prsent_".$x;
			$min_marks_index="min_marks_".$x;
			$total_prsent_index="total_prsent_".$x;
			$total_marks_index="total_marks_".$x;
			$installmentsObj = new te_exam_types();
			$installmentsObj->name				=   $_REQUEST[$name_index];
			$installmentsObj->exam_type			=	$_REQUEST[$exam_type_index];
			$installmentsObj->passing_prsent	=	$_REQUEST[$passing_prsent_index]; # Is that  Passing Precentage Here @mniash
			$installmentsObj->min_marks			=	$_REQUEST[$min_marks_index];	  # Is that Weightage(In%age) Here @MAnish	and db name is min_marks
			$installmentsObj->total_prsent		=	$_REQUEST[$total_prsent_index]; 
			$installmentsObj->total_marks		=	$_REQUEST[$total_marks_index]; #TOtal marks
			$installmentsObj->date_entered		= 	date('Y-m-d H:i:s');
			$installmentsObj->te_exam_types_te_exam_schemete_exam_scheme_ida	=	$bean->id;
			$installmentsObj->save();
			unset($installmentsObj);
			}		
		}
		
}
