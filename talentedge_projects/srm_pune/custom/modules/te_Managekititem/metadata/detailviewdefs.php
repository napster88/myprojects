<?php
$module_name = 'te_Managekititem';
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
            'name' => 'kit_item_code',
            'label' => 'LBL_KIT_ITEM_CODE',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'to_be_used_in_kit',
            'label' => 'LBL_TO_BE_USED_IN_KIT',
          ),
          1 => 
          array (
            'name' => 're_order_level',
            'label' => 'LBL_RE_ORDER_LEVEL',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'promotional_item',
            'label' => 'LBL_PROMOTIONAL_ITEM',
          ),
          1 => 
          array (
            'name' => 'master_itemtype',
            'studio' => 'visible',
            'label' => 'LBL_MASTER_ITEMTYPE',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'active',
            'label' => 'LBL_ACTIVE',
          ),
          1 => 'description',
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'stock',
            'label' => 'stock',
          ),
          1 => '',
        ),
      ),
    ),
  ),
);
?>
