<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point'); 
global $mod_strings, $app_strings, $sugar_config;

// This will add the new option
if(ACLController::checkAccess('te_Exam', 'import', true))$module_menu[]=Array("index.php?module=te_Exam&action=createexam", "Create Exam Custom", "");

if(ACLController::checkAccess('te_Exam', 'import', true))$module_menu[]=Array("index.php?entryPoint=exam_booking", "Exam Booking Manager", "");
if(ACLController::checkAccess('te_Exam', 'import', true))$module_menu[]=Array("index.php?action=index&module=te_Exam_result&action=examresultsscreen", "Create Result", "");
if(ACLController::checkAccess('te_Exam', 'import', true))$module_menu[]=Array("index.php?action=index&module=te_Exam_result", "Listing Exam Result", "");
if(ACLController::checkAccess('te_Exam', 'import', true))$module_menu[]=Array("index.php?module=Import&action=Step1&import_module=te_Exam_result&return_module=te_Exam_result&return_action=index", "Bulk Upload Result", "");

?>
										
