<?php
$module_name = 'te_installments';
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
          0 => 
          array (
            'name' => 'payment_inr',
            'label' => 'LBL_PAYMENT_INR',
          ),
          1 => 
          array (
            'name' => 'payment_usd',
            'label' => 'LBL_PAYMENT_USD',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'due_date',
            'label' => 'LBL_DUE_DATE',
          ),
          1 => 
          array (
            'name' => 'te_te_paymentplan_te_installments_1_name',
            'label' => 'LBL_TE_TE_PAYMENTPLAN_TE_INSTALLMENTS_1_FROM_TE_TE_PAYMENTPLAN_TITLE',
          ),
        ),
      ),
    ),
  ),
);
?>
