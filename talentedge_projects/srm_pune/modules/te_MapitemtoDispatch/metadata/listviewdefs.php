<?php
$module_name = 'te_MapitemtoDispatch';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'SEMESTER' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_SEMESTER',
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
  'PROGRAM_ID' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_PROGRAM_ID',
    'width' => '10%',
    'default' => true,
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'module' => 'Employees',
    'id' => 'ASSIGNED_USER_ID',
    'default' => true,
  ),
);
?>
