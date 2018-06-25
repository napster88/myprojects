<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

global $app_list_strings,$current_user,$sugar_config,$db;

if(isset($_REQUEST['instituteId']) && $_REQUEST['instituteId']!=""){
		$status=$_REQUEST['instituteId'];
		$progrmSQl="SELECT p.name,p.id FROM te_pr_programs AS p INNER JOIN te_in_institutes_te_pr_programs_1_c AS ipr ON ipr.te_in_institutes_te_pr_programs_1te_pr_programs_idb=p.id WHERE p.deleted=0 AND ipr.deleted=0 AND ipr.te_in_institutes_te_pr_programs_1te_in_institutes_ida='".$status."'";
		$progrmObje =$db->query($progrmSQl);
			$progOptions=array('status'=>'error','id'=>'');
			while($rows =$db->fetchByAssoc($progrmObje)){ 
				$progOptions['res'][]=$rows;
			}	
			if(!empty($progOptions['res'])){
				$progOptions['status']='ok';
			}
			echo json_encode($progOptions);	
		}


?>
