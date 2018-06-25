<?php
 // created: 2018-01-12 13:30:50
$layout_defs["te_Exam_result"]["subpanel_setup"]['te_exam_result_te_exammarks'] = array (
  'order' => 100,
  'module' => 'te_ExamMarks',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_TE_EXAM_RESULT_TE_EXAMMARKS_FROM_TE_EXAMMARKS_TITLE',
  'get_subpanel_data' => 'te_exam_result_te_exammarks',
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
