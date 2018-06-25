<?php
class listViewColorClass{
        function listViewColor($bean, $event, $arguments){
                if($bean->te_te_subject_id_c!=''){
							$subsql="SELECT name FROM `te_subjects_master` WHERE id = '".$bean->te_te_subject_id_c."'";
							$subObj= $GLOBALS['db']->query($subsql);
							$subrow = $GLOBALS['db']->fetchByAssoc($subObj);
							$bean->subject_name=$subrow['name'];
							}
                
                if($bean->status == 'Fail'){
                    $bean->status = '<h2 style="color:red;">'.$bean->status . '</h2>';
                    $bean->subject_name = '<h3 style="color:red;">'.$subrow['name']. '</h3>';
                }
                else
                {
					
					$bean->status = '<h2 style="color:green;">'.$bean->status . '</h2>';
					$bean->subject_name = '<h3 style="color:green;">'.$subrow['name'] . '</h3>';
					}
					
			//$html='<a href="index.php?entryPoint=result_download&id='.$bean->id.'" id="'.$bean->id.'" value='.$bean->id.' class="button" target="_blank">Download Result</a>';
			//$bean->created_by_name=$html;
              
        }
}

?>
