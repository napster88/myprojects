<?php
// created: 2018-01-08 17:22:06
$dictionary["te_pr_Programs"]["fields"]["te_exam_scheme_te_pr_programs"] = array (
  'name' => 'te_exam_scheme_te_pr_programs',
  'type' => 'link',
  'relationship' => 'te_exam_scheme_te_pr_programs',
  'source' => 'non-db',
  'module' => 'te_Exam_scheme',
  'bean_name' => 'te_Exam_scheme',
  'vname' => 'LBL_TE_EXAM_SCHEME_TE_PR_PROGRAMS_FROM_TE_EXAM_SCHEME_TITLE',
  'id_name' => 'te_exam_scheme_te_pr_programste_exam_scheme_ida',
);
$dictionary["te_pr_Programs"]["fields"]["te_exam_scheme_te_pr_programs_name"] = array (
  'name' => 'te_exam_scheme_te_pr_programs_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_TE_EXAM_SCHEME_TE_PR_PROGRAMS_FROM_TE_EXAM_SCHEME_TITLE',
  'save' => true,
  'id_name' => 'te_exam_scheme_te_pr_programste_exam_scheme_ida',
  'link' => 'te_exam_scheme_te_pr_programs',
  'table' => 'te_exam_scheme',
  'module' => 'te_Exam_scheme',
  'rname' => 'name',
);
$dictionary["te_pr_Programs"]["fields"]["te_exam_scheme_te_pr_programste_exam_scheme_ida"] = array (
  'name' => 'te_exam_scheme_te_pr_programste_exam_scheme_ida',
  'type' => 'link',
  'relationship' => 'te_exam_scheme_te_pr_programs',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_TE_EXAM_SCHEME_TE_PR_PROGRAMS_FROM_TE_PR_PROGRAMS_TITLE',
);
