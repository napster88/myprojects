<?php
$module_name = 'te_ExamManager';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'STUDENT' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_STUDENT',
    'id' => 'TE_STUDENT_ID_C',
    'link' => true,
    'width' => '10%',
    'default' => true,
  ),
  'STATE' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_STATE',
    'width' => '10%',
    'default' => true,
  ),
  'CITY' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_CITY',
    'width' => '10%',
    'default' => true,
  ),
  'EXAM_CENTER' => 
  array (
    'type' => 'varchar',
    'default' => true,
    'label' => 'Exam Center',
    'width' => '10%',
  ),
  'DESCRIPTION' => 
  array (
    'type' => 'text',
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
    'default' => false,
  ),
  'EXAM_STATUS' => 
  array (
    'label' => 'Exam Status',
    'type' => 'varchar',
    'width' => '10%',
    'default' => false,
  ),
  'EXAM_TIME' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_EXAM_TIME',
    'width' => '10%',
    'default' => false,
  ),
  'EXAM_DATE' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_EXAM_DATE',
    'width' => '10%',
    'default' => false,
  ),
);
?>
