<?php
$module_name = 'te_DispatchRequest';
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
          0 => 
          array (
            'name' => 'request_id',
            'label' => 'LBL_REQUEST_ID',
          ),
          1 => 'name',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'dispatch_date',
            'comment' => 'Date Field Comment',
            'label' => 'Dispatch Date',
          ),
          1 => 
          array (
            'name' => 'student_c',
            'studio' => 'visible',
            'label' => 'LBL_STUDENT',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'batch_c',
            'studio' => 'visible',
            'label' => 'LBL_BATCH',
          ),
          1 => 
          array (
            'name' => 'program_c',
            'studio' => 'visible',
            'label' => 'LBL_PROGRAM',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'status',
            'studio' => 'visible',
            'label' => 'LBL_STATUS',
          ),
          1 => 
          array (
            'name' => 'semester_c',
            'studio' => 'visible',
            'label' => 'LBL_SEMESTER',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'reason',
            'studio' => 'visible',
            'label' => 'Reason',
          ),
          1 => '',
        ),
      ),
    ),
  ),
);
?>
