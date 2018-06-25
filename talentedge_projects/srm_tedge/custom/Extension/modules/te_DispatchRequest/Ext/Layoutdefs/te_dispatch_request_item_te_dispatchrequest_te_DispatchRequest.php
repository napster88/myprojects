<?php
 // created: 2018-04-27 09:22:48
$layout_defs["te_DispatchRequest"]["subpanel_setup"]['te_dispatch_request_item_te_dispatchrequest'] = array (
  'order' => 100,
  'module' => 'te_dispatch_request_item',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_TE_DISPATCH_REQUEST_ITEM_TE_DISPATCHREQUEST_FROM_TE_DISPATCH_REQUEST_ITEM_TITLE',
  'get_subpanel_data' => 'te_dispatch_request_item_te_dispatchrequest',
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
