<?php
// Do not store anything in this file that is not part of the array or the hook version.  This file will	
// be automatically rebuilt in the future. 
 $hook_version = 1; 
$hook_array = Array(); 
// position, file, function 
$hook_array['before_save'] = Array(); 
$hook_array['process_record'][] = Array(1,'list Exam view','custom/modules/te_Exam/exam_view_hook.php','ExamView','publishaction');
$hook_array['after_retrieve'][] = Array(3, 'details all', 'custom/modules/te_Exam/exam_detailview.php','detail_view','detailsarry');
?>
