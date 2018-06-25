<?php
/* This Code create logic hooks For Status Date 6-dec-17 */
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
	
	class livedate
	{
				function livedatefun($bean, $event, $argument)
				{	
				
					global $db;
					if(!empty($_REQUEST['te_examschedules_te_exam_date_schedules_1_name']))
				    {
										
					$ExamName=$_REQUEST['te_examschedules_te_exam_date_schedules_1_name'];
					$ExamID=$_REQUEST['te_examschedules_te_exam_date_schedules_1te_examschedules_ida'];	
					$ExaMSql="SELECT eds.* from  te_exam_date_schedules eds INNER JOIN te_examschedules_te_exam_date_schedules_1_c exm ON eds.id=exm.te_examschb597hedules_idb WHERE eds.deleted=0 AND exm.deleted=0 AND exm.te_examschedules_te_exam_date_schedules_1te_examschedules_ida='".$ExamID."'";
					$ExamSQl= $db->query($ExaMSql);
					$ExamSresult=$db->fetchByAssoc($ExamSQl);
					
					if(($ExamSresult['exam_date']==$bean->exam_date) && ($ExamSresult['te_te_subject_id_c']==$bean->te_te_subject_id_c))
					{
						
								//$this->$bean->te_in_institutes_te_pr_programs_1_name->id;
								//SugarApplication::appendErrorMessage('You have Already one Active Record');
								echo '<script> alert("You can\'t Create One More Record At Same Time And date ,Because Already One Record At Same Date Else Change Date/Time,With Same Subject !");callPage(); function callPage(){  window.location.href="index.php?action=ajaxui#ajaxUILoc=index.php%3Fmodule%3Dte_ExamSchedules%26action%3DDetailView%26record%3D' . $ExamID . '"} </script>';
								
								exit();	
						
					}
	
					} 
				
				}

}
?>





