<?php
// created: 2017-11-16 17:06:30
$dictionary["te_te_paymentplan_te_installments_1"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'te_te_paymentplan_te_installments_1' => 
    array (
      'lhs_module' => 'te_te_paymentplan',
      'lhs_table' => 'te_te_paymentplan',
      'lhs_key' => 'id',
      'rhs_module' => 'te_installments',
      'rhs_table' => 'te_installments',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'te_te_paymentplan_te_installments_1_c',
      'join_key_lhs' => 'te_te_paymentplan_te_installments_1te_te_paymentplan_ida',
      'join_key_rhs' => 'te_te_paymentplan_te_installments_1te_installments_idb',
    ),
  ),
  'table' => 'te_te_paymentplan_te_installments_1_c',
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
      'name' => 'te_te_paymentplan_te_installments_1te_te_paymentplan_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'te_te_paymentplan_te_installments_1te_installments_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'te_te_paymentplan_te_installments_1spk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'te_te_paymentplan_te_installments_1_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'te_te_paymentplan_te_installments_1te_te_paymentplan_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'te_te_paymentplan_te_installments_1_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'te_te_paymentplan_te_installments_1te_installments_idb',
      ),
    ),
  ),
);