<?php
// created: 2018-01-12 13:30:50
$dictionary["te_ExamMarks"]["fields"]["te_exam_result_te_exammarks"] = array (
  'name' => 'te_exam_result_te_exammarks',
  'type' => 'link',
  'relationship' => 'te_exam_result_te_exammarks',
  'source' => 'non-db',
  'module' => 'te_Exam_result',
  'bean_name' => 'te_Exam_result',
  'vname' => 'LBL_TE_EXAM_RESULT_TE_EXAMMARKS_FROM_TE_EXAM_RESULT_TITLE',
  'id_name' => 'te_exam_result_te_exammarkste_exam_result_ida',
);
$dictionary["te_ExamMarks"]["fields"]["te_exam_result_te_exammarks_name"] = array (
  'name' => 'te_exam_result_te_exammarks_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_TE_EXAM_RESULT_TE_EXAMMARKS_FROM_TE_EXAM_RESULT_TITLE',
  'save' => true,
  'id_name' => 'te_exam_result_te_exammarkste_exam_result_ida',
  'link' => 'te_exam_result_te_exammarks',
  'table' => 'te_exam_result',
  'module' => 'te_Exam_result',
  'rname' => 'name',
);
$dictionary["te_ExamMarks"]["fields"]["te_exam_result_te_exammarkste_exam_result_ida"] = array (
  'name' => 'te_exam_result_te_exammarkste_exam_result_ida',
  'type' => 'link',
  'relationship' => 'te_exam_result_te_exammarks',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_TE_EXAM_RESULT_TE_EXAMMARKS_FROM_TE_EXAMMARKS_TITLE',
);
