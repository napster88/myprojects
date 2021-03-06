<?php
// created: 2016-12-26 17:03:11
$dictionary["te_student_te_student_batch_1"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'te_student_te_student_batch_1' => 
    array (
      'lhs_module' => 'te_student',
      'lhs_table' => 'te_student',
      'lhs_key' => 'id',
      'rhs_module' => 'te_student_batch',
      'rhs_table' => 'te_student_batch',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'te_student_te_student_batch_1_c',
      'join_key_lhs' => 'te_student_te_student_batch_1te_student_ida',
      'join_key_rhs' => 'te_student_te_student_batch_1te_student_batch_idb',
    ),
  ),
  'table' => 'te_student_te_student_batch_1_c',
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
      'name' => 'te_student_te_student_batch_1te_student_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'te_student_te_student_batch_1te_student_batch_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'te_student_te_student_batch_1spk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'te_student_te_student_batch_1_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'te_student_te_student_batch_1te_student_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'te_student_te_student_batch_1_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'te_student_te_student_batch_1te_student_batch_idb',
      ),
    ),
  ),
);