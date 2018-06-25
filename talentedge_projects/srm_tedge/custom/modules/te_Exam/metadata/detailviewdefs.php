<?php
$module_name = 'te_Exam';
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
            'name' => 'university',
            'studio' => 'visible',
            'label' => 'LBL_UNIVERSITY',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'start_date',
            'label' => 'LBL_START_DATE',
          ),
          1 => 
          array (
            'name' => 'end_date',
            'label' => 'LBL_END_DATE',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'number_of_slots',
            'studio' => 'visible',
            'label' => 'LBL_NUMBER_OF_SLOTS',
          ),
          1 => 
          array (
            'name' => 'list_date',
            'studio' => 'visible',
            'label' => 'list Date',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'batch_val',
            'label' => 'Batch',
            'comment' => '',
          ),
          1 => 
          array (
            'name' => 'program',
            'studio' => 'visible',
            'label' => 'LBL_PROGRAM',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'semester_val',
            'label' => 'Semester',
            'comment' => '',
          ),
          1 => 
          array (
            'name' => 'Subject_val',
            'label' => 'Subject',
            'comment' => '',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'map_other_fields',
            'label' => 'LBL_MAP_OTHER_FIELDS',
          ),
          1 => '',
        ),
        6 => 
        array (
          0 => '',
          1 => '',
        ),
      ),
    ),
  ),
);
?>
