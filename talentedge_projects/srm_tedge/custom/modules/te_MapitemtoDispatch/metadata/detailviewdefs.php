<?php
$module_name = 'te_MapitemtoDispatch';
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
            'name' => 'semester_c',
            'label' => 'LBL_SEMESTER',
          ),
        ),
        1 => 
        array (
          0 => '',
          1 => 
          array (
            'name' => 'institute_id',
            'label' => 'LBL_INSTITUTE_ID',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'program_id',
            'label' => 'LBL_PROGRAM_ID',
          ),
          1 => 'description',
        ),
        3 => 
        array (
          0 => '',
        ),
      ),
    ),
  ),
);
?>