<?php
// created: 2018-05-01 13:30:06
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
    'type' => 'varchar',
    'vname' => 'LBL_SEMESTER',
    'width' => '10%',
    'default' => true,
  ),
  'institute_id' => 
  array (
    'type' => 'varchar',
    'vname' => 'LBL_INSTITUTE_ID',
    'width' => '10%',
    'default' => true,
  ),
  'edit_button' => 
  array (
    'vname' => 'LBL_EDIT_BUTTON',
    'widget_class' => 'SubPanelEditButton',
    'module' => 'te_MapitemtoDispatch',
    'width' => '4%',
    'default' => true,
  ),
  'remove_button' => 
  array (
    'width' => '5%',
    'vname' => 'LBL_REMOVE',
    'default' => true,
    'widget_class' => 'SubPanelRemoveButton',
  ),
);