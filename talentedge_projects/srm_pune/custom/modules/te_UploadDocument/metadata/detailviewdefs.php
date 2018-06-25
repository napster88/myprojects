<?php
$module_name = 'te_UploadDocument';
$_object_name = 'te_uploaddocument';
$viewdefs [$module_name] = 
array (
  'DetailView' => 
  array (
    'templateMeta' => 
    array (
      'maxColumns' => '2',
      'form' => 
      array (
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
    ),
    'panels' => 
    array (
      'default' => 
      array (
        0 => 
        array (
          0 => 'document_name',
          1 => 'uploadfile',
        ),
        1 => 
        array (
          0 => 'status',
          1 => 
          array (
            'name' => 'te_uploaddocument_te_student_batch_name',
          ),
        ),
        2 => 
        array (
          0 => 'active_date',
          1 => '',
        ),
        3 => 
        array (
          0 => 'description',
          1 => 'exp_date',
        ),
        4 => 
        array (
          0 => '',
        ),
      ),
    ),
  ),
);
?>
