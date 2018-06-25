<?php
$module_name = 'te_exam_types';
$viewdefs [$module_name] = 
array (
  'QuickCreate' => 
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
            'name' => 'exam_type',
            'studio' => 'visible',
            'label' => 'LBL_EXAM_TYPE',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'passing_prsent',
            'label' => 'LBL_PASSING_PRSENT',
          ),
          1 => 
          array (
            'name' => 'total_prsent',
            'label' => 'LBL_TOTAL_PRSENT',
          ),
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
            'name' => 'description',
            'comment' => 'Full text of the note',
            'label' => 'LBL_DESCRIPTION',
          ),
        ),
      ),
    ),
  ),
);
?>
