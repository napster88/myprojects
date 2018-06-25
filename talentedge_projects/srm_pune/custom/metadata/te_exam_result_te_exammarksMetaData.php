<?php
// created: 2018-01-12 13:30:50
$dictionary["te_exam_result_te_exammarks"] = array (
  'true_relationship_type' => 'one-to-many',
  'relationships' => 
  array (
    'te_exam_result_te_exammarks' => 
    array (
      'lhs_module' => 'te_Exam_result',
      'lhs_table' => 'te_exam_result',
      'lhs_key' => 'id',
      'rhs_module' => 'te_ExamMarks',
      'rhs_table' => 'te_exammarks',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'te_exam_result_te_exammarks_c',
      'join_key_lhs' => 'te_exam_result_te_exammarkste_exam_result_ida',
      'join_key_rhs' => 'te_exam_result_te_exammarkste_exammarks_idb',
    ),
  ),
  'table' => 'te_exam_result_te_exammarks_c',
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
      'name' => 'te_exam_result_te_exammarkste_exam_result_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'te_exam_result_te_exammarkste_exammarks_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'te_exam_result_te_exammarksspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'te_exam_result_te_exammarks_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'te_exam_result_te_exammarkste_exam_result_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'te_exam_result_te_exammarks_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'te_exam_result_te_exammarkste_exammarks_idb',
      ),
    ),
  ),
);