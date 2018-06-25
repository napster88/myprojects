<?php
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
    class dispatchitem
    {
        function listdispatchitem($bean, $event, $arguments)
        {
			global $current_user,$db;
		
			if(!empty($bean->current_sems)){
				
				
				/** get semester name */
				$CurentSemSql="SELECT name FROM  te_te_semester where id='".$bean->current_sems."' and deleted=0";
				$CurentsemObj =$db->query($CurentSemSql);
				$CurrentsemName =$db->fetchByAssoc($CurentsemObj);
				
				$checksemester="SELECT * FROM  te_mapitemtodispatch where semester_id='".$bean->current_sems."' and deleted=0";
				$Curentsem =$db->query($checksemester);
				$Currentsemtodispatch =$db->fetchByAssoc($Curentsem);
				
				/** check if item mapped to dispatch */
				if($Curentsem->num_rows>0){
					
					/*$dispatchrequest="SELECT name,id FROM  te_dispatchrequest_cstm drc INNER JOIN te_dispatchrequest dr ON drc.id_c= dr.id where drc.semester_c='".$bean->current_sems."' and deleted=0";
					$dispatchrequest1 =$db->query($dispatchrequest);
					$drequest =$db->fetchByAssoc($dispatchrequest1);*/
					
					$dispatchrequests="select sb.te_ba_batch_id_c as batch from (SELECT `te_dispostion_student_batch_te_student_batchte_student_batch_ida` as batch_id FROM te_dispostion_student_batch tdsb INNER JOIN te_dispostion_student_batch_te_student_batch_c dsbr ON tdsb.id=dsbr.te_dispostbc52t_batch_idb where tdsb.id='".$bean->id."') dsp INNER JOIN te_student_batch sb ON sb.id=dsp.batch_id ;";
					$dispatchrequests1 =$db->query($dispatchrequests);
					$drequests =$db->fetchByAssoc($dispatchrequests1);
					
					$dispatchrequest="SELECT name,id FROM  te_dispatchrequest_cstm drc INNER JOIN te_dispatchrequest dr ON drc.id_c= dr.id where drc.te_ba_batch_id_c='".$drequests['batch']."' and deleted=0 group by drc.te_ba_batch_id_c Desc";
					$dispatchrequest1 =$db->query($dispatchrequest);
					$drequest =$db->fetchByAssoc($dispatchrequest1);
					
					$id=create_guid();
					
					if($dispatchrequest1->num_rows>0){
					
						$tebatchSqldata="INSERT into te_dispatch_request_item(id,name,semester_name,semester_id) 
						Values ('".$id."','".$Currentsemtodispatch['name']."','".$CurrentsemName['name']."','".$Currentsemtodispatch['semester_id']."')";
					
						$tebatchSqlObjdata =$db->query($tebatchSqldata);
						
						$tebatchSqlrelation="INSERT into te_dispatch_request_item_te_dispatchrequest_c(id,te_dispatcf754st_item_ida,te_dispatc9fa1request_idb) Values ('".$id."0034','".$id."','".$drequest['id']."')";
					
						$tebatchSqlObjrelation =$db->query($tebatchSqlrelation);
					}
				}
			}
		}				
    }
?>
