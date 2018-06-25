<?php
 // created: 2018-02-14 13:01:55
$layout_defs["te_student_batch"]["subpanel_setup"]['te_uploaddocument_te_student_batch'] = array (
  'order' => 100,
  'module' => 'te_UploadDocument',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_TE_UPLOADDOCUMENT_TE_STUDENT_BATCH_FROM_TE_UPLOADDOCUMENT_TITLE',
  'get_subpanel_data' => 'te_uploaddocument_te_student_batch',
  'top_buttons' => 
  array (
    0 => 
    array (
      'widget_class' => 'SubPanelTopButtonQuickCreate',
    ),
    1 => 
    array (
      'widget_class' => 'SubPanelTopSelectButton',
      'mode' => 'MultiSelect',
    ),
  ),
);
