<?php
// created: 2018-04-10 14:26:31
$dictionary["te_exams_details_te_exam"] = array (
  'true_relationship_type' => 'one-to-many',
  'relationships' => 
  array (
    'te_exams_details_te_exam' => 
    array (
      'lhs_module' => 'te_Exam',
      'lhs_table' => 'te_exam',
      'lhs_key' => 'id',
      'rhs_module' => 'te_Exams_Details',
      'rhs_table' => 'te_exams_details',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'te_exams_details_te_exam_c',
      'join_key_lhs' => 'te_exams_details_te_examte_exam_ida',
      'join_key_rhs' => 'te_exams_details_te_examte_exams_details_idb',
    ),
  ),
  'table' => 'te_exams_details_te_exam_c',
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
      'name' => 'te_exams_details_te_examte_exam_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'te_exams_details_te_examte_exams_details_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'te_exams_details_te_examspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'te_exams_details_te_exam_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'te_exams_details_te_examte_exam_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'te_exams_details_te_exam_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'te_exams_details_te_examte_exams_details_idb',
      ),
    ),
  ),
);