<?php
$module_name = 'stent_stock_entry';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'STOCK_STATUS' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_STOCK_STATUS',
    'width' => '10%',
    'default' => true,
  ),
  'QUANTITY' => 
  array (
    'type' => 'int',
    'label' => 'LBL_QUANTITY',
    'width' => '10%',
    'default' => true,
  ),
  'REMARK' => 
  array (
    'type' => 'text',
    'studio' => 'visible',
    'label' => 'LBL_REMARK',
    'sortable' => false,
    'width' => '10%',
    'default' => true,
  ),
  'WORK_ORDER_NO' => 
  array (
    'type' => 'int',
    'label' => 'LBL_WORK_ORDER_NO',
    'width' => '10%',
    'default' => true,
  ),
  'DISPOSAL_METHOD' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_DISPOSAL_METHOD',
    'width' => '10%',
    'default' => true,
  ),
  'COST_FOR_DISPOSAL' => 
  array (
    'type' => 'int',
    'label' => 'LBL_COST_FOR_DISPOSAL',
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
