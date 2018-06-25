<?php
 // created: 2018-04-10 14:26:31
$layout_defs["te_Exam"]["subpanel_setup"]['te_exams_details_te_exam'] = array (
  'order' => 100,
  'module' => 'te_Exams_Details',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_TE_EXAMS_DETAILS_TE_EXAM_FROM_TE_EXAMS_DETAILS_TITLE',
  'get_subpanel_data' => 'te_exams_details_te_exam',
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
