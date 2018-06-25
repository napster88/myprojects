<?php
$module_name = 'te_Exam';
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
            'name' => 'university',
            'studio' => 'visible',
            'label' => 'LBL_UNIVERSITY',
          ),
        ),
        1 => 
        array (
          0 => '',
          1 => 
          array (
            'name' => 'map_other_fields',
            'label' => 'LBL_MAP_OTHER_FIELDS',
          ),
        ),
        2 => 
        array (
          0 => '',
        ),
      ),
    ),
  ),
);
?>
