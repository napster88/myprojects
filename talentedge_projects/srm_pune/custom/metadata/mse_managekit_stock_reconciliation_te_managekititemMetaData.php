<?php
// created: 2018-05-09 17:56:59
$dictionary["mse_managekit_stock_reconciliation_te_managekititem"] = array (
  'true_relationship_type' => 'one-to-many',
  'relationships' => 
  array (
    'mse_managekit_stock_reconciliation_te_managekititem' => 
    array (
      'lhs_module' => 'te_Managekititem',
      'lhs_table' => 'te_managekititem',
      'lhs_key' => 'id',
      'rhs_module' => 'mse_managekit_stock_reconciliation',
      'rhs_table' => 'mse_managekit_stock_reconciliation',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'mse_managekit_stock_reconciliation_te_managekititem_c',
      'join_key_lhs' => 'mse_manage669dkititem_ida',
      'join_key_rhs' => 'mse_manage5aa7liation_idb',
    ),
  ),
  'table' => 'mse_managekit_stock_reconciliation_te_managekititem_c',
  'fields' => 
  array (
    0 => 
    array (
      'name' => 'id',
      'type' => 'varchar',
      'len' => 36,
    ),
    1 => 
    array (
      'name' => 'date_modified',
      'type' => 'datetime',
    ),
    2 => 
    array (
      'name' => 'deleted',
      'type' => 'bool',
      'len' => '1',
      'default' => '0',
      'required' => true,
    ),
    3 => 
    array (
      'name' => 'mse_manage669dkititem_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'mse_manage5aa7liation_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'mse_managekit_stock_reconciliation_te_managekititemspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'mse_managekit_stock_reconciliation_te_managekititem_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'mse_manage669dkititem_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'mse_managekit_stock_reconciliation_te_managekititem_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'mse_manage5aa7liation_idb',
      ),
    ),
  ),
);