<?php
 // created: 2017-12-06 17:25:08
$layout_defs["te_ExamSchedules"]["subpanel_setup"]['te_examschedules_te_exam_date_schedules_1'] = array (
  'order' => 100,
  'module' => 'te_Exam_Date_Schedules',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_TE_EXAMSCHEDULES_TE_EXAM_DATE_SCHEDULES_1_FROM_TE_EXAM_DATE_SCHEDULES_TITLE',
  'get_subpanel_data' => 'te_examschedules_te_exam_date_schedules_1',
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
