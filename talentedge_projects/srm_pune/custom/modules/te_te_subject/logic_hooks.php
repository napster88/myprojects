<?php
// Do not store anything in this file that is not part of the array or the hook version.  This file will	
// be automatically rebuilt in the future. 
 $hook_version = 1; 
$hook_array = Array(); 
$hook_array['before_save'] = Array(); 
$hook_array['before_save'][] = Array(1, 'Insert Institute id or name', 'custom/modules/te_te_subject/insetinstitute_program.php','instituuteprogram', 'savefunction'); 
$hook_array['after_retrieve'][] = Array(3, 'Display Institute id or name', 'custom/modules/te_te_subject/insetinstitute_program.php','instituuteprogram', 'detailviewinstitute_program'); 
?>
