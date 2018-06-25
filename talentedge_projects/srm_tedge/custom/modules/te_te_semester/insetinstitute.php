<?php
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
//require_once('custom/include/Email/sendmail.php'); 
class instituute{
	
	function insertfunction($bean, $event, $argument){				
	/*	$leadSql = "SELECT leads.id as lead_id FROM leads INNER JOIN leads_cstm ON leads.id = leads_cstm.id_c INNER JOIN email_addr_bean_rel ON email_addr_bean_rel.bean_id = leads.id AND email_addr_bean_rel.bean_module ='Leads' INNER JOIN email_addresses ON email_addresses.id =  email_addr_bean_rel.email_address_id WHERE leads.deleted = 0 AND email_addresses.email_address='".$bean->email."'";

		$leadObj= $GLOBALS['db']->query($leadSql);
		while($row = $GLOBALS['db']->fetchByAssoc($leadObj)){
			$GLOBALS['db']->query("UPDATE leads SET phone_other='".$bean->phone_other."' WHERE id='".$row['lead_id']."'");
			$GLOBALS['db']->query("UPDATE leads_cstm SET work_experience_c='".$bean->work_experience."', functional_area_c='".$bean->functional_area."', education_c='".$bean->education."' WHERE id_c='".$row['lead_id']."'");
		}	
		
		*/
		if (!empty($bean->name) && !empty($_REQUEST['te_pr_programs_te_te_semester_1te_pr_programs_ida']))
        {	
		$program=$_REQUEST['te_pr_programs_te_te_semester_1te_pr_programs_ida'];
		$leadSql="SELECT te_in_institutes_te_pr_programs_1te_in_institutes_ida FROM `te_in_institutes_te_pr_programs_1_c` WHERE te_in_institutes_te_pr_programs_1te_pr_programs_idb='".$program."'";
		$leadObj= $GLOBALS['db']->query($leadSql);
		$row = $GLOBALS['db']->fetchByAssoc($leadObj);
		$row['te_in_institutes_te_pr_programs_1te_in_institutes_ida'];
		$bean->semester_institute_id=$row['te_in_institutes_te_pr_programs_1te_in_institutes_ida'];
		
		/* Order never Duplicate Error Message */		
		if(!empty($bean->order_name)){
			$OrdeSql="SELECT sem.order_name from  te_te_semester sem INNER JOIN  te_pr_programs_te_te_semester_1_c prsem ON sem.id=prsem.te_pr_programs_te_te_semester_1te_te_semester_idb WHERE sem.deleted=0 AND prsem.deleted=0 AND prsem.te_pr_programs_te_te_semester_1te_pr_programs_ida='".$program."'";
			$OrderObj= $GLOBALS['db']->query($OrdeSql);
			$OrderResult = $GLOBALS['db']->fetchByAssoc($OrderObj);
			if($OrderResult['order_name']==$bean->order_name){
			echo '<script> alert("You can\'t Create One More Semester at Same Order number Please Change Order Number Or Put New Order Number");callPage(); function callPage(){ window.location.href="index.php?module=te_pr_Programs&action=DetailView&record='.$program.'"} </script>';
			exit();
				
				}
			}
	}	
}

	function detailviewinstitute($bean,$event,$argument){
		$semSql="SELECT semester_institute_id FROM `te_te_semester` WHERE id='".$bean->id."'";
		$semObj= $GLOBALS['db']->query($semSql);
		$result = $GLOBALS['db']->fetchByAssoc($semObj);
	

		$insSql="SELECT name,id FROM `te_in_institutes` WHERE id='".$result['semester_institute_id']."'";
		$insObj= $GLOBALS['db']->query($insSql);
		$insresult = $GLOBALS['db']->fetchByAssoc($insObj);
		//$bean->semester_institute_id=$insresult['name'];

		$bean->semester_institute_id="<a href='index.php?module=te_in_institutes&offset=1&stamp=1510818541020833800&return_module=te_in_institutes&action=DetailView&record=".$insresult['id']."'>".$insresult['name']."</a>";
	
	}
}


