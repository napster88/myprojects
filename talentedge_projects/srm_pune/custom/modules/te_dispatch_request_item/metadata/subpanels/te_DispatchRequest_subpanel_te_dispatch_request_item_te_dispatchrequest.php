<?php
// created: 2018-05-09 14:36:26
$subpanel_layout['list_fields'] = array (
  'name' => 
  array (
    'vname' => 'LBL_NAME',
    'widget_class' => 'SubPanelDetailViewLink',
    'width' => '45%',
    'default' => true,
  ),
  'semester' => 
  array (
    'type' => 'relate',
    'default' => true,
    'studio' => 'visible',
    'vname' => 'Semester',
    'id' => 'TE_TE_SEMESTER_ID',
    'link' => true,
    'width' => '10%',
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'te_te_semester',
    'target_record_key' => 'te_te_semester_id',
  ),
  'date_modified' => 
  array (
    'vname' => 'LBL_DATE_MODIFIED',
    'width' => '45%',
    'default' => true,
  ),
  'in_stock' => 
  array (
    'type' => 'int',
    'studio' => 'visible',
    'vname' => 'In Stock',
    'width' => '10%',
    'default' => true,
  ),
  'out_stock' => 
  array (
    'type' => 'int',
    'studio' => 'visible',
    'vname' => 'Out Stock',
    'width' => '10%',
    'default' => true,
  ),
  'edit_button' => 
  array (
    'vname' => 'LBL_EDIT_BUTTON',
    'widget_class' => 'SubPanelEditButton',
    'module' => 'te_dispatch_request_item',
    'width' => '4%',
    'default' => true,
  ),
  'remove_button' => 
  array (
    'vname' => 'LBL_REMOVE',
    'widget_class' => 'SubPanelRemoveButton',
    'module' => 'te_dispatch_request_item',
    'width' => '5%',
    'default' => true,
  ),
);