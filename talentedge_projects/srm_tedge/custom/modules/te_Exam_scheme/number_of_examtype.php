<?php
	if (!defined('sugarEntry') || !sugarEntry)
		die('Not A Valid Entry Point');

	class numberexam {
		function numbertype(&$bean, $event, $arguments) {
			
				if(empty($bean->fetched_row['id'])){
							$bean->number_exams=isset($_REQUEST['examtype'])? $_REQUEST['examtype']: '';
					}
			
				if(!empty($_REQUEST['te_in_institutes_id_c']) && !empty($bean->name) && $bean->is_active=='1')
				{
					/* Active Condition */
					
						global $db;	
						$pid=0;						
						$Sname=$_REQUEST['name'];
						$InsID=$_REQUEST['te_in_institutes_id_c'];
						$progamID=$_REQUEST['program_lising'];
						
						//echo $InsID;
						#print_r ($progamID); exit();
						$EXamSql="SELECT program_lising FROM `te_exam_scheme` WHERE is_active='1' AND te_in_institutes_id_c ='".$InsID."'"; 
						$ResultSQl= $db->query($EXamSql);
						$StatuSresult=$db->fetchByAssoc($ResultSQl);
						
						$progrmaIds=$StatuSresult['program_lising'];
						#$prog=array();
						$progrmString=str_replace("^","",$progrmaIds);
						$programArry=explode(",",$progrmString);
						 
						 
						 foreach($progamID as $p_id){
							 $program=$p_id;
							if(!in_array($p_id, $programArry)){ 
							   $pid++;
							}
						 }
						 
						 if(!$pid){
							echo '<script> alert("This Program already used!");callPage(); function callPage(){ window.location.href="index.php?module=te_Exam_scheme&action=index"} </script>';
			
							exit();
						 }	
				 }
		}
	}