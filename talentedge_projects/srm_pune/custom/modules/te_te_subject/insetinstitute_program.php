<?php
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
//require_once('custom/include/Email/sendmail.php'); 
class instituuteprogram{
	
	function savefunction($bean, $event, $argument){				
	

		if (!empty($bean->name) && !empty($_REQUEST['te_te_subject_te_te_semesterte_te_semester_ida']))
	        {	
			$SemeSter=$_REQUEST['te_te_subject_te_te_semesterte_te_semester_ida'];
			$SemSql="SELECT sem.semester_institute_id AS institute,ps.te_pr_programs_te_te_semester_1te_pr_programs_ida AS program from te_te_semester AS sem INNER JOIN te_pr_programs_te_te_semester_1_c AS ps ON sem.id=ps.te_pr_programs_te_te_semester_1te_te_semester_idb WHERE sem.id='".$SemeSter."'";
				$SemObj= $GLOBALS['db']->query($SemSql);
				$row = $GLOBALS['db']->fetchByAssoc($SemObj);
				/* Save institute and program in table te_subject */
				 $bean->subject_institute_id=$row['institute'];
				 $bean->subject_program_id=$row['program'];

			
			}	
	}

	function detailviewinstitute_program($bean,$event,$argument){
		
		$semSql="SELECT subject_institute_id,subject_program_id FROM `te_te_subject` WHERE id='".$bean->id."'";
		$semObj= $GLOBALS['db']->query($semSql);
		$result = $GLOBALS['db']->fetchByAssoc($semObj);
			$insSql="SELECT name,id FROM `te_in_institutes` WHERE id='".$result['subject_institute_id']."'";
			$insObj= $GLOBALS['db']->query($insSql);
			$insresult = $GLOBALS['db']->fetchByAssoc($insObj);

		$PRogSql="SELECT name,id FROM `te_pr_programs` WHERE id='".$result['subject_program_id']."'";
		$PRogObj= $GLOBALS['db']->query($PRogSql);
		$PRogresult = $GLOBALS['db']->fetchByAssoc($PRogObj);
		$bean->subject_institute_id="<a href='index.php?module=te_in_institutes&offset=1&stamp=1510818541020833800&return_module=te_in_institutes&action=DetailView&record=".$insresult['id']."'>".$insresult['name']."</a>";
		$bean->subject_program_id="<a href='index.php?module=te_pr_Programs&offset=1&stamp=1510830956033095300&return_module=te_pr_Programs&action=DetailView&record=".$PRogresult['id']."'>".$PRogresult['name']."</a>";
	

	}
	
}


