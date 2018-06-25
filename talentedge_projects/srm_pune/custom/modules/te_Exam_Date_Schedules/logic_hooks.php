<?php
$hook_version = 1; 
$hook_array = Array(); 
//position, file, function 
$hook_array['before_save'] = Array(); 
$hook_array['before_save'][] = Array(1, 'Date-active-inactive', 'custom/modules/te_Exam_Date_Schedules/datematch.php','livedate', 'livedatefun'); 
$hook_array['after_save'][] = Array(2, 'change name to subject', 'custom/modules/te_Exam_Date_Schedules/subject_name.php','subject', 'namedb'); 
?>
