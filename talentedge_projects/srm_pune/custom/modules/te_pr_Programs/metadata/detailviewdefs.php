<?php
$module_name = 'te_pr_Programs';
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
    ),
    'panels' => 
    array (
      'default' => 
      array (
        0 => 
        array (
          0 => 'name',
          1 => 'date_entered',
        ),
        1 => 
        array (
          0 => 'date_modified',
          1 => 
          array (
            'name' => 'course_code',
            'label' => 'Course Code',
          ),
        ),
        2 => 
        array (
          0 => 'description',
          1 => '',
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'te_exam_scheme_te_pr_programs_name',
            'label' => 'LBL_TE_EXAM_SCHEME_TE_PR_PROGRAMS_FROM_TE_EXAM_SCHEME_TITLE',
          ),
        ),
      ),
    ),
  ),
);
?>
