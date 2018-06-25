<?php
 // created: 2018-05-04 13:12:43
$layout_defs["te_Managekititem"]["subpanel_setup"]['stent_stock_entry_te_managekititem'] = array (
  'order' => 100,
  'module' => 'stent_stock_entry',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_STENT_STOCK_ENTRY_TE_MANAGEKITITEM_FROM_STENT_STOCK_ENTRY_TITLE',
  'get_subpanel_data' => 'stent_stock_entry_te_managekititem',
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
