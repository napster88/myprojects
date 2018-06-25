<?php
 // created: 2018-01-10 16:16:08
$layout_defs["te_Exam_scheme"]["subpanel_setup"]['te_exam_types_te_exam_scheme'] = array (
  'order' => 100,
  'module' => 'te_exam_types',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_TE_EXAM_TYPES_TE_EXAM_SCHEME_FROM_TE_EXAM_TYPES_TITLE',
  'get_subpanel_data' => 'te_exam_types_te_exam_scheme',
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
