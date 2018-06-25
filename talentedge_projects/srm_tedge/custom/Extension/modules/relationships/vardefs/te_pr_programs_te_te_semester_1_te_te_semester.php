<?php
// created: 2017-11-16 11:27:56
$dictionary["te_te_semester"]["fields"]["te_pr_programs_te_te_semester_1"] = array (
  'name' => 'te_pr_programs_te_te_semester_1',
  'type' => 'link',
  'relationship' => 'te_pr_programs_te_te_semester_1',
  'source' => 'non-db',
  'module' => 'te_pr_Programs',
  'bean_name' => 'te_pr_Programs',
  'vname' => 'LBL_TE_PR_PROGRAMS_TE_TE_SEMESTER_1_FROM_TE_PR_PROGRAMS_TITLE',
  'id_name' => 'te_pr_programs_te_te_semester_1te_pr_programs_ida',
);
$dictionary["te_te_semester"]["fields"]["te_pr_programs_te_te_semester_1_name"] = array (
  'name' => 'te_pr_programs_te_te_semester_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_TE_PR_PROGRAMS_TE_TE_SEMESTER_1_FROM_TE_PR_PROGRAMS_TITLE',
  'save' => true,
  'id_name' => 'te_pr_programs_te_te_semester_1te_pr_programs_ida',
  'link' => 'te_pr_programs_te_te_semester_1',
  'table' => 'te_pr_programs',
  'module' => 'te_pr_Programs',
  'rname' => 'name',
);
$dictionary["te_te_semester"]["fields"]["te_pr_programs_te_te_semester_1te_pr_programs_ida"] = array (
  'name' => 'te_pr_programs_te_te_semester_1te_pr_programs_ida',
  'type' => 'link',
  'relationship' => 'te_pr_programs_te_te_semester_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_TE_PR_PROGRAMS_TE_TE_SEMESTER_1_FROM_TE_TE_SEMESTER_TITLE',
);
