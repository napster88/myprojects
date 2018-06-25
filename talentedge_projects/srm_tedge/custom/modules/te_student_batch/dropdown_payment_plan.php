<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

 /* payment plan dropdown  options */
global $app_list_strings,$current_user,$sugar_config,$db;

if(isset($_REQUEST['batchId']) && $_REQUEST['batchId']!=""){
	$status=$_REQUEST['batchId'];
	$batchSql="SELECT p1.name,p1.id from te_te_paymentplan p1 INNER JOIN te_te_paymentplan_te_ba_batch_c bp ON bp.te_te_paymentplan_te_ba_batchte_te_paymentplan_idb =p1.id WHERE p1.deleted=0 AND bp.deleted=0 AND bp.te_te_paymentplan_te_ba_batchte_ba_batch_ida='".$status."'";
	$batchObj =$db->query($batchSql);
	$batchOptions=array('status'=>'error','id'=>'');
	while($row =$db->fetchByAssoc($batchObj)){ 
		$batchOptions['res'][]=$row;
	}	
	if(!empty($batchOptions['res'])){
		$batchOptions['status']='ok';
	}
	echo json_encode($batchOptions);
}
/* Semester For Current Dropdown */ 
if(isset($_REQUEST['batchIdsem']) && $_REQUEST['batchIdsem']!=""){
	$status=$_REQUEST['batchIdsem'];
	$batchSqlS="SELECT sem.name,sem.id from te_te_semester sem INNER JOIN te_pr_programs_te_te_semester_1_c prsem ON prsem.te_pr_programs_te_te_semester_1te_te_semester_idb =sem.id INNER JOIN te_pr_programs_te_ba_batch_1_c AS pbt ON pbt.te_pr_programs_te_ba_batch_1te_pr_programs_ida=prsem.te_pr_programs_te_te_semester_1te_pr_programs_ida WHERE sem.deleted=0 AND prsem.deleted=0 AND pbt.te_pr_programs_te_ba_batch_1te_ba_batch_idb='".$status."'";
	$batchObje =$db->query($batchSqlS);
	$SEmOptions=array('status'=>'error','id'=>'');
	while($rows =$db->fetchByAssoc($batchObje)){ 
		$SEmOptions['res'][]=$rows;
	}	
	if(!empty($SEmOptions['res'])){
		$SEmOptions['status']='ok';
	}
	echo json_encode($SEmOptions);	
}

