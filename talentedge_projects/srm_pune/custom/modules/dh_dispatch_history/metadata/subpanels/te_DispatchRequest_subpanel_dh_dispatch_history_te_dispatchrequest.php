<?php
// created: 2018-05-11 11:35:48
$subpanel_layout['list_fields'] = array (
  'status' => 
  array (
    'type' => 'varchar',
    'vname' => 'LBL_STATUS',
    'width' => '10%',
    'default' => true,
  ),
  'reason' => 
  array (
    'type' => 'varchar',
    'vname' => 'LBL_REASON',
    'width' => '10%',
    'default' => true,
  ),
  'description' => 
  array (
    'type' => 'text',
    'studio' => 'visible',
    'vname' => 'LBL_DESCRIPTION',
    'sortable' => false,
    'width' => '10%',
    'default' => true,
  ),
  'dispatch_date' => 
  array (
    'type' => 'varchar',
    'vname' => 'LBL_DISPATCH_DATE',
    'width' => '10%',
    'default' => true,
  ),
  'tracking_url' => 
  array (
    'type' => 'varchar',
    'vname' => 'LBL_TRACKING_URL',
    'width' => '10%',
    'default' => true,
  ),
  'consignment_number' => 
  array (
    'type' => 'varchar',
    'vname' => 'LBL_CONSIGNMENT_NUMBER',
    'width' => '10%',
    'default' => true,
  ),
  'c_vendor' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'vname' => 'LBL_C_VENDOR',
    'id' => 'TE_COURIER_ID_C',
    'link' => true,
    'width' => '10%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'te_Courier',
    'target_record_key' => 'te_courier_id_c',
  ),
  'kit_weight' => 
  array (
    'type' => 'varchar',
    'vname' => 'LBL_KIT_WEIGHT',
    'width' => '10%',
    'default' => true,
  ),
  'document_weight' => 
  array (
    'type' => 'varchar',
    'vname' => 'LBL_DOCUMENT_WEIGHT',
    'width' => '10%',
    'default' => true,
  ),
  'dispatch_item_list' => 
  array (
    'type' => 'varchar',
    'vname' => 'LBL_DISPATCH_ITEM_LIST',
    'width' => '10%',
    'default' => true,
  ),
  'dispatch_type' => 
  array (
    'type' => 'varchar',
    'vname' => 'LBL_DISPATCH_TYPE',
    'width' => '10%',
    'default' => true,
  ),
);