<?php

if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
class StudentView{	

	function idcard($bean, $event, $argument){
		
		global $db;
		#$bean->name=$bean->reference_number;
		
		$sql="select tsb.sem_status from (SELECT t_batch.te_student_te_student_batch_1te_student_batch_idb FROM `te_student` as ts INNER JOIN `te_student_te_student_batch_1_c` t_batch ON ts.id=t_batch.te_student_te_student_batch_1te_student_ida WHERE ts.id='".$bean->id."') ts_batch INNER JOIN te_student_batch tsb ON ts_batch.te_student_te_student_batch_1te_student_batch_idb=tsb.id";
		$exam_data=$db->query($sql);

		while($Srow =$db->fetchByAssoc($exam_data)){ 
			$studentifo=$Srow;
		}
		
		$status=ISSET($studentifo['sem_status']) && $studentifo['sem_status']=='Enroll'?'Enroll':'';
		
		if($status =='Enroll')
			$html='<a href="index.php?entryPoint=id_card&id='.$bean->id.'" id="'.$bean->id.'" value='.$bean->id.' class="button" target="_blank">Prompt IdCard</a>';
		
		$bean->source=$html;
		
		if($bean->batch_val!='NULL'){
			$myJSON =json_decode(stripslashes(html_entity_decode($bean->batch_val)));
			
			$sqlBatch="SELECT name FROM `te_ba_batch` WHERE id IN ('" . implode("', '",$myJSON) . "')"; 
			$batch_data=$db->query($sqlBatch);
			//$sqlBatch="SELECT name FROM `te_ba_batch` WHERE id in('$stringBatch')";
			//$batch_data=$db->query($sqlBatch);
			
			$batchname=array();
			while($Srowbatch =$db->fetchByAssoc($batch_data)){ 
				$batchname[]=$Srowbatch['name'];
			}
			$string_val = implode(',',$batchname);
			$bean->batch_val=$string_val;
		}
		
		if($bean->semester_val!='NULL'){
			$S2=json_decode(stripslashes(html_entity_decode($bean->semester_val)));
			
			$sqlsem="SELECT name FROM `te_te_semester` WHERE id IN ('" . implode("', '",$S2) . "')"; 
			$sem_data=$db->query($sqlsem);
			
			$semname=array();
			while($Srowsem =$db->fetchByAssoc($sem_data)){ 
				$semname[]=$Srowsem['name'];
			}
			$string_valsem = implode(',', $semname);
			$bean->semester_val=$string_valsem;
		}
	}
}

