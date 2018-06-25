<?php
$popupMeta = array (
    'moduleMain' => 'te_te_semester',
    'varName' => 'te_te_semester',
    'orderBy' => 'te_te_semester.name',
    'whereClauses' => array (
  'name' => 'te_te_semester.name',
  'semester_institute_id' => 'te_te_semester.semester_institute_id',
  'te_pr_programs_te_te_semester_1_name' => 'te_te_semester.te_pr_programs_te_te_semester_1_name',
  'assigned_user_id' => 'te_te_semester.assigned_user_id',
),
    'searchInputs' => array (
  1 => 'name',
  4 => 'semester_institute_id',
  5 => 'te_pr_programs_te_te_semester_1_name',
  6 => 'assigned_user_id',
),
    'searchdefs' => array (
  'name' => 
  array (
    'name' => 'name',
    'width' => '10%',
  ),
  'semester_institute_id' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_SEMESTER_INSTITUTE_ID',
    'width' => '10%',
    'name' => 'semester_institute_id',
  ),
  'te_pr_programs_te_te_semester_1_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_TE_PR_PROGRAMS_TE_TE_SEMESTER_1_FROM_TE_PR_PROGRAMS_TITLE',
    'id' => 'TE_PR_PROGRAMS_TE_TE_SEMESTER_1TE_PR_PROGRAMS_IDA',
    'width' => '10%',
    'name' => 'te_pr_programs_te_te_semester_1_name',
  ),
  'assigned_user_id' => 
  array (
    'name' => 'assigned_user_id',
    'label' => 'LBL_ASSIGNED_TO',
    'type' => 'enum',
    'function' => 
    array (
      'name' => 'get_user_array',
      'params' => 
      array (
        0 => false,
      ),
    ),
    'width' => '10%',
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
  'TE_PR_PROGRAMS_TE_TE_SEMESTER_1_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_TE_PR_PROGRAMS_TE_TE_SEMESTER_1_FROM_TE_PR_PROGRAMS_TITLE',
    'id' => 'TE_PR_PROGRAMS_TE_TE_SEMESTER_1TE_PR_PROGRAMS_IDA',
    'width' => '10%',
    'default' => true,
    'name' => 'te_pr_programs_te_te_semester_1_name',
  ),
  'ORDER_NAME' => 
  array (
    'label' => 'Order',
    'type' => 'varchar',
    'width' => '10%',
    'default' => true,
    'name' => 'order_name',
  ),
  'DATE_MODIFIED' => 
  array (
    'type' => 'datetime',
    'label' => 'LBL_DATE_MODIFIED',
    'width' => '10%',
    'default' => true,
    'name' => 'date_modified',
  ),
),
);
