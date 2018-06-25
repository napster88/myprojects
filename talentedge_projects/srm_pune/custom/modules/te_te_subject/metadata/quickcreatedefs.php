<?php
$module_name = 'te_te_subject';
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
            'name' => 'te_te_subject_te_te_semester_name',
            'label' => 'LBL_TE_TE_SUBJECT_TE_TE_SEMESTER_FROM_TE_TE_SEMESTER_TITLE',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'subject_id',
            'label' => 'Subject ID',
            'comment' => 'Subject ID Enter',
          ),
          1 => 
          array (
            'name' => 'subject_type',
            'studio' => 'visible',
            'label' => 'LBL_SUBJECT_TYPE',
          ),
        ),
      ),
    ),
  ),
);
?>
