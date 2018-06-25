<?php
$module_name = 'te_Exam_scheme';
$viewdefs [$module_name] = 
array (
  'EditView' => 
  array (
    'templateMeta' => 
    array (
      'maxColumns' => '2',
      'form' => 
      array (
        'footerTpl' => 'custom/modules/te_Exam_scheme/tpls/EditViewFooter.tpl',
      ),
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
      'includes' => 
      array (
        0 => 
        array (
          'file' => 'custom/modules/te_Exam_scheme/program.js',
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
            'name' => 'university',
            'studio' => 'visible',
            'label' => 'LBL_UNIVERSITY',
          ),
        ),
        1 => 
        array (
          0 => 'description',
          1 => 
          array (
            'name' => 'program_lising',
            'studio' => 'visible',
            'label' => 'Programs Name',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'is_active',
            'label' => 'IS Active',
            'comment' => 'If check is_active',
          ),
          1 => '',
        ),
      ),
    ),
  ),
);
?>
