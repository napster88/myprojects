
<?php
if (!defined('sugarEntry') || !sugarEntry)die('Not A Valid Entry Point');

class status_listview {
    function display_list(&$bean, $event, $arguments) {
    global $db;
    
       // Total Programs 
       
        $row1 =$db->query("SELECT COUNT(*) AS Total FROM te_in_institutes_te_pr_programs_1_c WHERE deleted=0 AND 
                          te_in_institutes_te_pr_programs_1te_in_institutes_ida='".$bean->id."'");                         
				$res1 =$db->fetchByAssoc($row1);
				$bean->total_programs_c=$res1['Total'];
			  
       
       // Query for Status for Btach Whos Planned batch
        $row =$db->query("SELECT tbl1.id, COUNT(tbl3.batch_status) AS Total_b FROM te_in_institutes tbl1 INNER JOIN te_in_institutes_te_ba_batch_1_c tbl2 ON tbl1.id = tbl2.te_in_institutes_te_ba_batch_1te_in_institutes_ida 
                          LEFT JOIN te_ba_batch tbl3 ON tbl2.te_in_institutes_te_ba_batch_1te_ba_batch_idb = tbl3.id WHERE tbl3.batch_status= 'planned' 
                          AND tbl1.id='".$bean->id."'"); 
				$res =$db->fetchByAssoc($row);
				$bean->planned_batch_c= $res['Total_b'];
      
      
       
       
        // Query for Status for Btach Whos 
       $row3 =$db->query("SELECT tbl1.id, COUNT(tbl3.batch_status) AS Total_c FROM te_in_institutes tbl1 INNER JOIN te_in_institutes_te_ba_batch_1_c tbl2 ON tbl1.id = tbl2.te_in_institutes_te_ba_batch_1te_in_institutes_ida 
						  LEFT JOIN te_ba_batch tbl3 ON tbl2.te_in_institutes_te_ba_batch_1te_ba_batch_idb = tbl3.id WHERE tbl3.batch_status= 'classes_in_progress' 
						  AND tbl1.id='".$bean->id."'"); 
               $res3 =$db->fetchByAssoc($row3);
               $bean->batch_status_class_c= $res3['Total_c'];
       
       
       
     
		}
 }