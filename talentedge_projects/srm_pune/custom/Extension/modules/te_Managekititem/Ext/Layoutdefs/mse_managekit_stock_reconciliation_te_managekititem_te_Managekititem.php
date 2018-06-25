<?php
 // created: 2018-05-09 17:56:59
$layout_defs["te_Managekititem"]["subpanel_setup"]['mse_managekit_stock_reconciliation_te_managekititem'] = array (
  'order' => 100,
  'module' => 'mse_managekit_stock_reconciliation',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_MSE_MANAGEKIT_STOCK_RECONCILIATION_TE_MANAGEKITITEM_FROM_MSE_MANAGEKIT_STOCK_RECONCILIATION_TITLE',
  'get_subpanel_data' => 'mse_managekit_stock_reconciliation_te_managekititem',
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
