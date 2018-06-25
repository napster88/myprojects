<?php
// created: 2018-05-04 13:12:43
$dictionary["stent_stock_entry"]["fields"]["stent_stock_entry_te_managekititem"] = array (
  'name' => 'stent_stock_entry_te_managekititem',
  'type' => 'link',
  'relationship' => 'stent_stock_entry_te_managekititem',
  'source' => 'non-db',
  'module' => 'te_Managekititem',
  'bean_name' => 'te_Managekititem',
  'vname' => 'LBL_STENT_STOCK_ENTRY_TE_MANAGEKITITEM_FROM_TE_MANAGEKITITEM_TITLE',
  'id_name' => 'stent_stock_entry_te_managekititemte_managekititem_ida',
);
$dictionary["stent_stock_entry"]["fields"]["stent_stock_entry_te_managekititem_name"] = array (
  'name' => 'stent_stock_entry_te_managekititem_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_STENT_STOCK_ENTRY_TE_MANAGEKITITEM_FROM_TE_MANAGEKITITEM_TITLE',
  'save' => true,
  'id_name' => 'stent_stock_entry_te_managekititemte_managekititem_ida',
  'link' => 'stent_stock_entry_te_managekititem',
  'table' => 'te_managekititem',
  'module' => 'te_Managekititem',
  'rname' => 'name',
);
$dictionary["stent_stock_entry"]["fields"]["stent_stock_entry_te_managekititemte_managekititem_ida"] = array (
  'name' => 'stent_stock_entry_te_managekititemte_managekititem_ida',
  'type' => 'link',
  'relationship' => 'stent_stock_entry_te_managekititem',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_STENT_STOCK_ENTRY_TE_MANAGEKITITEM_FROM_STENT_STOCK_ENTRY_TITLE',
);
