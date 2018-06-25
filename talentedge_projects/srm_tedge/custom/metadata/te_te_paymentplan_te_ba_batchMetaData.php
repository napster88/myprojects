<?php
// created: 2017-11-13 15:45:35
$dictionary["te_te_paymentplan_te_ba_batch"] = array (
  'true_relationship_type' => 'one-to-many',
  'relationships' => 
  array (
    'te_te_paymentplan_te_ba_batch' => 
    array (
      'lhs_module' => 'te_ba_Batch',
      'lhs_table' => 'te_ba_batch',
      'lhs_key' => 'id',
      'rhs_module' => 'te_te_paymentplan',
      'rhs_table' => 'te_te_paymentplan',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'te_te_paymentplan_te_ba_batch_c',
      'join_key_lhs' => 'te_te_paymentplan_te_ba_batchte_ba_batch_ida',
      'join_key_rhs' => 'te_te_paymentplan_te_ba_batchte_te_paymentplan_idb',
    ),
  ),
  'table' => 'te_te_paymentplan_te_ba_batch_c',
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
      'name' => 'te_te_paymentplan_te_ba_batchte_ba_batch_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'te_te_paymentplan_te_ba_batchte_te_paymentplan_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'te_te_paymentplan_te_ba_batchspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'te_te_paymentplan_te_ba_batch_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'te_te_paymentplan_te_ba_batchte_ba_batch_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'te_te_paymentplan_te_ba_batch_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'te_te_paymentplan_te_ba_batchte_te_paymentplan_idb',
      ),
    ),
  ),
);