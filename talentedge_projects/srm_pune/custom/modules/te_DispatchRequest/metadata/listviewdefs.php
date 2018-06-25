<?php
$module_name = 'te_DispatchRequest';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'STUDENT_C' => 
  array (
    'type' => 'relate',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_STUDENT',
    'id' => 'TE_STUDENT_ID_C',
    'link' => true,
    'width' => '10%',
  ),
  'BATCH_C' => 
  array (
    'type' => 'relate',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_BATCH',
    'id' => 'TE_BA_BATCH_ID_C',
    'link' => true,
    'width' => '10%',
  ),
  'STATUS' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_STATUS',
    'width' => '10%',
    'default' => true,
  ),
  'DISPATCH_DATE' => 
  array (
    'type' => 'date',
    'label' => 'Dispatch Date',
    'width' => '10%',
    'default' => true,
  ),
  'PROGRAM_C' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_PROGRAM',
    'width' => '10%',
  ),
  'SEMESTER_C' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_SEMESTER',
    'width' => '10%',
  ),
  'REASON' => 
  array (
    'type' => 'varchar',
    'studio' => 'visible',
    'label' => 'Reason',
    'width' => '10%',
    'default' => true,
  ),
  'INSTITUTE_ID' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_INSTITUTE_ID',
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
