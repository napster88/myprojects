<?php
// created: 2017-11-23 18:33:27
$dictionary["te_masterdocument_te_pr_programs"] = array (
  'true_relationship_type' => 'one-to-many',
  'relationships' => 
  array (
    'te_masterdocument_te_pr_programs' => 
    array (
      'lhs_module' => 'te_pr_Programs',
      'lhs_table' => 'te_pr_programs',
      'lhs_key' => 'id',
      'rhs_module' => 'te_MasterDocument',
      'rhs_table' => 'te_masterdocument',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'te_masterdocument_te_pr_programs_c',
      'join_key_lhs' => 'te_masterdocument_te_pr_programste_pr_programs_ida',
      'join_key_rhs' => 'te_masterdocument_te_pr_programste_masterdocument_idb',
    ),
  ),
  'table' => 'te_masterdocument_te_pr_programs_c',
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
      'name' => 'te_masterdocument_te_pr_programste_pr_programs_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'te_masterdocument_te_pr_programste_masterdocument_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'te_masterdocument_te_pr_programsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'te_masterdocument_te_pr_programs_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'te_masterdocument_te_pr_programste_pr_programs_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'te_masterdocument_te_pr_programs_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'te_masterdocument_te_pr_programste_masterdocument_idb',
      ),
    ),
  ),
);