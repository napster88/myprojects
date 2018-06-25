<?php
$hook_array['process_record'] = Array();
$hook_array['process_record'][] = Array(2, 'listing Fail Pass', 'custom/modules/te_Exam_result/listingview.php','listViewColorClass', 'listViewColor');
$hook_array['after_retrieve'][] = Array(3, 'details sybject', 'custom/modules/te_Exam_result/subjectdetails.php','detail_view','detail_subject');
$hook_array['process_record'][] = Array(1, 'show score internal external', 'custom/modules/te_Exam_result/showscore.php','showscoreClass', 'ShowscoreList');

?>
