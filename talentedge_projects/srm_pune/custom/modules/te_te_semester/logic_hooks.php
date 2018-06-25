<?php
// Do not store anything in this file that is not part of the array or the hook version.  This file will	
// be automatically rebuilt in the future. 
 $hook_version = 1; 
$hook_array = Array(); 
$hook_array['before_save'] = Array(); 
$hook_array['before_save'][] = Array(1, 'Insert Institute id or name', 'custom/modules/te_te_semester/insetinstitute.php','instituute', 'insertfunction'); 
#$hook_array['before_save'][] = Array(2, 'Insert Institute id or name', 'custom/modules/te_te_semester/insetinstitute.php','instituute', 'insertfunction'); 
$hook_array['after_relationship_add'][] = Array(2, 'after relationship add', 'custom/modules/te_te_semester/after_relationship_addsem.php','relationshipsem', 'maprelationsem'); 
?>
