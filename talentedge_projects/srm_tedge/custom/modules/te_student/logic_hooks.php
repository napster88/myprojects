<?php
// Do not store anything in this file that is not part of the array or the hook version.  This file will	
// be automatically rebuilt in the future. 
$hook_version = 1; 
$hook_array = Array(); 
//$hook_array['after_save'] = Array(); 
//$hook_array['after_save'][] = Array(1, 'Update lead fields', 'custom/modules/te_student/student_hook.php','studentclass', 'addfields'); 
//$hook_array['after_save'][] = Array(2, 'update lead status', 'custom/modules/te_student/createleads.php','genlead', 'genleadsfun');
//$hook_array['before_save'][] = Array(2, 'check Image Size', 'custom/modules/te_student/studentinfo.php','StudentInfo', 'checkimagesize');
$hook_array['process_record'][] = Array(1,'list Student view','custom/modules/te_student/student_view_hook.php','StudentView','idcard');

?>
