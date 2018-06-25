<?php
$module_name = 'te_te_semester';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'TOTAL_SUBJECT' => 
  array (
    'type' => 'int',
    'label' => 'LBL_TOTAL_SUBJECT',
    'width' => '10%',
    'default' => true,
  ),
  'SEMESTER_INSTITUTE_ID' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_SEMESTER_INSTITUTE_ID',
    'width' => '10%',
    'default' => true,
  ),
  'TE_PR_PROGRAMS_TE_TE_SEMESTER_1_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_TE_PR_PROGRAMS_TE_TE_SEMESTER_1_FROM_TE_PR_PROGRAMS_TITLE',
    'id' => 'TE_PR_PROGRAMS_TE_TE_SEMESTER_1TE_PR_PROGRAMS_IDA',
    'width' => '10%',
    'default' => true,
  ),
  'ORDER_NAME' => 
  array (
    'label' => 'Order',
    'type' => 'varchar',
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
