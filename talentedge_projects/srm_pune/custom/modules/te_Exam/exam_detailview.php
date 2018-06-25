<?php

if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
class detail_view{	

	function detailsarry($bean, $event, $argument){
		global $db;
		#$bean->name=$bean->reference_number;
		
		
		
		if($bean->Subject_val!='NULL'){
			$S2=json_decode(stripslashes(html_entity_decode($bean->Subject_val)));
			
			$sqlsem="SELECT name FROM `te_subjects_master` WHERE id IN ('" . implode("', '",$S2) . "')"; 
			$sem_data=$db->query($sqlsem);
			
			$semname=array();
			while($Srowsem =$db->fetchByAssoc($sem_data)){ 
				$semname[]=$Srowsem['name'];
			}
			$string_valsem = implode(',', $semname);
			$bean->Subject_val=$string_valsem;
		}
		
		if($bean->semester_val!='NULL'){
			$semesterID=json_decode(stripslashes(html_entity_decode($bean->semester_val)));
			
			$sqlsemes="SELECT name FROM `te_te_semester` WHERE id IN ('" . implode("', '",$semesterID) . "')"; 
			$semes_data=$db->query($sqlsemes);
			
			$semesname=array();
			while($Srowsemes =$db->fetchByAssoc($semes_data)){ 
				$semesname[]=$Srowsemes['name'];
			}
			$string_valsemes = implode(',', $semesname);
			$bean->semester_val=$string_valsemes;
		}
		
		if($bean->batch_val!='NULL'){
			$myJSON =json_decode(stripslashes(html_entity_decode($bean->batch_val)));
			
			$sqlBatch="SELECT name FROM `te_ba_batch` WHERE id IN ('" . implode("', '",$myJSON) . "')"; 
			$batch_data=$db->query($sqlBatch);	
			$batchname=array();
			while($Srowbatch =$db->fetchByAssoc($batch_data)){ 
				$batchname[]=$Srowbatch['name'];
			}
			$string_val = implode(',',$batchname);
			$bean->batch_val=$string_val;
		}
		
			$listData=str_replace(",",'<br><font color="green">',$bean->list_date);
			$bean->list_date=$listData;
		
		if($bean->program!='NULL'){
			$myJSONprogram =json_decode(stripslashes(html_entity_decode($bean->program)));
			
			$sqlprog="SELECT name FROM `te_pr_programs` WHERE id IN ('" . implode("', '",$myJSONprogram) . "')"; 
			$prog_data=$db->query($sqlprog);	
			$progname=array();
			while($Srowprog =$db->fetchByAssoc($prog_data)){ 
				$progname[]=$Srowprog['name'];
			}
			$prog_val = implode(',',$progname);
			$bean->program=$prog_val;
		}
				
		
		
	}
}

