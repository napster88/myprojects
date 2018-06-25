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
  'KIT_ITEM_CODE' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_KIT_ITEM_CODE',
    'width' => '10%',
    'default' => true,
  ),
  'RE_ORDER_LEVEL' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_RE_ORDER_LEVEL',
    'width' => '10%',
    'default' => true,
  ),
  'PROMOTIONAL_ITEM' => 
  array (
    'type' => 'bool',
    'default' => true,
    'label' => 'LBL_PROMOTIONAL_ITEM',
    'width' => '10%',
  ),
  'TO_BE_USED_IN_KIT' => 
  array (
    'type' => 'bool',
    'default' => true,
    'label' => 'LBL_TO_BE_USED_IN_KIT',
    'width' => '10%',
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
  'STOCK' => 
  array (
    'type' => 'varchar',
    'default' => true,
    'label' => 'stock',
    'width' => '10%',
  ),
  'STOCK_INENTRY' => 
  array (
    'type' => 'varchar',
    'label' => 'stock In Entry',
    'width' => '10%',
    'default' => true,
  ),
  'STOCK_OUTENTRY' => 
  array (
    'type' => 'varchar',
    'label' => 'stock Out Entry',
    'width' => '10%',
    'default' => true,
  ),
  'STOCK_TAKINGENTRY' => 
  array (
    'type' => 'varchar',
    'label' => 'stock Taking Entry',
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
  'ACTIVE' => 
  array (
    'type' => 'bool',
    'default' => false,
    'label' => 'LBL_ACTIVE',
    'width' => '10%',
  ),
  'DESCRIPTION' => 
  array (
    'type' => 'text',
    'label' => 'LBL_DESCRIPTION',
    'sortable' => false,
    'width' => '10%',
    'default' => false,
  ),
  'MASTER_ITEMTYPE' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_MASTER_ITEMTYPE',
    'width' => '10%',
    'default' => false,
  ),
  'DATE_ENTERED' => 
  array (
    'type' => 'datetime',
    'label' => 'LBL_DATE_ENTERED',
    'width' => '10%',
    'default' => false,
  ),
);
?>
