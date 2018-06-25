<?php
 // created: 2018-01-08 17:22:06
$layout_defs["te_Exam_scheme"]["subpanel_setup"]['te_exam_scheme_te_pr_programs'] = array (
  'order' => 100,
  'module' => 'te_pr_Programs',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_TE_EXAM_SCHEME_TE_PR_PROGRAMS_FROM_TE_PR_PROGRAMS_TITLE',
  'get_subpanel_data' => 'te_exam_scheme_te_pr_programs',
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
