<?php
$module_name = 'te_te_paymentplan';
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
            'name' => 'te_te_paymentplan_te_ba_batch_name',
            'label' => 'LBL_TE_TE_PAYMENTPLAN_TE_BA_BATCH_FROM_TE_BA_BATCH_TITLE',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'total_number_of_instalment',
            'label' => 'LBL_TOTAL_NUMBER_OF_INSTALMENT',
          ),
          1 => 
          array (
            'name' => 'description',
            'comment' => 'Full text of the note',
            'label' => 'LBL_DESCRIPTION',
          ),
        ),
      ),
    ),
  ),
);
?>
