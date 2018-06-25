<?php
// created: 2017-11-23 18:33:27
$dictionary["te_MasterDocument"]["fields"]["te_masterdocument_te_pr_programs"] = array (
  'name' => 'te_masterdocument_te_pr_programs',
  'type' => 'link',
  'relationship' => 'te_masterdocument_te_pr_programs',
  'source' => 'non-db',
  'module' => 'te_pr_Programs',
  'bean_name' => 'te_pr_Programs',
  'vname' => 'LBL_TE_MASTERDOCUMENT_TE_PR_PROGRAMS_FROM_TE_PR_PROGRAMS_TITLE',
  'id_name' => 'te_masterdocument_te_pr_programste_pr_programs_ida',
);
$dictionary["te_MasterDocument"]["fields"]["te_masterdocument_te_pr_programs_name"] = array (
  'name' => 'te_masterdocument_te_pr_programs_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_TE_MASTERDOCUMENT_TE_PR_PROGRAMS_FROM_TE_PR_PROGRAMS_TITLE',
  'save' => true,
  'id_name' => 'te_masterdocument_te_pr_programste_pr_programs_ida',
  'link' => 'te_masterdocument_te_pr_programs',
  'table' => 'te_pr_programs',
  'module' => 'te_pr_Programs',
  'rname' => 'name',
);
$dictionary["te_MasterDocument"]["fields"]["te_masterdocument_te_pr_programste_pr_programs_ida"] = array (
  'name' => 'te_masterdocument_te_pr_programste_pr_programs_ida',
  'type' => 'link',
  'relationship' => 'te_masterdocument_te_pr_programs',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_TE_MASTERDOCUMENT_TE_PR_PROGRAMS_FROM_TE_MASTERDOCUMENT_TITLE',
);
