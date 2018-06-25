<?php
$module_name = 'te_ExamManager';
$searchdefs [$module_name] = 
array (
  'layout' => 
  array (
    'basic_search' => 
    array (
      'subject' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_SUBJECT',
        'width' => '10%',
        'default' => true,
        'name' => 'subject',
      ),
      'student' => 
      array (
        'type' => 'relate',
        'studio' => 'visible',
        'label' => 'LBL_STUDENT',
        'id' => 'TE_STUDENT_ID_C',
        'link' => true,
        'width' => '10%',
        'default' => true,
        'name' => 'student',
      ),
    ),
    'advanced_search' => 
    array (
      0 => 'name',
      1 => 
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
