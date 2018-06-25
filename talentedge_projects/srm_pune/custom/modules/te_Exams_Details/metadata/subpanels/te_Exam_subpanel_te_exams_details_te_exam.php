<?php
// created: 2018-04-20 13:26:26
$subpanel_layout['list_fields'] = array (
  'te_exams_details_te_exam_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'vname' => 'LBL_TE_EXAMS_DETAILS_TE_EXAM_FROM_TE_EXAM_TITLE',
    'id' => 'TE_EXAMS_DETAILS_TE_EXAMTE_EXAM_IDA',
    'width' => '10%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'te_Exam',
    'target_record_key' => 'te_exams_details_te_examte_exam_ida',
  ),
  'batch' => 
  array (
    'type' => 'varchar',
    'vname' => 'LBL_BATCH',
    'width' => '10%',
    'default' => true,
  ),
  'course' => 
  array (
    'type' => 'varchar',
    'vname' => 'LBL_COURSE',
    'width' => '10%',
    'default' => true,
  ),
  'semeters' => 
  array (
    'type' => 'varchar',
    'vname' => 'LBL_SEMETERS',
    'width' => '10%',
    'default' => true,
  ),
  'subjects' => 
  array (
    'type' => 'varchar',
    'vname' => 'LBL_SUBJECTS',
    'width' => '10%',
    'default' => true,
  ),
  'exam_slots' => 
  array (
    'type' => 'varchar',
    'vname' => 'LBL_EXAM_SLOTS',
    'width' => '10%',
    'default' => true,
  ),
  'start_date' => 
  array (
    'type' => 'varchar',
    'vname' => 'LBL_START_DATE',
    'width' => '10%',
    'default' => true,
  ),
  'date_modified' => 
  array (
    'vname' => 'LBL_DATE_MODIFIED',
    'width' => '45%',
    'default' => true,
  ),
  'edit_button' => 
  array (
    'vname' => 'LBL_EDIT_BUTTON',
    'widget_class' => 'SubPanelEditButton',
    'module' => 'te_Exams_Details',
    'width' => '4%',
    'default' => true,
  ),
  'remove_button' => 
  array (
    'vname' => 'LBL_REMOVE',
    'widget_class' => 'SubPanelRemoveButton',
    'module' => 'te_Exams_Details',
    'width' => '5%',
    'default' => true,
  ),
);