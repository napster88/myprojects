<?php
// Do not store anything in this file that is not part of the array or the hook version.  This file will
// be automatically rebuilt in the future.
 $hook_version = 1;
$hook_array = Array();
$hook_array['after_save'] = Array();
$hook_array['after_save'][] = Array(1, 'add payment plan details', 'custom/modules/te_student_batch/addStudentPayment.php','addStudentPaymentClass', 'makePayment');
$hook_array['after_save'][] = Array(2, 'update lead status', 'custom/modules/te_student_batch/update_lead_status.php','update_lead_status', 'after_save_updateleads');
//$hook_array['after_save'][] = Array(3, 'list dispatch item', 'custom/modules/te_student_batch/dispatchitem.php','dispatchitem', 'listdispatchitem'); 
$hook_array['process_record'][] = Array(3, 'List_view student fields', 'custom/modules/te_student_batch/listview_display.php','listviewClass', 'listview');
#$hook_array['after_retrieve'][] = Array(4, 'List_view', 'custom/modules/te_student_batch/after_display.php','afterclass', 'afterlistview');


?>
