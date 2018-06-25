<?php
$module_name = 'te_Exam_scheme';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'UNIVERSITY' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_UNIVERSITY',
    'id' => 'TE_IN_INSTITUTES_ID_C',
    'link' => true,
    'width' => '10%',
    'default' => true,
  ),
  'NUMBER_EXAMS' => 
  array (
    'type' => 'int',
    'label' => 'Number Of Exams',
    'width' => '10%',
    'default' => true,
  ),
  'DESCRIPTION' => 
  array (
    'type' => 'text',
    'studio' => 'visible',
    'label' => 'LBL_DESCRIPTION',
    'sortable' => false,
    'width' => '10%',
    'default' => true,
  ),
  'CREATED_BY_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_CREATED',
    'id' => 'CREATED_BY',
    'width' => '10%',
    'default' => true,
  ),
  'DATE_ENTERED' => 
  array (
    'type' => 'datetime',
    'label' => 'LBL_DATE_ENTERED',
    'width' => '10%',
    'default' => true,
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'module' => 'Employees',
    'id' => 'ASSIGNED_USER_ID',
    'default' => false,
  ),
  'PROGRAM_LISING' => 
  array (
    'type' => 'multienum',
    'studio' => 'visible',
    'label' => 'Programs Name',
    'width' => '10%',
    'default' => false,
  ),
);
?>
