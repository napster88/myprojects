<?php
$module_name = 'te_Exam_result';
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
    'label' => 'LBL_STUDENT_NAME',
    'id' => 'TE_STUDENT_ID_C',
    'link' => true,
    'width' => '10%',
    'default' => true,
  ),
  'SUBJECT_NAME' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_SUBJECT_NAME',
    'id' => 'TE_TE_SUBJECT_ID_C',
    'link' => true,
    'width' => '10%',
    'default' => true,
  ),
  'TOTAL_MARKS' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_TOTAL_MARKS',
    'width' => '10%',
    'default' => true,
  ),
  'TOTAL_PRSENT' => 
  array (
    'type' => 'int',
    'label' => 'LBL_TOTAL_PRSENT',
    'width' => '10%',
    'default' => true,
  ),
  'STATUS' => 
  array (
    'type' => 'varchar',
    'label' => 'Status',
    'width' => '10%',
    'default' => true,
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
  'CREATED_BY_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_CREATED',
    'id' => 'CREATED_BY',
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
  'MIN_MARKS' => 
  array (
    'type' => 'int',
    'label' => 'LBL_MIN_MARKS',
    'width' => '10%',
    'default' => false,
  ),
  'SUBJECT' => 
  array (
    'type' => 'int',
    'label' => 'LBL_SUBJECT',
    'width' => '10%',
    'default' => false,
  ),
);
?>
