<?php
// created: 2018-05-04 13:12:43
$dictionary["stent_stock_entry_te_managekititem"] = array (
  'true_relationship_type' => 'one-to-many',
  'relationships' => 
  array (
    'stent_stock_entry_te_managekititem' => 
    array (
      'lhs_module' => 'te_Managekititem',
      'lhs_table' => 'te_managekititem',
      'lhs_key' => 'id',
      'rhs_module' => 'stent_stock_entry',
      'rhs_table' => 'stent_stock_entry',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'stent_stock_entry_te_managekititem_c',
      'join_key_lhs' => 'stent_stock_entry_te_managekititemte_managekititem_ida',
      'join_key_rhs' => 'stent_stock_entry_te_managekititemstent_stock_entry_idb',
    ),
  ),
  'table' => 'stent_stock_entry_te_managekititem_c',
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
      'name' => 'stent_stock_entry_te_managekititemte_managekititem_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'stent_stock_entry_te_managekititemstent_stock_entry_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'stent_stock_entry_te_managekititemspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'stent_stock_entry_te_managekititem_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'stent_stock_entry_te_managekititemte_managekititem_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'stent_stock_entry_te_managekititem_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'stent_stock_entry_te_managekititemstent_stock_entry_idb',
      ),
    ),
  ),
);