<?php
if (!defined('sugarEntry') || !sugarEntry)die('Not A Valid Entry Point');
require_once('custom/include/Email/sendmail.php');
require_once('modules/Leads/Lead.php'); 
class genlead
{

    function genleadsfun($bean, $event, $argument)
    {
		
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
        
