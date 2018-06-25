<?php
// created: 2018-04-23 15:15:55
$subpanel_layout['list_fields'] = array (
  'name' => 
  array (
    'vname' => 'LBL_NAME',
    'widget_class' => 'SubPanelDetailViewLink',
    'width' => '45%',
    'default' => true,
  ),
  'exam_type' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'vname' => 'LBL_EXAM_TYPE',
    'width' => '10%',
    'default' => true,
  ),
  'min_marks' => 
  array (
    'type' => 'int',
    'vname' => 'LBL_MIN_MARKS',
    'width' => '10%',
    'default' => true,
  ),
  'passing_prsent' => 
  array (
    'type' => 'int',
    'vname' => 'LBL_PASSING_PRSENT',
    'width' => '10%',
    'default' => true,
  ),
  'total_marks' => 
  array (
    'type' => 'int',
    'vname' => 'LBL_TOTAL_MARKS',
    'width' => '10%',
    'default' => true,
  ),
  'date_modified' => 
  array (
    'type' => 'datetime',
    'vname' => 'LBL_DATE_MODIFIED',
    'width' => '10%',
    'default' => true,
  ),
  'edit_button' => 
  array (
    'vname' => 'LBL_EDIT_BUTTON',
    'widget_class' => 'SubPanelEditButton',
    'module' => 'te_exam_types',
    'width' => '4%',
    'default' => true,
  ),
);