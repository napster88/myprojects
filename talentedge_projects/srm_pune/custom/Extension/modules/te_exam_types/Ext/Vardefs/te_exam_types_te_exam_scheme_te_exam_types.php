<?php
// created: 2018-01-10 16:16:08
$dictionary["te_exam_types"]["fields"]["te_exam_types_te_exam_scheme"] = array (
  'name' => 'te_exam_types_te_exam_scheme',
  'type' => 'link',
  'relationship' => 'te_exam_types_te_exam_scheme',
  'source' => 'non-db',
  'module' => 'te_Exam_scheme',
  'bean_name' => 'te_Exam_scheme',
  'vname' => 'LBL_TE_EXAM_TYPES_TE_EXAM_SCHEME_FROM_TE_EXAM_SCHEME_TITLE',
  'id_name' => 'te_exam_types_te_exam_schemete_exam_scheme_ida',
);
$dictionary["te_exam_types"]["fields"]["te_exam_types_te_exam_scheme_name"] = array (
  'name' => 'te_exam_types_te_exam_scheme_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_TE_EXAM_TYPES_TE_EXAM_SCHEME_FROM_TE_EXAM_SCHEME_TITLE',
  'save' => true,
  'id_name' => 'te_exam_types_te_exam_schemete_exam_scheme_ida',
  'link' => 'te_exam_types_te_exam_scheme',
  'table' => 'te_exam_scheme',
  'module' => 'te_Exam_scheme',
  'rname' => 'name',
);
$dictionary["te_exam_types"]["fields"]["te_exam_types_te_exam_schemete_exam_scheme_ida"] = array (
  'name' => 'te_exam_types_te_exam_schemete_exam_scheme_ida',
  'type' => 'link',
  'relationship' => 'te_exam_types_te_exam_scheme',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_TE_EXAM_TYPES_TE_EXAM_SCHEME_FROM_TE_EXAM_TYPES_TITLE',
);
