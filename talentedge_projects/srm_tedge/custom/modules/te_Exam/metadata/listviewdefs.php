<?php
$module_name = 'te_Exam';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'UNIVERSITY' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_UNIVERSITY',
    'id' => 'TE_IN_INSTITUTES_ID_C',
    'link' => true,
    'width' => '10%',
    'default' => true,
  ),
  'BATCH_VAL' => 
  array (
    'label' => 'Batch',
    'type' => 'varchar',
    'width' => '10%',
    'default' => true,
  ),
  'SEMESTER_VAL' => 
  array (
    'label' => 'Semester',
    'type' => 'varchar',
    'width' => '10%',
    'default' => true,
  ),
  'START_DATE' => 
  array (
    'type' => 'date',
    'label' => 'LBL_START_DATE',
    'width' => '10%',
    'default' => true,
  ),
  'END_DATE' => 
  array (
    'type' => 'date',
    'label' => 'LBL_END_DATE',
    'width' => '10%',
    'default' => true,
  ),
  'NUMBER_OF_SLOTS' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_NUMBER_OF_SLOTS',
    'width' => '10%',
    'default' => true,
  ),
  'LIST_DATE' => 
  array (
    'type' => 'varchar',
    'studio' => 'visible',
    'label' => 'list Date',
    'width' => '10%',
    'default' => true,
  ),
  'DESCRIPTION' => 
  array (
    'type' => 'text',
    'label' => 'LBL_DESCRIPTION',
    'sortable' => false,
    'width' => '10%',
    'default' => true,
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'module' => 'Employees',
    'id' => 'ASSIGNED_USER_ID',
    'default' => false,
  ),
  'FROM_TIME' => 
  array (
    'type' => 'varchar',
    'studio' => 'visible',
    'label' => 'From Time',
    'width' => '10%',
    'default' => false,
  ),
  'TO_TIME' => 
  array (
    'type' => 'varchar',
    'studio' => 'visible',
    'label' => 'To Time',
    'width' => '10%',
    'default' => false,
  ),
  'PROGRAM' => 
  array (
    'type' => 'multienum',
    'studio' => 'visible',
    'label' => 'LBL_PROGRAM',
    'width' => '10%',
    'default' => false,
  ),
);
?>
