<?php
 // created: 2018-06-18 17:39:08
$layout_defs["te_pr_Programs"]["subpanel_setup"]['te_ba_batch_te_pr_programs_1'] = array (
  'order' => 100,
  'module' => 'te_ba_Batch',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_TE_BA_BATCH_TE_PR_PROGRAMS_1_FROM_TE_BA_BATCH_TITLE',
  'get_subpanel_data' => 'te_ba_batch_te_pr_programs_1',
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
