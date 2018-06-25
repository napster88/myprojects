<?php
 // created: 2017-12-05 13:53:40
$layout_defs["te_te_semester"]["subpanel_setup"]['te_examschedules_te_te_semester'] = array (
  'order' => 100,
  'module' => 'te_ExamSchedules',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_TE_EXAMSCHEDULES_TE_TE_SEMESTER_FROM_TE_EXAMSCHEDULES_TITLE',
  'get_subpanel_data' => 'te_examschedules_te_te_semester',
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
