<?php
// created: 2017-11-13 15:45:35
$dictionary["te_te_paymentplan"]["fields"]["te_te_paymentplan_te_ba_batch"] = array (
  'name' => 'te_te_paymentplan_te_ba_batch',
  'type' => 'link',
  'relationship' => 'te_te_paymentplan_te_ba_batch',
  'source' => 'non-db',
  'module' => 'te_ba_Batch',
  'bean_name' => 'te_ba_Batch',
  'vname' => 'LBL_TE_TE_PAYMENTPLAN_TE_BA_BATCH_FROM_TE_BA_BATCH_TITLE',
  'id_name' => 'te_te_paymentplan_te_ba_batchte_ba_batch_ida',
);
$dictionary["te_te_paymentplan"]["fields"]["te_te_paymentplan_te_ba_batch_name"] = array (
  'name' => 'te_te_paymentplan_te_ba_batch_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_TE_TE_PAYMENTPLAN_TE_BA_BATCH_FROM_TE_BA_BATCH_TITLE',
  'save' => true,
  'id_name' => 'te_te_paymentplan_te_ba_batchte_ba_batch_ida',
  'link' => 'te_te_paymentplan_te_ba_batch',
  'table' => 'te_ba_batch',
  'module' => 'te_ba_Batch',
  'rname' => 'name',
);
$dictionary["te_te_paymentplan"]["fields"]["te_te_paymentplan_te_ba_batchte_ba_batch_ida"] = array (
  'name' => 'te_te_paymentplan_te_ba_batchte_ba_batch_ida',
  'type' => 'link',
  'relationship' => 'te_te_paymentplan_te_ba_batch',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_TE_TE_PAYMENTPLAN_TE_BA_BATCH_FROM_TE_TE_PAYMENTPLAN_TITLE',
);
