<?php
// created: 2018-05-11 11:31:06
$dictionary["dh_dispatch_history_te_dispatchrequest"] = array (
  'true_relationship_type' => 'one-to-many',
  'relationships' => 
  array (
    'dh_dispatch_history_te_dispatchrequest' => 
    array (
      'lhs_module' => 'te_DispatchRequest',
      'lhs_table' => 'te_dispatchrequest',
      'lhs_key' => 'id',
      'rhs_module' => 'dh_dispatch_history',
      'rhs_table' => 'dh_dispatch_history',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'dh_dispatch_history_te_dispatchrequest_c',
      'join_key_lhs' => 'dh_dispatch_history_te_dispatchrequestte_dispatchrequest_ida',
      'join_key_rhs' => 'dh_dispatch_history_te_dispatchrequestdh_dispatch_history_idb',
    ),
  ),
  'table' => 'dh_dispatch_history_te_dispatchrequest_c',
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
      'name' => 'dh_dispatch_history_te_dispatchrequestte_dispatchrequest_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'dh_dispatch_history_te_dispatchrequestdh_dispatch_history_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'dh_dispatch_history_te_dispatchrequestspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'dh_dispatch_history_te_dispatchrequest_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'dh_dispatch_history_te_dispatchrequestte_dispatchrequest_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'dh_dispatch_history_te_dispatchrequest_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'dh_dispatch_history_te_dispatchrequestdh_dispatch_history_idb',
      ),
    ),
  ),
);