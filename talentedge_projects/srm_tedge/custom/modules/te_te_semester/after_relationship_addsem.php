<?php
if (!defined('sugarEntry') || !sugarEntry)die('Not A Valid Entry Point');
require_once('modules/te_Managekititem/te_Managekititem.php'); 
class relationshipsem
{

    function maprelationsem($bean, $event, $argument)
    {
		
		global $db;
  
		$sql="select tts.name as semestername ,tts.id as semester_id,t_sub.subject_id,t_sub.name subjectname,t_sub.subject_code,tts.semester_institute_id  from (SELECT tsm.id as subject_id,tsm.name,tsm.subject_code,tsms.te_subjects_master_te_te_semester_1te_te_semester_idb as semester_id FROM `te_subjects_master` tsm INNER JOIN te_subjects_master_te_te_semester_1_c tsms ON tsm.id=tsms.te_subjects_master_te_te_semester_1te_subjects_master_ida where tsm.id='".$bean->id."') t_sub INNER JOIN te_te_semester tts ON tts.id=t_sub.semester_id";
		
		$subject_master_map=$db->query($sql);
		while($Srow =$db->fetchByAssoc($subject_master_map)){
			$subject_master_map_data[]=$Srow;
		}
		
		foreach($subject_master_map_data as $subject_map){
			$managekit="Select `id` from te_managekititem where kit_item_code='".$subject_map['subject_code']."'";
			$managekit_map=$db->query($managekit);
			
			$row =$db->fetchByAssoc($managekit_map);
			
			if($managekit_map->num_rows >0){
				$dispatch_id=create_guid();
				$insert_data="INSERT into `te_mapitemtodispatch` (`id`,`name`,`semester`,`institute_id`,`program_id`,`semester_id`) VALUES ('".$dispatch_id."','".$subject_map['subjectname']."','".$subject_map['semestername']."','".$subject_map['semester_institute_id']."','','".$subject_map['semester_id']."')";
			
				$insert_relation_query="INSERT into `te_mapitemtodispatch_te_managekititem_c` (`id`,`te_mapitemtodispatch_te_managekititemte_mapitemtodispatch_ida`,`te_mapitemtodispatch_te_managekititemte_managekititem_idb`,`deleted`) VALUES ('".create_guid()."_002','".$dispatch_id."','".$row['id']."',0)";
				
				$db->query($insert_data);
				$db->query($insert_relation_query);
			}
		}
	}
}
        
