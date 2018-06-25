<?php
// created: 2018-04-27 09:22:48
$dictionary["te_dispatch_request_item_te_dispatchrequest"] = array (
  'true_relationship_type' => 'many-to-many',
  'relationships' => 
  array (
    'te_dispatch_request_item_te_dispatchrequest' => 
    array (
      'lhs_module' => 'te_dispatch_request_item',
      'lhs_table' => 'te_dispatch_request_item',
      'lhs_key' => 'id',
      'rhs_module' => 'te_DispatchRequest',
      'rhs_table' => 'te_dispatchrequest',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'te_dispatch_request_item_te_dispatchrequest_c',
      'join_key_lhs' => 'te_dispatcf754st_item_ida',
      'join_key_rhs' => 'te_dispatc9fa1request_idb',
    ),
  ),
  'table' => 'te_dispatch_request_item_te_dispatchrequest_c',
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
      'name' => 'te_dispatcf754st_item_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'te_dispatc9fa1request_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'te_dispatch_request_item_te_dispatchrequestspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'te_dispatch_request_item_te_dispatchrequest_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'te_dispatcf754st_item_ida',
        1 => 'te_dispatc9fa1request_idb',
      ),
    ),
  ),
);