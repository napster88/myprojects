<?php
$module_name = 'te_Exam_result';
$viewdefs [$module_name] = 
array (
  'DetailView' => 
  array (
    'templateMeta' => 
    array (
      'form' => 
      array (
        'buttons' => 
        array (
          0 => 'EDIT',
          1 => 'DUPLICATE',
          2 => 'DELETE',
          3 => 'FIND_DUPLICATES',
        ),
      ),
      'maxColumns' => '2',
      'widths' => 
      array (
        0 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
        1 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
      ),
      'useTabs' => false,
      'tabDefs' => 
      array (
        'DEFAULT' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
      ),
      'syncDetailEditViews' => true,
    ),
    'panels' => 
    array (
      'default' => 
      array (
        0 => 
        array (
          0 => 'name',
          1 => 
          array (
            'name' => 'student',
            'studio' => 'visible',
            'label' => 'LBL_STUDENT_NAME',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'subject_name',
            'studio' => 'visible',
            'label' => 'LBL_SUBJECT_NAME',
          ),
          1 => '',
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'total_marks',
            'label' => 'LBL_TOTAL_MARKS',
          ),
          1 => 
          array (
            'name' => 'total_prsent',
            'label' => 'LBL_TOTAL_PRSENT',
          ),
        ),
        3 => 
        array (
          0 => '',
          1 => '',
        ),
      ),
    ),
  ),
);
?>
