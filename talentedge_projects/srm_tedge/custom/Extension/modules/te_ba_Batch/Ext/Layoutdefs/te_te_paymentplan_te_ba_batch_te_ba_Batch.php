<?php
 // created: 2017-11-13 15:45:35
$layout_defs["te_ba_Batch"]["subpanel_setup"]['te_te_paymentplan_te_ba_batch'] = array (
  'order' => 100,
  'module' => 'te_te_paymentplan',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_TE_TE_PAYMENTPLAN_TE_BA_BATCH_FROM_TE_TE_PAYMENTPLAN_TITLE',
  'get_subpanel_data' => 'te_te_paymentplan_te_ba_batch',
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
