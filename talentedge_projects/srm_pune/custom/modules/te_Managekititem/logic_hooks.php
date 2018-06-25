<?php
// Do not store anything in this file that is not part of the array or the hook version.  This file will
// be automatically rebuilt in the future.
 $hook_version = 1;
$hook_array = Array();
// position, file, function
$hook_array['process_record'] = Array();
$hook_array['process_record'][] = Array(2, 'listview_stock_inentry', 'custom/modules/te_Managekititem/listview_stock_entry.php','stock_entry', 'stock_entry_popup');
$hook_array['after_save'] = Array();
$hook_array['after_save'][] = Array(4, 'listview_stock_inentry', 'custom/modules/te_Managekititem/kitiem.php','kitcallclass', 'kitidsavefun');
?>
