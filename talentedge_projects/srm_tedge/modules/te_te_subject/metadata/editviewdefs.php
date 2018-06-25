<?php
$module_name = 'te_te_subject';
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
      'syncDetailEditViews' => false,
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
          1 => 
          array (
            'name' => 'date_entered',
            'comment' => 'Date record created',
            'label' => 'LBL_DATE_ENTERED',
          ),
        ),
      ),
    ),
  ),
);
?>
