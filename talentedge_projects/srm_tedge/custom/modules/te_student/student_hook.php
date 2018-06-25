<?php
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
require_once('custom/include/Email/sendmail.php'); 
class studentclass{
	
	function addfields($bean, $event, $argument){
		//	require_once('modules/Leads/Lead.php'); 
			
			echo "This test";
			exit;
			
		
		/* 1dec commint manish				
		$leadSql = "SELECT leads.id as lead_id FROM leads INNER JOIN leads_cstm ON leads.id = leads_cstm.id_c INNER JOIN email_addr_bean_rel ON email_addr_bean_rel.bean_id = leads.id AND email_addr_bean_rel.bean_module ='Leads' INNER JOIN email_addresses ON email_addresses.id =  email_addr_bean_rel.email_address_id WHERE leads.deleted = 0 AND email_addresses.email_address='".$bean->email."'";

		$leadObj= $GLOBALS['db']->query($leadSql);
		while($row = $GLOBALS['db']->fetchByAssoc($leadObj)){
			$GLOBALS['db']->query("UPDATE leads SET phone_other='".$bean->phone_other."' WHERE id='".$row['lead_id']."'");
			$GLOBALS['db']->query("UPDATE leads_cstm SET work_experience_c='".$bean->work_experience."', functional_area_c='".$bean->functional_area."', education_c='".$bean->education."' WHERE id_c='".$row['lead_id']."'");
		}
		  End 1dec */
		  echo $Dis=$_REQUEST['description'];
		  
		  echo "sdsdsds";
		echo  $bean->description;
		  echo $bean->name;
		  echo $bean->mobile;
		  echo $bean->email;
		  exit
		  
		  
		 /*  New Code For SRm create Leads.*/ 
		  
			$bean_id = create_guid();
			$bean = new Lead();
			//$bean->id = $formId;//$bean_id;
			$bean->id = $bean_id;
			$bean->description = $bean->description;
			$bean->new_with_id = true;
			$bean->first_name = $bean->name;
			$bean->last_name = $bean->name;
			$bean->lead_source  ="Student";
			$bean->vendor  = "Campaign";
			$bean->phone_mobile = $bean->mobile;
			$beaninsert = $bean->save();
			$email = new SugarEmailAddress;
			$email->addAddress($bean->email, true); 
			$emailinsert = $email->save($bean_id, "Leads");
     
		  		
	}		
}
