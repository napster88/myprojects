<?php
// created: 2017-12-06 17:25:08
$dictionary["te_Exam_Date_Schedules"]["fields"]["te_examschedules_te_exam_date_schedules_1"] = array (
  'name' => 'te_examschedules_te_exam_date_schedules_1',
  'type' => 'link',
  'relationship' => 'te_examschedules_te_exam_date_schedules_1',
  'source' => 'non-db',
  'module' => 'te_ExamSchedules',
  'bean_name' => 'te_ExamSchedules',
  'vname' => 'LBL_TE_EXAMSCHEDULES_TE_EXAM_DATE_SCHEDULES_1_FROM_TE_EXAMSCHEDULES_TITLE',
  'id_name' => 'te_examschedules_te_exam_date_schedules_1te_examschedules_ida',
);
$dictionary["te_Exam_Date_Schedules"]["fields"]["te_examschedules_te_exam_date_schedules_1_name"] = array (
  'name' => 'te_examschedules_te_exam_date_schedules_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_TE_EXAMSCHEDULES_TE_EXAM_DATE_SCHEDULES_1_FROM_TE_EXAMSCHEDULES_TITLE',
  'save' => true,
  'id_name' => 'te_examschedules_te_exam_date_schedules_1te_examschedules_ida',
  'link' => 'te_examschedules_te_exam_date_schedules_1',
  'table' => 'te_examschedules',
  'module' => 'te_ExamSchedules',
  'rname' => 'name',
);
$dictionary["te_Exam_Date_Schedules"]["fields"]["te_examschedules_te_exam_date_schedules_1te_examschedules_ida"] = array (
  'name' => 'te_examschedules_te_exam_date_schedules_1te_examschedules_ida',
  'type' => 'link',
  'relationship' => 'te_examschedules_te_exam_date_schedules_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_TE_EXAMSCHEDULES_TE_EXAM_DATE_SCHEDULES_1_FROM_TE_EXAM_DATE_SCHEDULES_TITLE',
);
