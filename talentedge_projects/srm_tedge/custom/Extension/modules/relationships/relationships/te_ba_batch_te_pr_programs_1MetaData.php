<?php
// created: 2018-06-18 17:39:08
$dictionary["te_ba_batch_te_pr_programs_1"] = array (
  'true_relationship_type' => 'many-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'te_ba_batch_te_pr_programs_1' => 
    array (
      'lhs_module' => 'te_ba_Batch',
      'lhs_table' => 'te_ba_batch',
      'lhs_key' => 'id',
      'rhs_module' => 'te_pr_Programs',
      'rhs_table' => 'te_pr_programs',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'te_ba_batch_te_pr_programs_1_c',
      'join_key_lhs' => 'te_ba_batch_te_pr_programs_1te_ba_batch_ida',
      'join_key_rhs' => 'te_ba_batch_te_pr_programs_1te_pr_programs_idb',
    ),
  ),
  'table' => 'te_ba_batch_te_pr_programs_1_c',
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
      'name' => 'te_ba_batch_te_pr_programs_1te_ba_batch_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'te_ba_batch_te_pr_programs_1te_pr_programs_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'te_ba_batch_te_pr_programs_1spk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'te_ba_batch_te_pr_programs_1_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'te_ba_batch_te_pr_programs_1te_ba_batch_ida',
        1 => 'te_ba_batch_te_pr_programs_1te_pr_programs_idb',
      ),
    ),
  ),
);