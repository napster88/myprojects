<?php
 // created: 2017-11-16 17:06:30
$layout_defs["te_te_paymentplan"]["subpanel_setup"]['te_te_paymentplan_te_installments_1'] = array (
  'order' => 100,
  'module' => 'te_installments',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_TE_TE_PAYMENTPLAN_TE_INSTALLMENTS_1_FROM_TE_INSTALLMENTS_TITLE',
  'get_subpanel_data' => 'te_te_paymentplan_te_installments_1',
  'top_buttons' => 
  array (
    0 => 
    array (
      'widget_class' => 'SubPanelTopButtonQuickCreate',
    ),
    1 => 
    array (
      'widget_class' => 'SubPanelTopSelectButton',
      'mode' => 'MultiSelect',
    ),
  ),
);
