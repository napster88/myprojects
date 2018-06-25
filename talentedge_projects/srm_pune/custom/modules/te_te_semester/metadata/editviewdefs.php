<?php
$module_name = 'te_te_semester';
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
            'name' => 'order_name',
            'label' => 'Order',
            'comment' => 'Order Store Here',
          ),
        ),
        1 => 
        array (
          0 => 'description',
          1 => 
          array (
            'name' => 'total_subject',
            'label' => 'LBL_TOTAL_SUBJECT',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'te_pr_programs_te_te_semester_name',
          ),
          1 => 
          array (
            'name' => 'te_pr_programs_te_te_semester_1_name',
          ),
        ),
      ),
    ),
  ),
);
?>
