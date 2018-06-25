<?php
 // created: 2018-05-11 11:31:06
$layout_defs["te_DispatchRequest"]["subpanel_setup"]['dh_dispatch_history_te_dispatchrequest'] = array (
  'order' => 100,
  'module' => 'dh_dispatch_history',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_DH_DISPATCH_HISTORY_TE_DISPATCHREQUEST_FROM_DH_DISPATCH_HISTORY_TITLE',
  'get_subpanel_data' => 'dh_dispatch_history_te_dispatchrequest',
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
