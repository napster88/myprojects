<?php
// created: 2017-12-06 17:25:08
$dictionary["te_examschedules_te_exam_date_schedules_1"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'te_examschedules_te_exam_date_schedules_1' => 
    array (
      'lhs_module' => 'te_ExamSchedules',
      'lhs_table' => 'te_examschedules',
      'lhs_key' => 'id',
      'rhs_module' => 'te_Exam_Date_Schedules',
      'rhs_table' => 'te_exam_date_schedules',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'te_examschedules_te_exam_date_schedules_1_c',
      'join_key_lhs' => 'te_examschedules_te_exam_date_schedules_1te_examschedules_ida',
      'join_key_rhs' => 'te_examschb597hedules_idb',
    ),
  ),
  'table' => 'te_examschedules_te_exam_date_schedules_1_c',
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
      'name' => 'te_examschedules_te_exam_date_schedules_1te_examschedules_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'te_examschb597hedules_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'te_examschedules_te_exam_date_schedules_1spk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'te_examschedules_te_exam_date_schedules_1_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'te_examschedules_te_exam_date_schedules_1te_examschedules_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'te_examschedules_te_exam_date_schedules_1_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'te_examschb597hedules_idb',
      ),
    ),
  ),
);