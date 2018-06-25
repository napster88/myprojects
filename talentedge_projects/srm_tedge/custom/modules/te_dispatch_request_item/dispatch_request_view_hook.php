<?php

if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
class DispatchRequestView{	

	function dispatchrequeststatus($bean, $event, $argument){
		
		
		global $db;
		#$bean->name=$bean->reference_number;
	
		$sql="select `name` from te_te_semester where id='".$bean->semester_c."'";
		$semester_name=$db->query($sql);
		$name =$db->fetchByAssoc($semester_name);
		
		$bean->semester_c=$name['name'];
	}
}

