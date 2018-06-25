<?php
// created: 2018-04-10 14:26:31
$dictionary["te_Exams_Details"]["fields"]["te_exams_details_te_exam"] = array (
  'name' => 'te_exams_details_te_exam',
  'type' => 'link',
  'relationship' => 'te_exams_details_te_exam',
  'source' => 'non-db',
  'module' => 'te_Exam',
  'bean_name' => 'te_Exam',
  'vname' => 'LBL_TE_EXAMS_DETAILS_TE_EXAM_FROM_TE_EXAM_TITLE',
  'id_name' => 'te_exams_details_te_examte_exam_ida',
);
$dictionary["te_Exams_Details"]["fields"]["te_exams_details_te_exam_name"] = array (
  'name' => 'te_exams_details_te_exam_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_TE_EXAMS_DETAILS_TE_EXAM_FROM_TE_EXAM_TITLE',
  'save' => true,
  'id_name' => 'te_exams_details_te_examte_exam_ida',
  'link' => 'te_exams_details_te_exam',
  'table' => 'te_exam',
  'module' => 'te_Exam',
  'rname' => 'name',
);
$dictionary["te_Exams_Details"]["fields"]["te_exams_details_te_examte_exam_ida"] = array (
  'name' => 'te_exams_details_te_examte_exam_ida',
  'type' => 'link',
  'relationship' => 'te_exams_details_te_exam',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_TE_EXAMS_DETAILS_TE_EXAM_FROM_TE_EXAMS_DETAILS_TITLE',
);
