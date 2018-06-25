<?php
$module_name = 'te_te_subject';
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
            'name' => 'te_te_subject_te_te_semester_name',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'subject_type',
            'studio' => 'visible',
            'label' => 'LBL_SUBJECT_TYPE',
          ),
          1 => 
          array (
            'name' => 'assignment_required',
            'studio' => 'visible',
            'label' => 'LBL_ASSIGNMENT_REQUIRED',
          ),
        ),
        2 => 
        array (
          0 => 'description',
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'subject_institute_id',
            'label' => 'LBL_SUBJECT_INSTITUTE_ID',
          ),
          1 => 
          array (
            'name' => 'subject_program_id',
            'label' => 'LBL_SUBJECT_PROGRAM_ID',
          ),
        ),
      ),
    ),
  ),
);
?>
