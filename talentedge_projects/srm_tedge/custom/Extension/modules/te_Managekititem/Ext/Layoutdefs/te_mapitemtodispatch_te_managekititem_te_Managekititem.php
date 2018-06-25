<?php
 // created: 2018-04-27 11:05:42
$layout_defs["te_Managekititem"]["subpanel_setup"]['te_mapitemtodispatch_te_managekititem'] = array (
  'order' => 100,
  'module' => 'te_MapitemtoDispatch',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_TE_MAPITEMTODISPATCH_TE_MANAGEKITITEM_FROM_TE_MAPITEMTODISPATCH_TITLE',
  'get_subpanel_data' => 'te_mapitemtodispatch_te_managekititem',
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
