<?php
// created: 2017-11-16 17:06:31
$dictionary["te_installments"]["fields"]["te_te_paymentplan_te_installments_1"] = array (
  'name' => 'te_te_paymentplan_te_installments_1',
  'type' => 'link',
  'relationship' => 'te_te_paymentplan_te_installments_1',
  'source' => 'non-db',
  'module' => 'te_te_paymentplan',
  'bean_name' => 'te_te_paymentplan',
  'vname' => 'LBL_TE_TE_PAYMENTPLAN_TE_INSTALLMENTS_1_FROM_TE_TE_PAYMENTPLAN_TITLE',
  'id_name' => 'te_te_paymentplan_te_installments_1te_te_paymentplan_ida',
);
$dictionary["te_installments"]["fields"]["te_te_paymentplan_te_installments_1_name"] = array (
  'name' => 'te_te_paymentplan_te_installments_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_TE_TE_PAYMENTPLAN_TE_INSTALLMENTS_1_FROM_TE_TE_PAYMENTPLAN_TITLE',
  'save' => true,
  'id_name' => 'te_te_paymentplan_te_installments_1te_te_paymentplan_ida',
  'link' => 'te_te_paymentplan_te_installments_1',
  'table' => 'te_te_paymentplan',
  'module' => 'te_te_paymentplan',
  'rname' => 'name',
);
$dictionary["te_installments"]["fields"]["te_te_paymentplan_te_installments_1te_te_paymentplan_ida"] = array (
  'name' => 'te_te_paymentplan_te_installments_1te_te_paymentplan_ida',
  'type' => 'link',
  'relationship' => 'te_te_paymentplan_te_installments_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_TE_TE_PAYMENTPLAN_TE_INSTALLMENTS_1_FROM_TE_INSTALLMENTS_TITLE',
);
