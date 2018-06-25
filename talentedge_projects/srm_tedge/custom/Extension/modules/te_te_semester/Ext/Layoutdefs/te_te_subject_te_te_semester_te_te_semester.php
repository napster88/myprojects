<?php
 // created: 2017-11-16 15:14:36
$layout_defs["te_te_semester"]["subpanel_setup"]['te_te_subject_te_te_semester'] = array (
  'order' => 100,
  'module' => 'te_te_subject',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_TE_TE_SUBJECT_TE_TE_SEMESTER_FROM_TE_TE_SUBJECT_TITLE',
  'get_subpanel_data' => 'te_te_subject_te_te_semester',
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
