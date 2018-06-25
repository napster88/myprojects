<?php
 // created: 2017-11-23 18:33:27
$layout_defs["te_pr_Programs"]["subpanel_setup"]['te_masterdocument_te_pr_programs'] = array (
  'order' => 100,
  'module' => 'te_MasterDocument',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_TE_MASTERDOCUMENT_TE_PR_PROGRAMS_FROM_TE_MASTERDOCUMENT_TITLE',
  'get_subpanel_data' => 'te_masterdocument_te_pr_programs',
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
