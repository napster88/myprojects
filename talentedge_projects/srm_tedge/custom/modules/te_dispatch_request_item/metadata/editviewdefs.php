<?php
$module_name = 'te_dispatch_request_item';
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
          0 => 'name',
          1 => 
          array (
            'name' => 'institute_id',
            'label' => 'LBL_INSTITUTE_ID',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'program_id',
            'label' => 'LBL_PROGRAM_ID',
          ),
          1 => 
          array (
            'name' => 'semester_id',
            'label' => 'LBL_SEMESTER_ID',
          ),
        ),
        2 => 
        array (
          0 => 'description',
          1 => 
          array (
            'name' => 'semester_name',
            'label' => 'LBL_SEMESTER_NAME',
          ),
        ),
      ),
    ),
  ),
);
?>
