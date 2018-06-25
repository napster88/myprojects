<?php
$module_name = 'te_ExamSchedules';
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
            'name' => 'te_examschedules_te_te_semester_name',
            'label' => 'LBL_TE_EXAMSCHEDULES_TE_TE_SEMESTER_FROM_TE_TE_SEMESTER_TITLE',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'description',
            'comment' => 'Full text of the note',
            'label' => 'LBL_DESCRIPTION',
          ),
          1 => 
          array (
            'name' => 'status',
            'studio' => 'visible',
            'label' => 'LBL_STATUS',
          ),
        ),
        2 => 
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
        3 => 
        array (
          0 => 
          array (
            'name' => 'start_time',
            'studio' => 'visible',
            'label' => 'Start Time(Ex-9:00)',
          ),
          1 => 
          array (
            'name' => 'end_time',
            'studio' => 'visible',
            'label' => 'End Time(Ex-21:00)',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'exam_slot',
            'studio' => 'visible',
            'label' => 'LBL_EXAM_SLOT',
          ),
          1 => '',
        ),
      ),
    ),
  ),
);
?>
