<?php
$module_name = 'te_Subjects_master';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'SUBJECT_CODE' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_SUBJECT_CODE',
    'width' => '10%',
    'default' => true,
  ),
  'OVERALL_PASSING_MARKS' => 
  array (
    'type' => 'int',
    'label' => 'LBL_OVERALL_PASSING_MARKS',
    'width' => '10%',
    'default' => true,
  ),
  'OVERALL_TOTAL_MARKS' => 
  array (
    'type' => 'int',
    'label' => 'LBL_OVERALL_TOTAL_MARKS',
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
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'module' => 'Employees',
    'id' => 'ASSIGNED_USER_ID',
    'default' => false,
  ),
);
?>
