<?php
// created: 2018-05-09 17:56:59
$dictionary["mse_managekit_stock_reconciliation"]["fields"]["mse_managekit_stock_reconciliation_te_managekititem"] = array (
  'name' => 'mse_managekit_stock_reconciliation_te_managekititem',
  'type' => 'link',
  'relationship' => 'mse_managekit_stock_reconciliation_te_managekititem',
  'source' => 'non-db',
  'module' => 'te_Managekititem',
  'bean_name' => 'te_Managekititem',
  'vname' => 'LBL_MSE_MANAGEKIT_STOCK_RECONCILIATION_TE_MANAGEKITITEM_FROM_TE_MANAGEKITITEM_TITLE',
  'id_name' => 'mse_manage669dkititem_ida',
);
$dictionary["mse_managekit_stock_reconciliation"]["fields"]["mse_managekit_stock_reconciliation_te_managekititem_name"] = array (
  'name' => 'mse_managekit_stock_reconciliation_te_managekititem_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_MSE_MANAGEKIT_STOCK_RECONCILIATION_TE_MANAGEKITITEM_FROM_TE_MANAGEKITITEM_TITLE',
  'save' => true,
  'id_name' => 'mse_manage669dkititem_ida',
  'link' => 'mse_managekit_stock_reconciliation_te_managekititem',
  'table' => 'te_managekititem',
  'module' => 'te_Managekititem',
  'rname' => 'name',
);
$dictionary["mse_managekit_stock_reconciliation"]["fields"]["mse_manage669dkititem_ida"] = array (
  'name' => 'mse_manage669dkititem_ida',
  'type' => 'link',
  'relationship' => 'mse_managekit_stock_reconciliation_te_managekititem',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_MSE_MANAGEKIT_STOCK_RECONCILIATION_TE_MANAGEKITITEM_FROM_MSE_MANAGEKIT_STOCK_RECONCILIATION_TITLE',
);
