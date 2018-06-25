<?php

if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
class SubjectCode{	
	function checksubcode($bean, $event, $argument){
		global $db;		
		if($_REQUEST['subject_code']){
			
			$subjectSql="SELECT `subject_code` FROM te_subjects_master WHERE `subject_code` = '".$_REQUEST['subject_code']."'";
			$subjectmaster = $db->query($subjectSql);
			
			if($subjectmaster->num_rows>0){
				//die("dfd");
				echo '<script> alert("Already exist with same subject code !");callPage(); function callPage(){ window.location.href="index.php?module=te_Subjects_master&action=index"} </script>';
			
				exit();
			}
		}
	}
}
 
