<?php
$module_name = 'te_Exam_Date_Schedules';
$viewdefs [$module_name] = 
array (
  'EditView' => 
  array (
    'templateMeta' => 
    array (
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
          0 => 
          array (
            'name' => 'subject',
            'studio' => 'visible',
            'label' => 'LBL_SUBJECT',
          ),
          1 => 
          array (
            'name' => 'te_examschedules_te_exam_date_schedules_1_name',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'exam_date',
            'label' => 'LBL_EXAM_DATE',
          ),
          1 => 'description',
        ),
        2 => 
        array (
          0 => '',
          1 => '',
        ),
      ),
    ),
  ),
);
?>
