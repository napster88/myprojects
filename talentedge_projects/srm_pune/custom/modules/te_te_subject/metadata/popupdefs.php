<?php
$popupMeta = array (
    'moduleMain' => 'te_te_subject',
    'varName' => 'te_te_subject',
    'orderBy' => 'te_te_subject.name',
    'whereClauses' => array (
  'name' => 'te_te_subject.name',
  'te_te_subject_te_te_semester_name' => 'te_te_subject.te_te_subject_te_te_semester_name',
  'subject_type' => 'te_te_subject.subject_type',
  'subject_program_id' => 'te_te_subject.subject_program_id',
),
    'searchInputs' => array (
  1 => 'name',
  4 => 'te_te_subject_te_te_semester_name',
  5 => 'subject_type',
  6 => 'subject_program_id',
),
    'searchdefs' => array (
  'name' => 
  array (
    'name' => 'name',
    'width' => '10%',
  ),
  'te_te_subject_te_te_semester_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_TE_TE_SUBJECT_TE_TE_SEMESTER_FROM_TE_TE_SEMESTER_TITLE',
    'id' => 'TE_TE_SUBJECT_TE_TE_SEMESTERTE_TE_SEMESTER_IDA',
    'width' => '10%',
    'name' => 'te_te_subject_te_te_semester_name',
  ),
  'subject_program_id' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_SUBJECT_PROGRAM_ID',
    'width' => '10%',
    'name' => 'subject_program_id',
  ),
  'subject_type' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_SUBJECT_TYPE',
    'width' => '10%',
    'name' => 'subject_type',
  ),
),
    'listviewdefs' => array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
    'name' => 'name',
  ),
  'TE_TE_SUBJECT_TE_TE_SEMESTER_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_TE_TE_SUBJECT_TE_TE_SEMESTER_FROM_TE_TE_SEMESTER_TITLE',
    'id' => 'TE_TE_SUBJECT_TE_TE_SEMESTERTE_TE_SEMESTER_IDA',
    'width' => '10%',
    'default' => true,
    'name' => 'te_te_subject_te_te_semester_name',
  ),
  'SUBJECT_TYPE' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_SUBJECT_TYPE',
    'width' => '10%',
    'name' => 'subject_type',
  ),
  'ASSIGNMENT_REQUIRED' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_ASSIGNMENT_REQUIRED',
    'width' => '10%',
    'default' => true,
  ),
  'DESCRIPTION' => 
  array (
    'type' => 'text',
    'label' => 'LBL_DESCRIPTION',
    'sortable' => false,
    'width' => '10%',
    'default' => true,
    'name' => 'description',
  ),
  'DATE_ENTERED' => 
  array (
    'type' => 'datetime',
    'label' => 'LBL_DATE_ENTERED',
    'width' => '10%',
    'default' => true,
    'name' => 'date_entered',
  ),
),
);
