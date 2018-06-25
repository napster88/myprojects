<?php
// created: 2017-12-29 12:05:54
$subpanel_layout['list_fields'] = array (
  'name' => 
  array (
    'type' => 'name',
    'link' => true,
    'vname' => 'LBL_NAME',
    'width' => '10%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => NULL,
    'target_record_key' => NULL,
  ),
  'subject' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'vname' => 'LBL_SUBJECT',
    'id' => 'TE_TE_SUBJECT_ID_C',
    'link' => true,
    'width' => '10%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'te_te_subject',
    'target_record_key' => 'te_te_subject_id_c',
  ),
  'exam_date' => 
  array (
    'type' => 'datetimecombo',
    'vname' => 'LBL_EXAM_DATE',
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
    'module' => 'te_Exam_Date_Schedules',
    'width' => '4%',
    'default' => true,
  ),
  'remove_button' => 
  array (
    'vname' => 'LBL_REMOVE',
    'widget_class' => 'SubPanelRemoveButton',
    'module' => 'te_Exam_Date_Schedules',
    'width' => '5%',
    'default' => true,
  ),
);