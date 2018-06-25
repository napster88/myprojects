<?php
$module_name = 'te_in_institutes';
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
        'LBL_EDITVIEW_PANEL1' => 
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
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'logo',
            'studio' => 'visible',
            'label' => 'LBL_LOGO',
          ),
          1 => 
          array (
            'name' => 'logo_two',
            'label' => 'Logo 2',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'short_name',
            'label' => 'Short Name',
          ),
          1 => 
          array (
            'name' => 'institute_code',
            'label' => 'Institute(Source)Code',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'marksheet_no',
            'label' => 'Marksheet No.',
          ),
          1 => 
          array (
            'name' => 'Challan_line1',
            'label' => 'Challan Line 1',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'institute_url',
            'label' => 'Institute URL',
            'comment' => 'Full institute url',
          ),
          1 => 
          array (
            'name' => 'Challan_line2',
            'label' => 'Challan Line 2',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'Challan_line3',
            'label' => 'Challan Line 3',
          ),
          1 => 
          array (
            'name' => 'allow_score',
            'comment' => 'If check allow_score',
            'label' => 'Allow Score',
          ),
        ),
        6 => 
        array (
          0 => 'description',
          1 => 
          array (
            'name' => 'allow_grade',
            'comment' => 'If check allow_grade',
            'label' => 'Allow Grade',
          ),
        ),
        7 => 
        array (
          0 => '',
        ),
      ),
      'lbl_editview_panel1' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'address_line1',
            'label' => 'Address Line 1',
            'comment' => 'Address line 1',
          ),
          1 => 
          array (
            'name' => 'address_line2',
            'label' => 'Address Line 2',
            'comment' => 'Address Line2',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'faxnumber',
            'label' => 'Fax Number',
          ),
          1 => 
          array (
            'name' => 'Pincode',
            'label' => 'Pincode',
          ),
        ),
        2 => 
        array (
          0 => '',
          1 => '',
        ),
      ),
    ),
  ),
);
?>
