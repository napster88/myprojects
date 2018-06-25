<?php
// created: 2018-01-10 16:16:08
$dictionary["te_exam_types_te_exam_scheme"] = array (
  'true_relationship_type' => 'one-to-many',
  'relationships' => 
  array (
    'te_exam_types_te_exam_scheme' => 
    array (
      'lhs_module' => 'te_Exam_scheme',
      'lhs_table' => 'te_exam_scheme',
      'lhs_key' => 'id',
      'rhs_module' => 'te_exam_types',
      'rhs_table' => 'te_exam_types',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'te_exam_types_te_exam_scheme_c',
      'join_key_lhs' => 'te_exam_types_te_exam_schemete_exam_scheme_ida',
      'join_key_rhs' => 'te_exam_types_te_exam_schemete_exam_types_idb',
    ),
  ),
  'table' => 'te_exam_types_te_exam_scheme_c',
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
      'name' => 'te_exam_types_te_exam_schemete_exam_scheme_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'te_exam_types_te_exam_schemete_exam_types_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'te_exam_types_te_exam_schemespk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'te_exam_types_te_exam_scheme_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'te_exam_types_te_exam_schemete_exam_scheme_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'te_exam_types_te_exam_scheme_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'te_exam_types_te_exam_schemete_exam_types_idb',
      ),
    ),
  ),
);