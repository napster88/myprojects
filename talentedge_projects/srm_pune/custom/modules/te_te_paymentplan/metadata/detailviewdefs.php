<?php
$module_name = 'te_te_paymentplan';
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
            'name' => 'te_te_paymentplan_te_ba_batch_name',
          ),
        ),
        1 => 
        array (
          0 => 'date_entered',
          1 => 
          array (
            'name' => 'total_number_of_instalment',
            'label' => 'LBL_TOTAL_NUMBER_OF_INSTALMENT',
          ),
        ),
        2 => 
        array (
          0 => 'description',
          1 => 'date_modified',
        ),
      ),
    ),
  ),
);
?>
