<?php
// created: 2018-05-09 17:56:59
$dictionary["mse_managekit_stock_entry"]["fields"]["mse_managekit_stock_entry_te_managekititem"] = array (
  'name' => 'mse_managekit_stock_entry_te_managekititem',
  'type' => 'link',
  'relationship' => 'mse_managekit_stock_entry_te_managekititem',
  'source' => 'non-db',
  'module' => 'te_Managekititem',
  'bean_name' => 'te_Managekititem',
  'vname' => 'LBL_MSE_MANAGEKIT_STOCK_ENTRY_TE_MANAGEKITITEM_FROM_TE_MANAGEKITITEM_TITLE',
  'id_name' => 'mse_managekit_stock_entry_te_managekititemte_managekititem_ida',
);
$dictionary["mse_managekit_stock_entry"]["fields"]["mse_managekit_stock_entry_te_managekititem_name"] = array (
  'name' => 'mse_managekit_stock_entry_te_managekititem_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_MSE_MANAGEKIT_STOCK_ENTRY_TE_MANAGEKITITEM_FROM_TE_MANAGEKITITEM_TITLE',
  'save' => true,
  'id_name' => 'mse_managekit_stock_entry_te_managekititemte_managekititem_ida',
  'link' => 'mse_managekit_stock_entry_te_managekititem',
  'table' => 'te_managekititem',
  'module' => 'te_Managekititem',
  'rname' => 'name',
);
$dictionary["mse_managekit_stock_entry"]["fields"]["mse_managekit_stock_entry_te_managekititemte_managekititem_ida"] = array (
  'name' => 'mse_managekit_stock_entry_te_managekititemte_managekititem_ida',
  'type' => 'link',
  'relationship' => 'mse_managekit_stock_entry_te_managekititem',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_MSE_MANAGEKIT_STOCK_ENTRY_TE_MANAGEKITITEM_FROM_MSE_MANAGEKIT_STOCK_ENTRY_TITLE',
);
