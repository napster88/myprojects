<?php
// created: 2018-04-19 08:18:10
$subpanel_layout['list_fields'] = array (
  'name' => 
  array (
    'vname' => 'LBL_NAME',
    'widget_class' => 'SubPanelDetailViewLink',
    'width' => '45%',
    'default' => true,
  ),
  'subject_id' => 
  array (
    'type' => 'varchar',
    'vname' => 'Subject ID',
    'width' => '10%',
    'default' => true,
  ),
  'subject_type' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'vname' => 'LBL_SUBJECT_TYPE',
    'width' => '10%',
  ),
  'assignment_required' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'vname' => 'LBL_ASSIGNMENT_REQUIRED',
    'width' => '10%',
    'default' => true,
  ),
  'total_marks' => 
  array (
    'type' => 'int',
    'studio' => 'visible',
    'vname' => 'Total Marks',
    'width' => '10%',
    'default' => true,
  ),
  'passing_persent' => 
  array (
    'type' => 'int',
    'studio' => 'visible',
    'vname' => 'Passing Persent',
    'width' => '10%',
    'default' => true,
  ),
  'date_entered' => 
  array (
    'type' => 'datetime',
    'vname' => 'LBL_DATE_ENTERED',
    'width' => '10%',
    'default' => true,
  ),
  'edit_button' => 
  array (
    'vname' => 'LBL_EDIT_BUTTON',
    'widget_class' => 'SubPanelEditButton',
    'module' => 'te_te_subject',
    'width' => '4%',
    'default' => true,
  ),
  'remove_button' => 
  array (
    'vname' => 'LBL_REMOVE',
    'widget_class' => 'SubPanelRemoveButton',
    'module' => 'te_te_subject',
    'width' => '5%',
    'default' => true,
  ),
);