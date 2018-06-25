<?php
$hook_version = 1; 
$hook_array = Array(); 
//position, file, function 
$hook_array['before_save'] = Array(); 
$hook_array['before_save'][] = Array(1, 'active-inactive', 'custom/modules/te_ExamSchedules/active_incaive.php','activecall', 'activefunc'); 
?>
