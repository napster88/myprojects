<?php
// created: 2018-04-04 10:58:08
$dictionary["te_subjects_master_te_te_semester_1"] = array (
  'true_relationship_type' => 'many-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'te_subjects_master_te_te_semester_1' => 
    array (
      'lhs_module' => 'te_Subjects_master',
      'lhs_table' => 'te_subjects_master',
      'lhs_key' => 'id',
      'rhs_module' => 'te_te_semester',
      'rhs_table' => 'te_te_semester',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'te_subjects_master_te_te_semester_1_c',
      'join_key_lhs' => 'te_subjects_master_te_te_semester_1te_subjects_master_ida',
      'join_key_rhs' => 'te_subjects_master_te_te_semester_1te_te_semester_idb',
    ),
  ),
  'table' => 'te_subjects_master_te_te_semester_1_c',
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
      'name' => 'te_subjects_master_te_te_semester_1te_subjects_master_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'te_subjects_master_te_te_semester_1te_te_semester_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'te_subjects_master_te_te_semester_1spk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'te_subjects_master_te_te_semester_1_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'te_subjects_master_te_te_semester_1te_subjects_master_ida',
        1 => 'te_subjects_master_te_te_semester_1te_te_semester_idb',
      ),
    ),
  ),
);