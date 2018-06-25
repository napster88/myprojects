<?php
// created: 2017-11-16 15:14:36
$dictionary["te_te_subject_te_te_semester"] = array (
  'true_relationship_type' => 'one-to-many',
  'relationships' => 
  array (
    'te_te_subject_te_te_semester' => 
    array (
      'lhs_module' => 'te_te_semester',
      'lhs_table' => 'te_te_semester',
      'lhs_key' => 'id',
      'rhs_module' => 'te_te_subject',
      'rhs_table' => 'te_te_subject',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'te_te_subject_te_te_semester_c',
      'join_key_lhs' => 'te_te_subject_te_te_semesterte_te_semester_ida',
      'join_key_rhs' => 'te_te_subject_te_te_semesterte_te_subject_idb',
    ),
  ),
  'table' => 'te_te_subject_te_te_semester_c',
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
      'name' => 'te_te_subject_te_te_semesterte_te_semester_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'te_te_subject_te_te_semesterte_te_subject_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'te_te_subject_te_te_semesterspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'te_te_subject_te_te_semester_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'te_te_subject_te_te_semesterte_te_semester_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'te_te_subject_te_te_semester_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'te_te_subject_te_te_semesterte_te_subject_idb',
      ),
    ),
  ),
);