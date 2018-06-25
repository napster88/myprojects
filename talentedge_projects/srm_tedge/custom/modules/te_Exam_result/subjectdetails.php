<?php
if (!defined('sugarEntry') || !sugarEntry)die('Not A Valid Entry Point');

class detail_view {
    function detail_subject(&$bean, $event, $arguments) {
    global $db;
       
		if($bean->te_te_subject_id_c!=''){
							$subsql="SELECT name FROM `te_subjects_master` WHERE id = '".$bean->te_te_subject_id_c."'";
							$subObj= $GLOBALS['db']->query($subsql);
							$subrow = $GLOBALS['db']->fetchByAssoc($subObj);
							$bean->subject_name=$subrow['name'];
							}
		
			   
		}
 }
