<?php
// created: 2018-04-27 11:05:42
$dictionary["te_mapitemtodispatch_te_managekititem"] = array (
  'true_relationship_type' => 'many-to-many',
  'relationships' => 
  array (
    'te_mapitemtodispatch_te_managekititem' => 
    array (
      'lhs_module' => 'te_MapitemtoDispatch',
      'lhs_table' => 'te_mapitemtodispatch',
      'lhs_key' => 'id',
      'rhs_module' => 'te_Managekititem',
      'rhs_table' => 'te_managekititem',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'te_mapitemtodispatch_te_managekititem_c',
      'join_key_lhs' => 'te_mapitemtodispatch_te_managekititemte_mapitemtodispatch_ida',
      'join_key_rhs' => 'te_mapitemtodispatch_te_managekititemte_managekititem_idb',
    ),
  ),
  'table' => 'te_mapitemtodispatch_te_managekititem_c',
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
      'name' => 'te_mapitemtodispatch_te_managekititemte_mapitemtodispatch_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'te_mapitemtodispatch_te_managekititemte_managekititem_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'te_mapitemtodispatch_te_managekititemspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'te_mapitemtodispatch_te_managekititem_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'te_mapitemtodispatch_te_managekititemte_mapitemtodispatch_ida',
        1 => 'te_mapitemtodispatch_te_managekititemte_managekititem_idb',
      ),
    ),
  ),
);