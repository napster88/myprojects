<?php
$module_name = 'te_Exam_Date_Schedules';
$listViewDefs [$module_name] = 
array (
  'SUBJECT' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_SUBJECT',
    'id' => 'TE_TE_SUBJECT_ID_C',
    'link' => true,
    'width' => '10%',
    'default' => true,
  ),
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'EXAM_DATE' => 
  array (
    'type' => 'datetimecombo',
    'label' => 'LBL_EXAM_DATE',
    'width' => '10%',
    'default' => true,
  ),
  'TE_EXAMSCHEDULES_TE_EXAM_DATE_SCHEDULES_1_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_TE_EXAMSCHEDULES_TE_EXAM_DATE_SCHEDULES_1_FROM_TE_EXAMSCHEDULES_TITLE',
    'id' => 'TE_EXAMSCHEDULES_TE_EXAM_DATE_SCHEDULES_1TE_EXAMSCHEDULES_IDA',
    'width' => '10%',
    'default' => true,
  ),
  'EXAM_TIME' => 
  array (
    'type' => 'varchar',
    'default' => true,
    'studio' => 'visible',
    'label' => 'Exam Time',
    'width' => '10%',
  ),
  'DESCRIPTION' => 
  array (
    'type' => 'text',
    'studio' => 'visible',
    'label' => 'LBL_DESCRIPTION',
    'sortable' => false,
    'width' => '10%',
    'default' => true,
  ),
  'DATE_ENTERED' => 
  array (
    'type' => 'datetime',
    'label' => 'LBL_DATE_ENTERED',
    'width' => '10%',
    'default' => true,
  ),
);
?>
