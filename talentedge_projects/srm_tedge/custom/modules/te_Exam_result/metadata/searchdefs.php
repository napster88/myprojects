<?php
$module_name = 'te_Exam_result';
$searchdefs [$module_name] = 
array (
  'layout' => 
  array (
    'basic_search' => 
    array (
      'name' => 
      array (
        'name' => 'name',
        'default' => true,
        'width' => '10%',
      ),
      'status' => 
      array (
        'type' => 'varchar',
        'label' => 'Status',
        'width' => '10%',
        'default' => true,
        'name' => 'status',
      ),
      'student' => 
      array (
        'type' => 'relate',
        'studio' => 'visible',
        'label' => 'LBL_STUDENT_NAME',
        'id' => 'TE_STUDENT_ID_C',
        'link' => true,
        'width' => '10%',
        'default' => true,
        'name' => 'student',
      ),
      'current_user_only' => 
      array (
        'name' => 'current_user_only',
        'label' => 'LBL_CURRENT_USER_FILTER',
        'type' => 'bool',
        'default' => true,
        'width' => '10%',
      ),
    ),
    'advanced_search' => 
    array (
      'name' => 
      array (
        'name' => 'name',
        'default' => true,
        'width' => '10%',
      ),
      'subject_name' => 
      array (
        'type' => 'relate',
        'studio' => 'visible',
        'label' => 'LBL_SUBJECT_NAME',
        'id' => 'TE_TE_SUBJECT_ID_C',
        'link' => true,
        'width' => '10%',
        'default' => true,
        'name' => 'subject_name',
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
        'default' => true,
        'width' => '10%',
      ),
    ),
  ),
  'templateMeta' => 
  array (
    'maxColumns' => '3',
    'maxColumnsBasic' => '4',
    'widths' => 
    array (
      'label' => '10',
      'field' => '30',
    ),
  ),
);
?>
