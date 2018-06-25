<?php
// created: 2017-12-05 13:53:40
$dictionary["te_ExamSchedules"]["fields"]["te_examschedules_te_te_semester"] = array (
  'name' => 'te_examschedules_te_te_semester',
  'type' => 'link',
  'relationship' => 'te_examschedules_te_te_semester',
  'source' => 'non-db',
  'module' => 'te_te_semester',
  'bean_name' => 'te_te_semester',
  'vname' => 'LBL_TE_EXAMSCHEDULES_TE_TE_SEMESTER_FROM_TE_TE_SEMESTER_TITLE',
  'id_name' => 'te_examschedules_te_te_semesterte_te_semester_ida',
);
$dictionary["te_ExamSchedules"]["fields"]["te_examschedules_te_te_semester_name"] = array (
  'name' => 'te_examschedules_te_te_semester_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_TE_EXAMSCHEDULES_TE_TE_SEMESTER_FROM_TE_TE_SEMESTER_TITLE',
  'save' => true,
  'id_name' => 'te_examschedules_te_te_semesterte_te_semester_ida',
  'link' => 'te_examschedules_te_te_semester',
  'table' => 'te_te_semester',
  'module' => 'te_te_semester',
  'rname' => 'name',
);
$dictionary["te_ExamSchedules"]["fields"]["te_examschedules_te_te_semesterte_te_semester_ida"] = array (
  'name' => 'te_examschedules_te_te_semesterte_te_semester_ida',
  'type' => 'link',
  'relationship' => 'te_examschedules_te_te_semester',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_TE_EXAMSCHEDULES_TE_TE_SEMESTER_FROM_TE_EXAMSCHEDULES_TITLE',
);
