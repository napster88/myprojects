<?php
$module_name = 'te_Managekititem';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'INSTITUTE_NAME' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'Institute',
    'id' => 'TE_INSTITUTE_ID',
    'link' => true,
    'width' => '10%',
    'default' => true,
  ),
  'KIT_ITEM_CODE' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_KIT_ITEM_CODE',
    'width' => '10%',
    'default' => true,
  ),
  'STOCK' => 
  array (
    'type' => 'int',
    'default' => true,
    'label' => 'stock',
    'width' => '10%',
  ),
  'RE_ORDER_LEVEL' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_RE_ORDER_LEVEL',
    'width' => '10%',
    'default' => true,
  ),
  'STOCKIN' => 
  array (
    'type' => 'varchar',
    'label' => 'Stock-In Entry',
    'width' => '10%',
    'default' => true,
  ),
  'STOCKOUT' => 
  array (
    'type' => 'varchar',
    'label' => 'stock-Out Entry',
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
